<?php
include_once "constants.php";

//class definition
class Seller
{

  //member variables
  var $firstname;
  var $lastname;
  var $emailaddress;
  var $password;
  var $phonenumber;
  var $dbcon; //database connection handler

  function __construct()
  {
    $this->dbcon = new MySQLi(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
    if ($this->dbcon->connect_error) {
      die("connection failed" . $this->dbcon->connect_error);
    } else {
      echo "connection successful";
    }
  }

  function insertSeller($firstname, $lastname, $emailaddress, $password, $phonenumber)
  {

    //hash password

    $password = password_hash($password, PASSWORD_DEFAULT);

    //prepare statement

    $statement = $this->dbcon->prepare("INSERT INTO sellers(firstname,lastname,emailaddress,password,phonenumber) VALUES(?,?,?,?,?)");

    //bind parameters
    $statement->bind_param("sssss", $firstname, $lastname, $emailaddress, $password, $phonenumber);


    //execute statement

    $statement->execute();

    //get result
    if ($statement->error) {
      $result = "Oops something went wrong .$statement->error"; //delete the error part after production
    } else {
      $result = "success";
    }

    return $result;
  }

  //create login 
  function sellerlogin($emailaddress, $password)
  {
    //prepare statement
    $statement = $this->dbcon->prepare("SELECT * FROM sellers WHERE emailaddress=?");

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
        $_SESSION['seller_id'] = $row['seller_id'];
        $_SESSION['property_id '] = $row['property_id'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['emailaddress'] = $row['emailaddress'];
        $_SESSION['logger'] = $row['ekude2022#'];

        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
  function logout()
  {
    session_start();
    session_destroy();
    //redirect the user to the login
    header("Location:sellerlogin.php");
    exit();
  }
  #end logout method
}
