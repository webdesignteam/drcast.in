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
                <?php if($this->session->userdata('NAME') == ''){ }else{ ?>Welcome <?php echo ucwords($this->session->userdata('NAME'));?> &nbsp;&nbsp;&nbsp; <a style="color: #f00;" href="<?php echo base_url().'Home/';?>logout"><i class="fi-power"></i> Logout</a><?php } ?>
            </nav>
        </div>
    </div>
    <!-- Slider Start -->
    <section class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="covid-txt-block" style="padding-top:10px;">
                        <div class="covid-txt-block" style="padding-top:10px;">
                            <iframe width="720" height="500" src="https://www.youtube-nocookie.com/embed/<?php echo $webinarinfo[0]['webinar_youtubecode']; ?>?modestbranding=1&controls=1&showinfo=1" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4" style="padding-top:20px;">
                    <div class=""></div>
                    <form class="form-horizontal" method="post" name="querysubmission" id="querysubmission"
                        enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header" style="color:#ffffff !important;">Ask your Query ?</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" name="query"></textarea>
                                </div>
                                <input type="hidden" name="username" id="username" value="<?php echo $this->session->userdata('NAME');?>">
                            </div>
                            <div class="card-footer bg-white">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary log-btn" value="Send Query" name="submit">
                                </div>
                            </div>
                        </div>
                    </form><br>
                    <?php $CI =& get_instance(); $url=base_url().""."uploads/"."".$webinarinfo[0]['webinar_branding_logo']."";
                        /*echo $url;*/ $url_check = $CI->check_url($url); if($url_check!==404) { ?>
                    <?php if($webinarinfo[0]['webinar_brandingstatus'] == "1001"){ ?>
                    <div class="jakura_logo_block">
                        <img class="jakura_logo" style="width: 100%;" src="<?php echo base_url();?>uploads/<?php echo $webinarinfo[0]['webinar_branding_logo']; ?>" alt="<?php echo $webinarinfo[0]['webinar_topic']; ?>">
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </section>
    <?php $sdatetime = $webinarinfo[0]['webinar_start'];
    $stimestamp = strtotime($sdatetime);
    $stime = $stimestamp - (0.1 * 10 * 60);
    $time = date("H:i:s", $stime); ?>
    <!-- End Slider -->
    <!-- Copyright -->
    <?php $this->load->view('layout/copyright');  ?>
    <!-- End Copyright -->
    <!-- Go to Top Button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <!--  JavaScript -->
    <?php $this->load->view('layout/js');  ?>
    <script>
    $(function() {
        $("#querysubmission").validate({
            rules: {
                query: {
                    required: true,
                }
            },
            messages: {
                query: {
                    required: "Enter your Query",
                }
            },
            submitHandler: function(form) {
                // for demo
                var myForm = document.getElementById("querysubmission");
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url();?>Home/submitquery",
                    dataType: "text", // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: new FormData(myForm),
                    success: function(data) {
                        // alert(data);
                        var obj = jQuery.parseJSON(data);
                        if (obj.status == 1) {
                            $('#querysubmission')[0].reset();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Query Submitted.',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                $('#querysubmission')[0].reset();
                            });
                        } else {
                            Swal.fire("Oops", obj.message, "error");
                        }
                    },
                });
                return false;
            },
        });
        $("#pool").validate({
            rules: {
                'poolcheckbox[]': {
                    required: true,
                    maxlength: 2,
                    minlength: 2
                }
            },
            messages: {
                'poolcheckbox[]': {
                    required: "Please Select Two Topics of Interest To Make The Webinar More Interesting",
                }
            },
            submitHandler: function(form) {
                // for demo
                var myForm = document.getElementById("pool");
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url();?>Home/pool",
                    dataType: "text", // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: new FormData(myForm),
                    success: function(data) {
                        // alert(data);
                        var obj = jQuery.parseJSON(data);
                        if (obj.status == 1) {
                            $('#hcpModal').modal('hide');
                            $('#pool')[0].reset();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title:  obj.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                $('#pool')[0].reset();
                            });
                        } else {
                            Swal.fire("Oops", obj.message, "error");
                        }
                    },
                });
                return false;
            },
        });
    });
    // ********** call a function at specific time **********
    function callURL(){
        //alert("It's 11.13am!");
        window.location = '<?php echo base_url();?>streaming';
    }
    $(window).on('load',function(){
        // ********** call a function at specific time **********
        var now = new Date();
        var millisTill10 = new Date(now.getFullYear(), now.getMonth(), now.getDate(), <?php echo date('h, i, 00, 0',strtotime($time)); ?>) - now;
        if (millisTill10 < 0) {
             millisTill10 += 86400000; // it's after 10am, try 10am tomorrow.
        }
        setTimeout(function(){callURL()}, millisTill10);
        /*if (!sessionStorage.getItem('shown-modal')){
        $('#hcpModal').modal({
                backdrop: 'static',
                keyboard: false
            })
        sessionStorage.setItem('shown-modal', 'true');
        }*/
        $("#hcpModal").modal('show')
    });
/*$(document).ready(function(){
    $("form").submit(function(){
		if ($('input:checkbox').filter(':checked').length == 2){
		  $("#errormsg").show();
            // alert("Check at least Two Topics of Interest to make the Webinar more Interesting");
            return true;
		}
		else {
            alert("Check only Two Topics of Interest to make the Webinar more Interesting");
            $("#errormsg").show();
    		return false;
		}
    });
});*/
    </script>
</body>
</html>