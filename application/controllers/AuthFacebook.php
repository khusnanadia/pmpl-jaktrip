<?php

class AuthFacebook extends CI_Controller {

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
$data['login_url'] = $this->facebook->getLoginUrl();

print_r($data['login_url']);
}
}

// Logout from facebook
public function logout() {

// Destroy session
session_destroy();

// Redirect to baseurl
redirect(base_url('FacebookButtonCtr'));
}

}
?>