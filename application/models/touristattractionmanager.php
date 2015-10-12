<?php

class TouristAttractionManager extends CI_Model{



	function __construct(){

  		parent::__construct();

  		$this->load->helper('url');		

  		// $this->load->database();		

 	}

 	

	function SaveForm($form_data, $form_cat)

	{

		

		$place_name=$form_cat['place_name'];

		$category_new=$form_cat['category_new'];

		

		$this->db->insert('tourist_attraction', $form_data);

		

		

		foreach($form_cat['category_list'] as $selected){

			if($selected != ''){

				$this->db->insert('tour_category', array('place_name'=>$place_name, 'category_name'=>$selected));

			}

			else{

				if($category_new != ''){

					$this->db->insert('category', array('category_name'=>$category_new));		

					$this->db->insert('tour_category', array('place_name'=>$place_name, 'category_name'=>$category_new));

				}	

			}



		}

		//$this->db->insert('tour_category', $form_cat);

		

		if ($this->db->affected_rows() == '1')

		{

			return TRUE;

		}

		return FALSE;

	}

	

	function save_pic_thumbnail($id, $form_photo){

		$pic_thumb = array('pic_thumbnail'=>$form_photo['pic']);

		$this->db->where('id',$id);

		$this->db->update('tourist_attraction',$pic_thumb);

		if($this->db->affected_rows()=='1'){

			$this->db->insert('photo', $form_photo);		

			if($this->db->affected_rows()=='1'){

				return true;

			}

		}



	}

	

	function tourAttr_getall(){

		$this->load->database();

		//$myQueryString = "set search_path to '1206277520'";

		//$this->db->query($myQueryString);

		//$query =$this->db->select('*')

          //       ->from('tourist_attraction ta')

            //     ->join('tour_category tc','ta.place_name = tc.place_name')

              //   ->get();

		//$quer = "select * from tourist_attraction ta left outer join tour_category tc on ta.place_name=tc.place_name";

		//$query = $this->db->query($quer);

		$query = $this->db->get('tourist_attraction');

		//$query2 = $this->db->get('tour_category');

		return $query->result();

	}	



	function tourAttr_get($place_name){

		$this->load->database();

		

		//echo $place_name;

		

		//$quer = "SELECT * FROM tourist_attraction WHERE place_name = $place_name";

		//$query = $this->db->query($quer);

		$query = $this->db->get_where('tourist_attraction', array('place_name'=>$place_name));

		//$query = $this->db->from($this->'tourist_attraction')->where(array(('place_name')=>$place_name))->get();

		return $query->row_array();

		//return $query->result();

	}



	function delete($place_name){

		$this->load->database();

		//$myQueryString = "set search_path to '1206277520'";

		//$this->db->query($myQueryString);

		$this->db->delete('tourist_attraction', array('place_name' => $place_name));

	}



