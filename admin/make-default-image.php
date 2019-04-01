<?php
include 'conn.php';
$details_id =  mysqli_real_escape_string($db,$_GET["id"]);
$sql = "UPDATE products_img SET p_image_type = 1  WHERE  details_id='$details_id'";
$result=mysqli_query($db,$sql);
if(!$result){
      $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
       alert($error_fetch);
     navigate("products.php");
    }else{
      alert("Default image updated sucessfully");
     navigate("products.php");
    }
mysqli_close($db);
?>
