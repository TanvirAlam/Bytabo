<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html>
<!--<![endif]-->

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Tanvir, http://tanvir.dk">
    <meta http-equiv="refresh" content="90000;url=logout.php" />
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/png">

    <!--[if lt IE 9]>
    <script src="assets/js/html5.js" type="text/javascript"></script>
    <![endif]-->

    <meta name='robots' content='noindex,nofollow'/>

    <link rel='stylesheet' id='font-css' href='http://fonts.googleapis.com/css?family=Open+Sans%3A400%2C700%2C300&#038;subset=latin%2Clatin-ext&#038;ver=3.6' type='text/css' media='all'/>

        
    <link rel='stylesheet' id='pictopro-normal-css' href='assets/css/pictopro-normal/style.css' type='text/css' media='all'/>
    <link rel='stylesheet' id='justvector-web-font-css' href='assets/css/justvector-web-font/stylesheet.css' type='text/css' media='all'/>    
    <link rel='stylesheet' id='chosen-css' href='assets/css/chosen.css' type='text/css' media='all'/>
    <link rel='stylesheet' id='bootstrap-css' href='assets/css/bootstrap.min.css' type='text/css' media='all'/>
    <link rel='stylesheet' id='bootstrap-responsive-css' href='assets/css/bootstrap-responsive.css' type='text/css' media='all'/>
    <link rel='stylesheet' id='properta-css' href='assets/css/bytabo.css' type='text/css' media='all'/>    
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css">
    <link rel='stylesheet' id='bootstrap-css' href='assets/css/select2.css' type='text/css' media='all'/>
    <link rel='stylesheet' id='bootstrap-css' href='assets/css/zocial.css' type='text/css' media='all'/>
    <link rel='stylesheet' id='bootstrap-css' href='assets/css/feedback.css' type='text/css' media='all'/>
    <link rel='stylesheet' id='bootstrap-css' href='assets/css/lightbox.css' type='text/css' media='all'/>
    <link rel='stylesheet' id='bootstrap-css' href='assets/css/jquery.fancybox.css' type='text/css' media='all'/>
    <link rel="stylesheet" type="text/css" href="assets/css/turbotabs.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/globals.css">

    <link rel="stylesheet" type="text/css" href="assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive-tables.css">
    <style>
        #slider-HouseRent .ui-slider-handle, #slider-HouseRentHave .ui-slider-handle, #slider-NoRooms .ui-slider-handle, #slider-NoBathRooms .ui-slider-handle, 
        #slider-Area .ui-slider-handle, #slider-AreaHave .ui-slider-handle, #slider-Stair .ui-slider-handle, #slider-StairRange .ui-slider-handle, 
        #slider-NoRoomsRange .ui-slider-handle, #slider-NoBathRoomsRange .ui-slider-handle
        { border-color: #ef2929; }
        #slider-HouseRent .ui-slider-range, #slider-HouseRentHave .ui-slider-range, #slider-NoRooms .ui-slider-range, #slider-NoBathRooms .ui-slider-range,
        #slider-Area .ui-slider-range, #slider-AreaHave .ui-slider-range, #slider-Stair .ui-slider-range, #slider-StairRange .ui-slider-range,
        #slider-NoRoomsRange .ui-slider-range,#slider-NoBathRoomsRange .ui-slider-range
        { background: #CC0000; }

        #slider-HouseRent, #slider-NoRooms, #slider-Area, #slider-NoBathRooms, #slider-HouseRentHave, #slider-AreaHave, #slider-Stair, 
        #slider-StairRange, #slider-NoRoomsRange,#slider-NoBathRoomsRange {
            float: left;
            clear: left;
            width: 100%;
          }
    </style>
    <script type='text/javascript' src='http://code.jquery.com/jquery-1.7.2.min.js'></script>
      
    <script type='text/javascript' src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script type='text/javascript' src='assets/js/aviators-map.js'></script> /*Google Map*/
    <script type='text/javascript' src='assets/js/gmap3.infobox.min.js'></script> /*Google Map*/
    <script type='text/javascript' src='assets/js/gmap3.clusterer.js'></script> /*Google Map*/
    <script type='text/javascript' src='assets/js/bootstrap.min.js'></script>
    <script type='text/javascript' src='assets/js/retina.js'></script>    
    <script type='text/javascript' src='assets/js/jquery.ezmark.js'></script>
    <script type='text/javascript' src='assets/js/carousel.js'></script>
    <script type='text/javascript' src='assets/js/jquery.bxslider.js'></script> /*different img slider*/
    <script type='text/javascript' src='assets/js/bytabo.js'></script> /* site */
    <script type='text/javascript' src='assets/js/bytaboScript.js'></script>
    <script type='text/javascript' src='assets/js/select2.min.js'></script>
    <script type='text/javascript' src='assets/js/chosen.jquery.js'></script>
    <script type='text/javascript' src='assets/js/jquery.geocomplete.js'></script>
    <script type='text/javascript' src='assets/js/feedback.js'></script>
    <script type='text/javascript' src='assets/js/jquery.ui.shake.js'></script>
    <script type='text/javascript' src='assets/js/bytabovalidation.js'></script>
    <script type='text/javascript' src='assets/js/lightbox.js'></script>
    <script type='text/javascript' src='assets/js/jquery.fancybox.js'></script>
    <script type='text/javascript' src="assets/js/turbotabs.js"></script>
    <script type='text/javascript' src="assets/js/responsive-tables.js"></script>
       
    <script type="text/javascript">
    $(document).ready(function() {
        var config = {
              '.chosen-select'           : {},
              '.chosen-select-deselect'  : {allow_single_deselect:true},
              '.chosen-select-no-single' : {disable_search_threshold:10},
              '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
              '.chosen-select-width'     : {width:"95%"}
            }
            for (var selector in config) {
              $(selector).chosen(config[selector]);
            }
    });
    </script>
    <script>
    $(document).ready(function() {
        $( "#dialog_trigger" ).click(function() {
        $( "#dialog" ).dialog( "open" );
        });
        $("#dialog").dialog({
            autoOpen: false,
            position: 'center' ,
            title: 'Bytabo IMAGE UPLOAD',
            draggable: false,
            width : 800,
            height : 500, 
            resizable : false,
            modal : true,
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('.fancybox').fancybox();
    });
    </script>    
    <title>Bytabo.se</title>
</head>

<body class="home page page-template">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=397820253742690&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>