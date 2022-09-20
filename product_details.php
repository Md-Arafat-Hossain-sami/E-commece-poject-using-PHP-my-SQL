<?php
include('./Includes/connect.php');
include('Functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Trenza-Ecommerce </title>


<!-- Bootstrap css Link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- Css Link -->
<link rel="stylesheet" href="Index.css">
<!-- font awosome Link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
 crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    
<!-- Navbar -->
<div class="container-fluid">
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <img src="./image/logo123.png" alt="" class="phlogo"/>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">CATEGORIES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">SHOP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">CONTACT</a>
        </li>
    
        <li class="nav-item dropdown">
          <a class="nav-link dropdown- text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            PRODUCT
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">MEN FASHION</a></li>
            <li><a class="dropdown-item" href="#">WOMEN FASHION</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">KIDS FASHION</a></li>
          </ul>

          <li class="nav-item">
          <a class="nav-link text-white" href="#">ACCOUNT</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="cart.php"><i class="fa-solid fa-cart-plus"></i><sup><?php cart_item() ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Total Price = <?php total_cart_price(); ?> Bdt </a>
        </li>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li> -->

    </div>

    <form class="d-flex">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<!-- calling adtocart functrions -->
<?php
cart();
?>

<!-- Body Part -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class ="navbar-nav me-auto">
<li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./Includes/Login/login.php">ADMIN LOGIN</a>
        </li>
</ul>
    
  </nav>

  <!-- Body part 1 -->
<div class="bg-light">
  <h3 class="text-center">Hidden Store</h3>
  <p class="text-center">Commnication is at the heart of e commerce and communty</p>
</div>


<!-- Body part 2 -->

<div class="row">
   <div class="col-md-10">
  <!-- Product -->

  <div class="row">
    <!-- fatching products -->

    <?php
 if(isset($_GET['products_id'])){
     $product_id=$_GET['products_id'];
 
     $select_query="select * from `productt` where product_id=$product_id";
  $result_query=mysqli_query($conn,$select_query);
 //  $row=mysqli_fetch_assoc($result_query);
 //  echo $row['product_title'];
  
  while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $category_id=$row['product_category_id'];
  $brand_id=$row['product_brand_id'];
  $product_image1=$row['image1'];
  $product_image2=$row['image2'];
  $product_image3=$row['image3'];
  $product_price=$row['product_price'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card'>
    <img class='card-img-top' src='./Admin-area/product_images/$product_image1' alt='Card image cap'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <h4>Price : $product_price BDT</h4>
      <a href='Index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart <i class='fa-solid fa-cart-plus'></i></a>
      <a href='Index.php' class='btn btn-secondary'>GO HOME</a>
    </div>
  </div>
  </div>
  
  <div class='col md-6'>
 <!-- related image -->
     <div class='row'>
     <div >
     <h4 class='text-center text-info mb-8'>Related Products</h4>
     </div>
     <div class='col md-3'>
     <img class='card-img-top' src='./Admin-area/product_images/$product_image2' alt='Card image cap'>
     </div>
     <div class='col md-3'>
    <img class='card-img-top' src='./Admin-area/product_images/$product_image3' alt='Card image cap'>
         
     </div>
 </div>
 </div>";
  }
 }
 
 ?>

  </div>
   </div> 

<!-- side navbar -->
<div class="col-md-2 bg-secondary p-0">
  <ul class="navbar-nav me-auto text-center">
    <li class=""nav-item bg-primary>
      <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
    </li>
    <li class="nav-item mb-4">
       <img class="Picture" src="./image/puma.png" alt="">
    </li>
    <li class="nav-item mb-4">
       <img class="Picture" src="./image/aarong.png" alt="">
    </li>
    <li class="nav-item mb-4">
       <img class="Picture" src="./image/Richman.png" alt="">
    </li>
    <li class="nav-item mb-4">
       <img class="Picture" src="./image/HM.png" alt="">
    </li>
    <li class="nav-item mb-4">
       <img class="Picture" src="./image/adidas-png.png" alt="">
    </li>
    <li class="nav-item mb-4">
       <img class="Picture" src="./image/Nike-png.png" alt="">
    </li>
    
  </ul>

</div>
</div>

</div>


<!-- Footer Part -->
<div class="bg-info p-3 text-center">
  <p>All rights reserved @- Designed by Md Arafat Hossain</p>
</div>

</div>
<!-- !-- Bootstrap js Link --> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>