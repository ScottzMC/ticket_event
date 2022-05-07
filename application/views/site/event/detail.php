<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="description" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php foreach($detail as $det){} ?>
	<title><?php echo str_replace('-', ' ', $det->title); ?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('images/favicon.ico'); ?>">
    <?php $this->load->view('menu/main/style'); ?>
</head>

<body>

    <?php 
    //$data['type'] = $type;
    
    $this->load->view('menu/main/nav'); ?>

    <!-- Single-tv-Shows -->
    <section class="position-relative gen-section-padding-3">
        <div class="tv-single-background">
            <img src="images/background/asset-15.jpeg" alt="stream-lab-image">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="gen-tv-show-wrapper style-1">
                        <div class="gen-tv-show-top">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="gentech-tv-show-img-holder">
                                        <img src="<?php echo base_url('uploads/events/'.$det->image); ?>"
                                                    alt="<?php echo str_replace('-', ' ', $det->title); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 align-self-center">
                                    <div class="gen-single-tv-show-info">
                                        <h2 class="gen-title"><?php echo str_replace('-', ' ', $det->title); ?></h2>
                                        <div class="gen-single-meta-holder">
                                            <ul>
                                                <li><a href="<?php echo site_url('event/category/'.strtolower($det->category)); ?>">
							    <?php echo str_replace('-', ' ', $det->category); ?>
							</a></li>
                                                <!--<li>
                                                    <i class="fas fa-eye">
                                                    </i>
                                                    <span>5.5K Views</span>
                                                </li>-->
                                            </ul>
                                        </div>
                                        <p><?php echo $det->body; ?></p>
                                        <!--<div class="gen-socail-share mt-0">
                                            <h4 class="align-self-center">Social Share :</h4>
                                            <ul class="social-inner">
                                                <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                            </ul>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="gen-single-tv-show-info">
                            <div class="gen-socail-share">
                                <ul>
                                <?php 
                                $session_email = $this->session->userdata('uemail');
                                if(!empty($ticket) && !empty($session_email)){ ?>
                                <a href="<?php echo site_url('event/book/'.strtolower($det->code)); ?>" class="gen-button">
                                    <div class="gen-button-block">
                                        <span class="gen-button-line-left"></span>
                                        <span class="gen-button-text">Book Event</span>
                                    </div>
                                </a>
                                <?php }//else if(empty($session_email)){ ?>
                                <!--<a href="#" class="gen-button">
                                    <div class="gen-button-block">
                                        <span class="gen-button-line-left"></span>
                                        <span class="gen-button-text">Guest Book Event</span>
                                    </div>
                                </a>-->
                                <?php //}else if(empty($ticket)){ echo ''; } ?>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>

        </div>
    </section>
    <!-- Single-tv-Shows -->
    
    <section class="pt-0 gen-section-padding-2 home-singal-silder">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pm-inner">
                        <div class="gen-more-like">
                            <h5 class="gen-more-title">Events Requirement</h5>
                            
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="gen-style-2">
                                        <div class="gen-season-holder">
                                            <ul class="nav">
                                                <?php $age = $this->db->query("SELECT * FROM events_age WHERE event_id = '$det->id' ")->result(); ?>
                                                <?php if(!empty($age)){ ?>
                                                <li class="nav-item">
                                                    <a class="nav-link active show" data-toggle="tab" href="#age">Age</a>
                                                </li>
                                                <?php } ?>
                                                
                                                <?php $dress_code = $this->db->query("SELECT * FROM events_dress_code WHERE event_id = '$det->id' ")->result(); 
                                                if(!empty($dress_code)){
                                                ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#dress_code">Dress code</a>
                                                </li>
                                                <?php } ?>
                                                <?php $last_entry = $this->db->query("SELECT * FROM events_last_entry WHERE event_id = '$det->id' ")->result(); 
                                                if(!empty($last_entry)){
                                                ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#last_entry">Last entry</a>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                            <div class="tab-content">
                                                <?php if(!empty($age)){ ?>
                                                <div id="age" class="tab-pane active show">
                                                    <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                                                        data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1"
                                                        data-mob_sm="1" data-autoplay="false" data-loop="false" data-margin="30">
                                                        <?php 
                                            foreach($age as $ag){ ?>
                                                        <div class="item">
                                                            <div class="gen-episode-contain">
                                                                <div class="gen-episode-img">
                                                                    <img src="<?php echo base_url('uploads/events/'.$det->image); ?>" alt="stream-lab-image">
                                                                </div>
                                                                <div class="gen-info-contain">
                                                                    <div class="gen-movie-info">
                                                                    <h3><?php echo $ag->topic; ?></h3>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                
                                                <?php if(!empty($dress_code)){ ?>
                                                <div id="dress_code" class="tab-pane">
                                                    <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                                                        data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1"
                                                        data-mob_sm="1" data-autoplay="false" data-loop="false" data-margin="30"
                                                        data-rewing="false">
                                                        <?php 
                                            foreach($dress_code as $dress){ ?>
                                                        <div class="item">
                                                            <div class="gen-episode-contain">
                                                                <div class="gen-episode-img">
                                                                    <img src="<?php echo base_url('uploads/events/'.$det->image); ?>" alt="stream-lab-image">
                                                                    
                                                                </div>
                                                                <div class="gen-info-contain">
                                                                    <div class="gen-movie-info">
                                                                        <h3><?php echo $dress->topic; ?></h3>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                
                                                <?php if(!empty($last_entry)){ ?>
                                                <div id="last_entry" class="tab-pane">
                                                    <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                                                        data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1"
                                                        data-mob_sm="1" data-autoplay="false" data-loop="false" data-margin="30"
                                                        data-rewing="false">
                                                        <?php 
                                            foreach($last_entry as $last){ ?>
                                                        <div class="item">
                                                            <div class="gen-episode-contain">
                                                                <div class="gen-episode-img">
                                                                    <img src="<?php echo base_url('uploads/events/'.$det->image); ?>" alt="stream-lab-image">
                                                                    
                                                                </div>
                                                                <div class="gen-info-contain">
                                                                    <div class="gen-movie-info">
                                                                       <h3><?php echo $last->topic; ?></h3>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                
                                            </div>
                                        </div>
                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="pt-0 gen-section-padding-2 home-singal-silder">
      <div class="container">
         
         <div class="row">
                <div class="col-lg-12">
                    <div class="pm-inner">
                        <div class="gen-more-like">
                            <h5 class="gen-more-title">Available Tickets</h5>
                            <div class="row post-loadmore-wrapper">
                                <?php if(!empty($ticket) && !empty($session_email)){ foreach($ticket as $tick){ ?>
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">
                                                <img src="<?php echo base_url('uploads/events/'.$tick->image); ?>"
                                                    alt="<?php echo $tick->title; ?>">
                                            </div>
                                            <div class="gen-info-contain">
                                                <div class="gen-movie-info">
                                                    <h3><?php echo str_replace('-', ' ', $tick->title); ?></h3>
                                                    <br>
                                                    <?php //if($type == 'gbp'){ ?>
                                                    <h4>&pound;<?php echo $tick->price; ?></h4>
                                                    <?php //}else if($type == 'usd'){ ?>
                                                    <!--<h4>&dollar;<?php //echo $tick->usd; ?></h4>
                                                    <?php //}else if($type == 'shilling'){ ?>
                                                    <h4>SHL<?php //echo $tick->shilling; ?></h4>
                                                    <?php //}else if($type == "leone"){ ?>
                                                    <h4>LEO<?php //echo $tick->leone; ?></h4>
                                                    <?php //} ?>-->
                                                    <br>
                                                    <a href="<?php echo site_url('event/book/'.strtolower($det->code)); ?>" class="gen-button">
                                                        <div class="gen-button-block">
                                                            <span style="font-size: 12px;" class="gen-button-text">Book Event</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } } ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
      </div>
   </section>
   
   <section class="pt-0 gen-section-padding-2 home-singal-silder">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pm-inner">
                        <div class="gen-more-like">
                            <h5 class="gen-more-title">Our Banners</h5>
                            
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="gen-style-2">
                                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                                            data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1"
                                            data-autoplay="false" data-loop="false" data-margin="30">
                                            <?php 
                                            $banner = $this->db->query("SELECT * FROM events_banner WHERE event_id = '$det->id' ")->result();
                                            foreach($banner as $ban){ ?>
                                            <div class="item">
                                                <div
                                                    class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                                    <div class="gen-carousel-movies-style-3 movie-grid style-3">
                                                        <div class="gen-movie-contain">
                                                            <div class="gen-movie-img">
                                                                <img src="<?php echo base_url('uploads/banner/'.$ban->image); ?>"
                                                                    alt="<?php echo $ban->topic; ?>">
                                                                <div class="gen-movie-add">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="gen-info-contain">
                                                                <div class="gen-movie-info">
                                                                    <h3><?php echo $ban->topic; ?>
                                                                    </h3>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="pt-0 gen-section-padding-2 home-singal-silder">
        <div class="container">
            <div class="row">
                <?php if($det->video == "none" || $det->video == ""){ echo ''; }else{ ?>
                <div class="col-lg-12">
                    <div class="pm-inner">
                        <div class="gen-more-like">
                            <h5 class="gen-more-title">Video</h5>
                            <div class="gen-video-holder">
                                <iframe width="100%" height="550px" src="<?php echo $det->video; ?>?autoplay=0&mute=1"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    
    <section class="pt-0 gen-section-padding-2 home-singal-silder">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pm-inner">
                        <div class="gen-more-like">
                            <h5 class="gen-more-title">Venue</h5>
                            <div class="gen-banner-movies">
                                <div class="owl-carousel owl-loaded owl-drag" data-dots="true" data-nav="false"
                                    data-desk_num="1" data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1"
                                    data-autoplay="true" data-loop="true" data-margin="30">
                                    <?php 
                                    if(!empty($venue)){ foreach($venue as $ven){} ?>
                                    <div class="item" style="background: url(<?php echo base_url('uploads/venue/'.$ven->image1); ?>)">
                                        <div class="gen-movie-contain h-100">
                                            <div class="container h-100">
                                                <div class="row align-items-center h-100">
                                                    <div class="col-xl-12">
                                                        <div class="gen-movie-info">
                                                            <h3><?php echo $ven->title; ?></h3>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="pt-0 gen-section-padding-2 home-singal-silder">
        <div class="container">
            <div class="row">
                <?php if(!empty($ven->maps)){ ?>
                <div class="col-lg-12">
                    <div class="pm-inner">
                        <div class="gen-more-like">
                            <h5 class="gen-more-title">Map</h5>
                            <div class="gen-video-holder">
                                <iframe src="<?php echo $ven->maps; ?>" 
        						width="700" height="450" style="border:0;" 
        						allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else if(empty($ven->maps) || $ven->maps == "none" || $ven->maps == ""){ echo ''; } ?>
            </div>
        </div>
    </section>
    
    <section class="pt-0 gen-section-padding-2 home-singal-silder">
      <div class="container">
         
         <div class="row">
                <div class="col-lg-12">
                    <div class="pm-inner">
                        <div class="gen-more-like">
                            <h5 class="gen-more-title">More Like This</h5>
                            <div class="row post-loadmore-wrapper">
                                <?php if(!empty($related_events)){ foreach($related_events as $rel_eve){ ?>
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">
                                                <img src="<?php echo base_url('uploads/events/'.$rel_eve->image); ?>"
                                                    alt="<?php echo $rel_eve->title; ?>">
                                            </div>
                                            <div class="gen-info-contain">
                                                <div class="gen-movie-info">
                                                    <h3><a href="<?php echo site_url('event/detail/'.strtolower($rel_eve->code)); ?>"><?php echo str_replace('-', ' ', $rel_eve->title); ?></a></h3>
                                                </div>
                                                <div class="gen-movie-meta-holder">
                                                    <ul>
                                                        <li><?php echo $rel_eve->category; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } } ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
      </div>
   </section>

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