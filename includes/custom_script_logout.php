<script>
//////////////////////////////////////////////LOGOUT SCRIPT/////////////////////////////////////////////////////////////////////////


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
//////////////////////////////////////////////LOGOUT SCRIPT/////////////////////////////////////////////////////////////////////////
</script>
