<?php include("./includes/header.php")?>

<body>
    <div class="modal_window">

        <div class="modal_container">
        
            <div class="cross_container">
                <img class="cross_exit" src="./imgs/cross.svg" alt="">
            </div>
        
        
            <div class="modal_content_to_be_injected_from_js">
                
                
            </div>

        
    
        </div>
    </div>
    <?php include("./includes/navigation.php")?>
    <div class="mobile_nav_container">
        <div class="link link_mobile login_mobile">log in
        </div>

        <div class="mobile_login_container">
            <input class="name_login" type="text" name="login" placeholder="name">
            <input type="password" name="password"  placeholder="****">
            <button class="button button_login login_mobile_button">login</button>


        </div>
        <div class="link link_mobileactive"><a href="index.php">Home</a></div>
        <div class="link link_mobile"><a href="about.php">About</a></div>
        <div class="link link_mobile"><a href="contact.php">Contact</a></div>
        <div class="link link_mobile"><a class="active" href="products.php">Products</a></div>
        <div class="link link_mobile"><a  href="registration.php">Sing up</a></div>
       

    </div>
    
    <div class="video_section sub_video_section">
        <span class="video_text_sub">
            <h3>Our Candles</h3>
       
        </span>

    
      
        <div class="video_container sub_video_container">
        
            <img src="./imgs/pngaaa.com-143606.png" alt="">
        </div>
        <span class="anchor_scroll_video">
       
        </span>
   
       
        <!-- <img class="waves_bottom" src="./imgs/wavesNegative.svg" alt=""> -->

      
       
    </div>
    <div class="products_section_products">
        <!-- <h3 class="header">Our lastest products</h3> -->
        <div class="search_bar_container">
            <div class="container_search">
                <div class="search-container">
                  <input class="input search-input" type="text">
                  <svg viewBox="0 0 24 24" class="search__icon">
                    <g>
                      <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                      </path>
                    </g>
                  </svg>
                </div>
               
            </div>
            <div class="results_search"></div>
        </div>
      
        <div class="products_container_products">
            
            <div class="row no-gutters no-pad products_row_products">
                
                <?php display_all_products_in_grid()?>
          
                
        
            </div>
        </div>


    </div>
    <?php include("./includes/footer.php")?>
</body>