<?php
$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "ecomm";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if($conn)
{
    $id=$_GET["id"];

        $query="DELETE FROM product WHERE id= '$id'";
        $run=mysqli_query($conn,$query);
        if($run)
        {
            // echo " Delete is Successful";
            header('location:tables.php');
        }
        else
        {
        echo"Delete Unsuccesful. Plz notify admin";
        }
}

?>
 

