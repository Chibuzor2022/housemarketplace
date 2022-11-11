<?php
if (isset($_REQUEST['btnCancel'])) {


  //redirect to allproperties.php

  header("Location: allsellers.php");
  exit();
}
if (isset($_REQUEST['btnDelete'])) {
  //add property class
  include_once "shared/seller.php";

  // create object of the property class
  $sellerobj = new Seller();
  $output = $sellerobj->deleteSeller($_REQUEST['sellerid']);


  if ($output === true) {
    $status = "success";
    $msg = "Seller was successfullly deleted";
  } else {
    $status = "failed";
    $msg = "Oops something went wrong";
  }
  //redirect to allsellers.php
  header("Location:allsellers.php?msg=$msg&status=$status");
  exit();
}
