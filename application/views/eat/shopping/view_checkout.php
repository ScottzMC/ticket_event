<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shopping Checkout || Eat</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.png'); ?>">

    <?php $this->load->view('menu/eat/style'); ?>

</head>

<body>
    
    <div class="main-wrapper">
        <?php $this->load->view('menu/eat/nav'); ?>
        
        <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="<?php echo site_url('eat'); ?>">Home</a>
                        </li>
                        <li class="active">Shopping Checkout </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="checkout-main-area pt-120 pb-120">
            <div class="container">
                
                <?php
                $cart_total = $this->cart->total();
                
                $session_firstname = $this->session->userdata('ufirstname');
                $session_lastname = $this->session->userdata('ulastname');
                $session_email = $this->session->userdata('uemail');
                
                ?>
                
                <div class="checkout-wrap pt-30">
                  <form action="<?php echo base_url('eat/place_order'); ?>" method="POST">
                    <div class="row">
                        <?php if(!empty($session_email)){ ?>
                        <div class="col-lg-7">
                            <div class="billing-info-wrap mr-50">
                                <h3>Billing Details</h3>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20">
                                            <label>First Name <abbr class="required" title="required">*</abbr></label>
                                            <?php if(!empty($session_firstname)){ ?>
                                            <input type="text" name="firstname" value="<?php echo $session_firstname; ?>" required>
                                            <?php }else{ ?>
                                            <input type="text" name="firstname" required>
                                            <?php } ?>
                                            <span class="text-danger" style="color: red;"><?php echo form_error('firstname'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20">
                                            <label>Last Name <abbr class="required" title="required">*</abbr></label>
                                            <?php if(!empty($session_lastname)){ ?>
                                            <input type="text" name="lastname" value="<?php echo $session_lastname; ?>" required>
                                            <?php }else{ ?>
                                            <input type="text" name="lastname" required>
                                            <?php } ?>
                                            <span class="text-danger" style="color: red;"><?php echo form_error('lastname'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-6">
                                        <div class="billing-info mb-20">
                                            <label>Seating <abbr class="required" title="required">*</abbr></label>
                                            <select class="form-control" name="seating">
                                                <option>Select</option>
                                                <?php if(!empty($seating)){ foreach($seating as $seat){ ?>
                                                <option value="<?php echo $seat->category; ?>"><?php echo $seat->category; ?></option>
                                                <?php } } ?>
                                            </select>
                                            <span class="text-danger" style="color: red;"><?php echo form_error('seating'); ?></span>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="additional-info-wrap">
                                    <label>Order notes</label>
                                    <textarea name="order_notes" placeholder="Notes about your order, e.g. special notes for delivery." required>none</textarea>
                                    <span class="text-danger" style="color: red;"><?php echo form_error('order_notes'); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="alert alert-danger">Please Login or Create an Account to Place an order</div>
                        <?php } ?>
                        
                        <div class="col-lg-5">
                            <div class="your-order-area">
                                <h3>Your order</h3>
                                <div class="your-order-wrap gray-bg-4">
                                    <div class="your-order-info-wrap">
                                        <div class="your-order-info">
                                            <ul>
                                                <li>Food <span>Total</span></li>
                                            </ul>
                                        </div>
                                        <div class="your-order-middle">
                                            <ul>
                                                <div><?php echo $message; ?></div>
                                                  <?php if ($cart = $this->cart->contents()): ?>
                                                  <?php $grand_total = 0; $i = 1; ?>
                                                  <?php foreach($cart as $item):
                                                      $check = array_slice(explode(',', $item['image']), 0, 1);
                                
                                                      foreach($check as $image) {
                                                         $image;
                                                      }
                                                   ?>
                                                  <?php echo form_open('eat/update_cart'); ?>
                                                  <?php
                                                    echo form_hidden('cart['. $item['id'] .'][id]', $item['id']);
                                                    echo form_hidden('cart['. $item['id'] .'][rowid]', $item['rowid']);
                                                    echo form_hidden('cart['. $item['id'] .'][price]', $item['price']);
                                                    echo form_hidden('cart['. $item['id'] .'][qty]', $item['qty']);
                                                  ?>
                                                  <li><?php echo str_replace('-', ' ', $item['name']); ?> X <?php echo $item['qty']; ?> <span>£<?php echo $item['price']; ?> </span></li>
                                                 <?php form_close(); ?>
                                                <?php endforeach; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        
                                        <?php
                                        $cart_total = $this->cart->total();
                                        
                                        /*$query = $this->db->query("SELECT DISTINCT id, code, percent FROM temp_discount")->result(); 
                                        foreach($query as $qry){
                                            $current_voucher = $qry->code;
                                            $voucher_id = $qry->id;
                                            $current_voucher_percent = $qry->percent;
                                        }
                                        
                                        $sequel = $this->db->query("SELECT DISTINCT code FROM discount")->result(); 
                                        foreach($sequel as $sql){
                                            $discount = $sql->code;
                                        }*/
                                        
                                        ?>
                                        

                                        <div class="your-order-info order-shipping">
                                            <ul>
                                                <?php /*if(!empty($query) && $current_voucher == $discount){ ?>
                                                <?php $discount_price = $current_voucher_percent/100 * $cart_total;*/ ?>
                                                <!--<li>Total (via voucher) <span>£< ?php echo $this->cart->total() - $discount_price; ?></span></li>-->
                                                <?php //}else{ ?>
                                                <li>Total <span>£<?php echo $this->cart->total(); ?></span></li>
                                                <?php //} ?>
                                            </ul>
                                        </div>
                                        
                                    
                                    <script>
                                        function deleteVoucher(id){
                                        var del_id = id;
                                        if(confirm("Are you sure you want to remove this discount code")){
                                        $.post('<?php echo base_url('eat/destroy_voucher'); ?>', {"del_id": del_id}, function(data){
                                          location.reload();
                                          $('#cte').html(data)
                                          });
                                        }
                                      }
                                    </script>
                                    <p id='cte'></p>
                                    
                                    <div class="your-order-info order-shipping">
                                        <?php if(!empty($query)){ ?>
                                        <ul>
                                            <li><?php echo $current_voucher; ?> 
                                                <p>
                                                    <button type="button" onclick="deleteVoucher(<?php echo $voucher_id; ?>)" class="cart-btn-2">Remove Voucher</button> 
                                                </p>
                                            </li>
                                        </ul>
                                        <?php }else{ echo ''; } ?>
                                    </div>
                                </div>
                                
                                <?php if(!empty($session_email)){ ?>
                                <div class="Place-order">
                                    <button type="submit" name="order">Place Order</button>
                                </div>
                                <?php }else{ ?>
                                <div class="alert alert-danger">Login or Create an Account to Place an Order</div>
                                <?php } ?>
                            </div>
                        </div>
                        
                    </div>
                    </form>
                    
                    <?php
                    	echo $this->session->flashdata('msg');
                    	echo $this->session->flashdata('msgError');
                    ?>
                </div>
            </div>
        </div>
        
        <?php $this->load->view('menu/eat/footer'); ?>
        
    </div>

    <?php $this->load->view('menu/eat/script'); ?>
    
    <script>
        $(function(){
            var dtToday = new Date();
            
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();
            
            var maxDate = year + '-' + month + '-' + day;
        
            // or instead:
            // var maxDate = dtToday.toISOString().substr(0, 10);
        
            //alert(maxDate);
            $('#txtDate').attr('min', maxDate);
        });
    </script>

</body>

</html>