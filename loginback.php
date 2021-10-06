<?php

include_once("connection.php");
include_once("function.php");


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //something was posted

    $var_username = $_POST['username'];
    $var_password = $_POST['password'];

    if(!empty($var_username) && !empty($var_password))
    {
        //read database

        $query = "select * from userdata where username = '$var_username' limit 1";

        $result = mysqli_query($conn, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] === $var_password)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.html");
                    die;
                }
            }
            
            
               
           
        }
        
        echo '<script>alert("Please enter correct username and password");</script>';
        
    }
    else
    {
        echo 'Please Enter Valid Information';
    }
}
?>
