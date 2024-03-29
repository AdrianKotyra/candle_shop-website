<?php session_start()?>

<?php 
if($_SESSION["user_logged"] === true) {
    if(isset($_POST["elementId"])) {
        $product_quantity = $_POST["quantity"];
        $product_id = $_POST["elementId"];

        $_SESSION["user_basket"][$product_id]+= $product_quantity;
    
    
        echo json_encode($_SESSION["user_basket"]);
    
    
    }
} else {
    echo trim("not_logged");
}


    



?>