<?php
include "header.php";
include "headerTop.php";
if(empty($_SESSION['login_user'])){
    $pageView = "formRegister.php";
}else{
    $pageView = "formRegisterDetailHave.php";
}
?>

<div id="content" class="clearfix">

<div class="container">
<div class="row">
<div id="main" class="span12">

<h1 class="page-header">Välj bytestyp</h1>

<!-- /.progressbar -->
<div class="submission-form form-verticalR1">
<div class="progressbar">
    <div class="progressbar-inner">
        <div class="row">
            
            <div class="item span4">
            <a href="<?php echo $pageView; ?>?RegisterType=1">
                <div class="number"><img src="assets/img/11.png" alt="Home"></div>
                <strong>En bostad mot en</strong>
            </a>
            </div>
            
            <!-- /.item  -->
            
            <div class="item span4">
            <a href="<?php echo $pageView; ?>?RegisterType=2">
                <div class="number"><img src="assets/img/12.png" alt="Home"></div>
                <strong>En bostad mot två</strong>
            </a>
            </div>
      
            <!-- /.item  -->
         
            <div class="item span4">
            <a href="<?php echo $pageView; ?>?RegisterType=3">
                <div class="number"><img src="assets/img/21.png" alt="Home"></div>
                <strong>Två bostäder mot en</strong>
            </a>
            </div>
            
            <div class="item span4">
            <a href="<?php echo $pageView; ?>?RegisterType=4">
                <div class="number"><img src="assets/img/House-Rent.png" alt="Home"></div>
                <strong>Hyra ut</strong>
            </a>
            </div>
            
            <div class="item span4">
            <a href="<?php echo $pageView; ?>?RegisterType=5">
                <div class="number"><img src="assets/img/House-Sale.png" alt="Home"></div>
                <strong>Sälj ut</strong>
            </a>
            </div>
            
            <div class="item span4">
            <a href="<?php echo $pageView; ?>?RegisterType=6">
                <div class="number"><img src="assets/img/Internet_bags.png" alt="Home"></div>
                <strong>Holiday Hyra</strong>
            </a>
            </div>
            <!-- /.item  -->
        </div>
        
        
        
        <!-- /.row -->
    </div>
    <!-- /.progressbar-inner -->
</div>
</div>

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
