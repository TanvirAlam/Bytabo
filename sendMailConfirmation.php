<?php
include "header.php";
include "headerTop.php";
include "functions.php";
?>
<div id="content" class="clearfix">
    <div class="container">
        <div class="row">
            <div id="main" class="span12">
            <h1 class="page-header">Mail Varification</h1>
            <!-- /.progressbar -->
                <div class="submission-form form-verticalR1">
                <div class="progressbar">
                    <div class="progressbar-inner">
                        <div class="row">                         
                            
                            <div class="item span4" style="width: 98%;">
                            <?php
                                $RegisterType = $_REQUEST["RegisterType"];
                                $user_name = $_REQUEST["user_name"];
                                $sendActCodeAgain = $_REQUEST["sendActCodeAgain"];
                                $RS = $_REQUEST["RS"];
                                $Cpwd = $_REQUEST["Cpwd"];
                                if(empty($sendActCodeAgain)){
                                   registerUser($user_name, $Cpwd);
                                }else{                                   
                                   sendActivationCodeAgain($user_name); 
                                }
                                
                             ?>
                             <?php if($RegStatus == 1 || $RS == 1){ ?>
                                <div class="isa_success">
                                    <i class="fa fa-check"></i>
                                    Vänligen , kolla din E-post och klicka på länken som ges till skilja mellan olika din E-post.
                                    <i class="fa fa-barcode"></i>
                                    <label class="control-label">
                                        Aktiveringskod
                                        <span class="form-required" title="This field is required.">*</span>
                                    </label>
                                    <span class="statusActivation"></span>
                                    <div class="controls">
                                        <input id="user_name" type="hidden" name="user_name" value="<?php echo $user_name; ?>">
                                        <input id="act_code" type="text" required="required" name="act_code" style="width: 15%;">
                                    </div>                                                        
                                    
                               </div>
                                <a href="formRegister.php?RegisterType=<?php echo $RegisterType; ?>" class='btn btn-primary'><i class="fa fa-arrow-left"></i> Gå tillbaka</a> |
                                <a id="send_act_code" href="#" class="btn btn-primary"><i class="fa fa-check-square"></i> Aktivera!</a> |
                                <a href="sendMailConfirmation.php?user_name=<?php echo $user_name; ?>&sendActCodeAgain=1&RS=1" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Skicka igen</a>
                             
                             <?php }else{ ?>
                                <div class="isa_error">
                                    <i class="fa fa-times-circle"></i>
                                    E-post som du angav har redan tagits! Vänligen , ange en annan E-post!
                                 </div>
                                 <a href="formRegister.php?RegisterType=<?php echo $RegisterType; ?>" class='btn btn-primary'><i class="fa fa-arrow-left"></i> Gå tillbaka</a>
                              
                             <?php } ?>
                             
                                
                            </div>                            
                            <!-- /.item  -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.progressbar-inner -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>