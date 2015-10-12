<?php 
	/*@author wildan*/
	class searchCtr extends CI_Controller
	{

		public function index()
		{
		
			$this->load->helper('form');
			$this->load->model('touristAttractionManager');
			$this->load->helper('cookie');
			
			$this->load->model('HalteManager');
			$data['query'] = $this->HalteManager->getAllHalte();
			$this->load->model('searchMod');
			$data['query4']= $this->searchMod->showallwisata();
			$data['query1']= $this->searchMod->showallcategory();
			$data['query2']= $this->searchMod->showalllocation();
			$data['query3']= $this->searchMod->showallhalte();

			/*-------editan wildan---------------
			$this->user = $this->facebook->getUser();
			if($this->user)
			{

				$data['user_profile'] = $this->facebook->api('/me/');
				$first_name = $data['user_profile']['first_name'];
				$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
				if(get_cookie('username')!=null)
				{
					$this->load->view('header', $data);
					$this->load->view('FormSearchUI', $data);
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
				$this->load->view('FormSearchUI', $data);
				$this->load->view('footer');
			}
			------------end of editan wildan------*/
			$this->load->view('header');
			$this->load->view('FormSearchUI', $data);
			$this->load->view('footer');
		
		}

	

		public function searchWithoutBudget()
		{
			$this->load->model('touristAttractionManager');
			$this->load->model('HalteManager');
			$this->load->helper('cookie');
			$this->load->helper('form');
			
			$datechoosen = get_cookie('datechoosen');
			$data = array(
			'halte_name' => get_cookie('halte_name')
			);

						
		 	$day = date('l', strtotime($datechoosen));
		
			 
			if($day == "Saturday" OR $day == "Sunday")
			{
			 	setcookie('isWeekend',"true", time()+3600, '/');
			 	$data['isWeekend'] = "true";
			}
			else
			{
			 	setcookie('isWeekend',"false", time()+3600, '/');
			 	$data['isWeekend'] = "false";
			}

		
			
			$this->load->model('touristAttractionManager');
			$this->load->helper('cookie');
			$data['nama_halte'] = "Taman Mini Garuda";
			
			$data['query'] = $this->touristAttractionManager->getAllTourInitial($data);
	
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
			setcookie("list_pic_thumbnail","",time()+3600, '/');

			$data['isRekomendasi'] = "false"; 
			setcookie("isRekomendasi", $data['isRekomendasi'], time()+3600, '/');

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
					$this->load->view('FormSearchUI', $data);
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
				$this->load->view('FormSearchUI', $data);
				$this->load->view('footer');
			}
			---------end of editan wildan------------*/

			$this->load->view('header');
			$this->load->view('FormSearchUI', $data);
			$this->load->view('footer');

		}
		public function searchWithinBudgetRec()
		{
		//	echo "haha";
			// $this->load->helper('form');
		// 	;
			$this->load->model('touristAttractionManager');
			$this->load->model('HalteManager');
			$this->load->helper('cookie');
			$this->load->helper('form');
			//	echo "hahaha";
			// $data['query']= $this->tesModel->getDatabase();
			// $this->load->view('FormSearchUI',$data);
			// echo $datechoosen;
			
				$datechoosen = get_cookie('datechoosen');
				$data = array(
				'budget' => intval(get_cookie('budget')),
				'halte_name' => get_cookie('halte_name')
				);

						
		 	 $day = date('l', strtotime($datechoosen));
		// 	//echo $day;
		// 	// $halte_choosen =  $this->input->post('halte');
			 
			 if($day == "Saturday" OR $day == "Sunday")
			 {
			 //	$data['query'] = $this->touristAttractionManager->getDatabaseWithinBudgetandHalteWeekend($data);
			 	setcookie('isWeekend',"true", time()+3600, '/');
			 	$data['isWeekend'] = "true";
			 }
			 else
			 {
			// 	$data['query'] = $this->touristAttractionManager->getDatabaseWithinBudgetandHalteWeekday($data);	
			 	setcookie('isWeekend',"false", time()+3600, '/');
			 	$data['isWeekend'] = "false";
			 }
		
			
			$this->load->model('touristAttractionManager');
			$this->load->helper('cookie');
			$data['nama_halte'] = "Taman Mini Garuda";
			
			$data['query'] = $this->touristAttractionManager->getAllTourInitial($data);
		
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
			setcookie("list_pic_thumbnail","",time()+3600, '/');
			$data['isRekomendasi'] = "true";
			setcookie("isRekomendasi", $data['isRekomendasi'], time()+3600, '/');
			// $this->load->model('HalteManager');
			// $data['query'] = $this->HalteManager->getAllHalte();
			// $this->load->model('searchMod');
			// $data['query4']= $this->searchMod->showallwisata();
			// $data['query1']= $this->searchMod->showallcategory();
			// $data['query2']= $this->searchMod->showalllocation();
			// $data['query3']= $this->searchMod->showallhalte();

			/*----------editan wildan-----------
			$this->user = $this->facebook->getUser();
			if($this->user)
			{

				$data['user_profile'] = $this->facebook->api('/me/');
				$first_name = $data['user_profile']['first_name'];
				$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
				if(get_cookie('username')!=null)
				{
					$this->load->view('header', $data);
					$this->load->view('FormSearchUI', $data);
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
				$this->load->view('FormSearchUI', $data);
				$this->load->view('footer');
			}
			----end of editan wildan-------*/
			$this->load->view('header');
			$this->load->view('FormSearchUI', $data);
			$this->load->view('footer');

		}

		public function addingTrip()
		{
			$this->load->helper('cookie');
			$dataInput = $_POST["datanya"];
			$this->load->model('touristAttractionManager');
			$dataInput = str_replace("%20", " ",$dataInput);
			$arrayData = explode("--", $dataInput);
			$data['place_name'] = get_cookie("placeName").$arrayData[0]."xx";
			$data['halte_name'] = get_cookie("halteName").$arrayData[1]."xx";
			$data['busway_price'] = get_cookie("buswayPrice").$arrayData[2]."xx";
			$data['angkot_price'] = get_cookie("angkotPrice").$arrayData[3]."xx";
			$data['ticket_price'] = get_cookie("ticketPrice").$arrayData[4]."xx";
			$data['total_price'] = get_cookie("totalPrice").$arrayData[5]."xx";
			$data['transport_info'] = get_cookie("transportInfo").$arrayData[6]."xx";
			$data['place_info'] = get_cookie("placeInfo").$arrayData[7]."xx";
			$data['pic_thumbnail'] = get_cookie("list_pic_thumbnail").$arrayData[8]."xx";
			$arrayPlaceName = explode("xx",$data['place_name']);
			$data['counterTrip'] = intval((get_cookie("counterTrip")));
			$counterTrip = $data['counterTrip']+1;

				$datechoosen = get_cookie('datechoosen');		
		 	 $day = date('l', strtotime($datechoosen));
		
			 if($day == "Saturday" OR $day == "Sunday")
			 {
			
			 	setcookie('isWeekend',"true", time()+3600, '/');
			 	$data['isWeekend'] = "true";
			 }
			 else
			 {
			
			 	setcookie('isWeekend',"false", time()+3600, '/');
			 	$data['isWeekend'] = "false";
			 }

			if($data['counterTrip'] == 0)
			{
				$data['idx_first_trip'] = 0;
				$data['idx_last_trip'] = 0;
				setcookie("idxFirstTrip", $data['idx_first_trip'], time()+3600, '/');
		//		echo "halah";
			}
			else
			{
				$data['idx_last_trip'] = count($arrayPlaceName)-2;
			//	$data['idx_last_trip'] = intval(get_cookie("idxLastTrip")) + 1;
			}
		//	echo json_encode($data);

			setcookie("placeName", $data['place_name'], time()+3600, '/');
			setcookie("halteName", $data['halte_name'], time()+3600, '/');
			setcookie("buswayPrice", $data['busway_price'], time()+3600, '/');
			setcookie("angkotPrice", $data['angkot_price'], time()+3600, '/');
			setcookie("ticketPrice", $data['ticket_price'], time()+3600, '/');
			setcookie("totalPrice", $data['total_price'], time()+3600, '/');
			setcookie("transportInfo",$data['transport_info'],time()+3600, '/');
			setcookie("placeInfo", $data['place_info'], time()+3600, '/');
			setcookie("counterTrip", $counterTrip, time()+3600, '/');
			setcookie("idxLastTrip", $data['idx_last_trip'], time()+3600, '/');
			setcookie("list_pic_thumbnail", $data['pic_thumbnail'], time()+3600, '/');

			$data['query'] = $this->touristAttractionManager->getAllTourInAdd($data);

			echo json_encode($data);
			
		}

		public function addingTripRec()
		{
			$this->load->helper('cookie');
			$dataInput = $_POST["datanya"];
			$this->load->model('touristAttractionManager');
			$dataInput = str_replace("%20", " ",$dataInput);
			$arrayData = explode("--", $dataInput);
			$data['place_name'] = get_cookie("placeName").$arrayData[0]."xx";
			$data['halte_name'] = get_cookie("halteName").$arrayData[1]."xx";
			$data['busway_price'] = get_cookie("buswayPrice").$arrayData[2]."xx";
			$data['angkot_price'] = get_cookie("angkotPrice").$arrayData[3]."xx";
			$data['ticket_price'] = get_cookie("ticketPrice").$arrayData[4]."xx";
			$data['total_price'] = get_cookie("totalPrice").$arrayData[5]."xx";
			$data['transport_info'] = get_cookie("transportInfo").$arrayData[6]."xx";
			$data['place_info'] = get_cookie("placeInfo").$arrayData[7]."xx";
			$data['budget'] = $arrayData[8];
			$data['pic_thumbnail'] = get_cookie("list_pic_thumbnail").$arrayData[9]."xx";
			$data['counterTrip'] = intval((get_cookie("counterTrip")));
			$counterTrip = $data['counterTrip']+1;
			
				$datechoosen = get_cookie('datechoosen');		
		 	 $day = date('l', strtotime($datechoosen));
		
			 if($day == "Saturday" OR $day == "Sunday")
			 {
			
			 	setcookie('isWeekend',"true", time()+3600, '/');
			 	$data['isWeekend'] = "true";
			 }
			 else
			 {
			
			 	setcookie('isWeekend',"false", time()+3600, '/');
			 	$data['isWeekend'] = "false";
			 }

			if($data['counterTrip'] == 0)
			{
				$data['idx_first_trip'] = 0;
				$data['idx_last_trip'] = 0;
				setcookie("idxFirstTrip", $data['idx_first_trip'], time()+3600, '/');
		//		echo "halah";
			}
			else
			{
				$data['idx_last_trip'] = intval(get_cookie("idxLastTrip")) + 1;
			}
		//	echo json_encode($data);

			setcookie("placeName", $data['place_name'], time()+3600, '/');
			setcookie("halteName", $data['halte_name'], time()+3600, '/');
			setcookie("buswayPrice", $data['busway_price'], time()+3600, '/');
			setcookie("angkotPrice", $data['angkot_price'], time()+3600, '/');
			setcookie("ticketPrice", $data['ticket_price'], time()+3600, '/');
			setcookie("totalPrice", $data['total_price'], time()+3600, '/');
			setcookie("transportInfo",$data['transport_info'],time()+3600, '/');
			setcookie("placeInfo", $data['place_info'], time()+3600, '/');
			setcookie("counterTrip", $counterTrip, time()+3600, '/');
			setcookie("idxLastTrip", $data['idx_last_trip'], time()+3600, '/');
			setcookie("budget", $data['budget'], time()+3600, '/');
			setcookie("list_pic_thumbnail", $data['pic_thumbnail'], time()+3600, '/');
			$data['query'] = $this->touristAttractionManager->getAllTourInAdd($data);

			echo json_encode($data);
			
		}

		public function deleteTrip($tempatWisata)
		{
			$tempatWisata = str_replace("%20", " ", $tempatWisata);
			$this->load->helper('cookie');
			$this->load->model('touristAttractionManager');
			$data['place_name'] = get_cookie("placeName");
			$data['halte_name'] = get_cookie("halteName");
			$data['busway_price'] = get_cookie("buswayPrice");
			$data['angkot_price'] = get_cookie("angkotPrice");
			$data['ticket_price'] = get_cookie("ticketPrice");
			$data['total_price'] = get_cookie("totalPrice");
			$data['transport_info'] = get_cookie("transportInfo");
			$data['place_info'] = get_cookie("placeInfo");
			$data['counterTrip'] = intval((get_cookie("counterTrip")));
			$data['idx_first_trip'] = intval(get_cookie("idxFirstTrip"));
			$data['idx_last_trip'] = intval(get_cookie("idxLastTrip"));
			$arrayPlaceName = explode("xx", $data['place_name']);
			$indexYangDihapus = -1;
			for($i=0 ; $i<count($arrayPlaceName); $i++)
			{
				if(strcmp($arrayPlaceName[$i], $tempatWisata)  == 0)
				{
					$indexYangDihapus = $i;
				}
				
			}

			$indexTerakhir = intval(get_cookie("idxLastTrip"));
			$indexAwal = intval(get_cookie("idxFirstTrip"));
			$HalteNameArray = explode("xx",$data['halte_name']);
			$buswayPriceArray = explode("xx",$data['busway_price']);
			$totalPriceArray = explode("xx",$data['total_price']); 
			$placeInfoArray = explode("xx",$data['place_info']); 
			$angkotPriceArray = explode("xx",$data['angkot_price']);
			$ticketPriceArray = explode("xx", $data['ticket_price']);
			// echo json_encode($HalteNameArray);
			// echo json_encode($buswayPriceArray);
			// echo json_encode($totalPriceArray);
			$data['halte_awal']= get_cookie("halteAwal");
			$data['isWeekend'] = get_cookie("isWeekend");
			if($indexYangDihapus == $indexAwal && $indexAwal == $indexTerakhir)
			{
				$this->load->model('touristAttractionManager');
				$this->load->helper('cookie');
				$data['halte_name'] = get_cookie("halteAwal");
				$data['isWeekend'] = get_cookie("isWeekend");
				$data['query'] = $this->touristAttractionManager->getAllTourInitial($data);
		//	print_r($data['query']['result']);
				// foreach($data['query'] as $row)
				// {
				// 	echo $row->result->place_name;
				// }
				
				// $data['query']= $this->tesModel->getDatabase();
				// $this->load->view('FormSearchUI',$data);
			// 	$data['query'] = $this->touristAttrManager->getDatabaseWithinBudget($budget);
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
				setcookie("list_pic_thumbnail", "", time()+3600, '/');
				if (strcmp(get_cookie("isRekomendasi"), "true")  == 0)
				{
					// echo "haha";
					setcookie("budget", get_cookie("firstBudget"), time()+3600, '/');
				}

				
				echo json_encode($data);
			}
			else if($indexYangDihapus == $indexAwal)
			{
				$tempIndexAwal = -1;
				for($i=$indexYangDihapus+1 ; $i<count($arrayPlaceName); $i++)
				{
					
					if((strcmp($arrayPlaceName[$i], "terhapus")  != 0) && $arrayPlaceName[$i]!=null )
					{
						// echo $i;
						// echo "<br>";
						$tempIndexAwal=$i;
						$i = count($arrayPlaceName);
						
					}
					
				}
			//	echo json_encode($buswayPriceArray);
			//	echo json_encode($totalPriceArray);
				
				if(strcmp($HalteNameArray[$tempIndexAwal], $data['halte_awal']) == 0)
				{
					$buswayPriceArray[$tempIndexAwal]="0";
					
				}
				else
				{
					$buswayPriceArray[$tempIndexAwal]="3500";
					// echo json_encode($buswayPriceArray);
				}

				$arrayPlaceName[$indexYangDihapus] = "terhapus";
				$tempHargaAkhir=  intval($buswayPriceArray[$tempIndexAwal]) + intval($angkotPriceArray[$tempIndexAwal])+ intval($ticketPriceArray[$tempIndexAwal]);
				$totalPriceArray[$tempIndexAwal] = $tempHargaAkhir."";
			//	echo json_encode($buswayPriceArray);
			//	echo json_encode($angkotPriceArray);
			//	echo json_encode($arrayPlaceName);
			//	echo json_encode($totalPriceArray);
				$stringBuswayPrice = "";
				$stringPlaceName = "";
				$stringTotalPrice = "";
				for($i=0 ; $i<count($arrayPlaceName)-1; $i++)
				{
					$stringBuswayPrice = $stringBuswayPrice.$buswayPriceArray[$i]."xx";
					$stringPlaceName = $stringPlaceName.$arrayPlaceName[$i]."xx";
					$stringTotalPrice = $stringTotalPrice.$totalPriceArray[$i]."xx";
				}
				$data['place_name'] = $stringPlaceName;
				$data['busway_price'] = $stringBuswayPrice;
				$data['total_price'] =  $stringTotalPrice;
				// echo "<br>";
				// echo $data['idx_first_trip'];
				// echo "<br>";
				// echo $data['idx_last_trip'];

				setcookie("placeName", $data['place_name'], time()+3600, '/');
				setcookie("halteName", $data['halte_name'], time()+3600, '/');
				setcookie("buswayPrice", $data['busway_price'], time()+3600, '/');
				setcookie("angkotPrice", $data['angkot_price'], time()+3600, '/');
				setcookie("ticketPrice", $data['ticket_price'], time()+3600, '/');
				setcookie("totalPrice", $data['total_price'], time()+3600, '/');
				setcookie("transportInfo",$data['transport_info'],time()+3600, '/');
				setcookie("placeInfo", $data['place_info'], time()+3600, '/');
				setcookie("counterTrip", $data['counterTrip']-1, time()+3600, '/');
				setcookie("idxLastTrip", $data['idx_last_trip'], time()+3600, '/');
				setcookie("idxFirstTrip", $tempIndexAwal, time()+3600, '/');
				if (strcmp(get_cookie("isRekomendasi"), "true")  == 0)
				{
				//	$arrayBudget = explode("xx", get_cookie("budget"));
					$totalBudget = 0;
					for($i=0; $i<count($arrayPlaceName)-1; $i++)
					{
						if((strcmp($arrayPlaceName[$i], "terhapus")  != 0))
						{
							$totalBudget = $totalBudget + intval($totalPriceArray[$i]);
						}
					}
				//	echo $totalBudget;
					setcookie("budget", get_cookie("firstBudget") - $totalBudget, time()+3600, '/');
				}
				$data['query'] = $this->touristAttractionManager->getAllTourInAdd($data);
			//	$data['query'] = $this->touristAttractionManager->getAllTour2($data);
				$counter = 0;
				// foreach($data['query']['result'] as $row)
				// {
				// 	 echo "<br>";
				// 	 echo $row->place_name;
				// 	// echo $data['query']['sudahDipilih'];
				// 	 $counter++;
				// }
				// foreach($data['query']['sudahDipilih'] as $row)
				// {
				// 	 echo "<br>";
				// 	// / echo $row->place_name;
				// 	 echo $row;
				// 	 $counter++;
				// }
				echo json_encode($data);
			//	echo "awal";

			}
			else if($indexYangDihapus == $indexTerakhir)
			{
				$tempIndexAkhir = -1;
				for($i=$indexTerakhir-1; $i>=0; $i--)
				{
					if((strcmp($arrayPlaceName[$i], "terhapus")  != 0) && $arrayPlaceName[$i]!=null )
					{
						// echo $i;
						// echo "<br>";
						$tempIndexAkhir = $i;
						$i = 0;
					}
				}
				$arrayPlaceName[$indexYangDihapus] = "terhapus";
				// $stringBuswayPrice = "";
				$stringPlaceName = "";
				// $stringTotalPrice = "";
				for($i=0 ; $i<count($arrayPlaceName)-1; $i++)
				{
					// $stringBuswayPrice = $stringBuswayPrice.$buswayPriceArray[$i]."xx";
					$stringPlaceName = $stringPlaceName.$arrayPlaceName[$i]."xx";
					// $stringTotalPrice = $stringTotalPrice.$totalPriceArray[$i]."xx";
				}
				$data['place_name'] = $stringPlaceName;
				// $data['busway_price'] = $stringBuswayPrice;
				// $data['total_price'] =  $stringTotalPrice;
				$data['idx_last_trip'] = $tempIndexAkhir;
				setcookie("placeName", $data['place_name'], time()+3600, '/');
				setcookie("halteName", $data['halte_name'], time()+3600, '/');
				setcookie("buswayPrice", $data['busway_price'], time()+3600, '/');
				setcookie("angkotPrice", $data['angkot_price'], time()+3600, '/');
				setcookie("ticketPrice", $data['ticket_price'], time()+3600, '/');
				setcookie("totalPrice", $data['total_price'], time()+3600, '/');
				setcookie("transportInfo",$data['transport_info'],time()+3600, '/');
				setcookie("placeInfo", $data['place_info'], time()+3600, '/');
				setcookie("counterTrip", $data['counterTrip']-1, time()+3600, '/');
				setcookie("idxLastTrip", $data['idx_last_trip'], time()+3600, '/');
				setcookie("idxFirstTrip", $data['idx_first_trip'], time()+3600, '/');
				$data['query'] = $this->touristAttractionManager->getAllTourInAdd($data);
				if (strcmp(get_cookie("isRekomendasi"), "true")  == 0)
				{
				//	$arrayBudget = explode("xx", get_cookie("budget"));
					$totalBudget = 0;
					for($i=0; $i<count($arrayPlaceName)-1; $i++)
					{
						if((strcmp($arrayPlaceName[$i], "terhapus")  != 0))
						{
							$totalBudget = $totalBudget + intval($totalPriceArray[$i]);
						}
					}
				//	echo $totalBudget;
					setcookie("budget", get_cookie("firstBudget") - $totalBudget, time()+3600, '/');
				}
				echo json_encode($data);
				// echo "akhir";
			}
			else
			{
				$indexKiri = -1;
				$indexKanan = -1;
				for($i=$indexYangDihapus-1; $i>=0; $i--)
				{
					if((strcmp($arrayPlaceName[$i], "terhapus")  != 0) && $arrayPlaceName[$i]!=null )
					{
						// echo $i;
						// echo "<br>";
						$indexKiri = $i;
						$i = 0;
					}
				}
				for($i=$indexYangDihapus+1 ; $i<count($arrayPlaceName); $i++)
				{
					
					if((strcmp($arrayPlaceName[$i], "terhapus")  != 0) && $arrayPlaceName[$i]!=null )
					{
						// echo $i;
						// echo "<br>";
						$indexKanan=$i;
						$i = count($arrayPlaceName);
					}
					
				}
				// echo json_encode($buswayPriceArray);
				// echo json_encode($angkotPriceArray);
				// echo json_encode($totalPriceArray);
			//	echo $indexKiri." ".$indexKanan; 
				$arrayPlaceName[$indexYangDihapus] = "terhapus";
				$biayaAngkotSebelum = $angkotPriceArray[$indexKiri];
				$biayaAngkotSesudah = $angkotPriceArray[$indexKanan];
				if(strcmp($HalteNameArray[$indexKiri], $HalteNameArray[$indexKanan]) == 0)
				{
					$buswayPriceArray[$indexKanan]="0";
					//echo json_encode($buswayPriceArray);
				}
				if(strcmp($placeInfoArray[$indexKiri], $placeInfoArray[$indexKanan]) == 0)
				{
					// echo "ini ".$placeInfoArray[$indexKiri]." dan ".$placeInfoArray[$indexKanan];
				//	echo $indexKiri." ".$indexKanan;
					$buswayPriceArray[$indexKanan]="0";
					$biayaAngkotSesudah="0";
					$biayaAngkotSebelum="0";
				
				}
				$tempHargaAkhir=  intval($buswayPriceArray[$indexKanan]) + intval($biayaAngkotSebelum)+ intval($ticketPriceArray[$indexKanan]) + intval($biayaAngkotSesudah);
			
				$totalPriceArray[$indexKanan] = $tempHargaAkhir."";
				
				

				$stringBuswayPrice = "";
				$stringPlaceName = "";
				$stringTotalPrice = "";
				for($i=0 ; $i<count($arrayPlaceName)-1; $i++)
				{
					$stringBuswayPrice = $stringBuswayPrice.$buswayPriceArray[$i]."xx";
					$stringPlaceName = $stringPlaceName.$arrayPlaceName[$i]."xx";
					$stringTotalPrice = $stringTotalPrice.$totalPriceArray[$i]."xx";
				} 
				$data['place_name'] = $stringPlaceName;
				$data['busway_price'] = $stringBuswayPrice;
				$data['total_price'] =  $stringTotalPrice;
				setcookie("placeName", $data['place_name'], time()+3600, '/');
				setcookie("halteName", $data['halte_name'], time()+3600, '/');
				setcookie("buswayPrice", $data['busway_price'], time()+3600, '/');
				setcookie("angkotPrice", $data['angkot_price'], time()+3600, '/');
				setcookie("ticketPrice", $data['ticket_price'], time()+3600, '/');
				setcookie("totalPrice", $data['total_price'], time()+3600, '/');
				setcookie("transportInfo",$data['transport_info'],time()+3600, '/');
				setcookie("placeInfo", $data['place_info'], time()+3600, '/');
				setcookie("counterTrip", $data['counterTrip']-1, time()+3600, '/');
				setcookie("idxLastTrip", $data['idx_last_trip'], time()+3600, '/');
				setcookie("idxFirstTrip", $data['idx_first_trip'], time()+3600, '/');
				$data['query'] = $this->touristAttractionManager->getAllTourInAdd($data);
				if (strcmp(get_cookie("isRekomendasi"), "true")  == 0)
				{
				//	$arrayBudget = explode("xx", get_cookie("budget"));
					$totalBudget = 0;
					for($i=0; $i<count($arrayPlaceName)-1; $i++)
					{
						if((strcmp($arrayPlaceName[$i], "terhapus")  != 0))
						{
							$totalBudget = $totalBudget + intval($totalPriceArray[$i]);
						}
					}
				//	echo $totalBudget;
					setcookie("budget", get_cookie("firstBudget") - $totalBudget, time()+3600, '/');
				}
				echo json_encode($data);
			}

		}

		public function setInitialVariable()
		{

				$this->load->model('touristAttractionManager');
				$this->load->helper('cookie');
			//	$this->touristAttractionManager->insertBudget($budget);
				setcookie("counttrip",0,time()+3600, '/');
				setcookie("datechoosen",$this->input->post('datepicker'),time()+3600, '/');
				setcookie("halte_name",$this->input->post('mydropdown'),time()+3600, '/');
				setcookie("budget","-",time()+3600, '/');
				setcookie("harga_angkot",0,time()+3600, '/');
				setcookie("list_angkot_before","",time()+3600, '/');
				setcookie("list_halte_before","",time()+3600, '/');
				setcookie("list_halte_after","",time()+3600, '/');
				setcookie("list_angkot_after","",time()+3600, '/');
				setcookie("list_tour_attr","",time()+3600, '/');
				setcookie("list_pic_thumbnail","",time()+3600, '/');
				setcookie("halteAwal",$this->input->post('mydropdown'),time()+3600, '/');
			//	echo get_cookie("halteAwal");
			//	echo get_cookie("datechoosen");
				header("Location:".base_url()."trip/owntrip");
				
			//	kalau input salah
			//	header("Location:http://localhost/Jaktrip/index.php/searchCtr/inputSalah");
			
			
			
		}

		public function setInitialVariableRec()
		{

			$this->load->helper('form');
			$this->load->helper('cookie');
			$budget=$this->input->post('budget');
			if(ctype_digit($budget))
			{
				$this->load->model('touristAttractionManager');
				$this->touristAttractionManager->insertBudget($budget);
				setcookie("counttrip",0,time()+3600, '/');
				setcookie("datechoosen",$this->input->post('datepicker'),time()+3600, '/');
				setcookie("halte_name",$this->input->post('mydropdown'),time()+3600, '/');
				setcookie("firstBudget",$this->input->post('budget'),time()+3600, '/');
				setcookie("budget",$this->input->post('budget'),time()+3600, '/');
				setcookie("harga_angkot",0,time()+3600, '/');
				setcookie("list_angkot_before","",time()+3600, '/');
				setcookie("list_halte_before","",time()+3600, '/');
				setcookie("list_halte_after","",time()+3600, '/');
				setcookie("list_angkot_after","",time()+3600, '/');
				setcookie("list_tour_attr","",time()+3600, '/');
				setcookie("list_pic_thumbnail","",time()+3600, '/');
				setcookie("halteAwal",$this->input->post('mydropdown'),time()+3600, '/');
				header("Location:".base_url()."trip/recommendation");
			}
			else
			{
				//  kalau input salah
					header("Location:".base_url()."searchCtr/inputSalah");
			
			}
			
			
			
		}

		public function inputSalah()
		{
			$this->load->model('HalteManager');
			$this->load->helper('cookie');
			$data['query'] = $this->HalteManager->getAllHalte();
			
			
			/*----------editan wildan----------
			$this->user = $this->facebook->getUser();
			if($this->user)
			{

				$data['user_profile'] = $this->facebook->api('/me/');
				$first_name = $data['user_profile']['first_name'];
				$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
				if(get_cookie('username')!=null)
				{
					$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Wrong input. Please try again.</center>'));
					redirect('home');
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
				$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Wrong input. Please try again.</center>'));
				redirect('home');
			}
			-----------end of editan wildan-------*/
			$this->session->set_flashdata('form', array('message' => '<center><b>Oops!</b> Wrong input. Please try again.</center>'));
			redirect('home');
			// $this->load->view('header');
			// $this->load->view('homeUISalah',$data);
			// $this->load->view('footer');
		}
		public function setVariable($halte, $budget)
		{
			$this->load->helper('cookie');
		//	setcookie("datechoosen",$this->input->post('datepicker'),time()+3600, '/');
			setcookie("halte_code",$halte,time()+3600, '/');
			setcookie("budget",$budget,time()+3600, '/');
			header("Location:".base_url()."searchCtr/searchWithinBudget");
		}
		public function cobaInput()
		{
			$this->load->model('tesModel');
			$data['query'] = $this->tesModel->getAllHalte();
			$this->load->view('cobaInputUI', $data);
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

		public function searchwisataCatLocKey($category_name=NULL, $city=NULL, $place_name=NULL)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('searchMod');
			$this->load->model('touristAttractionManager');
			$data['query'] = $this->touristAttractionManager->getAllTour1($data);
			$counter = 0;
			// foreach($data['query'] as $row)
			// {
			// 	if($row->category_name == $)
			// }
		//	$data['query'] = $this->searchMod->filterModFinal($category_name, $city, $place_name);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);
		}
		
			public function searchwisataCat($category_name=NULL)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('searchMod');
			$data['query'] = $this->searchMod->filterMod($category_name);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);
		}
		
			public function searchwisataLoc($city=NULL)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('searchMod');
			$data['query'] = $this->searchMod->filterMod2($city);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);
		}
		
			public function searchwisataKey($place_name=NULL)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('searchMod');
			$data['query'] = $this->searchMod->filterMod3($place_name);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);
		}


	}	
?>
