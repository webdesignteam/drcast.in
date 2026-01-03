<div class="">
    <div class="container">
        <!-- navbar-me -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <!--<a class="navbar-brand d-none d-md-block" href="<?php echo base_url();?>dashboard">Webinar CMS</a>-->
            <a class="navbar-brand" href="<?php echo base_url();?>dashboard">
                <img class="admin_logo" src="<?php echo base_url();?>assets/img/drlogo.svg">
            </a>
           
            <button onclick="openLeftNav()" class="navbar-toggler" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--<div class="collapse navbar-collapse d-none d-md-block" id="navbarSupportedContent">-->
            <!--    <ul class="navbar-nav mr-auto scrollpy">-->
            <!--        <li>-->
            <!--            <div class="form-group has-search">-->
            <!--                <span class="fa fa-search form-control-feedback"></span>-->
            <!--                <input type="text" class="form-control" placeholder="Search">-->
            <!--            </div>-->
            <!--        </li>-->
            <!--    </ul>-->
            <!--</div>-->
            <ul class="navbar-nav ml-auto right_dropdowns">
                <!--<li class="nav-item dropdown">-->
                <!--    <a href="#" class="nav-link dropdown-toggle badge_bell" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--        <i class="fa fa-bell" aria-hidden="true"></i> <span class="badge badge-secondary">24</span>-->
                <!--    </a>-->
                <!--</li>-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="wlcome"><img src="<?php echo base_url();?>uploads/users/user.png" class="usericon"><strong><?php echo $this->session->userdata('wc_u_display_name'); ?></strong></span>
                    </a>
                    <div class="dropdown-menu custom_dpmenu" aria-labelledby="navbarDropdown">
                        <a class="nav-link" name="link" href="<?php echo base_url();?>logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>