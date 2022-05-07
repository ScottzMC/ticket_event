<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>View Invoice || Business</title>
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
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
							<h5 class="txt-light">Invoice</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?php echo site_url('business/dashboard'); ?>">Dashboard</a></li>
								<li><a href="#"><span>Report</span></a></li>
								<li class="active"><span>Invoice</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
					<!-- Row -->
					
					<?php 
					if(!empty($invoice)){
					foreach($invoice as $inv){}
					$ticket = $this->db->query("SELECT * FROM ticket_order WHERE business_id = '$inv->company_id' ")->result();
					foreach($ticket as $tick){}
					?>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Invoice</h6>
									</div>
									<div class="pull-right">
										<h6 class="txt-dark">Order #<?php echo $id; ?></h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-xs-6">
												<span class="txt-dark head-font inline-block capitalize-font mb-5">Billed from: <?php echo $inv->company; ?></span>
												<address class="mb-15">
													<span class="address-head mb-5"></span>
													<?php echo $inv->address; ?> <br>
													<?php echo $inv->town; ?>, <?php echo $inv->postcode; ?> <br>
													<abbr title="Phone">P:</abbr><?php echo $inv->telephone; ?>
												</address>
											</div>
											
										</div>
										
										<?php 
										$payment = $this->db->query("SELECT * FROM user_payments WHERE user_id = '$inv->user_id' ")->result();
										foreach($payment as $paym){}
										?>
										
										<div class="row">
											<div class="col-xs-6">
												<address>
													<span class="txt-dark head-font capitalize-font mb-5">Payment Method:</span>
													<br>
													<?php if(!empty($payment)){ ?>
													<span class="txt-dark head-font capitalize-font mb-5">Bank:</span> <?php echo $paym->bank; ?><br>
													<span class="txt-dark head-font capitalize-font mb-5">Sort code:</span> <?php echo $paym->sort_code; ?>
													<br>
													<span class="txt-dark head-font capitalize-font mb-5">Account Number:</span> <?php echo $paym->account_number; ?>
													<br>
													<?php } ?>
													<br>
													<span class="txt-dark head-font capitalize-font mb-5">Customer email:</span>
													<?php echo $inv->company_email; ?>
												</address>
											</div>
											<div class="col-xs-6 text-right">
												<address>
													<span class="txt-dark head-font capitalize-font mb-5">Billed date:</span><br>
													<?php echo date('j M Y', strtotime($inv->created_date)); ?><br><br><span class="txt-dark head-font capitalize-font mb-5">Invoice status:</span><br>
													<?php echo $inv->status; ?><br><br>
												</address>
											</div>
										</div>
										
										<div class="seprator-block"></div>
										
										<div class="invoice-bill-table">
											<div class="table-responsive">
												<table class="table table-hover">
													<thead>
														<tr>
															<th>Events</th>
															<th>Ticket</th>
															<th>Price</th>
															<th>Quantity</th>
														</tr>
													</thead>
													<tbody>
													    <?php 
													    $payout = $this->db->query("SELECT SUM(total) AS income, title, price, quantity, events FROM ticket_order")->result();
													    if(!empty($payout)){ 
													    foreach($payout as $pay){
													    ?>
														<tr class="txt-dark">
															<td><?php echo str_replace('-', ' ', $pay->events); ?></td>
															<td><?php echo str_replace('-', ' ', $pay->title); ?></td>
															<td>&pound;<?php echo $pay->price; ?></td>
															<td><?php echo $pay->quantity; ?></td>
														</tr>
														<?php } } ?>
														<tr class="txt-dark">
														    <td>Total - &pound;<?php echo $pay->income; ?></td>
														    <td>Amount requested - &pound;<?php echo number_format($inv->amount); ?></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="pull-right">
												<!--<button type="button" onclick="approve(<?php echo $id; ?>)" class="btn btn-success mr-10">
													Approve 
												</button>
												<button type="button" onclick="cancel(<?php echo $id; ?>)" class="btn btn-danger mr-10">
													Cancel 
												</button>-->
												<button type="button" class="btn btn-success btn-outline btn-icon left-icon" onclick="javascript:window.print();"> 
													<i class="fa fa-print"></i><span> Print</span> 
												</button>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					<!-- /Row -->
					
				</div>
			</div>
			<!-- /Main Content -->

		<!-- jQuery -->
    <?php $this->load->view('menu/business/script'); ?>
		
	</body>
</html>