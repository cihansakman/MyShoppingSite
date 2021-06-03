<?php

include("includes/connection.php");
include("security.php");
include("includes/header.php");
include("includes/sidebar.php");




?>

    <!-- Begin Page Content -->
    <div class="container-fluid" >

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between  mb-4">
            <h1 class="h3 mb-0 text-gray-800 mr-auto ml-auto" style="margin-top:100px;">Dashboard</h1>
        </div>
        <hr>

        <!-- Content Row -->
        <div class="row" style="margin-top:80px;">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">
                                    Total Customers</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">
                                
                                <!-- We'll get the total num of Customers and echo it-->
                                <?php 
                                
                                $query = "SELECT id FROM users_db WHERE authorization = '0' ORDER BY id";
                                $query_run = mysqli_query($connection, $query);

                                $num = mysqli_num_rows($query_run);

                                echo $num;
                                
                                ?>
                                
                                
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">
                                    Total Admins</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">
                                
                                <!-- We'll get the total num of Customers and echo it-->
                                <?php 
                                
                                $query = "SELECT id FROM users_db WHERE authorization = '1' ORDER BY id";
                                $query_run = mysqli_query($connection, $query);

                                $num = mysqli_num_rows($query_run);

                                echo $num;
                                
                                ?>
                                
                                
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-shield fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1 text-center">
                                    Total Products</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">
                                
                                <!-- We'll get the total num of Products and echo it-->
                                <?php 
                                
                                $query = "SELECT product_id FROM products";
                                $query_run = mysqli_query($connection, $query);

                                $num = mysqli_num_rows($query_run);

                                echo $num;
                                
                                ?>
                                
                                
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 text-center">
                                    Total Categories</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">
                                
                                <!-- We'll get the total num of categories and echo it-->
                                <?php 
                                
                                $query = "SELECT category_id FROM category_table";
                                $query_run = mysqli_query($connection, $query);

                                $num = mysqli_num_rows($query_run);

                                echo $num;
                                
                                ?>
                                
                                
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bookmark fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


   
<?php 
  include("includes/scripts.php");
  include("includes/footer.php");  
    
?>
   

