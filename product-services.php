<?php 
    //$cont = new Crud($connect);
	$page = "product-services";
	include("header.php");
    $user_cl = new User($connect);
?>



<!--============================================================================ 
                            PRODUCT & SERVICES LANDING PAGE
=================================================================================-->

<?php if( !isset($_GET["dil"]) || $_GET["dil"] == "") { ?>

    <section style="margin: 0 0 10% 0">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Product & Services</h2>
                <p class="text-center wow fadeInDown">Select from different <strong> Products and Services </strong> </p>
            </div>
        
            <div class="row">
                <?php 

                    //paginate page
                    $perpage = 20;

                    if (isset($_GET["pageno"])) 
                    {
                        $pageno = intval($_GET["pageno"]);
                    }
                    else
                    {
                        $pageno = 1;
                    }

                    $calc = $perpage * $pageno;
                    $start = $calc - $perpage;
                   
                    $sql = "SELECT * FROM product GROUP BY Batch ORDER BY ID DESC LIMIT $start, $perpage";
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
                            $batch = $r["Batch"];
                            $rrp = $r["RRP"];
                            $addedon = $r["AddedOn"];

                            $name = $home->AnyContent("Fname", "users", "ID", $uid)." ".
                            $home->AnyContent("Sname", "users", "ID", $uid);
                            ?>        

                            <div class="col-sm-6 col-md-3" style="height: 500px">
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
                    } else { ?>
                        <p style="text-align: center">
                            <b>You have reached the end of uploaded items! Please use the PREV button to select from existing ones</b>
                        </p>
                    <?php } ?>

                    <div class="clearfix"></div>
                    <div style="margin-bottom: 5px"></div>

                    <!-- /.card-footer -->
                    <div class="card-footer" align="center">
                        <nav aria-label="Contacts Page Navigation">
                            <ul class="pagination justify-content-center m-0">

                                <?php if(isset($pageno))
                                {
                                    // $result = "SELECT COUNT(ID) as Total FROM product ORDER BY ID DESC";
                                    // $q = $connect->prepare($result); 
                                    // $q->execute();
                                    // $rows = $q->fetch(PDO::FETCH_ASSOC);
                                    // echo $rows["Total"];

                                    $result = "SELECT COUNT(ID) as Total FROM product ORDER BY ID DESC LIMIT $start, $perpage";
                                    $q = $connect->prepare($result); 
                                    $q->execute();
                                    $rows = $q->fetch(PDO::FETCH_ASSOC);

                                    $total = $rows["Total"]; //echo $total;
                                    $totalpages = ceil($total/$perpage);
                                    $mycounter = 1;

                                    if($pageno <=1) { 
                                        echo "<span style='font-weight:bold; padding:20px;'>&laquo; Prev page</span>"; 
                                    } else {
                                        $j = $pageno -1;
                                        echo "<span style='padding:20px;'><a id='page_a_link' class='reg' href='product-services?pageno=$j'>&laquo; Prev</a></span>";
                                    }
                                    for ($i=1; $i <= $totalpages; $i++) { 
                                        if($i<>$pageno) {
                                            if($mycounter < 20) {
                                                echo "<span><a class='reg' href='product-services?pageno=$i'>$i</a></span> - " ;
                                            } else {
                                                //echo "<span><a href='product-services?pageno=$i'>$i</a></span>" ;
                                            }
                                        } else { 
                                            echo "<span style='font-weight:bold; padding:20px;'>$i</span>"; 
                                        }
                                        $mycounter++;
                                    }
                                    if($pageno==$totalpages) { 
                                        echo "<span style='font-weight:bold; padding:20px;'>Next page &raquo;</span>"; 
                                    } else {
                                        $j = $pageno +1;
                                        echo "<span style='padding:20px;'>
                                                <a class='reg' href='product-services?pageno=$j'>Next page &raquo;</a>
                                            </span>";
                                    }
                                } ?>

                            </ul>
                        </nav>
                    </div> <!-- /.card-footer -->            
            </div>
        </div>
    </section>

