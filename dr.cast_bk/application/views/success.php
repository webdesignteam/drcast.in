<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('layout/meta');  ?>
	<?php $this->load->view('layout/styles');  ?>
	<style>
        .successPage{
            display:flex;
            flex-direction:column;
            justify-content:space-between;
        }
        img.gifimage{
            width: 360px;
        }
        .success-header.text-center {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }
	</style>
</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="50">
	<!-- Page Loading -->
	<div id="loading"></div>
    <div class="successPage">
    	<!-- Nav Menu  -->
        <section class="success">
			<div class="success-header text-center">
				<img src="<?php echo base_url();?>assets/img/success.gif" alt="success icon" class="gifimage">
				<?php if(!empty($msg1)){ ?><h1 class="mt-3 h3"><?php echo $msg1; ?></h1><?php } ?>
				<?php if(!empty($msg2)){ ?><p class="mr-5 ml-5 text-center"><?php echo $msg2; ?></p><?php } ?>
				<a href="<?php echo base_url();?>" class="btn font-weight-bold mt-3 shadow">Go to Home Page</a>
			</div>
        </section>
    </div>
</body>
</html>