<?php
$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "ecomm";

$con = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$con) {
        echo "Joining unsuccessful";
    }
    else{
$id=$_POST["id"];
$sq="SELECT * FROM product WHERE id = '$id'";
$rs=mysqli_query($con,$sq);
$data=mysqli_fetch_assoc($rs);
$i=$data["id"];
$name=$data["pname"];
$pr=$data["price"];
$q=$data["quantity"];
$z=$q+1;
$qury="SELECT * FROM cart WHERE id='$i'";
$r1=mysqli_query($con,$qury);
  if(mysqli_num_rows($r1)==1){
          
          $m="UPDATE cart SET quantity='$z' WHERE id='$i'";
          
          $r2=mysqli_query($con,$m);
        
}
else{
$qry="INSERT INTO cart(id, pname, price,quantity) VALUES ('$i','$name','$pr','$q')";
$r=mysqli_query($con,$qry);
if($r){
  $y="SELECT* FROM cart";
  $ra=mysqli_query($con,$y);
  $v=mysqli_num_rows($ra);
  echo $v;
  }
else{
echo"item added failed";
}
}
}
?>