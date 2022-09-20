<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Only-css-link -->

    <link rel="stylesheet" href="Admin.css">
    <style>
        .admin-image {
    width: 100px;
    object-fit: contain;
}
    </style>
    <!-- Bootstrap css Link -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- font awosome Link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
 crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<!-- Navbar -->

<!-- First-part -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark"> 
        <div class="container-fluid">
            <img src="../image/logo123.png" alt=""class="logo"></img>
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link text-white">Welcome Arafat</a>
                    </li>
                </ul>
        </div>
    </nav>

    <!-- Second-part -->
<div class="bg-light">
    <h3 class="text-center p-2">Manage Details</h3>
</div>

<!-- Third-Part -->

 <div class="row">
    <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="p-3" >
            <a href="#"><img src="../image/My-pic.png" alt="" class="admin-image"></a>
            <p class="text-light text-center">Arafat Hossain </p>
        </div>
        <div class="button text-center">
        <button class="my-3"><a href="insert_product.php" class="nav-link text-dark my-1">Insert Product</a></button>
        <button><a href="" class="nav-link text-dark  my-1">View Product</a></button>
        <button><a href="Admin.php?insert_categories" class="nav-link text-dark  my-1">Insert Categories</a></button>
        <button><a href="" class="nav-link text-dark  my-1">View category</a></button>
        <button><a href="Admin.php?insert_brands" class="nav-link text-dark  my-1">Insert Brand</a></button>
        <button><a href="" class="nav-link text-dark  my-1">View Brand</a></button>
        <button><a href="" class="nav-link text-dark  my-1">All Orders</a></button>
        <button><a href="" class="nav-link text-dark  my-1">All Payments</a></button>
        <button><a href="" class="nav-link text-dark  my-1">List Users</a></button>
        <button><a href="" class="nav-link text-dark  my-1">LOGOUT</a></button>
    </div>
</div>
 </div>
<!-- Forth Part  -->

<div class="container m-5">
    <?php
    if(isset($_GET['insert_categories'])){
        include('insert_categories.php');
    }
    if(isset($_GET['insert_brands'])){
        include('Insert_Brands.php');
    }
    ?>
</div>

</div>



 <!-- !-- Bootstrap js Link --> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!-- !-- Footer Part --> 
<div class="bg-info p-3 text-center footer">
  <p>All rights reserved @- Designed by Md Arafat Hossain</p>
</div>
</body>
</html>