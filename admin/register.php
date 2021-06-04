<?php

include("includes/connection.php");
include("security.php");
include("includes/header.php");
include("includes/sidebar.php");



?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> User Name </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label> Surname </label>
                <input type="text" name="usersurname" class="form-control" placeholder="Enter Surname">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="row d-flex justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Admin Profile 

              <!-- Here in the New Product button we're calling the MODAL -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                Add Admin Profile 
              </button>
      </h6>

      <div class="input-group" style="width:50%;">
          <input type="search" class="form-control rounded" name="filter" id="filter" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
          <button type="button" class="btn btn-outline-primary"><i class="fas fa-fw fa-search"></i></button>
      </div>

    </div>
  </div>

  <div class="card-body">




  <?php 
  // If register is succeed 
  if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
      
      //Print the success message and unset the SESSION
      echo '<div class="alert alert-success justify-content-center" role="alert"> <strong>
    '.$_SESSION['success'] .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>';
      unset($_SESSION['success']);
  }

  //If register failed
  //If login failed
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

    <div class="table-responsive">


    <!-- We'll show the admins into admin panel(authorization=1) -->
    
    <?php

    $query = "SELECT * FROM users_db WHERE authorization = '1' ";
    $query_run = mysqli_query($connection, $query);

    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th>Name </th>
            <th>Surname </th>
            <th>Email </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>

        <?php
            if(mysqli_num_rows($query_run) >0 ){
              while($row = mysqli_fetch_assoc($query_run)){
              

           ?>
     
          <tr class="table-row">
            <td> <?php echo $row['id']; ?> </td>
            <td class="product-name-row"> <?php echo $row['user_name']; ?></td>
            <td> <?php echo $row['user_surname']; ?></td>
            <td> <?php echo $row['user_email']; ?></td>
         
            <td>
                <!-- We'll send the id of deleted admin by form and text input -->
                <form action="code.php" method="post">
                <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                <!-- We'll not let the admin's delete it'self. There will be always an admin.-->
                <?php 
                if($_SESSION['admin_username'] === $row['id']){
                  
                ?>
                <button type="submit" hidden="hidden" name="delete_btn" class="btn btn-danger"> DELETE</button>
                <!-- End of if($_SESSION['admin_username'] === $row['id']) -->
                <?php }else{
                  
                 ?>
                 <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                 <?php } ?>
                </form>
            </td>
          </tr>

        <?php
        }
            }else{
              echo '<div class="alert alert-warning justify-content-center" role="alert"> <strong>
    '.'No record Found!' .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>'; 
         
            }
        ?>
        </tbody>


      </table>

    </div>
  </div>
</div>



   
<?php 
  include("includes/scripts.php");
  include("includes/footer.php");  
    
?>
   