	function edit($place_name, $form_data, $form_photo, $form_cat){

		$this->load->database();

		

		//$myQueryString = "set search_path to '1206277520'";

		//$this->db->query($myQueryString);

		//$this->db->where($place_name,$this->input->post($place_name));

		//echo $place_name;



		$this->db->where('place_name',$place_name);

		$this->db->update('tourist_attraction',$form_data);

		if($form_photo!=NULL){

			$this->db->insert('photo', $form_photo);			

		}



		//$this->db->where('place_name',$place_name);

		//$this->db->update('tour_category',$x);

		

		

		//foreach($form_cat['category_list'] as $selected){

			//	echo $selected;

			//}

		//$old_cat = $this->tourAttr_getCat($place_name);
		
		$form_cat['category_old'] = [];
		$old_cat = $form_cat['category_old'];
		// die($old_cat);
		foreach($old_cat as $old){

			$is_exists=FALSE;

			foreach($form_cat['category_list'] as $selected){

				if($old->category_name==$selected){

					$is_exists=TRUE;

				}

			}

			if($is_exists==FALSE){

				$this->db->delete('tour_category', array('place_name'=>$place_name, 'category_name'=>$old->category_name));

			}

		}

		

		$category_new = $form_cat['category_new'];

		//$place_name=$form_cat['place_name'];

		foreach($form_cat['category_list'] as $selected){

			if($selected != ''){

				$quer = $this->db->get_where('tour_category', array('place_name'=>$form_cat['place_name'], 'category_name'=>$selected));

				//echo $quer;

				//if not exists

				if($quer->num_rows==0){

					$this->db->insert('tour_category', array('place_name'=>$form_cat['place_name'], 'category_name'=>$selected));

				}

				//$query="insert into TOUR_CATEGORY' where not exists (select * from TOUR_CATEGORY where place_name==$place_name"

				

				//$this->db->insert('tour_category', array('place_name'=>$place_name, 'category_name'=>$selected));

			}

			else{

				if($category_new != ''){

					$this->db->insert('category', array('category_name'=>$category_new));		

					$this->db->insert('tour_category', array('place_name'=>$form_cat['place_name'], 'category_name'=>$category_new));

				}	

			}



		}

		

		

		



		//if ($this->db->affected_rows() == '0')

		//{

			return TRUE;

		//}

		//return FALSE;

	}

	

	

	

	

	function general(){

  		//$this->load->library('WebMenu');

  		//$menu = new WebMenu;

		//$data['base'] = $this->config->item('base_url');

		//$data['css'] = $this->config->item('css');

  		//$data['menu'] = $menu->show_menu();



		return $data;					  		

 	}



 	function updateVisitor($place_name, $data){

 		$this->load->database();

 		$this->db->where('place_name',$place_name);

		$this->db->update('tourist_attraction', $data);

 	}

	function getVisitors($data){

		$this->load->database();

		$this->db->select('visitors');

        $this->db->from('tourist_attraction');

        $this->db->where('place_name', $data);

        $query = $this->db->get();

        return $query->result();

	}

	function getVisitorsFromCollection($place_name){

		$this->load->database();

		$condition = "place_name ='".$place_name."' AND is_visited=1";

		$this->db->select('*');

		$this->db->from('collection');

		$this->db->where($condition);

		$query = $this->db->get();

		return $query->result();

	}



	function getCategory(){

		$this->load->database();

		$query = $this->db->get('category');

		return $query->result();

	}

	function getTouristAttraction(){

		$this->load->database();

		$query = $this->db->select("*")->from('tourist_attraction')->get();

		return $query;

	}

	function getAdmin(){

		$this->load->database();

		$query = $this->db->get_where('member', array('is_admin'=>'1'));

			return $query->result();

	}



	function getHalte(){

		return $this->db->order_by('halte_name','asc')->get('halte');

	}



	function gethaltekode($haltename){

		$this->load->database();

		$query = $this->db->get_where('halte', array('halte_name' => $haltename));

		return $query->row('halte_code');

	}

	

	function tourAttr_getCat($place_name){

		//return $this->db->get_where('tour_category');

		$query = $this->db->get_where('tour_category', array('place_name'=>$place_name));

		//return $query->row_array();

		return $query->result();

	}

	

	function tourAttr_getPic($place_name){

		//return $this->db->get_where('tour_category');

		$query = $this->db->get_where('photo', array('place_name'=>$place_name));

		return $query->row_array();

	}

	function tourAttr_getHalte($place_name){

		//return $this->db->get_where('tour_category');

		$code = $this->db->get_where('tourist_attraction', array('place_name'=>$place_name))->row_array();

		$halte = $this->db->get_where('halte', array('halte_code'=>$code['halte_code']));

		return $halte->row_array();

	}

	function getHalteCode($halte_name){

		//return $this->db->get_where('tour_category');

		$halte = $this->db->get_where('halte', array('halte_name'=>$halte_name));

		return $halte->row_array();

	}

	





	//----di comment dulu... kayaknya ga penting ---------------



