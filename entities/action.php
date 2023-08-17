<?php 
    require_once("../lib/database.php");
    require_once("../auth/user.php");

    if(isset($_POST['btn_action']) && $_POST['btn_action'] == "register"){
        $email = $_POST['e_mail'];
        $password = $_POST['pass_word'];
        $database = new Database();
        $userObj = new User($database);
        if ($userObj->emailExists($email)) {
            echo '<script>';
            echo 'alert("Email is already Exist!");';
            echo 'window.history.back();';
            echo '</script>';
        } else {
            $lastId = $userObj->register($email, $password);
            header("Location:  ../profile.php?id=$lastId");
            exit();
        }
    }

    if(isset($_POST['btn_action']) && $_POST['btn_action'] == "update_register"){
        $id = $_GET['id'];
        $fullname = $_POST['fullName'];
        $nickname = $_POST['nickName'];
        $birthdate = $_POST['birthDate'];
        $email = $_POST['e_mail'];
        $phone = $_POST['phoneNum'];
        $gender = $_POST['gender'];
        $database = new Database();
        $userObj = new User($database);
        $lastId = $userObj->update($fullname, $nickname, $birthdate, $email, $phone, $gender, $id);
        header("Location:  ../login.php");
        echo '<script>';
        echo '$.notify("Register successfully!", { position: "top right", className: "success" });';
        echo '<script>';
        exit();
    }
?>
