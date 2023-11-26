<?php 
  include "header.php";

  include "sidebar.php";

  $home = new Crud($connect);
?>
 

 
<!--============================================================================ 
                              MAIN  DASHBOARD
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"]=="home") { 

if (!isset($_GET["s"])) { ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo FetchTableContent(11); ?></h3>

                <p>Total Clicks</p>
              </div>
              <div class="icon">
                <i class="ion ion-mouse"></i>
              </div>
              <a href="dashboard?dil=audit-trail&page=audit-trail" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo FetchTableContent(10); ?></h3>

                <p>Active Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="dashboard?dil=audit-trail&page=audit-trail" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo FetchTableContent(14); ?></h3>

                <p>Registered Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="dashboard?dil=audit-trail&page=audit-trail" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo FetchTableContent(12); ?></h3>

                <p>Unique Clicks</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="dashboard?dil=audit-trail&page=audit-trail" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
        
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <!-- Map card -->
            <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Visitors
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->
          </section>


          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php } elseif (isset($_GET["s"])) { ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Search result</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
                <li class="breadcrumb-item active">Search result</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      
    <section class="content">
    <div class="row">
      <div class="col-sm-7">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <h3 class="card-title">Result on
                <strong> <?php 
                            $s_term = $_GET["s"];
                            echo $s_term;
                        ?>
                </strong> </h3>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content"><!-- Begins Search result content -->

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

                $count = 1;

                if($q1->rowCount() > 0 || $q2->rowCount() > 0 || $q3->rowCount() > 0){

                  //Loop for workers slide
                  if($q1->rowCount() > 0){ 
                    while($rows = $q1->fetch(PDO::FETCH_ASSOC)){?>

                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          
                          <a href="dashboard?dil=professionals&wid=<?php echo $rows["ID"]; ?>" class="reg">
                              <img style="height: 100%; width:100%" src="../../files/images/slider/<?php echo $rows["Photo"]; ?>" class="img-responsive"> 
                          </a> 

                          <p style="text-align: center"><?php echo $rows["Title"]; ?></p>

                        </div>
                      </div>
                    </div><!-- ./col -->

                    <?php } 
                  }


                  //Loop for gallery
                  if($q2->rowCount() > 0){
                    while($row = $q2->fetch(PDO::FETCH_ASSOC)){
                      $imageURL = '../../files/gallery/img/';

                      $galid = $row["ID"];
                      $jk = $row["Photo"];
                      $jk = explode(",", $jk);
                      
                      foreach ($jk as $key) { ?>

                          <a href="<?php echo $imageURL . $key; ?>" data-toggle="lightbox" data-title="<?php echo $key; ?>" data-gallery="gallery">
                              <img src="<?php echo $imageURL . $key; ?>" class="img-fluid mb-2" alt="<?php echo $key; ?>"/>
                          </a>
                              
                      <?php } ?>
                  <?php }
                  }

                  //Loop for Blog
                  if($q3->rowCount() > 0){
                    echo "
                        <div class='col-md-9'>
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
                }  
                else{ //IF NO RESULT IS FOUND FOR SEARCH TERM ?>
                    <div class="col-md-9">
                        <h3 style="text-align: center">Your search term returned no result. Please try another</h3>
                    </div>
                <?php } 
                ?> 

              
            <!-- Ends Search result content -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      
      <?php include("advert-portrait.php"); ?>
      </div>
      </section>
      </div>



    <?php } 
  
  
} ?>



<!--============================================================================ 
                                ACCOUNT SETTINGS
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "account-settings") { ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Account settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
              <li class="breadcrumb-item active">Account settings</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-header">
                <h3 class="card-title">General settings</h3>
              </div>

                <?php echo isset($response_pro) ? $response_pro : ""; ?>

                <form id="RegisterValidation" action="" method="POST" enctype="multipart/form-data">
            
                <?php 
                    $getprofile = FetchIndividualContent("2", $_SESSION["duid"]);
                ?>

                <div class="card-body">
                  <div class="form-group">
                    <label>
                        Firstname
                        <star class="star">*</star>
                    </label>
                    <input minlength="2" maxlength="12" class="form-control" name="Fname" type="text" required="true" placeholder="Enter Firstname" value="<?php if(isset($getprofile[0]["Fname"])) echo $getprofile[0]["Fname"]; ?>" />
                  </div>
                                    
                  <div class="form-group">
                      <label>
                          Surname
                      </label>
                      <input minlength="2" maxlength="12" class="form-control" name="Sname" type="text" required="true"  placeholder="Enter Surname" value="<?php if(isset($getprofile[0]["Sname"])) echo $getprofile[0]["Sname"]; ?>"/>
                  </div>
                                    
                  <div class="form-group">
                      <label>
                          Username
                          <star class="star">*</star>
                      </label>
                      <input minlength="3" maxlength="12" class="form-control" name="Uname" type="text" required="true" placeholder="Enter Username" value="<?php if(isset($getprofile[0]["Uname"])) echo $getprofile[0]["Uname"]; ?>" />
                  </div>

                  <div class="form-group">
                    <label>
                        Email
                        <star class="star">*</star>
                    </label>
                    <input minlength="3" maxlength="40" class="form-control" name="Email" type="email" required="true" placeholder="Enter a valid email address" value="<?php if(isset($getprofile[0]["Email"])) echo $getprofile[0]["Email"]; ?>" />
                </div>

                <div class="form-group">
                    <label>
                        Gender
                    </label>
                    <div class="col-lg-8">
                        <div class="radio">
                            <label>
                                <input type="radio" name="Gender"  value="Male" <?php if(isset($getprofile[0]["Gender"]) && $getprofile[0]["Gender"] == "Male") echo "checked"; ?> 
                                /> Male
                            </label> &nbsp;&nbsp;&nbsp;
                            <label>
                                <input type="radio" name="Gender" value="Female" <?php if(isset($getprofile[0]["Gender"]) && $getprofile[0]["Gender"] == "Female") echo "checked"; ?> /> Female
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>
                        Phone
                    </label>
                    <input minlength="7" maxlength="15" class="form-control" name="Phone" type="text" required="true" placeholder="Enter a valid phone number" value="<?php if(isset($getprofile[0]["Phone"])) echo $getprofile[0]["Phone"]; ?>" />
                </div>
                
                <div class="form-group has-label">
                    <label>
                        Admin Role
                    </label>
                    <input minlength="3" maxlength="20" class="form-control" name="Role" type="text" placeholder="Enter Role as an Admin" value="<?php if(isset($getprofile[0]["Role"])) echo $getprofile[0]["Role"]; ?>" />
                </div>
                
                <div class="form-group has-label">
                    <label>
                        Admin Bio
                    </label>
                    <input minlength="10" maxlength="100" class="form-control" name="Bio" type="text" placeholder="Little about yourself. Character: max - 100, min - 10" value="<?php if(isset($getprofile[0]["Bio"])) echo $getprofile[0]["Bio"]; ?>" />
                </div>
                
                <div class="form-group">
                    <label>
                        Address
                    </label>
                    <textarea minlength="2" maxlength="100" class="form-control" name="Addr" type="text" required="true"  placeholder="Enter residential address" ><?php if(isset($getprofile[0]["Addr"])) echo $getprofile[0]["Addr"]; ?></textarea>
                </div>

                <div class="form-group">
                    <label>
                        Photo
                    </label>
                    <div class="">
                        <div class="col-sm-3" style="float: left">
                            <?php if(isset($getprofile[0]["Photo"]) && $getprofile[0]["Photo"] !="") 
                                { ?>
                                    <img height="100px" width="100px" src="../../files/images/profilepics/<?php echo $getprofile[0]["Photo"]; ?>" alt="<?php echo $fname; ?>"> 
                                <?php } else { ?>
                                    <img height="100px" width="100px" src="../../files/images/profilepics/default.png" alt="Avatar">
                            <?php } ?>
                        </div>
                        <div class="col-sm-9" style="float: left">
                            
                            <small>Photo must not be greater than 3MB. </small><br/>
                            <small>Photo format must be PNG, JPG or JPEG. </small>
                            <input type="file" name="Photo" class="form-control" />
                            <input type="hidden" name="PhotoHolder" value="<?php if(isset($getprofile[0]["Photo"])) echo $getprofile[0]["Photo"]; ?>">
                        </div> 
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="form-group">
                    <label>
                        Select Country 
                    </label>
                    <!-- <div class="col-lg-8"> -->
                    <select name="Country" class="form-control" value="<?php if(isset($getprofile[0]["Country"])) echo $getprofile[0]["Country"]; ?>" >
                        <?php 
                                $sql="SELECT DISTINCT(Country) as Coun FROM countries ORDER BY Country ASC"; 
                                $q = $connect->prepare($sql); 
                                $q->execute();
                                while($r = $q->fetch(PDO::FETCH_ASSOC))
                                {
                                    $ff = ($r["Coun"]==$getprofile[0]["Country"]) ? "selected" : "";
                                    echo  "<option value=".$r["Coun"]." $ff>".$r["Coun"]."</option>";
                                }
                            ?>
                    </select>
                    <!-- </div> -->
                </div>
                
                <div class="clearfix"></div>

                <div class="card-category form-category">
                    <star class="star">*</star> Required fields
                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer " align="center">
                    <button type="submit" class="btn btn-warning btn-lg btn-fill pull-center">UPDATE</button>
                    <input type="hidden" name="EDIT" value="1">
                    <input type="hidden" name="EDITVAL" value="<?php if(isset($getprofile[0]["ID"])) echo $getprofile[0]["ID"]; ?>">
                    <div class="clearfix"></div>
                </div>

              </form>
              
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->

          <!-- right column -->
          <div class="col-md-6">

            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Change password</h3>
              </div>
              
              <?php echo isset($response) ? $response : ""; ?>

            <form id="LoginValidation" action="" method="POST" enctype="multipart/form-data">

                <?php $getprofile = FetchIndividualContent("2", $_SESSION["duid"]);  ?>
                
                <div class="card ">
                    <!-- <div class="card-header ">
                        <h4 class="card-title text-center">Login Form</h4>
                    </div> -->
                    <div class="card-body ">
                        <div class="form-group has-label">
                            <label>Old Password
                                <star class="star">*</star>
                            </label>
                            <input required="true" minlenght="6" maxlenght="40" type="password" class="form-control" name="PwordOld"/>
                        </div>

                        <div class="form-group has-label">
                            <label>New Password
                                <star class="star">*</star>
                            </label>
                            <input required="true" minlenght="6" maxlenght="40" type="password" class="form-control"  name="Pword1"/>
                            <small>Password should be minimum of 6 and maximum of 40 alphanumerics. </small>
                        </div>

                        <div class="form-group has-label">
                            <label>Confirm Password
                                <star class="star">*</star>
                            </label>
                            <input required="true" minlenght="6" maxlenght="40" type="password" class="form-control" name="Pword2"/>
                        </div>

                        <div class="card-category form-category">
                            <star class="star">*</star> Required fields
                        </div>

                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-warning btn-lg btn-fill btn-wd">CHANGE</button>
                        <input type="hidden" name="EDIT" value="2">
                        <input type="hidden" name="EDITVAL" value="<?php echo $getprofile[0]["ID"]; ?>">
                    </div>
                </div>
            </form>
              
              <!-- /.card -->
           
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php } ?>




<!--============================================================================ 
                                ACCOUNT SETTINGS
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "change-password") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Change Password</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Change password</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
       
        <!-- right column -->
        <div class="col-md-6">

          <!-- general form elements disabled -->
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Change password</h3>
            </div>
            
            <?php echo isset($response) ? $response : ""; ?>

          <form id="LoginValidation" action="" method="POST" enctype="multipart/form-data">

              <?php $getprofile = FetchIndividualContent("2", $_SESSION["duid"]);  ?>
              
              <div class="card ">
                  <!-- <div class="card-header ">
                      <h4 class="card-title text-center">Login Form</h4>
                  </div> -->
                  <div class="card-body ">
                      <div class="form-group has-label">
                          <label>Old Password
                              <star class="star">*</star>
                          </label>
                          <input required="true" minlenght="6" maxlenght="40" type="password" class="form-control" name="PwordOld"/>
                      </div>

                      <div class="form-group has-label">
                          <label>New Password
                              <star class="star">*</star>
                          </label>
                          <input required="true" minlenght="6" maxlenght="40" type="password" class="form-control"  name="Pword1"/>
                          <small>Password should be minimum of 6 and maximum of 40 alphanumerics. </small>
                      </div>

                      <div class="form-group has-label">
                          <label>Confirm Password
                              <star class="star">*</star>
                          </label>
                          <input required="true" minlenght="6" maxlenght="40" type="password" class="form-control" name="Pword2"/>
                      </div>

                      <div class="card-category form-category">
                          <star class="star">*</star> Required fields
                      </div>

                  </div>
                  <div class="card-footer text-center">
                      <button type="submit" class="btn btn-warning btn-lg btn-fill btn-wd">CHANGE</button>
                      <input type="hidden" name="EDIT" value="2">
                      <input type="hidden" name="EDITVAL" value="<?php echo $getprofile[0]["ID"]; ?>">
                  </div>
              </div>
          </form>
            
            <!-- /.card -->
         
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php } ?>



<!--============================================================================ 
                                AUDIT TRAIL
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "audit-trail") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Audit Trail</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Audit trail</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo FetchTableContent(11); ?></h3>

                <p>Total Clicks</p>
              </div>
              <div class="icon">
                <i class="ion ion-mouse"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo FetchTableContent(10); ?></h3>

                <p>Active Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo FetchTableContent(14); ?></h3>

                <p>Registered Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo FetchTableContent(12); ?></h3>

                <p>Unique Clicks</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


      <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Users and their activities on site</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Full Name</th>
                        <th>Identity</th>
                        <th>Visited Pages</th>
                        <th>Ip Address</th>
                        <th>Date</th>
                        <th class="disabled-sorting">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                          $fet_msg = FetchTableContent(13);
                          $count = 1;

                        foreach ($fet_msg as $key => $val) { 
                            // while($val = $q->fetch(PDO::FETCH_ASSOC)) {
                                ?>

                        <tr class="">
                            <td><?php echo $count; ?></td>
                            <td class="center">
                                <?php if(isset($val["UserID"]) && $val["UserID"] == 0) { 
                                    echo "Guest/Not Signed-In"; } else { echo ""; } ?>

                                <a href="dashboard?dil=check-action&gst=<?php echo ($val["UserID"] == 0) ? $val["IPAddr"] . "-IP" : $val["UserID"] . "-ID"; ?>&page=audit-trail">
                                    <?php echo $val["FullName"]; ?>
                                </a>
                                
                            </td>
                            <td><?php echo ($val["Identifier"] == 2) ? "Registered User" : "Guest"; ?></td>
                            <td><?php echo $val["Task"]; ?></td>
                            <td><?php 
                                    if(isset($val["UserID"]) && $val["UserID"] == 0) { 
                                        echo "Unknown IPs"; } else { echo $val["IPAddr"]; } 
                                ?>
                            </td>
                            <td>
                                <?php echo date("j-M-Y", strtotime($val["DateModified"]))." at ".date("G:i:s a", strtotime($val["DateModified"])); ?>
                            </td>
    
                            <td class="center">
                                <a class="btn btn-danger btn-sm" href="dashboard?dil=check-action&gst=<?php 
                                        echo ($val["UserID"] == 0) ? $val["IPAddr"] . "-IP" : $val["UserID"] . "-ID"; ?>&page=audit-trail">
                                <i class="fa fa-eye"></i></a> 
                            </td> 
                        </tr>

                    <?php $count++; } ?>

                    </tbody>
                </table>
                        
              </div><!-- CARD BODY -->
          </div><!-- CARD -->
        </div><!-- COL-12 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

<?php } ?>






<!--============================================================================ 
                                    AUDIT TRAIL
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "check-action") { ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Audit Trail</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Particular audit trail</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

                
           <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Users activities on site</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                
                <div class="toolbar">
                      <?php 
                          $check = $_GET["gst"];

                          $brk1 = explode("-", $check);
                          $before = $brk1[0];//Gets UserID or IPAddr

                          $brk2 = explode("-", $check);
                          $after = $brk2[1];//Checks whether its an IPAddr or UserID
                          
                          $aut = ($after == "IP") ? "IP" : "ID";
                          
                          if($aut == "IP"){
                              //$ip = $home -> AnyContent("IPAddr", "audit_log", "IPAddr", $before);
                              $ident = "Guest or User not Signed-In";
                          }elseif($aut == "ID"){
                              $namez = $home -> AnyContent("FullName", "audit_log", "UserID", $before);
                              $ip = $home -> AnyContent("IPAddr", "audit_log", "UserID", $before);
                              $ident = "Registered User";
                          }else{
                              $ident = "ERROR!";
                          }

                      ?>
                      <h3><?php echo (isset($namez)) ? $namez : ""; ?></h3>
                      <h3><?php echo (isset($ip)) ? $ip : ""; ?></h3>
                      <h3><?php echo $ident; ?></h3>
                  </div>
               <thead>
                  <tr>
                      <th>S/N</th>
                      <th>Visited Pages</th>
                      <th>Ip Address</th>
                      <th>Date</th>
                      <th class="disabled-sorting">Actions</th>
                  </tr>
              </thead>

              <tbody>
                <?php 
                    $fetch = (($aut == "ID") ? FetchIndividualContent("17", $before) : FetchIndividualContent("18", $before));
                    //var_dump($getgst);
                      
                        // $task = $fetch[0]["Task"];
                        // $ip = $fetch[0]["IPAddr"];
                        // $gstid = $fetch[0]["ID"];
                          $count = 1;

                        foreach ($fetch as $key => $val) { ?>

                        <tr class="">
                            <td><?php echo $count; ?></td>
                            <td><?php echo $val["Task"];  ?></td>
                            <td><?php echo $val["IPAddr"]; ?></td>
                            <td>
                                <?php echo date("j-M-Y", strtotime($val["DateModified"]))." at ".date("G:i:s a", strtotime($val["DateModified"])); ?>
                            </td>
    
                            <td class="center">
                                <!-- <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this trail?');" href="delete-trail?del=<?php //echo $val["ID"]; ?>"><i class=" fa fa-trash"></i></a>  -->
                                <button class="btn btn-sm btn-flat">Delete Disabled</button>
                            </td>
                        </tr>

                    <?php $count++; } ?>
                </tbody>
            </table>
                                
          </div><!-- CARD BODY -->
        </div><!-- CARD -->
      </div><!-- COL-12 -->
    </div><!-- ROW -->
      
  </div><!-- CONTAINER FLUID -->
</div><!-- CONTENT -->


<?php } ?>



