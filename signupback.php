<?php
session_start();

// Including all files that makes connects a database and use function in other files
include("connection.php");
include("function.php");

// Select a database if working with multiple
mysqli_select_db($conn,"loginsystem");


// When the candidate click on submit
if ($_SERVER['REQUEST_METHOD'] == 'POST');
{
        
    // Accessing details entered by candidate to save into database
    $var_username = $_POST["username"];
    $var_password =$_POST["password"];
   
    // Validations for details entered by candidate
    if (empty_user_details($var_username, $var_password) !== false){
        header("location:signup.php?error=Empty_user_details");
        exit();

    }


    if (invalid_username($var_username) !== false){
        header("location:signup.php?error=invalid_username");
        exit();

    }


    if (user_details_exist($conn,$var_username, $var_password) !== false){
        header("location:signup.php?error=user_exist");
        exit();

    }
        create_user($conn,$var_username,$var_password);
    
}
?>