<?php
include_once("connection.php");


$uname=$_POST['username'];
$pass=password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql="INSERT INTO doclogin (user, pass) VALUES ('$uname', '$pass');";

mysqli_query($conn, $sql);
header("Location: Admindock.php?=success");