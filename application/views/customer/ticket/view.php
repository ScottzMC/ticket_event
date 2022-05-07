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
	<title>View All Tickets || Profile</title>
    <!-- Data table CSS -->
	<?php $this->load->view('menu/customer/style'); ?>
</head>

<body>
    <?php $this->load->view('menu/customer/nav'); ?>
        <?php 
            $session_firstname = $this->session->userdata('ufirstname');
            $session_lastname = $this->session->userdata('ulastname');
        ?>
        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				<!-- Title -->
				<div class="row heading-bg bg-blue">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light"><?php echo $session_firstname; ?> <?php echo $session_lastname; ?></h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo site_url('customer/dashboard'); ?>">Dashboard</a></li>
						<li class="active"><span>Ticket</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

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

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Tickets</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table table-hover display  pb-30" >
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
                                                    
                                                    if(!empty($ticket)){ foreach($ticket as $tick){ ?>
													<tr>
													    <td><input type="checkbox" class="checkbox" value="<?php echo $tick->id; ?>" /></td>
														<td>#<?php echo $tick->code; ?></td>
                            							<td><?php echo $tick->events; ?></td>
                                                        <td><?php echo str_replace('-', ' ', $tick->title); ?></td>
                                                        <td>&pound;<?php echo $tick->price; ?></td>
                                                        <td><?php echo $tick->quantity; ?></td>
                            							<td>
                                                          <span class="label label-success">
                                                            <?php echo $tick->status; ?>
                                                          </span>
														</td>
														<?php if($tick->checked == 'Not checked' && $tick->event_date < $date){ ?>
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
                                                            <?php echo date("j M Y", strtotime($tick->created_date)); ?>
														</td>
														<?php if($tick->checked == 'Not checked' && $tick->event_date < $date){ ?>
														<td><a target="_blank" href="<?php echo site_url('qrcode_api/generateqr.php?data='.$tick->ticket_code); ?>" style="width: 150px;" class="btn btn-success btn-icon-anim btn-square" title="View">
                                                    Generate QR Code
                                                </a></td>
                                                <?php }else{ ?>
                                                <td><button type="button" style="width: 150px;" class="btn btn-danger btn-icon-anim btn-square" title="View" disabled>
                                                    Expired QR Code
                                                </a></td>
                                                <?php } ?>
                                                        <td>
                            							  <button class="btn btn-danger btn-icon-anim btn-square" onclick="delete_ticket(<?php echo $tick->id; ?>)" title="Delete">
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
        
    <?php $this->load->view('menu/customer/script'); ?>
    
    <style>
    .removeRow{
     background-color: #FF0000;
     color:#FFFFFF;
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
        url:"<?php echo base_url(); ?>customer/ticket/delete_all",
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
