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
	<title>View All Venues || business</title>
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
					  <h5 class="txt-light">View All Venue</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo site_url('business/dashboard'); ?>">Dashboard</a></li>
						<li><a href="#"><span>Venue</span></a></li>
						<li class="active"><span>View Venue</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

                 <script>
                    function deleteVenue(id){
                    var del_id = id;
                    if(confirm("Are you sure you want to delete this venue")){
                    $.post('<?php echo base_url('business/venue/delete_venue'); ?>', {"del_id": del_id}, function(data){
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
									<h6 class="panel-title txt-dark">Company</h6>
								</div>
								<div class="clearfix"></div>
							</div>
                            <div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview mb-30" id="support_table">
												<thead>
													<tr>
														<th>ID</th>
														<th>Title</th>
														<th>Image 1</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php if(!empty($venue)){ foreach($venue as $ven){ ?>
													<tr>
														<td>#<?php echo $ven->id; ?></td>
                            							<td><?php echo $ven->title; ?></td>
                            							<td><img class="user-img img-circle" height="150" width="150" src="<?php echo base_url('uploads/venue/'.$ven->image1); ?>"  alt="<?php echo $ven->title; ?>"/></td>
                                                        <td>
                                                            <a href="<?php echo site_url('business/venue/edit/'.$ven->id); ?>" class="btn btn-info btn-icon-anim btn-square" title="Edit Venue">
                                                                <i class="icon-check"></i>
                                                            </a>  
                                                        </td>
                                                        <td>
													        <button class="btn btn-danger btn-icon-anim btn-square" onclick="deleteVenue(<?php echo $ven->id; ?>)" title="Delete Venue">
                                                                <i class="icon-trash"></i>
                                                            </button>
                                                        </td>
													</tr>
                                                <?php } }else{ echo ''; } ?>
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
