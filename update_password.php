<?php
include 'session.php';
include 'includes/check-login.php';
$new_password=  mysqli_real_escape_string($db,$_POST["InputPassword_1"]);


  $current_password =  mysqli_real_escape_string($db,$_POST["current_password"]);
  $current_user_email = $_SESSION["user_email"];
  $current_user_id = $_SESSION["user_id"];





  $sql = "UPDATE users SET user_pass = '$new_password' WHERE users.user_id = '$current_user_id' AND user_pass = '$current_password' AND user_email = '$current_user_email'" ;
  $result = mysqli_query($db,$sql);

  if (!$result) {
    $result_out = 0;
  }else {
    $result_out = 1;
  }
  echo json_encode($result_out);
  mysqli_close($db);
?>
