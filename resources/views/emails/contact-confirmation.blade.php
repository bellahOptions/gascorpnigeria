<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Message Received</title>
</head>
<body style="margin:0; padding:0; background-color:#F9FAFB; font-family:Arial, Helvetica, sans-serif; color:#111827;">
    <div style="max-width:700px; margin:40px auto; background:#ffffff; border-radius:20px; overflow:hidden; border:1px solid #e5e7eb;">
        
        <div style="background:linear-gradient(135deg, #1E3A8A 0%, #0D9488 100%); padding:36px 40px; text-align:left;">
            <div style="display:inline-block; background:#F59E0B; color:#ffffff; font-size:12px; font-weight:bold; letter-spacing:1px; text-transform:uppercase; padding:8px 14px; border-radius:999px;">
                GASCORP Nigeria
            </div>

            <h1 style="margin:18px 0 0; font-size:32px; line-height:1.2; color:#ffffff;">
                We’ve Received Your Message
            </h1>

            <p style="margin:12px 0 0; font-size:16px; line-height:1.8; color:rgba(255,255,255,0.92);">
                Thank you for contacting GASCORP. Our team has received your enquiry and will review it as soon as possible.
            </p>
        </div>

        <div style="padding:40px;">
            <p style="margin:0 0 16px; font-size:16px; line-height:1.8; color:#374151;">
                Dear {{ $contactMessage->name }},
            </p>

            <p style="margin:0 0 16px; font-size:16px; line-height:1.8; color:#374151;">
                Thank you for reaching out to GASCORP. We appreciate your interest in our gas infrastructure, logistics, and clean energy solutions.
            </p>

            <p style="margin:0 0 24px; font-size:16px; line-height:1.8; color:#374151;">
                A member of our team will get back to you shortly. Below is a summary of your submission for your records.
            </p>

            <div style="background:#F9FAFB; border:1px solid #e5e7eb; border-radius:16px; padding:24px;">
                <p style="margin:0 0 12px; font-size:15px; color:#111827;">
                    <strong style="color:#1E3A8A;">Subject:</strong> {{ $contactMessage->subject }}
                </p>
                <p style="margin:0 0 12px; font-size:15px; color:#111827;">
                    <strong style="color:#1E3A8A;">Phone:</strong> {{ $contactMessage->phone }}
                </p>
                <p style="margin:0; font-size:15px; color:#111827; line-height:1.8;">
                    <strong style="color:#1E3A8A;">Message:</strong><br>
                    {{ $contactMessage->message }}
                </p>
            </div>

            <div style="margin-top:28px; padding:24px; background:linear-gradient(135deg, rgba(30,58,138,0.06) 0%, rgba(13,148,136,0.06) 100%); border-radius:16px; border:1px solid #e5e7eb;">
                <h2 style="margin:0 0 12px; font-size:20px; color:#111827;">
                    Contact Information
                </h2>
                <p style="margin:0 0 8px; font-size:15px; color:#374151; line-height:1.7;">
                    <strong>Address:</strong> Ocean Parade Towers, 1st Avenue, Banana Island, Ikoyi, Lagos State
                </p>
                <p style="margin:0; font-size:15px; color:#374151; line-height:1.7;">
                    <strong>Phone:</strong> 07038392520
                </p>
            </div>

            <p style="margin:28px 0 0; font-size:15px; line-height:1.8; color:#374151;">
                Regards,<br>
                <strong style="color:#1E3A8A;">GASCORP Team</strong>
            </p>
        </div>
    </div>
</body>
</html>