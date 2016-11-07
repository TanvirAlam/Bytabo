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
                                ?>
                                <div class="isa_success">
                                    <i class="fa fa-key"></i>
                                    Skriv in din e - post , kommer vi att skicka ditt lösenord! <br>
                                    <i class="fa fa-envelope-o"></i>
                                    <label class="control-label">
                                        Username (E-mail)
                                        <span class="form-required" title="This field is required.">*</span>
                                    </label>
                                    <span class="statusPasswordSend"></span>
                                    <span class="statusPasswordNotSend"></span>
                                    <div class="controls">
                                        <input id="user_name" type="email" required="required" name="user_name" style="width: 50%;">
                                    </div>
                                    <input type="button" value="Skicka mitt lösenord!" class="btn btn-primary" id="send_pass">
                                   
                               </div>
                                
                             <div class="register-btn">
                                <a href="formRegister.php?RegisterType=<?php echo $RegisterType; ?>" class='button-link'>Gå tillbaka</a>
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
    </div>
</div>

<?php
include "footer.php";
?>