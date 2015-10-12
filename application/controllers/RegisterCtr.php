<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class RegisterCtr extends CI_Controller {

	

	function index(){

		$this->load->helper('cookie');

		$reg_data['name']='';

		$reg_data['username']='';

		$reg_data['email']='';



		/*--------------editan wildan------------

		$this->user = $this->facebook->getUser();

		if($this->user)

		{

			$data['user_profile'] = $this->facebook->api('/me/');

			$first_name = $data['user_profile']['first_name'];

			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";

			if(get_cookie('username')!=null)

			{

				$this->load->view('header', $data);

				$this->load->view('registerUI', $reg_data);

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

			$this->load->view('registerUI', $reg_data);

			$this->load->view('footer');

		}

		----end of editan wildan--------*/

		$this->load->view('header');

		$this->load->view('RegisterUI', $reg_data);

		$this->load->view('footer');

	}

	

	function addMember(){

		$this->load->model('memberMod');

		$this->load->helper('date');

		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		

		$name = $this->input->post('name');

	  	$username = $this->input->post('username');

		$email = $this->input->post('email');

		$password = $this->input->post('password');

		$pass_confirm = $this->input->post('pass_confirm');

		$currentTime = mdate("%Y-%m-%d %H:%i:%s", now());

		//validation: password=pass_confirm, special char, username alr exist

		

		$this->form_validation->set_rules('username', 'username', 'alpha_dash|is_unique[member.username]|xss_clean');

		$this->form_validation->set_rules('email', 'e-mail', 'is_unique[member.email]|xss_clean');

		$this->form_validation->set_rules('pass_confirm', 'password confirmation', 'matches[password]');

		$this->form_validation->set_message('is_unique', 'This %s already exists.');

		

		//if not valid

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed

		{

			$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b><br> Something went wrong. Please try again.</center>'));	

			

			$this->load->helper('cookie');

			$reg_data['name']=$name;

			$reg_data['username']=$username;

			$reg_data['email']=$email;



			/*---------editan wildan-----------

			$this->user = $this->facebook->getUser();

			if($this->user)

			{



				$data['user_profile'] = $this->facebook->api('/me/');

				$first_name = $data['user_profile']['first_name'];

				$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";

				if(get_cookie('username')!=null)

				{

					$this->load->view('header', $data);

					$this->load->view('registerUI', $reg_data);

					$this->load->view('footer');

				}

				else

				{

					setcookie("username_facebook", $data['user_profile']['first_name'], time()+3600, '/');

					setcookie("username",$data['user_profile']['id'], time()+3600, '/');

					setcookie("photo_facebook",$foto_facebook,time()+3600, '/');

					header('Location: '.base_url('successLoginFB'));

				}

			}

			else

			{

				$data['login_url'] = $this->facebook->getLoginUrl();

				$this->load->view('header', $data);

				$this->load->view('registerUI', $reg_data);

				$this->load->view('footer');

			}

			-----------end of editan wildan---------------*/

			$this->load->view('header');

			$this->load->view('RegisterUI', $reg_data);

			$this->load->view('footer');

		}

		else{

			$form_data = array(

				'name' => $name,

				'username' => $username,

				'email' => $email,

				'is_admin' => 0,

				'join_date' => $currentTime,

				'last_active' => $currentTime,

				'password' => md5($password), //di-enkripsi? dulu

				'is_active' => 1,

				//'pic' => 'http://localhost/JAKtrip/assets/img/avadefault.png'

				'pic' => base_url('assets/img/avadefault.png')

			);

			

			if ($this->memberMod->create($form_data) == TRUE){ // the information has therefore been successfully saved in the db

				$this->session->set_flashdata('form', array('message' => '<center><b>Thank you!</b><br> You successfully made an account here. You can log in now.</center>'));	

				redirect('home');   // or whatever logic needs to occur

			}

			else{

				$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b><br> Something went wrong. Please try again.</center>'));	

			}

		}

	}

	

}