<?php } ?>






<!--============================================================================ 
                                PRODUCT-INFO
=================================================================================-->

<?php if( isset($_GET["bat"]) && $_GET["dil"] == "product-info" ) { 

    $home= new CRUD($connect);
    $batch = $_GET["bat"];
    $pro_tit = $_GET["tit"];
    $pro_title = $home -> AnyContent("Product", "product_title", "ID", $pro_tit); 

    // $product_title = $home -> AnyContent("Product", "product_title", "ID", $pro_title); 
    // $price = $home -> AnyContent("Amount", "product", "ProductTitle", $pro_title); 

    $uid = $home -> AnyContent("CreatedBy", "product", "Batch", $batch);
    $fname = $home -> AnyContent("Fname", "users", "ID", $uid); 
    $sname = $home -> AnyContent("Sname", "users", "ID", $uid); 
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


    <section style="margin: 0 0 10% 0">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown"><?php echo $pro_title; ?></h2>
                <p class="text-center wow fadeInDown"><?php echo $pro_title; ?> by <strong> <?php echo $fname." ".$sname; ?> </strong> </p>
            </div>
        
            <div class="row">
                <div class="col-md-6 col-sm-6">                
                    <div class="col-12 product-image-thumbs">
                  
                        <?php 
                            $sql2 = "SELECT * FROM product WHERE Batch = '".$batch."' AND ProductTitle = '".$pro_tit."' ORDER BY ID ASC LIMIT 10";
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
                                <p>No image!</p>
                            <?php } 
                        ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="col-md-6 col-sm-6">
                    <?php 
                        $sql_pro = "SELECT * FROM product WHERE Batch = '".$batch."' AND ProductTitle = '".$pro_tit."' ORDER BY ID DESC";
                        $q = $connect->prepare($sql_pro);
                        $q->execute();

                        $rowz = $q->fetch(PDO::FETCH_ASSOC);
                    ?>
                    
                    <div class="bg-gray py-2 px-3 mt-4">
                        <h4>
                            <?php 
                                $price = $rowz["Price"];
                                $rrp = $rowz["RRP"];
                                echo isset($price) ? "&#8358;".number_format($price, 2, '.', ',')."<br/>" : "Invalid";
                                echo ($rrp > 0 ) ? "<small>&#8358;<del>".number_format($rrp, 2, '.', ',')."</del></small>" : ""; 
                            ?>
                        </h4>
                    </div>

                    <form onsubmit="return adQtyF(this);" method="post" enctype="multipart/form-data">
                    
                        <div class="col-sm-2">
                            <div class="form-group has-label">
                                <label>Qty:</label>
                                <select name="Qty" class="form-control" >
                                <option selected="selected" value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>

                        <div class="input-group">
                            <!-- <div class="input-group-prepend" style="display: inline; margin-top: 10px;">
                                <i class="fa fa-shopping-cart fa-lg mr-2"></i>
                            </div> -->
                            <div style="display: inline">
                                <input class="btn btn-primary btn-lg btn-flat" type="submit" value="Add to Cart" />
                                <input type="hidden" name="CART" value="1">
                                <input type="hidden" name="Batch" value="<?php echo $batch; ?>">
                                <input type="hidden" name="Price" value="<?php echo $price; ?>">
                                <input type="hidden" name="RRP" value="<?php echo $rrp; ?>">
                            </div>
                        </div>

                    </form>

                    <div class="mt-4">
                        <div style="margin: 13px 13px">
                            <!-- product-services?dil=product-info&bat=2035345322&tit=8 
                                product-services?dil=product-info&bat=<?php //echo $batch; ?>&tit=<?php //echo $pro_title; ?>
                            -->
                            <div class="fb-like" data-href="https://www.dilyastrend.com/product-services?dil=product-info&bat=<?php echo $batch; ?>&tit=<?php echo $pro_tit; ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                        </div>
                    </div>

                    <h5 class="my-3">Description</h5>
                    <p><?php echo $rowz["Description"]; ?></p>

                </div>

            </div>
        </div>
    </section><!--/#meet-team-->


