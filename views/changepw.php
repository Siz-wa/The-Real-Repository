
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
        <h1 class="text-center mb-2">Change Password</h1>
       
        <!-- RENDERS THE ERRORS THAT CAME FROM CHANGEPW CONTROLLER -->
            
            <?php if (isset($errors) && is_array($errors)): ?>
              <?php foreach ($errors as $error): ?>
                <div class="alert alert-danger" role="alert">
                  <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
            
            <?php if (isset($messages) && is_array($messages)): ?>
              <?php foreach ($messages as $message): ?>
                <div class="alert alert-success" role="success">
                  <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>

        <form method="POST" action="">
              <div class="mb-3">
              <label for="password" class="form-label">New Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Enter your new password" required>
              </div>
              <div class="mb-3">
              <label for="confirm-password" class="form-label">Confirm New Password</label>
              <input type="password" name="confirmPassword" id="confirm-password" class="form-control" placeholder="Confirm your new password" required>
              </div>
              <button type="submit" name="submit" class="btn w-100 text-white" style="background-color: #e58f3c; transition: 0.3s;">Change Password</button>
              
        </form>
      </div>
    </main>

    <!-- This is responsible for making the error messages fade -->
      <script>
      document.addEventListener("DOMContentLoaded", function() {
      const alerts = document.querySelectorAll(".alert.alert-danger");
        alerts.forEach(alert => {
          setTimeout(() => {
            let opacity = 1;
            const fade = setInterval(() => {
              if (opacity <= 0) {
                clearInterval(fade);
                alert.remove();
              } else {
                opacity -= 0.1;
                alert.style.opacity = opacity;
              }
            }, 50);
          }, 5000);
        });
      });
      </script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
        const alerts = document.querySelectorAll(".alert.alert-success");
        alerts.forEach(success => {
          setTimeout(() => {
            let opacity = 1;
            const fade = setInterval(() => {
              if (opacity <= 0) {
                clearInterval(fade);
                alert.remove();
              } else {
                opacity -= 0.1;
                alert.style.opacity = opacity;
              }
            }, 50);
          }, 5000);
        });
      });
  </script>


    
</body>

</html>