<?php 
    require_once("../lib/database.php");
    require_once("../auth/user.php");
    require_once("../config/make.php");
    // session_start();
    $database = new Database();
    $userObj = new User($database);
    $makeObj = new Make($database);

    if(isset($_POST['btn_action']) && $_POST['btn_action'] == "register"){
        if ($userObj->emailExists()) {
            echo '<script>';
            echo 'alert("Email is already Exist!");';
            echo 'window.history.back();';
            echo '</script>';
        } else {
            $lastId = $userObj->register();
            header("Location:  ../profile.php?id=$lastId");
            exit();
        }
    }

    if(isset($_POST['btn_action']) && $_POST['btn_action'] == "update_register"){
        $lastId = $userObj->update();
        echo '<script>';
        echo 'alert("Register successfully!");';
        echo '</script>';
        header("Location:  ../login.php");
        exit();
    }

    if(isset($_POST['btn_action']) && $_POST['btn_action'] == "login"){
        $login = $userObj->login();
    }
    
    if(isset($_GET['btn_action']) && $_GET['btn_action'] == "logout"){
        $userObj->logout();
    }

    if(isset($_POST['btn_action']) && $_POST['btn_action'] == "add_manufacturer"){
        $make = $makeObj->add_make();
    }

    if(isset($_POST['btn_action']) && $_POST['btn_action'] == "edit_manufacturer"){
        $make = $makeObj->edit_make();
    }

    if(isset($_POST['btn_action']) && $_POST['btn_action'] == "delete_manufacturer"){
        $make = $makeObj->delete_make();
    }
?>
