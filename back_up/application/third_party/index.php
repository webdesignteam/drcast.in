<?php   $this->load->view('home/template/header');  ?>
	<div class="content content-fixed">
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-sm-12">
					<div class="card text-center">
						<div class="card-header bg-light">
							 <h5 class="card-title">Employee Leave Approval</h5>
						</div>
						<div class="card-body">
							<form id="leaveform" name="leaveform"  method="post" enctype="multipart/form-data">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label text-left">Employee ID</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="employeeid" name="employeeid" value="<?php echo $employee[0]->LMs_employeeID;?>" readonly>
									</div>
									<label class="col-sm-3 col-form-label text-left">Employee Name:</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="employeename" name="employeename" value="<?php echo $employee[0]->SUi_fullName;?>" readonly>
									</div>
								</div>	
								<div class="form-group row">
									<label class="col-sm-3 col-form-label text-left">From Date</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="fromdate" name="fromdate" value="<?php echo $employee[0]->LMs_FromDate;?>" readonly>
									</div>
									<label class="col-sm-3 col-form-label text-left">To Date</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="todate" name="todate" value="<?php echo $employee[0]->LMs_ToDate;?>" readonly>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 col-form-label text-left">Leave Type</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="leavetype" name="leavetype" value="<?php echo $employee[0]->LMs_leaveName;?>" readonly>
									</div>
									<label class="col-sm-3 col-form-label text-left">Days Considered</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="days" name="days" value="<?php echo $employee[0]->LMs_days;?>" readonly>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-3">
										
									</div>
									<div class="col-sm-3">
										
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 col-form-label text-left">Reason</label>
									<div class="col-sm-9">
										<textarea class="form-control" id="message" name="message" readonly ><?php echo $employee[0]->LMs_message;?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 col-form-label text-left">Comments</label>
									<div class="col-sm-9">
										<textarea class="form-control" id="comments" name="comments"></textarea>
									</div>
								</div>
								<input type="hidden" class="form-control" id="leaveType" name="leaveType" value="<?php echo $employee[0]->LMs_leaveType;?>" readonly>
								<input type="hidden" class="form-control" id="leavecode" name="leavecode" value="<?php echo $employee[0]->LMs_leaveCode;?>" readonly>
								<input type="hidden" class="form-control" id="managername" name="managername" value="<?php echo $employee[0]->managerName;?>" readonly>
								<input type="hidden" class="form-control" id="managerid" name="managerid" value="<?php echo $employee[0]->managerID;?>" readonly>
								<div class="form-group row">
									<div class="col-sm-6">
										<input type="submit" class="btn btn-success" id="submit" name="formbutton" value="Accept">
									</div>
									<div class="col-sm-6">
										<input type="submit" class="btn btn-danger" id="reject" name="formbutton" value="Reject">
									</div>
								</div>
								
							</form>
						</div>
					
						
					</div>
				</div>
			</div>
		</div>
	</div>
<?php   $this->load->view('home/template/footer');  ?>
<script>
                $(function() {
                    $('#leaveform').validate({
                        rules: {
                            "employeeid": {
                                required: true
                            },
                            "fromdate": {
                                required: true
                            },
                            "todate": {
                                required: true
                            },
							"leavetype": {
                                required: true
                            },
							"days": {
                                required: true
                            },
							"managerid": {
                                required: true
                            },
							"message": {
                                required: true
                            },
							"comments": {
                                required: true
                            }
                        },
                        messages: {
                            "employeeid": {
                                required: "Employee ID Missing"
                            },
                            "fromdate": {
                                required: "From Date Missing"
                            },
                            "todate": {
                                required: "To Date Missing"
                            },
							"leavetype": {
                                required: "Leave Type Missing"
                            },
							"days": {
                                required: "Days Missing"
                            },
							"managerid": {
                                required: "Manager ID Missing"
                            },
							"message": {
                                required: "Message Missing"
                            },
							"comments": {
                                required: "Please enter manager comments"
                            }
                        },
                        submitHandler: function(form) { // for demo
                            var myForm = document.getElementById('leaveform');
							$.ajax({
                                type: 'post',
                                url: '<?php echo base_url();?>Home/updateleave',
                                dataType: 'text', // what to expect back from the PHP script, if anything
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: new FormData(myForm),
                                success: function(data) {
                                // alert(data);
                                var obj = jQuery.parseJSON(data);
                                if (obj.status == 1001) {
								swal("Good job!", obj.message, "success").then(function(){
										window.close();
									});		
								} else {
									swal({
										type: 'error',
										title: 'Oops...',
										text: obj.message
									})
								}
								}
                            });
                            return false;
                        }
                    });
                });
            </script>
