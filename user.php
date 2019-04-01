<?php
include 'session.php';
include 'includes/check-login.php';
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>FashionOG | User </title>
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
    $sql_user = 'SELECT * FROM users WHERE user_id = '.$_SESSION["user_id"].'';
    $result_f_user = mysqli_query($db, $sql_user);
    $row_user = mysqli_fetch_assoc($result_f_user)
    ?>

    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">

        </div>
    </div>



    <div class="bg0 custom_margin_shop p-b-140">
        <div class="container">

        <div class="p-b-30">
          <h3 class="ltext-103 cl5">
          Your Account
          </h3>
        </div>

            <div class="row">
                <div class="col-xl-3 col-sm-12 custom_margin_sub">
                    <div class="card border-dark mb-3" style="height:auto;">
                        <div class="card-header">Account Information</div>
                        <div class="card-body text-dark">
                            <h5 class="card-title" style="margin-top:0px; margin-bottom:5px;">Username</h5>
                            <p class="card-text"><?php echo $_SESSION["user_name"]; ?></p>
                            <h5 class="card-title" style="margin-top:20px; margin-bottom:5px;">Email </h5>
                            <p class="card-text"><?php echo $_SESSION["user_email"]; ?></p>
                            <h5 class="card-title" style="margin-top:20px; margin-bottom:5px;">Phone Number</h5>
                            <p class="card-text"><?php echo $row_user["phonenumber"]; ?></p>

                        </div>
                        <div class="card-header">Shipping Adress</div>
                        <div class="card-body text-dark">
                            <p class="card-text"><?php echo $row_user["address"]; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9">
                    <div class="row">
                        <div class="col-xl-4 col-sm-6 mb-3">
                            <div class="card border-secondary mb-3 o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-shopping-cart"></i>

                                    </div>
                                    <h3>Your Orders</h3>
                                    <div class="mr-5">Manage Your Orders</div>
                                </div>
                                <a class="card-footer clearfix small z-1" href="orders.php">
                                    <span class="float-left">Manage</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>

                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 mb-3">
                            <div class="card border-secondary mb-3 o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-list"></i>
                                    </div>
                                    <h3>Login and Security</h3>
                                    <div class="mr-5">Manage Login and Security</div>
                                </div>
                                <a class="card-footer clearfix small z-1" data-toggle="modal" data-target="#myModal">
                                    <span class="float-left">Manage</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 mb-3">
                            <div class="card border-secondary mb-3 o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-life-ring"></i>
                                    </div>
                                    <h3>Your Account</h3>
                                    <div class="mr-5">Manage Your Account details and Addresses</div>
                                </div>
                                  <a class="card-footer clearfix small z-1" data-toggle="modal" data-target="#myModal">
                                    <span class="float-left">Manage</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                      <!--	Your Wishlist -->
                    	<section class="bg0 p-t-23 p-b-20" style="width:100%;">
                    			<div class="container">
                    				<div class="p-b-30">
                    				<h3 class="ltext-103 cl5">
                    				Your Wishlist
                    				</h3>
                    			</div>

                    				<div class="row isotope-grid">

                    					<?php

                    													$sql = 'SELECT * from '.$_SESSION["wishlist_id"].' INNER JOIN products ON '.$_SESSION["wishlist_id"].'.p_id=products.p_id INNER JOIN products_img on products.p_id = products_img.p_id WHERE products_img.p_image_type = 1 AND '.$_SESSION["wishlist_id"].'.user_id='.$_SESSION["user_id"].'';
                    													$result = mysqli_query($db, $sql);

                    															if (mysqli_num_rows($result) > 0) {
                    																	// output data of each row
                    																	while($row= mysqli_fetch_assoc($result)) {



                    																			echo    '

                    	                               <a href="product-details.php?product='.$row["p_id"].'">
                    																			<div  class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '.$row["p_cat"].'">
                    																				<!-- Block2 -->
                    																				<div class="block2">
                    																					<div class="block2-pic hov-img0">
                    																								<img src="'.substr($row["p_image"], 3).'" alt="IMG-PRODUCT">
                    	                                              <a href="delete_from_wishlist.php?wishlistid='.$row["cart_item_id"].'" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                    																							 remove
                    																						</a>
                    																					</div>

                    																					<div class="block2-txt flex-w flex-t p-t-14">
                    																						<div class="block2-txt-child1 flex-col-l ">
                    																							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    																							'.$row["p_name"].'
                    																							</a>

                    																							<span class="stext-105 cl3">
                    																								$'.$row["p_price"].'
                    																							</span>
                    																						</div>


                    																					</div>
                    																				</div>
                    																			</div>
                                                          </a>

                    																			';
                    																		}
                    																	}else {
                                                        echo '

                                                        ';
                                                      }

                    								?>
                    				</div>
                    			</div>
                    	</section>

                    </div>


                </div>
            </div>


        </div>
    </div>

    <!-- Top Cards-->



    <!-- Footer -->

  	<?php
  	include 'includes/footer.php';
  	 ?>



       <!-- Modal -->
       <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg modal-dialog-centered">
           <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="row">

          <div class="col-xl-12 col-sm-12 mb-3">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <!--   <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Update Email</a>
              </li>
            -->
              <li class="nav-item">
                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Update Password</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Update Address</a>
              </li>
            </ul>

            <div class="tab-content" id="myTabContent">
              <!-- Form for Email Update
              <div class="tab-pane fade show active m-3" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter New Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Please Enter Your Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            -->

              <div class="tab-pane fade show active m-3" id="profile" role="tabpanel" aria-labelledby="home-tab">
                <form  method="post" id="update_password">
                  <div class="form-group">
                    <label for="InputPassword_1">Please Enter New Password</label>
                    <input style="width:100%;" type="password" class="form-control" id="InputPassword_1" name="InputPassword_1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="InputPassword_2">Please Repeat Your New Password</label>
                    <input style="width:100%;" type="password" class="form-control" id="InputPassword_2" name="InputPassword_2" placeholder="Password">
                  </div>

                  <div class="form-group m-t-20 bor_dash_top_not_red">
                    <label for="current_password">Please Enter Your old Password</label>
                    <input style="width:100%;" type="password" class="form-control" id="current_password" name="current_password" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>

              <div class="tab-pane fade m-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="card">
                  <div class="card-body" style="background: #eaeaea;color: #000;">
                  <?php echo $row_user["address"]; ?>
                  </div>
                </div>

                <form method="post" id="update_address" class="bor_dash_top_not_red m-t-15">
                  <div class="form-group">
                    <label for="current_password">Enter Your New Address</label>
                    <textarea class="form-control" id="current_password" style="width:100%;" rows="3" name="new_address">  <?php echo $row_user["address"]; ?></textarea>
                    <small id="passwordHelpBlock" class="form-text text-muted">
Enter The New Address in the standard format, And then eneter your password and press submit to update your address.
</small>
                  </div>
                  <div class="form-group">
                    <label for="current_password">Please Enter Your Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password"  style="width:100%;" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>

            </div>

          <!--   <form>
              -->
          </div>

        </div>


      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
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
        $(".js-select2").each(function() {
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
                    enabled: true
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
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });

    </script>
    <script type="text/javascript">
    $(function () {
      $('#update_password').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
          type: 'post',
          url: 'update_password.php',
          data: $('#update_password').serialize(),
          success: function (response) {
            if (response == 0) {
              swal("Plese Try Again");
            }else if (response == 1) {
              swal("Password Changed Sucessuflly");
            }else {
              swal("Password mismatch");
            }
          }
        });
      });
    });
    </script>
    <script type="text/javascript">
    $(function () {
      $('#update_address').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
          type: 'post',
          url: 'update_address.php',
          data: $('#update_address').serialize(),
          success: function (response_2) {
            if (response_2 == 1) {
              swal("Address Changed Sucessuflly");
            }else {
              swal("Password Incorrect");
            }
          }
        });
      });
    });
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>


    <?php include 'includes/custom_script.php'; ?>

</body>

</html>
