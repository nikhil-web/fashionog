<?php
        include 'session.php';
        $output = '';
        $user_id = mysqli_real_escape_string($db,$_POST["user_id"]);
        $sql = 'SELECT *  FROM '.$_SESSION["cart_id"].' INNER JOIN products ON '.$_SESSION["cart_id"].'.p_id = products.p_id INNER JOIN products_img ON '.$_SESSION["cart_id"].'.p_id = products_img.p_id WHERE products_img.p_image_type = 1 AND '.$_SESSION["cart_id"].'.purchased=0 AND '.$_SESSION["cart_id"].'.user_id='.$user_id.' ' ;
        $result = mysqli_query($db, $sql);
              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row= mysqli_fetch_assoc($result)) {
                  $output .= '<li class="header-cart-item flex-w flex-t m-b-12">
                     <div class="header-cart-item-img">
                       <img src="'.substr($row["p_image"], 3).'" alt="IMG">
                     </div>

                     <div class="header-cart-item-txt p-t-8">
                       <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                      '.$row["p_name"].'
                       </a>

                       <span class="header-cart-item-info">
                         '.$row["qnty"].' x $'.$row["p_price"].'
                       </span>
                     </div>
                   </li>';
                    }
                  }
	      echo json_encode($output);
        mysqli_close($db);
