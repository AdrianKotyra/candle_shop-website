<?php include("./includes/data.php")?>

<?php 

global $conn;
$sql = "SELECT * FROM products"; 
$result = mysqli_query($conn, $sql); 
while($row = mysqli_fetch_array($result)) {
    
    $products[] = array(
        'id' => $row["id"],
        'name' => $row["product_name"],
        'desc' => $row["product_desc"],
        'image' =>$row["product_image"],
        'price' =>$row["product_price"]

        // Add more fields as needed
    );
    
    }
    echo json_encode($products);
    
?>
    

<?php  ?>