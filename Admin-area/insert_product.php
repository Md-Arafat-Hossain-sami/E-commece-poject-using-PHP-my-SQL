<?php
include('../Includes/connect.php');
if(isset($_POST['insert_pro'])){
   $product_title=$_POST['product_title'];
   $product_description=$_POST['product_description'];
   $product_keyword=$_POST['product_keyword'];
   $product_category=$_POST['product_categories'];
   $product_brand=$_POST['product_brand'];
   
//    accessing image
   $product_image1=$_FILES['product_image1']['name'];
   $product_image2=$_FILES['product_image2']['name'];
   $product_image3=$_FILES['product_image3']['name'];


//    accessing image tmp name 
   $temp_image1=$_FILES['product_image1']['tmp_name'];
   $temp_image2=$_FILES['product_image2']['tmp_name'];
   $temp_image3=$_FILES['product_image3']['tmp_name'];

   $product_price=$_POST['product_price'];

// checking empty condition

if($product_title=='' or $product_description=='' or $product_keyword=='' or  $product_category=='' or $product_brand=='' or $product_price==''){
    // or $product_image1=='' or $product_image2=='' or $product_image3==''
    echo "<script> alert('Please insert all the available field ')</script>";
    exit();
}else{
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image2,"./product_images/$product_image2");
    move_uploaded_file($temp_image3,"./product_images/$product_image3");



// insert query

//$insert_query= "INSERT INTO productt (product_title,product_description,product_keyword,product_category_id,product_brand_id,image1,image2,image3,product_price) VALUES ($product_title','$product_description','$product_keyword','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price')";

//$insert_query= "INSERT INTO productt"."(product_title,product_description,product_keyword,product_category_id,product_brand_id,image1,image2,image3,product_price)"."VALUES"."($product_title','$product_description','$product_keyword','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price')";

$insert_query="INSERT INTO productt"."(product_title,product_description,product_keyword,product_category_id,product_brand_id,image1,image2,image3,product_price)".
"VALUES"."('$product_title','$product_description','$product_keyword','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price')";
$result_query=mysqli_query($conn,$insert_query);
if($result_query){
    echo "<script> alert('Successfully inserted the products')</script>";
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product_Admin Dashboard</title>

     <!-- Bootstrap css Link -->

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<!-- font awosome Link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body class="bg-light">
    <div class= "container mt-3">
<h1 class="text-center"> Insert Product</h1>

<form action="" method="post"enctype="multipart/form-data" >

<div class="form-outline mb-4 w-50 m-auto ">
    <label for="product_title" class="form-lable">Product Title</label>
    <input type="text" name="product_title" id="product_title" class="form-control"
    placeholder="Enter product title" autocomplete="off">
    </div>
    <div class="form-outline mb-4 w-50 m-auto ">
    <label for="product_description" class="form-lable">Product Discription</label>
    <input type="text" name="product_description" id="product_description" class="form-control"
    placeholder="Enter product description" autocomplete="off">
    </div>
    <div class="form-outline mb-4 w-50 m-auto ">
    <label for="product_keyword" class="form-lable">Product Keyword</label>
    <input type="text" name="product_keyword" id="product_keyword" class="form-control"
    placeholder="Enter product keyword" autocomplete="off">
    </div>
<!-- Category -->

<div class="form-outline mb-4 w-50 m-auto">
    <select name="product_categories" id="" class="form-select">
        <option value="">select a category</option>
<?php
 $select_query="SELECT * FROM categories";
 $result_query=mysqli_query($conn,$select_query);
 while($row=mysqli_fetch_assoc($result_query)){
    $category_title=$row['CTitle'];
    $category_id=$row['categories_id'];
    echo  "<option value=' $category_id'>  $category_title</option>";
 }
?>

        <!-- <option value="">Categories1</option>
        <option value="">Categories2</option>
        <option value="">Categories3</option> -->
    </select>
</div>

<!-- Brand -->

<div class="form-outline mb-4 w-50 m-auto">
    <select name="product_brand" id="" class="form-select">
        <option value="">Select a Brand</option>

        <?php
 $select_query="SELECT * FROM brands";
 $result_query=mysqli_query($conn,$select_query);
 while($row=mysqli_fetch_assoc($result_query)){
    $brand_title=$row['brands_title'];
    $brand_id=$row['brand_id'];
    echo  "<option value='$brand_id'>$brand_title</option>";
 }
?>

<!-- 
        <option value="">Brand1</option>
        <option value="">Brand2</option>
        <option value="">Brand3</option> -->
    </select>
</div>

<!-- Image1 -->
    <div class="form-outline mb-4 w-50 m-auto ">
    <label for="product_image1" class="form-lable">Product Image1</label>
    <input type="file" name="product_image1" id="product_image1" class="form-control">
    </div>

<!-- image 2 -->
    <div class="form-outline mb-4 w-50 m-auto ">
    <label for="product_image2" class="form-lable">Product Image2</label>
    <input type="file" name="product_image2" id="product_image2" class="form-control">
    </div>
    <!-- Image3 -->
    <div class="form-outline mb-4 w-50 m-auto ">
    <label for="produc_image3" class="form-lable">Product Image3</label>
    <input type="file" name="product_image3" id="product_image3" class="form-control">
    </div> 

    <!-- Price -->
    <div class="form-outline mb-4 w-50 m-auto ">
    <label for="products_price" class="form-lable">Product Price</label>
    <input type="text" name="product_price" id="product_price" class="form-control"
    placeholder="Enter product price" autocomplete="off">
    </div>

    <!-- Button -->
    <div class="form-outline mb-4 w-50 m-auto ">
    <input type="submit" class=" bg-info border-0 p-2 my-3" name="insert_pro"
  value="Insert categories">
    
</form>

    </div>
        

  <!-- !-- Bootstrap js Link --> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!-- !-- Footer Part --> 
<!-- <div class="bg-info p-3 my-3 text-center footer">
  <p>All rights reserved @- Designed by Md Arafat Hossain</p>
</div>    -->
</body>
</html>