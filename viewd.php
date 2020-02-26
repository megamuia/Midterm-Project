<?php
include_once('connection.php');



$sql="SELECT id, fname, lname, speciality, phone from doctor;";
$result=mysqli_query($conn, $sql);
$check=mysqli_num_rows($result);

if($check >0){
	while($row=mysqli_fetch_assoc($result)){
		 echo 
		 "<tr> 
		 <td>" . $row["id"]. "</td>
		 <td>" . $row["fname"] . "</td>
		 <td>". $row["lname"]. "</td> 
		 <td>" . $row["speciality"]. "</td> 
		 <td>" . $row["phone"]. "</td>
		 <td>" . "</td>
		 </tr> ";

		
		
	}
	
}
?>