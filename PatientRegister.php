<!doctype html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="signin.css">
<title>Patient Registration</title>
</head>
<body>
	    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">AMAS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="Homepage.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="About.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Disabled</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container">
<h1>Patient Registration</h1>
<form method="POST" action="">
  <div class="form-row">
    
    <div class="form-group col-md-6" >
      <label for="name">Full Name</label>
      <input type="name" class="form-control" id="name" placeholder="Daudi Juma" required>
    </div>
	<div class="form-group col-md-6">
      <label for="dob">Date of Birth</label>
      <input type="date" class="form-control" id="dob" placeholder="dd/mm/yyyy" required>
    </div>
	<div class="form-group col-md-4">
      <label for="sex">Sex</label>
      <select id="sex" class="form-control">
        <option selected>Choose...</option>
        <option>Male</option>
		<option>Female</option>
		
      </select>
    </div>
  </div>
    <div class="form-group">
    <label for="phone">Phone Number</label>
    <input type="number_format" class="form-control" id="phone" placeholder="07XXXXXXXX" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputcounty">County</label>
      <select id="inputcounty" class="form-control" required>
        <option selected>Choose...</option>
        <option>Nairobi</option>
		<option>Machakos</option>
		<option>Mombasa</option>
		<option>Nyeri</option>
		<option>Kiambu</option>
		<option>Murang'a</option>
		<option>Makueni</option>
		<option>Kilifi</option>
		<option>Uasin Gishu</option>
		<option>Turkana</option>
		<option>Mandera</option>
		<option>Kakamega</option>
      </select>
    </div>
      </div>
 
  <button type="submit" class="btn btn-primary">Register</button>
</form>

<!-- Login Link -->
</html>
<?php
if (isset($_POST[''])){
  $name = $_POST['name'];
  $dob= $_POST['dob'];
  $sex=$_POST['sex'];
  $phone=$_POST['phone'];
  $city=$_POST['inputCity'];
  $county=$_POST['inputcounty'];
}
if (!empty($name) || !empty($dob) || !empty($sex) || !empty($phone) || !empty($city) || !empty($county)) {
  $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "smssys";
$conn= new mysqli($host, $dbUsername, $dbPassword, $dbname);
if(mysqli_connect_error()){
  die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else{
	$SELECT= "SELECT phone from patients Where phone =? limit 1";
 $INSERT= "INSERT into patients (name, dob, sex, phone, city, county) values (?,?,?,?,?,?)";  
	$stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $phone);
     $stmt->execute();
     $stmt->bind_result($phone);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
	if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $name, $dob, $sex, $phone, $city, $county);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already registered using this phone";
     }
     $stmt->close();
     $conn->close();
    }
	
}

else
{
  echo'All fields are required';
  die();
}


?>