<?php } ?>





<!--============================================================================ 
                                CART
=================================================================================-->

<?php if( isset($_GET["dil"]) && $_GET["dil"] == "cart" ) { 

    $home = new CRUD($connect); 

    // Check the session variable for products in cart
    $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $products = array();
    $subtotal = 0.00;
    // If there are products in cart
    if ($products_in_cart) {
        // There are products in the cart so we need to select those products from the database
        // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
        $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
        $stmt = $connect->prepare('SELECT * FROM product WHERE Batch IN (' . $array_to_question_marks . ') GROUP BY Batch');
        // We only need the array keys, not the values, the keys are the id's of the products
        $stmt->execute(array_keys($products_in_cart));
        // Fetch the products from the database and return the result as an Array
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Calculate the subtotal
        foreach ($products as $product) {
            $subtotal += (float)$product['Price'] * (int)$products_in_cart[$product['Batch']];
        }
    }
    //var_dump($products_in_cart);
?>

<section style="margin: 0 0 10% 0">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Cart</h2>
            <p class="text-center wow fadeInDown">List of items in cart</p>
        </div>
    
        <div class="row">
            <div class="cart content-wrapper">
                <form action="product-services?dil=cart" method="POST">
                    <table id="example1" class="table table-striped">
                        <thead>
                            <tr>
                                <td colspan="2">Product</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($products)): ?>
                            <tr>
                                <td colspan="5" style="text-align:center;">You have no products added to your Cart</td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($products as $product): ?>
                            <tr>
                                <td class="img">
                                    <a href="product-services?dil=product-info&bat=<?php echo $product['Batch']; ?>&tit=<?php echo $product["ProductTitle"]; ?>">
                                        <!-- <img src="imgs/<?//=$product['img']?>" width="50" height="50" alt="<?//=$product['name']?>"> -->
                                        <?php 
                                            if(isset($product['Product']) && !empty($product['Product'])) { ?>
                                                <img src="files/products/images/<?php echo $product['Product']; ?>" width="50" height="50" class="img-responsive" alt="Image not found">
                                            <?php } else { ?>
                                                <img src="files/products/product-and-services2.png" class="img-responsive" width="50" height="50" alt="No Image">
                                            <?php } 
                                        ?>
                                    </a>
                                </td>

                                <td>
                                    <a href="product-services?dil=product-info&bat=<?php echo $product['Batch']; ?>&tit=<?php echo $product["ProductTitle"]; ?>">
                                        <?php $pro_tit = $product['ProductTitle']; 
                                            echo $home -> AnyContent("Product", "product_title", "ID", $pro_tit);
                                        ?>
                                    </a>
                                    <br>
                                    <a href="appfunctions/appfunctions.php?cart=1&rem=<?php echo $product['Batch']; ?>" class="btn btn-warning btn-xs remove">Remove</a>
                                </td>
                                
                                <td class="price">&#8358;<?php echo number_format($product['Price'], 2, '.', ','); ?></td>
                                <td class="quantity">
                                    <input type="number" name="Qty-<?php echo $product['Batch']; ?>" value="<?php echo $products_in_cart[$product['Batch']]; ?>" min="1" max="10" placeholder="Qty" required>
                                </td>
                                <td class="price">
                                    &#8358;<?php $tt = $product['Price'] * $products_in_cart[$product['Batch']]; 
                                                echo number_format($tt, 2, '.', ',');
                                            ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <tr>
                                <td colspan="4" style="text-align: right;"></td>
                                <td style="text-align:left;"><h4>&#8358;<?php echo number_format($subtotal, 2, '.', ','); ?></h4></td>
                            </tr>
                        </tbody>
                    </table>

                    <div style="text-align: right;">
                        <div style=" margin:20px;">
                            <input class="btn btn-default btn-md btn-flat" type="submit" value="Update" />
                            <input type="hidden" name="CART" value="2">
                        </div>
                    </div>

                    <div style="text-align: right;">
                        <div style=" margin:20px;">
                            <a class="btn btn-primary btn-lg btn-flat" href="product-services?dil=placeorder">Continue</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>


