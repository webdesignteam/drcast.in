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
    public function getData_testing($db, $table, $getdata, $where, $limit, $colum, $order, $distinct) {
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
    public function treatmentsLinking($db, $tableA, $tableB, $key1, $key2, $getdata = '*', $where = '', $colum = '', $order = '', $limit = '', $joins = array()){
        // Select fields
        $this->$db->select($getdata);
    
        // Base table
        $this->$db->from($tableA . ' AS A');
    
        // First join (mandatory)
        $this->$db->join($tableB . ' AS B', 'A.' . $key1 . ' = B.' . $key2, 'LEFT');
    
        // Extra joins (optional)
        if (!empty($joins) && is_array($joins)) {
            foreach ($joins as $alias => $join) {
                $type = isset($join['type']) ? $join['type'] : 'LEFT';
                $this->$db->join($join['table'] . ' AS ' . $alias, $join['condition'], $type);
            }
        }
    
        // Where condition
        if (!empty($where)) {
            $this->$db->where($where);
        }
    
        // Order by
        if (!empty($colum) && !empty($order)) {
            $this->$db->order_by($colum, $order);
        }
    
        // Limit
        if (!empty($limit)) {
            $this->$db->limit($limit);
        }
    
        // Run query
        $query = $this->$db->get();
    
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }
    public function getDatajoin($db, $tableA, $tableB, $key1, $key2, $getdata, $where, $colum, $order, $limit, $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12) {
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
    public function getDatasearch($db, $tableA, $tableB, $key1, $key2, $getdata, $where, $colum, $order, $limit, $tableC, $key3, $key4, $tableD, $key5, $key6, $tableE, $key7, $key8, $tableF, $key9, $key10, $tableG, $key11, $key12, $like, $likekey, $like2, $likekey2, $like3, $likekey3, $like4, $likekey4, $like5, $likekey5) {
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
        
        
        // if (empty($likecolum) && empty($like)){} else{$this->$db->like($like, $likekey);}

        // if (empty($likekey2) && empty($like2)){} else{$this->$db->or_like($like2, $likekey2);}

        // if (empty($likekey3) && empty($like3)){} else{$this->$db->or_like($like3, $likekey3);}

        // if (empty($likekey4) && empty($like4)){} else{$this->$db->or_like($like4, $likekey4);}

        // if (empty($likekey5) && empty($like5)){} else{$this->$db->or_like($like5, $likekey5);}
        
         $this->$db->group_start(); // Start grouping the OR LIKEs

        if (!empty($like) && !empty($likekey)) {
            $this->$db->like($like, $likekey);
        }

        if (!empty($like2) && !empty($likekey2)) {
            $this->$db->or_like($like2, $likekey2);
        }

        if (!empty($like3) && !empty($likekey3)) {
            $this->$db->or_like($like3, $likekey3);
        }

        if (!empty($like4) && !empty($likekey4)) {
            $this->$db->or_like($like4, $likekey4);
        }
        if (!empty($like5) && !empty($likekey5)) {
            $this->$db->or_like($like5, $likekey5);
        }
        $this->$db->group_end(); // End group
        
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
    public function getCount($db, $table, $where){
		$this->$db->trans_start();	
		$this->$db->select('*');
		$this->$db->from($table);
		if (empty($where)){} else{$this->$db->where($where);}
		$query = $this->$db->get();
		//echo $this->$db->last_query(); exit;
		$this->$db->trans_complete();
		if ($this->$db->trans_status() === FALSE){			
			return false;
		}
		else{			
			if($query->num_rows() > 0){
				return $query->num_rows();
			}
			else{				
				return false;
			}
		}
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
    
    public function update_sort_order($itemId, $sortOrder) {
        // Update the database record with the new sort order
        $data = array(
            'sort_order' => $sortOrder
        );
        $this->db->where('id', $itemId);
        $this->db->update('your_table_name', $data);
    }
    // End Common Models //
    
     //Blog
         public function BlogGroupByYear($doccode){
        //echo $doccode; exit;
		$query = $this->db->query("SELECT YEAR(`dw_b_date`) AS YEAR, COUNT(*) FROM `dw_blogs` WHERE `dw_code` = '$doccode' GROUP BY YEAR(`dw_b_date`) ORDER BY `YEAR` ASC");
		//$query = $this->db->query("SELECT YEAR(`dw_b_date`) AS YEAR, COUNT(*) FROM `dw_blogs` GROUP BY YEAR(`dw_b_date`) ORDER BY `YEAR` ASC");
		//echo $this->db->last_query(); exit;
		$result = $query->result_array();
        return $result;
    }

    public function BlogGroupByYearMonth($doccode){
		$query = $this->db->query("SELECT YEAR(`dw_b_date`) AS YEAR,MONTH(`dw_b_date`), MONTHNAME(dw_b_date) AS MONTHName, COUNT(*) FROM `dw_blogs` WHERE `dw_code` = '$doccode' GROUP BY YEAR(`dw_b_date`), MONTH(`dw_b_date`)");
// 		$query = $this->db->query("SELECT YEAR(`dw_b_date`) AS YEAR,MONTH(`dw_b_date`), MONTHNAME(dw_b_date) AS MONTHName, COUNT(*) FROM `dw_blogs` GROUP BY YEAR(`dw_b_date`), MONTH(`dw_b_date`)");
//      echo $this->db->last_query(); exit;
		$result = $query->result_array();
        return $result;
    }

   public function BlogGroupByYearMonthData($doccode){
		$query = $this->db->query("SELECT YEAR(dw_blogs.dw_b_date) AS YEAR,MONTH(dw_blogs.dw_b_date) AS MONTH, MONTHNAME(dw_blogs.dw_b_date) AS MONTHName,dw_blogs.dw_b_title, dw_app_routes.slug FROM dw_blogs LEFT JOIN dw_app_routes ON dw_blogs.dw_page_id = dw_app_routes.dw_page_id WHERE dw_blogs.dw_code = '$doccode'");
// 		$query = $this->db->query("SELECT YEAR(`dw_b_date`) AS YEAR,MONTH(`dw_b_date`), MONTHNAME(dw_b_date) AS MONTHName, 	dw_b_title FROM `dw_blogs`");
//      echo $this->db->last_query(); exit;
		$result = $query->result_array();
        return $result;
    }
    
    // Testing
    /*public function getMenus() {
        // Fetch menu items from the database
        $query = $this->db->get('menus');
        return $query->result();
    }*/
    
    public function navigationheader($dw_code) {
        //echo $dw_code; exit;
        // Fetch menu items from the database
        //$query = $this->db->query("SELECT * FROM `dw_navigation_list` WHERE `dw_code` = 'Z9JFgY47kv' AND `dw_nav_id` = '39'");
        $query = $this->db->query("SELECT * FROM `dw_navigation_list` AS `A` LEFT JOIN `dw_app_routes` AS `B` ON `A`.`dw_app_routes_id` = `B`.`dw_app_routes_id` LEFT JOIN `dw_navigation` AS `C` ON `A`.`dw_nav_id` = `C`.`dw_nav_id` WHERE `A`.`dw_code` = '$dw_code' AND `A`.`dw_nl_status` = '1001' AND `C`.`dw_nav_code` = 'HeaderMenu' ORDER BY `dw_nl_sort_order` ASC");
        //echo $this->db->last_query(); exit;
        //$query = $this->db->get('dw_navigation_list');
        return $query->result();
    }
    
}
