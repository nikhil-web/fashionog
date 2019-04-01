<?php
        include 'session.php';
        $user_id = mysqli_real_escape_string($db,$_POST["user_id"]);
    	  $sql = 'SELECT * FROM '.$_SESSION["cart_id"].' WHERE purchased=0 AND user_id = '.$user_id.'';
        $result = mysqli_query($db, $sql);
        $output =mysqli_num_rows($result);
	      echo json_encode($output);
        mysqli_close($db);
