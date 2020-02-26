<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Patient Registration</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
</head>

<body>
	<h1>Patient Registration</h1>
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
  
  <button type="submit" class="btn btn-primary">Register</button>
</form>
</body>
</html>

