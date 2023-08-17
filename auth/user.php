<?php 
    class User {
        
        private $conn;
        private $userTable = 'users';

        public function __construct(Database $database) {
            $this->conn = $database->getconn();
        }

        public function register() {
            $email = $this->conn->real_escape_string($_POST['e_mail']); // Sanitize the email input
            $password = $_POST['pass_word'];
            $role = 1;
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO {$this->userTable} (e_mail, pass_word, role) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ssi", $email, $hashedPassword, $role); // "ssi" matches the data types of the parameters
            $stmt->execute();
            $lastInsertedId = $stmt->insert_id;
            $stmt->close();
            return $lastInsertedId;
        }
        

        public function emailExists() {
            $email = $this->conn->real_escape_string($_POST['e_mail']); // Sanitize the email input
            $sql = "SELECT COUNT(*) as count FROM {$this->userTable} WHERE e_mail = '$email'";
            $result = $this->conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $data = $result->fetch_assoc();
                return $data['count'] > 0; 
            } else {
                return false;
            }
        }
        
        public function edit(){
            $id = $_GET['id'];
            $sql = "SELECT e_mail FROM {$this->userTable} WHERE id = '$id' LIMIT 1";
            $result = $this->conn->query($sql);
            if($result->num_rows == 1){
                $data = $result->fetch_assoc();
                return $data;
            }else{
                return false;
            }
        }

        public function update(){
            $id = $_GET['id'];
            $fullname = $_POST['fullName'];
            $nickname = $_POST['nickName'];
            $birthdate = $_POST['birthDate'];
            $email = $_POST['e_mail'];
            $phone = $_POST['phoneNum'];
            $gender = $_POST['gender'];
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

        public function login(){
            $email = $this->conn->real_escape_string($_POST['e_mail']);
            $password = $_POST['pass_word'];
            $query = "SELECT id, pass_word, role FROM {$this->userTable} WHERE e_mail = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $storedHashedPassword = $row['pass_word'];
        
                if (password_verify($password, $storedHashedPassword)) {
                    session_start();
                    $_SESSION['ID'] = $row['id'];
                    $_SESSION['Role'] = $row['role'];
                    
                    if ($_SESSION['Role'] === 0) {
                        header("Location: ../admin/index.php");
                        exit();
                    } else {
                        header("Location: ../pages/index.php");
                        exit();
                    }
                } else {
                    echo '<script>';
                    echo 'alert("Incorrect Email or Password!");';
                    echo 'window.history.back();';
                    echo '</script>';
                }
            } else {
                echo '<script>';
                echo 'alert("User not found!");';
                echo 'window.history.back();';
                echo '</script>';
            }
        }
        
        
    }

?>