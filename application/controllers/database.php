<?php 


class Database extends CI_Controller{

	function __construct(){
	
		parent::__construct();
		$this->load->database();
		$this->load->library('uri');
	
	}
	
	function index(){
	
		$sql = "SELECT * FROM local ";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $var=> $rows){
			for($i = 1; $i < 13; $i++){		
				if($rows['company'.$i]!= NULL){
					$sql = "INSERT INTO localNew (appid, ";
					$sql.= "	company, ";
					$sql.= "	position, ";
					$sql.= "	start, ";
					$sql.= "	end, ";
					$sql.= "	main, ";
					$sql.= "	reason) ";
					$sql.= " VALUES (?,?,?,?,?,?,?)";
					$values = array (
						$rows['id'],
						$rows['company'.$i],
						$rows['position'.$i],
						$rows['monthbf'.$i]."-".$rows['yearbf'.$i],
						$rows['monthbt'.$i]."-".$rows['yearbt'.$i],
						$rows['main'.$i],
						$rows['reason'.$i]
					);
					$this->db->query($sql,$values);
				}
			}
		
		}
	}


}
