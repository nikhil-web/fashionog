<?php
include 'session.php';
include 'includes/check-login.php';
include 'includes/check-admin.php';
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FashionOG - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

  <?php include 'includes/navbar.php'; ?>

    <div id="wrapper">

      <!--Sidebar-->
      <?php include 'includes/sidebar.php' ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <h3>User Wise Sales Report</h3>
          </ol>

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Sales</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Sales Today</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Name</th>
                      <th>E-email</th>
                      <th>Contact number</th>
                      <th>Address</th>
                      <th>Ammount</th>
                      <th>View</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Order ID</th>
                      <th>Name</th>
                      <th>E-email</th>
                      <th>Contact number</th>
                      <th>Address</th>
                      <th>Ammount</th>
                      <th>View</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>

                  <tbody>
                    <?php

                    $sql =   'SELECT * from users INNER JOIN sales ON users.user_id = sales.user_id';
                    $result = mysqli_query($db, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                              echo '<tr>
                                  <td>'.$row["sales_id"].'</td>
                                  <td>'.$row["user_name"].'</td>
                                  <td>'.$row["user_email"].'</td>
                                  <td>'.$row["phonenumber"].'</td>
                                  <td>'.$row["address"].'</td>
                                  <td>'.$row["sales_value"].'</td>
                                  <td>
                                  <a data-toggle="modal" data-target="#sales_id_finish_'.$row["sales_id"].'">
                                 <button style="width: 100%;margin:1px;" class="btn btn-info btn-sm edit btn-flat"><i class="fa fa-eye"></i> View</button>
                                 </a>
                                </td>
                                  <td> <a data-toggle="modal" data-target="#update_order_status'.$row["sales_id"].'">
                                 <button style="width: 100%;margin:1px;" class="btn btn-info btn-sm edit btn-flat"><i class="fa fa-eye"></i> View</button>
                                 </a></td>
                                </tr>';
                            }}
                     ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->



      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <?php
    $sql =   'SELECT * from users INNER JOIN sales ON users.user_id = sales.user_id';
    $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row_outer = mysqli_fetch_assoc($result)) {
            echo '<div class="modal fade" id="sales_id_finish_'.$row_outer['sales_id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Orderd Products</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>

                          </div>

                          <!-- This is the man add form -->

                          <div class="modal-body">
                              <div class="container">
                                  <p>Fill the details and press Add to add new product or press close to dismis</p>
                                  <div class="card-body">
                                      <div class="table-responsive">
                                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                              <thead>
                                                  <tr>
                                                      <th>P ID.</th>
                                                      <th>Name</th>
                                                      <th>Qantity</th>
                                                      <th>Sizes</th>
                                                      <th>Color</th>
                                                      <th>Shipping Status</th>
                                                  </tr>
                                              </thead>
                                              <tfoot>
                                                  <tr>

                                                      <th>P ID.</th>
                                                      <th>Name</th>
                                                      <th>Qantity</th>
                                                      <th>Size</th>
                                                      <th>Color</th>
                                                      <th>Shipping Status</th>
                                                  </tr>
                                              </tfoot>
                                              <tbody>';
                                              $item_id = explode("_",$row_outer["p_id"]);
                                              for ($i=0; $i < $row_outer["item_count"]; $i++) {
                                            
                                                 $sql_item = 'SELECT * FROM cart_2 INNER JOIN products on cart_2.p_id = products.p_id INNER JOIN products_img on products.p_id = products_img.p_id WHERE cart_2.p_id = '.$item_id[$i].' AND products_img.p_image_type = 1 AND cart_2.user_id = '.$row_outer["user_id"].' AND cart_2.purchased =1';
                                                 $result_item = mysqli_query($db, $sql_item);
                                                 if (mysqli_num_rows($result_item) > 0) {
                                                     // output data of each row
                                                     while($row_item = mysqli_fetch_assoc($result_item)) {
                                                       echo '<tr>
                                                             <td>'.$row_item["p_id"].'</td>
                                                             <td>'.$row_item["p_name"].'</td>
                                                             <td>'.$row_item["qnty"].'</td>
                                                             <td>'.$row_item["size"].'</td>
                                                             <td>'.$row_item["color"].'</td>
                                                             <td>';

                                                             if ($row_item["shipped"] == 0) {
                                                               echo '<div class="alert alert-info">
                                                               <strong>PROCESSING!</strong>
                                                               </div>';
                                                             }elseif ($row_item["shipped"] == 1) {
                                                               echo '<div class="alert alert-success">
                                                               <strong>SHIPPED!</strong>
                                                               </div>';
                                                             }elseif ($row_item["shipped"] == 2){
                                                             echo '<div class="alert alert-danger">
                                                             <strong>CANCLED!</strong>
                                                             </div>';
                                                             }

                                                             echo '</td>

                                                           </tr>';
                                                     }
                                                    }
                                              }
                                              echo '</tbody>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="modal-footer">
                              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

                          </div>

                      </div>
                  </div>
              </div>


              <div class="modal fade" id="update_order_status'.$row_outer['sales_id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit This Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>

                        </div>

                        <!-- This is the man add form -->
              <div class="modal-body">
                  <div class="container">
                      <p>Fill the details and press Add to add new product or press close to dismis</p>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                      <tr>
                                          <th>P ID.</th>
                                          <th>Name</th>

                                          <th>Shipping Status</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                      <tr>

                                          <th>P ID.</th>
                                          <th>Name</th>

                                          <th>Shipping Status</th>
                                      </tr>
                                  </tfoot>
                                  <tbody>';
                                  $item_id = explode("_",$row_outer["p_id"]);
                                  for ($i=0; $i < $row_outer["item_count"]; $i++) {
                                     echo "*";
                                     echo $item_id[$i];
                                     $sql_item = 'SELECT * FROM cart_2 INNER JOIN products on cart_2.p_id = products.p_id INNER JOIN products_img on products.p_id = products_img.p_id WHERE cart_2.p_id = '.$item_id[$i].' AND products_img.p_image_type = 1 AND cart_2.user_id = '.$row_outer["user_id"].' AND cart_2.purchased =1';
                                     $result_item = mysqli_query($db, $sql_item);
                                     if (mysqli_num_rows($result_item) > 0) {
                                         // output data of each row
                                         while($row_item = mysqli_fetch_assoc($result_item)) {
                                           echo '<tr>
                                                 <td>'.$row_item["p_id"].'</td>
                                                 <td>'.$row_item["p_name"].'</td>
                                                 <td>
                                                 <form method="post" action="product_ship_status.php">
                                                 <div class="form-row">
                                                 <div class="form-group col-md-6">
                                                 <select id="p_ship_status" name="p_ship_status" class="form-control">
                                                     <option value=0>Processing</option>
                                                     <option value=1>Shipped</option>
                                                     <option value=2>Cancled</option>
                                                 </select>
                                                 <input type="hidden" name="cart_item_id" value="'.$row_item["cart_item_id"].'">
                                                 </div>
                                                 </div>
                                                 <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                                                 </form>
                                                 </td>
                                               </tr>';
                                         }
                                        }
                                  }
                                  echo '</tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

              </div>

            </div>
            </div>
            </div>




              ';
            }
          }
     ?>

     <!-- Product Add Modal -->



  <?php include 'includes/logout-modal.php'; ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

  </body>

</html>
