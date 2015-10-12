<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddPromoCtr extends CI_Controller {
	/*
	author: Khusna Nadia
	editor: Mohammad Syahid Wildan-facebook
	Menampilkan form isian membuat promo baru pada menu admin page
	*/
	function index(){
		$this->load->model('TouristAttractionManager');
		$this->load->model('PromoManager');
		$data['place'] = $this->TouristAttractionManager->getTouristAttraction()->result();
		$data['typepromo_name'] = $this->PromoManager->getTypes();

		$data['title']='';
		$data['start_date']='';
		$data['end_date']='';
		$data['description']='';
		$data['place_name']='';
		
		/*----nyoba ga pakai ini (wildan)------------
		$this->load->helper('cookie');
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
			header('Location: '.base_url('index.php/homeCtr/successLoginFB'));
		}
		else
		{
			$data['login_url'] = $this->facebook->getLoginUrl();
			$this->load->view('header', $data);
			$this->load->view('menuadmin');
			$this->load->view('formPromoUI', $data);
			$this->load->view('footer');
		}
		------------end of nyoba ga pakai ini (wildan)--------*/
		
		$this->load->view('header', $data);
		$this->load->view('menuadmin');
		$this->load->view('FormPromoUI', $data);
		$this->load->view('footer');
	}

	/*
	author: Khusna Nadia
	Men-submit form isian membuat promo baru
	*/
	function myForm(){
		$this->load->helper('cookie');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->model('PromoManager');
		$this->load->model('TouristAttractionManager');

		$this->form_validation->set_rules('title', 'title', 'trim');
		$this->form_validation->set_rules('start_date', 'start date', 'trim|callback_checkDateFormat');
		$this->form_validation->set_rules('end_date', 'end date', 'trim|callback_checkDateFormat');
		$this->form_validation->set_rules('place_name', 'place name', 'trim');
		$this->form_validation->set_rules('description', 'description', 'trim');
		$this->form_validation->set_rules('userfile', 'photo', 'trim');
		$this->form_validation->set_rules('type_list', 'type', 'trim');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$config['upload_path'] = './assets/img/promo/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2048';
		$config['max_width']  = '4096';
		$config['max_height']  = '4096';
		$this->load->library('upload', $config);
		
		$dir_exist = true;
		if (!is_dir('./assets/img/promo/')){
			mkdir('./assets/img/promo/', 0777, true);
			$dir_exist = false; // dir not exist
		}
		else{
		}
		if (!$this->upload->do_upload()){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('FormPromoUI', $error);
		}else{
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];
		}

		$posttitle = $this->input->post('title');
		$postplace_name = $this->input->post('place_name');
		$postdescription = $this->input->post('description');

		$old_startDate = $this->input->post('start_date');
		$o_startDate = strtotime($old_startDate);
		$s_date = date('Y-m-d', $o_startDate);
		$old_endDate = $this->input->post('end_date');
		$o_endDate = strtotime($old_endDate);
		$e_date = date('Y-m-d', $o_endDate);
		$form_data = array(
	       	'title' => $posttitle,
	       	'start_date' => $s_date,
	       	'end_date' => $e_date,
			'place_name' => $postplace_name,
			'photo' => './assets/img/promo/'.$file_name,
			'description' => $postdescription
		);

		if(!isset($_POST['type_list'])){
			$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> You have to select at least one type.</center>'));
			$data['title']=$posttitle;
			$data['start_date']=$old_startDate;
			$data['end_date']=$old_endDate;
			$data['place_name']=$postplace_name;
			$data['description']=$postdescription;

			$data['place'] = $this->TouristAttractionManager->getTouristAttraction()->result();
			$data['typepromo_name'] = $this->PromoManager->getTypes();

			$this->load->view('header');
			$this->load->view('menuadmin');
			$this->load->view('FormPromoUI',$data);
			$this->load->view('footer');

			// redirect('admin/addnewpromo', $data);
		}

		else if($this->PromoManager->SaveForm($form_data)){
			// if(!isset($_POST['type_list'])) {
			// 	$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> You have to select at least one type.</center>'));
			// 	redirect('admin/addnewpromo');
			// }

			$fak = mysql_fetch_assoc(mysql_query("SELECT MAX(id_promo) FROM promo"));
			$form_type = array(
				'id_promo' => $fak["MAX(id_promo)"],
				'type_list' => $this->input->post('type_list'),
				'type_new' => $this->input->post('type_new')
			);

			if($this->PromoManager->SaveFormType($form_type)){
				$this->session->set_flashdata('form', array('message' => '<center>You successfully added a new promo.</center>'));
				redirect('admin/promo');
			}
			else{
				$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Something went wrong. Please try again.</center>'));
				redirect('admin/addnewpromo');
			}
			
		}
		else{
			$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Something went wrong. Please try again.</center>'));
			redirect('admin/addnewpromo');
		}
	
		

		

	}

	/*
	author: 
	Memvalidasi tanggal
	*/
	#callback
	function checkDateFormat($date){
		if (preg_match("/[0-31]{2}\/[0-12]{2}\/[0-9]{4}/", $date)) {
			if(checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))
				return true;
			else
				return false;
		} else{
			return false;
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