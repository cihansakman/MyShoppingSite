<?php
// Turn off all error reporting
error_reporting(0);
//Start a SESSION
session_start();

    include 'connection.php';

  


if(isset($_SESSION['user_id'])){
    //We'll call the logged in user's information.

    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM users_db WHERE id = '$user_id' ";
    $result = mysqli_query($con, $query);

    if($result){
        if($result && mysqli_num_rows($result) > 0){

            $user_data = mysqli_fetch_assoc($result);
            
            $user_name = $user_data['user_name'];
            $user_surname = $user_data['user_surname'];
            
        }
    }
}else{
  $user_name = 'Login';
}



?>

<div class="container-fluid px-md-5" >
			<div class="row justify-content-between">
				<div class="col-md-8 order-md-last">
					<div class="row">
						<div class="col-md-6 text-center">
							<img src="images/cishop-01.png" style="width:150px; margin-right:40px;">
						</div>
                        <!-- Search -->
						<div class="col-md-6 d-md-flex justify-content-end mb-md-0 mb-3">
							<form action="#" class="searchform order-lg-last">
			          <div class="form-group d-flex">
			            <input type="text" class="form-control pl-3" placeholder="Search">
			            <button type="submit" class="form-control search"><span class="fa fa-search"></span></button>
			          </div>
			        </form>
						</div>
					</div>
				</div>
				<div class="col-md-4 d-flex">
					<div class="social-media">
		    		<p class="mb-0 d-flex">
		    		
            </p>
	        </div>
				</div>
			</div>
		</div>


    <!-- START NAV -->


		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container-fluid">
	    
        <!-- Responsive -->
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav" >
          <div class="navbar-nav mr-auto">
            <div class="social-media">
              <p class="mb-0 d-flex">
                <a href="https://www.linkedin.com/in/cihan-sakman-245693168/" class="d-flex align-items-center justify-content-center"><span class="fa fa-linkedin"><i class="sr-only">LinkedIn</i></span></a>
                <a href="https://twitter.com/LOTCss" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                <a href="https://www.instagram.com/cihansakman/" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
              </p>
            </div>
          </div>


          <div class="navbar-nav mx-auto">
            <ul class="navbar-nav">
              <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
  
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="#">Rock Music</a>
                  <a class="dropdown-item" href="#">R&B</a>
                  <a class="dropdown-item" href="#">Turkish</a>
                  <a class="dropdown-item" href="#">Pop</a>
                </div>
              </li>
  
              <li class="nav-item"><a href="#" class="d-flex align-items-center justify-content-center nav-link" id="play-music">
                <audio class="musicOn" id="music-audio" style="display:none;" src="audios/Sixto Rodriguez - Sugar Man (320  kbps).mp3" controls loop></audio>
              <span class="fa fa-music fa-lg"><i class="sr-only">Music</i></span></a></li>
              <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
              <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
            </ul>
  
          </div>


          <div class="navbar-nav ml-auto">
            <div class="basket-login">
              <p class="mb-0 d-flex">

              <a href="logout.php" class="basket-login-cover nav-link d-flex align-items-center justify-content-center">
                <span><i class="fa fa-sign-out fa-lg "></i>Log out</span>
                
                </a>


                <a href="login.php" class="basket-login-cover nav-link d-flex align-items-center justify-content-center" >
                <span><i class="fa fa-user fa-lg "></i><?php echo $user_name . " "?></span>
                
                </a>
                

                <a href="basket.php" class="basket-login-cover nav-link d-flex align-items-center justify-content-center">
                  <span>
                  <i class="fa fa-shopping-cart fa-lg" >
                  <span id="basket-cart-quantity" class="badge badge-pill badge-danger">0</span>
                  </i>Cart
                </span></a>
              </p>
            </div>
          </div>
      
	      </div>
	    </div>
	  </nav>