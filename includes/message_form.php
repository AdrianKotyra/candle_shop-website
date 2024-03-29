<?php  session_start();

include("data.php");
include("functions.php");

if(isset($_POST["send_message"])) {
    if($_SESSION["user_logged"] === true) {
        $mail = "adriankotyra@yahoo.com";
    
        $name = $_POST["name"];
        $email_user = $_POST["email"];
        $message = $_POST["message"];
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $subject = "from $email_user";
        mail($mail,  $subject, $message,  $headers);
      
    
    
    
        echo "<div class='alert alert-success col-lg-6 text-center mx-auto' role='alert'>
        Thank you for your message <strong> $_SESSION[user_name] </strong></div>";
    
    
    } 
    else {
        echo "
        <div class='alert alert-warning col-lg-6 text-center mx-auto' role='alert'>
            Please log in to send a message.
        </div>";
    }
    
}
        















?>