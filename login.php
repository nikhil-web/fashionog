<?php
include 'session.php';
  if($_SESSION['auth'] == true){
    navigate("index.php#".$row['user_id']."");
  }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>FashionOG | Shop </title>
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



    <!-- Content page -->
	<section class="bg0 p-t-50 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
        <div class="container">

	         <div class="row">

             <div class="col-md-6 custom_reg_box">
                <form method="POST" id="login_form">
                  <fieldset><legend class="text-center">Login To Continue.</legend>


                    <div class="form-group">
                      <label for="email"><span class="req">* </span> Email Address: </label>
                        <input class="form-control" required type="email" name="user_email" placeholder="Your Email Address" id = "email"  onchange="email_validate(this.value);" />
                            <div class="status" id="status"></div>
                    </div>


                    <div class="form-group">
                      <label for="password"><span class="req">* </span> Password: </label>
                        <input required  type="password" name="user_pass" placeholder="Your Password" class="form-control inputpass" minlength="4" maxlength="16"  id="pass1" /> </p>
                      </div>



                      <div class="how-pos4-parent bor_dash_top_not_red" style="width:95%;">
                      <button class="btn btn-primary"> Login </button>
                        <a href="register.php" class="btn btn-secondary" role="button" aria-pressed="true">Signup</a>
                      </div>


                      <p>Trouble Loging in? <a href="trouble.php"> <span style="color:#c81f1f;">Forgot Password</span></a> </p>
                </fieldset>
              </form><!-- ends login form -->
            </div>



          </div>
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


  <script type="text/javascript">

// validate email
function email_validate(email)
{
var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

  if(regMail.test(email) == false)
  {
  document.getElementById("status").innerHTML    = "<span class='warning'>Email address is not valid yet.</span>";
  }
  else
  {
  document.getElementById("status").innerHTML	= "<span class='valid'>Thanks, you have entered a valid Email address!</span>";
  }
}
  </script>

  <script type="text/javascript">
  $(function () {

    $('#login_form').on('submit', function (e) {
         swal("Logging In");
      e.preventDefault();
      $.ajax({
          type: "POST",
          url: "verify_ajax.php",
          data: $('#login_form').serialize(),
          dataType: 'JSON',
          success: function(response_login_ajax) {
              if (response_login_ajax == 1) {
                window.location.href = 'index.php';
              }else if (response_login_ajax == 0) {
                swal("Username Or Password Incorrect!");
              }
          }
      });
    });
  });
  </script>

  <?php include 'includes/custom_script.php'; ?>

</body>
</html>
