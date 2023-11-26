<?php 
    include "appfunctions/appfunctions.php";

    $home = new Crud($connect);
    $user_cl = new User($connect); 

    //==============================
    //AUDIT TRAIL
    //===============================
    if(isset($_SESSION["duid"])) {
        $sname = $home->AnyContent("Sname", "users", "ID", $_SESSION["duid"]);
        $fname = $home->AnyContent("Fname", "users", "ID", $_SESSION["duid"]);
    }

    $user_id = (isset($_SESSION["duid"])) ? $_SESSION["duid"] : 0;

    $identifier = (isset($_SESSION["duid"])) ? "2" : "1";
    $userid = (isset($user_id)) ? $user_id : "NULL";
    $fname = $home -> AnyContent("FName", "users", "ID", $user_id);
    $sname = $home -> AnyContent("SName", "users", "ID", $user_id);
    $fullname = (isset($user_id)) ? $fname." ".$sname : "NULL";

    //$forgo -> LogAll($identifier, $userid, $fullname);
    $home -> LogAllCalculate($identifier, $userid, $fullname);
    $home -> LogAudit($identifier, $userid, $fullname);

    //=============================
    //OPEN GRAPH for BLOG
    //=============================
    if(isset($_GET["amp"]) && $_GET["one"] == "story"){
        $amp = $_GET["amp"];
		$string = $home->AnyContent("Message", "blog", "ID", $amp);
		$string = strip_tags($string);

		if (strlen($string) > 300) {
		    $stringCut = substr($string, 0, 300);
		    $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
		}
		$og_string = $string;
		$face_img = $home->AnyContent("Photo", "blog", "ID", $amp);
		//$face_vid = $home->AnyContent("PictureVideo", "blog", "ID", $_GET["ID"]);
		$face_title = $home->AnyContent("Title", "blog", "ID", $amp);
        $og_tit = $home->AnyContent("OgTitle", "blog", "ID", $amp);
		$og_title = substr($og_tit, 0, 30); 
    }

    //===================================
    //OPEN GRAPH for PRODUCT & SERVICES
    //==================================
    if(isset($_GET["bat"]) && isset($_GET["tit"]))
    {
        $pro_tit = $_GET["tit"];
		$batch = $_GET["bat"];
        
		$face_img = $home->AnyContent("Product", "product", "batch", $batch);
		//$face_tit = $home->AnyContent("ProductTitle", "product", "ProductTitle", $batch);
		$face_title = $home->AnyContent("Product", "product_title", "ID", $pro_tit);
        $des = $home->AnyContent("Description", "product", "batch", $batch);
    }
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="Dilyastrend is a systemic marketplace in progress that accepts crytocurrencies along with fiat as a mode of payment. It is not just an ordinary marketplace; we are uniquely designed to serve as utilities for crypto projects while making it accessible to everyone.">
    <meta name="author" content="DilyasTrend IT Team, CNScomputers">
    <meta name="keywords" content="eCommerce, Cryptocurrency, Web3.0, Blockchain, Job, Fashion, Artisan, Professional, Technology, Secure, Scalable, Maintainable">
    <link rel="shortcut icon" href="assets/images/dilyastrend-main2.png">
    <title>DilyasTrend - Connecting You</title>
    <link rel="icon" href="images/icon-red.png" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">

    <?php
   //=============================
    //OPEN GRAPH for BLOG
    //=============================
    if(isset($_GET["amp"]) && $_GET["one"] == "story"){ ?>

        <!--=========================================
        Facebook & Twitter - Open Graph meta tags 
        ============================================-->
        <!-- For Images - Open Graph meta tags -->
        <meta property='fb:app_id' content='3910236449075191'/>
        <meta property="og:site_name" content="DilyasTrend"/>
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://www.dilyastrend.com/blog?one=story&amp=<?php echo isset($amp) ? $amp : ""; ?>" />
        <meta property="og:title" content="<?php echo isset($face_title) ? $face_title : ""; ?>" />
        <meta property="og:description" content="<?php echo isset($og_string) ? $og_string : ""; ?>" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:description" content="<?php echo isset($og_string) ? $og_string : ""; ?>" />
        <meta name="twitter:title" content="<?php echo isset($face_title) ? $face_title : ""; ?>" />
    
        <!-- content feeder - Open Graph meta tags -->
        <meta property="og:image:url" content="https://www.dilyastrend.com/blog?one=story&amp=<?php echo isset($amp) ? $amp : ""; ?>&title=<?php  echo isset($og_title) ? $og_title : ""; ?>&img=<?php echo isset($face_img) ? $face_img : ""; ?>" >
        <meta property="og:image" content="https://www.dilyastrend.com/files/images/blog/<?php echo isset($face_img) ? $face_img : ""; ?>" />
        <meta name="twitter:image" content="https://www.dilyastrend.com/files/images/blog/<?php echo isset($face_img) ? $face_img : ""; ?>" />
        <meta property="og:image:width" content="400">
        <meta property="og:image:height" content="400">

    <?php }
    
    //===================================
    //OPEN GRAPH for PRODUCT & SERVICES
    //==================================
    if(isset($_GET["bat"]) && isset($_GET["tit"])){ ?>

        <!--=========================================
        Facebook & Twitter - Open Graph meta tags
        ============================================-->
        <!-- For Images - Open Graph meta tags -->
        <meta property='fb:app_id' content='3910236449075191'/>
        <meta property="og:site_name" content="DilyasTrend"/>
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://www.dilyastrend.com/product-services?dil=product-info&bat=<?php echo $batch; ?>&tit=<?php echo $pro_tit; ?>" />
        <meta property="og:title" content="<?php echo $face_title; ?>" />
        <meta property="og:description" content="<?php echo $des; ?>" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:description" content="<?php echo $des; ?>" />
        <meta name="twitter:title" content="<?php echo $face_title; ?>" />
    
        <!-- content feeder - Open Graph meta tags -->
        <meta property="og:image:url" content="https://www.dilyastrend.com/product-services?dil=product-info&bat=<?php echo $batch; ?>&tit=<?php echo $pro_tit; ?>" >
        <meta property="og:image" content="https://www.dilyastrend.com/files/products/images/<?php echo $face_img; ?>" />
        <meta name="twitter:image" content="https://www.dilyastrend.com/files/products/images/<?php echo $face_img; ?>" />
        <meta property="og:image:width" content="400">
        <meta property="og:image:height" content="400">
        
    <?php } ?>

    <!-- CSS Files
    ================================================== -->
    <link id="bootstrap" href="gigaland/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="gigaland/css/plugins.css" rel="stylesheet" type="text/css" />    
    <link href="gigaland/css/style.css" rel="stylesheet" type="text/css" />
    <link href="gigaland/css/de-grey.css" rel="stylesheet" type="text/css" />

    <!-- color scheme -->
    <link id="colors" href="gigaland/css/colors/scheme-04.css" rel="stylesheet" type="text/css" />
    <!-- <link id="colors" href="gigaland/css/colors/scheme-01.css" rel="stylesheet" type="text/css" /> -->
    <link href="gigaland/css/coloring.css" rel="stylesheet" type="text/css" />
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '2148292185347729'); 
        fbq('track', 'PageView');
        <?php 
            if(isset($page) && $page == "product-services" && $_GET["dil"] == "product-info"){ ?>

                fbq('track', 'ViewContent'); //User visits a product or landing page
                fbq('track', 'AddToCart'); //The addition of an item to a shopping cart

            <?php }elseif(isset($page) && $page == "product-services" && $_GET["dil"] == "cart"){ ?>

                fbq('track', 'CustomizeProduct'); //The customization of products

            <?php }elseif(isset($page) && $page == "product-services" && $_GET["dil"] == "placeorder"){ ?>

                fbq('track', 'CompleteRegistration'); //A submission of information by a customer in exchange for a service provided
                fbq('track', 'Contact'); //contact info between a customer and your business.

            <?php }elseif(isset($page) && $page == "product-services" && $_GET["dil"] == "checkout"){ ?>

                fbq('track', 'InitiateCheckout'); //The start of a checkout process. For example, clicking a Checkout button.
                fbq('track', 'AddPaymentInfo'); //The addition of customer payment information during a checkout process

            <?php }else{
                echo ""; //do nothing
            }
        ?>
    </script>
    <noscript>
        <img height="1" width="1" 
        src="https://www.facebook.com/tr?id=2148292185347729&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
