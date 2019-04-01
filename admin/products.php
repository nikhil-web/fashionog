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
                    <li class="breadcrumb-item active">Products</li>

                </ol>

                <!-- Page Content -->
                <h1>Products</h1>

                <div class="card mb-3">
                    <div class="card-header">
                        <a data-toggle="modal" data-target="#productadd">
                            <button style="margin:5px 0; padding:5px;" class="btn btn-success btn-sm edit btn-flat" data-id="36"><i class="fas fa-plus"></i> New Product</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>S.NO.</th>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Description</th>
                                        <th>Sizes</th>
                                        <th>Colors</th>
                                        <th>Price</th>
                                        <th>Target</th>
                                          <th>Subcategory</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>

                                        <th>S.NO.</th>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Description</th>
                                        <th>Sizes</th>
                                        <th>Colors</th>
                                        <th>Price</th>
                                        <th>Target</th>
                                          <th>Subcategory</th>
                                        <th>Tools</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    $image_flag=0;
                                    $size_flag=0;
                                    $color_flag=0;
                                        $sql = "SELECT * FROM products ";
                                        $result = mysqli_query($db, $sql);

                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) {

                                                  $conditon_image = 'SELECT * FROM products_img WHERE p_id='.$row["p_id"].'';
                                                      $conditon_size = 'SELECT * FROM products_size WHERE p_id='.$row["p_id"].'';
                                                          $conditon_color = 'SELECT * FROM products_color WHERE p_id='.$row["p_id"].'';

                                                  $condition_check_1 = mysqli_query($db, $conditon_image);
                                                  $condition_check_2 = mysqli_query($db, $conditon_size);
                                                  $condition_check_3 = mysqli_query($db, $conditon_color);

                                                    if (mysqli_num_rows($condition_check_1) > 0) {
                                                      $image_flag=1;
                                                    }
                                                    if (mysqli_num_rows($condition_check_2) > 0) {
                                                      $size_flag=1;
                                                    }
                                                     if (mysqli_num_rows($condition_check_3) > 0) {
                                                        $color_flag=1;
                                                      }

                                                    echo    '

                                                    <tr>
                                                      <td>'.$row["p_id"].'</td>
                                                      <td>'.$row["p_name"].'</td>';

                                                      if ($image_flag==1) {
                                                        echo '
                                                        <td>
                                                          <a data-toggle="modal" data-target="#productimage_'.$row["p_id"].'">
                                                         <button style="width: 100%;margin:1px;" class="btn btn-info btn-sm edit btn-flat"><i class="fa fa-eye"></i> View</button>
                                                         </a>
                                                         </td>
                                                        ';
                                                      }else {
                                                      echo '
                                                      <td>
                                                        <a data-toggle="modal" data-target="#productimage_'.$row["p_id"].'">
                                                       <button style="width: 100%;margin:1px;" class="btn btn-danger btn-sm edit btn-flat"><i class="fa fa-times"></i> Add Images</button>
                                                       </a>
                                                       </td>
                                                      ';
                                                      }
                                                      echo '

                                                       <td>
                                                         <a data-toggle="modal" data-target="#productdes_'.$row["p_id"].'">
                                                        <button style="width: 100%;margin:1px;" class="btn btn-info btn-sm edit btn-flat"><i class="fa fa-eye"></i> View</button>
                                                        </a>
                                                        </td>';


                                                        if ($size_flag==1) {
                                                          echo '
                                                          <td>
                                                            <a data-toggle="modal" data-target="#productsize_'.$row["p_id"].'">
                                                           <button style="width: 100%;margin:1px;" class="btn btn-info btn-sm edit btn-flat"><i class="fa fa-eye"></i> View</button>
                                                           </a>
                                                           </td>
                                                          ';
                                                        }else {
                                                        echo '
                                                        <td>
                                                          <a data-toggle="modal" data-target="#productsize_'.$row["p_id"].'">
                                                         <button style="width: 100%;margin:1px;" class="btn btn-danger btn-sm edit btn-flat"><i class="fa fa-times"></i> Add Sizes</button>
                                                         </a>
                                                         </td>
                                                        ';
                                                        }

                                                        if ($color_flag==1) {
                                                          echo '
                                                          <td>
                                                            <a data-toggle="modal" data-target="#productcolor_'.$row["p_id"].'">
                                                           <button style="width: 100%;margin:1px;" class="btn btn-info btn-sm edit btn-flat"><i class="fa fa-eye"></i> View</button>
                                                           </a>
                                                           </td>
                                                          ';
                                                        }else {
                                                        echo '
                                                        <td>
                                                          <a data-toggle="modal" data-target="#productcolor_'.$row["p_id"].'">
                                                         <button style="width: 100%;margin:1px;" class="btn btn-danger btn-sm edit btn-flat"><i class="fa fa-times"></i> Add Color</button>
                                                         </a>
                                                         </td>
                                                        ';
                                                        }
                                                        echo'
                                                      <td>$'.$row["p_price"].'</td>
                                                      <td>';

                                                      if ($row["p_tar_aud"]=='1') {
                                                        echo 'Women';
                                                      }elseif ($row["p_tar_aud"]=='1') {
                                                            echo 'Man';
                                                      }else {
                                                          echo 'Accessories';
                                                      }

                                                      echo '</td>
                                                      <td>

                                                          <a data-toggle="modal" data-target="#prod_sub_category_'.$row["p_id"].'">
                                                      <button style="margin:1px;" class="btn btn-success btn-sm edit btn-flat"><i class="fa fa-edit"></i> Edit</button>
                                                   </a>
                                                      </td>
                                                      <td>
                                                          <a data-toggle="modal" data-target="#productedit_'.$row["p_id"].'">
                                                        <button style="margin:1px;" class="btn btn-success btn-sm edit btn-flat"><i class="fa fa-edit"></i> Edit</button>
                                                     </a>
                                                      </td>
                                                    </tr>

                                                    ';

                                                    $image_flag=0;
                                                    $size_flag=0;
                                                    $color_flag=0;
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


    <?php

                        $sql = "SELECT * FROM products ";
                        $result_outer = mysqli_query($db, $sql);

                            if (mysqli_num_rows($result_outer) > 0) {
                                // output data of each row
                                while($row_outer = mysqli_fetch_assoc($result_outer)) {
                                    echo    '
                                    <div class="modal fade" id="productimage_'.$row_outer["p_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Images Of '.$row_outer["p_name"].'</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span></button>

                                              </div>

                                              <!-- This is the man add form -->

                                              <div class="modal-body">
                                              <p>Choose New image and press Add to ad new image</p>
                                              <div class="container">
                                                                                           <form enctype="multipart/form-data" method="post" action="add-new-image.php">
                                                                                           <div class="form-row">
                                                                                           <div class="form-group col-md-6">
                                                                                           <input type="file" name="fileToUpload" id="fileToUpload" class="inputfile" required>
                                                                                           <input type="hidden" class="form-control" id="p_id" name="p_id" value="'.$row_outer["p_id"].'"">
                                                                                           </div>
                                                                                     </div>
                                                                                <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fas fa-plus"></i> Add</button>
                                                                             </form>
                                                                             </div>


                                              <div class="container">
                                                <p>These are the available images</p>
                                                <div class="card-body">
                                                  <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                      <thead>
                                                        <tr>
                                                          <th>Image</th>

                                                          <th>Tools</th>
                                                        </tr>
                                                      </thead>
                                                      <tfoot>
                                                        <tr>
                                                        <th>Image</th>

                                                        <th>Tools</th>
                                                        </tr>
                                                      </tfoot>
                                                      <tbody>
                                                      ';

                                                      $sql_inner = 'SELECT * FROM products_img WHERE p_id='.$row_outer["p_id"].'';
                                                      $result_inner = mysqli_query($db, $sql_inner);

                                                          if (mysqli_num_rows($result_inner) > 0) {
                                                              // output data of each row
                                                              while($row_inner = mysqli_fetch_assoc($result_inner)) {
                                                                echo '
                                                                <tr>
                                                                  <td><img class="product_show_image" style="width:100px;" src="'.$row_inner["p_image"].'" alt=""></td>
                                                                  <td>
                                                                  <a href="delete-old-image.php?id='.$row_inner["details_id"].'" >
                                                                  <button style="margin:1px;" class="btn btn-danger  btn-sm edit btn-flat"><i class="fa fa-times"></i> Delete</button>
                                                                  </a>
                                                                  <a href="make-default-image.php?id='.$row_inner["details_id"].'" >
                                                                  <button style="margin:1px;" class="btn btn-danger  btn-sm edit btn-flat"><i class="fa fa-times"></i> Make Default</button>
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

                                    <div class="modal fade" id="productdes_'.$row_outer["p_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                    <h3>'.$row_outer["p_des"].'</h3>

                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>





                                    <div class="modal fade" id="productsize_'.$row_outer["p_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Sizes Of '.$row_outer["p_name"].'</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span></button>

                                              </div>

                                              <!-- This is the man add form -->

                                              <div class="modal-body">
                                              <div class="container">
                                                <p>Type the size and press Add or press close to dismis</p>
                                 <form method="post" action="add-new-size.php">
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="p_size">Select list:</label>
                                    <select class="form-control" id="p_size" name="p_size">
                                      <option>5</option>
                                      <option>5.5</option>
                                      <option>6</option>
                                      <option>6.5</option>
                                      <option>7</option>
                                      <option>7.5</option>
                                      <option>8</option>
                                      <option>8.5</option>
                                      <option>9</option>
                                      <option>9.5</option>
                                      <option>10</option>
                                      <option>10.5</option>
                                      <option>11</option>

                                    </select>
                                        <input type="hidden" class="form-control" id="p_id" name="p_id" value="'.$row_outer["p_id"].'"">
                                    </div>
                                  </div>
                                <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Add</button>
                                </form>
                                              </div>
                                                <div class="container">
                                                  <p>These are the available sizes</p>
                                                  <div class="card-body">
                                                    <div class="table-responsive">
                                                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                          <tr>
                                                            <th>Sizes</th>
                                                            <th>Tools</th>
                                                          </tr>
                                                        </thead>
                                                        <tfoot>
                                                          <tr>
                                                          <th>Sizes</th>
                                                          <th>Tools</th>
                                                          </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        ';

                                                        $sql_inner = 'SELECT * FROM products_size WHERE p_id='.$row_outer["p_id"].'';
                                                        $result_inner = mysqli_query($db, $sql_inner);

                                                            if (mysqli_num_rows($result_inner) > 0) {
                                                                // output data of each row
                                                                while($row_inner = mysqli_fetch_assoc($result_inner)) {
                                                                  echo '
                                                                  <tr>
                                                                    <td>'.$row_inner["p_size"].'</td>
                                                                    <td>

                                                                      <a href="delete-old-size.php?id='.$row_inner["details_id"].'" >
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






                                    <div class="modal fade" id="productcolor_'.$row_outer["p_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Images Of '.$row_outer["p_name"].'</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span></button>

                                              </div>

                                              <!-- This is the man add form -->

                                              <div class="modal-body">
                                              <div class="container">
                                                <p>Select Color and NAme then press Add or press close to dismis</p>
                                 <form method="post" action="add-new-color.php">
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label for="p_color">Select Color</label>
                                      <input type="color" class="form-control" id="p_color" name="p_color"  required>
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="p_size">Color Name</label>
                                      <input type="text" class="form-control" id="color_namer" name="color_name" required>
                                      <input type="hidden" class="form-control" id="p_id" name="p_id" value="'.$row_outer["p_id"].'"" >
                                    </div>

                                  </div>
                                <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Add</button>
                                </form>
                                              </div>
                                                <div class="container">
                                                  <p>These are the available images</p>
                                                  <div class="card-body">
                                                    <div class="table-responsive">
                                                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                          <tr>
                                                            <th>Color</th>
                                                            <th>Name</th>
                                                            <th>Tools</th>
                                                          </tr>
                                                        </thead>
                                                        <tfoot>
                                                          <tr>
                                                          <th>Color</th>
                                                          <th>Name</th>
                                                          <th>Tools</th>
                                                          </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        ';

                                                        $sql_inner = 'SELECT * FROM products_color WHERE p_id='.$row_outer["p_id"].'';
                                                        $result_inner = mysqli_query($db, $sql_inner);

                                                            if (mysqli_num_rows($result_inner) > 0) {
                                                                // output data of each row
                                                                while($row_inner = mysqli_fetch_assoc($result_inner)) {
                                                                  echo '
                                                                  <tr>
                                                                    <td style="background:'.$row_inner["p_color"].'" ></td>
                                                                    <td>'.$row_inner["color_name"].'</td>
                                                                    <td>
                                                                    <a href="delete-old-color.php?id='.$row_inner["details_id"].'" >
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


                                    <div class="modal fade" id="productedit_'.$row_outer["p_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit '.$row_outer["p_name"].'</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>

                                                </div>

                                                <!-- This is the man add form -->

                                                <div class="modal-body">
                                                    <div class="container">
                                                        <p>Fill the details and press Add to update product or press close to dismis</p>
                                                        <form method="post" action="edit-product.php">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="p_name">Product Name</label>
                                                                    <input type="text" class="form-control" id="p_name" name="p_name" value="'.$row_outer["p_name"].'">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="p_price">Product Price</label>
                                                                    <input type="text" class="form-control" id="p_price" name="p_price"  value="'.$row_outer["p_price"].'">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="p_des">Product Description</label>
                                                                <textarea type="text"  rows="5" class="form-control" id="p_des" name="p_des" >'.$row_outer["p_des"].'</textarea>
                                                            </div>


                                                                <div class="form-group">
                                                                    <label for="p_cat">Category</label>
                                                                    <select id="p_cat" name="p_cat" class="form-control">
                                                                      ';

                                                                      $cat = $row_outer["p_cat"];
                                                                      $sql_category = "SELECT * FROM category WHERE c_id = $cat";
                                                                      $current_category = mysqli_query($db, $sql_category);
                                                                      $row_current = mysqli_fetch_assoc($current_category);
                                                                      echo '<option selected value="'.$row_outer["p_cat"].'" >'.$row_current["c_name"].'</option>';

                                                                        $sql_category = "SELECT * FROM category WHERE c_id != $cat";
                                                                        $result_category = mysqli_query($db, $sql_category);

                                                                            if (mysqli_num_rows($result_category) > 0) {
                                                                                while($row = mysqli_fetch_assoc($result_category)) {
                                                                                  echo '  <option value="'.$row["c_id"].'" >'.$row["c_name"].'</option>';
                                                                                }
                                                                      }
                                                                        echo '

                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="p_sub_cat">Sub Category</label>
                                                                    <select id="p_sub_cat" name="p_sub_cat" class="form-control">
                                                                      ';

                                                                      $sql_inner = 'SELECT * FROM sub_category WHERE cat_id='.$row_outer["p_cat"].'';
                                                                      $result_inner = mysqli_query($db, $sql_inner);

                                                                          if (mysqli_num_rows($result_inner) > 0) {
                                                                              // output data of each row
                                                                              while($row_inner = mysqli_fetch_assoc($result_inner)) {
                                                                              echo '<option>'.$row_inner["sub_cat_name"].'</option>';
                                                                    }
                                                                    }
                                                                        echo '

                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="p_target_audiance">Product Target Audiance</label>
                                                                    <select id="p_target_audiance" name="p_target_audiance" class="form-control" required>
                                                                        <option value="1">Women</option>
                                                                        <option value="2">Men</option>
                                                                        <option value="3">Accessories</option>
                                                                    </select>
                                                                </div>

                                                            <input type="hidden" id="p_id" name="p_id" value="'.$row_outer["p_id"].'">
                                                            <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update Product</button>

                                                        </form>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                <a href="delete-product.php?p_id='.$row_outer["p_id"].'">
                                                    <button class="btn btn-danger btn-flat" name="edit"><i class="fa fa-times"></i> Delete Product</button>
                                                </a>
                                                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

                                                </div>

                                            </div>
                                        </div>
                                    </div>





                                    <div class="modal fade" id="prod_sub_category_'.$row_outer["p_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Sizes Of '.$row_outer["p_name"].'</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span></button>

                                              </div>

                                              <!-- This is the man add form -->

                                              <div class="modal-body">
                                              <div class="container">
                                                <p>Type the size and press Add or press close to dismis</p>
                                  <form method="post" action="add-new-sub-category.php">
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="p_sub_cat">Select list:</label>
                                    <select class="form-control" id="p_sub_cat" name="p_sub_cat">
                                      ';

                                      $sql_inner = 'SELECT * FROM sub_category WHERE cat_id='.$row_outer["p_cat"].'';
                                      $result_inner = mysqli_query($db, $sql_inner);

                                          if (mysqli_num_rows($result_inner) > 0) {
                                              // output data of each row
                                              while($row_inner = mysqli_fetch_assoc($result_inner)) {
                                              echo '<option>'.$row_inner["sub_cat_name"].'</option>';
                                    }
                                    }
                                    echo '

                                    </select>
                                        <input type="hidden" class="form-control" id="p_id" name="p_id" value="'.$row_outer["p_id"].'"">
                                    </div>
                                  </div>
                                  <button action="submit" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Add</button>
                                  </form>
                                </div>


                                <div class="modal-body">
                                  <div class="container">

                                <h3>'.$row_outer["p_sub_cat"].'</h3>

                                  </div>
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


<!-- Product Add Modal -->
    <div class="modal fade" id="productadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>

                </div>

                <!-- This is the man add form -->

                <div class="modal-body">
                    <div class="container">
                        <p>Fill the details and press Add to add new product or press close to dismis</p>
                        <form method="post" action="add-product.php">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="p_name">Product Name</label>
                                    <input type="text" class="form-control" id="p_name" name="p_name" placeholder="Product Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="p_price">Product Price</label>
                                    <input type="text" class="form-control" id="p_price" name="p_price" placeholder="Product Price in Dollars" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="p_des">Product Description</label>
                                <textarea type="text"  rows="5" class="form-control" id="p_des" name="p_des" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="p_type">Product Type</label>
                                <select id="p_type" name="p_type" class="form-control" required>
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

                                <div class="form-group">
                                    <label for="p_cat">Category</label>
                                    <select id="p_cat" name="p_cat" class="form-control" required>
                                        <option selected>Choose...</option>
                                        <?php
                                        $sql_category = 'SELECT * FROM category ';
                                        $result_category = mysqli_query($db, $sql_category);

                                            if (mysqli_num_rows($result_category) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($result_category)) {
                                                  echo '  <option value="'.$row["c_id"].'" >'.$row["c_name"].'</option>';
                                                }
                                      }

                                         ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="p_target_audiance">Product Target Audiance</label>
                                    <select id="p_target_audiance" name="p_target_audiance" class="form-control" required>
                                        <option value="1">Women</option>
                                        <option value="2">Men</option>
                                        <option value="3">Accessories</option>
                                    </select>
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
