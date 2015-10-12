<?php
class PromoCtr extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('promoManager');
    }

    /*
    author: 
    editor: Mohammad Syahid Wildan-facebook
    Menampilkan list promo untuk user
    */
    function index($title=null){
		$this->load->helper('cookie');
		$this->load->helper('html');
		$data['query'] = $this->promoManager->showAllPromo($title);

		/*-------editan wildan----------
		$this->user = $this->facebook->getUser();
		if($this->user)
		{
			$data['user_profile'] = $this->facebook->api('/me/');
			$first_name = $data['user_profile']['first_name'];
			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
			if(get_cookie('username')!=null)
			{
				$this->load->view('header', $data);
				$this->load->view('PromoUI',$data);
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
			$this->load->view('PromoUI',$data);
			$this->load->view('footer');
		}
		---------end of editan wildan----------*/
		$this->load->view('header');
		$this->load->view('PromoUI',$data);
		$this->load->view('footer');
		//echo json_encode($data);
	}
}

?>