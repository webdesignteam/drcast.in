<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layout/meta');?>
    <?php $this->load->view('layout/styles');?>
    
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
                                <h4>List of Doctors</h4>
                                <div class="right_btn">
                                    <div id="buttons" class="datbtns"></div>
                                    <a href="<?php echo base_url();?>Home/doctor_create"
                                        class="btn btn-secondary custom_add">Create Doctor</a>
                                </div>
                            </div>
                            <div class="middle_date_picker">
                                <form id="filters1" name="filters1" method="post" class="md_filters"
                                    novalidate="novalidate">
                                    <div class="middle_flt">
                                        <select class="datebtn" name="wc_di_code" id="wc_di_code">
                                            <?php if(!empty($wc_di_name)){ ?><option value="<?php echo $wc_di_code; ?>"><?php echo $wc_di_name; ?></option><?php } ?>
                                            <?php  if(empty($divisionslist)) { } else { ?>
                                                <option value="0">Select division name</option>
                                                <?php foreach($divisionslist as $divisionslist) { ?>
                                                    <option value="<?php echo $divisionslist['wc_di_code']; ?>">
                                                    <?php echo $divisionslist['wc_di_name']; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <input type="submit" value="Filters" class="btn datebtn" name="search">
                                    <a href="#" id="clear" class="clear_filter">Clear</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if(empty($doctorslist)) { ?>
                        <div class="col-sm-12">
                            <div class="speaker_box nodoctor">
                               <p>
                                    No doctors are available
                                    <?php if (!empty($wc_di_name)) { ?>
                                        in <span class="wc_di_name"><?php echo $wc_di_name; ?></span>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                    <?php } else { ?>
                        <?php $idnumbers = 0; foreach($doctorslist as $speckers_list) { $idnumbers++; ?>
                            <div class="col-sm-4">
                                <div class="doctorcards">
                                    <img src="<?php echo base_url();?>uploads/doctors/<?php echo $speckers_list['wc_d_display_photo']; ?>" class="card_img">
                                    <div class="boxshadow speaker_box">
                                        <div class="speaker_content">
                                            <b class="title_head">Dr. <?php echo $speckers_list['wc_d_name']; ?></b>
                                            <p class="mb-0"><strong>Hospital: </strong><?php echo $speckers_list['wc_d_hospital']; ?></p>
                                            <p class=""><strong>Education:</strong> <?php echo $speckers_list['wc_d_education']; ?>,<br>
                                            <strong>Position:</strong> <?php echo $speckers_list['wc_d_position']; ?><br>
                                            <strong>Address:</strong> <?php echo $speckers_list['wc_d_location']; ?></p>
                                            <?php if($speckers_list['wc_d_status'] == '1001') { ?>
                                                <label class="custom_switch">
                                                    <input type="checkbox" checked id="doctoractive" class="btn btn-xs btn-success"
                                                    doctoractiveid="<?php echo $speckers_list['wc_d_code'];?>"
                                                    doctoractivestatus="<?php echo $speckers_list['wc_d_status'];?>">
                                                    <span class="custom_slider custom_round"><span class="tgtxt">Active</span></span>
                                                </label>
                                            <?php } else { ?>
                                                <label class="custom_switch">
                                                    <input type="checkbox" id="doctoractive" class="btn btn-xs btn-danger"
                                                    doctoractiveid="<?php echo $speckers_list['wc_d_code'];?>"
                                                    doctoractivestatus="<?php echo $speckers_list['wc_d_status'];?>">
                                                    <span class="custom_slider custom_round"><span class="tgtxt">Active</span></span>
                                                </label>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>
    <?php  $this->load->view('layout/copyright'); ?>
    <?php $this->load->view('layout/js');  ?>
    <?php //$this->load->view('layout/daterange');  ?>
    <script>
        $(document).ready(function () {
            $("#myInputTextField").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#searchtbl tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
        $(document).on('click','#doctoractive',function(){
			//alert($(this).attr('doctoractiveid'));
			//alert($(this).attr('doctoractivestatus'));
			var doctoractiveid = $(this).attr('doctoractiveid');
			var doctoractivestatus = $(this).attr('doctoractivestatus');
				$.ajax({
					type:"post",
					url:"<?php echo base_url();?>Home/doctorstatuschange",
					data: {'doctoractiveid':doctoractiveid,'doctoractivestatus':doctoractivestatus},
					success: function(response){
					//alert(response);
					//console.log(response);
					location.reload();
				}
			});
		});
    </script>
    <!--  End JavaScript -->
</body>

</html>