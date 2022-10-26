<?php
$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "ecomm";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);


if ($conn) 
{
$user=$_POST["user"];
$email=$_POST["email"];
$pass=$_POST["pass"];

$check="SELECT * FROM admin WHERE email = '$email'";
$rs = mysqli_query($conn,$check);
$data = mysqli_num_rows($rs);
    if($data >= 1) 
    {
        echo "User Name  Already in Exists <br/>";
    }
    else
            {
                $query="INSERT INTO admin(user, email, pass) VALUES ('$user','$email','$pass')";
                $rs = mysqli_query($conn,$query);
                if (!$query) 
                    {
                        echo "Register Unsuccessful ";
                    }
                if ($query) 
                    {
                        echo "<br>";
                        echo "Register Successful ";
                        header('Location:adminlogin.html');
                    }
            }
}
?>