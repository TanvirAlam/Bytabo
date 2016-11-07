<?php
header('Content-Type: text/html; charset=utf-8');
include "header.php";
include "headerTop.php";
include "dbconnect.php";
$CurrDate = date("Y-m-d H:i:s"); //Current Timestamp
?>
<div id="content" class="clearfix">
<link rel='stylesheet' id='upload-css' href='assets/css/UploaderStyle.css' type='text/css' media='all'/>
<link rel='stylesheet' id='upload-css' href='assets/css/webuploader.css' type='text/css' media='all'/>
<div class="container">
<h1 class="page-header">Ladda upp dina <i class="fa fa-picture-o"></i> Bilder</h1>
    <div id="wrapper">
        <div id="container">
            <div id="uploader">
                <div class="queueList">
                    <div id="dndArea" class="placeholder">
                        <div id="filePicker"></div>
                        <p>Select images to upload</p>
                    </div>
                </div>
                <div class="statusBar" style="display:none;">
                    <div class="progress">
                        <span class="text">0%</span>
                        <span class="percentage"></span>
                    </div><div class="info"></div>
                    <div class="btns">
                        <div id="filePicker2"></div><div class="uploadBtn">Upload</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript' src='assets/js/webuploader.js'></script>
    <script type='text/javascript' src='assets/js/upload.js'></script>
 
</div>
<![endif]-->
<?php
include "footer.php";
?>
