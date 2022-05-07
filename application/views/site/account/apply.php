<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="description" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Apply for a Business Account || Ticket Event</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('images/favicon.ico'); ?>">
    <?php $this->load->view('menu/main/style'); ?>
</head>

<body>

    <!-- Log-in  -->
    <section class="position-relative pb-0">
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form name="pms_login" id="pms_login" action="<?php echo base_url('apply'); ?>" method="POST">
                            <h4>Sign In</h4>
                            <p class="login-username">
                                <label for="user_login">First Name</label>
                                <input type="text" name="firstname" class="input">
                            </p>
                            <p class="login-username">
                                <label for="user_login">Last Name</label>
                                <input type="text" name="lastname" class="input">
                            </p>
                            <p class="login-username">
                                <label for="user_login">Email Address</label>
                                <input type="email" name="email" class="input">
                            </p>
                            <p class="login-password">
                                <label for="user_pass">Password</label>
                                <input type="password" name="password" class="input" value="">
                            </p>
                            <p class="login-password">
                                <label for="user_pass">Company</label>
                                <input type="text" name="company" class="input">
                            </p>
                            <p class="login-submit">
                                <input type="submit" name="register" id="wp-submit" class="button button-primary"
                                    value="Register">
                            </p>
                        </form>
                        <?php
                        	echo $this->session->flashdata('msg');
                        	echo $this->session->flashdata('msgError');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Log-in  -->

    <!-- Back-to-Top start -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
    </div>
    <!-- Back-to-Top end -->

    <!-- js-min -->
    <?php $this->load->view('menu/main/script'); ?>

</body>

</html>