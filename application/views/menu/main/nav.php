<!--=========== Loader =============--
    <div id="gen-loading">
        <div id="gen-loading-center">
            <img src="< ?php echo base_url('images/logo-1.png'); ?>" alt="loading">
        </div>
    </div>
    <!--=========== Loader =============-->

    <!--========== Header ==============-->
    <header id="gen-header" class="gen-header-style-1 gen-has-sticky">
        <div class="gen-bottom-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <?php //if($type == 'usd'){ ?>
                            <!--<a class="navbar-brand" href="<?php echo site_url('home/view/'.$type); ?>">
                                <img class="img-fluid logo" src="<?php echo base_url('images/wee-logo.png'); ?>" alt="streamlab-image">
                            </a>
                            <?php //}else if($type == 'shilling'){ ?>
                            <a class="navbar-brand" href="<?php echo site_url('home/view/'.$type); ?>">
                                <img class="img-fluid logo" src="<?php echo base_url('images/wee-logo.png'); ?>" alt="streamlab-image">
                            </a>
                            <?php //}else if($type == 'leone'){ ?>
                            <a class="navbar-brand" href="<?php echo site_url('home/view/'.$type); ?>">
                                <img class="img-fluid logo" src="<?php echo base_url('images/wee-logo.png'); ?>" alt="streamlab-image">
                            </a>-->
                            <?php //}else{ ?>
                            <a class="navbar-brand" href="<?php echo site_url('home'); ?>">
                                <img class="img-fluid logo" src="<?php echo base_url('images/wee-logo.png'); ?>" alt="streamlab-image">
                            </a>
                            <?php //} ?>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div id="gen-menu-contain" class="gen-menu-contain">
                                    <ul id="gen-main-menu" class="navbar-nav ml-auto">
                                        <?php //if($type == 'usd'){ ?>
                                        <!--<li class="menu-item">
                                            <a href="<?php echo site_url('home/view/'.$type); ?>" aria-current="page">Home</a>
                                        </li>
                                        <?php //}else if($type == 'shilling'){ ?>
                                        <li class="menu-item">
                                            <a href="<?php echo site_url('home/view/'.$type); ?>" aria-current="page">Home</a>
                                        </li>
                                        <?php //}else if($type == 'leone'){ ?>
                                        <li class="menu-item">
                                            <a href="<?php echo site_url('home/view/'.$type); ?>" aria-current="page">Home</a>
                                        </li>-->
                                        <?php //}else{ ?>
                                        <li class="menu-item">
                                            <a href="<?php echo site_url('home'); ?>" aria-current="page">Home</a>
                                        </li>
                                        <?php //} ?>
                                        
                                       <!-- <?php if($type == 'gbp'){ ?>
                                        <li class="menu-item">
                                            <a href="<?php echo site_url('eat'); ?>" target="_blank" aria-current="page">Eat</a>
                                        </li>
                                        <?php } ?>-->
                                        
                                        <!--<li class="menu-item">
                                            <a href="#">Currency</a>
                                            <i class="fa fa-chevron-down gen-submenu-icon"></i>
                                            <ul class="sub-menu">
                                                <li class="menu-item">
                                                    <a href="<?php echo site_url('home'); ?>">Gbp</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="<?php echo site_url('home/view/usd'); ?>">Usd</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="<?php echo site_url('home/view/shilling'); ?>">Shilling</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="<?php echo site_url('home/view/leone'); ?>">Leone</a>
                                                </li>
                                            </ul>
                                        </li>-->
                                        <?php 
        								    $query = $this->db->query("SELECT DISTINCT category FROM menu_category ORDER BY category ASC")->result();
        								    foreach($query as $qry){
        								?>
                                            <li class="menu-item">
                                                <a href="<?php echo site_url('event/category/'.strtolower($qry->category)); ?>"><?php echo str_replace('-', ' ', $qry->category); ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="gen-header-info-box">
                                <div class="gen-menu-search-block">
                                    <?php if(!empty($basket_count)){ foreach($basket_count as $count){} ?>
                                    <a href="<?php echo base_url('event/cart'); ?>">(<?php echo $count->count; ?>)<i class="fa fa-shopping-cart"></i></a>
                                    <?php }else{ ?>
                                    <a href="<?php echo base_url('event/cart'); ?>">(0)<i class="fa fa-shopping-cart"></i></a>
                                    <?php } ?>
                                </div>
                                
                                <div class="gen-menu-search-block">
                                    <a href="javascript:void(0)" id="gen-seacrh-btn"><i class="fa fa-search"></i></a>
                                    <div class="gen-search-form">
                                        <form role="search" action="<?php echo base_url('event/search'); ?>" method="post" class="search-form">
                                            <label>
                                                <span class="screen-reader-text"></span>
                                                <input type="search" class="search-field" placeholder="Search …"
                                                    value="" name="search_query">
                                            </label>
                                            <!--<button type="submit" class="search-submit">
                                                <span class="screen-reader-text"></span>
                                            </button>-->
                                        </form>
                                    </div>
                                </div>
                                
                                <?php 
                                $session_email = $this->session->userdata('uemail');
                                $session_role = $this->session->userdata('urole');
                                ?>
                                <?php if(!empty($session_email)){ ?>
                                <div class="gen-account-holder">
                                    <a href="javascript:void(0)" id="gen-user-btn"><i style="margin-top: 15px;" class="fa fa-user"></i></a>
                                    <div class="gen-account-menu">
                                        <ul class="gen-account-menu">
                                            <!-- Pms Menu -->
                                            <?php if($session_role == "Kitchen"){ ?>
                                            <li>
                                                <a href="<?php echo site_url('kitchen/dashboard'); ?>" target="_blank"><i class="fas fa-sign-in-alt"></i>
                                                    Kitchen </a>
                                            </li>
                                            <?php }else if($session_role == "User"){ ?>
                                            <li>
                                                <a href="<?php echo site_url('customer/dashboard'); ?>" target="_blank"><i class="fas fa-sign-in-alt"></i>
                                                    Profile </a>
                                            </li>
                                            <?php }else if($session_role == "Business"){ ?>
                                            <li>
                                                <a href="<?php echo site_url('business/dashboard'); ?>" target="_blank"><i class="fas fa-sign-in-alt"></i>
                                                    Business </a>
                                            </li>
                                            <?php }else if($session_role == "Admin"){ ?>
                                            <li>
                                                <a href="<?php echo site_url('admin/dashboard'); ?>" target="_blank"><i class="fas fa-sign-in-alt"></i>
                                                    Admin </a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if(empty($session_email)){ ?>
                                <div class="gen-btn-container">
                                    <a href="<?php echo site_url('login'); ?>" class="gen-button">
                                        <div class="gen-button-block">
                                            <span class="gen-button-line-left"></span>
                                            <span class="gen-button-text">Login</span>
                                        </div>
                                    </a>
                                    <a href="<?php echo site_url('register'); ?>" target="_blank" class="gen-button">
                                        <div class="gen-button-block">
                                            <span class="gen-button-line-left"></span>
                                            <span class="gen-button-text">Register</span>
                                        </div>
                                    </a>
                                </div>
                                <?php } ?>
                                <?php if(!empty($session_email)){ ?>
                                <div class="gen-btn-container">
                                    <a href="<?php echo site_url('logout'); ?>" class="gen-button">
                                        <div class="gen-button-block">
                                            <span class="gen-button-line-left"></span>
                                            <span class="gen-button-text">Logout</span>
                                        </div>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars"></i>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--========== Header ==============-->