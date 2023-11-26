<?php
	$page = "change-password";
    include_once("header.php");
    
    $recover = $_GET["userconfirm"];
    $id = $_GET["xid"];
    $email = $_GET["email"];
    //$name = $_GET["name"];
?>

<!-- content begin -->
<div class="no-bottom no-top" id="content">
    <div id="top"></div>
    
    <section class="full-height relative no-top no-bottom vertical-center" data-bgimage="url(images/background/subheader-dark.jpg) top" data-stellar-background-ratio=".5">
        <div class="overlay-gradient t50">
            <div class="center-y relative">
                <div class="container">
                    <div class="row align-items-center">
                       
                        <div class="col-lg-4 offset-lg-4 wow fadeIn bg-color" data-wow-delay=".5s">
                            <div class="box-rounded padding40">
                                <h3 class="mb10">Change Password</h3>
                                <p>Enter your new password below</p>

                                <h4><?php if( isset($response) ){ echo $response; } ?></h4>

                                <form name="contactForm" id='contact_form' class="form-border" method="post" action="">

                                    <div class="field-set">
                                        <input minlength="6" maxlength="40" type='password' name='Pword1' class="form-control" placeholder="Password" required>

                                        <small class="">
                                            Minimum of 6 and Maximum of 40 alphanumerics
                                        </small>
                                    </div>
                                    
                                    <div class="field-set">
                                        <input minlength="6" maxlength="40" type="password" name="Pword2" placeholder="Confirm password" class="form-control" required>
                                    </div>
                                    
                                    <div class="spacer-single"></div>
                                    
                                    <div class="field-set">
                                        <input type='submit' id='send_message' value='Recover now' class="btn btn-main btn-fullwidth color-2">
                                        <input type="hidden" name="EDIT" value="8">
                                        <input type="hidden" name="EDITVAL" value="<?php echo $id; ?>">
                                        <input type="hidden" name="Email" value="<?php echo $email; ?>">
                                        <input type="hidden" name="ActivationCode" value="<?php echo $recover; ?>">
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    
                                    <div class="spacer-single"></div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>		
    
</div>
<!-- content close -->

<?php
    include_once("footer.php");
?>