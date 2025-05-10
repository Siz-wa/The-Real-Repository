
<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container position-relative d-flex align-items-center justify-content-between">

    <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
    <img src="assets/img/thclogo.png" alt="" width="60px" width="60px" class="rounded-circle">
      <h1 class="sitename">Two Hearts Confections</h1>
      <span>.</span>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="?action=home" class="active">Home<br></a></li>
        <li><a href="?action=aboutus">About</a></li>
        <li><a href="?action=services1">Services</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="?action=contact">Contact</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <?php if (isset($_SESSION['user']['user_id'])): ?>
      <div class="dropdown">
        <a href="#" class="profile-dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="<?php echo htmlspecialchars($_SESSION['user']['pfPicture']); ?>" alt="Profile Picture" class="rounded-circle" width="60px" height="60px">
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
          <li class="dropdown-item text-center">
            <img src="<?php echo htmlspecialchars($_SESSION['user']['pfPicture']); ?>" alt="Profile Picture" class="rounded-circle mb-2" width="60px" height="60px">
            <p class="mb-0"><strong><?php echo htmlspecialchars($_SESSION['user']['fname']) . ' ' . htmlspecialchars($_SESSION['user']['lname']); ?></strong></p>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item bi bi-person-fill" href="?action=users&userID=<?=$_SESSION['user']['user_id']?>"> View Profile</a></li>
          <li><a class="dropdown-item bi bi-grid-fill" href="?action=admindashboard"> Dashboard</a></li>
          <li><a class="dropdown-item bi-door-open-fill" href="?action=logout"> Log Out</a></li>
        </ul>
      </div>
    <?php else: ?>
      <a href="?action=login" class="btn-getstarted">Login</a>
    <?php endif; ?>

  </div>


</header>