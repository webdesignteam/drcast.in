<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layout/meta');?>
    <?php $this->load->view('layout/styles');?>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/pagination.css?Version=<?php echo Version; ?>" />
   
    
</head>
<body>
     <div class="pre-loader" id="loading">
         <img src="<?php echo base_url();?>/assets/img/loader.gif?Version=<?php echo Version; ?>" alt="Loading...">
    </div>
    <?php $this->load->view('layout/nav');  ?>
    <?php $this->load->view('layout/leftnav');  ?>
    <main class="main_page_view__content">
        <section class="enquiry_section">
            <div class="container">
                <div class="top_product">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="top_product_content">
                                <h4>Organizers</h4>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                     
                           
                            <form id="Organizers_mapping" method="post" class="payment-form">
                                        <div class="table_content top_cusmo_form">
                                            <div class="row center_div_rows">
                                                <div class="col-sm-12 mb-20">
                                                     <h5 class="page_sub_txt">Organizers to Division Maping</h5>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Organizer</label>
                                                        <select class="form-control" id="wc_u_code" name="wc_u_code">
                                                            <option value="">Select Organizers</option>
                                                            <?php if(empty($organizers)){ echo '<option value="">No Data</option>'; }else { ?>
                                                                <?php //echo "<pre>"; print_r($organizers); ?>
                                                                <?php foreach($organizers as $organizer_list) {?>
                                                                    <option value="<?php echo $organizer_list['wc_u_code']; ?>"><?php echo $organizer_list[ 'wc_u_display_name']; ?></option>
                                                                <?php } ?>
                                                            <?php } ?>
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
                                                <div class="col-sm-4">
                                                <input type="submit" class="btn custom_add" id="submit" name="organizer_to_division_maping" value="Submit">
                                                 </div>
                                            </div>
                                        </div>
                                    
                            </form>
                        
                    </div>
                </div>
                
               
                       
                            <div class="row justify-content-center">
                                <div class="col-sm-12">
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
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Mobile</th>
                                                            <th>Division</th>
                                                        </tr>
                                                    </thead>
                                                     <tbody id="searchtbl">
                                                        <?php //print_r($users); ?>
                                                        <?php  if(empty($organizerinfo)) { } else { ?> 
                                                        <?php $i = 0; foreach($organizerinfo as $organizerinfo_list) {  $i++;?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $organizerinfo_list['wc_u_display_name']; ?></td>
                                                                <td><?php echo $organizerinfo_list['wc_u_email']; ?></td>
                                                                <td><?php echo $organizerinfo_list['wc_u_phone']; ?></td>
                                                                <td><?php echo $organizerinfo_list['wc_di_name']; ?></td>
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
        </section>
    </main>
    <?php  $this->load->view('layout/copyright'); ?>
    <?php $this->load->view('layout/js');  ?>
    <?php $this->load->view('layout/daterange');  ?>
     <script src="<?php echo base_url();?>assets/js/pagination.js"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.table2excel.min.js"></script>
        <script>
            $(document).ready(function(){
              $("#exportButton").click(function(){
                $("#myTable").table2excel({
                  filename: "Transactions.xls" // You can specify filename here
                });
              });
            });
        </script>
         <script>
        $(document).ready(function () {
            $('input[name="contact"]').keyup(function (e) {
                if (/\D/g.test(this.value)) {
                    // Filter non-digits from input value.
                    this.value = this.value.replace(/\D/g, '');
                }
            });
            // Setup form validation on the #register-form element

            $("#Organizers_mapping").validate({
                // Specify the validation rules
                rules: {
                    wc_u_code: {
                        required: true                        
                    },
                    wc_di_code: {
                        required: true                        
                    }
                },
                // Specify the validation error messages
                messages: {
                    wc_u_code: {
                        required: "Please select organizer",                        
                    },
                    wc_di_code: {
                        required: "Please select division",                        
                    }
                }, 
            });
        });
    </script>
   
</body>
</html>