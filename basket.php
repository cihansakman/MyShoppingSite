
<?php
session_start();
//If user logged in we'll get the user_id.
if(isset($_SESSION['user_id'])){
  //We'll call the logged in user's information.
  $user_id = $_SESSION['user_id'];

}
//else{
//   header("Location: login.php");
// }



?>
<title>Basket</title>

<?php include('includes/header.php');
		include('includes/navbar.php'); 
?>



<?php
//Call the basket session of specific user
$session_name = "shoppingCart".$user_id;
if(isset($_SESSION[$session_name]) && ($_SESSION[$session_name]["summary"]["summary_total_count"] > 0 )){
  $shoppingCart = $_SESSION[$session_name];
  $shopping_products = $shoppingCart["products"];
  $summary = $shoppingCart["summary"];

?>

<div class="container-fluid basket-html">
  <div class="row">
    <div class="col-2">

    </div>
    <div class="col-6">
      <div class="shopping-cart" id="shopping-cart">
        <!-- Title -->
        <div class="title" >
          <i class="fa fa-shopping-bag fa-lg" style="color:#f4b679"></i>
          Shopping Bag
        </div>


<!-- Start foreach for printing products in the basket-->
<?php
foreach($shopping_products as $product){?>
    
        <!-- Product #1 -->
        <div class="item">
            <div class="buttons">
            <span><i class="btn fa fa-trash-o fa-lg delete-btn" product_id="<?php echo $product->product_id;?>"></i></span>
            </div>
      
            <div class="image">
              <img class="product-image" src="<?php echo $product->product_img_url; ?>" alt="" />
            </div>
      
            <div class="description">
                <span><?php echo $product->product_name; ?></span>
                <span><?php echo $product->product_desc; ?></span>
            </div>
      
            <div class="quantity">
                <i id = "minus-btn" product_id="<?php echo $product->product_id;?>" class="fa fa-chevron-circle-down fa-lg minus-btn" aria-hidden="true"></i>
                <span style="margin-left:10px; margin-right:10px;"><?php echo $product->count; ?></span>
                <i id="plus-btn" product_id="<?php echo $product->product_id;?>" class="fa fa-chevron-circle-up fa-lg plus-btn" aria-hidden="true"></i>
              </div>
      
            <div class="total-price">$<?php echo $product->total_cost; ?></div>
        </div>
      <!-- End of Product-->


<?php
} // End of foreach for printing products in the basket
?>

      </div>
    </div>

  
  <!--Payment Block-->
  <div class="col-4 summary-container" style="padding-left:0; padding-top:10px; padding-right:12rem;">
    <div class="summary" style="width:fit-content; height:fit-content; padding: 0.5rem 2rem;">
      <div class="summary-title"><span>Payment</span></div>
      <div class="summary-price-content">
        <div class="summary-total-price-tite"><span style="color:white">Total Price</span></div>
      <div class="summary-total-price">$<?php echo $summary["summary_total_cost"]; ?></div>
      </div>
      
      <div class="form-groups">
        <form action="editcode.php" method="POST">
          <!-- Send the user id as hidden input -->
          <input type="hidden" name="payment_user_id" value="<?php echo $user_id; ?>">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Name</label>
              <input type="text" class="form-control basket" id="inputName" placeholder="Name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="surname">Surname</label>
              <input type="text" class="form-control basket" id="inputSurname" placeholder="Surname" required>
            </div>
          </div>

          <div class="form-group col-md-12" style="padding:0">
            <label for="inputAddress">Shipping Address</label>
            <input type="text" class="form-control basket" id="inputAddress" placeholder="Your Address..." required>
          </div>
          
          
        
          <div class="form-group">
            <label for="paymentMethod">Payment Method</label>
            <select class="form-control basket" id="paymentMethod" name="payment-methods">
              <option value="selectcard"><p>---- Please Select ----</p></option>
              <option value="wire-transfer">Wire Transfer</option>
              <option value="credit-card">Credit Card</option>
            </select>
          </div>

          <div class="form-group col-md-12" id="input-wire-transfer"style="padding:0; display:none;">
            <label for="inputWireTransfer">WIRE Transfer Number</label>
            <input type="text" class="form-control basket" id="info-wire-transfer" placeholder="Wire Tranfer Pin">
          </div>

          <div class="form-group col-md-12" id="input-credit-card" style="padding:0; display:none;">
            <label for="inputCreditCard">Credit Card Number</label>
            <input type="text" class="form-control basket" id="info-credit-card" placeholder="Credit Card Number">
          </div>
            <input type="submit" name="basket_pay_and_buy_btn" class="btn btn-light active" id="summary-buy-button" role="button" value="Pay and Buy">
            <a href="index.php" class = "btn btn-light active" id="summary-checkout-button" role="button">Continue to Shopping</a>
        </form>
        

      </div>
    </div>
    </div>
  </div>
</div>

<?php
} //end of -> if(isset($_SESSION[$session_name]) && ($_SESSION[$session_name]["summary"]["summary_total_count"] > 0 )){
else{ //If basket is empty


?>

<div class="container mt-5">
<?php
// If user pay and buy successfully.
  if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
      
      //Print the success message and unset the SESSION
      echo '<div class="alert alert-success alert-dismissable" id="flash-msg">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon fa fa-times-circle"></i></button>
      <h4><i style="margin-right:5rem; margin-top:1rem; color:white;" class="icon fa fa-check-circle fa-2x"></i>'.$_SESSION['success'] .'</h4>
      </div>';
      unset($_SESSION['success']);
  }
?>
  <div class="row"> 
      <div class="col-md-12">
          <div class="card">
              <div class="card-body cart">
                  <div class="col-sm-12 empty-cart-cls text-center"> <img src="images/empty-card.png" width="200" height="200" style="margin-bottom:5px !important;" class="img-fluid mb-4 mr-3">
                      <h3 class="cart-empty-title"><strong>Your Cart is Empty</strong></h3>
                      <h4 class="cart-empty-content">Grab some R&B and come back here!</h4> 
                  </div>
                  <a href="index.php" id="continue-shopping" class="btn btn-primary " data-abc="true">continue shopping</a>
              </div>
          </div>
      </div>
  </div>
</div>

<?php
}


?>




<?php 

include('includes/footer.php');
include('includes/scripts.php');
 ?>