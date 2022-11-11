<?php include_once "portalheaderadmin.php" ?>


<main>
  <?php
  if (isset($_SESSION['admin_id'])) {
    //give access
  } else {
    header("Location:adminlogin.php");
  }


  ?>

  <h2>Admin Dashboard</h2>


  <div class="container">
    <div class="row">
      <div class="col-6 my-5">
        <div class="card" style="width: 25rem">
          <img src="images/house1.jpg" height="200" class="card-img-top " alt="listings" />
          <div class="card-body">
            <h3 class="card-title">All Listings</h3>
            <a href="allproperties.php" class="btn btn-primary">Check All Listings</a>
          </div>
        </div>
      </div>
      <div class="col-6 my-5">
        <div class="card" style="width: 25rem">
          <img src="images/profilepic.png" height="200" class="card-img-top" alt="profile" />
          <div class="card-body">
            <h3 class="card-title">All Sellers</h3>
            <a href="allsellers.php" class="btn btn-primary">Check All Sellers</a>
          </div>
        </div>
      </div>

    </div>

  </div>
  </div>
</main>
<?php include_once "portalfooter.php" ?>