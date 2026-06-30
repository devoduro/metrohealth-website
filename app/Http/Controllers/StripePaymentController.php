<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Booking;

class StripePaymentController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    }

    public function createCheckoutSession(Request $request)
    {
        $validated = $request->validate([
            'customer_category' => 'required|in:walk-in,home-service',
            'service_location' => 'required_if:customer_category,home-service|nullable|in:within-reading,outside-reading',
            'street_address' => 'required_if:customer_category,home-service|nullable|string|max:255',
            'postcode' => 'required_if:customer_category,home-service|nullable|string|max:20',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service_id' => 'required|exists:services,id',
            'hair_type' => 'nullable|string|max:255',
            'preferred_date' => 'required|date',
            'preferred_time' => 'required|string',
            'message' => 'nullable|string|max:1000',
        ]);

        // Calculate deposit amount based on category and location
        $depositAmount = $this->calculateDepositAmount(
            $validated['customer_category'],
            $validated['service_location'] ?? null
        );

        // Store booking data in session temporarily
        session([
            'pending_booking' => array_merge($validated, [
                'deposit_amount' => $depositAmount,
                'payment_status' => 'pending'
            ])
        ]);

        try {
            $checkoutSession = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'gbp',
                        'product_data' => [
                            'name' => 'Booking Deposit - ' . ucfirst(str_replace('-', ' ', $validated['customer_category'])),
                            'description' => $this->getDepositDescription($validated['customer_category'], $validated['service_location'] ?? null),
                        ],
                        'unit_amount' => $depositAmount * 100, // Convert to pence
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('stripe.cancel'),
                'customer_email' => $validated['email'],
                'metadata' => [
                    'customer_name' => $validated['name'],
                    'customer_category' => $validated['customer_category'],
                    'service_location' => $validated['service_location'] ?? 'N/A',
                ]
            ]);

            return redirect($checkoutSession->url);
        } catch (\Exception $e) {
            return redirect()->route('booking.index')->with('error', 'Payment session could not be created. Please try again.');
        }
    }

    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');

        if (!$sessionId) {
            \Log::error('Stripe payment success: No session ID provided');
            return redirect()->route('booking.index')->with('error', 'Invalid payment session.');
        }

        try {
            $session = Session::retrieve($sessionId);
            \Log::info('Stripe session retrieved', ['session_id' => $sessionId, 'payment_status' => $session->payment_status]);

            if ($session->payment_status === 'paid') {
                // Retrieve booking data from session
                $bookingData = session('pending_booking');

                if (!$bookingData) {
                    \Log::error('Stripe payment success: Booking data not found in session', ['session_id' => $sessionId]);
                    return redirect()->route('booking.index')->with('error', 'Booking data not found.');
                }

                \Log::info('Creating booking after successful payment', ['booking_data' => $bookingData]);

                // Create the booking
                try {
                    $booking = Booking::create([
                        'name' => $bookingData['name'],
                        'email' => $bookingData['email'],
                        'phone' => $bookingData['phone'],
                        'service_id' => $bookingData['service_id'],
                        'customer_category' => $bookingData['customer_category'],
                        'service_location' => $bookingData['service_location'] ?? null,
                        'street_address' => $bookingData['street_address'] ?? null,
                        'postcode' => $bookingData['postcode'] ?? null,
                        'hair_type' => $bookingData['hair_type'] ?? null,
                        'preferred_date' => $bookingData['preferred_date'],
                        'preferred_time' => $bookingData['preferred_time'],
                        'message' => $bookingData['message'] ?? null,
                        'status' => 'pending',
                        'deposit_amount' => $bookingData['deposit_amount'],
                        'payment_status' => 'paid',
                        'stripe_session_id' => $sessionId,
                        'stripe_payment_intent_id' => $session->payment_intent,
                    ]);

                    \Log::info('Booking created successfully', ['booking_id' => $booking->id, 'customer' => $booking->name]);
                } catch (\Exception $e) {
                    \Log::error('Failed to create booking: ' . $e->getMessage(), [
                        'exception' => $e,
                        'booking_data' => $bookingData
                    ]);
                    return redirect()->route('booking.index')->with('error', 'Failed to create booking. Please contact support with payment confirmation.');
                }

                // Clear session data
                session()->forget('pending_booking');

                // Send email notifications
                try {
                    \Log::info('Attempting to send booking notification emails', [
                        'booking_id' => $booking->id,
                        'customer_email' => $booking->email
                    ]);
                    
                    if (config('mail.default') && config('mail.mailers.' . config('mail.default'))) {
                        // Send to admin
                        \Mail::to(['vspoku11@gmail.com', 'stawiah@gmail.com', 'devoduro@gmail.com'])
                            ->send(new \App\Mail\BookingNotification($booking));
                        
                        \Log::info('Admin booking notification email sent successfully', ['booking_id' => $booking->id]);
                        
                        // Send confirmation to customer
                        \Mail::to($booking->email)
                            ->send(new \App\Mail\BookingStatusUpdate($booking));
                        
                        \Log::info('Customer booking confirmation email sent successfully', [
                            'booking_id' => $booking->id,
                            'customer_email' => $booking->email
                        ]);
                    } else {
                        \Log::warning('Mail configuration not set, skipping email notification', ['booking_id' => $booking->id]);
                    }
                } catch (\Exception $e) {
                    \Log::error('Failed to send booking notification email: ' . $e->getMessage(), [
                        'exception' => $e,
                        'booking_id' => $booking->id,
                        'trace' => $e->getTraceAsString()
                    ]);
                }

                return view('booking.payment-success', compact('booking'));
            }

            \Log::warning('Payment not completed', ['session_id' => $sessionId, 'payment_status' => $session->payment_status]);
            return redirect()->route('booking.index')->with('error', 'Payment was not completed.');
        } catch (\Exception $e) {
            \Log::error('Error in payment success handler: ' . $e->getMessage(), [
                'exception' => $e,
                'session_id' => $sessionId,
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('booking.index')->with('error', 'Unable to verify payment. Please contact support.');
        }
    }

    public function cancel()
    {
        session()->forget('pending_booking');
        return view('booking.payment-cancel');
    }

    private function calculateDepositAmount($category, $location = null)
    {
        if ($category === 'walk-in') {
            return 1.00;
        }

        if ($category === 'home-service') {
            if ($location === 'within-reading') {
                return 50.00;
            }
            if ($location === 'outside-reading') {
                return 70.00;
            }
        }

        return 0.00;
    }

    private function getDepositDescription($category, $location = null)
    {
        if ($category === 'walk-in') {
            return 'Walk-in customer deposit fee';
        }

        if ($category === 'home-service') {
            if ($location === 'within-reading') {
                return 'Home service deposit - Within Reading';
            }
            if ($location === 'outside-reading') {
                return 'Home service deposit - Outside Reading';
            }
        }

        return 'Booking deposit';
    }
}
