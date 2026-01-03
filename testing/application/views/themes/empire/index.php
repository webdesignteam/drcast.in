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
    <style>
		body {
			background: #ffffff !important;
		}
		.hide {
            display: none !important;
        }
        .btn-primary {
            color: #fff;
            background-color: #000;
            border-color: #000;
        }
        .btn-primary:hover {
            color: #000;
            background-color: #fff;
            border-color: #000;
        }
        .btn-primary.disabled, .btn-primary:disabled {
            color: #fff;
            background-color: #000;
            border-color: #000;
        }
        .rigister_section{
            display: flex;
            justify-content: center;
            align-items: center;
        }
		.background_white {
			width: 100%;
			background: #fff;
			padding: 30px;
			display: block;
		}
		.background_gray {
			width: 100%;
			background: #eaf1f3;
			padding: 30px;
			display: block;
			height: 100vh;
		}
		.reigstraion_section {
			display: block;
			background: #d3d2d2;
			padding: 40px;
		}
		.create_box.boxshadow {
            width: 100%;
            display: block;
            padding: 15px;
            margin-bottom: 15px;
            position: relative;
        }
        .create_box label {
            margin-bottom: 0.1rem;
                font-weight: 600;
                color: #6c757d;
                padding-right: 10px;
        }
        .create_box {
            font-size: 14px;
        }
        .boxshadow {
            border-radius: 5px;
            box-shadow: 0rem 0.125rem 0.25rem #1f21241a, 0rem 0.0625rem 0.375rem #1f21240d;
            background: #ffffff;
        }
        .verify_otp_sec{
            display: flex;
            align-items: center;
            /*justify-content: center;*/
            gap: 10px;
        }
	</style>
