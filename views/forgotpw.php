<?php

  $token = bin2hex(random_bytes(32));
  $expirydate = date('Y-m-d H:i:s', strtotime('+1 hour'));

  $subject = 'Password Reset Request';
  $mailbody = '<html>
                  <head>
                      <style>
                          body {
                              font-family: Arial, sans-serif;
                              background-color: #f9f9f9;
                              color: #333;
                              line-height: 1.6;
                          }
                          .email-container {
                              max-width: 600px;
                              margin: 0 auto;
                              background: #ffffff;
                              border: 1px solid #ddd;
                              border-radius: 8px;
                              padding: 20px;
                              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                          }
                          .email-header {
                              text-align: center;
                              background-color: #f7c5d4;
                              padding: 10px;
                              border-radius: 8px 8px 0 0;
                          }
                          .email-header h1 {
                              margin: 0;
                              font-size: 24px;
                              color: #ffffff;
                          }
                          .email-body {
                              padding: 20px;
                              text-align: center;
                          }
                          .email-body p {
                              margin: 10px 0;
                          }
                          .email-body a {
                              display: inline-block;
                              margin-top: 20px;
                              padding: 10px 20px;
                              background-color: #f7c5d4;
                              color: #ffffff;
                              text-decoration: none;
                              border-radius: 5px;
                              font-weight: bold;
                          }
                          .email-body a:hover {
                              background-color: #e6b3c3;
                          }
                          .email-footer {
                              text-align: center;
                              margin-top: 20px;
                              font-size: 12px;
                              color: #888;
                          }
                      </style>
                  </head>
                  <body>
                      <div class="email-container">
                          <div class="email-header">
                              <h1>Password Reset Request</h1>
                          </div>
                          <div class="email-body">
                              <p>Hello,</p>
                              <p>We received a request to reset your password. If you made this request, please click the button below to reset your password:</p>
                              <a href="http://localhost/TwoHeartsConfections/views/resetpw.php?token='.urldecode($token).'">Reset Password</a>
                              <p>If you did not request a password reset, please ignore this email or contact support if you have concerns.</p>
                          </div>
                          <div class="email-footer">
                              <p>&copy; ' . date('Y') . ' Two Hearts Confections. All rights reserved.</p>
                          </div>
                      </div>
                  </body>
              </html>';








  if(isset($_POST['submit'])){

    if(isset($_POST['email'])){
      $email = $_POST['email'];
      
      
      if($_SERVER['REQUEST_METHOD']==='POST'){
        $forgotPw = new ForgotPwController();
        $forgotPw->forgotPwRequest($email, $mailbody, $subject, $token, $expirydate);
      }
      }
  
  
   }


?>
<form method="POST" action="">
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Two Hearts Confections</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

</head>

<body class="starter-page-page">

  <main class="main d-flex justify-content-center align-items-center" style="height: 100vh; background-color:rgb(238, 238, 238);">
    
<div class="wrapper p-4 rounded shadow bg-white" style="width: 500px;">
      <h1 class="text-center mb-2">Forgot Password ?</h1>
    
      <form method="POST">

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input name="email" type="email" id="email" class="form-control" placeholder="Enter your email" required>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
        <button name="submit" type="submit" class="btn w-100 text-white" style="background-color: #e58f3c; transition: 0.3s;">Submit</button>
        <div class="text-center mt-3">
        </div>

      </form>

      
    </div>

    <div class="text-center mt-3">
    <p><a href="../public/index.php?action=login" class="text-decoration-none">Go back</a></p>
    </div>
    
    </div>
    
  </main>

</body>

</html>