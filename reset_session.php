<?php

session_start();

$user_id = "";
//If user logged in we'll get the user_id info the create special shoppingcart SESSION for the user.
if(isset($_SESSION['user_id'])){
    //We'll call the logged in user's information.
  
    $user_id = $_SESSION['user_id'];
  
  }

$session_name = "shoppingCart".$user_id;
unset($_SESSION[$session_name]);