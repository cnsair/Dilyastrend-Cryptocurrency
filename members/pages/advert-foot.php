
            <div align="center" >
                Sponsored Ads
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    
                    <div class="carousel-inner" role="listbox">
                        <?php 
                            $home = new Crud($connect);

                            $sql ="SELECT * FROM advert WHERE Type = 3 AND Active = 1";
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
                                        <a href="#<?php echo $row["CompanyWebsite"]; ?>" > 
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
