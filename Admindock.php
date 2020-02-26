<!DOCTYPE html>
<html>
<head>
	<title>Adminstrator Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript" src="jquery.js"></script>

	<script type="" src="tabledit/jquery.tabledit.js"></script>
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
        <a class="nav-link" href="PReatientmanagement.php">Patients</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Doctormanagement.php">Doctors</a>
      </li>
       </ul>
  </div>
</nav>

</head>
<body>
  <div class="card" style="width: 48rem;">
  <div class="card-body">
    <form class="form-inline" action="created.php" method="POST">
    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="username">Doctor Username</label>
      <select name="username" class="form-control"
      <?php
  include_once("connection.php");


$sql="SELECT fname FROM doctor;";
$result=mysqli_query($conn, $sql);
$check=mysqli_num_rows($result);

  if($check >0){
  while($row=mysqli_fetch_assoc($result)){
    $fname=$row['fname'];
    echo "<option value='$fname'>$fname </option>";
  }
}
  ?>
  >
       
      </select>
    </div>
<div class="form-group col-md-6">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
</div>
<button type="submit" class="btn btn-primary">Register</button>
    

  </form>
  <a href="patientmanagement.php"><button type="button" class="btn btn-primary" >Register Patients</button></a>
  <a href="Doctormanagement.php"><button type="button" class="btn btn-primary" >Register Doctors</button></a>    
  </div>
</div>
	
  
  
</body>
</html>