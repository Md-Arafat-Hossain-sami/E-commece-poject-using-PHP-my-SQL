<?php
include('../Includes/connect.php');
// if($_SERVER['REQUEST_METHOD']=='POST'){
//   $title= $_POST['cat_title'];
//   $insert_query="insert into 'categories' (	'CTitle' ) values ('$title')";
//   $result=$mysqli→query($conn,$insert_query);
//   echo '<div class="alert alert-info" role="alert">
//   Category inserted successfully!
// </div>';
// }

if(isset($_POST['insert_cat'])){
  $category_title=$_POST['cat_title'];

  // $select_query="select * from 'categories' where CTitle='$category_title' ";

  $select_query="SELECT * FROM categories WHERE CTitle='$category_title'";


  $result_select=mysqli_query($conn,  $select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo"<script>alert('This category is prersent inside the database')</script>";
  }
  else{

  
  $insert_query="INSERT INTO categories ".
  "(CTitle) ".
  "VALUES"."('$category_title')";
  $result=mysqli_query($conn,$insert_query);
 if($result){
    echo "<script>alert('Category inserted successfully')</script>";
  }
  
}}

?>


<form action="" method="post" class="mb-2">

<div class="input-group w-90 mb-2">
  <div class="input-group-prepend">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt p-2"></i></span>
  </div>
  <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group w-2 mb-2">
  
  <input type="submit" class=" bg-info border-0 p-2 my-3" name="insert_cat" 
  value="Insert categories">
</form>