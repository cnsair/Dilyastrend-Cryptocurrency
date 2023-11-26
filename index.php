<?php 

$page = "homepage";
include("header.php");

?>
    <section id="main-slider">
        
        <div class="carousel slide" data-ride="carousel" id="carousel-example">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example" data-slide-to="1"></li>
                <li data-target="#carousel-example" data-slide-to="2"></li>
            </ol>
            
            <div class="carousel-inner" role="listbox">
                <?php 

                $sql = "SELECT * FROM slide ORDER BY ID DESC LIMIT 5";
                $q = $connect->prepare($sql);
                $q->execute();

                $count = 1;

                while($rows = $q->fetch(PDO::FETCH_ASSOC)){ ?>

                    <div class="item slide-pic <?php if( $count == "1") echo "active"; ?>" style="
                                background-image: url('files/images/slider/<?php echo $rows["Photo"]; ?>');
                                background-size: cover !important; 
                                background-repeat: no-repeat !important; 
                                background-position: center !important; ">
                    </div>

                <?php $count++; }
            ?>
            </div>

            <a href="#carousel-example" class="left carousel-control" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a href="#carousel-example" class="right carousel-control" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </section>
    <!--/#main-slider-->
    

    <section id="services">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown header-blue">Product & Services</h2>
                <p class="text-center wow fadeInDown">Select from a range of <strong>products and services</strong> </p>
            </div>

            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    
                <?php 
                    $sql = "SELECT * FROM product GROUP BY Batch ORDER BY ID DESC LIMIT 12";
                    $q = $connect->prepare($sql);
                    $q->execute();
                    $count = 1;

                    if($q->rowCount() > 0){
                        while($r = $q->fetch(PDO::FETCH_ASSOC)){
                    
                            $uid = $r["CreatedBy"];
                            $product = $r["Product"];
                            $pro_title = $r["ProductTitle"];
                            $des = $r["Description"];
                            $price = $r["Price"];
                            $rrp = $r["RRP"];
                            $batch = $r["Batch"];
                            $addedon = $r["AddedOn"];

                            $name = $home->AnyContent("Fname", "users", "ID", $uid)." ".
                            $home->AnyContent("Sname", "users", "ID", $uid);
                        ?>        

                            <!-- show on all desktops but hidden on mobile devices-->
                            <div class="col-sm-6 col-md-3 hidden-xs hidden-sm visible-md visible-lg visible-xl" style="height: 380px">
                                <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                                    <div class="team-img" align="center">
                                        <a href="product-services?dil=product-info&bat=<?php echo $batch; ?>&tit=<?php echo $pro_title; ?>">
                                            <?php 
                                                if(isset($product) && !empty($product)) { ?>
                                                    <img src="files/products/images/<?php echo $product; ?>" class="img-responsive" 
                                                    alt="Avatar not found">
                                                <?php } else { ?>
                                                    <img src="files/products/product-and-services2.png" class="img-responsive" alt="Avatar">
                                                <?php } 
                                            ?>
                                        </a>
                                    </div>
                                  
                                    <div class="team-info">
                                        <a href="product-services?dil=product-info&bat=<?php echo $batch; ?>&tit=<?php echo $pro_title; ?>">
                                            <h5><?php echo $home -> AnyContent("Product", "product_title", "ID", $pro_title); ?></h5>
                                            <h4>
                                                <?php 
                                                    echo isset($price) ? "&#8358;".number_format($price, 2, '.', ',')."<br/>" : "Invalid";
                                                    echo ($rrp > 0 ) ? "<small>&#8358;<del>".number_format($rrp, 2, '.', ',')."</del></small>" : ""; 
                                                ?>
                                            </h4>
                                            <span>
                                                <?php 
                                                    if(isset($des)){
                                                        $string = strip_tags($des);
                                                
                                                        if (strlen($des) > 50) {
                                                            $stringCut = substr($string, 0, 50);
                                                            $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
                                                        }
                                                        $des_string = $string;
                                                    }else{
                                                        $des_string = $des."...";
                                                    }
                                                    echo isset($des_string) ? $des_string : "No description"; 
                                                ?>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- show on all mobile devices but hidden on destops-->
                            <div class="col-sm-6 col-md-3 hidden-md hidden-lg hidden-xl visible-xs visible-sm" style="height: 450px">
                                <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                                    <div class="team-img" align="center">
                                        <a href="product-services?dil=product-info&bat=<?php echo $batch; ?>&tit=<?php echo $pro_title; ?>">
                                            <?php 
                                                if(isset($product) && !empty($product)) { ?>
                                                    <img src="files/products/images/<?php echo $product; ?>" class="img-responsive" 
                                                    alt="Avatar not found" style="height: 300px">
                                                <?php } else { ?>
                                                    <img src="files/products/product-and-services2.png" class="img-responsive" style="height: 300px" alt="Avatar">
                                                <?php } 
                                            ?>
                                        </a>
                                    </div>
                                   
                                    <div class="team-info">
                                        <a href="product-services?dil=product-info&bat=<?php echo $batch; ?>&tit=<?php echo $pro_title; ?>">
                                            <h5><?php echo $home -> AnyContent("Product", "product_title", "ID", $pro_title); ?></h5>
                                            <h4>
                                                <?php 
                                                    echo isset($price) ? "&#8358;".number_format($price, 2, '.', ',')."<br/>" : "Invalid";
                                                    echo ($rrp > 0 ) ? "<small>&#8358;<del>".number_format($rrp, 2, '.', ',')."</del></small>" : ""; 
                                                ?>
                                            </h4>
                                            <span>
                                                <?php 
                                                    if(isset($des)){
                                                        $string = strip_tags($des);
                                                
                                                        if (strlen($des) > 50) {
                                                            $stringCut = substr($string, 0, 50);
                                                            $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
                                                        }
                                                        $des_string = $string;
                                                    }else{
                                                        $des_string = $des."...";
                                                    }
                                                    echo isset($des_string) ? $des_string : "No description"; 
                                                ?>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        <?php }
                    } 
                    else{ ?>
                        <p>No product and service has been uploaded yet! Please check back later</p>
                    <?php } 
                ?> 

                </div>
            </div>

            <div class="divider"></div>

        </div>
        <div style="margin-top:0px" align="center">
            <a class="btn btn-info btn-flat btn-md" href="product-services"><i class="fa fa-shopping-cart"> &raquo; MAIN PAGE</i> </a>
        </div>
        
    </section><!--/#services-->


    <section id="pricing" style="background-color: #c0c0c0; margin-bottom: 60px;">
        <div class="container">
            <div class="row">

                <div class="section-header">
                    <h2 class="section-title text-center wow fadeInDown header-blue">Workers</h2>
                    <p class="text-center wow fadeInDown">Find and connect with your niche.</p>
                </div>

                <div class="carousel slide" id="myCarousel">
                    <div class="carousel-inner">
                        <?php 
                            $sql = "SELECT * FROM worker_slide ORDER BY ID DESC LIMIT 20";
                            $q = $connect->prepare($sql);
                            $q->execute();

                            $count = 1;

                            while($rows = $q->fetch(PDO::FETCH_ASSOC)){ ?>
                                <div class="item <?php if( $count == "1") echo "active"; ?>" >
                                    <div class="col-md-2 col-sm-4">
                                        <a href="workers-niche?wid=<?php echo $rows["ID"]; ?>" class="reg">
                                            <img style="height: 100%; width:100%" src="files/images/slider/<?php echo $rows["Photo"]; ?>" class="img-responsive">
                                            <h3 style="color: #000040; text-align: center;"><?php echo $rows["Title"]; ?></h3>  
                                        </a> 
                                    </div>
                                </div>
                            <?php $count++; } 
                        ?>

                    </div>
                </div><!--/#carousel-->

            </div>
        </div>
    </section><!--/#pricing-->


    <section id="animated-number">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown header-blue">Gallery</h2>
                <p class="text-center wow fadeInDown">Check out some pictures on workers on duty </p>
            </div>

            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="gallery" >
                        <?php 
                            $sql = "SELECT * FROM gallery ORDER BY ID DESC LIMIT 20";
                            $q = $connect->prepare($sql);
                            $q->execute();
                            $count = 1;

                            $check = $q->fetch(PDO::FETCH_ASSOC);
                            // Generate gallery view of the images
                            if(!empty($q)){
                                foreach($q as $key => $row){ 
                               
                                    $imageURL = 'files/gallery/img/';
                                    $jk = $row["Photo"]; ?>
                                    
                                    <a href="<?php echo $imageURL . $jk; ?>" data-fancybox="gallery" data-caption="<?php echo $jk; ?>" >
                                        <div style="padding: 3px; float: left;">
                                            <img height="130px" src="<?php echo $imageURL . $jk; ?>" alt="<?php echo $jk; ?>" />
                                        </div>
                                    </a>
                                <?php }
                             } 
                            else{ ?>
                                <p>No image found!</p>
                            <?php } 
                        ?> 
                    </div>
                </div>
            </div>

            <div class="divider"></div>

        </div>
        <div style="margin-top:0px" align="center">
            <a class="btn btn-warning btn-flat btn-sm" href="gallery"><i class="fa fa-picture-o"> VIEW ALL</i> </a>
        </div>
        
    </section><!--/#gallery-->


    <section id="blog">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown header-blue">Latest Blogs</h2>
                <p class="text-center wow fadeInDown">DilyasTrend Information place <br> Get updated and inspired</p>
            </div>

            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">

                    <?php 
                        $sql = "SELECT * FROM blog ORDER BY ID DESC LIMIT 3"; 
                        $q_alb = $connect->prepare($sql); 
                        $q_alb->execute();

                        if($q_alb) {
                            foreach($q_alb as $key => $r){ ?>
                        
                                <div class="blog-post blog-large wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="0ms">
                                    <article>
                                        <header class="entry-header">
                                            <div class="entry-thumbnail">

                                                <?php if (empty($r["Photo"])  == TRUE) { echo ""; } 
                                                    else { ?>
                                                        <div  align="center">
                                                            <a href="blog?one=story&amp=<?php echo $r["ID"]; ?>" class="img">
                                                                <img src="files/images/blog/<?php echo $r["Photo"]; ?>" alt="Photo" class="img-responsive blog-pic">
                                                            </a>
                                                        </div>
                                                    <?php } 
                                                ?>

                                                <span class="post-format post-format-gallery"><i class="fa fa-image"></i></span>
                                            </div>

                                            <div class="entry-date">
                                                <?php echo date("j M Y", strtotime($r["AddedOn"])) .", ". date("G:ia", strtotime($r["AddedOn"])); ?>
                                            </div>

                                            <h2 class="entry-title">
                                                <a href="blog?one=story&amp=<?php echo $r["ID"]; ?>"><?php echo $r["Title"]; ?></a>
                                            </h2>
                                        </header>

                                        <div class="entry-content">
                                            <P>
                                                <?php 
													//strip tags to avoid breaking any html
                                                    $string = $r["Message"];
                                                    $string = strip_tags($string);

                                                    $checkstr = strlen($string) > 200;

                                                    if ($checkstr == TRUE) {

                                                        // truncate string
                                                        $stringCut = substr($string, 0, 200);

                                                        // make sure it ends in a word so assassinate doesn't become ass...
                                                        $fd= substr($stringCut, 0, strrpos($stringCut, ' '));
                                                        $string = $fd;
                                                    } 
                                                    echo $string;
                                                    if ($checkstr == TRUE) { ?>
                                                        <br/><a class="btn btn-primary" href="blog?one=story&amp=<?php echo $r["ID"]; ?>">Read More</a>
                                                    <?php }
												?>
                                            </P>
                                            
                                        </div>

                                        <footer class="entry-meta">
                                            <span class="entry-author"><i class="fa fa-pencil"></i> <a href="#">
										        <?php $home = new Crud($connect);
											        echo $home->AnyContent("Fname", "users", "ID", $r["UID"]);
                                                ?></a>
                                            </span>
                                            <span class="entry-category"><i class="fa fa-folder-o"></i> 
                                                <a href="#">
                                                    <?php $home = new Crud($connect);
                                                        echo $home->AnyContent("Category", "category", "ID", $r["Category"]);
                                                    ?>
                                                </a>
                                            </span>
                                            <span class="entry-comments"><i class="fa fa-comments-o"></i> <a href="#">
                                                <?php echo FetchIndividualContent(7, $r["ID"]) ?> comment(s)</a>
                                            </span>
                                        </footer>
                                    </article>
                                </div>

                            <?php }
                        }else{ ?>
                        <h3>Nothing to display!</h3>
                    <?php } ?>

                </div><!--/.col-sm-6-->
            </div>
        </div>
    </section>


    <section id="testimonial">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown"><span style="color: #fff;">Testimonials</span></h2>
                <p class="text-center wow fadeInDown">Check out comments from some satisfied users</p>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <div id="carousel-testimonial" class="carousel slide text-center" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="clear-fix"></div>
                            <div class="item active">
                                <p>
                                    <img class="img-circle img-thumbnail" height="100px" width="100px" src="files/images/profilepics/f375e5dd946d200175e93725d33729b4.jpg" alt="">
                                </p>
                                <h4>Samson Chisom</h4>
                                <small>Web Developer, CNScomputers</small>
                                <p>DilyasTrend is my first and last stop anytime I need to get something done quick and easy. Artisans here are just too good!</p>
                            </div>
                            <div class="clear-fix"></div>
                            <div class="clear-fix"></div>
                            <div class="clear-fix"></div>
                            <div class="clear-fix"></div>
                            <div class="clear-fix"></div>
                            <div class="item">
                                <p>
                                    <img class="img-circle img-thumbnail" height="100px" width="100px" src="files/images/profilepics/default.png" alt="">
                                </p>
                                <h4>Rose, David</h4>
                                <small>Treatment, storage, and disposal (TSD) worker</small>
                                <p>When I need someone to hire in order to get jobs done, I come here. The process of hiring and getting hired is easy and fast. I just love this App!</p>
                            </div>
                            <div class="clear-fix"></div>
                            <div class="clear-fix"></div>
                            <div class="clear-fix"></div>
                            <div class="clear-fix"></div>
                        </div>

                        <!-- Controls -->
                        <div class="btns">
                            <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="prev">
                                <span class="fa fa-angle-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="next">
                                <span class="fa fa-angle-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#testimonial-->

   
    <section id="get-in-touch">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown header-blue">Get in Touch</h2>
                <p class="text-center wow fadeInDown">We'll Love to hear from YOU</p>
            </div>
        </div>
    </section><!--/#get-in-touch-->


    <section id="contact">
        <div id="google-map" style="height:850px" data-latitude="52.365629" data-longitude="4.871331"></div>
        <div class="container-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="contact-form">
                            <h3>Contact Information</h3>

                            <address>
                              <strong>Office Address:</strong><br>
                              Lagos State, <br/> Nigeria<br><br/>
                             <b>Email:</b><br/> info@dilyastrend.com<br/> advert@dilyastrend.com<br/><br>
                                <b>Phone:</b><br/> (+234) 8180977065<br/> 
                                                    (+234) 8027754333<br/> 
                                                    (+234) 8081101283<br/>
                                                    (+234) 7033229178
                            </address>
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-0">
                        <div class="contact-form">
                            <h3>Leave A Message</h3>

                            <?php echo isset($response) ? $response : ""; ?>
                            
                            <form name="contact-form" method="POST" action="#">
                                <div class="form-group">
                                    <input class="form-control" minlength="2" maxlength="20" type="text" required name="Fullname" placeholder="Enter Full Name">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" minlength="6" maxlength="40" type="email" name="Email" placeholder="Enter Email" required>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" minlength="3" maxlength="15" type="text" name="Phone" placeholder="Enter Phone number">
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" minlength="10" maxlength="500" required name="Message" placeholder="Enter Message"></textarea>
                                </div>

                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="<?php echo $user_cl->googleKeys(2); ?>"></div>
                                </div>

                                <button type="submit" class="btn btn-primary">Send Message</button>
                                <input type="hidden" name="INSERT" value="9">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#bottom-->

    <?php include("footer.php"); ?>