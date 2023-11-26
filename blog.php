<?php
	$page = "blog";
    include_once("header.php");
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

<!-- content begin -->
<div class="no-bottom no-top" id="content">
    <div id="top"></div>
    
    <?php if( $page == "blog" && !isset($_GET["one"]) ) { ?>

        <!-- section begin -->
        <section id="subheader">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>Blog</h1>
                            <p>We have a lot to let you know</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

    <?php } ?>
    
    <!-- section begin -->
    <section aria-label="section">
        <div class="container">
            <div class="row ">

                <!--============================================================================ 
                                        ALL NEWS
                =================================================================================-->

                <?php if( !isset($_GET["one"]) || $_GET["one"] == "") { ?>

                    <?php 
                        $home = new Crud($connect);

                        $perpage = 6;

                        if (isset($_GET["page"])) 
                        {
                            $page = intval($_GET["page"]);
                        }
                        else
                        {
                            $page = 1;
                        }

                        $calc = $perpage * $page;
                        $start = $calc - $perpage;

                        $sql = "SELECT * FROM blog ORDER BY ID DESC LIMIT $start, $perpage";
                        $q = $connect->prepare($sql); 
                        $q->execute();
                        
                        while($r = $q->fetch(PDO::FETCH_ASSOC)) {  ?>

                            <div class="col-lg-4 col-md-6 mb30">
                                <div class="bloglist item">
                                    <div class="post-content">
                                        <div class="post-image">
                                            <?php if (empty($r["Photo"])  == TRUE) { echo ""; } 
                                                            
                                                else { ?>
                                                    <img src="files/images/blog/<?php echo $r["Photo"]; ?>" class="img-responsive blog-pic" alt="Story photo">
                                                <?php } 
                                            ?>
                                        </div>
                                        <div class="post-text">
                                            <span class="p-tagline">
                                                <a href="blog?one=category&amp=<?php echo $r["Category"]; ?>" rel="category">
                                                    <i class="fa fa-book"></i> 
                                                    <?php echo $home->AnyContent("Category", "category", "ID", $r["Category"]); ?>
                                                </a>
                                            </span>

                                            <span class="p-date">
                                                <?php echo date("j M, Y", strtotime($r["AddedOn"])); ?>; 
                                                <?php echo date("g:i a", strtotime($r["AddedOn"])); ?>
                                            </span>

                                            <h4><a href="blog?one=story&amp=<?php echo $r["ID"]; ?>">
                                                <?php echo $r["Title"]; ?>
                                            </a></h4>

                                            <p>
                                                <?php  
                                                    // strip tags to avoid breaking any html
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
                                            </p>

                                            <?php
                                                if($checkstr == TRUE){ ?>
                                                <a href="blog?one=story&amp=<?php echo $r["ID"]; ?>" class="btn-main">Continue Reading ></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } //while loop ?>        

                        <div class="spacer-single"></div>
                                    
                        <ul class="pagination">

                            <?php if(isset($page))
                            {
                                $result = "SELECT COUNT(ID) as Total FROM blog ORDER BY ID DESC LIMIT $start, $perpage";
                                $q = $connect->prepare($result); 
                                $q->execute();
                                $rows = $q->fetch(PDO::FETCH_ASSOC);

                                $total =$rows["Total"];
                                $totalpages = ceil($total/$perpage);
                                $mycounter = 1;

                                if($page <=1)
                                {
                                    echo "<li><li><a href='#'>&laquo; Prev</a></li>";
                                }
                                else
                                {
                                    $j = $page -1;
                                    echo "<li><a href='blog?page=$j'>&laquo; Prev </a></li>";
                                }

                                for ( $i = 1; $i <= $totalpages ; $i++ ) { 

                                    if( $i <> $page )
                                    {
                                        if($mycounter < 6)
                                        {
                                            echo "<li><a href='blog?page=$i'>$i</a></li>" ;
                                        }
                                        else
                                        {
                                            // echo "<li><a href='index.php?page=$i'>$i</a></li>" ;
                                        }
                                    }
                                    else
                                    {
                                            echo "<li><a href='#'>$i</a></li>";
                                    }

                                    $mycounter++;
                                }

                                if($page==$totalpages)
                                {
                                    echo "<li>Next</li>";
                                }
                                else
                                {
                                    $j = $page +1;
                                        echo "<li><a href='blog?page=$j' >Next &raquo;</a></li>";
                                }
                            } // Pagination ?>  


                        </ul>

                <?php } ?>





                <!--============================================================================ 
                                            CATEGORIES
                =================================================================================-->

                <?php if( isset($_GET["amp"]) && $_GET["one"] == "category" ) { ?>

                    <?php 

                        $home = new Crud($connect);
                        $cat_id = $_GET["amp"];
                        $cati_name = $home->AnyContent("Category", "category", "ID", $cat_id );

                    ?>
    
                    <!-- section begin -->
                    <section id="subheader">
                        <div class="center-y relative text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h1><?php echo ucfirst($cati_name); ?></h1>
                                        <p>CATEGORY</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- section close -->

                    <?php 	
                        $perpage = 6;

                        if (isset($_GET["page"])) 
                        {
                            $page = intval($_GET["page"]);
                        }
                        else
                        {
                            $page = 1;
                        }

                        $calc = $perpage * $page;
                        $start = $calc - $perpage;

                        $sql = "SELECT * FROM blog WHERE Category = '".$cat_id."' ORDER BY ID DESC LIMIT $start, $perpage";
                        $q = $connect->prepare($sql); 
                        $q->execute();
                        
                        while($r = $q->fetch(PDO::FETCH_ASSOC)) {  ?>

                            <div class="col-lg-4 col-md-6 mb30">
                                <div class="bloglist item">
                                    <div class="post-content">
                                        <div class="post-image">
                                            <?php if (empty($r["Photo"])  == TRUE) { echo ""; } 
                                                            
                                                else { ?>
                                                    <img src="files/images/blog/<?php echo $r["Photo"]; ?>" class="img-responsive blog-pic" alt="Story photo">
                                                <?php } 
                                            ?>
                                        </div>
                                        <div class="post-text">
                                            <!-- <span class="p-tagline">
                                                <a href="blog?one=category&amp=<?php echo $r["Category"]; ?>" rel="category">
                                                    <i class="fa fa-book"></i> 
                                                    <?php echo $home->AnyContent("Category", "category", "ID", $r["Category"]); ?>
                                                </a>
                                            </span> -->

                                            <span class="p-date">
                                                <?php echo date("j M, Y", strtotime($r["AddedOn"])); ?>; 
                                                <?php echo date("g:i a", strtotime($r["AddedOn"])); ?>
                                            </span>

                                            <h4><a href="02_dark-news-single.html">
                                                <?php echo $r["Title"]; ?>
                                            </a></h4>

                                            <p>
                                                <?php  
                                                    // strip tags to avoid breaking any html
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
                                            </p>

                                            <?php
                                                if($checkstr == TRUE){ ?>
                                                <a href="blog?one=story&amp=<?php echo $r["ID"]; ?>" class="btn-main">Continue Reading ></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } //while loop ?>        

                        <div class="spacer-single"></div>
                                    
                        <ul class="pagination">

                            <?php if(isset($page))
                            {
                                $result = "SELECT COUNT(ID) as Total FROM blog WHERE Category = '".$cat_id."' ORDER BY ID DESC LIMIT $start, $perpage";
                                $q = $connect->prepare($result); 
                                $q->execute();
                                $rows = $q->fetch(PDO::FETCH_ASSOC);

                                $total =$rows["Total"];
                                $totalpages = ceil($total/$perpage);
                                $mycounter = 1;

                                if($page <=1)
                                {
                                    echo "<li><li><a href='#'>&laquo; Prev</a></li>";
                                }
                                else
                                {
                                    $j = $page -1;
                                    echo "<li><a href='blog?page=$j'>&laquo; Prev </a></li>";
                                }

                                for ( $i = 1; $i <= $totalpages ; $i++ ) { 

                                    if( $i <> $page )
                                    {
                                        if($mycounter < 6)
                                        {
                                            echo "<li><a href='blog?page=$i'>$i</a></li>" ;
                                        }
                                        else
                                        {
                                            // echo "<li><a href='index.php?page=$i'>$i</a></li>" ;
                                        }
                                    }
                                    else
                                    {
                                            echo "<li><a href='#'>$i</a></li>";
                                    }

                                    $mycounter++;
                                }

                                if($page==$totalpages)
                                {
                                    echo "<li>Next</li>";
                                }
                                else
                                {
                                    $j = $page +1;
                                        echo "<li><a href='blog?page=$j' >Next &raquo;</a></li>";
                                }
                            } // Pagination ?>  

                        </ul>

                <?php } ?>





                <!--============================================================================ 
                                        COMLPETE STORY
                =================================================================================-->

                <?php if( isset($_GET["amp"]) && $_GET["one"] == "story" ) {  

                    $home = new Crud($connect);
                    $id = $_GET["amp"];
                    $cati = $home->AnyContent("Category", "category", "ID", $id );

                    $sql = "SELECT * FROM blog WHERE ID = '".$id."' ";
                    $q = $connect->prepare($sql); 
                    $q->execute();

                    while($r = $q->fetch(PDO::FETCH_ASSOC)) {  ?>

                        <!-- section begin -->
                        <section id="subheader">
                            <div class="center-y relative text-center">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h1><?php echo $r["Title"]; ?></h1>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- section close -->

                        <div class="col-md-8">
                            <div class="blog-read">
                        
                                <?php if (empty($r["Photo"])  == TRUE) { echo ""; } 
                                    else{ ?>
                                        <img src="files/images/blog/<?php echo $r["Photo"]; ?>" class="img-fullwidth rounded" alt="photo">
                                    <?php } 
                                ?>

                                <div class="post-text">
                                    <?php echo htmlspecialchars_decode($r["Message"]); ?>

                                    <span class="post-date">
                                        <i class="fa fa-calendar"></i> <?php echo date("j M, Y", strtotime($r["AddedOn"])); ?>
                                    </span> 
                                    &nbsp; &nbsp;
                                    <span class="post-comment"><?php echo FetchIndividualContent(7, $r["ID"]) ?> comment(s)</span>
                                </div>

                            </div><!-- blog-read -->

                            <div class="spacer-single"></div>

                            <div id="blog-comment">
                                <h4>Comments (<?php echo FetchIndividualContent(7, $r["ID"]) ?>)</h4>

                                <div class="spacer-half"></div>


                                <?php
                                $home = new Crud($connect);
                                $blogid = $r["ID"];

                                $comsql = "SELECT * FROM blog_com WHERE BlogID = '".$blogid."' ORDER BY ComID ASC LIMIT 20";
                                $queryp = $connect->prepare($comsql);
                                $queryp->execute();
                                
                                while ($rep = $queryp->fetch(PDO::FETCH_ASSOC)) { ?>

                                    <ol>
                                        <li>
                                            <?php 

                                            $ui_d = $home->AnyContent("ID", "users", "ID", $rep["UID"]);
                                            $acc_lv = $home->AnyContent("AccessLevel", "users", "ID", $rep["AccessLevel"]);

                                            //If user exists in DB
                                            if( (isset($ui_d) && $ui_d == TRUE) && (isset($acc_lv) && $acc_lv == TRUE) ) { 

                                                $kk2 = $home->AnyContent("Photo", "users", "ID", $rep["UID"]); ?>

                                                <div class="avatar">                                                    
                                                    <?php if(!empty($kk2)) { ?>

                                                        <img src="files/images/profilepics/<?php echo $kk2; ?>" style="height: 5em" class="img-circlez avatarz" alt="<?php echo $rep["CreatedBy"]; ?>">

                                                    <?php } else { ?>

                                                        <img src="files/images/profilepics/default.png" style="height: 5em"  class="img-circlez avatarz" alt="Avatar">

                                                    <?php } ?>
                                                </div>

                                                <div class="comment-info">
                                                    <span class="c_name">
                                                        <?php 
                                                            echo "<b>".$home->AnyContent("Fname", "users", "ID", $rep["UID"])." ".$home->AnyContent("Sname", "users", "ID", $rep["UID"]). "</b>";
                                                        ?>
                                                    </span>
                                                    <span class="c_date id-color-2">
                                                        <?php echo date("j-M", strtotime($rep["AddedOn"])); ?>, <?php echo date("g:i a",strtotime($rep["AddedOn"])); ?>
                                                    </span>
                                                    <div class="clearfix"></div>
                                                </div>

                                                <div class="comment">
                                                    <?php echo $rep["Message"]; ?>
                                                </div>

                                            <?php  } else{ ?>

                                                <div class="avatar">

                                                    <img src="files/images/profilepics/default.png" style="height: 5em"  class="img-circlez avatarz" alt="Avatar">

                                                </div>

                                                <div class="comment-info">
                                                    <span class="c_name">
                                                        <?php echo $rep["CreatedBy"]; ?>
                                                    </span>

                                                    <span class="c_date id-color-2">
                                                        <?php echo date("j-M", strtotime($rep["AddedOn"])); ?>, <?php echo date("g:i a",strtotime($rep["AddedOn"])); ?>
                                                    </span>
                                                    <div class="clearfix"></div>
                                                </div>

                                                <div class="comment" style="color: #ffffff !important">
                                                    <?php echo $rep["Message"]; ?>
                                                </div>

                                            <?php } ?>
                                        
                                        </li>

                                    </ol>

                                <?php  }  ?>

                                <div class="spacer-single"></div>

                                <div id="comment-form-wrapper">
                                    <h4>Leave a Comment</h4>
                                    <div class="comment_form_holder">
                                        <form id="contact_form" name="form1" class="form-border" method="post" action="">
                                            <?php 
                                                if (isset($_SESSION["duid"])){
                                                    $name = $home->AnyContent("Fname", "users", "ID", $_SESSION["duid"]);
                                                    $uid = $home->AnyContent("ID", "users", "ID", $_SESSION["duid"]);
                                                    $acclev = $home->AnyContent("AccessLevel", "users", "ID", $_SESSION["duid"]);
                                                }else{
                                                    $name = "Anonymous";
                                                    $uid = "0";
                                                    $acclev = "0";
                                                }
                                            ?>

                                            <input type="hidden" name="INSERT" value="11">
                                            <input type="hidden" name="BlogID" value="<?php echo $blogid; ?>">
                                            <input type="hidden" name="AccessLevel" value="<?php echo $acclev; ?>">
                                            <input type="hidden" name="UID" value="<?php echo $uid; ?>">

                                            <label>Name</label>
                                            <input minlength="2" maxlength="12" type="text" name="CreatedBy" id="name" class="form-control" />

                                            <label>Message <span class="req">*</span></label>
                                            <textarea maxlength="1000" name="Message" placeholder="Comment here.." class="form-control"></textarea>

                                            <p id="btnsubmit">
                                                <input type="submit" id="send" value="Send" class="btn btn-main" />
                                                <!-- <input type="submit" class="btn btn-default btn-md" value="comment"> -->
                                            </p>

                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <div id="sidebar" class="col-md-4">
                            <div class="widget widget-post">
                                <h4>Recent Posts</h4>
                                <div class="small-border"></div>
                                <ul>
                                    <?php 
                                        //$cc = new Crud($connect);
                                        $sql="SELECT * FROM blog ORDER BY ID ASC LIMIT 10"; 
                                        $q = $connect->prepare($sql); 
                                        $q->execute();
                                        while($r = $q->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <li>
                                                <span class="date">
                                                    <?php echo date("M j", strtotime($r["AddedOn"])); ?>
                                                    <?php //echo date("g:i a", strtotime($r["AddedOn"])); ?>
                                                </span>
                                                <a href="blog?one=story&amp=<?php echo $r["ID"]; ?>"><?php echo $r["Title"]; ?> </a>
                                            </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <div class="widget widget_tags">
                                <h4>Tags</h4>
                                <div class="small-border"></div>
                                <ul>
                                    <li><a href="#link">Art</a></li>
                                    <li><a href="#link">Application</a></li>
                                    <li><a href="#link">Design</a></li>
                                    <li><a href="#link">Entertainment</a></li>
                                    <li><a href="#link">Crypto</a></li>
                                    <li><a href="#link">Internet</a></li>
                                    <li><a href="#link">Marketing</a></li>
                                    <li><a href="#link">Blockchain</a></li>
                                    <li><a href="#link">Multipurpose</a></li>
                                    <li><a href="#link">Music</a></li>
                                    <li><a href="#link">Print</a></li>
                                    <li><a href="#link">Programming</a></li>
                                    <li><a href="#link">Responsive</a></li>
                                    <li><a href="#link">Website</a></li>
                                </ul>
                            </div>

                        </div>


                    <?php } //while loop ?>   
        
            
                <?php } ?>






            </div><!-- row -->

        </div>
    </section>

</div>
<!-- content close -->

<?php
    include_once("footer.php");
?>

