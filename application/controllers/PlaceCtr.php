<?php



class PlaceCtr extends CI_Controller {



    function __construct() {

        parent::__construct();

        $this->load->model('ratingManager');

    }



    function index($name)

	{   

		$this->load->helper('html');

		$this->load->model('DetailMod');

		$this->load->model('ReviewModel');

		//$this->session->keep_flashdata('form');



	if($this->DetailMod->isValid($name) == true)

	{

		$this->load->library('form_validation');           

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');



		$this->form_validation->set_rules('review', 'review', 'required');

		$this->load->helper('cookie');

		if ($this->form_validation->run() == FALSE)

		{

			if (isset($_POST['submitrev'])) {

				$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Something went wrong. Please try again.</center>'));

			}

			else{}



		}

		else

		{

			$name= str_replace("%20", " ",$name);

			$data = array(

						'username' => get_cookie("username"),

						'place_name' => $name,

                        'rate' => $this->input->post('rate'),

                        'title' => $this->input->post('title'),

                        'review' => $this->input->post('review')

//						'is_nudity' => $this->input->false,

//						'is_spam' => $this->input->false,

//						'is_FalseStatement' => $this->input->false,

//						'is_unrelatedStatement' => $this->input->false,

//						'is_profanity' => $this->input->false;

            );

					//Transfering data to Model

                    $this->ratingManager->insert_rating($data);
                    $this->ReviewModel->updaterateavg($name);
                    $this->session->set_flashdata('form', array('message' => '<center><b>Thank you!</b> You successfully submitted your review.</center>'));

                    redirect('place/'.$name);

         }		

		

		$this->load->helper('html');

		$this->load->model('DetailMod');

		$this->load->model('ReviewModel');

		$this->load->model('memberManager');

		$name= str_replace("%20", " ",$name);

		$data['thisPlace'] = $name;

		$data['query']= $this->DetailMod->showdetail($name);

		$data['query2']= $this->ReviewModel->showreviewtempat($name);

		$data['query3']= $this->DetailMod->showphoto($name);

		$data["thisUser"] = get_cookie("username");

		$user = get_cookie("username");

		$data['query4'] = $this->memberManager->showCollection($name, $user);

		



		//------------------

		/*-------------editan wildan-------------

		$this->user = $this->facebook->getUser();

		if($this->user)

		{



			$data['user_profile'] = $this->facebook->api('/me/');

			$first_name = $data['user_profile']['first_name'];

			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";

			if(get_cookie('username')!=null)

			{

				$this->load->view('header', $data);

				$this->load->view('PlaceUI',$data);

				$this->load->view('footer',$data);

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

			$this->load->view('PlaceUI',$data);

			$this->load->view('footer',$data);

		}

		---------------end of editan wildan----------*/

		$this->load->view('header');

		$this->load->view('PlaceUI',$data);

		$this->load->view('footer',$data);

	}

	else

	{

		show_404();

	}

		//--------------

		





		

		//echo json_encode($data);

	}

	

	    function rating($namatempat)

	{   

		$namatempat= str_replace("%20", " ",$namatempat);

		//Including validation library

		$this->load->library('form_validation');

                

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		



		//Validating Review Field

		$this->form_validation->set_rules('review', 'review', 'required');



		if ($this->form_validation->run() == FALSE)

		{

			$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Something went wrong. Please try again.</center>'));

		}

		else

		{

			//Setting values for tabel columns

			$data = array(

						'username' => 'memberNo1',

						'place_name' => $namatempat,

                        'rate' => $this->input->post('rate'),

                        'title' => $this->input->post('title'),

                        'review' => $this->input->post('review')

//						'is_nudity' => $this->input->false,

//						'is_spam' => $this->input->false,

//						'is_FalseStatement' => $this->input->false,

//						'is_unrelatedStatement' => $this->input->false,

//						'is_profanity' => $this->input->false;

            );

					//Transfering data to Model

                    $this->ratingManager->insert_rating($data);

                   	$this->session->set_flashdata('form', array('message' => '<center><b>Thank you!</b> You successfully submitted your review.</center>'));

                   	redirect("place/".$namatempat."");

        }

	}



	// public function check_photo(){

	// 		if (empty($_FILES['userfile']['name']))

	// 		{

	// 			$this->form_validation->set_message('check_photo', 'You must upload an image file.');

	// 			return FALSE;

	// 		}

	// 		else{

	// 			return TRUE;

	// 		}

	// 	}

	

function do_upload($place_name)

