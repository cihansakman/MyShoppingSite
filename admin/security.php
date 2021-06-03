<?php 

session_start();

//Check if the admin logged in

if(isset($_SESSION['admin_username'])){
    
}else{
    header('Location: login.php');
}
?>
