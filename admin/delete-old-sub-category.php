<?php
include 'session.php';

$to_delete_id =  mysqli_real_escape_string($db,$_GET["id"]);
$sql = "DELETE FROM sub_category WHERE sub_cat_id='$to_delete_id'";
$result=mysqli_query($db,$sql);
navigate("categories.php");
mysqli_close($db);
?>
