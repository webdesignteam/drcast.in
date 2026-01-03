<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta -->
	<?php $this->load->view('layout/meta');  ?>
	<meta http-equiv="refresh" content="1000">
	<?php 
	// echo '<pre>';
	// print_r($domains);
	// echo '<br>';
	// echo $domains[0]['domain_name'];
	// echo '<br>';
	// echo $domains_group[0]['domains_group_name'];
	// echo '<br>';
	// echo $domains_pages[0]['domains_page_name'];
	// exit;
	?>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
	<?php $this->load->view('layout/styles');  ?>
	<style type="text/css">
	    .dataTables_filter{
	        float: right;
            display: inline-block;
            text-align: right;
	    }
	    .dataTables_paginate{
	        float: right;
	    }
	    .dataTables_info{
	        display: inline;
	    }
	    .table{
	        background: #fff;
	    }
	    .table thead th{
	        vertical-align: middle;
	    }
	    .table th, .table td{
	        vertical-align: middle;
	    }
	    .table th:first-child {
	        width: 5% !important;
        }
        div#queries_wrapper {
            background: white;
        }
		div#queries_length, .navbar-toggler {
			display: none;
		}
		table#queries tr> td:first-child, 
		table#queries tr> th:first-child
		{
			max-width: 70px!important;
    		min-width: 70px;
		}
		table#queries tr> td:last-child, 
		table#queries tr> th:last-child{
			max-width: 90px!important;
    		min-width: 90px;
		}
		table#queries tr> td:first-child, 
		table#queries tr> th:first-child,
		table#queries tr> td:last-child, 
		table#queries tr> th:last-child{
			text-align: center;
		}
		.table th, .table td{
		    padding: 0.35rem !important;
		}
		table#queries tr> td{
			word-break: break-word;
    		min-width: 180px;
		}
		input.btn.btn-success.btn-small {
		font-size: 13px;
		padding: 4px 12px;
		}
		input.btn.btn-danger.btn-small {
		font-size: 13px;
		padding: 4px 12px;
		}
    @media screen and (max-width:767px) {
    	table#queries tr> td:first-child, 
    	table#queries tr> th:first-child {
        max-width: 50px!important;
        min-width: 50px;
    }
	table#queries tr> td{
		min-width: 110px;
	}
	table#queries tr> td:last-child, 
	table#queries tr> th:last-child{
		display: none;
	}
	.table-responsive::-webkit-scrollbar {
      width: .5em;
      height: .5em;
    }
    .table-responsive::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }
    .table-responsive::-webkit-scrollbar-thumb {
      background-color: rgb(179, 179, 179);
      outline: 1px solid slategrey;
      height: .5em;
    }
    /* other styles  */
    .kris-block img {
        width: 105px;
    }
    .kris-block li a {
        display: block;
        padding: 0 1em;
    }
    .content-section {
        margin-top: 90px;
    }
    ._user_mnu{
    	padding-top: .5em;
    	width: 100%;
    }
    ._user_mnu span {
        width: 78%;
        display: inline-block;
    }
    }
	</style>
