<?php

class FacebookButtonCtr extends CI_Controller {

public $user = "";

public function __construct() {
parent::__construct();

// // Load facebook library and pass associative array which contains appId and secret key
// $this->load->library('facebook', array('appId' => '1426255641008460', 'secret' => '913618efdd8c6c7cbbe321e51644bcaf'));

// // Get user's login information
// $this->user = $this->facebook->getUser();

}

// Store user information and send to profile page
public function index() {
	
	$data['login_url'] = $this->facebook->getLoginUrl();
	$this->user = $this->facebook->getUser();
	$this->load->helper('cookie');
	
	if($this->user)
	{
		$data['user_profile'] = $this->facebook->api('/me/');
		$first_name = $data['user_profile']['first_name'];
		$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
		setcookie("username",$first_name, time()+3600, '/');
		setcookie("photo_facebook",$foto_facebook,time()+3600, '/');
		header('Location: '.base_url('home'));
		// $this->load->view('header');
		// $this->load->view('homeUI',$data);
		// $this->load->view('footer');
	}
	else
	{
		print_r($this->facebook->getUser());
		$this->load->view('facebookButton', $data);
	}
	
}


// if ($this->user) {

// $data['user_profile'] = $this->facebook->api('/me/');

// // Get logout url of facebook
// // print_r($this->facebook->getLoginUrl(array(
// //     'scope'         => 'email',
// //     )));
// $data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url('oauth_login/logout')));
// //print_r($this->facebook->api('/me/'));
// // Send data to profile page
// $this->load->view('profile', $data);
// } else {

// // Store users facebook login url
// $data['login_url'] = $this->facebook->getLoginUrl();
// redirect($data['login_url']);
// }
// }

// // Logout from facebook
// public function logout() {

// // Destroy session
// session_destroy();

// // Redirect to baseurl
// redirect(base_url('index.php/oauth_login'));
// }

// }
}
?>