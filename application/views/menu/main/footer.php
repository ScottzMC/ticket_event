<!-- footer start -->
    <footer id="gen-footer">
        <div class="gen-footer-style-1">
            <div class="gen-footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="widget">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <img src="<?php echo base_url('images/wee-logo.png'); ?>" class="gen-footer-logo" alt="gen-footer-logo">
                                        <?php 
                                        $footer = $this->db->query("SELECT * FROM footer")->result();
                                        foreach($footer as $foot){}
                                        ?>
                                        <?php if(!empty($footer)){ ?>
                                        <p><?php echo $foot->body; ?></p>
                                        <?php } ?>
                                        <!--<ul class="social-link">
                                            <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" class="facebook"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#" class="facebook"><i class="fab fa-skype"></i></a></li>
                                            <li><a href="#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                        </ul>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="widget">
                                <h4 class="footer-title">Explore</h4>
                                <div class="menu-explore-container">
                                    <ul class="menu">
                                        <?php 
        								    $query = $this->db->query("SELECT DISTINCT category FROM menu_category ORDER BY category ASC")->result();
        								    foreach($query as $qry){
        								?>
                                        <li class="menu-item"><a href="<?php echo site_url('event/category/'.strtolower($qry->category)); ?>"><?php echo str_replace('-', ' ', $qry->category); ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="widget">
                                <h4 class="footer-title">Company</h4>
                                <div class="menu-about-container">
                                    <ul class="menu">
                                        <li class="menu-item"><a href="<?php echo site_url('advertise'); ?>" target="_blank">Advertise</a></li>
                                        <li class="menu-item"><a href="<?php echo site_url('apply'); ?>" target="_blank">Apply for a Business Account</a></li>
                                        <li class="menu-item"><a href="<?php echo site_url('contact'); ?>" target="_blank">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3  col-md-6">
                            <div class="widget">
                                <h4 class="footer-title">Info</h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <?php if(!empty($footer)){ ?>
                                        <p><?php echo $foot->body; ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gen-copyright-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 align-self-center">
                            <span class="gen-copyright"><a target="_blank" href="#"> Copyright <?php echo date('Y'); ?> Wee Gee Dem All Rights Reserved.</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer End -->