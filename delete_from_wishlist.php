<?php
  include 'session.php';
  $wishlist_id = $_GET["wishlistid"];
  $sql = ' DELETE FROM '.$_SESSION["wishlist_id"].' WHERE cart_item_id='.$wishlist_id.' ';
  $result=mysqli_query($db,$sql);
  if(!$result){
        $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
        echo $error_fetch;
      }else {
      navigate("user.php");
      }
  mysqli_close($db);
 ?>
