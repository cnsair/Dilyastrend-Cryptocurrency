<?php 
    
    $page = "confirm-account";
    include_once("header.php");

?>

<div class="page-header-2">
	<div class="container">
		<h3>Confirm Account</h3>
    </div>
</div>

<div class="container fontAll backgrd-img">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div align="center" class="col-md-9">

                <p class="err-404"><i class="fa fa-times"></i> 404 ERROR!</p>
                <h2></i> Page Not Found!</h2>
                <h3>Please Confirm Your Account</h3>
                <h5>
                    Ooops! Something went wrong. It looks like your session has expired or you are not allowed to perform your last action. <br/>
                    Try one of these links or contact an Administrator.<br/>
                    We are sorry for any inconvenience. <br/>
                    <?php echo isset($response) ? $response : "Not good!!"; ?>
                </h5>

            </div>

            <div class="col-md-3">
                <div class="col-md-offset-3 default-e404 confirm-acc">
                    
                    <h4>Useful Links</h4>

                    <!-- SIDE NAV -->
                    <ul class="confirm-acc" style="list-style-type: none">

                        <!-- <li><a href="index"><i class="fa fa-angle-right"></i> Home</a></li> -->
                        <li><a href="signin"><i class="fa fa-angle-right"></i> Sign In</a></li>
                        <li><a href="register"><i class="fa fa-angle-right"></i> Register</a></li>
                        <!-- <li><a href="product-services"><i class="fa fa-angle-right"></i> Product & Services</a></li> -->
                        <!-- <li><a href="gallery"><i class="fa fa-angle-right"></i> Gallery</a></li> -->
                        <li><a href="blog"><i class="fa fa-angle-right"></i> Blog</a></li>
                        <li><a href="#faq"><i class="fa fa-angle-right"></i> FAQ</a></li>

                    </ul>
                    <!-- /SIDE NAV -->

                </div>
            </div>

        </div>
    </div>
</div>

<?php 

    include("footer.php");

?>