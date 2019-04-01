<?php
        include('session.php');
        $p_id = mysqli_real_escape_string($db,$_POST["p_id"]);
        $p_color = mysqli_real_escape_string($db,$_POST["p_color"]);
        $p_qnty = mysqli_real_escape_string($db,$_POST["p_qnty"]);
        $p_size = mysqli_real_escape_string($db,$_POST["p_size"]);
        $user_id = $_SESSION["user_id"];

      $cart_id = $_SESSION["cart_id"];

      $sql = "INSERT INTO cart_2 (cart_item_id, user_id, p_id, qnty, color, size) VALUES (NULL,'$user_id','$p_id', '$p_qnty', '$p_color', '$p_size')";
      $result=mysqli_query($db,$sql);
      if(!$result){
      $error_fetch = mysqli_real_escape_string($db,mysqli_error($db));
      if($error_fetch=="Duplicate entry \'".$p_id."\' for key \'p_id\'"){
          $output = "Item Alredy In Cart";
      }else {
          $output =$error_fetch;
      }
      }else{
        $output = "Item Added Sucessfully";
    }
mysqli_close($db);
echo json_encode($output);
