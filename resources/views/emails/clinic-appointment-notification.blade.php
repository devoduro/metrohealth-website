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
            background: linear-gradient(135deg, #84a33f, #6b8230);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .content {
            padding: 30px;
        }
        .appointment-details {
            background: #f8f9fa;
            border-left: 4px solid #84a33f;
            padding: 20px;
            margin: 20px 0;
        }
        .detail-row {
            margin: 10px 0;
        }
        .detail-label {
            font-weight: bold;
            color: #84a33f;
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
            <h1 style="margin: 0;">New Clinic Appointment</h1>
            <p style="margin: 10px 0 0 0;">Metro Health Hospital</p>
        </div>
        
        <div class="content">
            <p><strong>A new clinic appointment has been booked.</strong></p>
            
            <div class="appointment-details">
                <h3 style="margin-top: 0; color: #84a33f;">Appointment Details</h3>
                
                <div class="detail-row">
                    <span class="detail-label">Booking Reference:</span> #{{ str_pad($appointment->id, 6, '0', STR_PAD_LEFT) }}
                </div>
                
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
                    <span class="detail-label">Status:</span> {{ ucfirst($appointment->status) }}
                </div>
            </div>
            
            <h4>Patient Information</h4>
            <div class="detail-row">
                <span class="detail-label">Name:</span> {{ $appointment->full_name }}
            </div>
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
                <p style="margin: 5px 0; padding: 10px; background: #fff3cd; border-radius: 5px;">{{ $appointment->notes }}</p>
            </div>
            @endif
            
            <div style="margin-top: 30px; padding: 20px; background: #d1ecf1; border-radius: 10px;">
                <p style="margin: 0;"><strong>Action Required:</strong> Please confirm this appointment with the patient and update the status in the admin panel.</p>
            </div>
        </div>
        
        <div class="footer">
            <p><strong>Metro Health Hospital - Admin Notification</strong></p>
            <p>Booked on: {{ $appointment->created_at->format('F d, Y \a\t h:i A') }}</p>
        </div>
    </div>
</body>
</html>
