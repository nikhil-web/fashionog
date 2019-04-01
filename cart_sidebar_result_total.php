<?php
        include 'session.php';
        $user_id = $_SESSION["user_id"];
        $output = '';
        $cart_total = 0;
        $sql = 'SELECT * FROM '.$_SESSION["cart_id"].' INNER JOIN products ON '.$_SESSION["cart_id"].'.p_id = products.p_id WHERE '.$_SESSION["cart_id"].'.purchased = 0 AND '.$_SESSION["cart_id"].'.user_id= '.$user_id.' ';
        $result = mysqli_query($db, $sql);
              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row= mysqli_fetch_assoc($result)) {
                    $cart_total = (($row["qnty"]*$row["p_price"]) + $cart_total);
                    }
                  }
        $output = $cart_total;
        $output_round = round($output, 2);
	      echo json_encode($output_round);
        mysqli_close($db);
