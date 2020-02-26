<?php
include_once("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<title>AMAS</title>
</head>
<body>
<button class="tablink" onclick="openPage('Home', this, '#7FB3D5')">Patients</button>
<button class="tablink" onclick="openPage('News', this, '#5DADE2')" id="defaultOpen">Admin</button>
<button class="tablink" onclick="openPage('Contact', this, '#EB984E')">Doctor</button>
<button class="tablink" onclick="openPage('About', this, '#7DCEA0')">SMS Centre</button>

<div id="Home" class="tabcontent">
  
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
      <h1 class="p-3 mb-2 bg-secondary text-white">Doctor Registration</h1>

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
  <h1 class="p-3 mb-2 bg-secondary text-white">Doctor Information</h1>
 
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
</div>

<div id="News" class="tabcontent">
   
  <div class="card" style="width: 48rem; height: 32rem;">
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
  <button type="button" class="btn btn-primary " onclick="openPage('Home', this, '#7FB3D5')">Register Patients</button>
  <button type="button" class="btn btn-primary" onclick="openPage('Contact', this, '#EB984E')">Register Doctors</button> 
  <button type="button" class="btn btn-primary" onclick="openPage('About', this, '#7DCEA0')">Send SMS</button>   
  </div>
</div>
	
  
</div>

<div id="Contact" class="tabcontent">
  
  <div class="card">
  <div class="card-header">
      <h1 class="p-3 mb-2 bg-secondary text-white">Doctor Registration</h1>

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
  <h1 class="p-3 mb-2 bg-secondary text-white">Patient Information</h1>
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
</div>

<div id="About" class="tabcontent">

<body class="bg-light" >
        <div class="container mt-5">
            <div class="row justify-content-md-center">
                <div class="">
                    <h3 class="text-center">Send SMS</h3>
                </div>
            </div>
        </div>        
    <div class="container mt-3">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <form method="POST" action="#">
                  
                  <label for="lblMobileNumber">Mobile Number</label>
                  <input type="tel" name="userMobile" class="form-control" id="number" placeholder="919191919191"  required    oninvalid="Please Enter Proper Mobile Number" >
                  
                  <label for="lblMessage">Message</label>
                  <textarea class="form-control"  name="userMessage" required  id="textMessage" rows="3"  placeholder="Enter your message here" maxlength="158"></textarea>     

                  <button type="submit" name="SubmitButton"class="btn btn-outline-primary mt-3" id="btnSend">Send</button>
                  
                  <button type="button" class="btn btn-outline-secondary mt-3 ml-3" onclick="clearAllFields()">Clear</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-5">
            <div class="row justify-content-md-center">
                <div class="col-md-4">
                    <p  id-"response" class="text-center"></p>
                </div>
            </div>
        </div>
</body>
<script type="text/javascript">
function clearAllFields(){
    number.value="";
    textMessage.value="";
}
</script>
</html>

<?php 
if(isset($_POST['SubmitButton']))
{
$textMessage=$_POST["userMessage"];
$mobileNumber=$_POST["userMobile"];
$apiKey = urlencode('KBeufUThkhU-fmL7AlkiRcgiFLUZbYPQQIT5UvNyPF	');
   
   // Message details
   $numbers = array($mobileNumber);
   $sender = urlencode('AMAS');
   $message = rawurlencode($textMessage);
   $numbers = implode(',', $numbers);
   // Prepare data for POST request
   $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
   // Send the POST request with cURL
   $ch = curl_init('https://api.txtlocal.com/send/');
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $response = curl_exec($ch);
   curl_close($ch);   
   // Process your response here
   echo $response;
}    
?>
</div>
</body>
</html>
<script type="">
function openPage(pageName, elmnt, color) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }

  // Show the specific tab content
  document.getElementById(pageName).style.display = "block";

  // Add the specific color to the button used to open the tab content
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<style>
/* Set height of body and the document to 100% to enable "full page tabs" */
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style tab links */
.tablink {
  background-color: #D7BDE2;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}

.tablink:hover {
  background-color: #95A5A6;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 100px 20px;
  height: 100%;
}

#Home {background-color: #7FB3D5;}
#News {background-color: #5DADE2;}
#Contact {background-color: #EB984E;}
#About {background-color: #7DCEA0;}
</style>