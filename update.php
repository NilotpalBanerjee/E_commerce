<?php

error_reporting(E_ALL);

$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "ecomm";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) 
{
    echo " Joining unsuccessful 😔";
}


if(isset($_POST['submit']))
{
    $id=$_POST['id'];
    $product=$_POST['product'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $new_img = $_FILES["new_img"]["name"];
    $old_img = $_POST['old_img'];
    

    if($new_img !='')
    {
        $update = $_FILES["new_img"]["name"];
    }
    else
    {
        $update = $old_img;
    }

    if($_FILES["new_img"]["name"] !='')
    {
        if(file_exists("product_img/".$_FILES["new_img"]["name"]))
        {
            $file = $_FILES["new_img"]["name"];
            header('location: edit.php');
        }
    }
    else
    {
        $query="UPDATE product SET pname='$product',price='$price',quantity='$quantity',file='$update'WHERE id='$id'";
        $run=mysqli_query($conn,$query);
        if($run)
        {
            if($_FILES["new_img"]["name"] !='')
            {
                move_uploaded_file($_FILES["new_img"]["tmp_name"], "product_img/".$_FILES["new_img"]["name"]);
                // unlink("product_img/".$old_img);
            }
            echo " Update is Successfully";
            header('location:tables.php');
        }
        else
        {
            echo"Update Unsuccesfull. Plz notify admin";
        }
    }
}

?>