<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$my_conn=mysqli_connect($servername,$username,$password,$dbname);
if(! $my_conn)
die("connection failed" . mysqli_connect_error());