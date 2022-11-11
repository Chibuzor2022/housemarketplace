<!DOCTYPE html>
<html lang="en">
<?php include_once "shared/constants.php" ?>

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <footer class="bg-dark" style="margin-top:300px">
    <div class="container">
      <div class="row">

        <div>copyright &copy; <?php echo date('Y') ?> &nbsp;
          <?php echo APP_NAME; ?>. All rights reserved</div>
      </div>
      <div class="col" id="socials">
        <a href="http://www.facebook.com" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
        <a href="http://www.twitter.com" target="_blank"><i class="fab fa-twitter fa-2x"></i></a>
        <a href="http://www.youtube.com" target="_blank"><i class="fab fa-youtube fa-2x"></i></a>
        <a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-2x"></i></a>
      </div>
    </div>
  </footer>


  <script src="js/bootstrap.bundle.js"></script>
</body>

</html>