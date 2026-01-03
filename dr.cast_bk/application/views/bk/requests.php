<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layout/meta');?>
    <?php $this->load->view('layout/styles');?>
    <style>
	    .modal-backdrop{
	        position: absolute !important;
	        height: unset !important;
	    }
	    .modal {
            position: fixed;
            top: 65%;
            left: 50%;
            z-index: 1050;
            display: none;
            width: 100%;
            height: 100%;
            overflow: hidden;
            outline: 0;
            transform: translate(-50%, -50%);
        }
        .customtable thead th{
            z-index: -1;
        }
	</style>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/pagination.css?Version=<?php echo Version; ?>" />
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
                                <h4>List of Requests</h4>
                                <div class="right_btn">
                                    <div id="buttons" class="datbtns"></div>
                                    <a href="<?php echo base_url();?>" class="btn custom_add">Export</a>
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
                                    <select class="datebtn" name="wc_d_id" id="wc_d_id">
                                        <?php if(empty($organizerslist)) { } else { ?>
                                        <option value="">Select organizer</option>
                                        <?php foreach($organizerslist as $organizers_list) { ?>
                                        <option value="<?php echo $organizers_list['wc_o_code']; ?>">
                                        <?php echo $organizers_list['wc_o_name']; ?></option>
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
                                        <div class="customtable">
                                            <div class="customtable">
                                                <table id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Request info</th>
                                                            <th>Invitation info</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="searchtbl">
                                                        <?php //echo "<pre>"; print_r($requests); ?>
                                                        <?php if(empty($requests)) { ?><tr><td class="text-center">No data</td></tr><?php } else { ?> <?php $idnumbers='0' ; foreach($requests as $requestslist) { $idnumbers++ ?>
                                                        <tr>
                                                            <td style="width: 50%;">
                                                                <p class="title_head"> <?php echo $requestslist['wc_w_topic']; ?> on <?php echo date('jS M Y',strtotime($requestslist['wc_w_date'])).' at '.date('h:i A',strtotime($requestslist['wc_w_stime'])).' to '.date('h:i A',strtotime($requestslist['wc_w_etime']));?></p>
                                                                <p><b>Division : </b> ASRA Division, <b>Platform : </b> Webinar, <b>Organizer : </b> Sundeep</p>
                                                                <p><b>Request Code : </b> 12342342 </p>
                                                                <p class="title_date">Requested on <?php echo date('d M Y',strtotime($requestslist['wc_w_created_on'])).' at '.date('h:i a',strtotime($requestslist['wc_w_created_on']));?> </p>
                                                                <p class="title_date">Zoom details updated on <?php echo date('d M Y',strtotime($requestslist['wc_w_zoom_details_updated_on'])).' at '.date('h:i a',strtotime($requestslist['wc_w_zoom_details_updated_on']));?> - <strong>Updated by</strong> <?php echo $requestslist['wc_w_zoom_details_updated_by'] ?></p>
                                                                <p class="title_date">YouTube details updated on <?php echo date('d M Y',strtotime($requestslist['wc_w_youtube_details_updated_on'])).' at '.date('h:i a',strtotime($requestslist['wc_w_youtube_details_updated_on']));?> - <strong>Updated by</strong> <?php echo $requestslist['wc_w_youtube_details_updated_by'] ?></p>
                                                                <p class="title_date">Technician details updated on <?php echo date('d M Y',strtotime($requestslist['wc_w_technician_details_updated_on'])).' at '.date('h:i a',strtotime($requestslist['wc_w_technician_details_updated_on']));?> - <strong>Updated by</strong> <?php echo $requestslist['wc_w_technician_details_updated_by'] ?></p>
                                                                <p class="title_date">Platform created on <?php echo date('d M Y',strtotime($requestslist['wc_w_platform_details_updated_on'])).' at '.date('h:i a',strtotime($requestslist['wc_w_platform_details_updated_on']));?> - <strong>Created by</strong> <?php echo $requestslist['wc_w_platform_details_updated_by'] ?></p>
                                                                <p class="title_date">Platform released on <?php echo date('d M Y',strtotime($requestslist['wc_w_release_details_updated_on'])).' at '.date('h:i a',strtotime($requestslist['wc_w_release_details_updated_on']));?> - <strong>Released by</strong> <?php echo $requestslist['wc_w_release_details_updated_by'] ?></p>
                                                            </td>
                                                            <td>
                                                                <?php if($requestslist['wc_w_platform'] == 'Webinar'){ ?>
                                                                    <?php if($requestslist['wc_w_invitation_create_check'] == 'Already'){ ?>
                                                                        <a download href="<?php echo base_url().'/uploads/invitations/'.$requestslist['wc_w_invitation']; ?>">
                                                                            <img style="width: 100px;" src="<?php echo base_url().'/uploads/invitations/'.$requestslist['wc_w_invitation']; ?>" />
                                                                        </a>
                                                                    <?php } ?>
                                                                <?php } ?>  
                                                            </td>
                                                            <td>
                                                                <?php if($requestslist['wc_w_platform'] == 'Webinar'){ ?>
                                                                    <?php if($requestslist['wc_w_zoom_details'] == '1001' && $requestslist['wc_w_youtube_details'] == '1001' && $requestslist['wc_w_technician_details'] == '1001' && $requestslist['wc_w_custom_platform_details'] == '1002'){ ?>
                                                                        <?php if($requestslist['wc_w_invitation_create_check'] == 'Already'){ ?>
                                                                            <form id="create_webinar" method="post" enctype="multipart/form-data">
                                                                                <input type="hidden" name="wc_w_code" value="<?php echo $requestslist['wc_w_code']; ?>">
                                                                                <input type="hidden" name="wc_u_code" value="<?php echo $this->session->userdata('wc_u_code'); ?>">
                                                                                <input type="submit" name="create_webinar" value="Create Webinar">
                                                                            </form>
                                                                        <?php } ?>
                                                                    <?php } else{ ?>
                                                                        <?php if($requestslist['wc_w_zoom_details'] == '1002'){ ?>
                                                                        <a href="" class="custom_btn" data-toggle="modal" data-target="#AddZoomDetails">Add Zoom Details</a>
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
                                                                                            <input type="hidden" name="wc_w_code" value="<?php echo $requestslist['wc_w_code']; ?>">
                                                                                            <input type="hidden" name="wc_u_code" value="<?php echo $this->session->userdata('wc_u_code'); ?>">
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
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="" data-dismiss="modal">Close</button>
                                                                                            <input type="submit" name="add_zoom_details" value="Add Zoom Details">
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php } ?>
                                                                        <?php if($requestslist['wc_w_youtube_details'] == '1002'){ ?>
                                                                        <a href="" class="custom_btn" data-toggle="modal" data-target="#AddStreamingDetails">Add Streaming Details</a>
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
                                                                                            <input type="hidden" name="wc_w_code" value="<?php echo $requestslist['wc_w_code']; ?>">
                                                                                            <input type="hidden" name="wc_u_code" value="<?php echo $this->session->userdata('wc_u_code'); ?>">
                                                                                            <div class="form-group">
                                                                                                <label>Streaming URL</label>
                                                                                                <input type="url" class="form-control" id="" name="wc_w_streaming_link">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="" data-dismiss="modal">Close</button>
                                                                                            <input type="submit" name="add_youtube_details" value="Add Streaming Details">
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php } ?>
                                                                        <?php if($requestslist['wc_w_technician_details'] == '1002'){ ?>
                                                                        <a href="" class="custom_btn" data-toggle="modal" data-target="#AddTechnicianDetails">Add Technician Details</a>
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
                                                                                            <input type="hidden" name="wc_w_code" value="<?php echo $requestslist['wc_w_code']; ?>">
                                                                                            <input type="hidden" name="wc_u_code" value="<?php echo $this->session->userdata('wc_u_code'); ?>">
                                                                                            <div class="form-group">
                                                                                                <label>Select Technician</label>
                                                                                                <select class="form-control" id="wc_t_code" name="wc_t_code">
                                                                                                    <option value="">Select technician</option>
                                                                                                    <?php if(empty($technicians)){ echo '<option value="">No Data</option>'; }else { ?>
                                                                                                        <?php //echo "<pre>"; print_r($divisions); ?>
                                                                                                        <?php foreach($technicians as $technicians_list) {?>
                                                                                                            <option value="<?php echo $technicians_list['wc_t_code']; ?>"><?php echo $technicians_list[ 'wc_t_name']; ?></option>
                                                                                                        <?php } ?>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="" data-dismiss="modal">Close</button>
                                                                                            <input type="submit" name="add_technician_details" value="Add Technician Details">
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php } ?>
                                                                        <?php if($requestslist['wc_w_custom_platform_details'] == '1001' && $requestslist['wc_w_release_details'] == '1002'){ ?>
                                                                            <form id="create_webinar" method="post" enctype="multipart/form-data">
                                                                                <input type="hidden" name="wc_w_code" value="<?php echo $requestslist['wc_w_code']; ?>">
                                                                                <input type="hidden" name="wc_u_code" value="<?php echo $this->session->userdata('wc_u_code'); ?>">
                                                                                <input type="submit" name="release_webinar" value="Release webinar">
                                                                            </form>
                                                                        <?php } elseif($requestslist['wc_w_release_details'] == '1001'){ ?>
                                                                            <a class="custom_btn">Released</a>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                    <?php if($requestslist['wc_w_invitation_create_check'] == 'CreateNew'){ ?>
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
        </section>
    </main>
    <?php  $this->load->view('layout/copyright'); ?>
    <?php $this->load->view('layout/js');  ?>
    <?php $this->load->view('layout/daterange');  ?>
    <script src="<?php echo base_url();?>assets/js/pagination.js"></script>
    
    <script>
        function CopyToClipboard(id)
        {
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