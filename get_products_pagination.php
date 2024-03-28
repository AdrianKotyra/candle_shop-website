<?php include("./includes/data.php")?>
<?php include("./includes/functions.php")?>
<?php 



global $conn;
    if(isset($_POST["pageNumber"])) {
    $page_number_ajax = $_POST["pageNumber"];
    }
    else {
        $page_number_ajax =1;
    }

  
    $sql = "SELECT * from products";
    $result_initial = mysqli_query($conn, $sql);
    $total_rows = mysqli_num_rows($result_initial);
    $limit_products = 16;
    $total_pages = ceil($total_rows/$limit_products);
    if (!$page_number_ajax) {  
        
        $page_number = 1;  

    } else {  

        $page_number =  $page_number_ajax;  

    }    
    $initial_page = ($page_number-1) * $limit_products;   
    $getQuery = "SELECT * FROM products LIMIT " . $initial_page . ',' . $limit_products;  
    $result = mysqli_query($conn, $getQuery);    
      



    while($row = mysqli_fetch_array($result)) {
        $candle_name =  $row["product_name"];
        $candle_description =  $row["product_desc"];
        $candle_image =  $row["product_image"];
        $candle_price =  $row["product_price"];
        $candle_id = $row["id"];


    
    ?>


   
<?php } 

echo "<div class = 'pagination_container'>";
for($page_number = 1; $page_number<= $total_pages; $page_number++) { 
  
    if(intval($page_number_ajax)===intval($page_number)) {
        $active_paggination = "active_pagination";
        echo "<a class='pagination-link ' data-page=$page_number " . $page_number . "'> <p>" . $page_number . " </p> </a>";  
    }
    else {
       
        $active_paggination = "pagination-link";
   
        echo "<a class='pagination-link' data-page=$page_number " . $page_number . "'> <p>" . $page_number . " </p> </a>";  
    }
    
   
    
    }  
    echo "</div>";
   

    
?>
    
