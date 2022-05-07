<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Add New Venue || Admin</title>
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
  					  <h5 class="txt-light">Upload Venue</h5>
  					</div>
  					<!-- Breadcrumb -->
  					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
  					  <ol class="breadcrumb">
                            <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
  							<li><a href="<?php echo site_url('admin/venue'); ?>"><span>Venue</span></a></li>
  							<li class="active"><span>Upload a Venue</span></li>
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
											<form action="<?php echo base_url('admin/venue/add'); ?>" method="POST" enctype="multipart/form-data">
												<h6 class="txt-dark capitalize-font"><i class="icon-list mr-10"></i>about venue</h6>
												<hr>
                                                <div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Title </label>
															<input type="text" name="title" class="form-control" placeholder="">
                                                            <span class="text-danger"><?php echo form_error('title'); ?></span>
                                                        </div>
													</div>
													<!--/span-->
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Image 1 </label>
															<input type="file" name="userFiles1[]" class="form-control" >
                                                        </div>
													</div>
													
											    </div>
												<!--/row-->
												
													<!--/span-->

													<!--/span-->
												<div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="icon-speech mr-10"></i>Description</h6>
												<hr>
												<div class="row">
													<div class="col-md-12">
														<div class="panel-wrapper collapse in">
															<div class="panel-body">
																<textarea id="editordata" class="summernote" rows="7" cols="15" name="body" required></textarea>
																<span class="text-danger"><?php echo form_error('body'); ?></span>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												
												<!--/span-->
												<div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="icon-speech mr-10"></i>Google Map</h6>
												<hr>
												<div class="row">
													<div class="col-md-12">
														<div class="panel-wrapper collapse in">
															<div class="panel-body">
																<textarea class="form-control" rows="7" cols="15" name="maps" required></textarea>
																<span class="text-danger"><?php echo form_error('maps'); ?></span>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->

													<!--/span-->

												<div class="form-actions">
													<button type="submit" name="add" class="btn btn-success btn-icon left-icon mr-10">
                                                    <i class="fa fa-check"></i>
                                                    <span>Upload</span>
                                                  </button>
												</div>
											</form>
                                            
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
			<!-- /Main Content -->

<!-- JavaScript -->
    <?php $this->load->view('menu/admin/script'); ?>

	</body>
</html>
