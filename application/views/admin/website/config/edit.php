<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <?php foreach($edit_config as $edt_con){} ?>
		<title>Edit Config || Admin</title>
		<!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="<?php echo base_url('favicon.ico'); ?>" type="image/x-icon">
    <?php $this->load->view('menu/admin/style'); ?>
	</head>

	<?php foreach($total_order_count as $tot_ord_count){} ?>

  <body>
      <?php $this->load->view('menu/admin/nav'); ?>
      <!-- Main Content -->
<div class="page-wrapper">
<div class="container-fluid">
<!-- Title -->
<div class="row heading-bg  bg-pink">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-light">Dasboard Edit <?php echo $edt_con->email; ?> Config</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
  <li><a href="#"><span>Edit Website</span></a></li>
  <li class="active"><span>Edit <?php echo $edt_con->email; ?> Menu</span></li>
</ol>
</div>
<!-- /Breadcrumb -->
</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
<div class="col-md-4">
<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">Edit Config in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <form action="<?php echo base_url('admin/config/edit/'.$edt_con->id); ?>" method="post" role="form">
      <p class="text-muted">Edit <code>Config of the website.</code></p>
          <br>
          <label class="control-label mb-10">Add URL</label><br>
          <input type="text" name="url" style="color: black;" value="<?php echo $edt_con->url; ?>"/><br>
          <span><?php echo form_error('url'); ?></span>
          <br><p class="text-muted">Add <code> URL</code>e.g - wegeedem.com</p>
          <br>
          <label class="control-label mb-10">Add Email Address</label><br>
          <input type="text" name="email" style="color: black;" value="<?php echo $edt_con->email; ?>"/><br>
          <span><?php echo form_error('email'); ?></span>
          <br>
          <label class="control-label mb-10">Add Password</label><br>
          <input type="text" name="password" style="color: black;" value="<?php echo $edt_con->password; ?>"/><br>
          <br>
         <button type="submit" name="edit" class="btn btn-danger btn-icon left-icon mr-10">
          <i class="fa fa-check"></i>
        </button>
      </form>
    </div>
  </div>

  <?php
      echo $this->session->flashdata('msgEditError');
  ?>

</div>
</div>

</div>
</div>

</div>
<!-- /Row -->

</div>
<!-- jQuery -->
    <?php $this->load->view('menu/admin/script'); ?>

	</body>
</html>
