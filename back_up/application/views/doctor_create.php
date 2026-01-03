<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/meta');?>
    <?php $this->load->view('layout/styles');?>
   
    </style>
</head>

<body>
    <?php $this->load->view('layout/nav');  ?>
    <?php $this->load->view('layout/leftnav');  ?>
    <main class="main_page_view__content over_flow">
        <section>
            <div class="container">
                <div class="row justify-content-sm-center">
                    <div class="col-sm-12">
                        <div class="top_product">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="top_product_content">
                                        <div class="ancor_txt">
                                            <p>Doctor Registration </p>
                                            <a href="<?php echo base_url();?>doctors">
                                                <i class="fa fa-long-arrow-left" aria-hidden="true"></i> 
                                                <span>List of doctor</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="custom_form_div">
                            <form id="speaker_create" name="speaker_create" method="post" class="doctorcreateform" enctype="multipart/form-data" novalidate="novalidate">
                                <input type="hidden" autocomplete="off" class="form-control" name="wc_u_code" value="<?php echo $this->session->userdata('wc_u_code'); ?>">
        
                                <div class="row ct_line">
                                    <div class="col-sm-12" id="speakers_section">
                                        <div class="create_box boxshadow p-4 rounded">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                     <div class="form-group">
                                                <label class="floating-label">Name</label>
                                                <input type="text" autocomplete="off" name="wc_d_name" placeholder="Enter full name" class="form-control">
                                            </div>
                                                </div>
                                                 <div class="col-sm-4">
                                                     <div class="form-group">
                                                <label class="floating-label">Email</label>
                                                <input type="email" autocomplete="off" name="wc_d_email" placeholder="Enter email address" class="form-control">
                                            </div>
                                                </div>
                                                 <div class="col-sm-4">
                                                     <div class="form-group">
                                                <label class="floating-label">Contact No</label>
                                                <input type="tel" autocomplete="off" name="wc_d_contact" placeholder="Enter contact number" class="form-control">
                                            </div>
                                                </div>
                                                  <div class="col-sm-4">
                                                     <div class="form-group align-items-center">
                                                <label class="floating-label">Upload Photo</label>
                                                <input type="file" autocomplete="off" name="wc_d_display_photo" id="wc_d_display_photo" class="form-control" onchange="previewImage(event)">
                                                <img id="photoPreview" class="mt-2 rounded d-none" style="width: 100px; height: 100px; object-fit: cover;">
                                            </div>
                                                </div>
                                                 <div class="col-sm-4">
                                                     
                                            <div class="form-group">
                                                <label class="floating-label">Select Division</label>
                                                <select class="form-control" name="wc_di_code" id="wc_di_code">
                                                    <option value="">Select division</option>
                                                    <?php if (!empty($divisionslist)) { ?>
                                                        <?php foreach ($divisionslist as $divisionlist) { ?>
                                                            <option value="<?php echo $divisionlist['wc_di_code']; ?>">
                                                                <?php echo $divisionlist['wc_di_name']; ?>
                                                            </option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                                 </div>
                                                  <div class="col-sm-4">
                                                       <div class="form-group">
                                                <label class="floating-label">Hospital Name</label>
                                                <input type="text" autocomplete="off" name="wc_d_hospital" placeholder="Enter hospital name" class="form-control">
                                            </div>
                                                  </div>
                                                   <div class="col-sm-4">
                                                         <div class="form-group">
                                                <label class="floating-label">Headquarters</label>
                                                <input type="text" autocomplete="off" name="wc_d_headquaters" placeholder="Enter headquarters name" class="form-control">
                                            </div>
                                                   </div>
                                                    <div class="col-sm-4">
                                                         <div class="form-group">
                                                <label class="floating-label">Doctor Code</label>
                                                <input type="text" autocomplete="off" name="wc_d_code_sap" placeholder="Enter doctor code" class="form-control">
                                            </div>
                                                    </div>
                                                     <div class="col-sm-4">
                                                          <div class="form-group">
                                                <label class="floating-label">Position</label>
                                                <input type="text" autocomplete="off" name="wc_d_position" placeholder="Enter position" class="form-control">
                                            </div>
                                                     </div>
                                                      <div class="col-sm-12">
                                                           <div class="form-group">
                                                <label class="floating-label">Educational Credentials</label>
                                                <textarea name="wc_d_education" placeholder="Enter education credentials" class="form-control"></textarea>
                                            </div>
                                                      </div>
                                                       <div class="col-sm-12">
                                                             <div class="form-group">
                                                <label class="floating-label">Location</label>
                                                <textarea name="wc_d_location" placeholder="Enter location details" class="form-control"></textarea>
                                            </div>
                                                       </div>
                                                        
                                                             
                                            </div>
                                          
                                           
                                           
                                           
                                           
                                          
                                           
                                           
                                           
                                          
                                        </div>
                                    </div>
                                </div>
                        <div class="rtbtn text-right">
                                <input class="btn btn-primary custom_add" type="submit" id="submit" name="submit" value="Save">
                           
                        </div>
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--  JavaScript -->
    <?php $this->load->view('layout/js');  ?>
    <script src="<?php echo base_url();?>assets/texteditor/tinytexteditor.js"></script>

   

    <script>
        $(document).ready(function () {
            $('input[name="contact"]').keyup(function (e) {
                if (/\D/g.test(this.value)) {
                    // Filter non-digits from input value.
                    this.value = this.value.replace(/\D/g, '');
                }
            });
            // Setup form validation on the #register-form element

            $("#speaker_create").validate({
                // Specify the validation rules
                rules: {
                    wc_d_name: {
                        required: true                        
                    },
                    wc_d_email: {
                        required: true                        
                    },
                    wc_d_contact: {
                        required: true                        
                    },
                     wc_d_hospital: {
                        required: true                        
                    },
                    wc_d_position: {
                        required: true                        
                    },
                    wc_d_code_sap: {
                        required: true                        
                    }, 
                    wc_d_education: {
                        required: true                    
                    },
                    wc_d_location: {
                        required: true                        
                    }, 
                    wc_d_headquaters: {
                        required: true                        
                    }
                },
                // Specify the validation error messages
                messages: {
                    wc_d_name: {
                        required: "Please enter name",                        
                    },
                    wc_d_email: {
                        required: "Please enter email",                        
                    },
                     wc_d_contact: {
                        required: "Please enter contact number",                        
                    },
                     wc_d_hospital: {
                        required: "Please enter hospital name",                        
                    },
                    wc_d_position: {
                        required: "Please enter position",                        
                    },
                    wc_d_code_sap: {
                        required: "Please enter doctor code",                        
                    },
                    wc_d_education: {
                        required: "Please enter education credentials",                        
                    },
                    wc_d_location: {
                        required: "Please enter location",                        
                    }, 
                    wc_d_headquaters: {
                        required: "Please enter headquaters"                        
                    }
                }, 
            });
        });
    </script>
    <script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('photoPreview');
            output.src = reader.result;
            output.classList.remove("d-none");
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>



    <!--  End JavaScript -->
</body>

</html>