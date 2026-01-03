<?php $this->load->view('default/layouts/header_view');  ?>
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title"><?php echo ucwords(str_replace("_"," ",$this->router->fetch_method()));?> Report</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">
                                        <?php echo APP_NAME; ?>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?php echo ucwords(str_replace("_"," ",$this->router->fetch_method()));?>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end page-title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered table-sm dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Feedback Message</th>
                                            <th>feedback by</th>
											<th>Created On</th>
                                        </tr>
                                    </thead>

                                    <tbody>
										<?php 
										// echo '<pre>'; print_r($feedback); exit;										
										if(!empty($feedback)){
											foreach($feedback as $k => $v) { $v = (object)$v; ?>
												<tr>
													<td><?php echo $k; ?></td>
													<td><?php echo $v->FD_message; ?></td>
													<td><?php echo $v->SUi_fullName; ?></td>
													<td><?php echo $v->FD_createdOn; ?></td>
												</tr>
										<?php } } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- container-fluid -->
            </div>
            <!-- content -->
            <?php $this->load->view('default/layouts/footer_view');  ?>
            