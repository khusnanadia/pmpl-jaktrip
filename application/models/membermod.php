<?php

	class memberMod extends CI_Model {

		function showallmember()
		{
			$this->load->database();
			$this->db->select('*');
            $this->db->from('member'); 
			//$this->db->join('rating', 'member.username = rating.username');
			$query = $this->db->get();
			return $query->result();
		}
		
		function delete($name){
			$this ->load->database();
			$this->db->delete('member', array('username' => $name));

		}
		
			function filterMod3($place_name)
		{
			
			$this->load->database();
			$this->db->select('*');
            $this->db->from('member'); 
			$place_name= str_replace("%20", " ",$place_name);
			if((string)$place_name != ""){
				$this->db->like('username', $place_name);
			} 			
			$query = $this->db->get(); 
            return $query->result(); 
		}
		
			function filterMod5($place_name)
		{
			
			$this->load->database();
			$this->db->select('*');
            $this->db->from('member'); 
			$place_name= str_replace("%20", " ",$place_name);
			if((string)$place_name != ""){
				$this->db->like('username', $place_name,'after');
			} 			
			$query = $this->db->get(); 
            return $query->result(); 
		}
		
		function create ($form_data){
			$this->load->database();
			$this->db->insert('member', $form_data);
			if ($this->db->affected_rows() == '1'){
				return TRUE;
			}
			return FALSE;
		}
	}
?>