	{

		$this->load->library('form_validation');           

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');



		$place_name= str_replace("%20", " ",$place_name);

		$this->load->model('PhotoManager');

		$this->load->helper('cookie');

		$this->load->helper('form');

		$user = get_cookie("username");

		//$image_path1 = './assets/upload/'.$place_name;

		$config['upload_path'] = './assets/img/place/'.$place_name.'/';

		//$config['upload_path'] = './assets/upload/';

		$config['allowed_types'] = 'gif|jpg|png';

		$config['max_size']	= '2048';

		$config['max_width']  = '4096';

		$config['max_height']  = '4096';

		$this->load->library('upload', $config);

		// $this->form_validation->set_rules('userfile', 'document', 'required|file_max_size[2048KB]|file_allowed_type[image]');

		// $this->form_validation->set_rules('userfile[]', 'document', 'required');

		// $this->form_validation->set_rules('userfile[]', 'document', 'callback_check_photo');

		//$this->upload->initialize($config);

		//$upload_data = $this->upload->data();

		

		// $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);

		// $detectedType = exif_imagetype('$_FILES["userfile"]["tmp_name"]');

		

			$dir_exist = true; // flag for checking the directory exist or not

			if (!is_dir('./assets/img/place/'.$place_name.'/'))

			{

				mkdir('./assets/img/place/'.$place_name.'/', 0777, true);

				$dir_exist = false; // dir not exist

			}

			else{



			}



			$credit = $this->input->post('credit');

	        if($credit==null || $credit==''){

				$credit = "Uploaded by ".$user;

			}

			

			$files = $_FILES;

		    $cpt = count($_FILES['userfile']['name']);

		    for($i=0; $i<$cpt; $i++)

		    {

		    	$img = $files['userfile']['name'][$i];

		    	$path_parts = pathinfo($img);

		    	$ext = $path_parts['extension'];

		    	if($img=='' || $img==NULL){

		    		$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> You must upload an image file.</center>'));

		    	}

		    	elseif($ext=='png' || $ext=='gif' || $ext=='jpg'){

		    		$_FILES['userfile']['name']= $files['userfile']['name'][$i];

			        $_FILES['userfile']['type']= $files['userfile']['type'][$i];

			        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];

			        $_FILES['userfile']['error']= $files['userfile']['error'][$i];

			        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    







				    $this->upload->initialize($config);

				    $this->upload->do_upload();

					$upload_data = $this->upload->data();

					$file_name = $upload_data['file_name'];

									$form_data = array(

									       	'place_name' => $place_name,

									       	'pic' => './assets/img/place/'.$place_name.'/'.$file_name,

									       	'pic_info' => $credit,

											'is_publish' => 0,

											'username' => $user

											//'author' => get_cookie("username"),

											//'nearest_bus_stop' => $this->input->post('select_busstop'),

											//'last_modified' => mdate("%Y-%m-%d %H:%i:%s", now())

									);

					$this->PhotoManager->SaveForm($form_data);

					$this->session->set_flashdata('form', array('message' => '<center><b>You successfully submitted your photo.</b><br> Your photo will be evaluated by our admin before we publish it here.</center>'));	

		    	}

		    	else{

		    		$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> You must upload an image file.</center>'));

		    	}

		        

		    }

		

		



		// $this->form_validation->set_rules('review', 'review', 'required');

		

		if ($this->form_validation->run() == FALSE)

		{

			// $this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Something went wrong. Please try again.</center>'));

			

			//$this->load->view('formRatingUI');

		}

		else

		{

			$data = array(

						'username' => get_cookie("username"),

						'place_name' => $place_name,

                        'rate' => $this->input->post('rate'),

                        'title' => $this->input->post('title'),

                        'review' => $this->input->post('review')

            );

                    $this->ratingManager->insert_rating($data);

                    $this->session->set_flashdata('form', array('message' => '<center><b>Thank you!</b> You successfully submitted your review.</center>'));

        }

		$this->load->helper('html');

		$this->load->model('DetailMod');

		$this->load->model('ReviewModel');

		$data['query']= $this->DetailMod->showdetail($place_name);

		$data['query2']= $this->ReviewModel->showreviewtempat($place_name);

		$data['query3']= $this->DetailMod->showphoto($place_name);

