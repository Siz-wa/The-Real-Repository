<body class="starter-page-page">
<main class="main">
    <section class="pricing py-5">
      <div class="container">
        <div class="row justify-content-center">
        
          <?php foreach($plans as $plan):?>
          <div class="col-lg-3 mb-4">
            <a href="?action=payment&plan=<?=urlencode($plan['planName'])?>" style="text-decoration: none;">
              <div class="card h-100 text-center border-0 shadow" style="transition: all 0.4s ease; border-radius: 20px; overflow: hidden; cursor: pointer;">
                <div class="card-header text-white" style="background-color: #f4b89e;">
                  <div class="py-3">
                    🍫
                    <h4 class="my-2"><?= htmlspecialchars($plan['planName'])?></h4>
                  </div>
                </div>
                <div class="card-body">
                  <h2 class="card-title pricing-card-title">₱ <?= htmlspecialchars($plan['price'])?> <small class="text-muted">/ <br> <?= htmlspecialchars($plan['type'])?></small></h2>
                  <ul class="list-unstyled mt-3 mb-4">
                    <p><?= htmlspecialchars($plan['description'])?></p>
                  </ul>
                </div>
              </div>
            </a>
          </div>
          <?php endforeach;?>

  
        </div>
      </div>
    </section>
  
    
  </main>