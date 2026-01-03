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
                                <h4>List of Participants</h4>
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
                                                <table id="myTable">
                                                  <thead>
                                                    <tr>
                                                      <th>SR.NO</th>
                                                      <th>Name</th>
                                                      <th>Email</th>
                                                      <th>Mobile Number</th>
                                                      <th>Location</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody id="searchtbl">
                                                        <?php 
                                                        if (!empty($participants)) { 
                                                            $i = 0; 
                                                            foreach ($participants as $participants_list) { 
                                                                $i++; ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td><?php echo $participants_list['wc_p_name']; ?></td>
                                                                    <td><?php echo $participants_list['wc_p_email']; ?></td>
                                                                    <td><?php echo $participants_list['wc_p_phone_number']; ?></td>
                                                                    <td><?php echo $participants_list['wc_p_phone_location']; ?></td>
                                                                </tr>
                                                        <?php 
                                                            } 
                                                        } else { ?>
                                                            <tr>
                                                                <td colspan="5" style="text-align:center;">No data found</td>
                                                            </tr>
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
            </div>
        </section>
    </main>
    <?php  $this->load->view('layout/copyright'); ?>
    <?php $this->load->view('layout/js');  ?>
    <?php $this->load->view('layout/daterange');  ?>
    <script src="<?php echo base_url();?>assets/js/pagination.js"></script>
  
</body>
</html>