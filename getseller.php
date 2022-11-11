<?php include_once "portalheader.php" ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="mt-4 mb-3">
        Personal Details
      </h1>


      <?php
      include_once "shared/seller.php";


      $obj = new Seller();
      $seller = $obj->getSeller($_SESSION['seller_id']);
      if (isset($_SESSION['seller_id'])) {
        echo $seller['firstname'] . ' ';
        echo $seller['lastname'] . "<br>";
        echo $seller['emailaddress'] . "<br>";
        echo $seller['phonenumber'] . "<br>";
      ?>
        <a href="editseller.php?sellerid=<?php echo $seller['seller_id'] ?>"><i class="fa-sharp fa-solid fa-pencil"></i></a>

      <?php

      }
      ?>
    </div>
  </div>
</div>


<?php include_once "portalfooter.php" ?>