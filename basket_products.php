<?php session_start()?>

<?php 
if(isset($_POST["elementId"])) {
    $product_id = $_POST["elementId"];
    $_SESSION["user_basket"][$product_id]++;


    echo json_encode($_SESSION["user_basket"]);


}

    



?>