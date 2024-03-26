

<?php 

  
   $current_page = basename($_SERVER['PHP_SELF']);
 
?>
    <nav>
     
        <div class="container_custom">
            
            <div class="logo_container">
                <img src="./imgs/logo_tester2.png" alt="">
    
            </div>
            <div class="burger_nav">
                <input class="burger_box" id="checkbox" type="checkbox">
                <label class="toggle" for="checkbox">
                    <div id="bar1" class="bars"></div>
                    <div id="bar2" class="bars"></div>
                    <div id="bar3" class="bars"></div>
                </label>
                   
            </div>
          
      
         
         
            <div class="nav_container">
                <div class="nav_container_links">

                    <div class="link"> <a href="index.php" class="<?php echo  $current_page==="index.php"? 'active' : "" ?>">Home</a></div>
                    <div class="link"><a href="about.php" class="<?php echo  $current_page==="about.php"? 'active' : null ?>">About</a></div>
                    <div class="link"><a  href="contact.php" class="<?php echo  $current_page==="contact.php"? 'active' : null ?>">Contact</a></div>
                    <div class="link"><a href="products.php" class="<?php echo  $current_page==="products.php"? 'active' : null ?>">Products</a></div>
                    <div class="link"><a href="registration.php" class="<?php echo  $current_page==="registration.php"? 'active' : null ?>">Sign up</a></div>
                  
                   
        
        
                </div>
             
            </div>

            <div class="login_basket_profile_container">
                <div class="box profile_box trigger-drop-profile">
                
                    <img class="icon " src="./svgs/solid/profile.svg" alt="">
                    <p class="trigger-drop"> Account</p>
                
                  
                    <div class="drop-down drop-down-profile">
                        <div class="text-drop-profile-name confidential">  
                            <p><?php if_is_not_null_display_it($_SESSION["user_login"])?></p>
                        </div>

                        <div class="buttons-drop">
                            <a href="login.php"><button class="login_button confidential-hide-logged-in">Log in</button></a>
                        <div>
                            
                        <div class="confidential-hide-logged-in">
                            <a href="registration.php">  <button>Register</button></a>
                        </div>
                      
                       
                       
                      
                    
                       
                       
                
                        <div class="text-drop confidential">
                            <div class="text-drop-container">
                                <p>Your orders</p>
                            </div>
                            <div class="text-drop-container">
                                <a href="settings_user.php">   <p>Settings</p></a>
                             
                            </div>
                        </div>
                        <a href="<?php $current_page?>?log_out" class="confidential"><button class="login_button">Log out</button></a>
                     
                    </div>
                    </div>
                </div>
                </div>
             
                
                <div class="box basket_box confidential trigger-drop-basket">
                    
                    <p class="products_counter_basket"><?php products_in_basket_counter() ?></p>
                    <img class="icon" src="./svgs/solid/basket.svg" alt="">
                    <p class="trigger-drop">Basket</p>


                    <div class="drop-down drop-down-basket">
                       
                        <div class="text-drop basket_drop">
                            <div class="text-drop-profile-name confidential basket-title-check-out">  
                            <p>Items added</p>
                            </div>
                            <div class="render_basket">
                                <?php Render_basket_products()?>
                            </div>
                            
                            <div class="render_total_all_products">
                                <div class='total_price_container_all'> 
                                    <p> Total: </p> 
                                    <p class="total_all_products"><?php echo $_SESSION["sum_all_products"]; ?> £</p> 

                                </div>
                            </div>
                            
                            <div class="text-drop-profile-name confidential check-out-link">  
                                <a href="checkout.php"> <p>Check out</p></a>
                           
                            </div>
                
                        </div>
                     

                    </div>
                </div>
            </div>
        </div>
    
        
       




</nav>

<?php ?>

<?php include("./includes/loader.php")?>