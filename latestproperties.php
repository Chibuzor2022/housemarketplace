<?php include_once "header.php" ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="mx-3 mb-3">
        Latest Listings
      </h2>

      <tbody>
        <?php
        include_once "shared/property.php";
        //create club object
        $obj = new Property();
        $properties = $obj->getLatestProperties();
        if (count($properties) > 0) {
          $kounter = 0;
          foreach ($properties as $key => $value) {

        ?>

            <div class="container">
              <h2><?php echo $value['title'] ?> </h2>
              <div class="row">
                <div class="col my-4">
                  <div class="card" style="width: 50rem">
                    <img src="uploads/<?php echo $value['image_name']; ?>" alt="property image" class="img-fluid" style="width:800px">
                    <div class="card-body">
                      <h5 class="card-title">Price: &#8358;<?php echo number_format($value['price'], 2); ?></h5>
                      <h3 class="card-title">Location: <?php echo $value['state'] ?></h3>
                      <a href="getdetails.php?pid=<?php echo $value['property_id']; ?>" class="btn btn-primary">Check Details</a>
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
    </div>
  </div>
</div>







<?php include_once "footer.php" ?>