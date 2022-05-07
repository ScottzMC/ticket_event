<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="description" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php if(!empty($category)){ foreach($category as $cat){} ?>
   <title><?php echo $cat->category; ?></title>
   <?php }else{ ?>
   <title>No Result</title>
   <?php } ?>
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
                            <?php if(!empty($cat->category)){ ?>
                            <h1>
                                <?php echo $cat->category; ?>
                            </h1>
                            <?php } ?>
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
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <?php //}else{ ?>
                                <li class="breadcrumb-item"><a href="<?php echo site_url('home'); ?>"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <?php //} ?>-->
                                
                               <?php if(!empty($cat->category)){ ?>
                               <li class="breadcrumb-item active">
                                  <a href="<?php echo site_url('event/category/'.strtolower($cat->category)); ?>"><?php echo $cat->category; ?></a>
                               </li>
                               <?php }else{ ?>
                               <li><a>No result</a></li>
                               <?php } ?>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- Section-1 Start -->
    <section class="gen-section-padding-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <?php if(!empty($category)){ foreach($category as $cat){ ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                <div class="gen-movie-contain">
                                    <div class="gen-movie-img">
                                        <img src="<?php echo base_url('uploads/events/'.$cat->image); ?>"
                                                    alt="<?php echo $cat->title; ?>">
                                    </div>
                                    <div class="gen-info-contain">
                                        <div class="gen-movie-info">
                                            <h3><a href="<?php echo site_url('event/detail/'.strtolower($cat->code)); ?>"><?php echo str_replace('-', ' ', $cat->title); ?></a></h3>
                                        </div>
                                        <div class="gen-movie-meta-holder">
                                            <ul>
                                                <li><?php echo $cat->category; ?></li>
                                                <li>
                                                    <a href="<?php echo site_url('event/detail/'.strtolower($cat->code)); ?>"><span>View</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } } ?>
                        
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="gen-pagination">
                        <?php echo $this->pagination->create_links(); ?>
                        <!--<nav aria-label="Page navigation">
                            <ul class="page-numbers">
                                <li><span aria-current="page" class="page-numbers current">1</span></li>
                                <li><a class="page-numbers" href="#">2</a></li>
                                <li><a class="page-numbers" href="#">3</a></li>
                                <li><a class="next page-numbers" href="#">Next page</a></li>
                            </ul>
                        </nav>-->
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