<?php
if( !session_id() ) {
   session_start();
}
require_once 'vendor/autoload.php';

use function Tamtamchik\SimpleFlash\flash;

flash('<i class="bi bi-check-circle"></i> Save was Successful!', 'success');

   require_once "./pdo-db-connection.php";
   $connection = new Connection;

      if ( isset( $_POST['submit'] ) ) {
         $firstname = $_POST['firstname'];
         $lastname = $_POST['lastname'];
         $address = $_POST['address'];
      }
         
   // Store SQL Query in a variable
   $query = "INSERT INTO search_pdo VALUES( NULL, '$firstname', '$lastname', '$address' )";
   // Store the database connection from the "dbh.php" file that is required above
   $stmt = $connection->conn->prepare($query);
   $stmt->execute();
   
   header('Location: /');