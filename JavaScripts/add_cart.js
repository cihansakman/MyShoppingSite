//Select all element
const row = document.querySelector(".container.index-html");
const shopping_card = document.querySelector("#shopping-cart");
const basket_html = document.querySelector(".basket-html");
const index_html = document.querySelector(".index-html");
const summary = document.querySelector(".summary");
const summary_total_price = document.querySelector(".summary-total-price");
const payment_method = document.getElementById("paymentMethod");
const pay_and_buy_button = document.querySelector("#summary-buy-button");
//Classes
//Class Product
class Product {
    constructor(product_img, product_name, desc, price) {
      this.product_img = product_img;
      this.product_name = product_name;
      this.desc = desc;
      this.price = price;
      this.inCart = 0;
    }
  }   
eventListeners();

function eventListeners(){ //All event listeners will be here.
    if(index_html){
        row.addEventListener("click",addToBasket);
    }
    
    if(basket_html){
        document.addEventListener("DOMContentLoaded",loadAllItemsToUI); //When we load the page it will run.
        // loadAllItemsToUI();
        shopping_card.addEventListener("click",removeProductFromCart);
        updateSummaryBasket();
        payment_method.addEventListener("change",checkPaymentMethod);
        pay_and_buy_button.addEventListener("click",payAndBuy);
        shopping_card.addEventListener("click",updateQuantityInput);
    }

}

//Event Capturing
function addToBasket(e){
    if(e.target.className === "add-to-cart-btn button"){
        const product_card = e.target.parentElement.parentElement.childNodes;
        const product = makeProduct(product_card);
        addProduct(product); //product is a member of Product Class.

        //Alert message.
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            width: "20rem",
            background: "#1ffff",
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'success',
            title: 'Added to card!',
            
          })

    }else if(e.target.className === "buy-now-btn button"){
        const product_card = e.target.parentElement.parentElement.childNodes;
        const product = makeProduct(product_card);
        addProduct(product);

    }
}

//Make product as a Product Class member
function makeProduct(card_body){
    let img_src, product_name, price, product_desc;
    card_body.forEach(function(element){
        switch(element.className) {
            case "product-img":
              img_src = element.src;
              break;
            case "product-name":
                product_name = element.innerHTML;
              break;

              case "price":
                 price = element.innerHTML;
              break;

              case "product-desc":
                 product_desc = element.innerHTML;
              break;
          }
    
    });
    let product = new Product(img_src, product_name, product_desc, price);
    return product;
}

//We'll add the product into UI and Storage.
function addProduct(product){
        // //Store the todos in the LocalStorage
        addProductToStorage(product);
        // showAlert("success","Todo successfully added.");
        //Aldığımız todo'yu ListItem olarak eklemek için yeni bir fonksiyon yazacağız.
        
        
    // e.preventDefault();
}

// We'll keep our porducts in Storage as Dictioaniries.
function addProductToStorage(product){
    let productItems = getProductsFromStorage();

    if(productItems != null){

        //If customer add another item
        if(productItems[product.product_name] == undefined){
            productItems[product.product_name] = 
            product
        }
        //If item is already in our dict. we'll just increase the quantity.
        productItems[product.product_name].inCart += 1;
    }else{
        product.inCart = 1;
        productItems = {};
        productItems[product.product_name] = 
            product
    }

    localStorage.setItem("products",JSON.stringify(productItems));

}

//Function for getting products from storage.
function getProductsFromStorage(){
    let productItems = localStorage.getItem('products');
    productItems = JSON.parse(productItems);
    return productItems;
}




