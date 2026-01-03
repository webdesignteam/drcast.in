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
    <section class="content-section content-section1">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class=""><img class="web-reg" src="https://www.drcast.in/uploads/invitations/<?php echo $eventinfo[0]['wc_w_invitation']; ?>" alt="<?php echo $eventinfo[0]['wc_w_topic']; ?>"></div>
                </div>
                <div class="col-sm-4">
                    <div class="registration-form">
                        <h3>Registration Form</h3>
                        <form class="form-horizontal" method="post" name="event_register" id="event_register" enctype="multipart/form-data">
                            <?php if($eventinfo[0]['wc_ws_re_name'] == "True"){ ?>
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Introduce yourself" name="wc_u_display_name">
                                </div>
                            <?php } ?>
                            <?php if($eventinfo[0]['wc_ws_re_mobile'] == "True"){ ?>
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <?php $this->session->userdata('MOBILE'); ?>
                                    <input type="text" autocomplete="off" class="form-control" value="<?php echo $this->session->userdata('MOBILE');?>" placeholder="Can we have your digits" name="wc_u_phone" id="wc_u_phone">
                                </div>
                            <?php } ?>
                            <?php if($eventinfo[0]['wc_ws_re_email'] == "True"){ ?>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" value="<?php echo $this->session->userdata('EMAIL');?>" autocomplete="off" class="form-control" placeholder="Can we have your email" name="wc_u_email" id="wc_u_email">
                                </div>
                            <?php } ?>
                            <?php if($eventinfo[0]['wc_ws_re_speciality'] == "True"){ ?>
                                <div class="form-group">
                                    <label for="specialitycarbiact">Speciality</label><br>
                                    <select name="wc_u_speciality" id="wc_u_speciality" class="form-control" required>
                                        <option value="">Select Speciality</option>
                                        <?php if(empty($specialities)){ echo '<option value="">No Data</option>'; }else { ?>
                                            <?php //echo "<pre>"; print_r($specialities); ?>
                                            <?php foreach($specialities as $speciality_list) {?>
                                                <option value="<?php echo $speciality_list['wc_drs_value']; ?>"><?php echo $speciality_list[ 'wc_drs_name']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                        <option value="Other">Other</option>
                                    </select>
                                    <input style="display:none;" type="text" class="form-control" placeholder="Write your speciality" name="wc_u_speciality_other" id="wc_u_speciality_other">
                                </div>
                            <?php } ?>
     
                            <?php if($eventinfo[0]['wc_ws_re_mci'] == "True"){ ?>
                                <div class="form-group">
                                    <label>Doctor MCI Number</label>
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Can we have your digits?" name="wc_u_mci_no">
                                </div>
                            <?php } ?>
                          
                            <?php if($eventinfo[0]['wc_ws_re_location'] == "True"){ ?>
                                <div class="form-group">
                                    <label>State</label>
                                    <select name="wc_u_state" class="form-control" autocomplete="off">
                                        <option value="">Select State</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                        <option value="Daman and Diu">Daman and Diu</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Puducherry">Puducherry</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="West Bengal">West Bengal</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" autocomplete="off" class="form-control" placeholder="City" name="wc_u_city">
                                </div>
                            <?php } ?>
         
                            <input type="submit" class="btn btn-primary sub-btn" name="submit" id="submit" value="Submit" />
                            <!--<h6>Already member..? <a href="<?php echo base_url();?>">Login</a></h6>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('themes/'.$eventinfo[0]['wc_tm_name'].'/layout/js'); ?>
    <script>
        $(document).ready(function() {
            $('#wc_u_speciality').change(function() {
                if ($(this).val() === 'Other') {
                    $(this).hide(); // hide select
                    $('#wc_u_speciality_other').show().prop('required', true).focus(); // show input
                } else {
                    $('#wc_u_speciality_other').hide().prop('required', false); // hide input
                    $(this).show(); // keep select visible
                }
            });
        });
        
        // email: {
        //                 required: true,
        //                 email: true,
        //                 /*remote: {
        //                       url: "<?php echo base_url('Home/check_availability_email/"+$("#email").val()+"');?>",
        //                       type: "post",
        //                       data: {
        // 						column: function(){
        //                             return "email";
        // 						}
        // 					}
        // 				}*/
        //             },
    
        $(function() {
            $("#event_register").validate({
                rules: {
                    wc_u_display_name: {
                        required: true,
                    },
                    
                    wc_u_mci_no:{
                        required: true,
                    },
                    wc_u_phone:{
            			required: true,
                        minlength: 10,
                        maxlength: 10,
                        number: true,
        				remote: {
                              url: "<?php echo base_url('Home/check_availability_wc_u_phone/"+$("#wc_u_phone").val()+"');?>",
                              type: "post",
                              data: {
        						column: function(){
                                    return "wc_u_phone";
        						}
        					}
        				}
        			},
        			wc_u_email:{
        			    email: true,
        			    remote: {
                              url: "<?php echo base_url('Home/check_availability_wc_u_email/"+$("#wc_u_email").val()+"');?>",
                              type: "post",
                              data:{
        						column: function(){
                                    return "wc_u_email";
        						}
        					}
        				}
        			}
                },
                messages: {
                    wc_u_display_name: {
                        required: "Please enter your name",
                    },
                    wc_u_phone: {
                        required: "Please enter your phone number",
                        number: "Enter only digits",
                        minlength: "Enter valid mobilenumber",
                        maxlength: "Enter valid mobilenumber",
                        remote: jQuery.validator.format("{0} is already exists.")
                    },
                    wc_u_email:{
                        email: "Enter valid email",
                        remote: jQuery.validator.format("{0} is already exists.")
                    },
                    wc_u_mci_no: {
                        required: "Enter your doctor registration code",
                    },
                },
                /*submitHandler: function(form) {
                    // for demo
                    //alert("Hi");
                    var myForm = document.getElementById("register");
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('Home/addUser');?>",
                        dataType: "text", // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: new FormData(myForm),
                        success: function(data) {
                            // alert(data);
                            var obj = jQuery.parseJSON(data);
                            if (obj.status == 1) {
                                  //swal.fire("Success", "Registered Successfully.", "success").then(function () {
                                   //window.location = "<?php echo base_url()?>streaming";
                                  //});
                                window.location = "<?php echo base_url('streaming')?>";
                            } else {
                                Swal.fire("Oops", obj.message, "error");
                            }
                        },
                    });
                    return false;
                },*/
            });
        });
    </script>
</body>
</html>