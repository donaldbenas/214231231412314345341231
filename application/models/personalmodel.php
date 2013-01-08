<?php

class personalModel extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}

	public function nationality(){		
		$this->db->select('*');
		$this->db->from('nationality');
		$this->db->order_by('value','asc');
		$query = $this->db->get();
		return $query->result_array();
	
	}

	public function civil(){		
		$this->db->select('*');
		$this->db->from('civil');
		$this->db->order_by('value','asc');
		$query = $this->db->get();
		return $query->result_array();
	
	}

	public function position(){
		$this->db->select('*');
		$this->db->from('list');
		$this->db->order_by('value','asc');
		$query = $this->db->get();
		return $query->result_array();
	
	}

	public function religion(){
		$this->db->select('*');
		$this->db->from('religion');
		$this->db->order_by('value','asc');
		$query = $this->db->get();
		return $query->result_array();
	
	}


}
