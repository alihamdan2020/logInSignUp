<?php
// in this i use a differet way for connection, where conn.php no return
require "conn.php";
$sql="select * from users";
$result=mysqli_query($my_conn,$sql);
//insted of set results into an array
$users=mysqli_fetch_all($result,MYSQLI_ASSOC);
// print_r($users);
include "displayUser.php"; // just to use the function inside it
foreach($users as $user)
{
    display($user);
}