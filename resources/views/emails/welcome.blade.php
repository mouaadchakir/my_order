<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to KESHTILES</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .header {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #4A5568;
        }
        .content p {
            margin-bottom: 15px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #aaa;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            Welcome to KESHTILES!
        </div>
        <div class="content">
            <p>Hello {{ $user->name }},</p>
            <p>Thank you for registering with KESHTILES. We are excited to have you with us.</p>
            <p>Discover our exclusive collection of handmade Moroccan Zellige tiles and bring a unique aesthetic to your home.</p>
            <p>If you have any questions, feel free to contact our support team.</p>
            <p>Best regards,<br>The KESHTILES Team</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} KESHTILES. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
