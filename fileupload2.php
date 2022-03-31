<?php

if(!empty($_FILES)){
    
    //Include connection to DB
    require 'connect.php';
    
    //Filepath Config
    $upload_dir = "img/uploads/";
    
    $file_name = basename($_FILES['file']['name']); 
    
    $upload_file_path = $upload_dir.$file_name;
    
    //These rules only apply when uploading the data to the database, front-end validation should catch everything, this is purely pre-caution incase the front-end validation is bypassed.
    
    //Rule - Verify File Extension
    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
    $ext = pathinfo ($file_name, PATHINFO_EXTENSION);
    if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format. Only .jpg, .jpeg, .gif and .png formats are allowed"); 

    //Rule - Verify File Size - 6MB Maximum.
    $filesize = $_FILES["file"]["size"];
    $maxsize = 6 * 1024 * 1024;
    if($filesize > $maxsize) die("Error: File size exceeds the 6MB limit. Please upload a smaller file size."); 
    
    //File Upload
    if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_file_path)){
        //Insert File into the Database
        $insert = $conn->query("INSERT into form2 (filename, uploaded_on) VALUES ('".$file_name."', NOW())");
    }
    

    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   
    <!-- SITE TITTLE -->
    <title>Error - Form Upload</title>
    <?php include("head.php"); ?>

</head>

<body>

<?php include ("nav.php"); ?>


<div class="container-fluid">
        <div class="row section1">

            <div class="col-12 text-center">
            <h2>Error </h2><button onclick="goBack()" class="btn btn-danger error-btn">Back to Previous Page</button>  

            </div>
</div>
</div>
    <!--==============================
=            Footer            =
===============================-->

<?php include("footer.php"); ?>


<!-- JS imports-->

<?php include("js.php"); ?>

</body>

</html>