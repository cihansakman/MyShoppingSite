const shopping_card = document.querySelector("#shopping-cart");
const item = document.querySelectorAll(".item")[0];

const products = getProductsFromStorage();
const quantity = item.children.item(3);
quantity.children.item(1).value = 3;




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
            <img class="product-image" src="images/plak-images/sezen aksu - sen aglama.jpg" alt="" />
          </div>
    
          <div class="description">
            <span>Sen Ağlama</span>
            <span>Sezen Aksu</span>
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

`
newItem.innerHTML = innerNewItem;
shopping_card.appendChild(newItem);
