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
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Root Product Type</li>

          </ol>

          <!-- Page Content -->
          <h1>Product Type</h1>

          <div class="card mb-3">
            <div class="card-header">
                <a data-toggle="modal" data-target="#rootprodadd">
              <button style="margin:5px 0; padding:5px;" class="btn btn-success btn-sm edit btn-flat" data-id="36"><i class="fas fa-plus"></i> New </button>
            </a>
</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Product Type</th>
                      <th>Tools</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Product Type</th>
                      <th>Tools</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php

                                        $sql = "SELECT * FROM product_type ";
                                        $result = mysqli_query($db, $sql);

                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    echo    '

                                                    <tr>
                                                      <td>'.$row["p_type_name"].'</td>
                                                      <td>
                                                      <a data-toggle="modal" data-target="#prodtypeedit_'.$row["p_type_id"].'">
                                                        <button style="margin:1px;" class="btn btn-success btn-sm edit btn-flat"><i class="fa fa-edit"></i> Edit</button>
                                                    </a>
                                                      <a data-toggle="modal" data-target="#prodtypedelete_'.$row["p_type_id"].'">
                                                        <button  style="margin:1px;" class="btn btn-danger  btn-sm edit btn-flat"><i class="fa fa-edit"></i> Delete</button>
                                                    </a>
                                                    </td>
                                                    </tr>

                                                    ';
                                                  }
                                                }

                              ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
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

    <div class="modal fade" id="rootprodadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Product Type</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>

              </div>

              <!-- This is the man add form -->

              <div class="modal-body">
                <div class="container">
                  <p>Type the name and press Add to add new Product Type or press close to dismis</p>
                  <form method="post" action="root-prod-add.php">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="c_name"> Name</label>
                        <input type="text" class="form-control" id="product_type" name="product_type" placeholder="Root Division Name">
                      </div>
                    </div>
                    <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Add</button>
                  </form>
                </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

              </div>

                  </div>
              </div>
          </div>
    </div>

    <?php

                        $sql = "SELECT * FROM product_type ";
                        $result = mysqli_query($db, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo    '

                                    <div class="modal fade" id="prodtypeedit_'.$row["p_type_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                  <p>Type the name and press Add to Edit Category or press close to dismis</p>
                                                  <form method="post" action="edit-prodtype.php">
                                                  <div class="form-row">
                                                  <div class="form-group col-md-6">
                                                  <label for="p_type_name">Product Type Name</label>
                                                  <input type="text" class="form-control"   id="p_type_name" name="p_type_name" value="'.$row["p_type_name"].'">
                                                  <input type="hidden" class="form-control" id="p_type_id" name="p_type_id" value="'.$row["p_type_id"].'"">
                                                  </div>
                                            </div>
                                       <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                                    </form>
                                                </div>
                                              </div>

                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

                                              </div>
                                                  </form>
                                                  </div>
                                              </div>
                                          </div>
                                    </div>

                                    <div class="modal fade" id="prodtypedelete_'.$row["p_type_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete This Category</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">×</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="container">
                                    <form method="post" action="delete-prodtype.php">
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <h1>'.$row["p_type_name"].'</h1>
                                    <input type="hidden" class="form-control" id="p_type_id" name="p_type_id" value="'.$row["p_type_id"].'">
                                    </div>
                                    </div>
                                    <button action="submit" type="submit" class="btn btn-danger btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Delete</button>
                                    </form>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    ';
                                  }
                                }



              ?>



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


    <?php
                  mysqli_close($db);

    ?>

  </body>

</html>
