<?php 

include("includes/connection.php");
include("security.php");

#************ ADMINS PANELS SECTION ***************#
//If registerbtn clicked
if(isset($_POST['registerbtn'])){
    $username = $_POST['username'];
    $usersurname = $_POST['usersurname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    if($password === $cpassword){
        $query = "INSERT INTO users_db (password,user_name,user_surname,user_email,authorization) VALUES ('$password', '$username','$usersurname','$email','1')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run){
            $_SESSION['success'] = 'Admin profile added';
            header('Location: register.php'); 
        }else{
            $_SESSION['status'] = 'Admin profile not added';
            header('Location: register.php'); 
        }
    
    }else{
        $_SESSION['status'] = "Password doesn't match!";
        header('Location: register.php'); 
    }
}


//If admin_delete_btn clicked
if(isset($_POST['delete_btn'])){
    //Take the id from text input
    $id = $_POST['delete_id'];

    //Delete from db
    $query = "DELETE FROM users_db WHERE id = '$id' ";
    $query_run = mysqli_query($connection, $query);

    //If deleted successful
    if($query_run){
        $_SESSION['success'] = "Admin is Deleted";
        header("Location: register.php");
    }else{
        $_SESSION['status'] = "Admin is NOT Deleted";
        header("Location: register.php");
    }
}




#************ ADMIN LOGIN AND LOGOUT SECTION ***************#

//If there is POST request from ADMIN LOGIN page we'll check it
if(isset($_POST['admin_login_btn'])){
    $email_login = $_POST['admin_email'];
    $password_login = $_POST['admin_password'];

    $query = "SELECT * FROM users_db WHERE authorization = '1' AND password = '$password_login' AND user_email='$email_login'";
    $query_run = mysqli_query($connection, $query);
    $admin = mysqli_fetch_array($query_run);
    if($admin){
        $_SESSION['admin_username'] = $admin['id'];
        header('Location: index.php');
        die;
    }else{
        $_SESSION['status'] = "Password / email is invalid";
        header('Location: login.php');
        die;
    }
}
//If admin logged out unset the SESSION.
if(isset($_POST['admin_logout_btn'])){
    unset($_SESSION['admin_username']);
    header("Location: login.php");
    die;

}






#************ EDIT ADMIN PROFILE SECTION ***************#

//If EDIT (MY PROFILE) ADMIN UPDATE button clicked.
if(isset($_POST['edit_admin_btn'])){

    //Take the product info from text input
    $id = $_POST['edit_admin_id'];
    $admin_name = $_POST['edit_admin_name'];
    $admin_surname = $_POST['edit_admin_surname'];
    $admin_email = $_POST['edit_admin_email'];
    
    //Update db
    $query = "UPDATE users_db SET user_name = '$admin_name', user_surname = '$admin_surname', user_email = '$admin_email' WHERE id = '$id'";
    $query_run = mysqli_query($connection, $query);

    //If update successful
    if($query_run){
        $_SESSION['success'] = "Profile is Updated";
        header("Location: edit_my_admin.php");
    }else{
        $_SESSION['status'] = "Profile could NOT Updated";
        header("Location: edit_my_admin.php");
    }
}




//If CHANGE PASSWORD (MY PROFILE) ADMIN UPDATE button clicked.
if(isset($_POST['edit_admin_password_btn'])){

    //Take the product info from text input
    $id = $_POST['edit_admin_id'];
    $admin_confirmNewPassword = $_POST['edit_admin_confirmNewPassword'];
    $admin_newPassword = $_POST['edit_admin_newPassword'];

    if($admin_confirmNewPassword === $admin_newPassword){
    //Delete from db
    $query = "UPDATE users_db SET password = '$admin_newPassword' WHERE id = '$id'";
    $query_run = mysqli_query($connection, $query);

    //If Updated successful
    if($query_run){
        $_SESSION['success'] = "Password is Updated";
        header("Location: change_admin_password.php");
    }else{
        $_SESSION['status'] = "Password could NOT Updated";
        header("Location: change_admin_password.php");
    }
}else{
    $_SESSION['status'] = "Passwords Doesn't Match";
    header("Location: change_admin_password.php");
}

}




#************ CATEGORY SECTION ***************#
//If add category button clicked and saved
if(isset($_POST['addCategoryBtn'])){
    $category_name = $_POST['categoryname'];
    $category_desc = $_POST['categorydesc'];

    $query = "INSERT INTO category_table (category_name, category_desc) VALUES ('$category_name', '$category_desc')";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['success'] = 'New Category added';
        header('Location: category.php'); 
    }else{
        $_SESSION['status'] = 'New Category could not added';
        header('Location: category.php'); 
    }

}


//If delete_category_btn clicked
if(isset($_POST['delete_category_btn'])){
    //Take the id from text input
    $id = $_POST['delete_category_id'];

    //Delete from db
    $query = "DELETE FROM category_table WHERE category_id = '$id' ";
    $query_run = mysqli_query($connection, $query);

    //If deleted successful
    if($query_run){
        $_SESSION['success'] = "Category is Deleted";
        header("Location: category.php");
    }else{
        $_SESSION['status'] = "Category could't NOT Deleted";
        header("Location: category.php");
    }
}


?>
