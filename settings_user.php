<?php include("./includes/header.php")?>
<?php include("./includes/data.php")?>
<?php user_not_logged_back_to_home()?>

<link rel="stylesheet" href="./css/login.css">
<body>
  
  <?php include("./includes/navigation.php")?>
  <div class="mobile_nav_container">

      <div class="link link_mobile "><a  href="index.php"> <p class="text_mobile_link">Home</p></a></div>
      <div class="link link_mobile"><a href="about.php"><p class="text_mobile_link">About</p></a></div>
      <div class="link link_mobile "><a href="contact.php"><p class="text_mobile_link">Contact</p></a></div>
      <div class="link link_mobile "><a href="products.php"><p class="text_mobile_link">Products</p></a></div>
      <div class="link link_mobile "><a href="registration.php"><p class="text_mobile_link">Sing up</p></a></div>


    </div>
    
      
  <div class="video_section sub_video_section">
      <span class="video_text_sub">
          <h3>Log in</h3>
      
      </span>

  
    
      <div class="video_container sub_video_container">
      
      
 
      
      </div>
    
      
      <!-- <img class="waves_bottom" src="./imgs/wavesNegative.svg" alt=""> -->

    
      
  </div>

    
  
  <div class="section">
    <?php update_user_details()?>
    <form method="POST" action="settings_user.php">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
          <div class="w-full bg-white rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <p class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                Update your account
              
              
                </p>
                <div>
                  <label class="block mb-2 text-sm font-medium text-gray-900">
                  
                  </label>
                  <input required name="name" placeholder="<?php echo $_SESSION["user_name"];?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" id="username" type="text">
                </div>
                <div>
                  <label class="block mb-2 text-sm font-medium text-gray-900">
                    Your Lastname
                  </label>
                  <input placeholder="<?php echo $_SESSION["user_lastname"];?>" required name="lastname"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" id="username" type="text">
                </div>
                <div>
                  <label class="block mb-2 text-sm font-medium text-gray-900">
                    Your email
                  </label>
                  <input placeholder="<?php echo $_SESSION["user_login"];?>" required name="email"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" id="username" type="text">
                </div>
                
                <div>
                  <label class="block mb-2 text-sm font-medium text-gray-900">
                    Password
                  </label>
                  <input placeholder="<?php echo $_SESSION["user_password"];?>"  required name="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" id="password" type="password">
                </div>
                

                <button name="update_acc" class="w-full bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  focus:ring-blue-800 text-white button_registration" type="submit">
                  Update
                </button>
              
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>










       

       
        
        
        
      

       

      
   
   
      















  <?php include("./includes/footer.php")?>
  <script src="https://cdn.tailwindcss.com"></script>
</body>