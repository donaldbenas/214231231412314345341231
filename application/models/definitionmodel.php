<?php 

class definitionModel extends CI_Model{
	

	public function __construct(){
		parent::__construct();
		$this->load->database();		
	}
	
	public function position($name){
		$sql = "SELECT value FROM list WHERE value = ? ";
		$query = $this->db->query($sql,$name);
		if($query->num_rows() <= 0 ){
			$sql = "INSERT INTO list (value) VALUES (?)";
			$this->db->query($sql,$name);
			return true;
		} else return false;
	}
	
	public function nationality($name){
		$sql = "SELECT value FROM nationality WHERE value = ? ";
		$query = $this->db->query($sql,$name);
		if($query->num_rows() <= 0 ){
			$sql = "INSERT INTO nationality (value) VALUES (?)";
			$this->db->query($sql,$name);
			return true;
		} else return false;
	}
	
	public function reason($name){
		$sql = "SELECT value FROM reason WHERE value = ? ";
		$query = $this->db->query($sql,$name);
		if($query->num_rows() <= 0 ){
			$sql = "INSERT INTO reason (value) VALUES (?)";
			$this->db->query($sql,$name);
			return true;
		} else return false;
	}
	
	public function country($name){
		$sql = "SELECT value FROM country WHERE value = ? ";
		$query = $this->db->query($sql,$name);
		if($query->num_rows() <= 0 ){
			$sql = "INSERT INTO country (value) VALUES (?)";
			$this->db->query($sql,$name);
			return true;
		} else return false;
	}
	
	public function religion($name){
		$sql = "SELECT value FROM religion WHERE value = ? ";
		$query = $this->db->query($sql,$name);
		if($query->num_rows() <= 0 ){
			$sql = "INSERT INTO religion (value) VALUES (?)";
			$this->db->query($sql,$name);
			return true;
		} else return false;
	}
	
	public function civil($name){
		$sql = "SELECT value FROM civil WHERE value = ? ";
		$query = $this->db->query($sql,$name);
		if($query->num_rows() <= 0 ){
			$sql = "INSERT INTO civil (value) VALUES (?)";
			$this->db->query($sql,$name);
			return true;
		} else return false;
	}
	
	public function document($name){
		$sql = "SELECT value FROM req WHERE value = ? ";
		$query = $this->db->query($sql,$name);
		if($query->num_rows() <= 0 ){
			$sql = "INSERT INTO req (value) VALUES (?)";
			$this->db->query($sql,$name);
			return true;
		} else return false;
	}

}
