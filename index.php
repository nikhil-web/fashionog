<?php
	include 'session.php';
	if($_SESSION['auth'] == true){
		if (isset($_GET["firsttime"])) {
			include 'includes/check-login.php';
			include 'welcome_mail.php';
		}
	}
 ?><!DOCTYPE html>
<html lang="en">
<head>
    <link rel="apple-touch-icon" sizes="57x57" href="/favicon.ico">
        <link rel="apple-touch-icon" sizes="60x60" href="/favicon.ico">
        <link rel="apple-touch-icon" sizes="72x72" href="/favicon.ico">
        <link rel="apple-touch-icon" sizes="76x76" href="/favicon.ico">
        <link rel="apple-touch-icon" sizes="114x114" href="/favicon.ico">
        <link rel="apple-touch-icon" sizes="120x120" href="/favicon.ico">
        <link rel="apple-touch-icon" sizes="144x144" href="/favicon.ico">
        <link rel="apple-touch-icon" sizes="152x152" href="/favicon.ico">
        <link rel="apple-touch-icon" sizes="180x180" href="/favicon.ico">
        <link rel="icon" type="image/ico" sizes="192x192" href="/favicon.ico">
        <link rel="icon" type="image/ico" sizes="32x32" href="/favicon.ico">
        <link rel="icon" type="image/ico" sizes="96x96" href="/favicon.ico">
        <link rel="icon" type="image/ico" sizes="16x16" href="/favicon.ico">
        <link rel="manifest" href="manifest.json">
        <meta name="msapplication-TileColor" content="#fff">
        <meta name="msapplication-TileImage" content="ms-icon-144x144.png">
        <meta name="theme-color" content="#fff">
        <meta charset="UTF-8">
        <title>FashionOG | Online Shopping for Women, Men, Kids Fashion & Lifestyle</title>
        <meta name="description" content="Online Shopping Site for Fashion & Lifestyle based in Louisiana. Buy Shoes, Clothing, Accessories and lifestyle products for women & men. Best Online Fashion" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include 'includes/head.php'; ?>
</head>




<body class="animsition">

