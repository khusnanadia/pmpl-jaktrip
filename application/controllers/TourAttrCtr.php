<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class TourAttrCtr extends CI_Controller {

	

	function index(){

		$this->load->helper('date');

		$this->load->helper('cookie');

		$this->load->model('TouristAttractionManager');

		$this->load->model('HalteManager');

		$this->load->model('searchMod');

		$this->load->helper('form');

		

		 //dropdown list category

		//$dd_cat = array();

		$result = $this->TouristAttractionManager->getCategory();

		$data['query'] = $this->HalteManager->getAllHalte();

		$data['query2']= $this->searchMod->showalllocation();

		$data['place'] = $this->TouristAttractionManager->getTouristAttraction()->result();

		$data['admin'] = $this->TouristAttractionManager->getAdmin();

		//foreach($result->result_array() as $cat){

			//$dd_cat[$cat['category_name']] = $cat['category_name'];

		//}

		$data['cat_name']=$result;

		//dropdown list place_info

		

		//dropdown list halte

		$dd_halte = array();

		$result3 = $this->TouristAttractionManager->getHalte();

		foreach($result3->result_array() as $halte){

			$dd_halte[$halte['halte_code']] = $halte['halte_name'];

		}

		$data['halte_name']=$dd_halte;



		$data['place_name']='';

		$data['weekday_price']='';

		$data['weekend_price']='';

		$data['longitude']='';

		$data['lattitude']='';

		$data['city']='';

		$data['description']='';

		$data['place_info']='';

		$data['credit']='';

		$data['select_busstop']='';

		$data['transport_info']='';

		$data['transport_price']='';

		$data['link_web']='';

		$data['category_list']='';

		$data['category_new']='';

		

		/*----------editan wildan---------

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

				$this->load->view('formTourAttrUI',$data);

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

			$this->load->view('formTourAttrUI',$data);

			$this->load->view('footer');

		}

		----------end of editan wildan--------*/

		$this->load->view('header');

		$this->load->view('menuadmin');

		$this->load->view('FormTourAttrUI',$data);

		$this->load->view('footer');

	}



	function myform(){

		$this->load->helper('cookie');

		$this->load->helper('form');

		$this->load->helper('url');

		$this->load->helper('date');

		$this->load->model('TouristAttractionManager');

		$this->load->model('HalteManager');

		$this->load->model('searchMod');

		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		

		$this->form_validation->set_rules('place_name', 'place', 'trim|xss_clean|alpha_numeric_dash_spaces|is_unique[tourist_attraction.place_name]');			

		$this->form_validation->set_rules('weekday_price', 'weekday price', 'integer');			

		$this->form_validation->set_rules('weekend_price', 'weekend price', 'integer');

		$this->form_validation->set_rules('transport_price', 'transportation fee', 'integer');

		//$this->form_validation->set_rules('source', 'source', 'valid_url');

		$this->form_validation->set_message('is_unique', 'This %s already exists.');

		

		$place_name = $this->input->post('place_name');

		$weekday_price = $this->input->post('weekday_price');

		$weekend_price = $this->input->post('weekend_price');

		$longitude = $this->input->post('longitude');

		$lattitude = $this->input->post('lattitude');

		$city = $this->input->post('select_location');

		$description = $this->input->post('description');

		$place_info = $this->input->post('place_inform');

		$credit = $this->input->post('credit');

		$select_busstop = $this->input->post('select_busstop');

		$transport_info = $this->input->post('transport_info');

		$transport_price = $this->input->post('transport_price');	

		$link_web = $this->input->post('source');

		

		$category_list = $this->input->post('category_list');

		$category_new = $this->input->post('category_new');

		

		

		//if not valid

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed

		{

			$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Something went wrong. Please try again.</center>'));

		    	

			$data['place_name']=$place_name;

			$data['weekday_price']=$weekday_price;

			$data['weekend_price']=$weekend_price;

			$data['longitude']=$longitude;

			$data['lattitude']=$lattitude;

			$data['city']=$city;

			$data['description']=$description;

			$data['place_info']=$place_info;

			$data['credit']=$credit;

			$data['select_busstop']=$select_busstop;

			$data['transport_info']=$transport_info;

			$data['transport_price']=$transport_price;

			$data['link_web']=$link_web;

			$data['category_list']=$category_list;

			$data['category_new']=$category_new;

			

			 //dropdown list category

			//$dd_cat = array();

			$result = $this->TouristAttractionManager->getCategory();

			$data['query'] = $this->HalteManager->getAllHalte();

			$data['query2']= $this->searchMod->showalllocation();

			$data['place'] = $this->TouristAttractionManager->getTouristAttraction()->result();

			$data['admin'] = $this->TouristAttractionManager->getAdmin();

			//foreach($result->result_array() as $cat){

				//$dd_cat[$cat['category_name']] = $cat['category_name'];

			//}

			$data['cat_name']=$result;

			//dropdown list place_info

			

			//dropdown list halte

			$dd_halte = array();

			$result3 = $this->TouristAttractionManager->getHalte();

			foreach($result3->result_array() as $halte){

				$dd_halte[$halte['halte_code']] = $halte['halte_name'];

			}

			$data['halte_name']=$dd_halte;



			/*--------editan wildan-----------

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

					$this->load->view('formTourAttrUI',$data);

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

				$this->load->view('formTourAttrUI',$data);

				$this->load->view('footer');

			}

			-------end of editan wildan-----*/

			$this->load->view('header');

			$this->load->view('menuadmin');

			$this->load->view('FormTourAttrUI',$data);

			$this->load->view('footer');

		

		}

		//if valid

		else{

			$this->load->helper('cookie');

			//$placename = $this->input->post('place_name');

			$user = get_cookie("username");



			



			if($place_info=='0'){

				$place_info=NULL;

			}

			// build array for the model

				//echo $this->input->post('select_busstop');

				

			$form_data = array(

				'place_name' => $place_name,

				'weekday_price' => $weekday_price,

				'weekend_price' => $weekend_price,

				'longitude' => $longitude,

				'lattitude' => $lattitude,

				'city' => $city,

				'rate_avg' => 0,

				'description' => $description,

				'place_info' => $place_info,

				//'halte_code' => $this->input->post('halte_code'),

				'halte_code' =>$this->TouristAttractionManager->gethaltekode($select_busstop),

				'transport_info' => $transport_info,

				'transport_price' => $transport_price,	

				'author' => get_cookie("username"),

				//'nearest_bus_stop' => $this->input->post('select_busstop'),

				'visitors' => 0,

				'last_modified' => mdate("%Y-%m-%d %H:%i:%s", now()),

				'link_web' => $link_web,

				//'pic_thumbnail' => './assets/img/place/'.$place_name.'/'.$file_name

			);



			$form_cat = array(

				'place_name' => $place_name,

				'category_list' => $category_list,

				'category_new' => $category_new

			);							

										

			// run insert model to write data to db

			

			if ($this->TouristAttractionManager->SaveForm($form_data, $form_cat) == TRUE){ // the information has therefore been successfully saved in the db

				$query = $this->TouristAttractionManager->tourAttr_get($place_name);

				$id = $query['id'];

				//upload foto

			

				$config['upload_path'] = './assets/img/place/'.$id;

				$config['allowed_types'] = 'gif|jpg|png';

				$config['max_size']	= '1000';

				$config['max_width']  = '4096';

				$config['max_height']  = '4096';

				$this->load->library('upload', $config);

				//$this->upload->initialize($config);

				

				$dir_exist = true; // flag for checking the directory exist or not

				if (!is_dir('./assets/img/place/'.$id))

				{

					mkdir('./assets/img/place/'.$id, 0777, true);

					$dir_exist = false; // dir not exist

				}

				else{



				}

				if (!$this->upload->do_upload())

				{

					$error = array('error' => $this->upload->display_errors());

					//$this->load->view('HomeUI');

					$pic=NULL;

					$this->load->view('FormTourAttrUI', $data);

				}

				else

				{

					//$data = array('upload_data' => $this->upload->data());

					$upload_data = $this->upload->data();

					$file_name = $upload_data['file_name'];

					$pic = './assets/img/place/'.$id.'/'.$file_name;

					//echo $file_name;

					//$this->load->view('upload_success');

					//$this->load->view('upload_form');

				}

				

				if($credit==null || $credit==''){

					$credit = "Uploaded by ".$user;

				}

				

				$form_photo = array(

									'place_name' => $place_name,

									'pic' => $pic,

									'pic_info' => $credit,

									'is_publish' => 0,

									'username' => $user

				);

				

				if($this->TouristAttractionManager->save_pic_thumbnail($id, $form_photo) == TRUE){

					$this->session->set_flashdata('form', array('message' => '<center>You successfully added a new place.</center>'));	

					redirect('admin/places');   // or whatever logic needs to occur

				}

				else{

					$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Something went wrong. Please try again.</center>'));

				}

					

			}

			else{

				$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Something went wrong. Please try again.</center>'));

				// Or whatever error handling is necessary

			}

			

			

		}

		

	}

	



}