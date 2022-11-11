<?php
if (isset($_REQUEST['btnCancel'])) {


  //redirect to allproperties.php

  header("Location: allproperties.php");
  exit();
}
if (isset($_REQUEST['btnDelete'])) {
  //add property class
  include_once "shared/property.php";

  // create object of the property class
  $propertyobj = new Property();
  $output = $propertyobj->deleteProperty($_REQUEST['propertyid']);


  if ($output === true) {
    $status = "success";
    $msg = "Property was successfullly deleted";
  } else {
    $status = "failed";
    $msg = "Oops something went wrong";
  }
  //redirect to allproperties.php
  header("Location:allproperties.php?msg=$msg&status=$status");
  exit();
}
