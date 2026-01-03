<?php $this->session->all_userdata();
 echo $this->uri->segment(2);
 ?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo APP_NAME;?> | Hetero Healthcare Limited</title>
	<meta name="description" content="<?php echo APP_NAME;?>"/>
	<meta name="keywords" content="<?php echo APP_NAME;?>" />
	<meta name="url" content="<?php echo base_url().$this->uri->segment(2);?>" />
	<meta name="copyright" content="Hetero Healthcare Limited" />
	<link rel="canonical" href="<?php echo base_url().$this->uri->segment(2);?>" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.ico" type="image/x-icon">

    <!-- App css -->
	

	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom-style.css" />
	

	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Spartan&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
	<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css">
	 <link href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
	 
    <style>
	.error{
		color: red !important;
		font-size: 10px;
		font-weight: 900;
		text-transform:uppercase;
	}

	</style>
  </head>

  <body>
  
	<div class="fixed-top header-section">
        <div class="container">
        <!-- navbar-me -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light website-nav">
			
			<h5 class="pfofile-name"><?php if($this->session->userdata('NAME') == ''){?>
			<?php } else{ ?>
				 Welcome <?php echo ucwords($this->session->userdata('NAME'));?>
                </span>
				 <a href="<?php echo base_url().'Home/';?>logout">Logout <i class="fa fa-power-off" aria-hidden="true"></i></a>
			 <?php } ?>
			 </h5>
		
			<a class="navbar-brand header-kris" href="<?php echo base_url();?>"><span>An Educational Initiative by</span><img src="<?php echo base_url();?>assets/img/hhcl-logo.png" alt="hhcl-logo" class="arvlogo"></a>
			
			<!-- <div class="ml-auto header-arv">
				<a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/arvlogo.jpg" alt="hhcl-logo"></a>				
			</div> -->
			
            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->

           
					
			
            </nav>
        </div>
		
    </div>
	
  </body>

