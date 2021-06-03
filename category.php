<?php
include('includes/functions.php') ;
include 'includes/connection.php';
session_start();
include('includes/header.php');
?>


<!-- Search will not be part of some pages then we'll add it manually  -->
<div class="container-fluid px-md-5" style="margin-bottom:1.25rem;">
			<div class="row justify-content-between">
				<div class="col-md-8 order-md-last">
					<div class="row">
						<div class="col-md-6 text-center">
							<img src="images/cishop-01.png" style="width:150px; margin-right:40px;">
						</div>
                        <!-- Search -->
						<div class="col-md-6 d-md-flex justify-content-end mb-md-0">
							<form action="category.php" method="POST" class="searchform order-lg-last">
			          <div class="form-group d-flex">
			            <input type="text" name="search_input" class="form-control pl-3" placeholder="Search">
			            <button type="submit" name="search_btn" class="form-control search"><span class="fa fa-search"></span></button>
			          </div>
			        </form>
						</div>
					</div>
				</div>
    </div>
</div>
        <!-- Blank space on the left -->
				<div class="col-md-4 d-flex">
					<div class="social-media">
		    		<p class="mb-0 d-flex">
		    		
            </p>
	        </div>
				</div>
			</div>
	</div>



<?php
include 'includes/navbar.php';
?>


<?php 

// Get the selected category id and show them
if(isset($_POST['category_select_btn'])){
  $category_id = $_POST['selected_category_id'];

  //Keep the last selected category in a SESSION and call it when search button clicked.
  $_SESSION["category_id"] = $category_id;

$sql_command = mysqli_query($con, "SELECT category_name FROM category_table WHERE category_id = '$category_id' LIMIT 1 ");
$category_name = mysqli_fetch_row($sql_command);
?>

<div class="container index-html" style="margin-top:16px;">
<p class="product-motto" style="text-align: center; font-size:32px;"><?php echo $category_name[0];?></p>     
<hr> 
<div class="row">
<!-- We'll insert our products with while loop from products -->

<?php

#Select products which are belong the distinct category.
$sql_command = mysqli_query($con, "SELECT * FROM products WHERE category_id = '$category_id'");
while ($apply_sql = mysqli_fetch_assoc($sql_command)):
  

?>



<!-- Product -->
<div class="column">
  <div class="card product-card">
      <img class="product-img" src="<?php echo $apply_sql['product_img_url']; ?>" alt="Denim Jeans">
      <h3 class="product-name"> <?php echo $apply_sql['product_name']; ?> </h3>
      <p class="product-desc"><?php echo $apply_sql['product_desc']; ?></p>
      <p class="price">$<?php echo $apply_sql['product_price']; ?></p>
      <div class="buy-now-add-basket">
        <button class="add-to-cart-btn button" product_id="<?php echo $apply_sql['product_id']; ?>" role="button"><i class="fa fa-tags buy-add-icon" aria-hidden="true"></i>Add to Cart</button>
        <button class="buy-now-btn button" product_id="<?php echo $apply_sql['product_id']; ?>" role="button"><i class="fa fa-shopping-cart buy-add-icon" aria-hidden="true"></i>Buy Now</button>
      </div>
  </div>
</div>

<?php 

endwhile;
} // end of if(isset($_POST['category_select_btn'])){

if(isset($_POST['search_btn'])){ //If there is a search request
  $search_input = $_POST['search_input']; //Get the search value from search_input
  $category_id = $_SESSION['category_id'];
  $sql_command = mysqli_query($con, "SELECT category_name FROM category_table WHERE category_id = '$category_id' LIMIT 1 ");
  $category_name = mysqli_fetch_row($sql_command);
?>

<div class="container index-html" style="margin-top:16px;">
<p class="product-motto" style="text-align: center; font-size:32px;"><?php echo $category_name[0];?></p>     
<hr> 
<div class="row">

<!-- We'll insert our products with while loop from products where the categoriy_id belongs to selected category and searched phrase with LIKE operator-->
<?php
  $sql_command = mysqli_query($con, "SELECT * FROM products WHERE  category_id = '$category_id' and (product_name  LIKE '%{$search_input}%' or product_desc LIKE '%{$search_input}%')");
  while ($apply_sql = mysqli_fetch_assoc($sql_command)):
?>


<!-- Product -->
<div class="column">
  <div class="card product-card">
      <img class="product-img" src="<?php echo $apply_sql['product_img_url']; ?>" alt="Denim Jeans">
      <h3 class="product-name"> <?php echo $apply_sql['product_name']; ?> </h3>
      <p class="product-desc"><?php echo $apply_sql['product_desc']; ?></p>
      <p class="price">$<?php echo $apply_sql['product_price']; ?></p>
      <div class="buy-now-add-basket">
        <button class="add-to-cart-btn button" product_id="<?php echo $apply_sql['product_id']; ?>" role="button"><i class="fa fa-tags buy-add-icon" aria-hidden="true"></i>Add to Cart</button>
        <button class="buy-now-btn button" product_id="<?php echo $apply_sql['product_id']; ?>" role="button"><i class="fa fa-shopping-cart buy-add-icon" aria-hidden="true"></i>Buy Now</button>
      </div>
  </div>
</div>

<?php
endwhile;
}//end of if(isset($_POST['search_btn']))


 
?>


</div>
</div>


<?php 
include('includes/footer.php');
include('includes/scripts.php'); ?>

