<?php session_start()?>

<?php include("./includes/data.php")?>
<?php
global $conn;
global $conn;
if($_SESSION["user_basket"] !=null) { 
    if(count($_SESSION["user_basket"])>=1) {
    foreach ($_SESSION["user_basket"] as $key => $value) {
        $sql = "SELECT * FROM products where id = '{$key}'"; 
        $display_basket_products_name = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($display_basket_products_name)) {
            $candle_name =  $row["product_name"];
            $candle_img =  $row["product_image"];
            $candle_price=  $row["product_price"];
        }

        echo 
        "<div class='text-drop-container products_basket_row_container'>
            <img class='image_basket_product' src='$candle_img'> 
            <div> 
                <p>$candle_name </p>    
                <div class='price_quantity'> 
                    <p> price: $candle_price £ </p> 
                    <p>quantity: $value </p> 

                </div>
               
            </div>
       
        </div>";
        
    }
}}




?>