<?php
        include 'session.php';
        $search_id = mysqli_real_escape_string($db,$_POST["wishlist_id"]);
    	  $sql = 'SELECT * FROM '.$search_id.' WHERE wishlist_2.user_id = '.$_SESSION["user_id"].' ';
        $result = mysqli_query($db, $sql);
        $output =mysqli_num_rows($result);
	      echo json_encode($output);
        mysqli_close($db);
?>
