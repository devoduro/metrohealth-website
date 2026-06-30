<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
        }
        .header {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .content {
            padding: 30px;
        }
        .appointment-details {
            background: #f8f9fa;
            border-left: 4px solid #3b82f6;
            padding: 20px;
            margin: 20px 0;
        }
        .detail-row {
            margin: 10px 0;
        }
        .detail-label {
            font-weight: bold;
            color: #1e3a8a;
        }
        .footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1 style="margin: 0;">Appointment Confirmed</h1>
            <p style="margin: 10px 0 0 0;">Metro Health Hospital</p>
        </div>
        
        <div class="content">
            <p>Dear {{ $appointment->full_name }},</p>
            
            <p>Thank you for booking an appointment with Metro Health Hospital. Your appointment has been successfully scheduled.</p>
            
            <div class="appointment-details">
                <h3 style="margin-top: 0; color: #1e3a8a;">Appointment Details</h3>
                
                <div class="detail-row">
                    <span class="detail-label">Service:</span> {{ $appointment->service_name }}
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Day:</span> {{ $appointment->appointment_day }}
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Time:</span> {{ $appointment->appointment_time }}
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Service Fee:</span> GH₵ {{ number_format($appointment->service_fee, 2) }}
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Booking Reference:</span> #{{ str_pad($appointment->id, 6, '0', STR_PAD_LEFT) }}
                </div>
            </div>
            
            <h4>Your Contact Information</h4>
            <div class="detail-row">
                <span class="detail-label">Phone:</span> {{ $appointment->phone }}
            </div>
            <div class="detail-row">
                <span class="detail-label">Email:</span> {{ $appointment->email }}
            </div>
            <div class="detail-row">
                <span class="detail-label">Address:</span> {{ $appointment->address }}
            </div>
            
            @if($appointment->notes)
            <div style="margin-top: 20px;">
                <span class="detail-label">Additional Notes:</span>
                <p style="margin: 5px 0;">{{ $appointment->notes }}</p>
            </div>
            @endif
            
            <div style="margin-top: 30px; padding: 20px; background: #e8f4f8; border-radius: 10px;">
                <p style="margin: 0;"><strong>Important:</strong> Please arrive 15 minutes before your scheduled time. Bring a valid ID and any relevant medical records.</p>
            </div>
            
            <p style="margin-top: 30px;">If you need to reschedule or cancel your appointment, please contact us at:</p>
            <p>
                <strong>Phone:</strong> +233 24 185 0091<br>
                <strong>Email:</strong> info@metrohealth.com
            </p>
        </div>
        
        <div class="footer">
            <p><strong>Metro Health Hospital</strong></p>
            <p>4 Barekese Road, Abrepo Junction, Kumasi</p>
            <p>Phone: +233 24 185 0091 | Email: info@metrohealth.com</p>
        </div>
    </div>
</body>
</html>
