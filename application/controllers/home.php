<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		 $this->load->model('Home_model');
    }
	public function index()
	{
		$this->checkSession();
		$this->load->view('login');
	}
	public function checkSession(){
		if(isset($_SESSION['userData'])){
			redirect(base_url().'main-page');
		}
	}
	public function add($_RecordID='')
	{
		$_Data = array();
		if(isset($_POST['save']))
			{
				if(isset($_POST['id']) && $_POST['id']!=''){ 
					$_DataInsert['name']							=	$_POST['name'];	 
					$_DataInsert['type']							=	$_POST['type'];					
					$_DataInsert['id']								=	$_POST['id'];					
					$_DataInsert['magento_id']						=	$_POST['magento_id'];	  
					$this->Home_model->updateRecord($_DataInsert);
				
					$_Data['_Success']	=	'Record Updated Successfully';
					
				}else{ 
					
					$_DataInsert['name']				=	$_POST['name'];		 
					$_DataInsert['type']				=	$_POST['type'];		 
					$_DataInsert['magento_id']			=	$_POST['magento_id'];	   
					$insert_id		=	$this->Home_model->addRecord($_DataInsert);
				
					$_Data['_Success']	=	'Record Added Successfully';
					redirect(base_url().'main-page');
			    }
			}
			if(isset($_RecordID) && $_RecordID!=''){
			$_Data['_Record']	=	$this->Home_model->getRecordbyID($_RecordID); 
		}
		$this->load->view('add',$_Data);
	}
	 public function main_page($sort_by='id', $sort_order='ASC')
	{
		$_Data['_RecordData'] = $this->Home_model->getRecordData($sort_by, $sort_order);
		$_Data['sort_by'] = $sort_by;
        $_Data['sort_order'] = $sort_order;
		/* echo '<pre>';
		 print_r($_Data);die; */
		$this->load->view('main_page', $_Data);
	}
	public function delete($_RecordId='')
	{ 
		$_Data	=	array(); 
		if(isset($_RecordId) && $_RecordId!=''){
			$_Data['_Record']	=	$this->Home_model->deleteRecordDataById($_RecordId); 
			$_Data['_Success']	=	'Record Deleted Successfully';
		} 
		/* echo '<pre>';
		print_r($_Data);die; */	
		return redirect(base_url().'main-page');
		//$this->load->view('main_page',$_Data); 
	}
	function getRecordlist($sort_by, $sort_order) {
		$sort_by = 'item_name';
		$sort_order = 'ASC';
        $results = $this->Home_model->getRecord_list($sort_by, $sort_order);
        
		$data['item_list'] = $results['getRecordlist'];
        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;
        echo '<pre>';
		print_r($_data);die;
		
		$this->load->view('main_page', $data);
    }
	public function login(){ 
	
		 $this->checkSession();
		if(!isset($_SESSION['userData'])){
			$_Username		=	$_POST['username'];
			$_Password		=	$_POST['password'];
			$_ResultLogin 		=	$this->Home_model->getCheckUserAccess($_Username,$_Password); 
			if($_ResultLogin > 0){
				$_ResultLoginData 		=	$this->Home_model->getUserData($_Username,$_Password);  
				$_SESSION['Data']	=	$_ResultLoginData; 
				redirect(base_url().'main-page');
			}
			else{
				$_Data['Error']			=	'Invalid Login Details';
				$_Data['_PostData']		=	$_POST;
				$this->load->view('login',$_Data);
			} 
		}
	}
}
