<div class="col-sm-3">

    <div class="card card-stats">
        <div class="card-body ">

            <div id="sticky-anchor"></div>
            <div class="" >
                <p align="center">Sponsored Ads</p>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    
                    <div class="carousel-inner" role="listbox">
                        <?php 
                            $sql ="SELECT * FROM advert WHERE Type = 2 AND Active = 1";
                            $q = $connect->prepare($sql); 
                            $q->execute();
                            $count = 1;

                            if($q->rowCount() < 1)
                            { ?>
                                <div>
                                    <img class="img-responsive" style='height: 100%; width: 100%;' src="../../files/images/advert/icons/advert-test.png" >
                                </div>
                           <?php }
                            else
                            {
                                while ($row = $q->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <div class="carousel-item <?php if( $count == "1") echo "active"; ?>" >
                                        <a href="<?php echo $row["CompanyWebsite"]; ?>" target="_blank"> 
                                            <img class="img-responsive" style='height: 100%; width: 100%;' src="../../files/images/advert/<?php echo $row["Photo"]; ?>" alt="Sponsored Ads">
                                        </a>
                                    </div>
                                <?php	$count++;
                                }// end while
                            } //end else
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<div class="col-sm-2">

    <div class="card card-stats">
        <div class="card-body ">
            <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-notification-70 text-warning"></i>
                Place Advert here!<br/> 
            </div>
        </div>
    </div>

</div>