<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layout/meta');?>
    <?php $this->load->view('layout/styles');?>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/pagination.css?Version=<?php echo Version; ?>" />
</head>
<body>
   
    <?php $this->load->view('layout/nav');  ?>
    <?php $this->load->view('layout/leftnav');  ?>
    <main class="main_page_view__content">
        <section class="">
            <div class="container">
                <div class="top_product">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="top_product_content">
                                <h4>Users</h4>
                               <div class="right_btn">
                                    <div id="buttons" class="datbtns"></div>
                                    <a href="<?php echo base_url();?>create-user" class="btn custom_add">Create User</a>
                                </div>
                                
                            </div>
                             <div class="middle_date_picker d-none">
                                <form id="filters1" name="filters1" method="post" class="md_filters" novalidate="novalidate">
                                    <div class="middle_flt datebtn">
                                        <i class="fa fa-calendar"></i>&nbsp;<span></span> <i class="fa fa-caret-down"></i>
                                        <input id="daterangepicker" type="text" name="daterange" value="<?php if(!empty($date_from) && !empty($date_to)){ echo $date_from." - ".$date_to; } ?>" placeholder="Select Date" class="dtrangeinput valid" aria-invalid="false" autocomplete="off"> 
                                    </div>
                                    <input type="submit" value="Search" class="btn datebtn" name="search">
                                    <button id="exportButton" class="export_btn">Excel</button>
                                    <a href="#" id="clear" class="clear_filter">Clear</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-sm-12 pl-0 pr-0">
                                    <div class="table_content">
                                         <div class="filters custom_flex_div">
                                                    <div class="entridiv custom_row">
                                                        <span>Show entries</span>
                                                        <select id="rowsPerPage" class="form-control">
                                                            <option value="5">5</option>
                                                            <option value="10">10</option>
                                                            <option value="20">20</option>
                                                        </select>
                                                    </div>

                                                    <form id="filters2" name="filters2" method="post">
                                                        <input type="submit" class="btn btn-secondary" value="">
                                                        <div class="search_tbl">
                                                            <input type="text" placeholder="search..." id="myInputTextField">
                                                            <div class="btn_tbl_search"><i class="fa fa-search"></i></div>
                                                        </div>
                                                    </form>
                                                </div>
                                        <div class="customtable_main">
                                            <div class="customtable scroll_table">
                                                <?php //echo $this->session->userdata('abhclusercode'); ?>
                                                <table id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr No</th>
                                                            <th>User Code</th>
                                                            <th>User Role</th>
                                                            <th>Name</th>
                                                            <th>Username</th>
                                                            <th>Password</th>
                                                            <th>Email</th>
                                                            <th>Mobile</th>
                                                            <th>Division</th>
                                                        </tr>
                                                    </thead>
                                                     <tbody id="searchtbl">
                                                        <?php //print_r($users); ?>
                                                        <?php  if(empty($users)) { } else { ?> 
                                                        <?php $i = 0; foreach($users as $users_list) {  $i++;?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                   <td><?php echo $users_list['wc_u_code']; ?></td>
                                                                <td><?php echo $users_list['wc_u_type']; ?></td>
                                                                <td class="wraptxt"><?php echo $users_list['wc_u_display_name']; ?></td>
                                                                <td><?php echo $users_list['username']; ?></td>
                                                                <td><?php echo $users_list['password']; ?></td>
                                                                <td><?php echo $users_list['wc_u_email']; ?></td>
                                                                <td><?php echo $users_list['wc_u_phone']; ?></td>
                                                                <td><?php echo $users_list['wc_di_code']; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="custom_pagination" id="pagination">
                                                <div class="left_pagination">
                                                    <span id="count"></span>
                                                </div>
                                                <div class="right_pagination">
                                                    <button id="prevPage" class="pagination-numbers radius_previous">Previous</button>
                                                    <div id="paginationNumbers" class="pagination"></div>
                                                    <button id="nextPage" class="pagination-numbers radius_next">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php  $this->load->view('layout/copyright'); ?>
    <?php $this->load->view('layout/js');  ?>
    <?php $this->load->view('layout/daterange');  ?>
     <script src="<?php echo base_url();?>assets/js/pagination.js"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.table2excel.min.js"></script>
       
</html>