<?php } ?>






<!--================================================================================
                                PLACEORDER
=================================================================================-->

<?php if( isset($_GET["dil"]) && $_GET["dil"] == "placeorder" ) { 

    $home = new CRUD($connect); 

    // Check the session variable for products in cart
    $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $products = array();
    $subtotal = 0.00;
    // If there are products in cart
    if ($products_in_cart) {
        // There are products in the cart so we need to select those products from the database
        // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
        $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
        $stmt = $connect->prepare('SELECT * FROM product WHERE Batch IN (' . $array_to_question_marks . ') GROUP BY Batch');
        // We only need the array keys, not the values, the keys are the id's of the products
        $stmt->execute(array_keys($products_in_cart));
        // Fetch the products from the database and return the result as an Array
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Calculate the subtotal
        foreach ($products as $product) {
            $subtotal += (float)$product['Price'] * (int)$products_in_cart[$product['Batch']];
        }
    }

?>


<section id="meet-team" style="margin: 0 0 10% 0">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Place Order</h2>
            <p class="text-center wow fadeInDown">Please fill in a little information about yourself</p>
            <p class="text-center wow fadeInDown"><b>A DilyasTrend account would be created with the information you provide below. This in order for you to be able to track your purchase.</b></p>
        </div>
    
        <div class="row">
            <?php if (empty($products)): ?>
                <div class="text-align: center;">
                    <h3 style="color: #4b4149;">You have no products added to your Cart</h3>
                </div>
            <?php else: ?>
                
                <div class="col-md-6 col-md-offset-3">     
                    <form class="form-group" onsubmit="return placeOdF(this);" method="POST" action="" enctype="multipart/form-data">

                        <?php echo isset($response) ? $response : ""; ?>

                        <div class="row form-group">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <input class="form-control" minlength="2" maxlength="50" type="text" tabindex="2" name="FName" placeholder="Firstname" required>
                            </div>
                        
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <input class="form-control" minlength="2" maxlength="50" type="text" tabindex="2" name="SName" placeholder="Surname" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <input class="form-control" minlength="6" maxlength="40" type="email" tabindex="2" name="Email" placeholder="Valid Email" required>
                        </div>

                        <div class="form-group">
                            <input class="form-control" minlength="6" maxlength="40" type="password" tabindex="2" name="Pword" placeholder="Strong but easy to remember Password" required>
                        </div>

                        <div class="form-group">
                            <input class="form-control" minlength="6" maxlength="20" type="number" tabindex="2" name="Phone" placeholder="Valid Phone Number" required>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" size="2" minlength="6" maxlength="100" tabindex="2" name="Addr" placeholder="Valid Address" required></textarea>
                        </div>

						<fieldset>
							<div class="g-recaptcha" data-sitekey="<?php echo $user_cl->googleKeys(2); ?>"></div>
						</fieldset>

                        <div class="form-group">
                            <input style="color: #fff; background-color: #008000;" class="form-control" class="btn btn-info btn-lg btn-flat" type="submit" value="Continue" />
                            <input type="hidden" name="CART" value="3">
                        </div>
                    </form>
                </div>

                <div class="col-md-3" style="background-color: #ffffae; padding: 10px;">   
                    <p>Sub-Total:</p>
                    <h4>NGN <?php echo number_format($subtotal, 2, '.', ','); ?></h4>
                    <span class="badge">
                        <?php 
                            // Get the amount of items in the Cart, this will be displayed in the header.
                            $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                            echo $num_items_in_cart; 
                        ?> Item(s)
                    </span>
                </div>
                <div class="clearfix"></div>

                <h3 class="text-center">Item Summary</h3>

                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <td colspan="2"><b>Product</b></td>
                            <td><b>Price</b></td>
                            <td><b>Quantity</b></td>
                            <td><b>Total</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($products)): ?>
                        <tr>
                            <td colspan="5" style="text-align:center;">You have no products added to your Cart</td>
                        </tr>
                        <?php else: ?>
                        <?php foreach ($products as $product): ?>
                        <tr>
                            <td class="img">
                                <a href="product-services?dil=product-info&bat=<?php echo $product['Batch']; ?>&tit=<?php echo $product["ProductTitle"]; ?>">
                                    <!-- <img src="imgs/<?//=$product['img']?>" width="50" height="50" alt="<?//=$product['name']?>"> -->
                                    <?php 
                                        if(isset($product['Product']) && !empty($product['Product'])) { ?>
                                            <img src="files/products/images/<?php echo $product['Product']; ?>" width="50" height="50" class="img-responsive" alt="Image not found">
                                        <?php } else { ?>
                                            <img src="files/products/product-and-services2.png" class="img-responsive" width="50" height="50" alt="No Image">
                                        <?php } 
                                    ?>
                                </a>
                            </td>

                            <td>
                                <a href="product-services?dil=product-info&bat=<?php echo $product['Batch']; ?>&tit=<?php echo $product["ProductTitle"]; ?>">
                                    <?php $pro_tit = $product['ProductTitle']; 
                                        echo $home -> AnyContent("Product", "product_title", "ID", $pro_tit);
                                    ?>
                                </a>
                            </td>

                            <td class="price">&#8358;<?php echo number_format($product['Price'], 2, '.', ','); ?></td>
                            <td class="quantity">
                                <?php echo $products_in_cart[$product['Batch']]; ?>
                            </td>
                            <td class="price">
                                &#8358;<?php $tt = $product['Price'] * $products_in_cart[$product['Batch']]; 
                                                echo number_format($tt, 2, '.', ',');
                                        ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <tr>
                            <td colspan="4" style="text-align: right;"></td>
                            <td style="text-align:left;"><h4>&#8358;<?php echo number_format($subtotal, 2, '.', ','); ?></h4></td>
                        </tr>
                    </tbody>
                </table>

            <?php endif; ?>

        </div>
    </div>
