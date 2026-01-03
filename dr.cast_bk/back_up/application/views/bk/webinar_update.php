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
                                            <a href="<?php echo base_url();?>webinars"><i class="fa fa-arrow-left"
                                                    aria-hidden="true"></i> <span>Create Webinar</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="custom_form_div">
                            <form id="faqs_create" name="website_edit" method="post" class=""
                                enctype="multipart/form-data" novalidate="novalidate">
                                <input type="hidden" autocomplete="off" class="form-control" name="user_code"
                                    value="8eOzwUSxhZ">
                                <div class="row">
                                    <div class="col-sm-8" style="padding-right: 8px;">
                                        <div class="create_box boxshadow">
                                            <form>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Select Platform
                                                    </label>
                                                    <select name="webinar_platform" id="webinar_platform"
                                                        class="form-control" autocomplete="off">
                                                        <option value="">Select Platform</option>
                                                        <option value="youtube_webpage">Youtube-custom web pages
                                                        </option>
                                                        <option value="youtube">Youtube-streaming</option>
                                                        <option value="facebook">Facebook-streaming</option>
                                                        <option value="zoom">Zoom Meeting</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Select Division</label>
                                                    <select name="webinar_division" id="webinar_division"
                                                        class="form-control" autocomplete="off">
                                                        <option value="">Select Division Name</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Topic </label>
                                                    <input type="text" autocomplete="off" name="webinar_topic"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Sub Title </label>
                                                    <input type="text" autocomplete="off" name="webinar_topic"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Description </label>
                                                    <textarea class="form-control"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-4" style="padding-right: 8px;">
                                        <div class="create_box boxshadow">
                                            <h6>Webinar co-ordinator</h6>
                                            <form>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Technician </label>
                                                    <select name="webinar_technician" id="webinar_technician"
                                                        class="form-control" autocomplete="off">
                                                        <option value="Select Platform">Select Technician</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Organizer </label>
                                                    <select name="webinar_organizer" id="webinar_organizer"
                                                        class="form-control" autocomplete="off">
                                                        <option value="Select Platform">Select Organizer</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-8" id="youtube_details"
                                        style="padding-right: 8px;">
                                        <div class="create_box boxshadow">
                                            <h6 class="box_title">Youtube streaming details</h6>
                                            <form>
                                                <div class="form-group youtube" style="">
                                                    <label class="control-label" for="">Streaming</label>
                                                    <input type="text" autocomplete="off" name="webinar_youtubecode"
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
                                                        <input type="file" name="myFile" class="drop-zone__input">
                                                    </div>
                                                </div>
                                                <div class="form-group youtube" style="">
                                                    <label class="control-label" for="">Event Logo </label> <br />
                                                    <div class="drop-zone">
                                                        <span class="drop-zone__prompt">Drop file here or click to
                                                            upload</span>
                                                        <input type="file" name="myFile" class="drop-zone__input">
                                                    </div>
                                                </div>
                                                <div class="form-group youtube" style="">
                                                    <label class="control-label" for="">Webinar Page URL
                                                    </label>
                                                    <input type="text" autocomplete="off" name="webinar_url"
                                                        class="form-control">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-8" id="theme_settings" style="padding-right: 8px;">
                                        <div class="create_box boxshadow">
                                            <h6>Theme settings</h6>
                                            <form>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Select Theme</label>
                                                    <select name="webinar_theme" id="webinar_theme" class="form-control"
                                                        autocomplete="off">
                                                        <option value="">Select Theme Name</option>
                                                        <option value="">Theme 1</option>
                                                        <option value="">Theme 2</option>
                                                        <option value="">Theme 3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group youtube" style="">
                                                    <label class="control-label" for="">Theme Color </label>
                                                    <div class="input-group input-colorpicker colorpicker-element">
                                                        <input type="text" id="colorpic" name="webinar_themecolor"
                                                            class="form-control" value="#053a62">
                                                        <span class="input-group-addon">
                                                            <input type="color" id="colorpic" name="webinar_themecolor"
                                                                class="form-control" value="#053a62">
                                                        </span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-8" id="speakers" style="padding-right: 8px;">
                                        <div class="create_box boxshadow">
                                            <h6>Speakers</h6>
                                            <form>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Doctor Name </label>
                                                    <input type="text" autocomplete="off" name="webinar_dr_name"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Doctor Position </label>
                                                    <input type="text" autocomplete="off" name="webinar_dr_position"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Educational Credentials</label>
                                                    <input type="text" autocomplete="off" name="webinar_dr_position"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Location </label>
                                                    <input type="text" autocomplete="off" name="webinar_location"
                                                        class="form-control">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-8" id="security_settings"
                                        style="padding-right: 8px;">
                                        <div class="create_box boxshadow">
                                            <h6>Security settings</h6>
                                            <form>
                                                <div class="form-group youtube" style="">
                                                    <label class="control-label" for="">Password
                                                        Protection</label>
                                                    <select name="webinar_password_protection"
                                                        id="webinar_password_protection" class="form-control"
                                                        autocomplete="off">
                                                        <option value="Select Password Protection">Select Password
                                                            Protection</option>
                                                        <option value="1001">Active</option>
                                                        <option value="1002" selected="selected">In Active</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-8" id="poll_section" style="padding-right: 8px;">
                                        <div class="create_box boxshadow">
                                            <h6>Poll</h6>
                                            <form>
                                                <div class="form-group youtube" style="">
                                                    <label class="control-label" for="">Poll Status</label>
                                                    <select name="webinar_pollstatus" id="webinar_pollstatus"
                                                        class="form-control" autocomplete="off">
                                                        <option value="">Select Poll Status</option>
                                                        <option value="1001">Active</option>
                                                        <option value="1002" selected="selected">In Active</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-8" id="branding_section"
                                        style="padding-right: 8px;">
                                        <div class="create_box boxshadow">
                                            <h6>Branding</h6>
                                            <form>
                                                <div class="form-group youtube" style="">
                                                    <label class="control-label" for="">Branding Status</label>
                                                    <select name="webinar_brandingstatus" id="webinar_brandingstatus"
                                                        class="form-control" autocomplete="off">
                                                        <option value="">Select Branding Status</option>
                                                        <option value="1001">Active</option>
                                                        <option value="1002" selected="selected">In Active</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-8" id="signup_settings"
                                        style="padding-right: 8px;">
                                        <div class="create_box boxshadow">
                                            <h6>Sign-up/Registration</h6>
                                            <form>
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
                                                        <input type="checkbox" name="dw_ct_status" class="dw_ci_status"
                                                            db="db" table="dw_contact_timeings" ucolum="dw_ct_status"
                                                            uvalue="1001" wcolum="dw_ct_id" wvalue="1" checked="">
                                                        <span class="custom_slider custom_round">
                                                            <span class="tgtxt"> Active</span>
                                                        </span>
                                                    </label>
                                                    <label>Email</label>
                                                    <label class="custom_switch">
                                                        <input type="checkbox" name="dw_ct_status" class="dw_ci_status"
                                                            db="db" table="dw_contact_timeings" ucolum="dw_ct_status"
                                                            uvalue="1001" wcolum="dw_ct_id" wvalue="1" checked="">
                                                        <span class="custom_slider custom_round">
                                                            <span class="tgtxt"> Active</span>
                                                        </span>
                                                    </label>
                                                    <label>Mobile Number</label>
                                                    <label class="custom_switch">
                                                        <input type="checkbox" name="dw_ct_status" class="dw_ci_status"
                                                            db="db" table="dw_contact_timeings" ucolum="dw_ct_status"
                                                            uvalue="1001" wcolum="dw_ct_id" wvalue="1" checked="">
                                                        <span class="custom_slider custom_round">
                                                            <span class="tgtxt"> Active</span>
                                                        </span>
                                                    </label>
                                                    <label>MCI Number</label>
                                                    <label class="custom_switch">
                                                        <input type="checkbox" name="dw_ct_status" class="dw_ci_status"
                                                            db="db" table="dw_contact_timeings" ucolum="dw_ct_status"
                                                            uvalue="1001" wcolum="dw_ct_id" wvalue="1" checked="">
                                                        <span class="custom_slider custom_round">
                                                            <span class="tgtxt"> Active</span>
                                                        </span>
                                                    </label>
                                                    <label>Speciality</label>
                                                    <label class="custom_switch">
                                                        <input type="checkbox" name="dw_ct_status" class="dw_ci_status"
                                                            db="db" table="dw_contact_timeings" ucolum="dw_ct_status"
                                                            uvalue="1001" wcolum="dw_ct_id" wvalue="1" checked="">
                                                        <span class="custom_slider custom_round">
                                                            <span class="tgtxt"> Active</span>
                                                        </span>
                                                    </label>
                                                    <label>Address</label>
                                                    <label class="custom_switch">
                                                        <input type="checkbox" name="dw_ct_status" class="dw_ci_status"
                                                            db="db" table="dw_contact_timeings" ucolum="dw_ct_status"
                                                            uvalue="1001" wcolum="dw_ct_id" wvalue="1" checked="">
                                                        <span class="custom_slider custom_round">
                                                            <span class="tgtxt"> Active</span>
                                                        </span>
                                                    </label>
                                                    <label>Region</label>
                                                    <label class="custom_switch">
                                                        <input type="checkbox" name="dw_ct_status" class="dw_ci_status"
                                                            db="db" table="dw_contact_timeings" ucolum="dw_ct_status"
                                                            uvalue="1001" wcolum="dw_ct_id" wvalue="1" checked="">
                                                        <span class="custom_slider custom_round">
                                                            <span class="tgtxt"> Active</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-8" id="facebook_details"
                                        style="padding-right: 8px;">
                                        <div class="create_box boxshadow">
                                            <h6>Facebook streaming details</h6>
                                            <form>
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
                                                    <input type="text" autocomplete="off" name="webinar_dr_name"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Location </label>
                                                    <input type="text" autocomplete="off" name="webinar_location"
                                                        class="form-control">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-8" style="padding-right: 8px;">
                                        <div class="create_box boxshadow">
                                            <h6>Meeting information</h6>
                                            <form>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Zoom Link </label>
                                                    <input type="text" autocomplete="off" name="webinar_zoomlink"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Meeting ID</label>
                                                    <input type="text" autocomplete="off" name="webinar_zoomid"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Passcode </label>
                                                    <input type="text" autocomplete="off" name="webinar_passcode"
                                                        class="form-control">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="rtbtn text-right">
                                    <input type="submit" value="Save" name="submit"
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

            //Visibility
            $("input[name='Publish']").click(function () {
                if ($("#chkYes").is(":checked")) {
                    $(".visbiletimeanddate").css("display", "block");
                } else {
                    $(".visbiletimeanddate").css("display", "none");
                }
            });

        });
    </script>

    <script>
        $(document).ready(function () {
            // Setup form validation on the #register-form element
            $("#faqs_create").validate({

                // Specify the validation rules
                rules: {
                    dw_code: {
                        required: true,
                    },
                    dw_f_question: {
                        maxlength: 200
                    }
                },

                // Specify the validation error messages
                messages: {
                    dw_code: {
                        required: "Please select doctor website",
                    },
                    dw_f_question: {
                        required: "Please enter min 0 max 200 characters",
                    }
                },
            });
        });
    </script>

  

 
    <!--  End JavaScript -->
</body>

</html>