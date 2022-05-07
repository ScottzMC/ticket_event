<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="description" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Welcome to Wee Gee Dem</title>
    <!-- Favicon -->
    <?php $this->load->view('menu/main/style'); ?>
</head>

<body>

    <?php 
    ///$data['type'] = $type;
    
    $this->load->view('menu/main/nav'); ?>

    <!-- owl-carousel Banner Start -->
    <section class="pt-0 pb-0">
        <div class="container-fluid px-0">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="gen-banner-movies">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                            data-desk_num="1" data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1"
                            data-autoplay="true" data-loop="true" data-margin="30">
                            <?php if(!empty($slider)){ foreach($slider as $slid){ ?>
                            <div class="item" style="background: url(<?php echo base_url('uploads/slider/'.$slid->image); ?>)">
                                <div class="gen-movie-contain h-100">
                                    <div class="container h-100">
                                        <div class="row align-items-center h-100">
                                            <div class="col-xl-6">
                                                <div class="gen-tag-line"><span></span></div>
                                                <div class="gen-movie-info">
                                                    <h3><?php echo $slid->title; ?></h3>
                                                </div>
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
    </section>
    <!-- owl-carousel Banner End -->
   
   <!-- owl-carousel Videos Section-1 Start -->
    <section class="gen-section-padding-2 pt-0 pb-0 home-singal-silder">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <h4 style="padding-top: 30px;" class="gen-heading-title">Videos</h4>
                </div>
            </div>
            <div class="row mt-3">
                <?php if(!empty($youtube_banner)){ foreach($youtube_banner as $youtube){} ?>
                <div style="padding-top: 30px;" class="col-lg-12">
                    <div class="gen-video-holder">
                        <iframe style="padding-bottom: 20px;" width="100%" height="550px" src="<?php echo $youtube->url; ?>?autoplay=0&mute=1&loop=1&list=<?php echo $youtube->playlist; ?>&rel=0" 
									title="<?php echo $youtube->title; ?>"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <!--<div class="gen-info-contain">
                        <div class="gen-movie-info">
                            <h3><?php echo $youtube->title; ?></h3>
                        </div>
                    </div>-->
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- owl-carousel Videos Section-1 End -->

   <!-- owl-carousel Videos Section-3 Start -->
   <?php if(!empty($status)){ foreach($status as $stat){ ?>
    <section class="gen-section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <h4 class="gen-heading-title"><?php echo $stat->category; ?></h4>
                </div>
                
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="gen-style-2">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                            data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1"
                            data-autoplay="false" data-loop="false" data-margin="30">
                            <?php 
                            //$banner = $this->db->query("SELECT title, url, image FROM banner WHERE type = 'Home' AND category_id = '$stat->id' AND currency_type = '$type' ")->result();
                            $banner = $this->db->query("SELECT title, url, image FROM banner WHERE type = 'Home' AND category_id = '$stat->id' ")->result();
                            foreach($banner as $ban){ ?>
                            <div class="item">
                                <div
                                    class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                    <div class="gen-carousel-movies-style-3 movie-grid style-3">
                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">
                                                <a target="_blank" href="<?php echo $ban->url; ?>"><img src="<?php echo base_url('uploads/banner/'.$ban->image); ?>"
                                                    alt="<?php echo $ban->title; ?>"></a>
                                                <div class="gen-movie-add">
                                                    
                                                </div>
                                            </div>
                                            <div class="gen-info-contain">
                                                <div class="gen-movie-info">
                                                    <h3><a target="_blank" href="<?php echo $ban->url; ?>"><?php echo str_replace('-', ' ', $ban->title); ?>
                                                    </a></h3>
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
    </section>
    <?php } } ?>
   <!-- owl-carousel Videos Section-3 End -->

   <!-- owl-carousel images Start 
   <section class="pt-0 gen-section-padding-2 home-singal-silder">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="gen-banner-movies">
                  <div class="owl-carousel owl-loaded owl-drag" data-dots="true" data-nav="false" data-desk_num="1"
                     data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1" data-autoplay="true"
                     data-loop="true" data-margin="30">
                     <div class="item" style="background: url('images/background/asset-20.jpeg')">
                        <div class="gen-movie-contain h-100">
                           <div class="container h-100">
                              <div class="row align-items-center h-100">
                                 <div class="col-xl-6">
                                    <div class="gen-movie-info">
                                       <h3>Command in your hand</h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <p>Streamlab is a long established fact that a reader will be distracted by the
                                          readable content of a page when Streamlab at its layout Streamlab.</p>
                                    </div>
                                    <div class="gen-movie-action">
                                       <div class="gen-btn-container">
                                          <a href="single-episode.html" class="gen-button gen-button-dark">
                                             <span class="text">Play now</span>
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
            </div>
         </div>
      </div>
   </section>
   <!-- owl-carousel images End -->

   <!-- owl-carousel Videos Section-4 Start -->
   <?php if(!empty($event)){ ?>
    <section style="margin-top: -50px;" class="gen-section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <h4 class="gen-heading-title">Recent Events</h4>
                </div>
                
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="gen-style-2">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                            data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1"
                            data-autoplay="false" data-loop="false" data-margin="30">
                            <?php foreach($event as $eve){ ?>
                            <div class="item">
                                <div
                                    class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                    <div class="gen-carousel-movies-style-3 movie-grid style-3">
                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">
                                                <img src="<?php echo base_url('uploads/events/'.$eve->image); ?>"
                                                    alt="<?php echo $eve->title; ?>">
                                                <div class="gen-movie-add">
                                                    
                                                </div>
                                            </div>
                                            <div class="gen-info-contain">
                                                <div class="gen-movie-info">
                                                    <h3><a href="<?php echo site_url('event/detail/'.strtolower($eve->code)); ?>"><?php echo str_replace('-', ' ', $eve->title); ?></a>
                                                    </h3>
                                                </div>
                                                <div class="gen-movie-meta-holder">
                                                    <ul>
                                                        <li><?php echo str_replace('-', ' ', $eve->category); ?></li>
                                                        <li>
                                                            <a href="<?php echo site_url('event/detail/'.strtolower($eve->code)); ?>"><span>View</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- #post-## -->
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
   <!-- owl-carousel Videos Section-4 End -->

    <?php $this->load->view('menu/main/footer'); ?>

    <!-- Back-to-Top start -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
    </div>
    <!-- Back-to-Top end -->

    <!-- js-min -->
    
    <?php $this->load->view('menu/main/script'); ?>

</body>

</html>