<!DOCTYPE html>
<html>

<head>
  <?php

  session_start(); //start session
  include_once "shared/constants.php";

  //authentication
  if (!isset($_SESSION['admin_id'])) {
    $msg = "You need to login to access this page!";

    //redirect to login page

    header("Location:adminlogin.php?msg=$msg");
  }


  ?>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="A Real Estate Market Place where Buyers and Seller" />
  <meta name="keywords" content="House, Real Estate,Buy a House Rent a home" />
  <meta name="author" content="chibuzoronochie" />
  <meta property="og:url" content="https://www.housemarketplace.com/" />

  <meta property="og:site_name" content="House Marketplace" />
  <meta property="og:type" content="website" />
  <meta name="twitter:card" content="summary_large_image" />

  <meta name="twitter:site" content="@https://twitter.com/co" />

  <meta property="fb:app_id" content="1253577171438456" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Albert+Sans&family=Dosis&family=Lato:ital@1&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="fontawesome/css/all.css" />

  <title><?php if (isset($page_title)) {
            echo $page_title . "|";
          } ?><?php if (defined('APP_NAME')) {
                echo APP_NAME;
              } ?> </title>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
      <a href="#" class="navbar-brand">House Marketplace</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="addproperty.php" class="nav-link">Post a property</a></li>

          <li class="nav-item"><a href="forsale.php" class="nav-link">For Sale</a></li>
          <li class="nav-item"><a href="forrent.php" class="nav-link">For Rent</a></li>
           <li class="nav-item"><a href="admindashboard.php" class="nav-link">Dashboard</a></li>
          <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
        </ul>
      </div>
    </div>
    </div>
  </nav>