<!--============================================================================ 
                               PROFILE
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "profile") { ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
                <li class="breadcrumb-item active">User profile</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                        <?php 
                          if(isset($getprofile[0]["Photo"]) && $getprofile[0]["Photo"] !="") { ?>

                              <img src="../../files/images/profilepics/<?php echo $getprofile[0]["Photo"]; ?>" class="profile-user-img img-fluid img-circle" 
                              alt="<?php echo $fname; ?>">
                              <?php } else { ?>
                                  <img src="../../files/images/profilepics/default.png"  class="profile-user-img img-fluid img-circle" alt="Avatar">
                              <?php } 
                        ?>
                  </div>

                  <h3 class="profile-username text-center"><?php echo $fname; ?></h3>

                  <p class="text-muted text-center"><?php echo $role; ?></p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Followers</b> <a class="float-right">0</a>
                    </li>
                    <li class="list-group-item">
                      <b>Following</b> <a class="float-right">0</a>
                    </li>
                    <li class="list-group-item">
                      <b>Connects</b> <a class="float-right">0</a>
                    </li>
                  </ul>

                  <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- About Me Box -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                <?php 
                      $getprofiles = FetchIndividualContent("19", $_SESSION["duid"]);
                      $id= $getprofiles[0]["ID"];
                      // $email= $getprofiles[0]["Email"];
                      // $phone = $getprofiles[0]["Phone"];
                      $edu = $getprofiles[0]["Education"];
                      $skills = $getprofiles[0]["Skills"];
                      $cert = $getprofiles[0]["Certification"];
                      $exp = $getprofiles[0]["Experience"];
                      //$addr1 = $getprofiles[0]["Address1"];
                      $addr2 = $getprofiles[0]["Address2"];
                      $hob = $getprofiles[0]["Hobby"];
                      $lang = $getprofiles[0]["Language"];
                      $ref = $getprofiles[0]["Referee"];
                      $resume = $getprofiles[0]["Resume"];
                      $niche = $getprofiles[0]["Niche"];
                ?>

                  <strong><i class="fas fa-user-alt mr-1"></i> Bio</strong>

                  <p class="text-muted">
                    <?php
                        if(isset($bio)){
                            $string = $bio;
                            $string = strip_tags($string);

                            $checkstr = strlen($string) > 100;

                            if ($checkstr == TRUE) {

                              $stringCut = substr($string, 0, 100);

                              $fd= substr($stringCut, 0, strrpos($stringCut, ' '));
                              $string = $fd;
                            } 
                            echo $string;
                            if ($checkstr == TRUE) { echo "...";}
                        }else{ ?>
                            Please update Bio in account settings
                    <?php }?> 
                  </p>

                  <hr>

                  <strong><i class="fas fa-book mr-1"></i> Education</strong>

                  <p class="text-muted">
                    <?php
                        if(isset($edu)){
                            $string = $edu;
                            $string = strip_tags($string);

                            $checkstr = strlen($string) > 100;

                            if ($checkstr == TRUE) {

                              $stringCut = substr($string, 0, 100);

                              $fd= substr($stringCut, 0, strrpos($stringCut, ' '));
                              $string = $fd;
                            } 
                            echo $string;
                            if ($checkstr == TRUE) { echo "...";}
                        }else{ ?>
                            Please update Education from the Update Section
                    <?php }?>
                  </p>

                  <hr>

                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                  <p class="text-muted"> 
                    <?php
                        if(isset($addr2)){
                            $string = $addr2;
                            $string = strip_tags($string);

                            $checkstr = strlen($string) > 100;

                            if ($checkstr == TRUE) {

                              $stringCut = substr($string, 0, 100);

                              $fd= substr($stringCut, 0, strrpos($stringCut, ' '));
                              $string = $fd;
                            } 
                            echo $string;
                            if ($checkstr == TRUE) { echo "...";}
                        }else{ ?>
                            Please update Address1 from the Update Section
                    <?php }?>
                  </p>

                  <hr>

                  <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                  <p class="text-muted">
                    <?php
                        if(isset($skills)){
                            $string = $skills;
                            $string = strip_tags($string);

                            $checkstr = strlen($string) > 100;

                            if ($checkstr == TRUE) {

                              $stringCut = substr($string, 0, 100);

                              $fd= substr($stringCut, 0, strrpos($stringCut, ' '));
                              $string = $fd;
                            } 
                            echo $string;
                            if ($checkstr == TRUE) { echo "...";}
                        }else{ ?>
                            Please update Skills from the Update Section
                    <?php }?> 
                  </p>

                  <hr>

                  <strong><i class="far fa-file-alt mr-1"></i> Interests</strong>

                  <p class="text-muted">
                    <?php
                        if(isset($hob)){
                            $string = $hob;
                            $string = strip_tags($string);

                            $checkstr = strlen($string) > 100;

                            if ($checkstr == TRUE) {

                              $stringCut = substr($string, 0, 100);

                              $fd= substr($stringCut, 0, strrpos($stringCut, ' '));
                              $string = $fd;
                            } 
                            echo $string;
                            if ($checkstr == TRUE) { echo "...";}
                        }else{ ?>
                            Please update Hobbies and Interests from the Update Section
                    <?php }?>
                  </p>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <h3 class="card-title">Update Profile</h3>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                   
                    <div class="" >

                      <form onsubmit="return profileUpdateF(this);" class="form-horizontal" method="POST" enctype="multipart/form-data">

                        <?php
                          echo (isset($response)) ? $response : "";
                        ?>

                        <!-- <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input minlength="5" maxlength="100" type="email" class="form-control" name="Email" id="inputName" placeholder="Characters: minlength = 5 maxlength = 100" value="<?php //echo (isset($email)) ? $email : ""; ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                          <div class="col-sm-10">
                            <input minlength="3" maxlength="15" type="number" class="form-control" name="Phone" id="inputEmail" placeholder="Characters: minlength = 3 maxlength = 15" value="<?php //echo (isset($phone)) ? $phone : ""; ?>">
                          </div>
                        </div> -->

                        <div class="form-group row">
                          <label for="inputExperience" class="col-sm-2 col-form-label">Education</label>
                          <div class="col-sm-10">
                            <textarea minlength="10" maxlength="1000" class="form-control" name="Education" id="inputName2" placeholder="Characters: minlength = 10 maxlength = 1000"><?php echo (isset($edu)) ? $edu : ""; ?></textarea>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputExperience" class="col-sm-2 col-form-label">Skills</label>
                          <div class="col-sm-10">
                            <textarea minlength="3" maxlength="200" class="form-control" name="Skills" id="inputName2" placeholder="Characters: minlength = 3 maxlength = 200"><?php echo (isset($skills)) ? $skills : ""; ?></textarea>
                          </div>
                        </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Experience (Years)</label>
                        <div class="col-sm-10">
                          <input minlength="1" maxlength="100" type="number" class="form-control" name="Experience" id="inputEmail" placeholder="Please a digit or two" value="<?php echo (isset($exp)) ? $exp : 0; ?>">
                        </div>
                      </div>

                        <div class="form-group row">
                          <label for="inputExperience" class="col-sm-2 col-form-label">Certifications</label>
                          <div class="col-sm-10">
                            <textarea minlength="5" maxlength="500" class="form-control" name="Certification" id="inputExperience" placeholder="Characters: minlength = 5 maxlength = 500"><?php echo (isset($cert)) ? $cert : ""; ?></textarea>
                          </div>
                        </div>

                        <!-- <div class="form-group row">
                          <label for="inputExperience" class="col-sm-2 col-form-label">Address 1</label>
                          <div class="col-sm-10">
                            <textarea minlength="10" maxlength="200" class="form-control" name="Address1" id="inputExperience" placeholder="Characters: minlength = 10 maxlength = 200"><?php //echo (isset($addr1)) ? $addr1 : ""; ?></textarea>
                          </div>
                        </div> -->

                        <div class="form-group row">
                          <label for="inputExperience" class="col-sm-2 col-form-label">Address 2</label>
                          <div class="col-sm-10">
                            <textarea minlength="10" maxlength="200" class="form-control" name="Address2" id="inputExperience" placeholder="Characters: minlength = 10 maxlength = 200"><?php echo (isset($addr2)) ? $addr2 : ""; ?></textarea>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputSkills" class="col-sm-2 col-form-label">Hobbies and Interests</label>
                          <div class="col-sm-10">
                            <input minlength="5" maxlength="100" type="text" class="form-control" name="Hobby" id="inputSkills" placeholder="Characters: minlength = 5 maxlength = 100" value="<?php echo (isset($hob)) ? $hob : ""; ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputSkills" class="col-sm-2 col-form-label">Languages</label>
                          <div class="col-sm-10">
                            <input minlength="2" maxlength="50" type="text" class="form-control" name="Language" id="inputSkills" placeholder="Characters: minlength = 2 maxlength = 50" value="<?php echo (isset($lang)) ? $lang : ""; ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputExperience" class="col-sm-2 col-form-label">Referee</label>
                          <div class="col-sm-10">
                            <textarea minlength="10" maxlength="100" class="form-control" name="Referee" id="inputExperience" placeholder="Characters: minlength = 10 maxlength = 100"><?php echo (isset($ref)) ? $ref : ""; ?></textarea>
                          </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">
                                Curriculum Vitae
                            </label>
                            <div class="col-sm-2" style="float: left">
                                <?php if(isset($resume) && !empty($resume)) 
                                    { 
                                        $ext =  pathinfo($resume, PATHINFO_EXTENSION);
                                        //if file is a picture
                                        if($ext == "png" || $ext == "jpg" || $ext == "jpeg") { ?>
                                              <img height="100px" width="100px" src="../../files/resume/<?php echo $resume; ?>" alt="<?php echo $fname; ?>"> 
                                          <?php } 
                                          //if file is a document
                                        elseif($ext == "pdf" || $ext == "doc" || $ext == "docx") { ?>
                                              <a href="../../files/resume/<?php echo $resume; ?>" class="btn btn-flat btn-primary">
                                              <small>Download File</small></a> 
                                            <?php }
                                        else { ?>
                                              CV Empty!
                                          <?php }
                               
                                    } else { ?>
                                      CV Empty!
                                  <?php }?>
                            </div>
                            <div class="col-sm-8" style="float: left">
                                <small>File must not be greater than 3MB. </small><br/>
                                <small>File format must be PNG, JPG, JPEG, PDF, DOC, DOCX. </small>
                                <input type="file" name="Resume" class="form-control" />
                                <input type="hidden" name="ResumeHolder" value="<?php echo (isset($resume)) ? $resume : ""; ?>">
                            </div> 
                        </div>

                        <div class="form-group row">
                          <label for="inputExperience" class="col-sm-2 col-form-label">Worker Niche</label>
                          <div class="col-sm-10">
                              <?php 
                                $sql="SELECT ID as IDz, Title as Title FROM worker_slide ORDER BY Title ASC"; 
                                $q = $connect->prepare($sql); 
                                $q->execute();

                                while($r = $q->fetch(PDO::FETCH_ASSOC))
                                { 
                                    $exp = explode(",", $niche)
                                  ?>
                                    <input type="checkbox" name="Niche[]" <?php if(in_array($r["IDz"], $exp)) { echo "checked"; } ?> value="<?php echo $r["IDz"]; ?>">
                                    <?php echo $r["Title"]; ?> &nbsp;&nbsp;&nbsp;
                               <?php }

                              ?>
                          </div>
                        </div>
                        <hr/>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <div class="">
                              <label>
                              </label>
                                <input type="checkbox" name="Agree" value="Agree"> I agree that the information I have provided here is true
                            </div>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">

                            <input style="color: rgb(1, 9, 53);" type="submit" class="btn btn-warning btn-lg btn-fill pull-center" name="profileUpdate" value="UPDATE">
                            <input style="color: rgb(1, 9, 53);" type="button" class="btn btn-default btn-lg btn-fill pull-center" value="CANCEL" onclick="profileUpdateR(this.form);">
                            <input type="hidden" name="EDIT" value="7">
                            <input type="hidden" name="EDITVAL" value="<?php echo $id; ?>">

                          </div>
                        </div>

                      </form>

                    </div>
                    <!-- /.tab-pane -->

                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php } ?>




<!--============================================================================ 
                                Create Blog 
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "create-blog") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Blog</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Create blog</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  

<section class="content">
<div class="row">

  <div class="col-sm-7">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <h3 class="card-title">Create Story</h3>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <form onsubmit="return blogUploadF(this);" class="form-horizontal" method="POST" enctype="multipart/form-data">
            <?php echo (isset($response)) ? $response : ""; ?>
            <div class="card ">
              
              <div class="card-body ">
                
                <div class="form-group has-label">
                    <label>
                        Category
                        <star class="star">*</star>
                    </label>
                    <select required="true" name="Category" class="form-control" >
                        <option selected="selected" value="0">Select Category</option>
                        <?php 
                            $sql="SELECT * FROM category ORDER BY ID ASC"; 
                            $q = $connect->prepare($sql); 
                            $q->execute();
                            while($r = $q->fetch(PDO::FETCH_ASSOC))
                            {
                                echo  "<option value=".$r["ID"].">".$r["Category"]."</option>";
                            }
                        ?>
                    </select>
                </div>
                  
                <div class="form-group has-label">
                    <label>
                        Title
                        <star class="star">*</star>
                    </label>
                    <input minlength="2" maxlength="150" class="form-control" name="Title" type="text" required="true" placeholder="Enter blog title" value="<?php if(isset($getblog[0]["Title"])) echo $getblog[0]["Title"]; ?>" />
                </div>

                <div class="form-group has-label">
                    <label>
                        Photo
                    </label>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="form-group col-sm-2" style="border: 1px solid #ccc; height: 100px; align: center; ">
                                <div id="image-preview" class="image-preview"></div>
                            </div>
                            
                            <div class="form-group col-sm-10" >
                                
                                <input type="file" id="inputFile" name="Photo" class="form-control" >
                                
                                <small>Photo must not be greater than 5MB. </small><br/>
                                <small>Photo format must be PNG, JPG, JPEG. </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group has-label">
                    <label>
                        Message
                        <star class="star">*</star>
                    </label> 

                    <textarea required id="summernote" maxlength="50000" name="Message" placeholder="Enter Note"></textarea>

                </div>

              </div>

              <div class="clearfix"></div>
              <div class="col-sm-12 col-md-6 card-category form-category">
                  <star class="star">*</star> Required fields<br/>
                  <div>* Note: Copy this path <b>(../../files/images/blog/PICTURENAME)</b> to include pictures inside a blog story after which you must have uploaded desired pictures using the <b>Inner Blog Picture</b> Button</div>
              </div>

              <div class="card-footer " align="center">
                  <input style="color: rgb(1, 9, 53);" type="submit" class="btn btn-warning btn-lg btn-fill pull-center" name="blogUpload" value="POST">
                  <input style="color: rgb(1, 9, 53);" type="button" class="btn btn-default btn-lg btn-fill pull-center" value="CANCEL" onclick="blogUploadR(this.form);">
                  <input type="hidden" name="INSERT" value="7">
                  <input type="hidden" name="UID" value="<?php echo $_SESSION["duid"] ?>">
                  <div class="clearfix"></div>
              </div>

            </div>

          </form>

        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  
  <?php include("advert-portrait.php"); ?>
  </div>
  </section>
</div>

<?php } ?>





<!--============================================================================ 
                                Create Blog 
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "blog") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Blog</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Blog list</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  
<section class="content">
<div class="row">
  <div class="col-sm-7">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <h3 class="card-title">Stories</h3>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          
          <!-- blog properties -->
          <?php 

						$perpage = 5;

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
		
						while($r = $q->fetch(PDO::FETCH_ASSOC)) { ?>
					
						<!-- BEGIN FEATURED POST -->
						<div class="featured-post-wide blog-cover">

							<div align="center" class="">
								<?php if (empty($r["Photo"])  == TRUE) { echo ""; } 
									else { ?>
											<img src="../../files/images/blog/<?php echo $r["Photo"]; ?>" class="img-responsive blog-pic" alt="Image">
									<?php } 
								?>
							</div>

							<div class="featured-text relative-left blog-anc">
								
								<h3 align="center">
									<a class="" href="dashboard?dil=story&amb=<?php echo $r["ID"]; ?>"><?php echo $r["Title"]; ?></a>
                </h3>
                <small>
                  <p class="date" style="font-size: 13px">
                  <i class="fa fa-clock"></i>
                    <?php echo date("M-j-Y", strtotime($r["AddedOn"])); ?> at 
                    <?php echo date("g:ia", strtotime($r["AddedOn"])); 

                      if($_SESSION["accesslevel"] == "1")
                        { ?>
                          <a href="dashboard?dil=edit-blog&eed=<?php echo $r["ID"]; ?>" class='reg'>Edit</a>
                        
                          <a href="delete-blog?del=<?php echo $r["ID"]; ?>" class='reg'  
                          onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                        <?php } 
                    ?>
                  </p>
                </small>

								<div>
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
                      if ($checkstr == TRUE) { echo "...";}

									?>

								</div>
								<p class="additional-post-wrap" style="font-size: 13px">
									<span class="additional-post"><i class="fa fa-user"></i> by <a href="#fakelink">
										<?php 
											echo $home->AnyContent("Fname", "users", "ID", $r["UID"]);
										?>
									</a></span>
									<span class="additional-post"><i class="fa fa-clock"></i><a href="#fakelink">
										<?php echo date("Y M", strtotime($r["AddedOn"])); ?>
									</a></span>
									<span class="additional-post"><i class="fa fa-comment"></i><a href="#fakelink">
										<?php echo FetchIndividualContent(7, $r["ID"]) ?> comment(s)</a>
									</span>
								</p>
								
                  <?php if ($checkstr == TRUE) { ?>
                      <hr>
                  <a href="dashboard?dil=story&amb=<?php echo $r["ID"]; ?>" class="reg" >
                    <p class="text-right"><button class="btn btn-success">Read more</button></p>
                  </a>
                <?php } 
              ?>
                              
            </div><!-- /.featured-text -->
          </div><!-- /.featured-post-wide -->
          <!-- END FEATURED POST -->
   
					<?php } ?>

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
							echo "<span id='page_links' style='font-weight:bold; padding:20px;'>&laquo; Prev</span>";
						}
						else
						{
							$j = $page -1;
							echo "<span style='padding:20px;'><a id='page_a_link' class='reg' href='dashboard?dil=blog&page=$j'>&laquo; Prev</a></span>";
						}

						for ($i=1; $i <=$totalpages ; $i++) { 

							if($i<>$page)
							{
								//echo "<span><a id='page_links' href='index.php?page=$i'>$i</a></span>";
								if($mycounter<4)
								{
									//echo "<br>";
									echo "<span><a id='page_links' class='reg' href='dashboard?dil=blog&page=$i'>$i</a></span> - " ;
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
							echo "<span id='page_links' style='font-weight:bold; padding:20px;'>Next</span>";
						}
						else
						{
							$j = $page +1;
								echo "<span style='padding:20px;'><a id='page_a_link' class='reg' href='dashboard?dil=blog&page=$j' >Next &raquo;</a></span>";
						}
					} ?>

          <!-- Ends blog properties -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  
  <?php include("advert-portrait.php"); ?>
  </div>
  </section>
  </div>
<?php } ?>


<!--============================================================================ 
                                BLOG STORY
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "story") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Blog</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Stories</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<section class="content">
<div class="row">
  <div class="col-md-7">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <h3 class="card-title">Stories</h3>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">

            <!-- OPENS ITEM -->
            <div class="blog-cover">
                <div style="color: #000">
                    <?php  echo isset($response) ? $response : ""; ?>
                </div>
  
                <?php
                    $getblog = FetchIndividualContent("4", $_GET["amb"]);
                    $photo = $getblog[0]["Photo"];
                    $title = $getblog[0]["Title"];
                    $msg = $getblog[0]["Message"];
                    $blogid = $getblog[0]["ID"];
                ?>
                    
                <div align="center" class="title">
                    <h3><?php echo ucfirst($title); ?></h3>
                </div>

                <?php if($_SESSION["accesslevel"] == "1")
                    { ?>
                        <div align="center">
                            <a href="dashboard?dil=edit-blog&eed=<?php echo $getblog[0]["ID"]; ?>" class='reg'>Edit</a>
                        
                            <a href="delete-blog?del=<?php echo $getblog[0]["ID"]; ?>" class='reg'  
                            onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                        </div>

                <?php } ?>

                <hr/>

                <?php if (empty($photo)  == TRUE) { echo ""; } 
                    
                    else { ?>
                        
                        <div align="center" class="">
                            <img class="img-responsive blog-pic" src="../../files/images/blog/<?php echo $photo; ?>" >
                        </div>

                <?php } ?>
                
                
                <p class="blog-wrap">
                    <span class="additional-post"><i class="fa fa-user"></i><a href="#fakelink">
                        <?php 
                            echo $home->AnyContent("Fname", "users", "ID", $getblog[0]["UID"]);
                        ?>
                    </a></span>
                    <span class="additional-post"><i class="fa fa-clock-o"></i><a href="#fakelink">
                        <?php echo date("Y M", strtotime($getblog[0]["AddedOn"])); ?>
                    </a></span>
                    <span class="additional-post"><i class="fa fa-comment"></i><a href="#fakelink">
                        <?php echo FetchIndividualContent(7, $blogid) ?> comment(s)</a></span>
                </p>

                <div class="" style="padding: 10px 0px">
                    <p><?php echo $msg; ?></p>
                </div>


						
						<!-- COMMENT DIV -->
						<div class="" >

							<?php
								 $comsql = "SELECT * FROM blog_com WHERE BlogID = '".$blogid."' ORDER BY ComID ASC LIMIT 20";
								 $queryp = $connect->prepare($comsql);
								 $queryp->execute();
								 
								 while ($rep = $queryp->fetch(PDO::FETCH_ASSOC)) { ?>
								 	<div class="comment-wrap" style="margin: 10px 0px;">
									 	<div class="row">
											<?php 

												$ui_d = $home->AnyContent("ID", "users", "ID", $rep["UID"]);
												$acc_lv = $home->AnyContent("AccessLevel", "users", "ID", $rep["AccessLevel"]);

                        //If user exists in DB
											  if( (isset($ui_d) && $ui_d == TRUE) && (isset($acc_lv) && $acc_lv == TRUE) ) { 

                          $kk2 = $home->AnyContent("Photo", "users", "ID", $rep["UID"]); ?>

                          <div class="div-inline-1" style="border-right: 1px solid #ccc">  
                            
                              <?php if(!empty($kk2)) { ?>

                                  <img src="../../files/images/profilepics/<?php echo $kk2; ?>" class="img-circlez avatarz" alt="<?php echo $rep["CreatedBy"]; ?>">

                              <?php } else { ?>

                                  <img src="../../files/images/profilepics/default.png" class="img-circlez avatarz" alt="Avatar">

                              <?php } ?>
                              
                          </div>
                          
                          <div class="div-inline-2" style=" color: grey; word-wrap: break-word !important;">
                              <span style="font-size: 13px">
                                  <?php 
                                      echo "<b>".$home->AnyContent("Fname", "users", "ID", $rep["UID"])." ".$home->AnyContent("Sname", "users", "ID", $rep["UID"]). "</b>";
                                  ?>
                              </span>
                              
                              <span style="text-decoration: none; font-size: 11px">
                                  
                                  <?php echo date("j-M", strtotime($rep["AddedOn"])); ?> at <?php echo date("g:ia",strtotime($rep["AddedOn"])); 

                                  if( ($rep["UID"] == $_SESSION["duid"]) || ($_SESSION["accesslevel"] == "1") ){ ?> 

                                      <a href="delete-blogcom.php?del=<?php echo $rep["ComID"]; ?>&returnto=dashboard?one=story&amb=<?php echo $blogid; ?>" class='regz'  
                                      onclick="return confirm('Are you sure you want to delete this comment?');">Delete</a>

                                  <?php } ?>
                              </span>
                          <br/>
                      
                              <div class="" style="font-size: 13px; color: #000; padding-top: 15px; word-wrap: break-word !important;">
                                  <?php echo $rep["Message"]; ?>
                                  </div>
                              
                          </div>

											<?php }
											else{ ?> 
													
                          <div class="div-inline-1" style="border-right: 1px solid #ccc">  
                              
                                  <img src="../../files/images/profilepics/default.png" class="img-circlez avatarz" alt="Avatar">

                          </div>
                          
                          <div class="div-inline-2" style=" color: grey">
                              
                              <b style="font-size: 13px"><?php echo $rep["CreatedBy"]; ?></b>
                              <!-- <div class="clearfix"></div> -->
                              <span style="text-decoration: none; font-size: 11px">
                                  
                                  <?php echo date("j-M", strtotime($rep["AddedOn"])); ?> at <?php echo date("g:ia",strtotime($rep["AddedOn"])); 

                                  if($_SESSION["accesslevel"] == "1"){ ?> 

                                      <a href="delete-blogcom.php?del=<?php echo $rep["ComID"]; ?>" class='regz'  
                                      onclick="return confirm('Are you sure you want to delete this comment?');">Delete</a>

                                  <?php } ?>
                              
                              </span>
                                  
                              <div style="font-size: 13px; color: #000; padding-top: 15px;">
                                  <?php echo $rep["Message"]; ?>
                              </div>
                              
                          </div>
											<?php } ?>
											
									 	</div>		
									</div>
								<?php  }  ?>
								
								<div style="padding-top: 15px">
									<form action="" method="POST" class="form-group">
                      <?php 
                      //    if (isset($_SESSION["duid"])){
                      //        $name = $home->AnyContent("Fname", "users", "ID", $_SESSION["duid"]);
                      //        $uid = $home->AnyContent("ID", "users", "ID", $_SESSION["duid"]);
                      //        $acclev = $home->AnyContent("AccessLevel", "users", "ID", $_SESSION["duid"]);
                      //    }else{
                      //        $name = "Anonymous";
                      //        $uid = "0";
                      //        $acclev = "0";
                      //    }
                      ?>
                      <div  class="row" >
                          <div class="col-sm-10 div-inline-com-1">
                              <input maxlength="1000" name="Message" placeholder="Comment here.." class="form-control" required >
                          </div>

                          <div class="col-sm-1 div-inline-com-2" align="right">
                              <input type="submit" class="btn btn-default btn-md" value="comment">
                              <input type="hidden" name="INSERT" value="11">
                              <input type="hidden" name="CreatedBy" value="<?php echo $fname; ?>">
                              <input type="hidden" name="BlogID" value="<?php echo $blogid; ?>">
                              <input type="hidden" name="AccessLevel" value="<?php echo $_SESSION["accesslevel"]; ?>">
                              <input type="hidden" name="UID" value="<?php echo $_SESSION["duid"]; ?>">
                          </div>
                      </div>
									</form>
								</div>
              </div>
              <!-- comment DIV -->

          </div>
          <!-- ENDS ITEM -->
        
        <!-- Ends blog properties -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  
  <?php include("advert-portrait.php"); ?>
  </div>
  </section>
  </div>

<?php } ?>






