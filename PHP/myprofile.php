<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bus Request</title>

  <meta name="author" content="Codeconvey" />
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

  <!--Only for demo purpose - no need to add.-->
  <link rel="stylesheet" href="css/demo.css" />

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
  
  
  $query = 'SELECT * FROM `triprequest`';
  $result = $con->query($query);
  
  if ($result->num_rows > 0) {
    $profile = $result->fetch_assoc();
  } else {
    echo 'data Not Available!';
    header("Location:faculty_home.html");
  }
  
  mysqli_close($con);
  ?>

  <header class="ScriptHeader">
    <div class="rt-container">
      <div class="col-rt-12">
        <div class="rt-heading">
          <h1>Bus Request</h1>
          <h4 class="mt-5">Dear Faculty, the details regarding your trip as per mentioned by you in the Trip Request form are mentioned below. Kindly wait for the request to be approved!</h4>
        </div>
      </div>
    </div>
  </header>

  <section>
    <div class="rt-container">
      <div class="col-rt-12">
        <div class="Scriptcontent">

          <!-- Student Profile -->



          <div class="col-lg-4">
            <div class="card shadow-sm">

            </div>
          </div>

          <div class="card shadow-sm">
            <div class="card-header bg-transparent border-0">

            </div>
            <div class="card-body pt-0">
              <table class="table table-bordered">
                <tr>
                  <th width="30%">Faculty Name</th>
                  <td width="2%">:</td>
                  <td><?php echo $profile['facultyname']; ?></td>
                </tr>
                <tr>
                  <th width="30%">Department</th>
                  <td width="2%">:</td>
                  <td><?php echo $profile['department']; ?></td>
                </tr>
                <tr>
                  <th width="30%">Location</th>
                  <td width="2%">:</td>
                  <td><?php echo $profile['location1']; ?></td>
                </tr>
                <tr>
                  <th width="30%">Departure</th>
                  <td width="2%">:</td>
                  <td><?php echo $profile['departure']; ?></td>
                </tr>
                <tr>
                  <th width="30%">Status</th>
                  <td width="2%">:</td>
                  <td><?php echo $profile['status']; ?></td>
                </tr>
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