<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Update Info || Profile</title>
		
		<?php $this->load->view('menu/business/style'); ?>
		
	</head>

  <body>
      <?php $this->load->view('menu/business/nav'); ?>
        <?php 
            $session_firstname = $this->session->userdata('ufirstname');
            $session_lastname = $this->session->userdata('ulastname');
        ?>
          <!-- Main Content -->
  		<div class="page-wrapper">
              <div class="container-fluid">
  				<!-- Title -->
  				<br>
  				<div class="row heading-bg  bg-blue">
  				    <br>
  					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
  					  <h5 class="txt-light"><?php echo $session_firstname; ?> <?php echo $session_lastname; ?> Profile</h5>
  					</div>
  					<!-- Breadcrumb -->
  					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
  					  <ol class="breadcrumb">
                            <li><a href="<?php echo site_url('business/dashboard'); ?>">Dashboard</a></li>
  							<li class="active"><span>Update my info</span></li>
  					  </ol>
  					</div>
  					<!-- /Breadcrumb -->
  				</div>
  				<!-- /Title -->
  				
  				<?php foreach($user as $us){} ?>
  				<?php foreach($user_payment as $uspay){} ?>
  				
  				<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
												<h6 class="txt-dark capitalize-font"><i class="icon-list mr-10"></i>my info</h6>
												<hr>
                                                <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">First Name</label>
															<p><?php echo $us->firstname; ?></p>
                                                        </div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Last Name</label>
															<p><?php echo $us->lastname; ?></p>
                                                        </div>
													</div>
													<!--/span-->
													
											    </div>
												<!--/row-->
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Telephone Number</label>
															<p><?php echo $us->telephone; ?></p>
                                                        </div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Address</label>
															<p><?php echo $us->address; ?></p>
                                                        </div>
													</div>
													<!--/span-->
													
											    </div>
												<!--/row-->
											<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Postcode</label>
															<p><?php echo $us->postcode; ?></p>
                                                        </div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Town</label>
															<p><?php echo $us->town; ?></p>
                                                            <span class="text-danger"><?php echo form_error('town'); ?></span>
                                                        </div>
													</div>
													<!--/span-->
													
											    </div>
												
									</div>
																							<hr>
                                                
                                                <?php if(!empty($user_payment)){ ?>
                                                <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Bank</label>
															<p><?php echo $uspay->bank; ?></p>
                                                        </div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Sort Code</label>
															<p><?php echo $uspay->sort_code; ?></p>
                                                        </div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Account Number</label>
															<p><?php echo $uspay->account_number; ?></p>
                                                        </div>
													</div>
													<!--/span-->
													
											    </div>
											    <?php }else{ ?>
											    <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Bank</label>
                                                        </div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Sort Code</label>
                                                        </div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Account Number</label>
                                                        </div>
													</div>
													<!--/span-->
													
											    </div>
											    <?php } ?>

										</div>
									</div>
								</div>
							</div>
						</div>

					<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form action="<?php echo base_url('business/my'); ?>" method="POST" enctype="multipart/form-data">
												<h6 class="txt-dark capitalize-font"><i class="icon-list mr-10"></i>about user</h6>
												<hr>
                                                <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">First Name</label>
															<input type="text" name="firstname" class="form-control" placeholder="" value="<?php echo $us->firstname; ?>">
                                                            <span class="text-danger"><?php echo form_error('firstname'); ?></span>
                                                        </div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Last Name</label>
															<input type="text" name="lastname" class="form-control" value="<?php echo $us->lastname; ?>">
                                                            <span class="text-danger"><?php echo form_error('lastname'); ?></span>
                                                        </div>
													</div>
													<!--/span-->
													
											    </div>
												<!--/row-->
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Telephone Number</label>
															<input type="text" name="telephone" class="form-control" value="<?php echo $us->telephone; ?>">
                                                            <span class="text-danger"><?php echo form_error('telephone'); ?></span>
                                                        </div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Address</label>
															<textarea name="address" row="5" col="5" class="form-control"><?php echo $us->address; ?></textarea>
                                                            <span class="text-danger"><?php echo form_error('address'); ?></span>
                                                        </div>
													</div>
													<!--/span-->
													
											    </div>
												<!--/row-->
											<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Postcode</label>
															<input type="text" name="postcode" class="form-control" placeholder="" value="<?php echo $us->postcode; ?>">
                                                            <span class="text-danger"><?php echo form_error('postcode'); ?></span>
                                                        </div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Town</label>
															<textarea name="town" row="5" col="5" class="form-control"><?php echo $us->town; ?></textarea>
                                                            <span class="text-danger"><?php echo form_error('town'); ?></span>
                                                        </div>
													</div>
													<!--/span-->
													
											    </div>
												
									</div>
																							<hr>

												<div class="form-actions">
													<button type="submit" name="submit" class="btn btn-success btn-icon left-icon mr-10">
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
						
						<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form action="<?php echo base_url('business/my'); ?>" method="POST" enctype="multipart/form-data">
												<h6 class="txt-dark capitalize-font"><i class="icon-list mr-10"></i>add bank details</h6>
												<hr>
                                                <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Bank</label>
															<input type="text" name="bank" class="form-control" placeholder="">
                                                            <span class="text-danger"><?php echo form_error('bank'); ?></span>
                                                        </div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Sort Code</label>
															<input type="text" name="sort_code" class="form-control">
                                                            <span class="text-danger"><?php echo form_error('sort_code'); ?></span>
                                                        </div>
													</div>
													<!--/span-->
													
											    </div>
												<!--/row-->
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Account Number</label>
															<input type="text" name="account_number" class="form-control">
                                                            <span class="text-danger"><?php echo form_error('account_number'); ?></span>
                                                        </div>
													</div>
												
													<!--/span-->
													
											    </div>
												<!--/row-->
											
									</div>
																							<hr>

												<div class="form-actions">
													<button type="submit" name="add_bank" class="btn btn-success btn-icon left-icon mr-10">
                                                    <i class="fa fa-check"></i>
                                                    <span>Add</span>
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
			
			<?php $this->load->view('menu/business/script'); ?>

	</body>
</html>
