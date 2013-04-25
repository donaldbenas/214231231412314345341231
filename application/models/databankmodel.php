<?php 

class dataBankModel extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
		
	}

	public function load($status=""){
		$sql = "
				SELECT count(id) as count 
				FROM applicant 
				WHERE status = ?			
		";
		$query = $this->db->query($sql,$status);
		return $query->result();;
	
	}
	
}
