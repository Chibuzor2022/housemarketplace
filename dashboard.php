<?php include_once "portalheader.php" ?>


<main>
  <?php
  // session_start();

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
  <a href="addprofilephoto.php">Upload Profile Photo</a>

  <!--Dashboard-->

  <div class="container">
    <div class="row">
      <div class="col mt-3">
        <h2>Dashboard</h2>
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
            <a href="listings.html" class="btn btn-primary">Check Listings</a>
          </div>
        </div>
      </div>
      <div class="col my-5">
        <div class="card" style="width: 25rem">
          <img src="images/profilepic.png" height="200" class="card-img-top" alt="profile" />
          <div class="card-body">
            <h3 class="card-title">Your Profile</h3>
            <p class="card-text">
              Please click the button below to check, add, and edit your
              Profile
            </p>
            <a href="profile.html" class="btn btn-primary">Check Profile</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col my-5">
        <div class="card" style="width: 25rem">
          <img src="images/messages.jpg" height="200" class="card-img-top" alt="messages" />
          <div class="card-body">
            <h3 class="card-title">Your Messages</h3>
            <p class="card-text">
              Please click the button below to check your messages
            </p>
            <a href="messages.html" class="btn btn-primary">Check Messages</a>
          </div>
        </div>
      </div>
      <div class="col my-5">
        <div class="card" style="width: 25rem">
          <img src="images/views.png" height="200" class="card-img-top bg-light" alt="views" />
          <div class="card-body">
            <h3 class="card-title">Views</h3>
            <p class="card-text">
              Please click the button below to check your views you have so far
            </p>
            <a href="views.html" class="btn btn-primary">Check Views</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include_once "portalfooter.php" ?>