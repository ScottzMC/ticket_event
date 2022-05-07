<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Dashboard || Profile</title>
</head>

<?php $this->load->view('menu/business/style'); ?>

<body>
    
    <?php $this->load->view('menu/business/nav'); ?>
    
     <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">

				<!-- Title -->
				<div class="row heading-bg  bg-blue">
				    <br>
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-light">Dashboard</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('business/dashboard'); ?>">Business</a></li>
							<li class="active"><span>Dashboard</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>

				<!-- /Title -->
			
				    <script>
                     
                      function update_order(id){
                        var order_id = id;
                        if(confirm("Are you sure you want to delete your order")){
                        $.post('<?php echo base_url('business/orders/update_order'); ?>', {"order_id": order_id}, function(data){
                          location.reload();
                          $('#ctd').html(data)
                          });
                        }
                      }
                
                    </script>
                
                    <p id='ctd'></p>
                    
                <?php foreach($gbp as $gb){} ?>
                <?php //foreach($usd as $us){} ?>
                <?php //foreach($shilling as $shill){} ?>
                <?php //foreach($leone as $leon){} ?>
                    
                <div class="row">
                    <div class="panel panel-default card-view pa-0">
						<div class="panel-wrapper collapse in">
							<div class="panel-body pa-0">
								<div class="sm-data-box bg-red">
									<div class="row ma-0">
										<div class="col-xs-5 text-center pa-0 icon-wrap-left">
											<i class="icon-briefcase txt-light"></i>
										</div>
										<div class="col-xs-7 text-center data-wrap-right">
											<h6 class="txt-light">GBP Ticket Income</h6>
											<?php if($gb->gbp > 0){ ?>
											<span class="txt-light counter counter-anim">&pound;<?php echo number_format($gb->gbp); ?></span>
											<?php }else{ ?>
											<span class="txt-light counter counter-anim">&pound;0</span>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
                
                <!--<div class="row">
                    <div class="panel panel-default card-view pa-0">
						<div class="panel-wrapper collapse in">
							<div class="panel-body pa-0">
								<div class="sm-data-box bg-red">
									<div class="row ma-0">
										<div class="col-xs-5 text-center pa-0 icon-wrap-left">
											<i class="icon-briefcase txt-light"></i>
										</div>
										<div class="col-xs-7 text-center data-wrap-right">
											<h6 class="txt-light">USD Ticket Income</h6>
											<?php if($us->usd > 0){ ?>
											<span class="txt-light counter counter-anim">$<?php echo number_format($us->usd); ?></span>
											<?php }else{ ?>
											<span class="txt-light counter counter-anim">$0</span>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>-->
                
                <!--<div class="row">
                    <div class="panel panel-default card-view pa-0">
						<div class="panel-wrapper collapse in">
							<div class="panel-body pa-0">
								<div class="sm-data-box bg-red">
									<div class="row ma-0">
										<div class="col-xs-5 text-center pa-0 icon-wrap-left">
											<i class="icon-briefcase txt-light"></i>
										</div>
										<div class="col-xs-7 text-center data-wrap-right">
											<h6 class="txt-light">Shilling Ticket Income</h6>
											<?php if($shill->shilling > 0){ ?>
											<span class="txt-light counter counter-anim">SHL<?php echo number_format($shill->shilling); ?></span>
											<?php }else{ ?>
											<span class="txt-light counter counter-anim">SHL0</span>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>-->
                
                <!--<div class="row">
                    <div class="panel panel-default card-view pa-0">
						<div class="panel-wrapper collapse in">
							<div class="panel-body pa-0">
								<div class="sm-data-box bg-red">
									<div class="row ma-0">
										<div class="col-xs-5 text-center pa-0 icon-wrap-left">
											<i class="icon-briefcase txt-light"></i>
										</div>
										<div class="col-xs-7 text-center data-wrap-right">
											<h6 class="txt-light">Leone Ticket Income</h6>
											<?php if($leon->leone > 0){ ?>
											<span class="txt-light counter counter-anim">LE<?php echo number_format($leon->leone); ?></span>
											<?php }else{ ?>
											<span class="txt-light counter counter-anim">LE0</span>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>-->

			</div>

		</div>
        <!-- /Main Content -->

    <!-- /#wrapper -->
    
    <?php $this->load->view('menu/business/script'); ?>

</body>
</html>