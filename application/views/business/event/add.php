<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Add New Events || Business</title>
		<!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="<?php echo base_url('favicon.ico'); ?>" type="image/x-icon">
    <?php $this->load->view('menu/business/style'); ?>
	</head>

  <body>
      <?php $this->load->view('menu/business/nav'); ?>
          <!-- Main Content -->
  		<div class="page-wrapper">
              <div class="container-fluid">
  				<!-- Title -->
  				<div class="row heading-bg  bg-pink">
  					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
  					  <h5 class="txt-light">Upload Events</h5>
  					</div>
  					<!-- Breadcrumb -->
  					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
  					  <ol class="breadcrumb">
                            <li><a href="<?php echo site_url('business/dashboard'); ?>">Dashboard</a></li>
  							<li><a href="<?php echo site_url('business/event'); ?>"><span>Events</span></a></li>
  							<li class="active"><span>Upload a Events</span></li>
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
											<form action="<?php echo base_url('business/event/add'); ?>" method="POST" enctype="multipart/form-data">
												<h6 class="txt-dark capitalize-font"><i class="icon-list mr-10"></i>about event</h6>
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
															<label class="control-label mb-10">Currency</label>
                                                            <select class="form-control" name="type" required>
                                                                <option>Select</option>
																<option value="gbp">Gbp</option>
																<option value="usd">Usd</option>
																<option value="shilling">Shilling</option>
																<option value="leone">Leone</option>
															   </select>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Category</label>
                                                            <select class="form-control" data-placeholder="Choose a Category" name="category" required>
                                                                <option>Select</option>
																<?php
																$query = $this->db->query("SELECT DISTINCT category FROM menu_category")->result();
																if(!empty($query)){
																foreach($query as $qry){ ?>
																<option value="<?php echo $qry->category; ?>"><?php echo str_replace('-', ' ', $qry->category); ?></option>
									                            <?php } }else{ ?>
									                            <option>No Data</option>
									                            <?php } ?>
															   </select>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Venue</label>
                                                            <select class="form-control" name="venue_id" required>
                                                                <option>Select</option>
																<?php
																if(!empty($venue)){
																foreach($venue as $ven){ ?>
																<option value="<?php echo $ven->id; ?>"><?php echo str_replace('-', ' ', $ven->title); ?></option>
									                            <?php } }else{ ?>
									                            <option>No Data</option>
									                            <?php } ?>
															   </select>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Video URL </label>
															<input type="text" name="video" class="form-control" placeholder="">
                                                            <span class="text-danger"><?php echo form_error('video'); ?></span>
                                                        </div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Event Date </label>
															<input type="date" name="event_date" class="form-control">
                                                            <span class="text-danger"><?php echo form_error('event_date'); ?></span>
                                                        </div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Image</label>
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
    <?php $this->load->view('menu/business/script'); ?>

	</body>
</html>
