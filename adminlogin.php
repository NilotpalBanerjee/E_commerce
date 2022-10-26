<?php
session_start();
$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "ecomm";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) 
    {
        echo " Joining unsuccessful";
    }
$user=$_POST["user"];
$email=$_POST["email"];
$pass=$_POST["pass"];

 $check="SELECT * FROM admin WHERE email='$email'"; 
$rs = mysqli_query($conn,$check);
$data=mysqli_fetch_assoc($rs);
 $datap = mysqli_num_rows($rs); 
if ($datap==1) 
    {
        if($pass==$data["pass"])
        {
           
            $_SESSION["email"] = $data["email"];
            $_SESSION["pass"] = $data["pass"]; 
            header('location:admindash.php');
        }
        else{
            echo "Unsuccessful";
            header('Location:adminlogin.html');
            exit;
        }
        
    }
        else
            {
             echo "Unsuccessful";
             header('Location:adminlogin.html');
             exit;
            }
    
   
?>