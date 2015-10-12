<?php

	class SpamManager extends CI_Model {

		function showspamreview()
		{
			$this->load->database();
			$this->db->select('*');
            $this->db->from('rating');
			$this->db->where('is_nudity >', 0);
			$this->db->or_where('is_spam >', 0); 
			$this->db->or_where('is_falsestatement >', 0);
			$this->db->or_where('is_unrelatedcontent >', 0); 
			$this->db->or_where('is_profanity >', 0); 			
			$query = $this->db->get();
			return $query->result();
		}
		
		function updatespam($id, $spamreason){
		if($spamreason == 'spam'){	
		$this->db->where('id_rate', $id);
		$this->db->set('is_spam', 'is_spam+1', FALSE);
		$this->db->update('rating'); 
		/*$data = array(
               'is_spam' => 1
            );*/}
		if($spamreason == 'false_statement'){
		$this->db->where('id_rate', $id);
		$this->db->set('is_falsestatement', 'is_falsestatement+1', FALSE);
		$this->db->update('rating'); 
		/*$data = array(
               'is_falsestatement' => 1
            );*/}
		if($spamreason == 'unrelated_content'){
		$this->db->where('id_rate', $id);
		$this->db->set('is_unrelatedcontent', 'is_unrelatedcontent+1', FALSE);
		$this->db->update('rating'); 
		/*$data = array(
               'is_unrelatedcontent' => 1
            );*/}
		if($spamreason == 'profanity'){	
		$this->db->where('id_rate', $id);
		$this->db->set('is_profanity', 'is_profanity+1', FALSE);
		$this->db->update('rating'); 
		/*$data = array(
               'is_profanity' => 1
            );*/}
		if($spamreason == 'nudity'){
		$this->db->where('id_rate', $id);
		$this->db->set('is_nudity', 'is_nudity+1', FALSE);
		$this->db->update('rating'); 
		/*$data = array(
               'is_nudity' => 1
            );*/}

			//$this->db->where('id_rate', $id);
			//$this->db->update('rating', $data); 
			// Produces:
			// UPDATE mytable 
			// SET title = '{$title}', name = '{$name}', date = '{$date}'
				// WHERE id = $id
		}
		
	}
?>