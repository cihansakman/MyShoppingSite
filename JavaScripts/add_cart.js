//Select all element
const row = document.querySelector(".container.index-html");
const shopping_card = document.querySelector("#shopping-cart");
const basket_html = document.querySelector(".basket-html");
const index_html = document.querySelector(".index-html");
const summary = document.querySelector(".summary");
const summary_total_price = document.querySelector(".summary-total-price");
const payment_method = document.getElementById("paymentMethod");
const pay_and_buy_button = document.querySelector("#summary-buy-button");
const basket_empty = document.querySelector(".container-fluid.mt-100");
const basket_cart_quantity = document.getElementById("basket-cart-quantity");

//Music play
let on_off = document.getElementById("play-music");
let audio = document.getElementById('music-audio');
on_off.onclick = function() {
    audio.paused ? audio.play() : music_stop();
  }
  function music_stop() {
    audio.pause();
    audio.currentTime = 0;
}


//Call all eventListeners when page loaded.
eventListeners();

//All event listeners will be here.
function eventListeners(){ 
    if(basket_html){
        
        payment_method.addEventListener("change",checkPaymentMethod);
        
    }

}






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



function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
/*
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
    confirmButtonText: 'Yes, buy it!'
    }).then((result) => {
    if (result.isConfirmed) {
        //Clear the basket quantity
        localStorage.removeItem("basket_cart_quantity");
        removeAllProductsFromStorage();
        Swal.fire(
        'Successed!',
        'Enjoy with best music in the planet!',
        'success'
        )
        check = 1;
    }
    });
    
    
   e.preventDefault();
    
}*/


function removeAllProductsFromStorage(){
    localStorage.removeItem("products");
}


