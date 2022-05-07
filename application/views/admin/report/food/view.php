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
	<title>View All Report || Admin</title>
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
				<div class="row heading-bg bg-pink">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">View All Report</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
						<li><a href="#"><span>Report</span></a></li>
						<li class="active"><span>View Food Reports</span></li>
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
									<h6 class="panel-title txt-dark">Food Report</h6>
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
													    <th>Rank</th>
														<th>Category</th>
														<th>Total</th>
														<th>View</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php if(!empty($menu)){ foreach($menu as $men){ 
                                                        
                                        $query = $this->db->query("SELECT SUM(total) AS income FROM order_items WHERE category = '$men->id' ")->result();
                                        
                                        foreach($query as $qry){
                                        $total = $qry->income;
                                        }
                                        ?>
													<tr>
													    <td><?php echo $men->rank; ?></td>
														<td><?php echo $men->category; ?></td>
														<?php if($total > 0){ ?>
														<td>&pound;<?php echo number_format($total); ?></td>
														<?php }else{ ?>
														<td>&pound;<?php echo 0; ?></td>
														<?php } ?>
														<td><a href="<?php echo site_url('admin/report/food/category/'.$men->id); ?>" style="width: 150px;" class="btn btn-success btn-icon-anim btn-square" title="View">
                                                    View Report
                                                </a></td>
													</tr>
                                                <?php } }else{ echo ''; } ?>
                                                <a href="<?php echo site_url('admin/dashboard'); ?>" style="width: 150px;" class="btn btn-danger btn-icon-anim btn-square" title="Go back">
                                                    Go to Dashboard
                                                </a>
                                                <br><br>
												</tbody>
											</table>
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
    <?php $this->load->view('menu/admin/script'); ?>
    
</body>

</html>
