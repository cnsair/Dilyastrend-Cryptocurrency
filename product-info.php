<?php 
	$page = "product-info";
	include("header.php");

    $pro_title = $_GET["xpro"];
    $uid = $_GET["eid"];
    $cont = new Crud($connect);
    $product_title = $cont -> AnyContent("Product", "product_title", "ID", $pro_title); 
    $fname = $cont -> AnyContent("Fname", "users", "ID", $uid); 
    $sname = $cont -> AnyContent("Sname", "users", "ID", $uid); 
?>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '3910236449075191',
      cookie     : true,
      xfbml      : true,
      version    : 'v10.0'
    });
      
    FB.AppEvents.logPageView(); 
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>




<!--============================================================================ 
                            PAYMENT PROCESS LANDING
=================================================================================-->

<?php if( !isset($_GET["amp"]) || $_GET["dil"] == "") { ?>

    <section id="meet-team" style="margin: 0 0 10% 0">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown"><?php echo $product_title; ?></h2>
                <p class="text-center wow fadeInDown"><?php echo $product_title; ?> by <strong> <?php echo $fname." ".$sname; ?> </strong> </p>
            </div>
        
            <div class="row">
            
                <div class="col-md-6 col-sm-6">                
                    <div class="col-12 product-image-thumbs">
                        <?php 
                            $sql2 = "SELECT * FROM product WHERE ProductTitle = '".$pro_title."' AND CreatedBy = '".$uid."' ORDER BY ID DESC LIMIT 10";
                            $q2 = $connect->prepare($sql2);
                            $q2->execute();

                            if(!empty($q2)){
                                foreach($q2 as $key => $img){ 
                                    $imageURL = 'files/products/images/';
                                    $jk = $img["Product"]; ?>
                                        
                                    <a href="<?php echo $imageURL . $jk; ?>" data-fancybox="gallery" data-caption="<?php echo $jk; ?>" >
                                        <div style="padding: 3px; float: left;">
                                            <img height="130px" src="<?php echo $imageURL . $jk; ?>" alt="Product" />
                                        </div>
                                    </a>
                                <?php }
                            } 
                            else{ ?>
                                <p>No image found!</p>
                            <?php } 
                        ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="col-md-6 col-sm-6">
                    <?php 
                        $sql_pro = "SELECT * FROM product WHERE ProductTitle = '".$pro_title."' AND CreatedBy = '".$uid."' ORDER BY ID DESC";
                        $q = $connect->prepare($sql_pro);
                        $q->execute();

                        $rowz = $q->fetch(PDO::FETCH_ASSOC);
                    ?>
                    
                    <div class="bg-gray py-2 px-3 mt-4">
                        <h4>
                            <i class="fa fa-money fa-sm"></i>
                            <del style='text-decoration-style: double;'>N</del>
                            <?php echo $rowz["Amount"]; ?>
                        </h4>
                    </div>
                    <h5 class="my-3">Description</h5>
                    <p><?php echo $rowz["Description"]; ?></p>


                    <div class="mt-4">
                        <h5 class="my-3">By:
                        <i class="fa fa-user fa-lg mr-2"></i>
                        <a href="#user-info" class="reg">
                            <?php echo $fname ." ". $sname; ?>
                        </a>

                        </h5>
                    </div>
                    <hr/>
                    <!-- <a href="checkout.php">
                        <div class="btn btn-primary btn-sm btn-flat">
                        <i class="fas fa-credit-card fa-lg mr-2"></i>
                        Pay Now
                        </div>
                    </a> -->

                    <a href="checkout.php">
                    <div class="btn btn-default btn-sm btn-flat">
                            <i class="fa fa-credit-card fa-lg mr-2"></i>
                            Pay Now
                        </div>
                    </a>

                    <div class="mt-4">
                        <div style="margin: 13px 13px">
                            <div class="fb-like" data-href="https://www.dilyastrend.com/product-info?xpro=<?php echo $pro_title; ?>&eid=<?php echo $uid; ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section><!--/#meet-team-->

<?php } ?>





<!--============================================================================ 
                                CHECKOUT
=================================================================================-->

