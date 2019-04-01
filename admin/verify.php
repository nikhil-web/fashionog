<?php
include "session.php";
$email = mysqli_real_escape_string($db,$_POST['user_email']);
$password = mysqli_real_escape_string($db,$_POST['user_pass']);
$login_Cheker = "SELECT * FROM users WHERE user_email='$email' and user_pass='$password' ";
$result_login = mysqli_query($db,$login_Cheker);
   if (mysqli_num_rows($result_login) > 0) {
    $row = mysqli_fetch_array($result_login,MYSQLI_ASSOC);
    $is_admin = $row["user_type"];
    if($is_admin==1){
      $_SESSION['user_id'] = $row["user_id"];
      mysqli_close($db);
      navigate("admin.php#".$row['user_id']."");
    }else {
      $_SESSION['user_id'] = $row["user_id"];
      mysqli_close($db);
      navigate("index.php#".$row['user_id']."");
    }
       }else{
       alert("Invalid Email Or Password");
      mysqli_close($db);
  navigate("login.php?error=wrongpassword");
   }
?>
