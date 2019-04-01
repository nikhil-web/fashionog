<?php
include('session.php');
$p_id = mysqli_real_escape_string($db,$_POST['p_id']);
$current_timestamp = time();
$target_dir = "../img/prod-img/";
$type=explode(".",$_FILES["fileToUpload"]["name"]);
$target_file = $target_dir.$current_timestamp.'_upload.'.end($type);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));




// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}


// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
  //  echo("<script>location.href = 'profile.php';</script>");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    alert("Sorry, your file was not uploaded.");
    // echo("<script>location.href = 'profile.php';</script>");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $file_name= $target_file;

           $sql = "INSERT INTO products_img (p_id,p_image) VALUES ('$p_id','$file_name')";
           mysqli_query($db, $sql);
           navigate("products.php");

    } else {
         alert("Sorry, there was an error uploading your file.");
         navigate("products.php");

    }
}

?>
