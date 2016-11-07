
<script type="text/javascript">
$(document).ready(function(){
              $("#search").click(function(){
                  var searchLoc = $('#cmbsearchLoc').val();
                  
                  $('.select_loc').text("");
                  if (searchLoc == "") {                    
                    $('.select_loc').text("Välj plats!");
                    $('.select_loc').each(function() {
                        var elem = $(this);
                        setInterval(function() {
                            $(".select_loc").animate({opacity:0},200,"linear",function(){
                                $(this).animate({opacity:1},200);
                              });    
                        }, 500);
                    });
                  }else{
                    $('#frmSearch').submit();
                    
                  }
                });
                
                <?php
                include "dbconnect.php";
                
                $MAPData = DB::query("SELECT DISTINCT HID, UID, AID, description, rent, stair, bathroom, room, area, lat, lng FROM tbl_cus_apt_have");
               
                $coordinate = array();
                $type = array();
                $js_varVal_Banner = array();
                $js_infoBoxes = array();
                
                $i=1;
                foreach($MAPData as $mData){
                   //Get the information
                   $HID = $mData["HID"];
                   $UID = $mData["UID"];
                   $AID = $mData["AID"];
                   $description = $mData["description"];
                   $rent = $mData["rent"];
                   $stair = $mData["stair"];
                   $bathroom = $mData["bathroom"];
                   $room = $mData["room"];
                   $area = $mData["area"];
                   $js_images = array();
                   $qry_getImage = DB::query("SELECT name FROM tbl_cus_imgfiles WHERE UID='$UID' AND HID='$HID'");
                    foreach($qry_getImage as $row_getImage) {
                        $imgName = $row_getImage["name"];
                        if($imgName!=""){
                            $imgBig = "ImageUpload/upload/".$UID."/".$HID."/".$imgName;
                            $imgTumb = "ImageUpload/upload/".$UID."/".$HID."/thumbnails/".$imgName;                            
                        }else{
                            $imgBig = "ImageUpload/upload/no_img.jpg";
                            $imgTumb = "ImageUpload/upload/no_img.jpg";
                        }
                        $js_images[] = "<a class='example-image-link' href='".$imgBig."' data-lightbox='example-set' data-title='Click the right half of the image to move forward.'><img class='example-image' src='".$imgTumb."' alt='' width='50px'/></a>"; 
                    }
                   $js_images = implode('', $js_images);
                   $js_varVal = "var property".$i." = ";
                   $viewMore = "productDetails.php?HID=".$HID;
                   $sendMassage = "sendMassage.php";
                   $js_Banner = '"'."<div class='infobox clearfix'><div class='close'><img src='assets/img/close.png' alt=''></div><div class='Mapimages'><a href='properties/property-detail' >".$js_images."</a></div><div class='info'><div class='title'><a class='fancybox fancybox.iframe' href='".$viewMore."'>".$description."</a></div><div class='property-info clearfix'><div class='area'><i class='icon icon-normal-cursor-scale-up'></i>".$area."m<sup>2</sup></div><div class='bedrooms'><i class='icon icon-normal-bed'></i>".$room."</div><div class='bathrooms'><i class='icon icon-normal-shower'></i>".$bathroom."</div></div><div class='price'>".$rent." kr.</div><div class='link'><a class='fancybox fancybox.iframe' href='".$viewMore."'>Visa mer</a></div><div class='linkMail'><a class='fancybox fancybox.iframe' href='".$sendMassage."'><i class='fa fa-envelope-o'></i> Fråga</a></div></div><div></div></div></div>".'";';
                   $js_varVal_Banner[] = $js_varVal."".$js_Banner;
                   
                   $js_infoBoxes[] = "infoBoxes.push"."("."property".$i.")".";";
                   
                   //Get the coordinates
                   $lat = $mData["lat"];
                   $lng = $mData["lng"];
                   $coordinate[] = "[".$lat.",".$lng."]";             
                   
                   //Get the house type
                   $HouseType = DB::query("SELECT DISTINCT property_name_ico FROM tbl_property WHERE PID='$AID'");
                   foreach($HouseType as $mType){
                        $property_name_ico = $mType["property_name_ico"];
                        $type[] = "'".$property_name_ico."'";
                   }
                   $i++;
                }
                $coordinate = implode(', ', $coordinate);
                $type = implode(', ', $type);
                $js_varVal_Banner = implode('', $js_varVal_Banner);
                $js_infoBoxes = implode('', $js_infoBoxes);
                
                ?>
                var infoBoxes = [];

                <?php echo $js_varVal_Banner; ?>                
                <?php echo $js_infoBoxes; ?>             
                
                var latlan = new Array(<?php echo $coordinate ?>);
                var type = new Array(<?php echo $type ?>);

   
                initializeMap();
                function initializeMap() {
                    var map = $('#map').aviators_map({
                        locations: latlan,
                        types: type,
                        contents: infoBoxes,
                        transparentMarkerImage: 'assets/img/marker-transparent.png',
                        transparentClusterImage: 'assets/img/markers/cluster-transparent.png',
                        zoom: 5,
                        center: {
                            latitude: 59.3293235,
                            longitude: 18.0685808
                        },
                        filterForm: '.map-filtering',
                        enableGeolocation: '',
                        pixelOffsetX: -75,
                        pixelOffsetY: -200
                    });                  
                }
                
});
</script>