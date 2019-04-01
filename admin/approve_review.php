<?php
include 'conn.php';

$review_type=  $_GET["review_id"];

$sql = "UPDATE review SET approved = 1  WHERE review_id='$review_type'";
$result=mysqli_query($db,$sql);
if(!$result){
      $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
       alert($error_fetch);
       navigate("reviews.php");
    }else{
      alert("Review Updated");
      navigate("reviews.php");
    }
mysqli_close($db);
?>
