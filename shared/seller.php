<?php
include_once "constants.php";


//class definition
class Seller
{

  //member variables
  var $firstname;
  var $lastname;
  var $emailaddress;
  var $phonenumber;
  var $dbcon; //database connection handler

  function __construct()
  {
    $this->dbcon = new MySQLi(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
    if ($this->dbcon->connect_error) {
      die("connection failed" . $this->dbcon->connect_error);
    } else {
      // echo "connection successful";
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
      $result = "Oops something went wrong .$statement->error";
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
  #end logout method
  function logout()
  {
    session_start();
    session_destroy();
    //redirect the user to the login
    header("Location:sellerlogin.php");
    exit();
  }
  #end logout method
  //to get one seller details

  function getSeller($sellerid)
  {
    //prepare the statement
    $statement = $this->dbcon->prepare("SELECT* FROM sellers WHERE seller_id=?");
    //bind parameter
    $statement->bind_param("i", $sellerid);
    //execute
    $statement->execute();
    //get result set
    $result = $statement->get_result();
    if ($result->num_rows == 1) {
      return $result->fetch_assoc();
    } else {
      return "Oops! something happened";
    }
  }
  #start updateSeller method


  function updateSeller($firstname, $lastname, $emailaddress,  $phonenumber, $sellerid)

  {

    //prepare the statement

    $statement = $this->dbcon->prepare("UPDATE `sellers` SET `firstname` = ?, `lastname` = ?, `emailaddress` = ?, `phonenumber` = ? WHERE `sellers`.`seller_id` = ?");

    //bind parameters
    $statement->bind_param("ssssi", $firstname, $lastname, $emailaddress, $phonenumber, $sellerid);
    //execute the query

    $statement->execute();

    if ($statement->affected_rows == 1) {
      return "success";
    } else {
      return "Oops! something went wrong" . $statement->error;
    }
  }

  function getAllSellers()
  {

    //prepare statement
    $stmt = $this->dbcon->prepare("SELECT * from sellers");

    //execute
    $stmt->execute();
    //get the result set
    $result = $stmt->get_result();

    $data = array();
    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
    }
    return $data;
  }
  function deleteSeller($sellerid)
  {
    $statement = $this->dbcon->prepare("DELETE FROM sellers WHERE seller_id=?");
    //bind statemnet
    $statement->bind_param("i", $sellerid);
    //execute
    $statement->execute();
    if ($statement->affected_rows == 1) {
      return true;
    } else {
      return false;
    }
  }
}
