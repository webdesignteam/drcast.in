<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <?php $this->load->view('layout/meta');  ?>
    <meta http-equiv="refresh" content="20">
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
                        <!--<a class="btn log-btn btn-sm pull-right" style="margin: 0 0px 10px 0px; width: auto;" onClick="window.location.reload()">Refresh </a> -->
                        <table id="example" class="table table-bordered table-striped table-sm">
							<thead>
								<tr>
									<th>Sno</th>
									<?php if($webinarinfo[0]['re_name'] == "Yes"){ ?><th>Name</th><?php } ?>
									<?php if($webinarinfo[0]['re_email'] == "Yes"){ ?><th>Email</th><?php } ?>
									<?php if($webinarinfo[0]['re_mobile'] == "Yes"){ ?><th>Mobile</th><?php } ?>
									<?php if($webinarinfo[0]['re_address'] == "Yes"){ ?><th>City</th><?php } ?>
									<?php if($webinarinfo[0]['re_address'] == "Yes"){ ?><th>State</th><?php } ?>
									<th>Logged On</th>
								</tr>
							</thead>
							<tbody>
								<?php //echo "<pre>"; print_r($participants);
								if(!empty($loggedparticipants)){ $counter =0; foreach($loggedparticipants as $loggedparticipants_list) {?>
								<tr>
									<td><?php echo $counter=$counter+1; ?></td>
									<?php if($webinarinfo[0]['re_name'] == "Yes"){ ?><td><?php echo ucwords($loggedparticipants_list['user_fullname']); ?></td><?php } ?>
									<?php if($webinarinfo[0]['re_email'] == "Yes"){ ?><td><?php echo $loggedparticipants_list['user_email']; ?></td><?php } ?>
									<?php if($webinarinfo[0]['re_mobile'] == "Yes"){ ?><td><?php echo $loggedparticipants_list['user_mobilenumber']; ?></td><?php } ?>
									<?php if($webinarinfo[0]['re_address'] == "Yes"){ ?><td><?php echo $loggedparticipants_list['user_city']; ?></td><?php } ?>
									<?php if($webinarinfo[0]['re_address'] == "Yes"){ ?><td><?php echo $loggedparticipants_list['user_state']; ?></td><?php } ?>
									<td><?php echo date("d-m-Y H:i:s", strtotime($loggedparticipants_list['log_loggedOn'])) ?></td>
								</tr>
								<?php } } else{?>
								<tr><td colspan="9" class="text-center">No Date</td></tr>
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