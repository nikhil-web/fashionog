<?php
        include 'session.php';
        $output = '';
        $cart_sub_total = 0;
        $recive_p_id =  mysqli_real_escape_string($db,$_POST["send_p_id"]);
        $user_id = $_SESSION["user_id"];
        $sql = 'SELECT products.p_price,'.$_SESSION["cart_id"].'.qnty  FROM '.$_SESSION["cart_id"].' INNER JOIN products ON '.$_SESSION["cart_id"].'.p_id = products.p_id WHERE products.p_id = '.$recive_p_id.' AND '.$_SESSION["cart_id"].'.user_id = '.$user_id.'  ';
        $result = mysqli_query($db, $sql);
        $row= mysqli_fetch_assoc($result);
        $cart_sub_total = ($row["qnty"]*$row["p_price"]);
        $output = '$ '.$cart_sub_total;
	      echo json_encode($output);
        mysqli_close($db);
