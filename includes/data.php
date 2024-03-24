

<?php 

    // data LOCAL------------------------------------------------
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $database = "candles"; 
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

 // data ONLINE------------------------------------------------ CMS-database

    // $host_name = 'db5014813723.hosting-data.io';
    // $database = 'dbs12308250';
    // $user_name = 'dbu10771';
    // $password = 'JestemzMiastatowidac';

    // $conn = mysqli_connect($host_name, $user_name, $password, $database);

    // if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }

?>


