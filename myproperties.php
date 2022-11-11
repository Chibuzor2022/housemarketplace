<?php include_once "portalheader.php" ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="mt-4 mb-3">
        My Listed Properties
      </h1>
      <a href="addproperty.php" class="btn btn-primary">Add Property</a>
      <?php
      if (isset($_REQUEST['status'])) {
      ?>
        <div class="alert alert-success">
          <p><?php if (isset($_REQUEST['msg'])) {
                echo $_REQUEST['msg'];
              } ?></p>
        </div>
      <?php

      }
      ?>
      <table class="table">
        <thead>
          <tr>
            <th>S/N</th>
            <th>Image</th>
            <th>Property ID</th>
            <th>Title</th>
            <th>Price</th>
            <th>Address</th>
            <th>Description</th>
            <th>Type</th>
            <th>Status</th>
            <th>Bedroom</th>
            <th>Bathroom</th>
            <th>Toilet</th>
            <th>State</th>
            <th>LGA</th>
            <th>Category</th>
            <th>Action</th>

          </tr>




        </thead>

        <tbody>
          <?php
          include_once "shared/property.php";
          //create club object

          $obj = new property();
          $properties = $obj->getMyProperties($_SESSION['seller_id']);
          if (count($properties) > 0) {
            $kounter = 0;
            foreach ($properties as $key => $value) {
          ?>
              <tr>
                <td><?php echo ++$kounter; ?></td>
                <td>
                  <img src="uploads/<?php echo $value['image_name']; ?>" alt="property image" class="img-fluid" style="width:45px">
                </td>
                <td><?php echo $value['property_id'] ?></td>
                <td><?php echo $value['title'] ?></td>
                <td><?php echo $value['price'] ?></td>
                <td><?php echo $value['address'] ?></td>
                <td><?php echo $value['description'] ?></td>
                <td><?php echo $value['type'] ?></td>
                <td><?php echo $value['status'] ?></td>
                <td><?php echo $value['bedroom'] ?></td>
                <td><?php echo $value['bathroom'] ?></td>
                <td><?php echo $value['toilet'] ?></td>
                <td><?php echo $value['state'] ?></td>
                <td><?php echo $value['lga'] ?></td>
                <td><?php echo $value['category'] ?></td>

                <td>
                  <a href="editproperty.php?propertyid=<?php echo $value['property_id'] ?>&title=<?php echo $value['title'] ?>"><i class="fa-sharp fa-solid fa-pencil"></i></a>


                </td>

              </tr>

          <?php
            }
          } else {
            echo "<tr><td colspan='7'>No property found. Please add Property</td></tr>";
          }



          ?>

        </tbody>




      </table>


    </div>

  </div>
</div>



<?php include_once "portalfooter.php" ?>