<?php
include 'session.php';

$p_name = mysqli_real_escape_string($db,$_POST["p_name"]);
$p_price = mysqli_real_escape_string($db,$_POST["p_price"]);
$p_des = mysqli_real_escape_string($db,$_POST["p_des"]);
$p_type= mysqli_real_escape_string($db,$_POST["p_type"]);
$p_cat = mysqli_real_escape_string($db,$_POST["p_cat"]);
$p_target_audiance= mysqli_real_escape_string($db,$_POST["p_target_audiance"]);

$sql = "INSERT INTO products (p_id, p_name, p_des, p_price, p_type_id, p_cat,p_tar_aud) VALUES (NULL, '$p_name', '$p_des', '$p_price','$p_type', '$p_cat','$p_target_audiance')";
$result=mysqli_query($db,$sql);
if(!$result){
      $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
      if($error_fetch=="Duplicate entry \'".$p_name."\' for key \'p_name\'"){
       alert("Product Alredy Exists");
       navigate("products.php");
      }
    }else{
      alert("Product Added Sucessfully");
      navigate("products.php");
    }
mysqli_close($db);
?>
