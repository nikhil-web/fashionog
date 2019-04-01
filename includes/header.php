<!-- Header -->
<header>
  <!-- Header desktop -->
  <div class="container-menu-desktop">
    <!-- Topbar -->
    <div id="topbar" class="top-bar">
      <div class="content-topbar flex-sb-m h-full container">

        <a href="index.php">
          <div class="left-top-bar flex-w h-full">
          <h3 id="topbar_icon" class="flex-c-m trans-04 p-lr-10" style="opacity:0;" >Fashion<span style="color:#c81f1f;">OG</span> </h3>
          </div>
        </a>

        <div class="right-top-bar flex-w h-full">

          <?php
            if($_SESSION['auth'] == true){
              echo '
                          <a href="user.php" class="flex-c-m trans-04 p-lr-25">
                          '.$_SESSION["user_name"].'
                          </a>
                          <a href="logout.php" class="flex-c-m trans-04 p-lr-25">
                          Logout
                          </a>
                          <a href="shoping-cart.php" class="important_button flex-c-m trans-04 p-lr-25">
                            My Cart
                          </a>';
              }
            else {
            echo '
                        <a href="login.php" class="flex-c-m trans-04 p-lr-25">
                        Login
                        </a>
                        <a href="register.php" class="important_button signup_button flex-c-m trans-04 p-lr-25">
                        Signup
                        </a>'
                        ;
            }

           ?>


          <a href="#" class="flex-c-m trans-04 p-lr-25">
            EN
          </a>

          <a href="#" class="flex-c-m trans-04 p-lr-25">
            USD
          </a>

        </div>
      </div>
    </div>

    <div class="wrap-menu-desktop">
      <nav class="limiter-menu-desktop container">

        <!-- Logo desktop -->
        <a href="index.php" class="logo">
          <img src="images/icons/logo-01.png" alt="IMG-LOGO">
        </a>

        <!-- Menu desktop -->
        <div class="menu-desktop">


          <ul class="main-menu">
            <li class="active-menu">
              <a href="index.php">Home</a>
            </li>

            <li>
              <a href="shop.php">Shop</a>
            </li>

            <li>
              <a href="contact.php">Contact</a>
            </li>

            <li>
              <a href="about.php">About</a>
            </li>

          </ul>
        </div>



        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m">
          <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
            <i class="zmdi zmdi-search"></i>
          </div>

          <?php

            if($_SESSION['auth'] == true){
            echo'
            <a href="#" class="notification js-show-cart">
            <span><i style="font-size:25px;color: #2d2d2d;" class="fas fa-shopping-cart"></i></span>
             <span id="count_cart_output" class="badge"></span>
            </a>

            <a href="#" class="notification">
            <span><i style="font-size:25px;color: #2d2d2d;" class="fas fa-heart"></i></span>
             <span id="wishlist_count_output" class="badge"></span>
            </a>
            ';
          }

           ?>

        </div>
      </nav>
    </div>
  </div>

  <!-- Header Mobile -->
  <div class="wrap-header-mobile">
    <!-- Logo moblie -->
    <div class="logo-mobile">
      <a href="index.php"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
    </div>

    <!-- Icon header -->
    <div class="wrap-icon-header flex-w flex-r-m m-r-15">
      <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
        <i class="zmdi zmdi-search"></i>
      </div>

      <?php
        if($_SESSION['auth'] == true){
        echo'
        <a href="#" class="notification js-show-cart">
        <span><i style="font-size:25px;color: #2d2d2d;" class="fas fa-shopping-cart"></i></span>
         <span id="count_cart_output_mobile" class="badge"></span>
        </a>

        <a href="#" class="notification">
        <span><i style="font-size:25px;color: #2d2d2d;" class="fas fa-heart"></i></span>
         <span id="wishlist_count_output_mobile" class="badge"></span>
        </a>
        ';
      }
       ?>
    </div>

    <!-- Button show menu -->
    <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </div>
  </div>


  <!-- Menu Mobile -->
  <div class="menu-mobile">
    <ul class="topbar-mobile" style="height: 40px;">


      <li  style="height: 40px;">
        <div class="right-top-bar flex-w h-full"  style="height: 40px;">


          <?php
            if($_SESSION['auth'] == true){
              echo '
                          <a href="user.php" class="flex-c-m trans-04 p-lr-25">
                          '.$_SESSION["user_name"].'
                          </a>
                          <a href="logout.php" class="flex-c-m trans-04 p-lr-25">
                          Logout
                          </a>
                          <a  href="" class="important_button flex-c-m trans-04 p-lr-25">
                            My Cart
                          </a>';
              }
            else {
            echo '
                        <a href="login.php" class="flex-c-m trans-04 p-lr-25">
                        Login
                        </a>
                        <a href="register.php" class="important_button flex-c-m trans-04 p-lr-25">
                        Signup
                        </a>';
            }

           ?>


        </div>
      </li>
    </ul>

    <ul class="main-menu-m">
      <li>
        <a href="index.php">Home</a>
      </li>
      <li>
        <a href="shop.php">Shop</a>
      </li>
      <li>
        <a href="contact.php">Contact</a>
      </li>

    </ul>
  </div>

  <!-- Modal Search -->
  <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
    <div class="container-search-header">
      <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
        <img src="images/icons/icon-close2.png" alt="CLOSE">
      </button>

      <form class="wrap-search-header flex-w p-l-15">
        <button class="flex-c-m trans-04">
          <i class="zmdi zmdi-search"></i>
        </button>
        <input class="plh3" type="text" name="search" placeholder="Search...">
      </form>
    </div>
  </div>
  <nav id="ddmenu">
      <ul>

        <?php
                        $menu=0;
                        $sql = "SELECT * FROM product_type ";
                        $result = mysqli_query($db, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row_outer = mysqli_fetch_assoc($result)) {
                                    echo '

                                      <li onmouseover="show(\'menu_'.$menu.'\')" onmouseout="hide(\'menu_'.$menu.'\')" id="menu_'.$menu.'" class="full-width" >
                                        <span class="top-heading">'.$row_outer["p_type_name"].'</span>
                                        <i class="caret"></i>
                                        <div class="dropdown offset300">
                                            <div class="dd-inner">';

                                            $sql_inner = 'SELECT * FROM category WHERE p_type_id='.$row_outer["p_type_id"].'';
                                            $result_inner = mysqli_query($db, $sql_inner);

                                                if (mysqli_num_rows($result_inner) > 0) {
                                                    // output data of each row
                                                    while($row_inner = mysqli_fetch_assoc($result_inner)) {
                                                        echo    '
                                                        <ul class="column">
                                                                <li><a href="shop.php?category='.$row_inner["c_id"].'"> <h3>'.$row_inner["c_name"].'</h3> </a> </li>
                                                                ';
                                                                $sql_inner_most = 'SELECT * FROM sub_category WHERE cat_id='.$row_inner["c_id"].' ';
                                                                $result_inner_most = mysqli_query($db, $sql_inner_most);

                                                                    if (mysqli_num_rows($result_inner_most) > 0) {
                                                                        // output data of each row
                                                                        while($row_inner_most = mysqli_fetch_assoc($result_inner_most)) {
                                                                          echo '<li><a href="shop.php?category='.$row_inner["c_id"].'&subcat='.$row_inner_most["sub_cat_name"].'">'.$row_inner_most["sub_cat_name"].'</a></li>';
                                                                        }
                                                                      }
                                                                  echo    '
                                                            </ul>
                                                        ';
                                                      }
                                                    }

                                            echo'
                                            </div>
                                        </div>
                                    </li>

                                    ';
                                    $menu++;
                                  }
                                }

          ?>


      </ul>
  </nav>
</header>
<script type="text/javascript">
 function show(add_to) {
   var element = document.getElementById(add_to);
   element.classList.add("over");
 }
 function hide(add_to) {
   var element = document.getElementById(add_to);
   element.classList.remove("over");
 }
</script>
<script type="text/javascript">
    var item =  document.getElementById('topbar');
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll > 0){
              $("#topbar").addClass("scrolled");
              document.getElementById('topbar_icon').style.opacity="1";
            }else{
              $("#topbar").removeClass("scrolled");
              document.getElementById('topbar_icon').style.opacity="0";
            }
        });

    </script>
