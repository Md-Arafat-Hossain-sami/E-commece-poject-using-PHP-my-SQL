<?php

include('../../Includes/connect.php');

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);


   $select = " SELECT * FROM login_register WHERE email = '$email' && password = '$pass'";
   $result = mysqli_query($conn, $select);



   if(mysqli_num_rows($result) > 0){
      // include('../../Admin-area/Admin.php');
      header('location: ../../Admin-area/Admin.php');

   }else{
       $error[]='Incorrect email or password !';
   }
}

  

//   if(mysqli_num_rows($result) > 0){
//    include('registration.php');
//    if()
//     $row = mysqli_fetch_array($result);
//     if($row['usertype'] =='admin'){
//         $_SESSION['email'] = $row['email'];
//         echo "usertype";

//     }elseif($row['usertype'] == 'user'){
//         $_SESSION['email'] = $row['email'];
//         echo "login welcome";
//     }
// }else{
//     $error[]='Incorrect email or password !';
// }

     



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <link rel="stylesheet" href="css/login.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post"  class= "w-50 vh-100">
   <div class="form-group">
      <h3>login now</h3>
    <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
     ?>   

<form action="" method="post" class= "w-50 vh-100">
  <div class="form-group w-50 vh-100">
    <label for="exampleInputEmail1">Email address</label><br/>
    <input type="email" name="email" class="form-control class= w-50 vh-100" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <br/>
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <br/><br/>
      <!-- <input type="email" name="email" required placeholder="enter your email"> -->
      <!-- <input type="password" name="password" required placeholder="enter your password"> -->
      <div class="form-group ">
    <label for="exampleInputPassword1">Password</label><br/>
    <input type="password" name="password" class="form-control w-50 vh-100" id="exampleInputPassword1" placeholder="Password">
  </div>

  <br/><br/>
      <!-- <input type="submit" name="submit" value="login now" class="form-btn"> -->
      <div class="form-outline mb-4 w-50 m-auto ">
    <input type="submit" class=" btn btn-primary btn-lg w-50 vh-100 " name="submit"
  value="Login">
            </div><br/>
      <p>don't have an account? <a href="registration.php">register now</a></p>
   </form>

</div>
</div>

</body>
</html>