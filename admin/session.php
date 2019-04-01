<?php
   include('conn.php');
   session_start();
   if(isset($_SESSION['user_id'])){
        $_SESSION['auth'] = true;
         $user_id=$_SESSION['user_id'];
         $fetch_details = mysqli_query($db,"SELECT * FROM users WHERE user_id = '$user_id' ");
         $row = mysqli_fetch_array($fetch_details,MYSQLI_ASSOC);

       $_SESSION['auth'] = true;
       $_SESSION['user_id']= $row['user_id'];
       $_SESSION['user_name'] =$row['user_name'];
       $_SESSION['user_email'] = $row['user_email'];
       $_SESSION['user_type'] = $row['user_type'];
       $_SESSION['cart_id'] = 'cart_'.$_SESSION['user_id'];

   }
    else{
      $_SESSION['auth'] = false;
      $_SESSION['cart_id'] = "guest";
    }
