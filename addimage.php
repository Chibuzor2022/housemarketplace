<?php include_once "portalheader.php";


include_once "shared/constants.php";

if (isset($_POST['submit'])) {

  $uploadsDir = "uploads/";
  $allowedFileType = array('jpg', 'png', 'jpeg');

  // Velidate if files exist
  if (!empty(array_filter($_FILES['fileUpload']['name']))) {

    // Loop through file items
    foreach ($_FILES['fileUpload']['name'] as $id => $val) {
      // Get files upload path
      $fileName        = $_FILES['fileUpload']['name'][$id];
      $tempLocation    = $_FILES['fileUpload']['tmp_name'][$id];
      $targetFilePath  = $uploadsDir . $fileName;
      $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
      $uploadDate      = date('Y-m-d H:i:s');
      $uploadOk = 1;
      if (in_array($fileType, $allowedFileType)) {
        if (move_uploaded_file($tempLocation, $targetFilePath)) {
          $sqlVal = "('" . $fileName . "', '" . $uploadDate . "')";
        } else {
          $response = array(
            "status" => "alert-danger",
            "message" => "File coud not be uploaded."
          );
        }
      } else {
        $response = array(
          "status" => "alert-danger",
          "message" => "Only .jpg, .jpeg and .png file formats allowed."
        );
      }
      // Add into MySQL database
      if (!empty($sqlVal)) {
        $insert = $conn->query("INSERT INTO user (images, date_time) VALUES $sqlVal");
        if ($insert) {
          $response = array(
            "status" => "alert-success",
            "message" => "Files successfully uploaded."
          );
        } else {
          $response = array(
            "status" => "alert-danger",
            "message" => "Files coudn't be uploaded due to database error."
          );
        }
      }
    }
  } else {
    // Error
    $response = array(
      "status" => "alert-danger",
      "message" => "Please select a file to upload."
    );
  }
}
?>

?>


<script type="text/javascript" src="js/jQuery/jquery-3.6.1.min.js"></script>
<script>
  $(function() {
    // Multiple images preview with JavaScript
    var multiImgPreview = function(input, imgPreviewPlaceholder) {
      if (input.files) {
        var filesAmount = input.files.length;
        for (i = 0; i < filesAmount; i++) {
          var reader = new FileReader();
          reader.onload = function(event) {
            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
          }
          reader.readAsDataURL(input.files[i]);
        }
      }
    };
    $('#chooseFile').on('change', function() {
      multiImgPreview(this, 'div.imgGallery');
    });
  });
</script>

<?php include_once "portalfooter.php" ?>