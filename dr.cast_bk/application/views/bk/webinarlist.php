<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/meta');?>
    <?php $this->load->view('layout/styles');?>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/pagination.css?Version=<?php echo Version; ?>" />
    
    <style>
        .active_btn {
            background-color: #4CAF50 !important; /* Green background when active */
            color: white;
        }
    </style>

</head>

<body>
    <?php $this->load->view('layout/nav');  ?>
    <?php $this->load->view('layout/leftnav');  ?>
    <main class="main_page_view__content">
        <section class="">
            <div class="container">
                <div class="top_product">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="top_product_content">
                                <h4>List of Webinars</h4>
                                <div class="right_btn">
                                    <div id="buttons" class="datbtns"></div>
                                    <a href="<?php echo base_url();?>/requests" class="btn custom_add">List of requests</a>
                                </div>
                            </div>
                            <div class="middle_date_picker">
                                <form id="filters1" name="filters1" method="post" class="md_filters" novalidate="novalidate">
                                    <div class="middle_flt datebtn">
                                        <i class="fa fa-calendar"></i>&nbsp;<span></span> <i class="fa fa-caret-down"></i><input id="daterangepicker" type="text" name="daterange" value="" placeholder="Select Date" class="dtrangeinput valid" aria-invalid="false">
                                    </div>
                                    <select class="datebtn" name="wc_d_id" id="wc_d_id">
                                        <?php if(empty($divisionslist)) { } else { ?>
                                        <option value="">Select division</option>
                                        <?php foreach($divisionslist as $divisionslist) { ?>
                                        <option value="<?php echo $divisionslist['wc_d_id']; ?>">
                                        <?php echo $divisionslist['wc_d_name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <input type="submit" value="Filters" class="btn datebtn" name="search">
                                    <a href="#" id="clear" class="clear_filter">Clear</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-sm-12 pl-0 pr-0">
                                    <div class="table_content">
                                        <div class="filters">
                                            <div class="entridiv">
                                                <span>Show entries</span>
                                                 <select id="rowsPerPage">
                                                  <option value="5">5</option>
                                                  <option value="10">10</option>
                                                  <option value="20">20</option>
                                                </select>
                                            </div>
                                            <form id="filters2" name="filters2" method="post">
                                                <input type="submit" class="btn btn-secondary " name="all" value="All">
                                                <input type="submit" class="btn btn-secondary " name="upcoming" value="Upcoming">
                                                <input type="submit" class="btn btn-secondary " name="ongoing" value="Ongoing">
                                                <input type="submit" class="btn btn-secondary " name="archived" value="Archived">
                                                <div class="search_tbl"><input type="text" placeholder="search..." id="myInputTextField">
                                                    <div class="btn_tbl_search"><i class="fa fa-search"></i></div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="customtable">
                                            <div class="customtable">
                                                <table id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 25%;">Webinar info</th>
                                                            <th></th>
                                                            <th>copy</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="searchtbl">
                                                        <?php //echo "<pre>"; print_r($webinarlist); ?>
                                                            <?php if(empty($webinarlist)) { ?><tr><td class="text-center">No data</td></tr><?php } else { ?> <?php $idnumbers='0' ; foreach($webinarlist as $webinarlist) { $idnumbers++ ?>
                                                        <tr>
                                                            <td>
                                                                <p class="title_head"> <?php echo $webinarlist['wc_w_topic']; ?> </p>
                                                                <p> <b>Technician : </b> <?php echo $webinarlist['wc_t_code']; ?> , <b>Organizer : </b> <?php echo $webinarlist['wc_w_requester']; ?></p>
                                                                <p> <b>Webinar Code : </b> <?php echo $webinarlist['wc_w_code']; ?> </p>
                                                                
                                                                <p class="title_date">Date of event <?php echo date('d M Y',strtotime($webinarlist['wc_w_date'])).' at '.date('h:i a',strtotime($webinarlist['wc_w_stime']));?> </p>
                                                            </td>
                                                            <td>
                                                                <a id="registration_settings" class="custom_btn">Registration Settings</i></a>
                                                                <a id="login_settings" class="custom_btn">Login Settings</i></a>
                                                                <a class="custom_btn">Edit</i></a> 
                                                                <a href="<?php echo base_url('enrollments');?>?wc_w_code=<?php echo $webinarlist['wc_w_code']; ?>" class="custom_btn">Enrollments</a>
                                                                <a href="<?php echo base_url('viewerlogs');?>?wc_w_code=<?php echo $webinarlist['wc_w_code']; ?>" class="custom_btn">Viewer logs</a>
                                                                <br>
                                                                <a href="<?php echo base_url('exportsmsenrolled');?>?wc_w_code=<?php echo $webinarlist['wc_w_code']; ?>" class="custom_btn">Export the enrolled mobile numbers</a>
                                                                <a href="<?php echo base_url('exportsmsattendees');?>?wc_w_code=<?php echo $webinarlist['wc_w_code']; ?>" class="custom_btn">Export the Attendees mobile numbers</a>
                                                                <br>

                                                                <!--<a class="custom_btn">Send enrollment request SMS to all users</a>
                                                                <a class="custom_btn">Send thank you SMS</a>-->
                                                                
                                                                
                                                                <div id="registration_settings_form" style="display:none;">
                                                                    <form class="form-inline" id="registration_settings_inner" name="registration_settings_inner" method="post">
                                                                        <input type="hidden" name="wc_w_code" value="<?php echo $webinarlist['wc_w_code']; ?>">
                                                                        <input type="hidden" name="wc_u_code" value="<?php echo $this->session->userdata('wc_u_code'); ?>">
                                                                        <div class="form-group mb-2">
                                                                            <label><input type="checkbox" id="wc_w_fs_name" name="wc_w_fs_name" <?php if($webinarlist['wc_w_fs_name'] == '1001'){ echo 'checked'; } ?>> Name</label>
                                                                        </div>
                                                                        <div class="form-group mb-2">
                                                                            <label><input type="checkbox" id="wc_w_fs_mci_number" name="wc_w_fs_mci_number" <?php if($webinarlist['wc_w_fs_mci_number'] == '1001'){ echo 'checked'; } ?>> MCI Number</label>
                                                                        </div>
                                                                        <div class="form-group mb-2">
                                                                            <label><input type="checkbox" id="wc_w_fs_email" name="wc_w_fs_email" <?php if($webinarlist['wc_w_fs_email'] == '1001'){ echo 'checked'; } ?> <?php if($webinarlist['wc_w_ls_logintype'] == 'EmailOTP'){ ?>required<?php } ?>> Email</label>
                                                                        </div>
                                                                        <div class="form-group mb-2">
                                                                            <label><input type="checkbox" id="wc_w_fs_mobile" name="wc_w_fs_mobile" <?php if($webinarlist['wc_w_fs_mobile'] == '1001'){ echo 'checked'; } ?> <?php if($webinarlist['wc_w_ls_logintype'] == 'MobileOTP'){ ?>required<?php } ?>> Mobile</label>
                                                                        </div>
                                                                        <div class="form-group mb-2">
                                                                            <label><input type="checkbox" id="wc_w_fs_location" name="wc_w_fs_location" <?php if($webinarlist['wc_w_fs_location'] == '1001'){ echo 'checked'; } ?>> Location</label>
                                                                        </div>
                                                                        <div class="form-group mb-2">
                                                                            <label><input type="checkbox" id="wc_w_fs_speciality" name="wc_w_fs_speciality" <?php if($webinarlist['wc_w_fs_speciality'] == '1001'){ echo 'checked'; } ?>> Speciality</label>
                                                                        </div>
                                                                        <div class="form-group mb-2">
                                                                            <label><input type="checkbox" id="wc_w_fs_username" name="wc_w_fs_username" <?php if($webinarlist['wc_w_fs_username'] == '1001'){ echo 'checked'; } ?> <?php if($webinarlist['wc_w_ls_logintype'] == 'Username'){ ?>required<?php } ?>> Username</label>
                                                                        </div>
                                                                        <div class="form-group mb-2">
                                                                            <label><input type="checkbox" id="wc_w_fs_password" name="wc_w_fs_password" <?php if($webinarlist['wc_w_fs_password'] == '1001'){ echo 'checked'; } ?> <?php if($webinarlist['wc_w_ls_logintype'] == 'Username'){ ?>required<?php } ?>> Password</label>
                                                                        </div>
                
                                                                        <input type="submit" id="registration_settings_inner_submit" name="registration_settings_inner_submit" value="Save">
                                                                    </form>
                                                                </div>
                                                                <div id="login_settings_form" style="display:none;">
                                                                    <form class="form-inline" id="login_settings_inner" name="login_settings_inner" method="post">
                                                                        <input type="hidden" name="wc_w_code" value="<?php echo $webinarlist['wc_w_code']; ?>">
                                                                        <input type="hidden" name="wc_u_code" value="<?php echo $this->session->userdata('wc_u_code'); ?>">
                                                                        <div class="form-check-inline">
                                                                            <input class="" type="radio" id="wc_w_ls_logintype" name="wc_w_ls_logintype" value="MobileOTP" <?php if($webinarlist['wc_w_ls_logintype'] == 'MobileOTP'){ echo 'checked'; } ?>>
                                                                            <label class="" for="wc_w_ls_logintype">Mobile OTP</label>
                                                                        </div>
                                                                        <div class="form-check-inline">
                                                                            <input class="" type="radio" id="wc_w_ls_logintype" name="wc_w_ls_logintype" value="EmailOTP" <?php if($webinarlist['wc_w_ls_logintype'] == 'EmailOTP'){ echo 'checked'; } ?>>
                                                                            <label class="" for="wc_w_ls_logintype">Email OTP</label>
                                                                        </div>
                                                                        <div class="form-check-inline">
                                                                            <input class="" type="radio" id="wc_w_ls_logintype" name="wc_w_ls_logintype" value="Username" <?php if($webinarlist['wc_w_ls_logintype'] == 'Username'){ echo 'checked'; } ?>>
                                                                            <label class="" for="wc_w_ls_logintype">Username</label>
                                                                        </div>
                                                                        <input type="submit" id="login_settings_inner_submit" name="login_settings_inner_submit" value="Save">
                                                                    </form>
                                                                </div>
                                                            </td>
                                                            <td>
                                        					   
                                                            </td>
                                                           </tr>
                                                        <?php } ?> <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="custom_pagination" id="pagination">
                                                <div class="left_pagination">
                                                    <span id="count"></span>
                                                </div>
                                                <div class="right_pagination">
                                                    <button id="prevPage" class="pagination-numbers radius_previous">Previous</button>
                                                    <div id="paginationNumbers" class="pagination"></div>
                                                    <button id="nextPage" class="pagination-numbers radius_next">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php  $this->load->view('layout/copyright'); ?>
    <?php $this->load->view('layout/js');  ?>
    <?php $this->load->view('layout/daterange');  ?>
    <script src="<?php echo base_url();?>assets/js/pagination.js"></script>
    
    <script>
        $(document).ready(function () {
            
            $('#registration_settings').on('click', function() {
                $('#registration_settings_form').toggle(); // Toggle form visibility
                $(this).toggleClass('active_btn'); // Toggle active state on the button
            });
            $('#login_settings').on('click', function() {
                $('#login_settings_form').toggle(); // Toggle form visibility
                $(this).toggleClass('active_btn'); // Toggle active state on the button
            });
            
            
            <?php if($webinarlist['wc_w_ls_logintype'] == 'MobileOTP'){ ?>
            $('#wc_w_fs_mobile').change(function() {
                // Check if the checkbox is unchecked
                if (!$(this).is(':checked')) {
                  // Display a popup message when unchecked
                  alert('Before disabling the mobile option, the login settings need to be updated!');
                }
            });
            <?php } ?>
            <?php if($webinarlist['wc_w_ls_logintype'] == 'EmailOTP'){ ?>
            $('#wc_w_fs_email').change(function() {
                // Check if the checkbox is unchecked
                if (!$(this).is(':checked')) {
                  // Display a popup message when unchecked
                  alert('Before disabling the email option, the login settings need to be updated!');
                }
            });
            <?php } ?>
            <?php if($webinarlist['wc_w_ls_logintype'] == 'Username'){ ?>
            $('#wc_w_fs_username').change(function() {
                // Check if the checkbox is unchecked
                if (!$(this).is(':checked')) {
                  // Display a popup message when unchecked
                  alert('Before disabling the Username option, the login settings need to be updated!');
                }
            });
            $('#wc_w_fs_password').change(function() {
                // Check if the checkbox is unchecked
                if (!$(this).is(':checked')) {
                  // Display a popup message when unchecked
                  alert('Before disabling the Password option, the login settings need to be updated!');
                }
            });
            <?php } ?>
            
            
            $("#registration_settings_inner").validate({
                // Specify the validation rules
                rules: {
                    /*wc_w_topic: {
                        required: true
                    },
                    wc_s_code_moderator_primary:{
                        required: true
                    }*/
                },
                // Specify the validation error messages
                messages: {
                    /*wc_w_topic: {
                        required: "Please enter webinar topic",                        
                    },*/
                },
                //Code Send to DB
                submitHandler: function(form) { // for demo
        			//alert('Hi');
        			if($("#registration_settings_inner_submit").val("Processing...")){
        			    $("#registration_settings_inner_submit").prop('disabled', 'disabled');
        			}
                    var myForm = document.getElementById('registration_settings_inner');
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url();?>Home/registration_settings_inner_submission',
                        dataType: 'text', // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: new FormData(myForm),
                        success: function(data) {
    						window.location = data;
                        }
                    });
                    return false;
                }
            });
            $("#login_settings_inner").validate({
                // Specify the validation rules
                rules: {
                    /*wc_w_topic: {
                        required: true
                    },
                    wc_s_code_moderator_primary:{
                        required: true
                    }*/
                },
                // Specify the validation error messages
                messages: {
                    /*wc_w_topic: {
                        required: "Please enter webinar topic",                        
                    },*/
                },
                //Code Send to DB
                submitHandler: function(form) { // for demo
        			//alert('Hi');
        			if($("#login_settings_inner_submit").val("Processing...")){
        			    $("#login_settings_inner_submit").prop('disabled', 'disabled');
        			}
                    var myForm = document.getElementById('login_settings_inner');
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url();?>Home/login_settings_inner_submission',
                        dataType: 'text', // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: new FormData(myForm),
                        success: function(data) {
    						window.location = data;
                        }
                    });
                    return false;
                }
            });
        });
    </script>
    
    <script>
        function CopyToClipboard(id){
            var r = document.createRange();
            r.selectNode(document.getElementById(id));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(r);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#myInputTextField").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#searchtbl tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
   
    <!--  End JavaScript -->
</body>
</html>