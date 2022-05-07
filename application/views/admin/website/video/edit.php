<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <?php foreach($edit_video as $edt_video){} ?>
		<title>Edit <?php echo str_replace('-', ' ', $edt_video->type); ?> Videos || Admin</title>
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
<h5 class="txt-light">Dasboard Edit <?php echo $edt_video->type; ?> Videos</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
  <li><a href="#"><span>Edit Website</span></a></li>
  <li class="active"><span>Edit <?php echo str_replace('-', ' ', $edt_video->type); ?> Videos</span></li>
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
      <h6 class="panel-title txt-dark">Edit Videos in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <form action="<?php echo base_url('admin/video/edit/'.$edt_video->id); ?>" method="post" role="form">
      <p class="text-muted">Edit <code>Videos of the website.</code></p>
          <br>
          <label class="control-label mb-10">Add Videos Title</label><br>
          <input type="text" name="title" style="color: black; width: 100%;" placeholder="Add Menu Type" value="<?php echo $edt_video->title; ?>"/>
          <br>
          <span><?php echo form_error('type'); ?></span>
          <br>
          <label class="control-label mb-10">Type</label>
            <select class="form-control" name="type">
			  <option value="Home">Home</option>
            </select>
		  <br><br>
		  <label class="control-label mb-10">Add Videos URL</label><br>
          <input type="text" name="url" style="color: black; width: 100%;" placeholder="Add Video URL" value="<?php echo $edt_video->url; ?>"/>
          <br><br>
          <label class="control-label mb-10">Add Videos Playlist</label><br>
          <input type="text" name="playlist" style="color: black; width: 100%;" placeholder="Add Video Playlist" value="<?php echo $edt_video->playlist; ?>"/>
          <br>
          <br><p class="text-muted">Add <code> Videos Type of the Website Store.</code>e.g - Chicken</p>
          <br>
			<label class="control-label mb-10">Currency</label>
            <select class="form-control" name="currency_type">
                <option>Select</option>
			    <option value="gbp">Gbp</option>
			    <option value="usd">Usd</option>
			    <option value="shilling">Shilling</option>
			    <option value="leone">Leone</option>
		    </select>
            <span><?php echo form_error('currency_type'); ?></span>
            <p class="text-muted">Add <code>Banners Category for where the image would be displayed.</code> eg - GBP, USD.</p>
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
