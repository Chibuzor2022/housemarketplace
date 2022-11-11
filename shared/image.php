<?php include_once "constants.php";


class Image
{

  //memebervariables
  var $image_id;
  var $property_id;
  var $image_name;
  var $dbcon;

  //Member functions
  function __construct()
  {
    $this->dbcon = new MySQLi(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
    if ($this->dbcon->connect_error) {
      die("connection failed" . $this->dbcon->connect_error);
    } else {
      echo "connection successful";
    }
  }
  function insertImage($property_id, $image_name)
  {
    //prepare statement
    $statement = $this->dbcon->prepare("INSERT INTO images(property_id,image_name) VALUES(?,?)");
    //bind parameters
    $statement->bind_param("is", $property_id, $image_name);
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
