<?php
include 'session.php';

$sub_cat_name =  mysqli_real_escape_string($db,$_POST["sub_cat_name"]);
$c_id =  mysqli_real_escape_string($db,$_POST["c_id"]);

$sql = "INSERT INTO sub_category (sub_cat_id, sub_cat_name,cat_id) VALUES (NULL, '$sub_cat_name', $c_id)";
$result=mysqli_query($db,$sql);

if(!$result){
      $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
      if($error_fetch=="Duplicate entry \'".$category."\' for key \'c_name\'"){
       alert("Category Alredy Exists");
       navigate("categories.php");
      }
    }else{
      alert("Category Added Sucessfully");
      navigate("categories.php");
    }

mysqli_close($db);
?>
