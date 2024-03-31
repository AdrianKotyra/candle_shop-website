<?php session_start()?>

<?php include("./includes/data.php")?>
<?php
global $conn;

global $conn;
if(isset($_SESSION["user_basket"]) && !empty($_SESSION["user_basket"])) { 
    if($_POST["plus_basket"]) {
        $id_product = $_POST["elementId"];
   

        $_SESSION["user_basket"][$id_product]+=1; 
        echo $_SESSION["user_basket"][$id_product];
        
      
    }
    if($_POST["minus_basket"]) {
        $id_product = $_POST["elementId"];
   

        $_SESSION["user_basket"][$id_product]-=1; 
        echo $_SESSION["user_basket"][$id_product];
        
      
    }
      

}

    





?>