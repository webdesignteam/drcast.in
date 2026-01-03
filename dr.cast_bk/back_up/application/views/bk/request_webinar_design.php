<?php //if(empty($this->input->get('empid'))){ echo "Requested data is not being fetched from iConnect. Please contact the administrator for assistance."; } else { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layout/meta');  ?>
	<?php $this->load->view('layout/styles');  ?>
	<style>
	.custom-file-input {
    width: 100%;
    padding: 10px;
    border: 2px dashed #6c757d;
    border-radius: 8px;
    background-color: #f1f3f5;
    font-size: 14px;
    transition: all 0.3s ease;
    opacity: 1;
    height: unset;
}

.custom-file-input:hover {
    background-color: #e2e6ea;
    border-color: #5a6268;
    cursor: pointer;
}

	    .requestwebinar{
	        padding: 20px;
            background-color: #fff;
            border-radius: 20px;
	    }
	    .footer_rw{
            padding: 10px;
            color: #000;
            background-image: linear-gradient(to bottom, #e0dcda, #e0dcda);
            width: 100%;
        }
        .footer_text{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .footer_rw p{
            padding: 0px;
            margin: 0px;
        }
        
        .datebtn {
          display: flex;
          align-items: center;
          border: 1px solid #ced4da;
          border-radius: 0.375rem;
          padding: 0.5rem;
          background-color: #f8f9fa;
          cursor: pointer;
          transition: background-color 0.2s ease;
        }
    
        .datebtn:hover {
          background-color: #e9ecef;
        }
    
        .datebtn i {
          color: #495057;
        }
    
        .dtrangeinput {
          border: none;
          outline: none;
          background: transparent;
          width: 100%;
          padding-left: 0.5rem;
          color: #495057;
        }
        
        
        
        
	    .focus-in-expand{-webkit-animation:focus-in-expand .9s cubic-bezier(.25,.46,.45,.94) both;animation:focus-in-expand .9s cubic-bezier(.25,.46,.45,.94) both}
	    @-webkit-keyframes focus-in-expand{0%{letter-spacing:-.5em;-webkit-filter:blur(12px);filter:blur(12px);opacity:0}100%{-webkit-filter:blur(0);filter:blur(0);opacity:1}}@keyframes focus-in-expand{0%{letter-spacing:-.5em;-webkit-filter:blur(12px);filter:blur(12px);opacity:0}100%{-webkit-filter:blur(0);filter:blur(0);opacity:1}}
	</style>
</head>
<body>
    <section class="background_gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="custom_form_div">
                        <h1 class="text-center mb-2 font-weight-bold">Request a Webinar</h1>
                        <form id="request_webinar" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-8 other_boxs">
                                    <div class="create_box boxshadow">
                                        <div class="form-group">
                                            <label>Type of event</label>
                                            <select class="form-control" id="wc_w_event" name="wc_w_event" onchange="handleEventTypeChange()">
                                                <option value="">Select event</option>
                                                <option value="NEW">Request new webinar</option>
                                                <option value="MOCK">Request mock run</option>
                                                <option value="Postpone">Postpone</option>
                                                <option value="Prepone">Prepone</option>
                                                <option value="Cancelled">Cancelled</option>
                                                <option value="Changes ">Content changes</option>
                                                <option value="InvitationUpdate">Invitation update</option>
                                            </select>
                                            <small id="" class="form-text text-muted">If you would like to create a new webinar, make changes, or request a mock run, please select the event type in the form below.</small>
                                        </div>
                                    </div>
                                    
                                    <div id="wc_w_event_NEW" style="display:none;">
                                        <div class="create_box boxshadow">
                                            <div class="form-group">
                                                <label>Platform</label>
                                                <select class="form-control" id="wc_w_platform" name="wc_w_platform">
                                                    <option value="">Select platform</option>
                                                    <option value="Youtube">Youtube</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="ZoomMeeting">Zoom Meeting</option>
                                                    <option value="Webinar">Webinar</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Webinar Topic</label>
                                                <input type="text" class="form-control" id="" name="wc_w_topic">
                                                <small id="" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                            </div>
                                            <div class="form-group">
                                                <label>Sub Title</label>
                                                <input type="text" class="form-control" id="" name="wc_w_subtitle">
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" id="" name="wc_w_description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Schedule Webinar Date time</label>
                                                <div class="middle_flt datebtn">
                                                    <i class="fa fa-calendar"></i>&nbsp;<span></span> <i class="fa fa-caret-down"></i><input id="wc_w_datetime" type="text" name="wc_w_datetime" value="" placeholder="Select Date" class="dtrangeinput valid w-100" aria-invalid="false">
                                                </div>
                                                <small class="form-text text-muted">Choose a date and time for the webinar.</small>
                                            </div>
                                        </div>
                                        
                                        <div class="create_box boxshadow">
                                         <!--Speaker -->
                                            <?php if(empty($this->input->get('empid'))){ ?>
                                            <div class="form-group">
                                                <label>Select Lead Speaker</label>
                                                <select class="form-control" id="wc_d_code_lead" name="wc_d_code_lead">
                                                    <option value="">Select speaker</option>
                                                </select>
                                            </div>
                                            <?php } else { ?>
                                            <div class="form-group">
                                                <label>Select Lead Speaker</label>
                                                <select class="form-control" id="wc_d_code_lead" name="wc_d_code_lead">
                                                    <option value="">Select speaker</option>
                                                    <?php if(empty($doctors)){ echo '<option value="">No Data</option>'; }else { ?>
                                                        <?php //echo "<pre>"; print_r($doctors); ?>
                                                        <?php foreach($doctors as $doctors_list) {?>
                                                            <option value="<?php echo $doctors_list['wc_d_code']; ?>"><?php echo $doctors_list[ 'wc_d_name']; ?></option>
                                                        <?php } ?>
                                                        <option value="other">Other</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <?php } ?>
                                            <div id="createleadspeaker" style="display:none;">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label>Name of the Speaker:</label>
                                                        <input type="text" class="form-control" name="wc_d_name_lead">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Emila of the Speaker:</label>
                                                        <input type="text" class="form-control" name="wc_d_email_lead">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Contact of the Speaker:</label>
                                                        <input type="text" class="form-control" name="wc_d_contact_lead">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Hospital Name of the Speaker:</label>
                                                        <input type="text" class="form-control" name="wc_d_hospital_lead">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Position of the Speaker:</label>
                                                        <input type="text" class="form-control" name="wc_d_position_lead">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Education of the Speaker:</label>
                                                        <input type="text" class="form-control" name="wc_d_education_lead">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Location of the Speaker:</label>
                                                        <input type="text" class="form-control" name="wc_d_location_lead">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Headquaters of the Speaker:</label>
                                                        <input type="text" class="form-control" name="wc_d_headquaters_lead">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Doctor Code of the Speaker:</label>
                                                        <input type="text" class="form-control" name="wc_d_code_sap_lead">
                                                    </div>
                                                    <!--<div class="form-group col-md-12">-->
                                                    <!--    <label>Upload Speaker Photo:</label>-->
                                                    <!--    <input type="file" name="wc_d_display_photo_lead">-->
                                                    <!--</div>-->
                                                    <div class="form-group col-md-12">
                                                        <label>Upload Speaker Photo:</label>
                                                        <input type="file" name="wc_d_display_photo_lead" class="custom-file-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="add_guest_speaker" style="display:none;">
                                                <label>If you want to add another Speaker <input type="checkbox" id="add_guest_speaker_check" name="add_guest_speaker_check"></label>
                                            </div>
                                            <?php if(empty($this->input->get('empid'))){ ?>
                                            <div class="form-group" id="wc_d_code_guest" style="display:none;">
                                                <label>Select Guest Speaker</label>
                                                <select class="form-control" id="wc_d_code_guest_select" name="wc_d_code_guest">
                                                    <option value="">Select speaker</option>
                                                </select>
                                            </div>
                                            <?php } else { ?>
                                            <div class="form-group" id="wc_d_code_guest" style="display:none;">
                                                <label>Select Guest Speaker</label>
                                                <select class="form-control" id="wc_d_code_guest_select" name="wc_d_code_guest">
                                                    <option value="">Select speaker</option>
                                                    <?php if(empty($doctors)){ echo '<option value="">No Data</option>'; }else { ?>
                                                        <?php //echo "<pre>"; print_r($doctors); ?>
                                                        <?php foreach($doctors as $doctors_list) {?>
                                                            <option value="<?php echo $doctors_list['wc_d_code']; ?>"><?php echo $doctors_list[ 'wc_d_name']; ?></option>
                                                        <?php } ?>
                                                        <option value="other">Other</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <?php } ?>
                                            <div id="createleadguestspeaker" style="display:none;">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label>Name of the Speaker:</label>
                                                        <input type="text" class="form-control" name="wc_d_name_guest">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Emila of the Speaker:</label>
                                                        <input type="text" class="form-control" name="wc_d_email_guest">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Contact of the Speaker:</label>
                                                        <input type="text" class="form-control" name="wc_d_contact_guest">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Hospital Name of the Speaker:</label>
                                                        <input type="text" class="form-control" name="wc_d_hospital_guest">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Position of the Speaker:</label>
                                                        <input type="text" class="form-control" name="wc_d_position_guest">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Education of the Speaker:</label>
                                                        <input type="text" class="form-control" name="wc_d_education_guest">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Location of the Speaker:</label>
                                                        <input type="text" class="form-control" name="wc_d_location_guest">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Headquaters of the Speaker:</label>
                                                        <input type="text" class="form-control" name="wc_d_headquaters_guest">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Doctor Code of the Speaker:</label>
                                                        <input type="text" class="form-control" name="wc_d_code_sap_guest">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Upload Speaker Photo:</label>
                                                        <input type="file" name="wc_d_display_photo_guest" class="custom-file-input">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                             <!--Moderator -->
                                            <?php if(empty($this->input->get('empid'))){ ?>
                                            <div class="form-group">
                                                <label>Moderator Primary</label>
                                                <select class="form-control" id="wc_d_code_moderator_primary" name="wc_d_code_moderator_primary">
                                                    <option value="">Select moderator</option>
                                                </select>
                                            </div>
                                            <?php } else { ?>
                                            <div class="form-group">
                                                <label>Moderator Primary</label>
                                                <select class="form-control" id="wc_d_code_moderator_primary" name="wc_d_code_moderator_primary">
                                                    <option value="">Select moderator</option>
                                                    <?php if(empty($doctors)){ echo '<option value="">No Data</option>'; }else { ?>
                                                        <?php //echo "<pre>"; print_r($doctors); ?>
                                                        <?php foreach($doctors as $doctors_list) {?>
                                                            <option value="<?php echo $doctors_list['wc_d_code']; ?>"><?php echo $doctors_list[ 'wc_d_name']; ?></option>
                                                        <?php } ?>
                                                        <option value="other">Other</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <?php } ?>
                                            <div id="createmoderatorprimary" style="display:none;">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label>Name of the Moderator:</label>
                                                        <input type="text" class="form-control" name="wc_d_name_primary">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Emila of the Moderator:</label>
                                                        <input type="text" class="form-control" name="wc_d_email_primary">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Contact of the Moderator:</label>
                                                        <input type="text" class="form-control" name="wc_d_contact_primary">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Hospital Name of the Moderator:</label>
                                                        <input type="text" class="form-control" name="wc_d_hospital_primary">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Position of the Moderator:</label>
                                                        <input type="text" class="form-control" name="wc_d_position_primary">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Education of the Moderator:</label>
                                                        <input type="text" class="form-control" name="wc_d_education_primary">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Location of the Moderator:</label>
                                                        <input type="text" class="form-control" name="wc_d_location_primary">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Headquaters of the Moderator:</label>
                                                        <input type="text" class="form-control" name="wc_d_headquaters_primary">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Doctor Code of the Moderator:</label>
                                                        <input type="text" class="form-control" name="wc_d_code_sap_primary">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Upload Moderator Photo:</label>
                                                        <input type="file" name="wc_d_display_photo_primary" class="custom-file-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="add_secondary_moderator" style="display:none;">
                                                <label>If you want to add another Moderator <input type="checkbox" id="add_secondary_moderator_check" name="add_secondary_moderator_check"></label>
                                            </div>
                                            <?php if(empty($this->input->get('empid'))){ ?>
                                            <div class="form-group" id="wc_s_code_moderator_secondary" style="display:none;">
                                                <label>Moderator Secondary</label>
                                                <select class="form-control" id="wc_d_code_moderator_guest" name="wc_d_code_moderator_guest">
                                                    <option value="">Select moderator</option>
                                                </select>
                                            </div>
                                            <?php } else { ?>
                                            <div class="form-group" id="wc_s_code_moderator_secondary" style="display:none;">
                                                <label>Moderator Primary</label>
                                                <select class="form-control" id="wc_d_code_moderator_guest" name="wc_d_code_moderator_guest">
                                                    <option value="">Select moderator</option>
                                                    <?php if(empty($doctors)){ echo '<option value="">No Data</option>'; }else { ?>
                                                        <?php //echo "<pre>"; print_r($doctors); ?>
                                                        <?php foreach($doctors as $doctors_list) {?>
                                                            <option value="<?php echo $doctors_list['wc_d_code']; ?>"><?php echo $doctors_list[ 'wc_d_name']; ?></option>
                                                        <?php } ?>
                                                        <option value="other">Other</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <?php } ?>
                                            <div id="createmoderatorsecondary" style="display:none;">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label>Name of the Moderator:</label>
                                                        <input type="text" class="form-control" name="wc_d_name_secondary">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Emila of the Moderator:</label>
                                                        <input type="text" class="form-control" name="wc_d_email_secondary">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Contact of the Moderator:</label>
                                                        <input type="text" class="form-control" name="wc_d_contact_secondary">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Hospital Name of the Moderator:</label>
                                                        <input type="text" class="form-control" name="wc_d_hospital_secondary">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Position of the Moderator:</label>
                                                        <input type="text" class="form-control" name="wc_d_position_secondary">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Education of the Moderator:</label>
                                                        <input type="text" class="form-control" name="wc_d_education_secondary">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Location of the Moderator:</label>
                                                        <input type="text" class="form-control" name="wc_d_location_secondary">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Headquaters of the Moderator:</label>
                                                        <input type="text" class="form-control" name="wc_d_headquaters_secondary">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Doctor Code of the Moderator:</label>
                                                        <input type="text" class="form-control" name="wc_d_code_sap_secondary">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Upload Moderator Photo:</label>
                                                        <input type="file" name="wc_d_display_photo_secondary" class="custom-file-input">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group d-none">
                                            <label>If you want to promote a Brand <input type="checkbox" id="wc_s_brand_promote_check"></label>
                                        </div>
                                        <div class="form-group d-none" id="wc_s_brand_promote" style="display:none;">
                                            <label>Brand Promotion</label>
                                            <select class="form-control" id="wc_s_brand_promote_select" name="wc_s_brand_promote_select">
                                                <option value="">Select Brand</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="wc_w_invitation_create" style="display:none;">
                                            <label>If you have a webinar invitation design already kindly upload <input type="checkbox" id="wc_w_invitation_create_check" name="wc_w_invitation_create_check"></label>
                                        </div>
                                        <div class="form-group" id="wc_w_invitation_notes" style="display:none;">
                                            <label>Write design requirements or inputs</label>
                                            <textarea class="form-control" name="wc_w_notes" rows="4" cols="50"></textarea>
                                        </div>
                                        <div class="form-group" id="wc_w_invitation_upload" style="display:none;">
                                            <label>Upload Invitation</label>
                                            <input type="file" name="wc_w_invitation" class="custom-file-input">
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="sticky-top ">
                                        <div class="create_box boxshadow">
                                            <h3>Requester info</h3>
                                            <?php if(empty($this->input->get('empid'))){ ?>
                                                <div class="form-group">
                                                    <label for="division">Division</label>
                                                    <select class="form-control" id="wc_di_code" name="wc_di_code">
                                                        <option value="">Select division</option>
                                                        <?php if(empty($divisions)){ echo '<option value="">No Data</option>'; }else { ?>
                                                            <?php //echo "<pre>"; print_r($divisions); ?>
                                                            <?php foreach($divisions as $divisions_list) {?>
                                                                <option value="<?php echo $divisions_list['wc_di_code']; ?>"><?php echo $divisions_list[ 'wc_di_name']; ?></option>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Organizer</label>
                                                    <select class="form-control" name="wc_w_requester">
                                                        <option value="">Select requester</option>
                                                    </select>
                                                </div>
                                            <?php } else { ?>
                                                <div class="form-group">
                                                    <label>Division</label>
                                                    <input readonly type="text" class="form-control" name="wc_di_code" value="<?php echo $this->input->get('division'); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Organizer Emp ID</label>
                                                    <input readonly type="text" class="form-control" name="wc_o_empid" value="<?php echo $this->input->get('empid'); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Organizer Name</label>
                                                    <input readonly type="text" class="form-control" name="wc_o_name" value="<?php echo $this->input->get('empname'); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Organizer Email</label>
                                                    <input readonly type="text" class="form-control" name="wc_o_email" value="<?php echo $this->input->get('empemail'); ?>">
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <input class="btn btn-primary" type="submit" id="submit" name="submit" value="Submit">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Done -->
                            
                            
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <section class="footer_rw ">
        <div class="container">
            <div class="row">
                <div class="footer_text w-100">
                    <p>Technology and digital Partner <a href="https://www.heterohealthcare.com/">Hetero Healthcare Limited</a></p>
                </div>
            </div>
        </div>
    </section>
    <!--  JavaScript -->
    <?php $this->load->view('layout/js');  ?>
    <?php $this->load->view('layout/daterange');  ?>
    <script>
        $(function() {
            $('input[name="wc_w_datetime"]').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(24),
                locale:{
                    format: 'Y/M/DD hh:mm A'
                }
            });
        });
        $(document).ready(function () {
            $('input[name="contact"]').keyup(function (e) {
                if (/\D/g.test(this.value)) {
                    // Filter non-digits from input value.
                    this.value = this.value.replace(/\D/g, '');
                }
            });
            // Setup form validation on the #register-form element

            $("#request_webinar").validate({
                // Specify the validation rules
                rules: {
                    /*wc_w_topic: {
                        required: true
                    },
                    wc_w_subtitle:{
                        required: true
                    },
                    wc_w_description:{
                        required: true
                    },
                    wc_w_datetime:{
                        required: true
                    },
                    wc_di_code:{
                        required: true
                    },
                    wc_w_requester:{
                        required: true
                    },
                    wc_w_platform:{
                        required: true
                    },
                    wc_d_code_lead:{
                        required: true
                    },
                    wc_d_code_moderator_primary:{
                        required: true
                    }*/
                },
                // Specify the validation error messages
                messages: {
                    wc_w_topic: {
                        required: "Please enter webinar topic",                        
                    },
                },
                //Code Send to DB
                submitHandler: function(form) { // for demo
        			//alert('Hi');
        			//if($("#submit").val("Processing...")){
        			    //$("#submit").prop('disabled', 'disabled');
        			//}
                    var myForm = document.getElementById('request_webinar');
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url();?>Home/request_webinar_submission',
                        dataType: 'text', // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: new FormData(myForm),
                        success: function(data) {
    						//window.location = data;
                        }
                    });
                    return false;
                }
            });
        });
    </script>
    <script>
        $('#wc_w_event').on('change', function() {
            var selectedOption = $(this).val();
            
            // Check if the "Other" option is selected
            if (selectedOption === 'NEW') {
                // Show the div for entering Requester Name and Email
                $('#wc_w_event_NEW').show();
            } else {
                // Hide the div if "Other" is not selected
                $('#wc_w_event_NEW').hide();
            }
        });
    
        $('#wc_w_platform').on('change', function() {
            var selectedOption = $(this).val();
            
            // Check if the "Other" option is selected
            if (selectedOption === 'Webinar') {
                // Show the div for entering Requester Name and Email
                $('#wc_w_invitation_create').show();
                $('#wc_w_invitation_notes').show();
            } else {
                // Hide the div if "Other" is not selected
                $('#wc_w_invitation_create').hide();
                $('#wc_w_invitation_notes').hide();
                $('#wc_w_invitation_upload').hide();
            }
        });
        
        $('#wc_w_invitation_create_check').on('change', function() {
            if ($(this).is(':checked')) {
                $('#wc_w_invitation_upload').show();
                $('#wc_w_invitation_notes').hide();
            } else {
                // Hide the div when the checkbox is unchecked
                $('#wc_w_invitation_upload').hide();
                $('#wc_w_invitation_notes').show();
            }
        });
        
    	$('#wc_di_code').on('change', function() {
    	    //alert( this.value );
    		var wc_di_code = this.value;
    		$.ajax({
    			type: "POST",
    			url: "<?php echo base_url();?>Home/get_moderator_primary",
    			//dataType: 'html',
    			dataType: "json",
    			data: {wc_di_code: wc_di_code},
				success: function(data){
                    // Clear previous options except the first one
    				$('#wc_d_code_moderator_primary').find('option').not(':first').remove();
    				
    	            // Append new options from the AJAX response
    				$.each(data, function(key, value) {
    					$('select[name="wc_d_code_moderator_primary"]').append('<option value="'+ value.wc_s_code +'">'+ value.wc_s_name +'</option>');
    			    }); 
    			    
    			    // Append the "Other" option as the last option
                    $('select[name="wc_d_code_moderator_primary"]').append('<option value="other">Other</option>');

				}       
			});
    	});
    	
    	$('#wc_di_code').on('change', function() {
    	    //alert( this.value );
    		var wc_di_code = this.value;
    		$.ajax({
    			type: "POST",
    			url: "<?php echo base_url();?>Home/get_speaker_lead",
    			//dataType: 'html',
    			dataType: "json",
    			data: {wc_di_code: wc_di_code},
				success: function(data){
                    // Clear previous options except the first one
    				$('#wc_d_code_lead').find('option').not(':first').remove();
    				
    	            // Append new options from the AJAX response
    				$.each(data, function(key, value) {
    					$('select[name="wc_d_code_lead"]').append('<option value="'+ value.wc_d_code +'">'+ value.wc_d_name +'</option>');
    			    }); 
    			    
    			    // Append the "Other" option as the last option
                    $('select[name="wc_d_code_lead"]').append('<option value="other">Other</option>');

				}       
			});
    	});
    	
    	//Get requester
    	$('#wc_di_code').on('change', function() {
    	    //alert( this.value );
    		var wc_di_code = this.value;
    		$.ajax({
    			type: "POST",
    			url: "<?php echo base_url();?>Home/get_requester",
    			//dataType: 'html',
    			dataType: "json",
    			data: {wc_di_code: wc_di_code},
				success: function(data){
                    // Clear previous options except the first one
    				$('#wc_w_requester').find('option').not(':first').remove();
    				
    	            // Append new options from the AJAX response
    				$.each(data, function(key, value) {
    					$('select[name="wc_w_requester"]').append('<option value="'+ value.wc_o_code +'">'+ value.wc_o_name +'</option>');
    			    }); 
    			    
    			    // Append the "Other" option as the last option
                    //$('select[name="wc_w_requester"]').append('<option value="other">Other</option>');

				}       
			});
    	});

        $('#wc_d_code_lead').on('change', function() {
            var selectedOption = $(this).val();
            
            // Check if the "Other" option is selected
            if (selectedOption === 'other') {
                // Show the div for entering Requester Name and Email
                $('#createleadspeaker').show();
            } else {
                // Hide the div if "Other" is not selected
                $('#createleadspeaker').hide();
            }
        });
        
        $('#wc_d_code_lead').on('change', function() {
            // Show the div for entering Requester Name and Email when any option is selected
            $('#add_guest_speaker').show();
        });
        
        $('#add_guest_speaker_check').on('change', function() {
            if ($(this).is(':checked')) {
                //alert('Hi');
                // Show the div when the checkbox is checked
                $('#wc_d_code_guest').show();
        
                // Get the values from the respective inputs or dropdowns
                var wc_di_code = $('#wc_di_code').val(); // Assuming wc_di_code is an input or select element
                var wc_d_code_lead = $('#wc_d_code_lead').val(); // Assuming wc_d_code_lead is an input or select element
                
                // Check if values are properly fetched before sending AJAX request
                if (wc_di_code && wc_d_code_lead) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>Home/get_speaker_guest",
                        dataType: "json",
                        data: {
                            wc_di_code: wc_di_code,
                            wc_d_code_lead: wc_d_code_lead
                        },
                        success: function(data) {
                            // Clear previous options except the first one
                            $('#wc_d_code_guest_select').find('option').not(':first').remove();
        
                            // Append new options from the AJAX response
                            $.each(data, function(key, value) {
                                $('select[name="wc_d_code_guest"]').append('<option value="' + value.wc_d_code + '">' + value.wc_d_name + '</option>');
                            });
        
                            // Append the "Other" option as the last option
                            $('select[name="wc_d_code_guest"]').append('<option value="other">Other</option>');
                        },
                        error: function(xhr, status, error) {
                            console.error("Error in AJAX request:", error);
                        }
                    });
                } else {
                    console.error("Values for wc_di_code or wc_d_code_lead are missing.");
                }
        
            } else {
                // Hide the div when the checkbox is unchecked
                $('#wc_d_code_guest').hide();
            }
        });
        $('#wc_d_code_guest_select').on('change', function() {
            var selectedOption = $(this).val();
            
            // Check if the "Other" option is selected
            if (selectedOption === 'other') {
                // Show the div for entering Requester Name and Email
                $('#createleadguestspeaker').show();
            } else {
                // Hide the div if "Other" is not selected
                $('#createleadguestspeaker').hide();
            }
        });
        
        $('#wc_d_code_moderator_primary').on('change', function() {
            var selectedOption = $(this).val();
            
            // Check if the "Other" option is selected
            if (selectedOption === 'other') {
                // Show the div for entering Requester Name and Email
                $('#createmoderatorprimary').show();
            } else {
                // Hide the div if "Other" is not selected
                $('#createmoderatorprimary').hide();
            }
        });
        
        $('#wc_d_code_moderator_primary').on('change', function() {
            // Show the div for entering Requester Name and Email when any option is selected
            $('#add_secondary_moderator').show();
        });
        
        $('#add_secondary_moderator_check').on('change', function() {
            if ($(this).is(':checked')) {
                //alert('Hi');
                //alert ($('#wc_di_code').val());
                //alert ($('#wc_d_code_moderator_primary').val());
                // Show the div when the checkbox is checked
                $('#wc_s_code_moderator_secondary').show();
        
                // Get the values from the respective inputs or dropdowns
                var wc_di_code = $('#wc_di_code').val(); // Assuming wc_di_code is an input or select element
                var wc_d_code_moderator_primary = $('#wc_d_code_moderator_primary').val(); // Assuming wc_d_code_lead is an input or select element
                
                // Check if values are properly fetched before sending AJAX request
                if (wc_di_code && wc_d_code_moderator_primary) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>Home/get_moderator_secondary",
                        dataType: "json",
                        data: {
                            wc_di_code: wc_di_code,
                            wc_d_code_moderator_primary: wc_d_code_moderator_primary
                        },
                        success: function(data) {
                            // Clear previous options except the first one
                            $('#wc_d_code_moderator_guest').find('option').not(':first').remove();
        
                            // Append new options from the AJAX response
                            $.each(data, function(key, value) {
                                $('select[name="wc_d_code_moderator_guest"]').append('<option value="' + value.wc_s_code + '">' + value.wc_s_name + '</option>');
                            });
        
                            // Append the "Other" option as the last option
                            $('select[name="wc_d_code_moderator_guest"]').append('<option value="other">Other</option>');
                        },
                        error: function(xhr, status, error) {
                            console.error("Error in AJAX request:", error);
                        }
                    });
                } else {
                    console.error("Values for wc_di_code or wc_d_code_moderator_primary are missing.");
                }
        
            } else {
                // Hide the div when the checkbox is unchecked
                $('#wc_s_code_moderator_secondary').hide();
            }
        });
        
        $('#wc_d_code_moderator_guest').on('change', function() {
            var selectedOption = $(this).val();
            
            // Check if the "Other" option is selected
            if (selectedOption === 'other') {
                // Show the div for entering Requester Name and Email
                $('#createmoderatorsecondary').show();
            } else {
                // Hide the div if "Other" is not selected
                $('#createmoderatorsecondary').hide();
            }
        });
        
        $('#wc_s_brand_promote_check').on('change', function() {
            if ($(this).is(':checked')) {
                //alert('Hi');
                $('#wc_s_brand_promote').show();
                
                // Get the values from the respective inputs or dropdowns
                var wc_di_code = $('#wc_di_code').val(); // Assuming wc_di_code is an input or select element
                
                // Check if values are properly fetched before sending AJAX request
                if (wc_di_code && wc_d_code_moderator_primary) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>Home/get_promote_brandlist",
                        dataType: "json",
                        data: {
                            wc_di_code: wc_di_code
                        },
                        success: function(data) {
                            // Clear previous options except the first one
                            $('#wc_s_brand_promote_select').find('option').not(':first').remove();
        
                            // Append new options from the AJAX response
                            $.each(data, function(key, value) {
                                $('select[name="wc_s_brand_promote_select"]').append('<option value="' + value.wc_s_code + '">' + value.wc_s_name + '</option>');
                            });
        
                            // Append the "Other" option as the last option
                            $('select[name="wc_s_brand_promote_select"]').append('<option value="other">Other</option>');
                        },
                        error: function(xhr, status, error) {
                            console.error("Error in AJAX request:", error);
                        }
                    });
                } else {
                    console.error("Values for wc_di_code are missing.");
                }
                
            } else {
                // Hide the div when the checkbox is unchecked
                $('#wc_s_brand_promote').hide();
            }
        });
        
        
        
    </script>
</body>
</html>
<?php //} ?>