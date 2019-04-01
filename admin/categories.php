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
            <li class="breadcrumb-item active">Categories</li>

          </ol>

          <!-- Page Content -->
          <h1>Products</h1>

          <div class="card mb-3">
            <div class="card-header">
                <a data-toggle="modal" data-target="#categoryadd">
              <button style="margin:5px 0; padding:5px;" class="btn btn-success btn-sm edit btn-flat" data-id="36"><i class="fas fa-plus"></i> New Category</button>
            </a>
</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th> Category Name</th>
                        <th> Product Type</th>
                      <th>Tools</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th> Category Name</th>
                      <th> Product Type</th>
                      <th>Tools</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php

                                        $sql = "SELECT * FROM category INNER JOIN product_type ON category.p_type_id = product_type.p_type_id";
                                        $result = mysqli_query($db, $sql);

                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    echo    '

                                                    <tr>
                                                      <td>'.$row["c_name"].'</td>
                                                      <td>'.$row["p_type_name"].'</td>
                                                      <td>
                                                      <a data-toggle="modal" data-target="#categoryedit_'.$row["c_id"].'">
                                                        <button style="margin:1px;" class="btn btn-success btn-sm edit btn-flat"><i class="fa fa-edit"></i> Edit</button>
                                                    </a>
                                                      <a data-toggle="modal" data-target="#categorydelete_'.$row["c_id"].'">
                                                        <button  style="margin:1px;" class="btn btn-danger  btn-sm edit btn-flat"><i class="fa fa-edit"></i> Delete</button>
                                                    </a>
                                                    <a data-toggle="modal" data-target="#categoryaddsub_'.$row["c_id"].'">
                                                      <button  style="margin:1px;" class="btn btn-primary  btn-sm edit btn-flat"><i class="fas fa-plus"></i> Add Sub Category</button>
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

    <div class="modal fade" id="categoryadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>

              </div>

              <!-- This is the man add form -->

              <div class="modal-body">
                <div class="container">
                  <p>Type the name and press Add to add new Category or press close to dismis</p>
   <form method="post" action="add-category.php">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="c_name">Category Name</label>
        <input type="text" class="form-control" id="c_name" name="c_name" placeholder="Category Name">
      </div>
      <div class="form-group col-md-6">
          <label for="p_type">This Subcategory is for which product??</label>
          <select id="p_type" name="p_type" class="form-control">
              <option selected>Choose...</option>
              <?php
              $sql_category = 'SELECT * FROM product_type ';
              $result_category = mysqli_query($db, $sql_category);

                  if (mysqli_num_rows($result_category) > 0) {
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result_category)) {
                        echo '  <option value="'.$row["p_type_id"].'" >'.$row["p_type_name"].'</option>';
                      }
            }


               ?>

          </select>
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

                          $sql = "SELECT * FROM category INNER JOIN product_type ON category.p_type_id = product_type.p_type_id";
                        $result = mysqli_query($db, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo    '

                                    <div class="modal fade" id="categoryedit_'.$row["c_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                  <form method="post" action="edit-category.php">
                                                  <div class="form-row">
                                                  <div class="form-group col-md-6">
                                                  <label for="c_name">Category Name</label>
                                                  <input type="text" class="form-control" id="c_name" name="c_name" value="'.$row["c_name"].'">
                                                  <input type="hidden" class="form-control" id="c_id" name="c_id" value="'.$row["c_id"].'"">
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







                                    <div class="modal fade" id="categorydelete_'.$row["c_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <form method="post" action="delete-category.php">
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <h1>'.$row["c_name"].'</h1>
                                    <input type="hidden" class="form-control" id="c_id" name="c_id" value="'.$row["c_id"].'">
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




                                          <div class="modal fade" id="categoryaddsub_'.$row["c_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg">
                                                                          <div class="modal-content">
                                                                                  <div class="modal-header">
                                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                          <span aria-hidden="true">&times;</span></button>

                                                                                  </div>

                                                                                  <!-- This is the man add form -->

                                                                                  <div class="modal-body">
                                                                                  <div class="container">
                                                                                    <p>Type Sub Category name Add or press close to dismis</p>
                                                                                    <form method="post" action="add-sub-category.php">
                                                                                     <div class="form-row">
                                                                                       <div class="form-group col-md-6">
                                                                                         <label for="sub_cat_name">Sub Category Name</label>
                                                                                         <input type="text" class="form-control" id="sub_cat_name" name="sub_cat_name" placeholder="Sub Category Name">
                                                                                          <input type="hidden" class="form-control" id="c_id" name="c_id" value="'.$row["c_id"].'">
                                                                                     </div>
                                                                                     </div>
                                                                                   <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Add</button>
                                                                                   </form>
                                                                                  </div>
                                                                                    <div class="container">
                                                                                      <p>These are the Added Sub Categories</p>
                                                                                      <div class="card-body">
                                                                                        <div class="table-responsive">
                                                                                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                                                            <thead>
                                                                                              <tr>
                                                                                                <th>Sub Category</th>

                                                                                                <th>Tools</th>
                                                                                              </tr>
                                                                                            </thead>
                                                                                            <tfoot>
                                                                                              <tr>
                                                                                              <th>Sub Category</th>

                                                                                              <th>Tools</th>
                                                                                              </tr>
                                                                                            </tfoot>
                                                                                            <tbody>
                                                                                            ';

                                                                                            $sql_inner = 'SELECT * FROM sub_category WHERE cat_id='.$row["c_id"].'';
                                                                                            $result_inner = mysqli_query($db, $sql_inner);

                                                                                                if (mysqli_num_rows($result_inner) > 0) {
                                                                                                    // output data of each row
                                                                                                    while($row_inner = mysqli_fetch_assoc($result_inner)) {
                                                                                                      echo '
                                                                                                      <tr>
                                                                                                        <td> '.$row_inner["sub_cat_name"].' </td>

                                                                                                        <td>
                                                                                                        <a href="delete-old-sub-category.php?id='.$row_inner["sub_cat_id"].'" >
                                                                                                        <button style="margin:1px;" class="btn btn-danger  btn-sm edit btn-flat"><i class="fa fa-times"></i> Delete</button>
                                                                                                        </a>
                                                                                                        </td>
                                                                                                      </tr>
                                                                                            ';
                                                                                          }
                                                                                          }
                                                                                          echo '
                                                                                            </tbody>
                                                                                          </table>
                                                                                        </div>
                                                                                      </div></div>
                                                                                  </div>

                                                                                  <div class="modal-footer">
                                                                                      <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                                                                  </div>

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
