<?php 

	session_start();
	class tesController extends CI_Controller
	{
		public function index()
		{
			$this->load->helper('form');
			$this->load->model('tesModel');
			$data['query']= $this->tesModel->getDatabase();
			$this->load->view('tesViews',$data);
		}
		public function getAll()
		{
			$this->load->model('tesModel');

			$data['query']= $this->tesModel->getAllDatabase();
		//	$data['peta']= $this->load->view('peta', '', true);

			echo json_encode($data);

		}

		public function chooseTouristAttr($budgetString)
		{
		//	echo "<p>aaa</p>";
		//$data = "wkwkwk";
		//	echo $budget;
			$budget = intval($budgetString);
			$this->load->model('tesModel');
		//	$data['query']= $this->tesModel->getDatabase();
		//	$this->load->view('tesViews',$data);
			$data['query'] = $this->tesModel->getDatabaseWithinBudget($budget);
		//	$this->load->view('tesViews',$data);
		//	print_r($data);
			echo json_encode($data);
			
		}

		public function viewPeta()
		{
			$this->load->view('peta');
		}
		public function userDataSubmit() {
			// $data = array(
			// 'username' => $this->input->post('name')
			// );

			// echo json_encode($data);

		//	$data = "a";

		//	echo json_encode($data);

			$data = array(
			'username' => $this->input->post('akb')	
			);
			//alert("a");
			echo json_encode($data);

	//		echo $data;
	//		alert("b");
			//$this->load->view('welcome_message');
		}

		public function gogo() {
			$this->load->view('welcome_message');
		}


		public function checkLogin()
		{
			$this->load->model('tesModel');

			$data = array(
				'nameORemail' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			
			$hasil['query'] = $this->tesModel->validasiLogin($data);
			//echo $hasil['query']['username'];	
			//echo json_encode($hasil);
			setcookie("username",$hasil['query']['username'],time()+3600);
			header("Location:http://localhost/Jaktrip/index.php/tesController/login");
		}
		public function logout()
		{
			if(isset($_COOKIE["username"]))
			{
				setcookie("username",null,time()+3600);
				$this->load->view('loginUI');
				header("Location:http://localhost/Jaktrip/index.php/tesController/login");
			}			
		}

		public function login()
		{
			$this->load->model('tesModel');
			$this->load->view('loginUI');

		}

		public function listTourAttr()
		{
			$this->load->view('FormSearchUI');
		}
	}

	
?>
