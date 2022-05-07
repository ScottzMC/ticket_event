<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Edit My Website Banners || Admin</title>
		<!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="<?php echo base_url('favicon.ico'); ?>" type="image/x-icon">
    <?php $this->load->view('menu/admin/style'); ?>
	</head>

  <body>
    <?php $this->load->view('menu/admin/nav'); ?>
      <!-- Main Content -->
<div class="page-wrapper">
<div class="container-fluid">
<!-- Title -->
<div class="row heading-bg  bg-pink">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-light">Edit My Website Banners</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
  <li><a href="#"><span>Edit Website</span></a></li>
  <li class="active"><span>Edit My Website Banners</span></li>
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
      <h6 class="panel-title txt-dark">Banners in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

   <script>
	function delete_banner(id){
		var banner_id = id;
		if(confirm("Are you sure you want to delete this banner")){
		$.post('<?php echo base_url('admin/banner/delete_banner'); ?>', {"banner_id": banner_id}, function(data){
			location.reload();
			$('#cte').html(data)
			});
		}
	}
	</script>
	<p id='cte'></p>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <p class="text-muted">Displays <code>Banners from the different parts on the website from here.</code> eg - Banners 1.</p>
      <div class="tags-default mt-40">
		<?php if(!empty($banner)){ foreach($banner as $ban){ ?>
			<br>
			<img style="width: 170px; height: 120px;" src="<?php echo base_url('uploads/banner/'.$ban->image); ?>" alt="<?php echo $ban->image; ?>">
			<button type="button" onclick="delete_banner(<?php echo $ban->id; ?>)" class="btn btn-danger btn-icon left-icon mr-10">
				<i class="fa fa-trash"></i>
			</button>
			<br>
			<h6><?php echo str_replace('-', ' ', $ban->title); ?></h6>
			<h6><?php echo str_replace('-', ' ', $ban->type); ?></h6>
        <?php } }else{ echo ''; } ?>
      </div>
    </div>
  </div>

</div>
</div>

<div class="col-md-4">
<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">Add Banners in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

  <form action="<?php echo base_url('admin/banner/add'); ?>" method="post" enctype="multipart/form-data" role="form">
	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <p class="text-muted">Add <code>Banners on the website from here.</code> eg - Slider 1.</p>
			<input type="file" name="fileBanner[]">
			<br>
          <div class="form-group">
             <label class="control-label mb-10">Add Title</label><br>
              <input type="text" name="title" style="color: black; width: 300px;" placeholder="Add Menu Title"/><br>
              <span><?php echo form_error('title'); ?></span>
              <br>
              <label class="control-label mb-10">Type</label>
            <select class="form-control" name="type">
              <option>Select</option>
              <option value="Home">Home</option>
            </select>
            <span><?php echo form_error('type'); ?></span>
            <p class="text-muted">Add <code>Banners Type for where the image would be displayed.</code> eg - Home.</p>
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
              <?php if(!empty($status)){ foreach($status as $stat){ ?>
                <option value="<?php echo $stat->id; ?>"><?php echo $stat->category; ?></option>
              <?php } } ?>
            </select>
            <span><?php echo form_error('category'); ?></span>
            <p class="text-muted">Add <code>Banners Category for where the image would be displayed.</code> eg - Discover, Featured.</p>
            <br>
            <input type="text" name="url" style="color: black; width: 350px;" placeholder="URL" /><br>
              <span><?php echo form_error('url'); ?></span>
              <p class="text-muted">Add <code>Banners URL.</code> If you do not want any url, paste this -> #</p>
              <br>
          </div>

          <br>
         <button type="submit" class="btn btn-danger btn-icon left-icon mr-10">
          <i class="fa fa-check"></i>
        </button>
    </div>
  </div>
</form>

<br>

  <?php
      echo $this->session->flashdata('msgAddedError');
  ?>

</div>
</div>

<div class="col-md-4">
<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">Edit Banners in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <p class="text-muted">Edit <code>Banners from the different parts on the website from here.</code> eg - Banners 1.</p>
      <div class="tags-default mt-40">
				<?php foreach($banner as $ban){ ?>
					<br>
					<img style="width: 170px; height: 120px;" src="<?php echo base_url('uploads/banner/'.$ban->image); ?>">
					<br>
					<br><h6><?php echo $ban->title; ?></h6>
					<br>
					<h6><?php echo str_replace('-', ' ', $ban->type); ?></h6>
					<br>
					<p class="text-muted">Edit <code>Where the Slider would show on the Website by Type.</code> eg - Fashion.</p>
					<br>
                    <a href="<?php echo site_url('admin/banner/edit/'.$ban->id); ?>" class="btn btn-danger btn-icon left-icon mr-10">
                        <i class="fa fa-check"></i>
                    </a>
          <br>
        <?php } ?>
      </div>
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
