<?php
//add constants file

include_once "constants.php";


//classs definition

class User

{
  var $firstname;
  var $lastname;
  var $emailaddress;
  var $password;
  var $phonenumber;

  var $dbcon; //database connection handler



  //memeber functions

  function __construct()
  {
    //connect to mysql database: create object of MySQLi class
    $this->dbcon = new MySQLi(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
    //check if db connection is okay
    if ($this->dbcon->connect_error) {
      die("connection failed " . $this->dbcon->connect_error);
    } else {
      echo "connection successful";
      // echo "<pre>";
      // print_r('connect_error');
      // echo "</pre>";
    }
  }

  #begin insertStudent method

  function insertUser($firstname, $lastname, $emailaddress, $password, $phonenumber,)
  {
    //encrypt password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //prepare statement
    $stmt = $this->dbcon->prepare("INSERT INTO Users(  firstname, lastname,emailaddress, password, phonenumber) VALUES(?,?,?,?,?)");

    //bind parameters

    $stmt->bind_param("sssss", $firstname, $lastname, $emailaddress, $password, $phonenumber);

    $stmt->execute();

    if ($stmt->error) {
      $result = "Oops! something went wrong." . $stmt->error; //delete the error part after production
    } else {
      $result = "success";
    }

    return $result;
  }

  #end insertStudent method

  #begin login method
  function login($emailaddress, $password)
  {

    //prepare statement
    $statement = $this->dbcon->prepare("SELECT * FROM users WHERE emailaddress=?");


    //bind parameter
    $statement->bind_param("s", $emailaddress);


    //execute

    $statement->execute();


    //result set
    $result = $statement->get_result();


    //fetch data from result set

    if ($result->num_rows == 1) {
      //record exist
      $row = $result->fetch_assoc();
      //verify password
      if (password_verify($password, $row['password'])) {

        //password match, then create session variables
        session_start();
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['emailaddress'] = $row['emailaddress'];
        $_SESSION['logger'] = "ekude2010##";
        return true;
      } else {
        //password does not match
        return false;
      }
      // echo "<pre>";
      // print_r($row);
      // echo "</pre>";
    } else {
      //email does not exist
      return false;
    }
  }
  #begin logout method
  function logout()
  {
    session_start();
    session_destroy();
    //redirect the user to the login
    header("Location:login.php");
    exit();
  }
  #end logout method
  function getUsers()
  {
    //prepare statement
    $statement = $this->dbcon->prepare("SELECT * FROM users");
    //execute
    $statement->execute();
    //get result set
    $result = $statement->get_result();

    //check if there are records
    $records = array();
    if ($result->num_rows > 0) {
      //fetch records

      while ($row = $result->fetch_assoc()) {
        $records[] = $row;
      }
      return $records;
    } else {
      return $records;
    }
  }
}
