<script>
//////////////////////////////////////////////lOGIN SCRIPT/////////////////////////////////////////////////////////////////////////

    //UPDATE CART SIDEBAR TOTAL
    cart_count();
    function cart_count() {
        $.ajax({
            type: "POST",
            url: "cart_count.php",
            data: {
                user_id: '<?php echo $_SESSION["user_id"]; ?>'
            },
            dataType: 'JSON',
            success: function(response) {
                document.getElementById("count_cart_output").innerHTML = response;
                document.getElementById("count_cart_output_mobile").innerHTML = response;
                document.getElementById("count_cart_output_checkout_items").value = response;
            }
        });
    }
    //UPDATE CART SIDEBAR
    output_cart_sidebar();
    function output_cart_sidebar() {
        $.ajax({
            type: "POST",
            url: "cart_sidebar_result.php",
            data: {
                user_id: '<?php echo $_SESSION["user_id"]; ?>'
            },
            dataType: 'JSON',
            success: function(response_sidebar) {
                document.getElementById("output_cart_sidebar").innerHTML = response_sidebar;

            }
        });
    }
    //UPDATE SIDEBAR TOTAL.
    update_total();
    function update_total() {
        $.ajax({
            type: "POST",
            url: "cart_sidebar_result_total.php",
            data: {
                cart_id: 'dummy',
            },
            dataType: 'JSON',
            success: function(response_sidebar_total) {
                document.getElementById("output_cart_sidebar_total").innerHTML = response_sidebar_total;
                document.getElementById("count_cart_output_checkout_total").innerHTML = response_sidebar_total;
                document.getElementById("count_cart_output_checkout_total_form").value = response_sidebar_total;
            }
        });
    }

    wishlist_count();
    function wishlist_count() {
        $.ajax({
            type: "POST",
            url: "wishlist_count.php",
            data: {
                wishlist_id: '<?php echo $_SESSION["wishlist_id"]; ?>'
            },
            dataType: 'JSON',
            success: function(response) {
                document.getElementById("wishlist_count_output").innerHTML = response;
                document.getElementById("wishlist_count_output_mobile").innerHTML = response;
            }
        });
    }

/// VERY IMPORTANT .. ADD TO CART LOGIC /////////////////////////////////////////////////////////////////////////////////////
      $(function () {
        $('#mainform').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: 'cart_add.php',
            data: $('form').serialize(),
            success: function (response) {
              swal(response);
              cart_count();
              output_cart_sidebar();
              update_total();
            }
          });
        });
      });


      function add_to_wishlist(item_id) {
          $.ajax({
              type: "POST",
              url: "wishlist_add.php",
              data: {
                  send_p_id : item_id,
              },
              dataType: 'JSON',
              success: function(response) {
                swal(response);
                console.log(response);
                wishlist_count();

              }
          });
      }

      function update_cart(p_id,new_qnty) {
        console.log(p_id);
        product_qnty = document.getElementById(new_qnty).value;
        console.log(product_qnty);

        $.ajax({
            type: "POST",
            url: "update_cart_qunty.php",
            data: {
                send_p_id : p_id,
                send_p_new_qnty :product_qnty
            },
            dataType: 'JSON',
            success: function(response) {
            output_cart_sidebar();
            update_total();
            update_item_subtotal(response,new_qnty);
            }
        });
      }


      function update_item_subtotal(p_id){
        $.ajax({
            type: "POST",
            url: "update_cart_item_subtotal.php",
            data: {
                send_p_id : p_id,
            },
            dataType: 'JSON',
            success: function(response) {
              update = 'item_subtotal_'+p_id;
            document.getElementById(update).innerHTML = response;
            }
        });
      }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//Filter logics///////////////////////////////////////////////////////////////////////////////////////////////////////////////
      // Filter by color call shop_filter_color.php
      function shop_filter_color(parameter) {
          $.ajax({
              type: "POST",
              url: "shop_filter_color.php",
              data: {
                  parameter: parameter,
              },
              dataType: 'JSON',
              success: function(response) {
              document.getElementById("product_output").innerHTML = response;
              console.log(response);

              }
          });
      }

      // Filter by price call shop_filter_price.php
      function shop_filter_price(start_price,end_price) {
          $.ajax({
              type: "POST",
              url: "shop_filter_price.php",
              data: {
                  s_p : start_price,
                  e_p : end_price,
              },
              dataType: 'JSON',
              success: function(response) {
              document.getElementById("product_output").innerHTML = response;
              console.log(response);

              }
          });
      }

      // filter by search calll shop_filter_search.php
      function shop_filter_search() {
         keyword = document.getElementById("custom_search_box").value;
          $.ajax({
              type: "POST",
              url: "shop_filter_search.php",
              data: {
                  parameter : keyword,
              },
              dataType: 'JSON',
              success: function(response) {
              document.getElementById("product_output").innerHTML = response;
              console.log(response);

              }
          });
      }

      function shop_filter_category(c_id) {
          $.ajax({
              type: "POST",
              url: "shop_filter_category.php",
              data: {
                  parameter : c_id,
              },
              dataType: 'JSON',
              success: function(response) {
              document.getElementById("product_output").innerHTML = response;
              console.log(response);

              }
          });
      }

      function reset_all_filter() {
          $.ajax({
              type: "POST",
              url: "reset_all_filter.php",
              data: {
                  parameter : 'dummy',
              },
              dataType: 'JSON',
              success: function(response) {
              document.getElementById("product_output").innerHTML = response;
              console.log(response);

              }
          });
      }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



function delete_itm_frm_cart(item_id){
  document.getElementById(item_id).style.display='none';
  $.ajax({
    type: "POST",
    url: "delete_from_cart.php",
    data: {
        parameter : item_id,
    },
    dataType: 'JSON',
    success: function(response) {
    cart_count();
    output_cart_sidebar();
    update_total();
  }
  });
}

function delete_itm_frm_wishlist(item_id){
  document.getElementById(item_id).style.display='none';
  $.ajax({
    type: "POST",
    url: "delete_from_cart.php",
    data: {
        parameter : item_id,
    },
    dataType: 'JSON',
    success: function(response) {
    cart_count();
    output_cart_sidebar();
    update_total();
  }
  });
}
//////////////////////////////////////////////LOGIN SCRIPT/////////////////////////////////////////////////////////////////////////




</script>
