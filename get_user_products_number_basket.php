<?php session_start()?>

<?php include("./includes/data.php")?>
<?php include("./includes/functions.php");?>

<?php 
global $conn;
 
    if(isset($_POST["elementId"])) {
        if(count($_SESSION["user_basket"])>=1) {
            echo json_encode(count($_SESSION["user_basket"]));
        }



    }


?>