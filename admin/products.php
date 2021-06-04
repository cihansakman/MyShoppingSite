<?php

include("includes/connection.php");
include("security.php");
include("includes/header.php");
include("includes/sidebar.php");



?>


<div class="modal fade" id="productPage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="product_codes.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label><strong> Product Name </label>
                <input type="text" name="prd_name" class="form-control" placeholder="Product Name">
            </div>
            <div class="form-group">
                <label> Product Description </label>
                <input type="text" name="prd_desc" class="form-control" placeholder="Description">
            </div>
            <div class="form-group">
                <label>Price($)</label>
                <input type="number" name="prd_price" min="0" step="0.01" class="form-control" placeholder="Price">
            </div>
            <div class="form-group">
                <label>Image URL</label>
                <input type="text" name="prd_img_url" class="form-control" placeholder="URL">
            </div>

            <div class="form-group">
            <label>Category</label>

            <select class="form-control" name="selected_category_name" require>
            <?php 

              $query = "SELECT * FROM category_table";
              $query_run = mysqli_query($connection, $query);

              while($category = mysqli_fetch_assoc($query_run)){
                
              
            ?>
              <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
              <?php }
              ?>

            </select>

                <!-- <label>Category ID</label>
                <input type="number" min="0" step="1" name="prd_category" class="form-control" placeholder="Category ID"> -->
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="addProductBtn" class="btn btn-primary">Save</button>
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
      <h6 class="m-0 font-weight-bold text-primary">Products

              <!-- Here in the New Product button we're calling the MODAL -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productPage">
              New Product
              </button>
      </h6>

      <div class="input-group" style="width:50%;">
          <input type="search" class="form-control rounded" name="filter" id="filter" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
          <button type="button" class="btn btn-outline-primary"><i class="fas fa-fw fa-search"></i></button>
      </div>
    
    
    </div>
    
  </div>

  <div class="card-body" style="min-width:1500px;">




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

    $query = "SELECT * FROM products ";
    $query_run = mysqli_query($connection, $query);
    

    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr style="font-size:18px;">
            <th>Name </th>
            <th>Description </th>
            <th>Price($) </th>
            <th>Image URL </th>
            <th>Category ID </th>
            <th>EDIT</th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>

        <?php
            if(mysqli_num_rows($query_run) >0 ){
              while($row = mysqli_fetch_assoc($query_run)){
                $product_id = $row['product_id'];

           ?>
     
          <tr class="table-row">
            <td class="product-name-row"> <?php echo $row['product_name']; ?> </td>
            <td> <?php echo $row['product_desc']; ?></td>
            <td> <?php echo $row['product_price']; ?></td>
            <td> <?php echo $row['product_img_url']; ?></td>

            <!-- Here we're taking the Category Name from category_table by 'product_id' -->

            <td> <?php $category_query = "SELECT category_name FROM category_table WHERE category_id = (SELECT category_id FROM products WHERE product_id = '$product_id')" ;
            $category_query_run = mysqli_query($connection, $category_query);
            $category_name = mysqli_fetch_assoc($category_query_run);
            echo $category_name['category_name']; 
            ?>
            
            </td>

            <td>
                <!-- We'll send the id of edited product by form and text input -->
                <form action="product_edit.php" method="post">
                  <input type="hidden" name="product_edit_id" value="<?php echo $row['product_id']; ?>">
                  <button type="submit" name="product_edit_btn" class="btn btn-warning"> EDIT</button>
                </form>
            </td>

         
            <td>
                <!-- We'll send the id of deleted product by form and text input -->
                <form action="product_codes.php" method="post">
                  <input type="hidden" name="product_delete_id" value="<?php echo $row['product_id']; ?>">
                  <button type="submit" name="product_delete_btn" class="btn btn-danger"> DELETE</button>
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
  include("includes/footer.php");
  include("includes/scripts.php");

    
?>
   