</head>
<body  data-spy="scroll" data-target=".navbar" data-offset="50" >
<!-- Page Loading -->    
<!-- <div id="loading"></div> -->
    <!-- Nav Menu  -->
    <div class="fixed-top header-section">
        <div class="container">
        <!-- navbar-me -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light website-nav">
			<?php $this->load->view('layout/nav');  ?>
			<div class="_user_mnu">
				<?php if($this->session->userdata('NAME') == ''){ }else{ ?>
				<span>
				 Welcome <?php echo ucwords($this->session->userdata('NAME'));?>
                </span>
				&nbsp;&nbsp;&nbsp;
				 <a style="color: #f00;" href="<?php echo base_url().'Home/';?>logout"><i class="fi-power"></i> Logout</a>
			 <?php } ?>
			 </div>
            </nav>
        </div>
    </div>
	<!-- Slider Start -->
    <section class="content-section">
		<img class="virus1" src="<?php echo base_url();?>assets/img/virus1.svg" alt="covifor-logo">
		<img class="virus2" src="<?php echo base_url();?>assets/img/virus2.svg" alt="covifor-logo">
		<img class="virus3" src="<?php echo base_url();?>assets/img/virus3.svg" alt="covifor-logo">
        <div class="container">
			<div class="row justify-content-center">
				<div class="col-sm-12" style="padding-top: 30px;">
			        <a class="btn log-btn btn-sm pull-right" style="margin: 0 0px 10px 0px; width: auto;" onClick="window.location.reload()" >Refresh </a>
		            <div class="table-responsive" style="margin-bottom: 20px;">
		                <h3>List of Queries</h3>
						<table id="" class="table table-bordered table-striped" >
							<thead>
								<tr>
									<th class="text-center">S No</th>
									<th>Name</th>
									<th style="width:50%;">Query</th>
									<th>Copy</th>
									<?php if($this->session->userdata('NAME') == ''){?><?php } else{ ?><th>Action</th><?php } ?>
								</tr>
							</thead>
							<tbody>
								<?php  
								if(!empty($activity)){
									$counter =0;
									foreach($activity as $_activity) {?>
								<tr>
									<td class="text-center" style="color:#000;"><?php echo $_activity->Que_autoID; ?></td>
									<td style="color:#000; "><?php echo $_activity->Que_name; ?></td>
									<td style="color:#000;"><?php echo $_activity->Que_Query; ?></td>
									<td><div class="Query" style="opacity: 0; width: 1px; height: 1px; overflow: hidden;" id="Query<?php echo $_activity->Que_autoID; ?>"><strong>From: <?php echo $_activity->Que_name; ?><br></strong><?php echo $_activity->Que_Query; ?></div>
										<a style="float: left; margin: 0 5px; padding: 2px 10px;" href="#" onclick="CopyToClipboard('Query<?php echo $_activity->Que_autoID; ?>');return false;" class="btn btn-small btn-primary">Copy</a></td>
									<?php if($this->session->userdata('NAME') == ''){?><?php } else{ ?>
									<td>
									    <?php $result = substr($_activity->Que_name, 0, 3); ?>
										<form class="form-horizontal" action="<?php echo base_url();?>Home/updatequery" method="post">
										<input type="submit" class="btn btn-success btn-small" value="Submit" name="submit">
										<input type="submit" class="btn btn-danger btn-small" value="Remove" name="remove">
										<input type="hidden" name="code" value="<?php echo $_activity->Que_Code; ?>">
										</form>					
									</td>
									<?php } ?>
								</tr>
								<?php } } else{?>
								<tr></tr>
								<?php }?>
							</tbody>
						</table>
					</div>
					<div class="table-responsive" style="margin-bottom: 0px;">
					    <h3>List of Answered Queries</h3>
						<table id="" class="table table-bordered table-striped" >
							<thead>
								<tr>
									<th class="text-center">S No</th>
									<th>Name</th>
									<th>Query</th>
									<?php if($this->session->userdata('NAME') == ''){?><?php } else{ ?><th>Action</th><?php } ?>
								</tr>
							</thead>
							<tbody>
								<?php  
								if(!empty($query)){
									$counter =0;
									foreach($query as $query) {?>
								<tr>
									<td class="text-center" style="color:#000;"><?php echo $query->Que_autoID; ?></td>
									<td style="color:#000; "><?php echo $query->Que_name; ?></td>
									<td style="color:#000;"><?php echo $query->Que_Query; ?></td>
									<?php if($this->session->userdata('NAME') == ''){?><?php } else{ ?>
									<td>
										<form class="form-horizontal" action="<?php echo base_url();?>Home/updatequery" method="post">
										<input type="submit" class="btn btn-success btn-small" value="Unanswered" name="unanswered">
										<input type="hidden" name="code" value="<?php echo $query->Que_Code; ?>">
										</form>					
									</td>
									<?php } ?>
								</tr>
								<?php } } else{?>
								<tr></tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
        </div>
    </section>
    
    <!-- End Slider -->
    <!-- Copyright -->
    <section class="copyright copyright-section d-none">
        <div class="container">
			<div class="d-none d-sm-none d-md-block d-lg-block">
				<div class="row">
					<div class="col-sm-6">
						<p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> All Rights Reserved by <a href="http://www.heterohealthcare.com/" target="_blank">Hetero Healthcare Limited</a>.</p>
					</div>
					<div class="col-sm-6">
						<div class="kris-block">
							<ul>
								<li>
									<a href="#" target="_blank">
										<img src="<?php echo base_url();?>assets/img/covifor-logo.svg" alt="covifor-logo"> 
									</a>
								</li>
								<li>
									<a href="#" target="_blank">
										<img src="<?php echo base_url();?>assets/img/favivir-logo.svg" alt="favivir-logo"> 
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="d-block d-sm-block d-md-none d-lg-none">
				<div class="row">
					<div class="col-sm-6">
						<div class="kris-block">
							<ul>
								<li>
									<a href="#" target="_blank">
										<img src="<?php echo base_url();?>assets/img/covifor-logo.svg" alt="covifor-logo"> 
									</a>
								</li>
								<li>
									<a href="#" target="_blank">
										<img src="<?php echo base_url();?>assets/img/favivir-logo.svg" alt="favivir-logo"> 
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> All Rights Reserved by <a href="http://www.heterohealthcare.com/" target="_blank">Hetero Healthcare Limited</a>.</p>
					</div>
				</div>
			</div>
        </div>
    </section>
    <!-- End Copyright -->     
    <!-- Footer -->
 <?php $this->load->view('layout/copyright');  ?>
    <!-- Go to Top Button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<!--  JavaScript -->
	<?php $this->load->view('layout/js');  ?>
    <script>
        function CopyToClipboard(id){
            var r = document.createRange();
            r.selectNode(document.getElementById(id));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(r);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
        }
    </script>

</body>
</html>