<?php

include_once("connection.php")
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registered Patients</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="#">AMAS</a>
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
       </ul>
  </div>
</nav>
</head>
<body>

  <div class="card">
  <div class="card-header">
      <h1>Doctor Registration</h1>

  </div>
  <div class="card-body">
    <form action="runp.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="fname">First Name</label>
      <input type="text" class="form-control" name="fname" placeholder="Johanna" required>
    </div>
    <div class="form-group col-md-6">
      <label for="lname">Last Name</label>
      <input type="text" class="form-control" name="lname" placeholder="Mtakatifu">
    </div>
  </div>
  <div class="form-group">
    <label for="phone">Phone Number</label>
    <input type="number" class="form-control" name="phone" placeholder="07XXXXXXXX" required>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="dob">Date Of Birth</label>
      <input type="date" class="form-control" name="dob">
    </div>
    <div class="form-group col-md-6">
      <label for="sex">Gender</label>
      <select name="sex" class="form-control">
        <option selected>Choose...</option>
        <option>Male</option>
        <option>Female</option>
      </select>
    </div>
    
  </div>
  
  <button type="submit" class="btn btn-primary" name="save">Register</button>
</form>
</div>
</div>


<?php 
      $sql="SELECT * from patient;";
      $result=mysqli_query($conn, $sql);
      //pre_r($result);
      //pre_r($result-> fetch_assoc());
      ?>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
	
<table class="table">
  <h1>Patient Information</h1>
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Date of Birth</th>
      <th scope="col">Sex</th>
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
    <td> <?php echo $row["phone"]; ?> </td>
    <td> <?php echo $row["dob"]; ?> </td>
    <td> <?php echo $row["sex"]; ?> </td>
    <td> 
      <a href="patientmanagement.php?show=<?php echo $row["id"]; ?>" class="btn btn-info">Show</a>
      <a href="runp.php?delete=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>

    </td>

</tr>
<?php endwhile; ?>

</table>
</div>
</div>
</body>
</html>

