<?php include("data.php")?>


<?php 

    function products_in_basket_counter() {
        global $conn;
        if($_SESSION["user_basket"] !=null) { 
            if(count($_SESSION["user_basket"])>=1) {
                echo count($_SESSION["user_basket"]);
            }
    
        }
      
    }
    function Render_basket_products(){
        global $conn;
        if($_SESSION["user_basket"] !=null) { 
            if(count($_SESSION["user_basket"])>=1) {
            foreach ($_SESSION["user_basket"] as $key => $value) {
                $sql = "SELECT * FROM products where id = '{$key}'"; 
                $display_basket_products_name = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($display_basket_products_name)) {
                    $candle_name =  $row["product_name"];
                    $candle_img =  $row["product_image"];
                }

            echo 
            "<div class='text-drop-container products_basket_row_container'>
                    <img class='image_basket_product' src='$candle_img'> 
                    <div> 
                        <p>$candle_name </p>    
                        <p>$value </p>
                    </div>
                   
                </div>";
                
            }
        }}
    }



    function user_not_logged_back_to_home(){
        $_SESSION["user_logged"] === false? header("Location:index.php") : null;
    }
    function init() {
        if(empty($_SESSION["user_logged"])) {
            $_SESSION["user_logged"] = false;
            $_SESSION["user_login"] = null;
            $_SESSION["user_name"] =  null;
            $_SESSION["user_lastname"] = null;
            $_SESSION["user_password"] = null;
        }
     
    }
    function if_is_not_null_display_it($object){
        if($object !== null) {
            echo $object;
           
        } else {
            null;
        }
      
    }

    function get_user_details_from_sessions(){
        global $conn;
        $_SESSION["user_login"] = $name;
        $_SESSION["user_password"] = $password;
        $query_login = "SELECT * from accounts_candles where user_email = '{$name}' and user_password='{$password}'";
        $find_user = mysqli_query($conn, $query_login);
        while($row = mysqli_fetch_array($find_user)) {
            $user_name =  $row["user_name"];
            $user_lastname =  $row["user_lastname"];
            $user_email =  $row["user_email"];
            $user_password =  $row["user_password"];
            $user_details_array = [$user_name,  $user_lastname, $user_email, $user_password];
            return  $user_details_array;
      
        }
    }


    function log_in() {
        if(isset($_POST["submit_login"])) {
            global $conn;
            $name = trim($_POST["input-name"]);
            $password= trim($_POST["input-passowrd"]);
            $query_login = "SELECT * from accounts_candles where user_email = '{$name}' and user_password='{$password}'";
            $find_user = mysqli_query($conn, $query_login);
            if(mysqli_num_rows($find_user)>=1) {
                
                echo "<div class='alert alert-success col-lg-6 text-center mx-auto' role='alert'>
                You have successufully logged in  " .$_SESSION['user_name']. ". </div>";
                $_SESSION["user_logged"] = true;
                $_SESSION["user_login"] = $name;
                $_SESSION["user_password"] = $password;
            

            
            } else {
                echo "<div class='alert alert-warning col-lg-6 text-center mx-auto' role='alert'>
                wrong credentials
                </div>";
            }
        

        }
    }
    function login_sessions(){

        if(isset($_POST["submit_login"])) {
            global $conn;
            $name = trim($_POST["input-name"]);
            $password= trim($_POST["input-passowrd"]);
            $query_login = "SELECT * from accounts_candles where user_email = '{$name}' and user_password='{$password}'";

            $find_user = mysqli_query($conn, $query_login);
            if($find_user!==null) {
                while($row = mysqli_fetch_array($find_user)) {
                    $user_name =  $row["user_name"];
                    $user_lastname =  $row["user_lastname"];
                    $user_email =  $row["user_email"];}
                    $user_password =  $row["user_password"];
                }
    
                if(mysqli_num_rows($find_user)>=1) {
                    $_SESSION["user_logged"] = true;
                    $_SESSION["user_basket"] = [];
                    $_SESSION["user_login"] = $user_email;
                    $_SESSION["user_name"] =  $user_name;
                    $_SESSION["user_lastname"] =  $user_lastname;
                    $_SESSION["user_password"] = $password;
                }
            }
           
        
    }
    
    function log_out(){
        if(isset($_GET["log_out"])) {
            $_SESSION["user_logged"] = false;
            $_SESSION["user_basket"] = null;
            $_SESSION["user_login"] = null;
            $_SESSION["user_name"] =  null;
            $_SESSION["user_lastname"] = null;
            $_SESSION["user_password"] = null;
        }
    }
        
    function display_all_products_in_grid() {
        global $conn;
        $sql = "SELECT * FROM products"; 
        $result = mysqli_query($conn, $sql); 
        while($row = mysqli_fetch_array($result)) {
            $candle_name =  $row["product_name"];
            $candle_description =  $row["product_desc"];
            $candle_image =  $row["product_image"];
            $candle_price =  $row["product_price"];
            $candle_id = $row["id"];
    
    
        
        ?>
    

        <div class="product_container_products modal_trigger_button"
          
            data-id="<?php echo $candle_id;?>" 
            data-name="<?php echo $candle_name;?>" 
            data-image="<?php echo $candle_image;?>" 
            data-price="<?php echo $candle_price;?>" 
            data-desc="<?php echo $candle_description;?>" >
            <span class="add_product_span"> 
                <div class="img_buy">
                </div>
                <p>add</p> 
               
            </span>
            <img src="<?php echo $candle_image;?>">
            <div class="product_description_box">
                <p> <strong><?php echo $candle_name;?></strong></p>
                <span><?php echo $candle_price. " £";?></span>
            </div>
        </div>
          
     
    <?php } }?> 


