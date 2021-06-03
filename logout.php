<?php 

session_start();

//If we just unset login session it'll be enough.
if(isset($_SESSION['user_id'])){
    unset($_SESSION['user_id']);
}

//Redirect to the login page
header("Location: login.php");
die;
?>