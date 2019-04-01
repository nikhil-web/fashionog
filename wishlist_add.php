<?php
        include 'session.php';
        $p_id = mysqli_real_escape_string($db,$_POST["send_p_id"]);
       $sql = 'INSERT INTO wishlist_2 (cart_item_id, user_id, p_id) VALUES (NULL,'.$_SESSION["user_id"].','.$p_id.')';
    $result=mysqli_query($db,$sql);
    if(!$result){
      $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
      if($error_fetch=="Duplicate entry \'".$p_id."\' for key \'p_id\'"){
          $output = "Item Alredy In Wishlist";
      }else {
          $output =$error_fetch;
      }
    }else{
        $output = "Item Added Sucessfully";
    }
mysqli_close($db);
echo json_encode($output);
?>
