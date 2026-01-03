<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/meta');?>
    <?php $this->load->view('layout/styles');?>

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 22px;
            margin-bottom: 0px;
        }

        .heading._heding_flex_btn {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .heading._heding_flex_btn label.switch {
            margin-right: 15px;
        }

        .customtable tbody td {
            vertical-align: baseline;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 4px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .switch input:checked+.slider {
            background-color: #2196F3;
        }

        .switch input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        .switch input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }


        .ct_toggle {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            flex-direction: column;
        }

        .ct_toggle h5 {
            font-size: 16px;
            font-weight: 500;
        }

        .domain_content {
            padding: 20px;
        }

        .domain_content .form-group.has-search {
            width: 100%;
        }

        .domain_info {
            display: flex;
            gap: 20px;
            justify-content: flex-start;
            align-items: center;
        }

        .domain_info a {
            background: #f7f7f7;
            padding: 8px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .domain_info a .fa {
            font-size: 18px;
        }

        .domain_info .dmname h5 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 0;
        }
    </style>

</head>

<body>
    <div class="">
        <div class="container">
            <!-- navbar-me -->
            <nav class="navbar navbar-expand-lg navbar-light fixed-top">
                <a class="navbar-brand" href="http://localhost/customdashboad/dashboard">Webinar CMS
                    <!--<img class="header_logo" src="https://www.hhcldoctorsites.com/assets/img/Doctor_CMS_Logo.svg">--></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto scrollpy">
                        <li>
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto right_dropdowns">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle badge_bell" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell" aria-hidden="true"></i> <span
                                    class="badge badge-secondary">24</span>
                            </a>
                            <div class="dropdown-menu custom_npmenu" aria-labelledby="navbarDropdown">
                                <a class="nav-link" name='link' href="">Sample</a>
                                <a class="nav-link" name='link' href="">Sample</a>
                                <a class="nav-link" name='link' href="">Sample</a>
                                <a class="nav-link" name='link' href="">Sample</a>
                                <a class="nav-link" name='link' href="">Sample</a>
                                <a class="nav-link" name='link' href="">Sample</a>
                                <a class="nav-link" name='link' href="">Sample</a>
                                <a class="nav-link" name='link' href="">Sample</a>
                                <a class="nav-link" name='link' href="">Sample</a>
                                <a class="nav-link" name='link' href="">Sample</a>
                                <a class="nav-link" name='link' href="">Sample</a>
                                <a class="nav-link" name='link' href="">Sample</a>
                                <a class="nav-link" name='link' href="">Sample</a>
                                <a class="nav-link" name='link' href="">Sample</a>
                                <a class="nav-link" name='link' href="">Sample</a>
                                <a class="nav-link" name='link' href="">Sample</a>
                                <a class="nav-link" name='link' href="">Sample</a>
                                <a class="nav-link" name='link' href="">Sample</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="wlcome"><img
                                        src="https://www.hhcldoctorsites.com/uploads/users/627139_blog1_8eOzwUSxhZ_20230621095610.jpg"
                                        class="usericon" /><strong>Dr. Aravind Vaka</strong></span>
                            </a>
                            <div class="dropdown-menu custom_dpmenu" aria-labelledby="navbarDropdown">
                                <a class="nav-link" name='link'
                                    href="https://www.hhcldoctorsites.com/manage-account">Manage Account</a>
                                <a class="nav-link" name='link'
                                    href="https://www.hhcldoctorsites.com/user-activities">User Activities</a>
                                <a class="nav-link" name='link' href="https://www.hhcldoctorsites.com/logout">Logout</a>
                                <a class="nav-link" name='link' href="https://www.hhcldoctorsites.com/help-center">Help
                                    Center</a>
                                <a class="nav-link" name='link' href="">Contact Admin</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <main class="setting_view">
        <section>
            <div class="container">
                <div class="preferences_sec">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="setting_box boxshadow">
                                <div class="heading_box">
                                    <h5>Title</h5>
                                    <a href="#" target="_blank"></a>
                                </div>
                                <div class="setting_tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"><i
                                                    class="fa fa-user" aria-hidden="true"></i> Technicians</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"><i
                                                    class="fa fa-users" aria-hidden="true"></i> Organisations</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"><i
                                                    class="fa fa-globe" aria-hidden="true"></i>Divisions</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-8">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    <form id="website_edit" name="website_edit" method="post" class=""
                                        enctype="multipart/form-data">
                                        <input type="hidden" autocomplete="off" class="form-control" name="user_code"
                                            value="8eOzwUSxhZ">

                                        <div class="setting_content">
                                            <h6>Technicians</h6>
                                        </div>

                                        <div class="setting_box_txt boxshadow p-3">
                                            <table style="width:100%">
                                                <tr>
                                                    <th>Sl.No</th>
                                                    <th>Division</th>
                                                    <th>Technician Name</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><label class="switch">
                                                            <input type="checkbox" name="top_bar" id="" db="db"
                                                                table="dw_website_settings" ucolum="top_bar"
                                                                uvalue="1001" wcolum="dw_code" wvalue="8eOzwUSxhZ"
                                                                class="toggleactive" checked="">
                                                            <span class="slider round"></span>
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><label class="switch">
                                                            <input type="checkbox" name="top_bar" id="" db="db"
                                                                table="dw_website_settings" ucolum="top_bar"
                                                                uvalue="1001" wcolum="dw_code" wvalue="8eOzwUSxhZ"
                                                                class="toggleactive" checked="">
                                                            <span class="slider round"></span>
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><label class="switch">
                                                            <input type="checkbox" name="top_bar" id="" db="db"
                                                                table="dw_website_settings" ucolum="top_bar"
                                                                uvalue="1001" wcolum="dw_code" wvalue="8eOzwUSxhZ"
                                                                class="toggleactive" checked="">
                                                            <span class="slider round"></span>
                                                        </label></td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="setting_box_txt boxshadow">
                                            <form>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Select Division
                                                    </label>
                                                    <select name="division" id="division" class="form-control"
                                                        autocomplete="off">
                                                        <option value="">Select Division</option>
                                                        <option value="">
                                                        </option>
                                                        <option value=""></option>
                                                        <option value=""></option>
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Technician Name </label>
                                                    <input type="text" autocomplete="off" name="technician_name"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit">
                                                </div>
                                            </form>
                                        </div>

                                        <div class="rtbtn text-right d-none">
                                            <input type="submit" value="Save" name="update_module_settings"
                                                class="btn btn-secondary custom_add">
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="tabs-2" role="tabpanel">
                                    <form id="website_edit" name="website_edit" method="post"
                                        enctype="multipart/form-data">
                                        <input type="hidden" autocomplete="off" class="form-control" name="user_code"
                                            value="8eOzwUSxhZ">
                                        <input type="hidden" autocomplete="off" class="form-control" name="dw_code"
                                            value="8eOzwUSxhZ">
                                        <div class="setting_content">
                                            <h6>Organisations</h6>
                                        </div>
                                        <div class="setting_box_txt boxshadow p-3">
                                            <table style="width:100%">
                                                <tr>
                                                    <th>Sl.No</th>
                                                    <th>Division</th>
                                                    <th>Organisation</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><label class="switch">
                                                            <input type="checkbox" name="top_bar" id="" db="db"
                                                                table="dw_website_settings" ucolum="top_bar"
                                                                uvalue="1001" wcolum="dw_code" wvalue="8eOzwUSxhZ"
                                                                class="toggleactive" checked="">
                                                            <span class="slider round"></span>
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><label class="switch">
                                                            <input type="checkbox" name="top_bar" id="" db="db"
                                                                table="dw_website_settings" ucolum="top_bar"
                                                                uvalue="1001" wcolum="dw_code" wvalue="8eOzwUSxhZ"
                                                                class="toggleactive" checked="">
                                                            <span class="slider round"></span>
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><label class="switch">
                                                            <input type="checkbox" name="top_bar" id="" db="db"
                                                                table="dw_website_settings" ucolum="top_bar"
                                                                uvalue="1001" wcolum="dw_code" wvalue="8eOzwUSxhZ"
                                                                class="toggleactive" checked="">
                                                            <span class="slider round"></span>
                                                        </label></td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="setting_box_txt boxshadow">
                                            <form>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Select Division
                                                    </label>
                                                    <select name="division" id="division" class="form-control"
                                                        autocomplete="off">
                                                        <option value="">Select Division</option>
                                                        <option value="">
                                                        </option>
                                                        <option value=""></option>
                                                        <option value=""></option>
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Organisation </label>
                                                    <input type="text" autocomplete="off" name="organisation_name"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit">
                                                </div>
                                            </form>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="tabs-3" role="tabpanel">
                                    <div class="setting_content">
                                        <h6>Divisions</h6>
                                    </div>
                                    <div class="setting_box_txt boxshadow p-3">
                                        <table style="width:100%">
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Division</th>
                                                <th>Organisation</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td></td>
                                                <td></td>
                                                <td><label class="switch">
                                                        <input type="checkbox" name="top_bar" id="" db="db"
                                                            table="dw_website_settings" ucolum="top_bar" uvalue="1001"
                                                            wcolum="dw_code" wvalue="8eOzwUSxhZ" class="toggleactive"
                                                            checked="">
                                                        <span class="slider round"></span>
                                                    </label></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td></td>
                                                <td></td>
                                                <td><label class="switch">
                                                        <input type="checkbox" name="top_bar" id="" db="db"
                                                            table="dw_website_settings" ucolum="top_bar" uvalue="1001"
                                                            wcolum="dw_code" wvalue="8eOzwUSxhZ" class="toggleactive"
                                                            checked="">
                                                        <span class="slider round"></span>
                                                    </label></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td></td>
                                                <td></td>
                                                <td><label class="switch">
                                                        <input type="checkbox" name="top_bar" id="" db="db"
                                                            table="dw_website_settings" ucolum="top_bar" uvalue="1001"
                                                            wcolum="dw_code" wvalue="8eOzwUSxhZ" class="toggleactive"
                                                            checked="">
                                                        <span class="slider round"></span>
                                                    </label></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <section class="copyright">
        <footer>
            <div class="container text-center">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p>Copyright &copy; <script>
                                document.write(new Date().getFullYear())
                            </script> All Rights Reserved by <a href="https://www.heterohealthcare.com/"
                                target="_blanck">Hetero Healthcare Limited.</a></p>
                    </div>
                </div>
            </div>
        </footer>
        <?php  $this->load->view('layout/copyright'); ?>
        <?php $this->load->view('layout/js');  ?>
        <?php $this->load->view('layout/daterange');  ?>
   
    <script>
        $('.toggle').change(function () {
            var db = $(this).attr('db');
            var table = $(this).attr('table');
            var wcolum = $(this).attr('wcolum');
            var wvalue = $(this).attr('wvalue');
            var ucolum = $(this).attr('ucolum');
            var uvalue = $(this).attr('uvalue');
            var pagename = $(this).attr('pagename');
            var controller = $(this).attr('controller');
            var slug = $(this).attr('slug');
            var metatitle = $(this).attr('metatitle');
            $.ajax({
                type: "post",
                url: "https://www.hhcldoctorsites.com/Home/services_enable_user",
                data: {
                    'db': db,
                    'table': table,
                    'wcolum': wcolum,
                    'wvalue': wvalue,
                    'ucolum': ucolum,
                    'uvalue': uvalue,
                    'pagename': pagename,
                    'controller': controller,
                    'slug': slug,
                    'metatitle': metatitle
                },
                success: function (response) {
                    //alert(response);
                    //console.log(response);
                    location.reload();
                }
            });
        });

        $('.toggleactive').change(function () {
            //alert ('Hi');
            var status = $(this).attr('status');
            var db = $(this).attr('db');
            var table = $(this).attr('table');
            var wcolum = $(this).attr('wcolum');
            var wvalue = $(this).attr('wvalue');
            var ucolum = $(this).attr('ucolum');
            var uvalue = $(this).attr('uvalue');
            $.ajax({
                type: "post",
                url: "https://www.hhcldoctorsites.com/Home/statuschangenew_user",
                data: {
                    'status': status,
                    'db': db,
                    'table': table,
                    'wcolum': wcolum,
                    'wvalue': wvalue,
                    'ucolum': ucolum,
                    'uvalue': uvalue
                },
                success: function (response) {
                    //alert(response);
                    //console.log(response);
                    location.reload();
                }
            });
        });
    </script>
</body>

</html>