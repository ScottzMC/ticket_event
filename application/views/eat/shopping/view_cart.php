<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shopping Cart || Eat</title>
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
                        <li class="active">Shopping Cart </li>
                    </ul>
                </div>
            </div>
        </div>
        
          <script>
            // Update item quantity
            function updateCartItem(obj, rowid){
                $.get("<?php echo base_url('eat/updateItemQty'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
                    window.location.href="<?php echo site_url('eat/view_cart'); ?>";
                    /*if(resp == 'ok'){
                        location.reload();
                    }else{
                        alert('Cart update failed, please try again.');
                    }*/
                });
            }
           </script>

        <div class="cart-main-area pt-115 pb-120">
            <div class="container">
                <h3 class="cart-page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="table-content table-responsive cart-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Until Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <div><?php echo $message; ?></div>
                                        <?php if ($cart = $this->cart->contents()): ?>
                                          <?php $grand_total = 0; $i = 1; ?>
                                          <?php foreach($cart as $item):
                                              $check = array_slice(explode(',', $item['image']), 0, 1);
                        
                                              foreach($check as $image) {
                                                 $image;
                                              }
                                           ?>
                                          <?php
                                            echo form_hidden('cart['. $item['id'] .'][id]', $item['id']);
                                            echo form_hidden('cart['. $item['id'] .'][rowid]', $item['rowid']);
                                            echo form_hidden('cart['. $item['id'] .'][price]', $item['price']);
                                            echo form_hidden('cart['. $item['id'] .'][qty]', $item['qty']);
                                          ?>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img height="112" width="98" src="<?php echo base_url('uploads/food/'.$image); ?>" alt="<?php echo $item['name']; ?>"></a>
                                            </td>
                                            <td class="product-name">
                                                <a href="#">
                                                    <?php echo str_replace('-', ' ', $item['name']); ?> 
                                                </a>
                                            </td>
                                            <td class="product-price-cart"><span class="amount">£<?php echo $item['price']; ?> </span></td>
                                            <td class="product-quantity pro-details-quality">
                                                <input type="number" style="height: 50px; text-align: center; " class="" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>                                            </td>
                                            <td class="product-subtotal">£<?php echo $item['subtotal']; ?></td>
                                            <td class="product-remove">
                                                <a href="<?php echo site_url('eat/remove_cart/'.$item['rowid']); ?>"><i class="icon_close"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="<?php echo site_url('eat'); ?>">Continue Shopping</a>
                                        </div>
                                        <div class="cart-clear">
                                            <button type="button" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')">Update Cart</button>
                                            <a href="<?php echo site_url('eat/clear'); ?>">Clear Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="row">
                            
                            <div class="col-lg-4 col-md-12">
                                <div class="grand-totall">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
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
                                    <?php /*if(!empty($query) && $current_voucher == $discount){ ?>
                                    <?php $discount_price = $current_voucher_percent/100 * $cart_total;*/ ?>
                                    <!--<h5>Total (via voucher) <span>£< ?php echo $this->cart->total() - $discount_price; ?></span></h5>-->
                                    <?php //}else{ ?>
                                    <h5>Total <span>£<?php echo $this->cart->total(); ?></span></h5>
                                    <?php //} ?>
                                    <!--<form action="<?php echo base_url('eat/view_cart'); ?>" method="post">
                                    <button type="submit" name="submit">Proceed to Checkout</button>
                                    </form>-->
                                    <a href="<?php echo site_url('eat/checkout'); ?>">Checkout</a>
                                </div>
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
                            
                            <!--<div class="col-lg-4 col-md-12">
                                <div class="grand-totall">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gary-cart">Voucher</h4>
                                    </div>
                                    <?php if(!empty($query)){ ?>
                                    <h5><?php echo $current_voucher; ?></h5>
                                    <button type="button" onclick="deleteVoucher(<?php echo $voucher_id; ?>)" class="cart-btn-2">Remove Voucher</button>
                                    <?php }else{ echo ''; } ?>
                                </div>
                            </div>-->
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('menu/eat/footer'); ?>
        
    </div>

    <?php $this->load->view('menu/eat/script'); ?>

</body>

</html>