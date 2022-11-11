<?php
$page_title = "Seller Login";
include_once "header.php";

//check if from is submitted


if (isset($_POST['loginbtn'])) {

  //validate form
  $error = array();
  if (empty($_POST['username'])) {

    $error[] = "username cannot be empty";
  }
  if (empty($_POST['password'])) {

    $error[] = "passsword cannot be empty";
  }
  //no validation error, then process login
  if (empty($error)) {

    //add seller class

    include_once("shared/seller.php");

    //create instance of seller class
    $obj = new Seller();
    //reference to login method
    $output = $obj->sellerlogin($_POST['username'], $_POST['password']);
    if ($output === false) {
      $error[] = "Invalid username or password";
    } else {
      //redirect the user to dashboard/profile page
      header("Location:sellerdashboard.php");
      exit();
    }
  }
}
?>
<main>
  <div class="container">
    <div class="row my-5">

      <div class="col-6 ">
        <h2>Seller Login</h2>

        <?php

        if (isset($error)) {

          foreach ($error as $key => $value) {
            echo "<div class='text-danger'>$value</div>";
          }
        }

        ?>
        <form action=" sellerlogin.php" method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name='username' class="form-control" id="username" aria-describedby="username">

          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name='password' class="form-control" id="password">
          </div>

          <input type="submit" class="btn btn-primary mt-3" id="loginbtn" name="loginbtn" value="Seller login">
        </form>
      </div>
    </div>
  </div>
</main>



<?php
include_once "footer.php";
?>