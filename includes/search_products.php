<?php
include("data.php");
include("functions.php");

$search = $_POST["search"];




if(!empty($search)) {
  
    $query = "SELECT * FROM products where product_name LIKE '$search%'";
    $search_query = mysqli_query($conn, $query);
    $search_count = mysqli_num_rows($search_query);
    if(!$search_query) {
        die("Query Failed" . mysqli_error($conn));
    }
    if($search_count>=1) {
        while($row = mysqli_fetch_array($search_query)) {
            $candle_id =  $row["id"];
            $candle_name =  $row["product_name"];
            $candle_description =  $row["product_desc"];
            $candle_image =  $row["product_image"];
            $candle_price =  $row["product_price"];
            echo " 
            <div class='product_container_products modal_trigger_button'
                data-id='$candle_id'
                data-name='$candle_name'
                data-image='$candle_image'
                data-price='$candle_price'
                data-desc='$candle_description' >
                <img src='$candle_image'>
                <span class='add_product_span'> 
                <div class='img_buy'>
                </div>
                <p>add</p> 
           
                </span>
                <div class='product_description_box'>
                    <p> <strong>$candle_name</strong></p>
                    <span>$candle_price £</span>
                </div>
            </div>";
    
         
            
        ?>
      


    <?php } } else {
        $message = "not Found";
        echo  $message;
    }

 



} else {
    display_all_products_in_grid_pagination();
}






