<?php

class RatingManager extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    /*
    author: Khusna Nadia
    Insert rating ke database tabel rating
    */
	function insert_rating($data){
	//Inserting in Table(rating) of Database(jaktrip) 
        $this->load->database();
        $this->db->insert('rating', $data);
    }

    /*
    author: 
    Menampilkan rating dan review masing-masing member
    */
    function showReview($user){
    	$this->load->database();
    	$this->db->select('*');
        $this->db->from('rating');
        $this->db->where('username', $user);
        $this->db->order_by('id_rate desc');
        $query = $this->db->get();
        return $query->result();
    }

    function deleteReview($id_rate){
        $this->load->database();
        $this->db->delete('rating', array('id_rate' => $id_rate)); 
    }
   
}

?>
