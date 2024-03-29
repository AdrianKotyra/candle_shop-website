<?php include("./includes/header.php")?>
<?php include("./includes/data.php")?>


<body>
  <?php include("./includes/navigation.php")?>
    <div class="mobile_nav_container">

      <div class="link link_mobile"><a  href="index.php"> <p class="text_mobile_link">Home</p></a></div>
      <div class="link link_mobile"><a href="about.php"><p class="text_mobile_link">About</p></a></div>
      <div class="link link_mobile"><a href="contact.php"><p class="text_mobile_link">Contact</p></a></div>
      <div class="link link_mobile"><a href="products.php"><p class="text_mobile_link">Products</p></a></div>
      <div class="link link_mobile active"><a class="active" href="registration.php"><p class="text_mobile_link">Sing up</p></a></div>
      

    </div>
    
       
    <div class="video_section sub_video_section" >
        <span class="video_text_sub">
            <h3>Registration</h3>
       
        </span>

    
      
        <div class="video_container sub_video_container" id="container_top_registration_bg">
        
        

        
        </div>
        <span class="anchor_scroll_video">
       
        </span>
   
       
        <!-- <img class="waves_bottom" src="./imgs/wavesNegative.svg" alt=""> -->

      
       
    </div>
    <div class="section">
    
    <?php ValidateUserREgistration(); ?>
    <form method="POST" action="registration.php">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
          <div class="w-full bg-white rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <p class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                Create an account
              
              
                </p>
                <div>
                  <label class="block mb-2 text-sm font-medium text-gray-900">
                    Your name
                  </label>
                  <input required name="name" 2placeholder="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" id="username" type="text">
                </div>
                <div>
                  <label class="block mb-2 text-sm font-medium text-gray-900">
                    Your Lastname
                  </label>
                  <input required name="lastname" 2placeholder="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" id="username" type="text">
                </div>
                <div>
                  <label class="block mb-2 text-sm font-medium text-gray-900">
                    Your email
                  </label>
                  <input required name="email" 2placeholder="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" id="username" type="text">
                </div>
                <div>
                  <label class="block mb-2 text-sm font-medium text-gray-900">
                    Email confirmation
                  </label>
                  <input required name="email_confirmation" 2placeholder="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" id="username" type="text">
                </div>
                <div>
                  <label class="block mb-2 text-sm font-medium text-gray-900">
                    Password
                  </label>
                  <input required name="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" placeholder="••••••••" id="password" type="password">
                </div>
                <div>
                  <label class="block mb-2 text-sm font-medium text-gray-900">
                    Confirm password
                  </label> 
                  <input required name="password_confirmed"class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" placeholder="••••••••" id="confirmPassword" type="password">
                </div>
              
  
                <button name="create_acc" class="w-full bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  focus:ring-blue-800 text-white button_registration" type="submit">
                  Create an account
                </button>
              
            </div>
          </div>
        </div>
      </form>

    </div>


    
    
    
    
    
    
   

  
   
      















      <?php include("./includes/footer.php")?>
      <script src="https://cdn.tailwindcss.com"></script>
      
</body>