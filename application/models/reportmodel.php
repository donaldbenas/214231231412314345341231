<?php 

class reportModel extends CI_Model{
	
	var $status;

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		
	}
	
	public function report($status,$date){
		$date = explode(' - ',$date);
		switch($status){
			case '1' : 
					$sql= "
						SELECT applicant.lastname, applicant.firstname, applicant.middlename, 
								list.value,employer.company, applicant.added
							FROM applicant
							LEFT JOIN employer ON applicant.emrid = employer.id
							LEFT JOIN list ON list.id = applicant.position1
							LEFT JOIN statistic ON applicant.appid = statistic.appid
							WHERE applicant.status = 1	
								AND applicant.added BETWEEN '{$date[0]}' AND '{$date[1]}'	
							ORDER BY applicant.added DESC
					";
					$query = $this->db->query($sql);
					$this->status = $status;
					return $query->result();
					break;
			case '2' :
					$sql= "
						SELECT applicant.lastname, applicant.firstname, applicant.middlename, 
								list.value,employer.company, statistic.approve 
							FROM applicant
							LEFT JOIN employer ON applicant.emrid = employer.id
							LEFT JOIN list ON list.id = applicant.position1
							LEFT JOIN statistic ON applicant.appid = statistic.appid
							WHERE applicant.status = 2		
								AND statistic.approve BETWEEN '{$date[0]}' AND '{$date[1]}'
							ORDER BY statistic.approve DESC				
					";
					$query = $this->db->query($sql);
					$this->status = $status;
					return $query->result();
					break;
			case '3' :
					$sql= "
						SELECT applicant.lastname, applicant.firstname, applicant.middlename, 
								list.value,employer.company, statistic.recruit 
							FROM applicant
							LEFT JOIN employer ON applicant.emrid = employer.id
							LEFT JOIN list ON list.id = applicant.position1
							LEFT JOIN statistic ON applicant.appid = statistic.appid
							WHERE applicant.status = 3		
								AND statistic.recruit BETWEEN '{$date[0]}' AND '{$date[1]}'	
							ORDER BY statistic.recruit DESC		
					";
					$query = $this->db->query($sql);
					$this->status = $status;
					return $query->result();
					break;
			case '4' :
					$sql= "
						SELECT applicant.lastname, applicant.firstname, applicant.middlename, 
								list.value,employer.company, statistic.process 
							FROM applicant
							LEFT JOIN employer ON applicant.emrid = employer.id
							LEFT JOIN list ON list.id = applicant.position1
							LEFT JOIN statistic ON applicant.appid = statistic.appid
							WHERE applicant.status = 4	
								AND statistic.process BETWEEN '{$date[0]}' AND '{$date[1]}'
							ORDER BY statistic.process DESC				
					";
					$query = $this->db->query($sql);
					$this->status = $status;
					return $query->result();
					break;
			case '5' :
					$sql= "
						SELECT applicant.lastname, applicant.firstname, applicant.middlename, 
								list.value,employer.company, statistic.depart,  statistic.ddestination  
							FROM applicant
							LEFT JOIN employer ON applicant.emrid = employer.id
							LEFT JOIN list ON list.id = applicant.position1
							LEFT JOIN statistic ON applicant.appid = statistic.appid
							WHERE applicant.status = 5		
								AND statistic.depart BETWEEN '{$date[0]}' AND '{$date[1]}'	
							ORDER BY statistic.depart DESC		
					";
					$query = $this->db->query($sql);
					$this->status = $status;
					return $query->result();
					break;
			case '6' :
					$sql= "
						SELECT applicant.lastname, applicant.firstname, applicant.middlename, 
								list.value,employer.company, statistic.arrival 
							FROM applicant
							LEFT JOIN employer ON applicant.emrid = employer.id
							LEFT JOIN list ON list.id = applicant.position1
							LEFT JOIN statistic ON applicant.appid = statistic.appid
							WHERE applicant.status = 6	
								AND statistic.arrival BETWEEN '{$date[0]}' AND '{$date[1]}'
							ORDER BY statistic.arrival DESC				
					";
					$query = $this->db->query($sql);
					$this->status = $status;
					return $query->result();
					break;
		}
	
	}


}
