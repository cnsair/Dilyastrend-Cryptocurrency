<?php
	$page = "forgot-password";
    include_once("header.php");
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
                                <h3 class="mb10">Forgot Password</h3>
                                <p>Enter email used during registration or click <a href="signin">here</a> to sign in.</p>

                                <h4><?php if( isset($response) ){ echo $response; } ?></h4>

                                <form name="contactForm" id='contact_form' class="form-border" method="post" action="">

                                    <div class="field-set">
                                        <input type='text' name='Email' id='email' class="form-control" placeholder="Email" required>
                                    </div>
                                    
                                    <div class="field-set">
                                        <input type='submit' id='send_message' value='Submit' class="btn btn-main btn-fullwidth color-2">
                                        <input type="hidden" name="INSERT" value="3">
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