<!--============================================================================ 
                                EDIT Blog 
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "edit-blog") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Blog</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Edit blog</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<section class="content">
<div class="row">
  <div class="col-md-7">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <h3 class="card-title">Edit Blog</h3>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">

               
          <form onsubmit="return blogUpdateF(this);" class="form-horizontal" method="POST" enctype="multipart/form-data">

              <?php
                  echo isset($response) ? $response : "";

                  $getblog = FetchIndividualContent("4", $_GET["eed"]);
                  $message = $getblog[0]["Message"];
                  $cat = $getblog[0]["Category"];
                  $title = $getblog[0]["Title"];
                  $photo = $getblog[0]["Photo"];
                  $id = $getblog[0]["ID"];
              ?>

              <div class="card ">
                  <div class="card-body ">
                      <div class="form-group has-label">
                          <label>
                              Category
                              <star class="star">*</star>
                          </label>
                          <select name="Category" class="form-control" >
                            <option selected="selected" value="0">Select Category</option>
                            <?php 
                              $sql="SELECT * FROM category ORDER BY Category ASC"; 
                              $q = $connect->prepare($sql); 
                              $q->execute();
                              while($r = $q->fetch(PDO::FETCH_ASSOC))
                              {
                                $ss = ($r["ID"] == $cat) ? "selected" : "";
                                echo  "<option value=".$r["ID"]." $ss>".$r["Category"]."</option>";
                              }
                            ?>
                          </select>
                        </div>
                                    
                        <div class="form-group has-label">
                            <label>
                                Title
                                <star class="star">*</star>
                            </label>
                            <input minlength="2" maxlength="150" class="form-control" name="Title" type="text" required="true"  placeholder="Title" value="<?php echo (isset($title)) ? $title : ""; ?>" />
                        </div>

                        <div class="form-group has-label">
                            <label>
                                Photo
                            </label>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="form-group col-sm-2 blog-pic-cover">
                                        <?php if(isset($photo) && $photo != "") 
                                            { ?>
                                                <img class="blog-pic" src="../../files/images/blog/<?php echo $photo; ?>" alt="Photo"> 
                                            <?php } else { ?>
                                                No Photo
                                        <?php } ?>
                                    </div>
                                    
                                    <div class="form-group col-sm-2 blog-pic-cover">
                                        <div id="image-preview" class="image-preview"></div>
                                    </div>
                                    
                                    <div class="form-group col-sm-8">
                                                    
                                      <input type="file" id="inputFile" name="Photo" class="form-control" >
                                      <!-- <input type="file" id="inputFile" name="Photo" class="form-control btn btn-success"> -->
                                      <input type="hidden" name="PhotoHolder" value="<?php echo (isset($photo)) ? $photo : ""; ?>" >
                                                    
                                      <small>Photo must not be greater than 5MB. </small><br/>
                                      <small>Photo format must be PNG, JPG, JPEG. </small>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                      <div class="form-group has-label">
                          <label>
                              Message
                              <star class="star">*</star>
                          </label> 

                          <textarea style="color:#000;" required  id="summernote" class="form-control" rows="3" maxlength="50000"  name="Message" placeholder="Enter Note">
                              <?php echo (isset($message)) ? $message : "" ?>
                          </textarea>
                          
                      </div>

                  </div>

                  <div class="clearfix"></div>
                  <div class="col-sm-12 col-md-6 card-category form-category">
                      <star class="star">*</star> Required fields
                      <div>* Note: Copy this path <b>(../../files/images/blog/PICTURENAME)</b> to include pictures inside a blog story after which you must have uploaded desired pictures using the <b>Inner Blog Picture</b> Button</div>
                      </div>

                  <div class="card-footer " align="center">
                      <input style="color: rgb(1, 9, 53);" type="submit" class="btn btn-warning btn-lg btn-fill pull-center" name="blogUpdate" value="UPDATE">
                      <input style="color: rgb(1, 9, 53);" type="button" class="btn btn-default btn-lg btn-fill pull-center" value="CANCEL" onclick="blogUpdateR(this.form);">
                    <input type="hidden" name="AccessLevel" value="<?php echo $_SESSION["accesslevel"]; ?>">
                    <input type="hidden" name="EDIT" value="4">
                    <input type="hidden" name="EDITVAL" value="<?php echo $id; ?>">
                    <div class="clearfix"></div>
                </div>

            </div>

          </form>

        <!-- Ends blog properties -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
 
  <?php include("advert-portrait.php"); ?>
  </div>
  </section>
  </div> 

<?php } ?>





<!--============================================================================ 
                                MESSAGE PICTURE
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "message-picture") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Blog</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Blog message picture</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


<section class="content">
<div class="row">
  <div class="col-md-7">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <h3 class="card-title">Message Picture</h3>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
 
          <form id="TypeValidation" class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="card">
                  <div class="card-body">

                      <h2>Create Story Album</h2>

                      <div class="form-group">
                          <input minlength="2" maxlength="100" class="form-control" type="text" name="Album">
                          <p class="help-block1">Min: 2 and Max: 100 Characters </p>
                          
                          <input class="btn btn-warning btn-block" type="submit" value="Create">
                          <input type="hidden" name="INSERT" value="17">
                      </div>
                            
                      <div class="clearfix"></div>

                      <p>Albums:</p>
                      <?php 
                          $sql = "SELECT * FROM story_album ORDER BY ID DESC";
                          $q = $connect->prepare($sql);
                          $q->execute();

                          while($row = $q->fetch(PDO::FETCH_ASSOC)){ ?>
                              <div style="border: 1px solid #ccc; padding: 5px;" class=""><?php echo $row["Album"]; ?>
                                  
                                  <a onclick="return confirm('Are you sure you want to delete this blog story album? If you click OK, you might loose access to any picture placed inside it if any');" class="btn btn-sm btn-danger" href="delete-story-album?del=<?php echo $row["ID"]; ?>" >Delete</a>
                          
                              </div>
                          <?php }
                      ?>
                  
                  </div>
              </div>
          </form>

          <form id="TypeValidation" onsubmit="return mesUploadF(this);" class="form-horizontal form-upload" method="post" enctype="multipart/form-data">
              <?php echo isset($statusMsg) ? $statusMsg : ""; ?>
              <div class="card">
                  <div class="card-body">

                      <div class="form-group has-label">
                          <select required="true" name="Album" class="form-control" >
                              <option selected="selected" value="0">Select Story Album</option>
                              <?php 
                                  $sql="SELECT * FROM story_album ORDER BY ID ASC"; 
                                  $q = $connect->prepare($sql); 
                                  $q->execute();
                                  if($q){
                                      while($r = $q->fetch(PDO::FETCH_ASSOC)) {
                                      echo  "<option value=".$r["ID"].">".$r["Album"]."</option>";
                                      }
                                  }else{
                                      echo "<p>You have to create story album first!</p>";
                                  }
                              ?>
                          </select>
                      </div>

                      <div id="maindiv">
                          <div id="formdiv">
                                  
                              <h4>Select Image Files to Upload:</h4>

                              <div align="center" id="filediv">

                                  <input class="uploadinput" type="file" name="files[]" multiple required="true">
                                  <!-- <input class="upload" type="submit" name="submit" value="UPLOAD"> -->
                                  <input type="submit" class="upload" name="mesUpload" value="UPLOAD">
                                  <input style="color: rgb(1, 9, 53);" type="button" class="btn btn-default btn-md btn-fill pull-center" value="CANCEL" onclick="mesUploadR(this.form);">
                                  <input type="hidden" name="INSERT" value="10">
                              </div>
                              
                          </div>
                      </div>
                      <div class="clearfix"></div>
                  
                  </div>
              </div>
          </form>

          <div class="card card-stats form-upload">
              <div class="card-body ">
                  <h4>Photos uploaded for blog message pictures</h4>
                  <p>Open by Story Album:
                      <div style="display: inline">
                          <?php
                              $sql = "SELECT message_picture.Album as galid, story_album.Album as albumname FROM message_picture 
                                      RIGHT JOIN story_album on message_picture.Album = story_album.ID GROUP BY message_picture.Album"; 
                              $q_alb = $connect->prepare($sql); 
                              $q_alb->execute();

                              foreach($q_alb as $key => $val){
                                  echo " <a href='dashboard?dil=story-album&aid=".$val["galid"]."' >
                                              <i style='display: inline' class='fa fa-picture'></i>" ." ". $val["albumname"] . "
                                          </a>
                                          <br/>
                                      ";
                              }
                          ?> 
                      </div>
                  </p>
                  <div class="gallery">
                      <?php
                          // Get images from the database
                          $sql="SELECT * FROM message_picture ORDER BY ID DESC"; 
                          $query = $connect->prepare($sql); 
                          $query->execute();

                          // Generate gallery view of the images
                          if(!empty($query)){
                              
                              while($row = $query->fetch(PDO::FETCH_ASSOC)){
                                  $imageURL = '../../files/images/blog/';

                                  $galid = $row["ID"];
                                  $jk = $row["Photo"];
                                  $jk = explode(",", $jk);
                                  
                                  foreach ($jk as $key) { ?>

                                      <a href="<?php echo $imageURL . $key; ?>" data-toggle="lightbox" data-title="<?php echo $key; ?>" data-gallery="gallery">
                                          <img src="<?php echo $imageURL . $key; ?>" class="img-fluid mb-2" alt="<?php echo $key; ?>"/>
                                      </a>
                                           
                                      <?php if(isset($_SESSION["accesslevel"]) && $_SESSION["accesslevel"] == "1") { ?>
                                          <a onclick="return confirm('Are you sure you want to delete this picture? You might not be able to recover it.'); " href="delete-story-pic?galid=<?php echo $galid; ?>" >
                                              Delete 
                                          </a>
                                      <?php } ?>

                                  <?php } ?>
                              <?php }
                          } 
                          else{ ?>
                                  <p>No image found!</p>
                              <?php } 
                      ?> 
                  </div>
              </div>
          </div>


        <!-- Ends blog properties -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  

  <?php include("advert-portrait.php"); ?>
  </div>
  </section>
</div>
<?php } ?>





<!--============================================================================ 
                                   ALBUM
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "story-album") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Story Album</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Blog story album</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <section class="content">
    <div class="row">
      <div class="col-md-7">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <h3 class="card-title">
                  <strong>
                    <?php  
                          echo $home->AnyContent( "Album", "story_album", "ID", $_GET["aid"] ); 
                    ?> 
                  </strong>
                album
              </h3>
            </ul>
          </div><!-- /.card-header -->
          
          <div class="card-body">
            <div class="tab-content">

                    <div class="card card-stats form-upload">
                        <div class="card-body ">
                           
                            <div class="gallery">
                                <?php
                                    // Get images from the database
                                    $alb_id = $_GET["aid"];

                                    $sql = "SELECT * FROM message_picture WHERE Album = '".$alb_id."' ORDER BY ID DESC"; 
                                    $query = $connect->prepare($sql); 
                                    $query->execute();

                                    // Generate gallery view of the images
                                    if(!empty($query)){
                                        
                                      while($row = $query->fetch(PDO::FETCH_ASSOC)){
                                        $imageURL = '../../files/images/blog/';
      
                                        $galid = $row["ID"];
                                        $jk = $row["Photo"];
                                        $jk = explode(",", $jk);
                                        
                                        foreach ($jk as $key) { ?>
      
                                            <a href="<?php echo $imageURL . $key; ?>" data-toggle="lightbox" data-title="<?php echo $key; ?>" data-gallery="gallery">
                                                <img src="<?php echo $imageURL . $key; ?>" class="img-fluid mb-2" alt="<?php echo $key; ?>"/>
                                            </a>
                                                 
                                            <?php if(isset($_SESSION["accesslevel"]) && $_SESSION["accesslevel"] == "1") { ?>
                                                <a onclick="return confirm('Are you sure you want to delete this picture? You might not be able to recover it.'); " href="delete-story-pic?galid=<?php echo $galid; ?>" >
                                                    Delete 
                                                </a>
                                            <?php } ?>
      
                                        <?php } ?>
                                    <?php }
                                    } 
                                    else{ ?>
                                            <p>No image(s) found...</p>
                                        <?php } 
                                ?> 
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
      </div>
    </div>
  </section>


<?php } ?>







<!--============================================================================ 
                                GALLERY
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "gallery") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gallery</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Gallery</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


<section class="content">
<div class="row">
  <div class="col-md-7">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <h3 class="card-title">Gallery</h3>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
 
          <form id="TypeValidation" class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="card">
                  <div class="card-body">

                      <h2>Create Album</h2>

                      <div class="form-group">
                          <input minlength="2" maxlength="100" class="form-control" type="text" name="Album">
                          <p class="help-block1">Min: 2 and Max: 100 Characters </p>
                          
                          <input class="btn btn-warning btn-block" type="submit" value="Create">
                          <input type="hidden" name="INSERT" value="16">
                      </div>
                            
                      <div class="clearfix"></div>

                      <p>Albums:</p>
                      <?php 
                          $sql = "SELECT * FROM album ORDER BY ID DESC";
                          $q = $connect->prepare($sql);
                          $q->execute();

                          while($row = $q->fetch(PDO::FETCH_ASSOC)){ ?>
                              <div style="border: 1px solid #ccc; padding: 5px;" class=""><?php echo $row["Album"]; ?>
                                  
                                  <a onclick="return confirm('Are you sure you want to delete this album? If you click OK, you might loose access to any picture placed inside it if any.');" class="btn btn-sm btn-danger" href="delete-album?del=<?php echo $row["ID"]; ?>" >Delete</a>
                          
                              </div>
                          <?php }
                      ?>
                  
                  </div>
              </div>
          </form>

          <form id="TypeValidation" onsubmit="return galUploadF(this);" class="form-horizontal form-upload" method="post" enctype="multipart/form-data">
              <?php echo isset($statusMsg) ? $statusMsg : ""; ?>
              <div class="card">
                  <div class="card-body">

                      <div class="form-group has-label">
                          <select required="true" name="Album" class="form-control" >
                              <option selected="selected" value="0">Select Album</option>
                              <?php 
                                  $sql="SELECT * FROM album ORDER BY ID ASC"; 
                                  $q = $connect->prepare($sql); 
                                  $q->execute();
                                  if($q){
                                      while($r = $q->fetch(PDO::FETCH_ASSOC)) {
                                      echo  "<option value=".$r["ID"].">".$r["Album"]."</option>";
                                      }
                                  }else{
                                      echo "<p>You have to create an album first!</p>";
                                  }
                              ?>
                          </select>
                      </div>

                      <div id="maindiv">
                          <div id="formdiv">
                                  
                              <h4>Select Image Files to Upload:</h4>

                              <div align="center" id="filediv">

                                  <input class="uploadinput" type="file" name="files[]" multiple required="true">
                                  <!-- <input class="upload" type="submit" name="submit" value="UPLOAD"> -->
                                  <input type="submit" class="upload" name="galUpload" value="UPLOAD">
                                  <input style="color: rgb(1, 9, 53);" type="button" class="btn btn-default btn-md btn-fill pull-center" value="CANCEL" onclick="galUploadR(this.form);">
                                  <input type="hidden" name="INSERT" value="8">
                              </div>
                              
                          </div>
                      </div>
                      <div class="clearfix"></div>
                  
                  </div>
              </div>
          </form>

          <div class="card card-stats form-upload">
              <div class="card-body ">
                  <h4>Photos in gallery</h4>
                  <p>Open by Album:
                      <div style="display: inline">
                          <?php
                              $sql = "SELECT gallery.Album as galid, album.Album as albumname FROM gallery 
                                      RIGHT JOIN album on gallery.Album = album.ID GROUP BY gallery.Album"; 
                              $q_alb = $connect->prepare($sql); 
                              $q_alb->execute();

                              foreach($q_alb as $key => $val){
                                  echo " <a href='dashboard?dil=album&aid=".$val["galid"]."' >
                                              <i style='display: inline' class='fa fa-picture'></i>" ." ". $val["albumname"] . "
                                          </a>
                                          <br/>
                                      ";
                              }

                          ?> 
                      </div>
                  </p>
                  <div class="gallery">
                      <?php
                          // Get images from the database
                          $sql="SELECT * FROM gallery ORDER BY ID DESC"; 
                          $query = $connect->prepare($sql); 
                          $query->execute();

                          // Generate gallery view of the images
                          if(!empty($query)){
                              
                              while($row = $query->fetch(PDO::FETCH_ASSOC)){
                                  $imageURL = '../../files/gallery/img/';

                                  $galid = $row["ID"];
                                  $jk = $row["Photo"];
                                  $jk = explode(",", $jk);
                                  
                                  foreach ($jk as $key) { ?>

                                      <a href="<?php echo $imageURL . $key; ?>" data-toggle="lightbox" data-title="<?php echo $key; ?>" data-gallery="gallery">
                                          <img src="<?php echo $imageURL . $key; ?>" class="img-fluid mb-2" alt="<?php echo $key; ?>"/>
                                      </a>
                                           
                                      <?php if(isset($_SESSION["accesslevel"]) && $_SESSION["accesslevel"] == "1") { ?>
                                          <a onclick="return confirm('Are you sure you want to delete this picture? You might not be able to recover it.'); " href="delete-album-pic?galid=<?php echo $galid; ?>" >
                                              Delete 
                                          </a>
                                      <?php } ?>

                                  <?php } ?>
                              <?php }
                          } 
                          else{ ?>
                                  <p>No image found!</p>
                              <?php } 
                      ?> 
                  </div>
              </div>
          </div>


        <!-- Ends blog properties -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  

  <?php include("advert-portrait.php"); ?>
  </div>
  </section>
</div>
<?php } ?>






<!--============================================================================ 
                                   ALBUM
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "album") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Album</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">album</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


<section class="content">
<div class="row">
  <div class="col-md-7">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <h3 class="card-title">
              <strong>
                <?php
                      echo $home->AnyContent( "Album", "album", "ID", $_GET["aid"] ); 
                ?> 
              </strong>
            album
          </h3>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">

                    <div class="card card-stats form-upload">
                        <div class="card-body ">
                           
                            <div class="gallery">
                                <?php
                                    // Get images from the database
                                    $alb_id = $_GET["aid"];

                                    $sql = "SELECT * FROM gallery WHERE Album = '".$alb_id."' ORDER BY ID DESC"; 
                                    $query = $connect->prepare($sql); 
                                    $query->execute();

                                    // Generate gallery view of the images
                                    if(!empty($query)){
                                        
                                      while($row = $query->fetch(PDO::FETCH_ASSOC)){
                                        $imageURL = '../../files/gallery/img/';
      
                                        $galid = $row["ID"];
                                        $jk = $row["Photo"];
                                        $jk = explode(",", $jk);
                                        
                                        foreach ($jk as $key) { ?>
      
                                            <a href="<?php echo $imageURL . $key; ?>" data-toggle="lightbox" data-title="<?php echo $key; ?>" data-gallery="gallery">
                                                <img src="<?php echo $imageURL . $key; ?>" class="img-fluid mb-2" alt="<?php echo $key; ?>"/>
                                            </a>
                                                 
                                            <?php if(isset($_SESSION["accesslevel"]) && $_SESSION["accesslevel"] == "1") { ?>
                                                <a onclick="return confirm('Are you sure you want to delete this picture? You might not be able to recover it.'); " href="delete-album-pic?galid=<?php echo $galid; ?>" >
                                                    Delete 
                                                </a>
                                            <?php } ?>
      
                                        <?php } ?>
                                    <?php }
                                    } 
                                    else{ ?>
                                            <p>No image(s) found...</p>
                                        <?php } 
                                ?> 
                            </div>
                        </div>
                    </div>


                </div>
            </div>
      </div>
    </div>
  </section>


<?php } ?>





<!--============================================================================ 
                                NICHE
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "niche") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Workers Niche</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Workers niche</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <?php 
              $sql = "SELECT * FROM worker_slide ORDER BY ID ASC LIMIT 20";
              $q = $connect->prepare($sql);
              $q->execute();

              $count = 1;

              while($rows = $q->fetch(PDO::FETCH_ASSOC)){ ?>

                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      
                      <a href="dashboard?dil=professionals&wid=<?php echo $rows["ID"]; ?>" class="reg">
                          <img style="height: 100%; width:100%" src="../../files/images/slider/<?php echo $rows["Photo"]; ?>" class="img-responsive"> 
                      </a> 

                      <p style="text-align: center"><?php echo $rows["Title"]; ?></p>

                    </div>
                  </div>
                </div><!-- ./col -->

              <?php $count++; } 
          ?>

        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<?php } ?>





<!--============================================================================ 
                               PROFESSIONALS
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "professionals") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Professions</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Professions</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">
          <?php 
            $pid = $_SESSION["duid"];
            $niche_id = $_GET["wid"];

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
            
						$sql = "SELECT * FROM profile w WHERE FIND_IN_SET($niche_id, w.Niche) AND UID <> $pid ORDER BY Experience DESC LIMIT $start, $perpage";
						$q = $connect->prepare($sql); 
						$q->execute();
		
            if($q->rowCount() > 0){

              while($val = $q->fetch(PDO::FETCH_ASSOC)) { ?>
        
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                  <div class="card bg-light">
                    <div class="card-header text-muted border-bottom-0">
                      <?php echo $home -> AnyContent("Role", "users", "ID", $val["UID"]); ?>
                    </div>

                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead">
                            <b>
                              <?php echo $home -> AnyContent("Fname", "users", "ID", $val["UID"]) ." ". $home -> AnyContent("Sname", "users", "ID", $val["UID"]); ?>
                            </b>
                          </h2>
                          <p class="text-muted text-sm"><b>About: </b> <br/>
                            Skills: <?php echo $val["Skills"]; ?><br/>
                            Experience: <?php echo $val["Experience"]; echo isset($val["Experience"]) ? " years" : ""; ?> <br/>
                            Certifications: <?php echo $val["Certification"]; ?><br/>
                          </p>
                          <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> 
                            Address 1: <?php echo $val["Address1"]; ?><br/>
                            Address 2: <?php echo $val["Address2"]; ?>
                            </li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> 
                              Phone: <?php echo $val["Phone"]; ?>
                              </li>
                          </ul>
                        </div>
                        <div class="col-5 text-center">
                          
                            <?php 
                                  $photo = $home -> AnyContent("Photo", "users", "ID", $val["UID"]);
                                  if( isset($photo) && !empty($photo) ) 
                                  { ?>
                                      <img alt="user-avatar" class="img-circle img-fluid" src="../../files/images/profilepics/<?php echo $photo; ?>" > 
                                  <?php } else { ?>
                                      <img alt="user-avatar" class="img-circle img-fluid" src="../../files/images/profilepics/default.png">
                            <?php } ?>

                        </div>
                      </div>
                    </div>

                    <div class="card-footer">
                      <div class="text-right">
                        <a href="#" class="btn btn-sm bg-teal">
                          <i class="fas fa-comments"></i>
                        </a>
                        <a href="dashboard?dil=view-profile&pro=<?php echo $val["UID"]; ?>" class="btn btn-sm btn-primary">
                          <i class="fas fa-user"></i> View Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

              <?php }
            } 
            else{ ?>
                <p>No worker enlisted for this niche yet! Please check back later</p>
            <?php }  
        
        ?>
          
     
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <nav aria-label="Contacts Page Navigation">
          <ul class="pagination justify-content-center m-0">

              <?php if(isset($page))
              {
                $result = "SELECT COUNT(ID) as Total FROM profile w WHERE FIND_IN_SET($niche_id, w.Niche) AND UID <> $pid ORDER BY Experience DESC LIMIT $start, $perpage";
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


            <!-- <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item"><a class="page-link" href="#">6</a></li>
            <li class="page-item"><a class="page-link" href="#">7</a></li>
            <li class="page-item"><a class="page-link" href="#">8</a></li> -->
          </ul>
        </nav>
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->

</div>

<?php } ?>




