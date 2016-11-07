<?php
include "header.php";
include "headerTop.php";
?>
<div id="content" class="clearfix">
    <div class="container">
        <div class="row">
            <div id="main" class="span12">
            <div class="clearfix">               
                    
            <div class="demo-container">
                    <ul class="nav nav-tabs" id="tabs">
                        <li><a href="#myProfile"><i class="fa fa-user"></i> Min Profil (0)</a></li>
                        <li class="#myAdd active"><a href="#myAcc"><i class="fa fa-archive"></i> Min Annons (0)</a></li>
                        <li><a href="#myMassage"><i class="fa fa-envelope-o"></i> Meddelanden (0)</a></li>
                        <li><a href="#myVisitors"><i class="fa fa-eye"></i> Mina Annonsbesökare (0)</a></li>
                        <li><a href="#myPayment"><i class="fa fa-credit-card"></i> Betalningshistorik (0)</a></li>
                        <li><a href="#myMatch"><i class="fa fa-magic"></i> Min Annons Match (0)</a></li>                        
                            </ul>
                    
                            <div class="tab-content">
                                    <div class="tab-pane" id="myProfile">
                                        <h1>Tab 1</h1>
                                    </div>
                                    <div class="tab-pane active" id="myAcc">
                                        <h5><i class="fa fa-tasks"></i> Mitt Konto</h5>                            
                                        <div class="containerMyAcc">                                           
                                            <table class="responsive">                                            
                                                    <tr>
                                                            <th><i class="fa fa-map-marker"></i> Address (Postal)</th>
                                                            <th><i class="fa fa-picture-o"></i> Image</th>
                                                            <th><i class="fa fa-star"></i> Status</th>
                                                            <th><i class="fa fa-tags"></i> Bytestyp</th>
                                                            <th><i class="fa fa-magic"></i> Match</th>
                                                            <th><i class="fa fa-refresh"></i> Åtgärder</th>
                                                    </tr>
                                                    <?php
                                                        //include "functions.php";
                                                        $UID = $_SESSION['UID'];
                                                        require_once "DBClass.php";
                                                        $getMyAccData = new DBClass();
                                                        $myAccData = $getMyAccData->select("SELECT DISTINCT HID, adv_type, address, postno, description, LID, BID, AID, rent, stair, bathroom, room, area
                                                      FROM tbl_cus_apt_have WHERE UID=".$UID."");
                                                        //$myAccData = getMyAccData();
                                                    
                                                       foreach($myAccData as $row_data) {
                                                            $HID = $row_data["HID"];                   
                                                            $adv_type = $row_data["adv_type"];
                                                            $address = $row_data["address"];
                                                            $postno = $row_data["postno"];
                                                            $description = $row_data["description"];
                                                            $LID = $row_data["LID"];
                                                            $BID = $row_data["BID"];
                                                            $AID = $row_data["AID"];
                                                            $rent = $row_data["rent"];
                                                            $stair = $row_data["stair"];
                                                            $bathroom = $row_data["bathroom"];
                                                            $room = $row_data["room"];
                                                            $area = $row_data["area"];
                                                        ?>
                                                    <tr>
                                                            <td><?php echo $address."</BR>(".$postno.")-| ".$description." |"?></td>
                                                            <td>
                                                              <ul class="bxslider">
                                                                <?php                                                    
                                                                    $rowsProdDetImgTmb = $getMyAccData -> select("SELECT `name` FROM `tbl_cus_imgfiles` WHERE HID=".$HID." and UID=".$UID."");
                                                                    foreach($rowsProdDetImgTmb as $rPDIT){
                                                                        $imgName = $rPDIT[name];                    
                                                                        $imgTumb = "ImageUpload/upload/".$UID."/".$HID."/thumbnails/".$imgName;
                                                                ?>
                                                                <li><img src="<?php echo $imgTumb ?>"/></li>
                                                                <?php } ?>
                                                              </ul>
                                                            </td>
                                                            <td>Aktiv för <i class="fa fa-calendar"></i> 2 veckor</td>
                                                            <td>
                                                                <div class='InforIcon'><i class='icon icon-normal-bed'></i> <?php echo $room ?></div>
                                                                <hr>
                                                                <div class='InforIcon'><i class='icon icon-normal-shower'></i> <?php echo $bathroom ?></div>
                                                                <hr>
                                                                <div class='InforIcon'><i class='icon icon-normal-up-down-arrow'></i> <?php echo $room ?></div>
                                                                <hr>
                                                                <div class='InforIcon'><i class='icon icon-normal-cursor-scale-up'></i> <?php echo $area ?> m<sup>2</sup></div>
                                                                <hr>
                                                                <div class='InforIcon'><i class="icon icon-normal-currency-euro"></i> <?php echo $rent ?> <sup>kr</sup></div>
                                                            </td>
                                                            <td><i class="fa fa-user"></i> 5 är intresserade</td>
                                                            <td>
                                                                    <div class='InforIcon'><a href="#"><i class="fa fa-pencil"></i> Edit</a></div>
                                                                    <hr>
                                                                    <div class='InforIcon'><a href="#"><i class="fa fa-trash-o"></i> Remove</a></div>
                                                                    <hr>
                                                                    <div class='InforIcon'><a href="#"><i class="fa fa-eye"></i> View</a></div>
                                                              </td>
                                                    </tr>
                                                            <?php
                                                            $myAccDataWant = $getMyAccData->select("SELECT DISTINCT `WID`, `description`, `AID`, `min_rent`, `max_rent`, `min_stair`, `max_stair`,
                                                                                                   `min_bathroom`, `max_bathroom`, `min_room`, `max_room`, `min_area`, `max_area`
                                                              FROM tbl_cus_apt_have WHERE HID=".$HID." and UID=".$UID."");
                                                            
                                                               foreach($myAccDataWant as $row_dataWant) {
                                                                    $WID = $row_dataWant["WID"];                   
                                                                    $descriptionWant = $row_dataWant["description"];
                                                                    $min_rent = $row_dataWant["min_rent"];
                                                                    $max_rent = $row_dataWant["max_rent"];
                                                                    $min_stair = $row_dataWant["min_stair"];
                                                                    $max_stair = $row_dataWant["max_stair"];
                                                                    $min_bathroom = $row_dataWant["min_bathroom"];
                                                                    $max_bathroom = $row_dataWant["max_bathroom"];
                                                                    $min_room = $row_dataWant["min_room"];
                                                                    $max_room = $row_dataWant["max_room"];
                                                                    $min_area = $row_dataWant["min_area"];
                                                                    $max_area = $row_dataWant["max_area"];                                                           
                                                                    
                                                            ?>
                                                            <tr>
                                                                    <td>row 1, cell 1</td>
                                                                    <td>
                                                                    <img src="server/php/files/no_img.jpg"/>
                                                                    </td>
                                                                    <td>Aktiv för <i class="fa fa-calendar"></i> 2 veckor</td>
                                                                    <td>
                                                                        <div class='InforIcon'><i class='icon icon-normal-bed'></i> [ <?php echo $min_room ?> : <?php echo $max_room ?> ]</div>
                                                                        <hr>
                                                                        <div class='InforIcon'><i class='icon icon-normal-shower'></i> [ <?php echo $min_bathroom ?> : <?php echo $max_bathroom ?> ]</div>
                                                                        <hr>
                                                                        <div class='InforIcon'><i class='icon icon-normal-up-down-arrow'></i> [ <?php echo $min_stair ?> : <?php echo $max_stair ?> ]</div>
                                                                        <hr>
                                                                        <div class='InforIcon'><i class='icon icon-normal-cursor-scale-up'></i> [ <?php echo $min_area ?> : <?php echo $max_area ?> ] m<sup>2</sup></div>
                                                                        <hr>
                                                                        <div class='InforIcon'><i class="icon icon-normal-currency-euro"></i> [ <?php echo $min_rent ?> : <?php echo $max_rent ?> ] <sup>kr</sup></div>
                                                                    </td>
                                                                    <td><i class="fa fa-building-o"></i> 2 fann</td>
                                                                    <td>
                                                                        <div class='InforIcon'><a href="#"><i class="fa fa-pencil"></i> Edit</a></div>
                                                                        <hr>
                                                                        <div class='InforIcon'><a href="#"><i class="fa fa-trash-o"></i> Remove</a></div>
                                                                        <hr>
                                                                        <div class='InforIcon'><a href="#"><i class="fa fa-eye"></i> View</a></div>
                                                                      </td>
                                                            </tr>
                                                            <?php } ?>
                                                    <?php } ?>    
                                            </table>
                                
                                        </div>
                                    </div>                                    
                            </div>
                    </div>

                  
            </div>
            <!-- /.clearfix     
                            <script type="text/javascript">
                    $.mockjax({
                        url: '/some/api',
                        dataType: 'html',
                        response: function() {
                            this.responseText = window.generateRows(5,0,true);
                        }
                    });
            
                    $(function () {
            
                                    $('table').footable();
            
                        $('.clear-filter').click(function (e) {
                            e.preventDefault();
                            $('table.demo').trigger('footable_clear_filter');
                                            $('.filter-status').val('');
                        });
            
                        $('.filter-status').change(function (e) {
                            e.preventDefault();
                                            var filter = $(this).val();
                            $('#filter').val('');
                            $('table.demo').trigger('footable_filter', {filter: filter});
                        });
            
                        $('.get_data').click(function() {
                            $.ajax({
                                url : '/some/api',
                                success : function(data) {
                                    $('table tbody').append(data);
                                    $('table').trigger('footable_redraw');
                                }
                            });
                        });
            
                    });
                </script>
            -->
            
            </div>
            <!-- /#main -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /#content -->

<?php
include "footer.php";
?>