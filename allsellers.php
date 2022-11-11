<?php include_once "portalheaderadmin.php" ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="mt-4 mb-3">
        All Sellers
      </h1>
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
            <th>Seller ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email Address</th>
            <th>Phone Number</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
          </tr>

        </thead>

        <tbody>
          <?php
          include_once "shared/seller.php";


          $obj = new Seller();
          $sellers = $obj->getAllSellers();






          if (count($sellers) > 0) {
            $sn = 1;
            foreach ($sellers as $key => $value) {

          ?>
              <tr>
                <td><?php echo $sn++ ?></td>
                <td><?php echo $value['seller_id'] ?></td>
                <td><?php echo $value['firstname'] ?></td>
                <td><?php echo $value['lastname'] ?></td>
                <td><?php echo $value['emailaddress'] ?></td>
                <td><?php echo $value['phonenumber'] ?></td>
                <td><?php echo $value['created_at'] ?></td>
                <td><?php echo $value['updated_at'] ?></td>
                <td>
                  <a href="deleteseller.php?sellerid=<?php echo $value['seller_id'] ?>"><i class="fa-regular fa-trash-can"></i></a>
                </td>
              </tr>
            <?php
            }
          } else {
            ?>
            <tr>
              <td colspan="7">No Seller Found</td>
            </tr>

          <?php
          }
          ?>
        </tbody>

      </table>
    </div>
  </div>
</div>



<?php include_once "portalfooter.php" ?>