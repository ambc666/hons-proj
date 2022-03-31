<!DOCTYPE html>
<html lang="en">

<head>
    <!--========================================
=            Head           =
=========================================-->
    <title>Form 2 - Drag n Drop</title>
    <?php include('head.php'); ?>

</head>

<body>

    <!--========================================
=            Nav           =
=========================================-->
    <?php include ('nav.php'); ?>

    <!--========================================
=            Form 2           =
=========================================-->


    <div class="container-fluid">
        <div class="row section1">
            <div class="col-12 text-center">
                <h2>File Upload Form 2</h2>
                <p>Please drag and drop an image into the box below to add it into the image gallery.</p>
                <p>Please complete the <a class="test-link" target="_blank" href="https://b00132629.typeform.com/to/kUbFzEdM">form</a> after uploading an image.</p>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row section">
            <div class="col-md-12 col-lg-8 mx-auto text-center" id="uploadForm">

                <form action="fileupload2.php" id="dragndropform" class="dropzone">
                    <div class="dz-default dz-message" data-dz-message=""><span>Drop image file here to upload. <br>The page should automatically refresh itself after a successful upload.</span></div>
                    <div class="dropzone-previews"></div> <!-- this is were the previews should be shown. -->
                    <button class="btn btn-success" type="submit">Upload</button>
                </form>
                <p>Please Note. Only .jpg, .jpeg, .gif and .png formats are allowed with a max size of 6MB.</p>
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
                
                $query = $conn->query("SELECT * FROM form2 ORDER BY id DESC"); //Get files from DB
                
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

    <!--========================================
=            Footer           =
=========================================-->

    <?php include("footer.php"); ?>


    <!-- JS imports-->

    <?php include("js.php"); ?>

</body>

</html>
