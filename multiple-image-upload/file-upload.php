<?php
include 'database.php';
if (isset($_POST['submit'])) {
  $entension = array("jpeg", "jpg", "png", "gif");
  foreach ($_FILES['image']['name'] as $key => $val) {
    $filename = $_FILES['image']['name'][$key];
    $filename_tmp = $_FILES['image']['tmp_name'][$key];
    echo '<br>';
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $finalimg = '';
    if (in_array($ext, $entension)) {
      if (!file_exists("images/" . $filename)) {
        move_uploaded_file($filename_tmp, "images/" . $filename);
        $finalimg = $filename;
      } else {
        $filename = str_replace('.', '-', basename($filename, $ext));
        echo $newfilename = $filename . time() . "." . $ext;
        $finalimg = $newfilename;
      }
      $creattime = date('Y-m-d h:i:s');
      //insert
      $insertqry = "INSERT INTO `multiple-images`(`image_name`, `image_status`, `image_createtime`) VALUES ($finalimg,$creattime)";
      mysqli_query($con, $insertqry);
      header('Location: index.php');
    } else {
      //display error message
    }
  }
};
