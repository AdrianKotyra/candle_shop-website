<?php session_start()?>

<?php include("./includes/data.php")?>
<?php
global $conn;

if($_SESSION["user_basket"] !=null) { 
    if(count($_SESSION["user_basket"])>=1) {
    foreach ($_SESSION["user_basket"] as $key => $value) {
        $sql = "SELECT * FROM products where id = '{$key}'"; 
        $display_basket_products_name = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($display_basket_products_name)) {
        
            $candle_price=  $row["product_price"];
          
            // each product sum price
            $candle_total_price = $candle_price*$value; 
            // sum of each products sums price
            $candle_total_price_all_products = $candle_total_price_all_products + $candle_price*$value; 
             $candle_total_price_all_products;
        }

     
        
    }
    echo 
    " $candle_total_price_all_products £";
}




}




?>