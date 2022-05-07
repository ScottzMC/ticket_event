<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Kitchen Dashboard</title>
</head>
    <?php $this->load->view('menu/kitchen/style'); ?>
<body>
    <?php $this->load->view('menu/kitchen/nav'); ?>
     <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">

				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-light">Kitchen Dashboard</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('kitchen/dashboard'); ?>">Kitchen Dashboard</a></li>
							<li class="active"><span>Dashboard</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>

				<!-- /Title -->

				    <script>
                      function deliveringorder(id){
                        var order_id = id;
                        if(confirm("Are you sure you to deliver this order")){
                        $.post('<?php echo base_url('kitchen/orders/delivering_order'); ?>', {"order_id": order_id}, function(data){
                          location.reload();
                          $('#cta').html(data)
                          });
                        }
                      }
                      
                      function deliveredorder(id){
                        var order_id = id;
                        if(confirm("Are you sure you this order is delivered")){
                        $.post('<?php echo base_url('kitchen/orders/delivered_order'); ?>', {"order_id": order_id}, function(data){
                          location.reload();
                          $('#ctb').html(data)
                          });
                        }
                      }
                      
                      function cancelorder(id){
                        var order_id = id;
                        if(confirm("Are you sure you this cancel is order")){
                        $.post('<?php echo base_url('kitchen/orders/cancel_order'); ?>', {"order_id": order_id}, function(data){
                          location.reload();
                          $('#ctc').html(data)
                          });
                        }
                      }
                      
                      function deleteorder(id){
                        var order_id = id;
                        if(confirm("Are you sure you want to delete your order")){
                        $.post('<?php echo base_url('kitchen/orders/delete_order'); ?>', {"order_id": order_id}, function(data){
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
									<h6 class="panel-title txt-dark">Cancelled Orders</h6>
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
														<th>Seating</th>
														<th>FullName</th>
														<th>Food Name</th>
														<th>Price</th>
                                                        <th>Quantity</th>
														<th>Order Status</th>
                                                        <th>Order Notes</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
													</tr>
												</thead>
												<tbody>
                                                <?php if(!empty($cancelled)){ foreach($cancelled as $cancel){ ?>
													<tr>
													    <td><input type="checkbox" class="checkbox" value="<?php echo $cancel->id; ?>" /></td>
														<td>#<?php echo $cancel->order_id; ?></td>
														<td><?php echo $cancel->seating; ?></td>
														<td><?php echo $cancel->firstname; ?> <?php echo $cancel->lastname; ?></td>
														<td><?php echo str_replace('-', ' ', $cancel->title); ?></td>
                                                        <td>&pound;<?php echo $cancel->price; ?></td>
                                                        <td style="text-align: center;"><?php echo $cancel->quantity; ?></td>
                            							<td>
                                                          <?php if($cancel->status == "Pending"){ ?>
                                                          <span class="label label-info">
                                                            <?php echo $cancel->status; ?>
                                                          </span>
                                                          <?php }else if($cancel->status == "Delivering"){ ?>
                                                          <span class="label label-warning">
                                                            <?php echo $cancel->status; ?>
                                                          </span>
                                                            <?php }else if($cancel->status == "Delivered"){ ?>
                                                          <span class="label label-success">
                                                            <?php echo $cancel->status; ?>
                                                          </span>
                                                            <?php }else if($cancel->status == "Cancelled"){ ?>
                                                          <span class="label label-danger">
                                                            <?php echo $cancel->status; ?>
                                                          </span>
                                                            <?php } ?>
                            							</td>
                            							<td><?php echo $cancel->order_notes; ?></td>
                                                        <td><?php echo date("j M Y", strtotime($cancel->created_date)); ?></td>
                                                        <td>
                            							  <button class="btn btn-danger btn-icon-anim btn-square" onclick="deleteorder(<?php echo $cancel->id; ?>)" title="Delete Order">
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

    <!-- /#wrapper -->
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
        url:"<?php echo base_url(); ?>admin/orders/delete_all",
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
        url:"<?php echo base_url(); ?>admin/orders/cancelled_all",
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