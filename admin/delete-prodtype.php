<?php
include 'conn.php';

$p_type_id =  mysqli_real_escape_string($db,$_POST["p_type_id"]);

$sql = "DELETE FROM product_type WHERE p_type_id='$p_type_id'";
$result=mysqli_query($db,$sql);
if(!$result){
      $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));

       alert($error_fetch);
       navigate("product_type.php");

    }else{
      alert("Product Type Deleted Sucessfully");
     navigate("product_type.php");
    }
mysqli_close($db);
?>
