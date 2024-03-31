<?php include("./includes/header.php")?>

<body>
  
    <?php include("./includes/navigation.php")?>
     
    <div class="mobile_nav_container">

        <div class="link link_mobile "><a  href="index.php"> <p class="text_mobile_link">Home</p></a></div>
        <div class="link link_mobile"><a href="about.php"><p class="text_mobile_link">About</p></a></div>
        <div class="link link_mobile"><a href="contact.php"><p class="text_mobile_link">Contact</p></a></div>
        <div class="link link_mobile active"><a class="active" href="products.php"><p class="text_mobile_link">Products</p></a></div>
        <div class="link link_mobile "><a href="registration.php"><p class="text_mobile_link">Sing up</p></a></div>


    </div>
    
    <div class="video_section sub_video_section">
        <span class="video_text_sub">
            <h3>Our Candles</h3>
       
        </span>

    
      
        <div class="video_container sub_video_container prod_top_sub">
        
           
        </div>
        <span class="anchor_scroll_video">
       
        </span>
   
       
        <!-- <img class="waves_bottom" src="./imgs/wavesNegative.svg" alt=""> -->

      
       
    </div>

    <div class="products_section_products">
        <div class="search-container-box">
            <img class="magnifier" src="./imgs/magnifier.svg" alt="">
            <!-- <h3 class="header">Our lastest products</h3> -->
        
            <div class="search_bar_container">
                <div class="group_search">
                    <svg class="icon_search" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
                    <input placeholder="Search" type="search" class="input_search search-input">
                </div>
            
                <div class="results_search"></div>
                <div class="radio-inputs">
                    <a href="products.php?products=highest_price">
                        <label class="highest_price_order_button">
                        
                                <span class="radio-tile">
                                    <span class="radio-icon">
                                        
                                    </span>
                                    <span class="radio-label"><?php 
                                        if(isset($_GET["products"]) && $_GET["products"] === "highest_price") {
                                            echo "<strong>Highest price</strong>";
                                        } else {
                                            echo "Highest price";
                                        }
                                    ?>
                                </span>

                        </label>

                    </a>
                    <a href="products.php?products=lowest_price">
                        <label class="lowest_price_order">
                            
                            <span class="radio-tile">
                                <span class="radio-icon">
                            
                                </span>
                            
                                <span class="radio-label"><?php 
                                    if(isset($_GET["products"]) && $_GET["products"] === "lowest_price") {
                                        echo "<strong>Lowest price</strong>";
                                    } else {
                                        echo "Lowest price";
                                    }
                                ?>
                                </span>
                            </span>
                        </label>
                    </a>
                    <a href="products.php?products=alphabetical">
                        <label>
                        
                            <span class="radio-tile">
                                <span class="radio-icon">
                            
                                </span>
                                
                                <span class="radio-label"><?php 
                                    if(isset($_GET["products"]) && $_GET["products"] === "alphabetical") {
                                        echo "<strong>Alphabetical</strong>";
                                    } else {
                                        echo "Alphabetical";
                                    }
                                ?>
                                </span>
                            
                            </span>
                        </label>
                    </a>
                </div>
            </div>
        </div>
        
      
        <div class="products_container_products">
        
            <div class="row no-gutters no-pad products_row_products">
                
                <?php 
                if(isset($_GET["products"])) {
                    if($_GET["products"]==="highest_price") {
                        include("get_products_highest_price.php");
                    }
                    else if($_GET["products"]==="lowest_price") {
                        include("get_products_lowest_price.php");
                    }
                    else if($_GET["products"]==="alphabetical") {
                        include("get_products_alphabetical_order.php");
                    }
                    
                    }
                    else {
                        display_all_products_in_grid_pagination("products.php");
                    }
                    

                  
           
                
                
                ?>
        
          
                
        
            </div>
        </div>


    </div>
   
    <?php include("./includes/footer.php")?>

</body>