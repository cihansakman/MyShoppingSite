<?php
include("includes/connection.php");
session_start();


if(isset($_POST['editprofile_submit_btn'])){
    $user_id = $_POST['edit_user_id'];
    $name = $_POST['editprofile_name'];
    $surname = $_POST['editprofile_surname'];
    $email = $_POST['editprofile_email'];


    if(!isset($name) || trim($name) == '' || !isset($surname) || trim($surname) == '' || !isset($email) || trim($email) == ''){
        $_SESSION['status'] = "Please fill all the necessary inputs!";
        header("Location: editprofile.php");
    }
    else{
        //Update db
    $query = "UPDATE users_db SET user_name = '$name', user_surname = '$surname', user_email = '$email' WHERE id = '$user_id'";
    $query_run = mysqli_query($con, $query);

    //If update successful
    if($query_run){
        $_SESSION['success'] = "Profile is Updated";
        header("Location: editprofile.php");
    }else{
        $_SESSION['status'] = "Profile could NOT Updated";
        header("Location: editprofile.php");
    }
    }

    

}


//Edit password button clicked
if(isset($_POST['edit_pass_submit_btn'])){
    $user_id = $_POST['edit_pass_user_id'];
    $newPass = $_POST['edit_pass_newPassword'];
    $cNewPass = $_POST['edit_pass_cNewPassword'];

    if($newPass === $cNewPass && isset($newPass) && isset($cNewPass) && trim($newPass) != '' && trim($cNewPass) != '' ){

        //Delete from db
        $query = "UPDATE users_db SET password = '$newPass' WHERE id = '$user_id'";
        $query_run = mysqli_query($con, $query);
    
        //If Updated successful
        if($query_run){
            $_SESSION['success'] = "Password is Updated";
            header("Location: editprofile.php");
        }else{
            $_SESSION['status'] = "Password could NOT Updated";
            header("Location: editprofile.php");
        }
    }else{
        $_SESSION['status'] = "Password could NOT Updated";
        header("Location: editprofile.php");
    }




}

//If cancel button is clicked in the Edit Profile page.
if(isset($_POST['editprofile_cancel_btn'])){
    header("Location: index.php");
}



//Pay and Buy button Clicked in the Basket page
if(isset($_POST['basket_pay_and_buy_btn'])){
    $user_id = $_POST['payment_user_id'];

    //We'll clean the basket session of user and redirect it to the basket page again.
    $session_name = "shoppingCart" .$user_id;

    if(isset($_SESSION[$session_name])){

    //Print a success message
    $_SESSION['success'] = 'Your payment was successfull!';

    //We'll unset the SESSION
    unset($_SESSION[$session_name]);
    header("Location: basket.php");
    
    }



}

?>
