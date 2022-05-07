<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="description" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Book Event</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('images/favicon.ico'); ?>">
    <?php $this->load->view('menu/main/style'); ?>
</head>

<body>
    <?php 
    //$data['type'] = $type;
    
    $this->load->view('menu/main/nav'); ?>
    
    <?php 
    $session_email = $this->session->userdata('uemail');
    foreach($ticket as $tick){}  
    
    ?>
    
    <style>
        .timer {
        /* text-align: center; */
        border: 5px solid #3f9fff;
        display:inline;
        padding: 5px;
        color: #3f9fff;
        font-family: Verdana, sans-serif, Arial;
        font-size: 40px;
        font-weight: bold;
        text-decoration: none;
    }
    </style>
    
    <section class="position-relative pb-0">
        <div class="gen-register-page-background" style="background-image: url('images/background/asset-54.jpg');">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form id="pms_register-form" class="pms-form" action="<?php echo base_url('event/add_cart/'.strtolower($tick->event_code)); ?>" method="POST">
                            <h4>Book Event - <!--<div id="ten-countdown" class="timer"></div>--></h4>

                            <ul class="pms-form-fields-wrapper pl-0">
                                <li class="pms-field pms-user-login-field ">
                                    <label for="pms_user_login">FullName *</label>
                                    <input id="pms_user_login" name="fullname" type="text" value="" required>
                                </li>
                                <li class="pms-field pms-user-email-field ">
                                    <label for="pms_user_email">E-mail Address *</label>
                                    <br>
                                    <!--<input id="pms_user_email" name="email" type="email" value="<?php echo $session_email; ?>" required>-->
                                    <p><?php echo $session_email; ?></p>
                                </li>
                                <li class="pms-field pms-field-subscriptions">
                                    <?php if(!empty($ticket)){ foreach($ticket as $tick){ ?>
                                    <div class="pms-subscription-plan">
                                        <?php if($tick->quantity > 0){ ?>
                                        <input type="hidden" name="ticket_id" value="<?php echo $tick->id; ?>">
                                        <input type="hidden" name="code" value="<?php echo $tick->code; ?>">
                                        <input type="hidden" name="event_code" value="<?php echo $tick->event_code; ?>">
                                        <input type="hidden" name="title" value="<?php echo $tick->title; ?>">
                                        <input type="hidden" name="image" value="<?php echo $tick->image; ?>">
                                        <label>
                                                <span
                                                class="pms-subscription-plan-name"><?php echo str_replace('-', ' ', $tick->title); ?>
                                                <input class="form-control" type="number" name="quantity" value="1">
                                                </span>
                                                <span
                                                class="pms-subscription-plan-price">
                                                    <span class="pms-divider"> / <span
                                                    class="pms-subscription-plan-currency">&pound;</span>
                                                </span>
                                                <input class="form-control" type="hidden" name="price" value="<?php echo $tick->price; ?>">
                                                <span class="pms-subscription-plan-price-value"><?php echo $tick->price; ?></span>
                                                </span>
                                                    <span
                                                class="pms-subscription-plan-trial"></span>
                                                <span
                                                class="pms-subscription-plan-sign-up-fee"></span>
                                        </label>
                                        <?php }else{ ?>
                                        <h6 style="color: #fff; font-size: 18px;"><?php echo $tick->title; ?> / &pound;<?php echo $tick->price; ?> <span class="text-danger">(Sold Out)</span></h6>
                                        <?php } ?>
                                     </div>
                                    <?php } } ?>
                                </li>
                                
                            </ul>
                            
                            <input name="submit" type="submit" value="Add to Cart">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Back-to-Top start -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
    </div>
    <!-- Back-to-Top end -->
    
    <?php 
    //$data['type'] = $type;
    
    $this->load->view('menu/main/footer'); ?>
    
    <script>
    function countdown(elementName, minutes, seconds){
        var element, endTime, hours, mins, msLeft, time;
    
        function twoDigits(n){
            return (n <= 9 ? "0" + n : n);
        }
    
        function updateTimer(){
            msLeft = endTime - (+new Date);
            if (msLeft < 1000){
                element.innerHTML = "Time is up!";
            }else {
                time = new Date( msLeft );
                hours = time.getUTCHours();
                mins = time.getUTCMinutes();
                element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
                setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
            }
        }
    
        element = document.getElementById( elementName );
        endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
        updateTimer();
    }

    countdown( "ten-countdown", 10, 0 );
    </script>

    <?php $this->load->view('menu/main/script'); ?>

</body>

</html>