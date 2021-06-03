<?php


include("includes/connection.php");
include("security.php");
include("includes/header.php");
include("includes/sidebar.php");


?>


<div class="container-fluid">



<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary">Edit Product</h4>
  </div>

  <div class="card-body">

<!-- We'll fill the empty inputs with the editted product information -->
<?php
//If Product edit button clicked
if(isset($_POST['product_edit_btn'])){
    //Take the product id from text input
    $id = $_POST['product_edit_id'];

    //Get the id infos from db
    $query = "SELECT * FROM products WHERE product_id = '$id' ";
    $query_run = mysqli_query($connection, $query); 
    $product = mysqli_fetch_assoc($query_run);
}

?>
            <form action="product_codes.php" method="POST">
                    <!-- we'll send the product id -->
                    <input type="hidden" name='edit_product_id' value="<?php echo $product['product_id']; ?>">
                    <div class="form-group">
                        <label><strong> Product Name </label>
                        <input type="text" name="edit_prd_name" value="<?php echo $product['product_name']; ?>" class="form-control" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <label> Product Description </label>
                        <input type="text" name="edit_prd_desc" value="<?php echo $product['product_desc']; ?>" class="form-control" placeholder="Description">
                    </div>
                    <div class="form-group">
                        <label>Price($)</label>
                        <input type="number" name="edit_prd_price" value="<?php echo $product['product_price']; ?>" min="0" step="0.01" class="form-control" placeholder="Price">
                    </div>
                    <div class="form-group">
                        <label>Image URL</label>
                        <input type="text" name="edit_prd_img_url" value="<?php echo $product['product_img_url']; ?>" class="form-control" placeholder="URL">
                    </div>
                    <div class="form-group">
                      <label>Category</label>
                      <select class="form-control" name="edit_prd_category" require>
                        <?php 

                            $query = "SELECT * FROM category_table";
                            $query_run = mysqli_query($connection, $query);

                            while($category = mysqli_fetch_assoc($query_run)){
                        ?>
                          <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                          <?php }
                          ?>
                       </select>
                    </div>

                    <a href="products.php" class="btn btn-danger">CANCEL</a>
                    <button type="submit" name="edit_update_btn" class="btn btn-primary">UPDATE</button>

            </form>

</div>
</div>
</div>
</div>









<?php 
  include("includes/scripts.php");
  include("includes/footer.php");  
    
?>
   