<?php if( isset($_GET["amp"]) && $_GET["dil"] == "checkout" ) { 

    $crudz = new Crud($connect);
    $userz = new User($connect);
    $did = $_GET["amp"];

    $getck = FetchIndividualContent("31", $did);

    $uid = $getck[0]["UID"];
    $cid = $getck[0]["CID"];
    $tit = $crudz->AnyContent("Title", "cause", "ID", $cid );
    $des = $crudz->AnyContent("Description", "cause", "ID", $cid );
    $cur = $crudz->AnyContent("Currency", "cause", "ID", $cid );
    $amt = $getck[0]["Amount"];
    $d_name = $getck[0]["DonorName"];
    $email = $getck[0]["Email"];
    $ptid = $getck[0]["TransactionID"];

    //================================
    //  FLUTTERWAVE SDK V3
    //================================
    // $curl = curl_init();

    // curl_setopt_array($curl, array(
    //     CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/123456/verify",
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 0,
    //     CURLOPT_FOLLOWLOCATION => true,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "GET",
    //     CURLOPT_HTTPHEADER => array(
    //         "Content-Type: application/json",
    //         "Authorization: Bearer {{SEC_KEY}}"
    //     ),
    // ));

    // $response = curl_exec($curl);

    // curl_close($curl);
    // echo $response;
    ?>

    <section class="urgent-popup-list inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="post" style="margin: 10% 0%">
                            
                        <h3>
                            <?php echo $d_name; ?>, you're supporting the cause: 
                            <span style="text-align: center; font-weight: bold;"><?php echo $tit; ?></span>
                        </h3>
                    
                        <h3>
                            You're donating:
                            <span style="text-align: center; font-weight: bold; color: #004000"> 
                            <?php echo $cur.$amt; ?></span>
                        </h3>
                        <!-- <small style="text-align: center; font-weight: bold;">Your donation will benefit this cause.</small> -->

                        <h4>
                            <span style="text-align: center; font-weight: bold; color: #004000">
                                Description:
                            </span> 
                            <?php echo $des; ?>
                        </h4>

                        <small style="text-align: center; font-weight: bold;">Your donation will benefit this cause.</small>              
                        <hr>

                        <div class="card card-outline-secondary">
                            <div class="card-body">
                            
                                <?php //isset($response1) ? $response1 : ""; ?>
                                
                                <form class="form-group" method="POST" action="" role="form" autocomplete="on" onsubmit="return donate3F(this);">
                                    
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <script src="https://checkout.flutterwave.com/v3.js"></script>
                                            <input onClick="makePayment()" name="donate3" type="submit" class="btn btn-flat btn-success btn-lg btn-block" value="DONATE NOW">
                                            <input name="DID" type="hidden" value="<?php echo $did; ?>">
                                            <input name="FormNumber" type="hidden" value="1">
                                        </div>
                                    </div>
                                    <small>By continuing, you agree with PrinceVicasFoundation <a target="_blank" href="#terms.php">terms</a> and  <a href="#privacy.php">privacy</a> policy.</small>  
                                    </br>
                                    <small>
                                        This site is protected by reCAPTCHA and the Google <a target="_blank" href="https://www.google.com/intl/en/policies/privacy/">privacy policy</a> and <a target="_blank" href="https://www.google.com/intl/en/policies/terms/">Terms of Service</a>  apply.
                                    </small>

                                    <div id="donateus-2" class="sidebar-widget widget_donateus">
                                        
                                        <div class="pull-right">
                                            <div class="donate-us-box urgent-popup-list">
                                
                                                <span><img style="height: 50px;" src="SSL/sectigo_trust_seal_lg_140x54.png"></span> 
                                            
                                                <small style="color: #ff8000; text-align: center;">
                                                    End-to-end encryption, meaning your credit card information is safe
                                                </small>
                                            
                                        </div>
                                    </div>


                                    <script>
                                        function makePayment() {
                                            FlutterwaveCheckout({
                                            public_key: "<?php echo $userz->flutterwKeys(1); ?>",
                                            tx_ref: "<?php echo $ptid; ?>",
                                            amount: <?php echo $amt; ?>,
                                            currency: "<?php echo $cur; ?>",
                                            country: "NIG",
                                            payment_options: " ",
                                            redirect_url: // specified redirect URL
                                                "https://princevicasfoundation.com?donation.php&vic=payment-result",
                                            meta: {
                                                consumer_id: 0,
                                                consumer_mac: "",
                                            },
                                            customer: {
                                                email: "<?php echo $email; ?>",
                                                phone_number: "",
                                                name: "<?php echo $d_name; ?>",
                                            },
                                            callback: function (data) {
                                                console.log(data);
                                            },
                                            onclose: function() {
                                                // close modal
                                            },
                                            customizations: {
                                                title: "<?php echo $tit; ?>",
                                                description: "Donation to the cause of <?php echo $tit; ?>",
                                                logo: "https://princevicasfoundation.com/assets/images/icons/logo-2.png",
                                            },
                                            });
                                        }
                                    </script>
                                </form>
                            </div>
                        </div>
                        <!-- /form card cc payment -->
                        
                    </div>                 
                </div>

                            
            </div>
        </div>

    </section>

<?php } ?>



















<?php 
	include("footer.php");
?>