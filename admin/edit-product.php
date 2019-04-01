<?php
include 'session.php';

$p_id = mysqli_real_escape_string($db,$_POST["p_id"]);
$p_name = mysqli_real_escape_string($db,$_POST["p_name"]);
$p_price = mysqli_real_escape_string($db,$_POST["p_price"]);
$p_des = mysqli_real_escape_string($db,$_POST["p_des"]);
$p_cat = mysqli_real_escape_string($db,$_POST["p_cat"]);
$p_sub_cat = mysqli_real_escape_string($db,$_POST["p_sub_cat"]);
$p_target_audiance = mysqli_real_escape_string($db,$_POST["p_target_audiance"]);

$sql = "UPDATE products SET p_name='$p_name',p_des='$p_des',p_price='$p_price',p_cat='$p_cat',p_sub_cat='$p_sub_cat',p_tar_aud='$p_target_audiance' WHERE p_id='$p_id'";

$result=mysqli_query($db,$sql);
if(!$result){
      $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
      if($error_fetch=="Duplicate entry \'".$category."\' for key \'c_name\'"){
       alert("Product Alredy Exists");
       navigate("products.php");
      }
    }else{
      alert("Product Added Sucessfully");
      navigate("products.php");
    }
mysqli_close($db);
?>
