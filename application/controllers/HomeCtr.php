<?php 



	class homeCtr extends CI_Controller

	{

		public function index()

		{

			$this->load->model('HalteManager');

			$this->load->model('TouristAttractionManager');

			

			$data['query'] = $this->HalteManager->sorthalte();

			$data['kodekoridor'] = $this->HalteManager->haltecode();

			$data['mostPopular'] = $this->TouristAttractionManager->mostPopular();



			$this->load->helper('cookie');

			/*-----------editan wildan---------

			$this->user = $this->facebook->getUser();

			if($this->user)

			{



				$data['user_profile'] = $this->facebook->api('/me/');

				$first_name = $data['user_profile']['first_name'];

				$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";

				if(get_cookie('username')!=null)

				{

					$this->load->view('header', $data);

					$this->load->view('homeUI',$data);

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

				$this->load->view('homeUI',$data);

				$this->load->view('footer');

			}

			------------end of editan wildan------*/

			$this->load->view('header');

			$this->load->view('homeUI',$data);

			$this->load->view('footer');

		}



		/*---------dipindah di loginCtr by wildan----------

		public function successLoginFB()

		{

			//	echo "haha";

			// $this->load->helper('form');

			$this->load->model('HalteManager');

			$this->load->model('memberManager');

			$this->load->model('TouristAttractionManager');

			$this->load->helper('date');

			$this->load->helper('cookie');

			$data['query'] = $this->HalteManager->sorthalte();

			$data['kodekoridor'] = $this->HalteManager->haltecode();

			$data['mostPopular'] = $this->TouristAttractionManager->mostPopular();

			// $data['query']= $this->tesModel->getDatabase();

			// $this->load->view('FormSearchUI',$data);

		// 	$data['query'] = $this->touristAttrManager->getDatabaseWithinBudget($budget);

			$this->user = $this->facebook->getUser();

			$currentTime = mdate("%Y-%m-%d %H:%i:%s", now());

			$data['user_profile'] = $this->facebook->api('/me/');

			$name = $data['user_profile']['first_name']." ".$data['user_profile']['last_name'];

			$username = $data['user_profile']['id'];

			$email = "https://www.facebook.com/".$data['user_profile']['id'];

			$password = "facebook".$data['user_profile']['last_name'];

			$pic = "https://graph.facebook.com/".$data['user_profile']['id']."/picture?type=large";

			$form_data = array(

				'name' => $name,

				'username' => $username,

				'email' => $email,

				'is_admin' => 0,

				'join_date' => $currentTime,

				'last_active' => $currentTime,

				'password' => md5($password), //di-enkripsi? dulu

				'is_active' => 1,

				'pic' => $pic

			);

			

			$this->memberManager->accountFacebookRegister($form_data);

			$this->load->view('header',$data);

			$this->load->view('homeUI',$data);

			$this->load->view('footer');

		}

		-----------end of dipindah di loginCtr by wildan-------- */

	}	

?>