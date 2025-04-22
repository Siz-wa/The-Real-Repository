<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Two Hearts Confections</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <?php include "dashboardAsset1.php"; ?>
</head>
<body class="dashboard-body">

    <?php include "dashboardSidebar.php"; ?>

    <div class="main-content">
        <?php include "dashboardHeader.php"; ?>

        <main class="page-view">
            <?php include "../views/{$view}.php"; ?>
        </main>
    
    </div>

    <?php include "dashboardAsset2.php"; ?>
</body>
</html>