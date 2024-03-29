<?php session_start()?>

<?php include("./includes/data.php")?>
<?php include("./includes/functions.php");?>

<?php 
global $conn;
 
    if(isset($_POST["elementId"])) {
        if(count($_SESSION["user_basket"])>=1) {
            foreach ($_SESSION["user_basket"] as $key => $value) {
                $number +=$value;
            
            }
        }
        echo $number;


    }


?>