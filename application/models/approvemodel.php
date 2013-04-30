<?php

class approveModel extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function propose($id,$company){
		$sql = "UPDATE applicant SET
					status = 2,
					emrid = ?
				WHERE
					appid = ? ";
		$this->db->query($sql,array($company,$id));
		$sql = "UPDATE statistic SET
					approve = now()
				WHERE 
					appid = ?"; 
		$this->db->query($sql,array($id));
	}
	
	public function recruit($id,$comment,$approve = true){
		if($approve){
			$sql = "UPDATE applicant SET
						status = 3
					WHERE
						appid = ? ";
			$this->db->query($sql,array($id));
			$sql = "UPDATE statistic SET
						recruit = now(),
						rinfo = ?
					WHERE 
						appid = ?"; 
			$this->db->query($sql,array($comment,$id));
		}else{
			$sql = "UPDATE applicant SET
						status = 1
					WHERE
						appid = ? ";
			$this->db->query($sql,array($id));
			$sql = "UPDATE disapprove SET
						disapp = now(),
						comment = ?
					WHERE 
						appid = ?"; 
			$this->db->query($sql,array($comment,$id));			
		}
	}

}
