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
	<?php foreach($filter as $fil){} ?>
	<title>View <?php echo $fil->title; ?> Report || Customer</title>
	<!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="<?php echo base_url('favicon.ico'); ?>" type="image/x-icon">
    <?php $this->load->view('menu/customer/style'); ?>
</head>

<body>
    <?php $this->load->view('menu/customer/nav'); ?>
        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				<!-- Title -->
				<div class="row heading-bg bg-blue">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">View <?php echo $fil->title; ?> Report</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo site_url('customer/dashboard'); ?>">Dashboard</a></li>
						<li><a href="#"><span>Report</span></a></li>
						<li><a href="<?php echo site_url('customer/ticket'); ?>"><span>Ticket Report</span></a></li>
						<li class="active"><span>View <?php echo $fil->title; ?> Reports</span></li>
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
				
				<script>
                     
                  function delete_ticket(id){
                    var id = id;
                    if(confirm("Are you sure you want to delete your ticket")){
                    $.post('<?php echo base_url('customer/ticket/delete_ticket'); ?>', {"id": id}, function(data){
                      location.reload();
                      $('#ctd').html(data)
                      });
                    }
                  }
            
                </script>
            
                <p id='ctd'></p>
				
				<?php 
				/*$query = $this->db->query("SELECT SUM(total) AS gbp, events FROM ticket_order WHERE ticket_id = '$tick->id' ")->result();
                                        
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

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark"><?php echo $fil->title; ?> Report</h6>
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
													    <th></th>
														<th>OID</th>
                                                        <th>Show</th>
                                                        <th>Ticket</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
														<th>Status</th>
														<th>Expiration</th>
                                                        <th>Date</th>
                                                        <th>QR Code</th>
                                                        <th>Delete</th>
													</tr>
												</thead>
												<tbody>
												    
                                                    <?php 
                                                    $date = date('Y-m-d H:i:s');
                                                    
                                                    if(!empty($filter)){ foreach($filter as $fil){ ?>
													<tr>
													    <td><input type="checkbox" class="checkbox" value="<?php echo $fil->id; ?>" /></td>
														<td>#<?php echo $fil->code; ?></td>
                            							<td><?php echo $fil->events; ?></td>
                                                        <td><?php echo str_replace('-', ' ', $fil->title); ?></td>
                                                        <td>&pound;<?php echo $fil->price; ?></td>
                                                        <td><?php echo $fil->quantity; ?></td>
                            							<td>
                                                          <span class="label label-success">
                                                            <?php echo $fil->status; ?>
                                                          </span>
														</td>
														<?php if($fil->checked == 'Not checked' && $fil->event_date < $date){ ?>
														<td>
                                                          <span class="label label-success">Active
                                                          </span>
														</td>
														<?php }else{ ?>
														<td>
                                                          <span class="label label-danger">Expired
                                                          </span>
														</td>
														<?php } ?>
														<td>
                                                            <?php echo date("j M Y", strtotime($fil->created_date)); ?>
														</td>
														<?php if($fil->checked == 'Not checked' && $fil->event_date < $date){ ?>
														<td><a target="_blank" href="<?php echo site_url('qrcode_api/generateqr.php?data='.$fil->ticket_code); ?>" style="width: 150px;" class="btn btn-success btn-icon-anim btn-square" title="View">
                                                    Generate QR Code
                                                </a></td>
                                                <?php }else{ ?>
                                                <td><button type="button" style="width: 150px;" class="btn btn-danger btn-icon-anim btn-square" title="View" disabled>
                                                    Expired QR Code
                                                </a></td>
                                                <?php } ?>
                                                        <td>
                            							  <button class="btn btn-danger btn-icon-anim btn-square" onclick="delete_ticket(<?php echo $fil->id; ?>)" title="Delete">
                                                           <i class="icon-trash"></i>
                                                         </button>
                                                        </td>
													</tr>

                                                <?php } }else{ echo ''; } ?>
                                                <a href="<?php echo site_url('customer/dashboard'); ?>" style="width: 150px;" class="btn btn-danger btn-icon-anim btn-square" title="Go back">
                                                    Go to Dashboard
                                                </a>
                                                <br><br>
                                                <div class="col-md-6">
													<div class="form-group">
                                                        <form action="<?php echo base_url('customer/ticket/filter'); ?>" method="post">
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
											<br><br>
                                            <!--<div class="col-md-6">
												<div class="form-group">
												    <a href="<?php echo site_url('customer/ticket/export/'.$id); ?>" target="_blank" style="width: 150px;" class="btn btn-success btn-icon-anim btn-square" title="Generate">
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
    <?php $this->load->view('menu/customer/script'); ?>
    
</body>

</html>
