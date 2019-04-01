<?php
include 'conn.php';

$category_id =  mysqli_real_escape_string($db,$_POST["c_id"]);

$sql = "DELETE FROM category WHERE c_id='$category_id'";
$result=mysqli_query($db,$sql);
if(!$result){
      $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));

       alert($error_fetch);
       navigate("categories.php");

    }else{
      alert("Category Deleted Sucessfully");
      navigate("categories.php");
    }
mysqli_close($db);
?>
