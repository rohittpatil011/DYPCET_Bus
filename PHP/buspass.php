<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bus Pass</title>

  <meta name="author" content="Codeconvey" />
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

  <!--Only for demo purpose - no need to add.-->
  <link rel="stylesheet" href="css/buspass.css" />

  <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php
session_start();



$Hostname = "localhost";
$username = "root";
$password = "";
$dbname = "dypcetbus";

$con = mysqli_connect($Hostname, $username, $password, $dbname);
if (!$con) {
  die("Connection Failed: " . $mysqli->error);
}


$query = 'SELECT * FROM `busreg`';
$result = $con->query($query);

if ($result->num_rows > 0) {
  $profile = $result->fetch_assoc();
} else {
  echo 'data Not Available!';
  header("Location:student_home.html");
}

mysqli_close($con);
?>

  <header class="ScriptHeader">
    <div class="rt-container">
      <div class="col-rt-12">
        <div class="rt-heading">
          <h1>BUS PASS</h1>
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
                      <p class="mb-0"><?php echo $profile['fullname']; ?></p>
                    </div>
                    <div class="card-body">
                      <p class="mb-0"><strong class="pr-1">Department :</strong><?php echo $profile['class']; ?></p>
                      <p class="mb-0"><strong class="pr-1">Pickup Point :</strong><?php echo $profile['pickup']; ?></p>
                      <p class="mb-0"><strong class="pr-1">Parents Contact :</strong><?php echo $profile['parentscontact']; ?></p>
                     
                      <p class="mb-0"><strong class="pr-1">Unique Id :</strong><?php echo $profile['uniqueid']; ?></p>
                      <p class="mb-0"><strong class="pr-1">Gender :</strong><?php echo $profile['gender']; ?></p>
                      <p class="mb-0 mt-2 "><strong class="pr-1">Status :</strong><?php echo $profile['status']; ?></p>

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