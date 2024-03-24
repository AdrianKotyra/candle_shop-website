<div class="box profile_box">
        
    <img class="icon trigger-drop-profile" src="./svgs/solid/profile.svg" alt="">
    <p class="trigger-drop trigger-drop-profile"> Account</p>

        
        <div class="drop-down-profile">
            <div class="buttons-drop">
            <?php if(!isset($_SESSION["user_logged"]) || $_SESSION["user_logged"] !== true) { 

            ?>
            
            <a href="login.php"><button class="login_button">Log in</button></a>
            <div>
                <a href="registration.php">  <button>Register</button></a>
            </div>
            <?php } 
            
            else { 
            ?>
            <button class="login_button">  <p><?php echo $_SESSION["user_login"];?></p></button>
            
            <a href="login.php?log_out"><button class="login_button">Log out</button></a>
            <?php } ?>
            
    
            <div class="text-drop">
                <div class="text-drop-container">
                    <p>Your orders</p>
                </div>
                <div class="text-drop-container">
                    <p>Settings</p>
                </div>
            </div>
            

        </div>
        
    </div>