<!--============================================================================ 
                               VIEW PROFILE
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "view-profile") { ?>

 <?php
        $uid = $_GET["pro"];
        //echo $uid;
        $user_pro = FetchIndividualContent("19", $uid);

        $uid_fname = $home -> AnyContent("Fname", "users", "ID", $uid);
        $uid_sname = $home -> AnyContent("Sname", "users", "ID", $uid);
        $uid_photo = $home -> AnyContent("Photo", "users", "ID", $uid);
        $uid_role = $home -> AnyContent("Role", "users", "ID", $uid);
        $uid_bio = $home -> AnyContent("Bio", "users", "ID", $uid);

        $id= $user_pro[0]["ID"];
        $email= $user_pro[0]["Email"];
        $phone = $user_pro[0]["Phone"];
        $edu = $user_pro[0]["Education"];
        $skills = $user_pro[0]["Skills"];
        $cert = $user_pro[0]["Certification"];
        $exp = $user_pro[0]["Experience"];
        $addr1 = $user_pro[0]["Address1"];
        $addr2 = $user_pro[0]["Address2"];
        $hob = $user_pro[0]["Hobby"];
        $lang = $user_pro[0]["Language"];
        $ref = $user_pro[0]["Referee"];
        $resume = $user_pro[0]["Resume"];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
              <?php //echo $uid_fname ." ". $uid_sname; ?>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $uid_fname;?>'s profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                
                    <?php 
                      if(isset($uid_photo) && !empty($uid_photo)) { ?>

                          <img src="../../files/images/profilepics/<?php echo $uid_photo; ?>" class="profile-user-img img-fluid img-circle" 
                          alt="<?php echo $uid_fname; ?>">
                          <?php } else { ?>
                              <img src="../../files/images/profilepics/default.png"  class="profile-user-img img-fluid img-circle" alt="Avatar">
                          <?php } 
                    ?>
              </div>

              <h3 class="profile-username text-center"><?php echo $uid_fname." " .$uid_sname; ?></h3>

              <p class="text-muted text-center"><?php echo $uid_role; ?></p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Followers</b> <a class="float-right">0</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="float-right">0</a>
                </li>
                <li class="list-group-item">
                  <b>Connects</b> <a class="float-right">0</a>
                </li>
              </ul>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
              <strong><i class="fas fa-book mr-1"></i> Bio</strong>

              <p class="text-muted">
                <?php
                    if(isset($uid_bio)){
                        $string = $uid_bio;
                        $string = strip_tags($string);

                        $checkstr = strlen($string) > 100;

                        if ($checkstr == TRUE) {

                          $stringCut = substr($string, 0, 100);

                          $fd= substr($stringCut, 0, strrpos($stringCut, ' '));
                          $string = $fd;
                        } 
                        echo $string;
                        if ($checkstr == TRUE) { echo "...";}
                    }else{ ?>
                        User profile incomplete
                <?php } ?>
              </p>

              <hr>
              
              <strong><i class="fas fa-book mr-1"></i> Education</strong>

              <p class="text-muted">
                <?php
                    if(isset($edu)){
                        $string = $edu;
                        $string = strip_tags($string);

                        $checkstr = strlen($string) > 100;

                        if ($checkstr == TRUE) {

                          $stringCut = substr($string, 0, 100);

                          $fd= substr($stringCut, 0, strrpos($stringCut, ' '));
                          $string = $fd;
                        } 
                        echo $string;
                        if ($checkstr == TRUE) { echo "...";}
                    }else{ ?>
                        User profile incomplete
                <?php } ?>
              </p>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

              <p class="text-muted"> 
                <?php
                    if(isset($addr1)){
                        $string = $addr1;
                        $string = strip_tags($string);

                        $checkstr = strlen($string) > 100;

                        if ($checkstr == TRUE) {

                          $stringCut = substr($string, 0, 100);

                          $fd= substr($stringCut, 0, strrpos($stringCut, ' '));
                          $string = $fd;
                        } 
                        echo $string;
                        if ($checkstr == TRUE) { echo "...";}
                    }else{ ?>
                        User profile incomplete
                <?php }?>
              </p>

              <hr>

              <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

              <p class="text-muted">
                <?php
                    if(isset($skills)){
                        $string = $skills;
                        $string = strip_tags($string);

                        $checkstr = strlen($string) > 100;

                        if ($checkstr == TRUE) {

                          $stringCut = substr($string, 0, 100);

                          $fd= substr($stringCut, 0, strrpos($stringCut, ' '));
                          $string = $fd;
                        } 
                        echo $string;
                        if ($checkstr == TRUE) { echo "...";}
                    }else{ ?>
                        User profile incomplete
                <?php }?> 
              </p>

              <hr>

              <strong><i class="far fa-file-alt mr-1"></i> Interests</strong>

              <p class="text-muted">
                <?php
                    if(isset($hob)){
                        $string = $hob;
                        $string = strip_tags($string);

                        $checkstr = strlen($string) > 100;

                        if ($checkstr == TRUE) {

                          $stringCut = substr($string, 0, 100);

                          $fd= substr($stringCut, 0, strrpos($stringCut, ' '));
                          $string = $fd;
                        } 
                        echo $string;
                        if ($checkstr == TRUE) { echo "...";}
                    }else{ ?>
                        User profile incomplete
                <?php }?>
              </p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
               
                    <div class="form-group row">
                      <label class="col-sm-2">Email</label>
                      <div class="col-sm-10">
                        <div class="color-palette-set">
                          <div class="bg-light color-palette">
                            <span style="padding: 10px; "><?php echo (isset($email)) ? $email : ""; ?> </span>
                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">Phone</label>
                      <div class="col-sm-10">
                        <div class="color-palette-set">
                          <div class="bg-light color-palette">
                            <span style="padding: 10px; "><?php echo (isset($phone)) ? $phone : ""; ?> </span>
                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">Education</label>
                      <div class="col-sm-10">
                        <div class="color-palette-set">
                          <div class="bg-light color-palette">
                            <span style="padding: 10px; "><?php echo (isset($edu)) ? html_entity_decode($edu) : ""; ?> </span>
                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">Skills</label>
                      <div class="col-sm-10">
                        <div class="color-palette-set">
                          <div class="bg-light color-palette">
                            <span style="padding: 10px; "><?php echo (isset($skills)) ? $skills : ""; ?> </span>
                        </div>
                        </div>
                      </div>
                    </div>

                  <div class="form-group row">
                    <label class="col-sm-2">Experience (Years)</label>
                    <div class="col-sm-10">
                      <div class="color-palette-set">
                        <div class="bg-light color-palette">
                          <span style="padding: 10px; "><?php echo (isset($exp)) ? $exp : ""; ?> </span>
                      </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2">Certification</label>
                    <div class="col-sm-10">
                      <div class="color-palette-set">
                        <div class="bg-light color-palette">
                          <span style="padding: 10px; "><?php echo (isset($cert)) ? $cert : ""; ?> </span>
                      </div>
                      </div>
                    </div>
                  </div>

                <div class="form-group row">
                  <label class="col-sm-2">Address 1</label>
                  <div class="col-sm-10">
                    <div class="color-palette-set">
                      <div class="bg-light color-palette">
                        <span style="padding: 10px; "><?php echo (isset($addr1)) ? $addr1 : ""; ?> </span>
                    </div>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2">Address 2</label>
                  <div class="col-sm-10">
                    <div class="color-palette-set">
                      <div class="bg-light color-palette">
                        <span style="padding: 10px; "><?php echo (isset($addr2)) ? $addr2 : ""; ?> </span>
                    </div>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2">Hobbies and Interests</label>
                  <div class="col-sm-10">
                    <div class="color-palette-set">
                      <div class="bg-light color-palette">
                        <span style="padding: 10px; "><?php echo (isset($hob)) ? $hob : ""; ?> </span>
                    </div>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2">Languages</label>
                  <div class="col-sm-10">
                    <div class="color-palette-set">
                      <div class="bg-light color-palette">
                        <span style="padding: 10px; "><?php echo (isset($lang)) ? $lang : ""; ?> </span>
                    </div>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2">Referee</label>
                  <div class="col-sm-10">
                    <div class="color-palette-set">
                      <div class="bg-light color-palette">
                        <span style="padding: 10px; "><?php echo (isset($ref)) ? $ref : ""; ?> </span>
                    </div>
                    </div>
                  </div>
                </div>
                    
                <div class="form-group row">
                    <label class="col-sm-2 ">
                        Curriculum Vitae
                    </label>
                    <div class="col-sm-8" style="float: left">
                        <?php if(isset($resume) && $resume !="") 
                            { 
                                $ext =  pathinfo($resume, PATHINFO_EXTENSION);
                                //if file is a picture
                                if($ext == "png" || $ext == "jpg" || $ext == "jpeg") { ?>
                                      <img height="100px" width="100px" src="../../files/resume/<?php echo $resume; ?>" alt="<?php echo $fname; ?>"> 
                                  <?php } 
                                  //if file is a document
                                elseif($ext == "pdf" || $ext == "doc" || $ext == "docx") { ?>
                                      <a href="../../files/resume/<?php echo $resume; ?>" class="btn btn-flat btn-primary">
                                      <small>Download File</small></a> 
                                    <?php }
                                else { ?>
                                      <img height="100px" width="100px" src="../../files/resume/resume-logo.jpg" alt="CV empty">
                                  <?php }
                        
                            } else { ?>
                              <img height="100px" width="100px" src="../../files/resume/resume-logo.jpg" alt="CV empty">
                          <?php }?>
                    </div>
                </div>


              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php } ?>






<!--============================================================================ 
                                Create Job
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "post-job") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Job</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Post job</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  
  
<section class="content">
<div class="row">

  <div class="col-md-7">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <h3 class="card-title">Post Job</h3>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <form onsubmit="return jobUploadF(this);" class="form-horizontal" method="POST" enctype="multipart/form-data">
            <?php echo (isset($response)) ? $response : ""; ?>
            <div class="card ">
              
              <div class="card-body ">
                
                  
                <div class="form-group has-label">
                    <label>
                        Title
                    </label>
                    <input required minlength="10" maxlength="100" class="form-control" name="Title" type="text" placeholder="Min character length = 10, max = 100" />
                </div>

                <div class="form-group has-label">
                    <label>
                        Job Type
                        <star class="star">*</star>
                    </label>
                    <select required name="Type" class="form-control" >
                        <option selected="selected" value="0">Select Type</option>
                        <?php 
                            $sql="SELECT * FROM job_type ORDER BY ID ASC"; 
                            $q = $connect->prepare($sql); 
                            $q->execute();
                            while($r = $q->fetch(PDO::FETCH_ASSOC))
                            {
                                echo  "<option value=".$r["ID"].">".$r["Type"]."</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group has-label">
                    <label>
                        Description
                        <star class="star">*</star>
                    </label> 
                    <textarea required id="summernote" maxlength="1000" name="Description" placeholder="Enter job decription"></textarea>
                </div>
                  
                <div class="form-group has-label">
                    <label>
                        Budget
                        <star class="star">*</star>
                    </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">-N-</span>
                        </div>
                        <input required minlength="1" maxlength="20" class="form-control" name="Pay" type="number" placeholder="Enter amount in naira" />
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
                  
                  <div class="form-group">
                      <label>
                          Duration
                          <star class="star">*</star>
                      </label>
                      <div class="clearfix"></div>
                      <small>Start date - End date</small>
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                          </div>
                          <input required name="Duration" type="text" class="form-control float-right" id="reservationtime">
                      </div>

                  </div>
                  
                <div class="form-group has-label">
                    <label>
                        Experience (Years)
                    </label>
                    <input minlength="1" maxlength="3" class="form-control" name="Experience" type="number" placeholder="Enter Experience in years" />
                </div>

                <div class="form-group has-label">
                    <label>
                        Sample
                    </label>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="form-group col-sm-2" style="border: 1px solid #ccc; height: 100px; align: center; ">
                                <div id="image-preview" class="image-preview"></div>
                            </div>
                            
                            <div class="form-group col-sm-10" >
                                
                                <input type="file" id="inputFile" name="Photo" class="form-control" >
                                
                                <small>Photo must not be greater than 3MB. </small><br/>
                                <small>Photo format must be PNG, JPG, JPEG. </small>
                            </div>
                        </div>
                    </div>
                </div>

              </div>

              <div class="clearfix"></div>
              <div class="col-sm-12 col-md-6 card-category form-category">
                  <star class="star">*</star> Required fields
              </div>

              <div class="card-footer " align="center">
                  <input style="color: rgb(1, 9, 53);" type="submit" class="btn btn-warning btn-lg btn-fill pull-center" name="jobUpload" value="POST">
                  <input style="color: rgb(1, 9, 53);" type="button" class="btn btn-default btn-lg btn-fill pull-center" value="CANCEL" onclick="jobUploadR(this.form);">
                  <input type="hidden" name="INSERT" value="21">
                  <input type="hidden" name="UID" value="<?php echo $_SESSION["duid"] ?>">
                  <div class="clearfix"></div>
              </div>

            </div>

          </form>

        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->

    <h2>Posted Jobs</h2>
     <!-- Default box -->
     <div class="card card-solid">
      <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">
          <?php 
            $pid = $_SESSION["duid"];

						$perpage = 10;

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

						$sql = "SELECT * FROM job WHERE UID = $pid ORDER BY ID DESC LIMIT $start, $perpage";
						$q = $connect->prepare($sql); 
						$q->execute();
		
            while($val = $q->fetch(PDO::FETCH_ASSOC)) { ?>
      
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2" style="border: 1px solid pink; border-radius: 10px; padding: 10px;">
                  <h3 class="text-primary"><i class="fas fa-briefcase"></i> <?php echo $val["Title"]; ?></h3>
                  <small style="color: #595959;">Posted: <?php echo date("D M, y - h:i:s a", strtotime($val["AddedOn"])); ?></small>
                  <p class="text-muted">
                    <?php
                      if(isset($val["Description"])){
                          $string = $val["Description"];
                          $string = strip_tags($string);

                          $checkstr = strlen($string) > 100;

                          if ($checkstr == TRUE) {

                            $stringCut = substr($string, 0, 100);

                            $fd= substr($stringCut, 0, strrpos($stringCut, ' '));
                            $string = $fd;
                          } 
                          echo $string;
                          if ($checkstr == TRUE) { echo "...";}
                      }else{ ?>
                          Not stated
                    <?php }?> 
                  </p>
                  <br>
                  <div class="text-muted">
                    <p class="text-sm">Job Type
                      <b class="d-block"><?php echo $home->AnyContent("Type", "job_type", "ID", $val["Type"]); ?></b>
                    </p>
                    <p class="text-sm">Budget
                      <b class="d-block"><strike>N</strike> <?php echo $val["Pay"]; ?></b>
                    </p>
                    <p class="text-sm">Duration
                      <b class="d-block"><?php echo $val["Duration"]; ?></b>
                    </p>
                    <p class="text-sm">Experience
                      <b class="d-block"><?php echo $val["Experience"]; ?> Year(s)</b>
                    </p>
                  </div>     

                  <div class="text-center mt-5 mb-3">
                    <div class="">
                      <?php             
                        $jid = $val["ID"];
                        $pid = $_SESSION["duid"]; 

                        //$q = $home->select("job_attach", "*", "PID = '".$pid."' AND JID = '".$jid."' "); 
                        
                        $sqla = "SELECT * FROM job_attach WHERE PID = '".$pid."' AND JID = '".$jid."' ";
                        $q = $connect->prepare($sqla);
                        $q->execute();

                        if(isset($q)){
                            foreach($q as $job => $jb){

                              if($jb["Apply"] == 3)
                              { ?>
                                  <a href="../../appfunctions/appfunctions.php?accept-job=3&xid=<?php echo $jid; ?>&yid=<?php echo $pid; ?>" class="btn btn-danger btn-sm"  style="margin:5px !important;">
                                      Rejected, Accept Applicant?
                                  </a>
                                <?php 
                              }
                              elseif($jb["Apply"] == 2)
                              { ?>
                                  <a style="margin:5px !important;" href="../../appfunctions/appfunctions.php?accept-job=2&xid=<?php echo $jid; ?>&yid=<?php echo $pid; ?>" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to cancel this application?')">
                                  Accepted, Cancel?
                                  </a>
                                <?php
                              }
                              elseif($jb["Apply"] == 1)
                              { ?>
                                  <a style="margin:5px !important;" href="../../appfunctions/appfunctions.php?accept-job=1&xid=<?php echo $jid; ?>&yid=<?php echo $pid; ?>" class="btn btn-warning btn-sm">
                                    Unattended to! Accept?
                                  </a>
                                <?php
                              }else{ ?>
                                  <a style="margin:5px !important;" href="../../confirm-account" class="btn btn-danger btn-sm" >
                                      Application Error!
                                  </a>
                              <?php }
                            }
                        }
                      ?>
                    </div>
                    <a href="dashboard?dil=job-detail&id=<?php echo $val["ID"]; ?>" class="btn btn-sm btn-primary">Full Details</a>
                    <a href="delete-job?del=<?php echo $val["ID"]; ?>" onclick="return confirm('Are you sure you want to delete this job post?')" class="btn btn-sm btn-danger">Delete Job</a>
                  </div>
                </div>

            <?php }
          ?>
          
     
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <nav aria-label="Contacts Page Navigation">
          <ul class="pagination justify-content-center m-0">

              <?php if(isset($page))
              {
                $result = "SELECT COUNT(ID) as Total FROM job WHERE UID = $pid ORDER BY ID DESC LIMIT $start, $perpage";
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
                  echo "<span style='padding:20px;'><a id='page_a_link' class='reg' href='dashboard?dil=post-job&page=$j'>&laquo; Prev</a></span>";
                }

                for ($i=1; $i <=$totalpages ; $i++) { 

                  if($i<>$page)
                  {
                    //echo "<span><a id='page_links' href='index.php?page=$i'>$i</a></span>";
                    if($mycounter<4)
                    {
                      //echo "<br>";
                      echo "<span><a id='page_links' class='reg' href='dashboard?dil=post-job&page=$i'>$i</a></span> - " ;
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
                    echo "<span style='padding:20px;'><a id='page_a_link' class='reg' href='dashboard?dil=post-job&page=$j' >Next &raquo;</a></span>";
                }
              } ?>

          </ul>
        </nav>
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->


  </div>

  <?php include("advert-portrait.php"); ?>

  </div>
  </section>

</div>

<?php } ?>




<!--============================================================================ 
                                Search JOB
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "job") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Jobs</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">job list</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">
          <?php 
            $pid = $_SESSION["duid"];

						$perpage = 10;

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

						$sql = "SELECT * FROM job WHERE UID <> $pid ORDER BY ID DESC LIMIT $start, $perpage";
						$q = $connect->prepare($sql); 
						$q->execute();
		
            while($val = $q->fetch(PDO::FETCH_ASSOC)) { ?>
      
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2" style="border: 1px solid pink; border-radius: 10px; padding: 10px;">
                  <h3 class="text-primary"><i class="fas fa-briefcase"></i> <?php echo $val["Title"]; ?></h3>
                  <small style="color: #595959;">Posted: <?php echo date("D M, y - h:i:s a", strtotime($val["AddedOn"])); ?></small>
                  <p class="text-muted">
                    <?php
                      if(isset($val["Description"])){
                          $string = $val["Description"];
                          $string = strip_tags($string);

                          $checkstr = strlen($string) > 100;

                          if ($checkstr == TRUE) {

                            $stringCut = substr($string, 0, 100);

                            $fd= substr($stringCut, 0, strrpos($stringCut, ' '));
                            $string = $fd;
                          } 
                          echo $string;
                          if ($checkstr == TRUE) { echo "...";}
                      }else{ ?>
                          Not stated
                    <?php }?> 
                  </p>
                  <br>
                  <div class="text-muted">
                    <p class="text-sm">Job Type
                      <b class="d-block"><?php echo $home->AnyContent("Type", "job_type", "ID", $val["Type"]); ?></b>
                    </p>
                    <p class="text-sm">Budget
                      <b class="d-block"><strike>N</strike> <?php echo $val["Pay"]; ?></b>
                    </p>
                    <p class="text-sm">Duration
                      <b class="d-block"><?php echo $val["Duration"]; ?></b>
                    </p>
                    <p class="text-sm">Experience
                      <b class="d-block"><?php echo $val["Experience"]; ?> Year(s)</b>
                    </p>
                  </div>

                  <h5 class="mt-5 text-muted">Sample</h5>
                  
                  <?php
                      $imageURL = '../../files/job/';
                      $sample = $val["Sample"];
                      
                      if(!empty($sample)) { ?>

                        <div class="filtr-item col-sm-4" data-category="1" data-sort="white sample">
                          <a href="<?php echo $imageURL . $sample; ?>" data-toggle="lightbox" data-title="<?php echo $val["Title"]; ?> Sample">
                            <img src="<?php echo $imageURL . $sample; ?>" class="img-fluid mb-2" alt="No Sample Selectedff"/>
                          </a>
                        </div>
                        
                  <?php }
                  else {
                    echo "No Sample Available";
                  } ?>         


                  <div class="text-center mt-5 mb-3">
                    <a href="dashboard?dil=job-detail&id=<?php echo $val["ID"]; ?>" class="btn btn-sm btn-primary">Full Details</a>
                                                        
                    <?php 
                        $job_id = $val["ID"];
                        $pid = $val["UID"];
                        $fid = $_SESSION["duid"];
                        
	                      $check = $crud->select("job_attach", "*", " JID = '".$job_id."' AND PID = '".$pid."' AND FID = '".$fid."' ");
                        //$check = $home->AnyContent("job_attach", "job", "ID", $job_id);
                        //$rex = explode($check, ",");
                        // $rex = array($check);
                        // $arrlength = count($rex);
                        //for($x = 0; $x < $arrlength; $x++) {
                        
                          if($check == FALSE)
                          { ?>
                              <a href="../../appfunctions/appfunctions.php?apply-job=2&xid=<?php echo $job_id; ?>&yid=<?php echo $pid; ?>&zid=<?php echo $fid; ?>" class="btn btn-warning btn-sm">
                                Apply Now
                              </a>
                            <?php 
                          }
                          elseif($check == TRUE)
                          { ?>
                              <a href="../../appfunctions/appfunctions.php?apply-job=1&xid=<?php echo $job_id; ?>&yid=<?php echo $pid; ?>&zid=<?php echo $fid; ?>" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to cancel this application?')">
                                Applied, Cancel?
                              </a>
                          <?php  
                          }else{ ?>
                              <a href="../../confirm-account" class="btn btn-danger btn-sm" >
                                Application Error!
                              </a>
                          <?php }
                      ?>

                    <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-flag"> </i> Report this Job</a>
                  </div>
                </div>

            <?php }
          ?>
          
     
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <nav aria-label="Contacts Page Navigation">
          <ul class="pagination justify-content-center m-0">

              <?php if(isset($page))
              {
                $result = "SELECT COUNT(ID) as Total FROM job WHERE UID <> $pid ORDER BY ID DESC LIMIT $start, $perpage";
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
                  echo "<span style='padding:20px;'><a id='page_a_link' class='reg' href='dashboard?dil=job&page=$j'>&laquo; Prev</a></span>";
                }

                for ($i=1; $i <=$totalpages ; $i++) { 

                  if($i<>$page)
                  {
                    //echo "<span><a id='page_links' href='index.php?page=$i'>$i</a></span>";
                    if($mycounter<4)
                    {
                      //echo "<br>";
                      echo "<span><a id='page_links' class='reg' href='dashboard?dil=job&page=$i'>$i</a></span> - " ;
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
                    echo "<span style='padding:20px;'><a id='page_a_link' class='reg' href='dashboard?dil=job&page=$j' >Next &raquo;</a></span>";
                }
              } ?>

          </ul>
        </nav>
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->

</div>

<?php } ?>





                
<!--============================================================================ 
                               JOB DETAIL
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "job-detail") { ?>

<?php
       $job_id = $_GET["id"];
       //echo $uid;
       $job_pro = FetchIndividualContent("20", $job_id);

       $uid = $job_pro[0]["UID"];
       $uid_fname = $home -> AnyContent("Fname", "users", "ID", $uid);
       $uid_sname = $home -> AnyContent("Sname", "users", "ID", $uid);
       $uid_photo = $home -> AnyContent("Photo", "users", "ID", $uid);
       $uid_role = $home -> AnyContent("Role", "users", "ID", $uid);
       $job_type = $home -> AnyContent("Type", "job_type", "ID", $job_pro[0]["Type"]);

       $title= $job_pro[0]["Title"];
       $des = $job_pro[0]["Description"];
       $sample = $job_pro[0]["Sample"];
       $dur = $job_pro[0]["Duration"];
       $pay = $job_pro[0]["Pay"];
       $exp = $job_pro[0]["Experience"];

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Job Detail</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">job detail</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><i class="fa fa-briefcase"> </i><b> <?php echo $title; ?></b></h3> &nbsp;
          <?php
            //$job_id = $val["ID"];
            //$pid = $val["UID"];
            $fid = $_SESSION["duid"]; 
            
            if($uid != $fid) { ?>

            <div class="">
              <?php                   
                  $check = $crud->select("job_attach", "*", " JID = '".$job_id."' AND PID = '".$uid."' AND FID = '".$fid."' ");
                  
                    if($check == FALSE)
                    { ?>
                        <a href="../../appfunctions/appfunctions.php?apply-job=2&xid=<?php echo $job_id; ?>&yid=<?php echo $uid; ?>&zid=<?php echo $fid; ?>" class="btn btn-warning btn-sm">
                            Apply Now
                        </a>
                      <?php 
                    }

                    elseif($check == TRUE)
                    { ?>
                        <a href="../../appfunctions/appfunctions.php?apply-job=1&xid=<?php echo $job_id; ?>&yid=<?php echo $uid; ?>&zid=<?php echo $fid; ?>" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to cancel this application?')">
                        Applied, Cancel?
                        </a>
                    <?php  

                    }else{ ?>
                        <a href="../../confirm-account" class="btn btn-danger btn-sm" >
                            Application Error!
                        </a>
                    <?php }
                ?>

              <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-flag"> </i> Report this Job</a>
            </div>

            <?php } 
            else {
              echo "";//echo nothing
            } ?>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">

            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Estimated budget</span>
                      <span class="info-box-number text-center text-muted mb-0"><strike>(N)</strike> <?php echo $pay; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Estimated Duration</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $dur; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Experience Needed</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $exp; ?> Year(s)</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Posted By</h4>
                    <div class="post">
                      <div class="user-block">
                        <?php 
                          if(isset($uid_photo) && !empty($uid_photo)) { ?>

                              <img src="../../files/images/profilepics/<?php echo $uid_photo; ?>" class="img-circle img-bordered-sm"
                              alt="<?php echo $uid_fname; ?>">
                              <?php } else { ?>
                                  <img src="../../files/images/profilepics/default.png" class="img-circle img-bordered-sm" alt="Avatar">
                              <?php } 
                        ?>
                        <span class="username">
                          <a href="dashboard?dil=view-profile&pro=<?php echo $uid; ?>"><?php echo $uid_fname." ".$uid_sname; ?>.</a>
                        </span>
                        <span class="description"><?php echo $uid_role; ?></span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        <h3>Job Description</h3>
                        <?php echo $des; ?>
                      </p>

                      <p>
                        <h3>Sample</h3>
                        <?php
                            $imageURL = '../../files/job/';

                            if(!empty($sample)) { ?>

                              <div class="filtr-item col-sm-4" data-category="1" data-sort="white sample">
                                <a href="<?php echo $imageURL . $sample; ?>" data-toggle="lightbox" data-title="<?php echo $title; ?> Sample">
                                  <img src="<?php echo $imageURL . $sample; ?>" class="img-fluid mb-2" alt="white sample"/>
                                </a>
                              </div>
                            <?php }
                          else {
                            echo "No Sample Available";
                          } ?> 
                      </p>

                      <!-- <div class="text-center mt-5 mb-3">
                        <a href="dashboard?dil=apply&id=<?php //echo $job_id; ?>" class="btn btn-sm btn-success">Apply Now</a>
                        <a href="#" class="btn btn-sm btn-warning">Report this Job</a>
                      </div>
                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                      </p> -->
                    </div>

                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->


</div>

<?php } ?>





