<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class UsersCtr extends CI_Controller {

	



	function __construct() {

        parent::__construct();

       

    }

    

	function index(){

		$this->load->model('memberManager');

		$this->load->model('ratingManager');
		$this->load->model('touristAttractionManager');

		$this->load->helper('cookie');

		$user = get_cookie("username");

		$data['thisUser'] = $user;

		$data['wishlist'] = $this->memberManager->showWishlist($user);

		$data['visited'] = $this->memberManager->showVisited($user);

		$data['review'] = $this->ratingManager->showReview($user);

		$data['query'] = $this->touristAttractionManager->getTouristAttraction();

		$data['member'] = $this->memberManager->getMember($user);



		$this->load->helper('url');

		

		$this->load->model('TripManager');

		$data['query_trip'] = $this->TripManager->getDetailTrip($user);



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

				$this->load->view('UserProfileUI', $data);

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

			$this->load->view('UserProfileUI', $data);

			$this->load->view('footer');

		}

		---------end of editan wildan-----------*/

		$this->load->view('header');

		$this->load->view('UserProfileUI', $data);

		$this->load->view('footer');

	}

	function viewOtherUser($user)
	{
		$this->load->model('memberManager');
		$this->load->model('ratingManager');
		$this->load->model('touristAttractionManager');
		$this->load->helper('cookie');
		$data['thisUser'] = $user;
		$data['wishlist'] = $this->memberManager->showWishlist($user);
		$data['visited'] = $this->memberManager->showVisited($user);
		$data['review'] = $this->ratingManager->showReview($user);
		$data['query'] = $this->touristAttractionManager->getTouristAttraction();
		$data['member'] = $this->memberManager->getMember($user);

		$this->load->helper('url');
		
		$this->load->model('TripManager');
		$data['query_trip'] = $this->TripManager->getDetailTrip($user);
		$data['user'] = $user;
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
				$this->load->view('UserProfileUI', $data);
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
			$this->load->view('UserProfileUI', $data);
			$this->load->view('footer');
		}
		---------end of editan wildan-----------*/
		$this->load->view('header');
		$this->load->view('ViewOtherUserUI', $data);
		$this->load->view('footer');
	} 

	function edit(){



		$this->load->model('memberManager');

		$this->load->helper('cookie');

		$this->load->helper('security');

		$username = get_cookie("username");

		$member = $this->memberManager->getMember($username);

		$data['username'] = $username;

		$data['name'] = $member[0]->name;

		$data['email'] = $member[0]->email;

		$data['password'] = $member[0]->password;

		$data['description'] = $member[0]->bio;

		$data['pic'] = $member[0]->pic;

		

		$this->load->helper('cookie');

		/*---------editan wildan--------

		$this->user = $this->facebook->getUser();

		if($this->user)

		{



			$data['user_profile'] = $this->facebook->api('/me/');

			$first_name = $data['user_profile']['first_name'];

			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";

			if(get_cookie('username')!=null)

			{

				$this->load->view('header', $data);

				$this->load->view('EditProfileUI');

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

			$this->load->view('EditProfileUI');

			$this->load->view('footer');

		}

		------end of editan wildan---------*/

		$this->load->view('header');

		$this->load->view('EditProfileUI', $data);

		$this->load->view('footer');



		

		// $this->load->view('header');

		// $this->load->view('EditProfileUI', $data);

		// $this->load->view('footer');



	}



	function removeWishlist($place_name){

		$this->load->model('memberManager');

		$this->load->helper('cookie');

		$place_name= str_replace("%20", " ",$place_name);

		$data = array(

				       	'is_wishlist' => '0'

					);

		$this->db->where('place_name', $place_name);

		$this->db->where('username', get_cookie("username"));

		$this->memberManager->delFromWishlist($data);

		header("Location: ".base_url()."user");

	}



	function remWishlist($id){

		$this->load->model('memberManager');

		$this->load->helper('cookie');

		$data = array(

				       	'is_wishlist' => '0'

					);

		$this->db->where('id_collect', $id);

		$this->memberManager->delFromWishlist($data);

		header("Location: ".base_url()."user");

	}



	function removeVisited($place_name){

		$this->load->model('memberManager');

		$this->load->helper('cookie');

		$place_name= str_replace("%20", " ",$place_name);

		$data = array(

				       	'is_visited' => '0'

					);

		$this->db->where('place_name', $place_name);

		$this->db->where('username', get_cookie("username"));

		$this->memberManager->delFromVisited($data);

		header("Location: ".base_url()."user");

	}

	

	function remVisited($id){

		$this->load->model('memberManager');

		$this->load->model('TouristAttractionManager');

		$this->load->helper('cookie');

		

		$data = array(

				       	'is_visited' => '0'

					);



		$this->db->where('id_collect', $id);

		$this->memberManager->delFromVisited($data);

		



		$tempPlace = $this->memberManager->getPlaceName($id);

		foreach($tempPlace as $rowPlace){

			$temp = $this->TouristAttractionManager->getVisitorsFromCollection($rowPlace->place_name);

		

			$banyakVisitor = 0;

			foreach($temp as $row){

				$banyakVisitor = $banyakVisitor+1;

			}

			$data2 = array(

				// 'visitors' => $dv['visitors']+1

				'visitors' => $banyakVisitor

			);

						

			$this->TouristAttractionManager->updateVisitor($rowPlace->place_name, $data2);

		}

		header("Location: ".base_url()."user");

	}



	function editMember(){

		$this->load->helper('cookie');

		$this->load->model('memberManager');

		$this->load->helper('date');

		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		

		$username = $this->input->post('username');

		$pic = $this->input->post('pic');

		if($this->input->post('form_profile')=='remove_photo'){

			if($pic!=''){

				$pic = str_replace(base_url(),"./",$pic);

				if(unlink($pic)){

					$pic = base_url('assets/img/avadefault.png');			

					$form_data = array(

						'pic' => $pic

					);		

					if ($this->memberManager->editMember($username, $form_data) == TRUE){ // the information has therefore been successfully saved in the db

						$this->session->set_flashdata('form', array('message' => '<center>You successfully edited your profile.</center>'));	

		    			redirect('user');

					}

					else{

						$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b><br> Something went wrong. Please try again.</center>'));	

		    			

					}

				}

				

			}

			

			

			

		}

		

		else if($this->input->post('form_profile')=='edit'){	

			$old_password = $this->input->post('old_password'); 

			$name = $this->input->post('name');

			$email = $this->input->post('email');

			$password = $this->input->post('new_password');

			$pass_confirm = $this->input->post('pass_confirm');

			$description = $this->input->post('description');

			$currentTime = mdate("%Y-%m-%d %H:%i:%s", now());

			//validation: password=pass_confirm, special char, username alr exist

			$status = TRUE;

			if($password==''){

				$password=$old_password;

			}

			else{

				$this->form_validation->set_rules('pass_confirm', 'password confirmation', 'required|matches[new_password]');
				$this->form_validation->set_message('matches', 'The password confirmation field does not match the password field.');
				$this->form_validation->set_message('required', 'The password confirmation field does not match the password field.');
				$status = $this->form_validation->run();
				$password=md5($password);

			}

			if ($status == FALSE) // validation hasn't been passed

			{

				$this->load->model('memberManager');

				$this->load->helper('cookie');

				$this->load->helper('security');

				$username = get_cookie("username");

				$member = $this->memberManager->getMember($username);

				$data['username'] = $username;

				$data['name'] = $member[0]->name;

				$data['email'] = $member[0]->email;

				$data['password'] = $member[0]->password;

				$data['description'] = $member[0]->bio;

				$data['pic'] = $member[0]->pic;

				

				$this->load->helper('cookie');

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

						$this->load->view('EditProfileUI');

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

					$this->load->view('EditProfileUI');

					$this->load->view('footer');

				}

				--------end of editan wildan----------*/

				$this->load->view('header');

				$this->load->view('EditProfileUI',$data);

				$this->load->view('footer');



				

				// $this->load->view('header');

				// $this->load->view('EditProfileUI', $data);

				// $this->load->view('footer');

			

			}

			else{

			//if valid

				//photo

				$config['upload_path'] = './assets/img/user/';

				//$config['upload_path'] = './assets/upload/';

				$config['allowed_types'] = 'gif|jpg|png';

				$config['max_size']	= '1000';

				$config['max_width']  = '4096';

				$config['max_height']  = '4096';

				$this->load->library('upload', $config);

				//$this->upload->initialize($config);

				//$upload_data = $this->upload->data();

				/*

				$dir_exist = true; // flag for checking the directory exist or not

				if (!is_dir('./assets/img/user/'.$username))

				{

					mkdir('./assets/img/user/'.$username, 0777, true);

					$dir_exist = false; // dir not exist

				}

				else{



				}*/

				if (!$this->upload->do_upload())

				{

					$error = array('error' => $this->upload->display_errors());

					//$this->load->view('HomeUI');

					//$this->load->view('HomeUI', $error);

				}

				else

				{

					//$data = array('upload_data' => $this->upload->data());

					if($pic!=base_url('assets/img/avadefault.png')){

						$pic = str_replace(base_url(),"./",$pic);
						// die($pic);

						if(@unlink($pic)){

							$upload_data = $this->upload->data();

							$file_name = $upload_data['file_name'];

							$path ='./assets/img/user/';

							$ext = pathinfo($path.$file_name, PATHINFO_EXTENSION);

							if(rename($path.$file_name, $path.$username.'.'.$ext)){

								$pic = base_url('assets/img/user')."/".$username.'.'.$ext;	

							}			

						}

					}

					else{

						$upload_data = $this->upload->data();

						$file_name = $upload_data['file_name'];

						$path ='./assets/img/user/';

						$ext = pathinfo($path.$file_name, PATHINFO_EXTENSION);

						if(rename($path.$file_name, $path.$username.'.'.$ext)){

							$pic = base_url('assets/img/user')."/".$username.'.'.$ext;	

						}			

					}

					

					

					//echo $file_name;

					//$this->load->view('upload_success');

					//$this->load->view('upload_form');

				}

				//name, desc blm ada di kolom database

				$form_data = array(

					'name' => $name,

					'username' => $username,

					'email' => $email,

					'last_active' => $currentTime,

					'password' => $password,

					'is_active' => 1,

					'bio' => $description,

					'pic' => $pic

				);

				

				if ($this->memberManager->editMember($username, $form_data) == TRUE){ // the information has therefore been successfully saved in the db

					setcookie("foto_profil",$pic,time()+3600,'/');

					redirect('UsersCtr/success/');   // or whatever logic needs to occur

				}

				else{

					echo 'An error occurred saving your information. Please try again later';

					// Or whatever error handling is necessary

				} 

			}

		}

		else{

			redirect('UsersCtr/deleteMember/');

		}

		

	}

	

	function success()

	{

		redirect('user/');	//nanti redirect ke hlm profil dia

	}

	

	public function deleteMember()

	{

		//kalau bukan akun facebook

		$this->load->helper('cookie');

		$this->load->model('memberMod');

		$name=get_cookie("username");

		if((string)$name != ""){

			$this->memberMod->delete($name);

		}

		redirect('logout');

		// $this->load->view('header');

		// $this->load->view('menuadmin');

		// $this->load->view('ManageMemberUI',$data);  

		// $this->load->view('footer');  

		//echo json_encode($data);

	}



	public function viewSavedTrip($id_trip)

	{

		/*@author wildan*/

		$this->load->model('TripManager');

		$this->load->helper('cookie');

		$query  = $this->TripManager->getTrip($id_trip);

		$detail_trip =  explode("YYY",$query['detail_trip']);

		$data['id_place_name'] = explode("xx", $detail_trip[1]);

		

		

		$data['place_name_search'] = "";

		$data['is_visited_search'] = "";

		$data['pic_thumbnail_search'] = "";

		for($i=0; $i<count($data['id_place_name'])-1; $i++)

		{

			if((strcmp($data['id_place_name'][$i], "-1") == 0))

			{

				$data['place_name_search'] = $data['place_name_search']."terhapusxx";

				$data['is_visited_search'] = $data['is_visited_search']."terhapusxx";

			}

			else

			{

				$this->load->model('touristAttractionManager');

				$queryGetPlaceName = $this->touristAttractionManager->getPlaceNameFromID($data['id_place_name'][$i]);

				

				$data['place_name_search'] = $data['place_name_search'].$queryGetPlaceName['place_name']."xx";

				$tempPicThumbnail= str_replace("./",base_url(),$queryGetPlaceName['pic_thumbnail']);

				$data['pic_thumbnail_search'] = $data['pic_thumbnail_search'].$tempPicThumbnail."xx";

				$dataGetIsVisited['place_name'] = $queryGetPlaceName['place_name'];

				$dataGetIsVisited['username'] = get_cookie('username');

				$this->load->model('CollectionManager');

				$queryGetIsVisited = $this->CollectionManager->getIsVisited($dataGetIsVisited);

				$data['is_visited_search'] = $data['is_visited_search'].$queryGetIsVisited['is_visited']."xx";



			}

		}

		



		$data['place_name'] = explode("xx",$data['place_name_search']);

		$data['halte_awal'] = explode("xx",$detail_trip[2]);

		$data['halte_name'] = explode("xx",$detail_trip[5]);

		$data['total_price'] = explode("xx",$detail_trip[3]);

		$data['transport_info'] = explode("xx",$detail_trip[4]);

		$data['place_info'] = explode("xx",$detail_trip[5]);

		$data['is_visited'] = explode("xx", $data['is_visited_search']);

		$data['id_trip'] = $id_trip;

		$data['pic_thumbnail'] = explode("xx", $data['pic_thumbnail_search']);



		/*------editan wildan-----------

		$this->user = $this->facebook->getUser();

		if($this->user)

		{



			$data['user_profile'] = $this->facebook->api('/me/');

			$first_name = $data['user_profile']['first_name'];

			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";

			if(get_cookie('username')!=null)

			{

				$this->load->view('header', $data);

				$this->load->view('viewSavedTripUI',$data);

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

			$this->load->view('viewSavedTripUI',$data);

			$this->load->view('footer');

		}

		------end of editan wildan*/

		$this->load->view('header');

		$this->load->view('ViewSavedTripUI',$data);

		$this->load->view('footer');

	}

	public function viewSavedTripOther($user,$id_trip)
	{
		/*@author wildan*/
		$this->load->model('TripManager');
		$this->load->helper('cookie');
		$query  = $this->TripManager->getTrip($id_trip);
		$detail_trip =  explode("YYY",$query['detail_trip']);
		$data['id_place_name'] = explode("xx", $detail_trip[1]);
		
		
		$data['place_name_search'] = "";
		$data['is_visited_search'] = "";
		$data['pic_thumbnail_search'] = "";
		for($i=0; $i<count($data['id_place_name'])-1; $i++)
		{
			if((strcmp($data['id_place_name'][$i], "-1") == 0))
			{
				$data['place_name_search'] = $data['place_name_search']."terhapusxx";
				$data['is_visited_search'] = $data['is_visited_search']."terhapusxx";
			}
			else
			{
				$this->load->model('touristAttractionManager');
				$queryGetPlaceName = $this->touristAttractionManager->getPlaceNameFromID($data['id_place_name'][$i]);
				
				$data['place_name_search'] = $data['place_name_search'].$queryGetPlaceName['place_name']."xx";
				$tempPicThumbnail= str_replace("./",base_url(),$queryGetPlaceName['pic_thumbnail']);
				$data['pic_thumbnail_search'] = $data['pic_thumbnail_search'].$tempPicThumbnail."xx";
				$dataGetIsVisited['place_name'] = $queryGetPlaceName['place_name'];
				$dataGetIsVisited['username'] = $user;
				$this->load->model('CollectionManager');
				$queryGetIsVisited = $this->CollectionManager->getIsVisited($dataGetIsVisited);
				$data['is_visited_search'] = $data['is_visited_search'].$queryGetIsVisited['is_visited']."xx";

			}
		}
		

		$data['place_name'] = explode("xx",$data['place_name_search']);
		$data['halte_awal'] = explode("xx",$detail_trip[2]);
		$data['halte_name'] = explode("xx",$detail_trip[5]);
		$data['total_price'] = explode("xx",$detail_trip[3]);
		$data['transport_info'] = explode("xx",$detail_trip[4]);
		$data['place_info'] = explode("xx",$detail_trip[5]);
		$data['is_visited'] = explode("xx", $data['is_visited_search']);
		$data['id_trip'] = $id_trip;
		$data['pic_thumbnail'] = explode("xx", $data['pic_thumbnail_search']);
		$data['user'] = $user;
		/*------editan wildan-----------
		$this->user = $this->facebook->getUser();
		if($this->user)
		{

			$data['user_profile'] = $this->facebook->api('/me/');
			$first_name = $data['user_profile']['first_name'];
			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
			if(get_cookie('username')!=null)
			{
				$this->load->view('header', $data);
				$this->load->view('viewSavedTripUI',$data);
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
			$this->load->view('viewSavedTripUI',$data);
			$this->load->view('footer');
		}
		------end of editan wildan*/
		$this->load->view('header');
		$this->load->view('ViewOtherSavedTripUI',$data);
		$this->load->view('footer');
	}

	public function setVisited($id_place, $id_trip)

	{

		/*@author wildan*/

		$this->load->helper('cookie');

		$this->load->model('touristAttractionManager');

		$this->load->model('CollectionManager');

		$queryGetPlaceName = $this->touristAttractionManager->getPlaceNameFromID($id_place);

		$data['place_name'] = $queryGetPlaceName['place_name'];

		$data['username'] = get_cookie('username');

		$data['is_visited'] = 1;

		$this->CollectionManager->setIsVisited($data);
		$this->touristAttractionManager->incrementVisitor($queryGetPlaceName['id']);
		header('Location: '.base_url('user/trip/viewsavedtrip/'.$id_trip));

	}



	public function deleteTrip($id_trip)

	{

		/*@author wildan*/

		$this->load->model('TripManager');
		
		$data['id_trip'] = $id_trip;

		$this->TripManager->deleteTrip($data);

		$this->session->set_flashdata('form', array('message' => '<center>You successfully deleted it from your trips.</center>'));
		
		redirect('user');

	}



	public function unsetVisited($id_place, $id_trip)

	{

		/*@author wildan*/

		$this->load->helper('cookie');

		$this->load->model('touristAttractionManager');

		$this->load->model('CollectionManager');

		$queryGetPlaceName = $this->touristAttractionManager->getPlaceNameFromID($id_place);

		$data['place_name'] = $queryGetPlaceName['place_name'];

		$data['username'] = get_cookie('username');

		$data['is_visited'] = 0;

		$this->CollectionManager->setIsVisited($data);
		$this->touristAttractionManager->decrementVisitor($queryGetPlaceName['id']);
		header('Location: '.base_url('user/trip/viewsavedtrip/'.$id_trip));

	}

	

	function deleteReview($id_rate){

		$this->load->model('ratingManager');

		$this->ratingManager->deleteReview($id_rate);

		header("Location: ".base_url()."user");

	}

	

}