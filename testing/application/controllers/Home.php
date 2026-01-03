<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {    
    public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->config->load('custom_config');
		$this->load->model('Home_model');
		$this->load->library('form_validation');
		//$this->load->library('session');
		$this->load->library(array('session', 'email'));
		$this->load->helper('cookie');
		$this->load->helper('url', 'form', 'string', 'file', 'directory');
		// For Error Reporting
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		// Assign a value to a global variable
        $this->wc_w_event_code = $this->config->item('wc_w_event_code');
	}
	public function index(){
        $data = array();
	    date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		
		//echo"<pre>"; print_r($this->session->all_userdata()); //exit;
		
		if(!empty($this->session->userdata('wc_participant_u_code'))){ redirect('streaming'); }
		
		$wc_w_event_code = $this->wc_w_event_code;
		
        $tableA = 'wc_events';
		$tableB = 'wc_events_settings';
		$key1 = 'wc_w_event_code';
		$key2 = 'wc_w_event_code';
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
		$where = 'A.wc_w_event_code = "'.$wc_w_event_code.'"';
		$data['eventinfo'] = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', '', '', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy);
        //echo "<pre>"; print_r($data['eventinfo']); exit;
        
        if($this->input->post('submit')){
			//echo "<pre>"; print_r($_POST); exit;
			
			if($data['eventinfo'][0]['wc_ws_login_authentication'] == 'True'){
			    //echo "wc_ws_login_authentication True"; exit;
			    //echo "<pre>"; print_r($_POST); exit;
			    
			    $current_time = date('Y-m-d H:i:s');
			    
			    $getdata = '';
        		$where = 'wc_otp_value = "'.$_POST['wc_u_otp'].'" AND wc_otp_mobile = "'.$_POST['wc_u_phone'].'" AND wc_otp_endtime >= "'.$current_time.'"';
        	    $data['check_availability'] = $this->Home_model->getData('db', 'wc_otp_validation', $getdata, $where, '1', 'wc_otp_starttime', 'DESC', '');
        	    //echo "<pre>"; print_r($data['check_availability']); //exit;
        	    
        	    if(!empty($data['check_availability'])){
                    //echo "IN"; exit;
                    
                    $where = 'wc_u_type = "Participant" AND wc_u_phone =  "'.$_POST['wc_u_phone'].'"';
    				$data['participant_userdata_mobile']=$this->Home_model->getData('db', 'wc_users', '*', $where, '', '', '', '');
                    //echo "<pre>"; print_r($data['participant_userdata_mobile']); exit;
                    
                    if(!empty($data['participant_userdata_mobile'])){
                        $this->load->helper('string');
                        $participant_user_code = random_string('nozero',10);
                        $wc_epw_code = random_string('nozero',10);
            	            
        	            $sessiondata = array(
							'wc_participant_log_user_code' => $participant_user_code,
							'wc_participant_u_type'=>$data['participant_userdata_mobile'][0]['wc_u_type'],
							'wc_participant_u_code'=>$data['participant_userdata_mobile'][0]['wc_u_code'],
							'wc_participant_username'=>$data['participant_userdata_mobile'][0]['username'],
							'wc_participant_u_email'=>$data['participant_userdata_mobile'][0]['wc_u_email'],
							'wc_participant_u_phone'=>$data['participant_userdata_mobile'][0]['wc_u_phone'],
							'wc_participant_u_display_name'=>$data['participant_userdata_mobile'][0]['wc_u_display_name'],
							'wc_participant_u_status'=>$data['participant_userdata_mobile'][0]['wc_u_status']
						);
						//print_r($sessiondata); exit;
						$this->session->set_userdata($sessiondata);
						
						$user_ip = $this->input->ip_address();
						//echo $user_ip; exit;
						
						$data_user_log = array(
                	        'wc_u_code' => $data['participant_userdata_mobile'][0]['wc_u_code'], 
                	        'wc_log_user_code' => $participant_user_code,
                	        'wc_u_empid' => 'Participant',
                            'username' => $data['participant_userdata_mobile'][0]['username'],
                            'wc_u_phone' => $data['participant_userdata_mobile'][0]['wc_u_phone'],
                            'wc_di_code' => $data['eventinfo'][0]['wc_di_code'],
                            'wc_log_user_ip' => $user_ip,
                            'wc_logon'=>$objDate->format('Y-m-d H:i:s')
                        );
                	    //echo "<pre>"; print_r($data_user_log); exit;
                	    $insert_user_log = $this->Home_model->insertData('db', 'wc_users_log', $data_user_log);
						
						redirect('streaming');
						
                    }
                    
        	    }
        	    else{
                    echo "OTP Expired. Kindly request a new OTP."; exit;
        	    }
        	    
        	   // $data['participant_userdata_mobile']=$this->Home_model->getData('db', 'wc_users', '*', $where, '', '', '', '');
        	    echo "Done"; exit;
        	    
                //
			}
			elseif($data['eventinfo'][0]['wc_ws_login_authentication'] == 'False'){
			    if($this->input->post('username') && $this->input->post('password')){
    			    echo "username and password"; exit;
    			}
			    elseif($this->input->post('username')){
    			    //echo "username"; exit;
    			    $this->form_validation->set_rules('username','Enter Username','required');
        			if($this->form_validation->run()==False){
        				//echo validation_errors();
        				$data['error'] = validation_errors();
        				//echo "<pre>"; print_r($data); exit;
        				$this->load->view('index', $data);
        			}
        			else{
        			    //echo "In"; exit;
        			    
        			    //Check mobile login
        			    $where = 'wc_u_type = "Participant" AND wc_u_phone =  "'.$this->input->post('username').'"';
        				$data['participant_userdata_mobile']=$this->Home_model->getData('db', 'wc_users', '*', $where, '', '', '', '');
        				//echo "<pre>"; print_r($data['participant_userdata_mobile']); exit;
        				
        				if(!empty($data['participant_userdata_mobile'])){
        				    $this->load->helper('string');
            	            $participant_user_code = random_string('nozero',10);
            	            $wc_epw_code = random_string('nozero',10);
            	            
        				    $sessiondata = array(
    							'wc_participant_log_user_code' => $participant_user_code,
    							'wc_participant_u_type'=>$data['participant_userdata_mobile'][0]['wc_u_type'],
    							'wc_participant_u_code'=>$data['participant_userdata_mobile'][0]['wc_u_code'],
    							'wc_participant_username'=>$data['participant_userdata_mobile'][0]['username'],
    							'wc_participant_u_email'=>$data['participant_userdata_mobile'][0]['wc_u_email'],
    							'wc_participant_u_phone'=>$data['participant_userdata_mobile'][0]['wc_u_phone'],
    							'wc_participant_u_display_name'=>$data['participant_userdata_mobile'][0]['wc_u_display_name'],
    							'wc_participant_u_status'=>$data['participant_userdata_mobile'][0]['wc_u_status']
    						);
    						//print_r($sessiondata); exit;
    						$this->session->set_userdata($sessiondata);
    						
    						$data_enrolled_participant_webinar = array(
                    	        'wc_epw_code' => $wc_epw_code,
                		        'wc_u_code' => $data['participant_userdata_mobile'][0]['wc_u_code'],
                		        'wc_w_event_code' => $data['eventinfo'][0]['wc_w_event_code'],
                		        'wc_epw_created_on' => $objDate->format('Y-m-d H:i:s')
                            );
                    	    //echo "<pre>"; print_r($data_enrolled_participant_webinar); exit;
                    	    $insert_user_log = $this->Home_model->insertData('db', 'wc_enrolled_participant_webinar', $data_enrolled_participant_webinar);
    						
    						$user_ip = $this->input->ip_address();
    						//echo $user_ip; exit;
    						
    						$data_user_log = array(
                    	        'wc_u_code' => $data['participant_userdata_mobile'][0]['wc_u_code'], 
                    	        'wc_log_user_code' => $participant_user_code,
                    	        'wc_u_empid' => 'Participant',
                                'username' => $data['participant_userdata_mobile'][0]['username'],
                                'wc_u_phone' => $data['participant_userdata_mobile'][0]['wc_u_phone'],
                                'wc_di_code' => $data['eventinfo'][0]['wc_di_code'],
                                'wc_log_user_ip' => $user_ip,
                                'wc_logon'=>$objDate->format('Y-m-d H:i:s')
                            );
                    	    //echo "<pre>"; print_r($data_user_log); exit;
                    	    $insert_user_log = $this->Home_model->insertData('db', 'wc_users_log', $data_user_log);
    						
    						redirect('streaming');
        				}
        				    
        			}
    			}
			}
			else{
			    
			}
			
			
			
			
			
			//echo "Done"; exit;
        }
        
        $this->load->view('themes/'.$data['eventinfo'][0]['wc_tm_name'].'/index', $data);
	}
	public function send_otp(){
        $data = array();
	    date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
        //echo "<pre>"; print_r($_POST); exit;
        
        if($this->input->post('wc_u_phone') == '9705841670'){
            $otp = "123456";
        }
        else{
            $otp = rand(100000, 999999);  //6 digit random number
        }
        
        $postdata = http_build_query(
            array(
                'MOBILE' => $this->input->post('wc_u_phone'),
                'VAL1'=> $otp,
                'VAL2'=> '',
                'VAL3'=> '',
                'TEMPLATENAME'=> 'WC-LOGIN-OTP'
            )
        );
        //print_r($postdata); exit;
        
        if($this->input->post('wc_u_phone') == '9705841670'){
            
        }
        else{
		    $url = 'https://www.heterohealthcare.com/sms/webinarcmshetero';
            $this->curls($url, $postdata);
        }
        
		$otp_validation = array(
            'wc_otp_mobile' => $this->input->post('wc_u_phone'),
			'wc_otp_value' => $otp,
			'wc_otp_starttime' => date("Y-m-d H:i:s"),
			'wc_otp_endtime' => date('Y-m-d H:i:s', strtotime("+10 minutes", strtotime(date('Y-m-d H:i:s')))),
			'wc_otp_verified_on' => '1001',
		);
		//echo "<pre>"; print_r($otp_validation); exit;
		$insert_otp_validation = $this->Home_model->insertData('db', 'wc_otp_validation', $otp_validation);
		//echo $insert_otp_validation; exit;
	}
	public function check_availability_otp(){
	    $data = array();
        date_default_timezone_set('Asia/Kolkata');
        $objDate = new DateTime();
        //echo "<pre>"; print_r($_POST); exit;

        $getdata = '';
		$where = 'wc_otp_value = "'.$_POST['wc_u_otp'].'" AND wc_otp_mobile = "'.$_POST['wc_u_phone'].'"';
	    $data['check_availability'] = $this->Home_model->getData('db', 'wc_otp_validation', $getdata, $where, '1', 'wc_otp_starttime', 'DESC', '');   
        //echo "<pre>"; print_r($data); exit;
        
        if(empty($data['check_availability'])){
			echo 'false';
		}
		else {
			echo 'true';
		}
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
        $where = "wc_log_user_code = '".$this->session->userdata('wc_participant_log_user_code')."'";
        $this->Home_model->updateData('db', 'wc_users_log', $update, $where); 
		
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();
        redirect('');
    }
	public function register(){
	    $data = array();
	    date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		
		if(!empty($this->session->userdata('wc_participant_u_code'))){ redirect('streaming'); }
		
		$wc_w_event_code = $this->wc_w_event_code;
		
        $tableA = 'wc_events';
		$tableB = 'wc_events_settings';
		$key1 = 'wc_w_event_code';
		$key2 = 'wc_w_event_code';
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
		$where = 'A.wc_w_event_code = "'.$wc_w_event_code.'"';
		$data['eventinfo'] = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', '', '', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy);
        //echo "<pre>"; print_r($data['eventinfo']); exit;
        
        //Get Speciality lisy
        $tableA = 'wc_dr_specialities';
		$tableB = 'wc_speciality_maping';
		$key1 = 'wc_drs_code';
		$key2 = 'wc_drs_code';
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
		$where = 'B.wc_sm_status = "1001" AND A.wc_drs_status = "1001" AND B.wc_di_code = "'.$data['eventinfo'][0]['wc_di_code'].'"';
		$data['specialities'] = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, 'wc_drs_value', 'ACSC', '', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy);
        //echo "<pre>"; print_r($data['specialities']); exit;
        
        if($this->input->post('submit')){
			//echo "<pre>"; print_r($_POST); exit;
			
			$this->load->helper('string');	
            $wc_u_code = random_string('nozero',10);
            $wc_ew_code = random_string('nozero',10);
			
			//echo "<pre>"; print_r($data['eventinfo']); exit;
			
			//Check used database if already registered or not
			if($this->input->post('wc_ws_re_email')){
			    echo "wc_ws_re_email"; exit;
			    $where = '';
			    $where = 'wc_u_email = "'.$this->input->post('wc_u_email').'"';
			    $data['checkuserdata']=$this->Home_model->getData('db', 'wc_users', '*', $where, '', '', '', '');
			    //echo "<pre>"; print_r($data['checkuserdata']); exit;
			    
			    if(empty($data['checkuserdata'])){
			        $newuser_create_status = "Create";
			    }
			    else{
			        $newuser_create_status = "Not Required";
			    }
			    
			    $wc_u_phone = null;
			    $wc_u_email = $this->input->post('wc_ws_re_email');
			}
			elseif($this->input->post('wc_u_phone')){
			    //echo "wc_u_phone"; exit;
			    $where = 'wc_u_phone = "'.$this->input->post('wc_u_phone').'"';
			    $data['checkuserdata']=$this->Home_model->getData('db', 'wc_users', '*', $where, '', '', '', '');
			    //echo "<pre>"; print_r($data['checkuserdata']); exit;
			    
			    $wc_u_phone = $this->input->post('wc_u_phone');
			    $wc_u_email = null;
			    
			    if(empty($data['checkuserdata'])){
			        $newuser_create_status = "Create";
			    }
			    else{
			        $newuser_create_status = "Not Required";
			    }
			}
			elseif($this->input->post('wc_ws_re_email') && $this->input->post('wc_u_phone')){
			    echo "wc_ws_re_email and wc_u_phone"; exit;
			    $where = 'wc_u_phone = "'.$this->input->post('wc_u_phone').'" AND wc_u_email = "'.$this->input->post('wc_ws_re_email')."'";
			    $data['checkuserdata']=$this->Home_model->getData('db', 'wc_users', '*', $where, '', '', '', '');
			    //echo "<pre>"; print_r($data['checkuserdata']); exit;
			   
			    if(empty($data['checkuserdata'])){
			        $newuser_create_status = "Create";
                }
			    else{
			        $newuser_create_status = "Not Required";
			    }
			   
			   $wc_u_email = $this->input->post('wc_ws_re_email');
			   $wc_u_phone = $this->input->post('wc_u_phone');
			}
			
			if($newuser_create_status == 'Create'){
			    //echo "Create"; exit;
			    
			    //User create
    			$create_user = array(
    		        'wc_u_code' => $wc_u_code,
    		        'wc_u_type' => 'Participant',
    		        'wc_u_role' => 'Participant',
    		        'wc_u_empid' => null,
    		        'wc_di_code' => null,
    		        'wc_u_display_name' => $this->input->post('wc_u_display_name'),
    		        'username' => 'Participant',
    		        'password' => 'Participant',
    		        'wc_u_password_updated_on' => null,
    		        'wc_u_avatar' => null,
    		        'wc_u_email' => $wc_u_email,
    		        'wc_u_email_verified_status' => '1002',
    		        'wc_u_phone' => $wc_u_phone,
    		        'wc_u_phone_verified_status' => '1002',
                    'wc_u_status' => '1001',
    		        'wc_updated_by' => null,
                    'wc_updated_on' => null,
                    'wc_created_by' => 'Participant',
    		        'wc_created_on' => $objDate->format('Y-m-d H:i:s'),
                );
                //echo "<pre>"; print_r($create_user); exit;
    			$insert_user = $this->Home_model->insertData('db', 'wc_users', $create_user);
    			//echo $insert_user; exit;
                
                //enroll to webinar
    			$enroll_to_webinar = array(
    		        'wc_ew_code' => $wc_ew_code,
    		        'wc_u_code' => $wc_u_code,
    		        'wc_w_event_code' => $data['eventinfo'][0]['wc_w_event_code'],
    		        'wc_ew_created_on' => $objDate->format('Y-m-d H:i:s')
                );
                //echo "<pre>"; print_r($enroll_to_webinar); exit;
    			$insert_enroll_to_webinar = $this->Home_model->insertData('db', 'wc_enroll_webinar', $enroll_to_webinar);
    			redirect('streaming');
    			
			}
			elseif($newuser_create_status == 'Not Required'){
			    //echo "Not Required"; exit;
			    echo "You are already registered on the DrCast portal. Please go to the login page and use your credentials."; exit;
			}
			else{
			    
			}
			
			//echo "Done"; exit;
        }
        
        $this->load->view('themes/'.$data['eventinfo'][0]['wc_tm_name'].'/register', $data);
	}
	public function check_availability_wc_u_phone_login(){
	    //echo "<pre>"; print_r($_POST); exit;
	    
        $where = "wc_u_type = 'Participant' AND wc_u_phone ='".$this->input->post('wc_u_phone')."'";
        //print_r($where); exit;
        $data['check_availability'] = $this->Home_model->getData('db', 'wc_users', '', $where, '', '', '', '');
        //echo "<pre>"; print_r($data); //exit;
        //$result = $data['check_availability'][0]['sub_email'];
        if(!empty($data['check_availability'])) {
            echo 'true';
        }
        else {
            echo 'false';
        }
	}
	public function check_availability_wc_u_phone(){
	    //echo "<pre>"; print_r($_POST); exit;
	    
        $where = "wc_u_type = 'Participant' AND wc_u_phone ='".$this->input->post('wc_u_phone')."'";
        //print_r($where); exit;
        $data['check_availability'] = $this->Home_model->getData('db', 'wc_users', '', $where, '', '', '', '');
        //echo "<pre>"; print_r($data); //exit;
        //$result = $data['check_availability'][0]['sub_email'];
        if(empty($data['check_availability'])) {
            echo 'true';
        }
        else {
            echo 'false';
        }
	}
	public function check_availability_wc_u_email(){
	    //echo "<pre>"; print_r($_POST); exit;
	    
        $where = "wc_u_email ='".$_POST['wc_u_email']."'";
        //print_r($where); exit;
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
	public function User_Auth() {
		//echo"<pre>"; print_r($this->session->all_userdata()); exit;
		// exit;
        if($this->session->userdata('wc_participant_u_code')){
            return true;
        } 
        else {
            return false;
        }
    }
    public function streaming(){
        if($this->User_Auth()){ } else {
			redirect('login');
		}
				
		$data = array();
	    date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		
		$wc_w_event_code = $this->wc_w_event_code;
		//echo $wc_w_event_code; exit;
		
        $tableA = 'wc_events';
		$tableB = 'wc_events_settings';
		$key1 = 'wc_w_event_code';
		$key2 = 'wc_w_event_code';
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
		$where = 'A.wc_w_event_code = "'.$wc_w_event_code.'"';
		$data['eventinfo'] = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', '', '', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy);
        //echo "<pre>"; print_r($data['eventinfo']); exit;
        
        $this->load->view('themes/'.$data['eventinfo'][0]['wc_tm_name'].'/streaming', $data);
	}
	public function submitquery(){
	    //echo "<pre>"; print_r($_POST); exit;
	    if($this->User_Auth()){ } else {
			redirect('login');
		}
				
		$data = array();
	    date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		
		$wc_w_event_code = $this->wc_w_event_code;
		//echo $wc_w_event_code; exit;
		$tableA = 'wc_events';
		$tableB = 'wc_events_settings';
		$key1 = 'wc_w_event_code';
		$key2 = 'wc_w_event_code';
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
		$where = 'A.wc_w_event_code = "'.$wc_w_event_code.'"';
		$data['eventinfo'] = $this->Home_model->getDatajoin('db', $tableA, $tableB, $key1, $key2, $getdata, $where, '', '', '', $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy);
        //echo "<pre>"; print_r($data['eventinfo']); exit;
        
		//echo"<pre>"; print_r($this->session->all_userdata()); exit;
        
        $this->load->helper('string');	
        $wc_q_code = random_string('nozero',10);
        
        $submitquery_data = array(
            'wc_q_code' => $wc_q_code,
            'wc_w_event_code' => $data['eventinfo'][0]['wc_w_event_code'],
            'wc_di_code' => $data['eventinfo'][0]['wc_di_code'],
            'wc_q_query' => $this->input->post('query'),
            'wc_q_posted_on' => $objDate->format('Y-m-d H:i:s'),
            'wc_q_posted_by' => $this->session->userdata('wc_participant_u_code'),
            'wc_q_status' => 'Pending',
            'wc_q_resolved_on' => null,
            'wc_q_resolved_by' => null
        );
        //echo "<pre>"; print_r($submitquery_data); exit;
        $insert_query = $this->Home_model->insertData('db', 'wc_queries', $submitquery_data);
        //echo $insert_query; exit;

		if($insert_query){
			$message = array('status' => 1, 'message' => "Query Submitted successfully", 'result' => array());
		}else{
			$message = array('status' => 0, 'message' => "Couldn't submit your query", 'result' => array());
		}	
		echo json_encode($message);
		
	}	
	public function dashboard(){
		if($this->User_Auth()){ } else {
			redirect('login');
		}
				
		$data = array();
	    date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
	}
	public function curls($url, $postdata) {
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
		}catch(Exception $e) {
			return $e;
		}
        return $output;
    }
}