<div class="container">
  <div class="row">
    <div class="col">


      <?php
      include_once "shared/property.php";
      //create Property object
      $obj = new Property();

      $state = $_POST['input'];
      $properties = $obj->getForSaleProperties2($state);
      if (count($properties) > 0) {
        $kounter = 0;
        foreach ($properties as $key => $value) {

      ?>

          <div class="container">

            <div class="row">
              <div class="col my-4">
                <div class="card" style="width: 50rem">
                  <h2><?php echo $value['title'] ?> </h2>
                  <img src="uploads/<?php echo $value['image_name']; ?>" alt="property image" class="img-fluid">
                  <div class="card-body">
                    <h5 class="card-title">Price: &#8358;<?php echo number_format($value['price'], 2); ?></h5>
                    <h3 class="card-title">Location: <?php echo $value['state'] ?></h3>
                    <button class="btn btn-primary">
                      <a href="getdetails.php?pid=<?php echo $value['property_id']; ?>" class="btn btn-primary">Check Details</a>
                    </button>

                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php

        }
      } else {
        echo "<tr><td colspan='7'>No property found</td></tr>";
      }
      ?>







      <?php include_once "footer.php" ?>