<?php session_start()?>

<?php include("./includes/data.php")?>
<?php
    if(isset($_POST["Id"])) {
        global $conn;
        
        $product_id = $_POST["Id"];
        $sql = "SELECT * FROM products where id = '{$product_id}'"; 
        $display_basket_product_sum = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_array($display_basket_product_sum)) {
            $candle_price = $row["product_price"];
            $price_total_product = $_SESSION["user_basket"][$product_id] * $candle_price;
        }
    }
    echo $price_total_product;
?>

