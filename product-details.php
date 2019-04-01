<?php
include 'session.php';

if (!isset($_GET["product"])) {
	navigate("index.php");
}
else{
	$product_id = $_GET["product"];
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>FashionOG | Product Detail</title>
	 <?php include 'includes/head.php' ?>

</head>
<body class="animsition">

<?php include 'includes/header.php' ?>


<!-- Cart -->
<?php
if($_SESSION['auth'] == true){
include 'includes/cart-sidebar.php';
}

?>

	<!-- breadcrumb -->
	<div class="container">
<h1 id="response"></h1>
	</div>


	<?php
	$image_flag=0;
	$size_flag=0;
	$color_flag=0;
			$sql = "SELECT * FROM products WHERE p_id = $product_id ";
			$result = mysqli_query($db, $sql);
			$row = mysqli_fetch_assoc($result)

?>
<?php
$sql_review_count = 'SELECT COUNT(review_id) as review_no FROM review  WHERE p_id = '.$product_id.'';
$result_sql_review_count = mysqli_query($db, $sql_review_count);
$row_inner_result_sql_review_count = mysqli_fetch_assoc($result_sql_review_count);
$review_count = $row_inner_result_sql_review_count["review_no"];
?>


	<!-- Product Detail -->
	<section class="sec-product-detail bg0 custom_margin_prod p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">


								<?php

								$sql_inner = 'SELECT * FROM products_img WHERE p_id='.$row["p_id"].'';
								$result_inner = mysqli_query($db, $sql_inner);

										if (mysqli_num_rows($result_inner) > 0) {
												// output data of each row
												while($row_inner = mysqli_fetch_assoc($result_inner)) {
													echo '
													<div id="" class="item-slick3" data-thumb="'.substr($row_inner["p_image"], 3).'">
														<div class="wrap-pic-w pos-relative">
															<img src="'.substr($row_inner["p_image"], 3).'" alt="IMG-PRODUCT">

															<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="'.substr($row_inner["p_image"], 3).'">
																<i class="fa fa-expand"></i>
															</a>
														</div>
													</div>
								';
							}
							}

								 ?>


							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php
								echo $row["p_name"];
							 ?>
						</h4>

						<span class="mtext-106 cl2">
							<?php
							echo '$'.$row["p_price"];
							 ?>
						</span>

						<p class="stext-102 cl3 p-t-23">
							<?php

							echo $row["p_des"];

							 ?>
						</p>

						<!--  -->

							<div class="p-t-33">
								<form id="mainform" method="post">

								<div class="flex-w flex-r-m p-b-25">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="p_size">
												<?php

												$sql_inner = 'SELECT * FROM products_size WHERE p_id='.$row["p_id"].'';
												$result_inner = mysqli_query($db, $sql_inner);

														if (mysqli_num_rows($result_inner) > 0) {
																// output data of each row
																while($row_inner = mysqli_fetch_assoc($result_inner)) {
																	echo '<option>'.$row_inner["p_size"].'</option>';
											  }
											}

												 ?>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-25">
									<div class="size-203 flex-c-m respon6">
										Color
									</div>

									<div class="size-204 respon6-next">
										<div class="bg0">
											<div>
									         <input type="hidden" id="color_input" name="p_color" value="default">

									         <div>
														 <?php
														 $sql_inner = 'SELECT * FROM products_color WHERE p_id='.$row["p_id"].'';
														 $result_inner = mysqli_query($db, $sql_inner);

																 if (mysqli_num_rows($result_inner) > 0) {
																		 // output data of each row
																		 while($row_inner = mysqli_fetch_assoc($result_inner)) {
																			 echo '
																			 <div data-toggle="tooltip" data-placement="top" title="'.$row_inner["color_name"].'" onclick="set_color(\''.$row_inner["color_name"].'\',\'box_'.$row_inner["details_id"].'\')" id="box_'.$row_inner["details_id"].'" class="box" style="background:'.$row_inner["p_color"].'"></div>
																			 ' ;
														 			 }
													 		 }

															?>
									         </div>
									         <script>
									             function set_color(color,box_id) {
									                 document.getElementById("color_input").value = color;

																	 var x=document.getElementsByClassName('box');
																	 for (var i = 0; i < x.length; i++) {
																	 	x[i].style.border="3px solid #ffffff";
																	 }
																	 document.getElementById(box_id).style.border="3px solid #c81f1f";
									             }
									         </script>
													 <script>
													 $(document).ready(function(){
  												 $('[data-toggle="tooltip"]').tooltip();
												 });
											 </script>
									         </div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Quantity
									</div>

									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="p_qnty" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
										<input type="hidden" name="p_id" value="<?php echo $product_id; ?>">
										<?php
										if($_SESSION['auth'] == true){
											echo '<button onclick="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
													Add to cart
												</button>';
										}else {
											echo '
												<a href="login.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
												<p style="color:#fff;" >Login</p>
												</a>';
										}

										 ?>


									</div>
								</div>

							</form>
							</div>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">



						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
						</li>

						<li class="nav-item p-b-10">

	<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (<?php echo $review_count; ?>)</a>

						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									<?php echo  $row["p_des"];?>
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Heel Height
											</span>

											<span class="stext-102 cl6 size-206">
												0.75cm
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Shaft Length
											</span>

											<span class="stext-102 cl6 size-206">
												10 cm
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Color
											</span>

											<span class="stext-102 cl6 size-206">
												<?php
												$sql_inner = 'SELECT * FROM products_color WHERE p_id='.$row["p_id"].'';
												$result_inner = mysqli_query($db, $sql_inner);

														if (mysqli_num_rows($result_inner) > 0) {
																// output data of each row
																while($row_inner = mysqli_fetch_assoc($result_inner)) {
																	echo $row_inner["color_name"].' ';
															}
													}

												 ?>
											</span>
										</li>

									</ul>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">

										<?php

										$sql_inner = 'SELECT * FROM review INNER JOIN users ON review.user_id = users.user_id WHERE review.approved =1 AND review.p_id = '.$product_id.'';
										$result_inner = mysqli_query($db, $sql_inner);

												if (mysqli_num_rows($result_inner) > 0) {
														// output data of each row
														while($row_inner = mysqli_fetch_assoc($result_inner)) {
															echo '
															<!-- Review -->
															<div class="flex-w flex-t p-b-68">
																<div class="size-207">
																	<div class="flex-w flex-sb-m p-b-17">
																		<span class="mtext-107 cl2 p-r-20">
																				'.$row_inner["user_name"].'
																		</span>

																		<span class="fs-18 cl11">';
																		for ($i=0; $i < $row_inner["rating"]; $i++) {
																			echo '<i class="zmdi zmdi-star"></i>';
																		}
																	echo '</span>
																	</div>

																	<p class="stext-102 cl6">
																		'.$row_inner["review"].'
																	</p>
																</div>
															</div>';
										}
									}

										 ?>





										<?php
									if($_SESSION['auth'] == true){
											echo '	<form id="review_form_ajax_handled" method="post"  class="w-full">
													<h5 class="mtext-108 cl2 p-b-7">
														Add a review
													</h5>

													<div class="flex-w flex-m p-t-50 p-b-23">
														<span class="stext-102 cl3 m-r-16">
															Your Rating
														</span>

														<span class="wrap-rating fs-18 cl11 pointer">
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
															<i class="item-rating pointer zmdi zmdi-star-outline"></i>
															<input class="dis-none" type="text" name="rating" required>
														</span>
													</div>

													<div class="row p-b-25">
														<div class="col-12 p-b-5">
															<label class="stext-102 cl3" for="review">Your review</label>
															<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review" required></textarea>
														</div>
															<input id="user_id" type="hidden" name="user_id" value="'.$_SESSION["user_id"].'">
															<input id="product_id" type="hidden" name="product_id" value="'.$product_id.'">
													</div>

													<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
														Submit
													</button>
												</form>';
										}else {
											echo '
													<h5 class="mtext-108 cl2 p-b-7">
														Login To Add A Review
													</h5>
														<div class="flex-w flex-m p-t-50 p-b-23">
														<a href="login.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
														<p style="color:#fff;" >Login</p>
														</a>
														</div>
													';
										}
										 ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				<?php echo 'Product Number: '.$product_id.' ' ?>
			</span>

			<span class="stext-107 cl6 p-lr-25">
				Categories: <?php echo $row["p_sub_cat"]; ?>
			</span>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
<?php
					$cart_total=0;
					 $sql = 'SELECT *  FROM products INNER JOIN products_img ON products.p_id = products_img.p_id WHERE products_img.p_image_type = 1 AND products.p_cat = '.$row["p_cat"].' AND products.p_id != '.$row["p_id"].' ';

					 $result = mysqli_query($db, $sql);

							 if (mysqli_num_rows($result) > 0) {
									 // output data of each row
									 while($row_inner = mysqli_fetch_assoc($result)) {

										 echo '

					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="'.substr($row_inner["p_image"], 3).'" alt="IMG-PRODUCT">

								<a href="product-details.php?product='.$row_inner["p_id"].'" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
									View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-details.php?product='.$row_inner["p_id"].'" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										'.$row_inner["p_name"].'
									</a>

									<span class="stext-105 cl3">
										$'.$row_inner["p_price"].'
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>
					';
				}
			}
?>




				</div>
			</div>
		</div>
	</section>


<?php

include 'includes/footer.php';

 ?>

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
	<script src="vendors/daterangepicker/moment.min.js"></script>
	<script src="vendors/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendors/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendors/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendors/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendors/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendors/sweetalert/sweetalert.min.js"></script>


<?php include 'includes/custom_script.php'; ?>



<!--============================================================================================-->
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
	<script type="text/javascript">

	$(function () {
		$('#review_form_ajax_handled').on('submit', function (e) {
			e.preventDefault();
			console.log($('#review_form_ajax_handled').serialize());
			$.ajax({
				type: 'post',
				url: 'new_review_handler.php',
				data: $('#review_form_ajax_handled').serialize(),
				success: function (response) {
					if (response == 0) {
							swal("Review Not Submitted");
					}else {
							swal("Review Submitted Sucessfully");
					}

				}
			});
		});
	});
	</script>

</body>
</html>
