<?php
	$page = "contact-us";
    include_once("header.php");
?>

<!-- content begin -->
<div class="no-bottom no-top" id="content">
    <div id="top"></div>
    
    <!-- section begin -->
    <section id="subheader">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>Contact Us</h1>
							<p>Your feed back is important to us</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
    </section>
    <!-- section close -->
    
    <!-- section begin -->
    <section aria-label="section">
        <div class="container">
            <div class="row wow fadeIn">
							
                <div class="col-lg-8 mb-sm-30">
                    <h3>Do you have any question?</h3>
                    
                    <form name="contactForm" id="contact_form" class="form-border" method="post" action="#">
                        
                        <?php echo isset($response) ? $response : ""; ?>

                        <div class="field-set">
                            <input class="form-control" minlength="2" maxlength="20" type="text" required name="Fullname" placeholder="Full Name" />
                        </div>

                        <div class="field-set">
                            <input class="form-control" minlength="6" maxlength="40" type="text" name="Email" placeholder="Email" required />
                        </div>

                        <div class="field-set">
                            <input class="form-control" minlength="3" maxlength="15" type="text" name="Phone" placeholder="Phone number" />
                        </div>

                        <div class="field-set">
                            <textarea class="form-control" minlength="10" maxlength="500" required name="Message" placeholder="Message"></textarea>
                        </div>

                        <div class="field-set">
                            <div class="g-recaptcha" data-sitekey="<?php echo $user_cl->googleKeys(2); ?>"></div>
                        </div>

                        <div class="spacer-half"></div>

                        <div id="submit">
                            <input type="submit" id="send_message" value="Submit Form" class="btn btn-main" />
                            <input type="hidden" name="INSERT" value="9">
                        </div>
                        <!-- <div id="mail_success" class="success">Your message has been sent successfully.</div>
                        <div id="mail_fail" class="error">Sorry, error occured this time sending your message.</div> -->
                    </form>
                </div>
                
                <div class="col-lg-4">

                    <div class="padding40 box-rounded mb30" data-bgcolor="#292F45">
                        <h3>Lagos Office</h3>
                        <address class="s1">
                            <span><i class="id-color fa fa-map-marker fa-lg"></i>Lagos, Nigeria.</span>
                            <span><i class="id-color fa fa-phone fa-lg"></i>(+234) 818 097 7065<br/> 
                                                                            (+234) 802 775 4333
                            </span>
                            <span>
                                <i class="id-color fa fa-envelope-o fa-lg"></i>
                                <a href="info@dilyastrend.com">info@dilyastrend.com <br/></a>
                                <a href="advert@dilyastrend.com">advert@dilyastrend.com</a>
                            </span>
                            <!-- <span><i class="id-color fa fa-file-pdf-o fa-lg"></i><a href="#">Download Brochure</a></span> -->
                        </address>
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

