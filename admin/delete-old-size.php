<?php
include 'session.php';
$to_delete_id =  mysqli_real_escape_string($db,$_GET["id"]);
$sql = "DELETE FROM products_size WHERE details_id='$to_delete_id'";
$result=mysqli_query($db,$sql);
navigate("products.php");
mysqli_close($db);
?>
