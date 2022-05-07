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
	<?php foreach($menu as $men){} ?>
	<title>View <?php echo $men->category; ?> Report || Admin</title>
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
					  <h5 class="txt-light">View <?php echo $men->category; ?> Report</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
						<li><a href="#"><span>Report</span></a></li>
						<li><a href="<?php echo site_url('admin/report/food'); ?>"><span>Food Report</span></a></li>
						<li class="active"><span>View <?php echo $men->category; ?> Reports</span></li>
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
				
				<?php 
				$query = $this->db->query("SELECT SUM(total) AS income FROM order_items WHERE category = '$men->id' ")->result();
                                        
                foreach($query as $qry){
                $total = $qry->income;
                }
				
				?>

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark"><?php echo $men->category; ?> Report - &pound;<?php echo number_format($total); ?></h6>
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
														<th>Food</th>
														<th>Category</th>
														<th>Seating</th>
														<th>Price</th>
														<th>Quantity</th>
														<th>Date</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php if(!empty($filter)){ foreach($filter as $fil){ 
                                        ?>
													<tr>
													    <td><?php echo $fil->order_id; ?></td>
														<td><?php echo str_replace('-', ' ', $fil->title); ?></td>
														<td><?php echo str_replace('-', ' ', $men->category); ?></td>
														<td><?php echo str_replace('-', ' ', $fil->seating); ?></td>
														<td>&pound;<?php echo number_format($fil->price); ?></td>
														<td><?php echo $fil->quantity; ?></td>
														<td><?php echo date('j M Y', strtotime($fil->created_date)); ?></td>
													</tr>
                                                <?php } }else{ echo ''; } ?>
                                                <div class="col-md-6">
													<div class="form-group">
                                                        <form action="<?php echo base_url('admin/report/food/filter/'.$id); ?>" method="post">
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
                                            <div class="col-md-6">
												<div class="form-group">
												    <a href="<?php echo site_url('admin/report/food/export/'.$id); ?>" target="_blank" style="width: 150px;" class="btn btn-success btn-icon-anim btn-square" title="Generate">
                                                        Generate Report
                                                    </a>
												</div>
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
    
</body>

</html>
