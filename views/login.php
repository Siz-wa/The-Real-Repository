<?php

 if(isset($_POST['submit'])){

  if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    if($_SERVER['REQUEST_METHOD']==='POST'){
      $login = new LoginController();
      $login->loginUser( $email, $password);
    }
    }
 }
?>

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
    
<div class="wrapper p-4 rounded shadow bg-white" style="width: 400px;">
      <h1 class="text-center mb-4">Sign In</h1>
    
      <form method="POST">

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input name="email" type="email" id="email" class="form-control" placeholder="Enter your email" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input name="password" type="password" id="password" class="form-control" placeholder="Enter your password" required>
        </div>

        <div class="form-check">
        <input class="form-check-input" type="radio" name="rememberMe" id="rememberMe" value="rememberMe" required style="outline: 2px solid #e58f3c; outline-offset: 2px;">
          <label class="form-check-label" for="rememberMe">Remember Me</label>
        </div>

        <div class="mb-3">
        <button type="submit" name="submit" class="btn w-100 text-white" style="background-color: #e58f3c; transition: 0.3s;">Login</button>
        <div class="text-center mt-3">
        </div>

        

      </form>

      
    </div>

    <div class="text-center mt-3">
    <p><a href="../public/index.php?action=forgotpw" class="text-decoration-none">Forgot password?</a></p>
    <p>Dont have an Account? <a href="../public/index.php?action=register" class="text-decoration-none">Sign Up Here!</a></p>
    </div>
    
    </div>
    
  </main>

</body>

</html>