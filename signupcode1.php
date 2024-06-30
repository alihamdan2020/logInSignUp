<?php
session_start();

$errors=[];

if(empty($_POST['username']))
$errors['uname']="user name should be not empty";

if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL) || empty($_POST["email"]))
$errors['email']="your eamil is not valid";

if(strlen($_POST['password'])<8)
$errors['password']="your password must be greater than or equal to 8";
elseif (! preg_match("/[A-Z]/i",$_POST['password']))
$errors['password']="your password must contain at least one cappital letter";
elseif(! preg_match("/[0-9]/i",$_POST['password']))
$errors['password']="your password must contain at least one digit";
elseif(! preg_match("/[^a-zA-Z0-9]/",$_POST['password']))
$errors['password']="your password must contain at least one special chartacters";
elseif($_POST['password']!==$_POST['confirm_password'])
$errors['password']="your password not matching";

if(count($errors)==0)
{
    $hash_password=password_hash($_POST['password'],PASSWORD_BCRYPT);
    $myconn=require "database.php";
    require "checkMail.php";
    $existEmail=check_if_exist($myconn,$_POST['email']);
    
    if($existEmail>0)
    {
        $errors["existMail"]="this email already exist";
        $_SESSION["errors"]=$errors;
        header("Location:signup.php");
        exit;
    }
    else
    {
        $sql="insert into users (name,email,password_hash) values (?, ?,?)";
        $stmt=mysqli_prepare($myconn,$sql);
        mysqli_stmt_bind_param($stmt,"sss",strip_tags($_POST['username']),strip_tags($_POST['email']),$hash_password);
        if(mysqli_stmt_execute($stmt))
        {
            header("Location: signupSuccess.html");
            exit;
        }

    }
}
else
{
    $_SESSION["errors"]=$errors;
    header("location: signup.php");
    exit;
}
?>