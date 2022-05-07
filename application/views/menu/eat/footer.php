        <footer class="footer-area pb-65">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="contact-info-wrap">
                            <!--<div class="footer-logo">
                                <a href="#"><img src="<?php echo base_url('assets/images/wee-logo.png'); ?>" alt="logo"></a>
                            </div>-->
                            <div class="single-contact-info">
                                <span>Our Location</span>
                                <p>Afrique De Lick, Shepherds Bush Bus Garage, W12 8DA</p>
                            </div>
                            <div class="single-contact-info">
                                <span>24/7 hotline:</span>
                                <p>07835 959628</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-right-wrap">
                            <div class="footer-menu">
                                <nav>
                                    <ul>
                                        <!--<li><a class="active" href="<?php echo site_url('home'); ?>">HOME </a></li>-->
                                        <?php if($this->session->userdata('urole') == 'Admin'){ ?>
                                        <li><a style="font-size: 16px;" href="<?php echo site_url('admin/dashboard'); ?>">Admin</a></li>
                                        <li><a style="font-size: 16px;" href="<?php echo site_url('logout'); ?>">Logout </a></li>
                                    <?php }else if($this->session->userdata('urole') == 'Kitchen'){ ?>
                                        <li><a style="font-size: 16px;" href="<?php echo site_url('kitchen/dashboard'); ?>">Kitchen</a></li>
                                        <li><a style="font-size: 16px;" href="<?php echo site_url('logout'); ?>">Logout </a></li>
                                    <?php }else if($this->session->userdata('urole') == 'User'){?>
                                        <li><a style="font-size: 16px;" href="<?php echo site_url('profile/dashboard'); ?>">Profile</a></li>
                                        <li><a style="font-size: 16px;" href="<?php echo site_url('logout'); ?>">Logout </a></li>
                                    <?php }else{ ?>
                                        <li><a style="font-size: 16px;" href="<?php echo site_url('login'); ?>">Login </a></li>
                                        <li><a style="font-size: 16px;" href="<?php echo site_url('register'); ?>">Register </a></li>
                                    <?php } ?>
                                    </ul>
                                </nav>
                            </div>
                            <div class="social-style-2 social-style-2-hover-black social-style-2-mrg">
                                <!--<a href="#"><i class="social_twitter"></i></a>
                                <a href="#"><i class="social_facebook"></i></a>
                                <a href="#"><i class="social_googleplus"></i></a>-->
                                <a href="#"><i class="social_instagram"></i></a>
                                <a href="#"><i class="social_youtube"></i></a>
                            </div>
                            <div class="copyright">
                                <p>Copyright © <?php echo date('Y'); ?> Wee Gee Dem</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>