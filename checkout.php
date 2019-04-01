<?php
include 'session.php';
foreach($_POST as $query_string_variable => $value) {
   //echo "$query_string_variable  = $value <Br />";
}
$num_of_prod = $_POST["total_cart_items"];
$product_id_string = '';
for ($i=0; $i < $num_of_prod ; $i++) {
  $product_id_string.=''.$_POST['product_'.$i.'_id'].'_';
}
if ($_SESSION["auth"] != true) {
   navigate("index.php");
}else{
  $c_id = $_SESSION["cart_id"];
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
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table id="cart_output_main" class="table-shopping-cart">

								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>


<?php
for ($i=0; $i < $num_of_prod; $i++) {
  $query = 'SELECT * from '.$c_id.' INNER JOIN products ON '.$c_id.'.p_id=products.p_id INNER JOIN products_img on products.p_id = products_img.p_id WHERE products_img.p_image_type = 1 AND products.p_id = '.$_POST['product_'.$i.'_id'].'';
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
echo '


<tr class="table_row">
  <td class="column-1">
    <div class="itemcart1">
      <img src="'.substr($row["p_image"], 3).'" alt="IMG">
    </div>
  </td>
  <td class="column-2">'.$row["p_name"].'</td>
  <td class="column-3">$ '.$row["p_price"].'</td>
  <td class="column-4">'.$_POST['product_'.$i.'_qnty'].'</td>
  <td class="column-5">$ '.$row["p_price"]*$_POST['product_'.$i.'_qnty'].'</td>
</tr>
';
}
?>





							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">

							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Cancel And Go Back
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
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
									$ <?php echo $_POST['total_cart_value']; ?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">

						</div>

					<div id="paypal-button-container">

          </div>
					</div>
				</div>
			</div>
		</div>
	</form>

  <script src="https://www.paypalobjects.com/api/checkout.js"></script>
  <script>
  // Render the PayPal button
  paypal.Button.render({
  // Set your environment
  env: 'sandbox', // sandbox | production

  // Specify the style of the button
  style: {
    layout: 'vertical',  // horizontal | vertical
    size:   'medium',    // medium | large | responsive
    shape:  'rect',      // pill | rect
    color:  'gold'       // gold | blue | silver | white | black
  },

  // Specify allowed and disallowed funding sources
  //
  // Options:
  // - paypal.FUNDING.CARD
  // - paypal.FUNDING.CREDIT
  // - paypal.FUNDING.ELV
  funding: {
    allowed: [
      paypal.FUNDING.CARD,
      paypal.FUNDING.CREDIT
    ],
    disallowed: []
  },

  // Enable Pay Now checkout flow (optional)
  commit: true,

  // PayPal Client IDs - replace with your own
  // Create a PayPal app: https://developer.paypal.com/developer/applications/create
  client: {
    sandbox: 'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
    production: '<insert production client id>'
  },

  // Set up a payment
  payment: function(data, actions) {
   return actions.payment.create({
     transactions: [{
       amount: {
         total: '<?php echo $_POST["total_cart_value"]; ?>',
         currency: 'USD'
       }
     }]
   });
  },

  onAuthorize: function (data, actions) {
    return actions.payment.execute()
      .then(function () {
        $.ajax({
            type: "POST",
            url: "payment_recived_do.php",
            data: {
                cart_id: '<?php echo $_SESSION["cart_id"]; ?>',
                user_id: '<?php echo $_SESSION["user_id"]; ?>',
                total_amt: '<?php echo $_POST["total_cart_value"]?>',
                no_of_items: '<?php echo $num_of_prod; ?>',
                items_purchsed : '<?php echo $product_id_string; ?>',
                purchse_time : '<?php  $date_entered = date('M-d-Y'); echo $date_entered; ?>',

            },
            dataType: 'JSON',
            success: function(response){
                window.alert(response);
                window.location.href = 'orders.php';
            }
        });
      });
  }
  }, '#paypal-button-container');
  </script>



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
