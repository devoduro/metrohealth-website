<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Mail\BookingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->get();
        
        return view('booking.index-redesign', compact('services'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service_id' => 'required|exists:services,id',
            'hair_type' => 'nullable|string|max:255',
            'preferred_date' => 'required|date|after:today',
            'preferred_time' => 'required|string',
            'message' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Get service for estimated price (use average of min/max if available)
        $service = Service::find($request->service_id);
        $estimatedPrice = null;
        if ($service && $service->price_min && $service->price_max) {
            $estimatedPrice = ($service->price_min + $service->price_max) / 2;
        } elseif ($service && $service->price_min) {
            $estimatedPrice = $service->price_min;
        }

        $booking = Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'service_id' => $request->service_id,
            'hair_type' => $request->hair_type,
            'preferred_date' => $request->preferred_date,
            'preferred_time' => $request->preferred_time,
            'message' => $request->message,
            'status' => 'pending',
            'estimated_price' => $estimatedPrice,
        ]);

        // Send email notification to both addresses
        try {
            // Check if mail is configured before attempting to send
            if (config('mail.default') && config('mail.mailers.' . config('mail.default'))) {
                Mail::to(['vspoku11@gmail.com', 'stawiah@gmail.com', 'devoduro@gmail.com'])
                    ->send(new BookingNotification($booking));
            } else {
                // Log that email wasn't sent due to missing configuration
                \Log::warning('Booking email not sent - mail configuration missing. Booking ID: ' . $booking->id);
            }
        } catch (\Exception $e) {
            // Log error but don't fail the booking
            \Log::error('Failed to send booking notification email: ' . $e->getMessage());
        }

        return redirect()->route('booking.success')->with('success', 'Your booking request has been submitted successfully! We will contact you shortly to confirm your appointment.');
    }

    public function success()
    {
        return view('booking.success');
    }

    public function specialistClinics()
    {
        return view('booking.specialist-clinics');
    }

    public function getServicePrice($serviceId, $hairType)
    {
        $service = Service::find($serviceId);
        
        if (!$service) {
            return response()->json(['price' => null]);
        }

        $price = $service->getPriceByHairType($hairType);
        
        return response()->json(['price' => $price]);
    }
}
