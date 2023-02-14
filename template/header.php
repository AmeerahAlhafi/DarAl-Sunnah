<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dar Al-Sunnah <?=$title?></title>


    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/icons/icon-1.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d4049df774.js" crossorigin="anonymous"></script>

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.php" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="text-primary m-0"><img class="me-3" src="img/icons/icon-1.png" alt="Icon">Dar Al-Sunnah</h1>
        </a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="Gates.php" class="nav-item nav-link">Gates</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                    <div class="dropdown-menu border-0 m-0">
                        <a href="restaurants.php" class="dropdown-item">Restaurants</a>
                        <a href="hotels.php" class="dropdown-item">Hotels</a>
                    </div>
                </div>
               <a href="contactus.php" class="nav-item nav-link">contact</a> 
              <?php 
          if(!isset($_SESSION['admin']))
          if(isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] ===true):?>      
          <li class="nav-item dropdown" >
            <a class="nav-link dropdown-toggle"   href="#!" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <?php
                 echo $_SESSION['user_name']?> <i class="tf-ion-chevron-down"></i>
            </a>
            <ul class="dropdown-menu"  aria-labelledby="navbarDropdown">
                <li>
                      <a  class="nav-link" href="profile.php">Profile</a>

                      <a  class="nav-link" href="logout.php">Logout</a>
                      <a   href="favourites.php"><i class="fa-solid fa-heart"></i>My Favourites</a>

                </li>
                <!-- </li> -->
              </ul>
          </li>

          <?php else: ?>
           <li class="nav-item ">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="register.php">Register</a>
            </div>
            <a href="admin.php" class="btn btn-primary py-2 px-4 d-none d-lg-block" style="background: #B78D65;">Login as Admin</a>   
        </div>
            <?php endif; ?>
          </li>
          <?php if(isset($_SESSION['admin']) and $_SESSION['admin'] ===true):?>
                 
                 <li class="nav-item " style="width: 170px;">
                     <a class="nav-link bg-success"  href="controll_panel.php">Controll Panel </i></a>

                 </li>
                <li class="nav-item ">
                <a  class="nav-link" href="logout.php">Logout</a>
              </li>
              <?php endif; ?> 
             
    </nav>
    <!-- Navbar End -->
