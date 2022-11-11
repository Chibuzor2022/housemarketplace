<?php include_once "header.php" ?>
<div class="container-fluid">
     <div class="row justify-content-center">
    <div class="col">
      <div style="max-width: 75%;">

        <div class="text-center mt5 mb-4">
          <h3>All Properties for sale</h3>
          <h5>You can narrow your search to your state.</h5>
        </div>
        <input style="margin-left:400px"   type="text" class="from-control " id="autosearch" autocomplete="off" placeholder="Please enter your State">
      </div>
      <div id="searchresult"></div>
</div>


</div>


        <?php
        include_once "shared/property.php";
        //create club object
        $obj = new Property();
        $properties = $obj->getForSaleProperties();
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
    



    <script src="js/jQuery/jquery-3.6.1.min.js"></script>




<script type="text/javascript">
  
  $(document).ready(function() {
    $('#autosearch').keyup(function() {
      
      var input = $(this).val();
      // alert(input);
      if (input != "") {
        $.ajax({
          url: "forsale2.php",
          method: "POST",
          data: {
            input:input

          },
          success: function(data) {
            $("#searchresult").html(data) 
           
          }
        });
      } else {
        $("#searchresult").css("display", "none");
      }
    });
  });
</script> 




<?php include_once "footer.php" ?>