<?php
include 'conn.php';

$p_type_name =  mysqli_real_escape_string($db,$_POST["p_type_name"]);
$p_type_id  =  mysqli_real_escape_string($db,$_POST["p_type_id"]);

$sql = "UPDATE product_type SET p_type_name ='$p_type_name'  WHERE  p_type_id='$p_type_id'";
$result=mysqli_query($db,$sql);
if(!$result){
      $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
       alert($error_fetch);
       navigate("product_type.php");
    }else{
      alert("Prodtuct Type Updated Sucessfully");
      navigate("product_type.php");
    }
mysqli_close($db);
?>
