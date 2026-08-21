<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $emailSubject }}</title>
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
        .email-body {
            padding: 30px 20px;
        }
        .email-body p {
            margin: 0 0 15px 0;
        }
        .email-footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e5e7eb;
            font-size: 12px;
            color: #6b7280;
        }
        .greeting {
            font-size: 18px;
            font-weight: bold;
            color: #84a33f;
            margin-bottom: 20px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Metro Health Hospital</h1>
            <p style="margin: 5px 0 0 0; font-size: 14px; opacity: 0.9;">Quality Healthcare Services in Ghana</p>
        </div>
        
        <div class="email-body">
            <p class="greeting">Dear {{ $recipientName }},</p>
            
            <div style="white-space: pre-line;">{{ $emailMessage }}</div>
        </div>
        
        <div class="email-footer">
            <p style="margin: 0 0 10px 0;"><strong>Metro Health Hospital</strong></p>
            <p style="margin: 0 0 5px 0;">📍 Accra, Ghana</p>
            <p style="margin: 0 0 5px 0;">📞 Contact: +233 XX XXX XXXX</p>
            <p style="margin: 0 0 5px 0;">✉️ Email: admin@metrohealthgh.com</p>
            <p style="margin: 15px 0 0 0; font-size: 11px;">
                You received this email because you are a registered patient at Metro Health Hospital.
            </p>
        </div>
    </div>
</body>
</html>
