<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="description" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login || Ticket Event</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('images/favicon.ico'); ?>">
    <?php $this->load->view('menu/main/style'); ?>
</head>

<body>

    <!-- Log-in  -->
    <section class="position-relative pb-0">
        <!--<div class="gen-login-page-background" style="background-image: url('images/background/asset-54.jpg');"></div>-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form name="pms_login" id="pms_login" action="<?php echo base_url('login'); ?>" method="POST">
                            <h4>Sign In</h4>
                            <p class="login-username">
                                <label for="user_login">Email Address</label>
                                <input type="email" name="email" id="user_login" class="input">
                            </p>
                            <p class="login-password">
                                <label for="user_pass">Password</label>
                                <input type="password" name="password" id="user_pass" class="input" value="" size="20">
                            </p>
                            <p class="login-remember">
                                <label>
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember
                                    Me </label>
                            </p>
                            <p class="login-submit">
                                <input type="submit" name="login" id="wp-submit" class="button button-primary"
                                    value="Log In">
                            </p>
                            <a
                                href="<?php echo site_url('register'); ?>">Register</a> | <a href="<?php echo site_url('forgot_password'); ?>">Forgot your
                                password?</a>
                        </form>
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

    <?php $this->load->view('menu/main/script'); ?>

</body>

</html>