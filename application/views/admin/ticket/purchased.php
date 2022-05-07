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
	<title>View All Purchased Tickets || Admin</title>
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
					  <h5 class="txt-light">View All Purchased Tickets</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
						<li><a href="#"><span>Tickets</span></a></li>
						<li class="active"><span>View Purchased Tickets</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				
				<script>
                      
                  function cancel_ticket(id){
                    var id = id;
                    if(confirm("Are you sure you want to cancel this ticket?")){
                    $.post('<?php echo base_url('admin/ticket/cancel_ticket'); ?>', {"id": id}, function(data){
                      location.reload();
                      $('#ctc').html(data)
                      });
                    }
                  }
                  
                  function check_in_ticket(id){
                    var id = id;
                    if(confirm("Are you sure you want to check in this ticket?")){
                    $.post('<?php echo base_url('admin/ticket/check_in_ticket'); ?>', {"id": id}, function(data){
                      location.reload();
                      $('#ctc').html(data)
                      });
                    }
                  }
            
                </script>
            
                <p id='ctc'></p>

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Tickets for Events</h6>
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
														<th>Code</th>
														<th>Charge ID</th>
														<th>Title</th>
														<th>Customer Email</th>
														<th>Shows</th>
														<th>GBP</th>
														<th>USD</th>
														<th>Shilling</th>
														<th>Leone</th>
														<th>Quantity</th>
														<th>Status</th>
														<th>Checked</th>
														<th>Check in</th>
														<th>Refund</th>
														<th>Cancel</th>
														<th>Date</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php if(!empty($nonchecked)){ foreach($nonchecked as $non){ ?>
													<tr>
													    <td><input type="checkbox" class="checkbox" value="<?php echo $non->id; ?>" /></td>
														<td>#<?php echo $non->code; ?></td>
														<td><?php echo $non->charge_id; ?></td>
                            							<td><?php echo $non->title; ?></td>
                            							<td><?php echo $non->customer_email; ?></td>
                            							<td><?php echo str_replace('-', ' ', $non->events); ?></td>
                            							<td>&pound;<?php echo $non->price; ?></td>
                            							<td>&dollar;<?php echo $non->usd; ?></td>
                            							<td>USH<?php echo $non->shilling; ?></td>
                            							<td>LE<?php echo $non->leone; ?></td>
                            							<td><?php echo $non->quantity; ?></td>
                            							<td><?php echo $non->status; ?></td>
                            							<td><?php echo $non->checked; ?></td>
                            							<td>
													     <button type="button" onclick="check_in_ticket(<?php echo $non->id; ?>)" class="btn btn-info btn-icon-anim btn-square" title="Check In">
                                                            <i class="icon-check"></i>
                                                          </button>
                                                        </td>
                                                        <td>
                                                            <form action="<?php echo base_url('admin/ticket/make_refund'); ?>" method="POST">
                                                                <input type="hidden" name="charge_id" value="<?php echo $non->charge_id; ?>">
    													        <button class="btn btn-info btn-icon-anim btn-square" type="submit" title="Refunded">
                                                                    <i class="icon-check"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td>
													     <button type="button" onclick="cancel_ticket(<?php echo $check->id; ?>)" class="btn btn-danger btn-icon-anim btn-square" title="Cancelled">
                                                            <i class="icon-trash"></i>
                                                          </button>
                                                        </td>
                            							<td><?php echo date("j M Y", strtotime($non->created_date)); ?></td>
													</tr>
                                                <?php } }else{ echo ''; } ?>
                                                <a href="<?php echo site_url('admin/dashboard'); ?>" style="width: 150px;" class="btn btn-danger btn-icon-anim btn-square" title="Go back">
                                                    Go to Dashboard
                                                </a>
                                                <br><br>
												</tbody>
											</table>
											<div style="padding-bottom: 50px;">
                                                <button type="button" name="checked_all" id="checked_all" style="width: 150px;" class="btn btn-info btn-icon-anim btn-square" title="Checked In">
                                                    Check in 
                                                </button>
                                                <button type="button" name="cancelled_all" id="cancelled_all" style="width: 150px;" class="btn btn-danger btn-icon-anim btn-square" title="Cancelled">
                                                    Cancelled
                                                </button>
                                            </div>
										</div>
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
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Checked In Tickets for Events</h6>
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
														<th>Code</th>
														<th>Charge ID</th>
														<th>Title</th>
														<th>Customer Email</th>
														<th>Shows</th>
														<th>GBP</th>
														<th>USD</th>
														<th>Shilling</th>
														<th>Leone</th>
														<th>Quantity</th>
														<th>Status</th>
														<th>Checked</th>
														<th>Refund</th>
														<th>Cancel</th>
														<th>Date</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php if(!empty($checked)){ foreach($checked as $check){ ?>
													<tr>
													    <td><input type="checkbox" class="checkbox" value="<?php echo $check->id; ?>" /></td>
														<td>#<?php echo $check->code; ?></td>
														<td><?php echo $check->charge_id; ?></td>
                            							<td><?php echo $check->title; ?></td>
                            							<td><?php echo $check->customer_email; ?></td>
                            							<td><?php echo str_replace('-', ' ', $check->events); ?></td>
                            							<td>&pound;<?php echo $check->price; ?></td>
                            							<td>&dollar;<?php echo $check->usd; ?></td>
                            							<td>USH<?php echo $check->shilling; ?></td>
                            							<td>LE<?php echo $check->leone; ?></td>
                            							<td><?php echo $check->quantity; ?></td>
                            							<td><?php echo $check->status; ?></td>
                            							<td><?php echo $check->checked; ?></td>
                                                        <td>
                                                            <form action="<?php echo base_url('admin/ticket/make_refund'); ?>" method="POST">
                                                                <input type="hidden" name="charge_id" value="<?php echo $check->charge_id; ?>">
    													        <button class="btn btn-info btn-icon-anim btn-square" type="submit" title="Refunded">
                                                                    <i class="icon-check"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td>
													     <button type="button" onclick="cancel_ticket(<?php echo $check->id; ?>)" class="btn btn-danger btn-icon-anim btn-square" title="Cancelled">
                                                            <i class="icon-trash"></i>
                                                          </button>
                                                        </td>
                            							<td><?php echo date("j M Y", strtotime($check->created_date)); ?></td>
													</tr>
                                                <?php } }else{ echo ''; } ?>
                                                <a href="<?php echo site_url('admin/dashboard'); ?>" style="width: 150px;" class="btn btn-danger btn-icon-anim btn-square" title="Go back">
                                                    Go to Dashboard
                                                </a>
                                                <br><br>
												</tbody>
											</table>
											<div style="padding-bottom: 50px;">
                                                <button type="button" name="cancelled_all" id="cancelled_all" style="width: 150px;" class="btn btn-danger btn-icon-anim btn-square" title="Cancelled">
                                                    Cancelled
                                                </button>
                                            </div>
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
    
    <style>
    .removeRow{
     background-color: #9F2B68;
     color:#9F2B68;
    }
    </style>
    
    <script>
    $(document).ready(function(){
     
     $('.checkbox').click(function(){
      if($(this).is(':checked')){
       $(this).closest('tr').addClass('removeRow');
      }
      else{
       $(this).closest('tr').removeClass('removeRow');
      }
     });
     
     $('#checked_all').click(function(){
      var checkbox = $('.checkbox:checked');
      if(checkbox.length > 0){
       var checkbox_value = [];
       $(checkbox).each(function(){
        checkbox_value.push($(this).val());
       });
       
       $.ajax({
        url:"<?php echo base_url('admin/ticket/check_all_ticket'); ?>",
        method:"POST",
        data:{checkbox_value:checkbox_value},
        success:function(){
         $('.removeRow').fadeOut(1500);
        }
       })
      }else{
       alert('Select at least one order item');
      }
     });
     
     $('#cancelled_all').click(function(){
      var checkbox = $('.checkbox:checked');
      if(checkbox.length > 0){
       var checkbox_value = [];
       $(checkbox).each(function(){
        checkbox_value.push($(this).val());
       });
       
       $.ajax({
        url:"<?php echo base_url('admin/ticket/cancelled_all_ticket'); ?>",
        method:"POST",
        data:{checkbox_value:checkbox_value},
        success:function(){
         $('.removeRow').fadeOut(1500);
        }
       })
      }else{
       alert('Select at least one order item');
      }
     });
    
    });
    </script>

</body>

</html>