//BASKET-HTML
//When reload the page we'll load all products in basket
function loadAllItemsToUI(){
    let products = getProductsFromStorage(); //Array dönecek.
    if(products != null){
    //Iteration for dictionaries
    for (const [key, value] of Object.entries(products)) {
        addProductToUI(value); //We'll send the Product object to addProductToUI
    }
    }
  
  }
  
  
  //We'll add the items into shopping_card as a child.
  //Our product is object of Product Class.
  function addProductToUI(product){
  
    // bu şekilde devam edeceğiz. storage'dan alıp değiştirmeye çalışalım
  //item'in inner HTML'ini <div class="item> oluşturduktan sonra copy paste vercez.
  /* bunları class'i shopping-cart olan yere ekleyeceğiz.
  
  <div class="item">
            <div class="buttons">
              <span><i class="btn far fa-trash-alt"></i></span>
            </div>
      
            <div class="image">
              <img class="product-image" src="images/plak-images/sezen aksu - sen aglama.jpg" alt="" />
            </div>
      
            <div class="description">
              <span>Common Projects</span>
              <span>Bball High</span>
              <span>White</span>
            </div>
      
            <div class="quantity">
              <button class="minus-btn" type="button" name="button">
                <i class="fas fa-minus"></i>
              </button>
              <input class="quantity-input" type="text" name="name" value="1">
              <button class="plus-btn" type="button" name="button">
                <i class="fas fa-plus"></i>
              </button>
            </div>
      
            <div class="total-price">$549</div>
        </div>
  
  */
    var price = split_price(product.price);
    var total_price = price * product.inCart;

    var newItem = document.createElement("div");
    newItem.className = "item";
    var innerNewItem = `
    <div class="buttons">
                <span><i class="btn fa fa-trash-o fa-lg delete-btn"></i></span>
              </div>
        
              <div class="image">
                <img class="product-image" src="${product.product_img}" alt="" />
              </div>
        
              <div class="description">
                <span>${product.product_name}</span>
                <span>${product.desc}</span>
              </div>
        
              <div class="quantity">
                <button class="minus-btn" type="button" name="button">
                    <!-- <i class="fas fa-angle-down"></i> -->
                    <i class="fa fa-caret-down fa-lg"></i>
                </button>
                <input class="quantity-input" "type="number" name="name" value="${product.inCart}">
                <button class="plus-btn" type="button" name="button">
                    <!-- <i class="fas fa-angle-up"></i> -->
                    <i class="fa fa-caret-up fa-lg"></i>
                </button>
              </div>
        
              <div class="total-price">$${total_price.toPrecision(4)}</div>
    
    `
  newItem.innerHTML = innerNewItem;
  shopping_card.appendChild(newItem);
  }


  //Function for taking Price only.
  function split_price(price){
    var x = price.match(/[\d\.]+|\D+/g);
    return x[1];
}
  
//When user want to remove item from cart
function removeProductFromCart(e){
    //if remove button clicked
    if(e.target.className === "btn fa fa-trash-o fa-lg delete-btn"){
        //We removed the item from shopping-card
        var remove_item = e.target.parentElement.parentElement.parentElement;
        remove_item.remove();

        //Now we also should remove the item from storage
        remove_item.childNodes.forEach(function(element){
            if(element.className === "description"){
                //We'll send the product_name(key) and remove it from storage.
                deleteProductFromStorage(element.childNodes[1].innerHTML);
            
            }
        
        });

        //Alert message.
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            width: "20rem",
            background: "#1ffff",
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'error',
            title: 'Item removed from cart!',
            
          })

    }
    
}

//Remove product from LocalStorage
function deleteProductFromStorage(remove_element){
    let products = getProductsFromStorage();
    delete products[remove_element];
    localStorage.setItem("products",JSON.stringify(products));
    //When remove an item update total price.
    updateSummaryTotalPrice();
 

}


//Should update summary-basket.
function updateSummaryBasket(){
    //Update total price
    updateSummaryTotalPrice();
    //Check the payment method
    checkPaymentMethod();
    //If there is no item in basket hide the summary basket
    isBasketEmpty();
    
    
}

//We'll update total price.
function updateSummaryTotalPrice(){
    //We should find the total price from storage.
    const products = getProductsFromStorage();
    let total_price = 0;
    if(products != null){
    //Iteration for dictionaries
    for (const [key, value] of Object.entries(products)) {
        let subtotal = 0;
        subtotal = parseFloat(split_price(value.price)) * value.inCart;
        total_price += subtotal;
    }
    }
    
    //We'll update the summary_total_price
    summary_total_price.innerHTML = `$${total_price.toPrecision(4)}`;
}

