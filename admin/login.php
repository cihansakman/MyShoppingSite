<?php 
session_start();
include("includes/header.php");
include("includes/connection.php")
?>


<div class="container" style="margin-top:50px;">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Admin Login Panel</h1>
                            </div>

                            <?php 
                                //If login failed
                                if(isset($_SESSION['status']) && $_SESSION['status'] != ''){

                                    //Print the success message and unset the SESSION
                                    echo '<div class="alert alert-danger justify-content-center" role="alert"> <strong>
                                    '.$_SESSION['status'] .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  </div>'; 
                                    unset($_SESSION['status']);
                                }

                            ?>

                            <!-- We'll send the form info to code.php and make the arragments in there. -->
                            <form class="user" action="code.php" method="POST">

                                <div class="form-group">
                                    <input type="email" name="admin_email" class="form-control form-control-user"
                                        placeholder="Enter Email Address...">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="admin_password" class="form-control form-control-user"
                                    placeholder="Password">
                                </div>
                            
                                <button type="submit" name="admin_login_btn" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                           
                            
                            </form>
                            <hr>
                            
                            <div class="text-center">
                                <a class="small" href="../login.php">Login as Customer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>




<?php 
  include("includes/scripts.php"); 
?>