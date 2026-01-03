<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $this->load->view('layout/meta');  ?>
    <!-- Styles -->
    <?php $this->load->view('layout/styles');  ?>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <!-- Page Loading -->
    <!-- <div id="loading"></div> -->
    <!-- Nav Menu  -->
    <div class="fixed-top header-section d-none">
        <div class="container">
            <!-- navbar-me -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light website-nav">
                <?php $this->load->view('layout/nav');  ?>
                <button type="button" class="instruction-btn" data-toggle="modal" data-target="#instructions">Instructions</button>
            </nav>
        </div>
    </div>
 <!-- Modal -->
 <div class="modal fade" id="instructions" role="dialog">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-header-block">
                    <h4 class="modal-title modal-title-txt">Webinar Registration Instructions</h4>
                    <button type="button" class="close cross-icon" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <ul class="instruction-menus">
                        <li>Registered users can provide Email ID, click on Login and join the webinar.</li>
                        <li>New users must register first, they have to fill in the required details in the register
                            option (name/city/Email/Mobile No/specialty). Once registered, they will be redirected to
                            webinar page.</li>
                        <li>Viewers will see the entire webinar in the main page and they can ask questions in the
                            Query/Comment box which will go to the Moderator/Host.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <a class="d-none" href="<?php echo base_url();?>register">
        <div class="reg-fix">
            <div class="decaration">
                <h4 class="b_ounce"><span class="bounce"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                    <strong><?php echo date('d',strtotime($webinarinfo[0]['webinar_date']));?><sup><?php echo date('S',strtotime($webinarinfo[0]['webinar_date']));?></sup> <?php echo date('M, l',strtotime($webinarinfo[0]['webinar_date']));?></strong> <small>Time: <?php echo date('h.i A',strtotime($webinarinfo[0]['webinar_start']));?></small>
                </h4>
            </div>
        </div>
    </a>
    <!-- Slider Start -->
    <section class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <?php 
                        $CI =& get_instance();
                        $url=base_url().""."uploads/"."".$webinarinfo[0]['webinar_invitation']."";
                        //echo $url;
                        $url_check = $CI->check_url($url);
                        //echo $url_check;
                        if($url_check!==404) { ?><div class=""><img class="web-reg" src="<?php echo base_url();?>uploads/<?php echo $webinarinfo[0]['webinar_invitation']; ?>" alt="<?php echo $webinarinfo[0]['webinar_topic']; ?>"></div>
                        <?php } else{ } ?>
                </div>
                <!-- <div class="col-sm-1"></div> -->
                <div class="col-sm-5">
                    <div class="login-block">
                        <div class="login_text">
                            <div>
                                <h3>Log In</h3>
                                <p>Welcome Back !</p>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-primary log-btn"  data-toggle="modal" data-target="#instructions">Instructions</button>
                            </div>
                        </div>
                        
                        <?php //echo "<pre>"; print_r($webinarinfo); ?>
                        <form class="form-horizontal" id="login">
                            <input type="hidden" name="webinar_login_type" value="<?php echo $webinarinfo[0]['webinar_login_type']; ?>">
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="tel" autocomplete="off" class="form-control" placeholder="<?php if($webinarinfo[0]['webinar_login_type'] == 'Email'){ echo "Email address"; } else if($webinarinfo[0]['webinar_login_type'] == 'Mobile'){ echo "Enter Your Mobile Number"; } else{ echo "Email address or phone number"; } ?>" name="username" id="username" validator="mobile" maxlength='15' minlength="10" required>
                            </div>
                            <div class="form-group">
                                <label>OTP</label>
                               <div class="otp-container">
                                  <input type="text" maxlength="1" class="otp-input" />
                                  <input type="text" maxlength="1" class="otp-input" />
                                  <input type="text" maxlength="1" class="otp-input" />
                                  <input type="text" maxlength="1" class="otp-input" />
                                  <input type="text" maxlength="1" class="otp-input" />
                                  <input type="text" maxlength="1" class="otp-input" />
                                  <a class="ms-3 get-otp">Get OTP</a>
                                </div>
                            </div>
                            
                            <?php if($webinarinfo[0]['webinar_brandingstatus'] == "1002"){ } else { ?>
                            <?php $url2=base_url().""."uploads/"."".$webinarinfo[0]['webinar_password_logo'].""; $url_check2 = $CI->check_url($url2); if($url_check2!==404) { ?>
                                <div class="jakura_logo_block">
                                    <img class="jakura_logo" style="width: 270px;" src="<?php echo base_url();?>uploads/<?php echo $webinarinfo[0]['webinar_branding_logo']; ?>" alt="<?php echo $webinarinfo[0]['webinar_topic']; ?>">
                                </div>
                                
                                
                            <?php } else{ } ?>
                            <?php } ?>
                            <?php $url2=base_url().""."uploads/"."".$webinarinfo[0]['webinar_password_logo'].""; $url_check2 = $CI->check_url($url2); if($url_check2!==404) { ?>
                            <?php if($webinarinfo[0]['webinar_password_protection'] == "1002"){ } else { ?>
                            <div class="jakura_logo_block">
                                <img class="jakura_logo" style="width: 270px;" src="<?php echo base_url();?>uploads/<?php echo $webinarinfo[0]['webinar_password_logo']; ?>" alt="<?php echo $webinarinfo[0]['webinar_topic']; ?>">
                            </div>
                            <div class="jakura_logo_text">
                                <p>Type in the box below: <span><input type="text" id="validation" name="validation" value="<?php echo $webinarinfo[0]['webinar_password_captcha']; ?>" readonly ></span></p>
                            </div>
                            <div class="form-group">
                                <input type="text" id="validation_again" name="validation_again" autocomplete="off" class="form-control" placeholder="Type Here:" required>
                            </div>
                            
                            
                            <?php } ?>
                            <?php } else{ } ?>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary log-btn" value="Login" name="submit" id="submit">
                            </div>
                            <!--<i class="fa fa-user-plus" aria-hidden="true"></i>-->
                            <!--<h6>Don’t have an account? <a href="<?php echo base_url();?>register">Register</a></h6>-->
                            <p class="text-right">Don’t have an account? <a href="<?php echo base_url();?>register">Register.</a></p>
                        </form>
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
    <script>
    $(function() {
        $("#login").validate({
            rules: {
                username: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 15
                },
                validation: "required",
                validation_again: {
                  equalTo: "#validation"
                }
            },
            messages: {
                username: {
                    required: "Enter your phone number",
                }
            },
            submitHandler: function(form) {
                // for demo
                var myForm = document.getElementById("login");
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url();?>Home/auth",
                    dataType: "text", // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: new FormData(myForm),
                    success: function(data) {
                        // alert(data);
                        var obj = jQuery.parseJSON(data);
                        if (obj.status == 1) {
                            window.location = "<?php echo base_url('streaming');?>"
                        } else {
                            window.location = "<?php echo base_url('register');?>";
                        }
                    },
                });
                return false;
            },
        });
    });
    </script>
    <!--otp script-->
     <script>
    const inputs = document.querySelectorAll('.otp-input');

    inputs.forEach((input, index) => {
      input.addEventListener('input', (e) => {
        const value = e.target.value;
        // Allow only numbers
        if (!/^\d$/.test(value)) {
          e.target.value = '';
          return;
        }

        // Move to next input
        if (value && index < inputs.length - 1) {
          inputs[index + 1].focus();
        }
      });

      input.addEventListener('keydown', (e) => {
        if (e.key === 'Backspace' && !e.target.value && index > 0) {
          inputs[index - 1].focus();
        }
      });
    });
  </script>
  
  <!--mobile number-->
  <script>
$(document).ready(function () {
    $("input[validator='mobile']").on("input", function () {
        // Allow only digits
        this.value = this.value.replace(/[^0-9]/g, '');
    });
});
</script>
</body>
</html>