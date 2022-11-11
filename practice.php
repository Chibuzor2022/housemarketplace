<!DOCTYPE html>
<html lang="en">
<?php include_once "shared/constants.php";
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if (isset($page_title)) {
            echo $page_title . "|";
          } ?><?php if (defined("APP_NAME")) {
                echo APP_NAME;
              } ?></title>
</head>

<body>
  <div>
    copyright &copy; <?php echo date('Y') ?>&NonBreakingSpace;<?php echo APP_NAME ?> All Right Reserved
  </div>
</body>

</html>