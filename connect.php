<?php
$sname= "localhost";

$uname = "root";

$password = "";

$db_name = "ecomm";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if ($conn) 
  {
    // echo "Joining Successful";
  }
else
  {
    echo "Joining unsuccessful";
  }
  
?>