<?php

class FeedbackCtr extends CI_Controller {

    function __construct() {

        parent::__construct();

        $this->load->model('feedbackManager');

        $this->load->model('suggestionManager');

    }



    /*

	author: Syifa Khairunnisa

	editor: Mohammad Syahid Wildan-facebook

	Menampilkan form isian feedback pada halaman Contact Us

	*/

    function index(){

    	/*---------------editan wildan--------

    	$this->load->helper('cookie');

		$this->user = $this->facebook->getUser();

		if($this->user)

		{



			$data['user_profile'] = $this->facebook->api('/me/');

			$first_name = $data['user_profile']['first_name'];

			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";

			if(get_cookie('username')!=null)

			{

				$this->load->view('header', $data);

				$this->load->view('formFeedbackUI');

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

			$this->load->view('formFeedbackUI');

			$this->load->view('footer');

		}

		-------------end of editan wildan-------------*/

		$this->load->view('header');

		$this->load->view('FormFeedbackUI');

		$this->load->view('footer');

    }



    /*

	author: Khusna Nadia

	editor: Syifa Khairunnisa-notifikasi sukses submit

			Mohammad Syahid Wildan-facebook

	Men-submit form feedback

	*/

    function submitForm()

	{   

		$this->load->library('form_validation');

        $this->load->helper('cookie');        

        $this->load->helper('form');

        

        

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_rules('name', 'name', 'required');

		$this->form_validation->set_rules('email', 'email', 'required|valid_email');

		$this->form_validation->set_rules('message', 'message', 'required');





		if ($this->form_validation->run() == FALSE)

		{



			if (isset($_POST['submitmsg'])) {

				$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Something went wrong. Please try again.</center>'));

			}

			else{}

			/*-----------editan wildan---------------	

			$this->user = $this->facebook->getUser();

			if($this->user)

			{



				$data['user_profile'] = $this->facebook->api('/me/');

				$first_name = $data['user_profile']['first_name'];

				$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";

				if(get_cookie('username')!=null)

				{

					$this->load->view('header', $data);

					$this->load->view('formFeedbackUI');

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

				$this->load->view('formFeedbackUI');

				$this->load->view('footer');

			}

			---------end of editan wildan--------*/

			$this->load->view('header');

			$this->load->view('formFeedbackUI');

			$this->load->view('footer');

		}

		else

		{

			$data = array(

                        'name' => $this->input->post('name'),

                        'email' => $this->input->post('email'),

                        'subject' => $this->input->post('subject'),

                        'message' => $this->input->post('message')

                    );



				//Transfering data to Model

            $this->feedbackManager->insert_feedback($data);

			$this->session->set_flashdata('form', array('message' => '<center><b>Thank you!</b> You successfully submitted your form.</center>'));

			redirect('contactus');



        	/*--------editan wildan----------

            $this->user = $this->facebook->getUser();

			if($this->user)

			{

				$data['user_profile'] = $this->facebook->api('/me/');

				$first_name = $data['user_profile']['first_name'];

				$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";

				if(get_cookie('username')!=null)

				{

					header("Location: ".base_url()."contactus");

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

				header("Location: ".base_url()."contactus");

			}

			-----------end of editan wildan-------------*/

			// $this->load->view('header');

			// $this->load->view('formFeedbackUI');

			// $this->load->view('footer');

        }

	}

}



?>