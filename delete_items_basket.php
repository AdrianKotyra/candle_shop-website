<?php session_start()?>
<?php include("./includes/header.php")?>
<?php include("./includes/data.php")?>
<?php
global $conn;
if(isset($_POST["itemId"])) {
    $item_id = $_POST["itemId"];
  

        unset($_SESSION["user_basket"][$item_id]);
        Render_basket_products();
        
    }
    


?>