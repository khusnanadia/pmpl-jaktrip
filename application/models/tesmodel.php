<?php

	class tesModel extends CI_Model {
	
		function getDatabase()
		{
			$this->load->database();
			$query = $this->db->select("*")->from('tourist_attraction')->get();
			return $query;                            
		}
		
		function getAllDatabase()
		{
			$this->load->database();
			$query = $this->db->select("*")->from('tourist_attraction')->get();
			return $query->result(); 
		}
		function getDatabaseWithinBudget($budget)
		{
			$budgetInt = intval($budget);
			$this->load->database();
			$query = $this->db->get_where('tourist_attraction', array('weekday_price <=' => $budgetInt));		
			return $query->result();
		}
		function validasiLogin($data)
		{
			$this->load->database();
			$condition = "(username = '".$data['nameORemail']."' OR email = '".$data['nameORemail']."') AND password= '".$data['password']."'";
			$query = $this->db->select("*")->from('member')->where($condition)->get();

			if($query->num_rows() == 1)
			{
				return $query->row_array();
			}
			else
			{
				return false;
			}
		}

		function getAllHalte()
		{
			$this->load->database();
			$query = $this->db->select("*")->from('halte')->get();
			return $query->result();
		}
	}
?>