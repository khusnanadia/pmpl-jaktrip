<?php
class PromoManager extends CI_Model{

    function __construct() {

        parent::__construct();

    }

    

    /*

    author: 

    */

 	function insertPromo($data){

	 	$this->load->database();

       	$this->db->insert('promo', $data);

    } 



    /*

    author: 

    */

    function showAllPromo(){

		$this->load->database();

		$this->db->select('*');

        $this->db->from('promo');

        $this->db->order_by('end_date desc');

		$query = $this->db->get();

		return $query->result();

	}



    /*

    author: 

    */

	function showPromo($title){

		$this->load->database();

		$name = str_replace("%20"," ",$name);

        $query = $this->db->get_where('promo', array('title' => $title));

		return $query->result();

	}



    /*

    author: Khusna Nadia

    Mendapatkan atribut type_name pada tabel types

    */

    function showType(){

        $this->load->database();

        $this->db->select('type_name');

        $this->db->from('types');

        $this->db->order_by('type_name asc'); 

        $this->db->distinct();

        $query = $this->db->get();

        return $query->result();

    }



    /*

    author: Khusna Nadia

    Mendapatkan type yang ada di tabel types

    */

    function getTypes(){

        $this->load->database();

        $query = $this->db->get('types');

        return $query->result();

    }



    /*

    author: Khusna Nadia

    Mendapatkan id_promo terakhir

    */

    function getLastIdPromo(){

        $this->db->select_max('id_promo');

        $query = $this->db->get('promo');

        return $query->result();

    }



    /*

    author: 

    */

    function SaveForm($form_data){

        $this->db->insert('promo', $form_data);

        if ($this->db->affected_rows() == '1'){

            return TRUE;

        }

        return FALSE;

    }



    /*

    author: 

    */

    function SaveFormType($form_type){

        $id_promo = $form_type['id_promo'];

        $type_new = $form_type['type_new'];

        

        foreach($form_type['type_list'] as $selected){

            if($selected != ''){

                $this->db->insert('type_promo', array('type_name'=>$selected, 'id_promo'=>$id_promo));

            }else{

                if($type_new != ''){

                    $this->db->insert('types', array('type_name'=>$type_new));

                    $this->db->insert('type_promo', array('type_name'=>$type_new, 'id_promo'=>$id_promo));

                }

            }

        }

        

        if ($this->db->affected_rows() == '1'){

            return TRUE;

        }

        return FALSE;

    }

	

    /*

    author: 

    */

	function filterpromoloc($city){

		$this->load->database();

		$this->db->select('id_promo, start_date, end_date, p.place_name, photo, title, p.description, tourist_attraction.city');

		$this->db->from('promo as p');

		$this->db->join('tourist_attraction', 'p.place_name = tourist_attraction.place_name', 'left');

		$city= str_replace("%20", " ",$city);

		if((string)$city != ""){

			$this->db->where(array('tourist_attraction.city' => $city));

		} 			

		$query = $this->db->get(); 

		return $query->result(); 

	}

	

    /*

    author: 

    */	

	function filterPromoFinal($city, $title){

		$this->load->database();

		$this->db->select('id_promo, start_date, end_date, p.place_name, photo, title, p.description, tourist_attraction.city');

		$this->db->from('promo as p');

		$this->db->join('tourist_attraction', 'p.place_name = tourist_attraction.place_name', 'left');

		$city= str_replace("%20", " ",$city);

		$title= str_replace("%20", " ",$title);

		if((string)$city != ""and $city !="All"){

			$this->db->where(array('tourist_attraction.city' => $city));

		} 

		if((string)$title != ""){

			$this->db->like(array('p.title' => $title));

		} 			

		$query = $this->db->get(); 

        return $query->result_array(); 

	}

	

    /*

    author: 

    */

	function filterPromotype($category_name, $city, $place_name){

			

			$this->load->database();

			$this->db->select('*');

            $this->db->from('promo'); 

			$this->db->join('type_promo', 'type_promo.id_promo = promo.id_promo');

			$this->db->join('tourist_attraction', 'promo.place_name = tourist_attraction.place_name');

            //$this->db->join('photo', 'photo.place_name = tour_category.place_name');

			$category_name = str_replace("%20", " ",$category_name);

			$city= str_replace("%20", " ",$city);

			$place_name= str_replace("%20", " ",$place_name);

			if((string)$category_name != "" and $category_name !="All"){

				$this->db->where('type_name', $category_name);

			} 

			if((string)$city != ""and $city !="All"){

				$this->db->where('city', $city);

			} 

			if((string)$place_name != ""){

				$this->db->like('title', $place_name);

			} 			

			$query = $this->db->get(); 

            return $query->result_array(); 

	}



    /*

    author: 

    */

    function promo_getall(){

        $this->load->database();

        $query = $this->db->get('promo');

        return $query->result();

    }



    /*

    author: 

    */

    function promo_getType($id_promo){

        $query = $this->db->get_where('type_promo', array('id_promo'=>$id_promo));

        return $query->result();

    }



    /*

    author: Khusna Nadia

    Menghapus id_promo

    */

    function delete($id_promo){

        $this->load->database();

        $this->db->delete('promo', array('id_promo' => $id_promo));

    }



    /*

    author: 

    */

    function promo_get($id_promo){

        $this->load->database();

        $query = $this->db->get_where('promo', array('id_promo'=>$id_promo));

        return $query->row_array();

    }



    /*

    author: 

    */

    function getPromo(){

        $this->load->database();

        $query = $this->db->select("*")->from('promo')->get();

        return $query;

    }



    /*

    author: Khusna Nadia

    Update database tabel promo, types, dan type_promo

    */

    function edit($id_promo, $form_data, $form_type){

        $this->load->database();

        $this->db->where('id_promo',$id_promo);

        $this->db->update('promo',$form_data);

        $old_type = $form_type['type_old'];

        foreach($old_type as $old){

            $is_exists=FALSE;

            foreach($form_type['type_list'] as $selected){

                if($old->type_name==$selected){

                    $is_exists=TRUE;

                }

            }

            if($is_exists==FALSE){

                $this->db->delete('type_promo', array('id_promo'=>$id_promo, 'type_name'=>$old->type_name));

            }

        }

        

        $type_new = $form_type['type_new'];

        

        foreach($form_type['type_list'] as $selected){

            if($selected != ''){

                $quer = $this->db->get_where('type_promo', array('id_promo'=>$id_promo, 'type_name'=>$selected));

                if($quer->num_rows==0){

                    $this->db->insert('type_promo', array('id_promo'=>$id_promo, 'type_name'=>$selected));

                }

            }else{

                if($type_new != ''){

                    $this->db->insert('types', array('type_name'=>$type_new));

                    $this->db->insert('type_promo', array('id_promo'=>$id_promo, 'type_name'=>$type_new));

                }   

            }

        }

        return TRUE;

    }

}?>