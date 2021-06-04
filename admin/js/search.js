const filter = document.querySelector("#filter");
//It keeps whole information for product
const table_rows = document.querySelectorAll(".table-row");




eventListeners();


function eventListeners(){
    //We'll add an keyup event to our search box
    filter.addEventListener("keyup",filterAdmin);
}


//In this function we'll search for the input and make the others none. If input is find make display 'table-row'
function filterAdmin(e){

    //keep the value as lower case
    const searchValue = e.target.value.toLowerCase();
    //We'll get all table rows which contains product-name and try to find search value in it
    const productNames = document.querySelectorAll(".product-name-row");

    //Keep track the index for finding specific table_row
    productNames.forEach(function(productName, index){
        const text = productName.textContent.toLowerCase();

        if(text.indexOf(searchValue) === -1){
            //That's mean product-name doesn't contain search value then make table-row display:none;

            table_rows[index].setAttribute("style","display: none;");

        }else{
            table_rows[index].setAttribute("style","display: table-row;");
        }

    })

}