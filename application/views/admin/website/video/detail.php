<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Edit My Website Videos || Admin</title>
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
<h5 class="txt-light">Edit My Website Videos</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
  <li><a href="#"><span>Edit Website</span></a></li>
  <li class="active"><span>Edit Videos</span></li>
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
      <h6 class="panel-title txt-dark">Videos in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

  <script>

	function delete_video(id){
    var menu_id = id;
    if(confirm("Are you sure you want to delete this Videos")){
    $.post('<?php echo base_url('admin/video/delete_video'); ?>', {"video_id": menu_id}, function(data){
      location.reload();
      $('#cta').html(data)
      });
    }
  }
  </script>
	<p id="cta"></p>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <p class="text-muted">Displays <code>Videos on the website from here.</code></p>
      <div class="tags-default mt-40">
			<?php if(!empty($video)){ foreach($video as $vid){ ?>
			<br>
			<h5><?php echo str_replace('-', ' ', $vid->title); ?></h5>
            <br>
          <button type="button" onclick="delete_video(<?php echo $vid->id; ?>)" class="btn btn-danger btn-icon left-icon mr-10">
            <i class="fa fa-trash"></i>
          </button>
          <br>
        <?php } }else{ echo '<div class="alert alert-danger" role="alert">No Menu</div>'; } ?>
      </div>
    </div>
  </div>

</div>
</div>

<div class="col-md-4">
<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">Add Videos in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <form action="<?php echo base_url('admin/video/add'); ?>" method="post" role="form">
      <p class="text-muted">Add <code>Videos of the website.</code></p>
          <br>
          <label class="control-label mb-10">Add Videos Title</label><br>
          <input type="text" name="title" style="color: black; width: 100%;" placeholder="Add Menu Type"/>
          <br>
          <span><?php echo form_error('type'); ?></span>
          <br>
          <label class="control-label mb-10">Type</label>
            <select class="form-control" name="type">
              <option>Select</option>
			  <option value="Home">Home</option>
            </select>
		  <br>
		  <label class="control-label mb-10">Add Videos URL</label><br>
          <input type="text" name="url" style="color: black; width: 100%;" placeholder="Add Video URL"/>
          <br><br>
          <label class="control-label mb-10">Add Videos Playlist</label><br>
          <input type="text" name="playlist" style="color: black; width: 100%;" placeholder="Add Video Playlist"/>
          <br><br>
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
         <button type="submit" class="btn btn-danger btn-icon left-icon mr-10">
          <i class="fa fa-check"></i>
        </button>
      </form>
    </div>
  </div>

  <?php
      echo $this->session->flashdata('msgMenuError');
  ?>

</div>
</div>

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
      <p class="text-muted">Edit <code>Videos on the website in the text area.</code></p>
      <div class="tags-default mt-40">
		  <?php if(!empty($video)){ foreach($video as $vid){ ?>
		  <br>
          <p><?php echo str_replace('-', ' ', $vid->title); ?></p>
           <br>

          <a href="<?php echo site_url('admin/video/edit/'.$vid->id); ?>" class="btn btn-danger btn-icon left-icon mr-10">
            <i class="fa fa-check"></i>
          </a>
          <br>

        <?php } }else{ echo '<div class="alert alert-danger" role="alert">No Menu</div>'; } ?>
      </div>
    </div>
  </div>

<?php
  if($this->form_validation->run() == TRUE){
    echo $this->session->flashdata('msgMenuInfo');
    echo $this->session->flashdata('msgMenuInfoError');
  }
?>

</div>
</div>

</div>
<!-- /Row -->

</div>
<!-- jQuery -->
    <?php $this->load->view('menu/admin/script'); ?>

	</body>
</html>
