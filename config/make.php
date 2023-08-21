<?php 
    class Make {
        
        private $conn;
        private $makeTable = 'make';

        public function __construct(Database $database) {
            $this->conn = $database->getconn();
        }

        public function add_make() {
            $make = ucwords($_POST['make']);
            $isExistQuery = "SELECT COUNT(*) as count FROM {$this->makeTable} WHERE make = '$make'";
            $resultExist = $this->conn->query($isExistQuery);
            if ($resultExist && $resultExist->fetch_assoc()['count'] == 0) {
                $insertQuery = "INSERT INTO {$this->makeTable} (make) VALUES('$make')";
                $resultInsert = $this->conn->query($insertQuery);
                if ($resultInsert) {
                    echo '<script>';
                    echo 'alert("Added Successfully!");';
                    echo 'window.history.back();';
                    echo '</script>';
                } else {
                    echo '<script>';
                    echo 'alert("Failed to Insert!");';
                    echo 'window.history.back();';
                    echo '</script>';
                }
            } else {
                echo '<script>';
                echo 'alert("Make Already Exists!");';
                echo 'window.history.back();';
                echo '</script>';
            }
        }

        public function index() {
            $sql = "SELECT * FROM {$this->makeTable}";
            $result = $this->conn->query($sql);
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

        public function edit_make() {
            $id = $_POST['make_id'];
            $make = $_POST['make'];
            $sql = "UPDATE {$this->makeTable} SET make = '$make' WHERE id = '$id'";
            $result = $this->conn->query($sql);        
            if ($result) {
                return true;
            } else {
                return false;
            }
        }

        public function delete_make() {
            $id = $_POST['id']; 
            $sql = "DELETE FROM {$this->makeTable} WHERE id = '$id'";
            $result = $this->conn->query($sql);        
            if ($result) {
                return true; 
            } else {
                return false; 
            }
        }
        
    }

?>