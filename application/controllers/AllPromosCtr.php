<?php



class AllPromosCtr extends CI_Controller {



	/*

	author: Syifa Khairunnisa

	editor: Mohammad Syahid Wildan-facebook

	Menampilkan list promo untuk user

	*/

	function index(){

		$this->load->model('PromoManager');

		$this->load->helper('cookie');

		$data['query']= $this->PromoManager->showAllPromo();

		$data['query1']= $this->PromoManager->showType();

		/*-------nyoba ga pakai ini (wildan)------------

		$this->user = $this->facebook->getUser();

		if($this->user)

		{

			$data['user_profile'] = $this->facebook->api('/me/');

			$first_name = $data['user_profile']['first_name'];

			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";

			if(get_cookie('username')!=null)

			{

				$this->load->view('header',$data);

				$this->load->view('allPromosUI',$data);

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

			$this->load->view('header',$data);

			$this->load->view('allPromosUI',$data);

			$this->load->view('footer');

		}

		----------end of nyoba ga pakai ini (wildan)*/



		$this->load->view('header',$data);

		$this->load->view('AllPromosUI',$data);

		$this->load->view('footer');

	}

	

	public function searchpromoloc($city=NULL){

			$this->load->library('table');

			$this->load->helper('html'); 

			$this->load->model('PromoManager');

			$data['query'] = $this->PromoManager->filterpromoloc($city);   

			echo json_encode($data);

	}

	

	public function searchpromokey($city=NULL, $title=NULL){

		$this->load->library('table');

		$this->load->helper('html'); 

		$this->load->model('PromoManager');

		$data['query'] = $this->PromoManager->filterPromoFinal($city, $title);    

		echo json_encode($data);

	}

	

	public function searchwisataLoc($city=NULL){

		$this->load->library('table');

		$this->load->helper('html'); 

		$this->load->model('AllplacesMod');

		$data['query'] = $this->AllplacesMod->filterMod2($city);  

		echo json_encode($data);

	}

	

	public function searchpromotype($category_name=NULL, $city=NULL, $place_name=NULL){

		$this->load->library('table');

		$this->load->helper('html'); 

		$this->load->model('PromoManager');

		$data['query'] = $this->PromoManager->filterPromotype($category_name, $city, $place_name);

		echo json_encode($data);

	}



	public function searchwisataCatNam($category_name=NULL, $place_name=NULL){

		$this->load->library('table');

		$this->load->helper('html'); 

		$this->load->model('AllplacesMod');

		$data['query'] = $this->AllplacesMod->filterMod1($category_name, $place_name);

		echo json_encode($data);

	}



	public function searchwisataCatLocKey($category_name=NULL, $city=NULL, $place_name=NULL){

		$this->load->library('table');

		$this->load->helper('html'); 

		$this->load->model('AllplacesMod');

		$data['query'] = $this->AllplacesMod->filterModFinal($category_name, $city, $place_name);

		echo json_encode($data);

	}

		

	function popular($category_name=NULL, $city=NULL, $place_name=NULL){

		$data = array();

		$this->load->model('AllPlacesMod');

		$this->load->helper('url');

		$data1['query'] = $this->AllPlacesMod->getAllTourAttrPopular($category_name, $city, $place_name);

		echo json_encode($data1);

	}

	

	function highestRate($category_name=NULL, $city=NULL, $place_name=NULL){

		$data = array();

		$this->load->model('AllPlacesMod');

		$this->load->helper('url');

		$data1['query'] = $this->AllPlacesMod->getAllTourAttrHighestRate($category_name, $city, $place_name);

		echo json_encode($data1);

	}

	

	function sortAtoZ($category_name=NULL, $city=NULL, $place_name=NULL){

		$data = array();

		$this->load->model('AllPlacesMod');

		$this->load->helper('url');

		$data1['query'] = $this->AllPlacesMod->getAllTourAttrSortAtoZ($category_name, $city, $place_name);

		echo json_encode($data1);

	}

	

	function sortZtoA($category_name=NULL, $city=NULL, $place_name=NULL){

		$data = array();

		$this->load->model('AllPlacesMod');

		$this->load->helper('url');

		$data2['query'] = $this->AllPlacesMod->getAllTourAttrSortZtoA($category_name, $city, $place_name);

		echo json_encode($data2);

    }

	

	function LowToHigh($category_name=NULL, $city=NULL, $place_name=NULL){

		$data = array();

		$this->load->model('AllPlacesMod');

		$this->load->helper('url');

		$data3['query'] = $this->AllPlacesMod->getAllTourAttrSortLowToHigh($category_name, $city, $place_name);

		echo json_encode($data3);

    }

	

	function HighToLow($category_name=NULL, $city=NULL, $place_name=NULL){

		$data = array();

		$this->load->model('AllPlacesMod');

		$this->load->helper('url');

		$data4['query'] = $this->AllPlacesMod->getAllTourAttrSortHighToLow($category_name, $city, $place_name);

		echo json_encode($data4);

    }

	

	public function searchwisataprice($min, $max){

		$this->load->library('table');

		$this->load->helper('html'); 

		$this->load->model('AllPlacesMod');

		$data['query'] = $this->AllPlacesMod->filterSliderMod($min, $max);

		echo json_encode($data);

	}

}



?>