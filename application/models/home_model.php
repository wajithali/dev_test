<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct()
    {
         parent::__construct();
         $this->load->helper('form');
         $this->load->helper('url'); 
		 $this->load->database();
    }
	public function getCheckUserAccess($_Username,$_Password){ 
		
		$this->db->select('*');
        $this->db->from('user');
        $this->db->where('username',$_Username);
        $this->db->where('password',md5($_Password));
        $this->db->where('status','Y');
        $query = $this->db->get();
        return $query->num_rows();
	}
	public function getUserData($_Username,$_Password){ 
		
		$this->db->select('*');
        $this->db->from('user');
        $this->db->where('username',$_Username);
        $this->db->where('password',md5($_Password));
        $this->db->where('status','Y');
        $query = $this->db->get();
		$_Rst	=	$query->row_array(); 
        return $_Rst;
	}
	public function addRecord($_Record)
	{
		//$_Data = array('name' => $_Record['name'],'magento_id' => $_Record['magento_id'])
		$query = $this->db->insert('fcstmr_type', $_Record);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	public function updateRecord($_Record){	
		$_Record_id	=	$_Record['id'];
		 $this->db->where('id',$_Record_id); 
		$query = $this->db->update('fcstmr_type',$_Record);
	}
	 /* public function getRecordData(){
		$this->db->select('*');
		$this->db->from('fcstmr_type');
		$query = $this->db->get();
		$_Rst = $query->result_array();
		return $_Rst;
	}  */
	public function getRecordbyID($_Recordid){
		$this->db->select('*');
		$this->db->from('fcstmr_type');
		$this->db->where('id', $_Recordid);
		$query = $this->db->get();
		$_Rst = $query->row_array();
		return $_Rst;
	}
	public function deleteRecordDataById($_Recordid){	
		$_Data	=	array('id'=>$_Recordid);
		$query = $this->db->delete('fcstmr_type',$_Data);
		 
	}
	 public function getRecordData($sort_by, $sort_order){
		
		$sort_order = ($sort_order == 'DESC') ? 'DESC' : 'ASC';
        $sort_columns = array('id', 'type', 'name', 'magento_id');
		$sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'id';
		
		$this->db->select('*');
		$this->db->from('fcstmr_type');
		$this->db->order_by($sort_by . ' ' . $sort_order);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$_Rst = $query->result_array();
		return $_Rst;
	} 
}
