<?php 
include ('connection.php');

//We'll get the last updated 4 products and show them in the footer. 
$sql_command = "SELECT product_img_url FROM products ORDER BY product_posted_date LIMIT 4 ";
$last_products = mysqli_fetch_row($con, $last_products);
?>


<footer class="footer-32892 pb-0" style="margin-top:3rem; padding-right:4rem; padding-left:4rem;">
      <div class="site-section">
        <div class="container-fluid">

          
          <div class="row">

            <div id="about-us-footer" class="col-md pr-md-5 mb-4 mb-md-0">
              <h3>About Us</h3>
              <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam itaque unde facere repellendus, odio et iste voluptatum aspernatur ratione mollitia tempora eligendi maxime est, blanditiis accusamus. Incidunt, aut, quis!</p>
              <ul class="list-unstyled quick-info mb-4">
                <li><span class="d-flex align-items-center"><i class="fa fa-phone" aria-hidden="true" style="color:#ff910f; margin-right:5px;"></i> +1 291 3912 329</span></li>
                <li><span class="d-flex align-items-center"><i class="fa fa-envelope" aria-hidden="true" style="color:#ff910f ; margin-right:5px;"></i> info@gmail.com</span></li>
              </ul>

              
            </div>

            <div class="col-md mb-4 mb-md-0">
              <h3>Latest Tweet</h3>
              <ul class="list-unstyled tweets">
                <li class="d-flex">
                  <div class="mr-3"><i class="fa fa-twitter" aria-hidden="true" style="color:#1DA1F2;"></i></div>
                  <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere unde omnis veniam porro excepturi.</div>
                </li>
                <li class="d-flex">
                  <div class="mr-3"><i class="fa fa-twitter" aria-hidden="true" style="color:#1DA1F2;"></i></div>
                  <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere unde omnis veniam porro excepturi.</div>
                </li>
                <li class="d-flex">
                  <div class="mr-3"><i class="fa fa-twitter" aria-hidden="true" style="color:#1DA1F2;"></i></div>
                  <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere unde omnis veniam porro excepturi.
                    lorem
                  </div>
                </li>
              </ul>
            </div>


            <div class="col-md-3 mb-4 mb-md-0">
              <h3 style="margin-left:5rem;">Products</h3>
              <div class="row gallery">
              <div class="col-2">
              </div>
                <div class="col-4">
                  <a href="#"><img src="images/plak-images/Arctic Monkeys.jpg" alt="Image" class="img-fluid"></a>
                  <a href="#"><img src="images/plak-images/Madonna.jpg" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-4" >
                  <a  href="#"><img src="images/plak-images/the smiths.jpg" alt="Image" class="img-fluid"></a>
                  <a href="#"><img src="images/plak-images/the prodigy.jpg" alt="Image" class="img-fluid"></a>
                </div>
              </div>
            </div>
            
            <div class="col-12">
              <div class="py-5 footer-menu-wrap d-md-flex align-items-center">
                <ul class="list-unstyled footer-menu mr-auto">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">About</a></li>
                  <li><a href="#">Our works</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Blog</a></li>
                  <li><a href="#">Contacts</a></li>
                </ul>
                <div class="site-logo-wrap ml-auto">
                  <a href="#" class="site-logo" style="color:#ff910f ">
                    CiShop
                  </a>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </footer>