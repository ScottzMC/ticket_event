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
	<title>View All Booked || Admin</title>
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
						<li><a href="#"><span>Booking</span></a></li>
						<li class="active"><span>Booked</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

                <script>
                     
                     function cancel_booking(id){
                        var booking_id = id;
                        if(confirm("Are you sure you this cancel is booking")){
                        $.post('<?php echo base_url('admin/cancel_booking'); ?>', {"booking_id": booking_id}, function(data){
                          location.reload();
                          $('#ctc').html(data)
                          });
                        }
                      }
                      
                      function delete_booking(id){
                        var booking_id = id;
                        if(confirm("Are you sure you want to delete your booking")){
                        $.post('<?php echo base_url('admin/delete_booking'); ?>', {"booking_id": booking_id}, function(data){
                          location.reload();
                          $('#ctd').html(data)
                          });
                        }
                      }
                
                    </script>
                    
                    <p id='ctc'></p>
                    <p id='ctd'></p>

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Booked</h6>
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
                                                        <th>Cancel</th>
                                                        <th>Delete</th>
													</tr>
												</thead>
												
												 <tbody>
                                                    <?php if(!empty($booking)){ foreach($booking as $book){ ?>
													<tr>
													    <td><input type="checkbox" class="checkbox" value="<?php echo $book->id; ?>" /></td>
														<td>#<?php echo $book->code; ?></td>
														<td><?php echo $book->charge_id; ?></td>
														<td><?php echo $book->firstname; ?> <?php echo $book->lastname; ?></td>
                            							<td><?php echo str_replace('-', ' ', $book->email); ?></td>
                                                        <td><?php echo $book->room_number; ?></td>
                                                        <td>&pound;<?php echo $book->price; ?></td>
                            							<td>
                                                          <span class="label label-success">
                                                            <?php echo $book->status; ?>
                                                          </span>
														</td>
														<td>
														    <?php echo $book->payment_type; ?>
														</td>
														<td>
                                                            <?php echo date("j M Y", strtotime($book->booking_start_date)); ?>
														</td>
														<td>
                                                            <?php echo date("j M Y", strtotime($book->booking_end_date)); ?>
														</td>
														<td>
                            							  <button class="btn btn-danger btn-icon-anim btn-square" onclick="cancel_booking(<?php echo $book->id; ?>)" title="Cancel">
                                                           <i class="icon-trash"></i>
                                                         </button>
                                                        </td>
                                                        <td>
                            							  <button class="btn btn-danger btn-icon-anim btn-square" onclick="delete_booking(<?php echo $book->id; ?>)" title="Delete">
                                                           <i class="icon-trash"></i>
                                                         </button>
                                                        </td>
													</tr>
											      <!--</form>-->
                                                <?php } }else{ echo ''; } ?>
                                                <a href="<?php echo site_url('profile/dashboard'); ?>" style="width: 150px;" class="btn btn-danger btn-icon-anim btn-square" title="Go back">
                                                    Go to Dashboard
                                                </a>
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
        url:"<?php echo base_url(); ?>admin/delete_all",
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
        url:"<?php echo base_url(); ?>admin/cancelled_all",
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
