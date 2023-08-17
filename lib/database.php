<?php
    class Database {
        private $conn;
        private $hostname = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "cps_db";

        public function __construct() {
            $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);

            // Check for conn errors
            if ($this->conn->connect_errno) {
                die("Database conn failed: " . $this->conn->connect_error);
            }
        }

        public function getconn() {
            return $this->conn;
        }

        public function closeconn() {
            $this->conn->close();
        }
    }
// $database = new Database();
// $conn = $database->getconn();

// You can use $conn for querying the database
// For example:
// $query = "SELECT * FROM your_table";
// $result = $conn->query($query);

// Don't forget to close the conn when you're done
//$database->closeconn();
?>