<!--============================================================================ 
                                ADVERTS
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "advert") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Advert</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Advert</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-sm-7">

      <div class="card card-stats">
          <div class="card-body ">
              <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-television-20 text-warning"></i>
                  Place Advert
              </div>
          </div>
      </div>

      <div class="card card-stats ">
          <div class="card-body ">
              <h3>Types</h3>
              <h4>Top banner <img style="height: 15px; width: 15px;" src="../../files/images/advert/icons/top-banner.png" >
              </h4>
              <h4>Portrait <img style="height: 15px; width: 15px;" src="../../files/images/advert/icons/portrait.png" >
              </h4>
              <h4>Footer banner &nbsp;<img style="height: 15px; width: 15px;" src="../../files/images/advert/icons/footer-banner.png" >
              </h4>
              <h4>Inline <img style="height: 15px; width: 15px;" src="../../files/images/advert/icons/inline.png" >
              </h4>
            
          </div>
      </div>

      <div style="color: #000">
        <?php echo isset($response) ? $response : ""; ?>
      </div>

      <form onsubmit="return adUploadF(this);" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
          <div class="card">
              <div class="card-body">

                  <h2>Input Details</h2>

                  <div class="form-group">
              
                      <div class="form-group has-label">
                          <label>
                              Type
                              <star class="star">*</star>
                          </label>
                          <select name="Type" class="form-control" >
                            <option selected="selected" value="0">Select Type</option>
                            <?php 
                              $sql="SELECT * FROM advert_type ORDER BY Type DESC"; 
                              $q = $connect->prepare($sql); 
                              $q->execute();
                              while($r = $q->fetch(PDO::FETCH_ASSOC))
                              {
                                $ss = ($r["ID"] == $type) ? "selected" : "";
                                echo  "<option value=".$r["ID"]." $ss>".$r["Type"]."</option>";
                              }
                            ?>
                          </select>
                        </div>

                        <div class="form-group has-label">
                          <label>
                              Expiry Date and Time
                              <star class="star">*</star>
                          </label>

                          <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                              </div>
                              <input required name="DateTime" type="text" class="form-control float-right" id="reservationtime">
                          </div>
                        </div>

                        <div class="form-group has-label">
                            <label>
                                Select Photo
                                <star class="star">*</star>
                            </label>

                            <div class="">                                            
                                <div class="col-sm-2 col-md-2" style="float: left;border: 1px solid #ccc; height: 100px;" align="center">
                                    <div id="image-preview" ></div>
                                </div>

                                <div class="col-sm-10 col-md-10" style="float: left">
                                    <small>Photo must not be greater than 5MB. </small><br/>
                                    <small>Photo format must be PNG, JPG or JPEG. </small>
                                    <input type="file" id="inputFile" name="Photo" class="form-control" required="true" >
                                </div> 
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    
                        <div class="form-group has-label">
                            <label>
                                Company Name
                                <star class="star">*</star>
                            </label>
                            <input minlength="1" maxlength="50" class="form-control" name="CompName" type="Text" placeholder="Enter company name" required="true" />
                        </div>
                    
                        <div class="form-group has-label">
                            <label>
                                Company Email
                                <star class="star">*</star>
                            </label>
                            <input minlength="1" maxlength="50" class="form-control" name="CompEmail" type="email" placeholder="Enter company email" required="true" />
                        </div>
                    
                        <div class="form-group has-label">
                            <label>
                                Company Phone
                                <star class="star">*</star>
                            </label>
                            <input minlength="1" maxlength="50" class="form-control" name="CompPhone" type="Text" placeholder="Enter company phone" required="true" />
                        </div>
                        
                        <div class="form-group has-label">
                            <label>
                                Company Website
                                <star class="star">*</star>
                            </label>
                            <input minlength="1" maxlength="50" class="form-control" name="CompWeb" type="Text" placeholder="Enter company name" required="true" />
                        </div>
                        
                        <div class="form-group has-label">
                            <label>
                                Company Address
                            </label>
                            <input minlength="1" maxlength="100" class="form-control" name="CompAddr" type="Text" placeholder="Enter company address" />
                        </div>
                    
                        <div class="form-group has-label">
                            <label>
                                Description
                            </label>
                            <textarea minlength="1" maxlength="200" class="form-control" name="Description" placeholder="Enter company description"></textarea>
                        </div>
                      
                        <!-- <input class="btn btn-warning btn-block" type="submit" value="PLACE ADVERT"> -->
                        <input style="color: rgb(1, 9, 53);" type="submit" class="btn btn-warning btn-block" name="adUpload" value="PLACE ADVERT">
                        <input style="color: rgb(1, 9, 53);" type="button" class="btn btn-default btn-block" value="CANCEL" onclick="adUploadR(this.form);">
                        <input type="hidden" name="UploadedBy" value="<?php echo $_SESSION["duid"]; ?>">
                        <input type="hidden" name="INSERT" value="19">
                    </div>
                
                </div>
            </div>
        </form>

              <p>Placed Adverts:</p>

              <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>S/N</th>
                              <th>Content</th>
                              <th>Company Name</th>
                              <th>Compnay Phone/Email</th>
                              <th>Expiry Date</th>
                              <th>Uploaded On</th>
                              <th>Uploaded By</th>
                              <th>Actions</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                              <th>S/N</th>
                              <th>Content</th>
                              <th>Company Name</th>
                              <th>Compnay Phone/Email</th>
                              <th>Expiry Date</th>
                              <th>Uploaded On</th>
                              <th>Uploaded By</th>
                              <th>Actions</th>
                          </tr>
                    </tfoot>
                    <tbody>

                      <?php 
                          $fet_msg = FetchTableContent(9);
                          $count = 1;                      

                          foreach ($fet_msg as $key => $val) { 

                            $imageURL = "../../files/images/advert/"; 
                            $key = $val["Photo"];
                          ?> 

                          <tr class="">
                              <td><?php echo $count; ?></td>
                              <td>
                                  <div class="">
                                    <a href="<?php echo $imageURL . $key; ?>" data-toggle="lightbox" data-title="<?php echo $key; ?>" data-gallery="gallery">
                                      <img src="<?php echo $imageURL . $key; ?>" class="img-fluid" alt="<?php echo $key; ?>"/>
                                    </a>
                                  </div>
                              </td>
                              <td class="center">			
                                      <?php echo $val["CompanyName"]; ?>
                              </td>
                              <td><?php echo $val["CompanyPhone"]." / ".$val["CompanyEmail"]; ?></td>
                              <td>
                                  <?php echo $val["ExpiryDate"]; ?>
                              </td>
                              <td>
                                  <?php echo date("j-M-Y", strtotime($val["AddedOn"]))." at ".date("G:i:s a", strtotime($val["AddedOn"])); ?>
                              </td>
                              <td>
                                  <?php
                                      echo $home->AnyContent("Fname", "users", "ID", $val["UploadedBy"]); ?>
                              </td>

                              <td class="td-actions text-right">
                                  <?php
                                      if($_SESSION["accesslevel"] == 1){
                                      
                                          //$check = $home->select("advert", "*", " ID = '".$val["ID"]."' ");
                                          $check = $home->AnyContent("Active", "advert", "ID", $val["ID"]);
                                          
                                          if($check == "2")
                                          { ?>
                                              <a href="../../appfunctions/appfunctions.php?activate=2&xid=<?php echo $val["ID"]; ?>" class="btn btn-warning btn-sm">
                                                  Activate
                                              </a>
                                          <?php 
                                          }
                                          elseif($check == "1")
                                          { ?>
                                              <a href="../../appfunctions/appfunctions.php?activate=1&xid=<?php echo $val["ID"]; ?>" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to deactivate this advert? Advert will go offline if you deactivate.')">
                                              Active
                                              </a>
                                          <?php  

                                          }else{ ?>
                                          
                                          <a href="../../confirm-account" class="btn btn-danger btn-sm" >
                                              Activate Error!
                                          </a>

                                          <?php }
                                      }
                                  ?>

                                  <a class="btn btn-success btn-sm" href="dashboard?dil=edit-advert&xps=<?php echo $val["ID"]; ?>"><i class=" fa fa-archive"></i></a> 
                          
                                  <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this advert?');" href="delete-advert?del=<?php echo $val["ID"]; ?>"><i class=" fa fa-trash"></i></a> 
                              </td>
                          </tr>
                          <?php $count++; } ?>
                      </tbody>
                  </table>
                  
              </div><!-- CARD DATA-TABLES -->

          </div><!-- COL-MD-7 -->

        <?php include("advert-portrait.php"); ?>
    </div>
</section>

</div>

<?php } ?>







<!--============================================================================ 
                               EDIT ADVERTS
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "edit-advert") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Advert</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Edit Advert</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-sm-7">
 
      <?php  echo isset($response) ? $response : ""; ?>
                           
        <form id="TypeValidation" onsubmit="return adUpdateF(this);" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

            <?php
                $getad = FetchIndividualContent("16", $_GET["xps"]);
                $name = $getad[0]["CompanyName"];
                $phone = $getad[0]["CompanyPhone"];
                $email = $getad[0]["CompanyEmail"];
                $addr = $getad[0]["CompanyAddress"];
                $web = $getad[0]["CompanyWebsite"];
                $exp_date = $getad[0]["ExpiryDate"];
                $des = $getad[0]["Description"];
                $type= $getad[0]["Type"];
                $photo = $getad[0]["Photo"];
                $id = $getad[0]["ID"];
            ?>

            <div class="card ">
                <div class="card-body ">
                    <div class="form-group has-label">
                        <label>
                            Type
                            <star class="star">*</star>
                        </label>
                        <select name="Type" class="form-control" >
                          <option selected="selected" value="0">Select Type</option>
                          <?php 
                            $sql="SELECT * FROM advert_type ORDER BY Type ASC"; 
                            $q = $connect->prepare($sql); 
                            $q->execute();
                            while($r = $q->fetch(PDO::FETCH_ASSOC))
                            {
                              $ss = ($r["ID"] == $type) ? "selected" : "";
                              echo  "<option value=".$r["ID"]." $ss>".$r["Type"]."</option>";
                            }
                          ?>
                        </select>
                    </div>

                    <div class="form-group has-label">
                        <label>
                            Expiry Date and Time
                            <star class="star">*</star>
                        </label>
                          
                          <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                              </div>
                              <input required  name="DateTime" type="text" class="form-control float-right" id="reservationtime">
                          </div>

                            <input type="hidden" name="DateHolder" value="<?php echo (isset($exp_date)) ? $exp_date: ""; ?>" >
                        
                          <small>current expiry date: <?php echo $exp_date; ?></small>
                    </div>

                    <div class="form-group has-label">
                        <label>
                            Photo
                        </label>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="form-group col-sm-2 blog-pic-cover">
                                    <?php if(isset($photo) && $photo != "") 
                                        { ?>
                                            <img class="blog-pic" src="../../files/images/advert/<?php echo $photo; ?>" alt="Photo"> 
                                        <?php } else { ?>
                                            No Photo
                                    <?php } ?>
                                </div>
                                
                                <div class="form-group col-sm-2 blog-pic-cover">
                                    <div id="image-preview" class="image-preview"></div>
                                </div>
                                
                                <div class="form-group col-sm-8">
                                    
                                    <input type="file" id="inputFile" name="Photo" class="form-control" >
                                    <input type="hidden" name="PhotoHolder" value="<?php echo (isset($photo)) ? $photo : ""; ?>" >
                                    
                                    <small>Photo must not be greater than 5MB. </small><br/>
                                    <small>Photo format must be PNG, JPG, JPEG. </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group has-label">
                        <label>
                            Company Name
                            <star class="star">*</star>
                        </label>
                        <input minlength="2" maxlength="100" class="form-control" name="CompName" type="text" required="true"  placeholder="Enter company name" value="<?php echo (isset($name)) ? $name : ""; ?>" />
                    </div>
                    
                    <div class="form-group has-label">
                        <label>
                            Company Email
                            <star class="star">*</star>
                        </label>
                        <input minlength="2" maxlength="100" class="form-control" name="CompEmail" type="text" required="true"  placeholder="Enter email" value="<?php echo (isset($email)) ? $email : ""; ?>" />
                    </div>
                    
                    <div class="form-group has-label">
                        <label>
                            Company Phone
                            <star class="star">*</star>
                        </label>
                        <input minlength="2" maxlength="25" class="form-control" name="CompPhone" type="text" required="true"  placeholder="Enter phone" value="<?php echo (isset($phone)) ? $phone : ""; ?>" />
                    </div>
                    
                    <div class="form-group has-label">
                        <label>
                            Company Website
                            <star class="star">*</star>
                        </label>
                        <input minlength="2" maxlength="100" class="form-control" name="CompWeb" type="text" required="true"  placeholder="Enter website" value="<?php echo (isset($web)) ? $web : ""; ?>" />
                    </div>
                    
                    <div class="form-group has-label">
                        <label>
                            Company Address
                        </label>
                        <input minlength="2" maxlength="100" class="form-control" name="CompAddr" type="text" required="true"  placeholder="Enter address" value="<?php echo (isset($addr)) ? $addr : ""; ?>" />
                    </div>
                    
                    <div class="form-group has-label">
                        <label>
                            Description
                        </label> 

                        <textarea style="color:#000;" required class="form-control" rows="3" maxlength="200"  name="Description" placeholder="Enter company description"><?php echo (isset($des)) ? $des : "" ?></textarea>
                        
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="col-sm-12 col-md-6 card-category form-category">
                    <star class="star">*</star> Required fields
                </div>

                <div class="card-footer " align="center">
                    <input style="color: rgb(1, 9, 53);" type="submit" class="btn btn-warning btn-block" name="adUpdate" value="UPDATE">
                    <input style="color: rgb(1, 9, 53);" type="button" class="btn btn-default btn-block" value="CANCEL" onclick="adUpdateR(this.form);">
                    <input type="hidden" name="EDIT" value="11">
                    <input type="hidden" name="EDITVAL" value="<?php echo $id; ?>">
                    <div class="clearfix"></div>
                </div>

            </div>


        </form>

    </div><!-- col-sm-7 -->
    
    <?php include "advert-portrait.php"; ?>

  </div><!-- row -->
</section>

<?php } ?>





<!--============================================================================ 
                                CREATE SLIDE
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "create-slide") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Slide</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Create slide</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-sm-7">

            <?php echo isset($response) ? $response : ""; ?>

            <div class="clearfix"></div>

            <form id="TypeValidation" onsubmit="return slideUploadF(this);" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

                <div class="card ">
                    
                    <div class="card-body ">
                        
                        <div class="form-group has-label">
                            <label>
                                Title
                                <star class="star">*</star>
                            </label>
                            <input minlength="2" maxlength="50" class="form-control" name="Title" type="text" required="true" placeholder="Enter a title" value="<?php if(isset($getblog[0]["Title"])) echo $getblog[0]["Title"]; ?>" />
                        </div>

                        <div class="form-group has-label">
                            <label>
                                Photo
                                <star class="star">*</star>
                            </label>
                              <div class="col-sm-12">
                                <div class="row">
                                    <div class="form-group col-sm-2" style="border: 1px solid #ccc; height: 100px; align: center; ">
                                        <div id="image-preview" class="image-preview"></div>
                                    </div>
                                    
                                    <div class="form-group col-sm-10" >
                                        
                                        <input type="file" id="inputFile" name="Photo" class="form-control" >
                                        
                                        <small>Photo must not be greater than 5MB. </small><br/>
                                        <small>Photo format must be PNG, JPG, JPEG. </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                
                    <div class="clearfix"></div>

                    <div class="col-sm-12 col-md-6 card-category form-category">
                        <star class="star">*</star> Required fields
                    </div>

                    <div class="card-footer" align="center">
                        <input style="color: rgb(1, 9, 53);" type="submit" class="btn btn-info btn-lg btn-fill pull-center" name="slideUpload" value="UPLOAD">
                        <input style="color: rgb(1, 9, 53);" type="button" class="btn btn-default btn-lg btn-fill pull-center" value="CANCEL" onclick="slideUploadR(this.form);">
                        <input type="hidden" name="INSERT" value="20">
                        <input type="hidden" name="UID" value="<?php echo $_SESSION["duid"] ?>">
                        <div class="clearfix"></div>
                    </div>

                </div>
            </form>

            <div class="card card-stats form-upload">
                <div class="card-body "> 
                    <h4>Photos in Slider (Only the last 5 is visible on the homepage)</h4>
                    <small>* Upload Landscape pictures (Width is usually bigger than height).</small><br/>
                    <small>* Make sure picture has a fine quality.</small><br/>
                    <small>* Only JPEG, JPG and PNG are allowed.</small><br/><br/>

                    <div class="gallery">
                        <?php
                            // Get images from the database
                            $sql="SELECT * FROM slide ORDER BY ID DESC LIMIT 10"; 
                            $query = $connect->prepare($sql); 
                            $query->execute();

                            // Generate gallery view of the images
                            if(!empty($query)){
                                
                                while($row = $query->fetch(PDO::FETCH_ASSOC)){
                                    $galid = $row["ID"];
                                    $imageURL = '../../files/images/slider/';

                                    $jk = $row["Photo"];
                                    $jk = explode(",", $jk);
                                    
                                    foreach ($jk as $key) { ?>

                                    <div style="float: left !important; padding: 5px; ">

                                        <a href="<?php echo $imageURL . $key; ?>" data-toggle="lightbox" data-title="<?php echo $key; ?>" data-gallery="gallery">
                                          <img src="<?php echo $imageURL . $key; ?>" class="img-fluid mb-2" alt="<?php echo $key; ?>"/>
                                        </a>
                                    
                                        <?php if(isset($_SESSION["accesslevel"]) && $_SESSION["accesslevel"] == "1") { ?>
                                            <a href="dashboard?dil=edit-slide&id=<?php echo $galid; ?>" >
                                                EDIT
                                            </a> &nbsp

                                            <a onclick="return confirm('Are you sure you want to delete this picture? You might not be able to recover it.'); " href="delete-slide-pic?galid=<?php echo $galid; ?>" >
                                                DELETE
                                            </a>
                                        <?php } else { echo ""; }//do nothing ?>

                                    </div>

                                    <?php } ?>
                                <?php }
                            } 
                            else{ ?>
                                    <p>No image found!</p>
                                <?php } 
                        ?> 
                    </div>
                </div>
            </div>

                
          </div><!-- col-md-7 -->
      </div><!-- row -->
    </section>
</div>


<?php } ?>







<!--============================================================================ 
                                  SLIDE
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "edit-slide") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Slide</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Edit slide</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-sm-7">

          <?php echo isset($response) ? $response : ""; ?>

          <div class="clearfix"></div>

          <form id="TypeValidation" onsubmit="return slideUpdateF(this);" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
          
              <?php 
                  $slide_id = $_GET["id"];
                  $sql = "SELECT * FROM slide WHERE ID = '$slide_id' ";
                  $q = $connect->prepare($sql); 
                  $q->execute(); 

                  $get_slide = $q->fetch(PDO::FETCH_ASSOC);

                  $photo = $get_slide["Photo"];
              ?>

              <div class="card ">
                <div class="card-body ">
                  
                  <div class="form-group has-label">
                      <label>
                          Title
                          <star class="star">*</star>
                      </label>
                      <input minlength="2" maxlength="50" class="form-control" name="Title" type="text" required="true" placeholder="Enter a title" value="<?php if(isset($get_slide["Title"])) echo $get_slide["Title"]; ?>" />
                  </div>

                  <div class="form-group has-label">
                      <label>
                          Photo
                      </label>
                        <div class="col-sm-12">
                          <div class="row">
                              <div class="form-group col-sm-2" style="border: 1px solid #ccc; height: 100px; align: center; ">
                                  <img style="height: 100px; width: 100px; align: center;" src="../../files/images/slider/<?php echo $get_slide["Photo"]; ?>"> 
                              </div>
                              <div class="form-group col-sm-2" style="border: 1px solid #ccc; height: 100px; align: center; ">
                                  <div id="image-preview" class="image-preview"></div>
                              </div>
                              
                              <div class="form-group col-sm-8" >
                                  
                                  <input type="file" id="inputFile" name="Photo" class="form-control" >
                                  <input type="hidden" name="PhotoHolder" value="<?php echo (isset($photo)) ? $photo : ""; ?>" >
                                  
                                  <small>Photo must not be greater than 5MB. </small><br/>
                                  <small>Photo format must be PNG, JPG, JPEG. </small>
                              </div>
                          </div>
                      </div>
                    </div>

                </div>
              
                  <div class="clearfix"></div>
                  <div class="col-sm-12 col-md-6 card-category form-category">
                      <star class="star">*</star> Required fields
                  </div>

                  <div class="card-footer" align="center">
                      <input style="color: rgb(1, 9, 53);" type="submit" class="btn btn-info btn-lg btn-fill pull-center" name="slideUpdate" value="UPDATE">
                      <input style="color: rgb(1, 9, 53);" type="button" class="btn btn-default btn-lg btn-fill pull-center" value="CANCEL" onclick="slideUpdateR(this.form);">
                      <input type="hidden" name="EDIT" value="12">
                      <input type="hidden" name="Fname" value="<?php echo $fname; ?>">
                      <input type="hidden" name="EDITVAL" value="<?php echo $get_slide["ID"]; ?>">
                      <input type="hidden" name="UID" value="<?php echo $_SESSION["duid"]; ?>">
                      <div class="clearfix"></div>
                  </div>

              </div>
          </form>

          <div class="card card-stats form-upload">
              <div class="card-body ">
                  <h4>Photos in Slider (Only the last 5 is visible on the homepage)</h4>
                  <small>* Upload Landscape pictures (Width is bigger than height).</small><br/>
                  <small>* Make sure picture has a fine quality.</small><br/>
                  <small>* Only JPEG, JPG and PNG are allowed.</small><br/><br/>

                  <div class="gallery">
                      <?php
                          // Get images from the database
                          $sql="SELECT * FROM slide ORDER BY ID DESC LIMIT 10"; 
                          $query = $connect->prepare($sql); 
                          $query->execute();

                          // Generate gallery view of the images
                          if(!empty($query)){
                              
                              while($row = $query->fetch(PDO::FETCH_ASSOC)){
                                  $galid = $row["ID"];
                                  $imageURL = '../../files/images/slider/';

                                  $jk = $row["Photo"];
                                  $jk = explode(",", $jk);
                                  
                                  foreach ($jk as $key) { ?>

                                      <div style="float: left !important; padding: 5px; ">

                                        <a href="<?php echo $imageURL . $key; ?>" data-toggle="lightbox" data-title="<?php echo $key; ?>" data-gallery="gallery">
                                          <img src="<?php echo $imageURL . $key; ?>" class="img-fluid mb-2" alt="<?php echo $key; ?>"/>
                                        </a>
                                      
                                          <?php if(isset($_SESSION["accesslevel"]) && $_SESSION["accesslevel"] == "1") { ?>
                                              <a href="dashboard?dil=edit-slide&id=<?php echo $galid; ?>" >
                                                  EDIT
                                              </a> &nbsp

                                              <a onclick="return confirm('Are you sure you want to delete this picture? You might not be able to recover it.'); " href="delete-slide-pic?galid=<?php echo $galid; ?>" >
                                                  DELETE
                                              </a>
                                          <?php } else { echo ""; }//do nothing ?>

                                      </div>

                                  <?php } ?>

                              <?php }

                          } else{ ?>
                              <p>No image found!</p>
                          <?php } 
                      ?> 
                  </div>
              </div>
            </div>

          </div><!-- col-md-7 -->
      </div><!-- row -->
    </section>
