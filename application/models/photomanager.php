<?php
class PhotoManager extends CI_Model{

function __construct(){
  		parent::__construct();
  		$this->load->helper('url');		
  		$this->load->database();		
 	}
 	
function SaveForm($form_data)
	{
	$this->db->insert('photo', $form_data);

	}

	function getPhoto($place){
		$this->load->database();
		$this->db->select('*');
        $this->db->from('photo');
        $this->db->join('tourist_attraction', 'pic_thumbnail = pic');
        $this->db->where('photo.place_name', $place);
        $query = $this->db->get();
        return $query->row_array();
	}

}
	
	?>