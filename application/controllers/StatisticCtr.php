<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StatisticCtr extends CI_Controller {
	

	function __construct() {
        parent::__construct();
       
    }
    
	function index(){
		$this->load->model('StatisticManager');
		$this->load->helper('cookie');
		$data['query']= $this->StatisticManager->getstatistic();
		$data['query2']= $this->StatisticManager->getstatisticrating();
		$data['query3']= $this->StatisticManager->getstatisticbudget();

		/*---------editan wildan-------------
		$this->user = $this->facebook->getUser();
		if($this->user)
		{

			$data['user_profile'] = $this->facebook->api('/me/');
			$first_name = $data['user_profile']['first_name'];
			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
			if(get_cookie('username')!=null)
			{
				$this->load->view('header',$data);
				$this->load->view('menuadmin');
				$this->load->view('StatisticUI');
				$this->load->view('footer');
			}
			else
			{
				setcookie("username_facebook", $data['user_profile']['first_name'], time()+3600, '/');
                setcookie("username",$data['user_profile']['id'], time()+3600, '/');
				setcookie("photo_facebook",$foto_facebook,time()+3600, '/');
				setcookie("is_admin",0,time()+3600,'/');
				header('Location: '.base_url('successLoginFB'));
			}
		}
		else
		{
			$data['login_url'] = $this->facebook->getLoginUrl();
			$this->load->view('header',$data);
			$this->load->view('menuadmin');
			$this->load->view('StatisticUI');
			$this->load->view('footer');
		}
		-------end of editan wildan-----------*/
		$this->load->view('header',$data);
		$this->load->view('menuadmin');
		$this->load->view('StatisticUI');
		$this->load->view('footer');
		//echo json_encode($data);
		
	}
	function tes()
		{
		$this->load->model('StatisticManager');
		$data['query3']= $this->StatisticManager->getstatisticrating();
		echo json_encode($data);
		}
}