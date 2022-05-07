<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Edit Age </title>
		<!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
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
  					  <h5 class="txt-light">Upload Events Age</h5>
  					</div>
  					<!-- Breadcrumb -->
  					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
  					  <ol class="breadcrumb">
                            <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
  							<li><a href="<?php echo site_url('admin/event'); ?>"><span>Events</span></a></li>
  							<li class="active"><span>Edit Events Age</span></li>
  					  </ol>
  					</div>
  					<!-- /Breadcrumb -->
  				</div>
  				<!-- /Title -->
					
					<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
										    <?php foreach($edit as $edt){} ?>
											<form action="<?php echo base_url('admin/event/edit_age/'.$edt->id); ?>" method="POST" enctype="multipart/form-data">
											    
											    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Topic </label>
															<input type="text" name="topic" class="form-control" value="<?php echo $edt->topic; ?>">
                                                            <span class="text-danger"><?php echo form_error('topic'); ?></span>
                                                        </div>
												</div>
												<br>
												<div class="form-actions">
													<button type="submit" name="upload" class="btn btn-success btn-icon left-icon mr-10">
                                                        <i class="fa fa-check"></i>
                                                        <span>Update</span>
                                                      </button>
												</div>
											</form>
											
											    <br><br>
											    <div class="seprator-block"></div>
												<hr>
												
											<!--<form action="<?php echo base_url('admin/event/edit_age_image/'.$edt->id); ?>" method="POST" enctype="multipart/form-data">
												<div class="row">
													<div class="col-lg-12">
														<label>Image</label>
														<input type="file" name="userFiles1[]" class="filestyle" data-buttonname="btn-primary">
													 </div>
													</div>
												</div>
												<br><br>
												<div class="form-actions">
													<button type="submit" name="upload_image" class="btn btn-success btn-icon left-icon mr-10">
                                                        <i class="fa fa-check"></i>
                                                        <span>Update</span>
                                                      </button>
												</div>
											</form>-->
                                            
                                            <?php echo $this->session->flashdata('msgError'); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<!-- /Row -->
					
				</div>

				</div>

			</div>
			<!-- /Main Content -->

	<!-- jQuery -->
    <?php $this->load->view('menu/admin/script'); ?>

	</body>
</html>