</head>

<script src="https://widget.sirena.app/get?token=239c0a7aedcc438a97b79c810f642eaa"></script>

<body class="dark-scheme de-grey">

    <!--====================================
    Facebook SDK initiator 
    =======================================-->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0&appId=3910236449075191&autoLogAppEvents=1" nonce="AInghgwO"></script>

    <div id="wrapper">
		
        <!-- header begin -->
            <header class="transparent">
                <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                            <div class="de-flex-col">
                                <div class="de-flex-col">
                                    <!-- logo begin -->
                                    <div id="logo">
                                        <a href="#">
                                            <img style="height: 60px;" alt="" src="assets/images/DT-new1.png" />
                                        </a>
                                    </div>
                                    <!-- logo close -->
                                </div>
                                <div class="de-flex-col">
                                    <input id="quick_search" class="xs-hide" name="quick_search" placeholder="search item here..." type="text" />
                                </div>
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <!-- mainmenu begin -->
                                <ul id="mainmenu">
                                    <!-- <li>
                                        <a href="03_grey-index.html">Home<span></span></a>
                                        <ul>
                                            <li><a href="03_grey-index.html">Homepage 1</a></li>
                                            <li><a href="03_grey-index-2.html">Homepage 2</a></li>
                                            <li><a href="03_grey-index-3.html">Homepage 3</a></li>
                                            <li><a href="03_grey-index-4.html">Homepage 4</a></li>
                                        </ul>
                                    </li> -->
                                   
                                    <?php
                                        if($page != "signin" && $page != "homepage") { ?>
                                            <li <?php if(isset($page) && $page == "signin") { echo "active"; } ?>">
                                                <a class="nav-hd" href="signin">Sign In</a>
                                            </li> 
                                        <?php }
                                        elseif($page != "register" && $page != "homepage") { ?>
                                            <li <?php if(isset($page) && $page == "register") { echo "active"; } ?>">
                                                <a href="register">Register</a>
                                            </li>  
                                        <?php }
                                    ?>
                                    <li>
                                        <a href="javascript:history.back();">&laquo;&laquo; back</a>
                                    </li> 

                                    <!-- <li>
                                        <a href="#">Stats<span></span></a>
                                        <ul>
                                            <li><a href="03_grey-activity.html">Activity</a></li>
                                            <li><a href="03_grey-rankings.html">Rankings</a></li>
                                        </ul>
                                    </li> -->
                                </ul>
                                <!-- mainmenu close -->
                                <div class="menu_side_area">
                                    <a href="#" class="btn-main btn-wallet"><i class="icon_wallet_alt"></i><span>Connect Wallet</span></a>
                                    <span id="menu-btn"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header close -->