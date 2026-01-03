<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('Home_model');
		$this->load->library('form_validation');
		$this->load->model('Home_model');
		//$this->load->library('session');
		$this->load->helper('directory');
		$this->load->library('zip');
		$this->load->library(array('session', 'email'));
		$this->load->helper('cookie');
		$this->load->helper('url', 'form', 'string', 'file', 'directory');
		// For Error Reporting
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
	}
	public function User_Auth() {
		// echo"<pre>"; print_r($this->session->all_userdata());
		// exit;
        if ($this->session->userdata('wc_u_code')){
            return true;
        } else {
            return false;
        }
    }
    public function index(){
		$data = array();
		//echo "Welcome"; exit;
		redirect('login');
	}
	public function login(){
		$data=array();
		
		if($this->User_Auth()) { redirect('dashboard'); } 
		
		date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		if(!empty($this->session->userdata('user_code'))){
		    redirect('dashboard');
		}
        if ($this->input->post('submit')){
			//echo "<pre>"; print_r($_POST); exit;
			$this->form_validation->set_rules('username','Enter Username','required');
			$this->form_validation->set_rules('password','Enter Password','required');
			$this->form_validation->set_error_delimiters('<div class="error">','</div>');
			$this->form_validation->set_message('required', 'Enter %s');
			if($this->form_validation->run()==False){
				//echo validation_errors();
				$data['error'] = validation_errors();
				//echo "<pre>"; print_r($data); exit;
				$this->load->view('index', $data);
			}
			else{
				//echo "In"; exit;
				
				$where = array('username'=> $this->input->post('username'),'password'=> $this->input->post('password'));
				$data['userdata']=$this->Home_model->getData('db', 'wc_users', '*', $where, '', '', '', '');
				//echo "<pre>"; print_r($data['userdata']); exit;
				
				if(!empty($data['userdata'])){
					if($data['userdata'][0]['wc_u_status'] == '1001'){
						//echo $data['userdata'][0]['username']; exit;
						//echo "<pre>"; Print_r($data); exit;
						
						$this->load->helper('string');
        	            $wc_log_user_code = random_string('nozero',10);
						
						if($data['userdata'][0]['wc_u_type'] == 'Admin'){
							$sessiondata = array(
								'wc_u_id'=>$data['userdata'][0]['wc_u_id'],
								'wc_log_user_code' => $wc_log_user_code,
								'wc_di_code'=>$data['userdata'][0]['wc_di_code'],
								'wc_u_type'=>$data['userdata'][0]['wc_u_type'],
								'wc_u_role'=>$data['userdata'][0]['wc_u_role'],
								'wc_u_code'=>$data['userdata'][0]['wc_u_code'],
								'wc_u_empid'=>$data['userdata'][0]['wc_u_empid'],
								'username'=>$data['userdata'][0]['username'],
								'wc_u_email'=>$data['userdata'][0]['wc_u_email'],
								'wc_u_phone'=>$data['userdata'][0]['wc_u_phone'],
								'wc_u_display_name'=>$data['userdata'][0]['wc_u_display_name'],
								'wc_u_avatar'=>$data['userdata'][0]['wc_u_avatar'],
								'wc_u_status'=>$data['userdata'][0]['wc_u_status']
							);
						}
						elseif($data['userdata'][0]['wc_u_type'] == 'Employee'){
						    $sessiondata = array(
								'wc_u_id'=>$data['userdata'][0]['wc_u_id'],
								'wc_log_user_code' => $wc_log_user_code,
								'wc_di_code'=>$data['userdata'][0]['wc_di_code'],
								'wc_u_type'=>$data['userdata'][0]['wc_u_type'],
								'wc_u_role'=>$data['userdata'][0]['wc_u_role'],
								'wc_u_code'=>$data['userdata'][0]['wc_u_code'],
								'wc_u_empid'=>$data['userdata'][0]['wc_u_empid'],
								'username'=>$data['userdata'][0]['username'],
								'wc_u_email'=>$data['userdata'][0]['wc_u_email'],
								'wc_u_phone'=>$data['userdata'][0]['wc_u_phone'],
								'wc_u_display_name'=>$data['userdata'][0]['wc_u_display_name'],
								'wc_u_avatar'=>$data['userdata'][0]['wc_u_avatar'],
								'wc_u_status'=>$data['userdata'][0]['wc_u_status']
							);
						}
						elseif($data['userdata'][0]['wc_u_type'] == 'Participant'){
						    $sessiondata = array(
								'wc_u_id'=>$data['userdata'][0]['wc_u_id'],
								'wc_log_user_code' => $wc_log_user_code,
								'wc_di_code'=>$data['userdata'][0]['wc_di_code'],
								'wc_u_type'=>$data['userdata'][0]['wc_u_type'],
								'wc_u_role'=>$data['userdata'][0]['wc_u_role'],
								'wc_u_code'=>$data['userdata'][0]['wc_u_code'],
								'wc_u_empid'=>$data['userdata'][0]['wc_u_empid'],
								'username'=>$data['userdata'][0]['username'],
								'wc_u_email'=>$data['userdata'][0]['wc_u_email'],
								'wc_u_phone'=>$data['userdata'][0]['wc_u_phone'],
								'wc_u_display_name'=>$data['userdata'][0]['wc_u_display_name'],
								'wc_u_avatar'=>$data['userdata'][0]['wc_u_avatar'],
								'wc_u_status'=>$data['userdata'][0]['wc_u_status']
							);
						}
						elseif($data['userdata'][0]['wc_u_type'] == 'Technician'){
						    $sessiondata = array(
								'wc_u_id'=>$data['userdata'][0]['wc_u_id'],
								'wc_log_user_code' => $wc_log_user_code,
								'wc_di_code'=>$data['userdata'][0]['wc_di_code'],
								'wc_u_type'=>$data['userdata'][0]['wc_u_type'],
								'wc_u_role'=>$data['userdata'][0]['wc_u_role'],
								'wc_u_code'=>$data['userdata'][0]['wc_u_code'],
								'wc_u_empid'=>$data['userdata'][0]['wc_u_empid'],
								'username'=>$data['userdata'][0]['username'],
								'wc_u_email'=>$data['userdata'][0]['wc_u_email'],
								'wc_u_phone'=>$data['userdata'][0]['wc_u_phone'],
								'wc_u_display_name'=>$data['userdata'][0]['wc_u_display_name'],
								'wc_u_avatar'=>$data['userdata'][0]['wc_u_avatar'],
								'wc_u_status'=>$data['userdata'][0]['wc_u_status']
							);
						}
						elseif($data['userdata'][0]['wc_u_type'] == 'Organizer'){
						    $sessiondata = array(
								'wc_u_id'=>$data['userdata'][0]['wc_u_id'],
								'wc_log_user_code' => $wc_log_user_code,
								'wc_di_code'=>$data['userdata'][0]['wc_di_code'],
								'wc_u_type'=>$data['userdata'][0]['wc_u_type'],
								'wc_u_role'=>$data['userdata'][0]['wc_u_role'],
								'wc_u_code'=>$data['userdata'][0]['wc_u_code'],
								'wc_u_empid'=>$data['userdata'][0]['wc_u_empid'],
								'username'=>$data['userdata'][0]['username'],
								'wc_u_email'=>$data['userdata'][0]['wc_u_email'],
								'wc_u_phone'=>$data['userdata'][0]['wc_u_phone'],
								'wc_u_display_name'=>$data['userdata'][0]['wc_u_display_name'],
								'wc_u_avatar'=>$data['userdata'][0]['wc_u_avatar'],
								'wc_u_status'=>$data['userdata'][0]['wc_u_status']
							);
						}
						//echo "<pre>"; Print_r($sessiondata); exit;
						$this->session->set_userdata($sessiondata);
						
						$user_ip = $this->input->ip_address();
						//echo $user_ip; exit;
						
    					$data_user_log = array(
                	        'wc_u_code' => $data['userdata'][0]['wc_u_code'], 
                	        'wc_log_user_code' => $wc_log_user_code,
                	        'wc_u_empid' => $data['userdata'][0]['wc_u_empid'],
                            'username' => $data['userdata'][0]['username'],
                            'wc_u_phone' => $data['userdata'][0]['wc_u_phone'],
                            'wc_di_code' => $data['userdata'][0]['wc_di_code'],
                            'wc_log_user_ip' => $user_ip,
                            'wc_logon'=>$objDate->format('Y-m-d H:i:s')
                        );
                	    //echo "<pre>"; print_r($data_user_log); exit;
                	    $insert_user_log = $this->Home_model->insertData('db', 'wc_users_log', $data_user_log);
						
						redirect('dashboard');
					}
					else{
						$data['error'] = '<div class="error">User was Inactive Please contact Administrator</div>';
						$this->load->view('index', $data);
					}
				}
				else {
					$data['error'] = '<div class="error">Invalid Username and Password</div>';
					$this->load->view('index', $data);
				}
			}
		}
		else{
			$this->load->view('index', $data);
		}
    }
    public function reset_password(){
        //echo 'rajesh'; exit;
		$data = array();		
		date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
	
	    //echo "<pre>"; print_r($data); exit;
		$this->load->view('reset_password', $data);
	}
	
    
    public function logout(){
        $data=array();
		date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
        
        //echo "<pre>"; Print_r($this->session->userdata()); exit;
		//echo $this->session->userdata('wc_log_user_code'); exit;
		
		//Update log info
		$update = array(        
          'wc_logout'=> $objDate->format('Y-m-d H:i:s'),
        ); 
        //echo "<pre>"; print_r($update); exit;
        $where = "wc_log_user_code = '".$this->session->userdata('wc_log_user_code')."'";
        $this->Home_model->updateData('db', 'wc_users_log', $update, $where); 
		
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();
        redirect('login');
    }
    public function dashboard(){
		$data = array();		
		date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		if ($this->User_Auth()) {} else {
			redirect('login');
		}
		
		$data['active'] = 'index';
		$data['clear'] = 'dashboard';

		/*if($this->input->post('search')){
		    //echo "<pre>"; print_r($_POST); exit;
		    
		    if(empty($this->input->post('daterange')) && empty($this->input->post('wc_d_id'))){
		        //echo "Both Empty";
		        redirect('dashboard'); //exit;
		    }
		    elseif(!empty($this->input->post('daterange')) && !empty($this->input->post('wc_d_id'))){
		        //echo "Both !Empty";
		        $daterange = $this->input->post('daterange'); 
		        $daterange1 = str_replace(' ', '', $daterange);
		        
		        $explode = explode("-",$daterange);
                //print_r($explode); exit;
		        
		        $from = $explode[0].'-'.$explode[1].'-'.$explode[2].' 00:00:00';
		        $to = $explode[3].'-'.$explode[4].'-'.$explode[5].' 23:59:59';
		        
		        $where_allwebinars = "wc_d_id = ".$this->input->post('wc_d_id')." AND webinar_date BETWEEN '$from' AND '$to'";
		        $wherecompleted    = "wc_d_id = ".$this->input->post('wc_d_id')." AND webinar_date > '$from' AND webinar_date < '$to'";
                $data['completedwebinars'] = $this->Home_model->getCount_testing('db', 'webinar', '', $wherecompleted, '');
    	        $whereallusers = "WHERE webinar.wc_d_id = ".$this->input->post('wc_d_id')." AND webinar_date BETWEEN '$from' AND '$to'";
    	        $whereuniqueusers = "WHERE webinar.wc_d_id = ".$this->input->post('wc_d_id')." AND webinar_date BETWEEN '$from' AND '$to'";
    	        $whereallqueries = "WHERE webinar.wc_d_id = ".$this->input->post('wc_d_id')." AND webinar_date BETWEEN '$from' AND '$to'";
    	        $whereanswered = "webinar.wc_d_id = ".$this->input->post('wc_d_id')." AND webinar_date BETWEEN '$from' AND '$to'";
        	    
    	        //print_r($whereanswered); exit;
		    }
		    elseif(empty($this->input->post('daterange')) && !empty($this->input->post('wc_d_id'))){
		        //echo "daterange Empty";
		        $where_allwebinars = 'wc_d_id = "'.$this->input->post('wc_d_id').'"';
		        $wherecompleted = 'wc_d_id = "'.$this->input->post('wc_d_id').'" AND webinar_date < CURDATE()';
		        $data['completedwebinars'] = $this->Home_model->getCount('db', 'webinar', '', $wherecompleted, '');
		        $whereincompleted = 'wc_d_id = "'.$this->input->post('wc_d_id').'" AND webinar_date > CURDATE()';
		        $data['incompletedwebinars'] = $this->Home_model->getCount('db', 'webinar', '', $whereincompleted, '');
		        $whereallusers = "WHERE webinar.wc_d_id = ".$this->input->post('wc_d_id');
		        $whereuniqueusers = "WHERE webinar.wc_d_id = ".$this->input->post('wc_d_id');
		        $whereallqueries = "WHERE webinar.wc_d_id = ".$this->input->post('wc_d_id');
		        $whereanswered = "webinar.wc_d_id = ".$this->input->post('wc_d_id');
		        //print_r($where_allwebinars); exit;
		    }
		    elseif(!empty($this->input->post('daterange')) && empty($this->input->post('wc_d_id'))){
		        //echo "webinar_division Empty";
		        
		        $daterange = $this->input->post('daterange'); 
		        $daterange1 = str_replace(' ', '', $daterange);
		        
		        $explode = explode("-",$daterange);
                //print_r($explode); exit;
		        
		        $from = $explode[0].'-'.$explode[1].'-'.$explode[2].' 00:00:00';
		        $to = $explode[3].'-'.$explode[4].'-'.$explode[5].' 23:59:59';
		        
		      //  echo $from_date = $explode[0].'-'.$explode[1].'-'.$explode[2];
		      //  echo "<br>";
		      //  echo $to_date = $explode[3].'-'.$explode[4].'-'.$explode[5];
		      //  echo "<br>";

        //         //echo $from_date = "2024-01-17";
        //         echo "<br>";
        // 		//echo $to_date = "2024-01-19";
        // 		echo "<br>";
        // 		$current_date = $objDate->format('Y-m-d');

        // 		if(($from_date < $current_date) && $to_date < $current_date){
        // 		    echo "Past"; 
        // 		}
        // 		elseif(($from_date > $current_date) && $to_date > $current_date){
        // 		    echo "F"; 
        // 		}
        // 		else{
        // 		    echo "else";
        // 		}
        // 		echo "<br>";
        // 		echo "Done"; exit;

		    }
		  //  echo "<br>";
		  //  echo "Done"; exit;
		}
		else{
		    $where_allwebinars = '';
		    $wherecompleted = 'wc_date < CURDATE()';
		    $data['completedwebinars'] = $this->Home_model->getCount('db', 'webinar_list', '', $wherecompleted, '');
    	    $whereincompleted = 'wc_date > CURDATE()';
    	    $data['incompletedwebinars'] = $this->Home_model->getCount('db', 'webinar_list', '', $whereincompleted, '');
    	    $whereallusers = '';
    	    $whereuniqueusers = '';
    	    $whereallqueries = '';
    	    $whereanswered = '';
    	    $whereunanswered = '';
		}
		
		$data['allwebinars'] = $this->Home_model->getCount('db', 'webinar_list', '', $where_allwebinars, '');
        //$data['allusers'] = $this->Home_model->allusers($whereallusers);
        // print_r($data['allwebinars']); exit;
        
    	$data['uniqueusers'] = $this->Home_model->uniqueusers($whereuniqueusers);
    	//print_r($data['uniqueusers']); exit;
    	
    	$data['allqueries'] = $this->Home_model->allqueries($whereallqueries);
    	//print_r($data['allqueries']); exit;
    	
    	$data['answeredqueries'] = $this->Home_model->answeredqueries($whereanswered);
    	//print_r($data['answeredqueries']); exit;
    	
    	//echo "<pre>"; print_r($data['answeredqueries']); exit;
    	
    	$data['allusers'] = $this->Home_model->getCount('db', 'wc_users', '', '', '');
    	//print_r($data['allusers']); exit;
		
		$getdata = '*';
    	$where = 'wc_d_status = "1001"';
    	
    	$data['divisionslist'] = $this->Home_model->getData('db', 'wc_divisions', $getdata,  $where,'','','','');
    	//echo "<pre>"; print_r($data['divisionslist']); exit;
    	
    	//uniqueusers
     	//$db, $table, $getdata, $where, $distinct
     	//$data['uniqueusers'] = $this->Home_model->getCount('db', 'wc_users', '', '', 'wc_u_email');
     	//print_r($data['uniqueusers']); exit;
     	
     	//$data['allqueries'] = $this->Home_model->getCount('db', 'tbl_queries', '', '', '');
    	
    	$data['answeredqueries'] = $this->Home_model->getCount('db', 'tbl_queries', '', $whereanswered, '');
        $data['unansweredqueries'] = $this->Home_model->getCount('db', 'tbl_queries', '', $whereunanswered, '');
        //print_r($data['answeredqueries']); exit;
    
    	
    	
    	
    	//piechart
    	$data['piechart'] = $this->Home_model->piechart();
    	//echo "<pre>"; print_r($data['piechart']); exit;
    	
    	//barchart
    	$data['barchart'] = $this->Home_model->barchart();
    	//print_r($data['barchart']); exit;
    	
    	//queriescount
    	$data['queriescount'] = $this->Home_model->queriescount();
    	//echo "<pre>"; print_r($data['queriescount']); exit;*/
    	
		
		//echo "<pre>"; print_r($data); exit;
		$this->load->view('dashboard', $data);
	}
	
	public function request_event(){
	    $data = array();		
		date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		if ($this->User_Auth()) {} else {
			redirect('login');
		}

		$this->load->helper('string');	
		$code = random_string('nozero',10);
		
		//Divisions
		$getdata = 'wc_di_id,wc_di_code,wc_di_name';
		$where = 'wc_di_status = "1001"';
	    $data['divisions'] = $this->Home_model->getData('db', 'wc_divisions', $getdata, $where, '', 'wc_di_name', 'ASC', '');
	   	//echo "<pre>"; print_r($data); exit;
	   	
	   	//Divisions
		$getdata = 'wc_d_code,wc_d_code_sap,wc_d_name';
		$where = 'wc_d_status = "1001"';
	    $data['doctors'] = $this->Home_model->getData('db', 'wc_doctors', $getdata, $where, '', 'wc_d_name', 'ASC', '');
	   	//echo "<pre>"; print_r($data); exit;
	   	
	   	if($this->input->get('division')){
	   	    //Doctore
	   	    $tableA = 'wc_doctor_maping';
    		$tableB = 'wc_doctors';
    		$key1 = 'wc_d_code';
    		$key2 = 'wc_d_code';
    		$tableC = 'wc_divisions';
    		$key3 = 'wc_di_code';
    		$key4 = 'wc_di_code';
    		$tableD = '';
    		$key5 = '';
    		$key6 = '';
    		$tableE = '';
    		$key7 = '';
    		$key8 = '';
    		$tableF= '';
    		$key9 = '';
    		$key10 = '';
    		$tableG= '';
    		$key11 = '';
    		$key12 = '';
    		$getdata = 'B.wc_d_code,B.wc_d_name,B.wc_d_position,B.wc_d_education,B.wc_d_location';
    		$groupBy ='';
            $where = 'A.wc_dm_status = "1001" AND B.wc_d_status = "1001" AND A.wc_di_code = "'.$this->input->get('division').'"';
    		//$where = '';
    		$data['doctors'] = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', '', '', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy);
    	    //echo "<pre>"; print_r($data); exit;
	   	}
	   	
	   	if($this->input->post('submit') == "Submit"){
            //echo "<pre>"; print_r($_POST); //exit;
            //echo "<pre>"; print_r($_FILES);
		       
            if($this->input->post('wc_w_event') == "NewEvent"){
                //echo "NEW"; //exit;
                if($this->input->post('wc_w_platform') == "ZoomMeeting"){
                    echo "Zoom Meeting"; exit;
                }
                elseif($this->input->post('wc_w_platform') == "YouTubeStreaming"){
                    echo "YouTube Streaming"; exit;
                }
                elseif($this->input->post('wc_w_platform') == "FacebookStreaming"){
                    echo "Facebook Streaming"; exit;
                }
                elseif($this->input->post('wc_w_platform') == "WebinarPortal"){
                    //echo "Webinar Portal"; exit;
                    
                    //print_r($this->session->userdata);
                    //echo $this->session->userdata('wc_di_code'); //exit;
                    
                    if(empty($_FILES["wc_w_invitation"]["name"])){ $wc_w_invitation = null;  } else{
        		        $file_ext = pathinfo($_FILES["wc_w_invitation"]["name"], PATHINFO_EXTENSION);
                        $wc_w_invitation = $code.'_invitation_'.$objDate->format('YmdHis').'.'.$file_ext;
                        
                        $folderPath = FCPATH . 'uploads/invitations/';
            		    if(!is_dir($folderPath)) {
                            mkdir($folderPath, 0777, true);
                        }
                        $config1['upload_path'] = $folderPath;
                        $config1['allowed_types'] = 'jpg|jpeg|JPG|JPEG';
                        $config1['max_size'] = 20480; // File size in KB (5MB)
                        //$config1['max_width'] = 1024;
                        //$config1['max_height'] = 800;
                        //$config1['overwrite'] = TRUE;
                        $config1['file_name'] = $wc_w_invitation;
                        $this->load->library('upload', $config1);
                        $this->upload->initialize($config1);
                        if(!$this->upload->do_upload('wc_w_invitation')){
            				$error = array('error' => $this->upload->display_errors()); //exit;
            				echo "<pre>"; print_r($error); exit;
            			}
            			else{
            				$data1 = array('upload_data' => $this->upload->data());
            				//echo "<pre>"; print_r($data1); //exit;
            				$wc_w_invitation = $wc_w_invitation;
            			}
                    }
                    
                    $datetime = $this->input->post('wc_w_datetime');
                    list($start, $end) = explode(" - ", $datetime);
                    $wc_w_datetime_from = date("Y-m-d H:i:s", strtotime($start));
                    $wc_w_datetime_to   = date("Y-m-d H:i:s", strtotime($end));
                    
                    if($this->input->post('wc_w_invitation_create_check') == "on"){
                        $wc_w_invitation_create_check = "Already";
                    }
                    else{
                        $wc_w_invitation_create_check = "CreateNew";
                    }
                    
                    if($this->session->userdata('wc_u_type') == 'Organizer'){
                        $wc_di_code = $this->session->userdata('wc_di_code');
                        
                        $wc_w_organizer_code = $this->session->userdata('wc_log_user_code');
            			$wc_w_organizer_name = $this->session->userdata('wc_u_display_name');
            			$wc_w_organizer_details = 'Updated';
            			$wc_w_organizer_details_updated_by = $this->session->userdata('wc_log_user_code');
                        $wc_w_organizer_details_updated_on = $objDate->format('Y-m-d H:i:s');
                    }
                    elseif($this->session->userdata('wc_u_type') == 'Admin' OR $this->session->userdata('wc_u_type') == 'Employee'){
                        $getdata = '*';
                    	$where = 'wc_u_code = "'.$this->input->post('wc_w_organizer').'"';
                    	$data['organizer_info'] = $this->Home_model->getData('db', 'wc_users', $getdata,  $where,'','','','');
                    	
                    	$wc_w_organizer_code = $this->input->post('wc_w_organizer');
            			$wc_w_organizer_name = $data['organizer_info'][0]['wc_u_display_name'];
            			$wc_w_organizer_details = 'Updated';
            			$wc_w_organizer_details_updated_by = $this->session->userdata('wc_u_code');
                        $wc_w_organizer_details_updated_on = $objDate->format('Y-m-d H:i:s');
                        
                        $wc_di_code = $this->input->post('wc_di_code');
                    }
                    else{
                        $wc_di_code = $this->input->post('wc_di_code');
                        $wc_w_organizer_code = null;
            			$wc_w_organizer_name = null;
            			$wc_w_organizer_details = 'Pending';
            			$wc_w_organizer_details_updated_by = null;
                        $wc_w_organizer_details_updated_on = null;
                    }
                    
                    $add_event_request = array(
                        'wc_w_event_code' => $code,
            		    'wc_w_event_type' => $this->input->post('wc_w_event'),
            		    'wc_di_code' => $wc_di_code,
            		    'wc_w_requester' => $this->session->userdata('wc_u_display_name'),
            		    'wc_w_platform' => $this->input->post('wc_w_platform'),
            		    'wc_w_topic' => $this->input->post('wc_w_topic'),
            		    'wc_w_subtitle' => $this->input->post('wc_w_subtitle'),
            		    'wc_w_datetime_from' => $wc_w_datetime_from,
            		    'wc_w_datetime_to' => $wc_w_datetime_to,
            		    'wc_w_invitation_create_check' => $wc_w_invitation_create_check,
            		    'wc_w_invitation' => $wc_w_invitation,
            		    'wc_w_description' => $this->input->post('wc_w_description'),
            		    'wc_w_description' => $this->input->post('wc_w_description'),
            		    'wc_w_description' => $this->input->post('wc_w_description'),
            		    'wc_w_zoom_details' => 'Pending',
            		    'wc_w_youtube_details' => 'Pending',
            		    'wc_w_technician_details' => 'Pending',
            		    'wc_w_organizer_code' => $wc_w_organizer_code,
            		    'wc_w_organizer_name' => $wc_w_organizer_name,
            		    'wc_w_organizer_details_updated_by' => $wc_w_organizer_details_updated_by,
            		    'wc_w_organizer_details_updated_on' => $wc_w_organizer_details_updated_on,
            			'wc_w_organizer_details' => $wc_w_organizer_details,
            		    'wc_w_platform_details' => 'Pending',
            			'created_by' => $this->session->userdata('wc_u_code'),
            			'created_on' => $objDate->format('Y-m-d H:i:s'),
            			'updated_by' => $this->session->userdata('wc_u_code'),
            			'updated_on' => $objDate->format('Y-m-d H:i:s')
            		);
            		//echo "<pre>"; print_r($add_event_request); exit;
            		$insert_event_request = $this->Home_model->insertData('db', 'wc_events', $add_event_request);
            		//echo $insert_event_request; exit;
            		
            		//events settings
            		$add_event_settings = array(
                        'wc_w_event_code' => $code,
            			'wc_ws_updated_by' => $this->session->userdata('wc_u_code'),
            			'wc_ws_updated_on' => $objDate->format('Y-m-d H:i:s')
            		);
            		//echo "<pre>"; print_r($add_event_settings); exit;
            		$insert_event_request = $this->Home_model->insertData('db', 'wc_events_settings', $add_event_settings);
            		
            		redirect('events');
                    
                }
                elseif($this->input->post('wc_w_platform') == "WebinarPortalFB"){
                    echo "Webinar Portal FB"; exit;
                }
            }
            elseif($this->input->post('wc_w_event')=="MockRun"){
                echo 'wc_w_event'; exit;
                if($this->input->post('wc_w_platform') == "ZoomMeeting"){
                    echo "Zoom Meeting"; exit;
                }
                elseif($this->input->post('wc_w_platform') == "YouTubeStreaming"){
                    echo "YouTube Streaming"; exit;
                }
                elseif($this->input->post('wc_w_platform') == "FacebookStreaming"){
                    echo "Facebook Streaming"; exit;
                }
                elseif($this->input->post('wc_w_platform') == "WebinarPortal"){
                    echo "Webinar Portal"; exit;
                }
                elseif($this->input->post('wc_w_platform') == "WebinarPortalFB"){
                    echo "Webinar Portal FB"; exit;
                }
            }
            elseif($this->input->post('wc_w_event')=="Postpone"){
                echo "Postpone"; exit;
            }
            elseif($this->input->post('wc_w_event')=="Prepone"){
                echo "Prepone"; exit;
            }
            elseif($this->input->post('wc_w_event')=="Cancelled"){
                echo "Cancelled"; exit;
            }
            elseif($this->input->post('wc_w_event')=="Changes"){
                echo "Changes"; exit;
            }
            elseif($this->input->post('wc_w_event')=="InvitationUpdate"){
                echo "InvitationUpdate"; exit;
            }
            else{
                
            }
            
            echo "Done"; exit;
		}
	   	
		$this->load->view('request_event', $data);
	}
	public function get_organizer(){
	    //echo "<pre>"; print_r($_POST); exit;
	    
	    $tableA = 'wc_division_organizers';
		$tableB = 'wc_users';
		$key1 = 'wc_u_code';
		$key2 = 'wc_u_code';
		$tableC = 'wc_divisions';
		$key3 = 'wc_di_code';
		$key4 = 'wc_di_code';
		$tableD = '';
		$key5 = '';
		$key6 = '';
		$tableE = '';
		$key7 = '';
		$key8 = '';
		$tableF= '';
		$key9 = '';
		$key10 = '';
		$tableG= '';
		$key11 = '';
		$key12 = '';
		$getdata = 'B.wc_u_code,B.wc_u_display_name';
		$groupBy ='';
        $where = 'A.wc_do_status = "1001" AND B.wc_u_status = "1001" AND A.wc_di_code = "'.$this->input->post('wc_di_code').'"';
		//$where = '';
		$data = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', '', '', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy);
	    //echo "<pre>"; print_r($data); exit;
	    echo json_encode($data);
	}
	public function events(){
	    $data = array();
		date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		$data['active'] = 'events';
		
		//echo "Welcome"; exit;
		
		$tableA = 'wc_events';
		$tableB = 'wc_divisions';
		$key1 = 'wc_di_code';
		$key2 = 'wc_di_code';
		$tableC = 'wc_events_settings'; //wc_enroll_webinar
		$key3 = 'wc_w_event_code'; //wc_w_event_code
		$key4 = 'wc_w_event_code'; //wc_w_event_code
		$tableD = '';
		$key5 = '';
		$key6 = '';
		$tableE = '';
		$key7 = '';
		$key8 = '';
		$tableF= '';
		$key9 = '';
		$key10 = '';
		$tableG= '';
		$key11 = '';
		$key12 = '';
		$getdata = 'A.*, B.*,C.*'; //, COUNT(C.wc_w_event_code) AS total_enrollment
		$groupBy = '';
		//$where = 'wc_w_status = "NEW_REQUEST"';
		if($this->input->post('search')){
		  //  echo "search"; exit;
		    //echo "<pre>"; print_r($_POST); exit;
    		$conditions = [];
    		if ($this->input->post('daterange')) {
    		  //  echo "daterange"; exit;
                $daterange = $this->input->post('daterange');
                
                
                list($start, $end) = explode(" - ", $daterange);
                // Convert to MySQL format if input is DD/MM/YYYY
                $start = date('Y-m-d', strtotime($start));
                $end   = date('Y-m-d', strtotime($end));
                $from = $start . " 00:00:00";
                $to   = $end . " 23:59:59";
                
                $data['date_from'] = $from;
                $data['date_to'] = $to;
                
                $conditions[] = "A.created_on BETWEEN '$from' AND '$to'";
                
            }

            if (!empty($this->input->post('wc_di_code'))) {
    		  //  echo "wc_di_code"; exit;
                //Get division info
		        $where = 'wc_di_code = "'.$this->input->post('wc_di_code').'"';
	            $data['diviusioinfo'] = $this->Home_model->getData('db', 'wc_divisions', 'wc_di_name', $where, '', '', '', '');
	            //echo "<pre>"; print_r($data['diviusioinfo']); exit;
                
                $data['wc_di_code'] = $this->input->post('wc_di_code');
		        $data['wc_di_name'] = $data['diviusioinfo'][0]['wc_di_name'];

                $divisionslist = $this->input->post('wc_di_code');
                $conditions[] = "A.wc_di_code = '$divisionslist'";
            }
            if (!empty($this->input->post('wc_u_code'))) {
    		  //  echo "wc_u_code"; exit;
                //Get division info
		        $where = 'wc_u_code = "'.$this->input->post('wc_u_code').'"';
	            $data['organizerlistinfo'] = $this->Home_model->getData('db', 'wc_users', 'wc_u_display_name', $where, '', '', '', '');
	           // echo "<pre>"; print_r($data['organizerlistinfo']); exit;
                
                $data['wc_u_code'] = $this->input->post('wc_u_code');
		        $data['wc_u_display_name'] = $data['organizerlistinfo'][0]['wc_u_display_name'];

                $organizerlist = $this->input->post('wc_u_code');
                $conditions[] = "A.wc_w_organizer_code = '$organizerlist'";
            }
            if (!empty($this->input->post('wc_u_code_technician'))) {
    		  //  echo "techniciansinfo"; exit;
                //Get division info
		        $where = 'wc_u_code = "'.$this->input->post('wc_u_code_technician').'"';
	            $data['techniciansinfo'] = $this->Home_model->getData('db', 'wc_users', 'wc_u_display_name', $where, '', '', '', '');
	           // echo "<pre>"; print_r($data['techniciansinfo']); exit;
                
                $data['wc_u_code_technician'] = $this->input->post('wc_u_code_technician');
		        $data['wc_u_display_name_technician'] = $data['techniciansinfo'][0]['wc_u_display_name'];

                $technicians = $this->input->post('wc_u_code_technician');
                //print_r($technicians); exit;
                $conditions[] = "A.wc_t_technician_code = '$technicians'";
            }
            if (!empty($this->input->post('wc_w_release_details'))) {
    		  //  echo "wc_w_release_details"; exit;
                $data['wc_w_release_details'] = $this->input->post('wc_w_release_details');

                $release_details = $this->input->post('wc_w_release_details');
                // print_r($release_details); exit;
                $conditions[] = "A.wc_w_release_details = '$release_details'";
            }
            if (!empty($this->input->post('wc_w_hosting_details'))) {
    		  //  echo "wc_w_hosting_details"; exit;
                $data['wc_w_hosting_details'] = $this->input->post('wc_w_hosting_details');

                $wc_w_hosting_details = $this->input->post('wc_w_hosting_details');
                //print_r($wc_w_hosting_details); exit;
                $conditions[] = "A.wc_w_hosting_details = '$wc_w_hosting_details'";
            }
            if (!empty($this->input->post('wc_w_video_backup_details'))) {
    		  //  echo "wc_w_video_backup_details"; exit;
                $data['wc_w_video_backup_details'] = $this->input->post('wc_w_video_backup_details');

                $wc_w_video_backup_details = $this->input->post('wc_w_video_backup_details');
                //print_r($technicians); exit;
                $conditions[] = "A.wc_w_video_backup_details = '$wc_w_video_backup_details'";
            }
    		$this->data = implode(' AND ', $conditions);
    		$where = $this->data;
    // 		print_r($where); exit;
		}
		else{
		    $this->data = '';
		    $where = '';
		}
		
		$data['requests'] = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', '', '', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy);
		//echo "<pre>"; print_r($data['requests']); exit;
		
		
		
		$getdata = '*';
    	$where = 'wc_di_status = "1001"';
    	$data['divisionslist'] = $this->Home_model->getData('db', 'wc_divisions', $getdata,  $where,'','','','');
    	//echo "<pre>"; print_r($data['divisionslist']); exit;
    	
    	$getdata = '*';
    	$where = 'wc_u_type = "Technician" AND wc_u_status = "1001" AND wc_u_email_verified_status = "1001" AND wc_u_phone_verified_status = "1001"';
    	$data['technicians'] = $this->Home_model->getData('db', 'wc_users', $getdata,  $where,'','','','');
    // 	echo "<pre>"; print_r($data['technicians']); exit;
    
    	
    	$getdata = '*';
    	$where = 'wc_u_type = "Organizer"';
    	$data['organizerlist'] = $this->Home_model->getData('db', 'wc_users', $getdata,  $where,'','','','');
    // 	echo "<pre>"; print_r($data['organizerlist']); exit;

        if($this->input->post('webinar_platform_create')){
            // echo "<pre>"; print_r($_POST); exit;
            
            //Get webinar info
    		$getdata = '*';
        	$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
        	$data['webinarinfo'] = $this->Home_model->getData('db', 'wc_events', $getdata,  $where,'','','','');
        	//echo "<pre>"; print_r($data['webinarinfo']); exit;
            
            $wc_w_event_code = $this->input->post('wc_w_event_code');
            
            //Create and check webinar url
            $webinarurl_text = $data['webinarinfo'][0]['wc_w_topic'];
            $webinarurl_text2 = strtolower(preg_replace('/[^A-Za-z0-9 ]/', '', $webinarurl_text));
            $webinarurl_text3 = str_replace(' ', '-', $webinarurl_text2);
            $webinarurl_text4 = str_replace('---', '-', $webinarurl_text3);
            $webinar_folder = trim(str_replace('--', '-', $webinarurl_text4));
            //echo $webinar_folder; exit;
            
            //Check webinar url
            $getdata = '';
        	$where = 'wc_w_platform_url  = "'.$webinar_folder.'"';
        	$data['checkwebinarurl'] = $this->Home_model->getData('db', 'wc_events', $getdata,  $where,'','','','');
        	//echo "<pre>"; print_r($data['checkwebinarurl']); exit;
        	
            if(!empty($data['checkwebinarurl'])){
                echo "Webinar url was duplicated, please contact administrator."; exit;
            }
            else{
                //echo "Webinar url was not duplicated."; //exit;
                //Create plotform folders
                $baseDirectory  = $webinar_folder.'/'; //'../'.$webinar_folder.'/';
                //echo $baseDirectory; //exit;
                $subDirectory = ['uploads', 'assets/css', 'assets/img', 'assets/js', 'assets/empire/css', 'assets/empire/fonts', 'assets/empire/img', 'assets/empire/js', 'application/cache', 'application/config', 'application/controllers', 'application/core', 'application/helpers', 'application/hooks', 'application/language/english', 'application/libraries', 'application/libraries/controllers', 'application/logs', 'application/models', 'application/third_party', 'application/views/themes/empire/layout', 'system/libraries/Cache/drivers', 'system/libraries/Javascript', 'system/libraries/Session/drivers', 'system/language/english', 'system/helpers', 'system/fonts', 'system/core/compat', 'system/database/drivers/cubrid', 'system/database/drivers/ibase', 'system/database/drivers/mssql', 'system/database/drivers/mysql', 'system/database/drivers/mysqli', 'system/database/drivers/oci8', 'system/database/drivers/odbc', 'system/database/drivers/pdo/subdrivers', 'system/database/drivers/postgre', 'system/database/drivers/sqlite', 'system/database/drivers/sqlite3', 'system/database/drivers/sqlsrv'];
                foreach ($subDirectory as $DirectoryName) {
                    $SubNameDirectory = $baseDirectory . $DirectoryName;
                    
                    if (!is_dir($SubNameDirectory)) {
                        if(mkdir($SubNameDirectory, 0777, true)) {
                            //echo "Folder for $DirectoryName driver created successfully!<br>";
                        } else {
                            //echo "Failed to create folder for $DirectoryName driver.<br>";
                        }
                    } else {
                        //echo "Folder for $DirectoryName driver already exists.<br>";
                    }
                }
                
                $directories = [
                    ["plotform/webinar_plotform/mainroot/", "$webinar_folder/"],
                    ["plotform/webinar_plotform_assets/css/", "$webinar_folder/assets/css/"],
                    ["plotform/webinar_plotform_assets/img/", "$webinar_folder/assets/img/"],
                    ["plotform/webinar_plotform_assets/js/", "$webinar_folder/assets/js/"],
                    ["plotform/webinar_plotform/application/mainroot/", "$webinar_folder/application/"],
                    ["plotform/webinar_plotform/application/cache/", "$webinar_folder/application/cache/"],
                    ["plotform/webinar_plotform/application/config/", "$webinar_folder/application/config/"],
                    ["plotform/webinar_plotform/application/controllers/", "$webinar_folder/application/controllers/"],
                    ["plotform/webinar_plotform/application/core/", "$webinar_folder/application/core/"],
                    ["plotform/webinar_plotform/application/helpers/", "$webinar_folder/application/helpers/"],
                    ["plotform/webinar_plotform/application/hooks/", "$webinar_folder/application/hooks/"],
                    ["plotform/webinar_plotform/application/language/mainroot/", "$webinar_folder/application/language/"],
                    ["plotform/webinar_plotform/application/language/english/", "$webinar_folder/application/language/english/"],
                    ["plotform/webinar_plotform/application/libraries/mainroot", "$webinar_folder/application/libraries/"],
                    ["plotform/webinar_plotform/application/libraries/controllers", "$webinar_folder/application/libraries/controllers/"],
                    ["plotform/webinar_plotform/application/logs/", "$webinar_folder/application/logs/"],
                    ["plotform/webinar_plotform/application/models/", "$webinar_folder/application/models/"],
                    ["plotform/webinar_plotform/application/third_party/", "$webinar_folder/application/third_party/"],
                    //["plotform/webinar_plotform/application/views/", "$webinar_folder/application/views/"],
                    ["plotform/webinar_plotform/system/mainroot/", "$webinar_folder/system/"],
                    ["plotform/webinar_plotform/system/core/mainroot/", "$webinar_folder/system/core/"],
                    ["plotform/webinar_plotform/system/core/compat/", "$webinar_folder/system/core/compat/"],
                    ["plotform/webinar_plotform/system/database/mainroot/", "$webinar_folder/system/database/"],
                    ["plotform/webinar_plotform/system/database/drivers/cubrid/", "$webinar_folder/system/database/drivers/cubrid/"],
                    ["plotform/webinar_plotform/system/database/drivers/ibase/", "$webinar_folder/system/database/drivers/ibase/"],
                    ["plotform/webinar_plotform/system/database/drivers/mssql/", "$webinar_folder/system/database/drivers/mssql/"],
                    ["plotform/webinar_plotform/system/database/drivers/mysql/", "$webinar_folder/system/database/drivers/mysql/"],
                    ["plotform/webinar_plotform/system/database/drivers/mysqli/", "$webinar_folder/system/database/drivers/mysqli/"],
                    ["plotform/webinar_plotform/system/database/drivers/oci8/", "$webinar_folder/system/database/drivers/oci8/"],
                    ["plotform/webinar_plotform/system/database/drivers/odbc/", "$webinar_folder/system/database/drivers/odbc/"],
                    ["plotform/webinar_plotform/system/database/drivers/pdo/mainroot/", "$webinar_folder/system/database/drivers/pdo/"],
                    ["plotform/webinar_plotform/system/database/drivers/pdo/subdrivers/", "$webinar_folder/system/database/drivers/pdo/subdrivers/"],
                    ["plotform/webinar_plotform/system/database/drivers/postgre/", "$webinar_folder/system/database/drivers/postgre/"],
                    ["plotform/webinar_plotform/system/database/drivers/sqlite/", "$webinar_folder/system/database/drivers/sqlite/"],
                    ["plotform/webinar_plotform/system/database/drivers/sqlite3/", "$webinar_folder/system/database/drivers/sqlite3/"],
                    ["plotform/webinar_plotform/system/database/drivers/sqlsrv/", "$webinar_folder/system/database/drivers/sqlsrv/"],
                    ["plotform/webinar_plotform/system/fonts/", "$webinar_folder/system/fonts/"],
                    ["plotform/webinar_plotform/system/helpers/", "$webinar_folder/system/helpers/"],
                    ["plotform/webinar_plotform/system/language/mainroot/", "$webinar_folder/system/language/"],
                    ["plotform/webinar_plotform/system/language/english/", "$webinar_folder/system/language/english/"],
                    ["plotform/webinar_plotform/system/libraries/mainroot/", "$webinar_folder/system/libraries/"],
                    ["plotform/webinar_plotform/system/libraries/Cache/mainroot/", "$webinar_folder/system/libraries/Cache/"],
                    ["plotform/webinar_plotform/system/libraries/Cache/drivers/", "$webinar_folder/system/libraries/Cache/drivers/"],
                    ["plotform/webinar_plotform/system/libraries/Javascript/", "$webinar_folder/system/libraries/Javascript/"],
                    ["plotform/webinar_plotform/system/libraries/Session/mainroot/", "$webinar_folder/system/libraries/Session/"],
                    ["plotform/webinar_plotform/system/libraries/Session/drivers/", "$webinar_folder/system/libraries/Session/drivers/"],
                    ["plotform/webinar_plotform_themes/empire/css/", "$webinar_folder/assets/empire/css/"],
                    ["plotform/webinar_plotform_themes/empire/fonts/", "$webinar_folder/assets/empire/fonts/"],
                    ["plotform/webinar_plotform_themes/empire/img/", "$webinar_folder/assets/empire/img/"],
                    ["plotform/webinar_plotform_themes/empire/js/", "$webinar_folder/assets/empire/js/"],
                    ["plotform/webinar_plotform_themes/empire/views/", "$webinar_folder/application/views/themes/empire/"],
                    ["plotform/webinar_plotform_themes/empire/layout/", "$webinar_folder/application/views/themes/empire/layout/"]
                ];
                foreach ($directories as $dir) {
                    $src = $dir[0];
                    $dst = $dir[1];
                    $this->custom_copy($src, $dst);
                }
                
                //Create .htaccess
                                $file_path = $webinar_folder."/.htaccess.txt";
                                $content = "RewriteEngine On
RewriteBase /".$webinar_folder."/
RewriteCond $1 !^(images|stylesheets|javascript)
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ /".$webinar_folder."/index.php/$1 [L]";
                                
                                if(write_file($file_path, $content)){
                                    //echo "The htaccess text file has been successfully generated";
                                    
                                    //Update htaccess filr name
                                    $current_file_path = $webinar_folder."/.htaccess.txt";
                                    $new_file_path = $webinar_folder."/.htaccess";
                                    if(rename($current_file_path, $new_file_path)){
                                        //echo "The .htaccess text file has been renamed and its format type has been changed to .htaccess";
                                        
                                        //Create custom_config.php
                                        $file_path_custom_config = $webinar_folder."/application/config/custom_config.php";
                                        $content_custom_config = "<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    \$config['wc_w_event_code'] = '$wc_w_event_code';
    ?>";
                                        if(write_file($file_path_custom_config, $content_custom_config)){
                                            // echo "The custom config file has been successfully created at the destination path, and the doctor key has been activated";
                                        }
                                    }
                                }
                
                //echo "Done"; exit;
                
                //echo "<pre>"; print_r($_POST); exit;
                $add_webinar_details = array(
                    'wc_w_release_details' => 'Pending',
        			'wc_w_platform_url' => $webinar_folder,
        			'wc_w_platform_details' => 'Created', 
        			'wc_w_platform_details_updated_by' => $this->session->userdata('wc_u_code'),
        			'wc_w_platform_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
        			'wc_tm_name' => 'empire',
        			'updated_by' => $this->session->userdata('wc_u_code'),
        			'updated_on' => $objDate->format('Y-m-d H:i:s')
        		);
        		//echo "<pre>"; print_r($add_webinar_details); exit;
        		$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
        		//print_r($where); exit;
        		$this->Home_model->updateData('db', 'wc_events', $add_webinar_details, $where);
        		
        		if($this->input->post('wc_ws_notifi_sender') == 'on'){ 
                    $wc_ws_notifi_sender = 'True'; 
                    $wc_ws_sms_sender = $this->input->post('wc_ws_sms_sender');
                    $wc_ws_email_sender = $this->input->post('wc_ws_email_sender');
                    $wc_ws_whatsapp_sender = $this->input->post('wc_ws_whatsapp_sender');
                    
                    if($this->input->post('wc_ws_sms_sender') != 'Not Required'){ $wc_ws_sms = 'True'; } else{ $wc_ws_sms = 'False'; }
                    if($this->input->post('wc_ws_email_sender') != 'Not Required'){ $wc_ws_email = 'True'; } else{ $wc_ws_email = 'False'; }
                    if($this->input->post('wc_ws_whatsapp_sender') != 'Not Required'){ $wc_ws_whatsapp = 'True'; } else{ $wc_ws_whatsapp = 'False'; }
                }
                else{ 
                    $wc_ws_notifi_sender = 'False';
                    $wc_ws_sms_sender = 'False';
                    $wc_ws_email_sender = 'False';
                    $wc_ws_whatsapp_sender = 'False';
                    $wc_ws_sms = 'False';
                    $wc_ws_email = 'False';
                    $wc_ws_whatsapp = 'False';
                }
                
                if($this->input->post('wc_ws_login_type') == 'Mobile'){
                    $wc_ws_re_mobile = 'True';
                    if(!empty($this->input->post('wc_ws_re_email'))) { $wc_ws_re_email = $this->input->post('wc_ws_re_email'); } else{ $wc_ws_re_email = 'False'; }
                    
                }
                elseif($this->input->post('wc_ws_login_type') == 'Email'){
                    if(!empty($this->input->post('wc_ws_re_mobile'))) { $wc_ws_re_mobile = $this->input->post('wc_ws_re_mobile'); } else{ $wc_ws_re_mobile = 'False'; }
                    $wc_ws_re_email = 'True';
                }
                elseif($this->input->post('wc_ws_login_type') == 'Username'){
                    if(!empty($this->input->post('wc_ws_re_mobile'))) { $wc_ws_re_mobile = $this->input->post('wc_ws_re_mobile'); } else{ $wc_ws_re_mobile = 'False'; }
                    if(!empty($this->input->post('wc_ws_re_email'))) { $wc_ws_re_email = $this->input->post('wc_ws_re_email'); } else{ $wc_ws_re_email = 'False'; }
                }
                
                if($this->input->post('wc_ws_re_name') == 'on'){ $wc_ws_re_name = 'True'; } else{ $wc_ws_re_name = 'False'; }
                if($this->input->post('wc_ws_re_speciality') == 'on'){ $wc_ws_re_speciality = 'True'; } else{ $wc_ws_re_speciality = 'False'; }
                if($this->input->post('wc_ws_re_mci_number') == 'on'){ $wc_ws_re_mci = 'True'; } else{ $wc_ws_re_mci = 'False'; }
                if($this->input->post('wc_ws_re_location') == 'on'){ $wc_ws_re_location = 'True'; } else{ $wc_ws_re_location = 'False'; }
                
                //Update
                
                $update_webinar_details_settings = array(
                    'wc_ws_login_type' => $this->input->post('wc_ws_login_type'),
        			'wc_ws_login_authentication' => $this->input->post('wc_ws_login_authentication'),
        			'wc_ws_company' => $this->input->post('wc_ws_company'),
        			'wc_ws_notifi_sender' => $wc_ws_notifi_sender,
        			'wc_ws_sms' => $wc_ws_sms,
        			'wc_ws_email' => $wc_ws_email,
        			'wc_ws_whatsapp' => $wc_ws_whatsapp,
        			'wc_ws_sms_sender' => $wc_ws_sms_sender,
        			'wc_ws_email_sender' => $wc_ws_email_sender,
        			'wc_ws_whatsapp_sender' => $wc_ws_whatsapp_sender,
        			'wc_ws_re_name' => $wc_ws_re_name,
        			'wc_ws_re_email' => $wc_ws_re_email,
        			'wc_ws_re_mobile' => $wc_ws_re_mobile,
        			'wc_ws_re_mci' => $wc_ws_re_mci,
        			'wc_ws_re_speciality' => $wc_ws_re_speciality,
        			'wc_ws_re_location' => $wc_ws_re_location,
        			'wc_tm_name' => 'empire',
        			'wc_ws_updated_by' => $this->session->userdata('wc_u_code'),
        			'wc_ws_updated_on' => $objDate->format('Y-m-d H:i:s')
        		);
        		//echo "<pre>"; print_r($update_webinar_details_settings); exit;
        		$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
        		//print_r($where); exit;
        		$this->Home_model->updateData('db', 'wc_events_settings', $update_webinar_details_settings, $where);

        		//Get webinar info
        		$getdata = '*';
            	$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
            	$data['webinarinfo'] = $this->Home_model->getData('db', 'wc_events', $getdata,  $where,'','','','');
            	//echo "<pre>"; print_r($data['webinarinfo']); //exit;
    	
        		//Update webinar_history
        		/*$add_webinar_history_log = array(
        		    'wc_w_id' => $data['webinarinfo'][0]['wc_w_id'],
                    'wc_w_code' => $data['webinarinfo'][0]['wc_w_code'],
                    'wc_w_topic' => $data['webinarinfo'][0]['wc_w_topic'],
                    'wc_w_subtitle' => $data['webinarinfo'][0]['wc_w_subtitle'],
                    'wc_w_description' => $data['webinarinfo'][0]['wc_w_description'],
                    'wc_w_date' => $data['webinarinfo'][0]['wc_w_date'],
                    'wc_w_stime' => $data['webinarinfo'][0]['wc_w_stime'],
                    'wc_w_etime' => $data['webinarinfo'][0]['wc_w_etime'],
                    'wc_d_code' => $data['webinarinfo'][0]['wc_d_code'],
                    'wc_w_requester' => $data['webinarinfo'][0]['wc_w_requester'],
                    'wc_s_code_lead' => $data['webinarinfo'][0]['wc_s_code_lead'],
                    'wc_s_code_guest' => $data['webinarinfo'][0]['wc_s_code_guest'],
                    'wc_s_code_primary' => $data['webinarinfo'][0]['wc_s_code_primary'],
                    'wc_s_code_secondary' => $data['webinarinfo'][0]['wc_s_code_secondary'],
                    'wc_w_platform' => $data['webinarinfo'][0]['wc_w_platform'],
                    'wc_w_invitation_create_check' => $data['webinarinfo'][0]['wc_w_invitation_create_check'],
                    'wc_w_invitation' => $data['webinarinfo'][0]['wc_w_invitation'],
                    'wc_reason_for_update' => 'Webinar platform created',
                    'wc_w_notes' => $data['webinarinfo'][0]['wc_w_notes'],
                    'wc_w_technician_details' => $data['webinarinfo'][0]['wc_w_technician_details'],
                    'wc_t_code' => $data['webinarinfo'][0]['wc_t_code'],
        			'wc_w_zoom_details' => $data['webinarinfo'][0]['wc_w_zoom_details'],
        			'wc_w_zoom_link' => $data['webinarinfo'][0]['wc_w_zoom_link'],
        			'wc_w_zoom_id' => $data['webinarinfo'][0]['wc_w_zoom_id'],
        			'wc_w_zoom_passcode' => $data['webinarinfo'][0]['wc_w_zoom_passcode'],
                    'wc_w_youtube_details' => $data['webinarinfo'][0]['wc_w_youtube_details'],
                    'wc_w_streaming_link' => $data['webinarinfo'][0]['wc_w_streaming_link'],
                    'wc_w_custom_platform_details' => '1001',
                    'wc_w_custom_platform_url' => $webinar_folder,
                    'wc_w_release_details' => $data['webinarinfo'][0]['wc_w_release_details'],
                    'wc_w_status' => $data['webinarinfo'][0]['wc_w_status'],
                    'wc_w_technician_details_updated_by' => $data['webinarinfo'][0]['wc_w_zoom_details_updated_by'],
                    'wc_w_technician_details_updated_on' => $data['webinarinfo'][0]['wc_w_zoom_details_updated_on'],
                    'wc_w_zoom_details_updated_by' => $data['webinarinfo'][0]['wc_w_zoom_details_updated_by'],
        			'wc_w_zoom_details_updated_on' => $data['webinarinfo'][0]['wc_w_zoom_details_updated_on'],
                    'wc_w_youtube_details_updated_by' => $data['webinarinfo'][0]['wc_w_youtube_details_updated_by'],
                    'wc_w_youtube_details_updated_on' => $data['webinarinfo'][0]['wc_w_youtube_details_updated_on'],
                    'wc_w_platform_details_updated_by' => $this->input->post('wc_u_code'),
                    'wc_w_platform_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
                    'wc_w_release_details_updated_by' => $data['webinarinfo'][0]['wc_w_release_details_updated_by'],
                    'wc_w_release_details_updated_on' => $data['webinarinfo'][0]['wc_w_release_details_updated_on'],
                    'wc_w_created_by' => $data['webinarinfo'][0]['wc_w_created_by'],
                    'wc_w_created_on' => $data['webinarinfo'][0]['wc_w_created_on'],
        			'wc_w_updated_by' => $this->input->post('wc_u_code'),
        			'wc_w_updated_on' => $objDate->format('Y-m-d H:i:s')
        		);*/
        		//echo "<pre>"; print_r($add_webinar_history_log); exit;
        		//$insert_webinar_history_log = $this->Home_model->insertData('db', 'wc_webinar_history', $add_webinar_history_log);
        		
        		redirect('events');
            }
        }
        elseif($this->input->post('add_zoom_details')){
            //echo "<pre>"; print_r($_POST); exit;
            $add_zoom_details = array(
    			'wc_w_zoom_link' => $this->input->post('wc_w_zoom_link'),
    			'wc_w_zoom_id' => $this->input->post('wc_w_zoom_id'),
    			'wc_w_zoom_passcode' => $this->input->post('wc_w_zoom_passcode'),
    			'wc_w_zoom_details' => 'Updated',
    			'wc_w_zoom_details_updated_by' => $this->session->userdata('wc_u_code'),
    			'wc_w_zoom_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
    			'updated_by' => $this->session->userdata('wc_u_code'),
    			'updated_on' => $objDate->format('Y-m-d H:i:s')
    		);
    		// echo "<pre>"; print_r($add_zoom_details); exit;
    		$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
    		//print_r($where); exit;
    		$this->Home_model->updateData('db', 'wc_events', $add_zoom_details, $where);
    		
    		//Get webinar info
    		$getdata = '*';
        	$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
        	$data['webinarinfo'] = $this->Home_model->getData('db', 'wc_events', $getdata,  $where,'','','','');
        	//echo "<pre>"; print_r($data['webinarinfo']); exit;
    	
    		//Update webinar_history
    		/*$add_webinar_history_log = array(
    		    'wc_w_id' => $data['webinarinfo'][0]['wc_w_id'],
                'wc_w_code' => $data['webinarinfo'][0]['wc_w_code'],
                'wc_w_topic' => $data['webinarinfo'][0]['wc_w_topic'],
                'wc_w_subtitle' => $data['webinarinfo'][0]['wc_w_subtitle'],
                'wc_w_description' => $data['webinarinfo'][0]['wc_w_description'],
                'wc_w_date' => $data['webinarinfo'][0]['wc_w_date'],
                'wc_w_stime' => $data['webinarinfo'][0]['wc_w_stime'],
                'wc_w_etime' => $data['webinarinfo'][0]['wc_w_etime'],
                'wc_d_code' => $data['webinarinfo'][0]['wc_d_code'],
                'wc_w_requester' => $data['webinarinfo'][0]['wc_w_requester'],
                'wc_s_code_lead' => $data['webinarinfo'][0]['wc_s_code_lead'],
                'wc_s_code_guest' => $data['webinarinfo'][0]['wc_s_code_guest'],
                'wc_s_code_primary' => $data['webinarinfo'][0]['wc_s_code_primary'],
                'wc_s_code_secondary' => $data['webinarinfo'][0]['wc_s_code_secondary'],
                'wc_w_platform' => $data['webinarinfo'][0]['wc_w_platform'],
                'wc_w_invitation_create_check' => $data['webinarinfo'][0]['wc_w_invitation_create_check'],
                'wc_w_invitation' => $data['webinarinfo'][0]['wc_w_invitation'],
                'wc_reason_for_update' => 'Zoom details update',
                'wc_w_notes' => $data['webinarinfo'][0]['wc_w_notes'],
                'wc_w_technician_details' => $data['webinarinfo'][0]['wc_w_technician_details'],
                'wc_t_code' => $data['webinarinfo'][0]['wc_t_code'],
    			'wc_w_zoom_details' => '1001',
    			'wc_w_zoom_link' => $this->input->post('wc_w_zoom_link'),
    			'wc_w_zoom_id' => $this->input->post('wc_w_zoom_id'),
    			'wc_w_zoom_passcode' => $this->input->post('wc_w_zoom_passcode'),
                'wc_w_youtube_details' => $data['webinarinfo'][0]['wc_w_youtube_details'],
                'wc_w_streaming_link' => $this->input->post('wc_w_streaming_link'),
                'wc_w_custom_platform_details' => $data['webinarinfo'][0]['wc_w_custom_platform_details'],
                'wc_w_custom_platform_url' => $data['webinarinfo'][0]['wc_w_custom_platform_url'],
                'wc_w_release_details' => $data['webinarinfo'][0]['wc_w_release_details'],
                'wc_w_status' => $data['webinarinfo'][0]['wc_w_status'],
                'wc_w_technician_details_updated_by' => $data['webinarinfo'][0]['wc_w_technician_details_updated_by'],
                'wc_w_technician_details_updated_on' => $data['webinarinfo'][0]['wc_w_technician_details_updated_on'],
                'wc_w_zoom_details_updated_by' => $this->input->post('wc_u_code'),
    			'wc_w_zoom_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
                'wc_w_youtube_details_updated_by' => $data['webinarinfo'][0]['wc_w_youtube_details_updated_by'],
                'wc_w_youtube_details_updated_on' => $data['webinarinfo'][0]['wc_w_youtube_details_updated_on'],
                'wc_w_platform_details_updated_by' => $data['webinarinfo'][0]['wc_w_platform_details_updated_by'],
                'wc_w_platform_details_updated_on' => $data['webinarinfo'][0]['wc_w_platform_details_updated_on'],
                'wc_w_release_details_updated_by' => $data['webinarinfo'][0]['wc_w_release_details_updated_by'],
                'wc_w_release_details_updated_on' => $data['webinarinfo'][0]['wc_w_release_details_updated_on'],
                'wc_w_created_by' => $data['webinarinfo'][0]['wc_w_created_by'],
                'wc_w_created_on' => $data['webinarinfo'][0]['wc_w_created_on'],
    			'wc_w_updated_by' => $this->input->post('wc_u_code'),
    			'wc_w_updated_on' => $objDate->format('Y-m-d H:i:s')
    		);*/
    		//echo "<pre>"; print_r($add_webinar_history_log); //exit;
    		//$insert_webinar_history_log = $this->Home_model->insertData('db', 'wc_webinar_history', $add_webinar_history_log);
    		//echo 'Done'; exit;
    		redirect('events');
        }
        elseif($this->input->post('add_youtube_details')){
            //echo "<pre>"; print_r($_POST); exit;
            $add_youtube_details = array(
    			'wc_w_streaming_link' => $this->input->post('wc_w_streaming_link'),
    			'wc_w_youtube_details' => 'Updated',
    			'wc_w_youtube_details_updated_by' => $this->session->userdata('wc_u_code'),
    			'wc_w_youtube_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
    			'updated_by' => $this->session->userdata('wc_u_code'),
    			'updated_on' => $objDate->format('Y-m-d H:i:s')
    		);
    		//echo "<pre>"; print_r($add_youtube_details); exit;
    		$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
    		$this->Home_model->updateData('db', 'wc_events', $add_youtube_details, $where);
    		
    		//Get webinar info
    		$getdata = '*';
        	$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
        	$data['webinarinfo'] = $this->Home_model->getData('db', 'wc_events', $getdata,  $where,'','','','');
        	//echo "<pre>"; print_r($data['webinarinfo']); //exit;
    	
    		//Update webinar_history
    		/*$add_webinar_history_log = array(
    		    'wc_w_id' => $data['webinarinfo'][0]['wc_w_id'],
                'wc_w_code' => $data['webinarinfo'][0]['wc_w_code'],
                'wc_w_topic' => $data['webinarinfo'][0]['wc_w_topic'],
                'wc_w_subtitle' => $data['webinarinfo'][0]['wc_w_subtitle'],
                'wc_w_description' => $data['webinarinfo'][0]['wc_w_description'],
                'wc_w_date' => $data['webinarinfo'][0]['wc_w_date'],
                'wc_w_stime' => $data['webinarinfo'][0]['wc_w_stime'],
                'wc_w_etime' => $data['webinarinfo'][0]['wc_w_etime'],
                'wc_d_code' => $data['webinarinfo'][0]['wc_d_code'],
                'wc_w_requester' => $data['webinarinfo'][0]['wc_w_requester'],
                'wc_s_code_lead' => $data['webinarinfo'][0]['wc_s_code_lead'],
                'wc_s_code_guest' => $data['webinarinfo'][0]['wc_s_code_guest'],
                'wc_s_code_primary' => $data['webinarinfo'][0]['wc_s_code_primary'],
                'wc_s_code_secondary' => $data['webinarinfo'][0]['wc_s_code_secondary'],
                'wc_w_platform' => $data['webinarinfo'][0]['wc_w_platform'],
                'wc_w_invitation_create_check' => $data['webinarinfo'][0]['wc_w_invitation_create_check'],
                'wc_w_invitation' => $data['webinarinfo'][0]['wc_w_invitation'],
                'wc_reason_for_update' => 'YouTube details update',
                'wc_w_notes' => $data['webinarinfo'][0]['wc_w_notes'],
                'wc_w_technician_details' => $data['webinarinfo'][0]['wc_w_technician_details'],
                'wc_t_code' => $data['webinarinfo'][0]['wc_t_code'],
    			'wc_w_zoom_details' => $data['webinarinfo'][0]['wc_w_zoom_details'],
    			'wc_w_zoom_link' => $data['webinarinfo'][0]['wc_w_zoom_link'],
    			'wc_w_zoom_id' => $data['webinarinfo'][0]['wc_w_zoom_id'],
    			'wc_w_zoom_passcode' => $data['webinarinfo'][0]['wc_w_zoom_passcode'],
                'wc_w_youtube_details' => '1001',
                'wc_w_streaming_link' => $this->input->post('wc_w_streaming_link'),
                'wc_w_custom_platform_details' => $data['webinarinfo'][0]['wc_w_custom_platform_details'],
                'wc_w_custom_platform_url' => $data['webinarinfo'][0]['wc_w_custom_platform_url'],
                'wc_w_release_details' => $data['webinarinfo'][0]['wc_w_release_details'],
                'wc_w_status' => $data['webinarinfo'][0]['wc_w_status'],
                'wc_w_technician_details_updated_by' => $data['webinarinfo'][0]['wc_w_technician_details_updated_by'],
                'wc_w_technician_details_updated_on' => $data['webinarinfo'][0]['wc_w_technician_details_updated_on'],
                'wc_w_zoom_details_updated_by' => $data['webinarinfo'][0]['wc_w_zoom_details_updated_by'],
    			'wc_w_zoom_details_updated_on' => $data['webinarinfo'][0]['wc_w_zoom_details_updated_on'],
                'wc_w_youtube_details_updated_by' => $this->input->post('wc_u_code'),
                'wc_w_youtube_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
                'wc_w_platform_details_updated_by' => $data['webinarinfo'][0]['wc_w_platform_details_updated_by'],
                'wc_w_platform_details_updated_on' => $data['webinarinfo'][0]['wc_w_platform_details_updated_on'],
                'wc_w_release_details_updated_by' => $data['webinarinfo'][0]['wc_w_release_details_updated_by'],
                'wc_w_release_details_updated_on' => $data['webinarinfo'][0]['wc_w_release_details_updated_on'],
                'wc_w_created_by' => $data['webinarinfo'][0]['wc_w_created_by'],
                'wc_w_created_on' => $data['webinarinfo'][0]['wc_w_created_on'],
    			'wc_w_updated_by' => $this->input->post('wc_u_code'),
    			'wc_w_updated_on' => $objDate->format('Y-m-d H:i:s')
    		);*/
    		//echo "<pre>"; print_r($add_webinar_history_log); //exit;
    		//$insert_webinar_history_log = $this->Home_model->insertData('db', 'wc_webinar_history', $add_webinar_history_log);
    		//echo 'Done'; exit;
    		redirect('events');
        }
        elseif($this->input->post('add_technician_details')){
            //echo "<pre>"; print_r($_POST); exit;
            
            $getdata = '*';
        	$where = 'wc_u_code = "'.$this->input->post('wc_t_technician_code').'"';
        	$data['technicians_info'] = $this->Home_model->getData('db', 'wc_users', $getdata,  $where,'','','','');
        	//echo "<pre>"; print_r($data['technicians_info']); exit;
            
            $add_technician_details = array(
    			'wc_t_technician_code' => $this->input->post('wc_t_technician_code'),
    			'wc_t_technician_name' => $data['technicians_info'][0]['wc_u_display_name'],
    			'wc_w_technician_details' => 'Updated',
    			'wc_w_technician_details_updated_by' => $this->session->userdata('wc_u_code'),
                'wc_w_technician_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
    			'updated_by' => $this->session->userdata('wc_u_code'),
    			'updated_on' => $objDate->format('Y-m-d H:i:s')
    		);
    		//echo "<pre>"; print_r($add_technician_details); exit;
    		$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
    		$this->Home_model->updateData('db', 'wc_events', $add_technician_details, $where);
    		
    		//Get webinar info
    		$getdata = '*';
        	$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
        	$data['webinarinfo'] = $this->Home_model->getData('db', 'wc_events', $getdata,  $where,'','','','');
        	//echo "<pre>"; print_r($data['webinarinfo']); //exit;
    	
    		//Update webinar_history
    		/*$add_webinar_history_log = array(
    		    'wc_w_id' => $data['webinarinfo'][0]['wc_w_id'],
                'wc_w_code' => $data['webinarinfo'][0]['wc_w_code'],
                'wc_w_topic' => $data['webinarinfo'][0]['wc_w_topic'],
                'wc_w_subtitle' => $data['webinarinfo'][0]['wc_w_subtitle'],
                'wc_w_description' => $data['webinarinfo'][0]['wc_w_description'],
                'wc_w_date' => $data['webinarinfo'][0]['wc_w_date'],
                'wc_w_stime' => $data['webinarinfo'][0]['wc_w_stime'],
                'wc_w_etime' => $data['webinarinfo'][0]['wc_w_etime'],
                'wc_d_code' => $data['webinarinfo'][0]['wc_d_code'],
                'wc_w_requester' => $data['webinarinfo'][0]['wc_w_requester'],
                'wc_s_code_lead' => $data['webinarinfo'][0]['wc_s_code_lead'],
                'wc_s_code_guest' => $data['webinarinfo'][0]['wc_s_code_guest'],
                'wc_s_code_primary' => $data['webinarinfo'][0]['wc_s_code_primary'],
                'wc_s_code_secondary' => $data['webinarinfo'][0]['wc_s_code_secondary'],
                'wc_w_platform' => $data['webinarinfo'][0]['wc_w_platform'],
                'wc_w_invitation_create_check' => $data['webinarinfo'][0]['wc_w_invitation_create_check'],
                'wc_w_invitation' => $data['webinarinfo'][0]['wc_w_invitation'],
                'wc_reason_for_update' => 'Technician details updated',
                'wc_w_notes' => $data['webinarinfo'][0]['wc_w_notes'],
                'wc_w_technician_details' => '1001',
                'wc_t_code' => $this->input->post('wc_t_code'),
    			'wc_w_zoom_details' => $data['webinarinfo'][0]['wc_w_zoom_details'],
    			'wc_w_zoom_link' => $data['webinarinfo'][0]['wc_w_zoom_link'],
    			'wc_w_zoom_id' => $data['webinarinfo'][0]['wc_w_zoom_id'],
    			'wc_w_zoom_passcode' => $data['webinarinfo'][0]['wc_w_zoom_passcode'],
                'wc_w_youtube_details' => $data['webinarinfo'][0]['wc_w_youtube_details'],
                'wc_w_streaming_link' => $data['webinarinfo'][0]['wc_w_streaming_link'],
                'wc_w_custom_platform_details' => $data['webinarinfo'][0]['wc_w_custom_platform_details'],
                'wc_w_custom_platform_url' => $data['webinarinfo'][0]['wc_w_custom_platform_url'],
                'wc_w_release_details' => '1001',
                'wc_w_technician_details_updated_by' => $this->input->post('wc_u_code'),
                'wc_w_technician_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
                'wc_w_zoom_details_updated_by' => $data['webinarinfo'][0]['wc_w_zoom_details_updated_by'],
    			'wc_w_zoom_details_updated_on' => $data['webinarinfo'][0]['wc_w_zoom_details_updated_on'],
                'wc_w_youtube_details_updated_by' => $data['webinarinfo'][0]['wc_w_youtube_details_updated_by'],
                'wc_w_youtube_details_updated_on' => $data['webinarinfo'][0]['wc_w_youtube_details_updated_on'],
                'wc_w_platform_details_updated_by' => $data['webinarinfo'][0]['wc_w_platform_details_updated_by'],
                'wc_w_platform_details_updated_on' => $data['webinarinfo'][0]['wc_w_platform_details_updated_on'],
                'wc_w_release_details_updated_by' => $data['webinarinfo'][0]['wc_w_release_details_updated_by'],
                'wc_w_release_details_updated_on' => $data['webinarinfo'][0]['wc_w_release_details_updated_on'],
                'wc_w_status' => $data['webinarinfo'][0]['wc_w_status'],
                'wc_w_created_by' => $data['webinarinfo'][0]['wc_w_created_by'],
                'wc_w_created_on' => $data['webinarinfo'][0]['wc_w_created_on'],
    			'wc_w_updated_by' => $this->input->post('wc_u_code'),
    			'wc_w_updated_on' => $objDate->format('Y-m-d H:i:s')
    		);*/
    		//echo "<pre>"; print_r($add_webinar_history_log); exit;
    		//$insert_webinar_history_log = $this->Home_model->insertData('db', 'wc_webinar_history', $add_webinar_history_log);
    		//echo 'Done'; exit;
    		redirect('events');
        }
        elseif($this->input->post('add_organizer_details')){
            //echo "<pre>"; print_r($_POST); exit;
            
            $getdata = '*';
        	$where = 'wc_u_code = "'.$this->input->post('wc_w_organizer_code').'"';
        	$data['organizer_info'] = $this->Home_model->getData('db', 'wc_users', $getdata,  $where,'','','','');
        	//echo "<pre>"; print_r($data['organizer_info']); exit;
            
            $add_organizer_details = array(
    			'wc_w_organizer_code' => $this->input->post('wc_w_organizer_code'),
    			'wc_w_organizer_name' => $data['organizer_info'][0]['wc_u_display_name'],
    			'wc_w_organizer_details' => 'Updated',
    			'wc_w_organizer_details_updated_by' => $this->session->userdata('wc_u_code'),
                'wc_w_organizer_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
    			'updated_by' => $this->session->userdata('wc_u_code'),
    			'updated_on' => $objDate->format('Y-m-d H:i:s')
    		);
    		//echo "<pre>"; print_r($add_organizer_details); exit;
    		$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
    		$this->Home_model->updateData('db', 'wc_events', $add_organizer_details, $where);
    		
    		//Get webinar info
    		$getdata = '*';
        	$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
        	$data['webinarinfo'] = $this->Home_model->getData('db', 'wc_events', $getdata,  $where,'','','','');
        	//echo "<pre>"; print_r($data['webinarinfo']); //exit;
    	
    		//Update webinar_history
    		/*$add_webinar_history_log = array(
    		    'wc_w_id' => $data['webinarinfo'][0]['wc_w_id'],
                'wc_w_code' => $data['webinarinfo'][0]['wc_w_code'],
                'wc_w_topic' => $data['webinarinfo'][0]['wc_w_topic'],
                'wc_w_subtitle' => $data['webinarinfo'][0]['wc_w_subtitle'],
                'wc_w_description' => $data['webinarinfo'][0]['wc_w_description'],
                'wc_w_date' => $data['webinarinfo'][0]['wc_w_date'],
                'wc_w_stime' => $data['webinarinfo'][0]['wc_w_stime'],
                'wc_w_etime' => $data['webinarinfo'][0]['wc_w_etime'],
                'wc_d_code' => $data['webinarinfo'][0]['wc_d_code'],
                'wc_w_requester' => $data['webinarinfo'][0]['wc_w_requester'],
                'wc_s_code_lead' => $data['webinarinfo'][0]['wc_s_code_lead'],
                'wc_s_code_guest' => $data['webinarinfo'][0]['wc_s_code_guest'],
                'wc_s_code_primary' => $data['webinarinfo'][0]['wc_s_code_primary'],
                'wc_s_code_secondary' => $data['webinarinfo'][0]['wc_s_code_secondary'],
                'wc_w_platform' => $data['webinarinfo'][0]['wc_w_platform'],
                'wc_w_invitation_create_check' => $data['webinarinfo'][0]['wc_w_invitation_create_check'],
                'wc_w_invitation' => $data['webinarinfo'][0]['wc_w_invitation'],
                'wc_reason_for_update' => 'Technician details updated',
                'wc_w_notes' => $data['webinarinfo'][0]['wc_w_notes'],
                'wc_w_technician_details' => '1001',
                'wc_t_code' => $this->input->post('wc_t_code'),
    			'wc_w_zoom_details' => $data['webinarinfo'][0]['wc_w_zoom_details'],
    			'wc_w_zoom_link' => $data['webinarinfo'][0]['wc_w_zoom_link'],
    			'wc_w_zoom_id' => $data['webinarinfo'][0]['wc_w_zoom_id'],
    			'wc_w_zoom_passcode' => $data['webinarinfo'][0]['wc_w_zoom_passcode'],
                'wc_w_youtube_details' => $data['webinarinfo'][0]['wc_w_youtube_details'],
                'wc_w_streaming_link' => $data['webinarinfo'][0]['wc_w_streaming_link'],
                'wc_w_custom_platform_details' => $data['webinarinfo'][0]['wc_w_custom_platform_details'],
                'wc_w_custom_platform_url' => $data['webinarinfo'][0]['wc_w_custom_platform_url'],
                'wc_w_release_details' => '1001',
                'wc_w_technician_details_updated_by' => $this->input->post('wc_u_code'),
                'wc_w_technician_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
                'wc_w_zoom_details_updated_by' => $data['webinarinfo'][0]['wc_w_zoom_details_updated_by'],
    			'wc_w_zoom_details_updated_on' => $data['webinarinfo'][0]['wc_w_zoom_details_updated_on'],
                'wc_w_youtube_details_updated_by' => $data['webinarinfo'][0]['wc_w_youtube_details_updated_by'],
                'wc_w_youtube_details_updated_on' => $data['webinarinfo'][0]['wc_w_youtube_details_updated_on'],
                'wc_w_platform_details_updated_by' => $data['webinarinfo'][0]['wc_w_platform_details_updated_by'],
                'wc_w_platform_details_updated_on' => $data['webinarinfo'][0]['wc_w_platform_details_updated_on'],
                'wc_w_release_details_updated_by' => $data['webinarinfo'][0]['wc_w_release_details_updated_by'],
                'wc_w_release_details_updated_on' => $data['webinarinfo'][0]['wc_w_release_details_updated_on'],
                'wc_w_status' => $data['webinarinfo'][0]['wc_w_status'],
                'wc_w_created_by' => $data['webinarinfo'][0]['wc_w_created_by'],
                'wc_w_created_on' => $data['webinarinfo'][0]['wc_w_created_on'],
    			'wc_w_updated_by' => $this->input->post('wc_u_code'),
    			'wc_w_updated_on' => $objDate->format('Y-m-d H:i:s')
    		);*/
    		//echo "<pre>"; print_r($add_webinar_history_log); exit;
    		//$insert_webinar_history_log = $this->Home_model->insertData('db', 'wc_webinar_history', $add_webinar_history_log);
    		//echo 'Done'; exit;
    		redirect('events');
        }
        elseif($this->input->post('release_webinar')){
            //echo "<pre>"; print_r($_POST); exit;
            $add_release_details = array(
    			'wc_w_release_details' => 'Released',
    			'wc_w_release_details_updated_by' => $this->session->userdata('wc_u_code'),
                'wc_w_release_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
                'wc_w_hosting_details' => 'Pending',
                'wc_w_hosting_details_updated_by' => $this->session->userdata('wc_u_code'),
                'wc_w_hosting_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
    			'updated_by' => $this->session->userdata('wc_u_code'),
    			'updated_on' => $objDate->format('Y-m-d H:i:s')
    		);
    		//echo "<pre>"; print_r($add_release_details); exit;
    		$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
    		$this->Home_model->updateData('db', 'wc_events', $add_release_details, $where);
    		
    		//Update webinar_history
    		/*$add_webinar_history_log = array(
    		    'wc_w_id' => $data['webinarinfo'][0]['wc_w_id'],
                'wc_w_code' => $data['webinarinfo'][0]['wc_w_code'],
                'wc_w_topic' => $data['webinarinfo'][0]['wc_w_topic'],
                'wc_w_subtitle' => $data['webinarinfo'][0]['wc_w_subtitle'],
                'wc_w_description' => $data['webinarinfo'][0]['wc_w_description'],
                'wc_w_date' => $data['webinarinfo'][0]['wc_w_date'],
                'wc_w_stime' => $data['webinarinfo'][0]['wc_w_stime'],
                'wc_w_etime' => $data['webinarinfo'][0]['wc_w_etime'],
                'wc_d_code' => $data['webinarinfo'][0]['wc_d_code'],
                'wc_w_requester' => $data['webinarinfo'][0]['wc_w_requester'],
                'wc_s_code_lead' => $data['webinarinfo'][0]['wc_s_code_lead'],
                'wc_s_code_guest' => $data['webinarinfo'][0]['wc_s_code_guest'],
                'wc_s_code_primary' => $data['webinarinfo'][0]['wc_s_code_primary'],
                'wc_s_code_secondary' => $data['webinarinfo'][0]['wc_s_code_secondary'],
                'wc_w_platform' => $data['webinarinfo'][0]['wc_w_platform'],
                'wc_w_invitation_create_check' => $data['webinarinfo'][0]['wc_w_invitation_create_check'],
                'wc_w_invitation' => $data['webinarinfo'][0]['wc_w_invitation'],
                'wc_reason_for_update' => 'Webinar released',
                'wc_w_notes' => $data['webinarinfo'][0]['wc_w_notes'],
                'wc_w_technician_details' => $data['webinarinfo'][0]['wc_w_technician_details'],
                'wc_t_code' => $data['webinarinfo'][0]['wc_t_code'],
    			'wc_w_zoom_details' => $data['webinarinfo'][0]['wc_w_zoom_details'],
    			'wc_w_zoom_link' => $data['webinarinfo'][0]['wc_w_zoom_link'],
    			'wc_w_zoom_id' => $data['webinarinfo'][0]['wc_w_zoom_id'],
    			'wc_w_zoom_passcode' => $data['webinarinfo'][0]['wc_w_zoom_passcode'],
                'wc_w_youtube_details' => $data['webinarinfo'][0]['wc_w_youtube_details'],
                'wc_w_streaming_link' => $data['webinarinfo'][0]['wc_w_streaming_link'],
                'wc_w_custom_platform_details' => $data['webinarinfo'][0]['wc_w_custom_platform_details'],
                'wc_w_custom_platform_url' => $data['webinarinfo'][0]['wc_w_custom_platform_url'],
                'wc_w_release_details' => '1001',
                'wc_w_status' => $data['webinarinfo'][0]['wc_w_status'],
                'wc_w_technician_details_updated_by' => $data['webinarinfo'][0]['wc_w_technician_details_updated_by'],
                'wc_w_technician_details_updated_on' => $data['webinarinfo'][0]['wc_w_technician_details_updated_on'],
                'wc_w_zoom_details_updated_by' => $data['webinarinfo'][0]['wc_w_zoom_details_updated_by'],
    			'wc_w_zoom_details_updated_on' => $data['webinarinfo'][0]['wc_w_zoom_details_updated_on'],
                'wc_w_youtube_details_updated_by' => $data['webinarinfo'][0]['wc_w_youtube_details_updated_by'],
                'wc_w_youtube_details_updated_on' => $data['webinarinfo'][0]['wc_w_youtube_details_updated_on'],
                'wc_w_platform_details_updated_by' => $data['webinarinfo'][0]['wc_w_platform_details_updated_by'],
                'wc_w_platform_details_updated_on' => $data['webinarinfo'][0]['wc_w_platform_details_updated_on'],
                'wc_w_release_details_updated_by' => $this->input->post('wc_u_code'),
                'wc_w_release_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
                'wc_w_created_by' => $data['webinarinfo'][0]['wc_w_created_by'],
                'wc_w_created_on' => $data['webinarinfo'][0]['wc_w_created_on'],
    			'wc_w_updated_by' => $this->input->post('wc_u_code'),
    			'wc_w_updated_on' => $objDate->format('Y-m-d H:i:s')
    		);*/
    		//echo "<pre>"; print_r($add_webinar_history_log); //exit;
    		//$insert_webinar_history_log = $this->Home_model->insertData('db', 'wc_webinar_history', $add_webinar_history_log);
    		$insert_webinar_history_log = '1';
    		
    		//Send email to requester, and technician and division people
    		if($insert_webinar_history_log > 0){
    		    
    		    //Get webinar info
        		$getdata = '*';
            	$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
            	$data['webinarinfo'] = $this->Home_model->getData('db', 'wc_events', $getdata,  $where,'','','','');
            	//echo "<pre>"; print_r($data['webinarinfo']); exit;
        	
	            //Get technician info
	            $where = "wc_u_code = '".$data['webinarinfo'][0]['wc_t_technician_code']."'";
                $data['technicianinfo'] = $this->Home_model->getData('db', ' wc_users', '', $where, '', '', '', '');
                //echo "<pre>"; print_r($data['technicianinfo']); exit;
                
                //Get organizer info
	            $where = "wc_u_code = '".$data['webinarinfo'][0]['wc_w_organizer_code']."'";
                $data['organizerinfo'] = $this->Home_model->getData('db', ' wc_users', '', $where, '', '', '', '');
                //echo "<pre>"; print_r($data['organizerinfo']); exit;
                
                //Send email to organizer
                $SUBJECT = "Request for Webinar Hosting - ".$this->input->post('wc_w_event_code');
                $MESSAGE = "<!DOCTYPE html>
    			<html>
    			<head lang='en'>
    			<meta charset='utf-8'>
    			<meta name='viewport' content='width=device-width, initial-width=1.0'><title></title>
    			</head>
    			<body>
    				<div>
    				    <p>Dear ".$data['technicianinfo'][0]['wc_u_display_name'].",<br>We have an upcoming webinar scheduled, and your support is required for hosting and managing the technical aspects. Please find the details below:</p>
    					<table>
    						<tr><td><strong>Webinar Title:</strong> ".$data['webinarinfo'][0]['wc_w_topic'].' '.$data['webinarinfo'][0]['wc_w_subtitle']."</td></tr>
    						<tr><td><strong>Date & Time:</strong> ".$data['webinarinfo'][0]['wc_w_datetime_from'].' - '.$data['webinarinfo'][0]['wc_w_datetime_to']."</td></tr>
    						<tr><td><strong>Platform:</strong> ".$data['webinarinfo'][0]['wc_w_platform']."</td></tr>
    						<tr><td><strong>Division:</strong> ".$data['webinarinfo'][0]['wc_di_code']."</td></tr>
    						<tr><td><strong>Organizer:</strong> ".$data['organizerinfo'][0]['wc_u_display_name'].' - '.$data['organizerinfo'][0]['wc_u_email']."</td></tr>
    					</table>
    					<p><strong>Responsibilities for IT/Technical Support Team:</strong></p>
    					<ul>
    					    <li>Manage registrations and ensure smooth access for attendees.</li>
    					    <li>Provide technical assistance during the live session (audio, video, screen sharing, recording, etc.).</li>
    					    <li>Ensure backup and recording of the webinar.</li>
    					    <li>Troubleshoot any connectivity or technical issues.</li>
    					</ul>
    					<p>Kindly confirm your availability and readiness for the session. Please let us know if any additional details are required.</p>
    					<p>Best Regards,<br>DoctorCast - Webinar Support Team</p>
    			    </div>
    			</body>
    			</html>";
    			//echo $MESSAGE; exit;
    			
    			$TO_NAME = $data['organizerinfo'][0]['wc_u_display_name'];
                $TO_EMAIL = $data['organizerinfo'][0]['wc_u_email'];
                $START_DATE = $data['webinarinfo'][0]['wc_w_datetime_from'];
                $END_DATE = $data['webinarinfo'][0]['wc_w_datetime_to'];

                //Insert Email log
                $this->load->helper('string');
    		    $email_log_code = random_string('nozero',10);
    		
                $email_log = array(
        	        'wc_e_log_code' => $email_log_code,
                    'wc_e_to_name' => $TO_NAME,
                    'wc_e_to_email' => $TO_EMAIL,
                    'wc_e_log_sub' => $SUBJECT,
                    'wc_e_log_body' => $MESSAGE,
                    'wc_e_log_logon'=>$objDate->format('Y-m-d H:i:s'),
                );
                // echo "<pre>"; print_r($email_log); exit;
        	    $insert_email_log = $this->Home_model->insertData('db', 'wc_email_log', $email_log);
        	    //echo $insert_email_log; exit;
        	    
        	    //Sent to API
        		$url = "https://services.heterohcl.com/SMTP_EMAIL/DRCAST/SEND_REQUST_ORGANIZER/";
        		//echo $url; exit;
               	$postdata = http_build_query(
                    array(
                        'TO_NAME' => $TO_NAME,
                        'TO_EMAIL' => $TO_EMAIL,
                        'SUBJECT' => $SUBJECT,
                        'MESSAGE' => $MESSAGE,
                        'START_DATE' => $START_DATE,
                        'END_DATE' => $END_DATE,
                    )
                );
                //print_r($postdata); exit;
                $this->curls($url, $postdata);
                
                //Send email to technician
                $SUBJECT = "Request for Webinar Hosting - ".$this->input->post('wc_w_event_code');
                $MESSAGE = "<!DOCTYPE html>
    			<html>
    			<head lang='en'>
    			<meta charset='utf-8'>
    			<meta name='viewport' content='width=device-width, initial-width=1.0'><title></title>
    			</head>
    			<body>
    				<div>
    				    <p>Dear ".$data['technicianinfo'][0]['wc_u_display_name'].",<br>We have an upcoming webinar scheduled, and your support is required for hosting and managing the technical aspects. Please find the details below:</p>
    					<table>
    						<tr><td><strong>Webinar Title:</strong> ".$data['webinarinfo'][0]['wc_w_topic'].' '.$data['webinarinfo'][0]['wc_w_subtitle']."</td></tr>
    						<tr><td><strong>Date & Time:</strong> ".$data['webinarinfo'][0]['wc_w_datetime_from'].' - '.$data['webinarinfo'][0]['wc_w_datetime_to']."</td></tr>
    						<tr><td><strong>Platform:</strong> ".$data['webinarinfo'][0]['wc_w_platform']."</td></tr>
    						<tr><td><strong>Division:</strong> ".$data['webinarinfo'][0]['wc_di_code']."</td></tr>
    						<tr><td><strong>Organizer:</strong> ".$data['organizerinfo'][0]['wc_u_display_name'].' - '.$data['organizerinfo'][0]['wc_u_email']."</td></tr>
    					</table>
    					<p><strong>Responsibilities for IT/Technical Support Team:</strong></p>
    					<ul>
    					    <li>Manage registrations and ensure smooth access for attendees.</li>
    					    <li>Provide technical assistance during the live session (audio, video, screen sharing, recording, etc.).</li>
    					    <li>Ensure backup and recording of the webinar.</li>
    					    <li>Troubleshoot any connectivity or technical issues.</li>
    					</ul>
    					<p>Kindly confirm your availability and readiness for the session. Please let us know if any additional details are required.</p>
    					<p>Best Regards,<br>DoctorCast - Webinar Support Team</p>
    			    </div>
    			</body>
    			</html>";
    			//echo $MESSAGE; exit;
    			
    			$TO_NAME = $data['technicianinfo'][0]['wc_u_display_name'];
                $TO_EMAIL = $data['technicianinfo'][0]['wc_u_email'];
                $START_DATE = $data['webinarinfo'][0]['wc_w_datetime_from'];
                $END_DATE = $data['webinarinfo'][0]['wc_w_datetime_to'];

                //Insert Email log
                $this->load->helper('string');
    		    $email_log_code = random_string('nozero',10);
    		
                $email_log = array(
        	        'wc_e_log_code' => $email_log_code,
                    'wc_e_to_name' => $TO_NAME,
                    'wc_e_to_email' => $TO_EMAIL,
                    'wc_e_log_sub' => $SUBJECT,
                    'wc_e_log_body' => $MESSAGE,
                    'wc_e_log_logon'=>$objDate->format('Y-m-d H:i:s'),
                );
                // echo "<pre>"; print_r($email_log); exit;
        	    $insert_email_log = $this->Home_model->insertData('db', 'wc_email_log', $email_log);
        	    //echo $insert_email_log; exit;
        	    
        	    //Sent to API
        		$url = "https://services.heterohcl.com/SMTP_EMAIL/DRCAST/SEND_REQUST_TECHNICIAN/";
        		//echo $url; exit;
               	$postdata = http_build_query(
                    array(
                        'TO_NAME' => $TO_NAME,
                        'TO_EMAIL' => $TO_EMAIL,
                        'SUBJECT' => $SUBJECT,
                        'MESSAGE' => $MESSAGE,
                        'START_DATE' => $START_DATE,
                        'END_DATE' => $END_DATE,
                    )
                );
                //print_r($postdata); exit;
                $this->curls($url, $postdata);
                
                // $url = base_url()."success/".$objDate->format('Y-m-d')."-".$this->input->post('wc_w_event_code');
                // redirect($url); exit;
	        }
	        else{
	            
	        }
    		redirect('events');
        }
        elseif($this->input->post('re_release_webinar')){
            //echo "<pre>"; print_r($_POST); exit;
            $add_release_details = array(
    			'wc_w_release_details' => 'Released',
    			'wc_w_release_details_updated_by' => $this->session->userdata('wc_u_code'),
                'wc_w_release_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
                'wc_w_hosting_details' => 'Pending',
                'wc_w_hosting_details_updated_by' => $this->session->userdata('wc_u_code'),
                'wc_w_hosting_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
    			'updated_by' => $this->session->userdata('wc_u_code'),
    			'updated_on' => $objDate->format('Y-m-d H:i:s')
    		);
    		//echo "<pre>"; print_r($add_release_details); exit;
    		$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
    		$this->Home_model->updateData('db', 'wc_events', $add_release_details, $where);
    		
    		$insert_webinar_history_log = '1';
    		
    		//Send email to requester, and technician and division people
    		if($insert_webinar_history_log > 0){
    		    
    		    //Get webinar info
        		$getdata = '*';
            	$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
            	$data['webinarinfo'] = $this->Home_model->getData('db', 'wc_events', $getdata,  $where,'','','','');
            	//echo "<pre>"; print_r($data['webinarinfo']); exit;
        	
	            //Get technician info
	            $where = "wc_u_code = '".$data['webinarinfo'][0]['wc_t_technician_code']."'";
                $data['technicianinfo'] = $this->Home_model->getData('db', ' wc_users', '', $where, '', '', '', '');
                //echo "<pre>"; print_r($data['technicianinfo']); exit;
                
                //Get organizer info
	            $where = "wc_u_code = '".$data['webinarinfo'][0]['wc_w_organizer_code']."'";
                $data['organizerinfo'] = $this->Home_model->getData('db', ' wc_users', '', $where, '', '', '', '');
                //echo "<pre>"; print_r($data['organizerinfo']); exit;
                
                //Send email to organizer
                $SUBJECT = "Request for Webinar Hosting - ".$this->input->post('wc_w_event_code');
                $MESSAGE = "<!DOCTYPE html>
    			<html>
    			<head lang='en'>
    			<meta charset='utf-8'>
    			<meta name='viewport' content='width=device-width, initial-width=1.0'><title></title>
    			</head>
    			<body>
    				<div>
    				    <p>Dear ".$data['technicianinfo'][0]['wc_u_display_name'].",<br>We have an upcoming webinar scheduled, and your support is required for hosting and managing the technical aspects. Please find the details below:</p>
    					<table>
    						<tr><td><strong>Webinar Title:</strong> ".$data['webinarinfo'][0]['wc_w_topic'].' '.$data['webinarinfo'][0]['wc_w_subtitle']."</td></tr>
    						<tr><td><strong>Date & Time:</strong> ".$data['webinarinfo'][0]['wc_w_datetime_from'].' - '.$data['webinarinfo'][0]['wc_w_datetime_to']."</td></tr>
    						<tr><td><strong>Platform:</strong> ".$data['webinarinfo'][0]['wc_w_platform']."</td></tr>
    						<tr><td><strong>Division:</strong> ".$data['webinarinfo'][0]['wc_di_code']."</td></tr>
    						<tr><td><strong>Organizer:</strong> ".$data['organizerinfo'][0]['wc_u_display_name'].' - '.$data['organizerinfo'][0]['wc_u_email']."</td></tr>
    					</table>
    					<p><strong>Responsibilities for IT/Technical Support Team:</strong></p>
    					<ul>
    					    <li>Manage registrations and ensure smooth access for attendees.</li>
    					    <li>Provide technical assistance during the live session (audio, video, screen sharing, recording, etc.).</li>
    					    <li>Ensure backup and recording of the webinar.</li>
    					    <li>Troubleshoot any connectivity or technical issues.</li>
    					</ul>
    					<p>Kindly confirm your availability and readiness for the session. Please let us know if any additional details are required.</p>
    					<p>Best Regards,<br>DoctorCast - Webinar Support Team</p>
    			    </div>
    			</body>
    			</html>";
    			//echo $MESSAGE; exit;
    			
    			$TO_NAME = $data['organizerinfo'][0]['wc_u_display_name'];
                $TO_EMAIL = $data['organizerinfo'][0]['wc_u_email'];
                $START_DATE = $data['webinarinfo'][0]['wc_w_datetime_from'];
                $END_DATE = $data['webinarinfo'][0]['wc_w_datetime_to'];

                //Insert Email log
                $this->load->helper('string');
    		    $email_log_code = random_string('nozero',10);
    		
                $email_log = array(
        	        'wc_e_log_code' => $email_log_code,
                    'wc_e_to_name' => $TO_NAME,
                    'wc_e_to_email' => $TO_EMAIL,
                    'wc_e_log_sub' => $SUBJECT,
                    'wc_e_log_body' => $MESSAGE,
                    'wc_e_log_logon'=>$objDate->format('Y-m-d H:i:s'),
                );
                // echo "<pre>"; print_r($email_log); exit;
        	    $insert_email_log = $this->Home_model->insertData('db', 'wc_email_log', $email_log);
        	    //echo $insert_email_log; exit;
        	    
        	    //Sent to API
        		$url = "https://services.heterohcl.com/SMTP_EMAIL/DRCAST/SEND_REQUST_ORGANIZER/";
        		//echo $url; exit;
               	$postdata = http_build_query(
                    array(
                        'TO_NAME' => $TO_NAME,
                        'TO_EMAIL' => $TO_EMAIL,
                        'SUBJECT' => $SUBJECT,
                        'MESSAGE' => $MESSAGE,
                        'START_DATE' => $START_DATE,
                        'END_DATE' => $END_DATE,
                    )
                );
                //print_r($postdata); exit;
                $this->curls($url, $postdata);
                
                //Send email to technician
                $SUBJECT = "Request for Webinar Hosting - ".$this->input->post('wc_w_event_code');
                $MESSAGE = "<!DOCTYPE html>
    			<html>
    			<head lang='en'>
    			<meta charset='utf-8'>
    			<meta name='viewport' content='width=device-width, initial-width=1.0'><title></title>
    			</head>
    			<body>
    				<div>
    				    <p>Dear ".$data['technicianinfo'][0]['wc_u_display_name'].",<br>We have an upcoming webinar scheduled, and your support is required for hosting and managing the technical aspects. Please find the details below:</p>
    					<table>
    						<tr><td><strong>Webinar Title:</strong> ".$data['webinarinfo'][0]['wc_w_topic'].' '.$data['webinarinfo'][0]['wc_w_subtitle']."</td></tr>
    						<tr><td><strong>Date & Time:</strong> ".$data['webinarinfo'][0]['wc_w_datetime_from'].' - '.$data['webinarinfo'][0]['wc_w_datetime_to']."</td></tr>
    						<tr><td><strong>Platform:</strong> ".$data['webinarinfo'][0]['wc_w_platform']."</td></tr>
    						<tr><td><strong>Division:</strong> ".$data['webinarinfo'][0]['wc_di_code']."</td></tr>
    						<tr><td><strong>Organizer:</strong> ".$data['organizerinfo'][0]['wc_u_display_name'].' - '.$data['organizerinfo'][0]['wc_u_email']."</td></tr>
    					</table>
    					<p><strong>Responsibilities for IT/Technical Support Team:</strong></p>
    					<ul>
    					    <li>Manage registrations and ensure smooth access for attendees.</li>
    					    <li>Provide technical assistance during the live session (audio, video, screen sharing, recording, etc.).</li>
    					    <li>Ensure backup and recording of the webinar.</li>
    					    <li>Troubleshoot any connectivity or technical issues.</li>
    					</ul>
    					<p>Kindly confirm your availability and readiness for the session. Please let us know if any additional details are required.</p>
    					<p>Best Regards,<br>DoctorCast - Webinar Support Team</p>
    			    </div>
    			</body>
    			</html>";
    			//echo $MESSAGE; exit;
    			
    			$TO_NAME = $data['technicianinfo'][0]['wc_u_display_name'];
                $TO_EMAIL = $data['technicianinfo'][0]['wc_u_email'];
                $START_DATE = $data['webinarinfo'][0]['wc_w_datetime_from'];
                $END_DATE = $data['webinarinfo'][0]['wc_w_datetime_to'];

                //Insert Email log
                $this->load->helper('string');
    		    $email_log_code = random_string('nozero',10);
    		
                $email_log = array(
        	        'wc_e_log_code' => $email_log_code,
                    'wc_e_to_name' => $TO_NAME,
                    'wc_e_to_email' => $TO_EMAIL,
                    'wc_e_log_sub' => $SUBJECT,
                    'wc_e_log_body' => $MESSAGE,
                    'wc_e_log_logon'=>$objDate->format('Y-m-d H:i:s'),
                );
                // echo "<pre>"; print_r($email_log); exit;
        	    $insert_email_log = $this->Home_model->insertData('db', 'wc_email_log', $email_log);
        	    //echo $insert_email_log; exit;
        	    
        	    //Sent to API
        		$url = "https://services.heterohcl.com/SMTP_EMAIL/DRCAST/SEND_REQUST_TECHNICIAN/";
        		//echo $url; exit;
               	$postdata = http_build_query(
                    array(
                        'TO_NAME' => $TO_NAME,
                        'TO_EMAIL' => $TO_EMAIL,
                        'SUBJECT' => $SUBJECT,
                        'MESSAGE' => $MESSAGE,
                        'START_DATE' => $START_DATE,
                        'END_DATE' => $END_DATE,
                    )
                );
                //print_r($postdata); exit;
                $this->curls($url, $postdata);
                
                //Remove Old Slot In Calender - Pending
                
                // $url = base_url()."success/".$objDate->format('Y-m-d')."-".$this->input->post('wc_w_event_code');
                // redirect($url); exit;
	        }
	        else{
	            
	        }
    		redirect('events');
        }
        elseif($this->input->post('request_event_postpone')){
            //echo "<pre>"; print_r($_POST); exit;
            
            //Check Weinar or Other Event
            $getdata = '*';
        	$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
        	$data['webinarinfo'] = $this->Home_model->getData('db', 'wc_events', $getdata,  $where,'','','','');
            //echo "<pre>"; print_r($data['webinarinfo']); exit;
                
            $datetime = $this->input->post('wc_w_datetime');
            list($start, $end) = explode(" - ", $datetime);
            $wc_w_datetime_from = date("Y-m-d H:i:s", strtotime($start));
            $wc_w_datetime_to   = date("Y-m-d H:i:s", strtotime($end));
            
            $request_event_postpone_details = array(
                'wc_w_datetime_from' => $wc_w_datetime_from,
    		    'wc_w_datetime_to' => $wc_w_datetime_to,
    			'wc_w_release_details' => 'Pending Re-Release',
    			'wc_w_release_details_updated_by' => $this->session->userdata('wc_u_code'),
                'wc_w_release_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
    			'updated_by' => $this->session->userdata('wc_u_code'),
    			'updated_on' => $objDate->format('Y-m-d H:i:s')
    		);
    		//echo "<pre>"; print_r($request_event_postpone_details); exit;
    		$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
    		$this->Home_model->updateData('db', 'wc_events', $request_event_postpone_details, $where);

            redirect('events');
        }
        elseif($this->input->post('request_event_prepone')){
            //echo "<pre>"; print_r($_POST); exit;
            
            //Check Weinar or Other Event
            $getdata = '*';
        	$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
        	$data['webinarinfo'] = $this->Home_model->getData('db', 'wc_events', $getdata,  $where,'','','','');
            //echo "<pre>"; print_r($data['webinarinfo']); exit;

            $datetime = $this->input->post('wc_w_datetime');
            list($start, $end) = explode(" - ", $datetime);
            $wc_w_datetime_from = date("Y-m-d H:i:s", strtotime($start));
            $wc_w_datetime_to   = date("Y-m-d H:i:s", strtotime($end));
            
            $request_event_postpone_details = array(
                'wc_w_datetime_from' => $wc_w_datetime_from,
    		    'wc_w_datetime_to' => $wc_w_datetime_to,
    			'wc_w_release_details' => 'Pending Re-Release',
    			'wc_w_release_details_updated_by' => $this->session->userdata('wc_u_code'),
                'wc_w_release_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
    			'updated_by' => $this->session->userdata('wc_u_code'),
    			'updated_on' => $objDate->format('Y-m-d H:i:s')
    		);
    		//echo "<pre>"; print_r($request_event_postpone_details); exit;
    		$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
    		$this->Home_model->updateData('db', 'wc_events', $request_event_postpone_details, $where);

            redirect('events');
        }
        elseif($this->input->post('hosting_completed')){
            $add_hosting_details = array(
                'wc_w_hosting_details' => 'Completed',
                'wc_w_hosting_details_updated_by' => $this->session->userdata('wc_u_code'),
                'wc_w_hosting_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
                'wc_w_video_backup_link' => $this->input->post('wc_w_video_backup_link'),
    			'wc_w_video_backup_details' => 'Pending',
    			'wc_w_video_backup_details_updated_by' => $this->session->userdata('wc_u_code'),
    			'wc_w_video_backup_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
    			'wc_w_thankyou_sms_details' => 'Pending',
                'wc_w_thankyou_sms_details_updated_by' => $this->session->userdata('wc_u_code'),
                'wc_w_thankyou_sms_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
                'wc_w_thankyou_whatsapp_details' => 'Pending',
                'wc_w_thankyou_whatsapp_details_updated_by' => $this->session->userdata('wc_u_code'),
                'wc_w_thankyou_whatsapp_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
                'wc_w_thankyou_email_details' => 'Pending',
                'wc_w_thankyou_email_details_updated_by' => $this->session->userdata('wc_u_code'),
                'wc_w_thankyou_email_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
                
    			'updated_by' => $this->session->userdata('wc_u_code'),
    			'updated_on' => $objDate->format('Y-m-d H:i:s')
    		);
    		//echo "<pre>"; print_r($add_hosting_details); exit;
    		$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
    		$this->Home_model->updateData('db', 'wc_events', $add_hosting_details, $where);
    		redirect('events');
        }
        elseif($this->input->post('add_video_backup_details')){
            //echo "<pre>"; print_r($_POST); exit;
            $add_video_backup_details = array(
    			'wc_w_video_backup_link' => $this->input->post('wc_w_video_backup_link'),
    			'wc_w_video_backup_details' => 'Updated',
    			'wc_w_video_backup_details_updated_by' => $this->session->userdata('wc_u_code'),
    			'wc_w_video_backup_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
    			'updated_by' => $this->session->userdata('wc_u_code'),
    			'updated_on' => $objDate->format('Y-m-d H:i:s')
    		);
    		//echo "<pre>"; print_r($add_video_backup_details); exit;
    		$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
    		$this->Home_model->updateData('db', 'wc_events', $add_video_backup_details, $where);
    		
    		//Get webinar info
    		$getdata = '*';
        	$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
        	$data['webinarinfo'] = $this->Home_model->getData('db', 'wc_events', $getdata,  $where,'','','','');
        	//echo "<pre>"; print_r($data['webinarinfo']); //exit;
    	
    		//Update webinar_history
    		/*$add_webinar_history_log = array(
    		    'wc_w_id' => $data['webinarinfo'][0]['wc_w_id'],
                'wc_w_code' => $data['webinarinfo'][0]['wc_w_code'],
                'wc_w_topic' => $data['webinarinfo'][0]['wc_w_topic'],
                'wc_w_subtitle' => $data['webinarinfo'][0]['wc_w_subtitle'],
                'wc_w_description' => $data['webinarinfo'][0]['wc_w_description'],
                'wc_w_date' => $data['webinarinfo'][0]['wc_w_date'],
                'wc_w_stime' => $data['webinarinfo'][0]['wc_w_stime'],
                'wc_w_etime' => $data['webinarinfo'][0]['wc_w_etime'],
                'wc_d_code' => $data['webinarinfo'][0]['wc_d_code'],
                'wc_w_requester' => $data['webinarinfo'][0]['wc_w_requester'],
                'wc_s_code_lead' => $data['webinarinfo'][0]['wc_s_code_lead'],
                'wc_s_code_guest' => $data['webinarinfo'][0]['wc_s_code_guest'],
                'wc_s_code_primary' => $data['webinarinfo'][0]['wc_s_code_primary'],
                'wc_s_code_secondary' => $data['webinarinfo'][0]['wc_s_code_secondary'],
                'wc_w_platform' => $data['webinarinfo'][0]['wc_w_platform'],
                'wc_w_invitation_create_check' => $data['webinarinfo'][0]['wc_w_invitation_create_check'],
                'wc_w_invitation' => $data['webinarinfo'][0]['wc_w_invitation'],
                'wc_reason_for_update' => 'YouTube details update',
                'wc_w_notes' => $data['webinarinfo'][0]['wc_w_notes'],
                'wc_w_technician_details' => $data['webinarinfo'][0]['wc_w_technician_details'],
                'wc_t_code' => $data['webinarinfo'][0]['wc_t_code'],
    			'wc_w_zoom_details' => $data['webinarinfo'][0]['wc_w_zoom_details'],
    			'wc_w_zoom_link' => $data['webinarinfo'][0]['wc_w_zoom_link'],
    			'wc_w_zoom_id' => $data['webinarinfo'][0]['wc_w_zoom_id'],
    			'wc_w_zoom_passcode' => $data['webinarinfo'][0]['wc_w_zoom_passcode'],
                'wc_w_youtube_details' => '1001',
                'wc_w_streaming_link' => $this->input->post('wc_w_streaming_link'),
                'wc_w_custom_platform_details' => $data['webinarinfo'][0]['wc_w_custom_platform_details'],
                'wc_w_custom_platform_url' => $data['webinarinfo'][0]['wc_w_custom_platform_url'],
                'wc_w_release_details' => $data['webinarinfo'][0]['wc_w_release_details'],
                'wc_w_status' => $data['webinarinfo'][0]['wc_w_status'],
                'wc_w_technician_details_updated_by' => $data['webinarinfo'][0]['wc_w_technician_details_updated_by'],
                'wc_w_technician_details_updated_on' => $data['webinarinfo'][0]['wc_w_technician_details_updated_on'],
                'wc_w_zoom_details_updated_by' => $data['webinarinfo'][0]['wc_w_zoom_details_updated_by'],
    			'wc_w_zoom_details_updated_on' => $data['webinarinfo'][0]['wc_w_zoom_details_updated_on'],
                'wc_w_youtube_details_updated_by' => $this->input->post('wc_u_code'),
                'wc_w_youtube_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
                'wc_w_platform_details_updated_by' => $data['webinarinfo'][0]['wc_w_platform_details_updated_by'],
                'wc_w_platform_details_updated_on' => $data['webinarinfo'][0]['wc_w_platform_details_updated_on'],
                'wc_w_release_details_updated_by' => $data['webinarinfo'][0]['wc_w_release_details_updated_by'],
                'wc_w_release_details_updated_on' => $data['webinarinfo'][0]['wc_w_release_details_updated_on'],
                'wc_w_created_by' => $data['webinarinfo'][0]['wc_w_created_by'],
                'wc_w_created_on' => $data['webinarinfo'][0]['wc_w_created_on'],
    			'wc_w_updated_by' => $this->input->post('wc_u_code'),
    			'wc_w_updated_on' => $objDate->format('Y-m-d H:i:s')
    		);*/
    		//echo "<pre>"; print_r($add_webinar_history_log); //exit;
    		//$insert_webinar_history_log = $this->Home_model->insertData('db', 'wc_webinar_history', $add_webinar_history_log);
    		//echo 'Done'; exit;
    		redirect('events');
        }
        elseif($this->input->post('send_thankyou_sms')){
            //echo "send_thankyou_sms - Development Pending"; exit;
            //echo "<pre>"; print_r($_POST); //exit;
            
            //Get Request Date for Enroll SMS
            if($this->input->post('wc_ws_sms_participants') == 'registered'){
                //echo "registered"; exit;
                //Get enroll participants
                $tableA = 'wc_enroll_webinar';
        		$tableB = 'wc_events';
        		$key1 = 'wc_w_event_code';
        		$key2 = 'wc_w_event_code';
        		$tableC = 'wc_users';
        		$key3 = 'wc_u_code';
        		$key4 = 'wc_u_code';
        		$tableD = 'wc_events_settings';
        		$key5 = 'wc_w_event_code';
        		$key6 = 'wc_w_event_code';
        		$tableE = '';
        		$key7 = '';
        		$key8 = '';
        		$tableF= '';
        		$key9 = '';
        		$key10 = '';
        		$tableG= '';
        		$key11 = '';
        		$key12 = '';
        		$getdata = 'C.wc_u_display_name,C.wc_u_phone,D.wc_ws_company,D.wc_ws_sms_sender';
        		$groupBy = '';
        		$where = 'A.wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
        		$data['enroll_participants'] = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', '', '', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy);
        		//echo "<pre>"; print_r($data['enroll_participants']); exit;

        		$sms_batch_data = [];
        		foreach($data['enroll_participants'] as $participant){
        		    
        		    $wc_sms_en_template_name = '';
        		    if($participant['wc_ws_company'] == 'Hetero') {
                        if ($participant['wc_ws_sms_sender'] == 'HeteroSMSGATEWAYHUB') {
                            $wc_sms_en_template_name = 'H-WC-SGH-TY';
                        } elseif ($participant['wc_ws_sms_sender'] == 'HeteroMSG91') {
                            $wc_sms_en_template_name = 'Testing-Hetero-HeteroMSG91';
                        }
                    } elseif ($participant['wc_ws_company'] == 'Azista') {
                        if ($participant['wc_ws_sms_sender'] == 'AzistaSMSGATEWAYHUB') {
                            $wc_sms_en_template_name = 'Testing-Azista-AzistaSMSGATEWAYHUB';
                        } elseif ($participant['wc_ws_sms_sender'] == 'AzistaMSG91') {
                            $wc_sms_en_template_name = 'Testing-Azista-AzistaMSG91';
                        }
                    } elseif ($participant['wc_ws_company'] == 'DRCAST') {
                        if ($participant['wc_ws_sms_sender'] == 'DRCAST') {
                            $wc_sms_en_template_name = 'Testing-DRCAST-DRCAST';
                        }
                    }
                
                    $this->load->helper('string');	
                    $wc_sms_en_code = random_string('nozero', 10);

                    $sms_batch_data = array(
                        'wc_sms_en_code' => $wc_sms_en_code,
                        'wc_sms_en_name' => $participant['wc_u_display_name'],
                        'wc_sms_en_number' => $participant['wc_u_phone'],
                        'wc_sms_en_template_name' => $wc_sms_en_template_name,
                        'wc_sms_en_schedule_date_time' => $this->input->post('wc_ws_sms_schedule_datetime'),
                        'wc_sms_en_account' => $participant['wc_ws_company'],
                        'wc_sms_en_source_from' => $participant['wc_ws_sms_sender'],
                        'wc_sms_en_status' => 'Scheduled',
                        'wc_sms_en_scheduled_by' => $this->session->userdata('wc_u_code'),
                        'wc_sms_en_scheduled_on' => $objDate->format('Y-m-d H:i:s')
                    );
                    //print_r($sms_batch_data); exit;
                    $insert_sms_enroll = $this->Home_model->insertData('db', 'wc_sms_enroll', $sms_batch_data);
                    //echo $insert_sms_enroll; exit;
        		}
        		
            }
            elseif($this->input->post('wc_ws_sms_participants') == 'attended'){
                echo "attended"; exit;
            }
            
            $add_thankyou_sms_details = array(
    			'wc_w_thankyou_sms_details' => 'Triggered',
    			'wc_w_thankyou_sms_details_updated_by' => $this->session->userdata('wc_u_code'),
    			'wc_w_thankyou_sms_details_updated_on' => $objDate->format('Y-m-d H:i:s'),
    			'updated_by' => $this->session->userdata('wc_u_code'),
    			'updated_on' => $objDate->format('Y-m-d H:i:s')
    		);
    		//echo "<pre>"; print_r($add_thankyou_sms_details); exit;
    		$where = 'wc_w_event_code  = "'.$this->input->post('wc_w_event_code').'"';
    		$this->Home_model->updateData('db', 'wc_events', $add_thankyou_sms_details, $where);
            
            redirect('events');
            
        }
        elseif($this->input->post('send_thankyou_whatsapp')){
            echo "send_thankyou_whatsapp - Development Pending"; exit;
        }
        elseif($this->input->post('send_thankyou_email')){
            echo "send_thankyou_email - Development Pending"; exit;
        }
        
		$this->load->view('events', $data);
	}
	public function get_technician_availability(){
	    $data = array();
	    $data['active'] = 'users';
		if ($this->User_Auth()) {} else {
			redirect('login');
		}
		//echo "<pre>"; print_r($_POST); exit;
		
		$technician_code = $this->input->post('technician_code');
        $event_start = $this->input->post('event_start');
        $event_end = $this->input->post('event_end');
        
        $where = 'wc_t_technician_code = "'.$technician_code.'" 
              AND (
                    (wc_w_datetime_from <= "'.$event_end.'" 
                    AND wc_w_datetime_to >= "'.$event_start.'")
                  )';
        $getdata = '*';
        $data['assigned_event'] = $this->Home_model->getData('db', 'wc_events', $getdata, $where, '1', 'wc_w_datetime_from', 'DESC', '');
        
        if ($data['assigned_event']) {
            echo "<p style='color:red;'> Technician is already assigned to another event from <b>".$data['assigned_event'][0]['wc_w_datetime_from']."</b>  to <b>".$data['assigned_event'][0]['wc_w_datetime_to']."</b></p>";
        } else {
            echo "<p style='color:green;'>Technician is available for this time slot.</p>";
        }
		
	}
	
	public function users(){
	    $data = array();
	    $data['active'] = 'users';
		if ($this->User_Auth()) {} else {
			redirect('login');
		}
		
		$where = 'wc_u_type != "Admin"';
		$data['users'] = $this->Home_model->getData('db', 'wc_users', '', $where, '', 'wc_u_display_name', 'ASC', '');
		
		//echo "<pre>"; print_r($data); exit;
		$this->load->view('users', $data);
	}
	public function create_user(){
	    $data = array();
	    $data['active'] = 'create-user';
	    date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		if ($this->User_Auth()) {} else {
			redirect('login');
		}
		
		if($this->input->post('submit')){
		    //echo "<pre>"; print_r($_POST); exit;
    		$this->load->helper('string');	
            $wc_u_code = random_string('nozero',10);
		    
		    //echo"<pre>"; print_r($this->session->all_userdata());
		    
		    $create_user = array(
		        'wc_u_code' => $wc_u_code,
		        'wc_u_type' => $this->input->post('wc_u_type'),
		        'wc_u_role' => $this->input->post('wc_u_role'),
		        'wc_u_empid' => $this->input->post('wc_u_empid'),
		        'wc_di_code' => $this->input->post('wc_di_code'),
		        'wc_u_display_name' => $this->input->post('wc_u_display_name'),
		        'username' => $this->input->post('wc_u_empid'),
		        'password' => $this->input->post('wc_u_empid'),
		        'wc_u_password_updated_on' => $objDate->format('Y-m-d H:i:s'),
		        'wc_u_avatar' => '',
		        'wc_u_email' => $this->input->post('wc_u_email'),
		        'wc_u_email_verified_status' => $objDate->format('Y-m-d H:i:s'),
		        'wc_u_phone' => $this->input->post('wc_u_phone'),
		        'wc_u_phone_verified_status' => $objDate->format('Y-m-d H:i:s'),
                'wc_u_status' => '1001',
		        'wc_updated_by' => $this->session->userdata('wc_u_code'),
                'wc_updated_on' => $objDate->format('Y-m-d H:i:s'),
                'wc_created_by' => $this->session->userdata('wc_u_code'),
		        'wc_created_on' => $objDate->format('Y-m-d H:i:s')
            );
           	//echo "<pre>"; print_r($create_user); exit;
			$insert_user = $this->Home_model->insertData('db', 'wc_users', $create_user);
			
		
			     
			$create_user_history = array(
			    'wc_uh_id' => $insert_user,
		        'wc_u_code' => $wc_u_code,
		        'wc_u_type' => $this->input->post('wc_u_type'),
		        'wc_u_role' => $this->input->post('wc_u_role'),
		        'wc_u_empid' => $this->input->post('wc_u_empid'),
		        'wc_di_code' => $this->input->post('wc_di_code'),
		        'wc_u_display_name' => $this->input->post('wc_u_display_name'),
		        'username' => $this->input->post('wc_u_empid'),
		        'password' => $this->input->post('wc_u_empid'),
		        'wc_u_password_updated_on' => $objDate->format('Y-m-d H:i:s'),
		        'wc_u_avatar' => '',
		        'wc_u_email' => $this->input->post('wc_u_email'),
		        'wc_u_email_verified_status' => $objDate->format('Y-m-d H:i:s'),
		        'wc_u_phone' => $this->input->post('wc_u_phone'),
		        'wc_u_phone_verified_status' => $objDate->format('Y-m-d H:i:s'),
                'wc_u_status' => '1001',
		        'wc_updated_by' => $this->session->userdata('wc_u_code'),
                'wc_updated_on' => $objDate->format('Y-m-d H:i:s'),
                'wc_created_by' => $this->session->userdata('wc_u_code'),
		        'wc_created_on' => $objDate->format('Y-m-d H:i:s')
            );
            //echo "<pre>"; print_r($create_user_history); exit;
			$insert_user_history = $this->Home_model->insertData('db', 'wc_users_history', $create_user_history);
            //echo $insert_user_history; exit;
            redirect('users');
		}
        
        //Divisions
		$getdata = 'wc_di_id,wc_di_code,wc_di_name';
		$where = 'wc_di_status = "1001"';
	    $data['divisions'] = $this->Home_model->getData('db', 'wc_divisions', $getdata, $where, '', 'wc_di_name', 'ASC', '');
	   	//echo "<pre>"; print_r($data); exit;

		//echo "<pre>"; print_r($data); exit;
		$this->load->view('create_user', $data);
	}
	public function check_availability_create_user(){
	    //echo "<pre>"; print_r($_POST); exit;
	    
	    $column = $_POST['column'];
        $value =  $_POST['wc_u_empid'];
        $where = "$column ='".$value."'";
        //print_r($where); //exit;
        $data['check_availability'] = $this->Home_model->getData('db', 'wc_users', '', $where, '', '', '', '');
        //print_r($data); exit;
        //$result = $data['check_availability'][0]['sub_email'];
        if(empty($data['check_availability'])) {
            echo 'true';
        }
        else {
            echo 'false';
        }
	}
	
	public function technicians(){
	    //echo 'rajesh'; exit;
		$data = array();
	    date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		
		if($this->User_Auth()) {} else {
			redirect('login');
		}
		
		$data['clear'] = 'technicians';
		$data['active'] = 'technicians';

        //Technicians
		$getdata = '*';
    	$where = 'wc_u_type = "Technician" AND wc_u_status = "1001"';
    	$data['technicians'] = $this->Home_model->getData('db', 'wc_users', $getdata,  $where,'','','','');
    	
        //echo "<pre>"; print_r($data); exit;
    	
    	//Divisions
		$getdata = 'wc_di_id,wc_di_code,wc_di_name';
		$where = 'wc_di_status = "1001"';
	    $data['divisions'] = $this->Home_model->getData('db', 'wc_divisions', $getdata, $where, '', 'wc_di_name', 'ASC', '');
	   	//echo "<pre>"; print_r($data); exit;
	   	
	   	if($this->input->post('technician_to_division_maping')){
	   	    //echo "<pre>"; print_r($_POST); exit;
	   	    
	   	    $technician_to_division_maping = array(
			    'wc_u_code' => $this->input->post('wc_u_code'),
			    'wc_di_code' => $this->input->post('wc_di_code'),
				'wc_du_status' => '1001',
			);
		    //echo "<pre>"; print_r($technician_to_division_maping); exit;
			$technician_to_division_maping = $this->Home_model->insertData('db', 'wc_technician_user', $technician_to_division_maping);
			
			redirect('technicians');
	   	}
	   	
        $tableA = 'wc_technician_user';
		$tableB = 'wc_users';
		$key1 = 'wc_u_code';
		$key2 = 'wc_u_code';
		$tableC = 'wc_divisions';
		$key3 = 'wc_di_code';
		$key4 = 'wc_di_code';
		$tableD = '';
		$key5 = '';
		$key6 = '';
		$tableE = '';
		$key7 = '';
		$key8 = '';
		$tableF= '';
		$key9 = '';
		$key10 = '';
		$tableG= '';
		$key11 = '';
		$key12 = '';
		$getdata = 'B.wc_u_display_name,B.wc_u_display_name,B.wc_u_email,B.wc_u_phone,C.wc_di_name';
		$groupBy = '';
		$where = 'B.wc_u_type = "Technician" AND B.wc_u_status = "1001" AND A.wc_du_status = "1001"';
		$data['technicianinfo'] = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', '', '', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy);
		//echo "<pre>"; print_r($data['technicianinfo']); exit;

		//echo "<pre>"; print_r($data); exit;
		$this->load->view('technicians', $data);
	}
	public function organizers(){
	    $data = array();
	    date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		
		if($this->User_Auth()) {} else {
			redirect('login');
		}
		
		$data['clear'] = 'organizers';
		$data['active'] = 'organizers';

        //Organizer
		$getdata = '*';
    	$where = 'wc_u_type = "Organizer" AND wc_u_status = "1001"';
    	$data['organizers'] = $this->Home_model->getData('db', 'wc_users', $getdata,  $where,'','','','');
    	//echo "<pre>"; print_r($data['organizers']); exit;
    	
    	//Divisions
		$getdata = 'wc_di_id,wc_di_code,wc_di_name';
		$where = 'wc_di_status = "1001"';
	    $data['divisions'] = $this->Home_model->getData('db', 'wc_divisions', $getdata, $where, '', 'wc_di_name', 'ASC', '');
	   	//echo "<pre>"; print_r($data['divisions']); exit;
	   	
	   	if($this->input->post('organizer_to_division_maping')){
	   	    //echo "<pre>"; print_r($_POST); exit;
	   	    
	   	    $organizers_to_division_maping = array(
			    'wc_u_code' => $this->input->post('wc_u_code'),
			    'wc_di_code' => $this->input->post('wc_di_code'),
				'wc_do_status' => '1001',
			);
		    //echo "<pre>"; print_r($organizers_to_division_maping); exit;
			$organizers_to_division_maping = $this->Home_model->insertData('db', 'wc_division_organizers', $organizers_to_division_maping);
			
			redirect('organizers');
	   	}
	   	
        $tableA = 'wc_division_organizers';
		$tableB = 'wc_users';
		$key1 = 'wc_u_code';
		$key2 = 'wc_u_code';
		$tableC = 'wc_divisions';
		$key3 = 'wc_di_code';
		$key4 = 'wc_di_code';
		$tableD = '';
		$key5 = '';
		$key6 = '';
		$tableE = '';
		$key7 = '';
		$key8 = '';
		$tableF= '';
		$key9 = '';
		$key10 = '';
		$tableG= '';
		$key11 = '';
		$key12 = '';
		$getdata = 'B.wc_u_display_name,B.wc_u_display_name,B.wc_u_email,B.wc_u_phone,C.wc_di_name';
		$groupBy = '';
		$where = 'B.wc_u_type = "Organizer" AND B.wc_u_status = "1001" AND A.wc_do_status = "1001"';
		$data['organizerinfo'] = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', '', '', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy);
		//echo "<pre>"; print_r($data['technicianinfo']); exit;

		//echo "<pre>"; print_r($data); exit;
		$this->load->view('organizers', $data);
	}
	
	public function doctors(){
	    $data = array();
	    date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		if ($this->User_Auth()) {} else {
			redirect('login');
		}

	    $data['clear'] = 'doctors';
	    $data['active'] = 'doctors';

		//Get Division List
		$tableA = 'wc_doctor_maping';
		$tableB = 'wc_doctors';
		$key1 = 'wc_d_code';
		$key2 = 'wc_d_code';
		$tableC = 'wc_divisions';
		$key3 = 'wc_di_code';
		$key4 = 'wc_di_code';
		$tableD = '';
		$key5 = '';
		$key6 = '';
		$tableE = '';
		$key7 = '';
		$key8 = '';
		$tableF= '';
		$key9 = '';
		$key10 = '';
		$tableG= '';
		$key11 = '';
		$key12 = '';
		$getdata = '*';
		$groupBy = '';
// 		if($this->input->post('search')){
// 		    $division = $this->input->post('wc_di_code');
//             //echo "<pre>"; print_r($_POST); exit;
//             $where = 'A.wc_di_code = "'.$this->input->post('wc_di_code').'"';
            
//                 //Get division info//
//                 $getdata = '*';
//             	$where_division_info = 'wc_di_code = "'.$this->input->post('wc_di_code').'"';
//             	$data['divisioninfo'] = $this->Home_model->getData('db', 'wc_divisions', $getdata,  $where_division_info,'','','','');
//                 //echo "<pre>"; print_r($data['divisioninfo']); exit;
                
//                 $data['wc_di_code'] = $data['divisioninfo'][0]['wc_di_code'];
//                 $data['wc_di_name'] = $data['divisioninfo'][0]['wc_di_name'];
//                 //End Get division info//
//                 //print_r($where); exit;
//         }
//         else{
//             $where = '';
//         }

            if($this->input->post('search')){
                $division = $this->input->post('wc_di_code');
                if($division != "0" && $division != ""){
                    $where = 'A.wc_di_code = "'.$division.'"';
                    // Get division info
                    $getdata = '*';
                    $where_division_info = 'wc_di_code = "'.$division.'"';
                    $data['divisioninfo'] = $this->Home_model->getData('db', 'wc_divisions', $getdata,  $where_division_info,'','','','');
                    if(!empty($data['divisioninfo'])){
                        $data['wc_di_code'] = $data['divisioninfo'][0]['wc_di_code'];
                        $data['wc_di_name'] = $data['divisioninfo'][0]['wc_di_name'];
                    }
                } else {
                    // If user selects "Select division name"
                    $where = '';
                    $data['wc_di_code'] = '';
                    $data['wc_di_name'] = '';
                }
            }
            else{
                $where = '';
            }

		$data['doctorslist'] = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', 'B.wc_d_name', 'ASC', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy);
		
		$getdata = '*';
    	$where = 'wc_di_status = "1001"';
    	$data['divisionslist'] = $this->Home_model->getData('db', 'wc_divisions', $getdata,  $where,'','wc_di_name','ASC','');

		//echo "<pre>"; print_r($data); exit;
		$this->load->view('doctors', $data);
	}
	public function doctor_create(){
		$data = array();
		date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		
		if($this->User_Auth()) {} else {
			redirect('login');
		}

		//Retrieving all session data
        $session_data = $this->session->userdata();
        //echo "<pre>"; print_r($session_data);

		if($this->input->post('submit')){
		    //echo "<pre>"; print_r($_FILES); 
		    //echo "<pre>"; print_r($_POST); exit;
		    $EmailSignature = EmailSignature;
        // echo $EmailSignature; exit;
		    $this->load->helper('string');	
	        $wc_d_code = random_string('nozero',10);
			
			//Validation
			$this->form_validation->set_rules('wc_d_name','Please enter speaker name','trim|required|min_length[3]|max_length[200]');
			$this->form_validation->set_rules('wc_d_email','Please enter email Id','trim');
			$this->form_validation->set_rules('wc_d_contact','Please enter contact number','trim|required|min_length[10]|max_length[12]');
			$this->form_validation->set_rules('wc_di_code','Please select division','required');
			$this->form_validation->set_rules('wc_d_hospital','Please enter hospital name','trim|required');
			$this->form_validation->set_rules('wc_d_headquaters','Please enter headquaters','trim|required');
			$this->form_validation->set_rules('wc_d_code_sap','Please enter doctor code','trim|required');
			$this->form_validation->set_rules('wc_d_position','Please enter speaker position','trim|required');
			$this->form_validation->set_rules('wc_d_education','Please enter education credentials','trim|required');
			$this->form_validation->set_rules('wc_d_location','Please enter location','trim|required');
			

			if($this->form_validation->run()==False){
				//echo "Validation Bad"; exit;
				$message = array('error' => "Validation Error");
				echo json_encode($message);
			}
			else{
				//echo "Validation Good"; exit;
				
				if(empty($_FILES["wc_d_display_photo"]["name"])) { echo 'Upload pack insert'; } else{
				    //echo "In"; exit;
                    $file_ext = pathinfo($_FILES["wc_d_display_photo"]["name"], PATHINFO_EXTENSION);
                    $wc_d_display_photo = $wc_d_code.'_DOCTOR_'.$objDate->format('YmdHis').'.'.$file_ext;
                    //echo $wc_d_display_photo; exit;
                    $folderPath = FCPATH . 'uploads/doctors/';
                    //echo $folderPath; exit;
        		    if (!is_dir($folderPath)) {
                        mkdir($folderPath, 0777, true);
                    }
                    $config1['upload_path']          = $folderPath ;
                    $config1['allowed_types']        = 'JPEG|jpg|png|gif|BMP|jpeg|webp';
                    $config1['max_size']      = 5120; // File size in KB (5MB)
                    //$config1['max_width']          = 1024;
                    //$config1['max_height']         = 800;
                    //$config1['overwrite']		    = TRUE;
                    $config1['file_name']		    = $wc_d_display_photo;
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
        			if(!$this->upload->do_upload('wc_d_display_photo')){
        				$error = array('error' => $this->upload->display_errors()); exit;
        			    //echo "<pre>"; print_r($error); exit;
        			}
        			else{
        				$data1 = array('upload_data' => $this->upload->data());
        			    //echo "Out"; exit;
        				//echo "<pre>"; print_r($data1); exit;
        				$wc_d_display_photo = $wc_d_display_photo;

        			}
				}
				
				$doctor = array(
				    'wc_d_code' => $wc_d_code,
				    'wc_d_code_sap' => $this->input->post('wc_d_code_sap'),
					'wc_d_name' => $this->input->post('wc_d_name'),
					'wc_d_email' => $this->input->post('wc_d_email'),
					'wc_d_contact' => $this->input->post('wc_d_contact'),
					'wc_d_hospital' => $this->input->post('wc_d_hospital'),
					'wc_d_display_photo' => $wc_d_display_photo,
					'wc_d_position' => $this->input->post('wc_d_position'),
					'wc_d_education' => $this->input->post('wc_d_education'),
					'wc_d_location' => $this->input->post('wc_d_location'),
					'wc_d_headquaters' => $this->input->post('wc_d_headquaters'),
					'wc_d_status' => '1001',
					'wc_d_created_by' => $this->session->userdata('wc_u_code'),
					'wc_d_created_on' => $objDate->format('Y-m-d H:i:s'),
					'wc_d_updated_by' => $this->session->userdata('wc_u_code'),
					'wc_d_updated_on' => $objDate->format('Y-m-d H:i:s'),
				);
			    //echo "<pre>"; print_r($doctor); exit;
				$insert_doctor = $this->Home_model->insertData('db', 'wc_doctors', $doctor);
			    //echo "<pre>"; print_r($insert_doctor); exit;
			    
			    //insert doctor history
			    $doctor_history = array(
			        'wc_d_id' => $insert_doctor,
				    'wc_d_code' => $wc_d_code,
				    'wc_d_code_sap' => $this->input->post('wc_d_code_sap'),
					'wc_d_name' => $this->input->post('wc_d_name'),
					'wc_d_email' => $this->input->post('wc_d_email'),
					'wc_d_contact' => $this->input->post('wc_d_contact'),
					'wc_d_hospital' => $this->input->post('wc_d_hospital'),
					'wc_d_display_photo' => $wc_d_display_photo,
					'wc_d_position' => $this->input->post('wc_d_position'),
					'wc_d_education' => $this->input->post('wc_d_education'),
					'wc_d_location' => $this->input->post('wc_d_location'),
					'wc_d_headquaters' => $this->input->post('wc_d_headquaters'),
					'wc_d_status' => '1001',
					'wc_d_reason' => 'New Entry',
					'wc_d_created_by' => $this->session->userdata('wc_u_code'),
					'wc_d_created_on' => $objDate->format('Y-m-d H:i:s'),
					'wc_d_updated_by' => $this->session->userdata('wc_u_code'),
					'wc_d_updated_on' => $objDate->format('Y-m-d H:i:s'),
				);
			    //echo "<pre>"; print_r($doctor); exit;
				$insert_doctor_history = $this->Home_model->insertData('db', 'wc_doctors_history', $doctor_history);
			    //echo "<pre>"; print_r($insert_doctor_history); exit;
			    
				//Division to doctor maping
				$doctor_maping = array(
				    'wc_d_code' => $wc_d_code,
				    'wc_di_code' => $this->input->post('wc_di_code'),
					'wc_dm_status' => '1001',
					'wc_dm_created_by' => $this->session->userdata('wc_u_code'),
					'wc_dm_created_on' => $objDate->format('Y-m-d H:i:s'),
					'wc_dm_updated_by' => $this->session->userdata('wc_u_code'),
					'wc_dm_updated_on' => $objDate->format('Y-m-d H:i:s'),
				);
				$insert_doctor_maping = $this->Home_model->insertData('db', 'wc_doctor_maping', $doctor_maping);
				//echo $insert_doctor_maping; exit;
				if ($insert_doctor_history > 0) {

                    $to_name = $this->input->post('wc_d_name');
                    $to      = $this->input->post('wc_d_email');
                    $subject = "Patchmantra Enquiry";
                
                    $message = "<!DOCTYPE html>
                    <html>
                    <head lang='en'>
                        <meta charset='utf-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <title></title>
                    </head>
                    <body>
                        <div class='gmail_quote'>
                            <p>Hello <b>".$this->input->post('wc_d_name')."</b>,<br><br>
                            Thank you for submitting your details. Please find your information below:</p>
                    
                            <table border='0' cellpadding='6' cellspacing='0' style='border-collapse:collapse;'>
                                <tr><td><strong>Doctor Code</strong></td><td>".$wc_d_code."</td></tr>
                                <tr><td><strong>SAP Code</strong></td><td>".$this->input->post('wc_d_code_sap')."</td></tr>
                                <tr><td><strong>Name</strong></td><td>".$this->input->post('wc_d_name')."</td></tr>
                                <tr><td><strong>Email</strong></td><td>".$this->input->post('wc_d_email')."</td></tr>
                                <tr><td><strong>Contact</strong></td><td>".$this->input->post('wc_d_contact')."</td></tr>
                                <tr><td><strong>Hospital</strong></td><td>".$this->input->post('wc_d_hospital')."</td></tr>
                                <tr><td><strong>Display Photo</strong></td><td>".$wc_d_display_photo."</td></tr>
                                <tr><td><strong>Position</strong></td><td>".$this->input->post('wc_d_position')."</td></tr>
                                <tr><td><strong>Education</strong></td><td>".$this->input->post('wc_d_education')."</td></tr>
                                <tr><td><strong>Location</strong></td><td>".$this->input->post('wc_d_location')."</td></tr>
                                <tr><td><strong>Headquarters</strong></td><td>".$this->input->post('wc_d_headquaters')."</td></tr>
                                <tr><td><strong>Doctor Registration</strong></td><td><a href='https://www.drcast.in/doctor-registration'>Click Hear</a></td></tr>
                            </table>
                    
                            <br>
                            <p>Our team will review the details and get back to you shortly.</p>
                    
                            <p>".$EmailSignature."</p>
                        </div>
                    </body>
                    </html>";
                    // print_r($message); exit;
                
                    $postdata = http_build_query(array(
                        'TO_EMAIL'     => $to,
                        'SUBJECT'      => $subject,
                        'MESSAGE_BODY' => $message,
                        'TO_NAME'      => $to_name
                    ));
                
                    $url = EmailAPI;
                    $this->curls($url, $postdata);
                
                    // echo base_url()."success/enquiry-submission/".$objDate->format('Y-m-d')."-".$wc_d_code; exit;
                    redirect(base_url()."success/enquiry-submission/".$objDate->format('Y-m-d')."-".$wc_d_code);
                
                } else {
                
                    $message = array('error' => "Error in submission");
                    echo json_encode($message);
                }

                //redirect('doctors');
			}
		}
		
		$getdata = '*';
    	$where = 'wc_di_status = "1001"';
    	$data['divisionslist'] = $this->Home_model->getData('db', 'wc_divisions', $getdata,  $where,'','wc_di_name','ASC','');
    	
    	//echo "<pre>"; print_r($data); exit;
		$this->load->view('doctor_create', $data);
	}
	public function doctorstatuschange(){
	    $data = array();
        date_default_timezone_set('Asia/Kolkata');
        $objDate = new DateTime();
        
        if($this->User_Auth()) {} else {
			redirect('login');
		}
		
	    //echo "<pre>"; print_r($_POST); exit;

	    if($this->input->post('doctoractivestatus') == '1001'){ $doctoractivestatus = '1002'; $wc_d_reason = 'Inactive'; } elseif($this->input->post('doctoractivestatus') == '1002'){ $doctoractivestatus = '1001'; $wc_d_reason = 'Active'; } else{ }
	    
	    $doctorstatuschange = array(
			'wc_d_status' => $doctoractivestatus,
			'wc_d_updated_by' => $this->session->userdata('wc_u_code'),
			'wc_d_updated_on' => $objDate->format('Y-m-d H:i:s'),
		);
		//echo "<pre>"; print_r($doctorstatuschange); exit;
        $where = 'wc_d_code  = "'.$this->input->post('doctoractiveid').'"';
        $this->Home_model->updateData('db', 'wc_doctors', $doctorstatuschange, $where);
        
        //Get old doctor info
        $getdata = '*';
        $where = 'wc_d_code  = "'.$this->input->post('doctoractiveid').'"';
	    $data['oldinfodoctor'] = $this->Home_model->getData('db', 'wc_doctors', $getdata, $where, '', 'wc_d_name', 'ASC', '');
	    //echo "<pre>"; print_r($data['oldinfodoctor']); exit;
        
        //insert doctor history
	    $doctor_history = array(
	        'wc_d_id' => $data['oldinfodoctor'][0]['wc_d_id'],
		    'wc_d_code' => $data['oldinfodoctor'][0]['wc_d_code'],
		    'wc_d_code_sap' => $data['oldinfodoctor'][0]['wc_d_code_sap'],
			'wc_d_name' => $data['oldinfodoctor'][0]['wc_d_name'],
			'wc_d_email' => $data['oldinfodoctor'][0]['wc_d_email'],
			'wc_d_contact' => $data['oldinfodoctor'][0]['wc_d_contact'],
			'wc_d_hospital' => $data['oldinfodoctor'][0]['wc_d_hospital'],
			'wc_d_display_photo' => $data['oldinfodoctor'][0]['wc_d_display_photo'],
			'wc_d_position' => $data['oldinfodoctor'][0]['wc_d_position'],
			'wc_d_education' => $data['oldinfodoctor'][0]['wc_d_education'],
			'wc_d_location' => $data['oldinfodoctor'][0]['wc_d_location'],
			'wc_d_headquaters' => $data['oldinfodoctor'][0]['wc_d_headquaters'],
			'wc_d_status' => $doctoractivestatus,
			'wc_d_reason' => 'Status change-'.$wc_d_reason,
			'wc_d_created_by' => $data['oldinfodoctor'][0]['wc_d_created_by'],
			'wc_d_created_on' => $data['oldinfodoctor'][0]['wc_d_created_on'],
			'wc_d_updated_by' => $this->session->userdata('wc_u_code'),
			'wc_d_updated_on' => $objDate->format('Y-m-d H:i:s'),
		);
	    //echo "<pre>"; print_r($doctor_history); exit;
		$insert_doctor_history = $this->Home_model->insertData('db', 'wc_doctors_history', $doctor_history);
	    //echo "<pre>"; print_r($insert_doctor_history); exit;
	}
	public function doctor_registration (){
	    $data = array();
	    date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
    	    $this->load->view('doctor_registration', $data);
	}
	public function doc_registersubmission()
{
    date_default_timezone_set('Asia/Kolkata');
    $objDate = new DateTime();

    $this->load->helper('string');
    $wc_d_code = random_string('nozero',10);

    $create_log = array(
        'wc_doctor_name'       => $this->input->post('we_doctor_name'),
        'wc_gender'            => $this->input->post('we_gender'),
        'wc_qualification'     => $this->input->post('we_qualification'),
        'wc_specialization'    => $this->input->post('we_specialization'),
        'wc_medical_reg_no'    => $this->input->post('we_medical_reg_no'),
        'wc_experience_years'  => $this->input->post('we_experience'),
        'wc_created_at'        => date('Y-m-d H:i:s')
    );

    $insert_log = $this->Home_model->insertData('db', 'wc_doctor_log', $create_log);

    if ($insert_log) {
        echo base_url()."success/doctor-register-submission/".$objDate->format('Y-m-d')."-".$wc_d_code;
    } else {
        echo "error";
    }
    exit;
}

	
	/*public function participants(){
		$data = array();
		$data['clear'] = 'participants';
		$data['active'] = 'participants';
		
		$getdata = '*';
		//$db, $table, $getdata, $where, $limit, $colum, $order, $distinct
		ini_set('memory_limit', '256M'); // Set memory limit to 256MB (adjust as needed)

    	$data['participants'] = $this->Home_model->getData('db', 'wc_registrations', $getdata, '', '', '', 'ASC', '');
    
    	//echo "<pre>"; print_r($data); exit;
		$this->load->view('participants', $data);
	}*/
    
	
	
    
	/*
	
	public function technician_create(){
		$data = array();	
		date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
        
        if($this->User_Auth()) {} else {
			redirect('login');
		}
    
		$this->load->helper('string');	
		$wc_t_code = random_string('nozero',10);
		
		//Retrieving all session data
        $session_data = $this->session->userdata();
        //echo "<pre>"; print_r($session_data);

		if($this->input->post('submit')){
			//echo "<pre>"; print_r($_POST); exit;
			
			//Validation
			$this->form_validation->set_rules('wc_t_name','Please enter technician name','trim|required|min_length[3]|max_length[200]');
			$this->form_validation->set_rules('wc_t_email','Please enter technician email','trim|required');
			$this->form_validation->set_rules('wc_t_mobile','Please enter technician mobile','trim|required');

			if($this->form_validation->run()==False){
				//echo "Validation Bad"; exit;
				$message = array('error' => "Validation Error");
				echo json_encode($message);
			}
			else{
				//echo "Validation Good"; exit;
				$technician = array(
				    'wc_t_code' => $wc_t_code,
					'wc_t_name' => $this->input->post('wc_t_name'),
					'wc_t_email' => $this->input->post('wc_t_email'),
					'wc_t_mobile' => $this->input->post('wc_t_mobile'),
				    'wc_t_status' => '1001',
					'wc_t_created_by' => $this->session->userdata('wc_u_code'),
					'wc_t_created_on' => $objDate->format('Y-m-d H:i:s'),
					'wc_t_updated_by' => $this->session->userdata('wc_u_code'),
					'wc_t_updated_on' => $objDate->format('Y-m-d H:i:s'),
				);
			    //echo "<pre>"; print_r($technician); exit;
				$insert_technician = $this->Home_model->insertData('db', 'wc_technicians', $technician);
				
				//insert technician history
			    $technician_history = array(
			        'wc_t_id' => $insert_technician,
			        'wc_t_code' => $wc_t_code,
					'wc_t_name' => $this->input->post('wc_t_name'),
					'wc_t_email' => $this->input->post('wc_t_email'),
					'wc_t_mobile' => $this->input->post('wc_t_mobile'),
				    'wc_t_status' => '1001',
				    'wc_d_reason' => 'New Entry',
					'wc_t_created_by' => $this->session->userdata('wc_u_code'),
					'wc_t_created_on' => $objDate->format('Y-m-d H:i:s'),
					'wc_t_updated_by' => $this->session->userdata('wc_u_code'),
					'wc_t_updated_on' => $objDate->format('Y-m-d H:i:s'),
				);
			    //echo "<pre>"; print_r($technician_history); exit;
				$insert_technician_history = $this->Home_model->insertData('db', 'wc_technicians_history', $technician_history);
			    //echo "<pre>"; print_r($insert_technician_history); exit;
				
                redirect('technicians');
			}
		}
		
		$this->load->view('technician_create', $data);
	}
	public function technicianstatuschange(){
	    $data = array();
        date_default_timezone_set('Asia/Kolkata');
        $objDate = new DateTime();
	    //echo "<pre>"; print_r($_POST); exit;
        
        if($this->User_Auth()) {} else {
			redirect('');
		}
		
		//print_r($this->session->userdata());
        
        if($this->input->post('technicianactivestatus') == '1001'){ $technicianactivestatus = '1002'; $wc_t_reason = 'Inactive'; } elseif($this->input->post('technicianactivestatus') == '1002'){ $technicianactivestatus = '1001'; $wc_t_reason = 'Active'; } else{ }
	    
	    $technicianstatuschange = array(
			'wc_t_status' => $technicianactivestatus,
			'wc_t_updated_by' => $this->session->userdata('wc_u_code'),
			'wc_t_updated_on' => $objDate->format('Y-m-d H:i:s'),
		);
		//echo "<pre>"; print_r($technicianstatuschange); exit;
        $where = 'wc_t_code  = "'.$this->input->post('technicianactiveid').'"';
        $this->Home_model->updateData('db', 'wc_technicians', $technicianstatuschange, $where);
        
        //Get old technician info
        $getdata = '*';
        $where = 'wc_t_code  = "'.$this->input->post('technicianactiveid').'"';
	    $data['oldinfodoctor'] = $this->Home_model->getData('db', 'wc_technicians', $getdata, $where, '', '', '', '');
	    //echo "<pre>"; print_r($data['oldinfodoctor']); exit;
        
        //insert doctor history
	    $technician_history = array(
	        'wc_t_id' => $data['oldinfodoctor'][0]['wc_t_id'],
		    'wc_t_code' => $data['oldinfodoctor'][0]['wc_t_code'],
			'wc_t_name' => $data['oldinfodoctor'][0]['wc_t_name'],
			'wc_t_email' => $data['oldinfodoctor'][0]['wc_t_email'],
			'wc_t_mobile' => $data['oldinfodoctor'][0]['wc_t_mobile'],
			'wc_t_status' => $technicianactivestatus,
			'wc_t_reason' => 'Status change-'.$wc_t_reason,
			'wc_t_created_by' => $data['oldinfodoctor'][0]['wc_t_created_by'],
			'wc_t_created_on' => $data['oldinfodoctor'][0]['wc_t_created_on'],
			'wc_t_updated_by' => $this->session->userdata('wc_u_code'),
			'wc_t_updated_on' => $objDate->format('Y-m-d H:i:s'),
		);
	    //echo "<pre>"; print_r($technician_history); exit;
		$insert_technician_history = $this->Home_model->insertData('db', 'wc_technicians_history', $technician_history);
	    //echo "<pre>"; print_r($insert_technician_history); exit;
	}
	public function organizers(){
		$data = array();
		date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		
		if($this->User_Auth()) {} else {
			redirect('login');
		}
		
		$data['clear'] = 'organizers';
		$data['active'] = 'organizers';
		
		$tableA = 'wc_organizer_maping';
		$tableB = 'wc_divisions';
		$key1 = 'wc_di_code';
		$key2 = 'wc_di_code';
		$tableC = 'wc_organizers';
		$key3 = 'wc_o_code';
		$key4 = 'wc_o_code';
		$tableD = '';
		$key5 = '';
		$key6 = '';
		$tableE = '';
		$key7 = '';
		$key8 = '';
		$tableF= '';
		$key9 = '';
		$key10 = '';
		$tableG= '';
		$key11 = '';
		$key12 = '';
		$getdata = '';
		//A.wc_o_name,A.wc_o_email,B.wc_d_code,B.wc_d_name
		$groupBy = '';
		if($this->input->post('search')){
            //echo "<pre>"; print_r($_POST); exit;
            $where = 'A.wc_d_code = "'.$this->input->post('wc_d_code').'"';
            
                //Get division info//
                $getdata = '*';
            	$where_division_info = 'wc_d_code = "'.$this->input->post('wc_d_code').'"';
            	$data['divisioninfo'] = $this->Home_model->getData('db', 'wc_divisions', $getdata,  $where_division_info,'','','','');
                //print_r($data['divisioninfo']); exit;
                
                $data['wc_d_code'] = $data['divisioninfo'][0]['wc_d_code'];
                $data['wc_d_name'] = $data['divisioninfo'][0]['wc_d_name'];
                //End Get division info//
        }
        else{
            $where = '';
        }
		$data['organizerlist'] = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', '', '', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy);

		$getdata = '*';
    	$where = 'wc_di_status = "1001"';
    	$data['divisionslist'] = $this->Home_model->getData('db', 'wc_divisions', $getdata,  $where,'','wc_di_name','ASC','');
		
		//echo "<pre>"; print_r($data); exit;
		$this->load->view('organizers', $data);
	}
	public function organizer_create(){
		$data = array();
		date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
        
        if($this->User_Auth()) {} else {
			redirect('login');
		}
		
		$this->load->helper('string');	
		$wc_o_code = random_string('nozero',10);
		
		//Retrieving all session data
        $session_data = $this->session->userdata();
        //echo "<pre>"; print_r($session_data);

		if($this->input->post('submit')){
			//echo "<pre>"; print_r($_POST); //exit;
			
			//Validation
			$this->form_validation->set_rules('wc_o_name','Please enter organizer name','trim|required|min_length[3]|max_length[200]');
			$this->form_validation->set_rules('wc_o_email','Please enter organizer email','trim|required');
			$this->form_validation->set_rules('wc_o_mobile','Please enter organizer mobile','trim|required');
			$this->form_validation->set_rules('wc_di_code','Please select division','required');

			if($this->form_validation->run()==False){
				//echo "Validation Bad"; exit;
				$message = array('error' => "Validation Error");
				echo json_encode($message);
			}
			else{
				//echo "Validation Good"; exit;
				$organizer = array(
				    'wc_o_code' => $wc_o_code,
					'wc_o_name' => $this->input->post('wc_o_name'),
					'wc_o_email' => $this->input->post('wc_o_email'),
					'wc_o_mobile' => $this->input->post('wc_o_mobile'),
					'wc_o_status' => '1001',
					'wc_o_created_by' => $this->input->post('wc_u_code'),
					'wc_o_created_on' => $objDate->format('Y-m-d H:i:s'),
					'wc_o_updated_by' => $this->input->post('wc_u_code'),
					'wc_o_updated_on' => $objDate->format('Y-m-d H:i:s')
				);
				//echo "<pre>"; print_r($organizer); exit;
				$insert_organizer = $this->Home_model->insertData('db', 'wc_organizers', $organizer);
				
				//insert organizer history
				$organizer_history = array(
				    'wc_o_id' => $insert_organizer,
				    'wc_o_code' => $wc_o_code,
					'wc_o_name' => $this->input->post('wc_o_name'),
					'wc_o_email' => $this->input->post('wc_o_email'),
					'wc_o_mobile' => $this->input->post('wc_o_mobile'),
					'wc_o_status' => '1001',
					'wc_o_reason' => 'New Entry',
					'wc_o_created_by' => $this->input->post('wc_u_code'),
					'wc_o_created_on' => $objDate->format('Y-m-d H:i:s'),
					'wc_o_updated_by' => $this->input->post('wc_u_code'),
					'wc_o_updated_on' => $objDate->format('Y-m-d H:i:s')
				);
				//echo "<pre>"; print_r($organizer_history); exit;
				$insert_organizer_history = $this->Home_model->insertData('db', 'wc_organizers_history', $organizer_history);
				//echo $insert_organizer_history; exit;
				
				//Division to organizer maping
				$organizer_maping = array(
				    'wc_o_code' => $wc_o_code,
				    'wc_di_code' => $this->input->post('wc_di_code'),
					'wc_om_status' => '1001',
					'wc_om_created_by' => $this->session->userdata('wc_u_code'),
					'wc_om_created_on' => $objDate->format('Y-m-d H:i:s'),
					'wc_om_updated_by' => $this->session->userdata('wc_u_code'),
					'wc_om_updated_on' => $objDate->format('Y-m-d H:i:s'),
				);
				$insert_organizer_maping = $this->Home_model->insertData('db', 'wc_organizer_maping', $organizer_maping);
				//echo $insert_organizer_maping; exit;
				
                redirect('organizers');
			}
		}
		
		$getdata = '*';
    	$where = 'wc_di_status = "1001"';
    	$data['divisionlist'] = $this->Home_model->getData('db', 'wc_divisions', $getdata,  $where,'','','','');
		
		$this->load->view('organizer_create', $data);
	}
	public function organizerstatuschange(){
	    $data = array();
        date_default_timezone_set('Asia/Kolkata');
        $objDate = new DateTime();
	    //echo "<pre>"; print_r($_POST); exit;
        
        if($this->User_Auth()) {} else {
			redirect('');
		}
		
		//print_r($this->session->userdata());
        
        if($this->input->post('oactivestatus') == '1001'){ $oactivestatus = '1002'; $wc_o_reason = 'Inactive'; } elseif($this->input->post('oactivestatus') == '1002'){ $oactivestatus = '1001'; $wc_o_reason = 'Active'; } else{ }
	    
	    $ostatuschange = array(
			'wc_o_status' => $oactivestatus,
			'wc_o_updated_by' => $this->session->userdata('wc_u_code'),
			'wc_o_updated_on' => $objDate->format('Y-m-d H:i:s'),
		);
		//echo "<pre>"; print_r($technicianstatuschange); exit;
        $where = 'wc_o_code  = "'.$this->input->post('oactiveid').'"';
        $this->Home_model->updateData('db', 'wc_organizers', $ostatuschange, $where);
        
        //Get old technician info
        $getdata = '*';
        $where = 'wc_o_code  = "'.$this->input->post('oactiveid').'"';
	    $data['oldinfoorganizer'] = $this->Home_model->getData('db', 'wc_organizers', $getdata, $where, '', '', '', '');
	    //echo "<pre>"; print_r($data['oldinfoorganizer']); exit;
        
        //insert doctor history
	    $organizer_history = array(
	        'wc_o_id' => $data['oldinfoorganizer'][0]['wc_o_id'],
		    'wc_o_code' => $data['oldinfoorganizer'][0]['wc_o_code'],
			'wc_o_name' => $data['oldinfoorganizer'][0]['wc_o_name'],
			'wc_o_email' => $data['oldinfoorganizer'][0]['wc_o_email'],
			'wc_o_mobile' => $data['oldinfoorganizer'][0]['wc_o_mobile'],
			'wc_o_status' => $oactivestatus,
			'wc_o_reason' => 'Status change-'.$wc_o_reason,
			'wc_o_created_by' => $data['oldinfoorganizer'][0]['wc_o_created_by'],
			'wc_o_created_on' => $data['oldinfoorganizer'][0]['wc_o_created_on'],
			'wc_o_updated_by' => $this->session->userdata('wc_u_code'),
			'wc_o_updated_on' => $objDate->format('Y-m-d H:i:s'),
		);
	    //echo "<pre>"; print_r($organizer_history); exit;
		$insert_organizer_history = $this->Home_model->insertData('db', 'wc_organizers_history', $organizer_history);
	    //echo "<pre>"; print_r($insert_organizer_history); exit;
	}
	public function request_webinar_design(){
		$data = array();	
        date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		$this->load->helper('string');	
		$code = random_string('nozero',10);
		
		//Divisions
		$getdata = 'wc_di_id,wc_di_code,wc_di_name';
		$where = 'wc_di_status = "1001"';
	    $data['divisions'] = $this->Home_model->getData('db', 'wc_divisions', $getdata, $where, '', 'wc_di_name', 'ASC', '');
	   	//echo "<pre>"; print_r($data); exit;
	   	
	   	if($this->input->get('division')){
	   	    //Doctore
	   	    $tableA = 'wc_doctor_maping';
    		$tableB = 'wc_doctors';
    		$key1 = 'wc_d_code';
    		$key2 = 'wc_d_code';
    		$tableC = 'wc_divisions';
    		$key3 = 'wc_di_code';
    		$key4 = 'wc_di_code';
    		$tableD = '';
    		$key5 = '';
    		$key6 = '';
    		$tableE = '';
    		$key7 = '';
    		$key8 = '';
    		$tableF= '';
    		$key9 = '';
    		$key10 = '';
    		$tableG= '';
    		$key11 = '';
    		$key12 = '';
    		$getdata = 'B.wc_d_code,B.wc_d_name,B.wc_d_position,B.wc_d_education,B.wc_d_location';
    		$groupBy ='';
            $where = 'A.wc_dm_status = "1001" AND B.wc_d_status = "1001" AND A.wc_di_code = "'.$this->input->get('division').'"';
    		//$where = '';
    		$data['doctors'] = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', '', '', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy);
    	    //echo "<pre>"; print_r($data); exit;
	   	}
	   	else{
	   	    $data['doctors'] = '';
	   	}
	   	
		$this->load->view('request_webinar_design', $data);
	}
	
	
	public function get_speaker_lead(){
	    //echo "<pre>"; print_r($_POST); exit;
	    $tableA = 'wc_doctor_maping';
		$tableB = 'wc_doctors';
		$key1 = 'wc_d_code';
		$key2 = 'wc_d_code';
		$tableC = 'wc_divisions';
		$key3 = 'wc_di_code';
		$key4 = 'wc_di_code';
		$tableD = '';
		$key5 = '';
		$key6 = '';
		$tableE = '';
		$key7 = '';
		$key8 = '';
		$tableF= '';
		$key9 = '';
		$key10 = '';
		$tableG= '';
		$key11 = '';
		$key12 = '';
		$getdata = 'B.wc_d_code,B.wc_d_name,B.wc_d_position,B.wc_d_education,B.wc_d_location';
		$groupBy ='';
        $where = 'A.wc_dm_status = "1001" AND B.wc_d_status = "1001" AND A.wc_di_code = "'.$this->input->post('wc_di_code').'"';
		//$where = '';
		$data = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', '', '', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy);
	    //echo "<pre>"; print_r($data); exit;
	    echo json_encode($data);
	}
	public function get_speaker_guest(){
	    //echo "<pre>"; print_r($_POST); exit;
	    $tableA = 'wc_doctor_maping';
		$tableB = 'wc_doctors';
		$key1 = 'wc_d_code';
		$key2 = 'wc_d_code';
		$tableC = 'wc_divisions';
		$key3 = 'wc_di_code';
		$key4 = 'wc_di_code';
		$tableD = '';
		$key5 = '';
		$key6 = '';
		$tableE = '';
		$key7 = '';
		$key8 = '';
		$tableF= '';
		$key9 = '';
		$key10 = '';
		$tableG= '';
		$key11 = '';
		$key12 = '';
		$groupBy ='';
		$getdata = 'B.wc_d_code,B.wc_d_name,B.wc_d_position,B.wc_d_education,B.wc_d_location';
        $where = 'A.wc_dm_status = "1001" AND B.wc_d_status = "1001" AND A.wc_di_code = "'.$this->input->post('wc_di_code').'" AND B.wc_d_code != "'.$this->input->post('wc_d_code_lead').'"';
		$data = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', '', '', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy);
	    //echo "<pre>"; print_r($data); exit;
	    echo json_encode($data);
	}
	public function get_moderator_primary(){
	    //echo "<pre>"; print_r($_POST); exit;
	    $tableA = 'wc_speaker_maping';
		$tableB = 'wc_speakers';
		$key1 = 'wc_s_code';
		$key2 = 'wc_s_code';
		$tableC = 'wc_divisions';
		$key3 = 'wc_d_code';
		$key4 = 'wc_d_code';
		$tableD = '';
		$key5 = '';
		$key6 = '';
		$tableE = '';
		$key7 = '';
		$key8 = '';
		$tableF= '';
		$key9 = '';
		$key10 = '';
		$tableG= '';
		$key11 = '';
		$key12 = '';
		$getdata = 'B.wc_s_code,B.wc_s_name,B.wc_s_position,B.wc_s_education,B.wc_s_location';
		$groupBy = '';
        $where = 'A.wc_sm_status = "1001" AND B.wc_s_status = "1001" AND A.wc_d_code = "'.$this->input->post('wc_d_code').'"';
		$data = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', 'B.wc_s_name', 'ASC', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy);
	    //echo "<pre>"; print_r($data); exit;
	    echo json_encode($data);
	}
	public function get_moderator_secondary(){
	    //echo "<pre>"; print_r($_POST); //exit;
	    
	    $tableA = 'wc_speaker_maping';
		$tableB = 'wc_speakers';
		$key1 = 'wc_s_code';
		$key2 = 'wc_s_code';
		$tableC = 'wc_divisions';
		$key3 = 'wc_d_code';
		$key4 = 'wc_d_code';
		$tableD = '';
		$key5 = '';
		$key6 = '';
		$tableE = '';
		$key7 = '';
		$key8 = '';
		$tableF= '';
		$key9 = '';
		$key10 = '';
		$tableG= '';
		$key11 = '';
		$key12 = '';
		$getdata = 'B.wc_s_code,B.wc_s_name,B.wc_s_position,B.wc_s_education,B.wc_s_location';
		$groupBy = '';
		$where = 'A.wc_sm_status = "1001" AND B.wc_s_status = "1001" AND A.wc_d_code = "'.$this->input->post('wc_d_code').'" AND B.wc_s_code != "'.$this->input->post('wc_s_code_moderator_primary').'"';
		$data = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', 'B.wc_s_name', 'ASC', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy);
	    //echo "<pre>"; print_r($data); exit;
	    
	    echo json_encode($data);
	}
	public function request_webinar_submission(){
	    //echo "<pre>"; print_r($_POST); exit;
	    $data = array();
		date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		$this->load->helper('string');
        
		if($this->input->post('wc_w_event') == "NEW"){
		    //echo "NEW"; exit;
		    
		    if(empty($this->session->userdata('wc_u_code'))){
		        $wc_u_code = $this->input->post('wc_o_empid');
		    }
		    else{
		        $wc_u_code = $this->session->userdata('wc_u_code');
		    }

		    $wc_w_code = random_string('nozero',10);
    	    $wc_di_code = $this->input->post('wc_di_code');
    	
    		$wc_w_datetime = $this->input->post('wc_w_datetime');
    		//echo $wc_w_datetime; exit;
    		// Example value: '2024/9/18 06:00 PM - 2024/9/18 06:00 PM'
    		// Split the string into start and end using ' - ' as the delimiter
    		$date_time_parts = explode(' - ', $wc_w_datetime);
    		// Extract start date and time
    		$start_date_time = $date_time_parts[0];
    		// Extract end date and time
    		$end_date_time = $date_time_parts[1];
    		
    		// Split start date and time
            $start_parts = explode(' ', $start_date_time);
            $start_date = $start_parts[0]; // '2024/9/18'
            $start_time_12h = $start_parts[1] . ' ' . $start_parts[2]; // '06:00 PM'
            
            // Split end date and time
            $end_parts = explode(' ', $end_date_time);
            $end_date = $end_parts[0]; // '2024/9/18'
            $end_time_12h = $end_parts[1] . ' ' . $end_parts[2]; // '06:00 PM'
            
            // Convert start time to 24-hour format
            $start_time_24h = DateTime::createFromFormat('h:i A', $start_time_12h)->format('H:i:s');
            
            // Convert end time to 24-hour format
            $end_time_24h = DateTime::createFromFormat('h:i A', $end_time_12h)->format('H:i:s');
            
            
            // Further split dates to extract year, month, and day
            $start_date_components = explode('/', $start_date);
            $start_year = $start_date_components[0]; // '2024'
            $start_month = $start_date_components[1]; // '9'
            $start_day = $start_date_components[2]; // '18'
            
            $end_date_components = explode('/', $end_date);
            $end_year = $end_date_components[0]; // '2024'
            $end_month = $end_date_components[1]; // '9'
            $end_day = $end_date_components[2]; // '18'
    
            $wc_w_date = $start_year.'-'.$start_month.'-'.$start_day; //2020-11-28
            $wc_w_stime = $start_time_24h; //19:00:00
            $wc_w_etime = $end_time_24h; //20:00:00
		    
    		//Requester
    		if($this->input->post('wc_o_name') == "other"){
    		    
    		    $this->form_validation->set_rules('wc_d_new_requester_name','Please enter requester name','trim|required');
    		    $this->form_validation->set_rules('wc_d_new_requester_email','Please enter requester name','trim|required');
                
                if($this->form_validation->run()==False){
        			$message = array('error' => "Validation Erroer");
        			echo "Requester";
        		    echo json_encode($message); exit;
        		}
        		else{
        		    $wc_o_code = random_string('nozero',10);
        		    $create_requester = array(
            		    'wc_d_code' => $wc_d_code,
            			'wc_o_name' => $this->input->post('wc_d_new_requester_name'),
            			'wc_o_email' => $this->input->post('wc_d_new_requester_email'),
            			'wc_o_status' => "1001",
            			'wc_o_code' => $wc_o_code,
            			'wc_o_created_by' => 'Guest',
            			'wc_o_created_on' => $objDate->format('Y-m-d H:i:s'),
            			'wc_o_updated_by' => 'Guest',
            			'wc_o_updated_on' => $objDate->format('Y-m-d H:i:s')
            		);    
            		//echo "<pre>"; print_r($request_webinar); exit;
            		$insert_request_requester = $this->Home_model->insertData('db', 'wc_organizers', $create_requester);
    		        //echo $insert_request_requester; exit;
    		        
    		        $getdata = 'wc_o_code';
            		$where = 'wc_o_id = "'.$insert_request_requester.'"';
            	    $get_organizer = $this->Home_model->getData('db', 'wc_organizers', $getdata, $where, '', '', '', '');
            	
            	    $wc_w_requester = $get_organizer[0]['wc_o_code'];
        		}
    		}
    		else{
    		    $wc_o_name = $this->input->post('wc_o_name');
    		}
    		//Lead Speaker
    		if($this->input->post('wc_d_code_lead') == "other"){
    		    $wc_d_lead_doctor = random_string('nozero',10);
    		    //echo "<pre>"; print_r($_FILES); //exit;
    		    $uploadPath_wc_d_display_photo_lead = 'uploads/doctors/';
    		    if(empty($_FILES["wc_d_display_photo_lead"]["name"])) { $wc_d_display_photo_lead = "null"; } else{
    		        $file_ext = pathinfo($_FILES["wc_d_display_photo_lead"]["name"], PATHINFO_EXTENSION);
                    $wc_d_display_photo_lead = $wc_d_lead_doctor.'_'.$objDate->format('YmdHis').'.'.$file_ext;
                    $config1['upload_path'] = $uploadPath_wc_d_display_photo_lead;
                    $config1['allowed_types'] = 'png|jpg|jpeg|bmp';
                    $config1['max_size'] = 500000;
                    //$config1['max_width'] = 1024;
                    //$config1['max_height'] = 800;
                    //$config1['overwrite'] = TRUE;
                    $config1['file_name'] = $wc_d_display_photo_lead;
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
        			if(!$this->upload->do_upload('wc_d_display_photo_lead')){
        			    //echo "<pre>"; print_r($error); exit;
        				$error = array('error' => $this->upload->display_errors());
        				//echo "Attachment";
        			}
        			else{
        				$data1 = array('upload_data' => $this->upload->data());
        				//echo "<pre>"; print_r($data1); exit;
        				$wc_d_display_photo_lead = $wc_d_display_photo_lead;

            		    $this->form_validation->set_rules('wc_d_name_lead','','required');
        				$this->form_validation->set_rules('wc_d_email_lead','','required');
        				$this->form_validation->set_rules('wc_d_contact_lead','','required');
        				$this->form_validation->set_rules('wc_d_hospital_lead','','required');
        				$this->form_validation->set_rules('wc_d_position_lead','','required');
        				$this->form_validation->set_rules('wc_d_education_lead','','required');
        				$this->form_validation->set_rules('wc_d_location_lead','','required');
        				$this->form_validation->set_rules('wc_d_headquaters_lead','','required');
        				$this->form_validation->set_rules('wc_d_code_sap_lead','','required');
        				
        				if($this->form_validation->run()==False){
                			$message = array('error' => "Validation Erroer");
                			echo "Lead Speaker Validation Error";
                		    echo json_encode($message); exit;
                		}
                		else{
                		    $create_lead_doctor = array(
                    		    'wc_d_code' => $wc_d_lead_doctor,
                    		    'wc_d_code_sap' => $this->input->post('wc_d_code_sap_lead'),
                    			'wc_d_name' => $this->input->post('wc_d_name_lead'),
                    			'wc_d_email' => $this->input->post('wc_d_email_lead'),
                    			'wc_d_contact' => $this->input->post('wc_d_contact_lead'),
                    			'wc_d_hospital' => $this->input->post('wc_d_hospital_lead'),
                    			'wc_d_display_photo' => $wc_d_display_photo_lead,
                    			'wc_d_position' => $this->input->post('wc_d_position_lead'),
                    			'wc_d_education' => $this->input->post('wc_d_education_lead'),
                    			'wc_d_location' => $this->input->post('wc_d_location_lead'),
                    			'wc_d_headquaters' => $this->input->post('wc_d_headquaters_lead'),
                    			'wc_d_status' => "1001",
                    			'wc_d_created_by' => $wc_u_code,
                    			'wc_d_created_on' => $objDate->format('Y-m-d H:i:s'),
                    			'wc_d_updated_by' => $wc_u_code,
                    			'wc_d_updated_on' => $objDate->format('Y-m-d H:i:s')
                    		);    
                    		//echo "<pre>"; print_r($create_lead_doctor); exit;
                    		$insert_lead_doctor = $this->Home_model->insertData('db', 'wc_doctors', $create_lead_doctor);
            		        //echo $insert_lead_doctor; exit;
            		        
            		        $getdata = 'wc_d_code';
                    		$where = 'wc_d_id = "'.$insert_lead_doctor.'"';
                    	    $get_doctor_lead = $this->Home_model->getData('db', 'wc_doctors', $getdata, $where, '', '', '', '');
                    	    //print_r($get_doctor_lead); exit;
                    	
                    	    $wc_d_code_lead = $get_doctor_lead[0]['wc_d_code'];
            		        
            		        //insert doctor history
            			    $create_lead_doctor_history = array(
            			        'wc_d_id' => $insert_lead_doctor,
            				    'wc_d_code' => $wc_d_lead_doctor,
            				    'wc_d_code_sap' => $this->input->post('wc_d_code_sap_lead'),
            					'wc_d_name' => $this->input->post('wc_d_name_lead'),
            					'wc_d_email' => $this->input->post('wc_d_email_lead'),
            					'wc_d_contact' => $this->input->post('wc_d_contact_lead'),
            					'wc_d_hospital' => $this->input->post('wc_d_hospital_lead'),
            					'wc_d_display_photo' => $wc_d_display_photo_lead,
            					'wc_d_position' => $this->input->post('wc_d_position_lead'),
            					'wc_d_education' => $this->input->post('wc_d_education_lead'),
            					'wc_d_location' => $this->input->post('wc_d_location_lead'),
            					'wc_d_headquaters' => $this->input->post('wc_d_headquaters_lead'),
            					'wc_d_status' => '1001',
            					'wc_d_reason' => 'New Entry',
            					'wc_d_created_by' => $wc_u_code,
            					'wc_d_created_on' => $objDate->format('Y-m-d H:i:s'),
            					'wc_d_updated_by' => $wc_u_code,
            					'wc_d_updated_on' => $objDate->format('Y-m-d H:i:s'),
            				);
            			    //echo "<pre>"; print_r($create_lead_doctor_history); exit;
            				$insert_lead_doctor_history = $this->Home_model->insertData('db', 'wc_doctors_history', $create_lead_doctor_history);
            			    //echo "<pre>"; print_r($insert_lead_doctor_history); exit;
            			    
            				//Division to doctor maping
            				$doctor_maping = array(
            				    'wc_d_code' => $wc_d_lead_doctor,
            				    'wc_di_code' => $this->session->userdata('wc_di_code'),
            					'wc_dm_status' => '1001',
            					'wc_dm_created_by' => $wc_u_code,
            					'wc_dm_created_on' => $objDate->format('Y-m-d H:i:s'),
            					'wc_dm_updated_by' => $wc_u_code,
            					'wc_dm_updated_on' => $objDate->format('Y-m-d H:i:s'),
            				);
            				$insert_doctor_maping = $this->Home_model->insertData('db', 'wc_doctor_maping', $doctor_maping);
            				//echo $insert_doctor_maping; exit;
                		}
                		
        			}
                }
    		}
    		else{
    		    $wc_d_code_lead = $this->input->post('wc_d_code_lead');
    		}
    		//Guest Speaker
    		if($this->input->post('add_guest_speaker_check') == "on"){
    		    if($this->input->post('wc_d_code_guest') == "other"){
    		        $wc_d_guest_doctor = random_string('nozero',10);
    		        
    		        //echo "<pre>"; print_r($_POST); 
    		        //echo "<pre>"; print_r($_FILES); exit;
        		    $uploadPath_wc_d_display_photo_guest = 'uploads/doctors/';
        		    if(empty($_FILES["wc_d_display_photo_guest"]["name"])) { $wc_d_display_photo_guest = "null"; } else{
        		        $file_ext = pathinfo($_FILES["wc_d_display_photo_guest"]["name"], PATHINFO_EXTENSION);
                        $wc_d_display_photo_guest = $wc_d_guest_doctor.'_'.$objDate->format('YmdHis').'.'.$file_ext;
                        $config2['upload_path'] = $uploadPath_wc_d_display_photo_guest;
                        $config2['allowed_types'] = 'png|jpg|jpeg|bmp';
                        $config2['max_size'] = 500000;
                        //$config2['max_width'] = 1024;
                        //$config2['max_height'] = 800;
                        //$config2['overwrite'] = TRUE;
                        $config2['file_name'] = $wc_d_display_photo_guest;
                        $this->load->library('upload', $config2);
                        $this->upload->initialize($config2);
            			if(!$this->upload->do_upload('wc_d_display_photo_guest')){
            				$error = array('error' => $this->upload->display_errors());
            				//echo "Attachment";
            				//echo "<pre>"; print_r($error); exit;
            			}
            			else{
            				$data2 = array('upload_data' => $this->upload->data());
            				//echo "<pre>"; print_r($data2); exit;
            				$wc_d_display_photo_guest = $wc_d_display_photo_guest;
            				
            				$this->form_validation->set_rules('wc_d_name_guest','','required');
            				$this->form_validation->set_rules('wc_d_email_guest','','required');
            				$this->form_validation->set_rules('wc_d_contact_guest','','required');
            				$this->form_validation->set_rules('wc_d_hospital_guest','','required');
            				$this->form_validation->set_rules('wc_d_position_guest','','required');
            				$this->form_validation->set_rules('wc_d_education_guest','','required');
            				$this->form_validation->set_rules('wc_d_location_guest','','required');
            				$this->form_validation->set_rules('wc_d_headquaters_guest','','required');
            				$this->form_validation->set_rules('wc_d_code_sap_guest','','required');

                		    if($this->form_validation->run()==False){
                    			$message = array('error' => "Validation Erroer");
                    			echo "Guest Speaker Validation Error";
                    		    echo json_encode($message); exit;
                    		}
                    		else{
                    		    //echo "Guest Speaker Validation Good"; exit;
                    		    $create_guest_doctor = array(
                        		    'wc_d_code' => $wc_d_guest_doctor,
                        		    'wc_d_code_sap' => $this->input->post('wc_d_code_sap_guest'),
                        			'wc_d_name' => $this->input->post('wc_d_name_guest'),
                        			'wc_d_email' => $this->input->post('wc_d_email_guest'),
                        			'wc_d_contact' => $this->input->post('wc_d_contact_guest'),
                        			'wc_d_hospital' => $this->input->post('wc_d_hospital_guest'),
                        			'wc_d_display_photo' => $wc_d_display_photo_guest,
                        			'wc_d_position' => $this->input->post('wc_d_position_guest'),
                        			'wc_d_education' => $this->input->post('wc_d_education_guest'),
                        			'wc_d_location' => $this->input->post('wc_d_location_guest'),
                        			'wc_d_headquaters' => $this->input->post('wc_d_headquaters_guest'),
                        			'wc_d_status' => "1001",
                        			'wc_d_created_by' => $wc_u_code,
                        			'wc_d_created_on' => $objDate->format('Y-m-d H:i:s'),
                        			'wc_d_updated_by' => $wc_u_code,
                        			'wc_d_updated_on' => $objDate->format('Y-m-d H:i:s')
                        		);    
                        		//echo "<pre>"; print_r($create_guest_doctor); exit;
                        		$insert_guest_doctor = $this->Home_model->insertData('db', 'wc_doctors', $create_guest_doctor);
                		        //echo $insert_guest_doctor; exit;
                		        
                		        $getdata = 'wc_d_code';
                        		$where = 'wc_d_id = "'.$insert_guest_doctor.'"';
                        	    $get_doctor_guest = $this->Home_model->getData('db', 'wc_doctors', $getdata, $where, '', '', '', '');
                        	    //print_r($get_doctor_guest); exit;
                        	
                        	    $wc_d_code_guest = $get_doctor_guest[0]['wc_d_code'];

                		        //insert doctor history
                			    $create_guest_doctor_history = array(
                			        'wc_d_id' => $insert_guest_doctor,
                				    'wc_d_code' => $wc_d_code_guest,
                				    'wc_d_code_sap' => $this->input->post('wc_d_code_sap_guest'),
                					'wc_d_name' => $this->input->post('wc_d_name_guest'),
                					'wc_d_email' => $this->input->post('wc_d_email_guest'),
                					'wc_d_contact' => $this->input->post('wc_d_contact_guest'),
                					'wc_d_hospital' => $this->input->post('wc_d_hospital_guest'),
                					'wc_d_display_photo' => $wc_d_display_photo_guest,
                					'wc_d_position' => $this->input->post('wc_d_position_guest'),
                					'wc_d_education' => $this->input->post('wc_d_education_guest'),
                					'wc_d_location' => $this->input->post('wc_d_location_guest'),
                					'wc_d_headquaters' => $this->input->post('wc_d_headquaters_guest'),
                					'wc_d_status' => '1001',
                					'wc_d_reason' => 'New Entry',
                					'wc_d_created_by' => $wc_u_code,
                					'wc_d_created_on' => $objDate->format('Y-m-d H:i:s'),
                					'wc_d_updated_by' => $wc_u_code,
                					'wc_d_updated_on' => $objDate->format('Y-m-d H:i:s'),
                				);
                			    //echo "<pre>"; print_r($create_guest_doctor_history); exit;
                				$insert_guest_doctor_history = $this->Home_model->insertData('db', 'wc_doctors_history', $create_guest_doctor_history);
                			    //echo "<pre>"; print_r($insert_guest_doctor_history); exit;
                			    
                				//Division to doctor maping
                				$doctor_maping = array(
                				    'wc_d_code' => $wc_d_code_guest,
                				    'wc_di_code' => $this->input->post('wc_di_code'),
                					'wc_dm_status' => '1001',
                					'wc_dm_created_by' => $wc_u_code,
                					'wc_dm_created_on' => $objDate->format('Y-m-d H:i:s'),
                					'wc_dm_updated_by' => $wc_u_code,
                					'wc_dm_updated_on' => $objDate->format('Y-m-d H:i:s'),
                				);
                				$insert_doctor_maping = $this->Home_model->insertData('db', 'wc_doctor_maping', $doctor_maping);
                				//echo $insert_doctor_maping; exit;
                    		}
            			}
                    }
    		    }
    		    else{
    		        $wc_d_code_guest = $this->input->post('wc_d_code_guest');
    		    }
    		}
    		else{
    		    $wc_d_code_guest = null;
    		}
    		//Primary Moderator Other
    	    if($this->input->post('wc_d_code_moderator_primary') == "other"){
    		    $wc_d_code_primary = random_string('nozero',10);
    		    //echo "<pre>"; print_r($_POST); //exit;
    		    //echo "<pre>"; print_r($_FILES); exit;
    		    //echo "Primary Moderator Other"; exit;
                $uploadPath_wc_d_display_photo_primary = 'uploads/doctors/';
    		    if(empty($_FILES["wc_d_display_photo_primary"]["name"])) { $wc_d_display_photo_primary = "null"; } else{
    		        $file_ext = pathinfo($_FILES["wc_d_display_photo_primary"]["name"], PATHINFO_EXTENSION);
                    $wc_d_display_photo_primary = $wc_d_code_primary.'_'.$objDate->format('YmdHis').'.'.$file_ext;
                    $config1['upload_path'] = $uploadPath_wc_d_display_photo_primary;
                    $config1['allowed_types'] = 'png|jpg|jpeg|bmp';
                    $config1['max_size'] = 500000;
                    //$config1['max_width'] = 1024;
                    //$config1['max_height'] = 800;
                    //$config1['overwrite'] = TRUE;
                    $config1['file_name'] = $wc_d_display_photo_primary;
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
        			if(!$this->upload->do_upload('wc_d_display_photo_primary')){
        			    echo "<pre>"; print_r($error); exit;
        				$error = array('error' => $this->upload->display_errors());
        				//echo "Attachment";
        			}
        			else{
        				$data1 = array('upload_data' => $this->upload->data());
        				//echo "<pre>"; print_r($data1); exit;
        				$wc_d_display_photo_primary = $wc_d_display_photo_primary;

            		    $this->form_validation->set_rules('wc_d_name_primary','','required');
        				$this->form_validation->set_rules('wc_d_email_primary','','required');
        				$this->form_validation->set_rules('wc_d_contact_primary','','required');
        				$this->form_validation->set_rules('wc_d_hospital_primary','','required');
        				$this->form_validation->set_rules('wc_d_position_primary','','required');
        				$this->form_validation->set_rules('wc_d_education_primary','','required');
        				$this->form_validation->set_rules('wc_d_location_primary','','required');
        				$this->form_validation->set_rules('wc_d_headquaters_primary','','required');
        				$this->form_validation->set_rules('wc_d_code_sap_primary','','required');
        				
        				if($this->form_validation->run()==False){
                			$message = array('error' => "Validation Erroer");
                			echo "Primary Moderator Validation Error";
                		    echo json_encode($message); exit;
                		}
                		else{
                		    //echo "Primary Moderator Validation Good"; exit;
                		    $create_primary_doctor = array(
                    		    'wc_d_code' => $wc_d_code_primary,
                    		    'wc_d_code_sap' => $this->input->post('wc_d_code_sap_primary'),
                    			'wc_d_name' => $this->input->post('wc_d_name_primary'),
                    			'wc_d_email' => $this->input->post('wc_d_email_primary'),
                    			'wc_d_contact' => $this->input->post('wc_d_contact_primary'),
                    			'wc_d_hospital' => $this->input->post('wc_d_hospital_primary'),
                    			'wc_d_display_photo' => $wc_d_display_photo_primary,
                    			'wc_d_position' => $this->input->post('wc_d_position_primary'),
                    			'wc_d_education' => $this->input->post('wc_d_education_primary'),
                    			'wc_d_location' => $this->input->post('wc_d_location_primary'),
                    			'wc_d_headquaters' => $this->input->post('wc_d_headquaters_primary'),
                    			'wc_d_status' => "1001",
                    			'wc_d_created_by' => $wc_u_code,
                    			'wc_d_created_on' => $objDate->format('Y-m-d H:i:s'),
                    			'wc_d_updated_by' => $wc_u_code,
                    			'wc_d_updated_on' => $objDate->format('Y-m-d H:i:s')
                    		);    
                    		//echo "<pre>"; print_r($create_primary_doctor); exit;
                    		$insert_primary_doctor = $this->Home_model->insertData('db', 'wc_doctors', $create_primary_doctor);
            		        //echo $insert_primary_doctor; exit;
            		        
            		        $getdata = 'wc_d_code';
                    		$where = 'wc_d_id = "'.$insert_primary_doctor.'"';
                    	    $get_doctor_primary = $this->Home_model->getData('db', 'wc_doctors', $getdata, $where, '', '', '', '');
                    	    //print_r($get_doctor_primary); exit;
                    	
                    	    $wc_d_code_primary = $get_doctor_primary[0]['wc_d_code'];
            		        
            		        //insert doctor history
            			    $create_primary_doctor_history = array(
            			        'wc_d_id' => $insert_primary_doctor,
            				    'wc_d_code' => $wc_d_code_primary,
            				    'wc_d_code_sap' => $this->input->post('wc_d_code_sap_primary'),
            					'wc_d_name' => $this->input->post('wc_d_name_primary'),
            					'wc_d_email' => $this->input->post('wc_d_email_primary'),
            					'wc_d_contact' => $this->input->post('wc_d_contact_primary'),
            					'wc_d_hospital' => $this->input->post('wc_d_hospital_primary'),
            					'wc_d_display_photo' => $wc_d_display_photo_primary,
            					'wc_d_position' => $this->input->post('wc_d_position_primary'),
            					'wc_d_education' => $this->input->post('wc_d_education_primary'),
            					'wc_d_location' => $this->input->post('wc_d_location_primary'),
            					'wc_d_headquaters' => $this->input->post('wc_d_headquaters_primary'),
            					'wc_d_status' => '1001',
            					'wc_d_reason' => 'New Entry',
            					'wc_d_created_by' => $wc_u_code,
            					'wc_d_created_on' => $objDate->format('Y-m-d H:i:s'),
            					'wc_d_updated_by' => $wc_u_code,
            					'wc_d_updated_on' => $objDate->format('Y-m-d H:i:s'),
            				);
            			    //echo "<pre>"; print_r($create_primary_doctor_history); exit;
            				$insert_primary_doctor_history = $this->Home_model->insertData('db', 'wc_doctors_history', $create_primary_doctor_history);
            			    //echo "<pre>"; print_r($insert_primary_doctor_history); exit;
            				//Division to doctor maping
            				$doctor_maping = array(
            				    'wc_d_code' => $wc_d_code_primary,
            				    'wc_di_code' => $this->input->post('wc_di_code'),
            					'wc_dm_status' => '1001',
            					'wc_dm_created_by' => $wc_u_code,
            					'wc_dm_created_on' => $objDate->format('Y-m-d H:i:s'),
            					'wc_dm_updated_by' => $wc_u_code,
            					'wc_dm_updated_on' => $objDate->format('Y-m-d H:i:s'),
            				);
            				$insert_doctor_maping = $this->Home_model->insertData('db', 'wc_doctor_maping', $doctor_maping);
            				//echo $insert_doctor_maping; exit;
                		}
        			}
                }
    		}
    		else{
    		    $wc_d_code_primary = $this->input->post('wc_d_code_moderator_primary');
    		}
    		//Secondary Moderator
    		if($this->input->post('add_secondary_moderator_check') == "on"){
    		    if($this->input->post('wc_d_code_moderator_guest') == "other"){
    		        $wc_d_code_secondary = random_string('nozero',10);
    		        //echo "<pre>"; print_r($_POST); //exit;
        		    //echo "<pre>"; print_r($_FILES); exit;
        		    //echo "Secondary Moderator Other"; exit;
                    $uploadPath_wc_d_display_photo_secondary = 'uploads/doctors/';
        		    if(empty($_FILES["wc_d_display_photo_secondary"]["name"])) { $wc_d_display_photo_secondary = "null"; } else{
        		        $file_ext = pathinfo($_FILES["wc_d_display_photo_secondary"]["name"], PATHINFO_EXTENSION);
                        $wc_d_display_photo_secondary = $wc_d_code_secondary.'_'.$objDate->format('YmdHis').'.'.$file_ext;
                        $config1['upload_path'] = $uploadPath_wc_d_display_photo_secondary;
                        $config1['allowed_types'] = 'png|jpg|jpeg|bmp';
                        $config1['max_size'] = 500000;
                        //$config1['max_width'] = 1024;
                        //$config1['max_height'] = 800;
                        //$config1['overwrite'] = TRUE;
                        $config1['file_name'] = $wc_d_display_photo_secondary;
                        $this->load->library('upload', $config1);
                        $this->upload->initialize($config1);
            			if(!$this->upload->do_upload('wc_d_display_photo_secondary')){
            			    echo "<pre>"; print_r($error); exit;
            				$error = array('error' => $this->upload->display_errors());
            				//echo "Attachment";
            			}
            			else{
            				$data1 = array('upload_data' => $this->upload->data());
            				//echo "<pre>"; print_r($data1); exit;
            				$wc_d_display_photo_secondary = $wc_d_display_photo_secondary;
    
                		    $this->form_validation->set_rules('wc_d_name_secondary','','required');
            				$this->form_validation->set_rules('wc_d_email_secondary','','required');
            				$this->form_validation->set_rules('wc_d_contact_secondary','','required');
            				$this->form_validation->set_rules('wc_d_hospital_secondary','','required');
            				$this->form_validation->set_rules('wc_d_position_secondary','','required');
            				$this->form_validation->set_rules('wc_d_education_secondary','','required');
            				$this->form_validation->set_rules('wc_d_location_secondary','','required');
            				$this->form_validation->set_rules('wc_d_headquaters_secondary','','required');
            				$this->form_validation->set_rules('wc_d_code_sap_secondary','','required');
            				
            				if($this->form_validation->run()==False){
                    			$message = array('error' => "Validation Erroer");
                    			echo "Secondary Moderator Validation Error";
                    		    echo json_encode($message); exit;
                    		}
                    		else{
                    		    //echo "Secondary Moderator Validation Good"; exit;
                    		    $create_secondary_doctor = array(
                        		    'wc_d_code' => $wc_d_code_secondary,
                        		    'wc_d_code_sap' => $this->input->post('wc_d_code_sap_secondary'),
                        			'wc_d_name' => $this->input->post('wc_d_name_secondary'),
                        			'wc_d_email' => $this->input->post('wc_d_email_secondary'),
                        			'wc_d_contact' => $this->input->post('wc_d_contact_secondary'),
                        			'wc_d_hospital' => $this->input->post('wc_d_hospital_secondary'),
                        			'wc_d_display_photo' => $wc_d_display_photo_secondary,
                        			'wc_d_position' => $this->input->post('wc_d_position_secondary'),
                        			'wc_d_education' => $this->input->post('wc_d_education_secondary'),
                        			'wc_d_location' => $this->input->post('wc_d_location_secondary'),
                        			'wc_d_headquaters' => $this->input->post('wc_d_headquaters_secondary'),
                        			'wc_d_status' => "1001",
                        			'wc_d_created_by' => $wc_u_code,
                        			'wc_d_created_on' => $objDate->format('Y-m-d H:i:s'),
                        			'wc_d_updated_by' => $wc_u_code,
                        			'wc_d_updated_on' => $objDate->format('Y-m-d H:i:s')
                        		);    
                        		//echo "<pre>"; print_r($create_secondary_doctor); exit;
                        		$insert_secondary_doctor = $this->Home_model->insertData('db', 'wc_doctors', $create_secondary_doctor);
                		        //echo $insert_secondary_doctor; exit;
                		        
                		        $getdata = 'wc_d_code';
                        		$where = 'wc_d_id = "'.$insert_secondary_doctor.'"';
                        	    $get_doctor_secondary = $this->Home_model->getData('db', 'wc_doctors', $getdata, $where, '', '', '', '');
                        	    //print_r($get_doctor_secondary); exit;
                        	
                        	    $wc_d_code_secondary = $get_doctor_secondary[0]['wc_d_code'];
                		        
                		        //insert doctor history
                			    $create_secondary_doctor_history = array(
                			        'wc_d_id' => $insert_secondary_doctor,
                				    'wc_d_code' => $wc_d_code_secondary,
                				    'wc_d_code_sap' => $this->input->post('wc_d_code_sap_secondary'),
                					'wc_d_name' => $this->input->post('wc_d_name_secondary'),
                					'wc_d_email' => $this->input->post('wc_d_email_secondary'),
                					'wc_d_contact' => $this->input->post('wc_d_contact_secondary'),
                					'wc_d_hospital' => $this->input->post('wc_d_hospital_secondary'),
                					'wc_d_display_photo' => $wc_d_display_photo_secondary,
                					'wc_d_position' => $this->input->post('wc_d_position_secondary'),
                					'wc_d_education' => $this->input->post('wc_d_education_secondary'),
                					'wc_d_location' => $this->input->post('wc_d_location_secondary'),
                					'wc_d_headquaters' => $this->input->post('wc_d_headquaters_secondary'),
                					'wc_d_status' => '1001',
                					'wc_d_reason' => 'New Entry',
                					'wc_d_created_by' => $wc_u_code,
                					'wc_d_created_on' => $objDate->format('Y-m-d H:i:s'),
                					'wc_d_updated_by' => $wc_u_code,
                					'wc_d_updated_on' => $objDate->format('Y-m-d H:i:s'),
                				);
                			    //echo "<pre>"; print_r($create_secondary_doctor_history); exit;
                				$insert_secondary_doctor_history = $this->Home_model->insertData('db', 'wc_doctors_history', $create_secondary_doctor_history);
                			    //echo "<pre>"; print_r($insert_secondary_doctor_history); exit;
                				//Division to doctor maping
                				$doctor_maping = array(
                				    'wc_d_code' => $wc_d_code_secondary,
                				    'wc_di_code' => $this->input->post('wc_di_code'),
                					'wc_dm_status' => '1001',
                					'wc_dm_created_by' => $wc_u_code,
                					'wc_dm_created_on' => $objDate->format('Y-m-d H:i:s'),
                					'wc_dm_updated_by' => $wc_u_code,
                					'wc_dm_updated_on' => $objDate->format('Y-m-d H:i:s'),
                				);
                				//echo "<pre>"; print_r($doctor_maping); exit;
                				$insert_doctor_maping = $this->Home_model->insertData('db', 'wc_doctor_maping', $doctor_maping);
                				//echo $insert_doctor_maping; exit;
                    		}
            			}
                    }
    		    }
    		    else{
    		        $wc_d_code_secondary = $this->input->post('wc_d_code_moderator_guest');
    		    }
    		}
    		else{
    		    $wc_d_code_secondary = null;
    		}
    		
            // Office working hours
            $startOfficeTime = '08:00:00';
            $endOfficeTime = '19:00:00';

            $dateTimestamp = strtotime($wc_w_date);
            $dayOfWeek = date('N', $dateTimestamp); // 1 (Monday) to 7 (Sunday)
            $isThirdSaturday = (date('d', $dateTimestamp) > 14 && $dayOfWeek == 6);
            
            if ($dayOfWeek == 7 || $isThirdSaturday) {
                //echo "Invalid: The selected date is a holiday.";
                $wc_w_office = "Out of the Office";
            } elseif ($wc_w_stime < $startOfficeTime || $wc_w_etime > $endOfficeTime) {
                //echo "Invalid: The selected time is outside office working hours.";
                $wc_w_office = "Out of the Office";
            } else {
                //echo "Valid: The selected date and time are within working hours.";
                $wc_w_office = "In Office";
            }
            //exit;
            
            if($this->input->post('wc_w_platform') == "Webinar"){
                if($wc_w_invitation_create_check == 'CreateNew'){
                    $wc_r_status = 'Request Invitation';
                }
                else{
                    $wc_r_status = 'Request Platform';
                }
            }
            elseif($this->input->post('wc_w_platform') == "ZoomMeeting"){
                $wc_r_status = 'Request Zoom Meeting';
                $wc_w_invitation_create_check = null;
                $wc_w_invitation = null;
            }
            else{
    		        
		    }
		    
		    if($this->input->post('wc_w_platform') == "Webinar"){
        		//Invitation
        		if($this->input->post('wc_w_invitation_create_check') == "on"){
        		    $wc_w_invitation_code = random_string('nozero',10);
        		    //echo "Invitation"; exit;
        	        //Upload photo pending
        	        //echo "<pre>"; print_r($_FILES); exit;
        		    $uploadPath_wc_d_display_photo_guest = 'uploads/invitations/';
        		    if(empty($_FILES["wc_w_invitation"]["name"])) { $wc_w_invitation = "null"; } else{
        		        $file_ext = pathinfo($_FILES["wc_w_invitation"]["name"], PATHINFO_EXTENSION);
                        $wc_w_invitation = $wc_w_invitation_code.'_'.$objDate->format('YmdHis').'.'.$file_ext;
                        $config5['upload_path'] = $uploadPath_wc_d_display_photo_guest;
                        $config5['allowed_types'] = 'png|jpg|jpeg|bmp';
                        $config5['max_size'] = 500000;
                        //$config5['max_width'] = 1024;
                        //$config5['max_height'] = 800;
                        //$config5['overwrite'] = TRUE;
                        $config5['file_name'] = $wc_w_invitation;
                        $this->load->library('upload', $config5);
                        $this->upload->initialize($config5);
            			if(!$this->upload->do_upload('wc_w_invitation')){
            			    //echo "Invitation";
            				$error = array('error' => $this->upload->display_errors());        				//
            				echo "<pre>"; print_r($error); exit;
            			}
            			else{
            				$data5 = array('upload_data' => $this->upload->data());
            				//echo "<pre>"; print_r($data5); exit;
            				$wc_w_invitation = $wc_w_invitation;
            			}
        		    }
        		    $wc_w_notes = null;
        		}
        		else{
        		    $wc_w_invitation = null;
        		    $wc_w_notes = $this->input->post('wc_w_notes');
        		}
        		if($this->input->post('wc_w_invitation_create_check') == "on"){
        		    $wc_w_invitation_create_check = 'Already';
        		}
        		else{
        		    $wc_w_invitation_create_check = 'CreateNew';
        		}
    		}
            
    	    $request_webinar = array(
    		    'wc_r_code' => $wc_w_code,
    			'wc_r_topic' => $this->input->post('wc_w_topic'),
    			'wc_r_subtitle' => $this->input->post('wc_w_subtitle'),
    			'wc_r_description' => $this->input->post('wc_w_description'),
    			'wc_r_office' => $wc_w_office,
    			'wc_r_date' => $wc_w_date,
    			'wc_r_stime' => $wc_w_stime,
    			'wc_r_etime' => $wc_w_etime,
    			'wc_di_code' => $wc_di_code,
    			'wc_o_code' => $wc_o_name,
    			'wc_d_code_lead' => $wc_d_code_lead,
    			'wc_d_code_guest' => $wc_d_code_guest,
    			'wc_d_code_primary' => $wc_d_code_primary,
    			'wc_d_code_secondary' => $wc_d_code_secondary,
    			'wc_r_platform' => $this->input->post('wc_w_platform'),
    			'wc_r_invitation_create_check' => $wc_w_invitation_create_check,
    			'wc_r_invitation' => $wc_w_invitation,
    			'wc_r_notes' => $wc_w_notes,
    			'wc_r_status' => $wc_r_status,
    			'wc_r_created_by' => $wc_u_code,
    			'wc_r_created_on' => $objDate->format('Y-m-d H:i:s'),
    			'wc_r_updated_by' => $wc_u_code,
    			'wc_r_updated_on' => $objDate->format('Y-m-d H:i:s')
    		);
    		echo "<pre>"; print_r($request_webinar); exit;
    		$insert_request_webinar = $this->Home_model->insertData('db', 'wc_requests', $request_webinar);
    		//echo $insert_request_webinar; exit;
    		$request_webinar_history = array(
    		    'wc_r_id' => $insert_request_webinar,
    		    'wc_r_code' => $wc_w_code,
    			'wc_r_topic' => $this->input->post('wc_w_topic'),
    			'wc_r_subtitle' => $this->input->post('wc_w_subtitle'),
    			'wc_r_description' => $this->input->post('wc_w_description'),
    			'wc_r_office' => $wc_w_office,
    			'wc_r_date' => $wc_w_date,
    			'wc_r_stime' => $wc_w_stime,
    			'wc_r_etime' => $wc_w_etime,
    			'wc_di_code' => $wc_di_code,
    			'wc_o_code' => $wc_o_name,
    			'wc_d_code_lead' => $wc_d_code_lead,
    			'wc_d_code_guest' => $wc_d_code_guest,
    			'wc_d_code_primary' => $wc_d_code_primary,
    			'wc_d_code_secondary' => $wc_d_code_secondary,
    			'wc_r_platform' => $this->input->post('wc_w_platform'),
    			'wc_r_invitation_create_check' => $wc_w_invitation_create_check,
    			'wc_r_invitation' => $wc_w_invitation,
    			'wc_r_notes' => $wc_w_notes,
    			'wc_r_status' => $wc_r_status,
    			'wc_r_created_by' => $wc_u_code,
    			'wc_r_created_on' => $objDate->format('Y-m-d H:i:s'),
    			'wc_r_updated_by' => $wc_u_code,
    			'wc_r_updated_on' => $objDate->format('Y-m-d H:i:s')
    		);
    		// "<pre>"; print_r($request_webinar_history); exit;
    		$insert_request_webinar_history = $this->Home_model->insertData('db', 'wc_requests_history', $request_webinar_history);
            //echo $insert_request_webinar_history; exit;
    		if($insert_request_webinar > 0){
    		    //Get requester
        		$where = 'wc_o_empid = "'.$wc_u_code.'"';
        	    $get_organizer_info = $this->Home_model->getData('db', 'wc_organizers', 'wc_o_name,wc_o_email,wc_o_mobile', $where, '', '', '', '');
        	    //echo "<pre>"; print_r($get_organizer_info); exit;
        	    
    		    //Get division
        		$where = 'wc_di_code = "'.$wc_di_code.'"';
        	    $get_division_info = $this->Home_model->getData('db', 'wc_divisions', 'wc_di_name,wc_di_code', $where, '', '', '', '');
        	    //echo "<pre>"; print_r($get_division_info); exit;
    		    
    		    
    		    if($this->input->post('wc_w_platform') == "Webinar"){
    		        //Email Send to Tinical team
                    if($this->input->post('wc_w_invitation_create_check') == "on"){
                        //Email Send to Tinical team - IT
                        $TO_NAME = '';
                        $TO_EMAIL = '';
                        $SUBJECT = "Request for New Webinar Platform Requirement - ".$get_division_info[0]['wc_di_name']." - ".$wc_w_code;
                        $MESSAGE = "Request for New Webinar Platform Requirement";
                        $CATEGORY = "PlatformRecruitment";
                    }
                    else{
                        //Email Send to Tinical team - Design
                        $TO_NAME = '';
                        $TO_EMAIL = '';
                        $SUBJECT = "Request for New Webinar Invitation Design - ".$get_division_info[0]['wc_di_name']." - ".$wc_w_code;
                        $MESSAGE = "Request for New Webinar Invitation Design";
                        $CATEGORY = "InvitationDesign";
                    }
                    $url = EmailAPI.''.$CATEGORY;
        		    $postdata = http_build_query(
                        array(
                            'TO_NAME' => $TO_NAME,
                            'TO_EMAIL' => $TO_EMAIL,
                            'SUBJECT' => $SUBJECT,
                            'MESSAGE' => $MESSAGE,
                            'CATEGORY' => $CATEGORY,
                            )
                    );
                    $this->curls($url, $postdata);
                    
                    //Acknowledged email send to requester
                    $TO_NAME = '';
                    $TO_EMAIL = '';
                    $SUBJECT = "Webinar Requirement Successfully Submitted - ".$wc_w_code;
                    $MESSAGE = "<!DOCTYPE html>
    			        <html>
    			            <head lang='en'>
    			                <meta charset='utf-8'>
    				            <meta name='viewport' content='width=device-width, initial-width=1.0'><title></title>
    				        </head>
    				        <body>
    					        <p>Dear ".$get_organizer_info[0]['wc_o_name'].",</p>
    					        <p>Thank you for submitting your webinar requirement. We have successfully received your request and our team will review the details shortly.</p>
    					        <p>You will be contacted soon for any further clarifications or to confirm the next steps.,</p>
    					        <p>If you have any urgent questions or need to make changes, feel free to reply to this email or contact us at +91 7416664537 or +91 7780646923</p>
    					        <p><strong>Best regards</strong><br>Webinar CMS Team</p>
    				        </body>
    				    </html>";
                    $CATEGORY = "AcknowledgedRequester";
        		    //echo $MESSAGE; exit;
    
        		    $url = EmailAPI.''.$CATEGORY;
        		    $postdata = http_build_query(
                        array(
                            'TO_NAME' => $TO_NAME,
                            'TO_EMAIL' => $TO_EMAIL,
                            'SUBJECT' => $SUBJECT,
                            'MESSAGE' => $MESSAGE,
                            'CATEGORY' => $CATEGORY,
                            )
                    );
                    $this->curls($url, $postdata);
                    
    		    }
    		    elseif($this->input->post('wc_w_platform') == "ZoomMeeting"){
    		        //Email Send to Tinical team - IT
    		        $TO_NAME = '';
                    $TO_EMAIL = '';
                    $SUBJECT = "Request for New Webinar Platform Requirement - ".$get_division_info[0]['wc_di_name']." - ".$wc_w_code;
                    $MESSAGE = "Request for New Webinar Platform Requirement";
                    $CATEGORY = "PlatformRecruitment";
                    $url = EmailAPI.''.$CATEGORY;
        		    $postdata = http_build_query(
                        array(
                            'TO_NAME' => $TO_NAME,
                            'TO_EMAIL' => $TO_EMAIL,
                            'SUBJECT' => $SUBJECT,
                            'MESSAGE' => $MESSAGE,
                            'CATEGORY' => $CATEGORY,
                            )
                    );
                    $this->curls($url, $postdata);
    		        
    		        //Acknowledged email send to requester
                    $TO_NAME = '';
                    $TO_EMAIL = '';
                    $SUBJECT = "Zoom Meeting Requirement Successfully Submitted - ".$wc_w_code;
                    $MESSAGE = "<!DOCTYPE html>
    			        <html>
    			            <head lang='en'>
    			                <meta charset='utf-8'>
    				            <meta name='viewport' content='width=device-width, initial-width=1.0'><title></title>
    				        </head>
    				        <body>
    					        <p>Dear ".$get_organizer_info[0]['wc_o_name'].",</p>
    					        <p>Thank you for submitting your Zoom Meeting requirement. We have successfully received your request and our team will review the details shortly.</p>
    					        <p>You will be contacted soon for any further clarifications or to confirm the next steps.,</p>
    					        <p>If you have any urgent questions or need to make changes, feel free to reply to this email or contact us at +91 7416664537 or +91 7780646923</p>
    					        <p><strong>Best regards</strong><br>Webinar CMS Team</p>
    				        </body>
    				    </html>";
                    $CATEGORY = "AcknowledgedRequester";
        		    //echo $MESSAGE; exit;
    
        		    $url = EmailAPI.''.$CATEGORY;
        		    $postdata = http_build_query(
                        array(
                            'TO_NAME' => $TO_NAME,
                            'TO_EMAIL' => $TO_EMAIL,
                            'SUBJECT' => $SUBJECT,
                            'MESSAGE' => $MESSAGE,
                            'CATEGORY' => $CATEGORY,
                            )
                    );
                    $this->curls($url, $postdata);
    		    }
    		    else{
    		        
    		    }

                
                echo base_url().'success/request_event/'.$wc_w_code.'-'.$objDate->format('Y-m-d-H-i-s'); exit;
    		}
		}
		elseif($this->input->post('wc_w_event') == "MOCK"){
		    echo "MOCK"; exit;
		}
		elseif($this->input->post('wc_w_event') == "Postpone"){
		    echo "Postpone"; exit;
		}
		elseif($this->input->post('wc_w_event') == "Prepone"){
		    echo "Prepone"; exit;
		}
		elseif($this->input->post('wc_w_event') == "Cancelled"){
		    echo "Cancelled"; exit;
		}
		elseif($this->input->post('wc_w_event') == "Changes"){
		    echo "Changes"; exit;
		}
		elseif($this->input->post('wc_w_event') == "InvitationUpdate"){
		    echo "InvitationUpdate"; exit;
		}
		else{
		    echo "else"; exit;
		}
		//echo "End"; exit;
	}
	
    
	public function get_promote_brandlist(){
	    echo "<pre>"; print_r($_POST); exit;
	    
	    $tableA = 'wc_doctor_maping';
		$tableB = 'wc_speakers';
		$key1 = 'wc_s_code';
		$key2 = 'wc_s_code';
		$tableC = 'wc_divisions';
		$key3 = 'wc_d_code';
		$key4 = 'wc_d_code';
		$tableD = '';
		$key5 = '';
		$key6 = '';
		$tableE = '';
		$key7 = '';
		$key8 = '';
		$tableF= '';
		$key9 = '';
		$key10 = '';
		$tableG= '';
		$key11 = '';
		$key12 = '';
		$getdata = 'B.wc_s_code,B.wc_s_name,B.wc_s_position,B.wc_s_education,B.wc_s_location';
		$where = 'A.wc_dd_status = "1001" AND B.wc_s_status = "1001" AND A.wc_d_code = "'.$this->input->post('wc_d_code').'" AND B.wc_s_code != "'.$this->input->post('wc_s_code_moderator_primary').'"';
		$data = $this->Home_model->getDatajoin('hhcl', $tableA, $tableB, $key1, $key2, $getdata, $where, '', 'B.wc_s_name', 'ASC', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12);
	    echo "<pre>"; print_r($data); exit;
	    
	    echo json_encode($data);
	}
	
	public function webinarlist(){
		$data = array();
		$data['clear'] = 'webinars';
    	$data['active'] = 'webinars';

		$tableA = 'wc_webinar';
		$tableB = 'wc_divisions';
		$key1 = 'wc_d_code';
		$key2 = 'wc_d_code';
		$tableC = '';
		$key3 = '';
		$key4 = '';
		$tableD = '';
		$key5 = '';
		$key6 = '';
		$tableE = '';
		$key7 = '';
		$key8 = '';
		$tableF= '';
		$key9 = '';
		$key10 = '';
		$tableG= '';
		$key11 = '';
		$key12 = '';
		$getdata = '';
		$groupBy = '';
		$where = 'wc_w_release_details = "1001"';
		$data['webinarlist'] = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', 'DESC', '', $tableC, $key3, $key4, $tableD, $key5, $key6, '', $key7, $key8, '', $key9, $key10, $tableG, $key11, $key12, $groupBy);
        
        $getdata = '*';
    	$where = 'wc_d_status = "1001"';
    	$data['divisionslist'] = $this->Home_model->getData('db', 'wc_divisions', $getdata,  $where,'','','','');
    	//echo "<pre>"; print_r($data['divisionslist']); exit;
        
    	//echo "<pre>"; print_r($data); exit;
		$this->load->view('webinarlist', $data);
	}
	public function registration_settings_inner_submission(){
	    //echo "<pre>"; print_r($_POST); //exit;
	    $data = array();
		date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		$this->load->helper('string');
		
		if($this->input->post('wc_w_fs_name') == 'on'){ $wc_w_fs_name = '1001'; } else{ $wc_w_fs_name = '1002'; }
		if($this->input->post('wc_w_fs_mci_number') == 'on'){ $wc_w_fs_mci_number = '1001'; } else{ $wc_w_fs_mci_number = '1002'; }
		if($this->input->post('wc_w_fs_email') == 'on'){ $wc_w_fs_email = '1001'; } else{ $wc_w_fs_email = '1002'; }
		if($this->input->post('wc_w_fs_mobile') == 'on'){ $wc_w_fs_mobile = '1001'; } else{ $wc_w_fs_mobile = '1002'; }
		if($this->input->post('wc_w_fs_location') == 'on'){ $wc_w_fs_location = '1001'; } else{ $wc_w_fs_location = '1002'; }
		if($this->input->post('wc_w_fs_speciality') == 'on'){ $wc_w_fs_speciality = '1001'; } else{ $wc_w_fs_speciality = '1002'; }
		if($this->input->post('wc_w_fs_username') == 'on'){ $wc_w_fs_username = '1001'; } else{ $wc_w_fs_username = '1002'; }
		if($this->input->post('wc_w_fs_password') == 'on'){ $wc_w_fs_password = '1001'; } else{ $wc_w_fs_password = '1002'; }

		$update_registration_settings = array(
			'wc_w_fs_name' => $wc_w_fs_name,
			'wc_w_fs_mci_number' => $wc_w_fs_mci_number,
			'wc_w_fs_email' => $wc_w_fs_email,
			'wc_w_fs_mobile' => $wc_w_fs_mobile,
			'wc_w_fs_location' => $wc_w_fs_location,
			'wc_w_fs_speciality' => $wc_w_fs_speciality,
			'wc_w_fs_username' => $wc_w_fs_username,
			'wc_w_fs_password' => $wc_w_fs_password,
			'wc_w_fs_updated_by' => $this->input->post('wc_u_code'),
			'wc_w_fs_updated_on' => $objDate->format('Y-m-d H:i:s'),
			'wc_w_updated_by' => $this->input->post('wc_u_code'),
			'wc_w_updated_on' => $objDate->format('Y-m-d H:i:s')
		);
		//echo "<pre>"; print_r($update_registration_settings); exit;
		$where = 'wc_w_code  = "'.$this->input->post('wc_w_code').'"';
		//print_r($where); exit;
		$this->Home_model->updateData('db', 'wc_webinar', $update_registration_settings, $where);
		
		//Get webinar info
		$getdata = '*';
    	$where = 'wc_w_code  = "'.$this->input->post('wc_w_code').'"';
    	$data['webinarinfo'] = $this->Home_model->getData('db', 'wc_webinar', $getdata,  $where,'','','','');
    	//echo "<pre>"; print_r($data['webinarinfo']); //exit;
		
		//Update webinar_history
		$add_webinar_history_log = array(
		    'wc_w_id' => $data['webinarinfo'][0]['wc_w_id'],
            'wc_w_code' => $data['webinarinfo'][0]['wc_w_code'],
            'wc_w_topic' => $data['webinarinfo'][0]['wc_w_topic'],
            'wc_w_subtitle' => $data['webinarinfo'][0]['wc_w_subtitle'],
            'wc_w_description' => $data['webinarinfo'][0]['wc_w_description'],
            'wc_w_date' => $data['webinarinfo'][0]['wc_w_date'],
            'wc_w_stime' => $data['webinarinfo'][0]['wc_w_stime'],
            'wc_w_etime' => $data['webinarinfo'][0]['wc_w_etime'],
            'wc_d_code' => $data['webinarinfo'][0]['wc_d_code'],
            'wc_w_requester' => $data['webinarinfo'][0]['wc_w_requester'],
            'wc_s_code_lead' => $data['webinarinfo'][0]['wc_s_code_lead'],
            'wc_s_code_guest' => $data['webinarinfo'][0]['wc_s_code_guest'],
            'wc_s_code_primary' => $data['webinarinfo'][0]['wc_s_code_primary'],
            'wc_s_code_secondary' => $data['webinarinfo'][0]['wc_s_code_secondary'],
            'wc_w_platform' => $data['webinarinfo'][0]['wc_w_platform'],
            'wc_w_invitation_create_check' => $data['webinarinfo'][0]['wc_w_invitation_create_check'],
            'wc_w_invitation' => $data['webinarinfo'][0]['wc_w_invitation'],
            'wc_reason_for_update' => 'Webinar released',
            'wc_w_notes' => $data['webinarinfo'][0]['wc_w_notes'],
            'wc_w_technician_details' => $data['webinarinfo'][0]['wc_w_technician_details'],
            'wc_t_code' => $data['webinarinfo'][0]['wc_t_code'],
			'wc_w_zoom_details' => $data['webinarinfo'][0]['wc_w_zoom_details'],
			'wc_w_zoom_link' => $data['webinarinfo'][0]['wc_w_zoom_link'],
			'wc_w_zoom_id' => $data['webinarinfo'][0]['wc_w_zoom_id'],
			'wc_w_zoom_passcode' => $data['webinarinfo'][0]['wc_w_zoom_passcode'],
            'wc_w_youtube_details' => $data['webinarinfo'][0]['wc_w_youtube_details'],
            'wc_w_streaming_link' => $data['webinarinfo'][0]['wc_w_streaming_link'],
            'wc_w_custom_platform_details' => $data['webinarinfo'][0]['wc_w_custom_platform_details'],
            'wc_w_custom_platform_url' => $data['webinarinfo'][0]['wc_w_custom_platform_url'],
            'wc_w_release_details' => $data['webinarinfo'][0]['wc_w_release_details'],
            'wc_w_fs_name' => $wc_w_fs_name,
            'wc_w_fs_mci_number' => $wc_w_fs_mci_number,
            'wc_w_fs_email' => $wc_w_fs_email,
            'wc_w_fs_mobile' => $wc_w_fs_mobile,
            'wc_w_fs_location' => $wc_w_fs_location,
            'wc_w_fs_speciality' => $wc_w_fs_speciality,
            'wc_w_fs_username' => $wc_w_fs_username,
            'wc_w_fs_password' => $wc_w_fs_password,
            'wc_w_ls_logintype' => $data['webinarinfo'][0]['wc_w_ls_logintype'],
            'wc_w_status' => $data['webinarinfo'][0]['wc_w_status'],
            'wc_w_technician_details_updated_by' => $data['webinarinfo'][0]['wc_w_technician_details_updated_by'],
            'wc_w_technician_details_updated_on' => $data['webinarinfo'][0]['wc_w_technician_details_updated_on'],
            'wc_w_zoom_details_updated_by' => $data['webinarinfo'][0]['wc_w_zoom_details_updated_by'],
			'wc_w_zoom_details_updated_on' => $data['webinarinfo'][0]['wc_w_zoom_details_updated_on'],
            'wc_w_youtube_details_updated_by' => $data['webinarinfo'][0]['wc_w_youtube_details_updated_by'],
            'wc_w_youtube_details_updated_on' => $data['webinarinfo'][0]['wc_w_youtube_details_updated_on'],
            'wc_w_platform_details_updated_by' => $data['webinarinfo'][0]['wc_w_platform_details_updated_by'],
            'wc_w_platform_details_updated_on' => $data['webinarinfo'][0]['wc_w_platform_details_updated_on'],
            'wc_w_release_details_updated_by' => $data['webinarinfo'][0]['wc_w_release_details_updated_by'],
            'wc_w_release_details_updated_on' => $data['webinarinfo'][0]['wc_w_release_details_updated_on'],
            'wc_w_fs_updated_by' => $this->input->post('wc_u_code'),
            'wc_w_fs_updated_on' => $objDate->format('Y-m-d H:i:s'),
            'wc_w_ls_updated_by' => $data['webinarinfo'][0]['wc_w_ls_updated_by'],
            'wc_w_ls_updated_on' => $data['webinarinfo'][0]['wc_w_ls_updated_on'],
            'wc_w_created_by' => $data['webinarinfo'][0]['wc_w_created_by'],
            'wc_w_created_on' => $data['webinarinfo'][0]['wc_w_created_on'],
			'wc_w_updated_by' => $this->input->post('wc_u_code'),
			'wc_w_updated_on' => $objDate->format('Y-m-d H:i:s')
		);
		//echo "<pre>"; print_r($add_webinar_history_log); exit;
		$insert_webinar_history_log = $this->Home_model->insertData('db', 'wc_webinar_history', $add_webinar_history_log);
		
	}
	public function login_settings_inner_submission(){
	    //echo "<pre>"; print_r($_POST); exit;
	    $data = array();
		date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		$this->load->helper('string');
		
		if($this->input->post('wc_w_ls_logintype') == 'MobileOTP'){
		    $update_registration_settings = array(
    			'wc_w_fs_mobile' => '1001',
    			'wc_w_fs_updated_by' => $this->input->post('wc_u_code'),
    			'wc_w_fs_updated_on' => $objDate->format('Y-m-d H:i:s'),
    			'wc_w_updated_by' => $this->input->post('wc_u_code'),
    			'wc_w_updated_on' => $objDate->format('Y-m-d H:i:s')
    		);
    		//echo "<pre>"; print_r($update_registration_settings); exit;
    		$where = 'wc_w_code  = "'.$this->input->post('wc_w_code').'"';
    		//print_r($where); exit;
    		$this->Home_model->updateData('db', 'wc_webinar', $update_registration_settings, $where);
		}
		elseif($this->input->post('wc_w_ls_logintype') == 'EmailOTP'){
		    $update_registration_settings = array(
    			'wc_w_fs_email' => '1001',
    			'wc_w_fs_updated_by' => $this->input->post('wc_u_code'),
    			'wc_w_fs_updated_on' => $objDate->format('Y-m-d H:i:s'),
    			'wc_w_updated_by' => $this->input->post('wc_u_code'),
    			'wc_w_updated_on' => $objDate->format('Y-m-d H:i:s')
    		);
    		//echo "<pre>"; print_r($update_registration_settings); exit;
    		$where = 'wc_w_code  = "'.$this->input->post('wc_w_code').'"';
    		//print_r($where); exit;
    		$this->Home_model->updateData('db', 'wc_webinar', $update_registration_settings, $where);
		}
		elseif($this->input->post('wc_w_ls_logintype') == 'Username'){
		    $update_registration_settings = array(
    			'wc_w_fs_username' => '1001',
    			'wc_w_fs_password' => '1001',
    			'wc_w_fs_updated_by' => $this->input->post('wc_u_code'),
    			'wc_w_fs_updated_on' => $objDate->format('Y-m-d H:i:s'),
    			'wc_w_updated_by' => $this->input->post('wc_u_code'),
    			'wc_w_updated_on' => $objDate->format('Y-m-d H:i:s')
    		);
    		//echo "<pre>"; print_r($update_registration_settings); exit;
    		$where = 'wc_w_code  = "'.$this->input->post('wc_w_code').'"';
    		//print_r($where); exit;
    		$this->Home_model->updateData('db', 'wc_webinar', $update_registration_settings, $where);
		}
		else{
		    
		}

		$update_login_settings = array(
			'wc_w_ls_logintype' => $this->input->post('wc_w_ls_logintype'),
			'wc_w_ls_updated_by' => $this->input->post('wc_u_code'),
			'wc_w_ls_updated_on' => $objDate->format('Y-m-d H:i:s'),
			'wc_w_updated_by' => $this->input->post('wc_u_code'),
			'wc_w_updated_on' => $objDate->format('Y-m-d H:i:s')
		);
		//echo "<pre>"; print_r($update_login_settings); exit;
		$where = 'wc_w_code  = "'.$this->input->post('wc_w_code').'"';
		//print_r($where); exit;
		$this->Home_model->updateData('db', 'wc_webinar', $update_login_settings, $where);
		
		
		
		//Get webinar info
		$getdata = '*';
    	$where = 'wc_w_code  = "'.$this->input->post('wc_w_code').'"';
    	$data['webinarinfo'] = $this->Home_model->getData('db', 'wc_webinar', $getdata,  $where,'','','','');
    	//echo "<pre>"; print_r($data['webinarinfo']); //exit;
    	
		//Update webinar_history
		$add_webinar_history_log = array(
		    'wc_w_id' => $data['webinarinfo'][0]['wc_w_id'],
            'wc_w_code' => $data['webinarinfo'][0]['wc_w_code'],
            'wc_w_topic' => $data['webinarinfo'][0]['wc_w_topic'],
            'wc_w_subtitle' => $data['webinarinfo'][0]['wc_w_subtitle'],
            'wc_w_description' => $data['webinarinfo'][0]['wc_w_description'],
            'wc_w_date' => $data['webinarinfo'][0]['wc_w_date'],
            'wc_w_stime' => $data['webinarinfo'][0]['wc_w_stime'],
            'wc_w_etime' => $data['webinarinfo'][0]['wc_w_etime'],
            'wc_d_code' => $data['webinarinfo'][0]['wc_d_code'],
            'wc_w_requester' => $data['webinarinfo'][0]['wc_w_requester'],
            'wc_s_code_lead' => $data['webinarinfo'][0]['wc_s_code_lead'],
            'wc_s_code_guest' => $data['webinarinfo'][0]['wc_s_code_guest'],
            'wc_s_code_primary' => $data['webinarinfo'][0]['wc_s_code_primary'],
            'wc_s_code_secondary' => $data['webinarinfo'][0]['wc_s_code_secondary'],
            'wc_w_platform' => $data['webinarinfo'][0]['wc_w_platform'],
            'wc_w_invitation_create_check' => $data['webinarinfo'][0]['wc_w_invitation_create_check'],
            'wc_w_invitation' => $data['webinarinfo'][0]['wc_w_invitation'],
            'wc_reason_for_update' => 'Webinar released',
            'wc_w_notes' => $data['webinarinfo'][0]['wc_w_notes'],
            'wc_w_technician_details' => $data['webinarinfo'][0]['wc_w_technician_details'],
            'wc_t_code' => $data['webinarinfo'][0]['wc_t_code'],
			'wc_w_zoom_details' => $data['webinarinfo'][0]['wc_w_zoom_details'],
			'wc_w_zoom_link' => $data['webinarinfo'][0]['wc_w_zoom_link'],
			'wc_w_zoom_id' => $data['webinarinfo'][0]['wc_w_zoom_id'],
			'wc_w_zoom_passcode' => $data['webinarinfo'][0]['wc_w_zoom_passcode'],
            'wc_w_youtube_details' => $data['webinarinfo'][0]['wc_w_youtube_details'],
            'wc_w_streaming_link' => $data['webinarinfo'][0]['wc_w_streaming_link'],
            'wc_w_custom_platform_details' => $data['webinarinfo'][0]['wc_w_custom_platform_details'],
            'wc_w_custom_platform_url' => $data['webinarinfo'][0]['wc_w_custom_platform_url'],
            'wc_w_release_details' => $data['webinarinfo'][0]['wc_w_release_details'],
            'wc_w_fs_name' => $data['webinarinfo'][0]['wc_w_fs_name'],
            'wc_w_fs_mci_number' => $data['webinarinfo'][0]['wc_w_fs_mci_number'],
            'wc_w_fs_email' => $data['webinarinfo'][0]['wc_w_fs_email'],
            'wc_w_fs_mobile' => $data['webinarinfo'][0]['wc_w_fs_mobile'],
            'wc_w_fs_location' => $data['webinarinfo'][0]['wc_w_fs_location'],
            'wc_w_fs_speciality' => $data['webinarinfo'][0]['wc_w_fs_speciality'],
            'wc_w_fs_username' => $data['webinarinfo'][0]['wc_w_fs_username'],
            'wc_w_fs_password' => $data['webinarinfo'][0]['wc_w_fs_password'],
            'wc_w_ls_logintype' => $this->input->post('wc_w_ls_logintype'),
            'wc_w_status' => $data['webinarinfo'][0]['wc_w_status'],
            'wc_w_technician_details_updated_by' => $data['webinarinfo'][0]['wc_w_technician_details_updated_by'],
            'wc_w_technician_details_updated_on' => $data['webinarinfo'][0]['wc_w_technician_details_updated_on'],
            'wc_w_zoom_details_updated_by' => $data['webinarinfo'][0]['wc_w_zoom_details_updated_by'],
			'wc_w_zoom_details_updated_on' => $data['webinarinfo'][0]['wc_w_zoom_details_updated_on'],
            'wc_w_youtube_details_updated_by' => $data['webinarinfo'][0]['wc_w_youtube_details_updated_by'],
            'wc_w_youtube_details_updated_on' => $data['webinarinfo'][0]['wc_w_youtube_details_updated_on'],
            'wc_w_platform_details_updated_by' => $data['webinarinfo'][0]['wc_w_platform_details_updated_by'],
            'wc_w_platform_details_updated_on' => $data['webinarinfo'][0]['wc_w_platform_details_updated_on'],
            'wc_w_release_details_updated_by' => $data['webinarinfo'][0]['wc_w_release_details_updated_by'],
            'wc_w_release_details_updated_on' => $data['webinarinfo'][0]['wc_w_release_details_updated_on'],
            'wc_w_fs_updated_by' => $data['webinarinfo'][0]['wc_w_fs_updated_by'],
            'wc_w_fs_updated_on' => $data['webinarinfo'][0]['wc_w_fs_updated_on'],
            'wc_w_ls_updated_by' => $this->input->post('wc_u_code'),
            'wc_w_ls_updated_on' => $objDate->format('Y-m-d H:i:s'),
            'wc_w_created_by' => $data['webinarinfo'][0]['wc_w_created_by'],
            'wc_w_created_on' => $data['webinarinfo'][0]['wc_w_created_on'],
			'wc_w_updated_by' => $this->input->post('wc_u_code'),
			'wc_w_updated_on' => $objDate->format('Y-m-d H:i:s')
		);
		//echo "<pre>"; print_r($add_webinar_history_log); //exit;
		$insert_webinar_history_log = $this->Home_model->insertData('db', 'wc_webinar_history', $add_webinar_history_log);
	}
	public function enrollmentlist(){
	    //echo "<pre>"; print_r($_GET); //exit;
	    $data = array();
		date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		
		$wc_w_code = $this->input->get('wc_w_code');
		//echo $wc_w_code; exit;

		$tableA = 'wc_enrollment';
		$tableB = 'wc_registrations';
		$key1 = 'wc_r_code';
		$key2 = 'wc_r_code';
		$tableC = '';
		$key3 = '';
		$key4 = '';
		$tableD = '';
		$key5 = '';
		$key6 = '';
		$tableE = '';
		$key7 = '';
		$key8 = '';
		$tableF= '';
		$key9 = '';
		$key10 = '';
		$tableG= '';
		$key11 = '';
		$key12 = '';
		$getdata = '';
		$groupBy = '';
		$where = 'wc_e_enroll_status = "1001" AND wc_w_code = "'.$wc_w_code.'"';
        //$where = 'wc_o_status = "1001" AND wc_d_code = "'.$this->input->post('wc_d_code').'"';

		$data['enrollmentlist'] = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', 'DESC', '', '', $key3, $key4, $tableD, $key5, $key6, '', $key7, $key8, '', $key9, $key10, $tableG, $key11, $key12, $groupBy);

    	//echo "<pre>"; print_r($data); exit;
		$this->load->view('enrollmentlist', $data);
	}
	public function exportsmsenrolled(){
	    $wc_w_code = $this->input->get('wc_w_code');

	    $this->db->select('b.wc_r_mobile');
        $this->db->from('wc_enrollment AS a');
        $this->db->join('wc_registrations AS b', 'a.wc_r_code = b.wc_r_code', 'left');
        $this->db->join('wc_webinar AS c', 'a.wc_w_code = c.wc_w_code', 'left'); // Adjust as necessary
        $this->db->where('a.wc_w_code', $wc_w_code);
        $query = $this->db->get();
        //echo "<pre>"; print_r($query); exit;
        $data = $query->result_array();
        
        
	    $filename = $wc_w_code.'_enrolled_mobile_numbers.csv';
	    
	    header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        
        $output = fopen('php://output', 'w');
        
        fputcsv($output, array('Mobile Number')); // Header for mobile numbers

        // Write data rows
        foreach ($data as $row) {
            fputcsv($output, array($row['wc_r_mobile'])); // Write mobile number
        }

        // Close the output stream
        fclose($output);
	}
	public function viewerlogslist(){
	    //echo "<pre>"; print_r($_GET); exit;
	    $data = array();
		date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		
		$wc_w_code = $this->input->get('wc_w_code');
		//echo $wc_w_code; exit;

		$tableA = 'wc_viewer_logs';
		$tableB = 'wc_registrations';
		$key1 = 'wc_r_code';
		$key2 = 'wc_r_code';
		$tableC = '';
		$key3 = '';
		$key4 = '';
		$tableD = '';
		$key5 = '';
		$key6 = '';
		$tableE = '';
		$key7 = '';
		$key8 = '';
		$tableF= '';
		$key9 = '';
		$key10 = '';
		$tableG= '';
		$key11 = '';
		$key12 = '';
		$getdata = '';
		$groupBy = 'wc_w_code';
		$where = 'wc_w_code = "'.$wc_w_code.'"';
		$data['viewerlogslist'] = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', 'DESC', '', '', $key3, $key4, $tableD, $key5, $key6, '', $key7, $key8, '', $key9, $key10, $tableG, $key11, $key12, $groupBy);

    	//echo "<pre>"; print_r($data); exit;
		$this->load->view('viewerlogslist', $data);
	}
	public function exportsmsattendees(){
	    $wc_w_code = $this->input->get('wc_w_code');

	    $this->db->select('b.wc_r_mobile');
        $this->db->from('wc_viewer_logs AS a');
        $this->db->join('wc_registrations AS b', 'a.wc_r_code = b.wc_r_code', 'left');
        $this->db->join('wc_webinar AS c', 'a.wc_w_code = c.wc_w_code', 'left'); // Adjust as necessary
        $this->db->where('a.wc_w_code', $wc_w_code); // Uncommented this line
        $this->db->group_by('a.wc_r_code'); // Group by wc_r_code
        $query = $this->db->get();
        //echo "<pre>"; print_r($query); exit;
        $data = $query->result_array();
        
        
	    $filename = $wc_w_code.'_attendees_mobile_numbers.csv';
	    
	    header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        
        $output = fopen('php://output', 'w');
        
        fputcsv($output, array('Mobile Number')); // Header for mobile numbers

        // Write data rows
        foreach ($data as $row) {
            fputcsv($output, array($row['wc_r_mobile'])); // Write mobile number
        }

        // Close the output stream
        fclose($output);
	}
	public function sendsmsalerts(){
	    
	    $getdata = '*';
        $where = 'wc_sent_status = "1001" AND wc_sent_shadule < NOW()';
    	$smsalerts = $this->Home_model->getData('db', 'wc_sms_alerts', $getdata,  $where,'', '', '', '');
    	//var_dump($smsalerts);
    	
    	
    	if (!empty($smsalerts) && is_array($smsalerts)) {
    	    echo "<pre>"; print_r($smsalerts); exit;
    	    
            foreach ($smsalerts as $alert) {
                if (is_object($alert)) {
                    $message = $alert->message;
                    $recipient = $alert->recipient; 
                    $smsSent = sendSms($recipient, $message);
                    if ($smsSent) {
                        $updateData = array('wc_sent_status' => '1002');
                        $this->Home_model->updateData('db', 'wc_sms_alerts', $updateData, array('id' => $alert->id));
                    }
                } else {
                    // Handle case where $alert is not an object
                    echo "Alert is not an object.";
                }
            }
        } else {
            echo "No alerts found.";
        }

	    
	    echo "<pre>"; print_r($data); exit;
	}
	public function webinarlist_old(){
		$data = array();
		$data['clear'] = 'webinars';
		
		$getdata = '*';
        $where = 'webinar_status = "1001"';
    	
        //$db, $table, $getdata, $where, $limit, $colum, $order, $distinct
    	$data['webinarlist'] = $this->Home_model->getData('db', 'webinar', $getdata,  $where,'', 'webinar_date', 'DESC', '');
    	
    	
    	if($this->input->post('search')){
		    //echo "search"; exit;
		    if(empty($this->input->post('daterange'))){
		        redirect('webinars'); exit;    
		    }
		    else{
		        
		        $daterange = $this->input->post('daterange'); 
		        $daterange1 = str_replace(' ', '', $daterange);
		        
                $explode = explode("-",$daterange);
                //print_r($explode); exit;
		        
		        $from = $explode[0].'-'.$explode[1].'-'.$explode[2].' 00:00:00';
		        $to = $explode[3].'-'.$explode[4].'-'.$explode[5].' 23:59:59';
		        
		        $getdata = '';
		        $where = "webinar_date BETWEEN '$from' AND '$to'";
		        //print_r($where); exit;
    	    	$data['webinarlist'] = $this->Home_model->getData('db', 'webinar', $getdata,  $where,'', 'webinar_date', 'DESC', '');
                //echo "<pre>"; print_r($data['webinarlist']); exit; 

    		    $data['date_from'] = $explode[0].'/'.$explode[1].'/'.$explode[2];
                $data['date_to'] = $explode[3].'/'.$explode[4].'/'.$explode[5];

    		    
    		}
		}
    	
    	//echo "<pre>"; print_r($data['webinarlist']); exit;
    	
    	$data['active'] = 'webinars';
		$this->load->view('webinarlist', $data);
	}
	public function webinar_create(){
		$data = array();
		date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();

		$this->load->helper('string');	
		$webinar_code = random_string('nozero',10);

		if($this->input->post('submit')){
			//echo "<pre>"; print_r($_POST); exit;
			//Validation
			$this->form_validation->set_rules('webinar_platform','Please select platform','trim|required|min_length[3]|max_length[200]');
			$this->form_validation->set_rules('webinar_division','Please select division name','trim|required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('webinar_topic','Please enter topic name','trim|required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('webinar_subtitle','Please enter subtitle','trim|required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('webinar_description','Please enter description','trim|required');
			$this->form_validation->set_rules('webinar_zoom_link','Please enter zoom link','trim|required|min_length[3]|max_length[100]'); 
			$this->form_validation->set_rules('webinar_meeting_id','Please enter meeting id','trim|required|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('webinar_passcode','Please enter passcode','trim|required|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('webinar_streaming','Please enter streaming','trim|required|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('webinar_date','Please enter date','trim|required');
			$this->form_validation->set_rules('webinar_start','Please enter time','trim|required');
			$this->form_validation->set_rules('webinar_end','Please enter time','trim|required');
			$this->form_validation->set_rules('webinar_page_url','Please enter webinar page url','trim|required|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('webinar_technician','Please','trim|required|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('webinar_theme','Please select theme','trim|required|min_length[3]|max_length[30]'); 
			$this->form_validation->set_rules('webinar_theme_color','Please select theme color','trim|required|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('webinar_password_protection','Please select password protection','trim|required|min_length[3]|max_length[30]'); 
			$this->form_validation->set_rules('webinar_poll_status','Please select poll status','trim|required|min_length[3]|max_length[30]'); 
			$this->form_validation->set_rules('webinar_invitation','Please','trim|required|min_length[3]|max_length[30]');
			

			if($this->form_validation->run()==False){
				echo "Validation Bad"; exit;
				$message = array('error' => "Validation Error");
				echo json_encode($message);
			}
			else{
				echo "Validation Good"; exit;
					$webinar_submit = array('webinar_code' => $webinar_code,
					'wc_platform' => $this->input->post('webinar_platform'),
					'wc_division' => $this->input->post('webinar_division'),
					'wc_topic' => $this->input->post('webinar_topic'),
					'wc_subtitle' => $this->input->post('webinar_subtitle'),
					'wc_description' => $this->input->post('webinar_description'),
					'wc_zoom_link' => $this->input->post('webinar_zoom_link'),
					'wc_zoom_link' => $this->input->post('webinar_meeting_id'),
					'wc_passcode' => $this->input->post('webinar_passcode'),
					'wc_streaming' => $this->input->post('webinar_streaming'),
					'wc_date' => $this->input->post('webinar_date'),
					'wc_start' => $this->input->post('webinar_start'),
					'wc_end' => $this->input->post('webinar_end'),
					'wc_page_url' => $this->input->post('webinar_page_url'),
					'wc_technician' => $this->input->post('webinar_technician'),
					'wc_organizer' => $this->input->post('webinar_organizer'),
					'wc_theme' => $this->input->post('webinar_theme'),
					'wc_theme_color' => $this->input->post('webinar_theme_color'),
					'wc_password_protection' => $this->input->post('webinar_password_protection'),
					'wc_poll_status' => $this->input->post('webinar_poll_status'),
					'wc_invitation' => $this->input->post('webinar_invitation'),);
					
					
					// 'sub_date' => $objDate->format('Y-m-d H:i:s'));
					//echo "<pre>"; print_r($webinar_submit); exit;
					$insert_webinar_submit = $this->Home_model->insertData('db', 'webinar_list', $webinar_submit);
					redirect('webinars');
					
			}
		}
		else{
		    $getdata = '*';
    		$where = 'wc_d_status = "1001"';
    		$data['divisionlist'] = $this->Home_model->getData('db', 'wc_divisions', $getdata,  $where,'','','','');
    		
    		$getdata = '*';
    		$where = 'wc_t_status = "1001"';
    		$data['technicianlist'] = $this->Home_model->getData('db', 'wc_technicians', $getdata,  $where,'','','','');
    		
    		$getdata = '*';
    		$where = 'wc_o_status = "1001"';
    		$data['organizerlist'] = $this->Home_model->getData('db', 'wc_organizers', $getdata,  $where,'','','','');
    		//echo "<pre>"; print_r($data['organizerlist']); exit;
		    
		    $this->load->view('webinar_create', $data);
		}
	}
	public function settings(){
		$data = array();		
		$data['clear'] = 'webinars';
		$this->load->view('settings', $data);
	}
	public function queries(){
		$data = array();
		$data['active'] = 'queries';
		$data['clear'] = 'queries';
		
		// Get Queries List
		$tableA = 'tbl_queries';
		$tableB = 'webinar';
		$key1 = 'Que_webinar';
		$key2 = 'webinar_code';
		$tableC = '';
		$key3 = '';
		$key4 = '';
		$tableD = '';
		$key5 = '';
		$key6 = '';
		$tableE = '';
		$key7 = '';
		$key8 = '';
		$tableF= '';
		$key9 = '';
		$key10 = '';
		$tableG= '';
		$key11 = '';
		$key12 = '';
		$getdata = '*';
		//echo "<pre>"; print_r($data['querieslist']); exit;
		if($this->input->post('search')){
		    //echo "search"; exit;
		    if(empty($this->input->post('daterange'))){
		        redirect('queries'); exit;    
		    }
		    else{
		        
		        $daterange = $this->input->post('daterange'); 
		        $daterange1 = str_replace(' ', '', $daterange);
		        
                $explode = explode("-",$daterange);
                //print_r($explode); exit;
		        
		        $from = $explode[0].'-'.$explode[1].'-'.$explode[2].' 00:00:00';
		        $to = $explode[3].'-'.$explode[4].'-'.$explode[5].' 23:59:59';
		        
		        $data['date_from'] = $explode[0].'/'.$explode[1].'/'.$explode[2];
                $data['date_to'] = $explode[3].'/'.$explode[4].'/'.$explode[5];
		        
		        $getdata = '';
		        $where = "A.Que_createdOn	 BETWEEN '$from' AND '$to'";
    		}
		}
		else{
		    $where = '';
		}
		
		$data['querieslist'] = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', 'A.Que_createdOn', 'DESC', '', $key3, $key4, $tableD, $key5, $key6, '', $key7, $key8, '', $key9, $key10, $tableG, $key11, $key12);
		
		//echo "<pre>"; print_r($data); exit;
		$this->load->view('queries', $data);
	}
	public function analytics(){
		$data = array();		
		$data['active'] = 'analytics';
		$this->load->view('analytics', $data);
		
		$data['analyticsdata'] = $this->Home_model->analyticsdata();
		//echo "<pre>"; print_r($data['analyticsdata']); exit;
	}
	public function email_logs(){
		$data = array();
		$data['active'] = 'email-logs';
		$this->load->view('email_logs', $data);
	}
	public function sms_logs(){
		$data = array();	
		$data['active'] = 'sms-logs';
		$this->load->view('sms_logs', $data);
	}
	public function webinar_update(){
		$data = array();		
		$this->load->view('webinar_update', $data);
	}
	public function divisions(){
		$data = array();	
		
		$getdata = '*';
    	$where = 'wc_d_status = "1001"';
    	$data['divisionslist'] = $this->Home_model->getData('db', 'wc_divisions', $getdata,  $where,'','','','');
		
		
		//echo "<pre>"; print_r($data); exit;
		
		$data['active'] = 'divisions';
		$this->load->view('divisions', $data);
	}
	public function manageaccount(){
		$data = array();		
		$this->load->view('manageaccount', $data);
	}
    public function success(){
        $data = array();
		date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		
		if($this->uri->segment(2) == 'request_event'){
		    echo "request_event"; exit;
		}
		else{
		    
		}
		
        $this->load->view('success', $data);
    }
    */
    
    public function success(){  
        $data = array();
        //echo $this->uri->segment(2); exit;
        if($this->uri->segment(2) == "enquiry-submission"){
            $data['msg1'] = "Thanks for your interest.";
            $data['msg2'] = "Our Team will contact you shortly.";
        }
        elseif($this->uri->segment(2) == "email-subscribe"){
            $data['msg1'] = "Thanks for your interest.";
            $data['msg2'] = "We've received your submission and appreciate your engagement with the <span style='color: #E33136'><strong>patchmantra website.</strong> </span>Expect a response soon!";
        }
        elseif($this->uri->segment(2) == "phone-subscribe"){
            $data['msg1'] = "Thanks for your interest.";
            $data['msg2'] = "We've received your submission and appreciate your engagement with the <span style='color: #E33136'><strong>patchmantra website.</strong> </span>Expect a response soon!";
        }
        elseif($this->uri->segment(2) == "email-unsubscribe"){
            $data['msg1'] = "Unsubscribed Successfully.";
        }
        elseif($this->uri->segment(2) == "doctor-register-submission"){
            $data['msg1'] = "Our Team will contact you shortly.";
        }
        else{
            $data['msg1'] = "";
            $data['msg2'] = "";
        }
      $this->load->view('success', $data);
    }
    public function participants_list(){
	    $data = array();
	    date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		$data['active'] = 'participants';
		
		if ($this->User_Auth()) {} else {
			redirect('login');
		}
		
		$where = '';
		$data['participants'] = $this->Home_model->getData('db', 'wc_participants', '*', $where, '', '', 'DESC', '');
		
		//echo "<pre>"; print_r($data); exit;
		
		
		$this->load->view('participants_list', $data);
	}
	public function division_list(){
	    $data = array();
	    date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		$data['active'] = 'divisions';
		
		if ($this->User_Auth()) {} else {
			redirect('login');
		}
		
		$where = '';
		$data['divisions'] = $this->Home_model->getData('db', 'wc_divisions', '*', $where, '', '', 'DESC', '');
		//echo "<pre>"; print_r($data); exit;
		
		$this->load->view('division_list', $data);
	}
	public function queries_list(){
	    $data = array();
	    date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		$data['active'] = 'queries';
		
		if ($this->User_Auth()) {} else {
			redirect('login');
		}
		
		$where = '';
		$data['queries'] = $this->Home_model->getData('db', 'wc_queries', '*', $where, '', '', 'DESC', '');
		//echo "<pre>"; print_r($data); exit;
		
		
		$this->load->view('queries_list', $data);
	}
