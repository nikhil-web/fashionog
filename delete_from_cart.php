<?php
  include 'session.php';
  $item_id = $_POST["parameter"];
  $user_id = $_SESSION["user_id"];


  $sql = ' DELETE FROM '.$_SESSION["cart_id"].' WHERE cart_item_id='.$item_id.' AND purchased = 0 AND user_id = '.$user_id.'';
  $result=mysqli_query($db,$sql);
  if(!$result){
        $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
        $output = $error_fetch;
      }else {
    $output = 'Deleted'.$item_id;
      }

  echo json_encode($output);
  mysqli_close($db);

 ?>
