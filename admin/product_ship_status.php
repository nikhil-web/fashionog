<?php
include 'conn.php';

$p_ship_status=  mysqli_real_escape_string($db,$_POST["p_ship_status"]);
$cart_item_id  =  mysqli_real_escape_string($db,$_POST["cart_item_id"]);

$sql = "UPDATE cart_2 SET shipped ='$p_ship_status'  WHERE  cart_item_id ='$cart_item_id'";
$result=mysqli_query($db,$sql);
if(!$result){
      $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
       alert($error_fetch);
       navigate("sales.php");
    }else{
      alert("Updated Sucessfully");
      navigate("sales.php");
    }
mysqli_close($db);
?>
