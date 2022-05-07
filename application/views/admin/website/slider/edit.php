<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <?php foreach($edit_slider as $edt_slid){}?>
		<title>Edit <?php echo $edt_slid->title; ?> Sliders || Admin</title>
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
<h5 class="txt-light">Edit <?php echo $edt_slid->title; ?> Sliders</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
  <li><a href="#"><span>Edit Website Details</span></a></li>
  <li><a href="<?php echo site_url('admin/slider'); ?>">Sliders</a></li>
  <li class="active"><span>Edit <?php echo $edt_slid->title; ?> Sliders</span></li>
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
      <h6 class="panel-title txt-dark">Edit Sliders in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

  <div class="panel-wrapper collapse in">
    <form action="<?php echo base_url('admin/slider/edit_image/'.$edt_slid->id); ?>" method="post" enctype="multipart/form-data" role="form">
    <div class="panel-body">
      <p class="text-muted">Edit <code>Banner from the different parts on the website from here.</code> eg - Sliders 1.</p>
      <div class="tags-default mt-40">
        <?php foreach($edit_slider as $edt_slid){} ?>
          <br>
          <img style="width: 170px; height: 120px;" src="<?php echo base_url('uploads/slider/'.$edt_slid->image); ?>">
          <button type="submit" name="edit_image" class="btn btn-danger btn-icon left-icon mr-10">
            <i class="fa fa-check"></i>
          </button>
          <br>
          <input type="file" name="fileBanner[]">
          </form>
          <br>
          
          <form action="<?php echo base_url('admin/slider/edit/'.$edt_slid->id); ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="form-group">
            <label class="control-label mb-10"> Title</label><br>
              <input type="text" name="title" style="color: black;" placeholder="Title" value="<?php echo $edt_slid->title; ?>" /><br>
              <span><?php echo form_error('title'); ?></span>
            <br>
			<label class="control-label mb-10">Currency</label>
            <select class="form-control" name="type">
                <option>Select</option>
			    <option value="gbp">Gbp</option>
			    <option value="usd">Usd</option>
			    <option value="shilling">Shilling</option>
			    <option value="leone">Leone</option>
		    </select>
            <span><?php echo form_error('type'); ?></span>
            <p class="text-muted">Add <code>Banners Category for where the image would be displayed.</code> eg - GBP, USD.</p>
            <br>
            <label class="control-label mb-10">Category</label>
            <select class="form-control" name="category">
              <option>Select</option>
			  <option value="Home">Home</option>
			  <option value="Restaurant">Restaurant</option>
            </select>
          </div>
          <h6><?php echo $edt_slid->category; ?></h6>
          <p class="text-muted">Edit <code>Where the Slider would show on the Website by Type.</code> eg - Home.</p>
          <br>
        
        <button type="submit" name="edit" class="btn btn-danger btn-icon left-icon mr-10">
            <i class="fa fa-check"></i>
          </button>
          <br>
      </div>
    </form>
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
