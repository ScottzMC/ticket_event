<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Edit My Config || Admin</title>
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
<h5 class="txt-light">Edit My Website Config</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
  <li><a href="#"><span>Edit Website</span></a></li>
  <li class="active"><span>Edit Config</span></li>
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
      <h6 class="panel-title txt-dark">Config in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

  <script>
	function delete_config(id){
		var id = id;
		if(confirm("Are you sure you want to delete this config")){
		$.post('<?php echo base_url('admin/seating_menu/delete_config'); ?>', {"id": id}, function(data){
			location.reload();
			$('#cte').html(data)
			});
		}
	}
	</script>
	<p id='cte'></p>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <p class="text-muted">Displays <code>Config on the website from here.</code></p>
      <div class="tags-default mt-40">
			<?php if(!empty($config)){ foreach($config as $con){ ?>
			<br>
			<h5><?php echo $con->email; ?></h5>
            <br>
            <h5><?php echo $con->password; ?></h5>
            <br>
          <button type="button" onclick="delete_config(<?php echo $con->id; ?>)" class="btn btn-danger btn-icon left-icon mr-10">
            <i class="fa fa-trash"></i>
          </button>
          <br>
        <?php } }else{ echo '<div class="alert alert-danger" role="alert">No Config</div>'; } ?>
      </div>
    </div>
  </div>

</div>
</div>

<div class="col-md-4">
<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">Add Config in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <form action="<?php echo base_url('admin/config/add'); ?>" method="post" role="form">
      <p class="text-muted">Add <code>Config of the website.</code></p>
          <br>
          <label class="control-label mb-10">Add URL</label><br>
          <input type="text" name="url" style="color: black;" placeholder="Add URL"/>
          <br>
          <br><label class="control-label mb-10">Add Email Address</label><br>
          <input type="email" name="email" style="color: black;" placeholder="Add Email Address"/><br>
          <span><?php echo form_error('email'); ?></span>
          <br><p class="text-muted">Add <code> Email Address.</code>e.g - sale@wegeedem.com</p>
          <br>
          <label class="control-label mb-10">Add Password</label><br>
          <input type="text" name="password" style="color: black;" placeholder="Add Email Password"/><br>
         <br><button type="submit" class="btn btn-danger btn-icon left-icon mr-10">
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
      <h6 class="panel-title txt-dark">Edit Config in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

  <div class="panel-wrapper collapse in">
    <div class="panel-body">
      <p class="text-muted">Edit <code>Config.</code></p>
      <div class="tags-default mt-40">
		  <?php if(!empty($config)){ foreach($config as $con){ ?>
		  <br>
          <p><?php echo $con->email; ?></p>
           <br>

          <a href="<?php echo site_url('admin/config/edit/'.$con->id); ?>" class="btn btn-danger btn-icon left-icon mr-10">
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