	// function getDatabaseWithinBudget($budget)

	// 	{

	// 		$budgetInt = intval($budget);

	// 		$this->load->database();

	// 		$query = $this->db->get_where('tourist_attraction', array('weekday_price <=' => $budgetInt));		

	// 		return $query->result();

	// 	}



		//----di comment dulu... kayaknya ga penting ---------------



		// function getDatabaseWithinBudgetandHalteWeekday($data)

		// {

		// 	$this->load->database();

		// 	$budgetInt = intval($data['budget']); 

		// //	$query = $this->db->get_where('halte', array('halte_name = ' => $data['halte']));

		// //	return $query->row_array();

		// //	$hasil = $query->row_array();

		// 	$halte_name= $data['halte_name'];

						

		// 	$condition = "(halte_name = '".$data['halte_name']."' AND weekday_price + transport_price <=  ".$budgetInt.") OR weekday_price + transport_price <=".($budgetInt-3500)."";

		// 	$query = $this->db->select("*")->from('tourist_attraction')->join('halte', 'halte.halte_code = tourist_attraction.halte_code')->where($condition);

		// 	$query = $this->db->get();

		// 	return $query->result();	

		// }



		//----di comment dulu... kayaknya ga penting ---------------



		// function getDatabaseWithinBudgetandHalteWeekend($data)

		// {

		// 	$this->load->database();

		// 	$budgetInt = intval($data['budget']); 

		// //	$query = $this->db->get_where('halte', array('halte_name = ' => $data['halte']));

		// //	return $query->row_array();

		// //	$hasil = $query->row_array();

		// 	$halte_name= $data['halte_name'];

						

		// 	$condition = "(halte_name = '".$data['halte_name']."' AND weekend_price + transport_price <=  ".$budgetInt.") OR weekend_price + transport_price <=".($budgetInt-3500)."";

		// 	$query = $this->db->select("*")->from('tourist_attraction')->join('halte', 'halte.halte_code = tourist_attraction.halte_code')->where($condition);

		// 	$query =$this->db->get();

		// 	return $query->result();

		// }



		//----di comment dulu... kayaknya ga penting ---------------



		// function getDatabaseWithinBudgetandHalteWeekday2($data)

		// {

		// 	$this->load->database();

		// 	$budgetInt = intval($data['budget']); 

		// //	$query = $this->db->get_where('halte', array('halte_name = ' => $data['halte']));

		// //	return $query->row_array();

		// //	$hasil = $query->row_array();

			

						

		// 	$condition = "(weekday_price <=  ".$budgetInt.")";

		// 	$query = $this->db->select("*")->from('tourist_attraction')->join('halte', 'halte.halte_code = tourist_attraction.halte_code');

		// 	$query = $this->db->get();

		// 	return $query->result();	

		// }



		//----di comment dulu... kayaknya ga penting ---------------

		

		// function getDatabaseWithinBudgetandHalteWeekend2($data)

		// {

		// 	$this->load->database();

		// 	$budgetInt = intval($data['budget']); 

		// //	$query = $this->db->get_where('halte', array('halte_name = ' => $data['halte']));

		// //	return $query->row_array();

		// //	$hasil = $query->row_array();

			

						

		// 	$condition = "(weekend_price <=  ".$budgetInt.")";

		// 	$query = $this->db->select("*")->from('tourist_attraction')->join('halte', 'halte.halte_code = tourist_attraction.halte_code')->where($condition);

		// 	$query = $this->db->get();

		// 	return $query->result();

		// }



		function getDetail($data)

		{

			$this->load->database();

			$tourAttrChoosen = $data['tourAttr'];



			$condition = "place_name = '".$tourAttrChoosen."'";

			$query = $this->db->select("*")->from('tourist_attraction')->where($condition);

			$query = $this->db->get();

			return $query->result();

		}



		function getAllTourInitial($data)

