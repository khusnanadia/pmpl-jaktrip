<?php 

	class loginCtr extends CI_Controller

	{

		

		public function checkLogin()

		{

			$this->load->model('memberManager');

			$this->load->helper('security');

			$this->load->helper('text');

			$this->load->helper('cookie');



			$str = do_hash(($this->input->post('password')),'md5');

			$data = array(

				'nameORemail' => $this->input->post('username'),

				'password' => $str

			);

			$hasil['query'] = $this->memberManager->validasiLogin($data);	

			//echo json_encode($hasil);

			if($hasil['query']==false)

			{

				/*-------editan wildan-------------

				$this->user = $this->facebook->getUser();

				if($this->user)

				{



					$data['user_profile'] = $this->facebook->api('/me/');

					$first_name = $data['user_profile']['first_name'];

					$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";

					if(get_cookie('username')!=null)

					{

						$this->load->view('header', $data);

						$this->load->view('LoginUI');

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

					$this->load->view('LoginUI');

					$this->load->view('footer');

				}

				------------end of editan wildan-----------*/

				$this->load->view('header');

				$this->load->view('LoginUI');

				$this->load->view('footer');

			}

			else

			{

				setcookie("username",$hasil['query']['username'],time()+3600, '/');

				setcookie("counterTrip", 0, time()+3600, '/');

				setcookie("placeName", "", time()+3600, '/');

				setcookie("halteName", "", time()+3600, '/');

				setcookie("buswayPrice", "", time()+3600, '/');

				setcookie("angkotPrice", "", time()+3600, '/');

				setcookie("ticketPrice", "", time()+3600, '/');

				setcookie("totalPrice", "", time()+3600, '/');

				setcookie("transportInfo","",time()+3600, '/');

				setcookie("placeInfo", "", time()+3600, '/');

				setcookie("counterTrip", 0, time()+3600, '/');

				setcookie("idxFirstTrip", -1, time()+3600, '/');

				setcookie("idxLastTrip", -1, time()+3600, '/');

				setcookie("is_admin",$hasil['query']['is_admin'],time()+3600,'/');

				// echo $hasil['query']['is_admin'];

				if($hasil['query']['pic'] == null)

				{

					$foto = base_url('assets/img/oor.jpg');

				}

				else

				{

					$foto = $hasil['query']['pic'];

				}

				setcookie("foto_profil",$foto,time()+3600,'/');

				header("Location:".base_url('home')."");

			}

			

		}



		public function loginFB()

		{

			$this->user = $this->facebook->getUser();

			if($this->user)

			{

				

				$data['user_profile'] = $this->facebook->api('/me/');

				$first_name = $data['user_profile']['first_name'];

				$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";

				setcookie("username_facebook", $data['user_profile']['first_name'], time()+3600, '/');

				setcookie("username",$data['user_profile']['id'], time()+3600, '/');

				setcookie("photo_facebook",$foto_facebook,time()+3600, '/');

				setcookie("is_admin",0,time()+3600,'/');

				header('Location: '.base_url('successLoginFB'));

			}

			else

			{

				$data['login_url'] = $this->facebook->getLoginUrl(array('scope' => 'email'));

				redirect($data['login_url']);

			}

		}



		public function successLoginFB()

		{

			

			$this->load->model('HalteManager');

			$this->load->model('memberManager');

			$this->load->model('TouristAttractionManager');

			$this->load->helper('date');

			$this->load->helper('cookie');

			$data['query'] = $this->HalteManager->sorthalte();

			$data['kodekoridor'] = $this->HalteManager->haltecode();

			$data['mostPopular'] = $this->TouristAttractionManager->mostPopular();

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



		public function logout()

		{

			if(isset($_COOKIE["username"]))

			{

				setcookie("username",null,time()+3600, '/');

			//	header("Location:http://google.com");

				setcookie("counterTrip", 0, time()+3600, '/');

				setcookie("placeName", "", time()+3600, '/');

				setcookie("halteName", "", time()+3600, '/');

				setcookie("buswayPrice", "", time()+3600, '/');

				setcookie("angkotPrice", "", time()+3600, '/');

				setcookie("ticketPrice", "", time()+3600, '/');

				setcookie("totalPrice", "", time()+3600, '/');

				setcookie("transportInfo","",time()+3600, '/');

				setcookie("placeInfo", "", time()+3600, '/');

				setcookie("counterTrip", 0, time()+3600, '/');

				setcookie("idxFirstTrip", -1, time()+3600, '/');

				setcookie("idxLastTrip", -1, time()+3600, '/');

				setcookie("photo_facebook",null,time()+3600, '/');

				setcookie("foto_profil",null,time()+3600,'/');

				session_destroy();

			}

			header("Location:".base_url()."home");

		}

	}	

?>