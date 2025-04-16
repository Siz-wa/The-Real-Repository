<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
   
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'gordora.joey25@gmail.com';   
    $mail->Password = 'cfcg ogco dyix hvmf';           
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

   
    $mail->setFrom('TwoHeartsConfection@gmail.com', 'Two Hearts Confection');
    $mail->addAddress('agmacatanong@kld.edu.ph');  

    $mail->isHTML(true);
    $mail->Subject = 'PHPMailer Test';
    $mail->Body = '
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f9;
                margin: 0;
                padding: 0;
            }
            .email-container {
                max-width: 600px;
                margin: 20px auto;
                background: #ffffff;
                border: 1px solid #ddd;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            .email-header {
                background-color: #4CAF50;
                color: white;
                padding: 20px;
                text-align: center;
                font-size: 24px;
            }
            .email-body {
                padding: 20px;
                color: #333;
                line-height: 1.6;
            }
            .email-body p {
                margin: 10px 0;
            }
            .reset-button {
                display: inline-block;
                margin: 20px 0;
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                text-decoration: none;
                font-size: 16px;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            .reset-button:hover {
                background-color: #45a049;
            }
            .email-footer {
                background-color: #f4f4f9;
                text-align: center;
                padding: 10px;
                font-size: 12px;
                color: #777;
            }
        </style>
    </head>
    <body>
        <div class="email-container">
            <div class="email-header">
                Reset Your Password
            </div>
            <div class="email-body">
                <p>Hello,</p>
                <p>We received a request to reset your password. Click the button below to reset it:</p>
                <p style="text-align: center;">
                    <a href="http://localhost/your-project-folder/reset_password.php?token=<?php echo $token; ?>" class="reset-button">Reset Password</a>
                </p>
                <p>If you did not request a password reset, please ignore this email or contact support if you have questions.</p>
                <p>Thank you,<br>Two Hearts Confection Team</p>
            </div>
            <div class="email-footer">
                &copy; 2023 Two Hearts Confection. All rights reserved.
            </div>
        </div>
    </body>
    </html>';

    $mail->send();
    echo "✅ Email has been sent!";
} catch (Exception $e) {
    echo "❌ Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}