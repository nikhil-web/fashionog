<?php

    /*place database credintials here*/

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'campusAmbs');

    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    // Check connection

    if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }else{
    // custom subroutine on connection
  }

  //some custom functions

   function alert($msg){ //javascript allert msg
        echo "<script type='text/javascript'>alert('$msg');</script>";
      }

?>