</head>
<body>
    <?php //echo"<pre>"; print_r($eventinfo); ?>
    <div>
        <?php if($eventinfo[0]['wc_ws_company'] == 'DRCAST'){ ?>
            Technical Partner: DRCAST
        <?php } elseif($eventinfo[0]['wc_ws_company'] == 'Hetero'){ ?>
            Technical Partner: Hetero Healthcare
        <?php } elseif($eventinfo[0]['wc_ws_company'] == 'Azista'){ ?>
            Technical Partner: Azista Industries
        <?php } ?>
    </div>
    
    <a href="<?php echo base_url();?>register">
        <div class="reg-fix">
            <div class="decaration">
                <h4 class="b_ounce"><span class="bounce"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                    <strong><?php echo date('d',strtotime($eventinfo[0]['wc_w_datetime_from']));?><sup><?php echo date('S',strtotime($eventinfo[0]['wc_w_datetime_from']));?></sup> <?php echo date('M, l',strtotime($eventinfo[0]['wc_w_datetime_from']));?></strong> <small>Time: <?php echo date('h.i A',strtotime($eventinfo[0]['wc_w_datetime_from']));?></small>
                </h4>
            </div>
        </div>
    </a>
    <section class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class=""><img class="web-reg" src="https://www.drcast.in/uploads/invitations/<?php echo $eventinfo[0]['wc_w_invitation']; ?>" alt="<?php echo $eventinfo[0]['wc_w_topic']; ?>"></div>
                </div>
                <!-- <div class="col-sm-1"></div> -->
                <div class="col-sm-5">
                    <div class="login-block">
                        <h3>Sign in</h3>
                        <?php //echo "<pre>"; print_r($eventinfo); ?>
                        
                        <?php if($eventinfo[0]['wc_ws_login_authentication'] == 'True'){ ?>
                            <form name="register" id="register" method="post" enctype="multipart/form-data">
                        		<div id="mobilenumber ">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="text" class="form-control" name="wc_u_phone" id="wc_u_phone" required minlength="10" maxlength="10">
                                    </div>
                                    
                                    <div class="form-group text-center ">
                                        <button class="btn btn-sm btn-primary getotp btn-block" style="width: 150px;" id="getotp" onclick="OtpOnclick();" disabled="disabled">Get OTP</button>
                                    </div>
                                </div>
                                
                                <div id="verifyotp">
                                    <label class="" for="">Verify OTP</label>
                                    <div class="verify_otp_sec">
                                        <div class="">
                                            <input type="text" class="form-control" placeholder="Enter 6 digit code" minlength="6" maxlength="6" name="wc_u_otp" id="wc_u_otp" required>
                                        </div>
                                        <div class="mb-4">
                                            <label>&nbsp;</label><br>
                                            <button class="btn btn-sm btn-primary btn-block hide btnVrfy" id="resendotp" disabled>Resend OTP</button>
                                            <!--<div class="hide" id="countime">in (<span id="count">60</span>)</div>-->
                                        </div>
                                        <div class="hide" id="countime" style="color: red;">in (<span id="count">60</span>)</div>
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="submit" class="btn btn-primary btn-block" name="submit" id="submit" value="Login" />
                                    </div>
                                </div>
                                <h6><a href="<?php echo base_url();?>register"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span>Register</a></h6>
                        	</form>
                        
                        <?php } else{  ?>
                            <form class="form-horizontal" id="login" method="post">
                                <input type="hidden" name="webinar_login_type" value="<?php echo $eventinfo[0]['wc_ws_login_type']; ?>">
                                <div class="form-group">
                                    <label><?php if($eventinfo[0]['wc_ws_login_type'] == 'Email'){ echo "Email"; } elseif($eventinfo[0]['wc_ws_login_type'] == 'Mobile'){ echo "Phone"; } ?></label>
                                    <input type="text" autocomplete="off" class="form-control" placeholder="<?php if($eventinfo[0]['wc_ws_login_type'] == 'Email'){ echo "Email address"; } else if($eventinfo[0]['wc_ws_login_type'] == 'Mobile'){ echo "Phone number"; } else{ echo "Email address or phone number"; } ?>" name="username" id="username" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary log-btn" value="Login" name="submit" id="submit">
                                </div>
                                <h6><a href="<?php echo base_url();?>register"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span>Register</a></h6>
                            </form>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php $this->load->view('themes/'.$eventinfo[0]['wc_tm_name'].'/layout/js'); ?>
    <script>
    $('#verifyotp').hide();
    
    //enable get otp button
    $(document).ready(function() {
        $('.getotp').attr('disabled', true);
        
        // Enable Get OTP button when mobile number is valid
        $('#wc_u_phone').keyup(function () {
            if ($(this).val().length == 10)
                $('#getotp').attr('disabled', false);
            else
                $('#getotp').attr('disabled', true);
        });
        
        // Show Verify OTP section when Get OTP button is clicked
        $('#getotp').on('click', function() {
            //$('#mobilenumber').hide();
            $('#verifyotp').show();
        });
        
        // Reuse OtpOnclick for Resend OTP
        $('#resendotp').on('click', function () {
            OtpOnclick();
        });
    });
    
    function OtpOnclick() {
        // Simulate sending SMS
        var wc_u_phone = document.getElementById('wc_u_phone').value;
        $.ajax({
            url: '<?php echo base_url();?>Home/send_otp',
            dataType: 'text',
            type: 'post',
            data: {
                wc_u_phone: wc_u_phone
            },
            success: function(data) {
                var obj2 = jQuery.parseJSON(data);
            }
        });
    
        // Start countdown timer
        var counter = 60;
        $('#countime').removeClass("hide");
        $('#resendotp').attr('disabled', true); // Disable resend button initially
        $('#getotp').attr('disabled', true);   // Disable get OTP button
    
        var timer = setInterval(function () {
            if (counter > 0) {
                $("#count").text(counter); // Update countdown text
                counter--;
            } else {
                clearInterval(timer); // Stop the timer when counter reaches 0
                $('#resendotp').removeAttr("disabled"); // Enable resend OTP button
                $('#countime').addClass("hide"); // Hide countdown section
                $('#getotp').addClass("hide");  // Hide the initial Get OTP button
                $('#resendotp').removeClass("hide");  // Unhide Resend OTP button
            }
        }, 1000); // Run every 1 second
    }
    
    $(function() {
        $("#register").validate({
            rules: {
                wc_u_phone:{
        			required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true,
                    remote: {
                          url: "<?php echo base_url('Home/check_availability_wc_u_phone_login/"+$("#wc_u_phone").val()+"');?>",
                          type: "post",
                          data: {
    						column: function(){
                                return "wc_u_phone";
    						}
    					}
    				}
    			},
    			wc_u_otp:{
        			required: true,
                    minlength: 6,
                    maxlength: 6,
                    number: true,
    				remote: {
                        url: "<?php echo base_url('Home/check_availability_otp');?>",
                        type: "post",
                        data: {
                            wc_u_phone: function() {
                                return $("#wc_u_phone").val(); // Send wc_u_phone value
                            },
                            wc_u_otp: function() {
                                return $("#wc_u_otp").val(); // Send wc_r_otp value
                            }
                        }
                    }
    			},
            },
            messages: {
                wc_u_phone: {
                    required: "Enter your Mobile Number",
                    number: "Enter only digits",
                    minlength: "Enter valid mobilenumber",
                    maxlength: "Enter valid mobilenumber",
                    remote: jQuery.validator.format("{0} this user is not registered.")
                },
                wc_u_otp: {
                    required: "Enter OTP",
                    number: "Enter only digits",
                    minlength: "Enter valid OTP",
                    maxlength: "Enter valid OTP",
                    remote: jQuery.validator.format("{0} is not valid."),
                },
            }
        });
    }); //check_availability_login_username
    </script>
</body>
</html>