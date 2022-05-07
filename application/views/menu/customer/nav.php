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
          <a class="" href="<?php echo site_url('customer/dashboard'); ?>">
            <i class="icon-picture mr-10"></i>Dashboard
          </a>
        </li>
        
        <li>
          <a class="" href="<?php echo site_url('customer/my'); ?>">
            <i class="icon-picture mr-10"></i>My Info
          </a>
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
              <a href="<?php echo site_url('customer/ticket'); ?>">View</a>
            </li>
          </ul>
        </li>
        
        <!--<li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#order_dr">
            <i class="icon-grid mr-10"></i>Orders
            <span class="pull-right">
              <i class="fa fa-fw fa-angle-down"></i>
            </span>
          </a>
          <ul id="order_dr" class="collapse collapse-level-1">
            <li>
              <a href="<?php echo site_url('customer/orders/pending'); ?>">Pending Orders</a>
            </li>
            <li>
              <a href="<?php echo site_url('customer/orders/delivering'); ?>">Delivering Orders</a>
            </li>
            <li>
              <a href="<?php echo site_url('customer/orders/delivered'); ?>">Delivered Orders</a>
            </li>
            <li>
              <a href="<?php echo site_url('customer/orders/cancelled'); ?>">Cancelled Orders</a>
            </li>
          </ul>
        </li>-->

        <li>
          <a href="<?php echo base_url('logout'); ?>">
            <i class="icon-layers mr-10"></i>Logout
          </a>
        </li>
      </ul>
    </div>
  <!-- /Left Sidebar Menu -->
