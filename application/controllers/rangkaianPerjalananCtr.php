<?php 

	class rangkaianPerjalananCtr extends CI_Controller
	{
		public function index()
		{
		//	echo "haha";
			// $this->load->helper('form');
			$this->load->model('touristAttractionManager');
			$this->load->helper('cookie');
			$data['halte_name'] = "Taman Mini Garuda";
			$data['isWeekend'] = "true";
			$data['query'] = $this->touristAttractionManager->getAllTour1($data);
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
		//	echo get_cookie("counterTrip");
			$this->load->view('header');
			$this->load->view('rangkaianPerjalanan',$data);
			$this->load->view('footer');
			//echo json_encode($data);
		}

		public function deleteCookies()
		{
			$this->load->helper('cookie');
		
			setcookie("placeName", "", time()+3600, '/');
			setcookie("halteName", "", time()+3600, '/');
			setcookie("buswayPrice", "", time()+3600, '/');
			setcookie("angkotPrice", "", time()+3600, '/');
			setcookie("ticketPrice", "", time()+3600, '/');
			setcookie("totalPrice", "", time()+3600, '/');
			setcookie("transportInfo","",time()+3600, '/');
			setcookie("placeInfo", "", time()+3600, '/');
			setcookie("counterTrip", "0", time()+3600, '/');
			setcookie("idxFirstTrip", "-1", time()+3600, '/');
			setcookie("idxLastTrip", "-1", time()+3600, '/');
			echo get_cookie("counterTrip");
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

			$data['query'] = $this->touristAttractionManager->getAllTour2($data);

			echo json_encode($data);
			
		}

		public function addingTrip11()
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
			$data['query'] = $this->touristAttractionManager->getAllTour2($data);

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
				$data['query'] = $this->touristAttractionManager->getAllTour2($data);
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
				$data['query'] = $this->touristAttractionManager->getAllTour2($data);
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
				$data['query'] = $this->touristAttractionManager->getAllTour2($data);
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


		public function showTrip()
		{
			$this->load->model('touristAttrManager');
			$data['query'] = $this->touristAttrManager->getAllTour();
			
			foreach ($data['query'] as $row)
			{
				if($row->halte_name == "Ragunan")
				{
					$data['query']['temp'] = "aaa";
				}
			}
			foreach ($data['query'] as $row)
			{
				if($row->halte_name == "Ragunan")
				{
					print_r($row->query);
				}
			}
		}
	}	
?>
