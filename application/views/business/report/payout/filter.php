<?php

function convertToOrderFormat($timestamp){
    $diffBtwCurrentTimeAndTimeStamp = (time() - $timestamp);
    $periodsString = ["sec", "min","hr","day","week","month","year","decade"];
    $periodNumbers = ["60" , "60" , "24" , "7" , "4.35" , "12" , "10"];
    for(@@$iterator = 0; $diffBtwCurrentTimeAndTimeStamp >= $periodNumbers[$iterator]; $iterator++)
        @@$diffBtwCurrentTimeAndTimeStamp /= $periodNumbers[$iterator];
        $diffBtwCurrentTimeAndTimeStamp = round($diffBtwCurrentTimeAndTimeStamp);

    if($diffBtwCurrentTimeAndTimeStamp != 1)  $periodsString[$iterator].="s";
        $output = "$diffBtwCurrentTimeAndTimeStamp $periodsString[$iterator]";
        echo "Ordered " .$output. " ago";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>View All Report || Business</title>
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
				<div class="row heading-bg bg-pink">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">View All Report</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo site_url('business/dashboard'); ?>">Dashboard</a></li>
						<li><a href="#"><span>Report</span></a></li>
						<li class="active"><span>View Payout Request</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				
				<style>
				    td{
				        color: #000;
				    }
				</style>

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Payout Request</h6>
								</div>
								<div class="clearfix"></div>
							</div>
                            <div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table display product-overview mb-30">
												<thead>
													<tr>
													    <th>#</th>
														<th>Company</th>
														<th>Company Email</th>
														<th>Income</th>
														<th>Status</th>
														<th>Notes</th>
														<th>Start Date</th>
														<th>End Date</th>
														<th>Date</th>
														<th>View</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php if(!empty($filter)){ foreach($filter as $fil){ 
                                        
                                        ?>
													<tr>
													    <td><?php echo $fil->id; ?></td>
														<td><?php echo str_replace('-', ' ', $fil->company); ?></td>
														<td><?php echo $fil->company_email; ?></td>
														<td>&pound;<?php echo number_format($fil->amount); ?></td>
														<td><?php echo $fil->status; ?></td>
														<td><?php echo $fil->notes; ?></td>
														<td><?php echo date('j M Y', strtotime($fil->start_date)); ?></td>
														<td><?php echo date('j M Y', strtotime($fil->end_date)); ?></td>
														<td><?php echo date('j M Y', strtotime($fil->created_date)); ?></td>
														<td><a href="<?php echo site_url('business/report/payout/invoice/'.$fil->id); ?>" style="width: 150px;" class="btn btn-success btn-icon-anim btn-square" title="View">
                                                    View Invoice
                                                </a></td>
													</tr>
                                                <?php } }else{ echo ''; } ?>
                                                <div class="col-md-6">
													<div class="form-group">
                                                        <form action="<?php echo base_url('business/report/payout/filter'); ?>" method="post">
                                                            <label class="control-label mb-10">Start date </label>
        													<input type="date" name="start_date" class="form-control" placeholder="">
        													<br>
        													<label class="control-label mb-10">End date </label>
        													<input type="date" name="end_date" class="form-control" placeholder="">
        													<br>
        													<button type="submit" style="width: 150px;" class="btn btn-info btn-icon-anim btn-square" title="Filter">
                                                            Filter
                                                        </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <br><br>
												</tbody>
											</table>
											<!--<div class="col-md-6">
												<div class="form-group">
												    <a href="<?php echo site_url('business/report/payout/export'); ?>" target="_blank" style="width: 150px;" class="btn btn-success btn-icon-anim btn-square" title="Generate">
                                                        Generate Report
                                                    </a>
												</div>
										    </div>-->
										</div>
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
        
    <!-- jQuery -->
    <?php $this->load->view('menu/business/script'); ?>
    
</body>

</html>
