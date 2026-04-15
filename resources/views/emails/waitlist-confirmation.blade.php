<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Waitlist Confirmation</title>
</head>
<body style="margin:0; padding:0; background-color:#F3F4F6; font-family:Arial, Helvetica, sans-serif; color:#111827;">
    <div style="max-width:700px; margin:40px auto; background:#ffffff; border:1px solid #E5E7EB; border-radius:18px; overflow:hidden;">
        <div style="background:linear-gradient(135deg, #082F49 0%, #0E7490 100%); padding:34px 36px;">
            <div style="display:inline-block; background:#F59E0B; color:#ffffff; font-size:12px; font-weight:700; letter-spacing:1px; text-transform:uppercase; padding:8px 14px; border-radius:999px;">
                GASCORP App
            </div>
            <h1 style="margin:16px 0 0; font-size:30px; line-height:1.2; color:#ffffff;">
                You are officially on the waitlist
            </h1>
            <p style="margin:12px 0 0; font-size:16px; line-height:1.7; color:rgba(255,255,255,0.92);">
                Thanks for joining the GASCORP App launch cohort. We will keep you updated with rollout milestones.
            </p>
        </div>

        <div style="padding:36px;">
            <p style="margin:0 0 14px; font-size:16px; line-height:1.8; color:#374151;">
                Hello {{ $waitlistSignup->name }},
            </p>
            <p style="margin:0 0 20px; font-size:16px; line-height:1.8; color:#374151;">
                Your early access request has been received successfully. You will be contacted as we move closer to launch.
            </p>

            <div style="background:#F9FAFB; border:1px solid #E5E7EB; border-radius:14px; padding:20px;">
                <p style="margin:0 0 10px; font-size:15px; color:#111827;">
                    <strong style="color:#0E7490;">Email:</strong> {{ $waitlistSignup->email }}
                </p>
                <p style="margin:0 0 10px; font-size:15px; color:#111827;">
                    <strong style="color:#0E7490;">Role:</strong> {{ ucfirst($waitlistSignup->role) }}
                </p>
                <p style="margin:0; font-size:15px; color:#111827;">
                    <strong style="color:#0E7490;">Submitted:</strong> {{ $waitlistSignup->created_at->format('F j, Y \a\t g:i A') }}
                </p>
            </div>

            <div style="margin-top:24px; padding:20px; border:1px solid #E5E7EB; border-radius:14px; background:linear-gradient(135deg, rgba(8,47,73,0.04) 0%, rgba(14,116,144,0.05) 100%);">
                <p style="margin:0 0 10px; font-size:15px; line-height:1.7; color:#374151;">
                    <strong>What happens next:</strong>
                </p>
                <p style="margin:0; font-size:15px; line-height:1.8; color:#374151;">
                    We will send product updates, onboarding details, and launch timelines to this email address.
                </p>
            </div>

            <p style="margin:24px 0 0; font-size:15px; line-height:1.8; color:#374151;">
                Regards,<br>
                <strong style="color:#0B3A57;">GASCORP Team</strong>
            </p>
        </div>
    </div>
</body>
</html>
