<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ManagePromoCtr extends CI_Controller{

	public function __construct(){

        parent::__construct();

    }



    /*

	author: Syifa Khairunnisa

	editor: Khusna Nadia-menampilkan list promo

			Mohammad Syahid Wildan-facebook

	Menampilkan list promo di menu admin page

    */

	function index(){

		$this->load->library('table');

		$this->load->helper('html');

		$this->load->model('PromoManager');

		$this->load->helper('cookie');



		$query = $this->PromoManager->promo_getall();

		$type_list = array();

		

		foreach($query as $id){

			$id_promo = $id->id_promo;

			$query2 = $this->PromoManager->promo_getType($id_promo);

			$type='';

			foreach($query2 as $row){

				if($type==''){

					$type=$type.$row->type_name;

				}else{

					$type=$type.', '.$row->type_name;				

				}

			}

			array_push($type_list, $type);

		}



		$data['type_'] = $type_list;

		$data['promo'] = $query;

		/*-----------editan wildan------------

		$this->user = $this->facebook->getUser();

		if($this->user){

			$data['user_profile'] = $this->facebook->api('/me/');

			$first_name = $data['user_profile']['first_name'];

			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";

			if(get_cookie('username')!=null){

				$this->load->view('header', $data);

				$this->load->view('menuadmin');

				$this->load->view('ManagePromoUI', $data);

				$this->load->view('footer');

			}else{

				setcookie("username_facebook", $data['user_profile']['first_name'], time()+3600, '/');

                setcookie("username",$data['user_profile']['id'], time()+3600, '/');

				setcookie("photo_facebook",$foto_facebook,time()+3600, '/');

				setcookie("is_admin",0,time()+3600,'/');

				header('Location: '.base_url('successLoginFB'));

			}

		}else{

			$data['login_url'] = $this->facebook->getLoginUrl();

			$this->load->view('header', $data);

			$this->load->view('menuadmin');

			$this->load->view('ManagePromoUI', $data);

			$this->load->view('footer');

		}

		-------------editan wildan-----------*/

		$this->load->view('header');

		$this->load->view('menuadmin');

		$this->load->view('ManagePromoUI', $data);

		$this->load->view('footer');

	}



	/*

	author: Khusna Nadia

	editor: Mohammad Syahid Wildan-facebook

	Menghapus promo dari database

	*/

	function del($id_promo){

		$this->load->library('table');

		$this->load->helper('html');

		$this->load->model('PromoManager');

		$this->load->helper('cookie');



		if($id_promo != NULL){

			$queryPhoto = $this->PromoManager->promo_get($id_promo);

			$this->PromoManager->delete($id_promo);

			unlink($queryPhoto['photo']);

			$this->session->set_flashdata('form', array('message' => '<center>You successfully deleted a promo.</center>'));

			redirect('admin/promo');

		}



		$query = $this->PromoManager->promo_getall();

		$type_list = array();

		

		foreach($query as $id){

			$id_promo = $id->id_promo;

			$query2 = $this->PromoManager->promo_getType($id_promo);

			$type='';

			foreach($query2 as $row){

				if($type==''){

					$type=$type.$row->type_name;

				}else{

					$type=$type.', '.$row->type_name;				

				}

			}

			array_push($type_list, $type);

		}



		$data['type_'] = $type_list;

		$data['promo'] = $query;

		$data['query'] = $this->PromoManager->promo_getall();

		/*-----------editan wildan-----------

		$this->user = $this->facebook->getUser();

		if($this->user){

			$data['user_profile'] = $this->facebook->api('/me/');

			$first_name = $data['user_profile']['first_name'];

			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";

			if(get_cookie('username')!=null)

			{

				$this->load->view('header', $data);

				$this->load->view('menuadmin');

				$this->load->view('managePromoUI', $data);

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

			$this->load->view('managePromoUI', $data);

			$this->load->view('footer');

		}

		-----end of editan wildan-------------*/

		$this->load->view('header');

		$this->load->view('menuadmin');

		$this->load->view('ManagePromoUI', $data);

		$this->load->view('footer');

	}



	/*

	author: Khusna Nadia

	editor: Mohammad Syahid Wildan-facebook

	Mengubah promo di database

	*/

	function edit($id_promo){
        
		$this->load->library('table');

		$this->load->helper('html');

		$this->load->helper('cookie');

		$this->load->helper('form');

		$this->load->model('PromoManager');

		$this->load->model('TouristAttractionManager');

		

		$query = $this->PromoManager->promo_get($id_promo);	

		$data['lala'] = $this->TouristAttractionManager->getTouristAttraction()->result();



		$data['id_promo'] = $id_promo;

		$data['title']['value'] = $query['title'];

		$data['start_date']['value'] = $query['start_date'];

		$data['end_date']['value'] = $query['end_date'];

		$data['place_name']['value'] = $query['place_name'];

		$data['description']['value'] = $query['description'];

		$data['photoPromo'] = $query['photo'];



		$result = $this->PromoManager->getTypes();



		$type_checked=$this->isType($id_promo);

		

		$data['type_nam']=$result;

		$data['type_checked']['value']=$type_checked;

		

		//dropdown list place_name		

		$dd_place = array();

		array_push($dd_place, NULL);

		$result2 = $this->TouristAttractionManager->getTouristAttraction();

		
        

		foreach($result2->result_array() as $place){

			$dd_place[$place['place_name']] = $place['place_name'];

		}

		

		$data['place_inf']=$dd_place;

		

		/*---------editan wildan-------------

		$this->user = $this->facebook->getUser();

		if($this->user){

			$data['user_profile'] = $this->facebook->api('/me/');

			$first_name = $data['user_profile']['first_name'];

			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";

			if(get_cookie('username')!=null){

				$this->load->view('header', $data);

				$this->load->view('menuadmin');

				$this->load->view('formPromoUI2',$data);

				$this->load->view('footer');

			}else{

				setcookie("username_facebook", $data['user_profile']['first_name'], time()+3600, '/');

                setcookie("username",$data['user_profile']['id'], time()+3600, '/');

				setcookie("photo_facebook",$foto_facebook,time()+3600, '/');

				setcookie("is_admin",0,time()+3600,'/');

				header('Location: '.base_url('successLoginFB'));

			}

		}else{

			$data['login_url'] = $this->facebook->getLoginUrl();

			$this->load->view('header', $data);

			$this->load->view('menuadmin');

			$this->load->view('formPromoUI2',$data);

			$this->load->view('footer');

		}

		----------end of editan wildan-------*/

		$this->load->view('header');

		$this->load->view('menuadmin');

		$this->load->view('FormPromoUI2',$data);

		$this->load->view('footer');

	}



	/*

	author: Khusna Nadia

	Mengecek tipe dari promo

	*/

	function isType($id_promo){

		$result = $this->PromoManager->getTypes();

		$result1 = $this->PromoManager->promo_getType($id_promo);

		

		$type_checked=array();

		if($result1==NULL){

			for($i=0; $i<count($result); $i++){

				array_push($type_checked, FALSE);

			}

		}else{

			for($i=0; $i<count($result); $i++){

				$is_checked = FALSE;

				foreach($result1 as $row){

					if($row->type_name==$result[$i]->type_name){

						$is_checked = TRUE;

					}

				}

				array_push($type_checked, $is_checked);

			}

		}

		return $type_checked;

	}



	/*

	author: Khusna Nadia

	Men-submit form edit promo

	*/

	function myform(){

		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->model('PromoManager');

		$this->form_validation->set_rules('title', 'title', 'trim');
		$this->form_validation->set_rules('start_date', 'start date', 'trim|callback_checkDateFormat');
		$this->form_validation->set_rules('end_date', 'end date', 'trim|callback_checkDateFormat');
		$this->form_validation->set_rules('place_name', 'place name', 'trim');
		$this->form_validation->set_rules('description', 'description', 'trim');
		$this->form_validation->set_rules('userfile', 'photo', 'trim');
		// $this->form_validation->set_rules('type_list', 'type', 'trim');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$id_promo = $this->input->post('key');
		
	   	$title = $this->input->post('title');
		$place_name = $this->input->post('place_name');
		$description = $this->input->post('description');
		$type_list = $this->input->post('type_list');
		$type_new = $this->input->post('type_new');
		
		$config['upload_path'] = './assets/img/promo/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2048';
		$config['max_width']  = '4096';
		$config['max_height']  = '4096';
		$this->load->library('upload', $config);
		
		// flag for checking the directory exist or not
		$dir_exist = true;
		if (!is_dir('./assets/img/promo/')){
			mkdir('./assets/img/promo/', 0777, true);
			$dir_exist = false; // dir not exist
		}else{
		}
		$file_name = null;
		if (!$this->upload->do_upload()){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('FormPromoUI2', $error);
			// $this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Something went wrong. Please try again.</center>'));
			// redirect('admin/promo/edit/'.$id_promo);

		}else{
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];

		}
		// die("haha");
		if ($this->form_validation->run() == FALSE){ // validation hasn't been passed
			$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Something went wrong. Please try again.</center>'));
			redirect('admin/promo/edit/'.$id_promo);
		}else{
			$old_startDate = $_POST['datepicker'][0];
			$o_startDate = strtotime($old_startDate);
			$s_date = date('Y-m-d', $o_startDate);
			$old_endDate = $_POST['datepicker'][1];
			$o_endDate = strtotime($old_endDate);
			$e_date = date('Y-m-d', $o_endDate);
			
			$queryPhoto = $this->PromoManager->promo_get($id_promo);
			if($file_name!=null || $file_name!=''){
				unlink($queryPhoto['photo']); //hapus foto di folder assets/promo/--> belum bisa
				$form_data = array(
					'title' => $title,
				   	'start_date' => $s_date,
				   	'end_date' => $e_date,
					'place_name' => $place_name,
					'description' => $description,
					'photo' => './assets/img/promo/'.$file_name
				);
			}else{
				$form_data = array(
					'title' => $title,
				   	'start_date' => $s_date,
				   	'end_date' => $e_date,
					'place_name' => $place_name,
					'description' => $description
				);
			}
			
			
			$old_type = $this->PromoManager->promo_getType($id_promo);
			
			if(!isset($_POST['type_list'])) {
				$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Something went wrong. Please try again.</center>'));
				redirect('admin/promo/edit/'.$id_promo);
			}

			$form_type = array(
				'id_promo' => $id_promo,
				'type_list' => $type_list,
				'type_new' => $type_new,
				'type_old' => $old_type
			);
			
			if ($this->PromoManager->edit($id_promo, $form_data, $form_type) == TRUE){ // the information has therefore been successfully saved in the db
				$this->session->set_flashdata('form', array('message' => '<center>You successfully edited a promo.</center>'));
				redirect('admin/promo');
			}else{
				$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Something went wrong. Please try again.</center>'));
				redirect('admin/promo/edit/'.$id_promo);
			}
		}
	}



	/*

	author: Khusna Nadia

	Menandakan sukses men-submit form

	*/

	function success()

	{

		redirect('admin/promo');

	}

}
?>