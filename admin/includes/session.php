<?php
   include('conn.php');
   session_start();
   if(isset($_SESSION['user_id'])){
        $_SESSION['auth'] = true;
         $user_id=$_SESSION['user_id'];
         $fetch_details = mysqli_query($db,"SELECT * FROM users WHERE userid = '$user_id' ");
         $row = mysqli_fetch_array($fetch_details,MYSQLI_ASSOC);


       $_SESSION['auth'] = true;
       $_SESSION['user_id']= $row['userid'];
       $_SESSION['user_email'] =$row['email'];
       $_SESSION['user_name'] = $row['username'];
       $_SESSION['user_img'] =$row['user_img'];
       $_SESSION['top'] =$row['top_loc'];
       $_SESSION['left'] = $row['left_loc'];
       $_SESSION['zoom_level'] = $row['zoom'];
       $_SESSION["user_desc"] = $row['user_desc'];
       $_SESSION["user_phone"] = $row['userphone'];
       $_SESSION["ver_status"] = $row['ver'];
       $_SESSION["user_sub_image"] = $row['user_sub_img'];
       $_SESSION['transaction_eventid'];
   }
    else
      {
      $_SESSION['auth'] = false;
      }