		{

			$this->load->database();

			

			$query = $this->db->select("*")->from('tourist_attraction')->join('halte', 'halte.halte_code = tourist_attraction.halte_code');



		//	$query = $this->db->join('photo', ' tourist_attraction.id_pic =  photo.id_pic ', 'left outer');

			$query = $this->db->get();

			$result['result'] = $query->result();

			$counter = 0;

			foreach($result['result'] as $row)

			{

				$hargaAngkot = $row->transport_price;

				if($data['isWeekend']=="true")

				{

					$hargaTempatWisasta = $row->weekend_price;

				}

				else

				{

					$hargaTempatWisasta = $row->weekday_price;

				}

				

				$hargaBusway = 3500;

				if($data['halte_name'] == $row->halte_name)

				{

					$hargaBusway = 0; 

				}

				$result['harga'][$counter]= $hargaAngkot + $hargaTempatWisasta + $hargaBusway;

				$result['hargaBusway'][$counter] = $hargaBusway;

				$counter++;

			}

			return $result;

		}



		function getAllTourInAdd($data)

		{

			$this->load->database();

			$query = $this->db->select("*")->from('tourist_attraction')->join('halte', 'halte.halte_code = tourist_attraction.halte_code');

			$query = $this->db->get();

			$result['result'] = $query->result();

			$counter = 0;

			$tempatWisataTerpilih = explode("xx",$data["place_name"]);

			$dataHalteName = explode("xx",$data["halte_name"])[$data['idx_last_trip']];

			$dataPlaceInfo = explode("xx",$data['place_info'])[$data['idx_last_trip']];



			foreach ($result['result'] as $row) {

				# code...

				$hargaAngkotSebelum = intval(explode("xx",$data["angkot_price"])[$data['idx_last_trip']]);

				$hargaAngkotSetelah = $row->transport_price;

				if($data['isWeekend']=="true")

				{

					$hargaTempatWisasta = $row->weekend_price;

				}

				else

				{

					$hargaTempatWisasta = $row->weekday_price;

				}



				$hargaBusway = 3500;

			//	echo $dataHalteName." ".$row->halte_name;

				if($dataHalteName== $row->halte_name)

				{

					

					$hargaBusway = 0;

				}

				if($dataPlaceInfo==$row->place_info && $dataPlaceInfo!="")

				{

					// if($row->place_name == "Kota Tua")

					// {

					// 	return $row->halte_name;

					// }

					$hargaBusway = 0;

					$hargaAngkotSebelum=0;

					$hargaAngkotSetelah=0;

				}

				$result['hargaAngkotSebelum'][$counter]= $hargaAngkotSebelum;

				$result['hargaAngkotSetelah'][$counter]= $hargaAngkotSetelah;

				$result['hargaBusway'][$counter]= $hargaBusway;

				$result['harga'][$counter]= $hargaAngkotSebelum + $hargaBusway+  $hargaAngkotSetelah + $hargaTempatWisasta;

				$result['sudahDipilih'][$counter]= false;

				for($i=0; $i<count($tempatWisataTerpilih); $i++)

				{

					if($tempatWisataTerpilih[$i]==$row->place_name)

					{

						$result['sudahDipilih'][$counter]= true;

					}

				}

				$counter++;

				

			}



			return $result;

		}



		// function showAfterDelete()

		// {

		// 	$this->load->database();

		// 	$query = $this->db->select("*")->from('tourist_attraction')->join('halte', 'halte.halte_code = tourist_attraction.halte_code');

		// 	$query = $this->db->get();

		// 	$result['result'] = $query->result();

		// 	$counter = 0;

		// 	$tempatWisataTerpilih = explode("xx",$data["place_name"]);

		// 	$dataHalteName = explode("xx",$data["place_name"])[$data['idx_last_trip']];

		// 	$dataPlaceInfo = explode("xx",$data['place_info'])[$data['idx_last_trip']];



		// 	foreach ($result['result'] as $row) {

		// 		# code...

		// 		$hargaAngkotSebelum = intval(explode("xx",$data["angkot_price"])[$data['idx_last_trip']]);

