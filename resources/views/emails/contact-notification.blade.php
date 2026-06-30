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
            background: linear-gradient(135deg, #F26522 0%, #FF8C42 100%);
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
        .contact-details {
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
            color: #2C2C2C;
            display: inline-block;
            width: 120px;
        }
        .value {
            color: #555;
        }
        .message-box {
            background: #f9f9f9;
            border: 1px solid #e0e0e0;
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
            white-space: pre-wrap;
            word-wrap: break-word;
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
        .reply-button {
            background: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📧 New Contact Form Submission</h1>
        </div>
        
        <div class="content">
            <p>Hello,</p>
            <p>You have received a new message through the Ashlocs contact form.</p>
            
            <div class="contact-details">
                <h3 style="margin-top: 0; color: #2C2C2C;">Contact Information</h3>
                
                <div class="detail-row">
                    <span class="label">Name:</span>
                    <span class="value">{{ $contact->name }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="label">Email:</span>
                    <span class="value"><a href="mailto:{{ $contact->email }}" style="color: #F26522;">{{ $contact->email }}</a></span>
                </div>
                
                @if($contact->phone)
                <div class="detail-row">
                    <span class="label">Phone:</span>
                    <span class="value"><a href="tel:{{ $contact->phone }}" style="color: #F26522;">{{ $contact->phone }}</a></span>
                </div>
                @endif
                
                <div class="detail-row">
                    <span class="label">Subject:</span>
                    <span class="value"><strong>{{ $contact->subject }}</strong></span>
                </div>
                
                <div class="detail-row">
                    <span class="label">Submitted:</span>
                    <span class="value">{{ $contact->created_at->format('F j, Y \a\t g:i A') }}</span>
                </div>
                
                <div class="detail-row">
                    <span class="label">Message ID:</span>
                    <span class="value">#{{ $contact->id }}</span>
                </div>
            </div>
            
            <h3 style="color: #2C2C2C;">Message:</h3>
            <div class="message-box">{{ $contact->message }}</div>
            
            <p style="text-align: center;">
                <a href="mailto:{{ $contact->email }}?subject=Re: {{ urlencode($contact->subject) }}" class="button reply-button">
                    Reply to {{ $contact->name }}
                </a>
            </p>
            
            <p style="color: #777; font-size: 14px;">
                Please respond to this inquiry as soon as possible to maintain excellent customer service.
            </p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} Ashlocs. All Rights Reserved.</p>
            <p>This is an automated notification from your contact form.</p>
        </div>
    </div>
</body>
</html>
