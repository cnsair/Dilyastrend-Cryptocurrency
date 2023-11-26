<?php
	$page = "register";
    include_once("header.php");
    $user_cl = new User($connect);
?>

<!-- content begin -->
<div class="no-bottom no-top" id="content">
    <div id="top"></div>
    
    <section class="full-height relative no-top no-bottom vertical-center" data-bgimage="url(images/background/8.jpg) top" data-stellar-background-ratio=".5">
        <div class="overlay-gradient t50">
            <div class="center-y relative">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 text-light wow fadeInRight" data-wow-delay=".5s">
                            <div class="spacer-10"></div>
                            <h1>Fast, secure and transparent marketplace.</h1>
                            <p class="lead">Welcome to Dilyastrend. Your decentralized blockchain hub!</p>
                        </div>
                        
                        <div class="col-lg-4 offset-lg-2 wow fadeIn" data-wow-delay=".5s">
                            <div class="box-rounded padding40" data-bgcolor="#21273e">

                                <h3 class="mb10">Register</h3>

                                <h4><?php if(isset($response)){ echo $response;} ?></h4>

                                <p>Click <a href="signin.php">here<span></span></a> to login using an existing account or create a new account below.</p>

                                <form name="contactForm" id='contact_form' class="form-border" method="post" action=''>

                                    <div class="field-set">
                                        <input minlength="2" maxlength="12" type="text" name="Fname" placeholder="First name" class="form-control" required>
                                    </div>

                                    <div class="field-set">
                                        <input minlength="6" maxlength="40" type="text" name="Email" placeholder="Email" class="form-control" required>
                                    </div>

                                    <div class="field-set">
                                        <input minlength="3" maxlength="12" id='username' type="text" name="Uname" placeholder="Username" class="form-control" required>
                                    </div>
                                    
                                    <div class="field-set">
                                        <input minlength="6" maxlength="40" type="password" name="Pword1" placeholder="Password" class="form-control" required>

                                        <small class="">
                                            Minimum of 6 and Maximum of 40 alphanumerics
                                        </small>
                                    </div>
                                    
                                    <div class="field-set">
                                        <input minlength="6" maxlength="40" type="password" name="Pword2" placeholder="Confirm password" class="form-control" required>
                                    </div>
                                    
                                    <div class="field-set">
							            <div class="g-recaptcha" data-sitekey="<?php echo $user_cl->googleKeys(2); ?>"></div>
                                    </div>
                                    
                                    <div class="spacer-single"></div>
                                    
                                    <div class="field-set">
                                        <input class="btn btn-main btn-flat btn-fullwidth color-2" type="submit" id="contact-submit" data-submit="...Sending" name="signUp" value="REGISTER">
                                        <input type="hidden" name="INSERT" value="1">
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    
                                    <div class="spacer-single"></div>

                                    <!-- social icons -->
                                    <!-- <ul class="list s3">
                                        <li>Already registered?</li>
                                        <li><a href="signin">Click here to Sign In</a></li>
                                    </ul> -->
                                    <!-- social icons close -->
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

