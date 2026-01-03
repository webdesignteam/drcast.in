<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layout/meta');?>
    <?php $this->load->view('layout/styles');?>
</head>
<body>
     <div class="pre-loader" id="loading">
         <img src="<?php echo base_url();?>/assets/img/loader.gif?Version=<?php echo Version; ?>" alt="Loading...">
    </div>
     <?php $this->load->view('layout/nav');  ?>
    <?php $this->load->view('layout/leftnav');  ?>
    <main class="main_page_view__content">
        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                         <div class="top_product">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="top_product_content">
                                        <div class="ancor_txt">
                                            <p>Create User </p>
                                            <a href="<?php echo base_url();?>doctors">
                                                <i class="fa fa-long-arrow-left" aria-hidden="true"></i> 
                                                <span>List of users</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom_form_div">
                        <form id="payment_credits" method="post" class="payment-form">
                            <div class="row ct_line">
                                <div class="col-sm-12">
                                    <div class="create_box boxshadow p-4 rounded">
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text"  class="form-control" name="wc_u_display_name"  placeholder="Enter name" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Employee Id</label>
                                                    <input type="text"  class="form-control" name="wc_u_empid"  placeholder="Enter employee id" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email"  class="form-control" name="wc_u_email"  placeholder="Enter email" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Mobile</label>
                                                    <input type="text"  class="form-control" name="wc_u_phone"  placeholder="Enter mobile" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Admin Type</label>
                                                    <select name="wc_u_type" id="" class="form-control">
                                                      <option value="">Select Type</option>
                                                      <!--<option value="Admin">Admin</option>-->
                                                      <option value="Employee">Employee</option>
                                                      <option value="Support Team">Support Team</option>
                                                      <option value="Participant">Participant</option>
                                                      <option value="Organizer">Organizer</option>
                                                      <option value="Technician">Technician</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Role</label>
                                                    <select name="wc_u_role" id="" class="form-control">
                                                      <option value="">Select role</option>
                                                      <option value="Admin">Admin</option>
                                                      <option value="Create">Create</option>
                                                      <option value="Edit">Edit</option>
                                                      <option value="Update">Update</option>
                                                      <option value="Delete">Delete</option>
                                                      <option value="Review">Review</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                
                                                <div class="form-group">
                                                    <label for="division">Division</label>
                                                    <select class="form-control" id="wc_di_code" name="wc_di_code">
                                                        <option value="">Select division</option>
                                                        <?php if(empty($divisions)){ echo '<option value="">No Data</option>'; }else { ?>
                                                            <?php //echo "<pre>"; print_r($divisions); ?>
                                                            <?php foreach($divisions as $divisions_list) {?>
                                                                <option value="<?php echo $divisions_list['wc_di_code']; ?>"><?php echo $divisions_list[ 'wc_di_name']; ?></option>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <div class="rtbtn text-right">
                                <input class="btn btn-primary custom_add" type="submit" id="submit" name="submit" value="Submit">
                           
                        </div>
                           
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php  $this->load->view('layout/copyright'); ?>
    <?php $this->load->view('layout/js');  ?>
    <?php $checkAvailabilityURL = base_url('Home/check_availability_create_user/'); ?>
    <script>
    $(document).ready(function(){
        $("input[validator='mobile']").on("input", function(e) {
            var self = $(this);
            self.val(self.val().replace(/[^0-9]/g, ''));
            if((e.keyCode >= 48 && e.keyCode <=57) || (e.keyCode >= 96 && e.keyCode <=105)) {
                // entered key is a number
            }else{
                e.preventDefault();
            }
        });
        
        $("#payment_credits").validate({
            rules: {
                wc_u_display_name: {
                    required: true,
                },
                wc_u_email: {
                    required: true,
                },
                wc_u_phone: {
                    required: true,
                },
                abhcl_u_division: {
                    required: true,
                },
                wc_u_type: {
                    required: true,
                },
                wc_u_role: {
                    required: true,
                },
                wc_di_code: {
                    required: true,
                },
                wc_u_empid: {
                    required: true,
                    remote: {
                        url: "<?php echo $checkAvailabilityURL; ?>" + $("#wc_u_empid").val(),
                        type: "post",
                        data: {
                            column: function(){
                                return "wc_u_empid";
                            },
                        }
                    }
                },
            },
            messages: {
                wc_u_display_name: {
                    required: "Please enter name.",
                },
                wc_u_email: {
                    required: "Please enter email.",
                },
                wc_u_phone: {
                    required: "Please enter mobile.",
                },
                abhcl_u_location: {
                    required: "Please enter location.",
                },
                wc_u_type: {
                    required: "Please select type.",
                },
                wc_u_role: {
                    required: "Please select role.",
                },
                wc_di_code: {
                    required: "Please select division.",
                },
                wc_u_empid: {
                    required: "Please enter the employee id.",
                    remote: jQuery.validator.format("{0} is already exists."),
                },
            },
        });
    });
</script>  
    
</body>

</html>