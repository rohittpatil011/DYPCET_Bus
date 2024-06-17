<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>My Profile</title>

    <meta name="author" content="Codeconvey" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

    <!--Only for demo purpose - no need to add.-->
    <link rel="stylesheet" href="css/demo.css" />
    
	    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
session_start();

if (!isset($_SESSION['email'])) {
  header('Location: login.php');
  exit;
}

$Hostname = "localhost";
$username = "root";
$password = "";
$dbname = "dypcetbus";

$con = mysqli_connect($Hostname, $username, $password, $dbname);
if (!$con) {
  die("Connection Failed: " . $mysqli->error);
}

$email = $_SESSION['email'];

$query = 'SELECT * FROM `faculty` ';
$result = $con->query($query);

if ($result->num_rows > 0) {
  $profile = $result->fetch_assoc();
} else {
  echo 'Invalid Username or password!';
}

mysqli_close($con);
?>
		

<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<h1>My Profile</h1>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
<!-- Student Profile -->
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="https://source.unsplash.com/600x300/?student" alt="student dp">
            <p class="mb-0"><?php echo $profile['name']; ?></p>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Faculty ID :</strong><?php echo $profile['facultyid']; ?></p>
            <p class="mb-0"><strong class="pr-1">Contact :</strong><?php echo $profile['mobileno']; ?></p>
            <p class="mb-0"><strong class="pr-1">Email :</strong><?php echo $profile['email']; ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Faculty Details</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Department</th>
                <td width="2%">:</td>
                <td><?php echo $profile['department']; ?></td>
              </tr>
              <tr>
                <th width="30%">Academic Year</th>
                <td width="2%">:</td>
                <td><?php echo $profile['year']; ?></td>
              </tr>
              
              <tr>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>          
</div>
</div>
</div>
</section>

	</body>
</html>