<?php
include_once('connection.php');

if (isset($_POST["save"])) {


$fname=$_POST['fname'];
$lname=$_POST['lname'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];
$sex=$_POST['sex'];

$sql="INSERT INTO patient (fname, lname, phone, dob, sex) VALUES ('$fname', '$lname', '$phone', '$dob', '$sex')";;
mysqli_query($conn, $sql);


header( "LOCATION: master.php");
}

if (isset($_GET["delete"])) {
	$id=$_GET["delete"];
	$sql="DELETE * FROM patient WHERE id=$id;";
	mysqli_query($conn, $sql);

	header("LOCATION: master.php");
}