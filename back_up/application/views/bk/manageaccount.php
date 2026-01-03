<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('layout/meta');?>
        <?php $this->load->view('layout/styles');?>
        <style>
            .label.text-red.text-capitalize.text-normal{
                color: #ff0000 !important;
                font-size: 14px !important;
            }
        </style>
    </head>
    
    <body>
        <?php $this->load->view('layout/nav');  ?>
        <?php $this->load->view('layout/leftnav');  ?>
        <main class="main_page_view__content over_flow">
            <section class="top_cont">
                <div class="container">
                    <div class="top_product">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="top_product_content">
                                    <h4>Manage Account</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="preferences_sec">
                        <form id="manage_account" name="manage_account" method="post" class="">
                            <input type="hidden" name="user_code">
                            <div class="preference_box">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="prefe_content">
                                            <h6>Change your password</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="prefer_bx_content boxshadow">
                                            <div class="password_txt">
                                                <p>Your password was last changed on</p>
                                            </div>
                                            <div class="form-group password_icon">
                                                <label>Current password</label>
                                                <input type="password" id="curntpassword" autocomplete="off" name="currentpassword" class="form-control">
                                                <!--<span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span>-->
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>New password</label>
                                                <input type="password" autocomplete="off" class="form-control" name="password" id="password">
                                            </div>
        
                                            <div class="form-group">
                                                <label>Conform password</label>
                                                <input type="password" autocomplete="off" class="form-control" name="confirmpassword">
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rtbtn text-right">
                                <input type="submit" value="Save" name="update_preferences_settings" class="btn btn-secondary custom_add">
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </main>
        <?php  $this->load->view('layout/copyright'); ?>
        <?php $this->load->view('layout/js');  ?>
        <script>
            $(document).ready(function () {
                $('input[name="contact"]').keyup(function (e) {
                    if (/\D/g.test(this.value)) {
                        // Filter non-digits from input value.
                        this.value = this.value.replace(/\D/g, '');
                    }
                });
                // Setup form validation on the #register-form element
    
                $("#manage_account").validate({
                    // Specify the validation rules
                    rules: {
                        currentpassword: {
                            required: true,
                            minlength: 8
                        }, 
                        password: {
                            required: true,
                            minlength: 8
                        },  
                        confirmpassword: {
                            required: true,  
                            equalTo : "#password"
                        }
                    },
                    // Specify the validation error messages
                    messages: {
                        currentpassword: {
                            required: "Please enter current password",                        
                        },
                        password: {
                            required: "Please enter new password",                        
                        },
                        confirmpassword: {
                            required: "Password should match with new password",                        
                        }
                    }, 
                });
            });
        </script>
    </body>
</html>