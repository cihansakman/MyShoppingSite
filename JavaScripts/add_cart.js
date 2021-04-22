//Select all element
const row = document.querySelector(".row");


//Classes

//Class Product
class Product {
    constructor(product_img, product_name, desc, price) {
      this.product_img = product_img;
      this.product_name = product_name;
      this.desc = desc;
      this.price = price;
      this.inCart = 1;
    }
  }

eventListeners();

function eventListeners(){ //All event listeners will be here.
    row.addEventListener("click",addToBasket);

}

//Event Capturing
function addToBasket(e){
    if(e.target.className === "add-to-cart-btn"){
        const product_card = e.target.parentElement.parentElement.childNodes;
        const product = makeProduct(product_card);
        addProduct(product); //product is a member of Product Class.
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
        addProductToUI(product);
        
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

