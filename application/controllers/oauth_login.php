<?php

class oauth_Login extends CI_Controller {

public $user = "";

public function __construct() {
parent::__construct();

// Load facebook library and pass associative array which contains appId and secret key
$this->load->library('facebook', array('appId' => '1426255641008460', 'secret' => '913618efdd8c6c7cbbe321e51644bcaf'));

// Get user's login information
$this->user = $this->facebook->getUser();

}

// Store user information and send to profile page
public function index() {
	/*----------------------tak comment disik-------------------------

	if ($this->user) {

	$data['user_profile'] = $this->facebook->api('/me/');

	// Get logout url of facebook
	// print_r($this->facebook->getLoginUrl(array(
	//     'scope'         => 'email',
	//     )));
	$data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url('oauth_login/logout')));
	//print_r($this->facebook->api('/me/'));
	// Send data to profile page
	$this->load->view('profile', $data);
	} else {

	// Store users facebook login url
	$data['login_url'] = $this->facebook->getLoginUrl(array('scope' => 'email'));
	$this->load->view('login', $data);
	}

	----------------------end of tak comment disik----------*/
	$this->load->view('profile');
}

public function loginFB()
{
	$this->user = $this->facebook->getUser();
	if($this->user)
	{
		
		$data['user_profile'] = $this->facebook->api('/me/');
		$first_name = $data['user_profile']['first_name'];
		$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
		// if(get_cookie('username')!=null)
		// {
		// 	$this->load->view('header', $data);
		// 	$this->load->view('homeUI',$data);
		// 	$this->load->view('footer');
		// }
		// else
		// {
		setcookie("username_facebook", $data['user_profile']['first_name'], time()+3600, '/');
		setcookie("username",$data['user_profile']['id'], time()+3600, '/');
		setcookie("photo_facebook",$foto_facebook,time()+3600, '/');
		setcookie("is_admin",0,time()+3600,'/');
		header('Location: http://localhost/JAKtrip/index.php/oauth_login/successLoginFB');
		// }
	}
	else
	{
		$data['login_url'] = $this->facebook->getLoginUrl(array('scope' => 'email'));
		//echo $data['login_url'];
		redirect($data['login_url']);
		// $data['login_url'] = $this->facebook->getLoginUrl();
		// $this->load->view('header', $data);
		// $this->load->view('homeUI',$data);
		// $this->load->view('footer');
	}
}

public function successLoginFB()
{
	$this->load->view('profile');
}
// Logout from facebook
public function logout() {

// Destroy session
	
	if(isset($_COOKIE["username"]))
	{
		setcookie("username",null,time()+3600, '/');
		setcookie("photo_facebook",null,time()+3600, '/');
		setcookie("foto_profil",null,time()+3600,'/');
		session_destroy();
	}

// Redirect to baseurl
	redirect('http://localhost/JAKtrip/index.php/oauth_login');
}

}
?>