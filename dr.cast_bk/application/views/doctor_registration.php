<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('layout/meta');?>
    <?php $this->load->view('layout/styles');?>
    <title>Leaflets | Azista Industries Private Limited</title>
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
    <section class="background_gray ">
        <div class="container">
            <div class="row rigister_section">
                <div class="col-md-10">
                    <div class="custom_form_div">
                        <!--<h3 class="text-center mb-4 font-weight-bold">Create leaflet request</h3>-->
                        <div class="text-center mb-4">
        					<img src="<?php echo base_url();?>assets/img/drlogo.svg" alt="logo" class="_logo" width="26%">
        				</div>
                        <div class="create_box boxshadow">
                            <!--<div class="row">-->
                                <form name="register" id="doc_register" method="post" enctype="multipart/form-data">
                        	    <input type="hidden" id="lc_pi_access_url" class="form-control" name="lc_pi_access_url" value="<?php echo $this->uri->segment(2); ?>" />
                        		<div class="row">
                        		<!--<div class="row">-->
                                    <!-- Doctor Name -->
                                    <div class="form-group col-md-6">
                                        <label>Doctor Name (Full Name)</label>
                                        <input type="text" class="form-control"
                                               name="we_doctor_name"
                                               id="we_doctor_name"
                                                />
                                    </div>
                                
                                    <!-- Gender (Optional) -->
                                    <div class="form-group col-md-6">
                                        <label>Gender</label>
                                        <select class="form-control"
                                                name="we_gender"
                                                id="we_gender">
                                            <option value="">Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                
                                    <!-- Qualification -->
                                    <div class="form-group col-md-6">
                                        <label>Qualification</label>
                                        <input type="text" class="form-control"
                                               name="we_qualification"
                                               id="we_qualification"
                                               placeholder="MBBS, MD, DM"
                                                />
                                    </div>
                                
                                    <!-- Specialization -->
                                    <div class="form-group col-md-6">
                                        <label>Specialization</label>
                                        <input type="text" class="form-control"
                                               name="we_specialization"
                                               id="we_specialization"
                                               placeholder="Cardiology, Oncology, General Medicine"
                                                />
                                    </div>
                                
                                    <!-- Medical Council Registration Number -->
                                    <div class="form-group col-md-6">
                                        <label>Medical Council Registration Number</label>
                                        <input type="text" class="form-control"
                                               name="we_medical_reg_no"
                                               id="we_medical_reg_no"
                                                />
                                    </div>
                                
                                    <!-- Years of Experience -->
                                    <div class="form-group col-md-6">
                                        <label>Years of Experience</label>
                                        <input type="number" class="form-control"
                                               name="we_experience"
                                               id="we_experience"
                                               min="0"
                                               max="60" />
                                    </div>
                                
                                <!--</div>-->

                                <div class="form-group text-center col-md-12">
                                    <input type="submit" class="btn btn-primary btn-block" name="register_submit" id="register_submit" value="Submit" />
                                </div>
                        </div>
                                
                        	</form>
                        	<!--</div>-->
    	                </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php $this->load->view('layout/js');  ?>
<script>
    $('#verifyotp').hide();
    
    //enable get otp button
    $(document).ready(function() {
        $('.getotp').attr('disabled', true);
        
        // Enable Get OTP button when mobile number is valid
        $('#lc_r_mobile').keyup(function () {
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
        var lc_r_mobile = document.getElementById('lc_r_mobile').value;
        $.ajax({
            url: '<?php echo base_url();?>Home/send_otp',
            dataType: 'text',
            type: 'post',
            data: {
                lc_r_mobile: lc_r_mobile
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
        $("#doc_register").validate({
            rules: {
                we_doctor_name: {
                    required: true,
                    minlength: 3
                },
                we_gender: {
                    required: true
                },
                we_qualification: {
                    required: true,
                    minlength: 2
                },
                we_specialization: {
                    required: true,
                    minlength: 3
                },
                we_medical_reg_no: {
                    required: true,
                    minlength: 5,
                    maxlength: 50
                },
                we_experience: {
                    required: true,
                    number: true,
                    min: 0,
                    max: 60
                }
            },
            messages: {
                we_doctor_name: {
                    required: "Enter Doctor Full Name",
                    minlength: "Doctor name must be at least 3 characters"
                },
                we_gender: {
                    required: "Select gender"
                },
                we_qualification: {
                    required: "Enter qualification",
                    minlength: "Enter valid qualification"
                },
                we_specialization: {
                    required: "Enter specialization",
                    minlength: "Enter valid specialization"
                },
                we_medical_reg_no: {
                    required: "Enter Medical Council Registration Number",
                    minlength: "Enter valid registration number",
                    maxlength: "Registration number is too long"
                },
                we_experience: {
                    required: "Enter your experience",
                    number: "Enter valid years of experience",
                    min: "Experience cannot be negative",
                    max: "Experience cannot exceed 60 years"
                }
            },
            submitHandler: function(form) { // for demo
                // alert('Hi');
                /*swal(
                'Success',
                'You clicked the <b style="color:green;">Success</b> button!',
                'success'
                )*/
            
                
                if($("#register_submit").val("Processing...")){
                    $("#register_submit").prop('disabled', 'disabled');
                }
                var myForm = document.getElementById('doc_register');
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url();?>Home/doc_registersubmission',
                    dataType: 'text', // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: new FormData(myForm),
                    success: function(data) {
                        window.location = data;
                    }
                });
                return false;
            }
        });
    });
    </script>
</html>