<?php 


function clean_string($string) {
    return htmlentities($string);
}

function token_generator() {
    $token = $_SESSIon["token"] = md5(uniqid(mt_rand(), true));
    return $token;
}





function ValidateUserREgistration() {

   
    $errors = [];
    $min = 3;
    $max = 26;

    if($_SERVER['REQUEST_METHOD']==="POST") {
      
        $token = token_generator();
        $message = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Welcome to Candle Niche Website</title>
            <style>
              
            .email-top {
                position: relative;
                background: url('https://adriankotyraprojects.co.uk/websites/project%20group%20candle/imgs/newsletter.jpg');
                height: 500px;
            }
            .email_text{
                padding: 20px 40px;
                background-color: black;
                color: white;
            }
            .email-top button {
                border-radius: 50px;
                cursor: pointer;
                color: white;
                border: none;
                padding: 20px 40px;
                background-color: #3D405B;
            }
            .text_cotainer_top {
                text-align: center;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }
            .text_cotainer_bottom {
                font-size: 1.8rem;
                color:white;
                text-align: center;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }
            
            .text_cotainer_top button {
                font-size: 1.4rem;
            }
            .email_text_code {
                margin-top: 50px;
                font-size: 1.4rem;
                color: white;
                 
                text-align: center;
                
             
            }
            .text_cotainer_top p {
                font-size: 1.6rem;
                color: black;
                 
                text-align: center;
            }
        
             
            .code {
              
                padding: 20px 40px;
                color: white !important;
                background-color: #3D405B;
                font-size: 2rem;
            } 
            
              
            </style>
        </head>
        <body>
            <div class='email_container'>
                <div class='email-top'>
                    <div class='text_cotainer_top'>
                        <h1 class='email_text'>Welcome to our Candle Niche website</h1>
                        <h3> activate your account here</h3> <br>
                        <p class='code'> 
                        https://adriankotyraprojects.co.uk/websites/project%20group%20candle/includes/activation_page.php
                        </p> 
                        <h3>Your code</h3> <br>
                        <br>
                        <p class='code'>$token</p >
                      
                    </div>
                </div>
                <div class='email-footer'>
                    <div class='text_cotainer_bottom'>
                    
                    </div>
                </div>
            </div>
        </body>
        </html>
        ";
        global $conn;
        $username= clean_string($_POST["name"]);
        $lastname= clean_string($_POST["lastname"]);
        $password= clean_string($_POST["password"]) ;
        $password_confirmed= clean_string($_POST["password_confirmed"]) ;
        $email =clean_string($_POST["email"]) ;
        $email_confirmation =clean_string($_POST["email_confirmation"]) ;
        $query_email = "SELECT * from accounts_candles where user_email = '{$email}'";
        $query_email_check = mysqli_query($conn, $query_email);
        if(mysqli_num_rows($query_email_check)>=1) {
            $errors[] = "Account with $email email already exists";
        }

       
        if(strlen($username)<=$min) {

            $errors[] = "Your username is too short, should be longer than $min characters";
        }
        if(strlen($username)>=$max) {

            $errors[] = "Your username is too long, should be shorter than $max characters";
        }
        
        if(strlen($lastname)<=$min) {
      
            $errors[] = "Your lastname is too short, should be longer than $min characters";
        }
        if(strlen($lastname)>=$max) {

            $errors[] = "Your lastname is too long, should be shorter than $max characters";
        }
        if(strlen($email)>=$max) {

            $errors[] = "Your email is too long, should be shorter than $max characters";
        }
        if($password!== $password_confirmed) {
            $errors[] = "Your password does not match the confirmation password";
        }
        if($email!== $email_confirmation) {
            $errors[] = "Your email does not match the confirmation email";
        }
        
    
     
        if(!empty($errors)) {
            foreach ($errors as $error) {
                echo "
                <div class='alert alert-danger col-lg-6 text-center mx-auto' role='alert'>
                    $error
                </div>";
            }
        } 
        if(empty($errors)) {
          
       
            $status = "false";
        
            $sql = "INSERT INTO accounts_candles (user_name, user_lastname, user_email, user_password, user_activation_number, status) VALUES ('$username', '$lastname', '$email', '$password', '$token', '$status')";
            $result = mysqli_query($conn, $sql);
            if($result) {
                $subject = "activation link for the Niche Candles";
                // Email headers
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: $from" . "\r\n";

                            

                mail($email, $subject, $message, $headers);
                echo "<div class='alert alert-success col-lg-6 text-center mx-auto' role='alert'>
                Activation link has been sent to your email $username.
                </div>";
            }
           
        }
        
      
        

    }   
}




?>

   
