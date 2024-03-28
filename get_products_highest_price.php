<?php include("./includes/data.php")?>

<?php 



    global $conn;
    $sql = "SELECT * from products";
    $result_initial = mysqli_query($conn, $sql);
    $total_rows = mysqli_num_rows($result_initial);
    $limit_products = 16;
    $total_pages = ceil($total_rows/$limit_products);
    if (!isset ($_GET['page']) ) {  
        $_GET['page']=1;
        $page_number = 1;  

    } else {     

        $page_number = $_GET['page'];  

    }    
    $initial_page = ($page_number - 1) * $limit_products;
    $getQuery = "SELECT * FROM products ORDER BY product_price DESC LIMIT " . $initial_page . ", " . $limit_products;
    
    $result = mysqli_query($conn, $getQuery);    
      



    while($row = mysqli_fetch_array($result)) {
        $candle_name =  $row["product_name"];
        $candle_description =  $row["product_desc"];
        $candle_image =  $row["product_image"];
        $candle_price =  $row["product_price"];
        $candle_id = $row["id"];


    
    ?>


    <div class="product_container_products modal_trigger_button"
      
        data-id="<?php echo $candle_id;?>" 
        data-name="<?php echo $candle_name;?>" 
        data-image="<?php echo $candle_image;?>" 
        data-price="<?php echo $candle_price;?>" 
        data-desc="<?php echo $candle_description;?>" >
        <span class="add_product_span"> 
            <div class="img_buy">
            </div>
            <p>add</p> 
           
        </span>
        <img src="<?php echo $candle_image;?>">
        <div class="product_description_box">
            <p> <strong><?php echo $candle_name;?></strong></p>
            <span><?php echo $candle_price. " £";?></span>
        </div>




    </div>
   
<?php } 
echo "<div class = 'pagination_container'>";
for($page_number = 1; $page_number<= $total_pages; $page_number++) { 
  
    if(intval($_GET["page"])===intval($page_number)) {
        $active_paggination = "active_pagination";
        echo "<a class='$active_paggination pagination-link' href = 'products.php?products=highest_price&page=" . $page_number . "'> <p>" . $page_number . " </p> </a>";  
    }
    else {
       
        $active_paggination = "pagination-link";
   
        echo "<a class='$active_paggination' href = 'products.php?products=highest_price&page=" . $page_number . "'> <p>" . $page_number . " </p> </a>";  
    }
    
   
    
    }  
    echo "</div>";

?>
    
