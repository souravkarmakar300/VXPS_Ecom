<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Inquiry - VXPS Australia</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: #1e293b;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }
        .header {
            background: #0f172a;
            padding: 28px 32px;
            text-align: center;
        }
        .header h1 {
            color: #ffffff;
            font-size: 24px;
            font-weight: 800;
            margin: 0;
            letter-spacing: 0.05em;
        }
        .header h1 span {
            color: #22c55e;
        }
        .content {
            padding: 32px;
        }
        .greeting {
            font-size: 18px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 12px;
        }
        .badge {
            display: inline-block;
            background: #ecfdf5;
            color: #15803d;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 9999px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 20px;
            border: 1px solid #bbf7d0;
        }
        .info-card {
            background: #f8fafc;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid #e2e8f0;
            margin: 20px 0;
        }
        .info-row {
            display: flex;
            padding: 8px 0;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: 600;
            color: #64748b;
            width: 110px;
            flex-shrink: 0;
        }
        .info-value {
            color: #0f172a;
            font-weight: 500;
        }
        .message-box {
            background: #f1f5f9;
            border-left: 4px solid #22c55e;
            padding: 16px 20px;
            border-radius: 0 8px 8px 0;
            margin: 20px 0;
            font-size: 14px;
            color: #334155;
            white-space: pre-wrap;
        }
        .footer {
            background: #f8fafc;
            padding: 24px 32px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            font-size: 12px;
            color: #94a3b8;
        }
        .footer a {
            color: #16a34a;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>VXPS<span>.</span> Australia</h1>
        </div>
        <div class="content">
            @if($isCustomerReceipt)
                <div class="greeting">Hi {{ $contact->name }},</div>
                <span class="badge">Inquiry Received</span>
                <p>Thank you for reaching out to VX Power Semiconductor. We have received your inquiry and our Adelaide-based customer support team will review your message and reply as soon as possible.</p>
                <div class="info-card">
                    <div class="info-row">
                        <span class="info-label">Subject:</span>
                        <span class="info-value">{{ $contact->subject ?: 'General Inquiry' }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Submitted on:</span>
                        <span class="info-value">{{ $contact->created_at ? $contact->created_at->format('d M Y, h:i A') : date('d M Y, h:i A') }} (ACST)</span>
                    </div>
                </div>
                <p style="font-size: 13px; color: #64748b; margin-top: 8px;">A copy of your message is attached below for your reference:</p>
                <div class="message-box">{{ $contact->message }}</div>
            @else
                <div class="greeting">New Contact Inquiry Received</div>
                <span class="badge">Customer Support Lead</span>
                <p>A new customer inquiry has been submitted through the VXPS website.</p>
                <div class="info-card">
                    <div class="info-row">
                        <span class="info-label">Name:</span>
                        <span class="info-value"><strong>{{ $contact->name }}</strong></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Email:</span>
                        <span class="info-value"><a href="mailto:{{ $contact->email }}" style="color: #16a34a;">{{ $contact->email }}</a></span>
                    </div>
                    @if($contact->phone)
                        <div class="info-row">
                            <span class="info-label">Phone:</span>
                            <span class="info-value"><a href="tel:{{ $contact->phone }}" style="color: #16a34a;">{{ $contact->phone }}</a></span>
                        </div>
                    @endif
                    <div class="info-row">
                        <span class="info-label">Subject:</span>
                        <span class="info-value">{{ $contact->subject ?: 'General Inquiry' }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Submitted:</span>
                        <span class="info-value">{{ $contact->created_at ? $contact->created_at->format('d M Y, h:i A') : date('d M Y, h:i A') }}</span>
                    </div>
                </div>
                <p style="font-weight: 600; color: #0f172a; margin-bottom: 6px;">Customer Message:</p>
                <div class="message-box">{{ $contact->message }}</div>
            @endif
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} VX Power Semiconductor. Adelaide Distribution & Support.</p>
            <p>AS/NZS Certified Electronic Hardware &bull; <a href="{{ config('app.url', 'https://vxps.com.au') }}">vxps.com.au</a></p>
        </div>
    </div>
</body>
</html>

