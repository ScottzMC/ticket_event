<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Welcome to Eat</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.png'); ?>">

    <?php $this->load->view('menu/eat/style'); ?>

    <!-- Use the minified version files listed below for better performance and remove the files listed above
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">-->

</head>

<style>
    .select-time {
      -webkit-tap-highlight-color: transparent;
      background-color: #fff;
      border-radius: 5px;
      border: solid 1px #e8e8e8;
      box-sizing: border-box;
      clear: both;
      cursor: pointer;
      display: block;
      float: left;
      font-family: inherit;
      font-size: 14px;
      font-weight: normal;
      height: 42px;
      line-height: 40px;
      outline: none;
      padding-left: 18px;
      padding-right: 30px;
      position: relative;
      text-align: left !important;
      -webkit-transition: all 0.2s ease-in-out;
      transition: all 0.2s ease-in-out;
      -webkit-user-select: none;
         -moz-user-select: none;
          -ms-user-select: none;
              user-select: none;
      white-space: nowrap;
      width: auto; 
      margin-top: -42px;
      margin-left: 145px;
    }
 
</style>

<body>
    
    <?php 
    $session_email = $this->session->userdata('uemail');
    ?>

    <div class="main-wrapper">
        <?php $this->load->view('menu/eat/nav'); ?>

        <div class="slider-area">
            <div class="hero-slider-active-1 nav-style-1 dot-style-2 dot-style-2-position-2 dot-style-2-active-black">
                <?php if(!empty($slider)){ foreach($slider as $slid){ ?>
                <div class="single-hero-slider single-animation-wrap slider-height-2 custom-d-flex custom-align-item-center bg-img hm2-slider-bg res-white-overly-xs" 
                style="background:url(uploads/slider/<?php echo $slid->image; ?>); -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; background-repeat: no-repeat;">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="hero-slider-content-4 slider-animated-1">
                                    <h1 class="animated" style="color: #fff;"><?php echo $slid->title; ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } }else{ echo ''; } ?>
                
            </div>
            
        </div>
        
        <?php if(!empty($menu)){ foreach($menu as $men){ ?>
        <div class="product-area pt-115 pb-80" style="margin-top: -50px;">
            <div class="container">
                <div class="section-title-tab-wrap mb-55">
                    <div class="section-title-4">
                        <h2><?php echo str_replace('-', ' ', $men->category); ?></h2>
                    </div>
                </div>
                <div class="tab-content jump">
                    
                    <div id="product-0" class="tab-pane active">
                        <div class="row">
                            
                        <?php 
                        $food = $this->db->query("SELECT * FROM food WHERE category = '$men->id' ORDER BY title ASC ")->result();
                        
                        if(!empty($food)){ foreach($food as $fod){ ?>
                        
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="single-product-wrap mb-35">
                                    <div class="product-img product-img-zoom mb-15">
                                        <img height="270" width="420" src="<?php echo base_url('uploads/food/'.$fod->image1); ?>" alt="<?php echo $fod->title; ?>">
                                    </div>
                                    <div class="product-content-wrap-2 text-center">
                                        <h3><?php echo str_replace('-', ' ', $fod->title); ?></h3>
                                        <div class="product-price-2">
                                            <span>£<?php echo $fod->price; ?></span>
                                        </div>
                                        <?php // if(!empty($session_email)){ ?>
                                        <!--<div class="pro-details-action-wrap">
                                            <div class="pro-add-to-cart">
                                                <form action="<?php echo base_url('eat/add_cart'); ?>" method="POST">
                                                    <input type="hidden" name="code" value="<?php echo $fod->code; ?>">
                                                    <input type="hidden" name="title" value="<?php echo $fod->title; ?>">
                                                    <input type="hidden" name="price" value="<?php echo $fod->price; ?>">
                                                    <input type="hidden" name="image" value="<?php echo $fod->image1; ?>">
                                                    <button type="submit" title="Add to Cart">Add To Cart</button>
                                                 </form>
                                            </div>
                                        </div>-->
                                        <?php //} ?>
                                    </div>
                                    
                                    <div class="product-content-wrap-2 product-content-position text-center">
                                        <h3>
                                            <?php echo str_replace('-', ' ', $fod->title); ?>
                                        </h3>
                                        <div class="product-price-2">
                                            <span>£<?php echo $fod->price; ?></span>
                                        </div>
                                        <?php //if(!empty($session_email)){ ?>
                                        <div class="pro-details-action-wrap">
                                            <div class="pro-add-to-cart">
                                                <form action="<?php echo base_url('eat/add_cart'); ?>" method="POST">
                                                    <input type="hidden" name="code" value="<?php echo $fod->code; ?>">
                                                    <input type="hidden" name="title" value="<?php echo $fod->title; ?>">
                                                    <input type="hidden" name="price" value="<?php echo $fod->price; ?>">
                                                    <input type="hidden" name="category" value="<?php echo $fod->category; ?>">
                                                    <input type="hidden" name="image" value="<?php echo $fod->image1; ?>">
                                                    <button type="submit" title="Add to Cart">Add To Cart</button>
                                                 </form>
                                            </div>
                                        </div>
                                        <?php //} ?>
                                    </div>
                                    
                                </div>
                            </div>
                        <?php } }else{ echo ''; } ?>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <?php } } ?>
        
        <?php $this->load->view('menu/eat/footer'); ?>
        
    </div>
    
    <?php $this->load->view('menu/eat/script'); ?>

    <script>
    var timeSlots = [];
    <?php 
    $time = strtotime('09:00');    
    for($t=0;$t<=18;$t++) { 
        $slot = date("H:i", strtotime('+'.(30*$t).' minutes', $time));
    ?>
        timeSlots[<?php echo $t;?>] = '<?php echo $slot; ?>';
    <?php } ?>
    $('#delivery_date').change(function(){
        $('#num_time').html('');
        var ddate = $(this).val();
        var todayObj = new Date();
        var ddateObj = new Date(ddate);
        var selDate = ddateObj.getMonth()+'-'+ddateObj.getDate()+'-'+ddateObj.getYear();
        var todayDate = todayObj.getMonth()+'-'+todayObj.getDate()+'-'+todayObj.getYear();
        var todayTime = todayObj.getHours() +':'+ todayObj.getMinutes();
        if(todayDate==selDate) {
            for(var t=0;t<timeSlots.length;t++) {
                if(todayTime<timeSlots[t]) {
                    $('#num_time').append($('<option>', { 
                        value: timeSlots[t],
                        text : timeSlots[t] 
                    }));
                }
            }
        }
        else if(selDate>todayDate) {
            for(var t=0;t<timeSlots.length;t++) {
                $('#num_time').append($('<option>', { 
                    value: timeSlots[t],
                    text : timeSlots[t] 
                }));
            }
        }
    });
    $('#delivery_date').trigger('change');
    </script>
</body>

</html>
