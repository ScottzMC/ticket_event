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
	<title>View All Tickets || Admin</title>
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
					  <h5 class="txt-light">View All Tickets</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
						<li><a href="#"><span>Tickets</span></a></li>
						<li class="active"><span>View Tickets</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

                 <script>
                    function delete_ticket(id){
                    var del_id = id;
                    if(confirm("Are you sure you want to delete this ticket")){
                    $.post('<?php echo base_url('admin/ticket/delete_ticket'); ?>', {"del_id": del_id}, function(data){
                      location.reload();
                      $('#cti').html(data)
                      });
                    }
                  }
                </script>
                <p id='cti'></p>

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Events</h6>
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
                                                        <th>GBP</th>
														<th>USD</th>
														<th>Shilling</th>
														<th>Leone</th>
                                                        <th>Quantity</th>
                                                        <th>Date</th>
                                                        <th>Delete</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php if(!empty($ticket)){ foreach($ticket as $tick){ ?>
													<tr>
													    <td><input type="checkbox" class="checkbox" value="<?php echo $tick->id; ?>" /></td>
														<td>#<?php echo $tick->code; ?></td>
														<?php 
														$query = $this->db->query("SELECT title FROM events WHERE code = '$tick->event_code' ")->result();
                                                        foreach($query as $qry){
                                                            $events = $qry->title;
                                                        }
														?>
                            							<td><?php echo str_replace('-', ' ', $events); ?></td>
                                                        <td><?php echo str_replace('-', ' ', $tick->title); ?></td>
                                                        <td>&pound;<?php echo $tick->price; ?></td>
                            							<td>&dollar;<?php echo $tick->usd; ?></td>
                            							<td>USH<?php echo number_format($tick->shilling); ?></td>
                            							<td>SLL<?php echo number_format($tick->leone); ?></td>
                                                        <td><?php echo $tick->quantity; ?></td>
														<td>
                                                            <?php echo date("j M Y", strtotime($tick->created_date)); ?>
														</td>
                                                        <td>
                            							  <button class="btn btn-danger btn-icon-anim btn-square" onclick="delete_ticket(<?php echo $tick->id; ?>)" title="Delete">
                                                           <i class="icon-trash"></i>
                                                         </button>
                                                        </td>
													</tr>
                                                <?php } }else{ echo ''; } ?>
												</tbody>
											</table>
											<div style="padding-bottom: 50px;">
                                                <button type="button" name="delete_all" id="delete_all" style="width: 150px;" class="btn btn-danger btn-icon-anim btn-square" title="Delete">
                                                    Delete
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
    
     $('#delete_all').click(function(){
      var checkbox = $('.checkbox:checked');
      if(checkbox.length > 0){
       var checkbox_value = [];
       $(checkbox).each(function(){
        checkbox_value.push($(this).val());
       });
       
       $.ajax({
        url:"<?php echo base_url(); ?>admin/ticket/delete_all",
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
