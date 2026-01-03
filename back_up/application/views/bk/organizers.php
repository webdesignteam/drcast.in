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
                                <h4>List of Organizers</h4>
                                <div class="right_btn">
                                    <div id="buttons" class="datbtns"></div>
                                    <a href="<?php echo base_url();?>/Home/organizer_create" class="btn btn-secondary custom_add">Create Organizer</a>
                                </div>
                            </div>
                            <div class="middle_date_picker">
                                <form id="filters1" name="filters1" method="post" class="md_filters"
                                    novalidate="novalidate">
                                    <select class="datebtn" name="wc_di_code" id="wc_di_code">
                                        <?php if(!empty($wc_di_name)){ ?><option value="<?php echo $wc_di_code; ?>"><?php echo $wc_di_name; ?></option><?php } ?>
                                        <?php  if(empty($divisionslist)) { } else { ?>
                                            <option value="">Select division name</option>
                                            <?php foreach($divisionslist as $divisionslist) { ?>
                                                <option value="<?php echo $divisionslist['wc_di_code']; ?>">
                                                <?php echo $divisionslist['wc_di_name']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
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
                                                <input type="submit" class="btn btn-secondary " name="all" value="All">
                                                <input type="submit" class="btn btn-secondary " name="active" value="Active">
                                                <input type="submit" class="btn btn-secondary " name="inactive" value="Inactive">
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
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Division</th>
                                                            <th>Status</th>                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody id="searchtbl">
                                                        <?php //echo "<pre>"; print_r($organizerlist); ?>
                                                        <?php if(empty($organizerlist)) { ?><tr><td class="text-center">No data</td></tr><?php } else { ?> <?php $idnumbers='0' ; foreach($organizerlist as $organizerlist) { $idnumbers++ ?>
                                                        <tr>
                                                            <td>
                                                                <p class="title_head"> <?php echo $organizerlist['wc_o_name']; ?>  </p>
                                                            </td>
                                                            <td>
                                                                <p class=""> <?php echo $organizerlist['wc_o_email']; ?>  </p>
                                                            </td>
                                                            <td>
                                                                <p> <?php echo $organizerlist['wc_di_name']; ?> </p>
                                                            </td>
                                                            <td>
                                                                <?php if($organizerlist[ 'wc_o_status']=='1001' ) { ?>
                                        						    <label class="custom_switch"><input type="checkbox" checked="" id="oanactive" class="btn btn-xs btn-success" oactiveid="<?php echo $organizerlist['wc_o_code'];?>" oactivestatus="<?php echo $organizerlist['wc_o_status'];?>"><span class="custom_slider custom_round"><span class="tgtxt">Active</span></span></label>
                                        						<?php } else { ?>
                                        						    <label class="custom_switch"><input type="checkbox" id="oanactive" class="btn btn-xs btn-danger" oactiveid="<?php echo $organizerlist['wc_o_code'];?>" oactivestatus="<?php echo $organizerlist['wc_o_status'];?>"><span class="custom_slider custom_round"><span class="tgtxt">In Active</span></span></label>
                                        						<?php } ?>
                                                            </td>
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
        $(document).on('click','#oanactive',function(){
			//alert($(this).attr('oactiveid'));
			//alert($(this).attr('oactivestatus'));
			var oactiveid = $(this).attr('oactiveid');
			var oactivestatus = $(this).attr('oactivestatus');
				$.ajax({
					type:"post",
					url:"<?php echo base_url();?>Home/organizerstatuschange",
					data: {'oactiveid':oactiveid,'oactivestatus':oactivestatus},
					success: function(response){
					//alert(response);
					//console.log(response);
					location.reload();
				}
			});
		});
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