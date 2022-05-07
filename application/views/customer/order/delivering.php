<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>View All Delivering Orders || Profile</title>
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
						<li><a href="#"><span>Orders</span></a></li>
						<li class="active"><span>Delivering Orders</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

                <script>
                      
                      function update_order(id){
                        var order_id = id;
                        if(confirm("Are you sure you want to delete your order")){
                        $.post('<?php echo base_url('customer/orders/update_order'); ?>', {"order_id": order_id}, function(data){
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
									<h6 class="panel-title txt-dark">Delivering orders</h6>
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
														<th>Food Name</th>
														<th>Price</th>
                                                        <th>Quantity</th>
                                                        <th>Total Price</th>
														<th>Order Status</th>
														<th>Order Notes</th>
                                                        <th>Date</th>
                                                        <th>Delete</th>
													</tr>
												</thead>
												
												 <tbody>
                                                    <?php if(!empty($delivering)){ foreach($delivering as $delving){ ?>
													<tr>
													    <td><input type="checkbox" class="checkbox" value="<?php echo $delving->id; ?>" /></td>
														<td>#<?php echo $delving->order_id; ?></td>
														<td><?php echo $delving->charge_id; ?></td>
														<td><?php echo $delving->firstname; ?> <?php echo $delving->lastname; ?></td>
                            							<td><?php echo str_replace('-', ' ', $delving->title); ?></td>
                                                        <td>&pound;<?php echo $delving->price; ?></td>
                                                        <td style="text-align: center;"><?php echo $delving->quantity; ?></td>
                                                        <td>&pound;<?php echo $delving->quantity * $delving->price; ?></td>
                            							<td>
                                                          <span class="label label-warning">
                                                            <?php echo $delving->status; ?>
                                                          </span>
														</td>
														<td><?php echo $delving->order_notes; ?></td>
                                                        <td><?php echo date("j M Y", strtotime($delving->created_date)); ?></td>
                                                         <td>
													     <button type="button" onclick="update_order(<?php echo $delving->id; ?>)" class="btn btn-info btn-icon-anim btn-square" title="Delete Order">
                                                           <i class="icon-check"></i>
                                                         </button>
                                                        </td> 
                                                        
													</tr>
											      </form>
                                                <?php } }else{ echo ''; } ?>
                                                <a href="<?php echo site_url('customer/dashboard'); ?>" style="width: 150px;" class="btn btn-danger btn-icon-anim btn-square" title="Go back">
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
        url:"<?php echo base_url(); ?>customer/orders/delete_all",
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
     
     $('#delivered_all').click(function(){
      var checkbox = $('.checkbox:checked');
      if(checkbox.length > 0){
       var checkbox_value = [];
       $(checkbox).each(function(){
        checkbox_value.push($(this).val());
       });
       
       $.ajax({
        url:"<?php echo base_url(); ?>customer/orders/delivered_all",
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
        url:"<?php echo base_url(); ?>customer/orders/cancelled_all",
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
