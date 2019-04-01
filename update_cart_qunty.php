<?php
include 'session.php';
$send_p_id =  mysqli_real_escape_string($db,$_POST["send_p_id"]);
$send_p_new_qnty =  mysqli_real_escape_string($db,$_POST["send_p_new_qnty"]);
$cart_id = $_SESSION["cart_id"];
$user_id = $_SESSION["user_id"];
$sql = 'UPDATE '.$cart_id.' SET qnty = '.$send_p_new_qnty.' WHERE p_id = '.$send_p_id.' AND user_id = '.$user_id.'';
mysqli_query($db,$sql);
$result = $send_p_id;
echo json_encode($result);
mysqli_close($db);
?>
