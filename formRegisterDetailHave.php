<?php
include "header.php";
include "headerTop.php";
include "functions.php";
?>

<div id="content" class="clearfix">
  <div class="container">
    <div class="row">
      <div id="main" class="span12">
        <h1 class="page-header">Beskriv lägenheten du önskar byta bort</h1>
        <!-- /.progressbar -->
        <div class="progressbarRegDetail">
            <div class="item span4"></div>           
            <div class="item span4">
                <div class="centerProgressbar">        
                    <?php 
                        $RegisterType = $_REQUEST["RegisterType"];
                        if($RegisterType === '1'){                
                    ?>
                        <div class="number active"><img src="assets/img/11.png" alt="Home"></div>
                        <strong>En bostad mot en</strong>
                    <?php }elseif($RegisterType ==='2'){ ?>
                        <div class="number active"><img src="assets/img/12.png" alt="Home"></div>
                        <strong>En bostad mot två</strong>
                     <?php }elseif($RegisterType === '3'){ ?>
                        <div class="number active"><img src="assets/img/21.png" alt="Home"></div>
                        <strong>Två bostäder mot en</strong>
                      <?php }elseif($RegisterType === '4'){ ?>
                        <div class="number active"><img src="assets/img/House-Rent.png" alt="Hyra"></div>
                        <strong>Hyra</strong>
                      <?php }elseif($RegisterType === '5'){ ?>
                        <div class="number active"><img src="assets/img/House-Sale.png" alt="Home"></div>
                        <strong>Försäljning</strong>
                      <?php }elseif($RegisterType === '6'){ ?>
                        <div class="number active"><img src="assets/img/Internet_bags.png" alt="Home"></div>
                        <strong>Sommar</strong>
                     <?php } ?>
                </div>        
            </div>   
            <div class="item span4"></div>         
        </div>
<form id="formHave" method="post" action="processHave.php" class="submission-form form-vertical">

<div class="row">
<div class="span4">
    <input type="hidden" name="RegisterType" value="<?php echo $RegisterType ?>">
    <div class="control-group" id="address-group">
        <label class="control-label" for="address">
            Address
        </label>

        <div class="controls">
            <input type="text" name="address" size="30" value="" id="geocomplete" autocomplete="off">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="address">
            Postnr
        </label>

        <div class="controls">
            <input type="text" name="postal_code" size="30" value="" autocomplete="off" readonly />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            GPS </label>

        <div class="controls">
            <input class="latitude" type="text" name="lat" value="" placeholder="Latitude" readonly />

            <input class="longitude" type="text" name="lng" value="" placeholder="Longitude" readonly />
        </div>
    </div>
    <div class="control-group" id="description-group">
        <label class="control-label" for="description">
            Description
        </label>

        <div class="controls">
            <textarea name="description" id="description" rows="5"></textarea>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            Hyresvärd
        </label>

        <div class="controls">
              <select name='cmblandlord' id='cmblandlord' class='postform' style="width:250px;">
              <option value=''>Välj hyresvärd!</option>
                <?php
                getLandlord();
                ?>
            </select>

        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            Bredband
        </label>

        <div class="controls">
            <select name='cmbBredband' id='cmbBredband' class='postform' style="width:250px;">
              <option value=''>Välj Bredband!</option>
                <?php
                getBroadBandCompany();
                ?>
            </select>

        </div>
    </div>
    
</div>

<div class="span4">
    <div class="control-group" id="amenities-group">
        <div class="controls">
            <ul class="unstyled">
                <?php
                getDetails();
                ?>
            </ul>
        </div>
    </div>
</div>
<div class="span4">
    <div class="control-group" id="cmbProtertyType-group">
        <label class="control-label">
            Bostadstyp
        </label>

        <div class="controls">
            <select name='cmbProtertyType' id='cmbProtertyType' class='postform' style="width:250px;">
              <option value=''>Välj Bostadstyp!</option>
                <?php 
                getHouseType(); //Get data for House Type
                ?>
            </select>
            
          <div class="imagePreview" style="background-color: #CC0000; width:38px; height: 38px; margin: -32px 0px 0px 270px; border-radius: 20px;">
        </div>
        </div>
        
    </div>
    <div class="control-group">
        <input name="HouseRentHave" type="text" id="HouseRentHave" readonly style="color:#ffffff; font-size: 14px; font-weight:bold; background-color:#003264; width:150px; height:25px; text-align:left;">                   
        <div class="controls">           
                <div id="slider-HouseRentHave"></div>           
        </div>
    </div>
    <div class="control-group">
        <input name="Stair" type="text" id="Stair" readonly style="color:#ffffff; font-size: 14px; font-weight:bold; background-color:#003264; width:150px; height:25px; text-align:left;">                   
        <div class="controls">           
                <div id="slider-Stair"></div>           
        </div>
    </div>
    <div class="control-group">            
        <input name="NoBathRooms" type="text" id="NoBathRooms" readonly style="color:#ffffff; font-weight:bold; background-color:#003264; width:150px; height:25px; text-align:left;">          
        <div class="controls">           
                <div id="slider-NoBathRooms"></div>           
        </div>
    </div>

    <div class="control-group">            
        <input name="NoRooms" type="text" id="NoRooms" readonly style="color:#ffffff; font-weight:bold; background-color:#003264; width:150px; height:25px; text-align:left;">          
        <div class="controls">           
                <div id="slider-NoRooms"></div>           
        </div>
    </div>

    <div class="control-group">
        <input name="AreaHave" type="text" id="AreaHave" readonly style="color:#ffffff; font-size: 14px; font-weight:bold; background-color:#003264; width:150px; height:25px; text-align:left;">                   
        <div class="controls">           
                <div id="slider-AreaHave"></div>           
        </div>
    </div>  
<div class="form-actions">
    <input type="submit" class="btn btn-primary" value="Nästa steg">
</div>
</div>
</div>


</form>

</div>
<!-- /#main -->
</div>
<!-- /.row -->
</div>
<!-- /.container -->

</div>
<div id="dialog" style="display:none;" title="Dialog Title">
    <iframe frameborder="0" scrolling="yes" width="800" height="500" src="ImageUpload.php"></iframe>
    </div>
<?php
include "footer.php";
?>
