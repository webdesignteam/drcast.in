<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $this->load->view('themes/'.$eventinfo[0]['wc_tm_name'].'/layout/meta'); ?>
    <?php $this->load->view('themes/'.$eventinfo[0]['wc_tm_name'].'/layout/styles'); ?>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <!-- Page Loading -->
    <!-- <div id="loading"></div> -->
    <!-- Nav Menu  -->
    <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-info btn-lg stream_popup" data-toggle="modal" data-target="#myModal">Open Large Modal</button> -->

    <div class="fixed-top header-section">
        <div class="container">
            <!-- navbar-me -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light website-nav">
                <?php $this->load->view('layout/nav');  ?>
                <?php if($this->session->userdata('NAME') == ''){ }else{ ?>
                    Welcome <?php echo ucwords($this->session->userdata('NAME'));?>&nbsp;&nbsp;&nbsp; <a style="color: #f00;" href="<?php echo base_url().'Home/';?>logout"><i class="fi-power"></i> Logout</a>
                <?php } ?>
            </nav>
        </div>
    </div>
    <section class="content-section" style="min-height: 79vh; padding-top: 30px !important;">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" style="margin-bottom: 10px;">
                    <div class="card text-center">
                      <div class="card-body">
                        <span id="Participants">
                            <h5 class="card-title">Total Registrations <span style="font-size: 80px;"><?php if(empty($participants_count)){ echo "0"; }else { echo $participants_count;} ?></span></h5>
                        </span>
                        <a href="#" onclick="CopyToClipboard('Participants');return false;" class="btn btn-primary">Copy Count</a>&nbsp;<a class="btn btn-primary" href="<?php echo base_url();?>participants">View</a>
                      </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card text-center">
                      <div class="card-body">
                        <span id="Logged">
                            <h5 class="card-title">Live Participants <span style="font-size: 80px;"><?php if(empty($loggedusers_count)){ echo "0"; }else { echo $loggedusers_count;} ?></span></h5>
                        </span>
                        <a href="#" onclick="CopyToClipboard('Logged');return false;" class="btn btn-primary">Copy Count</a>&nbsp;<a class="btn btn-primary" href="<?php echo base_url();?>logged-users">View</a>
                      </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-3">
                    <div class="card text-center">
                      <div class="card-body">
                        <span id="Querys">
                            <h5 class="card-title">Pending Questions <span style="font-size: 80px;"><?php if(empty($pending_querys)){ echo "0"; }else { echo $pending_querys;} ?></span></h5>
                        </span>
                        <a href="#" onclick="CopyToClipboard('Querys');return false;" class="btn btn-primary">Copy Count</a>&nbsp;<a class="btn btn-primary" href="<?php echo base_url();?>queries">View</a>
                      </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card text-center">
                      <div class="card-body">
                        <span id="AnsweredQuestions">
                            <h5 class="card-title">Answered Questions <span style="font-size: 80px;"><?php if(empty($answered_querys)){ echo "0"; }else { echo $answered_querys;} ?></span></h5>
                        </span>
                        <a href="#" onclick="CopyToClipboard('AnsweredQuestions');return false;" class="btn btn-primary">Copy Count</a>&nbsp;<a class="btn btn-primary" href="<?php echo base_url();?>queries">View</a>
                      </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card text-center">
                      <div class="card-body">
                        <span id="TotalQuestions">
                            <h5 class="card-title">Total Questions <span style="font-size: 80px;"><?php if(empty($total_querys)){ echo "0"; }else { echo $total_querys;} ?></span></h5>
                        </span>
                        <a href="#" onclick="CopyToClipboard('TotalQuestions');return false;" class="btn btn-primary">Copy Count</a>&nbsp;<a class="btn btn-primary" href="<?php echo base_url();?>queries">View</a>
                      </div>
                    </div>
                </div>
                <div class="col-sm-3 d-none">
                    <div class="card text-center">
                      <div class="card-body" style="padding: 88px 0px;">
                        <p id="Copyall" style="position: absolute; width: 1px; height: 1px; overflow: hidden;">Total Participants - <?php if(empty($participants_count)){ echo "0"; }else { echo $participants_count;} ?><br>Live Participants - <?php if(empty($loggedusers_count)){ echo "0"; }else { echo $loggedusers_count;} ?><br>Total Questions - <?php if(empty($pending_querys)){ echo "0"; }else { echo $pending_querys;} ?></p>
                        <a href="#" onclick="CopyToClipboard('Copyall');return false;" class="btn btn-primary">Copy All Counts</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Slider -->
    <!-- Copyright -->
    <?php $this->load->view('layout/copyright');  ?>
    <!-- End Copyright -->
    <!--  JavaScript -->
    <?php $this->load->view('layout/js');  ?>
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
</body>
</html>