
<?php include("functions.php");?>

<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
 
 
</head>
<div class="video_section sub_video_section">
       



    <div class="video_container activate_acc_page">
    
        <span class="text_title_activation">
            <h3>Activate your account </h3>
    
        </span>
    
    </div>
 
       
        <!-- <img class="waves_bottom" src="./imgs/wavesNegative.svg" alt=""> -->

      
       
</div>
<form action="activation_page.php" method="POST" class="form-group col-lg-6 mx-auto text-center">
    <label for="code_field ">Enter your Code here</label>
    <input type="text" name="code_field" class="form-control">
    <button name="submit_code" class="btn btn-primary">submit</button>
  

</form>
<?php 
    



    if(isset($_POST["submit_code"])) {
        global $conn;
        $token_input = $_POST["code_field"];


        $query = "SELECT * from accounts_candles where user_activation_number = '{$token_input}'";
        $result = mysqli_query($conn, $query);
        $number_accounts_found = mysqli_num_rows($result);
        if($number_accounts_found===0) {
            echo "
            <div class='alert alert-primary col-lg-6 text-center mx-auto' role='alert'>
                Incorrect code
            </div>";
        } else {

            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row["user_name"];
                $status = $row["status"];
               
            }
            if ($status==="active") {
                echo  "
                <div class='alert alert-primary col-lg-6 text-center mx-auto' role='alert'>
                    Your account already has been activated $name
                    <a href='https://adriankotyraprojects.co.uk/websites/project%20group%20candle/login.php'> 
                    <br>
                    <button name='back_to_login' class='btn btn-primary'>Back to login page</button>
            
            
                </a>
            
                </div>";
            }
            else {
                $query_update_user = "UPDATE accounts_candles SET status  = 'active' where user_activation_number = '{$token_input}'";
    
                $update = mysqli_query($conn, $query_update_user);
                echo  "
                <div class='alert alert-primary col-lg-6 text-center mx-auto' role='alert'>
                    Your account is activated $name
                    <a href='https://adriankotyraprojects.co.uk/websites/project%20group%20candle/login.php'> 
                    <br>
                    <button name='back_to_login' class='btn btn-primary'>Back to login page</button>
            
            
                </a>
            
                </div>";
        
            }
        }
      
    

    }










?>