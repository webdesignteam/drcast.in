<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layout/meta');?>
    <?php $this->load->view('layout/styles');?>
    
</head>
<body>
    <div class="cms-login-page">
        <div class="right-side">
            <div class="login-content">
                 
                <div class="row justify-content-center">
                    <div class="col-sm-8">
                        <a class="navbar-brand" href="<?php echo base_url();?>dashboard">
                                <img class="admin_logo" src="<?php echo base_url();?>assets/img/drlogo.svg">
                            </a>
                        <div class="logincredentials">
                            <h1>Login</h1>
                            <div class="form_details">
                                <form class="form-horizontal" id="login_form" method="post"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="user" class="mb-0">User name</label>
                                    <input type="text" class="form-control username" name="username" id="username"
                                    placeholder="Enter user name">
                                </div>
                                <div class="form-group  position-relative">
                                    <label for="password" class="mb-0">Password</label>
                                    <div class="password_box">
                                        <input type="password" id="password" class="form-control" name="password"
                                        placeholder="**********">
                                        <i toggle="#password"
                                        class="fa fa-fw fa-eye-slash toggle-password passicon"></i>
                                    </div>
                                    <label id="password-error" class="text-red text-capitalize text-normal"
                                    for="password" style="display:none"></label>
                                </div>
                                <div class="form-group fs-16 my-4 text-right">
                                    <div class="fxt-checkbox-area">
                                        <a href="<?php echo base_url();?>reset-password">Reset Password</a>
                                    </div>
                                </div>
                                <div class="btn_login">
                                    <input class="btn-block btnlogin1" name="submit" type="submit" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="left-side">
        <div class="branding">
            <div class="row">
                <div class="col-sm-12">
                    <div class="webinarcontnt">
                        <h3>Schedule</h3>
                        <p class="fs-18">Plan your upcoming webinars with ease.</p>
                        <p>Stay organized with clear dates and session timings.</p>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="webinarcontnt">
                        <h3>Streaming</h3>
                        <p class="fs-18">Join live sessions seamlessly with a single click.</p>
                        <p>Experience smooth, high-quality video streaming.</p>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="webinarcontnt last_div">
                        <h3>Reminders</h3>
                        <p class="fs-18">Never miss a webinar again.</p>
                        <p>Get instant alerts before your session starts.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  $this->load->view('layout/copyright'); ?>
<?php $this->load->view('layout/js');  ?>
<script>
    $(document).ready(function () {
        // Password Show and hide Code
        $(".toggle-password").click(function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            input = $(this).parent().find("input");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
        // Setup form validation on the #register-form element
        $("#login_form").validate({
            // Specify the validation rules
            rules: {
                username: {
                    required: true,
                    remote: {
                        url: "https://www.drcast.in/Home/check_availability_negative/" +
                            $("#username").val() + "",
                        type: "post",
                        data: {
                            table: function () {
                                return "wc_users";
                            },
                            db: function () {
                                return "db";
                            },
                            Wcolumn: function () {
                                return "username";
                            }
                        }
                    }
                },
                password: {
                    required: true,
                    remote: {
                        url: "https://www.drcast.in/Home/check_availability_negative/" +
                            $("#password").val() + "",
                        type: "post",
                        data: {
                            table: function () {
                                return "wc_users";
                            },
                            db: function () {
                                return "db";
                            },
                            Wcolumn: function () {
                                return "password";
                            }
                        }
                    }
                }
            },
            // Specify the validation error messages
            messages: {
                username: {
                    required: "Please enter username",
                    remote: jQuery.validator.format(
                    "This '{0}' username was not available, so please contact the admin for further assistance."
                    ),
                },
                password: {
                    required: "Please enter password",
                     remote: jQuery.validator.format(
                    "This '{0}' password was not available, so please contact the admin for further assistance."
                    ),
                }
            },
        });
    });
</script>
</body>
</html>