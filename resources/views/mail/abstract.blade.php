<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Abstract Submission Confirmation</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .email-container {
      max-width: 600px;
      margin: auto;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 6px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .header {
      text-align: center;
      background-color: #007bff;
      color: #ffffff;
      padding: 15px;
      border-radius: 6px 6px 0 0;
    }
    .content {
      padding: 20px;
      color: #333333;
    }
    .content p {
      line-height: 1.6;
    }
    .label {
      font-weight: bold;
    }
    .footer {
      margin-top: 20px;
      text-align: center;
      font-size: 13px;
      color: #888888;
    }
    @media screen and (max-width: 600px) {
      .email-container {
        padding: 15px;
      }
      .content {
        padding: 15px;
      }
    }
  </style>
</head>
<body>
  <div class="email-container">
    <div class="header">
      <h2>RHINOCON 2025</h2>
    </div>
    <div class="content">
      <p>Hi {{$name}} - <strong>{{$reg_id}}</strong>,</p>

      <p>We have received your abstract successfully.</p>
     
     <table style="width: 100%; border-collapse: collapse;">
      <thead>
        <tr>
          <th align="left" style="padding: 8px; border-bottom: 1px solid #ccc;">Abstract Category</th>
          <th align="left" style="padding: 8px; border-bottom: 1px solid #ccc;">Abstract Title</th>
        </tr>
      </thead>
      <tbody>
        @foreach($abstracts_arr as $_abs)
          <tr>
            <td style="padding: 8px; vertical-align: top;">{{ $_abs['category'] }}</td>
            <td style="padding: 8px; vertical-align: top;">{{ $_abs['title'] }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

      <p>
        Thank you for your submission.<br>
        Our team will review it and get back to you if any further information is needed.
      </p>

      <p>Thank you for your interest and contribution.</p>

      <p>Regards,<br>
      Organizing Committee<br>
      RHINOCON2025</p>
    </div>
    <div class="footer">
      &copy; 2025 RHINOCON. All rights reserved.
    </div>
  </div>
</body>
</html>
