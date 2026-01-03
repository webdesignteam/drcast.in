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
        <!-- <img class="virus1" src="<?php echo base_url();?>assets/img/virus1.svg" alt="covifor-logo">
        <img class="virus2" src="<?php echo base_url();?>assets/img/virus2.svg" alt="covifor-logo">
        <img class="virus3" src="<?php echo base_url();?>assets/img/virus3.svg" alt="covifor-logo"> -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12" style="padding-top: 30px;">
                    <div class="table-responsive">
                        <!-- <a class="btn log-btn btn-sm pull-right" style="margin: 0 0px 10px 0px; width: auto;"
                            onClick="window.location.reload()">Refresh </a> -->
                            <table id="example" class="table table-bordered table-striped table-sm">
								<thead>
									<tr>
										<th class="text-center">Sno</th>
										<!--<th>Poll ID</th>-->
										<th>Delegate Name</th>
										<th>Selected Option</th>
										<th>Date Time</th>
									</tr>
								</thead>
								<tbody>
									<?php
									//echo "<pre>"; print_r($participants);
									if(!empty($pollresults)){
										$counter =0;
										foreach($pollresults as $pollresults_list) {?>
									<tr>
										<td class="text-center"><?php echo $counter=$counter+1; ?></td>
										<!--<td><?php echo $pollresults_list['pool_autoID']; ?></td>-->
										<td><?php echo ucwords($pollresults_list['user_fullname']); ?></td>
										<td><?php echo $pollresults_list['pool_results']; ?></td>
										<td><?php echo date("d-m-Y H:i:s", strtotime($pollresults_list['pool_createdon'])) ?></td>
									</tr>
									<?php } } else{?>
									<tr><td colspan="9" class="text-center">No Date</td></tr>
									<?php }?>
								</tbody>
							</table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="poll_count_block">
                        <h4>Poll Results</h4>
                        <?php if(empty($pollcount)){ } else { ?>
                        <ul>
                            <?php foreach($pollcount as $pollcount_list) {?>
                            <li><?php echo $pollcount_list['pool_results']; ?> <span><?php echo $pollcount_list['COUNT']; ?></span></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
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