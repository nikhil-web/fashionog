<?php
    /*place database credintials here*/
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'pokemonf_dev1');
    define('DB_PASSWORD', 'nikhilpandey2075');
    define('DB_DATABASE', 'pokemonf_fashionog');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    // Check connection
   if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  else{
		//connection sucessfull
  }
   function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
			}
       function navigate($url) {
        echo "<script>location.href = '$url';</script>";
 }
