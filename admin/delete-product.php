<?php
include 'conn.php';

$product_id =  mysqli_real_escape_string($db,$_GET["p_id"]);

$sql = "DELETE FROM products WHERE p_id='$product_id'";
$result=mysqli_query($db,$sql);
if(!$result){
      $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));

       alert($error_fetch);
       navigate("products.php");

    }else{
      alert("Product Deleted Sucesfully");
      navigate("products.php");
    }
mysqli_close($db);
?>
