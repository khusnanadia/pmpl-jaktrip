<?php

class ReviewCtr extends CI_Controller {

   /* function __construct() {
        parent::__construct();
        $this->load->model('TouristAttrManager');
    }*/

    function index($nama=null)
	{   
		//$this->load->helper( array('url', 'html') );
		$this->load->helper('html');
		$this->load->model('ReviewModel');
		$data['query']= $this->ReviewModel->showreviewtempat($nama);
		$data['query2']= $this->ReviewModel->showjudul($nama);
		//$this->load->view('ReviewUI', $data);
		echo json_encode($data);
	}
	
	    function detailRev($nama=null)
	{   
		$this->load->helper('url');
		$this->load->model('ReviewModel');
		$data['query']= $this->ReviewModel->showreviewtempat($nama);
		//$this->load->view('ReviewUI', $data);
		echo json_encode($data);
	}
	
		public function del($nama, $id)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			//$this->load->model('DetailMod');
			$this->load->model('ReviewModel');
			if((int)$id != null){
			$this->ReviewModel->delete($id);
			}
			//$data['query']= $this->DetailMod->showdetail($nama);
			$data['query2'] = $this->ReviewModel->showreviewtempat($nama);
			//$this->load->view('ReviewUI',$data);    
			echo json_encode($data);
		//$this->load->view('header');
		//$this->load->view('PlaceUI',$data);
		//$this->load->view('footer');
		}

	
	/*function _remap($method)
	{
		if (method_exists($this, $method))
		{
		$this->$method();
		}
		else 
		{
		$this->index($method);
		}
	}*/
}

?>