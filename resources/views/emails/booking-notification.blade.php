<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #2C1810 0%, #4A2C1F 100%);
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
        }
        .booking-details {
            background: #FFF5F0;
            border-left: 4px solid #F26522;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
        }
        .detail-row {
            margin: 10px 0;
            padding: 8px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: bold;
            color: #2C1810;
            display: inline-block;
            width: 150px;
        }
        .value {
            color: #555;
        }
        .footer {
            background: #f9f9f9;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
        .button {
            display: inline-block;
            padding: 12px 30px;
            background: #F26522;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 New Booking Request</h1>
        </div>
        
        <div class="content">
            <p>Hello,</p>
            <p>You have received a new booking request from <strong>{{ $booking->name }}</strong>.</p>
            
            <div class="booking-details">
                <h3 style="margin-top: 0; color: #2C1810;">Booking Details</h3>
                
                <div class="detail-row">
                    <span class="label">Customer Name:</span>
                    <span class="value">{{ $booking->name }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="label">Email:</span>
                    <span class="value">{{ $booking->email }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="label">Phone:</span>
                    <span class="value">{{ $booking->phone }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="label">Service:</span>
                    <span class="value">{{ $booking->service->title ?? 'N/A' }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="label">Customer Type:</span>
                    <span class="value">{{ ucfirst(str_replace('-', ' ', $booking->customer_category)) }}</span>
                </div>
                
                @if($booking->service_location)
                <div class="detail-row">
                    <span class="label">Service Location:</span>
                    <span class="value">{{ ucfirst(str_replace('-', ' ', $booking->service_location)) }}</span>
                </div>
                @endif
                
                @if($booking->street_address)
                <div class="detail-row">
                    <span class="label">Street Address:</span>
                    <span class="value">{{ $booking->street_address }}</span>
                </div>
                @endif
                
                @if($booking->postcode)
                <div class="detail-row">
                    <span class="label">Postcode:</span>
                    <span class="value">{{ strtoupper($booking->postcode) }}</span>
                </div>
                @endif
                
                @if($booking->hair_type)
                <div class="detail-row">
                    <span class="label">Hair Type:</span>
                    <span class="value">{{ $booking->hair_type }}</span>
                </div>
                @endif
                
                <div class="detail-row">
                    <span class="label">Preferred Date:</span>
                    <span class="value">{{ \Carbon\Carbon::parse($booking->preferred_date)->format('l, F j, Y') }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="label">Preferred Time:</span>
                    <span class="value">{{ $booking->preferred_time }}</span>
                </div>
                
                @if($booking->service && ($booking->service->price_min || $booking->service->price_max))
                <div class="detail-row">
                    <span class="label">Estimated Price:</span>
                    <span class="value">
                        @if($booking->service->price_min && $booking->service->price_max)
                            £{{ number_format($booking->service->price_min, 2) }} - £{{ number_format($booking->service->price_max, 2) }}
                        @elseif($booking->service->price_min)
                            From £{{ number_format($booking->service->price_min, 2) }}
                        @else
                            Up to £{{ number_format($booking->service->price_max, 2) }}
                        @endif
                    </span>
                </div>
                @endif
                
                @if($booking->service_cost)
                <div class="detail-row" style="background: #fff3cd; padding: 10px; border-radius: 5px;">
                    <span class="label">💰 Final Cost:</span>
                    <span class="value" style="color: #856404; font-weight: bold; font-size: 16px;">£{{ number_format($booking->service_cost, 2) }}</span>
                </div>
                @endif
                
                @if($booking->message)
                <div class="detail-row">
                    <span class="label">Message:</span>
                    <span class="value">{{ $booking->message }}</span>
                </div>
                @endif
                
                <div class="detail-row" style="background: #e8f5e9; padding: 10px; border-radius: 5px;">
                    <span class="label">💰 Deposit Paid:</span>
                    <span class="value" style="color: #2e7d32; font-weight: bold; font-size: 16px;">£{{ number_format($booking->deposit_amount, 2) }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="label">Payment Status:</span>
                    <span class="value" style="color: {{ $booking->payment_status === 'paid' ? '#2e7d32' : '#d32f2f' }}; font-weight: bold;">
                        {{ strtoupper($booking->payment_status) }}
                    </span>
                </div>
                
                <div class="detail-row">
                    <span class="label">Booking ID:</span>
                    <span class="value">#{{ $booking->id }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="label">Submitted:</span>
                    <span class="value">{{ $booking->created_at->format('F j, Y \a\t g:i A') }}</span>
                </div>
            </div>
            
            <p style="text-align: center;">
                <a href="{{ url('/') }}" class="button">Visit Our Website</a>
            </p>
            
            <p style="color: #777; font-size: 14px;">
                Please contact the customer as soon as possible to confirm the appointment details.
            </p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} Ashlocs. All Rights Reserved.</p>
            <p>This is an automated notification from your booking system.</p>
        </div>
    </div>
</body>
</html>
