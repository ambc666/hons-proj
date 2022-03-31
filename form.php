<!DOCTYPE html>
<html lang="en">

<head>
   
    <!-- SITE TITTLE -->
    <title>Form 1 - File Upload</title>
    <?php include("head.php"); ?>

</head>

<body>

    <!--========================================
=            Nav           =
=========================================-->
<?php include ('nav.php'); ?>


    <!--========================================
=            Form 1           =
=========================================-->
   
    <div class="container-fluid">
        <div class="row section1">

            <div class="col-12 text-center">
                <h2>File Upload Form 1</h2>
                <p>Please upload an image below to add it into the image gallery.</p>
                <p>Please complete the <a class="test-link" target="_blank" href="https://b00132629.typeform.com/to/RbldvhcT">form</a> after uploading an image.</p>


            </div>
        </div>

        <div class="row section1">
            <div class="col-sm-12 col-md-8 mx-auto text-center">

                <form class="uploadForm" action="fileupload.php" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                    <input class="btn btn-outline-info" type="file" id="img" name="file" draggable="false" required>
                    <input class="btn btn-success" type="submit" name="submit" value="Upload">
                    <p>Please Note. Only .jpg, .jpeg, .gif and .png formats are allowed with a max size of 6MB.</p>
                </form>
            </div>
        </div>

    </div>

    <!--========================================
=            Display Gallery           =
=========================================-->

<div class="container-fluid">
        <div class="row section1">
            <div id="gallery" class="col-md-12 col-lg-8 mx-auto text-center">
                <?php
                require 'connect.php'; //DB Connection
                
                $query = $conn->query("SELECT * FROM form1 ORDER BY id DESC"); //Get files from DB
                
                if($query->num_rows > 0){
                    while ($row = $query->fetch_assoc()){
                        $filePath = 'img/uploads/'.$row["filename"];
                        $fileMime = mime_content_type($filePath);
                ?>

                <embed class="img-fluid img-thumbnail rounded" src="<?php echo $filePath; ?>" type="<?php echo $fileMime; ?>" width="200px">

                <?php
                    }
                }
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
