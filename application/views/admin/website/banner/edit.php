<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <?php foreach($edit_banner as $edt_ban){}?>
		<title>Edit <?php echo $edt_ban->title; ?> Banners || Admin</title>
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
<h5 class="txt-light">Edit <?php echo $edt_ban->title; ?> Banners</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
  <li><a href="#"><span>Edit Website Details</span></a></li>
  <li><a href="<?php echo site_url('admin/banner'); ?>">Edit Banners</a></li>
  <li class="active"><span>Edit <?php echo $edt_ban->title; ?> Banners</span></li>
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
      <h6 class="panel-title txt-dark">Edit Banners in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

  <div class="panel-wrapper collapse in">
    <form action="<?php echo base_url('admin/banner/edit_image/'.$edt_ban->id); ?>" method="post" enctype="multipart/form-data" role="form">
    <div class="panel-body">
      <p class="text-muted">Edit <code>Banner from the different parts on the website from here.</code> eg - Banner 1.</p>
      <div class="tags-default mt-40">
        <?php if(!empty($edit_banner)){ foreach($edit_banner as $edt_ban){ ?>
          <br>
          <img style="width: 170px; height: 120px;" src="<?php echo base_url('uploads/banner/'.$edt_ban->image); ?>">
          <br>
          <input type="file" name="fileBanner[]">
          <br>
          <button type="submit" name="edit_image" class="btn btn-danger btn-icon left-icon mr-10">
            <i class="fa fa-check"></i>
          </button>
          <br>
          </form>
          <br>
          
          <form action="<?php echo base_url('admin/banner/edit/'.$edt_ban->id); ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="form-group">
            <label class="control-label mb-10">Title</label><br>
              <input type="text" name="title" style="color: black; width: 350px;" placeholder="Title" value="<?php echo $edt_ban->title; ?>" /><br>
              <span><?php echo form_error('title'); ?></span>
              <br>
            <label class="control-label mb-10">Banner Type</label>
            <select class="form-control" name="type">
              <option>Select</option>
			  <option value="Home">Home</option>
            </select>
            <span><?php echo form_error('type'); ?></span>
          </div>
          <h6><?php echo $edt_ban->type; ?></h6>
          <p class="text-muted">Edit <code>Where the Banner would show on the Website by Type.</code> eg - Staff.</p>
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
              <label class="control-label mb-10">Category</label>
            <select class="form-control" name="category">
              <option>Select</option>
              <?php foreach($status as $stat){ ?>
                <option value="<?php echo $stat->id; ?>"><?php echo $stat->category; ?></option>
              <?php }?>
            </select>
            <span><?php echo form_error('category'); ?></span>
            <p class="text-muted">Add <code>Banners Category for where the image would be displayed.</code> eg - Discover, Featured.</p>
            <br>
            <input type="text" name="url" style="color: black; width: 350px;" placeholder="URL" value="<?php echo $edt_ban->url; ?>" /><br>
              <span><?php echo form_error('url'); ?></span>
              <p class="text-muted">Add <code>Banners URL.</code> If you do not want any url, paste this -> #</p>
              <br>
          <button type="submit" name="edit" class="btn btn-danger btn-icon left-icon mr-10">
            <i class="fa fa-check"></i>
          </button>
        <?php } }else{ echo ''; } ?>
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
