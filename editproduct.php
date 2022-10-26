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
else
{
    $id=$_GET['id'];
    $query="SELECT * FROM product WHERE id='$id'";
    $data=mysqli_query($conn,$query);
    $total=mysqli_num_rows($data);
    $result=mysqli_fetch_assoc($data);
    
}

if(isset($_POST['submit'])=="submit")
{
   $product=$_POST['product'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    
    

if(!empty($_FILES['file']['name'])){
  
    echo $file = $_FILES["file"]["name"]; 
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "./product_img/" . $file;

        if (move_uploaded_file($tempname,$folder)){
            // echo "<h3>  Image uploaded successfully </h3>";
        }
           echo $update = $file = $_FILES["file"]["name"];
        }
        else{
         echo   $update = $_POST['img'];
        }
    
         $query="UPDATE product SET pname='$product',price='$price',quantity='$quantity',file='$update'WHERE id= '$id'";
        $run=mysqli_query($conn,$query);
        if($run){
            // echo " Update is Successfully";
            header('location:tables.php');
        }
        else{
            echo"Update Unsuccesfull. Plz notify admin";
        }
    
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="admindash.php">Admin Panel</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity</a></li>
                        <li><a class="dropdown-item" href="adminregister.html">Add user</a></li>
                        <li><hr class="dropdown-divider"/></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="admindash.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                        <h1 class="mt-4">Edit Product</h1>
                        <div class="container shadow border" style="width:800px;">
                        <form id="my-form" action="" method="post" enctype="multipart/form-data">
                        <br><div class="row">
                            <div class="col-sm-5">
                                <h5>Change Product Name</h5>
                            <input type="text" class="form-control" id="pro" name="product"
                             value="<?php echo $result['pname'] ?>">
                            </div>
                            <div class="col-sm-5">
                                <h5>Change Product Image</h5>
                            <input type="file" class="form-control" id="file" name="file">
                            <input type="text" class="form-control" id="img" name="img"
                            value="<?php echo $result['file'] ?>">
                            <small>Upload Product image</small>
                            </div>
                            <div class="col-sm-2">
                            <img src="./product_img/<?php echo $result['file']; ?>" 
                            style="hight:100px;width:100px;" >
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>Change Product Price</h5>
                            <input type="number"class="form-control"id="pri" name="price"
                            value="<?php echo $result['price'] ?>">
                            </div>
                            <div class="col-sm-6">
                                <h5>Change Prouct Quantity</h5>
                            <input type="number"class="form-control" id="quan" name="quantity"
                            value="<?php echo $result['quantity'] ?>">
                            </div>
                        </div><br><hr>
                            <div class="form-group">
                            <button type="submit" class="btn btn-success" id="submit" name="submit" value="submit">Submit</button>
                            </div><br>
                        </form>
                    </div>
                </main>
                <script>
                    document.getElementById('my-form').onsubmit = function () {
                        alert("Product Update Successfully");
                        };
                </script>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>