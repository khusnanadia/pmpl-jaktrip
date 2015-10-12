<?php

	class DetailMod extends CI_Model {

		function showdetail($name)
		{
			$this->load->database();
			$name = str_replace("%20"," ",$name);
            $query = $this->db->get_where('tourist_attraction AS ta', array('ta.place_name' => $name));
			//$this->db->join('rating', 'member.username = rating.username');
			return $query->result();
		}
		
		function showphoto($name)
		{
			$this->load->database();
			$name = str_replace("%20"," ",$name);
            $query = $this->db->get_where('photo', array('place_name' => $name));
			//$this->db->join('rating', 'member.username = rating.username');
			return $query->result();
		}
		
		function isValid($name)
		{
			$this->load->database();
			$name = str_replace("%20"," ",$name);
			$query = $this->db->get_where('tourist_attraction', array('place_name' => $name));
			if($query->num_rows() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
			
		}
		
	}
?>