<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layout/meta');  ?>
	<?php $this->load->view('layout/styles');  ?>
	
	<style>
	    .success{
	        background: #ffffff;
	        width: 100%;
	        display: block;
	    }
	    .success img{
	        width: 200px;
	    }
	    ._success {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        a.btn_theme {
            background-color: #1faa9e;
            border-radius: 10px;
            color: white;
            font-size: 16px;
            padding: 0.5em 2em;
            outline: none!important;
            box-shadow: none!important;
            border: 0;
            font-weight: 600;
            z-index: 999;
        }
        
         a.btn_theme:hover{
             background-color: #021D35;
             color: #ffffff !important;
             
         }
         ._success h2{
             text-align: center;
         }
	</style>
	
	
</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="50"  >
	<!-- Page Loading -->
	<div id="loading"></div>
	
     
	
    <section class="pb-30 _top success">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
    				 <div class="_success">
    					<img src="<?php echo base_url();?>assets/img/success.gif" alt="success">
				        <h2 class="mt-3">Thanks for your interest.</h2>
						<p class="mr-5 ml-5 text-center">Our Team will contact you shortly.</p>
    				    <a href="<?php echo base_url();?>" class="btn_theme">Go to Home Page</a>
    				 </div>
				</div>
			</div> 
		</div>
    </section>
    
	 

</body>
</html>



