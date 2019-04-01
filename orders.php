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
                <div class="col-xl-12 col-sm-12 ">
                  <ul class="">
                    <button id="placed_orders" type="button" class="btn btn-primary">Orders</button>
                    <button id="" type="button" class="btn btn-outline-secondary">Open Orders</button>
                    <button type="button" class="btn btn-outline-secondary">Cancelled Orders</button>
                  </ul>


            <div class="col-xl-12 col-sm-12 p-t-50 m-0 p-l-0 p-r-0">


              <?php
              $sql = 'SELECT * FROM sales WHERE sales.user_id = '.$_SESSION["user_id"].'';
              $result = mysqli_query($db, $sql);

                  if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      while($row_outer = mysqli_fetch_assoc($result)) {
                      $item_id = explode("_",$row_outer["p_id"]);
                      echo '
                      <div class="p-b-30">
                        <h3 class="ltext-103 cl5">
                          Items Sold On '.$row_outer["payment_sale_time"].'
                        </h3>
                      </div>
                      ';
                      for ($i=0; $i < $row_outer["item_count"]; $i++) {
                        //  echo "*";
                        //  echo $item_id[$i];
                        //  echo 'SELECT * FROM cart_2 INNER JOIN products on cart_2.p_id = products.p_id INNER JOIN products_img on products.p_id = products_img.p_id WHERE cart_2.p_id = '.$item_id[$i].' AND products_img.p_image_type = 1 AND cart_2.user_id = '.$_SESSION["user_id"].' AND cart_2.purchased =1 <br>' ;
                          $sql_item = 'SELECT * FROM cart_2 INNER JOIN products on cart_2.p_id = products.p_id INNER JOIN products_img on products.p_id = products_img.p_id WHERE cart_2.p_id = '.$item_id[$i].' AND products_img.p_image_type = 1 AND cart_2.user_id = '.$_SESSION["user_id"].' AND cart_2.purchased =1';
                          $result_item = mysqli_query($db, $sql_item);
                          if (mysqli_num_rows($result_item) > 0) {
                              // output data of each row
                              while($row_item = mysqli_fetch_assoc($result_item)) {
                          echo '<div class="row bor_dash_top ">
                                  <div class="col-xl-12 col-sm-12 bor1 p-0">
                                    <div class="col-xl-3 col-sm-3 m-0 p-1 float-l">
                                      <div class="card" style="width: 95%;left: 50%;transform: translateX(-50%);">
                                        <img src="'.substr($row_item["p_image"], 3).'" class="card-img-top" alt="...">
                                        <div class="card-body" style="text-align:center">
                                          <p class="card-title">'.$row_item["p_name"].'</p>
                                          <a href="product-details.php?product='.$row_item["p_id"].'" class="btn btn-primary">View</a>
                                        </div>
                                      </div>
                                    </div>
                                  <div class="col-xl-9 col-sm-9 m-0 float-l">
                                    <table class="table table-responsive">
                                      <thead>
                                        <tr>
                                          <th>Purchse Date</th>
                                          <th>Quantity</th>
                                          <th>Price</th>
                                          <th>Status</th>
                                          <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td><p>'.$row_outer["payment_sale_time"].'</p></td>
                                            <td><p>'.$row_item["qnty"].'</p></td>
                                            <td><p>$ '.$row_item["p_price"]*$row_item["qnty"].'</p></td>
                                            <td>';

                                            if ($row_item["shipped"] == 0) {
                                              echo '<div class="alert alert-info">
                                              <strong>We are processing your Order!!</strong>
                                              </div>';
                                            }elseif ($row_item["shipped"] == 1) {
                                              echo '<div class="alert alert-success">
                                              <strong>Your Order is Shipped!</strong>
                                              </div>';
                                            }elseif ($row_item["shipped"] == 2){
                                            echo '<div class="alert alert-danger">
                                            <strong>Sorry your order is canceled!</strong>
                                            </div>';
                                            }

                                            echo'
                                            </td>
                                            <td><button type="button" class="btn btn-primary">Cancel</button></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <div class="card m-t-20">
                                        <div class="card-header">
                                          Note
                                        </div>
                                        <div class="card-body">
                                          <h5 class="card-title">Your Order was placed Sucessfully</h5>
                                          <p class="card-text">Thank You for placing your order, It will be shipped shortly, for any queries please contact customer support you can cancel or download the invoice</p>
                                          <a href="#" class="btn btn-primary m-t-15">Download Invoice</a>
                                          <a href="#" class="btn btn-primary m-t-15">Buy It Again</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>';
                      }
                    }
                  }

                }

            }
              ?>






<!-- Single Item

Single Item -->


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
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             ...
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
    <!--===============================================================================================-->
    <script src="js/main.js"></script>


    <?php include 'includes/custom_script.php'; ?>

</body>

</html>
