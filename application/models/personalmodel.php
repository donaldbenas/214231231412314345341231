<?php

class personalModel extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}

	public function nationality($id=""){		
		$this->db->select('*');
		$this->db->from('nationality');
		if($id!="")
		$this->db->where('id',$id);
		$this->db->order_by('value','asc');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function civil($id=""){		
		$this->db->select('*');
		$this->db->from('civil');
		if($id!="")
		$this->db->where('id',$id);
		$this->db->order_by('value','asc');
		$query = $this->db->get();
		return $query->result_array();
	
	}

	public function country($id=""){		
		$this->db->select('*');
		$this->db->from('country');
		if($id!="")
		$this->db->where('id',$id);
		$this->db->order_by('value','asc');
		$query = $this->db->get();
		return $query->result_array();
	
	}

	public function reason($id=""){		
		$this->db->select('*');
		$this->db->from('reason');
		if($id!="")
		$this->db->where('id',$id);
		$this->db->order_by('value','asc');
		$query = $this->db->get();
		return $query->result_array();
	
	}

	public function religion($id=""){		
		$this->db->select('*');
		$this->db->from('religion');
		if($id!="")
		$this->db->where('id',$id);
		$this->db->order_by('value','asc');
		$query = $this->db->get();
		return $query->result_array();
	
	}

	public function req($id=""){		
		$this->db->select('*');
		$this->db->from('req');
		if($id!="")
		$this->db->where('id',$id);
		$this->db->order_by('value','asc');
		$query = $this->db->get();
		return $query->result_array();
	
	}

	public function position($id=""){
		$this->db->select('*');
		$this->db->from('list');
		if($id!="")
		$this->db->where('id',$id);
		$this->db->order_by('value','asc');
		$query = $this->db->get();
		return $query->result_array();
	
	}

	public function employer($id=""){
		$this->db->select('*');
		$this->db->from('employer');
		if($id!="")
		$this->db->where('id',$id);
		$this->db->order_by('company','asc');
		$query = $this->db->get();
		return $query->result_array();
	
	}

	public function requirements($id=""){
		$this->db->select('*');
		$this->db->from('requirements');
		if($id!="")
		$this->db->where('id',$id);
		$this->db->order_by('value','asc');
		$query = $this->db->get();
		return $query->result_array();
	
	}

	public function dateapprove($id=""){
		$this->db->select('*');
		$this->db->from('statistic');
		if($id!="")
		$this->db->where('appid',$id);
		$this->db->order_by('appid','asc');
		$query = $this->db->get();
		return $query->result_array();
	
	}
	
	public function requirement($arr){
		foreach($arr as $rows){
			$sql = "INSERT INTO requirement(emrid,value) VALUES (?,?)";
			$this->db->query($sql,array($rows[0],$rows[1]));
		}
	}


}
