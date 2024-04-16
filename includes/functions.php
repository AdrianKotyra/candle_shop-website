<?php include("data.php")?>


<?php 
function renderSum(){
    
if($_SESSION["user_basket"] !=null) { 
  
    foreach ($_SESSION["user_basket"] as $key => $value) {
        $sql = "SELECT * FROM products where id = '{$key}'"; 
        $display_basket_products_name = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($display_basket_products_name)) {
        
            $candle_price=  $row["product_price"];
          
            // each product sum price
            $candle_total_price = $candle_price*$value; 
            // sum of each products sums price
            $candle_total_price_all_products = $candle_total_price_all_products + $candle_price*$value; 
             
        }

     
        
    }
    // $_SESSION["sum_all_products"] = $candle_total_price_all_products;
    echo 
    " $candle_total_price_all_products £";
}




}


function Render_checkout_products(){
    global $conn;
    if(isset($_SESSION["user_basket"]) && !empty($_SESSION["user_basket"])) { 
        $basket_ids = implode(',', array_map('intval', array_keys($_SESSION["user_basket"])));
        $sql = "SELECT * FROM products WHERE id IN ($basket_ids) ORDER BY FIELD(id, $basket_ids) DESC";
        $display_basket_products_name = mysqli_query($conn, $sql);

        $candle_total_price_all_products = 0; // Initialize the total price variable outside the loop

        while($row = mysqli_fetch_array($display_basket_products_name)) {
            $candle_id =  $row["id"];
            $candle_name =  $row["product_name"];
            $candle_img =  $row["product_image"];
            $candle_price =  $row["product_price"];
            $candle_desc =  $row["product_desc"];
            $quantity = $_SESSION["user_basket"][$candle_id]; // Retrieve quantity from session
            
            $candle_total_price = $candle_price * $quantity;
            $candle_total_price_all_products += $candle_total_price;

            echo "<div class='product'>
            <img class='checkout_img' src='$candle_img' alt=''>
            <div>
              <span>$candle_name </span>
              <p>Extra Spicy</p>
              <p>No mayo</p>
            </div>
            <div>
              <button>
                <svg fill='none' viewBox='0 0 24 24' height='14' width='14' xmlns='http://www.w3.org/2000/svg'>
                  <path stroke-linejoin='round' stroke-linecap='round' stroke-width='2.5' stroke='#47484b' d='M20 12L4 12'></path>
                </svg>
              </button>
              <label> $quantity</label>
              <button>
                <svg fill='none' viewBox='0 0 24 24' height='14' width='14' xmlns='http://www.w3.org/2000/svg'>
                  <path stroke-linejoin='round' stroke-linecap='round' stroke-width='2.5' stroke='#47484b' d='M12 4V20M20 12H4'></path>
                </svg>
              </button>
            </div>
            <label class='price small'>$candle_total_price £</label>
          </div>";
        }

        $_SESSION["sum_all_products"] = $candle_total_price_all_products; // Set the session variable for total price
    }
}

function products_in_basket_counter() {

    global $conn;
    if($_SESSION["user_basket"] !=null){ 

        foreach ($_SESSION["user_basket"] as $key => $value) {
            $number +=$value;
        
        }
        echo $number;
    } else {
        null;
    }
}

    
    

