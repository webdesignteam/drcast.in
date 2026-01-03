<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Home_model extends CI_Model {
    var $CI;
    function __construct() {
        parent::__construct();
        $this->load->database('default',true);
        //$this->Hetero = $this->load->database('Hetero', true);
		error_reporting(E_ALL); ini_set('display_errors', 1); 
        //echo "<pre>"; print_r($result); exit;
    }
	// Common Models //
    public function insertData($db, $table, $data) {
        //echo "Welcome"; exit;
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
}
