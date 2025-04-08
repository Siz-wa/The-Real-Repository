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

 

  <main class="main d-flex justify-content-center align-items-center" style="height: 100vh; background-color: #f8f9fa;">
    <div class="card p-4 shadow" style="max-width: 400px; width: 100%;">
      <div class="text-center mb-3">
        <img src="assets/img/logo cookies.png" alt="Logo" width="60">
        <h2 class="mt-2">Forgot Password</h2>
      </div>
      <p class="text-center">Enter your email to reset your password.</p>
      <form action="" method="post">
        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
      </form>
      <div class="text-center mt-3">
        <a href="Log-In.html" class="text-decoration-none">Back to Login</a>
      </div>
    </div>
  </main>

  <script>
    var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirmPassword");
  
    enableSubmitButton();
  
    function validatePassword() {
      if (password.value !== confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
        return false;
      } else {
        confirm_password.setCustomValidity('');
        return true;
      }
    }
  
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
  
    function enableSubmitButton() {
      document.getElementById('submitButton').disabled = false;
      document.getElementById('loader').style.display = 'none';
    }
  
    function disableSubmitButton() {
      document.getElementById('submitButton').disabled = true;
      document.getElementById('loader').style.display = 'unset';
    }
  
    function validateSignupForm() {
      var form = document.getElementById('signupForm');
  
      for (var i = 0; i < form.elements.length; i++) {
        if (form.elements[i].value === '' && form.elements[i].hasAttribute('required')) {
          console.log('There are some required fields!');
          return false;
        }
      }
  
      if (!validatePassword()) {
        return false;
      }
  
      onSignup();
      return false; 
    }
  
    function onSignup() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        disableSubmitButton();
  
        if (this.readyState == 4 && this.status == 200) {
          enableSubmitButton();
        } else {
          console.log('AJAX call failed!');
          setTimeout(function() {
            enableSubmitButton();
          }, 1000);
        }
      };
  
      xhttp.open("GET", "ajax_info.txt", true);
      xhttp.send();
    }
  </script>

</body>

</html>