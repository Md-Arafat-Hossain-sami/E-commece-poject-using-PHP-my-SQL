
<?php
include('../Includes/connect.php');


if(isset($_POST['insert_brand'])){
  $bands_title=$_POST['brand_title'];
  
  $select_query="SELECT * FROM brands WHERE brands_title='$bands_title'";


  $result_select=mysqli_query($conn,  $select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo"<script>alert('This Brand is prersent inside the database')</script>";
  }
  else{

  $insert_query="INSERT INTO brands ".
  "(brands_title) ".
  "VALUES"."('$bands_title')";
  $result=mysqli_query($conn,$insert_query);
 if($result){
    echo "<script>alert('Brand has been inserted successfully')</script>";
  }
}}

?>



<form action="" method="post" class="mb-2">

<div class="input-group w-90 mb-2">
  <div class="input-group-prepend">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt p-2"></i></span>
  </div>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group w-2 mb-2">
  
<input type="submit" class=" bg-info border-0 p-2 my-3" name="insert_brand" 
  value="Insert Brand">


</form>