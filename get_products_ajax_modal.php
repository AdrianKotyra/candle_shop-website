<?php include("./includes/data.php")?>
<?php include("./includes/functions.php")?>
<?php 



global $conn;
    $page_number_ajax = $_POST["pageNumber"];
    
    $sql = "SELECT * from products";
    $result_initial = mysqli_query($conn, $sql);
    $total_rows = mysqli_num_rows($result_initial);
    $limit_products = 16;
    $total_pages = ceil($total_rows/$limit_products);
    if (!isset (  $page_number_ajax) ) {  
        $page_number_ajax=1;
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



    
?>
    
