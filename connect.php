<?php
error_reporting(0);

$servername = "localhost:3306";
$username   = "root";
$password   = "";
$dbname     = "employee";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn){
    //echo "Connection Successful";
}
else{
    echo "Connection Failed".mysqli_error_connect();
}
?>