<!--Preloader-->
<div class="preloader-it">
  <div class="la-anim-1"></div>
</div>
<!--/Preloader-->
  <div class="wrapper">
    <!-- Top Menu Items -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <a id="toggle_nav_btn" style="margin-top: 20px;" class="toggle-left-nav-btn inline-block mr-20 pull-left" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
      <a href="<?php echo site_url('home'); ?>"><img class="brand-img pull-left" height="50" src="<?php echo base_url('assets/images/menu/logo/1.png'); ?>" alt="brand"/></a>
    </nav>
    <!-- /Top Menu Items -->

    <!-- Left Sidebar Menu -->
    <div class="fixed-sidebar-left">
      <ul class="nav navbar-nav side-nav nicescroll-bar">
        <br>
        <li>
          <a href="<?php echo site_url('home'); ?>">
            <i class="icon-grid mr-10"></i>Back To Platform
          </a>
        </li>
        <li>
          <a class="" href="<?php echo site_url('business/dashboard'); ?>">
            <i class="icon-picture mr-10"></i>Dashboard
          </a>
        </li>
        
        <li>
          <a class="" href="<?php echo site_url('business/my'); ?>">
            <i class="icon-picture mr-10"></i>My Info
          </a>
        </li>
        
        <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#eve_dr">
            <i class="icon-grid mr-10"></i>Events
            <span class="pull-right">
              <i class="fa fa-fw fa-angle-down"></i>
            </span>
          </a>
          <ul id="eve_dr" class="collapse collapse-level-1">
            <li>
              <a href="<?php echo site_url('business/event'); ?>">View</a>
            </li>
            <li>
              <a href="<?php echo site_url('business/event/add'); ?>">Add</a>
            </li>
            <li>
              <a href="<?php echo site_url('business/event/banner'); ?>">Banner</a>
            </li>
            <li>
              <a href="<?php echo site_url('business/event/add_banner'); ?>">Add Banner</a>
            </li>
            <li>
              <a href="<?php echo site_url('business/event/age'); ?>">Age</a>
            </li>
            <li>
              <a href="<?php echo site_url('business/event/add_age'); ?>">Add Age</a>
            </li>
            <li>
              <a href="<?php echo site_url('business/event/dress_code'); ?>">Dress code</a>
            </li>
            <li>
              <a href="<?php echo site_url('business/event/add_dress_code'); ?>">Add Dress code</a>
            </li>
            <li>
              <a href="<?php echo site_url('business/event/last_entry'); ?>">Last entry</a>
            </li>
            <li>
              <a href="<?php echo site_url('business/event/add_last_entry'); ?>">Add Last entry</a>
            </li>
          </ul>
        </li>
        
        <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#book_dr">
            <i class="icon-grid mr-10"></i>Ticket
            <span class="pull-right">
              <i class="fa fa-fw fa-angle-down"></i>
            </span>
          </a>
          <ul id="book_dr" class="collapse collapse-level-1">
            <li>
              <a href="<?php echo site_url('business/ticket'); ?>">View</a>
            </li>
            <li>
              <a href="<?php echo site_url('business/ticket/add'); ?>">Add</a>
            </li>
            <li>
              <a href="<?php echo site_url('business/ticket/process_ticket'); ?>">Process Ticket</a>
            </li>
            <li>
              <a href="<?php echo site_url('business/ticket/purchased'); ?>">Purchased</a>
            </li>
          </ul>
        </li>
        
        <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#report_dr">
            <i class="icon-grid mr-10"></i>Report
            <span class="pull-right">
              <i class="fa fa-fw fa-angle-down"></i>
            </span>
          </a>
          <ul id="report_dr" class="collapse collapse-level-1">
            <!--<li>
              <a href="<?php echo site_url('business/report/food'); ?>">Food</a>
            </li>-->
            <li>
              <a href="<?php echo site_url('business/report/ticket'); ?>">Ticket</a>
            </li>
            <li>
              <a href="<?php echo site_url('business/report/payout'); ?>">Payout Request</a>
            </li>
          </ul>
        </li>
        
        <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#comp_dr">
            <i class="icon-grid mr-10"></i>Venue
            <span class="pull-right">
              <i class="fa fa-fw fa-angle-down"></i>
            </span>
          </a>
          <ul id="comp_dr" class="collapse collapse-level-1">
            <li>
              <a href="<?php echo site_url('business/venue'); ?>">View</a>
            </li>
            <li>
              <a href="<?php echo site_url('business/venue/add'); ?>">Add</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="<?php echo base_url('logout'); ?>">
            <i class="icon-layers mr-10"></i>Logout
          </a>
        </li>
      </ul>
    </div>
  <!-- /Left Sidebar Menu -->
