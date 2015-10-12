<?php

	class AllplacesMod extends CI_Model {

		function showallplaces()
		{
			$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction'); 
			//$this->db->join('rating', 'member.username = rating.username');
			$query = $this->db->get();
			return $query->result();
		}
		
		function showallplacescategory($category_name)
		{
			$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction');
			$this->db->join('tour_category', 'tour_category.place_name = tourist_attraction.place_name');
			//$this->db->join('rating', 'member.username = rating.username');
			$category_name = str_replace("%20", " ",$category_name);
			if((string)$category_name != "" and $category_name !="All"){
				$this->db->where('category_name', $category_name);
			}
			$query = $this->db->get();
			return $query->result();
		}

		function filterMod2($city)
		{
			
			$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction'); 
			$city= str_replace("%20", " ",$city);
			if((string)$city != ""){
				$this->db->where('city', $city);
			} 			
			$query = $this->db->get(); 
            return $query->result(); 
		}
		
		function filterMod1($category_name,$place_name)
		{
			
			$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction');
			$this->db->join('tour_category', 'tour_category.place_name = tourist_attraction.place_name');
			$category_name = str_replace("%20", " ",$category_name);
			$place_name= str_replace("%20", " ",$place_name);
			if((string)$category_name != "" and $category_name !="All"){
				$this->db->where('category_name', $category_name);
			} 			
			if((string)$place_name != ""){
				$this->db->like('tourist_attraction.place_name', $place_name);
			}
			$query = $this->db->get(); 
            return $query->result(); 
		}

			function filterModFinal($category_name, $city, $place_name)
		{
			
			$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction'); 
			$this->db->join('tour_category', 'tour_category.place_name = tourist_attraction.place_name');
            //$this->db->join('photo', 'photo.place_name = tour_category.place_name');
			$category_name = str_replace("%20", " ",$category_name);
			$city= str_replace("%20", " ",$city);
			$place_name= str_replace("%20", " ",$place_name);
			if((string)$category_name != "" and $category_name !="All"){
				$this->db->where('category_name', $category_name);
			} 
			if((string)$city != ""and $city !="All"){
				$this->db->where('city', $city);
			} 
			if((string)$place_name != ""){
				$this->db->like('tourist_attraction.place_name', $place_name);
			} 			
			$query = $this->db->get(); 
            return $query->result_array(); 
		}
		
		function getAllTourAttr() {
		
        $query = $this->db->query('select * from tourist_attraction');
        return $query->result();
    }
	
	function getAllTourAttrPopular($category_name, $city, $place_name) {
			$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction'); 
			$this->db->join('tour_category', 'tour_category.place_name = tourist_attraction.place_name');
            //$this->db->join('photo', 'photo.place_name = tour_category.place_name');
			$category_name = str_replace("%20", " ",$category_name);
			$city= str_replace("%20", " ",$city);
			$place_name= str_replace("%20", " ",$place_name);
			if((string)$category_name != "" and $category_name !="All"){
				$this->db->where('category_name', $category_name);
			} 
			if((string)$city != ""and $city !="All"){
				$this->db->where('city', $city);
			} 
			if((string)$place_name != ""){
				$this->db->like('tour_category.place_name', $place_name);
			}
			 $this->db->order_by('tourist_attraction.hits asc'); 
		$query = $this->db->get(); 
        return $query->result(); 
    }
	
	function getAllTourAttrHighestRate($category_name, $city, $place_name) {
			$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction'); 
			$this->db->join('tour_category', 'tour_category.place_name = tourist_attraction.place_name');
            //$this->db->join('photo', 'photo.place_name = tour_category.place_name');
			$category_name = str_replace("%20", " ",$category_name);
			$city= str_replace("%20", " ",$city);
			$place_name= str_replace("%20", " ",$place_name);
			if((string)$category_name != "" and $category_name !="All"){
				$this->db->where('category_name', $category_name);
			} 
			if((string)$city != ""and $city !="All"){
				$this->db->where('city', $city);
			} 
			if((string)$place_name != ""){
				$this->db->like('tour_category.place_name', $place_name);
			}
			 $this->db->order_by('tour_attraction.rate_avg desc'); 
		$query = $this->db->get(); 
        return $query->result();
    }
	
	function getAllTourAttrSortAtoZ($category_name, $city, $place_name) {
		$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction'); 
			$this->db->join('tour_category', 'tour_category.place_name = tourist_attraction.place_name');
            //$this->db->join('photo', 'photo.place_name = tour_category.place_name');
			$category_name = str_replace("%20", " ",$category_name);
			$city= str_replace("%20", " ",$city);
			$place_name= str_replace("%20", " ",$place_name);
			if((string)$category_name != "" and $category_name !="All"){
				$this->db->where('category_name', $category_name);
			} 
			if((string)$city != ""and $city !="All"){
				$this->db->where('city', $city);
			} 
			if((string)$place_name != ""){
				$this->db->like('tour_category.place_name', $place_name);
			} 			 
        $this->db->order_by('tour_category.place_name asc'); 
		$query = $this->db->get(); 
        return $query->result();
    }
	
	function getAllTourAttrSortZtoA($category_name, $city, $place_name) {
		$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction'); 
			$this->db->join('tour_category', 'tour_category.place_name = tourist_attraction.place_name');
            //$this->db->join('photo', 'photo.place_name = tour_category.place_name');
			$category_name = str_replace("%20", " ",$category_name);
			$city= str_replace("%20", " ",$city);
			$place_name= str_replace("%20", " ",$place_name);
			if((string)$category_name != "" and $category_name !="All"){
				$this->db->where('category_name', $category_name);
			} 
			if((string)$city != ""and $city !="All"){
				$this->db->where('city', $city);
			} 
			if((string)$place_name != ""){
				$this->db->like('tourist_attraction.place_name', $place_name);
			} 			
       $query = $this->db->order_by('tour_category.place_name desc'); 
	   $query = $this->db->get(); 
        return $query->result();
    }
	
	function getAllTourAttrSortHighToLow($category_name, $city, $place_name) {
					$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction'); 
			$this->db->join('tour_category', 'tour_category.place_name = tourist_attraction.place_name');
            //$this->db->join('photo', 'photo.place_name = tour_category.place_name');
			$category_name = str_replace("%20", " ",$category_name);
			$city= str_replace("%20", " ",$city);
			$place_name= str_replace("%20", " ",$place_name);
			if((string)$category_name != "" and $category_name !="All"){
				$this->db->where('category_name', $category_name);
			} 
			if((string)$city != ""and $city !="All"){
				$this->db->where('city', $city);
			} 
			if((string)$place_name != ""){
				$this->db->like('tour_category.place_name', $place_name);
			}
			 $this->db->order_by('tourist_attraction.weekday_price desc'); 
		$query = $this->db->get(); 
        return $query->result();
    }
	
	function getAllTourAttrSortLowToHigh($category_name, $city, $place_name) {
					$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction'); 
			$this->db->join('tour_category', 'tour_category.place_name = tourist_attraction.place_name');
            //$this->db->join('photo', 'photo.place_name = tour_category.place_name');
			$category_name = str_replace("%20", " ",$category_name);
			$city= str_replace("%20", " ",$city);
			$place_name= str_replace("%20", " ",$place_name);
			if((string)$category_name != "" and $category_name !="All"){
				$this->db->where('category_name', $category_name);
			} 
			if((string)$city != ""and $city !="All"){
				$this->db->where('city', $city);
			} 
			if((string)$place_name != ""){
				$this->db->like('tour_category.place_name', $place_name);
			}
			 $this->db->order_by('tourist_attraction.weekday_price asc'); 
		$query = $this->db->get(); 
        return $query->result();
    }
	
	function getAllTourAttrHighetRating($category_name, $city, $place_name) {
					$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction'); 
			$this->db->join('tour_category', 'tour_category.place_name = tourist_attraction.place_name');
            //$this->db->join('photo', 'photo.place_name = tour_category.place_name');
			$category_name = str_replace("%20", " ",$category_name);
			$city= str_replace("%20", " ",$city);
			$place_name= str_replace("%20", " ",$place_name);
			if((string)$category_name != "" and $category_name !="All"){
				$this->db->where('category_name', $category_name);
			} 
			if((string)$city != ""and $city !="All"){
				$this->db->where('city', $city);
			} 
			if((string)$place_name != ""){
				$this->db->like('tour_category.place_name', $place_name);
			}
			 $this->db->order_by('tourist_attraction.rate_avg asc'); 
		$query = $this->db->get(); 
        return $query->result();
    }
	
	function filterSliderMod($min, $max,$category_name,$city,$place_name)
		{
			
			$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction'); 
			$this->db->join('tour_category', 'tour_category.place_name = tourist_attraction.place_name');
			$category_name = str_replace("%20", " ",$category_name);
			$city= str_replace("%20", " ",$city);
			$place_name= str_replace("%20", " ",$place_name);
	
			if((int)$min > 0){
				$this->db->where('weekend_price >',$min);
			} 

			if((int)$max > 0){
			$this->db->where('weekend_price <' ,$max);
			}
			if((string)$category_name != "" and $category_name !="All"){
				$this->db->where('category_name', $category_name);
			} 
			if((string)$city != ""and $city !="All"){
				$this->db->where('city', $city);
			} 
			if((string)$place_name != ""){
				$this->db->like('tourist_attraction.place_name', $place_name);
			} 		
			
			$query = $this->db->get(); 
            return $query->result(); 
		}
		
	}
?>