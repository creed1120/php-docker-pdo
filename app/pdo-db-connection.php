<?php
    /**
     * PDO Database connection Class
     * 
     */

    class Connection {

        public $conn;

        // Automatically connect to database
        public function __construct() {

            $host = "db";
            $dbname = "php_docker";
            $username = "root";
            $password = "F00tb@ll1120";
        
            try {
                $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                // echo "Connected to $dbname at $host successfully." . "<br>";
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                print "Error: " . $e->getMessage();
                exit;
            }
        }

        public function getData() {
            // Store SQL Query in a variable
            $query = "SELECT * FROM products";
            // Store the database connection from the "dbh.php" file that is required above
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            // Get the actual data that is stored in the "$results" variable
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
    // immediately instantiate the Connection 
    return new Connection();
?>