<main class="main d-flex justify-content-center align-items-center" style="height: 150vh; background-color:rgb(238, 238, 238);">
      <div class="wrapper p-4 rounded shadow bg-white" style="width: 500px; overflow-y: auto;">
        <h1 class="text-center mb-2">Sign Up</h1>
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
            <label class="form-label d-block">Gender</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sex" id="male" value="male" required style="outline: 2px solid #e58f3c; outline-offset: 2px;">
              <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sex" id="female" value="female" required style="outline: 2px solid #e58f3c; outline-offset: 2px;">
              <label class="form-check-label" for="female">Female</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sex" id="nonbinary" value="nonbinary" required style="outline: 2px solid #e58f3c; outline-offset: 2px;">
              <label class="form-check-label" for="nonbinary">Non-binary</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sex" id="none" value="none" required style="outline: 2px solid #e58f3c; outline-offset: 2px;">
              <label class="form-check-label" for="none">None</label>
            </div>
            </div>

            <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
            <label class="form-check-label" for="terms">
              I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsService">Terms Of Service</a> &
              <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Privacy Policy</a> 
            </label>
            </div>

               <div class="modal fade" id="termsService" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms of Services</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <h5>Terms of Services</h5>
                <ol>
                  <li>
                    <strong>Subscription Service</strong>
                    <ol>
                      <li>Two Heart Confection offers a subscription service for cookies and pastries, allowing customers to receive regular deliveries.</li>
                      <li>Subscription plans and pricing are outlined on the website.</li>
                    </ol>
                  </li>
                  <li>
                    <strong>Payment and Billing</strong>
                    <ol>
                      <li>Customers must provide valid payment information.</li>
                      <li>Payments will be processed automatically on a recurring basis.</li>
                    </ol>
                  </li>
                  <li>
                    <strong>Delivery and Shipping</strong>
                    <ol>
                      <li>Two Heart Confection will use reasonable efforts to deliver products on time.</li>
                      <li>Delivery schedules may vary depending on the set date and time.</li>
                    </ol>
                  </li>
                  <li>
                    <strong>Product Quality and Safety</strong>
                    <ol>
                      <li>Two Heart Confection ensures products are made with high-quality ingredients.</li>
                      <li>Customers with food allergies or sensitivities should inform us.</li>
                    </ol>
                  </li>
                  <li>
                    <strong>Intellectual Property</strong>
                    <ol>
                      <li>Two Heart Confection retains ownership of intellectual property.</li>
                    </ol>
                  </li>
                  <li>
                    <strong>Governing Law</strong>
                    <p>These terms and conditions are governed by the Republic of The Philippines.</p>
                  </li>
                </ol>
                <p><strong>User Agreement</strong><br>
                By subscribing to our service, customers agree to these terms and conditions.
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
              </div>
            </div>
            </div>
            <!-- Terms and Conditions Modal -->
            <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- Replace this with your actual terms and conditions -->
                <h5>Data Privacy Policy</h5>
                <p>
                At Two Heart Confection, we value your privacy and protect your personal data. Here's how we handle your information:
                </p>

                <strong>Data Collection</strong>
                <ul>
                  <li>Contact information (name, email, age, gender, phone number)</li>
                  <li>Delivery address</li>
                  <li>Payment information (gcash details)</li>
                  <li>Order history</li>
                </ul>

                <strong>Data Use</strong>
                <ul>
                  <li>Manage your subscription</li>
                  <li>Process payments</li>
                  <li>Deliver products</li>
                  <li>Improve our services</li>
                  <li>Send promotional offers</li>
                </ul>

                <strong>Data Protection</strong>
                <ul>
                  <li>Encryption</li>
                  <li>Secure servers</li>
                  <li>Access controls</li>
                </ul>

                <strong>Data Sharing</strong>
                <p>
                We don't sell or share your data with third parties, except:
                </p>
                <ul>
                  <li>With payment processors for payment processing</li>
                  <li>With delivery partners for product delivery</li>
                  <li>As required by law</li>
                </ul>

                <strong>Your Rights</strong>
                <ul>
                  <li>Access your data</li>
                  <li>Correct or update your data</li>
                  <li>Request data deletion</li>
                  <li>Opt-out of promotional emails</li>
                </ul>

                <strong>Cookies</strong>
                <ul>
                  <li>Track order history</li>
                  <li>Personalize your experience</li>
                  <li>Improve our website</li>
                </ul>

                <strong>Updates</strong>
                <p>
                We may update this policy. Changes will be posted on our website.
                </p>

                <strong>Contact Us</strong>
                <p>
                If you have questions or concerns about your data, contact us at <a href="mailto:agmacatanong@gmail.com">agmacatanong@gmail.com</a>.
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
              </div>
            </div>
            </div>

          <button type="submit" name="submit" class="btn w-100 text-white" style="background-color: #e58f3c; transition: 0.3s;">Register</button>
          <div class="text-center mt-3">
             <a href="?action=login" class="text-decoration-none">Already Have an Account ?</a>
          </div>
        </form>
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