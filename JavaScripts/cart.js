const shopping_card = document.querySelector("#shopping-cart");
const basket_html = document.querySelector(".basket-html");

eventListeners();
function eventListeners(){
  if(basket_html){
    document.addEventListener("onload",loadAllItemsToUI); //When we load the page it will run.
  }
  
}
//When reload the page we'll load all products in basket
function loadAllItemsToUI(){
  console.log("It works");
  let products = getProductsFromStorage(); //Array dönecek.

//Iteration for dictionaries
for (const [key, value] of Object.entries(products)) {
  console.log(key,value);
  addProductToUI(value); //We'll send the Product object to addProductToUI
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
            <input type="text" name="name" value="1">
            <button class="plus-btn" type="button" name="button">
              <i class="fas fa-plus"></i>
            </button>
          </div>
    
          <div class="total-price">$549</div>
      </div>

*/

  var newItem = document.createElement("div");
  newItem.className = "item";
  var innerNewItem = `
  
  <div class="buttons">
              <span><i class="btn far fa-trash-alt"></i></span>
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
                <i class="fas fa-minus"></i>
              </button>
              <input type="text" name="name" value="${product.inCart}">
              <button class="plus-btn" type="button" name="button">
                <i class="fas fa-plus"></i>
              </button>
            </div>
      
            <div class="total-price">${product.price}</div>
  
  `
newItem.innerHTML = innerNewItem;
shopping_card.appendChild(newItem);
}

