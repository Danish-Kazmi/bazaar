<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }
        .header, .footer {
            background-color: #0073e6;
            color: #ffffff;
            padding: 10px 20px;
            text-align: center;
        }
        .content {
            margin: 20px 0;
        }
        .content p {
            line-height: 1.6;
        }
        .footer p {
            font-size: 0.8em;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Contact Email</h1>
        </div>
        <div class="content">
            <p>Dear {{$contact_user['name']}},</p>
            <p>
                {{ $contact_user['message'] }}
            </p>
            <p>
                Thank you very much for your time and assistance. I look forward to hearing from you soon.
            </p>
            <p>Best regards,</p>
        </div>
        <div class="footer">
            <p>&copy; 2024. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