//check the payment method is whether credit card or wire transfer
function checkPaymentMethod(){
    var selectedValue = paymentMethod.options[paymentMethod.selectedIndex].value;
    const input_credit = document.getElementById("input-credit-card");
    const input_wire = document.getElementById("input-wire-transfer");
    if (selectedValue === "wire-transfer")
   {
    input_credit.style.display = "none";
    input_wire.style.display = "inline-block";
   }else if(selectedValue === "credit-card"){
    input_wire.style.display = "none";
    input_credit.style.display = "inline-block";
   }
   else if(selectedValue === "selectcard"){
    input_wire.style.display = "none";
    input_credit.style.display = "none";
   }

}

//If there is no item in basket hide the summary basket
function isBasketEmpty(){
    var products = getProductsFromStorage();
    if(getProductsFromStorage == null || summary_total_price.innerHTML == "$0.000" ){
        summary.style.display = "none";
    
 
    }
    else{
        if(summary_total_price.innerHTML == "$0.000"){
            summary.style.display = "none";
         
        }
        else{
            summary.style.display = "inline-block";
        }
    }


}


function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

//When payment is done
function payAndBuy(e){
    let check = 0;
      Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
        removeAllProductsFromStorage();
        Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        )
        check = 1;
    }
    });
    console.log(check);
    // result.isConfirmed.then(() => { location.reload(); });
    if(check==1){
        window.location.reload();
    }
    
    
   e.preventDefault();
    
}


function removeAllProductsFromStorage(){
    localStorage.removeItem("products");
}


//pay and buy dedikten sonra sayfa güncellenmeli....


//Event Capturing for changing quantity.
function updateQuantityInput(e){
   if(e.target.className === "minus-btn"){
    e.target.addEventListener("click", minusPlusQuantity);
   }else if(e.target.className === "plus-btn"){
    e.target.addEventListener("click", minusPlusQuantity);
   }else if(e.target.className === "quantity-input"){
    e.target.addEventListener("change",quantityChanged);
   }
}

//When customer changed the quantity we'll update new prices.
function quantityChanged(e){
    let newQuantity = e.target.value;
    //Quantity can not be less than 1 or NaN
    if(isNaN(newQuantity) || newQuantity<=0){
        newQuantity = 1;
        e.target.value = 1;
    }
    const parentOfChangedItem = e.target.parentElement.parentElement;
    let itemName,itemPrice;
    //We'll get the updated product name and price then we will update them.
    parentOfChangedItem.childNodes.forEach(function(element){
        if(element.className === "description"){
            //We'll send the product_name(key) and remove it from storage.
            itemName = element.childNodes[1].innerHTML;
            
        }else if(element.className === "total-price"){
            itemPrice = element;

        }
    
    });

    
    updateItemAfterQuantityChanged(itemName, itemPrice, newQuantity);
    updateSummaryBasket();
}


function updateItemAfterQuantityChanged(itemName, itemPrice, newQuantity){
    let products = getProductsFromStorage();
    products[itemName].inCart = newQuantity;
    localStorage.setItem("products",JSON.stringify(products));
    let newPrice = (split_price(products[itemName].price)*newQuantity).toPrecision(4);
    itemPrice.innerHTML = `$${newPrice}` ;

}

//When quantity decreas button clicked
//We'll use this rather than e.target because when we clicked the button it gets <i> as a target. We want to get rid of this situation.
function minusPlusQuantity(){
    console.log("ldlld");
    let newQuantity;
   if(this.className === "minus-btn"){
    newQuantity= this.nextElementSibling.value;
    this.nextElementSibling.value -= 1;
    newQuantity -= 1;}
   else if(this.className === "plus-btn"){
    newQuantity = parseInt(this.previousElementSibling.value);
    newQuantity += 1;
    this.previousElementSibling.value = newQuantity;
    
   }

   //Quantity can not be less than 1 or NaN
   if(newQuantity<=0){
    newQuantity = 1;
    this.nextElementSibling.value = 1;
}

    const parentOfChangedItem = this.parentElement.parentElement;
    let itemName,itemPrice;
    //We'll get the updated product name and price then we will update them.
    parentOfChangedItem.childNodes.forEach(function(element){
        if(element.className === "description"){
            //We'll send the product_name(key) and remove it from storage.
            itemName = element.childNodes[1].innerHTML;
            console.log("Item Name", itemName);
            
        }else if(element.className === "total-price"){
            itemPrice = element;

        }
    
    });

    
    updateItemAfterQuantityChanged(itemName, itemPrice, newQuantity);
    updateSummaryBasket();

}