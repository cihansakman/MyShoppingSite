<!doctype html>
<html lang="en">
  <head>
  	<title>My Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="images/cishop-01.png">
	
  <link rel="stylesheet" href="CSS/navbar.css">
  <link rel="stylesheet" href="CSS/general.css">
  <link rel="stylesheet" href="CSS/footer.css">
  <link rel="stylesheet" href="CSS/editprofile.css">

 

	</head>

<?php 
include 'includes/connection.php';
session_start();
include('includes/functions.php') ;
include 'includes/navbar.php';
include 'includes/editprofile.php';
?>


	<body style="background-color: #ededed">

<link rel="stylesheet" href="CSS/basket.css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>



<?php 
// We'll take the logged in user_id and we already take it in navbar.php as '$user_id' 
// Call the all user information from db
$query = "SELECT * FROM users_db WHERE id = '$user_id' ";
$query_run = mysqli_query($con, $query); 
$user_info = mysqli_fetch_assoc($query_run);
?>

<!-- Show the message here -->
<?php 
  // If adding category is succeed 
  if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
      
      //Print the success message and unset the SESSION
      echo '<div style="width: 650px; margin:1rem auto 0 auto;" class="alert alert-success justify-content-center" role="alert"> <strong>
    '.$_SESSION['success'] .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>';
      unset($_SESSION['success']);
  }

  //If adding category failed
  if(isset($_SESSION['status']) && $_SESSION['status'] != ''){

    //Print the erorr message and unset the SESSION
    echo '<div style="width: 650px; margin:1rem auto 0 auto;" class="alert alert-danger justify-content-center" role="alert"> <strong>
    '.$_SESSION['status'] .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>'; 
    unset($_SESSION['status']);
}

  ?>



<div class="login-wrap">

	<div class="login-html">
        
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Edit Profile</label>
		<input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Change Password</label>
        
		<div class="login-form">

        
       
        
        
			<div class="sign-in-htm">

            <form action="editcode.php" method = "POST">
            <!-- Send the user id as hidden input -->
            <input type="hidden" name="edit_user_id" value="<?php echo $user_info['id']; ?>">
				<div class="group">
					<label for="user" class="label">Name</label>
					<input id="user" name="editprofile_name" type="text" value="<?php echo $user_info['user_name']; ?>" class="input">
				</div>

				<div class="group">
					<label for="surname" class="label">Surname</label>
					<input id="surname" name="editprofile_surname" type="text"  value="<?php echo $user_info['user_surname']; ?>"  class="input">
				</div>

                <div class="group">
					<label for="email_edit" class="label">Email</label>
					<input id="email_edit" name="editprofile_email" type="email"  value="<?php echo $user_info['user_email']; ?>"  class="input">
				</div>


				<div class="group">
					<input type="submit" class="button" name="editprofile_submit_btn" value="Update">
				</div>
                <div class="group">
					<input type="submit" class="button cancel-btn-edit" name="editprofile_cancel_btn" value="Cancel">
				</div>
				<div class="hr"></div>
            </form>

			</div>


			<div class="for-pwd-htm">

            <form action="editcode.php" method = "POST">
            <input type="hidden" name="edit_pass_user_id" value="<?php echo $user_info['id']; ?>">
				<div class="group">
					<label  class="label">Current Password</label>
					<input name="edit_pass_currentPassword" type="password" value="<?php echo $user_info['password']; ?>" class="input" readonly>
				</div>
                <div class="group">
					<label  class="label">New Password</label>
					<input  name="edit_pass_newPassword" type="password" class="input">
				</div>
                <div class="group">
					<label class="label">Confirm New Password</label>
					<input  name="edit_pass_cNewPassword" type="password" class="input">
				</div>

				<div class="group">
					<input type="submit" class="button" name="edit_pass_submit_btn" value="Change Password">
				</div>

                <div class="group">
					<input type="submit" class="button cancel-btn-edit" name="editprofile_cancel_btn" value="Cancel" >
				</div>
                
				<div class="hr"></div>

            </form>
			</div>
		</div>
	</div>
</div>




<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>