<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class ManageTourAttrCtr extends CI_Controller {

	public function index() {

		$this->load->library('table');

		$this->load->helper('html');

		$this->load->helper('cookie');

		$this->load->model('TouristAttractionManager');

		$query = $this->TouristAttractionManager->tourAttr_getall();

		//$place_name = $query->place_name;





		//$data['place_name'] = $place_name;

		//$data['author'] = $query->author;

		//$data['last_modified'] = $query->last_modified;

		//$data['hits'] = $query->hits;

		//$data['category'] = '';

		$category_list = array();

		

		foreach($query as $place){

			$place_name = $place->place_name;

			$query2 = $this->TouristAttractionManager->tourAttr_getCat($place_name);

			$category='';

			foreach($query2 as $row){

				if($category==''){

					$category=$category.$row->category_name;

				}

				else{

					$category=$category.', '.$row->category_name;				

				}



			}

			array_push($category_list, $category);

		}

		

		$data['cat'] = $category_list;

		$data['tourattr'] = $query;

		

		

		//$data['query'] = $this->touristattractionmanager->tourAttr_getall();

		//$data['query2'] = $this->touristattractionmanager->getCategory();



		/*------------editan wildan-----------

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

				$this->load->view('manageTourAttrUI', $data);

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

			$this->load->view('manageTourAttrUI', $data);

			$this->load->view('footer');

		}

		----------end of editan wildan---------*/

		$this->load->view('header');

		$this->load->view('menuadmin');

		$this->load->view('ManageTourAttrUI', $data);

		$this->load->view('footer');

	}



	function del($place_name){

		$this->load->library('table');

		$this->load->helper('html');

		$this->load->helper('cookie');

		$this->load->model('TouristAttractionManager');

		//$this->load->model('guest_model');

		

		$place_name = str_replace("%20", " ", $place_name);

		

		if($place_name != NULL){

			$this->TouristAttractionManager->delete($place_name);

			$this->session->set_flashdata('form', array('message' => '<center>You successfully deleted a place.</center>'));

			redirect('admin/places');

		}

		//$data = $this->guest_model->general();

		//$data['query'] = $this->guest_model->guest_getall();



		$query = $this->TouristAttractionManager->tourAttr_getall();

		$category_list = array();

		

		foreach($query as $place){

			$place_name = $place->place_name;

			$query2 = $this->TouristAttractionManager->tourAttr_getCat($place_name);

			$category='';

			foreach($query2 as $row){

				if($category==''){

					$category=$category.$row->category_name;

				}

				else{

					$category=$category.', '.$row->category_name;				

				}



			}

			array_push($category_list, $category);

		}

		

		$data['cat'] = $category_list;

		$data['tourattr'] = $query;

		$data['query'] = $this->touristAttractionManager->tourAttr_getall();



		/*------------editan wildan--------

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

				$this->load->view('manageTourAttrUI', $data);

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

			$this->load->view('manageTourAttrUI', $data);

			$this->load->view('footer');

		}

		----------end of editan wildan-----------*/

		$this->load->view('header');

		$this->load->view('menuadmin');

		$this->load->view('manageTourAttrUI', $data);

		$this->load->view('footer');

	}



	function isCategory($place_name){

		$result = $this->TouristAttractionManager->getCategory();

		$result1 = $this->TouristAttractionManager->tourAttr_getCat($place_name);

		

		$cat_checked=array();

		if($result1==NULL){

			for($i=0; $i<count($result); $i++){

				array_push($cat_checked, FALSE);

			}

		}

		else{

			for($i=0; $i<count($result); $i++){

				$is_checked = FALSE;

				foreach($result1 as $row){

					if($row->category_name==$result[$i]->category_name){

						$is_checked = TRUE;

					}

				}

				array_push($cat_checked, $is_checked);

			}

		}

		return $cat_checked;

	}

	

	

	function edit($place_name){

		$this->load->library('table');

		$this->load->helper('html');

		$this->load->helper('cookie');

		$this->load->helper('form');

				

		$data = $this->getData($place_name);



		/*---------------editan wildan--------------

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

				$this->load->view('formTourAttrUI2',$data);

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

			$this->load->view('formTourAttrUI2',$data);

			$this->load->view('footer');

		}

		--------end of editan wildan----------*/

		$this->load->view('header');

		$this->load->view('menuadmin');

		$this->load->view('formTourAttrUI2',$data);

		$this->load->view('footer');

	}

	

	function getData($place_name){

		$this->load->library('table');

		$this->load->helper('html');

		$this->load->helper('cookie');

		$this->load->helper('form');

		$this->load->model('TouristAttractionManager');

		$this->load->model('photoManager');

		

		$place_name = str_replace("%20", " ", $place_name);

		

		$query = $this->TouristAttractionManager->tourAttr_get($place_name);	

		//$query2 = $this->touristattractionmanager->tourAttr_getCat($place_name);

		//$query3 = $this->touristAttractionManager->tourAttr_getPic($place_name);

		$query4 = $this->TouristAttractionManager->tourAttr_getHalte($place_name);

		$query5 = $this->photoManager->getPhoto($place_name);		

		$data['lala'] = $this->TouristAttractionManager->getTouristAttraction()->result();

		$this->load->model('searchMod');

		$data['query2']= $this->searchMod->showalllocation();

		$this->load->model('HalteManager');

		$data['query'] = $this->HalteManager->getAllHalte();

		$data['admin'] = $this->TouristAttractionManager->getAdmin();

		

		$data['place_name'] = $query['place_name'];

		$data['description'] = $query['description'];

		$data['place_info'] = $query['place_info'];

		//$data['credit'] = $query5['pic_info'];

		$data['weekday_price'] = $query['weekday_price'];	

		$data['weekend_price'] = $query['weekend_price'];

		$data['pic'] = $query['pic_thumbnail'];		

		$data['link_web'] = $query['link_web'];

		//$data['cat_name'] = $query2['category_name'];	

		$data['city'] = $query['city'];

		/*if($query3 != NULL){

			$data['pic'] = $query3['pic'];

			$data['pic_info'] = $query3['pic_info'];

		}

		else{

			$data['pic'] = NULL;

			$data['pic_info'] = NULL;

		}*/

		$data['longitude'] = $query['longitude'];

		$data['lattitude'] = $query['lattitude'];	

		$data['halte_name'] = $query4['halte_name'];	

		$data['transport_info'] = $query['transport_info'];	

		$data['transport_price'] = $query['transport_price'];	

		$data['author'] = $query['author'];

		$data['rate_avg'] = $query['rate_avg'];

		$data['hits'] = $query['visitors'];		

		$data['id'] = $query['id'];	

		

		$result = $this->TouristAttractionManager->getCategory();

		

		$cat_checked=$this->isCategory($place_name);

		

		

		$data['cat_name']=$result;

		$data['cat_checked']=$cat_checked;

		

		//dropdown list place_info

		

		$dd_place = array();

		array_push($dd_place, NULL);

		$result2 = $this->TouristAttractionManager->getTouristAttraction();

	

		foreach($result2->result_array() as $place){

			$dd_place[$place['place_name']] = $place['place_name'];

		}

		

		$data['place_inf']=$dd_place;

		

		

		//dropdown list halte

		$dd_halte = array();

		$result3 = $this->TouristAttractionManager->getHalte();

		foreach($result3->result_array() as $halte){

			$dd_halte[$halte['halte_name']] = $halte['halte_name'];

		}

		$data['hlt_name']=$dd_halte;

		

		return $data;

	

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



		$place_name = $this->input->post('place_name');

		$key = $this->input->post('key');

		if($place_name!=$key){

			$this->form_validation->set_rules('place_name', 'place', 'trim|xss_clean|alpha_numeric_dash_spaces|is_unique[tourist_attraction.place_name]');		

		}

				

		$this->form_validation->set_rules('weekday_price', 'weekday price', 'integer');			

		$this->form_validation->set_rules('weekend_price', 'weekend price', 'integer');

		$this->form_validation->set_rules('transport_price', 'transportation fee', 'integer');

		$this->form_validation->set_message('is_unique', 'This %s already exists.');

		$data = $this->getData($key);



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

		$category_old = $data['cat_name'];

		$pic = $this->input->post('pic');

		$id = $this->input->post('id');

		

		//if not valid

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed

		{

			$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Something went wrong. Please try again.</center>'));

			$data = $this->getData($key);

			//load



			/*------------editan wildan------------

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

					$this->load->view('formTourAttrUI2',$data);

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

				$this->load->view('formTourAttrUI2',$data);

				$this->load->view('footer');

			}

			-------end of editan wildan---------*/

			$this->load->view('header');

			$this->load->view('menuadmin');

			$this->load->view('FormTourAttrUI2',$data);

			$this->load->view('footer');

			

		}

		//if valid

		else{

			$this->load->helper('cookie');

			$user = get_cookie("username");



			$config['upload_path'] = './assets/img/place/'.$id;

			//$config['upload_path'] = './assets/upload/';

			$config['allowed_types'] = 'gif|jpg|png';

			$config['max_size']	= '2048';

			$config['max_width']  = '4096';

			$config['max_height']  = '4096';

			$this->load->library('upload', $config);

			//$this->upload->initialize($config);

			//$upload_data = $this->upload->data();

			

			$dir_exist = true; // flag for checking the directory exist or not

			if (!is_dir('./assets/img/place/'.$id))

			{

				mkdir('./assets/img/place/'.$id, 0777, true);

				$dir_exist = false; // dir not exist

			}

			else{



			}

			$upload_status = false;

			if (!$this->upload->do_upload())

			{

				$error = array('error' => $this->upload->display_errors());

				//$this->load->view('HomeUI');

				$this->load->view('FormTourAttrUI', $error);

			}

			else

			{

				$upload_data = $this->upload->data();

				$file_name = $upload_data['file_name'];

				$pic = './assets/img/place/'.$id.'/'.$file_name;

				$upload_status = true;

			}



			if($place_info=='0'){

				$place_info=NULL;

			}

			if($pic==''){

				$pic=NULL;

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

				'description' => $description,

				'place_info' => $place_info,

				//'halte_code' => $this->input->post('halte_code'),

				'halte_code' =>$this->TouristAttractionManager->gethaltekode($select_busstop),

				'transport_info' => $transport_info,

				'transport_price' => $transport_price,	

				//'nearest_bus_stop' => $this->input->post('select_busstop'),

				'last_modified' => mdate("%Y-%m-%d %H:%i:%s", now()),

				'link_web' => $link_web,

				'pic_thumbnail' => $pic

			);



			if($credit==null || $credit==''){

				$credit = "Uploaded by ".$user;

			}



			if($upload_status==TRUE){

				$form_photo = array(

									'place_name' => $place_name,

									'pic' => $pic,

									'pic_info' => $credit,

									'is_publish' => 1,

									'username' => $user

				);

			}

			else{

				$form_photo = NULL;			

			}

					

								

			$form_cat = array(

				'place_name' => $place_name,

				'category_list' => $category_list,

				'category_new' => $category_new,
				'category_old' => $category_old

			);							

										

			// run insert model to write data to db

			

			if ($this->TouristAttractionManager->edit($key, $form_data, $form_photo, $form_cat) == TRUE){ // the information has therefore been successfully saved in the db

				$this->session->set_flashdata('form', array('message' => '<center>You successfully edited place.</center>'));	

					redirect('admin/places');

			}

			else{

				$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Something went wrong. Please try again.</center>'));

				// Or whatever error handling is necessary

			}

		}

		

	}

	

		public function searchtour($place_name=null)

	{

		$this->load->library('table');

		$this->load->helper('html');

		$this->load->model('TouristAttractionManager');

		$query = $this->TouristAttractionManager->filterMod5($place_name);

		//$place_name = $query->place_name;





		//$data['place_name'] = $place_name;

		//$data['author'] = $query->author;

		//$data['last_modified'] = $query->last_modified;

		//$data['hits'] = $query->hits;

		//$data['category'] = '';

		$category_list = array();

		

		foreach($query as $place){

			$place_name = $place->place_name;

			$query2 = $this->TouristAttractionManager->tourAttr_getCat($place_name);

			$category='';

			foreach($query2 as $row){

				if($category==''){

					$category=$category.$row->category_name;

				}

				else{

					$category=$category.', '.$row->category_name;				

				}



			}

			array_push($category_list, $category);

		}

		

		$data['cat'] = $category_list;

		$data['tourattr'] = $query;

		

		

		//$data['query'] = $this->touristattractionmanager->tourAttr_getall();

		//$data['query2'] = $this->touristattractionmanager->getCategory();

		//$this->load->view('header');

		//$this->load->view('menuadmin');

		//$this->load->view('manageTourAttrUI', $data);

		//$this->load->view('footer');    

		echo json_encode($data);

	}

	

		public function searchkeywordtour($place_name=null)

	{

		$this->load->library('table');

		$this->load->helper('html');

		$this->load->model('TouristAttractionManager');

		$query = $this->TouristAttractionManager->filterMod3($place_name);

		//$place_name = $query->place_name;





		//$data['place_name'] = $place_name;

		//$data['author'] = $query->author;

		//$data['last_modified'] = $query->last_modified;

		//$data['hits'] = $query->hits;

		//$data['category'] = '';

		$category_list = array();

		

		foreach($query as $place){

			$place_name = $place->place_name;

			$query2 = $this->TouristAttractionManager->tourAttr_getCat($place_name);

			$category='';

			foreach($query2 as $row){

				if($category==''){

					$category=$category.$row->category_name;

				}

				else{

					$category=$category.', '.$row->category_name;				

				}



			}

			array_push($category_list, $category);

		}

		

		$data['cat'] = $category_list;

		$data['tourattr'] = $query;

		

		

		//$data['query'] = $this->touristattractionmanager->tourAttr_getall();

		//$data['query2'] = $this->touristattractionmanager->getCategory();

		//$this->load->view('header');

		//$this->load->view('menuadmin');

		//$this->load->view('manageTourAttrUI', $data);

		//$this->load->view('footer');    

		echo json_encode($data);

	}
}
?>