<?php
include 'conn.php';

$category_name =  mysqli_real_escape_string($db,$_POST["c_name"]);
$category_id   =  mysqli_real_escape_string($db,$_POST["c_id"]);

$sql = "UPDATE category SET c_name ='$category_name'  WHERE  c_id='$category_id'";
$result=mysqli_query($db,$sql);
if(!$result){
      $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
       alert($error_fetch);
       navigate("categories.php");
    }else{
      alert("Category Updated Sucessfully");
      navigate("categories.php");
    }
mysqli_close($db);
?>
