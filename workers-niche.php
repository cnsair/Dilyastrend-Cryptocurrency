<?php 
	$page = "niche";
	include("header.php");
?>

<section id="meet-team" style="margin: 0 0 10% 0">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Workers Niche</h2>
            <p class="text-center wow fadeInDown">See professionals under 
                <strong><?php 
                            $niche_id = $_GET["wid"];
                            $cont = new Crud($connect);
                            echo  $cont -> AnyContent("Title", "worker_slide", "ID", $niche_id); 
                        ?>
                </strong> 
            </p>
        </div>
      
        <div class="row">
            <?php                 
                //$exp = explode(',', $rows["Niche"]);
                //if(in_array($niche_id, $exp)) { $niche = $niche_id; }else{ $niche = "null"; }
                //echo $niche_id;

                //$niche = join("','", $niche_id);   
                // $niche = join(',', array_fill(0, count($niche_id), $niche_db));
                //  echo $niche;
                
                //WHERE Niche IN ('$niche')
                //WHERE `$column` IN(".implode(',',$array).")

                // SELECT t.*
                //     FROM YOUR_TABLE t
                //     WHERE FIND_IN_SET(3, t.ids) > 0

                //$sql = 'SELECT * WHERE id IN (' . implode(',', $ids) . ')';

                $sql = "SELECT * FROM profile w WHERE FIND_IN_SET($niche_id, w.Niche) ORDER BY Experience DESC LIMIT 20";
                $q = $connect->prepare($sql);
                $q->execute();
                $count = 1;

                if($q->rowCount() > 0){
                    while($r = $q->fetch(PDO::FETCH_ASSOC)){
                   
                        $uid = $r["UID"];
                        $skills = $r["Skills"];
                        $hobby = $r["Hobby"];
                        $email = $r["Email"];
                        $edu = $r["Education"];
                        $addr = $r["Address1"];
                        $phone = $r["Phone"];

                        $home = new Crud($connect);
                        $name = $home->AnyContent("Fname", "users", "ID", $uid)." ".$home->AnyContent("Sname", "users", "ID", $uid);
                        $role = $home->AnyContent("Role", "users", "ID", $uid);
                        $loc = $home->AnyContent("Country", "users", "ID", $uid);
                        $gender = $home->AnyContent("Gender", "users", "ID", $uid);
                        $photo = $home->AnyContent("Photo", "users", "ID", $uid); ?>        

                        <div class="col-sm-6 col-md-3" style="height: 550px">
                            <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                                <div class="team-img">
                                    <?php 
                                        if(isset($photo) && !empty($photo)) { ?>
                                            <img src="files/images/profilepics/<?php echo $photo; ?>" class="img-responsive" 
                                            alt="Avatar not found">
                                        <?php } else { ?>
                                            <img src="files/images/profilepics/default.png" class="img-responsive" alt="Avatar">
                                        <?php } 
                                    ?>
                                </div>
                                <div class="team-info">
                                    <h3><?php echo isset($name) ? $name : "Empty"; ?></h3>
                                    <span><?php echo isset($role) ? $role : "Empty"; ?></span>
                                </div>
                                <p>Skills: <?php echo isset($skills) ? $skills : "Empty"; ?></p>
                                <p>Location: <?php echo isset($loc) ? $loc : "Empty"; ?></p>
                                <p>Gender: <?php echo isset($gender) ? $gender : "Empty"; ?></p>
                                <p style="text-align: center">
                                    <small>Please sign-in below to view full profile</small>
                                    <a href="signin" class="btn btn-danger btn-flat btn-small" style="width: 100%">view full profile</a>
                                </p>
                                <!-- <ul class="social-icons">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul> -->
                            </div>
                        </div>

                    <?php }
                } 
                else{ ?>
                    <p>No worker has enlisted for this niche yet! Please check back later</p>
                <?php } 
            ?> 
          
        </div>
    </div>
</section><!--/#meet-team-->





<?php 
	include("footer.php");
?>