<?php
$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "ecomm";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);


if ($conn) 
{
 
$yname=$_POST["yname"];
$uname=$_POST["uname"];
$email=$_POST["email"];
$pass=$_POST["pass"];
$cpass=$_POST["cpass"];

$check="SELECT * FROM register WHERE uname = '$uname'";
$rs = mysqli_query($conn,$check);
$data = mysqli_num_rows($rs);
if($data >= 1) 
{
     echo "User Name  Already in Exists <br/>";
}
    else{
            $checke="SELECT * FROM register WHERE email = '$email'";
            $rse = mysqli_query($conn,$checke);
            $datae = mysqli_num_rows($rse);
            if($datae >= 1) 
            {
                echo "Email Already in Exists <br/>";
            }

            else
            {
                $query="INSERT INTO register(yname, uname, email, pass, cpass) VALUES ('$yname','$uname','$email','$pass','$cpass')";
                $rs = mysqli_query($conn,$query);
                if (!$query) 
                    {
                        echo "Register Unsuccessful ";
                    }
                if ($query) 
                    {
                        echo "<br>";
                        echo "Register Successful ";
                        header('Location:login.html');
                    }
            }
                }
            }
?>