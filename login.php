<?php
$page_title = "Login";
include_once "header.php";

//check if from is submitted


if (isset($_POST['btnlogin'])) {

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

    //add user class

    include_once("shared/user.php");

    //create instance of userclass
    $obj = new User();
    //reference to login method
    $output = $obj->login($_POST['username'], $_POST['password']);
    if ($output === false) {
      $error[] = "Invalid username or password";
    } else {
      //redirect the user to dashboard/profile page
      header("Location:dashboard.php");
    }
  }
}
?>
<!-- Page Content -->
<div class="container">

  <!-- Page Heading/Breadcrumbs -->
  <h1 class="mt-4 mb-3 text-center">
    <small>Login</small>
  </h1>




  <div class="row" style='min-height:400px;'>
    <div class="col-lg-8 col-md-8  offset-md-2 offset-lg-2 col-sm-12">
      <?php

      if (isset($error)) {

        foreach ($error as $key => $value) {
          echo "<div class='text-danger'>$value</div>";
        }
      }
      if (isset($_REQUEST['notice'])) {
        echo "<div class='text-danger'>" . $_REQUEST['notice'] . "</div>";
      }
      ?>
      <form action="login.php" method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name='username' class="form-control" id="username" aria-describedby="emailHelp">

        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name='password' class="form-control" id="password">
        </div>

        <button type="submit" class="btn btn-info btn-block" id="btnlogin" name="btnlogin">Login</button>
      </form>
    </div>





  </div>



</div>
<!-- /.container -->


<?php
include_once "footer.php";
?>