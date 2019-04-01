<?php
include 'session.php';

$dummy_id =  mysqli_real_escape_string($db,$_POST["cart_id"]);
$user_id =  mysqli_real_escape_string($db,$_POST["user_id"]);
$total_amt =  mysqli_real_escape_string($db,$_POST["total_amt"]);
$no_of_items =  mysqli_real_escape_string($db,$_POST["no_of_items"]);
$items_purchsed=  mysqli_real_escape_string($db,$_POST["items_purchsed"]);
$purchse_time=  mysqli_real_escape_string($db,$_POST["purchse_time"]);

$cart_id = $_SESSION["cart_id"];
$user_id = $_SESSION["user_id"];

$sql = 'UPDATE '.$cart_id.' SET purchased = 1 WHERE user_id = '.$user_id.'';
mysqli_query($db,$sql);

$sql_sales = "INSERT INTO sales (sales_id, sales_value, sales_time, payment_sale_time, user_id, item_count, p_id) VALUES (NULL, '$total_amt', CURRENT_TIMESTAMP,'$purchse_time', '$user_id', '$no_of_items', '$items_purchsed')";
mysqli_query($db,$sql_sales);

$results = "Purchsed Sucessfully";
echo json_encode($results);
mysqli_close($db);
?>
