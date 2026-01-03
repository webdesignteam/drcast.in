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
    <div class="fixed-top header-section">
        <div class="container">
            <!-- navbar-me -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light website-nav">
                <?php $this->load->view('layout/nav');  ?>
                <button type="button" class="instruction-btn" data-toggle="modal"
                    data-target="#instructions">Instructions</button>
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
    <a href="<?php echo base_url();?>register">
        <div class="reg-fix">
            <div class="decaration">
                <h4 class="b_ounce"><span class="bounce"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                    <strong><?php echo date('d',strtotime($webinarinfo[0]['webinar_date']));?><sup><?php echo date('S',strtotime($webinarinfo[0]['webinar_date']));?></sup> <?php echo date('M, l',strtotime($webinarinfo[0]['webinar_date']));?></strong> <small>Time: <?php echo date('h.i A',strtotime($webinarinfo[0]['webinar_start']));?></small>
                </h4>
            </div>
        </div>
    </a>
    <!-- Slider Start -->
    <section class="content-section content-section1">
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
                <div class="col-sm-4">
                    <div class="registration-form">
                        <h3>Registration Form</h3>
                        <form class="form-horizontal" method="post" name="register" id="register"
                            enctype="multipart/form-data">
                            <?php if($webinarinfo[0]['re_name'] == "Yes"){ ?>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" autocomplete="off" class="form-control" placeholder="Introduce Yourself." name="fullname" id="fullname">
                            </div>
                            <?php } ?>
                            
                            <?php if($webinarinfo[0]['re_speciality_carbiact'] == "Yes"){ ?>
                                   <div class="form-group">
                                        <label for="specialitycarbiact">Speciality</label><br>
                                        <select name="specialitycarbiact" id="specialitycarbiact" class="form-control" required>
                                            <option value="">-- Select Speciality --</option>
                                            <option value="Obstetricians & Gynecologists (OBG)">Obstetricians & Gynecologists (OBG)</option>
                                            <option value="Gynecologists">Gynecologists</option>Others
                                            <option value="OBG / IVF">OBG / IVF</option>
                                             <option value="Others">Others</option>
                                        </select>
                                    </div>
                            <?php } ?>
                            
                            
                            <?php if($webinarinfo[0]['re_email'] == "Yes"){ ?>
                            <div class="form-group">
                                <label>Email</label>
                                <input style="text-transform: lowercase !important;" type="text" value="<?php echo $this->session->userdata('EMAIL');?>" autocomplete="off" class="form-control" placeholder="Can we have your Email" id="email" name="email">
                            </div>
                            <?php } ?>
                            
                            <?php if($webinarinfo[0]['re_mobile'] == "Yes"){ ?>
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <?php $this->session->userdata('MOBILE'); ?>
                                <input type="text" autocomplete="off" class="form-control" value="<?php echo $this->session->userdata('MOBILE');?>" placeholder="Can we have your digits?" id="mobilenumber" name="mobilenumber">
                            </div>
                            <?php } ?>
                            
                            <?php if($webinarinfo[0]['re_attend_webinar'] == "Yes"){ ?>
                            <div class="form-group">
                                <label>Would You like to attend this webinar?</label><br>
                                <label class="radio-inline mr-3">
                                    <input type="radio" name="attendwebinar" value="Yes" required> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="attendwebinar" value="No"> No
                                </label>
                            </div>
                            <?php } ?>
                            
                            <?php if($webinarinfo[0]['re_attend_webinar'] == "Yes"){ ?>
                            <div class="form-group">
                                <label for="timeslot">Preferred Time Slot</label><br>
                                <select name="timeslot" id="timeslot" class="form-control" required>
                                    <option value="">-- Select Time Slot --</option>
                                    <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                                    <option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                                    <option value="12:00 PM - 1:00 PM">12:00 PM - 1:00 PM</option>
                                    <option value="1:00 PM - 2:00 PM">1:00 PM - 2:00 PM</option>
                                    <option value="2:00 PM - 3:00 PM">2:00 PM - 3:00 PM</option>
                                    <option value="3:00 PM - 4:00 PM">3:00 PM - 4:00 PM</option>
                                    <option value="4:00 PM - 5:00 PM">4:00 PM - 5:00 PM</option>
                                    <option value="5:00 PM - 6:00 PM">5:00 PM - 6:00 PM</option>
                                    <option value="6:00 PM - 7:00 PM">6:00 PM - 7:00 PM</option>
                                    <option value="7:00 PM - 8:00 PM">7:00 PM - 8:00 PM</option>
                                    <option value="8:00 PM - 9:00 PM">8:00 PM - 9:00 PM</option>
                                </select>
                            </div>
                            <?php } ?>
                            
                            <?php if($webinarinfo[0]['re_timeslot'] == "Yes"){ ?>
                            <div class="form-group">
                                <label>Probable Questions</label>
                                <input type="text" autocomplete="off" class="form-control" placeholder="Can we have your Questions?" id="probquestions" name="probquestions">
                            </div>
                            <?php } ?>
                            
                            
                            <?php if($webinarinfo[0]['re_mci'] == "Yes"){ ?>
                            <div class="form-group">
                                <label>Dr. Code</label>
                                <input type="text" autocomplete="off" class="form-control" placeholder="Can we have your digits?" id="mcinumber" name="mcinumber">
                            </div>
                            <?php } ?>
                            
                            <?php if($webinarinfo[0]['re_div_name'] == "Yes"){ ?>
                            <div class="form-group">
                                <label>Division name</label>
                                <input type="text" autocomplete="off" class="form-control" placeholder="Can we have your Division name?" id="divname" name="divname">
                            </div>
                            <?php } ?>
                            
                           
                            <?php if($webinarinfo[0]['re_hq'] == "Yes"){ ?>
                            <div class="form-group">
                                <label>Head Quarter</label>
                                <input type="text" autocomplete="off" class="form-control" placeholder="Please enter your Head Quarter" id="head_quarter" name="head_quarter">
                            </div>
                            <?php } ?>
                             
                            
                            
                            
                            <?php if($webinarinfo[0]['re_reason_message'] == "Yes"){ ?>
                            <div class="form-group">
                                <label>Reason for not preferring oseltamivir as a first line drug</label>
                                <input type="text" autocomplete="off" class="form-control" placeholder="Can we have your reason?" id="reasonmessage" name="reasonmessage">
                            </div>
                            <?php } ?>
                            
                            <!--<div class="form-group">-->
                            <!--    <label>Preferred Time Slot</label><br>-->
                            <!--    <label class="radio-inline mr-3">-->
                            <!--        <input type="radio" name="timeslot" value="3-4 PM" required> 3–4 PM-->
                            <!--    </label>-->
                            <!--    <label class="radio-inline mr-3">-->
                            <!--        <input type="radio" name="timeslot" value="4-5 PM"> 4–5 PM-->
                            <!--    </label>-->
                            <!--    <label class="radio-inline">-->
                            <!--        <input type="radio" name="timeslot" value="5-6 PM"> 5–6 PM-->
                            <!--    </label>-->
                            <!--</div>-->
                            
                            

                            
                            

                            <!--<?php if($webinarinfo[0]['re_timeslot'] == "Yes"){ ?>-->
                            <!--<div class="form-group">-->
                            <!--    <label>Preferred Time Slot</label>-->
                            <!--    <input type="text" autocomplete="off" class="form-control" placeholder="Can we have your name?" id="timeslot" name="timeslot">-->
                            <!--</div>-->
                            <!--<?php } ?>-->

                            
                           
                            
                            <?php if($webinarinfo[0]['re_speciality'] == "Yes"){ ?>
                            <div class="form-group">
                                <label>Speciality</label>
                                <input type="text" autocomplete="off" class="form-control" placeholder="Speciality" id="speciality" name="speciality">
                            </div>
                            <?php } ?>
                            <?php if($webinarinfo[0]['re_address'] == "Yes"){ ?>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" autocomplete="off" class="form-control" placeholder="City" id="city" name="city">
                            </div>
                            <div class="form-group">
                                <label>State</label>
                                <select name="state" id="state" class="form-control" autocomplete="off">
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
                            <?php } ?>
                            
                            <?php if($webinarinfo[0]['re_employee_name'] == "Yes"){ ?>
                            <p class="text-left mt-40 mb-0"><b>Employee Details</b></p>
                            <hr class="mt-0">
                            
                             
                            <div class="form-group">
                                <label>Employee Name</label>
                                <input type="text" autocomplete="off" class="form-control" placeholder="Can we have your name?" id="employeename" name="employeename">
                            </div>
                            <?php } ?>
                            
                            <?php if($webinarinfo[0]['re_empc'] == "Yes"){ ?>
                            <div class="form-group">
                                <label>Employee Code</label>
                                <input type="text" autocomplete="off" class="form-control" placeholder="Can we have your digits?" id="employee_code" name="employee_code">
                            </div>
                            <?php } ?>
                            
                            
                            
                            <?php if($webinarinfo[0]['re_desc'] == "Yes"){ ?>
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" autocomplete="off" class="form-control" placeholder="Can we have your Designation?" id="designation" name="designation">
                            </div>
                            <?php } ?>
                            
                             
                            
                            <?php if($webinarinfo[0]['re_region'] == "Yes"){ ?>
                            <div class="form-group">
                                <label>Region</label>
                                <input type="text" autocomplete="off" class="form-control" placeholder="Region" id="region" name="region">
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
        $("#register").validate({
            rules: {
                fullname: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                    /*remote: {
                          url: "<?php echo base_url('Home/check_availability_email/"+$("#email").val()+"');?>",
                          type: "post",
                          data: {
    						column: function(){
                                return "email";
    						}
    					}
    				}*/
                },
                mcinumber:{
                    required: true,
                },
                divname:{
                    required: true,
                },
                probquestions:{
                    required: true,
                },
                specialitycarbiact:{
                    required: true,
                },
                employeename:{
                    required: true,
                },
                reasonmessage:{
                    required: true,
                },
                 drname:{
                    required: true,
                },
                  timeslot:{
                    required: true,
                },
                  attendwebinar:{
                    required: true,
                },
                designation:{
                    required: true,
                },
                 employee_code:{
                    required: true,
                },
                head_quarter:{
                    required: true,
                },
                drcode:{
                    required: true,
                },
                speciality:{
                    required: true,
                },
                mobilenumber:{
        			required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true,
    				remote: {
                          url: "<?php echo base_url('Home/check_availability_mobilenumber/"+$("#mobilenumber").val()+"');?>",
                          type: "post",
                          data: {
    						column: function(){
                                return "mobilenumber";
    						}
    					}
    				}
    			},
                city: {
                    required: true,
                },
                state: {
                    required: true,
                },
            },
            messages: {
                fullname: {
                    required: "Enter your Name",
                },
                email: {
                    required: "Enter your Email",
                    //remote: jQuery.validator.format("{0} is already exists."),
                },
                mcinumber: {
                    required: "Enter your Doctor Code number",
                },
                divname: {
                    required: "Enter your Division Name",
                },
                probquestions: {
                    required: "Enter your Questions",
                },
                 specialitycarbiact: {
                    required: "Enter your Speciality",
                },
                employeename: {
                    required: "Enter your employee name",
                },
                reasonmessage: {
                    required: "Enter your reason",
                },
                drname: {
                    required: "Enter your name",
                },
                 timeslot: {
                    required: "Enter your time slot",
                },
                 attendwebinar: {
                    required: "Enter your time answer",
                },
                designation: {
                    required: "Enter your Designation",
                },
                employee_code: {
                    required: "Enter your Employee Code number",
                },
                head_quarter: {
                    required: "Enter your Head Quarter",
                },
                drcode: {
                    required: "Enter your Doctor Code",
                },
                speciality: {
                    required: "Enter your Speciality",
                },
                mobilenumber: {
                    required: "Enter your Mobile Number",
                    number: "Enter only digits",
                    minlength: "Enter valid mobilenumber",
                    maxlength: "Enter valid mobilenumber",
                    remote: jQuery.validator.format("{0} is already exists."),
                },
                city: {
                    required: "Enter your City",
                },
                state: {
                    required: "Select your State",
                }
            },
            submitHandler: function(form) {
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
            },
        });
    });
    </script>
</body>
</html>