<?php  include "includes/header.php" ?>

	<!-- Cart -->
	<?php
  if($_SESSION['auth'] == true){
	include 'includes/cart-sidebar.php';
	}

	 ?>




	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(images/slide-01.jpg);">

				</div>

				<div class="item-slick1" style="background-image: url(images/slide-02.jpg);">

				</div>

				<div class="item-slick1" style="background-image: url(images/slide-03.jpg);">

				</div>
			</div>
		</div>
	</section>


	<!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-20">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="images/banner-01.jpeg" alt="IMG-BANNER">

						<a href="shop.php?target=1" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
								Women
								</span>

								<span class="block1-info stext-102 trans-04">
							  Winter 2019
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-20 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="images/banner-02.jpeg" alt="IMG-BANNER">

						<a href="shop.php?target=2" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
								 Men
								</span>

								<span class="block1-info stext-102 trans-04">
									Best Collection Fpr Men
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
								Coming Soon
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="images/banner-03.jpeg" alt="IMG-BANNER">

						<a href="shop.php?target=3" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
								accessories
								</span>

								<span class="block1-info stext-102 trans-04">
								Collection Of Amazing accessories.
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Coming Soon
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!--Latest Arival -->
	<section class="bg0 p-t-23 p-b-20">
			<div class="container">
				<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Latest Arival
				</h3>
			</div>
				<div class="flex-w flex-sb-m p-b-52">
					<div class="flex-w flex-l-m filter-tope-group m-tb-10">
						<button onclick="reset_all_filter()" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
							All Products
						</button>
						<?php

														$sql = "SELECT * FROM category ";
														$result = mysqli_query($db, $sql);

																if (mysqli_num_rows($result) > 0) {
																		// output data of each row
																		while($row = mysqli_fetch_assoc($result)) {
																				echo    '


																									<button onclick="shop_filter_category('.$row["c_id"].')" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".'.$row["c_id"].'">
																										'.$row["c_name"].'
																									</button>

																				';
																			}
																		}

							?>
					</div>

					<div class="flex-w flex-c-m m-tb-10">

						<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
							<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
							<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
							 Filter
						</div>
						<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
							<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
							<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
							Search
						</div>
					</div>

					<!-- Search product -->
					<div class="dis-none panel-search w-full p-t-10 p-b-15">
						<div class="bor8 dis-flex p-l-15">
							<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
								<i class="zmdi zmdi-search"></i>
							</button>

							<input id="custom_search_box" onkeyup="shop_filter_search()" class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
						</div>
					</div>

					<!-- Filter -->
					<div class="dis-none panel-filter w-full p-t-10">
						<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">

							<div class="filter-col2 p-r-15 p-b-27">
								<div class="mtext-102 cl2 p-b-15">
									Price
								</div>

								<ul>
									<li class="p-b-6">
										<a onclick="shop_filter_price(0,99999999)" class="filter-link stext-106 trans-04 filter-link-active">
											All
										</a>
									</li>

									<li class="p-b-6">
										<a onclick="shop_filter_price(0,50)" class="filter-link stext-106 trans-04">
											$0.00 - $50.00
										</a>
									</li>

									<li class="p-b-6">
										<a onclick="shop_filter_price(50,100)" class="filter-link stext-106 trans-04">
											$50.00 - $100.00
										</a>
									</li>

									<li class="p-b-6">
										<a onclick="shop_filter_price(100,150)" class="filter-link stext-106 trans-04">
											$100.00 - $150.00
										</a>
									</li>

									<li class="p-b-6">
										<a onclick="shop_filter_price(150,200)" class="filter-link stext-106 trans-04">
											$150.00 - $200.00
										</a>
									</li>

									<li class="p-b-6">
										<a onclick="shop_filter_price(200,9999999)" class="filter-link stext-106 trans-04">
											$200.00+
										</a>
									</li>
								</ul>
							</div>

							<div class="filter-col3 p-r-15 p-b-27">
								<div class="mtext-102 cl2 p-b-15">
									Color
								</div>

								<ul>

	                <?php
	                $sql_inner = 'SELECT DISTINCT color_name,p_color FROM products_color';
	                $result_inner = mysqli_query($db, $sql_inner);

	                    if (mysqli_num_rows($result_inner) > 0) {
	                        // output data of each row
	                        while($row_inner_color = mysqli_fetch_assoc($result_inner)) {
	                          echo '
	                          <li class="p-b-6">
	          									<span class="fs-15 lh-12 m-r-6" style="color: '.$row_inner_color["p_color"].';">
	          										<i class="zmdi zmdi-circle"></i>
	          									</span>

	          									<a onclick="shop_filter_color(\''.$row_inner_color["color_name"].'\')" class="filter-link stext-106 trans-04">
	          										'.$row_inner_color["color_name"].'
	          									</a>
	          								</li>
	                          ' ;
	                      }
	                  }

	                 ?>
								</ul>
							</div>

							<div class="filter-col4 p-b-27">
								<div class="mtext-102 cl2 p-b-15">
									Tags
								</div>

								<div class="flex-w p-t-4 m-r--5">
									<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
										Fashion
									</a>

									<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
										Lifestyle
									</a>

									<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
										Denim
									</a>

									<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
										Streetstyle
									</a>

									<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
										Crafts
									</a>
								</div>
							</div>
						</div>
					</div>

				</div>



				<div id="product_output"  class="row">

					<?php

													$sql = "SELECT * FROM products INNER JOIN products_img on products.p_id = products_img.p_id WHERE products_img.p_image_type = 1";
													$result = mysqli_query($db, $sql);

															if (mysqli_num_rows($result) > 0) {
																	// output data of each row
																	while($row= mysqli_fetch_assoc($result)) {



																			echo    '

	<a href="product-details.php?product='.$row["p_id"].'">
																			<div  class="col-sm-6 col-md-4 col-lg-2 p-b-35 isotope-item '.$row["p_cat"].'">
																				<!-- Block2 -->
																				<div class="block2">
																					<div class="block2-pic hov-img0">
												<img class="lazy_img" data-src="'.substr($row["p_image"], 3).'" alt="IMG-PRODUCT">
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
</a>

																			';
																		}
																	}

								?>


				</div>

				<!-- Load more -->
				<div class="flex-c-m flex-w w-full p-t-45">
					<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
						Load More
					</a>
				</div>
			</div>
	</section>

	<!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="images/banner-01.jpg" alt="IMG-BANNER">

						<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Deals Of The Day
								</span>

								<span class="block1-info stext-102 trans-04">
								Finest hand picked deals
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="images/banner-02.jpg" alt="IMG-BANNER">

						<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Lookbook
								</span>

								<span class="block1-info stext-102 trans-04">
									Spring 2018
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="images/banner-03.jpg" alt="IMG-BANNER">

						<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Hot Deals
								</span>

								<span class="block1-info stext-102 trans-04">
									New Trend
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Most Popular -->
	<section class="bg0 p-t-23 p-b-20">
			<div class="container">
				<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Most Popular
				</h3>
			</div>
				<div class="flex-w flex-sb-m p-b-52">
					<div class="flex-w flex-l-m filter-tope-group m-tb-10">
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
							All Products
						</button>
						<?php

														$sql = "SELECT * FROM category ";
														$result = mysqli_query($db, $sql);

																if (mysqli_num_rows($result) > 0) {
																		// output data of each row
																		while($row = mysqli_fetch_assoc($result)) {
																				echo    '


																									<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".'.$row["c_id"].'">
																										'.$row["c_name"].'
																									</button>

																				';
																			}
																		}

							?>
					</div>
				</div>



				<div id="product_output"  class="row isotope-grid">

					<?php

													$sql = "SELECT * FROM products INNER JOIN products_img on products.p_id = products_img.p_id WHERE products_img.p_image_type = 1 limit 8";
													$result = mysqli_query($db, $sql);

															if (mysqli_num_rows($result) > 0) {
																	// output data of each row
																	while($row= mysqli_fetch_assoc($result)) {



																			echo    '


																			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '.$row["p_cat"].'">
																				<!-- Block2 -->
																				<div class="block2">
																					<div class="block2-pic hov-img0">
	<img  src="'.substr($row["p_image"], 3).'" alt="IMG-PRODUCT">
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

																			';
																		}
																	}

								?>


				</div>

				<!-- Load more -->
				<div class="flex-c-m flex-w w-full p-t-45">
					<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
						Load More
					</a>
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

	<?php include 'includes/custom_script.php'; ?>
<script>
        var images = document.querySelectorAll(".lazy_img"),
            isVisible = function(e) {
                var i = e.getBoundingClientRect(),
                    t = document.documentElement;
                return i.top >= 0 && i.left >= 0 && i.bottom <= (window.innerHeight || t.clientHeight) && i.right <= (window.innerWidth || t.clientWidth)
            },
            handleScroll = function(e) {
                images.forEach(function(e) {
                    if (isVisible(e)) {
                        var i = e.dataset.src;
                        e.setAttribute("src", i), e.classList.remove("hidden-image"), e.classList.add("visible-image")
                    }
                })
            };
        window.addEventListener("scroll", handleScroll);
        window.addEventListener("DOMContentLoaded",handleScroll);
</script>
</body>
</html>
