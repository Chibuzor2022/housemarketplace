<?php include_once "header.php" ?>

<div class="container">
  <div class="row " style="display: flex;">

    <div class="col-6">
      <h2 class="text-center">Property Images</h2>
      <p class="underline"></p>




      <?php

      include_once "shared/property.php";


      $id = $_GET['pid'];
      $obj = new Property();
      $images = $obj->getAllImages($id);




      if (count($images) > 0) {
        $kounter = 0;
        foreach ($images as $key => $value) {
      ?>

          <div class>
            <img src="uploads/<?php echo $value['image_name']; ?>" alt="property image" style="width:500px ;">

          </div>
      <?php
        }
      } else {
        echo "<tr><td colspan='7'>No images found</td></tr>";
      }
      echo "<br>";
      ?>
    </div>

    <div class="col-6">
      <h2 class="text-center">Property Details</h2>
      <p class="underline"></p>


      <?php
      include_once "shared/property.php";


      $id = $_GET['pid'];


      $obj = new property();
      $properties = $obj->getAllproperties2($id);

      if (count($properties) > 0) {
        $kounter = 0;
        foreach ($properties as $key => $value) {
      ?>
          <div style="border-left:4px solid blue; padding-left:20px;">
            <p><span class="fw-bold">PID:</span> <?php echo $value['property_id'] ?>.</p>
            <p><i class="fa-solid fa-user"></i> <?php echo $value['firstname'] ?> <?php echo $value['lastname'] ?>..</p>
            <p> <i class="fa-solid fa-phone"></i> <?php echo $value['phonenumber'] ?>.</p>
            <p><i class="fa-sharp fa-solid fa-house"></i> <?php echo $value['title'] ?>.</p>
            <p> &#8358;<?php echo number_format($value['price'], 2); ?>.</p>
            <p><i class="fa-solid fa-location-pin"></i> <?php echo $value['address'] ?>, <?php echo $value['lga'] ?>, <?php echo $value['state'] ?>.</p>

            <p><?php echo $value['description'] ?></p>
            <p><?php echo $value['type'] ?></p>
            <p><?php echo $value['status'] ?></p>
            <p><i class="fa-sharp fa-solid fa-bed"></i> <?php echo $value['bedroom'] ?> Bedrooms</p>
            <p><i class="fa-sharp fa-solid fa-bath"></i> <?php echo $value['bathroom'] ?> Bathrooms</p>
            <p><i class="fa-sharp fa-solid fa-toilet"></i> <?php echo $value['toilet'] ?> Toilets</p>

            <p><?php echo $value['category'] ?>

          </div>

      <?php
        }
      }



      ?>




    </div>
  </div>
</div>

<?php include_once "footer.php" ?>