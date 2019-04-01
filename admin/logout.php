<?php
include('session.php');
if($_SESSION['auth'] == true){
session_unset();
// destroy the session
if(session_destroy()){
   mysqli_close($db);
   header("location:index.php");
}
}else{
    header("location:index.php");
}
?>
