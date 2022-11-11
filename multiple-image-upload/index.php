<?php
include_once "file-upload.php"

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <title>Multiple image upload</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Multiple image upload</h2>
        <form action="file-upload.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Image One</label>
            <input type="file" name="image[]" class=" form-control">
          </div>
          <div class="form-group">
            <label>Image two</label>
            <input type="file" name="image[]" class=" form-control">
          </div>
          <div class="form-group">
            <label>Image Three</label>
            <input type="file" name="image[]" class=" form-control">
          </div>
          <div class="form-group">
            <label>Image Four</label>
            <input type="file" name="image[]" class="form-control">
          </div>
          <div class="form-group">
            <label>Image Five</label>
            <input type="file" name="image[]" class=" form-control">
          </div>
          <input type="submit" name="submit" value="submit" class="btn btn-primary">

        </form>
      </div>
    </div>



    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>