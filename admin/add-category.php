<?php
include 'session.php';

$category =  mysqli_real_escape_string($db,$_POST["c_name"]);
$p_type =  mysqli_real_escape_string($db,$_POST["p_type"]);

$sql = "INSERT INTO category (c_id, c_name,p_type_id) VALUES (NULL, '$category', $p_type)";
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
