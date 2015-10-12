<?php



	class StatisticManager extends CI_Model {



		function getstatistic()

		{

			$this->load->database();

			$this->db->select('place_name,visitors');

            $this->db->from('tourist_attraction');
            $this->db->order_by("place_name", "asc");
			$query = $this->db->get(); 

			return $query->result();

		}

		

		function getstatisticrating()

		{

			$this->load->database();

			$this->db->select('rate_avg, count(rate_avg)');

            $this->db->from('tourist_attraction');

			$this->db->group_by("rate_avg");

			$this->db->order_by("rate_avg", "ASC");

			$query = $this->db->get(); 

			return $query->result();

		}

		

		function getstatisticbudget()

		{

			$this->load->database();

			$this->db->select('lower_nom,upper_nom,input_num');

            $this->db->from('budget');

			$query = $this->db->get(); 

			return $query->result();

		}

	}

?>