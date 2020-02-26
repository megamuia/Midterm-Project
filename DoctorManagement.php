<?php
include_once("connection.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor Information</title>
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
        <a class="nav-link" href="patientmanagement.php">Patients</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Doctormanagement.php">Doctors</a>
      </li>
      <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>
  </li>
       </ul>
  </div>
</nav>
</head>
<body>
  <?php 
  if (isset($_SESSION["message"])):?>

    <div class="alert alert-<?=$_SESSION["msg_type"]?>">
      
      <?php
      echo $_SESSION["message"];
      unset($_SESSION["message"]);
      ?>
    </div>
  <?php endif ?>
  <div class="card">
  <div class="card-header">
      <h1>Doctor Registration</h1>

  </div>
  <div class="card-body">
  <form action="rund.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="fname">First Name</label>
      <input type="text" class="form-control" 
      
      name="fname" id="fname"  placeholder="Daktari"  required>
    </div>
    <div class="form-group col-md-6">
      <label for="lname">Last Name</label>
      <input type="text" class="form-control"
       name="lname"  placeholder="Mzuri" " >
    </div>
      </div>
  <div class="form-group">
    <label for="spec">Speciality</label>
    <input type="text" class="form-control" id="spec"
    required  name="spec" placeholder="Optician, Paedetrecian etc." >
  </div>
  <div class="form-group">
    <label for="phone">Phone Number</label>
    <input type="number" class="form-control" name="phone" placeholder="07XXXXXXXX" required  >
  </div>
        <button type="submit" class="btn btn-primary" name="save">Submit</button>
</form>
</div>
</div>

 <?php 
      $sql="SELECT * from doctor;";
      $result=mysqli_query($conn, $sql);
      //pre_r($result);
      //pre_r($result-> fetch_assoc());
      ?>



  <div class="jumbotron jumbotron-fluid">
  <div class="container">
<table class="table table-bordered">
  <h1>Doctor Information</h1>
 
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Speciality</th>
      <th scope="col">Phone Number</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <?php

      function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
      }

      ?>
  
      
    <?php
    while($row= $result->fetch_assoc()): ?>
  <tr>
    <td> <?php echo $row["id"]; ?> </td>
    <td> <?php echo $row["fname"]; ?> </td>
    <td> <?php echo $row["lname"]; ?> </td>
    <td> <?php echo $row["speciality"]; ?> </td>
    <td> <?php echo $row["phone"]; ?> </td>
    <td> 
      <a href="admindock.php?edit=<?php echo $row["id"]; ?>" class="btn btn-info">Edit</a>
      <a href="rund.php?delete=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>
    </td>
  </tr>
<?php endwhile; ?>
</table>
</div>
</div>

</body>
</body>
</html>