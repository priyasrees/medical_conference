<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Abstract Submission Status</title>
  <style>
    /* Basic, widely-supported inline-safe styles */
    body { margin:0; padding:0; font-family: Arial, Helvetica, sans-serif; background:#f4f6f8; color:#333; }
    .email-wrap { max-width:600px; margin:30px auto; background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 6px rgba(0,0,0,0.08); }
    .header { padding:20px; text-align:center; background:#ffffff; }
    .logo { max-height:60px; }
    .content { padding:28px; line-height:1.6; }
    .greeting { margin-bottom:12px; font-size:16px; }
    .lead { color:#555; }
    .footer { padding:18px 28px; font-size:13px; color:#777; background:#fbfbfb; border-top:1px solid #eee; }
    .signature { margin-top:18px; }
    .muted { color:#888; font-size:13px; }
    @media (max-width:480px){ .content{padding:18px} }
  </style>
</head>
<body>
  <div class="email-wrap" role="article" aria-label="Abstract Submission Status">
    <div class="header">
      @if(!empty($logoUrl))
        <img src="{{ $logoUrl }}" alt="Logo" class="logo">
      @endif
    </div>

    <div class="content">
      <p class="greeting">Dear <strong>{{ $name ?? 'Applicant' }}</strong>,</p>

      <p class="lead">
        Thank you for submitting your abstract.
      </p>

      <p>
        After reviewing your details, we found that you are not listed as a registered member. As per our guidelines, <b>only registered members are eligible to submit abstracts.</b></strong>.
      </p>

      <p>
        Since your submission was made without an active registration, we are unable to proceed with your abstract, and the information provided has been removed from our system.
      </p>

      <p class="signature">
        Thank you for your understanding.
        <br><br>
        Warm regards,<br>
        <strong>{{ $sender_name }}</strong><br>
      </p>
    </div>

    <div class="footer">
      <div>If you have any questions, please contact us at <span class="muted">{{ $contactEmail }}</span>.</div>
    </div>
  </div>
</body>
</html>
