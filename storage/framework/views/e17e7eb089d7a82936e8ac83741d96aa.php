<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Status Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .email-header {
            background: linear-gradient(135deg, #84a33f 0%, #6b8a32 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .status-badge {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: bold;
            margin: 20px 0;
            font-size: 16px;
        }
        .status-confirmed {
            background: #28a745;
            color: white;
        }
        .status-pending {
            background: #ffc107;
            color: #000;
        }
        .status-completed {
            background: #17a2b8;
            color: white;
        }
        .status-cancelled {
            background: #dc3545;
            color: white;
        }
        .email-body {
            padding: 30px 20px;
        }
        .info-box {
            background: #f8f9fa;
            border-left: 4px solid #84a33f;
            padding: 15px;
            margin: 20px 0;
        }
        .info-box h3 {
            margin: 0 0 10px 0;
            color: #84a33f;
            font-size: 16px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: bold;
            color: #6b7280;
        }
        .info-value {
            color: #1f2937;
        }
        .email-footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e5e7eb;
            font-size: 12px;
            color: #6b7280;
        }
        .cta-button {
            display: inline-block;
            padding: 12px 30px;
            background: #84a33f;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
            font-weight: bold;
        }
        .alert-box {
            background: #fff3cd;
            border: 1px solid #ffc107;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>🏥 Metro Health Hospital</h1>
            <p style="margin: 5px 0 0 0; font-size: 14px; opacity: 0.9;">Appointment Status Update</p>
        </div>
        
        <div class="email-body">
            <h2 style="color: #1f2937; margin-top: 0;">Dear <?php echo e($patientName); ?>,</h2>
            
            <p>Your appointment status has been updated.</p>

            <div style="text-align: center;">
                <div class="status-badge status-<?php echo e(strtolower($newStatus)); ?>">
                    <?php echo e($statusMessage); ?>

                </div>
            </div>

            <?php if($oldStatus != $newStatus): ?>
            <p style="text-align: center; color: #6b7280;">
                Status changed from <strong><?php echo e($oldStatus); ?></strong> to <strong><?php echo e($newStatus); ?></strong>
            </p>
            <?php endif; ?>

            <div class="info-box">
                <h3>📋 Appointment Details</h3>
                <div class="info-row">
                    <span class="info-label">Service:</span>
                    <span class="info-value"><?php echo e($serviceName); ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Appointment Day:</span>
                    <span class="info-value"><?php echo e($appointmentDay); ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Appointment Time:</span>
                    <span class="info-value"><?php echo e($appointmentTime); ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Service Fee:</span>
                    <span class="info-value">GH¢ <?php echo e(number_format($serviceFee, 2)); ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Current Status:</span>
                    <span class="info-value"><strong><?php echo e($newStatus); ?></strong></span>
                </div>
            </div>

            <?php if($newStatus == 'Confirmed'): ?>
            <div class="alert-box">
                <strong>✅ Your appointment is confirmed!</strong><br>
                Please arrive 10 minutes before your scheduled time. Bring a valid ID and any relevant medical records.
            </div>
            <?php elseif($newStatus == 'Cancelled'): ?>
            <div class="alert-box" style="background: #f8d7da; border-color: #dc3545;">
                <strong>❌ Your appointment has been cancelled.</strong><br>
                If you need to reschedule, please contact us or book a new appointment through our website.
            </div>
            <?php elseif($newStatus == 'Completed'): ?>
            <p style="background: #d1ecf1; border: 1px solid #17a2b8; padding: 15px; border-radius: 5px;">
                <strong>✓ Thank you for visiting Metro Health Hospital!</strong><br>
                We hope you had a positive experience. If you have any follow-up questions, please don't hesitate to contact us.
            </p>
            <?php endif; ?>

            <div style="text-align: center; margin: 30px 0;">
                <p style="color: #6b7280; margin-bottom: 10px;">Need to make changes?</p>
                <a href="http://127.0.0.1:8000/contact" class="cta-button">Contact Us</a>
            </div>

            <p style="color: #6b7280; font-size: 14px;">
                If you have any questions about your appointment, please contact us at:<br>
                📞 Phone: +233 XX XXX XXXX<br>
                ✉️ Email: info@metrohealth.com
            </p>
        </div>
        
        <div class="email-footer">
            <p style="margin: 0 0 10px 0;"><strong>Metro Health Hospital</strong></p>
            <p style="margin: 0 0 5px 0;">📍 Accra, Ghana</p>
            <p style="margin: 0 0 5px 0;">Quality Healthcare Services</p>
            <p style="margin: 15px 0 0 0; font-size: 11px;">
                You received this email because your appointment status was updated at Metro Health Hospital.
            </p>
        </div>
    </div>
</body>
</html>
<?php /**PATH /home4/ptawiah/new.metrohealthgh.com/resources/views/emails/appointment-status-update.blade.php ENDPATH**/ ?>