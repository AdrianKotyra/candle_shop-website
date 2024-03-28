<?php include("./includes/header.php")?>
<?php include("./includes/data.php")?>

<body>
    <?php include("./includes/navigation.php")?>
    <div class="mobile_nav_container">
        <div class="link link_mobile login_mobile">log in
        </div>

        <div class="mobile_login_container">
            <input class="name_login" type="text" name="login" placeholder="name">
            <input type="password" name="password"  placeholder="****">
            <button class="button button_login login_mobile_button">login</button>


        </div>
        <div class="link link_mobileactive"><a  href="index.php">Home</a></div>
        <div class="link link_mobile"><a href="about.php">About</a></div>
        <div class="link link_mobile"><a class="active" href="contact.php">Contact</a></div>
        <div class="link link_mobile"><a href="products.php">Products</a></div>
        <div class="link link_mobile"><a  href="registration.php">Sing up</a></div>
       

    </div>
    
    <div class="video_section sub_video_section">
        <span class="video_text_sub">
            <h3>Contact</h3>
       
        </span>

       
      
        <div class="video_container sub_video_container" id="container_top_contact_bg">
        
      
        </div>
        <span class="anchor_scroll_video">
       
        </span>
   
       
        <!-- <img class="waves_bottom" src="./imgs/wavesNegative.svg" alt=""> -->

      
       
    </div>

    <?php include("./includes/contact_section.php")?>
     
    


   
    <?php include("./includes/footer.php")?>
</body>