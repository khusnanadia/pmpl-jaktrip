<?php

class SuggestionManager extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
 	function insertSuggestion($data){
	 	$this->load->database();
       	$this->db->insert('suggestion', $data);
    } 

    function showAllSuggestion()
	{
		$this->load->database();
		$this->db->select('*');
        $this->db->from('suggestion');
        $this->db->order_by('suggest_id desc'); 
		$query = $this->db->get();
		return $query->result();
	}
	
	function showAllPhotoSuggestion()
	{
		/*edited by wildan*/
		$this->load->database();
		$this->db->limit(10,0);
		$this->db->select('*');
        $this->db->from('photo')->order_by("id_pic", "desc");
        //$this->db->order_by('suggest_id desc'); 
 //       $count = $this->db->count_all_results();
		$query = $this->db->get();
		$count = $this->getAllNumRows();
 		$dataResult = $query->result();
		return array(
    		'count' => $count,
    		'dataResult' => $dataResult);
	}

	function getAllId()
	{
		/*edited by wildan*/
		$this->load->database();
		$this->db->select('*');
        $this->db->from('photo')->order_by("id_pic", "desc");
        //$this->db->order_by('suggest_id desc'); 
 //       $count = $this->db->count_all_results();
		$query = $this->db->get();
 		$dataResult = $query->result();
		return $dataResult;
	}
	function getAllNumRows()
	{
		/*author wildan*/
		$this->load->database();
		$this->db->select('*');
        $this->db->from('photo')->order_by("id_pic", "desc");
        $query = $this->db->get();
        $count = $query->num_rows;
        return $count;
	}

	function showPhotoSuggestionPage($data)
	{
		/*author wildan*/
		$this->load->database();
		$this->db->limit(10,$data['offset']*10);
		$this->db->select('*');
        $this->db->from('photo')->order_by("id_pic", "desc");
        //$this->db->order_by('suggest_id desc'); 
 //       $count = $this->db->count_all_results();
		$query = $this->db->get();
		$count = $this->getAllNumRows();
 		$dataResult = $query->result();
		return array(
    		'count' => $count,
    		'dataResult' => $dataResult);
	}

	function publishphoto($id_pic){
		$this->db->where('id_pic', $id_pic);
		$this->db->set('is_publish', 1, FALSE);
		$this->db->update('photo');
	}
	
	function unpublishphoto($id_pic){
		$this->db->where('id_pic', $id_pic);
		$this->db->set('is_publish', 0, FALSE);
		$this->db->update('photo');
	}

	function delete($id_pic){
	        $this->load->database();
	        $this->db->delete('photo', array('id_pic' => $id_pic));
	}

	function photo_get($id_pic){
		$this->load->database();
	        $query = $this->db->get_where('photo', array('id_pic'=>$id_pic));
	        return $query->row_array();
	}
}

?>
