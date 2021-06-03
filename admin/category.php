<?php

include("includes/connection.php");
include("security.php");
include("includes/header.php");
include("includes/sidebar.php");



?>


<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Category Name </label>
                <input type="text" name="categoryname" class="form-control" placeholder="Enter Category Name">
            </div>
            <div class="form-group">
                <label> Category Description </label>
                <input type="text" name="categorydesc" class="form-control" placeholder="Enter Category Description">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="addCategoryBtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Categories

            <!-- Here in the New Product button we're calling the MODAL -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcategory">
              Add New Category 
            </button>
    </h6>
  </div>

  <div class="card-body">




  <?php 
  // If adding category is succeed 
  if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
      
      //Print the success message and unset the SESSION
      echo '<div class="alert alert-success justify-content-center" role="alert"> <strong>
    '.$_SESSION['success'] .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>';
      unset($_SESSION['success']);
  }

  //If adding category failed
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

    $query = "SELECT * FROM category_table ";
    $query_run = mysqli_query($connection, $query);

    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th>Category Name </th>
            <th>Category Description </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>

        <?php
            if(mysqli_num_rows($query_run) >0 ){
              while($row = mysqli_fetch_assoc($query_run)){
              

           ?>
     
          <tr>
            <td> <?php echo $row['category_id']; ?> </td>
            <td> <?php echo $row['category_name']; ?></td>
            <td> <?php echo $row['category_desc']; ?></td>
         
            <td>
                <!-- We'll send the id of deleted admin by form and text input -->
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_category_id" value="<?php echo $row['category_id']; ?>">
                  <button type="submit" name="delete_category_btn" class="btn btn-danger"> DELETE</button>
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
   