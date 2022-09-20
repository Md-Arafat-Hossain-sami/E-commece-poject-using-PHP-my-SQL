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
    <title>Trenza-Ecommerce</title>


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
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li> -->

    </div>

  </div>
</nav>

<!-- calling cart function -->


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
<!-- php code to display to show dynamic data -->
<?php
    global $conn;
            $get_ip_add=getIPAddress();
            $total_price=0;
            $cart_query="Select * from `cart_table` where ip_addresss ='$get_ip_add'";
            $result_query=mysqli_query($conn, $cart_query);
            while($row=mysqli_fetch_array($result_query)){
                $product_id=$row['product_d'];
                $select_product = "Select * from `productt` where product_id ='$product_id'";
                $result_product=mysqli_query($conn, $select_product);
                while($row_product_price=mysqli_fetch_array($result_product)){
                    $product_price=array($row_product_price['product_price']);
                    $price_table=$row_product_price['product_price'];
                    $product_title=$row_product_price['product_title'];
                    $product_image1=$row_product_price['image1'];
                    $product_value=array_sum($product_price);
                    $total_price+=$product_value;
         

?>

<!-- Body part 2 -->
<div class="container">
    <div class="row">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo  $product_title ?></td>
                    <td><img class='card-img-top' src='.\Admin-area\product_images<?php $product_image1?>' alt='Card image cap'></td>
                    <td><input type="text" name="" id=""></td>
                    <td><?php echo $price_table ?></td>
                    <td><input type="checkbox"></td>
                    <td class="d-flex ">
                        <button class="mx-3 bg-info ">Update</button>
                        <button class="mx-3 bg-info">Remove</button>
                    </td>
                </tr>
<?php
            }
            }
            ?>
            </tbody>
            </table>

            

        <!-- subtotal -->
        <div class="d-flex mb-5">
        <h5 class="px-4">Subtotal : <?php total_cart_price();?>/-</h5>
    <a href="Index.php"><button class="bg-primary px-3 py-2 border-0 mx-3">Continue Shopping</button></a>
    <a href="#"><button class="bg-secondary px-3 py-2 border-0">Make Payment</button></a>
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