<?php
// include('database.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cpass'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobileno = $_POST['mobileno'];
        $facultyid = $_POST['facultyid'];
        $department= $_POST['department'];
        $year = $_POST['year'];
        
        $password = $_POST['password'];
        $confirmPassword = $_POST['cpass'];

         if ($password != $confirmPassword) {
             echo "Passwords do not match.";
             exit; // Stop execution if passwords don't match
         }

        
        $Hostname = "localhost";    //Host Name
        $username = "root";      //DB Username
        $password = "";          //DB Password
        $dbname = "dypcetbus";    //Database Name
        
        $con = mysqli_connect($Hostname, $username, $password, $dbname);
        if(!$con)
            die("Connection Falied".$mysqli->error);
        

       $query= "INSERT INTO `faculty` (`id`,`name`, `email`, `mobileno`,`facultyid`,`department`,`year`,`password`) VALUES ('$id','$name', '$email', '$mobileno','$facultyid', '$department','$year','$confirmPassword')";

        if (mysqli_query($con, $query)) {
            // Redirect to the dashboard page
            header("Location:login_teacher.html");
            exit; // Make sure to exit after redirection
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_close($con,$query);
    } else {
        echo "Missing form data";
    }
}
?>