<?php
include 'session.php';

$p_color =  mysqli_real_escape_string($db,$_POST["p_color"]);
$p_id = mysqli_real_escape_string($db,$_POST["p_id"]);
$color_name =  mysqli_real_escape_string($db,$_POST["color_name"]);

$sql = "INSERT INTO products_color (p_id, color_name, p_color) VALUES ('$p_id', '$color_name', '$p_color')";
$result=mysqli_query($db,$sql);
alert("Color Added Sucessfully");
navigate("products.php");
mysqli_close($db);
?>
