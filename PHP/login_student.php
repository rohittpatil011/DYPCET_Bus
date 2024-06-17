<?php
    session_start();

    $Hostname = "localhost";    //Host Name
    $username = "root";      //DB Username
    $password = "";          //DB Password
    $dbname = "dypcetbus";    //Database Name
    
    $con = mysqli_connect($Hostname, $username, $password, $dbname);
    if(!$con)
        die("Connection Falied".$mysqli->error);

    
    $query = "SELECT * FROM `students` WHERE `email` = '".$_POST['email']."' AND `password` = '".$_POST['password']."'";
    $result = $con->query($query);
    if($result->num_rows > 0) {
    session_start();
    $_SESSION['email'] = $result->fetch_assoc();
    header("Location:student_home.html");
    } else {
        echo 'Invalid Username or password!';
    }
?>


