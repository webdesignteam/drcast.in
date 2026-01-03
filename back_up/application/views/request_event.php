<?php //if(empty($this->input->get('empid'))){ echo "Requested data is not being fetched from iConnect. Please contact the administrator for assistance."; } else { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layout/meta');  ?>
	<?php $this->load->view('layout/styles');  ?>

</head>
<body>
    
      <?php $this->load->view('layout/nav');  ?>
    <?php $this->load->view('layout/leftnav');  ?>
    
    
<main class="main_page_view__content over_flow">
        <section class="top_cont">
            <div class="container">
                <div class="row">
                <div class="col-sm-12">
                <div class="top_product">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="top_product_content">
                               <div class="ancor_txt">
                                    <p>Request a Event                                   </p>
                                    <a href="<?php echo base_url();?>request-event">
                                        <img src="<?php echo base_url();?>/assets/img/left_arrow.png" alt="Back"><span>List of blogs</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="custom_form_div">
                            <form id="request_webinar" method="post" enctype="multipart/form-data">
                             <div class="row ct_line">
                                 <div class="col-sm-12">
                                  <div class="create_box boxshadow">
                                      <form id="request_webinar" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Type of event</label>
                            <select class="form-control" id="wc_w_event" name="wc_w_event">
                                <option value="">Select event</option>
                                <option value="NewEvent">Request new event</option>
                                <option value="MockRun" disabled>Request mock run</option>
                                <option value="Postpone" disabled>Postpone</option>
                                <option value="Prepone" disabled>Prepone</option>
                                <option value="Cancelled" disabled>Cancelled</option>
                                <option value="Changes" disabled>Content changes</option>
                                <option value="InvitationUpdate" disabled>Invitation update</option>
                            </select>
                            <small id="" class="form-text text-muted">If you would like to create a new webinar, make changes, or request a mock run, please select the event type in the form below.</small>
                        </div>
                        
                        
                        <?php //echo "<pre>"; print_r($this->session->userdata); ?>
                        <?php if($this->session->userdata('wc_u_type') == 'Admin' OR $this->session->userdata('wc_u_type') == 'Employee'){ ?>
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
                                <select class="form-control" name="wc_w_organizer">
                                    <option value="">Select requester</option>
                                </select>
                            </div>
                            
                        <?php } else{ } ?>
                       
                        
                        <!-- Done -->

                        <div id="wc_w_event_NewEvent" style="display:none;">
                            <div class="form-group">
                                <label>Platform</label>
                                <select class="form-control" id="wc_w_platform" name="wc_w_platform">
                                    <option value="">Select platform</option>
                                    <option value="ZoomMeeting" disabled>Zoom Meeting</option>
                                    <option value="YouTubeStreaming" disabled>YouTube Streaming (YouTube+Zoom)</option>
                                    <option value="FacebookStreaming" disabled>Facebook Streaming (Facebook+Zoom)</option>
                                    <option value="WebinarPortal">Webinar Portal (Web Pages+YouTube+Zoom)</option>
                                    <option value="WebinarPortalFB" disabled>Facebook Webinar Portal (Web Pages+Facebook+Zoom)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Event Topic</label>
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
                                <label>Schedule Event Date time</label>
                                <div class="middle_flt datebtn">
                                    <i class="fa fa-calendar"></i>&nbsp;<span></span> <i class="fa fa-caret-down"></i><input id="wc_w_datetime" type="text" name="wc_w_datetime" value="" placeholder="Select Date" class="dtrangeinput valid w-100" aria-invalid="false">
                                </div>
                                <small class="form-text text-muted">Choose a date and time for the event.</small>
                            </div>
                            
                            
                            <!-- Speaker lead spaker 
                            <div class="form-group">
                                <label>Select Lead Speaker</label>
                                <select class="form-control" id="wc_d_code_lead" name="wc_d_code_lead">
                                    <option value="">Select speaker</option>
                                    <?php if(empty($doctors)){ echo '<option value="">No Data</option>'; }else { ?>
                                        <?php echo "<pre>"; print_r($doctors); ?>
                                        <?php foreach($doctors as $doctors_list) {?>
                                            <option value="<?php echo $doctors_list['wc_d_code']; ?>"><?php echo $doctors_list[ 'wc_d_name']; ?></option>
                                        <?php } ?>
                                        <option value="other">Other</option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            
                            <div id="createleadspeaker" style="display:none;">
                                <div class="form-group">
                                    <label>Name of the Speaker:</label>
                                    <input type="text" class="form-control" name="wc_d_name_lead">
                                </div>
                                <div class="form-group">
                                    <label>Email of the Speaker:</label>
                                    <input type="text" class="form-control" name="wc_d_email_lead">
                                </div>
                                <div class="form-group">
                                    <label>Contact of the Speaker:</label>
                                    <input type="text" class="form-control" name="wc_d_contact_lead">
                                </div>
                                <div class="form-group">
                                    <label>Hospital Name of the Speaker:</label>
                                    <input type="text" class="form-control" name="wc_d_hospital_lead">
                                </div>
                                <div class="form-group">
                                    <label>Position of the Speaker:</label>
                                    <input type="text" class="form-control" name="wc_d_position_lead">
                                </div>
                                <div class="form-group">
                                    <label>Education of the Speaker:</label>
                                    <input type="text" class="form-control" name="wc_d_education_lead">
                                </div>
                                <div class="form-group">
                                    <label>Location of the Speaker:</label>
                                    <input type="text" class="form-control" name="wc_d_location_lead">
                                </div>
                                <div class="form-group">
                                    <label>Headquaters of the Speaker:</label>
                                    <input type="text" class="form-control" name="wc_d_headquaters_lead">
                                </div>
                                <div class="form-group">
                                    <label>Doctor Code of the Speaker:</label>
                                    <input type="text" class="form-control" name="wc_d_code_sap_lead">
                                </div>
                                <div class="form-group">
                                    <label>Upload Speaker Photo:</label>
                                    <input type="file" name="wc_d_display_photo_lead">
                                </div>
                            </div>
                            <div class="form-group" id="add_guest_speaker" style="display:none;">
                                <label>If you want to add another Speaker <input type="checkbox" id="add_guest_speaker_check" name="add_guest_speaker_check"></label>
                            </div>
                            
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
                            
                            <div id="createleadguestspeaker" style="display:none;">
                                <div class="form-group">
                                    <label>Name of the Speaker:</label>
                                    <input type="text" class="form-control" name="wc_d_name_guest">
                                </div>
                                <div class="form-group">
                                    <label>Emila of the Speaker:</label>
                                    <input type="text" class="form-control" name="wc_d_email_guest">
                                </div>
                                <div class="form-group">
                                    <label>Contact of the Speaker:</label>
                                    <input type="text" class="form-control" name="wc_d_contact_guest">
                                </div>
                                <div class="form-group">
                                    <label>Hospital Name of the Speaker:</label>
                                    <input type="text" class="form-control" name="wc_d_hospital_guest">
                                </div>
                                <div class="form-group">
                                    <label>Position of the Speaker:</label>
                                    <input type="text" class="form-control" name="wc_d_position_guest">
                                </div>
                                <div class="form-group">
                                    <label>Education of the Speaker:</label>
                                    <input type="text" class="form-control" name="wc_d_education_guest">
                                </div>
                                <div class="form-group">
                                    <label>Location of the Speaker:</label>
                                    <input type="text" class="form-control" name="wc_d_location_guest">
                                </div>
                                <div class="form-group">
                                    <label>Headquaters of the Speaker:</label>
                                    <input type="text" class="form-control" name="wc_d_headquaters_guest">
                                </div>
                                <div class="form-group">
                                    <label>Doctor Code of the Speaker:</label>
                                    <input type="text" class="form-control" name="wc_d_code_sap_guest">
                                </div>
                                <div class="form-group">
                                    <label>Upload Speaker Photo:</label>
                                    <input type="file" name="wc_d_display_photo_guest">
                                </div>
                            </div>-->
                            
                            <!-- Moderator Primary
                            <?php if(empty($this->input->get('empid'))){ ?>
                            
                            <div class="form-group">
                                <label>Moderator Primary</label>
                                <select class="form-control" id="wc_d_code_moderator_primary" name="wc_d_code_moderator_primary">
                                    <option value="">Select moderator</option>
                                    <?php if(empty($doctors)){ echo '<option value="">No Data</option>'; }else { ?>
                                        <?php echo "<pre>"; print_r($doctors); ?>
                                        <?php foreach($doctors as $doctors_list) {?>
                                            <option value="<?php echo $doctors_list['wc_d_code']; ?>"><?php echo $doctors_list[ 'wc_d_name']; ?></option>
                                        <?php } ?>
                                        <option value="other">Other</option>
                                    <?php } ?>
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
                                <div class="form-group">
                                    <label>Name of the Moderator:</label>
                                    <input type="text" class="form-control" name="wc_d_name_primary">
                                </div>
                                <div class="form-group">
                                    <label>Emila of the Moderator:</label>
                                    <input type="text" class="form-control" name="wc_d_email_primary">
                                </div>
                                <div class="form-group">
                                    <label>Contact of the Moderator:</label>
                                    <input type="text" class="form-control" name="wc_d_contact_primary">
                                </div>
                                <div class="form-group">
                                    <label>Hospital Name of the Moderator:</label>
                                    <input type="text" class="form-control" name="wc_d_hospital_primary">
                                </div>
                                <div class="form-group">
                                    <label>Position of the Moderator:</label>
                                    <input type="text" class="form-control" name="wc_d_position_primary">
                                </div>
                                <div class="form-group">
                                    <label>Education of the Moderator:</label>
                                    <input type="text" class="form-control" name="wc_d_education_primary">
                                </div>
                                <div class="form-group">
                                    <label>Location of the Moderator:</label>
                                    <input type="text" class="form-control" name="wc_d_location_primary">
                                </div>
                                <div class="form-group">
                                    <label>Headquaters of the Moderator:</label>
                                    <input type="text" class="form-control" name="wc_d_headquaters_primary">
                                </div>
                                <div class="form-group">
                                    <label>Doctor Code of the Moderator:</label>
                                    <input type="text" class="form-control" name="wc_d_code_sap_primary">
                                </div>
                                <div class="form-group">
                                    <label>Upload Moderator Photo:</label>
                                    <input type="file" name="wc_d_display_photo_primary">
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
                                    <?php if(empty($doctors)){ echo '<option value="">No Data</option>'; }else { ?>
                                        <?php //echo "<pre>"; print_r($doctors); ?>
                                        <?php foreach($doctors as $doctors_list) {?>
                                            <option value="<?php echo $doctors_list['wc_d_code']; ?>"><?php echo $doctors_list[ 'wc_d_name']; ?></option>
                                        <?php } ?>
                                        <option value="other">Other</option>
                                    <?php } ?>
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
                                <div class="form-group">
                                    <label>Name of the Moderator:</label>
                                    <input type="text" class="form-control" name="wc_d_name_secondary">
                                </div>
                                <div class="form-group">
                                    <label>Emila of the Moderator:</label>
                                    <input type="text" class="form-control" name="wc_d_email_secondary">
                                </div>
                                <div class="form-group">
                                    <label>Contact of the Moderator:</label>
                                    <input type="text" class="form-control" name="wc_d_contact_secondary">
                                </div>
                                <div class="form-group">
                                    <label>Hospital Name of the Moderator:</label>
                                    <input type="text" class="form-control" name="wc_d_hospital_secondary">
                                </div>
                                <div class="form-group">
                                    <label>Position of the Moderator:</label>
                                    <input type="text" class="form-control" name="wc_d_position_secondary">
                                </div>
                                <div class="form-group">
                                    <label>Education of the Moderator:</label>
                                    <input type="text" class="form-control" name="wc_d_education_secondary">
                                </div>
                                <div class="form-group">
                                    <label>Location of the Moderator:</label>
                                    <input type="text" class="form-control" name="wc_d_location_secondary">
                                </div>
                                <div class="form-group">
                                    <label>Headquaters of the Moderator:</label>
                                    <input type="text" class="form-control" name="wc_d_headquaters_secondary">
                                </div>
                                <div class="form-group">
                                    <label>Doctor Code of the Moderator:</label>
                                    <input type="text" class="form-control" name="wc_d_code_sap_secondary">
                                </div>
                                <div class="form-group">
                                    <label>Upload Moderator Photo:</label>
                                    <input type="file" name="wc_d_display_photo_secondary">
                                </div>
                            </div>-->
                            
                            
                            <!--<div class="form-group d-none">
                                <label>If you want to promote a Brand <input type="checkbox" id="wc_s_brand_promote_check"></label>
                            </div>
                            <div class="form-group d-none" id="wc_s_brand_promote" style="display:none;">
                                <label>Brand Promotion</label>
                                <select class="form-control" id="wc_s_brand_promote_select" name="wc_s_brand_promote_select">
                                    <option value="">Select Brand</option>
                                </select>
                            </div>-->
                            
                            <div class="form-group" id="wc_w_invitation_create" style="display:none;">
                                <label>If you have a event invitation design already kindly upload <input type="checkbox" id="wc_w_invitation_create_check" name="wc_w_invitation_create_check"></label>
                            </div>
                            <div class="form-group" id="wc_w_invitation_notes" style="display:none;">
                                <label>Write design requirements or inputs</label>
                                <textarea class="form-control" name="wc_w_notes" rows="4" cols="50"></textarea>
                            </div>
                            <div class="form-group" id="wc_w_invitation_upload" style="display:none;">
                                <label>Upload Invitation</label>
                                <input type="file" name="wc_w_invitation">
                            </div>
                        </div>
                        
                        
                    </form>
                                  </div>
                                  </div>
                            </div>
                            <div class="rtbtn text-right">
                                <input class="btn btn-primary custom_add" type="submit" id="submit" name="submit" value="Submit">
                           
                        </div>
                            </form>
                    </div>
                </div>
               
                </div>
                </div>
            </div>
         </section>
</main>
    
    
    
    
    <section class="my-5 requestwebinar">
        <div class="container">
            <div class="row">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h1></h1>
                    
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
                    wc_w_organizer:{
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
                        required: "Please enter event topic",                        
                    },
                },

            });
        });
    </script>
    <script>
        $('#wc_w_event').on('change', function() {
            var selectedOption = $(this).val();
            
            // Check if the "Other" option is selected
            if (selectedOption === 'NewEvent') {
                // Show the div for entering Requester Name and Email
                $('#wc_w_event_NewEvent').show();
            } else {
                // Hide the div if "Other" is not selected
                $('#wc_w_event_NewEvent').hide();
            }
        });
    
        $('#wc_w_platform').on('change', function() {
            var selectedOption = $(this).val();
            
            // Check if the "Other" option is selected
            if (selectedOption === 'WebinarPortal') {
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
        
    	/*$('#wc_di_code').on('change', function() {
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
    	});*/
    	
    	/*$('#wc_di_code').on('change', function() {
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
    	});*/
    	
    	//Get requester
    	$('#wc_di_code').on('change', function() {
    	    //alert( this.value );
    		var wc_di_code = this.value;
    		$.ajax({
    			type: "POST",
    			url: "<?php echo base_url();?>Home/get_organizer",
    			//dataType: 'html',
    			dataType: "json",
    			data: {wc_di_code: wc_di_code},
				success: function(data){
                    // Clear previous options except the first one
    				$('#wc_w_organizer').find('option').not(':first').remove();
    				
    	            // Append new options from the AJAX response
    				$.each(data, function(key, value) {
    					$('select[name="wc_w_organizer"]').append('<option value="'+ value.wc_u_code +'">'+ value.wc_u_display_name +'</option>');
    			    });
    			    
    			    // Append the "Other" option as the last option
                    //$('select[name="wc_w_organizer"]').append('<option value="other">Other</option>');

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