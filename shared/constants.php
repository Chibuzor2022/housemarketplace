
 <?php
  //database commection constants
  define("DB_HOST", "localhost");
  define("DB_USERNAME", "root");
  define("DB_PASSWORD", "");
  define("DB_DATABASE_NAME", "housemarketplace");


  //application constants

  define("APP_NAME", "House Marketplace");


  #begin sanitize method
  function sanitizeInput($data)
  {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = addslashes($data);

    return $data;
  }
 #end sanitize method   
