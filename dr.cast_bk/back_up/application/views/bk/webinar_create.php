<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/meta');?>
    <?php $this->load->view('layout/styles');?>

</head>

<body>
    <?php $this->load->view('layout/nav');  ?>
    <?php $this->load->view('layout/leftnav');  ?>
    <main class="main_page_view__content over_flow">
        <section>
            <div class="container">
                <div class="row justify-content-sm-center">
                    <div class="col-sm-11">
                        <div class="top_product">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="top_product_content">
                                        <div class="ancor_txt">
                                            <a href="<?php echo base_url();?>webinars"><i class="fa fa-long-arrow-left"
                                                    aria-hidden="true"></i> <span>Create Webinar</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="custom_form_div">
                            <form id="webinar_create" name="webinar_create" method="post" class=""
                                enctype="multipart/form-data" novalidate="novalidate">
                                <input type="hidden" autocomplete="off" class="form-control" name="user_code"
                                    value="8eOzwUSxhZ">
                                <div class="row">
                                    <div class="col-sm-8" style="padding-right: 8px;">
                                        <div class="create_box boxshadow">
                                            
                                                <div class="form-group">
                                                    <label class="control-label" for="">Select Platform
                                                    </label>
                                                    <select name="webinar_platform" id="webinar_platform"
                                                        class="form-control" autocomplete="off">
                                                        <option value="">Select platform</option>
                                                        <option value="youtube_webpage">Youtube-custom web pages
                                                        </option>
                                                        <option value="youtube">Youtube-streaming</option>
                                                        <option value="facebook">Facebook-streaming</option>
                                                        <option value="zoom">Zoom Meeting</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Select Division</label>
                                                    <!--<select name="webinar_division" id="webinar_division"-->
                                                    <!--    class="form-control" autocomplete="off">-->
                                                    <!--    <option value="">Select division name</option>-->
                                                    <!--    <option value="Division1">Division1</option>-->
                                                    <!--    <option value="Division2">Division2</option>-->
                                                    <!--    <option value="Division3">Division3</option>-->
                                                    <!--</select>-->
                                                    <select class="form-control" name="webinar_division" id="webinar_division">
                                                        <?php  if(empty($divisionlist)) { } else { ?>
                                                        <option value="">Select division name</option>
                                                        <?php foreach($divisionlist as $divisionlist) { ?>
                                                        <option value="<?php echo $divisionlist['wc_d_name']; ?>">
                                                        <?php echo $divisionlist['wc_d_name']; ?></option>
                                                        <?php } ?>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Topic </label>
                                                    <input type="text" autocomplete="off" name="webinar_topic" placeholder="Please enter topic name"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Sub Title </label>
                                                    <input type="text" autocomplete="off" name="webinar_subtitle" placeholder="Please enter subtitle"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Description </label>
                                                    <textarea class="form-control" rows="2" cols="50"
                                                        name="webinar_description" placeholder="Please enter description"></textarea>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4" style="padding-right: 8px;">
                                        <div class="create_box boxshadow">
                                            <h6>Webinar co-ordinator</h6>
                                            
                                                <div class="form-group">
                                                    <label class="control-label" for="">Technician </label>
                                                    <!--<select name="webinar_technician" id="webinar_technician"-->
                                                    <!--    class="form-control" autocomplete="off">-->
                                                    <!--    <option value="">Select technician</option>-->
                                                    <!--    <option value="Select Platform">Select Technician</option>-->
                                                    <!--    <option value="Select Platform">Select Technician</option>-->
                                                    <!--</select>-->
                                                    <select class="form-control" name="webinar_technician" id="webinar_technician">
                                                        <?php  if(empty($technicianlist)) { } else { ?>
                                                        <option value="">Select technician</option>
                                                        <?php foreach($technicianlist as $technicianlist) { ?>
                                                        <option value="<?php echo $technicianlist['wc_t_name']; ?>">
                                                        <?php echo $technicianlist['wc_t_name']; ?></option>
                                                        <?php } ?>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Organizer </label>
                                                    <!--<select name="webinar_organizer" id="webinar_organizer"-->
                                                    <!--    class="form-control" autocomplete="off">-->
                                                    <!--    <option value="">Select organizer</option>-->
                                                    <!--    <option value="Select Platform">Select Organizer</option>-->
                                                    <!--    <option value="Select Platform">Select Organizer</option>-->
                                                    <!--</select>-->
                                                    <select class="form-control" name="webinar_organizer" id="webinar_organizer">
                                                        <?php  if(empty($organizerlist)) { } else { ?>
                                                        <option value="">Select organizer</option>
                                                        <?php foreach($organizerlist as $organizerlist) { ?>
                                                        <option value="<?php echo $organizerlist['wc_o_name']; ?>">
                                                        <?php echo $organizerlist['wc_o_name']; ?></option>
                                                        <?php } ?>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8" id="youtube_details"
                                        style="padding-right: 8px;display: none;">
                                        <div class="create_box boxshadow">
                                            <h6 class="box_title">Youtube streaming details</h6>
                                           
                                                <div class="form-group youtube" style="">
                                                    <label class="control-label" for="">Streaming</label>
                                                    <input type="text" autocomplete="off" name="webinar_streaming" placeholder="Please enter streaming"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Date &amp; Time</label>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="date" autocomplete="off" name="webinar_date"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="time" autocomplete="off" name="webinar_start"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="time" autocomplete="off" name="webinar_end"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group youtube" style="">
                                                    <label class="control-label" for="">Invitation </label> <br />
                                                    <div class="drop-zone">
                                                        <span class="drop-zone__prompt">Drop file here or click to
                                                            upload</span>
                                                        <input type="file" name="webinar_invitation"
                                                            class="drop-zone__input">
                                                    </div>
                                                </div>
                                                <div class="form-group youtube" style="">
                                                    <label class="control-label" for="">Event Logo </label> <br />
                                                    <div class="drop-zone">
                                                        <span class="drop-zone__prompt">Drop file here or click to
                                                            upload</span>
                                                        <input type="file" name="webinar_logo" class="drop-zone__input">
                                                    </div>
                                                </div>
                                                <div class="form-group youtube" style="">
                                                    <label class="control-label" for="">Webinar Page URL
                                                    </label>
                                                    <input type="text" autocomplete="off" name="webinar_page_url" placeholder="Please enter webinar page url"
                                                        class="form-control">
                                                </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-8" id="theme_settings" style="padding-right: 8px;display: none;">
                                        <div class="create_box boxshadow">
                                            <h6>Theme settings</h6>
                                            
                                                <div class="form-group">
                                                    <label class="control-label" for="">Select Theme</label>
                                                    <select name="webinar_theme" id="webinar_theme" class="form-control"
                                                        autocomplete="off">
                                                        <option value="">Select theme</option>
                                                        <option value="theme1">Theme 1</option>
                                                        <option value="theme2">Theme 2</option>
                                                        <option value="theme3">Theme 3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group youtube" style="">
                                                    <label class="control-label" for="">Theme Color </label>
                                                    <div class="input-group input-colorpicker colorpicker-element">
                                                        <input type="text" id="colorpic" name="webinar_theme_color"
                                                            class="form-control" value="#053a62">
                                                        <span class="input-group-addon">
                                                            <input type="color" id="colorpic" name="webinar_themecolor"
                                                                class="form-control" value="#053a62">
                                                        </span>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8" id="security_settings"
                                        style="padding-right: 8px;display: none;">
                                        <div class="create_box boxshadow">
                                            <h6>Security settings</h6>
                                            
                                                <div class="form-group youtube" style="">
                                                    <label class="control-label" for="">Password
                                                        Protection</label>
                                                    <select name="webinar_password_protection"
                                                        id="webinar_password_protection" class="form-control"
                                                        autocomplete="off">
                                                        <option value="">Select Password
                                                            Protection</option>
                                                        <option value="1001">Active</option>
                                                        <option value="1002" selected="selected">In Active</option>
                                                    </select>
                                                </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-8" id="poll_section" style="padding-right: 8px;display: none;">
                                        <div class="create_box boxshadow">
                                            <h6>Poll</h6>
                                            
                                                <div class="form-group youtube" style="">
                                                    <label class="control-label" for="">Poll Status</label>
                                                    <select name="webinar_poll_status" id="webinar_pollstatus"
                                                        class="form-control" autocomplete="off">
                                                        <option value="">Select Poll Status</option>
                                                        <option value="1001">Active</option>
                                                        <option value="1002" selected="selected">In Active</option>
                                                    </select>
                                                </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-8" id="branding_section"
                                        style="padding-right: 8px;display: none;">
                                        <div class="create_box boxshadow">
                                            <h6>Branding</h6>
                                            
                                                <div class="form-group youtube" style="">
                                                    <label class="control-label" for="">Branding Status</label>
                                                    <select name="webinar_branding_status" id="webinar_branding_status"
                                                        class="form-control" autocomplete="off">
                                                        <option value="">Select Branding Status</option>
                                                        <option value="1001">Active</option>
                                                        <option value="1002" selected="selected">In Active</option>
                                                    </select>
                                                </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-8" id="signup_settings"
                                        style="padding-right: 8px;display: none;">
                                        <div class="create_box boxshadow">
                                            <h6>Sign-up/Registration</h6>
                                            
                                                <div class="form-group youtube" style="">
                                                    <label class="control-label" for="">Login Type </label>
                                                    <select name="webinar_login_type" id="webinar_login_type"
                                                        class="form-control" autocomplete="off">
                                                        <option value="Username">Username</option>
                                                        <option value="Email">Email</option>
                                                        <option value="Mobile">Mobile</option>
                                                    </select>
                                                </div>
                                                <div class="form-group youtube" style="">
                                                    <label class="control-label">Register Form Display</label>
                                                    <br />
                                                    <label>Full Name</label>
                                                    <label class="custom_switch">
                                                        <input type="checkbox" name="registration_full_name"
                                                            class="dw_ci_status" db="db" table="dw_contact_timeings"
                                                            ucolum="dw_ct_status" uvalue="1001" wcolum="dw_ct_id"
                                                            wvalue="1" checked="">
                                                        <span class="custom_slider custom_round">
                                                            <span class="tgtxt"> Active</span>
                                                        </span>
                                                    </label>
                                                    <label>Email</label>
                                                    <label class="custom_switch">
                                                        <input type="checkbox" name="registration_email"
                                                            class="dw_ci_status" db="db" table="dw_contact_timeings"
                                                            ucolum="dw_ct_status" uvalue="1001" wcolum="dw_ct_id"
                                                            wvalue="1" checked="">
                                                        <span class="custom_slider custom_round">
                                                            <span class="tgtxt"> Active</span>
                                                        </span>
                                                    </label>
                                                    <label>Mobile Number</label>
                                                    <label class="custom_switch">
                                                        <input type="checkbox" name="registration_mobile_number"
                                                            class="dw_ci_status" db="db" table="dw_contact_timeings"
                                                            ucolum="dw_ct_status" uvalue="1001" wcolum="dw_ct_id"
                                                            wvalue="1" checked="">
                                                        <span class="custom_slider custom_round">
                                                            <span class="tgtxt"> Active</span>
                                                        </span>
                                                    </label>
                                                    <label>MCI Number</label>
                                                    <label class="custom_switch">
                                                        <input type="checkbox" name="registration_mci_number"
                                                            class="dw_ci_status" db="db" table="dw_contact_timeings"
                                                            ucolum="dw_ct_status" uvalue="1001" wcolum="dw_ct_id"
                                                            wvalue="1" checked="">
                                                        <span class="custom_slider custom_round">
                                                            <span class="tgtxt"> Active</span>
                                                        </span>
                                                    </label>
                                                    <label>Speciality</label>
                                                    <label class="custom_switch">
                                                        <input type="checkbox" name="registration_speciality"
                                                            class="dw_ci_status" db="db" table="dw_contact_timeings"
                                                            ucolum="dw_ct_status" uvalue="1001" wcolum="dw_ct_id"
                                                            wvalue="1" checked="">
                                                        <span class="custom_slider custom_round">
                                                            <span class="tgtxt"> Active</span>
                                                        </span>
                                                    </label>
                                                    <label>Address</label>
                                                    <label class="custom_switch">
                                                        <input type="checkbox" name="registration_address"
                                                            class="dw_ci_status" db="db" table="dw_contact_timeings"
                                                            ucolum="dw_ct_status" uvalue="1001" wcolum="dw_ct_id"
                                                            wvalue="1" checked="">
                                                        <span class="custom_slider custom_round">
                                                            <span class="tgtxt"> Active</span>
                                                        </span>
                                                    </label>
                                                    <label>Region</label>
                                                    <label class="custom_switch">
                                                        <input type="checkbox" name="registration_region"
                                                            class="dw_ci_status" db="db" table="dw_contact_timeings"
                                                            ucolum="dw_ct_status" uvalue="1001" wcolum="dw_ct_id"
                                                            wvalue="1" checked="">
                                                        <span class="custom_slider custom_round">
                                                            <span class="tgtxt"> Active</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-8" id="facebook_details"
                                        style="padding-right: 8px;display: none;">
                                        <div class="create_box boxshadow">
                                            <h6>Facebook streaming details</h6>
                                            
                                                <div class="form-group">
                                                    <label class="control-label" for="">Date &amp; Time</label>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="date" autocomplete="off" name="webinar_date"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="time" autocomplete="off" name="webinar_start"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="time" autocomplete="off" name="webinar_end"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Doctor Name </label>
                                                    <input type="text" autocomplete="off" name="webinar_dr_name" placeholder="Please enter doctor name"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Location </label>
                                                    <input type="text" autocomplete="off" name="webinar_location" placeholder="Please enter location"
                                                        class="form-control">
                                                </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-8" style="padding-right: 8px;">
                                        <div class="create_box boxshadow">
                                            <h6>Meeting information</h6>
                                            
                                                <div class="form-group">
                                                    <label class="control-label" for="">Zoom Link </label>
                                                    <input type="text" autocomplete="off" name="webinar_zoom_link" placeholder="Please enter zoom link"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Meeting ID</label>
                                                    <input type="text" autocomplete="off" name="webinar_meeting_id" placeholder="Please enter meeting id"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Passcode </label>
                                                    <input type="text" autocomplete="off" name="webinar_passcode" placeholder="Please enter passcode"
                                                        class="form-control">
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="rtbtn text-right">
                                    <input type="submit" value="Save" id="submit" name="submit"
                                        class="btn btn-secondary custom_add">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--  JavaScript -->
    <?php $this->load->view('layout/js');  ?>
    <script src="<?php echo base_url();?>assets/texteditor/tinytexteditor.js"></script>

 
    <script>
        $(document).ready(function () {
            $('input[name="contact"]').keyup(function (e) {
                if (/\D/g.test(this.value)) {
                    // Filter non-digits from input value.
                    this.value = this.value.replace(/\D/g, '');
                }
            });
            // Setup form validation on the #register-form element

            $("#webinar_create").validate({
                // Specify the validation rules
                rules: {
                    webinar_platform: {
                        required: true                        
                    }, 
                    webinar_division: {
                        required: true                        
                    },  
                    webinar_topic: {
                        required: true                    
                    },
                    webinar_subtitle: {
                        required: true                        
                    },
                    webinar_description: {
                        required: true                        
                    },
                    webinar_zoom_link: {
                        required: true                        
                    },
                    webinar_meeting_id: {
                        required: true                        
                    },
                    webinar_passcode: {
                        required: true                        
                    },
                    webinar_streaming: {
                        required: true                        
                    },
                    webinar_date: {
                        required: true                        
                    },      
                    webinar_start: {
                        required: true                        
                    },  
                    webinar_end: {
                        required: true                        
                    },  
                    webinar_page_url: {
                        required: true                        
                    },  
                    
                    webinar_technician: {
                        required: true                        
                    }, 
                    webinar_organizer  : {
                        required: true                        
                    }, 
                    webinar_theme: {
                        required: true                        
                    }, 
                    webinar_theme_color: {
                        required: true                        
                    }, 
                    webinar_password_protection: {
                        required: true                        
                    }, 
                    webinar_poll_status: {
                        required: true                        
                    },  
                    webinar_branding_status: {
                        required: true
                    },
                    webinar_invitation: {
                        required: true                        
                    }
                         
                    
                },
                // Specify the validation error messages
                messages: {
                    webinar_platform: {
                        required: "Please select platform",                        
                    },
                    webinar_division: {
                        required: "Please select division name",                        
                    },
                    webinar_topic: {
                        required: "Please enter topic name",                        
                    },
                    webinar_subtitle: {
                        required: "Please enter subtitle",                        
                    },
                    webinar_description: {
                        required: "Please enter description",                        
                    },
                    webinar_zoom_link: {
                        required: "Please enter zoom link",                        
                    },
                    webinar_meeting_id: {
                        required: "Please enter meeting id",                        
                    },
                    webinar_passcode: {
                        required: "Please enter passcode",                        
                    },
                    webinar_streaming: {
                        required: "Please enter streaming",                        
                    },
                    webinar_date: {
                        required: "Please enter date",                        
                    },
                    webinar_start: {
                        required: "Please enter time",                        
                    },
                    webinar_end: {
                        required: "Please enter time",                        
                    },
                    webinar_page_url: {
                       required: "Please enter webinar page url",                        
                    },
                   
                    webinar_technician: {
                        required: "Please select technician",                        
                    },
                    webinar_organizer: {
                        required: "Please select organizer",                        
                    },
                    webinar_theme: {
                        required: "Please select theme",                        
                    },
                    webinar_theme_color: {
                        required: "Please select theme color",                        
                    },
                    webinar_password_protection: {
                        required: "Please select password protection",                        
                    },
                    webinar_poll_status: {
                        required: "Please select poll status",                        
                    },
                    webinar_branding_status: {
                        required: "Please select branding status",
                    },
                    webinar_invitation: {
                        required: "Please upload file",                        
                    }
                }, 
            });
        });
    </script>





    <script>
        $(document).ready(function () {
            $('#webinar_platform').on('change', function () {

                if (this.value == 'youtube_webpage') {
                    $("#youtube_details").show();
                    $("#theme_settings").show();
                    $("#branding_section").show();
                    $("#poll_section").show();
                    $("#signup_settings").show();
                    $("#security_settings").show();
                } else {
                    $("#youtube_details").hide();
                    $("#theme_settings").hide();
                    $("#branding_section").hide();
                    $("#poll_section").hide();
                    $("#signup_settings").hide();
                    $("#security_settings").hide();
                }

                if (this.value == 'facebook') {
                    $("#facebook_details").show();
                } else {
                    $("#facebook_details").hide();
                }
            });
        });
    </script>



    <!--  End JavaScript -->
</body>

</html>