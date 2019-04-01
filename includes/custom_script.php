<?php
if($_SESSION['auth'] == true){
 include 'includes/custom_script_login.php';
}else {
include 'includes/custom_script_logout.php';
}
