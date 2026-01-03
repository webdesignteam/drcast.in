<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sms extends CI_Controller {
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
	public function send_sms(){
	    $data = array();
		date_default_timezone_set('Asia/Kolkata');
		$objDate = new DateTime();
		
		$getdata = '*';
    	$where = 'wc_sms_en_status = "Scheduled" AND wc_sms_en_schedule_date_time < "' . date('Y-m-d H:i:s') . '"';
    	$data['send_sms'] = $this->Home_model->getData('db', 'wc_sms_enroll', $getdata,  $where,'','','','');
    	//echo "<pre>"; print_r($data['send_sms']); //exit;
    	
    	if($data['send_sms']){
    	    //echo count($data['send_sms']); exit;
    	    foreach($data['send_sms'] as $send_sms){
    	    //echo $send_sms['wc_sms_en_account']; exit;
    	    
    	    //Send SMS
    	    $MOBILE = trim($send_sms['wc_sms_en_number']," ");
    		$VAL1 = $send_sms['wc_sms_en_name'];;
    		$VAL2 = $this->input->Post('VAL2');
    		$VAL3 = $this->input->Post('VAL3');
    		
    		if($send_sms['wc_sms_en_account'] == 'Hetero' AND $send_sms['wc_sms_en_source_from'] == 'HeteroSMSGATEWAYHUB'){
    		    $TEMPLATENAME = trim($this->input->Post('TEMPLATENAME')," ");
    		}
    		else{
    		    $TEMPLATENAME = '';
    		}
    	    $postdata = http_build_query(
                array(
                    'MOBILE' => $MOBILE,
                    'VAL1' => $VAL1,
                    'VAL2' => '',
                    'VAL3' => '',
                    'TEMPLATENAME' => 'H-WC-SGH-TY',
                )
            );
            //print_r($postdata); exit;
            $url = 'https://www.heterohealthcare.com/sms/webinarcmshetero';
            
            //$this->curls($url, $postdata);
    	    
    	    //Update Status
    	    $sent_status = array(
    			'wc_sms_en_status' => 'Triggered',
    			'wc_sms_en_triggered_on' => $objDate->format('Y-m-d H:i:s'),
    		);
    		//echo "<pre>"; print_r($sent_status); exit;
    		$where = 'wc_sms_en_code  = "'.$send_sms['wc_sms_en_code'].'"';
    		//print_r($where); exit;
    		$this->Home_model->updateData('db', 'wc_sms_enroll', $sent_status, $where);
    	}
    	    echo "Task Was successfully Completed"; exit;
    	}
    	elseif(empty($data['send_sms'])){
    	    echo "Task was not available"; exit;
    	}
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