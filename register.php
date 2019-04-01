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
			<div class="flex-w flex-tr bor_dash_top_bottom_not_red">
        <div class="container">

	         <div class="row">

             <div class="col-md-6 custom_reg_box">
                <form id="reg_form_ajax" method="post">
                  <fieldset><legend class="text-center">Fill The Form To Register.</legend>


                      <div class="form-group">
                        <label for="firstname"><span class="req">* </span> First name: </label>
                        <input class="form-control" name="firstname"  required  autocomplete="name" />
                        <div id="errFirst"></div>
                      </div>

                      <div class="form-group">
                        <label for="lastname"><span class="req">* </span> Last name: </label>
                        <input class="form-control" name="lastname"   placeholder="hyphen or single quote OK" required  />
                        <div id="errLast"></div>
                      </div>

                      <div class="form-group">
                        <label for="email"><span class="req">* </span> Email Address: </label>
                        <input class="form-control" required type="email" name="email" id = "email"  autocomplete="email"/>
                        <div class="status" id="status"></div>
                      </div>

                      <div class="form-group">
                          <label for="phonenumber"><span class="req">* </span> Phone Number: </label>
                          <input required type="tel" name="phonenumber" id="phone" class="form-control phone" maxlength="28" onkeyup="validatephone(this);" placeholder="not used for marketing" autocomplete="tel"/>
                      </div>


                      <div class="form-group">
                        <label for="inputAddress"><span class="req">* </span> Address</label>
                        <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" autocomplete="shipping street-address">
                      </div>


                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="inputCity"><span class="req">* </span> City</label>
                          <input type="text" name="city" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputState"><span class="req">* </span> State</label>
                            <select name="stste" id="inputState" class="form-control">
                              <option selected>Choose...</option>
                              <option>Uttar Pradesh</option>
                            </select>
                          </div>
                          <div class="form-group col-md-2">
                            <label for="inputZip"><span class="req">* </span> Zip</label>
                            <input name="zip" class="form-control" id="inputZip">
                          </div>
                        </div>

                      <div class="form-group">
                        <label for="password"><span class="req">* </span> Password: </label>

                         <input type="password" class="form-control" minlength="4" maxlength="16" id="pass1" placeholder="Password" autocomplete="new-password">

                        <label for="password"><span class="req">* </span> Password Confirm: </label>
                        <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Enter again to validate"  id="pass2" onkeyup="checkPass(); return false;" autocomplete="new-password"/>
                        <span id="confirmMessage" class="confirmMessage"></span>
                      </div>

                      <div class="form-group">

                        <?php $date_entered = date('m/d/Y H:i:s'); ?>
                        <input type="hidden" value="<?php echo $date_entered; ?>" name="dateregistered">
                        <input type="hidden" value="0" name="activate" />
                        <hr>

                        <input type="checkbox" required name="terms" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms">   <label for="terms">I agree with the <a href="terms.php" title="You may read our terms and conditions by clicking on this link">terms and conditions</a> for Registration.</label><span class="req">* </span>
                    </div>

                    <div class="form-group">
                      <input type="hidden" value="Register" name="submit_reg" />
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary"> Register </button>
                    </div>


                      <p>You will receive an email to complete the registration and validation process. </p>
                      <p>Be sure to check your spam folders. </p>
                </fieldset>
              </form><!-- ends register form -->
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
  function checkPass()
{
  //Store the password field objects into variables ...
  var pass1 = document.getElementById('pass1');
  var pass2 = document.getElementById('pass2');
  //Store the Confimation Message Object ...
  var message = document.getElementById('confirmMessage');
  //Set the colors we will be using ...
  var goodColor = "#66cc66";
  var badColor = "#ff6666";
  //Compare the values in the password field
  //and the confirmation field
  if(pass1.value == pass2.value){
      //The passwords match.
      //Set the color to the good color and inform
      //the user that they have entered the correct password
      pass2.style.backgroundColor = goodColor;
      message.style.color = goodColor;
      message.innerHTML = "Passwords Match"
  }else{
      //The passwords do not match.
      //Set the color to the bad color and
      //notify the user.
      pass2.style.backgroundColor = badColor;
      message.style.color = badColor;
      message.innerHTML = "Passwords Do Not Match!"
  }
}
function validatephone(phone)
{
  var maintainplus = '';
  var numval = phone.value
  if ( numval.charAt(0)=='+' )
  {
      var maintainplus = '';
  }
  curphonevar = numval.replace(/[\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬\]\[]/g,'');
  phone.value = maintainplus + curphonevar;
  var maintainplus = '';
  phone.focus;
}
// validates text only
function Validate(txt) {
  txt.value = txt.value.replace(/[^a-zA-Z-'\n\r.]+/g, '');
}
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
// validate date of birth
function dob_validate(dob)
{
var regDOB = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;

  if(regDOB.test(dob) == false)
  {
  document.getElementById("statusDOB").innerHTML	= "<span class='warning'>DOB is only used to verify your age.</span>";
  }
  else
  {
  document.getElementById("statusDOB").innerHTML	= "<span class='valid'>Thanks, you have entered a valid DOB!</span>";
  }
}
// validate address
function add_validate(address)
{
var regAdd = /^(?=.*\d)[a-zA-Z\s\d\/]+$/;

  if(regAdd.test(address) == false)
  {
  document.getElementById("statusAdd").innerHTML	= "<span class='warning'>Address is not valid yet.</span>";
  }
  else
  {
  document.getElementById("statusAdd").innerHTML	= "<span class='valid'>Thanks, Address looks valid!</span>";
  }
}

  </script>

  <script type="text/javascript">
  document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions");
  </script>
  <?php include 'includes/custom_script.php'; ?>

  <script type="text/javascript">
  $(function () {
    $('#reg_form_ajax').on('submit', function (e) {
        swal("Creating Your Account.");
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: 'register_new_user_handler.php',
        data: $('#reg_form_ajax').serialize(),
        success: function (response) {
          if(response == 0){
            swal("Sorry, This Email id is Already Taken.");
          }else if (response == 1) {
            login();
          }
        }
      });
    });
  });

  function login() {
    var u_email = document.getElementById("email").value;
    var u_pass = document.getElementById("pass1").value;
      $.ajax({
          type: "POST",
          url: "verify_ajax.php",
          data: {
              user_email: u_email,
              user_pass: u_pass,
          },
          dataType: 'JSON',
          success: function(response_login_ajax) {
              if (response_login_ajax == 1) {
                window.location.href = 'index.php?firsttime=yes';
              }
          }
      });
  }
  </script>


</body>
</html>
