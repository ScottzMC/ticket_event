<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="description" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Shopping Cart</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('images/favicon.ico'); ?>">
    <?php $this->load->view('menu/main/style'); ?>
</head>

<body>

    <?php 
    //$data['type'] = $type;
    
    $this->load->view('menu/main/nav'); ?>

    <!-- breadcrumb -->
    <div class="gen-breadcrumb" style="background-image: url('images/background/asset-25.jpeg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h1>
                               Shopping Basket
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                 <?php //if($type == 'usd'){ ?>
                                <!--<li class="breadcrumb-item"><a href="<?php echo site_url('home/view/'.$type); ?>"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <?php //}else if($type == 'shilling'){ ?>
                                <li class="breadcrumb-item"><a href="<?php echo site_url('home/view/'.$type); ?>"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <?php //}else if($type == 'leone'){ ?>
                                <li class="breadcrumb-item"><a href="<?php echo site_url('home/view/'.$type); ?>"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>-->
                                <?php //}else{ ?>
                                <li class="breadcrumb-item"><a href="<?php echo site_url('home'); ?>"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <?php //} ?>
                               <li class="breadcrumb-item active">
                                  <a href="#">Shopping Basket</a>
                               </li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    
    <script>
        function delete_basket(id){
            var ticket_id = id;
            if(confirm("Are you sure you want to remove ticket")){
            $.post('<?php echo base_url('event/delete_basket'); ?>', {"ticket_id": ticket_id}, function(data){
              location.reload();
              $('#ctd').html(data)
              });
            }
        }
    </script>
    <p id='ctd'></p>

    <!-- Section-1 Start -->
    <section class="gen-section-padding-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <?php if(!empty($basket)){ foreach($basket as $bask){ ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                <div class="gen-movie-contain">
                                    <div class="gen-movie-img">
                                        <img src="<?php echo base_url('uploads/ticket/'.$bask->image); ?>"
                                                    alt="<?php echo $bask->title; ?>">
                                    </div>
                                    <div class="gen-info-contain">
                                        <div class="gen-movie-info">
                                            <h3><a href="<?php echo site_url('event/detail/'.strtolower($bask->event_code)); ?>"><?php echo str_replace('-',' ', $bask->title); ?></a></h3>
                                        </div>
                                        <div class="gen-movie-meta-holder">
                                            <ul>
                                                <li>
                                                    <a href="<?php echo site_url('event/detail/'.strtolower($bask->event_code)); ?>"><span>View</span></a>
                                                </li>
                                                <li>
                                                    <button type="button" onclick="delete_basket(<?php echo $bask->id; ?>)"><span>Remove</span></button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } }else{ ?>
                        <div class="alert alert-danger">Basket empty</div>
                        <?php } ?>
                        
                    </div>
                    
                    <div class="row">
                        <a href="<?php echo site_url('event/payment/'.strtolower($bask->event_code)); ?>" class="gen-button">
                            <div class="gen-button-block">
                                <span class="gen-button-line-left"></span>
                                <span class="gen-button-text">Checkout</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section-1 End -->

    <?php 
    //$data['type'] = $type;
    
    $this->load->view('menu/main/footer'); ?>

    <!-- Back-to-Top start -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
    </div>
    <!-- Back-to-Top end -->

    <?php $this->load->view('menu/main/script'); ?>

</body>

</html>