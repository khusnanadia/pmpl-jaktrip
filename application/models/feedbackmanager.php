<?php

class FeedbackManager extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    /*
    author: Khusna Nadia
    Insert feedback ke database
    */
 	  function insert_feedback($data){
        $this->load->database();
        $this->db->insert('feedback', $data);        
    } 

    function showAllFeedback(){
		    $this->load->database();
		    $this->db->select('*');
        $this->db->from('feedback');
        $this->db->order_by('id_feedback desc'); 
		    $query = $this->db->get();
		    return $query->result();
	 }
}

?>
