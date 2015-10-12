<?php

	class halteManager extends CI_Model {
	
		function getDatabaseWithinBudget($budget)
		{
			$budgetInt = intval($budget);
			$this->load->database();
			$query = $this->db->get_where('tourist_attraction', array('weekday_price <=' => $budgetInt));		
			return $query->result();
		}

		function getHalteCode($data)
		{ 
			$this->load->database();
			$query = $this->db->get_where('halte', array('halte_name = ' => $data['halte']))->row()->halte_code;
			return $query;
			// $hasil = $query->row_array();
			// $kodehalte= $hasil['halte_code'];
						
			// $condition = "(halte_code = '".$kodehalte."' AND weekday_price <=  ".$budgetInt.") OR weekday_price <=".($budgetInt+3500)."";
			// $query = $this->db->select("*")->from('tourist_attraction')->where($condition)->get();
			// return $query->result();
		}

		function getAllHalte()
		{
			$this->load->database();
			$query = $this->db->select("*")->from('halte')->get();
			return $query->result();
		}


		public function sorthalte(){
			$this->load->database();
			$this->db->select('*');
			$this->db->select('SUBSTRING(halte_code, 1, 3) as koridor', FALSE);
            $this->db->from('halte'); 
            $this->db->order_by('koridor, halte_name asc');
			$query = $this->db->get(); 
        	return $query->result();
		}

		public function haltecode(){
            $kodekoridor = $this->db->select('SUBSTRING(halte_code, 1, 3) as koridor', FALSE)->from('halte')->get();
        	return $kodekoridor->result();
		}

		
	}
?>