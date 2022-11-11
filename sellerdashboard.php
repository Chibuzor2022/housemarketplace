<?php include_once "portalheader.php" ?>


<main>
  <?php

  //protect  page

  if (isset($_SESSION['seller_id'])) {
    //give access
  } else {
    header("Location:sellerlogin.php");
  }

  ?>

  <h2>Dashboard</h2>

  welcome <?php if (isset($_SESSION['firstname'])) {
            echo $_SESSION['firstname'];
          }

          ?>

  <?php if (isset($_SESSION['lastname'])) {
    echo $_SESSION['lastname'];
  }


  ?>


  <!--Dashboard-->

  <div class="container">
    <div class="row">
      <div class="col mt-3">
      </div>
    </div>
    <div class="row">
      <div class="col my-5">
        <div class="card" style="width: 25rem">
          <img src="images/house1.jpg" height="200" class="card-img-top " alt="listings" />
          <div class="card-body">
            <h3 class="card-title">Your Listings</h3>
            <p class="card-text">
              Please click the button below to check, add, and edit your
              listings
            </p>
            <a href="myproperties.php" class="btn btn-primary" name="listings">Check Listings</a>
          </div>
        </div>
      </div>
      <div class="col my-5">
        <div class="card" style="width: 25rem">
          <img src="images/profilepic.png" height="200" class="card-img-top" alt="profile" />
          <div class="card-body">
            <h3 class="card-title">Your Profile</h3>
            <p class="card-text">
              Please click the button below to view or edit your
              Profile
            </p>
            <a href="getseller.php" class="btn btn-primary">Check Profile</a>
          </div>
        </div>
      </div>
    </div>

  </div>
  </div>
  <?php include_once "portalfooter.php" ?>