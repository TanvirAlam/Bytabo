<?php
include "header.php";
include "headerTop.php";
include "functions.php"; //get data
$UID = $_SESSION['UID'];
$postno = $_SESSION['postno'];
$RegisterType = getAdv_type($UID, $postno);
?>

<div id="content" class="clearfix">

<div class="container">
<div class="row">


<div id="main" class="span12">

<h1 class="page-header">Beskriv lägenheten du önskar byta till</h1>

<!-- /.progressbar -->
<div class="progressbarRegDetail">            
    <div class="item span4"></div>           
    <div class="item span4">
        <div class="centerProgressbar">        
            <?php                
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
             <?php } ?>
        </div>        
    </div>   
    <div class="item span4"></div>            
</div>
<form id="formWant" method="post" action="processWant.php" class="submission-form form-vertical">    

<div class="row">
<div class="span4">
    <input type="hidden" name="RegisterType" value="<?php echo $RegisterType ?>">

    <div class="control-group" id="address-group">
        <label class="control-label">Address:</label>
        <select id="address" name="address" data-placeholder="Välj flera plats" style="width:300px;" class="chosen-select" multiple tabindex="6">
          <option value=""></option>
          <?php 
            getLocation(); //Get data for location
          ?>
        </select> 
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
            <select id="landlord" name="landlord" data-placeholder="Välj Hyresvärd" style="width:300px;" class="chosen-select" multiple tabindex="6">
                <option value=""></option>
                <?php
                getLandlord();
                ?>
            </select>

        </div>
    </div>
</div>

<div class="span4">
    <div class="control-group">
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
        <input name="RentRange" type="text" id="HouseRent" readonly style="color:#ffffff; font-size: 14px; font-weight:bold; background-color:#003264; width:280px; height:25px; text-align:left;">                   
        <div class="controls">           
                <div id="slider-HouseRent"></div>           
        </div>
    </div>
    <div class="control-group">
        <input name="StairRange" type="text" id="StairRange" readonly style="color:#ffffff; font-size: 14px; font-weight:bold; background-color:#003264; width:280px; height:25px; text-align:left;">                   
        <div class="controls">           
                <div id="slider-StairRange"></div>           
        </div>
    </div>
    <div class="control-group">            
        <input name="NoBathRoomsRange" type="text" id="NoBathRoomsRange" readonly style="color:#ffffff; font-weight:bold; background-color:#003264; width:280px; height:25px; text-align:left;">          
        <div class="controls">           
                <div id="slider-NoBathRoomsRange"></div>           
        </div>
    </div>

    <div class="control-group">            
        <input name="NoRoomsRange" type="text" id="NoRoomsRange" readonly style="color:#ffffff; font-weight:bold; background-color:#003264; width:280px; height:25px; text-align:left;">          
        <div class="controls">           
                <div id="slider-NoRoomsRange"></div>           
        </div>
    </div>

    <div class="control-group">
        <input name="AreaRange" type="text" id="Area" readonly style="color:#ffffff; font-size: 14px; font-weight:bold; background-color:#003264; width:280px; height:25px; text-align:left;">                   
        <div class="controls">           
                <div id="slider-Area"></div>           
        </div>
    </div>  
<div class="form-actions">
    <input type="submit" class="btn btn-primary btn-large" value="Nästa steg">
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

<?php
include "footer.php";
?>
