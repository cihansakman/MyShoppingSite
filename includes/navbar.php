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

                  <?php 
                        $query = "SELECT * FROM category_table ";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) >0 ){
                          while($row = mysqli_fetch_assoc($query_run)){
                  ?>
                  <!-- We'll take the selected category id with the POST method and show the specific category-->
                  <form action="category.php" method="POST">
                  <input type="hidden" name="selected_category_id" value="<?php echo $row['category_id']; ?>">
                  <button class="dropdown-item" name="category_select_btn" type="submit"> <?php echo $row['category_name'];?> </button>
                  </form>
                  <?php }} ?>
                </div>
              </li>
  
              <li class="nav-item"><a href="#" class="d-flex align-items-center justify-content-center nav-link" id="play-music">
                <audio class="musicOn" id="music-audio" style="display:none;" src="audios/Sixto Rodriguez - Sugar Man (320  kbps).mp3" controls loop></audio>
              <span class="fa fa-music fa-lg"><i class="sr-only">Music</i></span></a></li>
              <li class="nav-item"><a href="#about-us-footer" class="nav-link">Blog</a></li>
              <li class="nav-item"><a href="#about-us-footer" class="nav-link">Contact</a></li>
            </ul>
  
          </div>


        <div class="navbar-nav ml-auto">
          <ul class="navar-nav d-flex basket-login">
            <!-- <div class="basket-login "> -->
              <!-- <p class="mb-0 d-flex"> -->

                <li class="nav-item dropdown" style="list-style:none;">

                <!-- If user didn't login we'll redirect it login page after click the Login button and don't show the dropdowns -->
                <?php if($user_name == 'Login'){ ?>
                <a href="login.php" class="basket-login-cover nav-link d-flex align-items-center justify-content-center">        
                <span><i class="fa fa-user fa-lg mr-1"></i><?php echo $user_name . " "?></span>
                </a>
                <?php }else{ ?>

                
                <a href="login.php" class="basket-login-cover nav-link d-flex align-items-center justify-content-center dropdown-toggle" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >        
                <span><i class="fa fa-user fa-lg mr-1"></i><?php echo $user_name . " "?></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown07">
                            <a  class="dropdown-item" href="editprofile.php">Edit Profile<span><i class="fa fa-cog fa-lg ml-1"></i></span></a>
                            <a  class="dropdown-item" href="logout.php">Logout<span><i class="fa fa-sign-out fa-lg ml-4"></i></span></a>
                </div>
                <?php } ?>
                </li>
                
                <li style="list-style:none;">
                <a href="basket.php" class="basket-login-cover nav-link d-flex align-items-center justify-content-center">
                  <span>
                  <i class="fa fa-shopping-cart fa-lg mr-2" >
                  </i>Cart
                </span></a>

                </li>

              <!-- </p> -->
            <!-- </div> -->
            </ul>
          </div>
      
	      </div>
        </div>
	    </div>
	  </nav>

    </section>