</div>



<?php } ?>






<!--============================================================================ 
                                WORKER SLIDE
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "worker-slide") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Worker Slide</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Create slide</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-sm-7">

            <?php echo isset($response) ? $response : ""; ?>

            <div class="clearfix"></div>

            <form id="TypeValidation" onsubmit="return workerSlideUploadF(this);" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

                <div class="card ">
                    
                    <div class="card-body ">
                        
                        <div class="form-group has-label">
                            <label>
                                Worker Slide Title
                                <star class="star">*</star>
                            </label>
                            <input minlength="2" maxlength="50" class="form-control" name="Title" type="text" required="true" placeholder="Enter a title" value="<?php if(isset($getblog[0]["Title"])) echo $getblog[0]["Title"]; ?>" />
                        </div>

                        <div class="form-group has-label">
                            <label>
                                Photo
                                <star class="star">*</star>
                            </label>
                              <div class="col-sm-12">
                                <div class="row">
                                    <div class="form-group col-sm-2" style="border: 1px solid #ccc; height: 100px; align: center; ">
                                        <div id="image-preview" class="image-preview"></div>
                                    </div>
                                    
                                    <div class="form-group col-sm-10" >
                                        
                                        <input type="file" id="inputFile" name="Photo" class="form-control" >
                                        
                                        <small>Photo must not be greater than 5MB. </small><br/>
                                        <small>Photo format must be PNG, JPG, JPEG. </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                
                    <div class="clearfix"></div>

                    <div class="col-sm-12 col-md-6 card-category form-category">
                        <star class="star">*</star> Required fields
                    </div>

                    <div class="card-footer" align="center">
                        <input style="color: rgb(1, 9, 53);" type="submit" class="btn btn-info btn-lg btn-fill pull-center" name="workerSlideUpload" value="UPLOAD">
                        <input style="color: rgb(1, 9, 53);" type="button" class="btn btn-default btn-lg btn-fill pull-center" value="CANCEL" onclick="workerSlideUploadR(this.form);">
                        <input type="hidden" name="INSERT" value="22">
                        <input type="hidden" name="UID" value="<?php echo $_SESSION["duid"] ?>">
                        <div class="clearfix"></div>
                    </div>

                </div>
            </form>

            <div class="card card-stats form-upload">
                <div class="card-body "> 
                    <h4>Photos in Slider (Only the last 20 will be visible on the homepage)</h4>
                    <small>* Upload Landscape pictures (Width is usually bigger than height).</small><br/>
                    <small>* Make sure picture has a fine quality.</small><br/>
                    <small>* Only JPEG, JPG and PNG are allowed.</small><br/><br/>

                    <div class="gallery">
                        <?php
                            // Get images from the database
                            $sql="SELECT * FROM worker_slide ORDER BY ID DESC LIMIT 10"; 
                            $query = $connect->prepare($sql); 
                            $query->execute();

                            // Generate gallery view of the images
                            if(!empty($query)){
                                
                                while($row = $query->fetch(PDO::FETCH_ASSOC)){
                                    $galid = $row["ID"];
                                    $imageURL = '../../files/images/slider/';

                                    $jk = $row["Photo"];
                                    $jk = explode(",", $jk);
                                    
                                    foreach ($jk as $key) { ?>

                                    <div style="float: left !important; padding: 5px; ">

                                        <a href="<?php echo $imageURL . $key; ?>" data-toggle="lightbox" data-title="<?php echo $key; ?>" data-gallery="gallery">
                                          <img src="<?php echo $imageURL . $key; ?>" class="img-fluid mb-2" alt="<?php echo $key; ?>"/>
                                        </a>
                                    
                                        <?php if(isset($_SESSION["accesslevel"]) && $_SESSION["accesslevel"] == "1") { ?>
                                            <a href="dashboard?dil=edit-worker-slide&id=<?php echo $galid; ?>" >
                                                EDIT
                                            </a> &nbsp

                                            <a onclick="return confirm('Are you sure you want to delete this picture? You might not be able to recover it.'); " href="delete-worker-slide-pic?galid=<?php echo $galid; ?>" >
                                                DELETE
                                            </a>
                                        <?php } else { echo ""; }//do nothing ?>

                                    </div>

                                    <?php } ?>
                                <?php }
                            } 
                            else{ ?>
                                    <p>No image found!</p>
                                <?php } 
                        ?> 
                    </div>
                </div>
            </div>

                
          </div><!-- col-md-7 -->
      </div><!-- row -->
    </section>
</div>


<?php } ?>







<!--============================================================================ 
                                 EDIT WORKER SLIDE
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "edit-worker-slide") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Worker Slide</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Edit slide</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-sm-7">

          <?php echo isset($response) ? $response : ""; ?>

          <div class="clearfix"></div>

          <form id="TypeValidation" onsubmit="return slideUpdateF(this);" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
          
              <?php 
                  $slide_id = $_GET["id"];
                  $sql = "SELECT * FROM worker_slide WHERE ID = '$slide_id' ";
                  $q = $connect->prepare($sql); 
                  $q->execute(); 

                  $get_slide = $q->fetch(PDO::FETCH_ASSOC);

                  $photo = $get_slide["Photo"];
              ?>

              <div class="card ">
                <div class="card-body ">
                  
                  <div class="form-group has-label">
                      <label>
                          Title
                          <star class="star">*</star>
                      </label>
                      <input minlength="2" maxlength="50" class="form-control" name="Title" type="text" required="true" placeholder="Enter a title" value="<?php if(isset($get_slide["Title"])) echo $get_slide["Title"]; ?>" />
                  </div>

                  <div class="form-group has-label">
                      <label>
                          Photo
                      </label>
                        <div class="col-sm-12">
                          <div class="row">
                              <div class="form-group col-sm-2" style="border: 1px solid #ccc; height: 100px; align: center; ">
                                  <img style="height: 100px; width: 100px; align: center;" src="../../files/images/slider/<?php echo $get_slide["Photo"]; ?>"> 
                              </div>
                              <div class="form-group col-sm-2" style="border: 1px solid #ccc; height: 100px; align: center; ">
                                  <div id="image-preview" class="image-preview"></div>
                              </div>
                              
                              <div class="form-group col-sm-8" >
                                  
                                  <input type="file" id="inputFile" name="Photo" class="form-control" >
                                  <input type="hidden" name="PhotoHolder" value="<?php echo (isset($photo)) ? $photo : ""; ?>" >
                                  
                                  <small>Photo must not be greater than 5MB. </small><br/>
                                  <small>Photo format must be PNG, JPG, JPEG. </small>
                              </div>
                          </div>
                      </div>
                    </div>

                </div>
              
                  <div class="clearfix"></div>
                  <div class="col-sm-12 col-md-6 card-category form-category">
                      <star class="star">*</star> Required fields
                  </div>

                  <div class="card-footer" align="center">
                      <input style="color: rgb(1, 9, 53);" type="submit" class="btn btn-info btn-lg btn-fill pull-center" name="workerSlideUpdate" value="UPDATE">
                      <input style="color: rgb(1, 9, 53);" type="button" class="btn btn-default btn-lg btn-fill pull-center" value="CANCEL" onclick="workerSlideUpdateR(this.form);">
                      <input type="hidden" name="EDIT" value="13">
                      <input type="hidden" name="Fname" value="<?php echo $fname; ?>">
                      <input type="hidden" name="EDITVAL" value="<?php echo $get_slide["ID"]; ?>">
                      <input type="hidden" name="UID" value="<?php echo $_SESSION["duid"]; ?>">
                      <div class="clearfix"></div>
                  </div>

              </div>
          </form>

          <div class="card card-stats form-upload">
              <div class="card-body ">
                  <h4>Photos in Slider (Only the last 20 is visible on the homepage)</h4>
                  <small>* Upload Landscape pictures (Width is bigger than height).</small><br/>
                  <small>* Make sure picture has a fine quality.</small><br/>
                  <small>* Only JPEG, JPG and PNG are allowed.</small><br/><br/>

                  <div class="gallery">
                      <?php
                          // Get images from the database
                          $sql="SELECT * FROM worker_slide ORDER BY ID DESC LIMIT 10"; 
                          $query = $connect->prepare($sql); 
                          $query->execute();

                          // Generate gallery view of the images
                          if(!empty($query)){
                              
                              while($row = $query->fetch(PDO::FETCH_ASSOC)){
                                  $galid = $row["ID"];
                                  $imageURL = '../../files/images/slider/';

                                  $jk = $row["Photo"];
                                  $jk = explode(",", $jk);
                                  
                                  foreach ($jk as $key) { ?>

                                      <div style="float: left !important; padding: 5px; ">

                                        <a href="<?php echo $imageURL . $key; ?>" data-toggle="lightbox" data-title="<?php echo $key; ?>" data-gallery="gallery">
                                          <img src="<?php echo $imageURL . $key; ?>" class="img-fluid mb-2" alt="<?php echo $key; ?>"/>
                                        </a>
                                      
                                          <?php if(isset($_SESSION["accesslevel"]) && $_SESSION["accesslevel"] == "1") { ?>
                                              <a href="dashboard?dil=edit-worker-slide&id=<?php echo $galid; ?>" >
                                                  EDIT
                                              </a> &nbsp

                                              <a onclick="return confirm('Are you sure you want to delete this picture? You might not be able to recover it.'); " href="delete-worker-slide-pic?galid=<?php echo $galid; ?>" >
                                                  DELETE
                                              </a>
                                          <?php } else { echo ""; }//do nothing ?>

                                      </div>

                                  <?php } ?>

                              <?php }

                          } else{ ?>
                              <p>No image found!</p>
                          <?php } 
                      ?> 
                  </div>
              </div>
            </div>

          </div><!-- col-md-7 -->
      </div><!-- row -->
    </section>
</div>



<?php } ?>





<!--============================================================================ 
                           GUESTS AREA
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "guest") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Contact-Us Messages from Guest</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Guest Messages</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-sm-12">

      <?php echo isset($_GET["response"]) ? $_GET["response"] : ""; ?>
          <div class="card data-tables">
              <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                  <div class="toolbar"></div>
                  <div class="fresh-datatables">
                      <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                          <thead>
                              <tr>
                                  <th>S/N</th>
                                  <th>Name</th>
                                  <th>Email/IP</th>
                                  <th>Phone</th>
                                  <th>Message</th>
                                  <th>Sent On</th>
                                  <th class="disabled-sorting">Actions</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                              <th>S/N</th>
                                  <th>Name</th>
                                  <th>Email/IP</th>
                                  <th>Phone</th>
                                  <th>Message</th>
                                  <th>Sent On</th>
                                  <th>Actions</th>
                              </tr>
                      </tfoot>
                      <tbody>
    
                          <?php 
                            $fet_msg = FetchTableContent(4);
                            $count = 1;

                            foreach ($fet_msg as $key => $val) { ?>

                              <tr class="">
                                  <td><?php echo $count; ?></td>
                                  <td class="center">												
                                      <a href="dashboard?dil=read-guest-msg&gst=<?php echo $val["ID"]; ?>">
                                          <?php echo $val["Fname"]." ".$val["Lname"]; ?></td>
                                      </a>
                                  <td><?php echo $val["Email"]." / ".$val["IPAddr"]; ?></td>
                                  <td class="center"><?php echo $val["Phone"]; ?></td>
                                  <td class="center">
                                      <a href="dashboard?dil=read-guest-msg&gst=<?php echo $val["ID"]; ?>">
                                          <?php $string = $val["Message"]; 
                                      
                                              $checkstr = strlen($string) > 30;

                                              if ($checkstr == TRUE) {

                                                  // truncate string
                                                  $stringCut = substr($string, 0, 30);

                                                  // make sure it ends in a word so assassinate doesn't become ass...
                                                  $fd= substr($stringCut, 0, strrpos($stringCut, ' '));
                                                  $string = $fd;
                                              } 
                                              echo $string;											
                                      
                                          ?>
                                      </a>
                                  </td>
                                  <td>
                                      <?php echo date("j-M-Y", strtotime($val["AddedOn"]))." at ".date("G:i:s a", strtotime($val["AddedOn"])); ?>
                                  </td>
                                  
                                  <td class="center">
                                      <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this message?');" href="delete-guest-msg?del=<?php echo $val["ID"]; ?>"><i class=" fa fa-trash"></i></a> 
                                  </td>
                              </tr>
                              <?php $count++; } ?>
                          </tbody>
                      </table>
                      
                  </div><!-- FRESH DATA-TABLES -->
              </div><!-- CARD BODY -->
          </div><!-- CARD DATA-TABLES -->


        </div><!-- col-md-12 -->
      </div><!-- row -->
    </section>
</div>

<?php } ?>






<!--============================================================================ 
                                READ GUEST MESSAGES
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "read-guest-msg") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Read Guest Messages</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Guest Messages</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-sm-7">

        <?php
            $getgst = FetchIndividualContent("8", $_GET["gst"]);

            $name = $getgst[0]["Fname"]." ".$getgst[0]["Lname"];
            $phone = $getgst[0]["Phone"];
            $email_ip = $getgst[0]["Email"]." ".$getgst[0]["IPAddr"];
            $msg = $getgst[0]["Message"];
            $gstid = $getgst[0]["ID"];
        ?>
                        

        <div class="blog-cover">
            <div align="center" >									
                <a href="delete-guest-msg?del=<?php echo $gstid; ?>" class='reg'  
                onclick="return confirm('Are you sure you want to delete this message?');">Delete</a>
            </div>
            <hr/>
            <p class="additional-post-wrap">
            <small> <span class="additional-post"><i class="fa fa-user"></i>Senders Name: 
                    <?php 
                        echo $name;
                    ?>
                </span>
                <span class="additional-post"><i class="fa fa-clock-o"></i>
                    <?php echo date("jS M Y", strtotime($getgst[0]["AddedOn"]))." at ".date("g:ia", strtotime($getgst[0]["AddedOn"])); ?>
                </span>
                <span class="additional-post"><i class="fa fa-phone"></i>
                    <?php echo $phone; ?>
                </span>
                <span class="additional-post"><i class="fa fa-envelope"></i>
                    <?php echo $email_ip; ?>
                </span>
                </small>
            </p>

            <div class="" style="padding: 5px">
                <p style="font-size: 17px"><?php echo $msg; ?></p>
            </div>
        </div>

        </div><!-- col-md-12 -->
      </div><!-- row -->
    </section>
</div>

<?php } ?>




<!--============================================================================ 
                                Search Result
=================================================================================-->
<?php if(isset($_GET["dila"]) && $_GET["dila"] == "sresult") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Search result</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Search result</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  
<section class="content">
<div class="row">
  <div class="col-sm-7">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <h3 class="card-title">Result on
            <strong> <?php 
                        $s_term = $_GET["s"];
                        echo $s_term;
                    ?>
            </strong> </h3>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content"><!-- Begins Search result content -->

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

            $count = 1;

            if($q1->rowCount() > 0 || $q2->rowCount() > 0 || $q3->rowCount() > 0){

              //Loop for workers slide
              if($q1->rowCount() > 0){ 
                while($rows = $q1->fetch(PDO::FETCH_ASSOC)){?>

                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      
                      <a href="dashboard?dil=professionals&wid=<?php echo $rows["ID"]; ?>" class="reg">
                          <img style="height: 100%; width:100%" src="../../files/images/slider/<?php echo $rows["Photo"]; ?>" class="img-responsive"> 
                      </a> 

                      <p style="text-align: center"><?php echo $rows["Title"]; ?></p>

                    </div>
                  </div>
                </div><!-- ./col -->

                <?php } 
              }


              //Loop for gallery
              if($q2->rowCount() > 0){
                while($row = $q2->fetch(PDO::FETCH_ASSOC)){
                  $imageURL = '../../files/gallery/img/';

                  $galid = $row["ID"];
                  $jk = $row["Photo"];
                  $jk = explode(",", $jk);
                  
                  foreach ($jk as $key) { ?>

                      <a href="<?php echo $imageURL . $key; ?>" data-toggle="lightbox" data-title="<?php echo $key; ?>" data-gallery="gallery">
                          <img src="<?php echo $imageURL . $key; ?>" class="img-fluid mb-2" alt="<?php echo $key; ?>"/>
                      </a>
                           
                  <?php } ?>
              <?php }
              }

              //Loop for Blog
              if($q3->rowCount() > 0){
                echo "
                    <div class='col-md-9'>
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
            }  
            else{ //IF NO RESULT IS FOUND FOR SEARCH TERM ?>
                <div class="col-md-9">
                    <h3 style="text-align: center">Your search term returned no result. Please try another</h3>
                </div>
            <?php } 
            ?> 

          
        <!-- Ends Search result content -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  
  <?php include("advert-portrait.php"); ?>
  </div>
  </section>
  </div>


<?php } ?>






<!--============================================================================ 
                                TRANSACTIONS
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "transaction") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Transaction</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Transactions</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo FetchTableContent(19); ?></h3>
              <p>All Transactions</p>
              </div>
              <div class="icon">
                <i class="fa fa-recycle"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo FetchTableContent(20); ?></h3>
                <p>Completed Trxn</p>
              </div>
              <div class="icon">
                <i class="fa fa-check-circle"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo FetchTableContent(21); ?></h3>
                <p>Pending Trxn</p>
              </div>
              <div class="icon">
                <i class="fa fa-info"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo FetchTableContent(22); ?></h3>
                <p>Failed Trxn</p>
              </div>
              <div class="icon">
                <i class="fa fa-times-circle"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h4><?php 
                      $amt_all = FetchTableContent(24); 
                      echo isset($amt_all) ? "&#8358;".number_format($amt_all, 2, '.', ',') : ""; ?>
              </h4>
              <p>Total Amount</p>
              </div>
              <div class="icon">
                <i class="fa fa-credit-card"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4><?php 
                        $amt_allc = FetchTableContent(25); 
                        echo isset($amt_allc) ? "&#8358;".number_format($amt_allc, 2, '.', ',') : "&#8358;0"; ?>
                </h4>
                <p>Total Completed</p>
                </div>
                <div class="icon">
                  <i class="fa fa-credit-card"></i>
                </div>
              </div>
            </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h4><?php 
                        $amt_allp = FetchTableContent(26); 
                        echo isset($amt_allp) ? "&#8358;".number_format($amt_allp, 2, '.', ',') : "&#8358;0"; ?>
                </h4>
                <p>Total Pending</p>
                </div>
                <div class="icon">
                  <i class="fa fa-credit-card"></i>
                </div>
              </div>
            </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h4><?php 
                        $amt_allf = FetchTableContent(27); 
                        echo isset($amt_allf) ? "&#8358;".number_format($amt_allf, 2, '.', ',') : "&#8358;0"; ?>
                </h4>
                <p>Total Failed</p>
                </div>
                <div class="icon">
                  <i class="fa fa-credit-card"></i>
                </div>
              </div>
            </div>
          <!-- ./col -->

        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Details of all transactions</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Full Name</th>
                        <th>Item/Batch No</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Trans. ID</th>
                        <th>Order No</th>
                        <th>Trans. Status</th>
                        <th>Reference ID</th>
                        <th>Ordered On</th>
                        <!-- <th class="disabled-sorting">Actions</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $fet_pay = FetchTableContent(23);
                        $count = 1;

                        foreach ($fet_pay as $key => $val) { 
                          $batch = $val["Batch"]; 
                          $product = $home->AnyContent("Product", "product", "Batch", $batch);
                          $imageURL = "../../files/products/images/"; 
                          //Product Title
                          $prod = $home->AnyContent("ProductTitle", "product", "Batch", $batch);
                          $prod_tit = $home->AnyContent("Product", "product_title", "ID", $prod);
                          //Payment Status
                          $p_stat = $val["PaymentStatus"];
                          $p_stats = $home->AnyContent("PaymentStatus", "paymentstatus", "ID", $p_stat);

                        ?>
                        <tr class="">
                            <td><?php echo $count; ?></td>
                            <td><?php echo $val["PayeeName"]; ?></td>
                            <td class="center">
                                <a href="<?php echo $imageURL . $product; ?>" data-toggle="lightbox" data-title="<?php echo $product; ?>" data-gallery="gallery">
                                  <img src="<?php echo $imageURL . $product; ?>" class="img-fluid" alt="<?php echo $product; ?>"/>
                                </a>
                                
                                <a href="dashboard?dil=view-product&bat=<?php echo $batch; ?>&tit=<?php echo $prod; ?>">
                                    <?php echo $prod_tit."<br/>".$batch; ?>
                                </a>
                            </td>
                            <td><?php echo $val["Price"]; ?></td>
                            <td><?php echo $val["Qty"]; ?></td>
                            <td><?php echo $val["Total"]; ?></td>
                            <td><?php echo $val["TransactionID"]; ?></td>
                            <td><?php echo $val["OrderNo"]; ?></td>
                            <td><?php  if($p_stat == 1) : echo "<button class='btn btn-sm btn-danger'>FAILED</button>";
                                      elseif($p_stat == 2) : echo "<button class='btn btn-sm btn-warning'>PENDING</button>";
                                      elseif($p_stat == 3) : echo "<button class='btn btn-sm btn-primary'>CONFIRMED</button>";
                                      elseif($p_stat == 4) : echo "<button class='btn btn-sm btn-success'>COMPLETED</button>";
                                      elseif($p_stat == 5) : echo "<button class='btn btn-sm btn-info'>PARTIALLY</button>";
                                      else : echo "ERROR!";
                                      endif;
                            ?></td>
                            <td><?php $refid = $val["RefID"]; 
                                      if(!empty($refid)) : echo $refid;
                                      else : echo "None";
                                      endif;
                            ?></td>
                            <td>
                                <?php echo date("j-M-Y", strtotime($val["AddedOn"])).", ".date("G:i:s a", strtotime($val["AddedOn"])); ?>
                            </td>
                        </tr>

                    <?php $count++; } ?>

                    </tbody>
                </table>
                        
              </div><!-- CARD BODY -->
          </div><!-- CARD -->
        </div><!-- COL-12 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

