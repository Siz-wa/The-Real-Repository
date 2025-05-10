<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
  <style>
    body {
  background-color: #f3f4f6;
  font-family: sans-serif;
  margin: 0;
}

.containerr {
  padding: 24px;
  max-width: 1200px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr;
  gap: 24px;
}
    @media (min-width: 768px) {
      .containerr {
        grid-template-columns: 2fr 1fr;
      }
    }
    .box {
      background-color: #fff;
      padding: 24px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    h2 {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 16px;
    }
    h3 {
      color: #4b5563;
      font-weight: bold;
      margin-bottom: 8px;
    }
    .option {
      display: flex;
      align-items: center;
      border: 1px solid #ddd;
      padding: 16px;
      border-radius: 8px;
      cursor: pointer;
      margin-bottom: 12px;
    }
    .option img {
      width: 24px;
      height: 24px;
      margin-right: 12px;
    }
    .separator {
      text-align: center;
      color: #9ca3af;
      margin: 16px 0;
      border-top: 1px solid #ddd;
      line-height: 0.1em;
    }
    .separator span {
      background: #f3f4f6;
      padding: 0 10px;
    }
    .product {
      display: flex;
      gap: 16px;
      margin-bottom: 16px;
    }
    .product img {
      width: 80px;
      height: 112px;
      object-fit: cover;
    }
    .product-details p {
      margin: 2px 0;
    }
    .line-through {
      text-decoration: line-through;
      font-size: 14px;
      color: #6b7280;
    }
    .highlight {
      color: #3b82f6;
      font-weight: bold;
      margin-top: 4px;
    }
    .summary {
      color: #374151;
      margin-bottom: 16px;
    }
    .summary div {
      display: flex;
      justify-content: space-between;
      margin-bottom: 4px;
    }
    .summary-total {
      border-top: 1px solid #ddd;
      padding-top: 8px;
      font-weight: bold;
    }
    .info-box {
      background-color: #fef3c7;
      color: #15803d;
      padding: 8px;
      border-radius: 6px;
      font-size: 14px;
      margin-bottom: 16px;
    }
    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 16px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    .checkbox-label {
      display: flex;
      align-items: center;
      font-size: 14px;
      margin-bottom: 16px;
    }
    .checkbox-label input {
      margin-right: 8px;
    }
    .note {
      font-size: 12px;
      color: #6b7280;
      margin-bottom: 12px;
    }
    .note a {
      color: #3b82f6;
      text-decoration: underline;
    }
    button {
      width: 100%;
      background-color: #1f2937;
      color: white;
      padding: 12px;
      font-weight: bold;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="containerr" style="margin-bottom: 100px;">
    <!-- Checkout Form -->
    <div class="box">
      <h2>CHECKOUT</h2>

      <div class="separator"><span>+</span></div>

      <!-- Other Payment Methods -->
      <div>
        <h3>OTHER PAYMENT METHODS</h3>
       
        <label class="option">
          <input type="radio" name="payment" style="margin-right: 16px;">
          <svg width="40px" height="40px" viewBox="0 0 192 192" xmlns="http://www.w3.org/2000/svg" fill="none"><path stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="12" d="M84 96h36c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36c9.941 0 18.941 4.03 25.456 10.544"/><path fill="#000000" d="M145.315 66.564a6 6 0 0 0-10.815 5.2l10.815-5.2ZM134.5 120.235a6 6 0 0 0 10.815 5.201l-10.815-5.201Zm-16.26-68.552a6 6 0 1 0 7.344-9.49l-7.344 9.49Zm7.344 98.124a6 6 0 0 0-7.344-9.49l7.344 9.49ZM84 152c-30.928 0-56-25.072-56-56H16c0 37.555 30.445 68 68 68v-12ZM28 96c0-30.928 25.072-56 56-56V28c-37.555 0-68 30.445-68 68h12Zm106.5-24.235C138.023 79.09 140 87.306 140 96h12c0-10.532-2.399-20.522-6.685-29.436l-10.815 5.2ZM140 96c0 8.694-1.977 16.909-5.5 24.235l10.815 5.201C149.601 116.522 152 106.532 152 96h-12ZM84 40c12.903 0 24.772 4.357 34.24 11.683l7.344-9.49A67.733 67.733 0 0 0 84 28v12Zm34.24 100.317C108.772 147.643 96.903 152 84 152v12a67.733 67.733 0 0 0 41.584-14.193l-7.344-9.49Z"/><path stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="12" d="M161.549 58.776C166.965 70.04 170 82.666 170 96c0 13.334-3.035 25.96-8.451 37.223"/></svg>
          GCash
        </label>
<?var_dump($error)?>
      </div>
    </div>
<form id="trg" method="POST" action="" >
    <!-- Order Summary -->
    <div class="box">
      <h2>ORDER SUMMARY</h2>
      <div class="product">
        <div class="product-details">
          <p><strong><?=htmlspecialchars($plans['planName'])?></strong></p>
          <p style="font-size: 14px; color: #6b7280;">Two Hearts Confection</p>
          <p><strong>₱<?= number_format($plans['price'],2)?></strong></p>
        </div>
      </div>

      <div class="summary">
        <p><?=htmlspecialchars($plans['description'])?></p>
        <div><span>Price</span><span>₱<?= number_format($plans['price'],2)?></span></div>
     
        <div class="summary-total"><span>Total</span><span>₱<?=number_format($plans['price'],2)?></span></div>
      </div>
    <input value="<?=htmlspecialchars($plans['planID'])?>" type="number" name="planID" class="invisible">
    <input value="<?=htmlspecialchars($plans['price'])?>" type="number" step="any" name="price" class="invisible">
   
    <input value="<?=htmlspecialchars($plans['type'])?>" type="text" name="type" class="invisible">


      <p class="note">
        You are purchasing a Subscription for our products. For full terms, see
        <a href="#">purchase policy</a>.
      </p>
      <p class="note">
        By clicking "Place Order" below, I represent that I am over 18 and an authorized user of this payment method. I agree to the
        <a href="#">End User License Agreement</a>.
      </p>

      <button type="submit" name="subscribe">Subscribe</button>
    </div>
  </div>
  </form>
  <script src="js/sweetalert2.all.min.js"></script>

<script>
document.getElementById("trg").addEventListener("submit", function(e) {
  e.preventDefault(); // Prevent default form submission

  const form = this;
  const formData = new FormData(form);

  Swal.fire({
    title: 'Purchasing',
    text: 'Are you sure you want to subscribe to this plan?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#E7515A',
    confirmButtonText: 'Yes, subscribe!'
  }).then((result) => {
    if (result.isConfirmed) {
      fetch(form.action, {
        method: "POST",
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        if (data.error) {
          Swal.fire({
            title: 'Oops!',
            text: data.error,
            icon: 'error',
            confirmButtonColor: '#3085d6'
          })
        } else {
          Swal.fire({
            title: 'Thank you! 🎉',
            text: 'You have successfully subscribed!',
            icon: 'success',
            confirmButtonColor: '#3085d6'
          }).then(() => {
            window.location.href = 'index.php?action=home';
          });
        }
      })
      .catch(err => {
        Swal.fire({
          title: 'Error',
          text: 'Something went wrong while processing your request.',
          icon: 'error',
          confirmButtonColor: '#3085d6'
        })
      });
    }
  });
});
</script>
  
 
</body>

</html>