</section>



<?php } ?>





<!--================================================================================
                                CHECKOUT
=================================================================================-->

<?php if( isset($_GET["dil"]) && $_GET["dil"] == "checkout" ) { 

    $home = new CRUD($connect); 
    $ordno = $_GET["ordno"];
    $trxnid = $_GET["trxnid"];
    $paystackKey_pub = $user_cl->payStack(1);

    $check_auth = $crud->select("payment", "TransactionID, OrderNo", "TransactionID = '$trxnid' AND OrderNo = '$ordno' ");

    if(!$check_auth){ ?>
    
        <section id="meet-team" style="margin: 0 0 10% 0">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title text-center wow fadeInDown">ERROR 404</h2>
                    <p class="text-center wow fadeInDown">An error occured!</p>
                    <p class="text-center wow fadeInDown"><b>There is an issue with your request.<?php //echo $orderid; ?></b></p>
                </div>

                <div class="row">
                    <div class="text-align: center;">
                        <h3 style="color: #4b4149; text-align:center;">Opps.. An error occured while trying to process your request. Please try again later.</h3>
                    </div>
                </div>
            </div>
        </section>

    <?php }
    else{
        // Check the session variable for products in cart
        $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        $products = array();
        $subtotal = 0.00;
        // If there are products in cart
        if ($products_in_cart) {
            // There are products in the cart so we need to select those products from the database
            // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
            $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
            $stmt = $connect->prepare('SELECT * FROM product WHERE Batch IN (' . $array_to_question_marks . ') GROUP BY Batch');
            // We only need the array keys, not the values, the keys are the id's of the products
            $stmt->execute(array_keys($products_in_cart));
            // Fetch the products from the database and return the result as an Array
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Calculate the subtotal
            foreach ($products as $product) {
                $subtotal += (float)$product['Price'] * (int)$products_in_cart[$product['Batch']];
            }
        }
        ?>

        <section id="meet-team" style="margin: 0 0 10% 0">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Check Out</h2>
                <p class="text-center wow fadeInDown">Please complete payment to place your order</p>
                <p class="text-center wow fadeInDown"><b>A DilyasTrend account has been created with the information you provided. You can sign-in with your details to track your purchase after payment.</b></p>
            </div>

            <div class="row">
                <?php if (empty($products)): ?>
                    <div class="text-align: center;">
                        <h3 style="color: #4b4149; text-align:center;">You have no products added to your Cart</h3>
                    </div>
                <?php else: ?>

                    <div class="col-md-6 col-md-offset-3" style="background-color: #ffffae; padding: 3%; text-align: center;">   
                        <p>Total:</p>
                        <h4>NGN <?php echo $subtotal; ?></h4>
                        <span class="badge" style="margin-bottom: 20px">
                            <?php 
                                // Get the amount of items in the Cart, this will be displayed in the header.
                                $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                                echo $num_items_in_cart; 
                            ?> Item(s)
                        </span>
                        <?php  
                            $pay_stk_pub_key = $user_cl->payStack(1);
                            $get_values = $crud->select("payment", "*", "TransactionID = '$trxnid' AND OrderNo = '$ordno' ");

                            if($get_values){
                                $email = $get_values[0]["Email"];
                                $total = $get_values[0]["Total"];
                                $name = $get_values[0]["PayeeName"];
                                $fname = explode(" ", $name)[0];
                                $sname = explode(" ", $name)[1];
                            }else{
                                //Do Nothing
                            } 
                        ?>
                        <form id="paymentForm">
                            <div class="form-submit">
                                <input type="hidden" id="key" value="<?php echo $paystackKey_pub; ?>" />
                                <input type="hidden" id="amount" value="<?php echo $total; ?>" />
                                <input type="hidden" id="email-address" value="<?php echo $email; ?>" />
                                <input type="hidden" id="first-name" value="<?php echo $fname; ?>" />
                                <button type="submit" onclick="payWithPaystack()" class="btn btn-flat btn-success btn-lg btn-block">Pay Now</button>
                            </div>
                        </form>

                        <script src="https://js.paystack.co/v1/inline.js"></script> 
                    </div>

                    <div class="clearfix"></div>

                    <h3 class="text-center">Item Summary</h3>

                    <table id="example1" class="table table-striped">
                        <thead>
                            <tr>
                                <td colspan="2"><b>Product</b></td>
                                <td><b>Price</b></td>
                                <td><b>Quantity</b></td>
                                <td><b>Total</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($products)): ?>
                            <tr>
                                <td colspan="5" style="text-align:center;">You have no products added to your Cart</td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($products as $product): ?>
                            <tr>
                                <td class="img">
                                    <a href="product-services?dil=product-info&bat=<?php echo $product['Batch']; ?>&tit=<?php echo $product["ProductTitle"]; ?>">
                                        <?php 
                                            if(isset($product['Product']) && !empty($product['Product'])) { ?>
                                                <img src="files/products/images/<?php echo $product['Product']; ?>" width="50" height="50" class="img-responsive" alt="Image not found">
                                            <?php } else { ?>
                                                <img src="files/products/product-and-services2.png" class="img-responsive" width="50" height="50" alt="No Image">
                                            <?php } 
                                        ?>
                                    </a>
                                </td>

                                <td>
                                    <a href="product-services?dil=product-info&bat=<?php echo $product['Batch']; ?>&tit=<?php echo $product["ProductTitle"]; ?>">
                                        <?php $pro_tit = $product['ProductTitle']; 
                                            echo $home -> AnyContent("Product", "product_title", "ID", $pro_tit);
                                        ?>
                                    </a>
                                </td>

                                <td class="price">&#8358;<?php echo number_format($product['Price'], 2, '.', ','); ?></td>
                                <td class="quantity">
                                    <?php echo $products_in_cart[$product['Batch']]; ?>
                                </td>
                                <td class="price">
                                    &#8358;<?php $tt = $product['Price'] * $products_in_cart[$product['Batch']]; 
                                                echo number_format($tt, 2, '.', ','); ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <tr>
                                <td colspan="4" style="text-align: right;"></td>
                                <td style="text-align:left;"><h4>&#8358;<?php echo number_format($subtotal, 2, '.', ','); ?></h4></td>
                            </tr>
                        </tbody>
                    </table>

                <?php endif; ?>

            </div>
        </div>
        </section>

        <script>
            //=================================
            //PAYSTACK PAYMENT INTEGRATION
            //=================================

            //window.location = "https://www.dilyastrend.com/product-services?dil=cart";
            //window.location = "https://www.dilyastrend.com/appfunctions/appfunctions.php?trxnid=<?php //echo $trxnid; ?>&reference=" + response.reference;

            const paymentForm = document.getElementById('paymentForm');
            paymentForm.addEventListener("submit", payWithPaystack, false);

            function payWithPaystack(e) {
                e.preventDefault();
                let handler = PaystackPop.setup({
                    key: document.getElementById("key").value,
                    email: document.getElementById("email-address").value,
                    firstname: document.getElementById("first-name").value,
                    amount: document.getElementById("amount").value * 100,
                    ref: ''+Math.floor((Math.random() * 1000000000) + 1), 
                    onClose: function(){
                        window.location = "https://www.dilyastrend.com/product-services?dil=cart";
                        alert('Transaction Canceled!');
                    },
                    callback: function(response){
                        let message = 'Payment complete! Reference: ' + response.reference;
                        alert(message);
                        window.location = "https://www.dilyastrend.com/appfunctions/appfunctions.php?purplace=1&ordno=<?php echo $ordno; ?>&reference=" + response.reference;
                    }
                });
                handler.openIframe();
            }
        </script>

    <?php } //ends $check_auth condition
} ?>






