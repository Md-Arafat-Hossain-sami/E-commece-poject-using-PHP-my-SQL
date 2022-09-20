<?php
// Including connect file
include('./Includes/connect.php');

function cart(){
    if(isset($_GET['add_to_cart'])){
        global $conn;
        $get_ip_add=getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
        $select_query="Select * from `cart_table` where ip_addresss ='$get_ip_add' and
        product_d ='$get_product_id' ";
        $result_query=mysqli_query($conn, $select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo "<script>alert('This item is already prsentn in the cart')</script>";
            echo "<script>window.open('Index.php','_self')</script>";
        }else{
            $insert_query="INSERT INTO cart_table".
  "(product_d,ip_addresss,qantty) "."VALUES"."('$get_product_id','$get_ip_add',0)";
            $result_query=mysqli_query($conn, $insert_query);
            echo "<script>alert('Item is added to the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}


//function to get cart item number
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $conn;
        $get_ip_add=getIPAddress();
       
        $select_query="Select * from `cart_table` where ip_addresss ='$get_ip_add'";
        
        $result_query=mysqli_query($conn, $select_query);
        $count_cart_item=mysqli_num_rows($result_query);
        }else{
            global $conn;
            $get_ip_add=getIPAddress();
           
            $select_query="Select * from `cart_table` where ip_addresss ='$get_ip_add'";
            
            $result_query=mysqli_query($conn, $select_query);
            $count_cart_item=mysqli_num_rows($result_query);
        }
        echo $count_cart_item;
    }

    //total pce fnction
    function total_cart_price(){
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
                $product_value=array_sum($product_price);
                $total_price+=$product_value;
            }
        }

        echo $total_price;
    }


?>


<?php  
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  
?>  

