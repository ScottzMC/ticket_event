
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
          <a class="" href="<?php echo site_url('admin/dashboard'); ?>">
            <i class="icon-picture mr-10"></i>Dashboard
          </a>
        </li>

        <!--<li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr">
            <i class="icon-basket-loaded mr-10"></i>Food Details
            <span class="pull-right">
              <i class="fa fa-fw fa-angle-down"></i>
            </span>
          </a>
          <ul id="ecom_dr" class="collapse collapse-level-1">
            <li>
              <a href="<?php echo site_url('admin/food'); ?>">View Foods</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/food/add'); ?>">Add Foods</a>
            </li>
          </ul>
        </li>-->
        
        <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#eve_dr">
            <i class="icon-grid mr-10"></i>Events
            <span class="pull-right">
              <i class="fa fa-fw fa-angle-down"></i>
            </span>
          </a>
          <ul id="eve_dr" class="collapse collapse-level-1">
            <li>
              <a href="<?php echo site_url('admin/event'); ?>">View</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/event/add'); ?>">Add</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/event/banner'); ?>">Banner</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/event/add_banner'); ?>">Add Banner</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/event/age'); ?>">Age</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/event/add_age'); ?>">Add Age</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/event/dress_code'); ?>">Dress code</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/event/add_dress_code'); ?>">Add Dress code</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/event/last_entry'); ?>">Last entry</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/event/add_last_entry'); ?>">Add Last entry</a>
            </li>
          </ul>
        </li>
        
        <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#tick_dr">
            <i class="icon-grid mr-10"></i>Tickets
            <span class="pull-right">
              <i class="fa fa-fw fa-angle-down"></i>
            </span>
          </a>
          <ul id="tick_dr" class="collapse collapse-level-1">
            <li>
              <a href="<?php echo site_url('admin/ticket'); ?>">View</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/ticket/add'); ?>">Add</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/ticket/process_ticket'); ?>">Process Ticket</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/ticket/purchased'); ?>">Purchased</a>
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
              <a href="<?php echo site_url('admin/report/food'); ?>">Food</a>
            </li>-->
            <li>
              <a href="<?php echo site_url('admin/report/ticket'); ?>">Ticket</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/report/payout'); ?>">Payout Request</a>
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
              <a href="<?php echo site_url('admin/venue'); ?>">View</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/venue/add'); ?>">Add</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#edit_dr">
            <i class="icon-grid mr-10"></i>Edit Website
            <span class="pull-right">
              <i class="fa fa-fw fa-angle-down"></i>
            </span>
          </a>
          <ul id="edit_dr" class="collapse collapse-level-1">
            <li>
              <a href="<?php echo site_url('admin/config'); ?>">Edit Config</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/menu'); ?>">Edit Menu</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/video'); ?>">Edit Video</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/food_menu'); ?>">Edit Food Menu</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/seating_menu'); ?>">Edit Seating</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/footer'); ?>">Edit Footer</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/status_menu'); ?>">Edit Status Menu</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/banner'); ?>">Edit Banners</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/slider'); ?>">Edit Sliders</a>
            </li>
            <li>
            </li>
          </ul>
        </li>
        
        <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#order_dr">
            <i class="icon-grid mr-10"></i>Orders
            <span class="pull-right">
              <i class="fa fa-fw fa-angle-down"></i>
            </span>
          </a>
          <ul id="order_dr" class="collapse collapse-level-1">
            <li>
              <a href="<?php echo site_url('admin/orders/pending'); ?>">Pending Orders</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/orders/delivering'); ?>">Delivering Orders</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/orders/delivered'); ?>">Delivered Orders</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/orders/cancelled'); ?>">Cancelled Orders</a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/orders/refunded'); ?>">Refunded Orders</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="<?php echo site_url('admin/user_grid'); ?>">
            <i class="icon-grid mr-10"></i>User Grid
          </a>
        </li>

        <li>
          <a href="<?php echo base_url('logout'); ?>">
            <i class="icon-layers mr-10"></i>Logout
          </a>
        </li>
      </ul>
    </div>
  <!-- /Left Sidebar Menu -->
