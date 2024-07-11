<?php 
require_once  'configurations.php';
try {
    $con = new PDO(
        "mysql:host=$DATABASE_SERVER_IP;
         dbname=$DATABASE_NAME", 
         $DATABASE_USER_NAME, 
         $DATABASE_USER_PASSWORD
        );
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
?>