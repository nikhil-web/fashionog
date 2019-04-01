<?php
include 'session.php';

$product_type=  mysqli_real_escape_string($db,$_POST["product_type"]);

$sql = "INSERT INTO product_type (p_type_id, p_type_name) VALUES (NULL, '$product_type')";
$result=mysqli_query($db,$sql);

if(!$result){
      $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
      if($error_fetch=="Duplicate entry \'".$product_type."\' for key \'p_type_name\'"){
       alert("Product Type Alredy Exists");
       navigate("product_type.php");
      }
    }else{
      alert("Category Added Sucessfully");
      navigate("product_type.php");
    }

mysqli_close($db);
?>
