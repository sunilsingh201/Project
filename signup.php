<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign UP</title>


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
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
        rel="stylesheet">
</head>
<body>
    <div class="init-login-section">
        <h3 class="text-center">Sies Education Assistance Trust</h3>
        <p class="text-center init-text">RISE WITH EDUCATION</p>
        <div class="init-login-form col-10 col-md-4 mx-auto">
            <form action="signupback.php" method="post" class="col-6 col-md-8">
                <p class="init-intial my-3">Welcome! Please Register to continue.</p>
                <div class="init-login-name">
                    <input type="text" name="username" placeholder="...@ascn.sies.edu.in" class="form-control" required>
                </div>
                <div class="init-login-password">
                    <input type="password" name="password" placeholder="Password"  class="form-control" required>
                </div>
                <div class="init-login-submit">
                    <button type="submit" name="register" class="my-auto" >Register</button>
                </div>
                <div class="init-login-or">
                    <hr class="init-width-dimension mx-3">
                       or
                    <hr class="init-width-dimension  mx-3">
                </div>
                <div class="init-login-link">
                    <p class="text-center">Already Registered? <a href="login.php">Login</a></p>
                </div>


                <?php                
                    if (isset($_GET["error"])){
                        if ($_GET["error"] == "Empty_user_details") {
                            echo "<script language='javascript'>";
                            echo "alert('Fill in all required details')";
                            echo "</script>";
                            
                        }
                        else if($_GET["error"] == "invalid_username"){
                            echo '<script>alert("Invalid Username ");</script>';
            
                        }
                        
                        else if($_GET["error"] == "stmtfailed"){
                            echo "<script language='javascript'>";
                            echo "alert('Something went wrong please try again later')";
                            echo "</script>";
                        }
                        
                        else if($_GET["error"] == "user_exist"){
                            echo "<script language='javascript'>";
                            echo "alert('This username is not available')";
                            echo "</script>";
                        }
                        
                        else if($_GET["error"] == "none"){
                            
                            echo "<script language='javascript'>";
                            echo "alert('You successfully signed in ')";
                            echo "</script>";
                        }
                    }
                ?>


            </form>
        </div>
    </div>
</body>

</html>