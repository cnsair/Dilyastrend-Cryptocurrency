<?php 
    include("../../appfunctions/appfunctions.php");

    include("access_checker.php");

    $forgo = new Crud($connect);
    $user_id = $_SESSION["duid"];

    $identifier = (isset($user_id)) ? "2" : "1";
    $userid = (isset($user_id)) ? $user_id : "NULL";
    $fname = $forgo -> AnyContent("FName", "users", "ID", $user_id);
    $sname = $forgo -> AnyContent("SName", "users", "ID", $user_id);
    $fullname = (isset($user_id)) ? $fname." ".$sname : "NULL";

    //$forgo -> LogAll($identifier, $userid, $fullname);
    $forgo -> LogAllCalculate($identifier, $userid, $fullname);
    $forgo -> LogAudit($identifier, $userid, $fullname);
    
  //get users details
	$getprofile = FetchIndividualContent("2", $_SESSION["duid"]);

	$fname = $getprofile[0]["Fname"];
	$sname = $getprofile[0]["Sname"];
	$photo = $getprofile[0]["Photo"];
	$email = $getprofile[0]["Email"];
	$role = $getprofile[0]["Role"];
	$bio = $getprofile[0]["Bio"];
  $duid = $getprofile[0]["ID"];
  //start here
  $addr = $getprofile[0]["Addr"];
  $phone = $getprofile[0]["Phone"];
  $acc_lev = $getprofile[0]["AccessLevel"];
  
  (isset($_GET["page"])) ? $page = $_GET["page"] : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
        <?php if( $_SESSION["accesslevel"] == "1") { echo "Admin - " . ucwords($fname); } 
						elseif($_SESSION["accesslevel"] == "2") { echo "SubAdmin - " . ucwords($fname); }
						elseif($_SESSION["accesslevel"] == "3") { echo ucwords($fname); }
						else{ echo ""; } 
        ?>
  </title>

  <!-- Dashboard icon -->
  <link rel="icon" type="image/jpg" href="../../assets/images/dilyastrend-main2.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="../plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Custom css -->
  <link rel="stylesheet" href="../docs/assets/css/custom.css">

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
          if(isset($_GET["dil"]) && ($_GET["dil"] == "view-product") ){ ?>

              fbq('track', 'ViewContent'); //User visits a product or landing page
              fbq('track', 'AddToCart'); //The addition of an item to a shopping cart

          <?php }elseif(isset($_GET["dil"]) && $_GET["dil"] == "cart"){ ?>

              fbq('track', 'CustomizeProduct'); //The customization of products

          <?php }elseif(isset($_GET["dil"]) && $_GET["dil"] == "placeorder"){ ?>

              fbq('track', 'CompleteRegistration'); //A submission of information by a customer in exchange for a service provided
              fbq('track', 'Contact'); //contact info between a customer and your business.

          <?php }elseif(isset($_GET["dil"]) && $_GET["dil"] == "checkout"){ ?>

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

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed ">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-topnav">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard?dil=home" class="nav-link">Home</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact Admin</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <ul class="navbar-nav ml-3">
      <li class="nav-item">
        <a class="nav-link" href="Javascript:history.back();">&laquo;&laquo;Back</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Cart Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="dashboard?dil=cart">
          <i class="fa fa-shopping-cart"></i>
          <span class="badge badge-primary navbar-badge">
            <?php 
              $count_cart = FetchWithMultipleArgs(4, $duid);
              echo $num_items_in_cart = isset($count_cart) ? $count_cart : 0;
            ?>
          </span>
        </a>
      </li>
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">0 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 0 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 0 connectss
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>

      <!-- Session controls -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="dashboard?dil=account-settings" class="dropdown-item">
            <i class="fas fa-cog mr-2"></i> Account Settings
          </a>
          <div class="dropdown-divider"></div>
          <a href="dashboard?dil=profile" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> My Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="dashboard?dil=change-password" class="dropdown-item">
            <i class="fas fa-lock mr-2"></i> Change Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout" style="width: 100%" class="btn btn-flat btn-danger">Logout</a>
        </div>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->
