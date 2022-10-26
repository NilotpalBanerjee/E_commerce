<?php
$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "ecomm";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);


if ($conn) 
{
$pro=$_POST["pro"];
$pri=$_POST["pri"];
$quan=$_POST["quan"];
$file = $_FILES["file"]["name"];
$tempname = $_FILES["file"]["tmp_name"];
$folder = "./product_img/" . $file;

    $query="INSERT INTO product(pname,price,quantity,file) VALUES ('$pro','$pri','$quan','$file')";
    $rs = mysqli_query($conn,$query);

                if (move_uploaded_file($tempname,$folder)){
                    // echo "<h3>  Image uploaded successfully </h3>";
                }
                else{
                    echo "<h3>  Failed to upload image </h3>";
                }
                if (!$query){
                        echo "<h3> Register Unsuccessful </h3> ";
                    }
                if ($query){
                        // echo "<h3> Register Successful </h3>";
                        header('Location:tables.php');
                    }
}
?>