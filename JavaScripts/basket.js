

$(document).ready(function(){


    //Login as admin clciked.
    $("#admin_login").click(function(){
        window.location.href = "http://localhost/MY WEB SITE/admin/login.php";
    })
    
    
    $(".add-to-cart-btn.button").click(function(){

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

        
        url = "http://localhost/MY WEB SITE/index.php"
        //We'll send the clicked product's id
        data = {
            process : "addToCart",
            product_id : $(this).attr("product_id")
            
        }
        //We'll send data to url as a JSON data.
        $.post(url, data, function(response){
            var ret = response.split(" ");
            response = ret[0];
            response = response.replace ( /[^\d.]/g, '' );
            console.log(response);

            $("#basket-cart-quantity").text(response);
        })
    })


    $(".buy-now-btn").click(function(){

        window.location.href = "http://localhost/MY WEB SITE/basket.php";
        
        url = "http://localhost/MY WEB SITE/index.php";
        //We'll send the clicked product's id
        data = {
            process : "buyNowBtn",
            product_id : $(this).attr("product_id")
            
        }
        //We'll send data to url as a JSON data.
        $.post(url, data, function(response){
            var ret = response.split(" ");
            response = ret[0];
            response = response.replace ( /[^\d.]/g, '' );
            console.log(response);
            $("#basket-cart-quantity").text(response);
            window.location.reload();
            
        })

        
    })



    $(".btn.fa.fa-trash-o.fa-lg.delete-btn").click(function(){


        url = "http://localhost/MY WEB SITE/index.php"
        //We'll send the clicked product's id
        data = {
            process : "removeFromCart",
            product_id : $(this).attr("product_id")
            
        }
        //We'll send data to url as a JSON data.
        $.post(url, data, function(response){
            //reload the page
            window.location.reload();
            
        })
    })


    $(".minus-btn").click(function(){

        
        url = "http://localhost/MY WEB SITE/index.php"
        //We'll send the clicked product's id
        data = {
            process : "decreaseCount",
            product_id : $(this).attr("product_id")
            
        }
        //We'll send data to url as a JSON data.
        $.post(url, data, function(response){
            //reload the page
            
            window.location.reload();
            
        })
    })



    $(".plus-btn").click(function(){

        
        url = "http://localhost/MY WEB SITE/index.php"
        //We'll send the clicked product's id
        data = {
            process : "increaseCount",
            product_id : $(this).attr("product_id")
            
        }
        //We'll send data to url as a JSON data.
        $.post(url, data, function(response){
            //reload the page
    
           window.location.reload();
            
        })
    })



    

    //When pay and buy button clicked.
    /*
    $("#summary-buy-button").click(function(){
        

        console.log("giriyor");
        url = "http://localhost/MY WEB SITE/index.php"
        //We'll send the clicked product's id
        data = {
            process : "payAndBuy",
            
        }
        //We'll send data to url as a JSON data.
        $.post(url, data, function(response){
            
            
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
                    Swal.fire(
                    'Successed!',
                    'Enjoy with best music in the planet!',
                    'success'
                    )

                }
               
                });

                
                window.location.reload();
           
            
        })
    })
*/
    





})

