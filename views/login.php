<main class="main d-flex justify-content-center align-items-center" style="height: 100vh; background-color:rgb(238, 238, 238);">
    
<div class="wrapper p-4 rounded shadow bg-white" style="width: 500px;">
      
        <h1 class="text-center mb-2">Sign In ?</h1>
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
          <label for="email" class="form-label">Email</label>
          <input name="email" type="email" id="email" class="form-control" placeholder="Enter your email" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Password</label>
          <input name="password" type="password" id="password" class="form-control" placeholder="Enter your password" required>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
        <button name="submit" type="submit" class="btn w-100 text-white" style="background-color: #e58f3c; transition: 0.3s;">Log In</button>
        </div class="text-center mt-3">


      </form>

        <div class="text-center mt-3">
        <p><a href="?action=register" class="text-decoration-none">Dont Have an Account ?</a></p>
        </div>
       

        <div class="text-center mt-3">
        <p><a href="?action=forgotpw" class="text-decoration-none">Forgot Password ?</a></p>
        </div>
        <div class="text-center mt-3">
    <p><a href="?action=login" class="text-decoration-none">Go back</a></p>
    </div>
      
    </div>


    
    </div>
    
  </main>


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
