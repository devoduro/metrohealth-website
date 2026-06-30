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
            @if($booking->status === 'confirmed')
                background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            @elseif($booking->status === 'completed')
                background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            @elseif($booking->status === 'cancelled')
                background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            @else
                background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            @endif
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .status-badge {
            display: inline-block;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: bold;
            margin-top: 10px;
            @if($booking->status === 'confirmed')
                background: rgba(255, 255, 255, 0.3);
            @elseif($booking->status === 'completed')
                background: rgba(255, 255, 255, 0.3);
            @elseif($booking->status === 'cancelled')
                background: rgba(255, 255, 255, 0.3);
            @else
                background: rgba(255, 255, 255, 0.3);
            @endif
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
        .status-message {
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            @if($booking->status === 'confirmed')
                background: #d4edda;
                border: 1px solid #c3e6cb;
                color: #155724;
            @elseif($booking->status === 'completed')
                background: #d1ecf1;
                border: 1px solid #bee5eb;
                color: #0c5460;
            @elseif($booking->status === 'cancelled')
                background: #f8d7da;
                border: 1px solid #f5c6cb;
                color: #721c24;
            @else
                background: #fff3cd;
                border: 1px solid #ffeaa7;
                color: #856404;
            @endif
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
            @if($booking->status === 'confirmed')
                <h1>✅ Booking Confirmed!</h1>
            @elseif($booking->status === 'completed')
                <h1>🎉 Booking Completed!</h1>
            @elseif($booking->status === 'cancelled')
                <h1>❌ Booking Cancelled</h1>
            @else
                <h1>📋 Booking Status Update</h1>
            @endif
            <div class="status-badge">{{ strtoupper($booking->status) }}</div>
        </div>
        
        <div class="content">
            <p>Hello <strong>{{ $booking->name }}</strong>,</p>
            
            <div class="status-message">
                @if($booking->status === 'confirmed')
                    <strong>Great news!</strong> Your booking has been confirmed. We look forward to seeing you!
                @elseif($booking->status === 'completed')
                    <strong>Thank you!</strong> Your appointment has been completed. We hope you enjoyed our service!
                @elseif($booking->status === 'cancelled')
                    <strong>Booking Cancelled:</strong> Your booking has been cancelled. If you have any questions, please contact us.
                @else
                    Your booking status has been updated to: <strong>{{ ucfirst($booking->status) }}</strong>
                @endif
            </div>
            
            <div class="booking-details">
                <h3 style="margin-top: 0; color: #2C1810;">Booking Details</h3>
                
                <div class="detail-row">
                    <span class="label">Booking ID:</span>
                    <span class="value">#{{ $booking->id }}</span>
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
                    <span class="label">Address:</span>
                    <span class="value">{{ $booking->street_address }}@if($booking->postcode), {{ strtoupper($booking->postcode) }}@endif</span>
                </div>
                @endif
                
                <div class="detail-row">
                    <span class="label">Date:</span>
                    <span class="value">{{ \Carbon\Carbon::parse($booking->preferred_date)->format('l, F j, Y') }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="label">Time:</span>
                    <span class="value">{{ $booking->preferred_time }}</span>
                </div>
                
                @if($booking->service && ($booking->service->price_min || $booking->service->price_max))
                <div class="detail-row">
                    <span class="label">Service Price Range:</span>
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
                
                @if($booking->estimated_price)
                <div class="detail-row" style="background: #e3f2fd; padding: 10px; border-radius: 5px; margin-top: 10px;">
                    <span class="label">📊 Estimated Cost:</span>
                    <span class="value" style="color: #1565c0; font-weight: bold; font-size: 16px;">£{{ number_format($booking->estimated_price, 2) }}</span>
                </div>
                @endif
                
                @if($booking->deposit_amount)
                <div class="detail-row">
                    <span class="label">Deposit Paid:</span>
                    <span class="value">£{{ number_format($booking->deposit_amount, 2) }}</span>
                </div>
                @endif
                
                @if($booking->service_cost)
                <div class="detail-row" style="background: #fff3cd; padding: 10px; border-radius: 5px; margin-top: 10px;">
                    <span class="label">💰 Final Cost:</span>
                    <span class="value" style="color: #856404; font-weight: bold; font-size: 18px;">£{{ number_format($booking->service_cost, 2) }}</span>
                </div>
                <div class="detail-row" style="background: #e8f5e9; padding: 10px; border-radius: 5px; margin-top: 5px;">
                    <span class="label">💵 Balance Due:</span>
                    <span class="value" style="color: #2e7d32; font-weight: bold;">£{{ number_format($booking->service_cost - $booking->deposit_amount, 2) }}</span>
                </div>
                @endif
                
                @if($booking->admin_notes)
                <div class="detail-row">
                    <span class="label">Notes:</span>
                    <span class="value">{{ $booking->admin_notes }}</span>
                </div>
                @endif
            </div>
            
            @if($booking->status === 'confirmed')
            <p style="background: #e8f5e9; padding: 15px; border-radius: 5px; border-left: 4px solid #28a745;">
                <strong>📅 Important Reminder:</strong><br>
                Please arrive on time for your appointment. If you need to reschedule or cancel, please contact us at least 24 hours in advance.
            </p>
            @endif
            
            <p style="text-align: center;">
                <a href="tel:07724500349" class="button">📞 Call Us: 07724 500 349</a>
            </p>
            
            <p style="color: #777; font-size: 14px; text-align: center;">
                If you have any questions about your booking, please don't hesitate to contact us.
            </p>
        </div>
        
        <div class="footer">
            <p><strong>Ashlocs</strong></p>
            <p>📧 bookings@ashlocs.co.uk | 📞 07724 500 349</p>
            <p>&copy; {{ date('Y') }} Ashlocs. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>
