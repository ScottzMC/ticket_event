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
	<title>View All Events Last Entry || Business</title>
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
					  <h5 class="txt-light">View All Events Last Entry</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo site_url('business/dashboard'); ?>">Dashboard</a></li>
						<li><a href="#"><span>Events</span></a></li>
						<li class="active"><span>View Events Last Entry</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

                 <script>
                    function deleteEventLastEntry(id){
                    var del_id = id;
                    if(confirm("Are you sure you want to delete this last entry")){
                    $.post('<?php echo base_url('business/event/delete_event_last_entry'); ?>', {"del_id": del_id}, function(data){
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
											<table class="table display product-overview mb-30" id="support_table">
												<thead>
													<tr>
														<th>Show</th>
														<th>Topic</th>
														<!--<th>Image</th>-->
                                                        <th>Edit</th>
                                                        <th>Delete</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php if(!empty($last_entry)){ foreach($last_entry as $last){ ?>
													<tr>
                            							<td><?php echo str_replace('-', ' ', $last->title); ?></td>
                            							<td><?php echo str_replace('-', ' ', $last->topic); ?></td>
                            							<!--<td><img class="user-img img-circle" height="150" width="150" src="<?php echo base_url('uploads/events/'.$last->image); ?>"  alt="<?php echo $last->title; ?>"/></td>-->
                                                        <td>
                                                            <a href="<?php echo site_url('business/event/edit_last_entry/'.$last->last_id); ?>" class="btn btn-info btn-icon-anim btn-square" title="Edit Events">
                                                                <i class="icon-check"></i>
                                                            </a>  
                                                        </td>
                                                        <td>
													        <button class="btn btn-danger btn-icon-anim btn-square" onclick="deleteEventLastEntry(<?php echo $last->last_id; ?>)" title="Delete Events">
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
