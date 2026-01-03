<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layout/meta');?>
    <?php $this->load->view('layout/styles');?>
    <style>


.customtable thead th {
    position: sticky;
    top: 0;
    z-index: 2;
    background: #fff;
}
.modal-content{
    /* border-radius: 12px; */
    background: linear-gradient(145deg, #ffffff, #f5f5f5);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}
.btn_style button{
    background: #ed0404;
    border: 0px;
    border-radius: 6px;
    padding: 6px 10px;
    color: #fff;
    font-weight: 600;
}
.btn_style input{
    background: #000;
    border: 0px;
    padding: 6px 10px;
    border-radius: 6px;
    color: #fff;
    font-weight: 500;
}
.close span{
    background: red;
    padding: 1px 10px;
    border-radius: 50%;
    color: #fff;
}
input[type="checkbox"] {
    width: 20px;
    height: 20px;
    appearance: none;
    border: 2px solid #9bd8a2;
    border-radius: 4px;
    cursor: pointer;
    position: relative;
}

/* Add right checkmark */
input[type="checkbox"]:checked::after {
    content: "✓";
    color: #57a865;
    font-size: 16px;
    font-weight: bold;
    position: absolute;
    left: 3px;
    top: -4px;
}

input[type="checkbox"]:checked {
    background: #daf5dd;
    border-color: #82c98a;
}
.middle_flt.datebtn{
        display: flex;
    align-items: center;
}

.released_color{
    background-color: #81b7f1 !important;
}
form.md_filters{
        flex-wrap: wrap;
        justify-content: unset;
}
	</style>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/pagination.css?Version=<?php echo Version; ?>" />
</head>
<body>
    <?php $this->load->view('layout/nav');  ?>
    <?php $this->load->view('layout/leftnav');  ?>
    <main class="main_page_view__content">
        <section class="">
            <div class="container-fluid">
                <div class="top_product">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="top_product_content">
                                <h4>List of Requests</h4>
                                <div class="right_btn">
                                    <div id="buttons" class="datbtns"></div>
                                    <a href="<?php echo base_url();?>request-event" class="btn custom_add">Event Request</a>
                                </div>
                            </div>
                            <!-- Date filter -->
                            <!--<div class="middle_date_picker">-->
                            <!--    <form id="filters1" name="filters1" method="post" class="md_filters" novalidate="novalidate">-->
                            <!--        <div class="middle_flt datebtn">-->
                            <!--            <i class="fa fa-calendar"></i>&nbsp;<span></span>-->
                            <!--            <i class="fa fa-caret-down"></i>-->
                            <!--            <input id="daterangepicker" type="text" name="daterange" value="<?php if(!empty($date_from) && !empty($date_to)){ echo $date_from.' - '.$date_to; } ?>" placeholder="Select Date" class="dtrangeinput valid" aria-invalid="false" autocomplete="off">-->
                            <!--        </div>-->
                            <!--        <input type="submit" value="Search" class="btn datebtn" name="search">-->
                            <!--        <a href="#" id="clear" class="clear_filter">Clear</a>-->
                            <!--    </form>-->
                            <!--</div>-->
                            <div class="middle_date_picker">
                                <form id="filters1" name="filters1" method="post" class="md_filters" novalidate="novalidate">
                                    <div class="middle_flt datebtn">
                                        <i class="fa fa-calendar"></i>&nbsp;<span></span>
                                        <i class="fa fa-caret-down"></i>
                                        <input id="daterangepicker" type="text" name="daterange" value="<?php if(!empty($date_from) && !empty($date_to)){ echo $date_from.' - '.$date_to; } ?>" placeholder="Select Date" class="dtrangeinput valid" aria-invalid="false" autocomplete="off">
                                    </div>
                                    <select class="datebtn" name="wc_di_code" id="wc_di_code">
                                        <?php if(!empty($wc_di_code)){ ?><option value="<?php echo $wc_di_code; ?>"><?php echo $wc_di_name; ?></option><?php } ?>
                                        <?php if(empty($divisionslist)) { } else { ?>
                                            <option value="">Select Division</option>
                                                <?php foreach($divisionslist as $divisionslist) { ?>
                                                    <option value="<?php echo $divisionslist['wc_di_code']; ?>">
                                                <?php echo $divisionslist['wc_di_name']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <select class="datebtn" name="wc_u_code" id="wc_u_code">
                                        <?php if(!empty($wc_u_code)){ ?><option value="<?php echo $wc_u_code; ?>"><?php echo $wc_u_display_name; ?></option><?php } ?>
                                        <?php if(empty($organizerlist)) { } else { ?>
                                            <option value="">Select Organizer</option>
                                                <?php foreach($organizerlist as $organizerlist) { ?>
                                                    <option value="<?php echo $organizerlist['wc_u_code']; ?>">
                                                <?php echo $organizerlist['wc_u_display_name']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <select class="datebtn" name="wc_u_code_technician" id="wc_u_code_technician">
                                        <?php if(!empty($wc_u_code_technician)){ ?><option value="<?php echo $wc_u_code_technician; ?>"><?php echo $wc_u_display_name_technician; ?></option><?php } ?>
                                        <?php if(empty($technicians)) { } else { ?>
                                            <option value="">Select Technician</option>
                                                <?php foreach($technicians as $technicians_filter) { ?>
                                                    <option value="<?php echo $technicians_filter['wc_u_code']; ?>">
                                                <?php echo $technicians_filter['wc_u_display_name']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <select class="datebtn" name="wc_w_release_details" id="wc_w_release_details">
                                        <?php if(!empty($wc_w_release_details)){ ?><option value="<?php echo $wc_w_release_details; ?>"><?php echo $wc_w_release_details; ?></option><?php } ?>
                                        <option value="">Select Released Status</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Pending Re-Release">Pending Re-Release</option>
                                        <option value="Released">Released</option>
                                    </select>
                                    <select class="datebtn" name="wc_w_hosting_details" id="wc_w_hosting_details">
                                        <?php if(!empty($wc_w_hosting_details)){ ?><option value="<?php echo $wc_w_hosting_details; ?>"><?php echo $wc_w_hosting_details; ?></option><?php } ?>
                                        <option value="">Select Hosting Status</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                    <select class="datebtn" name="wc_w_video_backup_details" id="wc_w_video_backup_details">
                                        <?php if(!empty($wc_w_video_backup_details)){ ?><option value="<?php echo $wc_w_video_backup_details; ?>"><?php echo $wc_w_video_backup_details; ?></option><?php } ?>
                                        <option value="">Select Video Status</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Updated">Updated</option>
                                    </select>
                                    <input type="submit" value="Filters" class="btn datebtn" name="search">
                                    <a href="#" id="clear" class="clear_filter">Clear</a>
                                </form>
                            </div>
                        </div>
                    </div>
               
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-sm-12 pl-0 pr-0">
                                    <div class="table_content">
                                        <div class="filters custom_flex_div">
                                            <div class="entridiv custom_row">
                                                <span>Show entries</span>
                                                   <select id="rowsPerPage" class="form-control">
                                                  <option value="5">5</option>
                                                  <option value="10">10</option>
                                                  <option value="20">20</option>
                                                </select>
                                            </div>
                                            <form id="filters2" name="filters2" method="post">
                                                <input type="submit" class="btn btn-secondary " name="all" value="All">
                                                <input type="submit" class="btn btn-secondary " name="new_request" value="New">
                                                <input type="submit" class="btn btn-secondary " name="update_request" value="Update">
                                                <input type="submit" class="btn btn-secondary " name="cancel_request" value="Cancel">
                                                <input type="submit" class="btn btn-secondary " name="postpone_request" value="Postpone">
                                                <input type="submit" class="btn btn-secondary " name="prepone_request" value="Prepone">
                                                <input type="submit" class="btn btn-secondary " name="mock_run_request" value="Mock">
                                                <input type="submit" class="btn btn-secondary " name="Youtube" value="YouTube">
                                                <input type="submit" class="btn btn-secondary " name="Facebook" value="Facebook">
                                                <input type="submit" class="btn btn-secondary " name="ZoomMeeting" value="Zoom">
                                                <input type="submit" class="btn btn-secondary " name="Webinar" value="Webinar">
                                                <div class="search_tbl"><input type="text" placeholder="search..." id="myInputTextField">
                                                    <div class="btn_tbl_search"><i class="fa fa-search"></i></div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="customtable_main">
                                            <div class="customtable scroll_table">
                                                <table id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Request info</th>
                                                            <th>Invitation info</th>
                                                            <!--<th>Statistics</th>-->
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                     <tbody id="searchtbl">
                                                        <?php //echo "<pre>"; print_r($requests); ?>
                                                        <?php if(empty($requests)) { ?>
                                                        <tr><td class="text-center">No data</td></tr>
                                                        <?php } else { ?> <?php $idnumbers='0' ; foreach($requests as $requestslist) { $idnumbers++ ?>
                                                        <tr>
                                                            <td style="width: 60%;">
                                                                <p class="title_head"> <?php echo $requestslist['wc_w_topic']; ?></p>
                                                                <p><strong>Date Time: </strong> <?php echo date('jS M Y',strtotime($requestslist['wc_w_datetime_from'])).' at '.date('h:i A',strtotime($requestslist['wc_w_datetime_from'])).' to '.date('h:i A',strtotime($requestslist['wc_w_datetime_to']));?></p>
                                                                <p><strong>Division: </strong> <?php echo $requestslist['wc_di_code']; ?>, <strong>Platform : </strong> <?php echo $requestslist['wc_w_platform']; ?></p>
                                                                <p><?php if(!empty($requestslist['wc_w_organizer_name'])){ ?><strong>Organizer: </strong> <?php echo $requestslist['wc_w_organizer_name']; ?>,<?php } ?> <?php if(!empty($requestslist['wc_t_technician_name'])){ ?><strong>Technician : </strong> <?php echo $requestslist['wc_t_technician_name']; ?><?php } ?></p>
                                                                <br>
                                                                <p><strong>Request Code: </strong> <?php echo $requestslist['wc_w_event_code']; ?>, <strong>Requester: </strong> <?php echo $requestslist['wc_w_requester']; ?></p>
                                                                <p class="title_date">Requested on</strong> <?php echo date('d M Y',strtotime($requestslist['created_on'])).' at '.date('h:i a',strtotime($requestslist['created_on']));?> - <strong>Requested by</strong> <?php echo $requestslist['created_by'] ?></p>
                                                                <?php if(!empty($requestslist['wc_w_zoom_details_updated_on'])){ ?><p class="title_date"><strong>Zoom details updated on</strong> <?php echo date('d M Y',strtotime($requestslist['wc_w_zoom_details_updated_on'])).' at '.date('h:i a',strtotime($requestslist['wc_w_zoom_details_updated_on']));?> - <strong>Updated by</strong> <?php echo $requestslist['wc_w_zoom_details_updated_by'] ?></p><?php } ?>
                                                                <?php if(!empty($requestslist['wc_w_youtube_details_updated_on'])){ ?><p class="title_date"><strong>YouTube details updated on</strong> <?php echo date('d M Y',strtotime($requestslist['wc_w_youtube_details_updated_on'])).' at '.date('h:i a',strtotime($requestslist['wc_w_youtube_details_updated_on']));?> - <strong>Updated by</strong> <?php echo $requestslist['wc_w_youtube_details_updated_by'] ?></p><?php } ?>
                                                                <?php if(!empty($requestslist['wc_w_technician_details_updated_on'])){ ?><p class="title_date"><strong>Technician details updated on</strong> <?php echo date('d M Y',strtotime($requestslist['wc_w_technician_details_updated_on'])).' at '.date('h:i a',strtotime($requestslist['wc_w_technician_details_updated_on']));?> - <strong>Updated by</strong> <?php echo $requestslist['wc_w_technician_details_updated_by'] ?></p><?php } ?>
                                                                <?php if(!empty($requestslist['wc_w_organizer_details_updated_on'])){ ?><p class="title_date"><strong>Organizer details updated on</strong> <?php echo date('d M Y',strtotime($requestslist['wc_w_organizer_details_updated_on'])).' at '.date('h:i a',strtotime($requestslist['wc_w_organizer_details_updated_on']));?> - <strong>Updated by</strong> <?php echo $requestslist['wc_w_organizer_details_updated_by'] ?></p><?php } ?>
                                                                <?php if(!empty($requestslist['wc_w_platform_details_updated_on'])){ ?><p class="title_date"><strong>Platform created on</strong> <?php echo date('d M Y',strtotime($requestslist['wc_w_platform_details_updated_on'])).' at '.date('h:i a',strtotime($requestslist['wc_w_platform_details_updated_on']));?> - <strong>Created by</strong> <?php echo $requestslist['wc_w_platform_details_updated_by'] ?></p><?php } ?>
                                                                <?php if(!empty($requestslist['wc_w_release_details_updated_on'])){ ?><p class="title_date"><strong>Platform released on</strong> <?php echo date('d M Y',strtotime($requestslist['wc_w_release_details_updated_on'])).' at '.date('h:i a',strtotime($requestslist['wc_w_release_details_updated_on']));?> - <strong>Released by</strong> <?php echo $requestslist['wc_w_release_details_updated_by'] ?></p><?php } ?>
                                                                
                                                                <input type="text" name="wc_w_event_code" value="<?php echo $requestslist['wc_w_event_code']; ?>">
                                                                
                                                            </td>
                                                            <td>
                                                                <?php if($requestslist['wc_w_platform'] == 'WebinarPortal'){ ?>
                                                                    <?php if($requestslist['wc_w_invitation_create_check'] == 'Already'){ ?>
                                                                        <a download href="<?php echo base_url().'/uploads/invitations/'.$requestslist['wc_w_invitation']; ?>">
                                                                            <img style="width: 100px;" src="<?php echo base_url().'/uploads/invitations/'.$requestslist['wc_w_invitation']; ?>" />
                                                                        </a>
                                                                    <?php } ?>
                                                                <?php } ?>  
                                                            </td>
                                                            <!--<td>
                                                                <p>Total Enrollment: <?php echo $requestslist['total_enrollment']; ?></p>
                                                            </td>-->
                                                            <td>
                                                                <?php if($requestslist['wc_w_platform'] == 'WebinarPortal'){ ?>
                                                                    <?php 
                                                                        if($requestslist['wc_w_zoom_details'] == 'Updated' && $requestslist['wc_w_youtube_details'] == 'Updated' && $requestslist['wc_w_technician_details'] == 'Updated' && $requestslist['wc_w_platform_details'] == 'Pending'){
                                                                            if($requestslist['wc_w_invitation_create_check'] == 'Already' OR $requestslist['wc_w_invitation_create_check'] == 'Uploaded'){ ?>
                                                                            <!--<form id="webinar_platform_create" method="post" enctype="multipart/form-data">
                                                                                <input type="hidden" name="wc_w_event_code" value="<?php echo $requestslist['wc_w_event_code']; ?>">
                                                                                <input type="submit" name="webinar_platform_create" value="Create Webinar Platform">
                                                                            </form>-->
                                                                            
                                                                            <!-- New -->
                                                                            
<!--                                                                            <a href="javascript:void(0);" -->
<!--   class="custom_btn" -->
<!--   data-bs-toggle="modal" -->
<!--   data-bs-target="#AddCreateWebinarPlatform">-->
<!--   Create Webinar Platform-->
<!--</a>-->
                                                                          <a href="" class="custom_btn" data-toggle="modal" data-target="#AddCreateWebinarPlatform">Create Webinar Platform</a>
                                                                          
                                                                          
                                                                           
                                                                            
                                                                        <?php } 
                                                                        } 
                                                                        else{ ?>
                                                                        <?php if($requestslist['wc_w_zoom_details'] == 'Pending' && $this->session->userdata('wc_u_type') == 'Admin' OR $this->session->userdata('wc_u_type') == 'Employee'){ ?>
                                                                        <!--<a href="" class="custom_btn" data-toggle="modal" data-target="#AddZoomDetails">Add Zoom Details</a>-->
                                                                        <a href="javascript:void(0);" class="custom_btn AddZoomInfo" data-code="<?php echo $requestslist['wc_w_event_code']; ?>">Add Zoom Details</a>
                                                                        <?php } ?>
                                                                        <?php if($requestslist['wc_w_youtube_details'] == 'Pending' && $this->session->userdata('wc_u_type') == 'Admin' OR $this->session->userdata('wc_u_type') == 'Employee'){ ?>
                                                                        <!--<a href="" class="custom_btn" data-toggle="modal" data-target="#AddStreamingDetails">Add Streaming Details</a>-->
                                                                        <a href="javascript:void(0);" class="custom_btn AddStreamInfo" data-code="<?php echo $requestslist['wc_w_event_code']; ?>">Add Streaming Details</a>
                                                                        <?php } ?>
                                                                        <?php if($requestslist['wc_w_technician_details'] == 'Pending' && $this->session->userdata('wc_u_type') == 'Admin' OR $this->session->userdata('wc_u_type') == 'Employee'){ ?>
                                                                        <!--<a href="" class="custom_btn" data-toggle="modal" data-target="#AddTechnicianDetails">Add Technician Details</a>-->
                                                                        <a href="javascript:void(0);" class="custom_btn AddTechInfo" data-code="<?php echo $requestslist['wc_w_event_code']; ?>">Add Technician Details</a>
                                                                        <?php } ?>
                                                                        <?php if($requestslist['wc_w_organizer_details'] == 'Pending' && $this->session->userdata('wc_u_type') == 'Admin' OR $this->session->userdata('wc_u_type') == 'Employee'){ ?>
                                                                        <a href="" class="custom_btn" data-toggle="modal" data-target="#AddOrganizerDetails">Add Organizer Details</a>
                                                                        <?php } ?>
                                                                        <?php if($requestslist['wc_w_platform_details'] == 'Created' && $requestslist['wc_w_release_details'] == 'Pending'){ ?>
                                                                            <?php if($this->session->userdata('wc_u_type') == 'Admin' OR $this->session->userdata('wc_u_type') == 'Employee'){ ?>
                                                                            <form id="create_webinar" method="post" enctype="multipart/form-data">
                                                                                <input type="hidden" name="wc_w_event_code" value="<?php echo $requestslist['wc_w_event_code']; ?>">
                                                                                <input type="submit" name="release_webinar" value="Release Event">
                                                                            </form>
                                                                            <?php } ?>
                                                                        <?php } elseif($requestslist['wc_w_platform_details'] == 'Created' && $requestslist['wc_w_release_details'] == 'Pending Re-Release'){ ?>
                                                                            <?php if($this->session->userdata('wc_u_type') == 'Admin' OR $this->session->userdata('wc_u_type') == 'Employee'){ ?>
                                                                            <form id="create_webinar" method="post" enctype="multipart/form-data">
                                                                                <input type="hidden" name="wc_w_event_code" value="<?php echo $requestslist['wc_w_event_code']; ?>">
                                                                                <input type="submit" name="re_release_webinar" value="Re-Release Event">
                                                                            </form>
                                                                            <?php } ?>
                                                                        <?php } elseif($requestslist['wc_w_release_details'] == 'Released'){ ?>
                                                                            
                                                                            
                                                                            <a class="custom_btn released_color">Released</a>
                                                                            
                                                                            <?php
                                                                            if(($this->session->userdata('wc_u_type') == 'Admin' || $this->session->userdata('wc_u_type') == 'Employee') && $requestslist['wc_w_hosting_details'] != 'Completed') { 
                                                                            ?>
                                                                                <a href="" class="custom_btn" data-toggle="modal" data-target="#EventPostpone">Postpone</a>
                                                                                <a href="" class="custom_btn" data-toggle="modal" data-target="#EventPrepone">Prepone</a>
                                                                            <?php } ?>

                                                                            
                                                                            <?php if($requestslist['wc_w_platform'] == 'WebinarPortal'){ ?>
                                                                                <a href="<?php echo $requestslist['wc_w_platform_url']; ?>" target="_blank" class="custom_btn">View Portal</a>
                                                                            <?php } ?>
                                                                            
                                                                            <?php if($requestslist['wc_w_release_details'] == 'Released' && $requestslist['wc_w_hosting_details'] == 'Pending'){ ?>
                                                                                <form style="display: inline-block;" id="create_webinar" method="post" enctype="multipart/form-data">
                                                                                    <input type="hidden" name="wc_w_event_code" value="<?php echo $requestslist['wc_w_event_code']; ?>">
                                                                                    <input type="submit" name="hosting_completed" value="Hosting Completed">
                                                                                </form>
                                                                            <?php } ?>

                                                                            
                                                                            <?php if($requestslist['wc_w_release_details'] == 'Released' && $requestslist['wc_w_hosting_details'] == 'Completed'){ echo "<a class='custom_btn'>Hosting Completed</a>"; } ?>
                                                                            
                                                                            <?php if($requestslist['wc_w_release_details'] == 'Released' && $requestslist['wc_w_hosting_details'] == 'Completed' && $requestslist['wc_w_video_backup_details'] == 'Pending'){ ?>
                                                                            <a href="" class="custom_btn" data-toggle="modal" data-target="#UploadVideoDetails">Upload Video Link</a>
                                                                            <?php } ?>
                                                                            
                                                                            <?php if($requestslist['wc_w_release_details'] == 'Released' && $requestslist['wc_w_hosting_details'] == 'Completed' && $requestslist['wc_w_video_backup_details'] == 'Updated'){ echo "<a class='custom_btn'>Video Bckup Completed</a>"; } ?>
                                                                            
                                                                            <?php if($requestslist['wc_ws_notifi_sender'] == 'True'){ ?>
                                                                                <?php if($requestslist['wc_ws_sms'] == 'True'){ ?>
                                                                                    <?php if($requestslist['wc_w_release_details'] == 'Released' && $requestslist['wc_w_hosting_details'] == 'Completed' && $requestslist['wc_w_thankyou_sms_details'] == 'Pending'){ ?>
                                                                                    <a href="" class="custom_btn" data-toggle="modal" data-target="#SendThankyouSMStoParticipants">Send Thankyou SMS to Participants</a>
                                                                                    <?php } elseif($requestslist['wc_w_release_details'] == 'Released' && $requestslist['wc_w_hosting_details'] == 'Completed' && $requestslist['wc_w_thankyou_sms_details'] == 'Triggered'){ ?>
                                                                                        <a class="custom_btn">SMS has been Scheduled</a>
                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                                
                                                                                <?php if($requestslist['wc_ws_email'] == 'True'){ ?>
                                                                                    <?php if($requestslist['wc_w_release_details'] == 'Released' && $requestslist['wc_w_hosting_details'] == 'Completed' && $requestslist['wc_w_thankyou_whatsapp_details'] == 'Pending'){ ?>
                                                                                    <form style="display: inline-block;" id="send_thankyou_whatsapp" method="post" enctype="multipart/form-data">
                                                                                        <input type="hidden" name="wc_w_event_code" value="<?php echo $requestslist['wc_w_event_code']; ?>">
                                                                                        <input type="submit" name="send_thankyou_whatsapp" value="Send Thankyou WhatsApp Message to Participants">
                                                                                    </form>
                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                                
                                                                                <?php if($requestslist['wc_ws_whatsapp'] == 'True'){ ?>
                                                                                    <?php if($requestslist['wc_w_release_details'] == 'Released' && $requestslist['wc_w_hosting_details'] == 'Completed' && $requestslist['wc_w_thankyou_email_details'] == 'Pending'){ ?>
                                                                                    <form style="display: inline-block;" id="send_thankyou_email" method="post" enctype="multipart/form-data">
                                                                                        <input type="hidden" name="wc_w_event_code" value="<?php echo $requestslist['wc_w_event_code']; ?>">
                                                                                        <input type="submit" name="send_thankyou_email" value="Send Thankyou Emial to Participants">
                                                                                    </form>
                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                                
                                                                            <?php } ?>
                                                       
                                                                        <?php } ?>
                                                                        
                                                                    <?php } ?>
                                                                    <?php if($requestslist['wc_w_invitation_create_check'] == 'CreateNew' && $this->session->userdata('wc_u_type') == 'Admin' OR $this->session->userdata('wc_u_type') == 'Employee'){ ?>
                                                                        <a href="" class="custom_btn">Request Invitation</a>
                                                                    <?php } ?>
                                                                <?php } ?>
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
            </div>
        </section>
    </main>
    
    <!--modal-->
    <div class="modal fade custom_model" id="AddCreateWebinarPlatform" tabindex="-1" aria-labelledby="AddTechnicianDetails" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="add_zoom_details" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddCreateWebinarPlatform">Webinar Platform Settings</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="wc_w_event_code" value="<?php echo $requestslist['wc_w_event_code']; ?>">
                        
                        <div class="form-group">
                            <label>Login Type</label>
                            <select class="form-control" id="wc_ws_login_type" name="wc_ws_login_type">
                                <option value="">Select technician</option>
                                <option value="Mobile" selected>Mobile</option>
                                <option value="Email">Email</option>
                                <option value="Username" disabled>Username</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Authentication</label>
                            <select class="form-control" id="wc_ws_login_authentication" name="wc_ws_login_authentication">
                                <option value="">Select technician</option>
                                <option value="True" selected>True</option>
                                <option value="False">False</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Company</label>
                            <select class="form-control" id="wc_ws_company" name="wc_ws_company">
                                <option value="">Select technician</option>
                                <option value="Hetero">Hetero Healthcare Limited</option>
                                <option value="Azista" disabled>Azista Industries Private Limited</option>
                                <option value="DRCAST" disabled>DrCast</option>
                            </select>
                        </div>
                        
                        <label class="checkbox-inline"><input type="checkbox" id="wc_ws_notifi_sender" name="wc_ws_notifi_sender"> Required for Notifications, like, Thank you, reminder</label>
                        
                        <div id="notification_fields" style="display: none;">
                            <div class="form-group">
                                <label>SMS Sender</label>
                                <select class="form-control" id="wc_ws_sms_sender" name="wc_ws_sms_sender">
                                    <option value="">Select technician</option>
                                    <option value="HeteroSMSGATEWAYHUB">Hetero SMSGATEWAYHUB</option>
                                    <option value="AzistaSMSGATEWAYHUB">Azista SMSGATEWAYHUB</option>
                                    <option value="HeteroMSG91" disabled>Hetero MSG91</option>
                                    <option value="AzistaMSG91" disabled>Azista MSG91</option>
                                    <option value="DRCAST" disabled>DrCast</option>
                                    <option value="Not Required">Not Required</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Email Sender</label>
                                <select class="form-control" id="wc_ws_email_sender" name="wc_ws_email_sender">
                                    <option value="">Select technician</option>
                                    <option value="HeteroSMSGATEWAYHUB">Hetero Communication</option>
                                    <option value="AzistaSMSGATEWAYHUB">Azista Communication</option>
                                    <option value="DRCASTCommunication" disabled>DrCast Communication</option>
                                    <option value="Not Required">Not Required</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>WhatsApp Sender</label>
                                <select class="form-control" id="wc_ws_whatsapp_sender" name="wc_ws_whatsapp_sender">
                                    <option value="">Select WhatsApp Sender</option>
                                    <option value="HeteroGupshup" disabled>Hetero Gupshup</option>
                                    <option value="AzistaGupshup">Azista Gupshup</option>
                                    <option value="HeteroWati">Hetero Wati</option>
                                    <option value="AzistaWati" disabled>Azista Wati</option>
                                    <option value="HeteroMSG91" disabled>Hetero MSG91</option>
                                    <option value="AzistaMSG91" disabled>Azista MSG91</option>
                                    <option value="DRCASTGupshup" disabled>DrCast Gupshup</option>
                                    <option value="DRCASTWati" disabled>DrCast Wati</option>
                                    <option value="Not Required">Not Required</option>
                                </select>
                            </div>
                        </div>
                        
                        <h3>Register Form Display</h3>
                        <label class="checkbox-inline"><input type="checkbox" id="wc_ws_re_name" name="wc_ws_re_name" checked> Full Name</label>
                        <label class="checkbox-inline"><input type="checkbox" id="wc_ws_re_email" name="wc_ws_re_email"> Email</label>
                        <label class="checkbox-inline"><input type="checkbox" id="wc_ws_re_mobile" name="wc_ws_re_mobile" checked> Mobile</label>
                        <label class="checkbox-inline"><input type="checkbox" id="wc_ws_re_speciality" name="wc_ws_re_speciality" checked> Speciality</label>
                        <label class="checkbox-inline"><input type="checkbox" id="wc_ws_re_mci_number" name="wc_ws_re_mci_number" checked> Doctor MCI Number</label>
                        <label class="checkbox-inline"><input type="checkbox" id="wc_ws_re_location" name="wc_ws_re_location"> Address</label>

                    </div>
                    <div class="modal-footer btn_style">
                        <!--<button type="button" class="" data-dismiss="modal">Close</button>-->
                        <input type="submit" name="webinar_platform_create" value="Create Webinar Platform">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!--postpone-->
    <div class="modal" id="EventPostpone" tabindex="-1" aria-labelledby="EventPostpone" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="add_zoom_details" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="EventPostpone">Postpone Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="wc_w_event_code" value="<?php echo $requestslist['wc_w_event_code']; ?>">
                        <div class="form-group">
                            <label>Schedule Event Date time of Postpone</label>
                            <div class="middle_flt datebtn">
                                <i class="fa fa-calendar"></i>&nbsp;<span></span> <i class="fa fa-caret-down"></i><input id="wc_w_datetime" type="text" name="wc_w_datetime" value="" placeholder="Select Date" class="dtrangeinput valid w-100" aria-invalid="false">
                            </div>
                            <small class="form-text text-muted">Choose a date and time for the event postpone.</small>
                        </div>
                    </div>
                    <div class="modal-footer btn_style">
                        <!--<button type="button" class="" data-dismiss="modal">Close</button>-->
                        <input type="submit" name="request_event_postpone" value="Request Event Postpone Details">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!--prepone-->
    <div class="modal" id="EventPrepone" tabindex="-1" aria-labelledby="EventPrepone" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="add_zoom_details" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="EventPrepone">Prepone Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="wc_w_event_code" value="<?php echo $requestslist['wc_w_event_code']; ?>">
                         <div class="form-group">
                            <label>Schedule Event Date time of Prepone</label>
                            <div class="middle_flt datebtn">
                                <i class="fa fa-calendar"></i>&nbsp;<span></span> <i class="fa fa-caret-down"></i><input id="wc_w_datetime" type="text" name="wc_w_datetime" value="" placeholder="Select Date" class="dtrangeinput valid w-100" aria-invalid="false">
                            </div>
                            <small class="form-text text-muted">Choose a date and time for the event prepone.</small>
                        </div>
                    </div>
                    <div class="modal-footer btn_style">
                        <!--<button type="button" class="" data-dismiss="modal">Close</button>-->
                        <input type="submit" name="request_event_prepone" value="Request Event Prepone Details">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!--upload video link-->
    <div class="modal" id="UploadVideoDetails" tabindex="-1" aria-labelledby="UploadVideoDetails" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="add_zoom_details" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="UploadVideoDetails">Upload Video Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="wc_w_event_code" value="<?php echo $requestslist['wc_w_event_code']; ?>">
                        <div class="form-group">
                            <label>Video Backup URL</label>
                            <input type="text" class="form-control" id="" name="wc_w_video_backup_link">
                        </div>
                    </div>
                    <div class="modal-footer btn_style">
                        <!--<button type="button" class="" data-dismiss="modal">Close</button>-->
                        <input type="submit" name="add_video_backup_details" value="Add Video Details">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!--Send Thankyou SMS to Participants -->
    <div class="modal" id="SendThankyouSMStoParticipants" tabindex="-1" aria-labelledby="SendThankyouSMStoParticipants" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="send_thankyou_sms_to_participants" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="SendThankyouSMStoParticipants">Schedule Thankyou SMS to Participants</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="wc_w_event_code" value="<?php echo $requestslist['wc_w_event_code']; ?>">
                    
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" id="wc_ws_sms_reg_participants" name="wc_ws_sms_participants" value="registered">
                                SMS Schedule: Only for Registered Participants
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" id="wc_ws_sms_attend_participants" name="wc_ws_sms_participants" value="attended">
                                SMS Schedule: Only for Event-Attended Participants
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Authentication</label>
                            <input type="datetime-local" name="wc_ws_sms_schedule_datetime">
                        </div>
                    </div>
                    <div class="modal-footer btn_style">
                        <!--<button type="button" class="" data-dismiss="modal">Close</button>-->
                        <input type="submit" name="send_thankyou_sms" value="Send Thankyou SMS to Participants">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Add Zoom Details-->
    <div class="modal" id="AddZoomDetails" tabindex="-1" aria-labelledby="AddZoomDetails" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="add_zoom_details" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddZoomDetails">Add Zoom Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--<input type="text" name="wc_w_event_code" value="<?php echo $requestslist['wc_w_event_code']; ?>">-->
                        <input type="text" name="wc_w_event_code" id="wc_w_event_code">
                        <div class="form-group">
                            <label>Zoom link</label>
                            <input type="text" class="form-control" id="" name="wc_w_zoom_link">
                        </div>
                        <div class="form-group">
                            <label>Meeting  id</label>
                            <input type="text" class="form-control" id="" name="wc_w_zoom_id">
                        </div>
                        <div class="form-group">
                            <label>Passcode</label>
                            <input type="text" class="form-control" id="" name="wc_w_zoom_passcode">
                        </div>
                    </div>
                    <div class="modal-footer btn_style">
                        <!--<button type="button" class="" data-dismiss="modal">Close</button>-->
                        <input type="submit" name="add_zoom_details" value="Add Zoom Details">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Add Streaming Details-->
    <div class="modal" id="AddStreamingDetails" tabindex="-1" aria-labelledby="AddStreamingDetails" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="add_zoom_details" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddStreamingDetails">Add Streaming Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--<input type="hidden" name="wc_w_event_code" value="<?php echo $requestslist['wc_w_event_code']; ?>">-->
                        <input type="text" name="wc_w_event_code" id="wc_w_event_code_stream">
                        <div class="form-group">
                            <label>Streaming URL</label>
                            <input type="url" class="form-control" id="" name="wc_w_streaming_link">
                        </div>
                    </div>
                    <div class="modal-footer btn_style">
                        <!--<button type="button" class="" data-dismiss="modal">Close</button>-->
                        <input type="submit" name="add_youtube_details" value="Add Streaming Details">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--AddTechnicianDetails-->
    <div class="modal" id="AddTechnicianDetails" tabindex="-1" aria-labelledby="AddTechnicianDetails" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="add_zoom_details" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddTechnicianDetails">Add Technician Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--<input type="hidden" name="wc_w_event_code" value="<?php echo $requestslist['wc_w_event_code']; ?>">-->
                        <input type="text" name="wc_w_event_code" id="wc_w_event_code_tech">
                        <input type="hidden" id="wc_w_datetime_from" value="<?php echo $requestslist['wc_w_datetime_from']; ?>">
                        <input type="hidden" id="wc_w_datetime_to" value="<?php echo $requestslist['wc_w_datetime_to']; ?>">
                        
                        <div class="form-group">
                            <label>Select Technician</label>
                            <select class="form-control" id="wc_t_technician_code" name="wc_t_technician_code">
                                <option value="">Select technician</option>
                                <?php if(empty($technicians)){ echo '<option value="">No Data</option>'; }else { ?>
                                    <?php //echo "<pre>"; print_r($technicians); ?>
                                    <?php foreach($technicians as $technicians_list) {?>
                                        <option value="<?php echo $technicians_list['wc_u_code']; ?>"><?php echo $technicians_list['wc_u_display_name']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                                
                      
                            </select>
                        </div>
                        
                        <div id="technician_slot_info" style="margin-top:10px;"></div>
    
                    </div>
                    <div class="modal-footer btn_style">
                        <!--<button type="button" class="" data-dismiss="modal">Close</button>-->
                        <input type="submit" name="add_technician_details" value="Add Technician Details">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--AddOrganizerDetails-->
    <div class="modal" id="AddOrganizerDetails" tabindex="-1" aria-labelledby="AddOrganizerDetails" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="add_zoom_details" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddOrganizerDetails">Add Organizer Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="wc_w_event_code" value="<?php echo $requestslist['wc_w_event_code']; ?>">
                        <div class="form-group">
                            <label>Select Organizer</label>
                            <select class="form-control" id="wc_w_organizer_code" name="wc_w_organizer_code">
                                <option value="">Select technician</option>
                                <?php if(empty($organizer)){ echo '<option value="">No Data</option>'; }else { ?>
                                    <?php //echo "<pre>"; print_r($organizer); ?>
                                    <?php foreach($organizer as $organizer_list) {?>
                                        <option value="<?php echo $organizer_list['wc_u_code']; ?>"><?php echo $organizer_list[ 'wc_u_display_name']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer btn_style">
                        <!--<button type="button" class="" data-dismiss="modal">Close</button>-->
                        <input type="submit" name="add_organizer_details" value="Add Organizer Details">
                    </div>
                </form>
            </div>
        </div>
    </div>
                                                                            
                                                                            <!-- New End -->
    <?php  $this->load->view('layout/copyright'); ?>
    <?php $this->load->view('layout/js');  ?>
    <?php $this->load->view('layout/daterange');  ?>
    <script src="<?php echo base_url();?>assets/js/pagination.js"></script>
    <script>
        $(document).ready(function() {
            // Function to handle company selection
            $('#wc_ws_company').on('change', function() {
                var company = $(this).val();
        
                // Reset all sender dropdowns
                $('#wc_ws_sms_sender option').hide();
                $('#wc_ws_email_sender option').hide();
                $('#wc_ws_whatsapp_sender option').hide();
        
                // Always show default option
                $('#wc_ws_sms_sender option[value=""]').show();
                $('#wc_ws_email_sender option[value=""]').show();
                $('#wc_ws_whatsapp_sender option[value=""]').show();
        
                if (company === 'Hetero') {
                    // Show only Hetero-related options
                    $('#wc_ws_sms_sender option[value="HeteroSMSGATEWAYHUB"]').show();
                    $('#wc_ws_sms_sender option[value="HeteroMSG91"]').show();
        
                    $('#wc_ws_email_sender option[value="HeteroSMSGATEWAYHUB"]').show();
        
                    $('#wc_ws_whatsapp_sender option[value="HeteroGupshup"]').show();
                    $('#wc_ws_whatsapp_sender option[value="HeteroWati"]').show();
        
                } else if (company === 'Azista') {
                    // Show only Azista-related options
                    $('#wc_ws_sms_sender option[value="AzistaSMSGATEWAYHUB"]').show();
                    $('#wc_ws_sms_sender option[value="AzistaMSG91"]').show();
        
                    $('#wc_ws_email_sender option[value="AzistaSMSGATEWAYHUB"]').show();
        
                    $('#wc_ws_whatsapp_sender option[value="AzistaGupshup"]').show();
                    $('#wc_ws_whatsapp_sender option[value="AzistaWati"]').show();
        
                } else if (company === 'DRCAST') {
                    // Show only DRCAST-related options
                    $('#wc_ws_email_sender option[value="DRCASTCommunication"]').show();
                    $('#wc_ws_whatsapp_sender option[value="DRCASTGupshup"]').show();
                    $('#wc_ws_whatsapp_sender option[value="DRCASTWati"]').show();
                }
            });
        
            // Checkbox logic
            $('#wc_ws_notifi_sender').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#notification_fields').slideDown(); // Show with animation
                } else {
                    $('#notification_fields').slideUp(); // Hide with animation
                }
            });
        
            // Default state
            $('#notification_fields').hide(); // Always hidden on load
            
            $('#wc_ws_login_type').on('change', function() {
                if ($(this).val() === 'Email') {
                    $('#wc_ws_re_email').prop('checked', true);   // ✅ Check checkbox
                } else {
                    $('#wc_ws_re_email').prop('checked', false);  // ❌ Uncheck if not Email
                }
            });
            
            $('#wc_ws_login_type').on('change', function() {
                if ($(this).val() === 'Mobile') {
                    $('#wc_ws_re_phone').prop('checked', true);   // ✅ Check checkbox
                } else {
                    $('#wc_ws_re_phone').prop('checked', true);  // ❌ Uncheck if not Email
                }
            });
            
        });
    
    
        $('#wc_t_technician_code').on('change', function() {
            var technician_code = $(this).val();
            var event_start = $('#wc_w_datetime_from').val();
            var event_end = $('#wc_w_datetime_to').val();
        
            if (technician_code != '') {
                $.ajax({
                    url: "<?php echo base_url('Home/get_technician_availability'); ?>",
                    type: "POST",
                    data: {
                        technician_code: technician_code,
                        event_start: event_start,
                        event_end: event_end
                    },
                    beforeSend: function() {
                        $('#technician_slot_info').html('<p>Checking availability...</p>');
                    },
                    success: function(response) {
                        $('#technician_slot_info').html(response);
                    },
                    error: function() {
                        $('#technician_slot_info').html('<p style="color:red;">Error checking availability.</p>');
                    }
                });
            } else {
                $('#technician_slot_info').html('');
            }
        });

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
    
        function CopyToClipboard(id){
            var r = document.createRange();
            r.selectNode(document.getElementById(id));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(r);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
        }

      
    </script>
    
    
    <script>
        $(document).ready(function () {
         
            $(document).on('click', '.AddZoomInfo', function () {
         
                // Fill modal data
                $('#wc_w_event_code').val($(this).data('code'));
         
                // Open modal
                $('#AddZoomDetails').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });
         
            // Cleanup (safety)
            $('#AddZoomDetails').on('hidden.bs.modal', function () {
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            });
         
        });
    </script>
    <script>
        $(document).ready(function () {
         
            $(document).on('click', '.AddStreamInfo', function () {
         
                // Fill modal data
                $('#wc_w_event_code_stream').val($(this).data('code'));
         
                // Open modal
                $('#AddStreamingDetails').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });
         
            // Cleanup (safety)
            $('#AddStreamingDetails').on('hidden.bs.modal', function () {
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            });
         
        });
    </script>
    <script>
        $(document).ready(function () {
         
            $(document).on('click', '.AddTechInfo', function () {
         
                // Fill modal data
                $('#wc_w_event_code_tech').val($(this).data('code'));
         
                // Open modal
                $('#AddTechnicianDetails').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });
         
            // Cleanup (safety)
            $('#AddTechnicianDetails').on('hidden.bs.modal', function () {
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            });
         
        });
    </script>
   
    <!--  End JavaScript -->
</body>
</html>