<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Contact Submission</title>
</head>
<body style="margin:0; padding:0; background-color:#F9FAFB; font-family:Arial, Helvetica, sans-serif; color:#111827;">
    <div style="max-width:700px; margin:40px auto; background:#ffffff; border-radius:20px; overflow:hidden; border:1px solid #e5e7eb;">
        
        <div style="background:linear-gradient(135deg, #1E3A8A 0%, #0D9488 100%); padding:32px 40px;">
            <div style="display:inline-block; background:#F59E0B; color:#ffffff; font-size:12px; font-weight:bold; letter-spacing:1px; text-transform:uppercase; padding:8px 14px; border-radius:999px;">
                New Contact Submission
            </div>
            <h1 style="margin:18px 0 0; font-size:32px; line-height:1.2; color:#ffffff;">
                GASCORP Contact Form Alert
            </h1>
            <p style="margin:12px 0 0; font-size:16px; line-height:1.7; color:rgba(255,255,255,0.9);">
                A new enquiry has been submitted through the website contact form.
            </p>
        </div>

        <div style="padding:40px;">
            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                <tr>
                    <td style="padding:14px 0; border-bottom:1px solid #e5e7eb; width:160px; font-weight:bold; color:#1E3A8A;">Full Name</td>
                    <td style="padding:14px 0; border-bottom:1px solid #e5e7eb;">{{ $contactMessage->name }}</td>
                </tr>
                <tr>
                    <td style="padding:14px 0; border-bottom:1px solid #e5e7eb; font-weight:bold; color:#1E3A8A;">Email Address</td>
                    <td style="padding:14px 0; border-bottom:1px solid #e5e7eb;">{{ $contactMessage->email }}</td>
                </tr>
                <tr>
                    <td style="padding:14px 0; border-bottom:1px solid #e5e7eb; font-weight:bold; color:#1E3A8A;">Phone Number</td>
                    <td style="padding:14px 0; border-bottom:1px solid #e5e7eb;">{{ $contactMessage->phone }}</td>
                </tr>
                <tr>
                    <td style="padding:14px 0; border-bottom:1px solid #e5e7eb; font-weight:bold; color:#1E3A8A;">Subject</td>
                    <td style="padding:14px 0; border-bottom:1px solid #e5e7eb;">{{ $contactMessage->subject }}</td>
                </tr>
                <tr>
                    <td style="padding:14px 0; vertical-align:top; font-weight:bold; color:#1E3A8A;">Message</td>
                    <td style="padding:14px 0; line-height:1.8;">{{ $contactMessage->message }}</td>
                </tr>
            </table>

            <div style="margin-top:28px; padding:20px; background:#F9FAFB; border:1px solid #e5e7eb; border-radius:14px;">
                <p style="margin:0 0 10px; font-size:14px; color:#374151;">
                    <strong>Submission ID:</strong> #{{ $contactMessage->id }}
                </p>
                <p style="margin:0 0 10px; font-size:14px; color:#374151;">
                    <strong>Submitted At:</strong> {{ $contactMessage->created_at->format('F j, Y \a\t g:i A') }}
                </p>
                <p style="margin:0 0 10px; font-size:14px; color:#374151;">
                    <strong>IP Address:</strong> {{ $contactMessage->ip_address }}
                </p>
                <p style="margin:0; font-size:14px; color:#374151;">
                    <strong>User Agent:</strong> {{ $contactMessage->user_agent }}
                </p>
            </div>
        </div>
    </div>
</body>
</html>