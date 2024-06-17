<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit']) && isset($_POST['fullName']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cpass'])) {
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $mobileno = $_POST['mobileno'];
        $uniqueid = $_POST['uniqueid'];
        $Rollno = $_POST['Rollno'];
        $class = $_POST['class'];
        $academic_year = $_POST['academic_year'];
        $Gender = $_POST['Gender'];
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
        

       $query= "INSERT INTO `students` (`id`,`fullName`, `email`, `mobileno`, `uniqueid`,`Rollno`,`class`,`academic_year`, `Gender`, `password`) VALUES ('$id','$fullName', '$email', '$mobileno', '$uniqueid', '$Rollno','$class','$academic_year', '$Gender','$confirmPassword')";

        if (mysqli_query($con, $query)) {
            // Redirect to the dashboard page
            header("Location:login_page.html");
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