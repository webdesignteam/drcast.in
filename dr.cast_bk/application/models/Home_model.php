<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Home_model extends CI_Model {
    var $CI;

    function __construct() {
        parent::__construct();
        $this->load->database('default',true);
        // $this->hhcl = $this->load->database('hhcl', true);
		error_reporting(E_ALL); ini_set('display_errors', 1); 
        //echo "<pre>"; print_r($result); exit;
    }
	// Common Models //
    public function insertData($db, $table, $data) {
        $this->$db->trans_start();
        $this->$db->insert($table, $data);
        $insert_id = $this->$db->insert_id();
		//echo $this->$db->last_query(); exit;
        $this->$db->trans_complete();
        if ($this->$db->trans_status() === FALSE) {
            return FALSE;
        } else {
            if ($insert_id > 0) {
                return $insert_id;
            } else {
                return FALSE;
            }
        }
    }
    public function insert_batch($db, $table, $data) {
        //echo "<pre>"; print_r($data); exit;
		$result = $this->$db->insert_batch($table, $data);
		if($this->$db->affected_rows() >= 1) return TRUE;
		return FALSE;
	}
    
    public function getData($db, $table, $getdata, $where, $limit, $colum, $order, $distinct) {
        $this->$db->trans_start();
        if (empty($distinct)){} else{$this->$db->distinct();}        
        $this->$db->select($getdata);
        $this->$db->from($table);
        if (empty($where)){} else{$this->$db->where($where);}
        if (empty($limit)){} else{$this->$db->limit($limit);}
        if (empty($colum) && empty($order)){} else{$this->$db->order_by($colum, $order);}
        $query = $this->$db->get();
		//echo $this->$db->last_query(); exit;
        $data = $query->result_array();
		$this->$db->trans_complete();
        if ($this->$db->trans_status() === FALSE) {
            return FALSE;
        } else {
            if ($query->num_rows() >= 1) {
                return $data;
            } else {
                return FALSE;
            }
        }
    }
    public function getDatajoin($db, $tableA, $tableB, $key1, $key2, $getdata, $where, $colum, $order, $limit, $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $groupBy) {
        //echo "in"; exit;
        $this->$db->trans_start();
        if (empty($getdata)){$this->$db->select('*');} else{$this->$db->select($getdata);}
        $this->$db->from($tableA.' AS A');
        $this->$db->join($tableB.' AS B', 'A.'.$key1.' = B.'.$key2,'LEFT');
        if (empty($tableC) && empty($key3)){} else{$this->$db->join($tableC.' AS C', 'A.'.$key3.' = C.'.$key4,'LEFT');}
        if (empty($tableD) && empty($key5)){} else{$this->$db->join($tableD.' AS D', 'A.'.$key5.' = D.'.$key6,'LEFT');}
        if (empty($tableE) && empty($key7)){} else{$this->$db->join($tableE.' AS E', 'A.'.$key7.' = E.'.$key8,'LEFT');}
        if (empty($tableF) && empty($key9)){} else{$this->$db->join($tableF.' AS F', 'A.'.$key9.' = F.'.$key10,'LEFT');}
        if (empty($tableG) && empty($key11)){} else{$this->$db->join($tableG.' AS G', 'A.'.$key11.' = G.'.$key12,'LEFT');}
        if (empty($where)){} else{$this->$db->where($where);}
        if (empty($limit)){} else{$this->$db->limit($limit);}
        if (empty($colum) && empty($order)){} else{$this->$db->order_by($colum, $order);}
        if (empty($groupBy)){ } else{ $this->$db->group_by($groupBy); }
        $query = $this->$db->get();
	    //echo $this->$db->last_query(); exit;
        $data = $query->result_array();
		$this->$db->trans_complete();
        if ($this->$db->trans_status() === FALSE) {
            return FALSE;
        } else {
            if ($query->num_rows() >= 1) {
                return $data;
            } else {
                return FALSE;
            }
        }
    }
    public function updateData($db, $table, $data, $where) {
        $this->$db->trans_start();
        $this->$db->where($where);
        $this->$db->update($table, $data);
        $afftectedRows = $this->$db->affected_rows();
		//echo $this->$db->last_query(); exit;
        $this->$db->trans_complete();
        // $str = $this->$db->last_query();
        if ($this->$db->trans_status() === FALSE) {
            return false;
        } else {
            if ($afftectedRows > 0) {
                return true;
            } else {
                return true;
            }
        }
    }
    public function DeleteData($db, $table, $where, $data) {
        $this->$db->where($where, $data);
        $this->$db->delete($table);
        //echo $this->$db->last_query(); exit;
        $afftectedRows = $this->$db->affected_rows();
        $this->$db->trans_complete();
        if ($this->$db->trans_status() === FALSE) {
            return false;
        } else {
            if ($afftectedRows > 0) {
                return true;
            } else {
                return true;
            }
        }
    }
    public function generateRandomString($length = 32) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	//SELECT COUNT(DISTINCT(`user_email`)) FROM `users`;
        
    public function getCount($db, $table, $getdata, $where, $distinct){
		$this->$db->trans_start();
		if (!empty($distinct)) { $this->$db->select("COUNT(DISTINCT($distinct)) as count"); } else { $this->$db->select("COUNT(*) as count"); }
		$this->$db->select($getdata);
		$this->$db->from($table);
		if(empty($where)){} else{$this->$db->where($where);}
		$query = $this->$db->get();
		//echo $this->$db->last_query(); exit;
		$result = $query->row_array();
        return $result;
	}
	public function getCount_testing($db, $table, $getdata, $where, $distinct){
		$this->$db->trans_start();
		if (!empty($distinct)) { $this->$db->select("COUNT(DISTINCT($distinct)) as count"); } else { $this->$db->select("COUNT(*) as count"); }
		$this->$db->select($getdata);
		$this->$db->from($table);
		if(empty($where)){} else{$this->$db->where($where);}
		$query = $this->$db->get();
		echo $this->$db->last_query(); exit;
		$result = $query->row_array();
        return $result;
	}
    public function login($db, $table, $where){
        $this->$db->trans_start();	
        $this->$db->select('*');
        $this->$db->from($table);
        $this->$db->where($where);
        $query = $this->$db->get();
        //echo $this->db->last_query();
        //print_r($query->result());exit;
        $this->$db->trans_complete();
        if ($this->$db->trans_status() === FALSE){			
            return false;
        }
        else{			
            return $query->result();
        }
    }
    // End Common Models //
    
    //all users count
    public function allusers($whereallusers){
        //echo $whereallusers; exit;
        if($whereallusers){
            $query = $this->db->query("SELECT COUNT(wc_users.user_autoID) AS no_of_participants FROM wc_users JOIN webinar_list ON wc_users.user_webinarname = webinar_list.wc_code JOIN wc_divisions ON webinar_list.wc_id = wc_divisions.wc_d_id $whereallusers");
        }
        else{
		    $query = $this->db->query("SELECT COUNT(wc_users.user_autoID) AS no_of_participants FROM wc_users JOIN webinar_list ON wc_users.user_webinarname = webinar_list.wc_code JOIN wc_divisions ON webinar_list.wc_id = wc_divisions.wc_d_id");
        }
		//echo "<pre>"; echo $this->db->last_query(); exit;
		$result = $query->result_array();
        return $result;
    }
    
    public function uniqueusers($whereuniqueusers){
        //echo $whereuniqueusers; exit;
        if($whereuniqueusers){
            $query = $this->db->query("SELECT COUNT(DISTINCT(wc_users.wc_u_email)) AS no_of_participants FROM wc_users JOIN webinar ON wc_users.user_webinarname = webinar_list.wc_code JOIN wc_divisions ON webinar.wc_d_id = wc_divisions.wc_d_id $whereuniqueusers");
        }
        else{
		    $query = $this->db->query("SELECT COUNT(DISTINCT(wc_u_email)) AS no_of_participants FROM wc_users");
        }
		//echo "<pre>"; echo $this->db->last_query(); exit;
		$result = $query->result_array();
        return $result;
    }
    
    //allqueries count
    public function allqueries($whereallqueries){
        //echo $whereallqueries; exit;
        if($whereallqueries){
            $query = $this->db->query("SELECT COUNT(tbl_queries.Que_Code) AS no_of_queries FROM tbl_queries JOIN webinar_list ON tbl_queries.Que_webinar = webinar_list.wc_code $whereallqueries");
        }
        else{
		    $query = $this->db->query("SELECT COUNT(tbl_queries.Que_Code) AS no_of_queries FROM tbl_queries JOIN webinar_list ON tbl_queries.Que_webinar = webinar_list.wc_code");
        }
		//echo "<pre>"; echo $this->db->last_query(); exit;
		$result = $query->result_array();
        return $result;
    }
    
    //answered queries count
    public function answeredqueries($whereanswered){
        //echo $whereanswered; exit;
        if($whereanswered){
            $query = $this->db->query("SELECT COUNT(tbl_queries.Que_Code) AS no_of_queries FROM tbl_queries JOIN webinar_list ON tbl_queries.Que_webinar = webinar_list.wc_code WHERE tbl_queries.Que_status = '1002' AND $whereanswered");
        }
        else{
		    $query = $this->db->query("SELECT COUNT(tbl_queries.Que_Code) AS no_of_queries FROM tbl_queries JOIN webinar_list ON tbl_queries.Que_webinar = webinar_list.wc_code WHERE tbl_queries.Que_status = '1002'");
        }
		//echo "<pre>"; echo $this->db->last_query(); exit;
		$result = $query->result_array();
        return $result;
    }
    
    public function piechart(){
		$query = $this->db->query("SELECT `wc_division` AS division_name, COUNT(`wc_division`) AS division_count FROM `webinar_list` GROUP BY wc_division ORDER BY division_name");
		//echo "<pre>"; echo $this->db->last_query(); exit;
		$result = $query->result_array();
        return $result;
    }
    
    public function barchart(){
    	$query = $this->db->query("SELECT wc_division AS webinar_division, COUNT(`wc_code`) AS no_of_users FROM webinar_list JOIN wc_users ON webinar_list.wc_code = wc_users.wc_u_display_name GROUP BY webinar_list.wc_division ORDER BY webinar_division");
    	//echo "<pre>"; echo $this->db->last_query(); exit;
    	$result = $query->result_array();
        return $result;
    }
    
    public function queriescount(){
    	$query = $this->db->query("SELECT wc_division AS webinar_division, COUNT(`Que_Code`) AS no_of_queries FROM webinar_list JOIN tbl_queries ON webinar_list.wc_code = tbl_queries.Que_webinar GROUP BY webinar_list.wc_division ORDER BY webinar_division");
    	//echo "<pre>"; echo $this->db->last_query(); exit;
    	$result = $query->result_array();
        return $result;
    }
    
    public function analyticsdata(){
    	$query = $this->db->query("SELECT webinar_list.webinar_division, COUNT(webinar_list.wc_code) AS no_of_webinars, COUNT(DISTINCT(users.user_email)) AS no_of_users, COUNT(tbl_queries.Que_Code) AS no_of_queries FROM webinar_list JOIN users ON webinar_list.wc_code = users.user_webinarname JOIN tbl_queries ON webinar_list.wc_code = tbl_queries.Que_webinar GROUP BY webinar.wc_d_id");
    	//echo "<pre>"; echo $this->db->last_query(); exit;
    	$result = $query->result_array();
        return $result;
    }
    
    
}
