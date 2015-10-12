<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FeedbackAdmCtr extends CI_Controller {
	

	function __construct() {
        parent::__construct();
        //$this->load->model('SpamManager');
       
    }
    
	function index(){
		$this->load->model('feedbackManager');
		$this->load->helper('cookie');
		$data['query']= $this->feedbackManager->showAllFeedback();

		/*---------------editan wildan------------
		$this->user = $this->facebook->getUser();
		if($this->user)
		{

			$data['user_profile'] = $this->facebook->api('/me/');
			$first_name = $data['user_profile']['first_name'];
			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
			if(get_cookie('username')!=null)
			{
				$this->load->view('header', $data);
				$this->load->view('menuadmin');
				$this->load->view('FeedbackUI', $data);
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
			$this->load->view('header', $data);
			$this->load->view('menuadmin');
			$this->load->view('FeedbackUI', $data);
			$this->load->view('footer');
		}
		----------editan wildan------------------*/
		$this->load->view('header', $data);
		$this->load->view('menuadmin');
		$this->load->view('FeedbackUI', $data);
		$this->load->view('footer');
	}

}