<?php

if (!isset($_SESSION['Username'])) {
    header("Location: header.php");
    exit;
}
?>

<?php
$Url = $_SERVER;
$Route  = str_split($_SERVER['REQUEST_URI'],9);
// echo "</pre>";
// print_r($Route);
$Route = isset($Route[1]) ? $Route[1] : 0;
$orgRoute = explode('.', $Route);
$orgRoute = $orgRoute[0];


// Get the current file name
$currentFile = basename($_SERVER['PHP_SELF']);

// List of public pages where redirect should not happen
$publicPages = ['appointment.php', 'login.php'];

if (!in_array($currentFile, $publicPages) && !isset($_SESSION['Username'])) {
    // Redirect to login if not logged in and trying to access other pages
    header("Location: login.php");
    exit;
}

?>  
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Medicio Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="d-none d-md-flex align-items-center">
          <i class="bi bi-clock me-1"></i> Monday - Saturday, 8AM to 10PM
        </div>
        <div class="d-flex align-items-center">
          <i class="bi bi-phone me-1"></i> Call us now +1 5589 55488 55
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-end">
        <a href="home_a.php" class="logo d-flex align-items-center me-auto">
          <img src="assets/img/logo.png" alt="">
          <!-- Uncomment the line below if you also wish to use a text logo -->
          <!-- <h1 class="sitename">Medicio</h1>  -->
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="home_a.php" class="<?php echo $orgRoute == "home_a" ? 'active' : '' ?>">Home</a></li>
            <li><a href="about_a.php" class="<?php  echo $orgRoute == "about_a" ? 'active' : '' ?>">About</a></li>
            <li><a href="services_a.php" class = "<?php  echo $orgRoute == "services_" ? 'active' : '' ?>">Services</a></li>
            <li><a href="departments_a.php" class = "<?php  echo $orgRoute == "departmen" ? 'active' : '' ?>">Departments</a></li>
            <li><a href="features_a.php" class = "<?php  echo $orgRoute == "features_" ? 'active' : '' ?>">Features</a></li>
            <li><a href="doctors_a.php"  class = "<?php  echo $orgRoute == "doctors_a" ? 'active' : '' ?>">Doctors</a></li>
            <li><a href="faq_a.php"  class = "<?php  echo $orgRoute == "faq_a" ? 'active' : '' ?>">FAQs</a></li>
            
            <li><a href="contact_a.php"  class = "<?php  echo $orgRoute == "contact_a" ? 'active' : '' ?>">Contact</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

       <a class="cta-btn" href="appointment.php">Appointment+</a>

        <a class="cta-btn" href="logout.php">Logout</a>

      </div>
   
    </div>

  </header>