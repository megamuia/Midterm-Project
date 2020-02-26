<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>My First PHP</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
</head>
<body>
<div class="container">
<?php
$errEmail = $errPass= $errName="";
if(isset($_POST["submit"])) {

$email = $_POST['email'];
$name = $_POST['user'];
$password = $_POST['password'];
$valid=true;
// Check if name has been entered
if(empty($_POST['user'])){
$errName= 'Please enter your user name';
$valid=false;
}
// Check if email has been entered and is valid
if(empty($_POST['email'])){
$errEmail = 'Please enter a valid email address';
$valid=false;
}
// check if a valid password has been entered
if(empty($_POST['password']) || (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["password"]) === 0)) {
$errPass = '<p class="errText">Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit</p>';
$valid=false;
}
if($valid){
echo "The form has been submitted";
}

}
?>
<!-- end php code -->
<form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="form-group row">
<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
<div class="col-sm-10">
<input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
<?php echo $errEmail;?>
</div>
</div>
<div class="form-group row">
<label for="inputUser" class="col-sm-2 col-form-label">User Name</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="inputUser" name="user" placeholder="Username">
<?php echo $errName; ?>
</div>
</div>
<div class="form-group row">
<label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
<?php echo $errPass; ?>
</div>
</div>
<div class="form-group row">
<div class="offset-sm-2 col-sm-10">
<input type="submit" value="Sign in" name="submit" class="btn btn-primary"/>
</div>
</div>
</form>
</div>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>