<?php
include 'session.php';

$firstname = mysqli_real_escape_string($db,$_POST['firstname']);
$lastname = mysqli_real_escape_string($db,$_POST['lastname']);
$email = mysqli_real_escape_string($db,$_POST['email']);
$phonenumber = mysqli_real_escape_string($db,$_POST['phonenumber']);
$address = mysqli_real_escape_string($db,$_POST['address']);
$city = mysqli_real_escape_string($db,$_POST['city']);
$stste = mysqli_real_escape_string($db,$_POST['stste']);
$zip = mysqli_real_escape_string($db,$_POST['zip']);
$password = mysqli_real_escape_string($db,$_POST['password']);
$dateregistered = mysqli_real_escape_string($db,$_POST['dateregistered']);
$activate = mysqli_real_escape_string($db,$_POST['activate']);
$terms = mysqli_real_escape_string($db,$_POST['terms']);
$submit_reg = mysqli_real_escape_string($db,$_POST['submit_reg']);

$user_name=$firstname." ".$lastname;

$sql="INSERT INTO users (user_id, user_name, user_email, user_pass, phonenumber, address, city, stste, zip, dateregistered, activate, terms, submit_reg) VALUES (NULL,'$user_name','$email','$password','$phonenumber','$address','$city','$stste','$zip','$dateregistered','$activate','$terms','$submit_reg')";

$result=mysqli_query($db,$sql);
if(!$result){
      $error = mysqli_real_escape_string($db,mysqli_error($db));

    if($error=="Duplicate entry \'".$email."\' for key \'user_email\'")
    {
      $output = 0;
      echo json_encode($output);
    }
   }else{
     $output = 1;
     echo json_encode($output);
   }
?>