<?php
session_start();

    include("includes/connection.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //IF STH POSTED(login button clicked)
    
        //Get the variables from form
       $email = $_POST['email_login'];
       $password = $_POST['password_login'];
       
    
       if(!empty($email) && !empty($password)){
            //read from db
            $query = "SELECT * from users_db WHERE user_email = '$email' AND authorization = '0' limit 1";
            $result = mysqli_query($con, $query);
    
            if($result){
                if($result && mysqli_num_rows($result) > 0){
    
                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password){
                        
                        //when user logged in we will keep the user_id info in a SESSION
                        $_SESSION['user_id'] = $user_data['id'];
                        header("Location: index.php");
                        die;
                    }
                    
                }
            }
            
            $_SESSION['status'] = 'Email or password invalid!';
       }else{
        $_SESSION['status'] = 'You cannot use this email address!';
       }
    
    
    }
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>

    <link rel="stylesheet" href="CSS/login_register.css">
  </head>
  <body style="background-color:#a29abf;">

    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <img src="images/login-imgg.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 px-5 pt-5">
                <div class="img-container mb-5" style="text-align: center;">
                    <img src="images/cishop-01.png" alt="Cishop" style=" width:250px; /* you can use % */ height: auto;">
                </div>    
                <h4>Sign into your account</h4>

                    <?php 

  //If login failed
  if(isset($_SESSION['status']) && $_SESSION['status'] != ''){

    //Print the erorr message and unset the SESSION
    echo '<div class="alert alert-danger justify-content-center col-lg-12" role="alert"> <strong>
    '.$_SESSION['status'] .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>'; 
    unset($_SESSION['status']);
}

  ?>

                    
                    <form method="post">
                        <div class="form-row">
                            <div class="col-lg-12">
                                <input type="email" placeholder="Email-address" name="email_login" class="form-control my-3 p-4" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-12">
                                <input type="password" placeholder="****" name="password_login" class="form-control  my-3 p-4" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-12">
                            <input type="submit" class="btn1 mt-3 mb-2" value="Log in"></input>
                            </div>
                        </div>

                        <p class="text-center" style="margin-left:auto; margin-right:auto; margin-bottom:0 !important;">or</p>

                        <div class="form-row">
                            <div class="col-lg-12">
                            <input id="admin_login" type="button" class="btn1 mt-3 mb-2" value="Go to Admin Panel" style="margin-top=0 !important;"></input>
                            </div>
                        </div>

                        <hr width="82%"
                        size="10">
                        


                        <p class="text-center" >Don't have an account? <a href="register.php">Register here</a></p>

                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="JavaScripts/basket.js"></script>
</body>
</html>