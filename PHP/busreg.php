<?php

$server = "localhost";    //Host Name
        $username = "root";      //DB Username
        $password = "";          //DB Password
        $dbname = "dypcetbus";    //Database Name

        $con = mysqli_connect($server, $username, $password, $dbname);
        if(!$con)
            die("Connection Falied".$mysqli->error);
        
            

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $class = $_POST['class'];
        $pickup = $_POST['pickup'];
        $parentscontact = $_POST['parentscontact'];
        $uniqueid = $_POST['uniqueid'];
        $gender = $_POST['gender'];
        $street = $_POST['street'];
        $locality = $_POST['locality'];
        $city = $_POST['city'];
        $pincode = $_POST['pincode'];



        

       $query= "INSERT INTO `busreg` ( `fullname`, `class` , `pickup`, `parentscontact`, `uniqueid`, `gender` , `street` , `locality` , `city` , `pincode`) VALUES('$fullname', '$class','$pickup', '$parentscontact', '$uniqueid','$gender','$street','$locality','$city','$pincode')";

        if (mysqli_query($con, $query)) {
            // Redirect to the dashboard page
            header("Location:student_home.html");
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