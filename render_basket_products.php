<?php session_start()?>

<?php include("./includes/data.php")?>
<?php
global $conn;

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

        echo "<div class='text-drop-container products_basket_row_container modal_trigger_button'   
            data-id='$candle_id'
            data-name='$candle_name'
            data-image='$candle_img'
            data-price='$candle_price'
            data-desc='$candle_desc'>

            <img class='image_basket_product' src='$candle_img'> 
           
            <p>$candle_name </p>    
            <div class='price_quantity'> 
                <p> price: $candle_price £ </p> 
                <p>quantity: $quantity </p> 

            </div>
            <div class='total_price_container'> 
                <p> total: </p> 
                <p>$candle_total_price £</p> 
            </div>

        </div>
           
       ";
    }

    
}




?>