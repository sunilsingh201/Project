<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


    <!-- 
        Fontawesome
     -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- 
        Custom css
    -->
    <link rel="stylesheet" href="css/index.css">


    <!-- 
        Bootstrap 
    -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- 
        Google fonts
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
        rel="stylesheet">
</head>
<body>

    
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
                    header("Location: application.html");
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

    <div class="init-login-section ">
        <h3 class="text-center">Sies Education Assistance Trust</h3>
        <p class="text-center init-text">RISE WITH EDUCATION</p>
        <div class="init-login-form col-10 col-md-4 mx-auto init-login-background">
            <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"] == "none") {
                        echo "<script language='javascript'>";
                        echo "alert('You have signed in successfully')";
                        echo "</script>";
                    }
                }

            ?>
            <form action="login.php" method ="post" class="col-6 col-md-8">
                <p class="init-intial my-3">Welcome! Please login to continue.</p>


                <div class="init-login-name">
                    <input type="text" name="username" placeholder="...@ascn.sies.edu.in" class="form-control" required >
                </div>


                <div class="init-login-password">
                    <input type="password" name="password" placeholder="Password" class="form-control"  name="password" required>
                </div>


                <div class="init-login-submit">
                    <button type="submit" name="Login" class="my-auto">Login</button>
                </div>



            </form>
        </div>
    </div>
    






















</body>

</html>