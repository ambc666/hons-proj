<!DOCTYPE html>
<html lang="en">

<head>
   
    <!-- SITE TITTLE -->
    <title>Error - Form Upload</title>
    <?php include("head.php"); ?>

</head>

<body>

<?php include ("nav.php"); ?>

    <!--========================================
=            PHP code           =
=========================================-->
<div class="container-fluid">
        <div class="row section1">

            <div class="col-12 text-center">

<?php
    //Include connection to DB
    require 'connect.php';

// File upload path
$targetDir = "img/uploads/";

$file_name = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $file_name;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif');

    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT into form1 (filename, uploaded_on) VALUES ('".$file_name."', NOW())");
            if($insert){
                header("Location: /form.php");
                $statusMsg = "The file ".$file_name. " has been uploaded successfully." . "<br><br>" . "Please wait 3 seconds or click the button above to go back to see your image in the gallery if it does not automatically re-direct." ?> <button onclick="goBack()" class="btn btn-success error-btn">Back to Form</button> <br> <?php header('Refresh: 3; /hons/form.php');;
            }else{
                $statusMsg = "File upload failed, please try again." ?> <button onclick="goBack()" class="btn btn-danger error-btn">Back to Previous Page</button> <br> <?php ;
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file." ?> <button onclick="goBack()" class="btn btn-danger error-btn">Back to Previous Page</button> <br> <?php ;
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.' ?> <button onclick="goBack()" class="btn btn-danger error-btn">Back to Previous Page</button> <br> <?php ;
    }
}else{
    $statusMsg = 'Please select a file to upload.' ?> <button onclick="goBack()" class="btn btn-danger error-btn">Back to Previous Page</button> <br> <?php ;
}

// Display status message
echo $statusMsg;
?>

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