function Render_basket_products(){
    global $conn;
    if(isset($_SESSION["user_basket"]) && !empty($_SESSION["user_basket"])) { 
        $basket_ids = implode(',', array_map('intval', array_keys($_SESSION["user_basket"])));
        $sql = "SELECT * FROM products WHERE id IN ($basket_ids) ORDER BY FIELD(id, $basket_ids) DESC";
        $display_basket_products_name = mysqli_query($conn, $sql);

        $candle_total_price_all_products = 0; // Initialize the total price variable outside the loop

        while($row = mysqli_fetch_array($display_basket_products_name)) {
            $candle_id =  $row["id"];
            $candle_name =  $row["product_name"];
            $candle_img =  $row["product_image"];
            $candle_price =  $row["product_price"];
            $candle_desc =  $row["product_desc"];
            $quantity = $_SESSION["user_basket"][$candle_id]; // Retrieve quantity from session
            
            $candle_total_price = $candle_price * $quantity;
            $candle_total_price_all_products += $candle_total_price;

            echo "<div class='text-drop-container products_basket_row_container ' >
          

                <img class='image_basket_product modal_trigger_button' src='$candle_img'  
                    data-id='$candle_id'
                    data-name='$candle_name'
                    data-image='$candle_img'
                    data-price='$candle_price'
                    data-desc='$candle_desc'>
                <div> 
                <div class='container-basket-items'> 
                    <img class='delete-item-icon' src='./imgs/bin.png' data-id='$candle_id'>
                    <p class='basket-product-name' >$candle_name </p>    
                    <div class='price_quantity'> 
                        <p> price: $candle_price £ </p> 
                        <div class='quantity_container'>
                        <button   data-id='$candle_id' class='minus_basket incrementDecrementBasket'> - </button>
                    
                        <p>quantity:   <span class='quantity$candle_id'> $quantity</span> </p> 
                        <button   data-id='$candle_id' class='plus_basket incrementDecrementBasket'> + </button> 
                    </div> 
                </div>
              
              

            </div>
                <div class='total_price_container'> 
                    <p> total: </p> 
                    <p class='total-product-sum-single$candle_id'>$candle_total_price £</p> 
                </div>

            </div>
                
            </div>";
        }

        // $_SESSION["sum_all_products"] = $candle_total_price_all_products; // Set the session variable for total price
    }
}




function user_not_logged_back_to_home(){
    if($_SESSION["user_logged"] === false) {
        header("Location: index.php");
      

    }
}
function init() {
    if(empty($_SESSION["user_logged"])) {
        $_SESSION["user_basket"] = null;
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
        $query_login = "SELECT * from accounts_candles where user_email = '{$name}' and user_password='{$password}' and status='false'";
        $find_user = mysqli_query($conn, $query_login);
        if(mysqli_num_rows($find_user)>=1) {
            
            echo "<div class='alert alert-warning col-lg-6 text-center mx-auto' role='alert'>
            You have to activate your account ". $_SESSION['user_name']. " before log in. </div>";
            return;
          
        

        
        }

        $query_login_2 = "SELECT * from accounts_candles where user_email = '{$name}' and user_password='{$password}' and status='active'";
        $find_user_active = mysqli_query($conn, $query_login_2);
        if(mysqli_num_rows($find_user_active)>=1) {
        
            echo "<div class='alert alert-success col-lg-6 text-center mx-auto' role='alert'>
            You have successfully logged in.
            </div>";

            $_SESSION["user_logged"] = true;
            $_SESSION["user_login"] = $name;
            $_SESSION["user_password"] = $password;
            return;
        }
        else {
            echo "<div class='alert alert-warning col-lg-6 text-center mx-auto' role='alert'>
            Wrong credentials
            </div>";
        }
    

    }
}

function update_user_details(){
    if(isset($_POST["update_acc"])) {
        $errors = [];
        $min = 3;
        $max = 26;
    
      
        global $conn;
        $username= clean_string($_POST["name"]);
        $lastname= clean_string($_POST["lastname"]);
        $password= clean_string($_POST["password"]) ;
        $email =clean_string($_POST["email"]) ;
     
        // $query_email = "SELECT * from accounts_candles where user_email = '{$email}'";
        // $query_email_check = mysqli_query($conn, $query_email);
        // if(mysqli_num_rows($query_email_check)>=1) {
        //     $errors[] = "Account with $email email already exists";
        // }

        
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
       
       
        
    
        
        if(!empty($errors)) {
            foreach ($errors as $error) {
                echo "
                <div class='alert alert-danger col-lg-6 text-center mx-auto' role='alert'>
                    $error
                </div>";
            }
        } 
        if(empty($errors)) {
            
            // echo "fdsfdsfds";
            $query_update = "UPDATE accounts_candles SET ";
            $query_update .= "user_name = '{$username}', ";
            $query_update .= "user_lastname = '{$lastname}', ";
            $query_update .= "user_password = '{$password}', ";
            $query_update .= "user_email   = '{$email}' WHERE user_email = '{$_SESSION['user_login']}'";
            
            $_SESSION["user_basket"] = [];
            $_SESSION["user_login"] = $email;
            $_SESSION["user_name"] =  $username;
            $_SESSION["user_lastname"] =  $lastname;
            $_SESSION["user_password"] = $password;

        
            $result = mysqli_query($conn, $query_update);
            echo "
            <div class='alert alert-success col-lg-6 text-center mx-auto' role='alert'>
                Your details have been updated.
            </div>";
            
        }
        
        
        

    }   
}



