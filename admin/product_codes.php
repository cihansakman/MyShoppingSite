<?php

include("includes/connection.php");
include("security.php");

//If addProductBtn clicked
if(isset($_POST['addProductBtn'])){
    $product_name = $_POST['prd_name'];
    $product_desc = $_POST['prd_desc'];
    $product_price = $_POST['prd_price'];
    $product_img_url = $_POST['prd_img_url'];
    $product_category = $_POST['selected_category_name'];

        $query = "INSERT INTO products (product_name,product_desc,product_price,product_img_url,category_id) VALUES ('$product_name', '$product_desc','$product_price','$product_img_url','$product_category')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run){
            $_SESSION['success'] = 'Product added';
            header('Location: products.php'); 
        }else{
            $_SESSION['status'] = 'Product could not added';
            header('Location: products.php'); 
        }
    
}


//If delete PRODUCT button clicked.
if(isset($_POST['product_delete_btn'])){
    //Take the id from text input
    $id = $_POST['product_delete_id'];

    //Delete from db
    $query = "DELETE FROM products WHERE product_id = '$id' ";
    $query_run = mysqli_query($connection, $query);

    //If deleted successful
    if($query_run){
        $_SESSION['success'] = "Product is Deleted";
        header("Location: products.php");
    }else{
        $_SESSION['status'] = "Product could NOT Deleted";
        header("Location: products.php");
    }
}



//If EDIT UPDATE button clicked.
if(isset($_POST['edit_update_btn'])){

    //Take the product info from text input
    $id = $_POST['edit_product_id'];
    $product_name = $_POST['edit_prd_name'];
    $product_desc = $_POST['edit_prd_desc'];
    $product_price = $_POST['edit_prd_price'];
    $product_img_url = $_POST['edit_prd_img_url'];
    $product_category = $_POST['edit_prd_category'];

    //UPDATE db
    $query = "UPDATE products SET product_name = '$product_name', product_desc = '$product_desc', product_price = '$product_price', product_img_url = '$product_img_url', category_id = '$product_category' WHERE product_id = '$id'";
    $query_run = mysqli_query($connection, $query);

    //If UPDATE successful
    if($query_run){
        $_SESSION['success'] = "Product is Updated";
        header("Location: products.php");
    }else{
        $_SESSION['status'] = "Product could NOT Updated";
        header("Location: products.php");
    }
}



?>