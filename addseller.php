 <?php
  include_once "header.php";

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
    if (empty($_REQUEST['password'])) {
      $errors['errorpassword'] = "Password field must be filled";
    }
    if (empty($_REQUEST['phonenumber'])) {
      $errors['errorphonenumber'] = "Phone Number field must be filled";
    }

    //if there is no validatio error
    if (count($errors) == 0) {
      //include the seller class
      include_once "shared/seller.php";

      //create the object

      $obj = new Seller;

      //call the insertSelller method
      $output = $obj->insertSeller($_REQUEST['firstname'], $_REQUEST['lastname'], $_REQUEST['emailaddress'], $_REQUEST['password'], $_REQUEST['phonenumber']);

      //redirect to nanother page
      if ($output != 'success') {

        echo $output; // meaning what?
      } else {
        header("Location: regstatus.php?msg=$output");
      }
    }
  }


  ?>;

 <main>
   <div class="container">
     <div class="row ">

       <div class="col-6 ">
         <h2>Registration</h2>
         <?php
          if (!empty($errors)) {

            echo "<ul>";
            foreach ($errors as $key => $value) {
              echo "<li class='text-danger'>$value</li>";
            }

            echo "</ul>";
          }

          ?>


         <form action="" method="post">
           <label for="firstname">Firstname</label>
           <input type="text" name="firstname" id="firstname" class="form-control">

           <label for="lastname">Lastname</label>
           <input type="text" name="lastname" id="lastname" class="form-control">

           <label for="lastname">Email Address</label>
           <input type="email" name="emailaddress" id="emailaddress" class="form-control">

           <label for=" password">Password</label>
           <input type="password" name="password" id="password" class="form-control">


           <label for="phonenumber">Phone Number</label>
           <input type="text" name="phonenumber" id="phonenumber" class="form-control">


           <input class="btn btn-secondary" type="reset" name="reset" id="reset" value="Reset">
           <input type="submit" class="btn btn-primary" value="submit" name="submitbtn">
         </form>
       </div>
     </div>
   </div>

 </main>



 <?php include_once "footer.php" ?>