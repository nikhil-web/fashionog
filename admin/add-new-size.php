<?php
include 'session.php';

$p_size =  mysqli_real_escape_string($db,$_POST["p_size"]);
$p_id =  mysqli_real_escape_string($db,$_POST["p_id"]);

$sql = "INSERT INTO products_size (p_id, p_size) VALUES ('$p_id', '$p_size')";
$result=mysqli_query($db,$sql);
navigate("products.php");
mysqli_close($db);
?>