<?php } ?>






<!--============================================================================ 
                                PLACED ORDER
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "placed-order") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Placed Order</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Placed Order</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List of Placed Orders</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Full Name</th>
                        <th>Item/Batch No</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Trans. ID</th>
                        <th>Order No</th>
                        <th>Reference ID</th>
                        <th>Ordered On</th>
                        <th>Delivery Status</th>
                        <th class="disabled-sorting">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                          echo isset($response) ? $response : "";

                          $fet_ord = FetchTableContent(28);
                          $count = 1;

                        foreach ($fet_ord as $key => $val) { 
                          $batch = $val["Batch"]; 
                          $ord_no = $val["OrderNo"]; 
                          $product = $home->AnyContent("Product", "product", "Batch", $batch);
                          $imageURL = "../../files/products/images/"; 
                          //Product Title
                          $prod = $home->AnyContent("ProductTitle", "product", "Batch", $batch);
                          $prod_tit = $home->AnyContent("Product", "product_title", "ID", $prod);
                          //Delivery Status
                          $deliv = $val["Tracking"];
                          $deliv_stat = $home->AnyContent("Tracking", "placed_order", "ID", $deliv);

                        ?>
                        <tr class="">
                            <td><?php echo $count; ?></td>
                            <td><?php echo $val["PayeeName"]; ?></td>
                            <td class="center">
                                <a href="<?php echo $imageURL . $product; ?>" data-toggle="lightbox" data-title="<?php echo $product; ?>" data-gallery="gallery">
                                  <img height="100px" src="<?php echo $imageURL . $product; ?>" alt="<?php echo $product; ?>"/>
                                </a>
                                
                                <a href="dashboard?dil=view-product&bat=<?php echo $batch; ?>&tit=<?php echo $prod; ?>">
                                    <?php echo $prod_tit."<br/>".$batch; ?>
                                </a>
                            </td>
                            <td><?php echo $val["SubTotal"]; ?></td>
                            <td><?php echo $val["Qty"]; ?></td>
                            <td><?php echo $val["Total"]; ?></td>
                            <td><?php echo $val["TransactionID"]; ?></td>
                            <td><?php echo $val["OrderNo"]; ?></td>
                            <td><?php echo $val["RefID"]; ?></td>
                            <td>
                                <?php echo date("j-M-Y", strtotime($val["AddedOn"]))." at ".date("G:i:sa", strtotime($val["AddedOn"])); ?>
                            </td>
                            <td><?php  if($deliv == 1) : 
                                        echo "<button class='btn btn-sm btn-warning'>Order Placed</button>";
                                      elseif($deliv == 2) : 
                                        echo "<button class='btn btn-sm btn-primary'>In Progress</button>";
                                      elseif($deliv == 3) : echo "<button class='btn btn-sm btn-info'>Shipped</button>";
                                      elseif($deliv == 4) : echo "<button class='btn btn-sm btn-info'>Out For Delivery</button>";
                                      elseif($deliv == 5) : echo "<button class='btn btn-sm btn-success'>Delivered</button>";
                                      else : echo "ERROR!";
                                      endif;
                                      echo "</br>";
                                      echo isset($val["History"]) && !empty($val["History"]) ? date("j-M-Y", strtotime($val["History"])) : "";
                            ?></td>
                            <td class="center">
                                <!-- <a class="btn btn-danger btn-sm" href="#dashboard?dil=order-detail&payid=<?php //echo $val["ID"];?>">
                                <i class="fa fa-arrow-right"></i></a>  -->
                                <form action="" method="POST">
                                  <div style="display:inline-block">
                                    <select name="Tracking" class="form-control" >
                                      <?php 
                                        $sql="SELECT * FROM tracking ORDER BY ID ASC"; 
                                        $q = $connect->prepare($sql); 
                                        $q->execute();
                                        while($r = $q->fetch(PDO::FETCH_ASSOC))
                                        { $id = $r["ID"];
                                          $ss = ($id == $deliv) ? "selected" : "";
                                          echo "<option value=".$id."|".$batch."|".$ord_no." $ss>".$r["Status"]."</option>";
                                        }
                                      ?>
                                    </select>
                                  </div>

                                  <div style="display:inline-block">
                                    <input type="submit" name="TRACKING" value="UPDATE">
                                  </div>
                                </form>
                            </td> 
                        </tr>

                    <?php $count++; } ?>

                    </tbody>
                </table>
                        
              </div><!-- CARD BODY -->
          </div><!-- CARD -->
        </div><!-- COL-12 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

<?php } ?>





<!--============================================================================ 
                                MY PRODUCT
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "my-product") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Products & Services Upload</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">My product</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<section class="content">
<div class="row">
  <div class="col-md-7">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <h3 class="card-title">My Products</h3>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
 
          <form id="TypeValidation" class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="card">
                  <div class="card-body">

                      <h5>Create Product Title</h5>
                      <?php echo isset($response) ? $response : ""; ?>
                      <div class="form-group">
                          <input minlength="2" maxlength="100" class="form-control" type="text" name="Product">
                          <p class="help-block1">Min: 2 and Max: 100 Characters </p>
                          
                          <input class="btn btn-warning btn-block" type="submit" value="Create">
                          <input type="hidden" name="INSERT" value="23">
                      </div>
                            
                      <div class="clearfix"></div>

                      <p>Created Titles:</p>
                      <?php 
                          $sql = "SELECT * FROM product_title WHERE UID = '".$duid."' ORDER BY ID DESC";
                          $q = $connect->prepare($sql);
                          $q->execute();

                          if($q->rowCount() > 0){

                            while($row = $q->fetch(PDO::FETCH_ASSOC)){ ?>
                                <div style="border: 1px solid #ccc; padding: 5px;" class=""><?php echo $row["Product"]; ?>
                                    
                                    <a onclick="return confirm('Are you sure you want to delete this product title? If you click OK, you might loose access to any product placed inside of it if any');" class="btn btn-xs btn-danger" href="delete-product-title?del=<?php echo $row["ID"]; ?>" >Delete</a>
                            
                                </div>
                            <?php }
                          }
                          else{ ?>
                              <div align="center"><b>No title has been created by you. Please create one above</b></div>
                          <?php }
                      ?>
                  
                  </div>
              </div>
          </form>

          <form id="TypeValidation" onsubmit="return proUploadF(this);" class="form-horizontal form-upload" method="post" enctype="multipart/form-data">
          <h5>Fill in Product and Service details</h5>
              <?php echo isset($statusMsg) ? $statusMsg : ""; ?>
              <div class="card">
                  <div class="card-body">

                      <div class="form-group has-label">
                          <select required="true" name="ProductTitle" class="form-control" >
                              <option selected="selected" value="0">Select Title</option>
                              <?php 
                                  $sql="SELECT * FROM product_title WHERE UID = '".$duid."' ORDER BY ID ASC"; 
                                  $q = $connect->prepare($sql); 
                                  $q->execute();
                                  if($q){
                                      while($r = $q->fetch(PDO::FETCH_ASSOC)) {
                                      echo  "<option value=".$r["ID"].">".$r["Product"]."</option>";
                                      }
                                  }else{
                                      echo "<p>You have to create a product title first!</p>";
                                  }
                              ?>
                          </select>
                      </div>

                      <div class="form-group has-label">
                          <label>Description *</label>
                          <textarea minlength="10" maxlength="300" class="form-control" rows="2" name="Description" placeholder="Enter description"></textarea>
                          <p class="help-block1">Min: 10 and Max: 300 Characters </p>
                      </div>

                      <div class="row">
                        <div class="col-sm-12"><label>Price *</label></div>
                        <div class="input-group col-sm-8">
                            <div class="input-group-prepend">
                                <span class="input-group-text">NGN</span>
                            </div>
                            <input name="Price" placeholder="Enter price of item" step=".01" type="number" class="form-control">
                            <!-- <div class="input-group-append"><span class="input-group-text">.00</span></div> -->
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <label>RRP - Recommended Retail Price (e.g. <del>1234</del>)</label>
                          <small>optional</small>
                        </div>
                        <div class="input-group col-sm-8">
                            <div class="input-group-prepend">
                                <span class="input-group-text">NGN</span>
                            </div>
                            <input name="RRP" placeholder="Enter RRP or other market selling price" step=".01" type="number" class="form-control">
                            <!-- <div class="input-group-append"><span class="input-group-text">.00</span></div> -->
                        </div>
                      </div>
          
                      <div id="maindiv">
                      <div class="col-sm-12"><label>Select Image(s) *</label></div>
                          <div id="formdiv">
                              <div align="center" id="filediv">
                                  <input class="uploadinput" type="file" name="files[]" multiple required="true">
                                  <input type="submit" class="upload" name="proUpload" value="UPLOAD">
                                  <input type="hidden" name="UID" value="<?php echo $duid; ?>">
                                  <input type="hidden" name="INSERT" value="12">
                              </div>
                          </div>
                      </div>
                      
                      <div class="clearfix"></div>

                      <small>Note: spaces with ecsterisks must be filled</small>
                  
                  </div>
              </div>
          </form>

          <div class="card card-stats form-upload">
              <div class="card-body">
                <h5>Open by Product Title</h5>
                  <p>
                      <div style="display: inline">
                          <?php
                              //$sql = "SELECT p.ProductTitle as galid, k.Product as pro_name FROM product p LEFT JOIN product_title k on p.ProductTitle = k.ID AND p.CreatedBy = '".$duid."' GROUP BY k.ID"; 

                              $sql = "SELECT p.ProductTitle as galid, k.Product as pro_name FROM product p INNER JOIN product_title k on p.ProductTitle = k.ID AND k.UID = '".$duid."' GROUP BY p.ProductTitle"; 
                              $q_alb = $connect->prepare($sql); 
                              $q_alb->execute();

                              if($q_alb) {
                                foreach($q_alb as $key => $val){
                                    echo " <a href='dashboard?dil=product-title&aid=".$val["galid"]."' >
                                                <i style='display: inline' class='fa fa-shopping-cart'></i>" ." ". $val["pro_name"] . "
                                            </a>
                                            <br/>
                                        ";
                                }
                              }else{ ?>
                                <div>
                                  <b>No product has been uploaded by you. Upload one using the UPLOAD button above</b>
                                </div>
                              <?php }
                          ?> 
                      </div>
                  </p>
                  
              </div>
          </div>

        <div class="form-upload">
          <h5>All Products</h5>
          <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>S/N</th>
                          <th>Photo</th>
                          <th>Title</th>
                          <th>Price</th>
                          <th>RRP</th>
                          <th>Description</th>
                          <th>Uploaded By</th>
                          <th>Batch No</th>
                          <th>Uploaded On</th>
                          <th>Actions</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                          <th>S/N</th>
                          <th>Photo</th>
                          <th>Title</th>
                          <th>Price</th>
                          <th>RRP</th>
                          <th>Description</th>
                          <th>Uploaded By</th>
                          <th>Batch No</th>
                          <th>Uploaded On</th>
                          <th>Actions</th>
                      </tr>
                </tfoot>
                <tbody>

                  <?php  
                      $fet_msg = FetchIndividualContent(21, $duid);
                      $count = 1;                      

                      foreach ($fet_msg as $key => $val) { 
                        $imageURL = "../../files/products/images/"; 
                        $key = $val["Product"];
                      ?> 

                      <tr class="">
                          <td><?php echo $count; ?></td>
                          <td>
                              <div class="">
                                <a href="<?php echo $imageURL . $key; ?>" data-toggle="lightbox" data-title="<?php echo $key; ?>" data-gallery="gallery">
                                  <img src="<?php echo $imageURL . $key; ?>" class="img-fluid" alt="<?php echo $key; ?>"/>
                                </a>
                              </div>
                          </td>
                          <td class="center">			
                              <?php echo $home->AnyContent("Product", "product_title", "ID", $val["ProductTitle"]); ?>
                          </td>
                          <td><?php echo $val["Price"]; ?></td>
                          <td><?php echo $val["RRP"] > 0 ? $val["RRP"] : "None"; ?></td>
                          <td>
                              <?php
                                  if(!empty($val["Description"])){
                                      $string = $val["Description"];
                                      $string = strip_tags($string);

                                      $checkstr = strlen($string) > 100;

                                      if ($checkstr == TRUE) {

                                        $stringCut = substr($string, 0, 100);

                                        $fd= substr($stringCut, 0, strrpos($stringCut, ' '));
                                        $string = $fd;
                                      } 
                                      echo $string;
                                      if ($checkstr == TRUE) { echo "...";}
                                  }else{ ?>
                                      No description
                              <?php } ?>
                          </td>
                          <td>
                            <?php echo $home->AnyContent("Fname", "users", "ID", $val["CreatedBy"])." ".
                                        $home->AnyContent("Sname", "users", "ID", $val["CreatedBy"]); ?>
                          </td>
                          <td><?php echo $val["Batch"]; ?></td>
                          <td>
                              <?php echo date("j-M-Y", strtotime($val["AddedOn"])).", ".date("G:i:sa", strtotime($val["AddedOn"])); ?>
                          </td>

                          <td class="td-actions text-right">
                              <a class="btn btn-success btn-sm" href="dashboard?dil=edit-product&batch=<?php echo $val["Batch"]; ?>"><i class=" fa fa-pen"></i></a>

                              <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');" href="del-product?del=<?php echo $val["ID"]; ?>"><i class=" fa fa-trash"></i></a> 
                              
                          </td>
                      </tr>
                      <?php $count++; } ?>
                  </tbody>
              </table>
              
          </div><!-- CARD DATA-TABLES -->
          </div>

        <!-- Ends blog properties -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  
  <?php include("advert-portrait.php"); ?>
  </div>
  </section>
</div>

<?php } ?>





<!--============================================================================ 
                                MY PRODUCT
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "edit-product") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Products & Services</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Edit my product</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-7">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <h3 class="card-title">Edit Products</h3>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">

              <form id="TypeValidation" onsubmit="return proUploadF(this);" class="form-horizontal form-upload" method="post" enctype="multipart/form-data">
                <h5>Fill in Product and Service details</h5>

                    <?php echo isset($response) ? $response : ""; ?>

                    <?php
                        $batch = $_GET["batch"];
                        $ed_pro = FetchWithMultipleArgs(1, $batch, $duid);
                        $des = $ed_pro[0]["Description"];
                        $price = $ed_pro[0]["Price"];
                        $rrp = $ed_pro[0]["RRP"];
                        $pro_tit = $ed_pro[0]["ProductTitle"];
                        //echo $des;
                    ?>

                    <div class="form-group has-label">
                        <select required="true" name="ProductTitle" class="form-control" >
                            <option selected="selected" value="0">Select Title</option>

                            <?php 
                                $sql="SELECT * FROM product_title WHERE UID = '".$duid."' ORDER BY ID ASC"; 
                                $q = $connect->prepare($sql); 
                                $q->execute();
                                if($q){
                                    while($r = $q->fetch(PDO::FETCH_ASSOC)) {
                                      $ecg = ($r["ID"] == $pro_tit) ? "selected" : "";
                                    echo  "<option $ecg value=".$r["ID"].">".$r["Product"]."</option>";
                                    }
                                }else{
                                    echo "<p>You have to create a product title first!</p>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group has-label">
                        <label>Description</label>
                        <textarea minlength="10" maxlength="300" class="form-control" rows="2" name="Description"><?php echo isset($des) ? $des : ""; ?></textarea>
                        <p class="help-block1">Min: 10 and Max: 300 Characters </p>
                    </div>

                    <div class="row">
                      <div class="col-sm-12"><label>Price</label></div>
                      <div class="input-group col-sm-8">
                          <div class="input-group-prepend">
                              <span class="input-group-text">NGN</span>
                          </div>
                          <input name="Price" placeholder="Enter price" min="1" type="number" step="0.01" class="form-control" value="<?php echo isset($price) ? $price : ""; ?>">
                      </div>                    
                    </div>

                    <div class="row">
                      <div class="col-sm-12"><label>RRP</label></div>
                      <div class="input-group col-sm-8">
                          <div class="input-group-prepend">
                              <span class="input-group-text">NGN</span>
                          </div>
                          <input name="RRP" placeholder="Enter recommended retail price or old price" min="1" type="number" step="0.01" class="form-control" value="<?php echo isset($rrp) ? $rrp : ""; ?>">
                      </div>                    
                    </div>

                    <?php //echo isset($rrp) ? number_format($rrp, 2, '.', ',') : ""; ?>

                    <hr/>
                    <div class="card-footer" align="center">
                      <input style="color: #fff;" type="submit" class="btn btn-success btn-block" name="prodUpdate" value="UPDATE">
                      <input type="hidden" name="EDIT" value="14">
                      <input type="hidden" name="EDITVAL" value="<?php echo $batch; ?>">
                      <div class="clearfix"></div>
                    </div>
                </form>

              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div> <!-- /.card -->
        </div><!-- /.col-md-7 -->
    

        <?php include("advert-portrait.php"); ?>
      </div><!-- /.row -->
    </section>
</div>

<?php } ?>




<!--============================================================================ 
                                   PRODUCT TITLE
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "product-title") { ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product Title</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Product title</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <section class="content">
    <div class="row">
      <div class="col-md-7">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <h3 class="card-title">
                  <strong>
                    <?php 
                          echo $home->AnyContent( "Product", "product_title", "ID", $_GET["aid"] ); 
                    ?> 
                  </strong>
              </h3>
            </ul>
          </div><!-- /.card-header -->
          
          <div class="card-body">
              <div class="tab-content">

                <div class="card card-stats form-upload">
                    <div class="card-body ">
                           
                          <div class="gallery">
                              <?php
                                  // Get images from the database
                                  $alb_id = $_GET["aid"];

                                  $sql = "SELECT * FROM product WHERE ProductTitle = '".$alb_id."' ORDER BY ID DESC"; 
                                  $query = $connect->prepare($sql); 
                                  $query->execute();

                                  // Generate gallery view of the images
                                  if(!empty($query)){
                                      
                                    while($row = $query->fetch(PDO::FETCH_ASSOC)){
                                      $imageURL = '../../files/products/images/';
    
                                      $galid = $row["ID"];
                                      $jk = $row["Product"];
                                      $jk = explode(",", $jk);
                                      
                                      foreach ($jk as $key) { ?>
    
                                          <a href="<?php echo $imageURL . $key; ?>" data-toggle="lightbox" data-title="<?php echo $key; ?>" data-gallery="gallery">
                                              <img src="<?php echo $imageURL . $key; ?>" class="img-fluid mb-2" alt="<?php echo $key; ?>"/>
                                          </a>
                                              
                                          <?php if(isset($_SESSION["accesslevel"]) && $_SESSION["accesslevel"] == "1") { ?>
                                              <a onclick="return confirm('Are you sure you want to delete this product? You might not be able to recover it.'); " href="delete-product?galid=<?php echo $galid; ?>" >
                                                  Delete 
                                              </a>
                                          <?php } ?>
    
                                      <?php } ?>
                                    <?php }
                                  } 
                                  else{ ?>
                                      <p>No image(s) found...</p>
                                  <?php } 
                              ?> 
                          </div>
                      </div>
                  </div>


                </div>
            </div>
      </div>
    </div>
  </section>

<?php } ?>





<!--============================================================================ 
                               PRODUCT
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "product") { ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Products</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">All products</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">
          <?php 
            //$pid = $_SESSION["duid"];
            //$niche_id = $_GET["wid"];

						$perpage = 18;

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
            
						$sql = "SELECT * FROM product GROUP BY Batch ORDER BY ID DESC LIMIT $start, $perpage";
						$q = $connect->prepare($sql); 
						$q->execute();
		
            if($q->rowCount() > 0){

              while($val = $q->fetch(PDO::FETCH_ASSOC)) { ?>
        
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                  <div class="card bg-light">

                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead">
                            <b>
                              <?php echo $home -> AnyContent("Product", "product_title", "ID", $val["ProductTitle"]); ?>
                            </b>
                          </h2>
                          <p class="text-muted text-sm"><b>Description: </b> <br/>
                            <?php echo $val["Description"]; ?><br/>
                          </p>
                          <p class="text-muted text-sm"><b>Price: </b> <br/>
                            <?php 
                                $price = $val["Price"];
                                $rrp = $val["RRP"];
                                echo isset($price) ? "&#8358;".number_format($price, 2, '.', ',')."<br/>" : "Invalid";
                                echo ($rrp > 0 ) ? "&#8358;<del>".number_format($rrp, 2, '.', ',')."</del>" : ""; 
                            ?>
                          </p>
                          <p class="text-muted text-sm"><b>Advertiser: </b> <br/>
                          <ul class="ml-4 mb-0 fa-ul text-muted">
                           <small>
                              <li><?php echo $home -> AnyContent("Fname", "users", "ID", $val["CreatedBy"]) ." ". $home -> AnyContent("Sname", "users", "ID", $val["CreatedBy"]); ?></li>
                              </li><?php echo $home -> AnyContent("Role", "users", "ID", $val["CreatedBy"]); ?></li>
                              </small>
                          </ul>
                          </p>
                        </div>
                        <div class="col-5 text-center">
                            <?php 
                                  $photo = $val["Product"];
                                  if( isset($photo) && !empty($photo) ) 
                                  { ?>
                                      <img alt="picture-error" class=" img-fluid" src="../../files/products/images/<?php echo $photo; ?>" > 
                                  <?php } else { ?>
                                      <img alt="product-avatar" class="img-fluid" src="../../files/products/product-and-services.jpg">
                            <?php } ?>
                        </div>
                      </div>
                    </div>

                    <div class="card-footer">
                      <div class="text-right">
                        <?php 
                          $batch = $val["Batch"];
                          if(isset($duid) && isset($acc_lev) && $acc_lev == 1) { ?>
                              <a  href="../../appfunctions/appfunctions.php?remproduct=1&batch=<?php echo $batch; ?>&acclev=<?php echo $acc_lev; ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo $fname; ?>, are you sure you want to delete this product? You might want to ask the advertiser to edit');">
                                <i class="fas fa-trash"></i> Delete this product
                              </a>
                          <?php } ?>
                        <a href="#" class="btn btn-xs btn-danger">
                          <i class="fas fa-flag"></i> Report Item
                        </a>
                        <a href="dashboard?dil=view-product&bat=<?php echo $val["Batch"]; ?>&tit=<?php echo $val["ProductTitle"]; ?>" class="btn btn-xs btn-primary">
                          <i class="fas fa-eye"></i> See Full Info
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

              <?php }
            } 
            else{ ?>
              <p style="text-align: center">
                  <b>You have reached the end of uploaded items! Please use the PREV button to select from existing ones</b>
              </p>
            <?php }  ?>          
     
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <nav aria-label="Contacts Page Navigation">
          <ul class="pagination justify-content-center m-0">

              <?php if(isset($page))
              {
                $result = "SELECT COUNT(ID) as Total FROM product ORDER BY ID DESC LIMIT $start, $perpage";
                $q = $connect->prepare($result); 
                $q->execute();
                $rows = $q->fetch(PDO::FETCH_ASSOC);

                $total =$rows["Total"];
                $totalpages = ceil($total/$perpage);
                $mycounter = 1;

                if($page <= 1) {
                  echo "<span style='font-weight:bold; padding:20px;'>&laquo; Prev</span>";
                }
                else {
                  $j = $page -1;
                  echo "<span style='padding:20px;'><a class='reg' href='dashboard?dil=product&page=$j'>&laquo; Prev</a></span>";
                }

                for ($i=1; $i <=$totalpages ; $i++) { 
                  if($i<>$page) {
                    if($mycounter < 18) {
                      echo "<span style='padding:20px;'><a class='reg' href='dashboard?dil=product&page=$i'>$i</a></span>" ;
                    }
                    else {
                      // echo "<span><a id='page_links' href='index.php?page=$i'>$i</a></span>" ;
                    }
                  }
                  else {
                      echo "<span style='font-weight:bold; padding:20px;'>$i</span>";
                  }
                  $mycounter++;
                }

                if($page==$totalpages) {
                  echo "<span style='font-weight:bold; padding:20px;'>Next &raquo;</span>";
                }
                else {
                  $j = $page +1;
                  echo "<span style='padding:20px;'><a class='reg' href='dashboard?dil=product&page=$j' >Next &raquo;</a></span>";
                }
              } ?>

          </ul>
        </nav>
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->

</div>

<?php } ?>






