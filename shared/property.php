<?php
include_once "constants.php";

//class definition
class Property
{

  //member variables
  var $title;
  var $price;
  var $address;
  var $description;
  var $type;
  var $status;
  var $bedroom;
  var $bathroom;
  var $toilet;
  var $state;
  var $lga;
  var $category;
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

  function insertProperty($sellerid, $title, $price, $address, $description, $type, $status, $bedroom, $bathroom, $toilet, $state, $lga, $category)
  {

    //prepare statement

    $statement = $this->dbcon->prepare("INSERT INTO properties(seller_id,title,price,address,description,type,status,bedroom,bathroom,toilet,state,lga,category) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");

    //bind parameters
    $statement->bind_param("issssssssssss", $sellerid, $title, $price, $address, $description, $type, $status, $bedroom, $bathroom, $toilet, $state, $lga, $category);

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
}
