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
                                <h4>Participants</h4>
                            </div>
                            <div class="middle_date_picker">
                                <form id="filters1" name="filters1" method="post" class="md_filters"
                                    novalidate="novalidate">
                                    <div class="middle_flt datebtn">
                                        <i class="fa fa-calendar"></i>&nbsp;<span></span> <i class="fa fa-caret-down"></i><input id="daterangepicker" type="text" name="daterange" value="" placeholder="Select Date" class="dtrangeinput valid" aria-invalid="false">
                                    </div>
                                    <input type="submit" value="Filters" class="btn datebtn" name="search">
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
                                    <div class="table_content" style="overflow:auto;">
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
                                                <input type="submit" class="btn btn-secondary " name="all" value="All">
                                                <input type="submit" class="btn btn-secondary " name="upcoming" value="Upcoming">
                                                <input type="submit" class="btn btn-secondary " name="ongoing" value="Ongoing">
                                                <input type="submit" class="btn btn-secondary " name="archived" value="Archived">
                                                <div class="search_tbl"><input type="text" placeholder="search..." id="myInputTextField">
                                                    <div class="btn_tbl_search"><i class="fa fa-search"></i></div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="customtable">
                                            <div class="customtable">
                                                <table id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>S No</th>
                                                            <th>Participant Name</th>
                                                            <th>Mobile No</th>
                                                            <th>Email</th>
                                                            <th>MCI Number</th>
                                                            <th>Address</th>
                                                            <th>Speciality</th>
                                                            <th>Registered On</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="searchtbl">
                                                        <?php //echo "<pre>"; print_r($participants); ?>
                                                            <?php if(empty($participants)) { ?><tr><td class="text-center">No data</td></tr><?php } else { ?> <?php $idnumbers='0' ; foreach($participants as $participantlist) { $idnumbers++ ?>
                                                        <tr>
                                                            <td><?php echo $idnumbers; ?></td>
                                                            <td><?php echo $participantlist['wc_r_name']; ?></td>
                                                            <td><?php echo $participantlist['wc_r_mobile']; ?> </td>
                                                            <td><?php echo $participantlist['wc_r_email']; ?></td>
                                                            <td><?php echo $participantlist['wc_r_mci_number']; ?></td>
                                                            <td><?php echo $participantlist['wc_r_city']; ?>, <?php echo $participantlist['wc_r_state']; ?></td>
                                                            <td><?php echo $participantlist['wc_r_speciality']; ?></td>
                                                            <td><?php echo $participantlist['wc_r_created_on']; ?></td>
                                                        </tr>
                                                        <?php } ?> <?php } ?>
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