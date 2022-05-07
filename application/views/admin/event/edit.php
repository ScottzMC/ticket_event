<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<?php foreach($edit as $edt){} ?>
		<title>Edit <?php echo $edt->title; ?></title>
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
  					  <h5 class="txt-light">Upload Events</h5>
  					</div>
  					<!-- Breadcrumb -->
  					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
  					  <ol class="breadcrumb">
                            <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
  							<li><a href="<?php echo site_url('admin/event'); ?>"><span>Events</span></a></li>
  							<li class="active"><span>Edit <?php echo $edt->title; ?> Events</span></li>
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
											<form action="<?php echo base_url('admin/event/edit/'.$edt->id); ?>" method="POST" enctype="multipart/form-data">
												<h6 class="txt-dark capitalize-font"><i class="icon-list mr-10"></i>about events</h6>
												<hr>
                                                <div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Title</label>
															<input type="text" name="title" class="form-control" placeholder="" value="<?php echo str_replace('-', ' ', $edt->title); ?>">
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
															<input type="text" name="video" class="form-control" value="<?php echo $edt->video; ?>">
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
																<textarea id="editordata" class="summernote" rows="7" cols="15" name="body" required><?php echo $edt->body; ?></textarea>
																<span class="text-danger"><?php echo form_error('body'); ?></span>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												
												<div class="form-actions">
													<button type="submit" name="edit" class="btn btn-success btn-icon left-icon mr-10">
                                                    <i class="fa fa-check"></i>
                                                    <span>Update</span>
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
					
					<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form action="<?php echo base_url('admin/event/edit_image/'.$edt->id); ?>" method="POST" enctype="multipart/form-data">
											
												<div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="icon-picture mr-10"></i>upload image</h6>
												<hr>
												<div class="row">
													<div class="col-lg-12">
														<label>Image</label>
														<input type="file" name="userFiles1[]" class="filestyle" data-buttonname="btn-primary">
													 </div>
													</div>
												</div>
												<div class="seprator-block"></div>
												<hr>

												<div class="form-actions">
													<button type="submit" name="upload_image" class="btn btn-success btn-icon left-icon mr-10">
                                                        <i class="fa fa-check"></i>
                                                        <span>Update</span>
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

			</div>
			<!-- /Main Content -->

	<!-- jQuery -->
    <?php $this->load->view('menu/admin/script'); ?>

	</body>
</html>
