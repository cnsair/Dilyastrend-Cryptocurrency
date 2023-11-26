<?php 
	$page = "gallery";
	include("header.php");
?>

<section id="get-in-touch" style="background: red">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown header-white">GALLERY</h2>
            <p class="text-center wow fadeInDown">What just want to let you see this</p>
        </div>
    </div>
</section>

<section id="gallery" style="margin: 0 0 17% 0">
    <div class="container">
        
        <div class="gallery" >
            <?php 
                $sql = "SELECT * FROM gallery ORDER BY ID DESC LIMIT 100";
                $q = $connect->prepare($sql);
                $q->execute();
                $count = 1;

                $check = $q->fetch(PDO::FETCH_ASSOC);
                    // Generate gallery view of the images
                    if(!empty($q)){
                    foreach($q as $key => $row){ 
                        $imageURL = 'files/gallery/img/';

                        $galid = $row["ID"];
                        $jk = $row["Photo"];
                        $jk = explode(",", $jk);
                        
                        foreach ($jk as $key) { ?>
                        
                            <a href="<?php echo $imageURL . $key; ?>" data-fancybox="gallery" data-caption="<?php echo $key; ?>" >
                                <div style="padding: 3px; float: left;">
                                    <img height="130px" src="<?php echo $imageURL . $key; ?>" alt="Photo" />
                                </div>
                            </a>
                                
                        <?php } ?>
                    <?php }
                } 
                else{ ?>
                        <p>No image found!</p>
                    <?php } 
            ?> 
        </div>
        <div class="divider"></div>
    </div>
</section><!--/#pricing-->






<?php 
	include("footer.php");
?>