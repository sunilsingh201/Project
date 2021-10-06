<?php
session_start();


function empty_user_details($var_username,$var_password){
    $var_result;
    if(empty($var_username) || empty($var_password)){
        $var_result = true;
        
    }
    else{
        $var_result = false;
        
    }
    return $var_result;
}

function invalid_username($var_username){
    $var_result;
    if(!preg_match("/^[a-zA-Z0-9-.-@]*$/",$var_username)){
        $var_result = true;
    }
    $var_result;
    if (!strpos($var_username,"ascn.sies.edu.in")){
        $var_result= true;
        
       
    }
    else{
        $var_result = false;
        
       
    }
    return $var_result;
}

/*
function  invalid_username($var_username){
    $var_result;
    if(!filter_var($var_username,FILTER_VALIDATE_EMAIL)){
        $var_result = true;
    }
    else{
        $var_result = false;
    }
    return $var_result;
}
*/
function user_details_exist($conn,$var_username){
    $var_sql = "SELECT * from userdata WHERE username = ?;";
    $var_stmt =mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($var_stmt,$var_sql)){
        header("location:signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($var_stmt,"s",$var_username);
    mysqli_stmt_execute($var_stmt);

    $var_result_data = mysqli_stmt_get_result($var_stmt);

    if ($var_row = mysqli_fetch_assoc($var_result_data)){
        return $var_row;
        $exists=true;
    }
    else{
        $var_result= false;
        return $var_result;
    }

    mysqli_stmt_close($var_stmt);



}


function create_user($conn,$var_username,$var_password){
    $var_sql = "INSERT INTO userdata (username, password) VALUES(?,?);";
    $var_stmt =mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($var_stmt,$var_sql)){
        header("location:signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($var_stmt,"ss",$var_username,$var_password);
    mysqli_stmt_execute($var_stmt);
    mysqli_stmt_close($var_stmt);
    header("location:login.php?error=none");
    exit();

}
















?>