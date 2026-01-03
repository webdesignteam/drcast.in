<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/meta');?>
    <?php $this->load->view('layout/styles');?>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/pagination.css?Version=<?php echo Version; ?>" />
    <style>
        .datebtn {
          display: flex;
          align-items: center;
          border: 1px solid #ced4da;
          border-radius: 0.375rem;
          padding: 0.5rem;
          background-color: #f8f9fa;
          cursor: pointer;
          transition: background-color 0.2s ease;
        }
    
        .datebtn:hover {
          background-color: #e9ecef;
        }
    
        .datebtn i {
          color: #495057;
        }
    
        .dtrangeinput {
          border: none;
          outline: none;
          background: transparent;
          width: 100%;
          padding-left: 0.5rem;
          color: #495057;
        }
    </style>
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
                                <h4>List of Technicians</h4>
                                <div class="right_btn">
                                    <div id="buttons" class="datbtns"></div>
                                    <a href="<?php echo base_url();?>/Home/technician_create"
                                        class="btn btn-secondary custom_add">Create Technician</a>
                                </div>
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
                                                <input type="submit" class="btn btn-secondary " name="active"
                                                    value="Active">
                                                <input type="submit" class="btn btn-secondary " name="inactive"
                                                    value="Inactive">
                                                <div class="search_tbl"><input type="text" placeholder="search..."
                                                        id="myInputTextField">
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
                                                            <th>Mobile</th>
                                                            <th>In office</th>
                                                            <th>Out office</th>
                                                            <th>No of Webinars</th>
                                                            <th>Status</th>                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody id="searchtbl">
                                                        <?php //echo "<pre>"; print_r($technicianlist); ?>
                                                            <?php if(empty($technicianlist)) { ?><tr><td class="text-center">No data</td></tr><?php } else { ?> <?php $idnumbers='0' ; foreach($technicianlist as $technicianlist) { $idnumbers++ ?>
                                                        <tr>
                                                            <td>
                                                                <p class="title_head"> <?php echo $technicianlist['wc_t_name']; ?>  </p>
                                                            </td>
                                                            <td>
                                                                <p class=""> <?php echo $technicianlist['wc_t_email']; ?></p>
                                                            </td>
                                                            <td>
                                                                <p class=""> <?php echo $technicianlist['wc_t_mobile']; ?></p>
                                                            </td>
                                                             <td>
                                                                <p class=""> <?php echo $technicianlist['wc_t_mobile']; ?></p>
                                                            </td>
                                                             <td>
                                                                <p class=""> <?php echo $technicianlist['wc_t_mobile']; ?></p>
                                                            </td>
                                                             <td>
                                                                <p class=""> <?php echo $technicianlist['wc_t_mobile']; ?></p>
                                                            </td>
                                                            
                                                            <td>
                                                                <?php if($technicianlist[ 'wc_t_status']=='1001' ) { ?>
                                        						    <label class="custom_switch"><input type="checkbox" checked="" id="technicianactive" class="btn btn-xs btn-success" technicianactiveid="<?php echo $technicianlist['wc_t_code'];?>" technicianactivestatus="<?php echo $technicianlist['wc_t_status'];?>"><span class="custom_slider custom_round"><span class="tgtxt">Active</span></span></label>
                                        						<?php } else { ?>
                                        						    <label class="custom_switch"><input type="checkbox" id="technicianactive" class="btn btn-xs btn-danger" technicianactiveid="<?php echo $technicianlist['wc_t_code'];?>" technicianactivestatus="<?php echo $technicianlist['wc_t_status'];?>"><span class="custom_slider custom_round"><span class="tgtxt">In Active</span></span></label>
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
    <script>
        $(document).on('click','#technicianactive',function(){
			//alert($(this).attr('technicianactiveid'));
			//alert($(this).attr('technicianactivestatus'));
			var technicianactiveid = $(this).attr('technicianactiveid');
			var technicianactivestatus = $(this).attr('technicianactivestatus');
				$.ajax({
					type:"post",
					url:"<?php echo base_url();?>Home/technicianstatuschange",
					data: {'technicianactiveid':technicianactiveid,'technicianactivestatus':technicianactivestatus},
					success: function(response){
					//alert(response);
					//console.log(response);
					//location.reload();
				}
			});
		});
    </script>
    <!--  End JavaScript -->
</body>
</html>