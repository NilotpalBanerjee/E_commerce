<?php
include("connect.php");

    if ('include') 
    {
      $id=$_POST["id"];
      $qa="SELECT * FROM product WHERE id = '$id'";
      $ra=mysqli_query($conn,$qa);
      $data=mysqli_fetch_assoc($ra);

      $id=$data["id"];
      $pname=$data["pname"];
      $price=$data["price"];
      $quantity=$data["quantity"];
      
      $qb="INSERT INTO cart(id, pname, price,quantity) VALUES ('$id','$pname','$price','$quantity')";
      $rb=mysqli_query($conn,$qb);
    }
    else
    {
     echo"Item added failed"; 
    }
?>
