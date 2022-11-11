 <?php
  include_once "portalheader.php";
  include_once "shared/constants.php";


  //create object of seller class
  include_once "shared/seller.php";
  $sellerobj = new Seller();

  if (isset($_REQUEST['sellerid'])) {
    #make reference to getseller method
    $seller = $sellerobj->getSeller($_REQUEST['sellerid']);
  }


  if (isset($_REQUEST['submitbtn'])) {
    $errors = array();
    if (empty($_REQUEST['firstname'])) {
      $errors['errorfirstname'] = "Firstname field must be filled";
    }
    if (empty($_REQUEST['lastname'])) {
      $errors['errorlastname'] = "lastname field must be filled";
    }
    if (empty($_REQUEST['emailaddress'])) {
      $errors['erroremailaddress'] = "Email field must be filled";
    }

    if (empty($_REQUEST['phonenumber'])) {
      $errors['errorphonenumber'] = "Phone Number field must be filled";
    }

    //if there is no validatio error
    if (count($errors) == 0) {


      //  sanitize inputs
      $firstname = sanitizeInput($_POST['firstname']);
      $lastname = sanitizeInput($_POST['lastname']);
      $emailaddress = sanitizeInput($_POST['emailaddress']);
      $phonenumber = sanitizeInput($_POST['phonenumber']);
      $sellerid = $_REQUEST['sellerid'];


      //add seller class
      include_once "shared/seller.php";
      $sellerobj = new Seller();

      //reference to updateSeller method and pass parmeters
      $output = $sellerobj->updateSeller($firstname, $lastname, $emailaddress, $phonenumber, $sellerid);


      if ($output == 'success' || $output == 'nothing to update') {

        // redirect to
        header("Location: updateprofile.php?msg=$output");
        exit();
      } else {
        $errors[] = $output;
      }
    }
  }





  ?>;

 <main>
   <div class="container">
     <div class="row ">

       <div class="col-6 ">
         <h2>Profile Update</h2>
         <?php
          if (!empty($errors)) {

            echo "<ul>";
            foreach ($errors as $key => $value) {
              echo "<li class='text-danger'>$value</li>";
            }

            echo "</ul>";
          }

          ?>


         <form name="sellerform" id="sellerform" action='editseller.php?sellerid= <?php if (isset($_REQUEST['sellerid'])) {
                                                                                    echo $_REQUEST['sellerid'];
                                                                                  } ?>' method="post">
           <label for="firstname">Firstname</label>
           <input type="text" name="firstname" id="firstname" class="form-control" value="<?php if (isset($seller['firstname'])) {
                                                                                            echo $seller['firstname'];
                                                                                          } ?>">

           <label for="lastname">Lastname</label>
           <input type="text" name="lastname" id="lastname" class="form-control" value="<?php if (isset($seller['lastname'])) {
                                                                                          echo $seller['lastname'];
                                                                                        } ?>">

           <label for="lastname">Email Address</label>
           <input type="email" name="emailaddress" id="emailaddress" class="form-control" value="<?php if (isset($seller['emailaddress'])) {
                                                                                                    echo $seller['emailaddress'];
                                                                                                  } ?>">

           <label for="phonenumber">Phone Number</label>
           <input type="text" name="phonenumber" id="phonenumber" class="form-control" value="<?php if (isset($seller['phonenumber'])) {
                                                                                                echo $seller['phonenumber'];
                                                                                              } ?>">

           <input type="hidden" name="clubid" value="<?php if (isset($seller['seller_id'])) {
                                                        echo $seller['seller_id'];
                                                      } ?>">

           <input type="submit" class="btn btn-primary" value="Save Changes" name="submitbtn">
         </form>
       </div>
     </div>
   </div>

 </main>



 <?php include_once "footer.php" ?>