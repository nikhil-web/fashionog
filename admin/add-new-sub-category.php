<?php
include 'session.php';

$p_sub_cat =  mysqli_real_escape_string($db,$_POST["p_sub_cat"]);
$p_id =  mysqli_real_escape_string($db,$_POST["p_id"]);

$sql = "UPDATE products SET p_sub_cat = '$p_sub_cat' WHERE products.p_id = '$p_id'";
$result=mysqli_query($db,$sql);
alert("Subcategory Added Sucessfully");
navigate("products.php");
mysqli_close($db);
?>