		// 		$hargaAngkotSetelah = $row->transport_price;

		// 		$hargaTempatWisasta = $row->weekday_price;

		// 		$hargaBusway = 3500;

				

		// 		if($dataHalteName== $row->halte_name)

		// 		{

					

		// 			$hargaBusway = 0;

		// 		}

		// 		if($dataPlaceInfo==$row->place_info && $dataPlaceInfo!="")

		// 		{

		// 			// if($row->place_name == "Kota Tua")

		// 			// {

		// 			// 	return $row->halte_name;

		// 			// }

		// 			$hargaBusway = 0;

		// 			$hargaAngkotSebelum=0;

		// 			$hargaAngkotSetelah=0;

		// 		}

		// 		$result['hargaAngkotSebelum'][$counter]= $hargaAngkotSebelum;

		// 		$result['hargaAngkotSetelah'][$counter]= $hargaAngkotSetelah;

		// 		$result['hargaBusway'][$counter]= $hargaBusway;

		// 		$result['harga'][$counter]= $hargaAngkotSebelum + $hargaBusway+  $hargaAngkotSetelah + $hargaTempatWisasta;

		// 		$result['sudahDipilih'][$counter]= false;

		// 		for($i=0; $i<count($tempatWisataTerpilih); $i++)

		// 		{

		// 			if($tempatWisataTerpilih[$i]==$row->place_name)

		// 			{

		// 				$result['sudahDipilih'][$counter]= true;

		// 			}

		// 		}

		// 		$counter++;

				

		// 	}



		// 	return $result;

		// }



		function insertBudget($budget){

			$this->load->database();

			$query="update budget SET input_num = input_num + 1 where lower_nom < '".$budget. "' and upper_nom >= '".$budget."';";

			$this->db->query($query);

			return ($this->db->affected_rows() > 0);

		}

		

		function filterMod3($place_name)

		{

			

			$this->load->database();

			$this->db->select('*');

            $this->db->from('tourist_attraction'); 

			$place_name= str_replace("%20", " ",$place_name);

			if((string)$place_name != ""){

				$this->db->like('place_name', $place_name);

			} 			

			$query = $this->db->get(); 

            return $query->result(); 

		}

		

		function filterMod5($place_name)

		{

			

			$this->load->database();

			$this->db->select('*');

            $this->db->from('tourist_attraction'); 

			$place_name= str_replace("%20", " ",$place_name);

			if((string)$place_name != ""){

				$this->db->like('place_name', $place_name,'after');

			} 			

			$query = $this->db->get(); 

            return $query->result(); 

		}



		function getID($data)

		{

			/*@author wildan*/

			$this->load->database();

			$condition = "place_name = '".$data."'";

			$this->db->select('id');

            $query = $this->db->from('tourist_attraction')->where($condition)->get();

			

			return $query->result_array();

			



		}

		function getPlaceNameFromID($data)

		{

			/*@author wildan*/

			$this->load->database();

			$condition = "id = '".$data."'";

			$this->db->select('*');

            $query = $this->db->from('tourist_attraction')->where($condition)->get();

			

			return $query->row_array();

		}



		function mostPopular(){

			$this->load->database();

			$query = $this->db->select("*")->from('tourist_attraction')->order_by("visitors", "desc")->limit('3')->get();

	   		return $query->result();

		}
		function incrementVisitor($data)
		{
			/*@author wildan*/
			$this->load->database();
			$condition = "id = '".$data."'";
			$this->db->where($condition);
			$this->db->set('visitors', 'visitors+1', FALSE);
			$this->db->update('tourist_attraction');
		}

		function decrementVisitor($data)
		{
			/*@author wildan*/
			$this->load->database();
			$condition = "id = '".$data."'";
			$this->db->where($condition);
			$this->db->set('visitors', 'visitors-1', FALSE);
			$this->db->update('tourist_attraction');
		}

}

?>