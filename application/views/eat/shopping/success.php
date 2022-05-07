<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Successful Order || Eat</title>
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
        
        <?php if(!empty($order_item)){ foreach($order_item as $order){} ?>
        <div class="cart-main-area pt-115 pb-120">
            <div class="container">
                <h3 class="cart-page-title">Hi <?php echo $order->firstname; ?> <?php echo $order->lastname; ?>, Order was Successful</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#">
                            <div class="table-content table-responsive cart-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Seat</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Unit Price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($order_item as $order){ ?>
                                        <tr>
                                            <td class="product-name"><?php echo $order->order_id; ?></td>
                                            <td class="product-name"><?php echo $order->seating; ?></td>
                                            <td class="product-thumbnail">
                                                <a href="#"><img height="112" width="98" src="<?php echo base_url('uploads/food/'.$order->image); ?>" alt="<?php echo $order->title; ?>"></a>
                                            </td>
                                            <td class="product-name">
                                                <b><?php echo str_replace('-', ' ', $order->title); ?></b>
                                            </td>
                                            <td class="product-price-cart"><span class="amount"><b>£<?php echo $order->price; ?></b></span></td>
                                            <td class="product-quantity pro-details-quality">
                                                <span class="amount"><b>£<?php echo $order->quantity; ?></b></span>
                                            </td>
                                            <td class="product-subtotal"><b>£<?php $total = $order->quantity * $order->price; echo $total; ?></b></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </form>
                        
                        <br><br>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
        <?php } ?>
        
        <?php $this->load->view('menu/eat/footer'); ?>
        
    </div>

    <?php $this->load->view('menu/eat/script'); ?>

</body>

</html>
