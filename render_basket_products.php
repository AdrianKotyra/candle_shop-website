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
        }

        echo 
            "<div class='text-drop-container products_basket_row_container'>
                <p>$candle_name </p>    <p>$value </p>
            </div>";
        
    }
}}




?>