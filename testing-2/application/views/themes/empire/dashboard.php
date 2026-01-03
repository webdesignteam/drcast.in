<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <?php $this->load->view('layout/meta');  ?>
    <meta http-equiv="refresh" content="3">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    <?php $this->load->view('layout/styles');  ?>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <!-- Page Loading -->
    <!-- <div id="loading"></div> -->
    <!-- Nav Menu  -->
    
    <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-info btn-lg stream_popup" data-toggle="modal" data-target="#myModal">Open Large Modal</button> -->

  <?php if($webinarinfo[0]['webinar_pollstatus'] == "1002"){ } else { ?>
  <?php if(empty($poolinfo)){ ?> 
  <!-- Modal -->
  <div class="modal fade" id="hcpModal" role="dialog">
    <div class="modal-dialog stream_popup_dialog modal-md">
      <div class="modal-content">
        <div class="modal-header stream_popup_header">
          <h4 class="modal-title">Select Two Topics of Interest to make the Webinar more Interesting</h4>
        </div>
        <div class="modal-body stream_popup_body">
            
          <form method="post" class="points_form" name="pool" id="pool">
              
              <label id="poolcheckbox[]-error" class="text-red text-capitalize text-normal" for="poolcheckbox[]"></label><br>
              
              <input type="checkbox" id="poolcheckbox" name="poolcheckbox[]" value="Preventing Progression of COVID from moderate to severe">
              <label for="point1"> Preventing Progression of COVID from moderate to severe</label><br>
              <input type="checkbox" id="poolcheckbox" name="poolcheckbox[]" value="Post COVID lung fibrosis">
              <label for="point2"> Post COVID lung fibrosis</label><br>
              <input type="checkbox" id="poolcheckbox" name="poolcheckbox[]" value="COVID and thrombotic diseases">
              <label for="point3"> COVID and thrombotic diseases</label><br>
              <input type="checkbox" id="poolcheckbox" name="poolcheckbox[]" value="COVID associated neurological complications">
              <label for="point4"> COVID associated neurological complications</label><br>
              <input type="checkbox" id="poolcheckbox" name="poolcheckbox[]" value="Long COVID syndrome">
              <label for="point5"> Long COVID syndrome</label><br><br>
              <button type="button" class="btn btn-default point_skip" data-dismiss="modal">Skip</button>
              
              <input type="submit" class="point_submit" value="Submit">

            </form>
        </div>
      </div>
    </div>
  </div>
  <?php } else{ ?> <?php } ?>
  <?php } ?>
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