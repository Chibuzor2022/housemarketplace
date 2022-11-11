<?php

include_once "portalheaderadmin.php"; ?>


<div class="container">
  <div class="row m-5 justify-content-center">
    <div class="col-6">
      <?php
      if (isset($_REQUEST['sellerid'])) {
        echo "<div class='alert alert-warning'>
  <h2>Are you sure you want to delete " . $_REQUEST['sellerid'] . " record?  </h2>
  </div>";
      }

      ?>
      <form action="deletesellerrecord.php" method="post">
        <input type="hidden" name="sellerid" value="<?php if (isset($_REQUEST['sellerid'])) {
                                                      echo $_REQUEST['sellerid'];
                                                    } ?>">
        <input type="submit" value="Delete" name="btnDelete" class="btn btn-danger">
        <input type="submit" value="Cancel" name="btnCancel" class="btn btn-danger">

      </form>
    </div>
  </div>
</div>
<?php include_once "portalfooter.php" ?>