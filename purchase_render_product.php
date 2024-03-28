<?php session_start()?>

<?php include("./includes/data.php")?>
<?php
global $conn;

global $conn;
if(isset($_SESSION["user_basket"]) && !empty($_SESSION["user_basket"])) { 
    $id_proruct = $_POST["elementId"];
    $sql = "SELECT * FROM products WHERE id = '{$id_proruct}'; ";
    $display_basket_products_name = mysqli_query($conn, $sql);

    $candle_total_price_all_products = 0; 

    while($row = mysqli_fetch_array($display_basket_products_name)) {
        $candle_id =  $row["id"];
        $candle_name =  $row["product_name"];
        $candle_img =  $row["product_image"];
        $candle_price =  $row["product_price"];
        $candle_desc =  $row["product_desc"];

        $quantity = $_SESSION["user_basket"][$candle_id]; 
        
        $candle_total_price = $candle_price * $quantity;
        $candle_total_price_all_products += $candle_total_price;

        echo "<div class='products_basket_row_container purchase_item_animation_container'>
            <img class='image_basket_product purchase_img' src='$candle_img'> 
            <p>$candle_name </p>    
        
            <p> <strong> added to basket </strong></p>

        </div>
     
           
       ";
    }

    
}




?>