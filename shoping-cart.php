<?php
include 'session.php';
if ($_SESSION["auth"] != true) {
   navigate("index.php");
}else{
  $c_id = $_SESSION["cart_id"];
  $user_id = $_SESSION["user_id"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>FashionOG | Shoping Cart</title>
  <?php include 'includes/head.php' ?>
</head>


<body class="animsition">

	<!-- Header -->
	<?php  include "includes/header.php" ?>

		<!-- Cart -->
		<?php
	  if($_SESSION['auth'] == true){
		include 'includes/cart-sidebar.php';
		}
		?>


	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">

		</div>
	</div>


	<!-- Shoping Cart -->
	<form action="checkout.php" method="POST" class="bg0 custom_margin_cart p-b-85">
    <input id="count_cart_output_checkout_items" type="hidden" name="total_cart_items" value="">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-8 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table id="populate_cart"  class="table-shopping-cart">
								<tr class="table_head">
									<th colspan="2" class="column-1">Product</th>

									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
                  <th class="column-4">Color</th>
                  <th class="column-4">Size</th>
									<th class="column-5">Total</th>
								</tr>

<?php
$count=0;
$query = 'SELECT * from '.$c_id.' INNER JOIN products ON '.$c_id.'.p_id=products.p_id INNER JOIN products_img on products.p_id = products_img.p_id WHERE products_img.p_image_type = 1 AND '.$c_id.'.purchased=0 AND '.$c_id.'.user_id='.$user_id.'';
$result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        $flag = 1;
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          echo '


            <tr id="'.$row["cart_item_id"].'" class="table_row">
              <td class="column-1">
                <div onclick="delete_itm_frm_cart('.$row["cart_item_id"].')" class="how-itemcart1">
                  <img src="'.substr($row["p_image"], 3).'" alt="IMG">
                </div>
              </td>
              <td class="column-2">'.$row["p_name"].'</td>
              <td class="column-3">$ '.$row["p_price"].'</td>
              <td class="column-4">

                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                  <div onmouseout="update_cart('.$row["p_id"].',\'num_product_'.$row["p_id"].'\')" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                    <i class="fs-16 zmdi zmdi-minus"></i>
                  </div>


                  <input id="num_product_'.$row["p_id"].'"  class="mtext-104 cl3 txt-center num-product" type="number" name="product_'.$count.'_qnty" value="'.$row["qnty"].'">

                  <div onmouseout="update_cart('.$row["p_id"].',\'num_product_'.$row["p_id"].'\')" class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                    <i class="fs-16 zmdi zmdi-plus"></i>
                  </div>
                </div>

              </td>
              <td class="column-4" >'.$row['color'].'</td>
              <td class="column-4" >'.$row['size'].'</td>
              <td id="item_subtotal_'.$row["p_id"].'" class="column-5">$ '.$row["p_price"] * $row["qnty"] .'</td>
            </tr>
            <input type="hidden" name="product_'.$count.'_id" value="'.$row["p_id"].'">';


      $count++;
        }

}
?>
<td></td>




							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon

								</div>
							</div>

							<div onclick="update_cart()" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div>
						</div>
            <?php
            if ($count > 0) {
              echo '<p style="color:#c81f1f;" >* Hover on the product image to delete item</p>';
            }else {
              echo '<p style="color:#c81f1f;" >* Your Cart is empty, Add Items to continue shopping</p>';
            }


             ?>

					</div>

				</div>

				<div class="col-sm-10 col-lg-7 col-xl-4 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Total:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									$ <span id="count_cart_output_checkout_total"></span>
                  <input id="count_cart_output_checkout_total_form" type="hidden" name="total_cart_value" value="">
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Address:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p>
							</div>
						</div>

<div class="bor_dash_top_not_red">
  <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer ">
    Proceed to Checkout
  </button>
</div>

					</div>
				</div>
			</div>
		</div>
	</form>




	<!-- Footer -->

	<?php
	include 'includes/footer.php';
	 ?>


   <!-- The Modal -->
   <div id="myModal" class="modal">

     <!-- Modal content -->
     <div class="modal-content">
       <span class="close">&times;</span>
       <p>Some text in the Modal..</p>
     </div>

   </div>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->
	<script src="vendors/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendors/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendors/bootstrap/js/popper.js"></script>
	<script src="vendors/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendors/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendors/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>




	<!--========================================THIS IS CUSTOM SCRIPT=========================================-->

<?php include 'includes/custom_script.php'; ?>

</body>
</html>