<!--============================================================================ 
                               VIEW PRODUCT
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "view-product") { 
    $batch = $_GET["bat"];
    $pro_title = $_GET["tit"];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Products</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $home->AnyContent("Product", "product_title", "ID", $pro_title); ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">
            <h5 class="d-inline-block d-sm-none"><?php echo $home->AnyContent("Product", "product_title", "ID", $pro_title); ?></h5>
              <div class="col-12">
                <?php $img1 = $home->AnyContent("Product", "product", "Batch", $batch); ?>
                <img src="../../files/products/images/<?php echo $img1; ?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <?php 
                    $sql2 = "SELECT * FROM product WHERE Batch = '".$batch."' AND ProductTitle = '".$pro_title."' ORDER BY ID ASC LIMIT 10";
                    $q2 = $connect->prepare($sql2);
                    $q2->execute();
                      while($img = $q2->fetch(PDO::FETCH_ASSOC)){ ?>

                        <div class="product-image-thumb active">
                          <img src="../../files/products/images/<?php echo $img["Product"]; ?>" alt="Product Image">
                        </div>

                      <?php }
                ?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <?php 
                  $sql_pro = "SELECT * FROM product WHERE Batch = '".$batch."' AND ProductTitle = '".$pro_title."' ORDER BY ID DESC";
                  $q = $connect->prepare($sql_pro);
                  $q->execute();

                  $rowz = $q->fetch(PDO::FETCH_ASSOC);
                ?>
              <h3 class="my-3"><?php echo $home->AnyContent("Product", "product_title", "ID", $pro_title); ?></h3>

             <!-- <h4>Available Colors</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                  Green
                  <br>
                  <i class="fas fa-circle fa-2x text-green"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                  Blue
                  <br>
                  <i class="fas fa-circle fa-2x text-blue"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                  Purple
                  <br>
                  <i class="fas fa-circle fa-2x text-purple"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                  Red
                  <br>
                  <i class="fas fa-circle fa-2x text-red"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                  Orange
                  <br>
                  <i class="fas fa-circle fa-2x text-orange"></i>
                </label>
              </div> -->

              <!-- <h4 class="mt-3">Size <small>Please select one</small></h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                  <span class="text-xl">S</span>
                  <br>
                  Small
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                  <span class="text-xl">M</span>
                  <br>
                  Medium
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                  <span class="text-xl">L</span>
                  <br>
                  Large
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                  <span class="text-xl">XL</span>
                  <br>
                  Xtra-Large
                </label>
              </div>  -->

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  <?php 
                    $price = $rowz["Price"]; 
                    echo isset($price) ? "&#8358;".number_format($price, 2, '.', ',')."<br/>" : "Invalid"; 
                  ?>
                </h2>
                <h6 class="mt-0">
                  <small><?php
                            $rrp = $rowz["RRP"]; 
                            echo ($rrp > 0 ) ? "&#8358;<del>".number_format($rrp, 2, '.', ',')."</del>" : ""; 
                  ?></small>
                </h6>
              </div>
              
              <form onsubmit="return adQtyF(this);" class="form-horizontal" method="POST">
                <!-- <div class="card">
                    <div class="card-body"> -->

                        <div class="form-group">
                    
                          <div class="col-sm-2">
                            <div class="form-group has-label">
                                <label>
                                    Qty:
                                </label>
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
                            
                              <div class="mt-4">
                                <div class="">
                                  <div class="input-group">
                                      <!-- <div class="input-group-prepend" style="display: inline; margin-top: 10px;">
                                        <i class="fas fa-cart-plus fa-lg mr-2 fa-2x"></i>
                                      </div> -->
                                      <div style="display: inline">
                                        <input class="btn btn-primary btn-lg btn-flat" type="submit" value="Add to Cart" />
                                        <input type="hidden" name="DASHCART" value="1">
                                        <input type="hidden" name="UID" value="<?php echo $duid; ?>">
                                        <input type="hidden" name="Batch" value="<?php echo $batch; ?>">
                                        <input type="hidden" name="Price" value="<?php echo $price; ?>">
                                      </div>
                                  </div>

                                </div>

                                <!-- <div class="btn btn-default btn-lg btn-flat">
                                  <i class="fas fa-heart fa-lg mr-2"></i>
                                  Add to Wishlist
                                </div> -->
                              </div>
                            
                        </div>
                    
                    <!-- </div>
                </div> -->
              </form>

              <p><?php echo $rowz["Description"]; ?></p>

            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->


</div>
<!-- content wrapper -->

<?php } ?>





<!--============================================================================ 
                                CART
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "cart") { ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cart</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Items in cart</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List of items in Cart</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="" method="POST">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>S/N</th>
                          <th colspan="2">Product</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Total</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php //echo isset($response) ? $response : "";
                        $check_cart = $crud->select("cart", "*", "UID = '".$duid."' ");

                        $products = array();
                        $subtotal = 0.00;
                        $total = 0.00;
                        $qty = 0;
                       
                        if (empty($check_cart)): ?>
                          <tr>
                              <td colspan="5" style="text-align:center;">You have no product added to your Cart</td>
                          </tr>
                      <?php else: 
                        //calculates subtotal
                        // $items = array();
                        // foreach($group_membership as $username) {
                        //   $items[] = $username;
                        // }
                        // print_r($items);

                        // $batch_pp = $check_cart[0]["Batch"];
                        // $qty_pp = $check_cart[0]["Qty"];

                        // $comb = array($batch_pp=>$qty_pp);

                        // $products_in_cart = isset($comb) ? $comb : array();
                        //$batch = $check_cart[0]["Batch"]; 

                        // foreach($check_cart as $pp){
                        //   $total = (float)$pp["Total"];
                        //   $qty = (int)$pp["Qty"];
                        //   $subtotal += $total * $qty;
                        //   //$prod_array = array( $batch=>$qty);
                        //   //$prod_array[] = $pp;
                        // }
                        //select($table, $rows='*', $where=null, $order=null, $group =null, $join =null, $limit=null);
                        // $cart_1st_sub = $crud->select("cart", "*", "UID = '".$duid."' ", "ID ASC", "", "", 1);
                        // $cart_1st_sub = (float)$cart_1st_sub[0]["Total"] * (int)$cart_1st_sub[0]["Qty"];
                        // $subtotal += $cart_1st_sub;

                        // There are products in the cart so we need to select those products from the database
                        // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
                        // $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
                        // $stmt = $connect->prepare('SELECT * FROM cart WHERE Batch IN (' . $array_to_question_marks . ') GROUP BY Batch');
                        // // We only need the array keys, not the values, the keys are the id's of the products
                        // $stmt->execute(array_keys($products_in_cart));
                        // // Fetch the products from the database and return the result as an Array
                        // $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        // var_dump($comb);
                        // foreach ($products as $product) {
                        //   $subtotal += (float)$product['Price'] * (int)$products_in_cart[$product['Batch']];
                        // }

                        $fet_ord = FetchWithMultipleArgs(2, $duid);
                        $count = 1;

                        foreach ($fet_ord as $key => $val) { 
                          $batch = $val["Batch"]; 
                          $product = $home->AnyContent("Product", "product", "Batch", $batch);
                          $imageURL = "../../files/products/images/"; 
                          $price = $home->AnyContent("Price", "product", "Batch", $batch);
                          $qty = $val["Qty"]; 
                          //Product Title
                          $prod = $home->AnyContent("ProductTitle", "product", "Batch", $batch);
                          $prod_tit = $home->AnyContent("Product", "product_title", "ID", $prod);
                          ?>
                          <tr class="">
                            <td><?php echo $count; ?></td>
                            <td class="center">
                                <a href="<?php echo $imageURL . $product; ?>" data-toggle="lightbox" data-title="<?php echo $product; ?>" data-gallery="gallery">
                                  <img height="50px" src="<?php echo $imageURL . $product; ?>" class="img-responsive" alt="<?php echo $product; ?>"/>
                                </a>
                            </td>

                            <td>
                                <a href="dashboard?dil=view-product&bat=<?php echo $batch; ?>&tit=<?php echo $prod; ?>">
                                    <?php echo $prod_tit."<br/>"; ?>
                                </a>

                                <a href="../../appfunctions/appfunctions.php?dashcart=1&batch=<?php echo $batch; ?>&uid=<?php echo $duid; ?>&acclev=<?php echo $acc_lev; ?>" class="btn btn-warning btn-xs remove">Remove</a>
                            </td>
                            <td>&#8358;<?php echo number_format($price, 2, '.', ','); ?></td>
                            <td class="center">
                              <div>
                                <input type="number" name="Qty[]" value="<?php echo isset($qty) ? $qty : ""; ?>" min="1" max="10" placeholder="Quantity" required>
                              </div>
                            </td>
                            <td>
                              &#8358;<?php $tt = (float)$price * (int)$qty; 
                                            echo number_format($tt, 2, '.', ','); ?>
                            </td>
                        </tr>
                        <?php $count++; } ?>

                      <?php endif; ?>

                      <tr>
                          <td colspan="5" style="text-align: right;"></td>
                          <td style="text-align:left;">
                            <h4>&#8358;<?php 
                                $subtotal = FetchWithMultipleArgs(5, $duid);
                                echo number_format($subtotal, 2, '.', ','); ?>
                            </h4>
                          </td>
                      </tr>
                      <tr>
                        <td colspan="5" style="text-align: center"></td>
                        <!-- UPDATE -->
                        <?php
                          if(isset($batch) && !empty($batch)) { ?>
                            <!-- <td> 
                              <div style="display:inline-block">
                                  <input class="btn btn-info btn-sm btn-flat" type="submit" value="UPDATE" />
                                  <input type="hidden" name="DASHCART" value="2">
                                  <input type="hidden" name="UID" value="<?php echo $duid; ?>">
                                  <input type="hidden" name="Batch" value="<?php echo isset($batch) ? $batch : ""; ?>">
                              </div>
                            </td> -->
                        <?php } ?>
                        <!-- CONTINUE TO PLACEORDER-->
                        <?php
                          if(isset($batch) && !empty($batch)) { ?>
                            <td> 
                              <div style="display:inline-block">
                                <a class="btn btn-success btn-sm btn-flat" href="dashboard?dil=placeorder">CONTINUE</a>
                              </div>
                            </td>
                          <?php } ?>
                      </tr>
                    </tbody>
                  </table>
                </form>
                        
              </div><!-- CARD BODY -->
          </div><!-- CARD -->
        </div><!-- COL-12 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

<?php } ?>





<!--============================================================================ 
                                PLACEORDER
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "placeorder") { ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Place Order</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Place Order</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Summary of items before Check-Out</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="" method="POST">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>S/N</th>
                          <th colspan="2">Product</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Total</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php //echo isset($response) ? $response : "";
                        $check_cart = $crud->select("cart", "*", "UID = '".$duid."' ");
                                            
                        $products = array();
                        $subtotal = 0.00;
                        $total = 0.00;
                        $qty = 0;
                       
                        if ( (empty($check_cart)) && (!isset($_GET["trxnid"]) && !isset($_GET["orderno"])) ): ?>
                          <tr>
                              <td colspan="5" style="text-align:center;">
                                Your Cart is empty or something went wrong. Please try again later.
                              </td>
                          </tr>
                      <?php else:     

                        foreach($check_cart as $pp){
                          $total = (float)$pp["Total"];
                          $qty = (int)$pp["Qty"];
                          $subtotal += (float)$total * (int)$qty;
                        }

                        $fet_ord = FetchWithMultipleArgs(2, $duid);
                        $count = 1;

                        foreach ($fet_ord as $key => $val) { 
                          $batch = $val["Batch"]; 
                          $product = $home->AnyContent("Product", "product", "Batch", $batch);
                          $imageURL = "../../files/products/images/"; 
                          $price = $home->AnyContent("Price", "product", "Batch", $batch);
                          $qty = $val["Qty"]; 
                          //Product Title
                          $prod = $home->AnyContent("ProductTitle", "product", "Batch", $batch);
                          $prod_tit = $home->AnyContent("Product", "product_title", "ID", $prod);
                          ?>
                          <tr class="">
                            <td><?php echo $count; ?></td>
                            <td class="center">
                                <a href="<?php echo $imageURL . $product; ?>" data-toggle="lightbox" data-title="<?php echo $product; ?>" data-gallery="gallery">
                                  <img height="50px" src="<?php echo $imageURL . $product; ?>" class="img-responsive" alt="<?php echo $product; ?>"/>
                                </a>
                            </td>

                            <td>
                                <a href="dashboard?dil=view-product&bat=<?php echo $batch; ?>&tit=<?php echo $prod; ?>">
                                    <?php echo $prod_tit."<br/>"; ?>
                                </a>
                            </td>
                            <td>&#8358;<?php echo number_format($price, 2, '.', ','); ?></td>
                            <td class="center">
                              <?php echo $qty; ?>
                            </td>
                            <td>
                              &#8358;<?php $tt = (float)$price * (int)$qty; 
                                            echo number_format($tt, 2, '.', ','); ?>
                            </td>
                        </tr>
                        <?php $count++; } ?>

                      <?php endif; ?>

                      <tr>
                          <td colspan="5" style="text-align: right;"></td>
                          <td style="text-align:left;">
                            <h4>&#8358;<?php 
                                  $subtotal = FetchWithMultipleArgs(5, $duid);
                                  echo number_format($subtotal, 2, '.', ','); ?>
                              </h4>
                          </td>
                      </tr>
                      <tr>
                        <td colspan="5" style="text-align: center"></td>
                        <!-- CONTINUE TO CHECKOUT -->
                        <?php
                          if(isset($batch) && !empty($batch)) { ?>
                            <td> 
                              <div style="display:inline-block">
                                  <input class="btn btn-success btn-sm btn-flat" type="submit" value="CONTINUE TO CHECKOUT" />
                                  <input type="hidden" name="DASHCART" value="3">
                                  <input type="hidden" name="UID" value="<?php echo $duid; ?>">
                                  <input type="hidden" name="Batch" value="<?php echo isset($batch) ? $batch : ""; ?>">
                                  <input type="hidden" name="Qty" value="<?php echo isset($qty) ? $qty : ""; ?>">
                                  <input type="hidden" name="Price" value="<?php echo isset($price) ? $price : ""; ?>">
                                  <input type="hidden" name="SubTotal" value="<?php echo isset($subtotal) ? $subtotal : ""; ?>">
                                  <input type="hidden" name="Addr" value="<?php echo $addr; ?>">
                                  <input type="hidden" name="Email" value="<?php echo $email; ?>">
                                  <input type="hidden" name="Phone" value="<?php echo $phone; ?>">
                                  <input type="hidden" name="Sname" value="<?php echo $sname; ?>">
                                  <input type="hidden" name="Fname" value="<?php echo $fname; ?>">
                              </div>
                            </td>

                          <?php } ?>
                      </tr>
                    </tbody>
                  </table>
                </form>
                        
              </div><!-- CARD BODY -->
          </div><!-- CARD -->
        </div><!-- COL-12 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

<?php } ?>





<!--============================================================================ 
                                CHECK OUT
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "checkout") { 
  
  //Get Variables
  $trxnid = $_GET["trxnid"];
  $orderno = $_GET["orderno"];
  $paystackKey_pub = $user_cl->payStack(1);
  
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Check-Out</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Check Out</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Please complete payment to place your order</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>S/N</th>
                          <th colspan="2">Product</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Total</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php //echo isset($response) ? $response : "";
                        
                        //check payment table insertion
                        //$check_auth = $crud->select("payment", "TransactionID, OrderNo", "TransactionID = '".$trxnid."' 
                                                    //AND OrderNo = '".$orderno."' ");
                        $sql="SELECT * FROM payment WHERE TransactionID = '".$trxnid."' AND OrderNo = '".$orderno."' "; 
                        $q = $connect->prepare($sql); 
                        $q->execute();
                                               
                        if ( !isset($q)): ?>
                          <tr>
                            <td colspan="5" style="text-align:center; color: #4b4149;">
                              <b>Opps.. An error occured while trying to process your request. Please try again later.</b>
                            </td>
                          </tr>
                        <?php else: 
                        while($check_auth = $q->fetch(PDO::FETCH_ASSOC)) {  ?>
                        
                          <div class="col-md-6 col-md-offset-3" style="background-color: #ffffae; padding: 3%; text-align: center;">   
                            <p>Sub-Total:</p>
                            <h4>NGN <?php echo number_format($check_auth["Total"], 2, '.', ','); ?></h4>
                            <span class="badge" style="margin-bottom: 20px">
                                <?php 
                                    // Get the number of items in Cart, same is displayed in header.
                                    // $num_items = $check_auth["ID"];
                                    // $num_items_in_cart = isset($num_items) ? count($num_items) : 0;
                                    // echo $num_items_in_cart; 
                                    $count_cart = FetchWithMultipleArgs(4, $duid);
                                    echo $num_items_in_cart = isset($count_cart) ? $count_cart : 0;
                                ?> Item(s)
                            </span>
                            <?php  
                                $get_values = $crud->select("payment", "*", "TransactionID = '$trxnid' AND OrderNo = '$orderno' ");

                                if($get_values){
                                    $email = $get_values[0]["Email"];
                                    $total = $get_values[0]["Total"];
                                    $name = $get_values[0]["PayeeName"];
                                    $fname = explode(" ", $name)[0];
                                    $sname = explode(" ", $name)[1];
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
                        
                            <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
                            <script src="https://js.paystack.co/v1/inline.js"></script> 
                          </div>
                        <?php } ?>

                      <?php 
                        $products = array();
                        $subtotal = 0.00;
                        $total = 0.00;
                        $qty = 0;

                        $fet_ord = FetchWithMultipleArgs(2, $duid);
                        $count = 1;

                        foreach ($fet_ord as $key => $val) { 
                          $batch = $val["Batch"]; 
                          $product = $home->AnyContent("Product", "product", "Batch", $batch);
                          $imageURL = "../../files/products/images/"; 
                          $price = $home->AnyContent("Price", "product", "Batch", $batch);
                          $qty = $val["Qty"]; 
                          //Product Title
                          $prod = $home->AnyContent("ProductTitle", "product", "Batch", $batch);
                          $prod_tit = $home->AnyContent("Product", "product_title", "ID", $prod);
                          ?>
                          <tr class="">
                            <td><?php echo $count; ?></td>
                            <td class="center">
                                <a href="<?php echo $imageURL . $product; ?>" data-toggle="lightbox" data-title="<?php echo $product; ?>" data-gallery="gallery">
                                  <img height="50px" src="<?php echo $imageURL . $product; ?>" class="img-responsive" alt="<?php echo $product; ?>"/>
                                </a>
                            </td>

                            <td>
                                <a href="dashboard?dil=view-product&bat=<?php echo $batch; ?>&tit=<?php echo $prod; ?>">
                                    <?php echo $prod_tit."<br/>"; ?>
                                </a>
                            </td>
                            <td>&#8358;<?php echo number_format($price, 2, '.', ','); ?></td>
                            <td class="center">
                              <?php echo $qty; ?>
                            </td>
                            <td>
                              &#8358;<?php $tt = (float)$price * (int)$qty; 
                                          echo number_format($tt, 2, '.', ','); ?>
                            </td>
                        </tr>
                        <?php $count++; } ?>
                    
                    <?php endif; ?>

                  </tbody>
                </table>

                <?php 
                  $get_values = $crud->select("payment", "*", "TransactionID = '$trxnid' AND OrderNo = '$orderno' ");
                  $total = $get_values[0]["Total"]; 
                ?>
               
                        
              </div><!-- CARD BODY -->
          </div><!-- CARD -->
        </div><!-- COL-12 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

  <script>
      //=================================
      //PAYSTACK PAYMENT INTEGRATION
      //=================================
      //window.location = "https://www.dilyastrend.com/admin/pages/dashboard?dil=cart";
      //window.location = "https://www.dilyastrend.com/appfunctions/appfunctions.php?purplace=2&acclev=<?php //echo $acc_lev; ?>trxnid=<?php //echo $trxnid; ?>&reference=" + response.reference;

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
                window.location = "https://www.dilyastrend.com/admin/pages/dashboard?dil=cart";
                alert('You have canceled the Transaction!');
            },
            callback: function(response){
                let message = 'Payment complete! Reference: ' + response.reference;
                alert(message);
                window.location = "https://www.dilyastrend.com/appfunctions/appfunctions.php?purplace=2&acclev=<?php echo $acc_lev; ?>&ordno=<?php echo $orderno; ?>&reference=" + response.reference;
            }
        });
        handler.openIframe();
      }
  </script>

<?php } ?>





<!--============================================================================ 
                                CHECK OUT
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "verify_transaction") { 

    $home = new Crud($connect);
    $user_cl = new User($connect); 

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
        header("Location: dashboard?dil=failed-trxn");
    }

  
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Transaction Response</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
            <li class="breadcrumb-item active">Payment successful</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Payment Completed</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div style="text-align: center" class='alert alert-dismissable alert-success'>
                    <!-- <button class='close' data-dismiss='alert'>&times;</button> -->
                        <i class="fa fa-check fa-5x"></i> <br/><br/>
                        Payment was successful and your order has been placed <br/>
                        Your Reference Number is <b><?php echo $payStk_ref = $_GET["reference"]; ?></b> <br/>
                        Your Order Number is <b><?php echo $ord_no; ?></b><br/><br/>

                        <?php if(isset($_GET["resp"])){ ?>
                          <h3 style="border: 1px solid orange; background-color: #a66815; color: #fff; ">
                            <?php isset($_GET["resp"]) ? $_GET["resp"] : ""; ?>
                          </h3><br/>
                        <?php } ?>

                        Click <a href="#dashboard?dil=track-order"> here</a> to track your order.
                </div>

            </div><!-- CARD BODY -->
          </div><!-- CARD -->
        </div><!-- COL-12 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

<?php } ?>





<!--============================================================================ 
                                FAILED TRANSACTION
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "failed-trxn") { ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Transaction Response</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="dashboard?dil=home">Home</a></li>
        <li class="breadcrumb-item active">Failed Transaction</li>
      </ol>
    </div>
  </div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Payment was not completed</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <div style="text-align: center" class='alert alert-dismissable alert-danger'>
                <!-- <button class='close' data-dismiss='alert'>&times;</button> -->
                    <i class="fa fa-times fa-5x"></i> <br/><br/>
                    Payment was not successful and your order not placed <br/>

                    Click <a href="dashboard?dil=cart"> here</a> to try again.
            </div>

        </div><!-- CARD BODY -->
      </div><!-- CARD -->
    </div><!-- COL-12 -->
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?php } ?>







<!--============================================================================ 
                               CALENDAR
=================================================================================-->
<?php if(isset($_GET["dil"]) && $_GET["dil"] == "calendar") { ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Calendar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Schedule Meetings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
        
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-7 connectedSortable">

            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <!-- <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div> -->
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->



          <!-- Left col -->
          <section class="col-lg-5 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <!-- Map card -->
            <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Visitors
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->
          </section>

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php } ?>







  
<?php include "footer.php"; ?>