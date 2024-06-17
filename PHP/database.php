<?php

$server = "localhost";    //Host Name
$username = "root";      //DB Username
$password = "";          //DB Password
$dbname = "dypcetbus";    //Database Name

$con = mysqli_connect($server, $username, $password, $dbname);
if(!$con)
    die("Connection Falied".$mysqli->error);
else
     echo "Connection Success";

?>