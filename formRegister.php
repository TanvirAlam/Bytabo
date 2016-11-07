<?php
include "header.php";
include "headerTop.php";
$UE = $_GET["UE"];
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
                    <div class="centerProgressbar">        
                        
                    </div>            
            </div>
            
            <!-- /.item  -->
            
            <div class="item span4">
                <h1 class="page-header">Ny användare</h1>
                <form method="post" id="frmRegister" action="sendMailConfirmation.php">
                <input type="hidden" name="RegisterType" value="<?php echo $RegisterType ?>">
         <div class="centerSpan4">
            <div class="control-group">
                <label class="control-label">
                    Username (E-mail)
                    <span class="form-required" title="This field is required.">*</span>
                    <?php if(!empty($UE)){ ?>
                        <span class="form-required" title="This field is required.">E-postadress är upptaget!</span>
                    <?php } ?>
                </label>

                <div class="controls">
                    <input type="email" required="required" name="user_name">
                </div>
                <!-- /.controls -->
            </div>
            <!-- /.control-group -->

            <div class="control-group">
                <label class="control-label">
                    Password
                    <span class="form-required" title="This field is required.">*</span>
                </label>

                <div class="controls">                                                
                    <input type="password" name="pwd" id="pwd" required="required">
                </div>
                <!-- /.controls -->
            </div>

            <div class="control-group">
                <label class="control-label">
                    Confirm Password
                    <span class="form-required" title="This field is required.">*</span>
                </label>
                <span class="confirm_pass"></span>
                <div class="controls">                                                
                    <input type="password" name="Cpwd" id="cpwd" required="required">
                </div>
                <!-- /.controls -->
            </div>
            <!-- /.control-group -->
            <span class="captha_match"></span>
            <div class="control-group">
                <div class="controls">
                    <div class="rand1"></div>
                    <div class="plus">+</div>
                    <div class="rand2"></div>
                    <div class="plus">=</div>
                    
                </div>
                <div class="controlsCaptcha">                                                
                    <input type="text" id="total" autocomplete="off" required="required" />
                </div>
            </div>
          </div>
            <div class="form-actions">
                <input type="button" id="register" value="Register" class="btn btn-primary">
            </div>
            <!-- /.form-actions -->
            
        </form>
            </div>
      
            <!-- /.item  -->
         
            <div class="item span4">
                <h1 class="page-header">Befintliga användare</h1>
             
             <input type="hidden" name="RegisterType" value="<?php echo $RegisterType ?>">
                     <div class="centerSpan4">
                        <div id="box">
                            <div class="control-group">
                                <label class="control-label">
                                    Username (E-mail)
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                
                                <div class="controls">
                                    <input type="email" required="required" name="user_email" id="user_email">
                                </div>
                                <!-- /.controls -->
                            </div>
                            <!-- /.control-group -->
    
                            <div class="control-group">
                                <label class="control-label">
                                    Password
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                
                                <div class="controls">                                                
                                    <input type="password" name="pWord" required="required" id="pWord">
                                </div>
                                <!-- /.controls -->
                            </div>
                        <!-- /.control-group -->
                        </div>
                      </div>
                     <div class="confirm_pass" id="add_err"></div>
                        <div class="form-actions" id="linkForgotPass">
                            <a href="getPassword.php?RegisterType=<?php echo $RegisterType; ?>" class='button-link'>Glömt ditt lösenord?</a>
                        </div>
                        <div class="form-actions">
                            <input type="button" id="login" value="Log in" class="btn btn-primary">
                        </div>
                        <!-- /.form-actions -->
                        <div class="centerSpan4SL">             
                          <a href="#" class="zocial facebook not-active">Logga in med Facebook!</a>            
                        </div>
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
