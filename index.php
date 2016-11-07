<?php
include "header.php";
include "headerTop.php";
?>
<div id="content" class="clearfix">
    <div class="map-wrapper">
        <div class="map">
            <?php
            include "mapHeaderScript.php";
            ?>
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="property-filter widget">
                            <div class="content">
                                <?php
                                include "formSearch.php";
                                ?>
                            </div>
                        </div>                   
                    </div>
                </div>
            </div>
            <div id="map" class="map-inner" style="height: 773px"></div>
            
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
