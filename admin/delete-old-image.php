<?php
include 'session.php';
$to_delete_id =  mysqli_real_escape_string($db,$_GET["id"]);
$sql = "DELETE FROM products_img WHERE details_id = '$to_delete_id'";
mysqli_query($db,$sql);
mysqli_close($db);
navigate("products.php");
?>
