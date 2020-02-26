<?php
session_start();
include_once("connection.php");
	
$message="";
if(!empty($_POST["login"])) {
	$result = mysqli_query($conn,"SELECT * FROM doclogin WHERE user='" . $_POST["username"] . "' and pass = '". $_POST["password"]."'");
	$row  = mysqli_fetch_array($result);
	if(is_array($row)) {
	$_SESSION["id"] = $row['id'];
	} else {
	$message = "Invalid Username or Password!";
	}
}
if(!empty($_POST["logout"])) {
	$_SESSION["id"] = "";
	session_destroy();
}
?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="Homepage.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="PRegister.php">Patients</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="DoctorRegistration.php">Doctors</a>
      </li>
       </ul>
  </div>
</nav>



<title>Doctor Login</title>

</head>
<body>
<div>
<div style="display:block;margin:0px auto;">
<?php if(empty($_SESSION["id"])) { ?>
<form class="form-signin form-group" action="" method="post" id="frmLogin">
	<div class="card mx-auto" style="width: 24rem;">
		<h1 class="card-header">
			Please Log in
		</h1>
	<div class="alert alert-warning"><?php if(isset($message)) { echo $message; } ?></div>	
	<div class="form-group">
		<div><label for="login" >Username</label></div>
		<div><input name="username" type="text" class="form-control"></div>
	</div>
	<div class="field-group">
		<div><label for="password">Password</label></div>
		<div><input name="password" type="password" class="form-control"> </div>
	</div>
	<div class="field-group">
		<div><input type="submit" name="login" value="Login" class="btn btn-primary"></span></div>
	</div>  
	</div>     
</form>
<?php 
} else { 
$result = mysqlI_query($conn,"SELECT * FROM doclogin WHERE id='" . $_SESSION["id"] . "'");
$row  = mysqli_fetch_array($result);
?>
<form action="" method="post" id="frmLogout">
<div class="alert alert-success">Welcome <?php echo ucwords($row['user']); ?>, You have successfully logged in!<br>
Click to <input type="submit" name="logout" value="Logout" class="btn btn-primary">.</div>
</form>
</div>
</div>
<?php } ?>
</body>
</html>