<?php
	class ViewTripCtr extends CI_Controller {



	    function index()

		{   
				
				$this->load->helper('cookie');

				$this->load->helper('url');

				$data['place_name'] = explode("xx",get_cookie("placeName"));

				$data['halte_awal'] = explode("xx",get_cookie("halteAwal"));

				$data['halte_name'] = explode("xx",get_cookie("halteName"));

				$data['busway_price'] = explode("xx",get_cookie("buswayPrice"));

				$data['angkot_price'] = explode("xx",get_cookie("angkotPrice"));

				$data['ticket_price'] = explode("xx",get_cookie("ticketPrice"));

				$data['total_price'] = explode("xx",get_cookie("totalPrice"));

				$data['transport_info'] = explode("xx",get_cookie("transportInfo"));

				$data['place_info'] = explode("xx",get_cookie("placeInfo"));

				$data['list_pic_thumbnail']= explode("xx", get_cookie("list_pic_thumbnail"));



				//$place_name = explode("xx",get_cookie("place_name"));



				/*------------editan wildan--------------

				$this->user = $this->facebook->getUser();

				if($this->user)

				{



					$data['user_profile'] = $this->facebook->api('/me/');

					$first_name = $data['user_profile']['first_name'];

					$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";

					if(get_cookie('username')!=null)

					{

						$this->load->view('header', $data);

						$this->load->view('viewTripUI',$data);

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

					$this->load->view('viewTripUI',$data);

					$this->load->view('footer');

				}

				----end of editan wildan---------*/

				$this->load->view('header');

				$this->load->view('ViewTripUi',$data);

				$this->load->view('footer');

		}



		function saveTrip()

		{

			$this->load->helper('cookie');

			$this->load->helper('url');

			$this->load->model('TripManager');

			$this->load->model('CollectionManager');

			$data['place_name'] = explode("xx",get_cookie("placeName"));

			

			$data['id_place_name'] = "";

			$data['count_places_choosen'] = 0;

			for($i=0; $i<count($data['place_name'])-1; $i++)

			{

				if((strcmp($data['place_name'][$i], "terhapus") == 0))

				{

					$data['id_place_name'] = $data['id_place_name']."-1xx";

				}

				else

				{

					$this->load->model('touristAttractionManager');

					$query = $this->touristAttractionManager->getID($data['place_name'][$i]);

					foreach ($query as $id) {

						# code...

						$data['id_place_name'] = $data['id_place_name'].$id['id']."xx";

					}

					$dataCollection['place_name'] = $data['place_name'][$i];

					$dataCollection['username']= get_cookie('username');

					$query_collection = $this->CollectionManager->saveCollection($dataCollection);

 					$data['count_places_choosen'] = $data['count_places_choosen']  +1 ;

					

				}

			}

			

			$data['date_choosen'] = get_cookie("datechoosen");

			$data['first_halte'] = get_cookie("halteAwal");

			$data['total_price'] = get_cookie("totalPrice");

			$data['transport_info'] = get_cookie('transportInfo');

			$data['halte_name'] = get_cookie('halteName');

			$data['place_info'] = get_cookie('placeInfo');

			$data['detail_trip'] = $data['count_places_choosen']."YYY".$data['id_place_name']."YYY".$data['first_halte']."YYY".$data['total_price']."YYY".$data['transport_info']."YYY".$data['halte_name']."YYY".$data['place_info'];

			$data['username'] = get_cookie('username');





			$dataInsert = array(

			   'username' => $data['username'] ,

			   'detail_trip' => $data['detail_trip'],

			   'date_trip' => date('Y-m-d', strtotime($data['date_choosen']))

			);



			$query = $this->TripManager->saveTrip($dataInsert);

			$this->session->set_flashdata('form', array('message' => '<center>You successfully saved it to your trips.</center>'));

			redirect('user');



		}



		

	}



	?>