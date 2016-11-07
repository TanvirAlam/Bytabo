<?php
include "header.php";
include "productDetailsClass.php"; 
$HID = $_REQUEST["HID"];
$dbPD = new DbPD(); //Connect to db product Details Class
$rowsProductDetails = $dbPD -> select("SELECT adv_type, UID, AID,`address`, postno, rent, stair, bathroom, room, area, description, lat, lng FROM `tbl_cus_apt_have` WHERE HID=".$HID."");
foreach($rowsProductDetails as $rPD){
    $lat = $rPD["lat"];
    $lng = $rPD["lng"];
    $coordinate = "[".$lat.",".$lng."]";
    $coordinateF = $lat.",".$lng; 
?>
<div class="span9 single-property">
<h1 class="page-header fl"><?php echo $rPD[address]; ?></h1><span><?php echo $rPD[postno]; ?></span>
<div class="property-detail">
<div class="row">
    <div class="span6 gallery">
        
        <div class="preview">
            <?php
            //Connect to db product Details Image Table One initial Big Image
            $rowsProdDetImgTmbBig = $dbPD -> select("SELECT `name` FROM `tbl_cus_imgfiles` WHERE HID=".$HID." and UID=".$rPD[UID]."");
            foreach($rowsProdDetImgTmbBig as $rPDIB){
                 $imgBig = "ImageUpload/upload/".$rPD[UID]."/".$HID."/".$rPDIB[name];
            }
            $imgAID = "assets/img/HouseType/".$rPD[AID].".png";
            ?>
            <img src="<?php echo $imgBig ?>" alt="">
        </div>
        
        <div class="content">
            <ul>                
                <?php
                //Connect to db product Details Image Table Thumb
                $rowsProdDetImgTmb = $dbPD -> select("SELECT `name` FROM `tbl_cus_imgfiles` WHERE HID=".$HID." and UID=".$rPD[UID]."");
                foreach($rowsProdDetImgTmb as $rPDIT){
                    $imgName = $rPDIT[name];                    
                    $imgBig = "ImageUpload/upload/".$rPD[UID]."/".$HID."/".$imgName;
                    $imgTumb = "ImageUpload/upload/".$rPD[UID]."/".$HID."/thumbnails/".$imgName;
                ?>
                <li class="active">
                    <div class="thumb">
                        <a href="#"><img src="<?php echo $imgBig ?>" alt="<?php echo $imgBig ?>"></a>
                    </div>
                </li>
                <?php } ?>                
            </ul>
        </div>
        <!-- /.content -->
    </div>

    <div class="overview">
        <div class="pull-right overview">
            <div class="row">
                <div class="span3">
                    <!-- <h2>Overview</h2> -->
                    <table>
                        <tbody>
                        <tr>
                            <th>Hyra:</th>
                            <td class="price">
                                <?php echo $rPD[rent]; ?> kr.
                            </td>
                        </tr>

                        <tr>
                            <th>ID:</th>
                            <td><strong>#<?php echo $HID; ?></strong></td>
                        </tr>

                        <tr>
                            <th>Bytestyp:</th>
                            <td>
                            <strong>
                                <img
                                <?php
                                if($rPD["adv_type"] == 1){                                
                                ?>
                                src="assets/img/11.png"
                                <?php }elseif($rPD["adv_type"] ==='2'){ ?>
                                src="assets/img/12.png"
                                <?php }elseif($rPD["adv_type"] ==='3'){ ?>
                                src="assets/img/21.png"
                                <?php } ?>
                                alt="En bostad mot en" width="50px">
                            </strong>
                            </td>
                        </tr>

                        <tr>
                            <th>Bostadstyp:</th>
                            <td><strong>
                                <div class="imagePreviewOne" style="background-color: #CC0000; width:38px; height: 38px; margin: 0px 0px 0px 190px; border-radius: 20px;">
                                    <img src="<?php echo $imgAID ?>".png" alt="En bostad mot en">                                    
                                        
                                </div>
                            </td></strong>
                        </tr>
                    
                        <tr>
                            <th>Antal Rum:</th>
                            <td><div class='InforIcon'><i class='icon icon-normal-bed'></i> <?php echo $rPD[room]; ?></div></td>
                        </tr>
                        <tr>
                            <th>Antal Badrum:</th>
                            <td><div class='InforIcon'><i class='icon icon-normal-shower'></i> <?php echo $rPD[bathroom]; ?></div></td>
                        </tr>
                        <tr>
                            <th>Våningsplan:</th>
                            <td><div class='InforIcon'><i class='icon icon-normal-up-down-arrow'></i> <?php echo $rPD[stair]; ?></div></td>
                        </tr>
                        <tr>
                            <th>Byta:</th>
                            <td><div class='InforIcon'><i class='icon icon-normal-cursor-scale-up'></i> <?php echo $rPD[area]; ?>m<sup>2</sup></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.span2 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.overview -->
    </div>
</div>

<h2>Om Fastighetsförmedling</h2>

<p><?php echo $rPD[description]; ?></p>


<div class="row">
    <div class="span6">
        <div class="row">
            <div class="span6">
                <h2>Allmänna Bekvämligheter</h2>

                <div class="row">
                    <ul class="span2">
                        <?php                        
                            $dbPD -> getProductDetails($HID,$rPD[UID]);
                        ?>
                    </ul>
                   
                    <!-- /.span2 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.span12 -->
        </div>
        <!-- /.row -->
    </div>

    <div class="span3">
        <h2>Map</h2>

        <div id="property-map"
             style="position: relative; background-color: rgb(229, 227, 223); overflow: hidden; -webkit-transform: translateZ(0);">
        </div>

        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                function LoadMapProperty() {
                    var locations = new Array(
                      <?php echo $coordinate ?>
                    );
                    var types = new Array(
                      'family-house'
                    );
                    var markers = new Array();
                    var plainMarkers = new Array();

                    var mapOptions = {
                        center: new google.maps.LatLng(<?php echo $coordinateF ?>),
                        zoom: 14,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        scrollwheel: false
                    };

                    var map = new google.maps.Map(document.getElementById('property-map'), mapOptions);

                    $.each(locations, function (index, location) {
                        var marker = new google.maps.Marker({
                            position: new google.maps.LatLng(location[0], location[1]),
                            map: map,
                            icon: '../assets/img/marker-transparent.png'
                        });

                        var myOptions = {
                            draggable: true,
                            content: '<div class="marker ' + types[index] + '"><div class="marker-inner"></div></div>',
                            disableAutoPan: true,
                            pixelOffset: new google.maps.Size(-21, -58),
                            position: new google.maps.LatLng(location[0], location[1]),
                            closeBoxURL: "",
                            isHidden: false,
                            // pane: "mapPane",
                            enableEventPropagation: true
                        };
                        marker.marker = new InfoBox(myOptions);
                        marker.marker.isHidden = false;
                        marker.marker.open(map, marker);
                        markers.push(marker);
                    });

                    google.maps.event.addListener(map, 'zoom_changed', function () {
                        $.each(markers, function (index, marker) {
                            marker.infobox.close();
                        });
                    });
                }

                google.maps.event.addDomListener(window, 'load', LoadMapProperty);

                var dragFlag = false;
                var start = 0, end = 0;

                function thisTouchStart(e) {
                    dragFlag = true;
                    start = e.touches[0].pageY;
                }

                function thisTouchEnd() {
                    dragFlag = false;
                }

                function thisTouchMove(e) {
                    if (!dragFlag) return;
                    end = e.touches[0].pageY;
                    window.scrollBy(0, ( start - end ));
                }

                document.getElementById("property-map").addEventListener("touchstart", thisTouchStart, true);
                document.getElementById("property-map").addEventListener("touchend", thisTouchEnd, true);
                document.getElementById("property-map").addEventListener("touchmove", thisTouchMove, true);
            });

        </script>
    </div>

</div>
</div>

</div>
<!-- /#main -->

</div>
<!-- /.row -->
</div>
<?php } ?>