		header("Location: ".base_url()."place/".$place_name."");

		}

	

	

	function spamreport($id,$name=null)

	{

		$this->load->library('table');

		$this->load->helper('html'); 

		$this->load->model('SpamManager');

		$reason = $_POST['spamreason'];

		if($reason==0){

			$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> You did not state any reasons.</center>'));

			redirect('place/'.$name);

		}

		foreach ($reason as $spamreason){

			if((int)$id != null){

				$this->SpamManager->updatespam($id,$spamreason);

				$this->session->set_flashdata('form', array('message' => '<center><b>Thank you!</b> You successfully flagged a review.</center>'));

				redirect('place/'.$name);

			}

			else{

				$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Something went wrong. Please try again.</center>'));

			}

		}

		/*if($spamreason == 'spam'){$this->SpamManager->updatespam($id);}

		if($spamreason == 'false_statement'){$this->SpamManager->updatespam($id);}

		if($spamreason == 'unrelated_content'){$this->SpamManager->updatespam($id);}

		if($spamreason == 'profanity'){$this->SpamManager->updatespam($id);}

		if($spamreason == 'nudity'){$this->SpamManager->updatespam($id);}*/

		

	}



	function addWishlist($place_name){

		$this->load->model('memberManager');

		$this->load->model('touristAttractionManager');

		$this->load->helper('cookie');

		$place_name= str_replace("%20", " ",$place_name);

		$user=get_cookie("username");

		$check = mysql_query("SELECT is_wishlist FROM collection WHERE place_name = '".$place_name."' AND username = '".$user."'");



		if(mysql_num_rows($check)==0){

			$data = array(

				       	'place_name' => $place_name,

				       	'username' => get_cookie("username"),

				       	'is_wishlist' => '1'

					);

			$this->memberManager->addToWishlist($data);

		}

		else{

			$data = array(

				       	'is_wishlist' => '1'

					);

			$this->db->where('place_name', $place_name);

			$this->db->where('username', get_cookie("username"));

			$this->memberManager->updateWishlist($data);			

		}

		

		header("Location: ".base_url()."place/".$place_name."");

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

		header("Location: ".base_url()."place/".$place_name."");

	}



	function addVisited($place_name){

		$this->load->model('memberManager');

		$this->load->model('touristAttractionManager');

		$place_name= str_replace("%20", " ",$place_name);

		// $temp = $this->touristAttractionManager->getVisitors($place_name);

		// $dv = mysql_fetch_assoc($temp);

		$this->load->helper('cookie');

		

		$user=get_cookie("username");

		$check = mysql_query("SELECT is_visited FROM collection WHERE place_name = '".$place_name."' AND username = '".$user."'");



		if(mysql_num_rows($check)==0){

			$data = array(

				       	'place_name' => $place_name,

				       	'username' => get_cookie("username"),

				       	'is_visited' => '1'

					);

			$this->memberManager->addToVisited($data);



			$temp = $this->touristAttractionManager->getVisitorsFromCollection($place_name);

			// $banyakVisitor = mysql_num_rows(mysql_fetch_assoc($temp));

			
			// die($temp + "yes");
			$temp2 = mysql_fetch_assoc($temp);

			$banyakVisitor = 0;

			foreach($temp as $row){

				$banyakVisitor = $banyakVisitor+1;

			}



			$data2 = array(

						// 'visitors' => $dv['visitors']+1

						'visitors' => $banyakVisitor

					);

			

			$this->touristAttractionManager->updateVisitor($place_name, $data2);

		}

		else{

			$data = array(

				       	'is_visited' => '1'

					);

			$this->db->where('place_name', $place_name);

			$this->db->where('username', get_cookie("username"));

			$this->memberManager->updateVisited($data);



			$temp = $this->touristAttractionManager->getVisitorsFromCollection($place_name);

			

			// $banyakVisitor = mysql_num_rows(mysql_fetch_assoc($temp));

			$banyakVisitor = 0;

			foreach($temp as $row){

				$banyakVisitor = $banyakVisitor+1;

			}



			$data2 = array(

						// 'visitors' => $dv['visitors']+1

						'visitors' => $banyakVisitor

					);

						

			$this->touristAttractionManager->updateVisitor($place_name, $data2);

		}

		

		header("Location: ".base_url()."place/".$place_name."");

	}



	function removeVisited($place_name){

		$this->load->model('memberManager');

		$this->load->model('TouristAttractionManager');

		$this->load->helper('cookie');

		$place_name= str_replace("%20", " ",$place_name);

		$data = array(

				       	'is_visited' => '0'

					);

		$this->db->where('place_name', $place_name);

		$this->db->where('username', get_cookie("username"));

		$this->memberManager->delFromVisited($data);



		$temp = $this->TouristAttractionManager->getVisitorsFromCollection($place_name);

		// $banyakVisitor = mysql_num_rows(mysql_fetch_assoc($temp));



		$banyakVisitor = 0;

		foreach($temp as $row){

			$banyakVisitor = $banyakVisitor+1;

		}



		$data2 = array(

			// 'visitors' => $dv['visitors']+1

			'visitors' => $banyakVisitor

			);

					

		$this->TouristAttractionManager->updateVisitor($place_name, $data2);



		header("Location: ".base_url()."place/".$place_name."");

	}

	function tes123($nama)
	{
		 $this->load->model('ReviewModel');
		 $this->ReviewModel->updaterateavg($nama);
	}



}



?>