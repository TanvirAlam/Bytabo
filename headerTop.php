<?php
session_start();
/* 2 hours in seconds
$inactive = 300; 
ini_set('session.gc_maxlifetime', $inactive); // set the session max lifetime to 2 hours
session_start();
if (isset($_SESSION['testing']) && (time() - $_SESSION['testing'] > $inactive)) {
    // last request was more than 2 hours ago
    session_unset();     // unset $_SESSION variable for this page
    session_destroy();   // destroy session data
}
$_SESSION['testing'] = time();
*/
?>
<div class="top">
    <div class="container">
        <div class="top-inner inverted">
            <div class="header clearfix">
                <div id="language-switch" class="languages">
                    <div id="lang_sel_list" class="lang_sel_list_horizontal">
                        <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
                    </div>
                    
                </div>

                <div class="branding pull-left">
                    <div class="logo">
                        <a href="#" title="Home">
                            <img src="assets/img/logo.png" alt="Home">
                        </a>
                    </div>
                    <!-- /.logo -->
                    
                    
                    <div class="site-name">
                        <a href="default.htm" title="Home" class="brand">
                            Bytabo
                        </a>
                    </div>
                    <!-- /.site-name -->
                    
                </div>
                
                <div class="contact-top">
                    <ul class="menu nav">
                        <li class="first leaf facebook">
                            <a href="http://www.facebook.com" class="facebook"><i>F</i></a>
                        </li>

                        <li class="leaf google-plus"><a href="http://plus.google.com" class="google"><i>g</i></a></li>

                        <li class="leaf linkedin"><a href="htp://linkedin.com" class="linkedin"><i>l</i></a></li>

                        <li class="leaf twitter"><a href="http://www.twitter.com" class="twitter"><i>T</i></a></li>

                    </ul>
                </div>

                <div class="user-area pull-right">
                    <div class="menu-anonymous-container">
                        <ul id="menu-anonymous" class="nav nav-pills">
                            <?php if(empty($_SESSION['login_user'])){ ?>
                            <li class="menu-item"><a href="formRegister.php"><i class="fa fa-sign-in"></i> Logga in</a></li>
                            <?php }else{ ?>                            
                            <li class="menu-item"><a href="logout.php"><i class="fa fa-sign-out"></i> Logga ut</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <!-- /.user-area -->
            </div>
            <!-- /.header -->
    <div class="navigation navbar clearfix">
    <div class="pull-left">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div class="nav-collapse collapse">
            <ul id="menu-main" class="nav">
                <li class="menu-item active-menu-item menu-item-parent">
                    <a href="#">Menu1</a>
                     <ul class="sub-menu">
                        <li class="menu-item"><a href="#">Menu1a</a></li>
                        <li class="menu-item"><a href="#">Menu1b</a></li>
                        <li class="menu-item"><a href="#">Menu1c</a></li>
                    </ul>
                </li>

                <li class="menu-item menu-item-parent">
                    <a href="#">Menu1</a>
                </li>

                <li class="menu-item menu-item-parent">
                    <a href="#">Menu3</a>
                </li>

                <li class="menu-item menu-item-parent">
                    <a href="#">Menu4</a>
                </li>

                <li class="menu-item">
                    <a href="index.php"><i class="fa fa-search"></i> Sök annonser</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="pull-right">
        <div class="list-property">
        <?php if(empty($_SESSION['login_user'])){ ?>
        <a href="formRegister.php" class='button-link'><i class="fa fa-building-o"></i> Lägg in annons</a>
        <?php }else{ ?>
        
        <a href="logout.php"><i class="fa fa-user fa-1x"></i> (<?php echo $_SESSION['login_user']; ?>)</a>
        <a href="MyPanel.php" class='button-link'><i class="fa fa-briefcase"></i> Mitt Konto</a>
        <a href="formRegisterType.php" class='button-link'><i class="fa fa-building-o"></i> Lägg in annons</a>
        <?php } ?>
        </div>
        <!-- /.list-property -->
    </div>
    <!-- /.pull-right -->

</div>

<!-- /.breadcrumb -->
</div>
</div>
</div>