// 	public function analytics_list(){
// 	    $data = array();
// 	    date_default_timezone_set('Asia/Kolkata');
// 		$objDate = new DateTime();
// 		$data['active'] = 'analytics';
// 		$this->load->view('analytics_list', $data);
// 	}

	
	
	
    
    public function logs_users(){
	    $data = array();
	    date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		$data['active'] = 'logs-users';
		if ($this->User_Auth()) {} else {
			redirect('login');
		}
		
		
		$where = 'wc_u_code != "MSADMIN"';
		$data['userslogs'] = $this->Home_model->getData('db', 'wc_users_log', '*', $where, '', 'wc_logon', 'DESC', '');
		
		//echo "<pre>"; print_r($data); exit;

		$this->load->view('logs_users', $data);
	}
	
	public function sms_logs(){
	    $data = array();
	    date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		$data['active'] = 'sms-logs';
		if ($this->User_Auth()) {} else {
			redirect('login');
		}
		$where = '';
		$data['smslogs'] = $this->Home_model->getData('db', 'wc_sms_enroll', '*', $where, '', '', 'DESC', '');
		
		//echo "<pre>"; print_r($data); exit;

		
		$this->load->view('sms_logs', $data);
	}
		public function email_logs(){
	    $data = array();
	    date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		$data['active'] = 'email-logs';
		
			if ($this->User_Auth()) {} else {
			redirect('login');
		}
		$where = '';
		$data['emaillogs'] = $this->Home_model->getData('db', 'wc_email_log', '*', $where, '', '', 'DESC', '');
		
		//echo "<pre>"; print_r($data); exit;
		$this->load->view('email_logs', $data);
	}
	
	function custom_copy($src, $dst) {
        //echo $src; 
       // echo "<br>";
        //echo $dst;
        //exit;
        // open the source directory
        $dir = opendir($src); 
        // Make the destination directory if not exist
        @mkdir($dst); 
        // Loop through the files in source directory
        while( $file = readdir($dir) ) { 
            if (( $file != '.' ) && ( $file != '..' )) { 
                if ( is_dir($src . '/' . $file) ) 
                { 
                    // Recursively calling custom copy function
                    // for sub directory 
                    custom_copy($src . '/' . $file, $dst . '/' . $file); 
                } 
                else { 
                    copy($src . '/' . $file, $dst . '/' . $file); 
                } 
            } 
        } 
        closedir($dir);
    }
     public function check_availability_negative() {
	    //echo "<pre>"; print_r($_POST); exit;
	    
	    $db = $_POST['db'];
	    $table = $_POST['table'];
        $Wcolumn = $_POST['Wcolumn'];

        if(isset($_POST['username'])){
            $value =  $_POST['username'];   
        }
        elseif(isset($_POST['password'])){
            $value =  $_POST['password'];  
            
        }
        else{
            
        }
        $where = "$Wcolumn = '".$value."'";
        //print_r($where);
		$data['check_availability'] = $this->Home_model->getData($db, $table, '', $where, '', '', '', '');
		if(empty($data['check_availability'])) {
			echo 'false';
		}
		else {
		    echo 'true';
		}
		exit;
	}
	public function curls($url, $postdata) {
	    //echo $postdata; exit;
		try{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
			//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
			// receive server response ...
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$server_output = curl_exec ($ch);
			curl_close ($ch);
			$output = $server_output;
			//print_r($output);
		}catch(Exception $e) {
			return $e;
		}
        return $output;
        print_r($output);
    }
}
?>
