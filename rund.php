<?php
include_once('connection.php');
session_start();

$fname="";
$lname="";
$spec="";
$phone="";


if (isset($_POST["save"])) {

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$spec=$_POST['spec'];
$phone=$_POST['phone'];

$sql="INSERT INTO doctor (fname, lname, speciality, phone) VALUES ('$fname', '$lname', '$spec', '$phone');";
$result=mysqli_query($conn, $sql);


$_SESSION["message"]="Record added!";
$_SESSION["msg_type"]="success";


header("LOCATION: master.php");


}
if (isset($_GET["delete"])) {
	$id=$_GET["delete"];
	$sql="DELETE FROM doctor WHERE id=$id;";
	$result=mysqli_query($conn, $sql);

	$_SESSION["message"]="Record Deleted!";
	$_SESSION["msg_type"]="danger";


	header("LOCATION: master.php");
}

if (isset($_GET["edit"])) {
	$id=$_GET["edit"];
	$sql="SELECT * FROM doctor WHERE id=$id;";
	$result=mysqli_query($conn, $sql);

	if (count($result)==1) {
		$row=$result->fetch_array();
		$fname=$row["fname"];
		$lname=$row["lname"];
		$spec=$row["speciality"];
		$phone=$row["phone"];
		}
		header("LOCATION: master.php?edit");

	
}