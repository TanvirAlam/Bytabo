<?php 
include "functions.php"; //get data
?>
<form id="frmSearch" method="post" action="index.php" class="submission-form form-vertical" >
<input type="hidden" name="post_type" value="">
    <label class="control-label"> Sök lägenheter & bostäder</label>
    <div class="control-group">
        <label class="control-label">Location:</label>
        <select name="cmbsearchLoc" id="cmbsearchLoc" data-placeholder="Välj din plats" style="width:180px;" class="chosen-select" tabindex="5">
            <option value=""></option>
              <?php 
              getLocation(); //Get data for location
              ?>
          </select>
    </div>
    <span class="select_loc"></span>
    <div class="control-group"> 
        <label class="control-label">
            Bostadstyp:
        </label>
        <div class="controls">
            <select name='cmbProtertyType' id='cmbProtertyType' data-placeholder="Välj din plats" style="width:180px;" class="chosen-select" tabindex="5">   
                <?php 
                getHouseType(); //Get data for House Type
                ?>
            </select>
            <div class="imagePreview" style="background-color: #CC0000; width:38px; height: 38px; margin: -32px 0px 0px 190px; border-radius: 20px;"></div>
        </div>
    </div>
    <div class="control-group">
        <input type="text" id="HouseRent" readonly style="color:#ffffff; font-size: 10px; font-weight:bold; background-color:#003264; width:180px; height:25px; text-align:left;">                   
        <div class="controls">           
                <div id="slider-HouseRent"></div>           
        </div>
    </div>    
    <div class="control-group">
        <input type="text" id="Area" readonly style="color:#ffffff; font-size: 10px; font-weight:bold; background-color:#003264; width:180px; height:25px; text-align:left;">                   
        <div class="controls">           
                <div id="slider-Area"></div>           
        </div>
    </div>
    <div class="control-group">            
        <input name="NoRoomsRange" type="text" id="NoRoomsRange" readonly style="color:#ffffff; font-size: 10px; font-weight:bold; background-color:#003264; width:180px; height:25px; text-align:left;">          
        <div class="controls">           
                <div id="slider-NoRoomsRange"></div>           
        </div>
    </div>
    <div class="control-group">            
        <input name="NoBathRoomsRange" type="text" id="NoBathRoomsRange" readonly style="color:#ffffff; font-size: 10px; font-weight:bold; background-color:#003264; width:180px; height:25px; text-align:left;">          
        <div class="controls">           
                <div id="slider-NoBathRoomsRange"></div>           
        </div>
    </div>
    <div class="control-group">
        <input name="StairRange" type="text" id="StairRange" readonly style="color:#ffffff; font-size: 10px; font-weight:bold; background-color:#003264; width:180px; height:25px; text-align:left;">                   
        <div class="controls">           
                <div id="slider-StairRange"></div>           
        </div>
    </div>
    <div class="form-actions">
    <input type="button" class="btn btn-primary btn-large" value="Sök!" id="search">
    </div>
</form>