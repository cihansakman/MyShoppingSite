<?php


include("includes/connection.php");
include("security.php");
include("includes/header.php");
include("includes/sidebar.php");


?>




<div class="container mt-5">



<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary">Change Password</h4>
  </div>


  <?php 
  // If Updates is succeed 
  if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
      
      //Print the success message and unset the SESSION
      echo '<div class="alert alert-success justify-content-center" role="alert"> <strong>
    '.$_SESSION['success'] .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>';
      unset($_SESSION['success']);
  }

  //If Update failed
  if(isset($_SESSION['status']) && $_SESSION['status'] != ''){

    //Print the erorr message and unset the SESSION
    echo '<div class="alert alert-danger justify-content-center" role="alert"> <strong>
    '.$_SESSION['status'] .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>'; 
    unset($_SESSION['status']);
}

  ?>


  <div class="card-body">

<!-- We'll fill the empty inputs with the editted product information -->
<?php
//we'll take the admin id from $_SESSION['admin_username']
if(isset($_SESSION['admin_username'])){
    $id = $_SESSION['admin_username'];

    //Get the admin infos from db
    $query = "SELECT * FROM users_db WHERE id = '$id' ";
    $query_run = mysqli_query($connection, $query); 
    $admin = mysqli_fetch_assoc($query_run);
}



?>
            <form action="code.php" method="POST">
                    <!-- we'll send the admin id -->
                    <input type="hidden" name='edit_admin_id' value="<?php echo $admin['id']; ?>">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="edit_admin_password" value="<?php echo $admin['password']; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password"  name="edit_admin_newPassword" class="form-control" placeholder="New Password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="password"  name="edit_admin_confirmNewPassword" class="form-control" placeholder="Confirm Password" required>
                    </div>

                    <a href="index.php" class="btn btn-danger">CANCEL</a>
                    <button type="submit" name="edit_admin_password_btn" class="btn btn-primary">UPDATE</button>

            </form>

</div>
</div>
</div>
</div>



<?php 
  include("includes/scripts.php");
  include("includes/footer.php");  
    
?>