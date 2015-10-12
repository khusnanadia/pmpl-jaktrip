<?php



	class ReviewModel extends CI_Model {



		function showreview()

		{

			$this->load->database();

			$this->db->select('*');

            $this->db->from('rating');			

			$query = $this->db->get();

			return $query->result();

		}



		function showreviewtempat($nama)

		{

			$this->load->database();

			$nama= str_replace("%20", " ",$nama);

			$query = $this->db->get_where('rating', array('place_name' => $nama));

			return $query->result();

		}

		
		function updaterateavg($nama)
		{
			$this->load->database();
			$nama= str_replace("%20", " ",$nama);
			
			 $this->db->select_sum('rate');

			$this->db->from('rating');
	
			$this->db->where('place_name', $nama);

			$query = $this->db->get();

			$avgrate = $query->row()->rate;
			$total = $this->db->count_all_results();

			$avgrate = round($avgrate/ $total);
			$data = array(
               'rate_avg' => $avgrate
            );
			$this->updaterateavg2($nama,$avgrate);
		}
		
		function updaterateavg2($nama,$avgrate)
		{
			$this->load->database();
			$nama= str_replace("%20", " ",$nama);
			$data = array(
               'rate_avg' => $avgrate
            );
			$this->db->where('place_name', $nama);
			$this->db->update('tourist_attraction', $data);
		}

		function showjudul($nama)

		{

			$this->load->database();

			$nama= str_replace("%20", " ",$nama);

			$query = $this->db->get_where('rating', array('place_name' => $nama),1);

			return $query->result();

		}

		

		/*function countreview($nama)

		{

			$this->load->database();

			$this->db->get_where('rating', array('username' => $nama));

			$num_results = $this->db->count_all_results();

			return $num_results->result();

		}*/

		

		function delete($id){

			$this ->load->database();

			$this->db->delete('rating', array('id_rate' => $id));



		}

	}

?>