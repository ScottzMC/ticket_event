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
	<title>View All Refunded Orders || Admin</title>
    <link href="<?php echo base_url('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css'); ?>" rel="stylesheet" type="text/css"/>
	
	<!-- Custom CSS -->
	<link href="<?php echo base_url('dist/css/style.css'); ?>" rel="stylesheet" type="text/css">
</head>

<body>
        <?php 
            $session_firstname = $this->session->userdata('ufirstname');
            $session_lastname = $this->session->userdata('ulastname');
        ?>
        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				<!-- Title -->
				<div class="row heading-bg bg-pink">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light"><?php echo $session_firstname; ?> <?php echo $session_lastname; ?> Admin</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
						<li><a href="#"><span>Orders</span></a></li>
						<li class="active"><span>Refunded Orders</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

                <script>
                      function deliveringorder(id){
                        var order_id = id;
                        if(confirm("Are you sure you to deliver this order")){
                        $.post('<?php echo base_url('admin/delivering_order'); ?>', {"order_id": order_id}, function(data){
                          location.reload();
                          $('#cta').html(data)
                          });
                        }
                      }
                      
                      function deliveredorder(id){
                        var order_id = id;
                        if(confirm("Are you sure you this order is delivered")){
                        $.post('<?php echo base_url('admin/delivered_order'); ?>', {"order_id": order_id}, function(data){
                          location.reload();
                          $('#ctb').html(data)
                          });
                        }
                      }
                      
                      function cancelorder(id){
                        var order_id = id;
                        if(confirm("Are you sure you this cancel is order")){
                        $.post('<?php echo base_url('admin/cancel_order'); ?>', {"order_id": order_id}, function(data){
                          location.reload();
                          $('#ctc').html(data)
                          });
                        }
                      }
                      
                      function deleteorder(id){
                        var order_id = id;
                        if(confirm("Are you sure you want to delete your order")){
                        $.post('<?php echo base_url('admin/delete_order'); ?>', {"order_id": order_id}, function(data){
                          location.reload();
                          $('#ctd').html(data)
                          });
                        }
                      }
                
                    </script>
                
                    <p id='cta'></p>
                    <p id='ctb'></p>
                    <p id='ctc'></p>
                    <p id='ctd'></p>

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Food orders</h6>
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
														<th>Charge ID</th>
														<th>FullName</th>
														<th>Email</th>
                                                        <th>Room Number</th>
                                                        <th>Price</th>
														<th>Status</th>
														<th>Payment Type</th>
                                                        <th>Booking Start Date</th>
                                                        <th>Booking End Date</th>
                                                        <th>Delete</th>
													</tr>
												</thead>
												
												 <tbody>
                                                    <?php if(!empty($refunded)){ foreach($refunded as $refund){ ?>
													<tr>
													    <td><input type="checkbox" class="checkbox" value="<?php echo $refund->id; ?>" /></td>
														<td>#<?php echo $refund->code; ?></td>
														<td><?php echo $refund->charge_id; ?></td>
														<td><?php echo $refund->firstname; ?> <?php echo $refund->lastname; ?></td>
                            							<td><?php echo $refund->email; ?></td>
                                                        <td><?php echo $refund->room_number; ?></td>
                                                        <td>&pound;<?php echo $refund->price; ?></td>
                            							<td>
                                                          <span class="label label-info">
                                                            <?php echo $refund->status; ?>
                                                          </span>
														</td>
														<td>
														    <?php echo $refund->payment_type; ?>
														</td>

														<td>
                                                            <?php echo date("j M Y", strtotime($pend->booking_start_date)); ?>
														</td>
														<td>
                                                            <?php echo date("j M Y", strtotime($pend->booking_end_date)); ?>
														</td>
                                                        <td>
                            							  <button type="button" class="btn btn-danger btn-icon-anim btn-square" onclick="deleteorder(<?php echo $refund->id; ?>)" title="Delete Order">
                                                           <i class="icon-trash"></i>
                                                         </button>
                                                        </td>
													</tr>
											      <!--</form>-->
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
    <script src="<?php echo base_url('vendors/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    
	<!-- Data table JavaScript -->
	<script src="<?php echo base_url('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo base_url('dist/js/dataTables-data.js'); ?>"></script>
	<!-- Slimscroll JavaScript -->
	<script src="<?php echo base_url('dist/js/jquery.slimscroll.js'); ?>"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="<?php echo base_url('dist/js/dropdown-bootstrap-extended.js'); ?>"></script>
	<!-- Init JavaScript -->
	<script src="<?php echo base_url('dist/js/init.js'); ?>"></script>

</body>

</html>
