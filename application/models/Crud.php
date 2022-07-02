<?php 
 
class Crud extends CI_Model{
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

    function edit_data($data,$table,$where){
		$this->db->set($data);
		$this->db->where('id_user', $where);
		$this->db->update($table);
	}
}