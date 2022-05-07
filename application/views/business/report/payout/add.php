<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Add Payout Request || Business</title>
		
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
  				<div class="row heading-bg  bg-pink">
  				    <br>
  					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
  					  <h5 class="txt-light">View Payout Request</h5>
  					</div>
  					<!-- Breadcrumb -->
  					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
  					  <ol class="breadcrumb">
                            <li><a href="<?php echo site_url('business/dashboard'); ?>">Dashboard</a></li>
                            <li><a href="<?php echo site_url('business/report/payout'); ?>">Report</a></li>
  							<li class="active"><span>Make Payout Request</span></li>
  					  </ol>
  					</div>
  					<!-- /Breadcrumb -->
  				</div>
  				<!-- /Title -->
  				
  				<?php foreach($user_payment as $uspay){} ?>
					
						<div class="row">
						  <div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form action="<?php echo base_url('business/report/payout/add'); ?>" method="POST" enctype="multipart/form-data">
												<h6 class="txt-dark capitalize-font"><i class="icon-list mr-10"></i>Payout request</h6>
												<hr>
                                                <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Amount</label>
															<input type="text" name="amount" class="form-control" placeholder="">
                                                            <span class="text-danger"><?php echo form_error('amount'); ?></span>
                                                        </div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Payment option</label>
															<select name="payment_id" class="form-control">
															    <option>Select</option>
															    <?php if(!empty($user_payment)){ foreach($user_payment as $uspay){ ?>
															    <option value="<?php echo $uspay->id; ?>"><?php echo $uspay->bank; ?></option>
															    <?php } } ?>
															</select>
                                                        </div>
													</div>
													<!--/span-->
													
											    </div>
												<!--/row-->
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Start Date</label>
															<input type="date" name="start_date" class="form-control">
                                                            <span class="text-danger"><?php echo form_error('account_number'); ?></span>
                                                        </div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">End Date</label>
															<input type="date" name="end_date" class="form-control">
                                                            <span class="text-danger"><?php echo form_error('account_number'); ?></span>
                                                        </div>
													</div>
												
													<!--/span-->
													
											    </div>
												<!--/row-->
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Notes</label>
															<textarea name="notes" cols="6" rows="6" class="form-control"></textarea>
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
