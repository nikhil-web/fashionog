<?php
include 'conn.php';
$rating = mysqli_real_escape_string($db,$_POST['rating']);
$review = mysqli_real_escape_string($db,$_POST['review']);
$user_id = mysqli_real_escape_string($db,$_POST['user_id']);
$product_id= mysqli_real_escape_string($db,$_POST['product_id']);

$sql = "INSERT INTO review (review_id, p_id, user_id, rating ,review) VALUES (NULL, '$product_id', '$user_id', '$rating', '$review')";

$result=mysqli_query($db,$sql);
if(!$result){
    $output = 0;
    echo json_encode($output);
    exit();
   }else{
     $output = 1;
     echo json_encode($output);
   }
?>
