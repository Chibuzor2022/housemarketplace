<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheets" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <title>Document</title>
</head>

<body>

  <?php
  if (isset($_REQUEST["btnsubmit"]))

    //validate
    $errors = array(); //empty array

  if (empty($_REQUEST['lastname'])) {
    $errors['errlastname'] = "Lastname field is required";
  };
  if (empty($_REQUEST['firstname'])) {
    $errors['errfirstname'] = "Firstname field is required";
  }

  if (empty($_REQUEST['emailaddress'])) {
    $errors['erremail'] = "Email address field is required";
  }
  if (empty($_REQUEST['phonenumber'])) {
    $errors['errphone'] = "Phone Number field is required";
  }
  if (empty($_REQUEST['password'])) {
    $errors['errpassword'] = "Password field is required";
  } elseif (strlen($_REQUEST['password']) < 6) {
    $errors['errpassword'] = "Password must be atleast 6 characters";
  }

  //check if there is no any validation error
  if (count($errors) == 0) {
    //include student class
    include_once "shared/user.php";
    //create object of student class
    $obj = new User();
    //call insertStudent method
    $output = $obj->insertUser($_REQUEST['firstname'], $_REQUEST['lastname'], $_REQUEST['emailaddress'], $_REQUEST['password'], $_REQUEST['phonenumber']);

    //redirect to another page
    if ($output != 'success') {

      echo $output; // meaning what?
    } else {
      header("Location: regstatus.php?msg=$output");
    }
  }

  ?>
  <div class="container">
    <div class="row ">

      <div class="col-6 ">
        <h2>User Registration</h2>
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
          <?php
          if (!empty($errors['errfirstname']))
            echo "<div class='text-danger'>" . $errors['errfirstname'] . "</div>"
          ?>

          <label for="lastname">Lastname</label>
          <input type="text" name="lastname" id="lastname" class="form-control">
          <?php
          if (!empty($errors['errlastname']))
            echo "<div class='text-danger'>" . $errors['errlastname'] . "</div>"
          ?>

          <label for="lastname">Email Address</label>
          <input type="email" name="emailaddress" id="emailaddress" class="form-control">
          <?php
          if (!empty($errors['erremail']))
            echo "<div class='text-danger'>" . $errors['erremail'] . "</div>"
          ?>

          <label for=" password">Password</label>
          <input type="password" name="password" id="password" class="form-control">
          <?php
          if (!empty($errors['errpassword']))
            echo "<div class='text-danger'>" . $errors['errpassword'] . "</div>"
          ?>

          <label for="phonenumber">Phone Number</label>
          <input type="text" name="phonenumber" id="phonenumber" class="form-control">
          <?php
          if (!empty($errors['errphone']))
            echo "<div class='text-danger'>" . $errors['errphone'] . "</div>"
          ?>

          <input class="btn btn-secondary" type="reset" name="reset" id="reset" value="Reset">
          <button class="btn btn-primary" name="btnsubmit">Submit</button>
        </form>
      </div>
    </div>
  </div>

</body>

</html>