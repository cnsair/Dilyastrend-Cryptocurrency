 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#<?php //echo FetchTableContent("17")[0]["HomepageURL"]; ?>" class="brand-link">
      <img src="../../assets/images/DT-new1.png" alt="DilyasTrend Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>DilyasTrend</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php 
                if(isset($getprofile[0]["Photo"]) && $getprofile[0]["Photo"] !="") { ?>
                    <img src="../../files/images/profilepics/<?php echo $getprofile[0]["Photo"]; ?>" class="img-circle elevation-2" 
                    alt="<?php echo $fname; ?>">
                <?php } else { ?>
                    <img src="../../files/images/profilepics/default.png"  class="img-circle elevation-2" alt="Avatar">
                <?php } 
            ?>
        </div>
        <div class="info">
          <a href="dashboard?dil=profile" class="d-block"><?php echo $fname; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="dashboard?dil=home" class="nav-link <?php if(isset($_GET["dil"]) && $_GET["dil"] == "home") { echo "active"; } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="dashboard?dil=audit-trail" class="nav-link <?php if(isset($_GET["dil"]) && $_GET["dil"] == "audit-trail" || $_GET["dil"] == "check-action") { echo "active"; } else { echo ""; } ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Audit Trail
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="dashboard?dil=guest" class="nav-link <?php if(isset($_GET["dil"]) && $_GET["dil"] == "guest" || $_GET["dil"] == "read-guest-msg") { echo "active"; } ?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Guest Message
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="dashboard?dil=transaction" class="nav-link <?php if(isset($_GET["dil"]) && $_GET["dil"] == "transaction" || $_GET["dil"] == "read-guest-msg") { echo "active"; } ?>">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Transaction
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="dashboard?dil=placed-order" class="nav-link <?php if(isset($_GET["dil"]) && $_GET["dil"] == "placed-order" || $_GET["dil"] == "other") { echo "active"; } ?>">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Placed Order
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link <?php if($_GET["dil"] == "create-blog" || $_GET["dil"] == "post-job" || $_GET["dil"] == "create-slide" || $_GET["dil"] == "worker-slide" || $_GET["dil"] == "message-picture" || $_GET["dil"] == "story-album" || $_GET["dil"] == "my-product" || $_GET["dil"] == "product-title" ) { echo "active"; } ?>">
              <i class="nav-icon fas fa-upload"></i>
              <p>
                Uploads
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dashboard?dil=create-blog" class="nav-link <?php if(isset($_GET["dil"]) && $_GET["dil"] == "create-blog") { echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="dashboard?dil=post-job" class="nav-link <?php if(isset($_GET["dil"]) && $_GET["dil"] == "post-job") { echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Post/Posted Jobs</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="dashboard?dil=create-slide" class="nav-link <?php if(isset($_GET["dil"]) && $_GET["dil"] == "create-slide") { echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Main Slide</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="dashboard?dil=worker-slide" class="nav-link <?php if(isset($_GET["dil"]) && $_GET["dil"] == "worker-slide") { echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Worker Slide</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="dashboard?dil=message-picture" class="nav-link <?php if(isset($_GET["dil"]) && $_GET["dil"] == "message-picture") { echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Message Picture</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="dashboard?dil=my-product" class="nav-link <?php if(isset($_GET["dil"]) && $_GET["dil"] == "my-product" || $_GET["dil"] == "product-title") { echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Product</p>
                </a>
              </li>
              
              <!-- <li class="nav-item">
                <a href="#dashboard?dil=post-archive" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General archive</p>
                </a>
              </li> -->
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="dashboard?dil=product" class="nav-link <?php if(isset($_GET["dil"]) && $_GET["dil"] == "product" || $_GET["dil"] == "view-product") { echo "active"; } ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Products/Services
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="dashboard?dil=job" class="nav-link <?php if(isset($_GET["dil"]) && $_GET["dil"] == "job" || $_GET["dil"] == "job-detail") { echo "active"; } ?>">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Jobs
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="dashboard?dil=niche" class="nav-link <?php if(isset($_GET["dil"]) && $_GET["dil"] == "niche"|| $_GET["dil"] == "professionals" || $_GET["dil"] == "view-profile") { echo "active"; } ?>">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                Workers Niche
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="dashboard?dil=advert" class="nav-link <?php if(isset($_GET["dil"]) && $_GET["dil"] == "advert" || $_GET["dil"] == "edit-advert") { echo "active"; } ?>">
              <i class="nav-icon fas fa-tv"></i>
              <p>
                Adverts
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="dashboard?dil=blog" class="nav-link <?php if(isset($_GET["dil"]) && $_GET["dil"] == "blog" || $_GET["dil"] == "story" || $_GET["dil"] == "edit-blog") { echo "active"; } ?>">
              <i class="nav-icon far fa-newspaper"></i>
              <p>
                Blog
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="dashboard?dil=gallery" class="nav-link <?php if(isset($_GET["dil"]) && $_GET["dil"] == "gallery" || $_GET["dil"] == "album") { echo "active"; } ?>">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="dashboard?dil=calendar" class="nav-link <?php if(isset($_GET["dil"]) && $_GET["dil"] == "calendar") { echo "active"; } ?>">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
              </p>
            </a>
          </li>

          <!-- <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
