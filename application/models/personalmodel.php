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

	public function country(){		
		$this->db->select('*');
		$this->db->from('country');
		$this->db->order_by('value','asc');
		$query = $this->db->get();
		return $query->result_array();
	
	}

	public function reason(){		
		$this->db->select('*');
		$this->db->from('reason');
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

	public function req(){		
		$this->db->select('*');
		$this->db->from('req');
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

	public function employer(){
		$this->db->select('*');
		$this->db->from('employer');
		$this->db->order_by('company','asc');
		$query = $this->db->get();
		return $query->result_array();
	
	}

	public function requirements($id=""){
		$this->db->select('*');
		$this->db->from('requirements');
		$this->db->where('id',$id);
		$this->db->order_by('value','asc');
		$query = $this->db->get();
		return $query->result_array();
	
	}
	
	public function requirement($arr){
		foreach($arr as $rows){
			$sql = "INSERT INTO requirement(emrid,value) VALUES (?,?)";
			$this->db->query($sql,array($rows[0],$rows[1]));
		}
	}
	
	public function job($emrid){
		$para = array($emrid);
		$sql = "SELECT job.id, list.value FROM job";
		$sql.= "	LEFT JOIN list ON list.id = job.listid";
		$sql.= "	WHERE job.emrid = ?";
		$sql.= "	ORDER BY list.value";
		$query = $this->db->query($sql,$para);
		return $query->result();
	}


}
