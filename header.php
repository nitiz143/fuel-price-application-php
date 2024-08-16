<?php
session_start();
include('include/db.php');
include('include/keys.php');
include('include/functions.php');

$fileName = basename($_SERVER['PHP_SELF']);
?> 



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Fuel Prices</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Maxim - v2.1.0
  * Template URL: https://bootstrapmade.com/maxim-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <script>
    $(document).ready(function(){
      $(".logout").click(function(){
        console.log('fdsfd');
        $.ajax({
          url: 'logout.php',
          type: 'POST',
          data: {"form_type": "logout"},
          processData: false,
          contentType: false,
          success: function(response) {
            window.location.href = '<?php echo FRONT_URL; ?>';
            exit;
          }
        });
      });
    });
  </script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.php">Fuel Prices</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="<?php echo ($fileName == 'index.php') ? 'active' : ''; ?>"><a href="index.php">Home</a></li>
          <?php 
          if(isset($_SESSION['user_id'])){ ?>
            <li class="<?php echo ($fileName == 'vehicle.php') ? 'active' : ''; ?>"><a href="vehicle.php">Vehicle</a></li>
            <li class="<?php echo ($fileName == 'fuel_station.php') ? 'active' : ''; ?>"><a href="fuel_station.php">Fuel Station</a></li>
            <li class="<?php echo ($fileName == 'feedback.php') ? 'active' : ''; ?>"><a href="feedback.php">Feedback</a></li>
            <li class="<?php echo ($fileName == 'help_desk.php') ? 'active' : ''; ?>"><a href="help_desk.php">Help Desk</a></li>
           
            <?php 
          } ?>
          <li><a href="#about">About Us</a></li>
          
          <!-- <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li> -->
          <li><a href="#contact">Contact Us</a></li>
          <?php 
          if(isset($_SESSION['user_id']) && $_SESSION['user_id']){ ?>
             <li class="<?php echo ($fileName == 'profile.php') ? 'active' : ''; ?>"><a href="profile.php">Profile</a></li>
            <li><a class="logout" href="#">Logout</a></li>
            <?php
          }else{ ?>
            <li class="<?php echo ($fileName == 'login.php' || $fileName == 'register.php') ? 'active' : ''; ?>"><a href="login.php">Login/Register</a></li>
            <?php 
          } ?>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->