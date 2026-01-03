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
                                            <a href="<?php echo base_url();?>organizers"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> <span>Create Organizers</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="custom_form_div">
                            <form id="organizers_create" name="organizers_create" method="post" class="" enctype="multipart/form-data" novalidate="novalidate">
                                <input type="hidden" autocomplete="off" class="form-control" name="wc_u_code" value="<?php echo $this->session->userdata('wc_u_code'); ?>">
                                <div class="row">
                                    <div class="col-sm-8" id="organizers_section"
                                        style="padding-right: 8px;">
                                        <div class="create_box boxshadow">
                                            <h6>Organizers</h6>
                                            <div class="form-group">
                                                <label class="control-label" for="">Organizer Name </label>
                                                <input type="text" autocomplete="off" name="wc_o_name" placeholder="Please enter organizer name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">Organizer Email </label>
                                                <input type="text" autocomplete="off" name="wc_o_email" placeholder="Please enter organizer email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">Organizer Mobile </label>
                                                <input type="text" autocomplete="off" name="wc_o_mobile" placeholder="Please enter organizer mobile" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">Select Division</label>
                                                <select class="form-control" name="wc_di_code" id="wc_di_code">
                                                    <?php  if(empty($divisionlist)) { } else { ?>
                                                        <option value="">Select division name</option>
                                                        <?php foreach($divisionlist as $divisionlist) { ?>
                                                        <option value="<?php echo $divisionlist['wc_di_code']; ?>">
                                                        <?php echo $divisionlist['wc_di_name']; ?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
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
            $("#organizers_create").validate({
                // Specify the validation rules
                rules: {
                    wc_o_name: {
                        required: true                        
                    },
                    wc_o_email: {
                        required: true                        
                    },
                    wc_o_mobile: {
                        required: true                        
                    },
                    wc_di_id: {
                        required: true                        
                    }
                },
                // Specify the validation error messages
                messages: {
                    wc_o_name: {
                        required: "Please enter organizer name",                        
                    },
                    wc_o_email: {
                        required: "Please enter organizer email",                        
                    },
                    wc_o_mobile: {
                        required: "Please enter organizer mobile",                        
                    },
                    wc_di_id: {
                        required: "Please select division",                        
                    }
                }, 
            });
        });
    </script>
    <!--  End JavaScript -->
</body>
</html>