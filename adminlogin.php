<?php
$page_title = "adminlogin";
include_once "header.php";

//check if from is submitted


if (isset($_POST['adminlogin'])) {

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

    //add admin class

    include_once("shared/admin.php");

    //create instance of admin class
    $obj = new Admin();
    //reference to login method
    $output = $obj->adminlogin($_POST['username'], $_POST['password']);
    if ($output === false) {
      $error[] = "Invalid username or password";
    } else {
      //redirect the Dashboard
      header("Location:admindashboard.php");
      exit();
    }
  }
}
?>
<!-- Admin Login Page Content -->
<main>
  <div class="container">
    <div class="row ">

      <div class="col-6 ">
        <h2>Admin Login</h2>

        <?php

        if (isset($error)) {

          foreach ($error as $key => $value) {
            echo "<div class='text-danger'>$value</div>";
          }
        }

        ?>
        <form action="" method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name='username' class="form-control" id="username" aria-describedby="username">

          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name='password' class="form-control" id="password">
          </div>

          <input type="submit" class="btn btn-primary" id="adminlogin" name="adminlogin" value="Admin login">
        </form>
      </div>
    </div>
  </div>
</main>





<?php
include_once "footer.php";
?>