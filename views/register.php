<?php

 if(isset($_POST['submit'])){

  if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm-password'])&& isset($_POST['sex'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $sex = $_POST['sex'];



    if($_SERVER['REQUEST_METHOD']==='POST'){
      $register = new RegisterController();
  
      $register->addCustomer($fname, $lname, $email, $password, $confirm_password, $sex);
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

    <main class="main d-flex justify-content-center align-items-center" style="height: 150vh; background-color:rgb(238, 238, 238);">
      <div class="wrapper p-4 rounded shadow bg-white" style="width: 500px; overflow-y: auto;">
        <h1 class="text-center mb-2">Sign Up</h1>
        <form method="POST">
            <div class="mb-3">
            <label for="name" class="form-label">First Name</label>
            <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter your first name" required>

            <label for="name" class="form-label">Last Name</label>
            <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter your last name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
          </div>
          <div class="mb-3">
            <label for="confirm-password" class="form-label">Confirm Password</label>
            <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Confirm your password" required>
          </div>

            <div class="mb-3">
            <label class="form-label d-block">Sex</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sex" id="male" value="male" required style="outline: 2px solid #e58f3c; outline-offset: 2px;">
              <label class="form-check-label" for="male">Male</label>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sex" id="female" value="female" required style="outline: 2px solid #e58f3c; outline-offset: 2px;">
              <label class="form-check-label" for="female">Female</label>
            </div>
            </div>

          <button type="submit" name="submit" class="btn w-100 text-white" style="background-color: #e58f3c; transition: 0.3s;">Register</button>
          <div class="text-center mt-3">
             <a href="../public/index.php?action=login" class="text-decoration-none">Already Have an Account ?</a>
          </div>
        </form>
      </div>
    </main>

    

</body>



</html>