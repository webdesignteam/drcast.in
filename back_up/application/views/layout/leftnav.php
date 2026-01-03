
<style>
    
.dropdown-menu {
  display: none;
}

.dropdown-menu li {
  display: block;
  position: relative;
}

.dropdown-menu li a {
  display: block;
  padding: 5px;
  text-decoration: none;
  color: #000;
}

.dropdown-menu li a:hover {
  background-color: #ddd;
}

.submenu {
  display: none;
  position: absolute;
  top: 0;
  left: 100%;
}

.has-submenu:hover .submenu {
  display: block;
}
    
</style>
<!-- Sidebar -->
<div class="main_page_view" id="leftNav">
    <!-- Sidebar -->
    <div class="main_page_view__sidebar">
        <nav class="sidebar__nav">
            <div class="top_menus">
            <ul class="s_nav_menu">
                 <h4>Home</h4>
                <li><a class="sidebar__nav_link inner_link <?php if(!empty($active)){ if($active == 'index'){echo 'active'; } }?>" href="<?php echo base_url();?>dashboard"><i class="fa fa-home" aria-hidden="true"></i> <span>Dashboard</span></a></li>
                <li class="d-none"><a class="sidebar__nav_link inner_link  <?php if(!empty($active)){ if($active == 'analytics'){echo 'active'; } }?>" href="<?php echo base_url();?>analytics"><i class="fa fa-bar-chart" aria-hidden="true"></i><span>Analytics</span></a></li>
                <li><a class="sidebar__nav_link inner_link  <?php if(!empty($active)){ if($active == 'email-logs'){echo 'active'; } }?>" href="<?php echo base_url();?>email-logs"><i class="fa fa-envelope" aria-hidden="true"></i><span>E-mail logs</span></a></li>
                <li><a class="sidebar__nav_link inner_link  <?php if(!empty($active)){ if($active == 'sms-logs'){echo 'active'; } }?>" href="<?php echo base_url();?>sms-logs"><i class="fa fa-comments" aria-hidden="true"></i><span>SMS logs</span></a></li>
                            <li><a class="sidebar__nav_link inner_link <?php if(empty($active)){ } else{ if($active == 'logs-users'){ echo "active"; } else{ } }?>" href="<?php echo base_url();?>logs-users"><i class="fa fa-dashboard" aria-hidden="true"></i><span>User Logs</span></a></li>
            </ul>
            <ul class="s_nav_menu">
            <h4>Events</h4>
                <!--<?php if($this->session->userdata('wc_u_type') == 'Admin' OR $this->session->userdata('wc_u_type') == 'Employee' OR $this->session->userdata('wc_u_type') == 'Organizer'){ ?>-->
                <!--    <li><a class="sidebar__nav_link inner_link <?php if(!empty($active)){ if($active == 'request'){echo 'active'; } }?>" href="<?php echo base_url();?>request-event"><i class="fa fa-window-restore active" aria-hidden="true"></i><span>Request Event</span></a></li>-->
                <!--<?php } ?>-->
                
                <li><a class="sidebar__nav_link inner_link <?php if(!empty($active)){ if($active == 'events'){echo 'active'; } }?>" href="<?php echo base_url();?>events"><i class="fa fa-window-restore active" aria-hidden="true"></i><span>Events</span></a></li>
                
                <?php if($this->session->userdata('wc_u_type') == 'Admin' OR $this->session->userdata('wc_u_type') == 'Employee' OR $this->session->userdata('wc_u_type') == 'Organizer'){ ?>
                    <li><a class="sidebar__nav_link inner_link <?php if(!empty($active)){ if($active == 'doctors'){echo 'active'; } }?>" href="<?php echo base_url();?>doctors"><i class="fa fa-user-circle-o" aria-hidden="true"></i><span>Doctors</span></a></li>
                <?php } ?>
                
                <?php if($this->session->userdata('wc_u_type') == 'Admin'){ ?>
                    <li><a class="sidebar__nav_link inner_link <?php if(!empty($active)){ if($active == 'technicians'){echo 'active'; } }?>" href="<?php echo base_url();?>technicians"><i class="fa fa-user-circle-o active" aria-hidden="true"></i><span>Technicians</span></a></li>
                    <li><a class="sidebar__nav_link inner_link <?php if(!empty($active)){ if($active == 'organizers'){echo 'active'; } }?>" href="<?php echo base_url();?>organizers"><i class="fa fa-user-circle-o" aria-hidden="true"></i><span>Organizers</span></a></li>
                    <li><a class="sidebar__nav_link inner_link <?php if(!empty($active)){ if($active == 'participants'){echo 'active'; } }?>" href="<?php echo base_url();?>participants"><i class="fa fa-users" aria-hidden="true"></i><span>Participants</span></a></li>
                    <li><a class="sidebar__nav_link inner_link <?php if(!empty($active)){ if($active == 'divisions'){echo 'active'; } }?>" href="<?php echo base_url();?>divisions"><i class="fa fa-users" aria-hidden="true"></i><span>Divisions</span></a></li>
                    <li><a class="sidebar__nav_link inner_link <?php if(!empty($active)){ if($active == 'queries'){echo 'active'; } }?>" href="<?php echo base_url();?>queries"><i class="fa fa-question-circle" aria-hidden="true"></i><span>Queries</span></a></li>
                <?php } ?>
            </ul>
            
            <?php if($this->session->userdata('wc_u_type') == 'Admin'){ ?>
            <ul class="s_nav_menu">
            <h4>Admin Settings</h4>
                <li><a class="sidebar__nav_link inner_link <?php if(!empty($active)){ if($active == 'users'){echo 'active'; } }?>" href="<?php echo base_url();?>users"><i class="fa fa-window-restore active" aria-hidden="true"></i><span>User</span></a></li>
                <!--<li><a class="sidebar__nav_link inner_link <?php if(!empty($active)){ if($active == 'create-user'){echo 'active'; } }?>" href="<?php echo base_url();?>create-user"><i class="fa fa-window-restore" aria-hidden="true"></i><span>Create User</span></a></li>-->
            </ul>
            <?php } ?>
            
           
            
            <!--<ul class="fixed_menu">-->
            <!--    <li><a class="sidebar__nav_link inner_link " href="<?php echo base_url();?>settings"><i class="fa fa-gear" aria-hidden="true"></i><span>Settings</span></a></li>-->
            <!--</ul>-->
            </div>
        </nav>
    </div>
    <!-- Content -->
</div>
<script>
$(document).ready(function() {
  $('.has-submenu').hover(
    function() {
      $(this).children('.submenu').slideDown();
    },
    function() {
      $(this).children('.submenu').slideUp();
    }
  );
});
</script>