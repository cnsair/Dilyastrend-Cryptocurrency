<?php 
	$page = "product-select";
	include("header.php");

    $home = new CRUD($connect);

    $product_title = $_GET["xps"];
    $cont = new Crud($connect);
    $pro_title = $cont -> AnyContent("Product", "product_title", "ID", $product_title); 
?>

<section id="meet-team" style="margin: 0 0 10% 0">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown"><?php echo $pro_title; ?></h2>
            <p class="text-center wow fadeInDown">Products under the title <strong> <?php echo $pro_title; ?> </strong> </p>
        </div>
      
        <div class="row">
            <?php 

                $perpage = 20;

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
                            
                $sql = "SELECT * FROM product WHERE ProductTitle = $product_title GROUP BY CreatedBy ORDER BY ID DESC LIMIT $start, $perpage";
                $q = $connect->prepare($sql);
                $q->execute();
                $count = 1;

                if($q->rowCount() > 0){
                    while($r = $q->fetch(PDO::FETCH_ASSOC)){
                   
                        $id = $r["ID"];
                        $uid = $r["CreatedBy"];
                        $product = $r["Product"];
                        $pro_title = $r["ProductTitle"];
                        $des = $r["Description"];
                        $price = $r["Amount"];
                        // $price_from = $r["PriceFrom"];
                        // $price_to = $r["PriceTo"];
                        $addedon = $r["AddedOn"];

                        $name = $home->AnyContent("Fname", "users", "ID", $uid)." ".
                        $home->AnyContent("Sname", "users", "ID", $uid);
                    ?>        

                        <div class="col-sm-6 col-md-3" style="height: 500px; text-align: center">
                            <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                                <div class="team-img" align="center">
                                    <a href="product-info?xpro=<?php echo $product_title; ?>&eid=<?php echo $uid; ?>">
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
                                    <a href="product-info?xpro=<?php echo $product_title; ?>&eid=<?php echo $uid; ?>">
                                        <span>
                                            <?php 
                                                if(isset($des)){
                                                    $string = strip_tags($des);
                                            
                                                    if (strlen($des) > 100) {
                                                        $stringCut = substr($string, 0, 100);
                                                        $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
                                                    }
                                                    $des_string = $string;
                                                }
                                                echo isset($des_string) ? $des_string : "No description"; 
                                            ?>
                                        </span>
                                    </a>
                                </div>
                                <p>
                                    <h4>
                                        <span><i class="fa fa-money fa-sm"></i></span>
                                        <del style='text-decoration-style: double;'>N</del>
                                        <?php echo isset($price) ? $price: "Empty"; ?>
                                    </h4>
                                </p>
                                <ul class="social-icons">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>

                    <?php }
                } 
                else{ ?>
                    <p>No product has been uploaded yet! Please check back later</p>
                <?php } 
            ?> 

                    
            <!-- /.card-body -->
            <div class="card-footer" align="center">
                <nav aria-label="Contacts Page Navigation">
                <ul class="pagination justify-content-center m-0">

                    <?php if(isset($page))
                    {
                        $result = "SELECT COUNT(ID) as Total FROM product WHERE ProductTitle = $product_title GROUP BY CreatedBy ORDER BY ID DESC LIMIT $start, $perpage";
                        $q = $connect->prepare($result); 
                        $q->execute();
                        $rows = $q->fetch(PDO::FETCH_ASSOC);

                        $total =$rows["Total"];
                        $totalpages = ceil($total/$perpage);
                        $mycounter = 1;

                        if($page <=1)
                        {
                        echo "<span id='page_links' style='font-weight:bold; padding:20px;'>&laquo; Prev</span>";
                        }
                        else
                        {
                        $j = $page -1;
                        echo "<span style='padding:20px;'><a id='page_a_link' class='reg' href='dashboard?dil=profession&page=$j'>&laquo; Prev</a></span>";
                        }

                        for ($i=1; $i <=$totalpages ; $i++) { 

                        if($i<>$page)
                        {
                            //echo "<span><a id='page_links' href='index.php?page=$i'>$i</a></span>";
                            if($mycounter<4)
                            {
                            //echo "<br>";
                            echo "<span><a id='page_links' class='reg' href='dashboard?dil=profession&page=$i'>$i</a></span> - " ;
                            }
                            else
                            {
                            //echo "<span><a id='page_links' href='index.php?page=$i'>$i</a></span>" ;
                            }
                        }
                        else
                        {
                            echo "<span id='page_links' style='font-weight:bold; padding:20px;'>$i</span>";
                        }

                        $mycounter++;
                        }

                        if($page==$totalpages)
                        {
                        echo "<span id='page_links' style='font-weight:bold; padding:20px;'>Next &raquo;</span>";
                        }
                        else
                        {
                        $j = $page +1;
                            echo "<span style='padding:20px;'><a id='page_a_link' class='reg' href='dashboard?dil=profession&page=$j' >Next &raquo;</a></span>";
                        }
                    } ?>

                </ul>
                </nav>
            </div>
            <!-- /.card-footer -->
          
        </div>
    </div>
</section><!--/#meet-team-->





<?php 
	include("footer.php");
?>