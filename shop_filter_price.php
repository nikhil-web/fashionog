<?php
        include 'conn.php';
        $start_price = mysqli_real_escape_string($db,$_POST["s_p"]);
        $end_price = mysqli_real_escape_string($db,$_POST["e_p"]);
        $output = '';
        $sql = "SELECT * FROM products INNER JOIN products_img on products.p_id = products_img.p_id WHERE products_img.p_image_type = 1 AND products.p_price BETWEEN $start_price AND $end_price";
        $result = mysqli_query($db, $sql);

              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row= mysqli_fetch_assoc($result)) {

                  $output .= '<a href="product-details.php?product='.$row["p_id"].'">
                																			<div  class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '.$row["p_cat"].'">
                																				<!-- Block2 -->
                																				<div class="block2">
                																					<div class="block2-pic hov-img0">
                																								<img src="'.substr($row["p_image"], 3).'" alt="IMG-PRODUCT">
                	                                              <a href="product-details.php?product='.$row["p_id"].'" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                																							 View
                																						</a>
                																					</div>

                																					<div class="block2-txt flex-w flex-t p-t-14">
                																						<div class="block2-txt-child1 flex-col-l ">
                																							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                																							'.$row["p_name"].'
                																							</a>

                																							<span class="stext-105 cl3">
                																								'.$row["p_price"].'
                																							</span>
                																						</div>

                																						<div class="block2-txt-child2 flex-r p-t-3">
                																							<a onclick="add_to_wishlist('.$row["p_id"].')"  class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                																								<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                																								<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                																							</a>
                																						</div>
                																					</div>
                																				</div>
                																			</div>
                </a>';
                    }
                  }
	      echo json_encode($output);
        mysqli_close($db);

?>
