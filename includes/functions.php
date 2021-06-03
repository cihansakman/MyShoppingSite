<?php
//Function for calculate the summary.
function calculateTheSummary($session_name, $products){
  //Calculate the total cost and total count for Summary
  $summary_total_cost = 0.00;
  $summary_total_count = 0;
  foreach($products as $product){
      $summary_total_cost += $product->total_cost;
      $summary_total_count += $product->count;
  }

  //Add the infos to the SESSION[summary]
  $summary["summary_total_cost"] = $summary_total_cost; 
  $summary["summary_total_count"] = $summary_total_count; 

  //We'll add the selected product to the SESSION
  $_SESSION[$session_name]["products"] = $products;
  $_SESSION[$session_name]["summary"] = $summary;

}

function addToCart($product_item,$user_id,$do){

    //Store the products in SESSION
    /*
    * shoppingcart
    *            products
    *                 1 ->  ProductName .....ProductDesc....count....TotalPrice
    *                 2 ->  ProductName .....ProductDesc....count....TotalPrice
    *
    *           summary
    *                   Total Price ..... total
    *
  */

  //We'll keep the SESSIONS as shoppingCart+userID. Every user will have their unique shopping cart.
  $session_name = "shoppingCart" .$user_id;

  //If we have already a SESSION
  if(isset($_SESSION[$session_name])){

    //It'll behave as an array inside of an array. There are layers and we're reaching them
    $shoppingCart = $_SESSION[$session_name];
    $products = $shoppingCart["products"];

  }
  //If there is no SESSION started before
  else{
    $products = array();
  }

  
  
  //We should increase the product count when product clicked multiple times.

  //If $products array has the product_id indice we should increment the count and total cost. Else just send the product
  if(array_key_exists($product_item->product_id, $products)){
    $products[$product_item->product_id]->count++;
    $products[$product_item->product_id]->total_cost += $products[$product_item->product_id]->product_price;
  }else{
    //Each product's indice is the ID of the product itself. Thanks to that we'll not get the same product as a new one. We'll always override it.
    $products[$product_item->product_id] = $product_item;

  }

  //Calculate the total cost and total count for Summary
  $summary_total_cost = 0.00;
  $summary_total_count = 0;
  foreach($products as $product){
      $summary_total_cost += $product->total_cost;
      $summary_total_count += $product->count;
  }

  //Add the infos to the SESSION[summary]
  $summary["summary_total_cost"] = $summary_total_cost; 
  $summary["summary_total_count"] = $summary_total_count; 

  //We'll add the selected product to the SESSION
  $_SESSION[$session_name]["products"] = $products;
  $_SESSION[$session_name]["summary"] = $summary;

  return true;


}


//Remove the product from specific user's basket SESSION
function removeFromCart($product_id,$user_id){

  //Each user has their own shoppingCart
  $session_name = "shoppingCart" .$user_id;

  if(isset($_SESSION[$session_name])){

    //It'll behave as an array inside of an array. There are layers and we're reaching them
    $shoppingCart = $_SESSION[$session_name];
    $products = $shoppingCart["products"];

    //Remove product from list
    if(array_key_exists($product_id, $products)){
      unset($products[$product_id]);
     
    }
    
    //Recalculate the summary basket
    calculateTheSummary($session_name, $products);

    return true;

  }


}



function increaseCount($product_id,$user_id){

  //Each user has their own shoppingCart
  $session_name = "shoppingCart" .$user_id;

  if(isset($_SESSION[$session_name])){

    //It'll behave as an array inside of an array. There are layers and we're reaching them
    $shoppingCart = $_SESSION[$session_name];
    $products = $shoppingCart["products"];

    //Increase the count ant the total_cost
    if(array_key_exists($product_id, $products)){
      $products[$product_id]->count ++;
      $products[$product_id]->total_cost += $products[$product_id]->product_price;

     
    }
    
    //Recalculate the summary basket
    calculateTheSummary($session_name, $products);
    return true;

  }
  
}

function decreaseCount($product_id,$user_id){

  //Each user has their own shoppingCart
  $session_name = "shoppingCart" .$user_id;

  if(isset($_SESSION[$session_name])){

    //It'll behave as an array inside of an array. There are layers and we're reaching them
    $shoppingCart = $_SESSION[$session_name];
    $products = $shoppingCart["products"];

    //Increase the count ant the total_cost
    if(array_key_exists($product_id, $products)){
      if($products[$product_id]->count > 1){
        $products[$product_id]->count --;
        $products[$product_id]->total_cost -= $products[$product_id]->product_price;
      }
    }
    
    //Recalculate the summary basket
    calculateTheSummary($session_name, $products);
    return true;

  }
  
}




$user_id = "";

//If user logged in we'll get the user_id info the create special shoppingcart SESSION for the user.
if(isset($_SESSION['user_id'])){
  //We'll call the logged in user's information.

  $user_id = $_SESSION['user_id'];

}

if(isset($_POST["process"])){

  $do = $_POST["process"];

  if($do == "addToCart" || $do == "buyNowBtn"){

    //We're getting the data(product id) when add to card button clicked 
    $product_id = $_POST['product_id'];

    //Get the product from id
    $result = mysqli_query($con, "SELECT * FROM products WHERE product_id = '$product_id'");
    if (!$result) {
      echo 'Could not run query: ' . mysql_error();
      exit;
    }
  $product = mysqli_fetch_object($result);
  //We'll add a new attribute to product 'count' attribute and 'total_cost'.
  $product -> count = 1;
  $product -> total_cost = $product -> product_price;

  //call addToCart function and return the total_count to jquerry as response.
  echo addToCart($product,$user_id,$do);
    
  }
  
  
  else if($do == "removeFromCart"){
    //We're getting the data(product id) when add to card button clicked 
    $product_id = $_POST['product_id'];
    //Remove the product from specific user's basket SESSION
    echo removeFromCart($product_id, $user_id); //We're returning something to get response in jquerry.


  }else if($do == "increaseCount"){
      //We're getting the data(product id) when add to card button clicked 
      $product_id = $_POST['product_id'];
      //Remove the product from specific user's basket SESSION
      echo increaseCount($product_id, $user_id); //We're returning something to get response in jquerry.

  }
  else if($do == "decreaseCount"){
       //We're getting the data(product id) when add to card button clicked 
        $product_id = $_POST['product_id'];
        //Remove the product from specific user's basket SESSION
        echo decreaseCount($product_id, $user_id); //We're returning something to get response in jquerry.

  }


}


?>