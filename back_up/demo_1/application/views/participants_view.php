<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <?php $this->load->view('layout/meta');  ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    <?php $this->load->view('layout/styles');  ?>
    <style type="text/css">
    .dataTables_filter {
        float: right;
        display: inline-block;
        text-align: right;
    }
    .dataTables_paginate {
        float: right;
    }
    .dataTables_info {
        display: inline;
    }
    .table thead th {
        vertical-align: middle;
    }
    .table th,
    .table td {
        vertical-align: middle;
    }
    .table th:first-child {
        width: 5% !important;
    }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <!-- Page Loading -->
    <!-- <div id="loading"></div> -->
    <!-- Nav Menu  -->
    <div class="fixed-top header-section">
        <div class="container">
            <!-- navbar-me -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light website-nav">
                <?php $this->load->view('layout/nav');  ?>
                <?php if($this->session->userdata('NAME') == ''){ }else{ ?>
                Welcome <?php echo ucwords($this->session->userdata('NAME'));?>
                </span>
                &nbsp;&nbsp;&nbsp;
                <a style="color: #f00;" href="<?php echo base_url().'Home/';?>logout"><i class="fi-power"></i> Logout</a>
                <?php } ?>
            </nav>
        </div>
    </div>
    <!-- Slider Start -->
    <section class="content-section">
        <img class="virus1" src="<?php echo base_url();?>assets/img/virus1.svg" alt="covifor-logo">
        <img class="virus2" src="<?php echo base_url();?>assets/img/virus2.svg" alt="covifor-logo">
        <img class="virus3" src="<?php echo base_url();?>assets/img/virus3.svg" alt="covifor-logo">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12" style="padding-top: 30px;">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center">S No</th>
                                    <?php if($webinarinfo[0]['re_name'] == "Yes"){ ?><th>Participant Name</th><?php } ?>
                                    <?php if($webinarinfo[0]['re_email'] == "Yes"){ ?><th>Email</th><?php } ?>
                                    <?php if($webinarinfo[0]['re_mobile'] == "Yes"){ ?><th>Mobile Number</th><?php } ?>
                                    <?php if($webinarinfo[0]['re_region'] == "Yes"){ ?><th>Region</th><?php } ?>
                                    <?php if($webinarinfo[0]['re_mci'] == "Yes"){ ?><th>MCI No</th><?php } ?>
                                    <?php if($webinarinfo[0]['re_drcode'] == "Yes"){ ?><th>Dr. Code</th><?php } ?>
                                    <?php if($webinarinfo[0]['re_hq'] == "Yes"){ ?><th>Head Quarter</th><?php } ?>
                                    <?php if($webinarinfo[0]['re_empc'] == "Yes"){ ?><th>Employee Code</th><?php } ?>
                                    <?php if($webinarinfo[0]['re_desc'] == "Yes"){ ?><th>Designation</th><?php } ?>
                                    <?php if($webinarinfo[0]['re_speciality'] == "Yes"){ ?><th>Speciality</th><?php } ?>
                                    <?php if($webinarinfo[0]['re_address'] == "Yes"){ ?><th>City</th><?php } ?>
                                    <?php if($webinarinfo[0]['re_address'] == "Yes"){ ?><th>State</th><?php } ?>
                                    <th>Registered On</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
							if(!empty($participants)){
								$counter =0;
								foreach($participants as $_participants) {?>
                                <tr>
                                    <td class="text-center"><?php echo $counter=$counter+1; ?></td>
                                    <?php if($webinarinfo[0]['re_name'] == "Yes"){ ?><td><?php echo $_participants->user_fullname; ?></td><?php } ?>
                                    <?php if($webinarinfo[0]['re_email'] == "Yes"){ ?><td><?php echo $_participants->user_email; ?></td><?php } ?>
                                    <?php if($webinarinfo[0]['re_mobile'] == "Yes"){ ?><td><?php echo $_participants->user_mobilenumber; ?></td><?php } ?>
                                    <?php if($webinarinfo[0]['re_region'] == "Yes"){ ?><td><?php echo $_participants->user_region; ?></td><?php } ?>
                                    <?php if($webinarinfo[0]['re_mci'] == "Yes"){ ?><td><?php echo $_participants->user_mcinumber; ?></td><?php } ?>
                                    
                                    <?php if($webinarinfo[0]['re_drcode'] == "Yes"){ ?><td><?php echo $_participants->user_drcode; ?></td><?php } ?>
                                    <?php if($webinarinfo[0]['re_hq'] == "Yes"){ ?><td><?php echo $_participants->user_head_quarter; ?></td><?php } ?>
                                    <?php if($webinarinfo[0]['re_empc'] == "Yes"){ ?><td><?php echo $_participants->user_employee_code; ?></td><?php } ?>
                                    <?php if($webinarinfo[0]['re_desc'] == "Yes"){ ?><td><?php echo $_participants->user_designation; ?></td><?php } ?>
                                    
                                    <?php if($webinarinfo[0]['re_speciality'] == "Yes"){ ?><td><?php echo $_participants->user_speciality; ?></td><?php } ?>
                                    <?php if($webinarinfo[0]['re_address'] == "Yes"){ ?><td><?php echo $_participants->user_city; ?></td><?php } ?>
                                    <?php if($webinarinfo[0]['re_address'] == "Yes"){ ?><td><?php echo $_participants->user_state; ?></td><?php } ?>
                                    <td><?php echo date("d-m-Y", strtotime($_participants->user_createdOn)) ?></td>
                                </tr>
                                <?php } } else{?>
                                <tr></tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Slider -->
    <!-- Copyright -->
    <?php $this->load->view('layout/copyright');  ?>
    <!-- End Copyright -->
    <!-- Go to Top Button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <!--  JavaScript -->
    <?php $this->load->view('layout/js');  ?>
</body>
</html>