function login_sessions(){

    if(isset($_POST["submit_login"])) {
        global $conn;
        $name = trim($_POST["input-name"]);
        $password= trim($_POST["input-passowrd"]);
        $query_login = "SELECT * from accounts_candles where user_email = '{$name}' and user_password='{$password}' and status='active'";

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
        
    
function get_sum_price_all_products(){
    global $conn;
    if(isset($_SESSION["user_basket"])) {
        $candle_total_price_all_products = 0;
        foreach ($_SESSION["user_basket"] as $key => $value) {
            $sql = "SELECT * FROM products where id = '{$key}'"; 
            $display_basket_products_name = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($display_basket_products_name)) {
            
                $candle_price=  $row["product_price"];
              
                // each product sum price
                $candle_total_price = $candle_price*$value; 
                // sum of each products sums price
                $candle_total_price_all_products = $candle_total_price_all_products + $candle_price*$value; 
                
            }
    
         
            
        }
        $_SESSION["sum_all_products"] = $candle_total_price_all_products;
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
        $_SESSION["sum_all_products"] = null;
        
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



     
function display_all_products_in_grid_pagination($page_name) {
    global $conn;
    $sql = "SELECT * from products";
    $result_initial = mysqli_query($conn, $sql);
    $total_rows = mysqli_num_rows($result_initial);
    $limit_products = 16;
    $total_pages = ceil($total_rows/$limit_products);
    if (!isset ($_GET['page']) ) {  
        $_GET['page']=1;
        $page_number = 1;  

    } else {  

        $page_number = $_GET['page'];  

    }    
    $initial_page = ($page_number-1) * $limit_products;   
    $getQuery = "SELECT * FROM products LIMIT " . $initial_page . ',' . $limit_products;  
    $result = mysqli_query($conn, $getQuery);    
      



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
   
<?php } 
echo "<div class = 'pagination_container'>";
for($page_number = 1; $page_number<= $total_pages; $page_number++) { 
  
    if(intval($_GET["page"])===intval($page_number)) {
        $active_paggination = "active_pagination";
        echo "<a class='$active_paggination pagination-link' href = '$page_name?page=" . $page_number . "'> <p>" . $page_number . " </p> </a>";  
    }
    else {
       
        $active_paggination = "pagination-link";
   
        echo "<a class='$active_paggination' href = ' $page_name?page=" . $page_number . "'> <p>" . $page_number . " </p> </a>";  
    }
    
   
    
    }  
    echo "</div>";
}




function contact_msg(){
    if(isset($_POST["send_message"]))
        
        if($_SESSION["user_logged"] === true) {
            $mail = "adriankotyra@yahoo.com";

            $name = $_POST["name"];
            $email_user = $_POST["email"];
            $message = $_POST["message"];
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $subject = "from $email_user";
            mail($mail,  $subject, $message,  $headers);
          



            echo "<div class='alert alert-success col-lg-6 text-center mx-auto' role='alert'>
            Thank you for your message <strong> $_SESSION[user_name] </strong></div>";


        } 
        else {
            echo "
            <div class='alert alert-warning col-lg-6 text-center mx-auto' role='alert'>
                Please log in to send a message.
            </div>";
        }
        
      
   

}













?> 
























   


