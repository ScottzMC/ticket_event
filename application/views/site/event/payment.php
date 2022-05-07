<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="description" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ticket Payment || Ticket Event</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('images/favicon.ico'); ?>">
    <?php $this->load->view('menu/main/style'); ?>
</head>

<body>
    <?php 
    //$data['type'] = $type;
    
    $this->load->view('menu/main/nav'); ?>
    
    <?php foreach($ticket as $tick){}?>

    <section class="position-relative pb-0">
        <div class="gen-register-page-background" style="background-image: url('images/background/asset-54.jpg');">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form id="payment-form" role="form" class="require-validation" action="<?php echo base_url('event/stripe_post/'.$tick->event_code); ?>" method="post" data-cc-on-file="false" data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>">
                            <?php $session_email = $this->session->userdata('uemail'); ?>
                            <h4>Payment Details</h4>
                            
                            <ul class="pms-form-fields-wrapper pl-0">
                                <li>
                                    <label for="">Name on Card *</label>
                                    <input class="form-control" type="text" name="fullname">
                                </li>
                                <li>
                                    <label for="">Card Number *</label>
                                    <input class="card-number form-control" size='20' type='number' step="1" oninput="format_card_number(this)">
                                </li>
                                <li>
                                    <label for="">CVC *</label>
                                    <input id="" autocomplete="off" class="card-cvc" placeholder="311" size="4" type='number' step="1" oninput="format_cvc(this)">
                                </li>
                                <li class="">
                                    <label for="">Expiration Month *</label>
                                    <input id="" autocomplete="off" class="card-expiry-month" placeholder="MM" size="2" type='number' step="1" oninput="format_exp_month(this)">
                                </li>
                                <li class="">
                                    <label for="">Expiration Year *</label>
                                    <input id="" autocomplete="off" class="card-expiry-year" placeholder="YYYY" size="4" type='number' step="1" oninput="format_exp_year(this)">
                                </li>
                                
                                <?php 
                                //if($type == 'gbp'){
                                $booking = $this->db->query("SELECT price, quantity FROM ticket_basket WHERE email = '$tick->email' ")->result();
                                foreach($booking as $book){
                                    $quantity = $book->quantity;
                                    $price = $book->price;
                                    $gbp_total = $price * $quantity;
                                }
                                ?>
                                
                                <li>
                                    <label for="">Total</label>
                                    <p>&pound;<?php echo $gbp_total; ?></p>
                                </li>
                                <?php //}else if($type == 'usd'){
                                $booking = $this->db->query("SELECT usd, quantity FROM ticket_basket WHERE email = '$tick->email' ")->result();
                                foreach($booking as $book){
                                    $quantity = $book->quantity;
                                    $price = $book->usd;
                                    $usd_total = $price * $quantity;
                                }
                                ?>
                                
                                <!--<li>
                                    <label for="">Total</label>
                                    <p>&dollar;<?php echo $usd_total; ?></p>
                                </li>
                                
                                <?php /*}else if($type == 'shilling'){
                                $booking = $this->db->query("SELECT shilling, quantity FROM ticket_basket WHERE email = '$tick->email' ")->result();
                                foreach($booking as $book){
                                    $quantity = $book->quantity;
                                    $price = $book->shilling;
                                    $shil_total = $price * $quantity;
                                }
                                ?>
                                
                                <li>
                                    <label for="">Total</label>
                                    <p>SHL<?php echo $shil_total; ?></p>
                                </li>
                                <?php }else if($type == 'leone'){
                                $booking = $this->db->query("SELECT leone, quantity FROM ticket_basket WHERE email = '$tick->email' ")->result();
                                foreach($booking as $book){
                                    $quantity = $book->quantity;
                                    $price = $book->leone;
                                    $leon_total = $price * $quantity;
                                }*/
                                ?>
                                
                                <li>
                                    <label for="">Total</label>
                                    <p>LEO<?php echo $leon_total; ?></p>
                                </li>-->
                                <?php //} ?>
                            </ul>
                            
                            <?php //if($type == 'gbp'){ ?>
                            <input type="hidden" name="ticket_id" value="<?php echo $tick->id; ?>">
                            <input type="hidden" name="code" value="<?php echo $tick->code; ?>">
                            <input type="hidden" name="fullname" value="<?php echo $tick->fullname; ?>">
                            <input type="hidden" name="email" value="<?php echo $tick->email; ?>">
                            <input type="hidden" name="title" value="<?php echo $tick->title; ?>">
                            <input type="hidden" name="price" value="<?php echo $tick->price; ?>">
                            <input type="hidden" name="quantity" value="<?php echo $tick->quantity; ?>">
                            <input type="hidden" name="event_code" value="<?php echo $tick->event_code; ?>">
                            <input type="hidden" name="total" value="<?php echo $gbp_total; ?>">
                            
                            <?php /*}else if($type == 'usd'){ ?>
                            <input type="hidden" name="ticket_id" value="<?php echo $tick->id; ?>">
                            <input type="hidden" name="code" value="<?php echo $tick->code; ?>">
                            <input type="hidden" name="fullname" value="<?php echo $tick->fullname; ?>">
                            <input type="hidden" name="email" value="<?php echo $tick->email; ?>">
                            <input type="hidden" name="title" value="<?php echo $tick->title; ?>">
                            <input type="hidden" name="price" value="<?php echo $tick->usd; ?>">
                            <input type="hidden" name="quantity" value="<?php echo $tick->quantity; ?>">
                            <input type="hidden" name="event_code" value="<?php echo $tick->event_code; ?>">
                            <input type="hidden" name="total" value="<?php echo $usd_total; ?>">
                            
                            <?php }else if($type == 'shilling'){ ?>
                            <input type="hidden" name="ticket_id" value="<?php echo $tick->id; ?>">
                            <input type="hidden" name="code" value="<?php echo $tick->code; ?>">
                            <input type="hidden" name="fullname" value="<?php echo $tick->fullname; ?>">
                            <input type="hidden" name="email" value="<?php echo $tick->email; ?>">
                            <input type="hidden" name="title" value="<?php echo $tick->title; ?>">
                            <input type="hidden" name="price" value="<?php echo $tick->shilling; ?>">
                            <input type="hidden" name="quantity" value="<?php echo $tick->quantity; ?>">
                            <input type="hidden" name="event_code" value="<?php echo $tick->event_code; ?>">
                            <input type="hidden" name="total" value="<?php echo $shil_total; ?>">
                            
                            <?php }else if($type == 'leone'){ ?>
                            <input type="hidden" name="ticket_id" value="<?php echo $tick->id; ?>">
                            <input type="hidden" name="code" value="<?php echo $tick->code; ?>">
                            <input type="hidden" name="fullname" value="<?php echo $tick->fullname; ?>">
                            <input type="hidden" name="email" value="<?php echo $tick->email; ?>">
                            <input type="hidden" name="title" value="<?php echo $tick->title; ?>">
                            <input type="hidden" name="price" value="<?php echo $tick->leone; ?>">
                            <input type="hidden" name="quantity" value="<?php echo $tick->quantity; ?>">
                            <input type="hidden" name="event_code" value="<?php echo $tick->event_code; ?>">
                            <input type="hidden" name="total" value="<?php echo $leon_total; ?>">
                            <?php }*/ ?>
                            
                            <input type="submit" value="Purchase Ticket" style="margin-bottom: 30px;">
                            <br>
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
    
    <?php $this->load->view('menu/main/script'); ?>
    
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
    <script type="text/javascript">
    $(function(){
        var $form = $(".require-validation");
        
        $('form.require-validation').bind('submit', function(e){
            var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 
                            'input[type=password]',
                            'input[type=text]', 
                            'input[type=file]',
                             'textarea'].join(', '),
    
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
    
        $inputs.each(function(i, el){
          var $input = $(el);
          
          if($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
    
        if(!$form.data('cc-on-file')){
            e.preventDefault();
            
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }
      });
    
      function stripeResponseHandler(status, response){
        if(response.error){
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        }else{
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    
       }
    
    });
    
    function format_card_number(input){
        if(input.value < 0) input.value=Math.abs(input.value);
        if(input.value.length > 16) input.value = input.value.slice(0, 16);
        $(input).blur(function() {
           // if(input.value.length == 1) input.value=0+input.value;
           // if(input.value.length == 0) input.value='01';
           //* if you want to allow insert only 2 digits *//
        });
    }
    
    function format_cvc(input){
        if(input.value < 0) input.value=Math.abs(input.value);
        if(input.value.length > 4) input.value = input.value.slice(0, 4);
        $(input).blur(function() {
           // if(input.value.length == 1) input.value=0+input.value;
           // if(input.value.length == 0) input.value='01';
           //* if you want to allow insert only 2 digits *//
        });
    }
    
    function format_exp_month(input){
        if(input.value < 0) input.value=Math.abs(input.value);
        if(input.value.length > 2) input.value = input.value.slice(0, 2);
        $(input).blur(function() {
           // if(input.value.length == 1) input.value=0+input.value;
           // if(input.value.length == 0) input.value='01';
           //* if you want to allow insert only 2 digits *//
        });
    }
    
    function format_exp_year(input){
        if(input.value < 0) input.value=Math.abs(input.value);
        if(input.value.length > 4) input.value = input.value.slice(0, 4);
        $(input).blur(function() {
           // if(input.value.length == 1) input.value=0+input.value;
           // if(input.value.length == 0) input.value='01';
           //* if you want to allow insert only 2 digits *//
        });
    }
    
    </script>

</body>

</html>