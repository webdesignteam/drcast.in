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
                            <h1>Reset Your Password</h1>
                            <p>To set a new password, please provide your register email address.</p>
                            <div class="form_details">
                                <form class="form-horizontal" id="reset_password" method="post"
                                enctype="multipart/form-data">
                                <div class="form-group  position-relative">
                                    <label for="email" class="mb-0">Email Address</label>
                                    <div class="password_box">
                                        <input type="email" id="email" class="form-control" name="email"
                                        placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="form-group fs-16 my-4 text-right">
                                    <div class="fxt-checkbox-area">
                                        <a href="<?php echo base_url();?>">Login</a>
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
        $("#reset_password").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: "Please enter email address",
                    email: "Please enter a valid email address"
                }
            }
        });
    });
</script>

</body>
</html>