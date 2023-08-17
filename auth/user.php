<?php 
    class User {
        private $conn;
        private $userTable = 'users';

        public function __construct(Database $database) {
            $this->conn = $database->getconn();
        }

        public function register($email, $password) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO {$this->userTable} (e_mail, pass_word) VALUES (?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ss", $email, $hashedPassword);
            $stmt->execute();
            $lastInsertedId = $stmt->insert_id;
            $stmt->close();
            return $lastInsertedId;
        }

        public function emailExists($email) {
            $email = $this->conn->real_escape_string($email); // Sanitize the email input
            $sql = "SELECT COUNT(*) as count FROM {$this->userTable} WHERE e_mail = '$email'";
            $result = $this->conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $data = $result->fetch_assoc();
                return $data['count'] > 0; 
            } else {
                return false;
            }
        }
        

        public function edit($id){
            $sql = "SELECT e_mail FROM {$this->userTable} WHERE id = '$id' LIMIT 1";
            $result = $this->conn->query($sql);
            if($result->num_rows == 1){
                $data = $result->fetch_assoc();
                return $data;
            }else{
                return false;
            }
        }

        public function update($fullname, $nickname, $birthdate, $email, $phone, $gender, $id){
            $formattedDate = date("Y-m-d", strtotime($birthdate));
            $sql = "UPDATE {$this->userTable} 
                SET full_name = '$fullname', nick_name = '$nickname', birth_date = '$formattedDate',
                    e_mail = '$email', phone_num = '$phone', gender = '$gender'
                WHERE id = $id";
            $result = $this->conn->query($sql);
            if ($result) {
                return true; // Update successful
            } else {
                return false; // Update failed
            }
        }
        
    }

?>