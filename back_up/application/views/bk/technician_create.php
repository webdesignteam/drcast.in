<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layout/meta');?>
    <?php $this->load->view('layout/styles');?>
</head>
<body>
    <?php $this->load->view('layout/nav');  ?>
    <?php $this->load->view('layout/leftnav');  ?>
    <main class="main_page_view__content over_flow">
        <section>
            <div class="container">
                <div class="row justify-content-sm-center">
                    <div class="col-sm-11">
                        <div class="top_product">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="top_product_content">
                                        <div class="ancor_txt">
                                            <a href="<?php echo base_url();?>technicians"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> <span>Create Technicians</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom_form_div">
                            <form id="technicians_create" name="technicians_create" method="post" class="" enctype="multipart/form-data" novalidate="novalidate">
                                <input type="hidden" autocomplete="off" class="form-control" name="wc_u_code" value="<?php echo $this->session->userdata('wc_u_code'); ?>">
                                <div class="row">
                                    <div class="col-sm-8" id="technicians_section"
                                        style="padding-right: 8px;">
                                        <div class="create_box boxshadow">
                                            <h6>Technicians</h6>
                                            <div class="form-group">
                                                <label class="control-label" for="">Technician Name </label>
                                                <input type="text" autocomplete="off" name="wc_t_name" placeholder="Please enter technician name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">Technician Email </label>
                                                <input type="text" autocomplete="off" name="wc_t_email" placeholder="Please enter technician email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">Technician Contact number </label>
                                                <input type="tel" autocomplete="off" name="wc_t_mobile" placeholder="Please enter technician contact number" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rtbtn text-right">
                                    <input type="submit" value="Save" id="submit" name="submit"
                                        class="btn btn-secondary custom_add">
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

            $("#technicians_create").validate({
                // Specify the validation rules
                rules: {
                    wc_t_name: {
                        required: true
                    },
                    wc_t_email:{
                        required: true
                    },
                    wc_t_mobile: {
                        required: true
                    }
                },
                // Specify the validation error messages
                messages: {
                    wc_t_name: {
                        required: "Please enter technician name",                        
                    },
                    wc_t_email:{
                        required: "Please enter technician email"
                    },
                    wc_t_mobile: {
                        required: "Please enter technician contact numer",                        
                    }
                }, 
            });
        });
    </script>



    <!--  End JavaScript -->
</body>

</html>