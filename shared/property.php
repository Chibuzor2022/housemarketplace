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
  var $image_name;
  var $property_id;
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
      $result = "Oops something went wrong";
    } else {
      $propertyid = $statement->insert_id;
      $this->insertImage($propertyid);
      $result = "success";
    }

    return $result;
  }


  function insertimage($property_id)
  {
    foreach ($_FILES['image']['name'] as $key => $value) {
      echo "$value";
      $image_name = $_FILES['image']['name'][$key];
      $image_tmp_name = $_FILES['image']['tmp_name'][$key];
      $image_size = $_FILES['image']['size'][$key];
      $image_error = $_FILES['image']['error'][$key];
      $image_type = $_FILES['image']['type'][$key];
      $image_ext = explode('.', $image_name);
      $image_actual_ext = strtolower(end($image_ext));
      $allowed = array('jpg', 'jpeg', 'png', 'gif');
      if (in_array($image_actual_ext, $allowed)) {
        if ($image_error === 0) {
          if ($image_size < 2000000) {
            $image_new_name = uniqid('', true) . "." . $image_actual_ext;
            $image_destination = "uploads/" . $image_new_name;
            move_uploaded_file($image_tmp_name, $image_destination);
            $statement = $this->dbcon->prepare("INSERT INTO images(property_id,image_name) VALUES(?,?)");
            $statement->bind_param("is", $property_id, $image_new_name);
            $statement->execute();
          } else {
            echo "Your file is too big";
          }
        } else {
          echo "There was an error uploading your file";
        }
      } else {
        echo "You cannot upload files of this type";
      }
    }
  }
  // #begin getAllProperties method
  function getAllProperties()
  {
    //prepare statement

    $statement = $this->dbcon->prepare("SELECT * FROM properties JOIN sellers ON properties.seller_id=sellers.seller_id JOIN images ON properties.property_id=images.property_id GROUP BY properties.property_id");

    //execute
    $statement->execute();
    //get result set
    $result = $statement->get_result();
    //
    $records = array();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $records[] = $row;
      }
    }
    return $records;
  }
  #end getAllProperties method

  #begin getLatestProperties method
  function getLatestProperties()
  {
    //prepare statement

    $statement = $this->dbcon->prepare("SELECT * FROM properties JOIN sellers ON properties.seller_id=sellers.seller_id JOIN images ON properties.property_id=images.property_id GROUP BY properties.property_id DESC LIMIT 3");

    //execute
    $statement->execute();
    //get result set
    $result = $statement->get_result();
    //
    $records = array();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $records[] = $row;
      }
    }
    return $records;
  }
  // end getLatestProperties method



  // start getMyProperties to appear to only those who listed them


  function getMyProperties($sellerid)
  {
    //prepare statement
    $statement = $this->dbcon->prepare("SELECT * FROM properties JOIN sellers ON properties.seller_id=sellers.seller_id JOIN images ON properties.property_id=images.property_id WHERE properties.seller_id=? GROUP BY properties.property_id");

    //bind parameters
    $statement->bind_param("i", $sellerid);

    //execute
    $statement->execute();
    //get result set
    $result = $statement->get_result();
    //
    $records = array();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $records[] = $row;
      }
    }
    return $records;
  }
  // end: get properties to appear to only those who listed them

  # start of a function for properties that are for sale

  function getForSaleProperties()
  {
    //prepare statement
    $statement = $this->dbcon->prepare("SELECT * FROM properties JOIN sellers ON properties.seller_id=sellers.seller_id JOIN images ON properties.property_id=images.property_id WHERE properties.category='sale' GROUP BY properties.property_id");

    //execute
    $statement->execute();
    //get result set
    $result = $statement->get_result();
    //
    $records = array();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $records[] = $row;
      }
    }
    return $records;
  }
  # end of a function for properties that are for sale

  function getForSaleProperties2($state)
  {

    $statement = $this->dbcon->prepare("SELECT * FROM properties JOIN images ON properties.property_id=images.property_id WHERE state LIKE ? GROUP BY properties.property_id");


    $statement->bind_param('s', $state);

    //execute
    $statement->execute();
    //get result set
    $result = $statement->get_result();
    //
    $data = array();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
    }
    return $data;
  }

  # start of a function for properties that are for rent

  function getForRentProperties()
  {


    $statement = $this->dbcon->prepare("SELECT * FROM properties JOIN sellers ON properties.seller_id=sellers.seller_id JOIN images ON properties.property_id=images.property_id WHERE properties.category='rent'GROUP BY properties.property_id");

    //execute
    $statement->execute();
    //get result set
    $result = $statement->get_result();
    //
    $records = array();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $records[] = $row;
      }
    }
    return $records;
  }


  function getForRentProperties2($state)
  {

    $statement = $this->dbcon->prepare("SELECT * FROM properties JOIN images ON properties.property_id=images.property_id WHERE state LIKE ? GROUP BY properties.property_id");


    $statement->bind_param('s', $state);

    //execute
    $statement->execute();
    //get result set
    $result = $statement->get_result();
    //
    $data = array();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
    }
    return $data;
  }


  #start delete property

  function deleteProperty($propertyid)
  {
    $statement = $this->dbcon->prepare("DELETE FROM properties WHERE property_id=?");

    //bind statemnet
    $statement->bind_param("i", $propertyid);
    //execute
    $statement->execute();
    if ($statement->affected_rows == 1) {
      return true;
    } else {
      return false;
    }
  }
  #end delete property

  #start update property
  function updateProperty($title, $price, $address, $description, $type, $status, $bedroom, $bathroom, $toilet, $state, $lga, $category, $propertyid)
  {
    //prepare statement
    $statement = $this->dbcon->prepare("UPDATE `properties` SET `title` = ?, `price` = ?, `address` = ?, `description` = ?, `type` = ?,`status`=?, `bedroom` = ?, `bathroom` = ?, `toilet` = ?, `state` = ?, `lga` = ?, `category` = ? WHERE `properties`.`property_id` = ?;");
    //bind parameters
    $statement->bind_param("ssssssssssssi",  $title, $price, $address, $description, $type, $status, $bedroom, $bathroom, $toilet, $state, $lga, $category, $propertyid,);
    //execute statement
    $statement->execute();
    //get result
    if ($statement->affected_rows == 1) {
      return "success";
    } else {
      return "Oops! something went wrong" . $statement->error;
    }
  }
  #end update property

  #start getProperty
  function getProperty($propertyid)
  {
    //prepare the statement
    $statement = $this->dbcon->prepare("SELECT* FROM properties WHERE property_id=?");
    //bind parameter
    $statement->bind_param("i", $propertyid);
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
  #end getProperty
  function getAllProperties2($id)
  {
    //prepare statement


    $statement = $this->dbcon->prepare("SELECT * FROM properties JOIN sellers ON properties.seller_id=sellers.seller_id WHERE property_id=?");

    //bind parameter
    $statement->bind_param("i", $id);

    //execute stament
    $statement->execute();

    //get result set
    $result = $statement->get_result();
    //
    $records = array();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $records[] = $row;
      }
    }
    return $records;
  }

  #start getAllImages
  function getAllImages($id)
  {
    //prepare statement
    $stmt = $this->dbcon->prepare("SELECT * from images WHERE property_id=? LIMIT 2");

    //bind parameter
    $stmt->bind_param("i", $id);

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
  #end getAllImages
  function getImage($id)
  {
    //prepare statement
    $stmt = $this->dbcon->prepare("SELECT * from images WHERE property_id=?");

    //bind parameter
    $stmt->bind_param("i", $id);

    //execute
    $stmt->execute();
    //get the result set
    $result = $stmt->get_result();

    $data = array();
    if ($result->num_rows == 1) {

      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
    }
    return $data;
  }
}
