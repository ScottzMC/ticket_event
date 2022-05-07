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
						<li class="active"><span>View Ticket Reports</span></li>
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
									<h6 class="panel-title txt-dark">Ticket Report</h6>
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
														<th>Show</th>
														<th>Ticket</th>
														<th>Category</th>
														<th>GBP</th>
														<!--<th>USD</th>
														<th>SHILLING</th>
														<th>LEONE</th>-->
														<th>View</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php if(!empty($ticket)){ foreach($ticket as $tick){ 
                                                        
                                        $query = $this->db->query("SELECT SUM(total) AS gbp, events FROM ticket_order WHERE ticket_id = '$tick->id' ")->result();
                                        
                                        foreach($query as $qry){
                                        $gbp = $qry->gbp;
                                        $events = $qry->events;
                                        }
                                        
                                        /*$query_usd = $this->db->query("SELECT SUM(total_usd) AS usd FROM ticket_order WHERE ticket_id = '$tick->id' ")->result();
                                        
                                        foreach($query_usd as $qry_usd){
                                        $usd = $qry_usd->usd;
                                        }
                                        
                                        $query_shilling = $this->db->query("SELECT SUM(total_shilling) AS shilling FROM ticket_order WHERE ticket_id = '$tick->id' ")->result();
                                        
                                        foreach($query_shilling as $qry_shil){
                                        $shilling = $qry_shil->shilling;
                                        }
                                        
                                        $query_leone = $this->db->query("SELECT SUM(total_leone) AS leone FROM ticket_order WHERE ticket_id = '$tick->id' ")->result();
                                        
                                        foreach($query_leone as $qry_leo){
                                        $leone = $qry_leo->leone;
                                        }*/
                                        
                                        ?>
													<tr>
													    <td><?php echo $tick->id; ?></td>
														<td><?php echo str_replace('-', ' ', $events); ?></td>
														<td><?php echo str_replace('-', ' ', $tick->title); ?></td>
														<td><?php echo str_replace('-', ' ', $tick->category); ?></td>
														<?php if($gbp > 0){ ?>
														<td>&pound;<?php echo number_format($gbp); ?></td>
														<?php }else{ ?>
														<td>&pound;<?php echo 0; ?></td>
														<?php } ?>
														
														<?php /*if($usd > 0){ ?>
														<!--<td>&dollar;<?php echo number_format($usd); ?></td>
														<?php }else{ ?>
														<td>&dollar;<?php echo 0; ?></td>
														<?php } ?>
														
														<?php if($shilling > 0){ ?>
														<td>SHL<?php echo number_format($shilling); ?></td>
														<?php }else{ ?>
														<td>SHL<?php echo 0; ?></td>
														<?php } ?>
														
														<?php if($leone > 0){ ?>
														<td>LE<?php echo number_format($leone); ?></td>
														<?php }else{ ?>
														<td>LE<?php echo 0; ?></td>-->
														<?php }*/ ?>
														<td><a href="<?php echo site_url('business/report/ticket/category/'.$tick->id); ?>" style="width: 150px;" class="btn btn-success btn-icon-anim btn-square" title="View">
                                                    View Report
                                                </a></td>
													</tr>
                                                <?php } }else{ echo ''; } ?>
                                                <a href="<?php echo site_url('business/dashboard'); ?>" style="width: 150px;" class="btn btn-danger btn-icon-anim btn-square" title="Go back">
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
    <?php $this->load->view('menu/business/script'); ?>
    
</body>

</html>