<!--================================================================================
                                CHECKOUT
=================================================================================-->

<?php if( isset($_GET["dil"]) && $_GET["dil"] == "verify_transaction" ) { 

    $home = new CRUD($connect); 
    //=======================
    //Collects REF-No from PayStack
    //=========================
    $paystackKey_sec = $user_cl->payStack(2);
    $payStk_ref = $_GET["reference"];
    $ord_no = $_GET["ordno"];

    if($payStk_ref = ""){
        header("Location:javascript://history.go(-1)");
    }

    $curl = curl_init();
  
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.paystack.co/transaction/verify/".rawurlencode($payStk_ref),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer ".$paystackKey_sec,
        "Cache-Control: no-cache",
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      //echo $response;
      $result = json_decode($response);
    }

    if($result->data->status == "success"){

        $status = $result->data->status;

    }
    else{
        header("Location: confirm-account");
    }

?>

<section id="meet-team" style="margin: 0 0 10% 0">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Payment Completed</h2>
            <p class="text-center wow fadeInDown"><b>You now have a DilyasTrend account. Sign-in with your details to track your purchase or service. A confirmation email has also been sent to your email which contains your order and reference number.</b></p>
        </div>

        <div class="row">
            <div style="text-align: center" class='alert alert-dismissable alert-success'>
                <!-- <button class='close' data-dismiss='alert'>&times;</button> -->
                    <i class="fa fa-check fa-5x"></i>  <br/><br/>
                    Payment successful and your order has been placed <br/>
                    Your Reference Number is <b><?php echo $_GET["reference"]; ?></b> <br/>
                    Your Order Number is <b><?php echo $ord_no; ?></b> <br/> <br/>
                    Sign-In <a href="signin">here</a> with your details to track your order
            </div>
        </div>
    </div>
</section>



<?php } ?>










<?php 
	include("footer.php");
?>