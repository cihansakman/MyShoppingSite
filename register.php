<?php
session_start();

    include("includes/connection.php");

    //If there is a post request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //IF STH POSTED

        //Get the variables from form
       $name = $_POST['name_register'];
       $surname = $_POST['surname_register'];
       $email = $_POST['email_register'];
       $password = $_POST['password_register'];
       

        $query = "SELECT * FROM users_db WHERE user_email = '$email'";
        $query_run = mysqli_query($con, $query);

        //That's mean there is another user with that email. Set an error message.
       if(mysqli_num_rows($query_run) >0){
        $_SESSION['status'] = 'You cannot use this email address!';
        header('Location: register.php'); 
        
       }

       //Password length should be more than 6 
       else if(strlen($password) <= 6){
        $_SESSION['status'] = 'Password length should be more than 6!';
       }

       else if(!is_numeric($name) && !is_numeric($surname)){
            //save to db
            //We'll assign number user_id for our users
            $query = "INSERT INTO users_db (password, user_name, user_surname, user_email) VALUES ('$password','$name','$surname','$email')";

            mysqli_query($con, $query);

            //After signup is successfull redirect to login page
            header("Location: login.php");
            die;
       }else{
        $_SESSION['status'] = 'Enter valid information!';
        header('Location: register.php'); 
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
  <body>

    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
            <div class="col-lg-6">
                    <img src="images/koridor.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 px-5 pt-5">
            <div class="img-container mb-5" style="text-align: center;">
                    <img src="images/cishop-01.png" alt="Cishop" style=" width:250px; /* you can use % */ height: auto;">
                </div> 
                    <h4>Create an Account</h4>
    
                    

<?php         
  //If register failed
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
                                <input type="text" placeholder="Name" name="name_register" class="form-control my-3 p-4" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-12">
                                <input type="text" placeholder="Surname" name="surname_register" class="form-control  my-3 p-4" required>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-lg-12">
                                <input type="email" placeholder="Email address" name="email_register" class="form-control  my-3 p-4" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-12">
                                <input type="password" placeholder="****" name="password_register" class="form-control  my-3 p-4" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-12">
                                <input type="submit" class="btn1 register-btn mt-3 mb-2" value="Register"></input>
                            </div>
                        </div>
                        <hr width="100%"
                        size="10">
                        <p>Already have an account? <a href="login.php">Log in</a></p>

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
  </body>
</html>