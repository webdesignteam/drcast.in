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
                                <h4>List of Analytics</h4>
                            </div>
               
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-sm-12 pl-0 pr-0">
                                    <div class="table_content">
                                        <div class="filters">
                                            <div class="entridiv">
                                                <span>Show entries</span>
                                                 <select id="rowsPerPage">
                                                  <option value="5">5</option>
                                                  <option value="10">10</option>
                                                  <option value="20">20</option>
                                                </select>
                                            </div>
                                            <form id="filters2" name="filters2" method="post">
                                                     <input type="submit" class="btn btn-secondary " name="" value="">
                                                <div class="search_tbl"><input type="text" placeholder="search..." id="myInputTextField">
                                                    <div class="btn_tbl_search"><i class="fa fa-search"></i></div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="customtable_main">
                                            <div class="customtable scroll_table">
                                                <table id="myTable">
                                                  <thead>
                                                        <tr>
                                                          <th>ID</th>
                                                          <th>Webinar Title</th>
                                                          <th>Date</th>
                                                          <th>Registrations</th>
                                                          <th>Attendees</th>
                                                          <th>Engagement Rate</th>
                                                          <th>Average Watch Time</th>
                                                          <th>Feedback Rating</th>
                                                          <th>Status</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        <tr>
                                                          <td>1</td>
                                                          <td>Getting Started with Shopify Custom Themes</td>
                                                          <td>2025-10-25</td>
                                                          <td>420</td>
                                                          <td>365</td>
                                                          <td><span style="color:#5cb85c;">87%</span></td>
                                                          <td>42 mins</td>
                                                          <td><span style="color:#5cb85c;">4.8 / 5</span></td>
                                                          <td><span style="color:#5cb85c;">Completed</span></td>
                                                        </tr>
                                                        <tr>
                                                          <td>2</td>
                                                          <td>Advanced Liquid & Shopify Theme Optimization</td>
                                                          <td>2025-11-01</td>
                                                          <td>310</td>
                                                          <td>250</td>
                                                          <td><span style="color:#f0ad4e;">74%</span></td>
                                                          <td>36 mins</td>
                                                          <td><span style="color:#5bc0de;">4.3 / 5</span></td>
                                                          <td><span style="color:#5bc0de;">Completed</span></td>
                                                        </tr>
                                                        <tr>
                                                          <td>3</td>
                                                          <td>Building Responsive Admin Dashboards</td>
                                                          <td>2025-11-10</td>
                                                          <td>510</td>
                                                          <td>–</td>
                                                          <td>–</td>
                                                          <td>–</td>
                                                          <td>–</td>
                                                          <td><span style="color:#d9534f;">Upcoming</span></td>
                                                        </tr>
                                                        <tr>
                                                          <td>4</td>
                                                          <td>Shopify Analytics Deep Dive</td>
                                                          <td>2025-10-15</td>
                                                          <td>280</td>
                                                          <td>200</td>
                                                          <td><span style="color:#d9534f;">63%</span></td>
                                                          <td>29 mins</td>
                                                          <td><span style="color:#f0ad4e;">3.9 / 5</span></td>
                                                          <td><span style="color:#5cb85c;">Completed</span></td>
                                                        </tr>
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
    
   <script>
        $(document).ready(function () {
            $("#myInputTextField").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#searchtbl tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
   </script>
    <!--  End JavaScript -->
</body>
</html>