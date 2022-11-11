<?php
//add constants file

include_once "constants.php";


//class definition

class Admin
{
  //member variables
  var $username;
  var $password;
  var $dbcon; //database connection handler

  function __construct()
  {
    $this->dbcon = new MySQLi(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
    if ($this->dbcon->connect_error) {
      die("connection failed" . $this->dbcon->connect_error);
    } else {
      //   echo "connection successful";
    }
  }

  //create login 
  function adminlogin($emailaddress, $password)
  {
    //prepare statement
    $statement = $this->dbcon->prepare("SELECT * FROM admins WHERE emailaddress=?");

    //bind the parameter
    $statement->bind_param('s', $emailaddress);

    //execute statement

    $statement->execute();

    //get result


    $result = $statement->get_result();

    if ($result->num_rows == 1) {

      $row = $result->fetch_assoc();
      if (password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['emailaddress'] = $row['emailaddress'];


        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
  #begin logout method
  function logout()
  {

    session_start();
    session_destroy();
    //redirect the user to the login
    header("Location:Adminlogin.php");
    exit();
  }
}
  #end logout method
