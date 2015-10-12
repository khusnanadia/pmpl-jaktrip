<?php

	class searchMod extends CI_Model {

		/*function showallwisata()
		{
			$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction'); 
			$this->db->join('tour_category', 'tour_category.place_name = tourist_attraction.place_name');
			$query = $this->db->get(); 
			return $query->result();
		}*/
		
		function showallwisata()
		{
			$this->load->database();
			
			$this->db->select('*');
			$this->db->from('tourist_attraction');
			$this->db->join('tour_category', 'tour_category.place_name = tourist_attraction.place_name');
			$this->db->join('photo', 'photo.place_name = tour_category.place_name');
			$query = $this->db->get();
			return $query->result();	
		}
		
		function showallcategory()
		{
			$this->load->database();
			$this->db->select('category_name');
			$this->db->from('tour_category');
			$this->db->distinct();
			$query = $this->db->get();
			return $query->result();
		}
		
		function showalllocation()
		{
			$this->load->database();
			$this->db->select('city');
			$this->db->from('tourist_attraction');
			$this->db->distinct();
			$query = $this->db->get();
			return $query->result();
		}
		
		function showallhalte()
		{
			$this->load->database();
			$this->db->select('halte_name');
			$this->db->from('halte');
			$this->db->order_by("halte_name", "asc"); 
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
		
		function filterMod($category_name)
		{
			
			$this->load->database();
			$this->db->select('*');
			$this->db->from('tour_category'); 
            //$this->db->from('tourist_attraction'); 
			//$this->db->join('tour_category', 'tour_category.place_name = tourist_attraction.place_name');
            //$this->db->join('photo', 'photo.place_name = tour_category.place_name');
			$category_name = str_replace("%20", " ",$category_name);
			if((string)$category_name != ""){
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
	}
?>