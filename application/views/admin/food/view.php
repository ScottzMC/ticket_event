<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>View All Food Admin</title>
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
				<div class="row heading-bg  bg-pink">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">View all Foods</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
						<li class="active"><span>All Foods</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

        <script>
          function deleteFood(id){
            var del_id = id;
            if(confirm("Are you sure you want to delete this food")){
            $.post('<?php echo base_url('admin/food/delete_food'); ?>', {"del_id": del_id}, function(data){
              location.reload();
              $('#cte').html(data)
              });
            }
          }
        </script>
        <p id='cte'></p>
        
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
														<th>ID</th>
														<th>Image</th>
														<th>Title</th>
														<th>Category</th>
														<th>Price</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php if(!empty($food)){ foreach($food as $fod){ ?>
													<tr>
														<td>#<?php echo $fod->id; ?></td>
                            							<td><img class="user-img img-circle" height="150" width="150" src="<?php echo base_url('uploads/food/'.$fod->image1); ?>"  alt="<?php echo $fod->title; ?>"/></td>
                            							<td><?php echo str_replace('-', ' ', $fod->title); ?></td>
                            							<?php 
                                                $query = $this->db->query("SELECT category FROM menu WHERE id = '$fod->category' ")->result();
                                                foreach($query as $cat){
                                                    $category = $cat->category;
                                                }
                                            ?>
                            							<td><?php echo str_replace('-', ' ', $category); ?></td>
                            							<td>&pound;<?php echo $fod->price; ?></td>
                                                        <td>
                                                            <a href="<?php echo site_url('admin/food/edit/'.$fod->id); ?>" class="btn btn-info btn-icon-anim btn-square" title="Edit Food">
                                                                <i class="icon-check"></i>
                                                            </a>  
                                                        </td>
                                                        <td>
													        <button class="btn btn-danger btn-icon-anim btn-square" onclick="deleteFood(<?php echo $fod->id; ?>)" title="Delete Food">
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

    <!-- /#wrapper -->
    <!-- jQuery -->
    <?php $this->load->view('menu/admin/script'); ?>

</body>

</html>
