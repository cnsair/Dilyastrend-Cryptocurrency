<?php 
	$page = "sresult";
	include("header.php");
?>

<section id="meet-team" style="margin: 0 0 10% 0">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Search Result</h2>
            <p class="text-center wow fadeInDown">Result on
                <strong> <?php 
                            $home = new Crud($connect);

                            $s_term = $_GET["s"];
                            echo $s_term;
                        ?>
                </strong> 
            </p>
        </div>
      
        <div class="row">
            <?php      

            //WORKER SLIDE QUERY = q1         
            try{
                $sql1 = "SELECT * FROM worker_slide WHERE MATCH (Title) AGAINST ('$s_term' IN BOOLEAN MODE) ORDER BY ID DESC LIMIT 10";
                $q1 = $connect->prepare($sql1);
                $q1->execute();
            }
            catch (PDOException $e) 
            { echo $e->getMessage(); }

            //GALLERY QUERY = q2           
            try{
                $sql2 = "SELECT p.*, k.Album FROM gallery p LEFT JOIN album k on p.Album = k.ID WHERE MATCH (p.Photo, k.Album) AGAINST ('$s_term' IN BOOLEAN MODE) ORDER BY ID DESC LIMIT 10";
                $q2 = $connect->prepare($sql2);
                $q2->execute();
            }
            catch (PDOException $e) 
            { echo $e->getMessage(); }

            //BLOG QUERY = q3            
            try{
                $sql3 = "SELECT p.*, k.Category FROM blog p LEFT JOIN category k on p.Category = k.ID WHERE MATCH (p.Title, p.Message, p.Fname, k.Category) AGAINST ('$s_term' IN BOOLEAN MODE) ORDER BY ID DESC LIMIT 10"; 
                $q3 = $connect->prepare($sql3); 
                $q3->execute();
            }
            catch (PDOException $e) 
			{ echo $e->getMessage(); }

            //PRODUCT QUERY = q4            
            try{
                $sql4 = "SELECT p.*, k.Product, p.Product as ProPic FROM product p LEFT JOIN product_title k on p.ProductTitle = k.ID WHERE MATCH (p.Product, p.Description, p.Batch, p.Price, p.RRP, p.PriceTo, k.Product) AGAINST ('$s_term' IN BOOLEAN MODE) ORDER BY p.ID DESC LIMIT 10"; 
                $q4 = $connect->prepare($sql4); 
                $q4->execute();
            }
            catch (PDOException $e) 
			{ echo $e->getMessage(); }

            $count = 1;

            if($q1->rowCount() > 0 || $q2->rowCount() > 0 || $q3->rowCount() > 0 || $q4->rowCount() > 0){
            
                //Loop for workers slide
                if($q1->rowCount() > 0){
                    echo "
                        <div class='col-md-9'>
                            <h3 style='text-align: center'>Workers Niche</h3>";
                            while($rows = $q1->fetch(PDO::FETCH_ASSOC)){ ?>
                                
                                <div class="item <?php if( $count == "1") echo "active"; ?>" >
                                    <div class="col-md-3 col-sm-4">
                                        <a href="workers-niche?wid=<?php echo $rows["ID"]; ?>" class="reg">
                                            <img style="height: 100%; width:100%" src="files/images/slider/<?php echo $rows["Photo"]; ?>" class="img-responsive">
                                            <h5 style="color: #000; text-align: center;"><?php echo $rows["Title"]; ?></h5>  
                                        </a> 
                                    </div>
                                </div>

                            <?php $count++; } 
                    echo "</div>";
                }

                //Loop for gallery
                if($q2->rowCount() > 0){
                    echo "
                        <div class='col-md-12'>
                            <h3 style='text-align: center'>Gallery</h3>";
                            foreach($q2 as $key => $row){ 
                        
                                $imageURL = 'files/gallery/img/';
                                $jk = $row["Photo"]; ?>
                                <div class="container">
                                    <a href="<?php echo $imageURL . $jk; ?>" data-fancybox="gallery" data-caption="<?php echo $jk; ?>" >
                                        <div style="padding: 3px; float: left; display: inline;">
                                            <img height="150px" src="<?php echo $imageURL . $jk; ?>" alt="Photo" /><br/>
                                            <small style="text-align: center;"><?php echo $jk; ?></small>
                                        </div>
                                    </a>
                                </div>
                            <?php }
                    echo "</div>";
                }

                //Loop for Blog
                if($q3->rowCount() > 0){
                    echo "
                        <div class='col-md-12'>
                            <h3 style='text-align: center'>Blog</h3>";
                            foreach($q3 as $key => $r){ ?>

                                <div class="blog-post blog-media wow fadeInRight" data-wow-duration="300ms" data-wow-delay="100ms">
                                    <article class="media clearfix">
                                        <div class="entry-thumbnail pull-left">
                                            <!-- <img class="img-responsive" src="images/blog/02.jpg" alt=""> -->
                                            <?php if (empty($r["Photo"])  == TRUE) { echo ""; } 
                                                else { ?>
                                                    <div style="text-align: center">
                                                        <a href="blog?one=story&amp=<?php echo $r["ID"]; ?>" class="img">
                                                            <img style="height: 200px" src="files/images/blog/<?php echo $r["Photo"]; ?>" alt="Photo" class="img-responsive blog-pic">
                                                        </a>
                                                    </div>
                                                <?php } 
                                            ?>
                                        </div>
                                        <div class="media-body">
                                            <header class="entry-header">
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
                                                    ?>
                                                </P>
                                                <a class="btn btn-primary" href="#">
                                                    <?php 
                                                        if ($checkstr == TRUE) { ?>
                                                            <br/><a class="btn btn-primary" href="blog?one=story&amp=<?php echo $r["ID"]; ?>">Read More</a>
                                                        <?php }
                                                    ?>
                                                </a>
                                            </div>

                                            <footer class="entry-meta">
                                                <span class="entry-author"><i class="fa fa-pencil"></i> <a href="#">
                                                    <?php 
                                                        echo $home->AnyContent("Fname", "users", "ID", $r["UID"]);
                                                    ?></a>
                                                </span>
                                                <span class="entry-category"><i class="fa fa-folder-o"></i> 
                                                    <a href="#">
                                                        <?php 
                                                            echo $home->AnyContent("Category", "category", "ID", $r["Category"]);
                                                        ?>
                                                    </a>
                                                </span>
                                                <span class="entry-comments"><i class="fa fa-comments-o"></i> <a href="#">
                                                    <?php echo FetchIndividualContent(7, $r["ID"]) ?> comment(s)</a>
                                                </span>
                                            </footer>
                                        </div>
                                    </article>
                                </div>
                                &nbsp;&nbsp;&nbsp;
                            <?php }
                    echo "</div>";
                }

                //Loop for products
                if($q4->rowCount() > 0){
                    echo "
                        <div class='col-md-12'>
                            <h3 style='text-align: center'>Products and Services</h3>";

                            foreach($q4 as $key => $r4){ 
                                $pro_tit = $r4["ProductTitle"];
                                $batch = $r4["Batch"];
                                $pro_title = $home->AnyContent("Product", "product_title", "ID", $r4["ProductTitle"]);

                                if(isset($batch) AND !empty($batch) AND isset($pro_title) AND !empty($pro_title)) { ?>
                        
                                    <div class="col-sm-6 col-md-3" style="height: 500px">
                                        <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="0ms">
                                            <ul class="pricing">
                                                <p class="plan-header">
                                                    <h4 style="text-align: center;">
                                                        <a href="product-services?dil=product-info&bat=<?php echo $batch; ?>&tit=<?php echo $pro_tit; ?>"><?php echo $pro_title; ?></a>
                                                    </h4>
                                                    <div class="plan-name">
                                                        <a href="product-services?dil=product-info&bat=<?php echo $batch; ?>&tit=<?php echo $pro_tit; ?>">
                                                            <?php $photo = $r4["ProPic"];
                                                                if(isset($photo) && !empty($photo)) { ?>
                                                                    <img src="files/products/images/<?php echo $photo; ?>" class="img-responsive" 
                                                                    alt="Photo not found" style="height: 300px">
                                                                <?php } else { ?>
                                                                    <img src="files/products/product-and-services2.png" class="img-responsive" style="height: 300px" alt="Photo">
                                                                <?php } 
                                                            ?>
                                                        </a>
                                                    </div>
                                                    <div class="price-duration">
                                                        <span class="price">
                                                            <?php 
                                                                $price = $r4["Price"];
                                                                $rrp = $r4["RRP"];
                                                                echo isset($price) ? "<b>&#8358;".number_format($price, 2, '.', ',')."</b><br/>" : "Invalid";
                                                                echo ($rrp > 0 ) ? "&#8358;<del>".number_format($rrp, 2, '.', ',')."</del>" : "";  
                                                            ?>
                                                        </span>
                                                    </div>
                                                </p>
                                                <p>
                                                    <?php $des = $r4["Description"]; 
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
                                                    ?><br/>
                                                </p>

                                                <p>
                                                    <strong>Advertiser:</strong> 
                                                    <?php echo $home -> AnyContent("Fname", "users", "ID", $r4["CreatedBy"]) ." ". $home -> AnyContent("Sname", "users", "ID", $r4["CreatedBy"]); ?><br/>
                                                    <?php echo $home -> AnyContent("Role", "users", "ID", $r4["CreatedBy"]); ?>
                                                </p>
                                            </ul>
                                        </div>
                                    </div>  

                                <?php }
                            }
                    echo "</div>";
                }
            }  
            else{ //IF NO RESULT IS FOUND FOR SEARCH TERM ?>
                <div class="col-md-9">
                    <h3 style="text-align: center">Your search term returned no result. Please try another</h3>
                </div>
            <?php } 
            ?> 
          
            <!-- <div class="col-md-3">
                <div id="main-slider">
                
                    <p align="center">Sponsored Ads</p>
                    <div id="carousel-example" class="carousel slide" data-ride="carousel">
                        
                        <div class="carousel-inner" role="listbox">
                            <?php 
                                $sql ="SELECT * FROM advert WHERE Type = 2 AND Active = 1";
                                $q = $connect->prepare($sql); 
                                $q->execute();
                                $count = 1;

                                if($q->rowCount() < 1)
                                { ?>
                                    <div>
                                        <img class="img-responsive" style='height: 100%; width: 100%;' src="files/images/advert/icons/advert-test.png" >
                                    </div>
                                <?php }
                                else
                                {
                                    while ($row = $q->fetch(PDO::FETCH_ASSOC)) { ?>

                                        <div class="item slide-pic <?php if( $count == "1" ) echo "active"; ?>" >
                                            <a href="#<?php echo $row["CompanyWebsite"]; ?>" target="_blank"> 
                                                <img class="img-responsive" style='height: 100%; width: 100%;' src="files/images/advert/<?php echo $row["Photo"]; ?>" alt="Sponsored Ads">
                                            </a>
                                        </div>
                                    
                                    <?php $count++;
                                    }
                                }
                            ?>
                        </div>
                    </div>
            </div>
          </div> -->

        </div><!--/row-->
    </div><!--/container-->
</section><!--/search-->













<?php 
	include("footer.php");
?>