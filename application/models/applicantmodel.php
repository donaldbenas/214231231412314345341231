<?php

class applicantModel extends CI_Model{
	
	var $id;
	var $status;
	var $appid;
	var $empid;
	var $emrid;
	var $position1;
	var $position2;
	var $prefer1;
	var $prefer2;
	var $salary1;
	var $salary2;
	var $email;
	var $password;
	var $lastname;
	var $firstname;
	var $middlename;
	var $gender;
	var $paddress;
	var $caddress;
	var $pphone;
	var $pmobile;
	var $cphone;
	var $cmobile;
	var $datebirth;
	var $placebirth;
	var $religion;
	var $nationality;
	var $civilstatus;
	var $sss;
	var $tin;
	var $pagibig;
	var $philhealth;
	var $height;
	var $weight;
	var $marks;
	var $spouse;
	var $saddress;
	var $notify;
	var $naddress;
	var $sphone;
	var $smobile;
	var $nphone;
	var $nmobile;
	var $added;
	var $activate;
	var $type;
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		
	}
	
	public function save(){
		$appid = 0;
		$query = $this->db->query("SELECT * FROM applicant");
		foreach($query->result_array() as $row){
			if($row['appid']> $appid){
				$appid = $row['appid'];
			}
		}
		$appid = $appid + 1;
		$id = $this->db->count_all('applicant') + 1;
		
		$data = array(
			'id' => $id,
			'status' => '1',
			'appid' => $appid,
			'empid' => '1',
			'emrid' => '',
			'position1' => strtoupper($_POST['position1']),
			'position2' => strtoupper($_POST['position2']),
			'prefer1' => strtoupper($_POST['reference1']),
			'prefer2' => strtoupper($_POST['reference2']),
			'salary1' => strtoupper($_POST['salary1']),
			'salary2' => strtoupper($_POST['salary2']),
			'email' => strtoupper($_POST['email']),
			'password' => strtoupper($_POST['password1']),
			'lastname' => strtoupper($_POST['lastname']),
			'firstname' => strtoupper($_POST['firstname']),
			'middlename' => strtoupper($_POST['middlename']),
			'gender' => strtoupper($_POST['gender']),
			'paddress' => strtoupper($_POST['permanentAddressMunicpality']).", ".strtoupper($_POST['permanentAddressCity']),
			'caddress' => strtoupper($_POST['currentAddressMunicpality']).", ".strtoupper($_POST['currentAddressCity']),
			'pphone' => strtoupper($_POST['permanentTelephone']),
			'pmobile' => strtoupper($_POST['permanentMobile']),
			'cphone' => strtoupper($_POST['currentTelephone']),
			'cmobile' => strtoupper($_POST['currentMobile']),
			'datebirth' => strtoupper($_POST['BirthYear'])."-".strtoupper($_POST['birthMonth'])."-".strtoupper($_POST['BirthDay']),
			'placebirth' => strtoupper($_POST['municipality']).", ".strtoupper($_POST['city']),
			'religion' => strtoupper($_POST['religion']),
			'nationality' => strtoupper($_POST['nationality']),
			'civilstatus' => strtoupper($_POST['civil']),
			'sss' => strtoupper($_POST['sss']),
			'tin' => strtoupper($_POST['tin']),
			'pagibig' => strtoupper($_POST['pagibig']),
			'philhealth' => strtoupper($_POST['philhealth']),
			'height' => strtoupper($_POST['height']),
			'weight' => strtoupper($_POST['weight']),
			'marks' => strtoupper($_POST['marks']),
			'spouse' => strtoupper($_POST['spouseName']),
			'saddress' => strtoupper($_POST['spouseMunicipalityAddress'])."--".strtoupper($_POST['spouseCityAddress']),
			'notify' => strtoupper($_POST['emergencyNotify']),
			'naddress' => strtoupper($_POST['emergencyMunicipalityAddress'])."--".strtoupper($_POST['emergencyCityAddress']),
			'sphone' => strtoupper($_POST['spouseTelephone']),
			'smobile' => strtoupper($_POST['spouseMobile']),
			'nphone' => strtoupper($_POST['emergencyTelephone']),
			'nmobile' => strtoupper($_POST['emergencyMobile']),
			'added' => strtoupper($_POST['applyYear'])."-".strtoupper($_POST['applyMonth'])."-".strtoupper($_POST['applyDay']),
			'activate' => '0',
			'type' => '2'
		);
		$this->db->insert("applicant",$data);
	}
	
	
	public function edit($id){
		
		$data = array(
			'empid' => '1',
			'emrid' => '',
			'position1' => strtoupper($_POST['position1']),
			'position2' => strtoupper($_POST['position2']),
			'prefer1' => strtoupper($_POST['reference1']),
			'prefer2' => strtoupper($_POST['reference2']),
			'salary1' => strtoupper($_POST['salary1']),
			'salary2' => strtoupper($_POST['salary2']),
			'email' => strtoupper($_POST['email']),
			'password' => strtoupper($_POST['password1']),
			'lastname' => strtoupper($_POST['lastname']),
			'firstname' => strtoupper($_POST['firstname']),
			'middlename' => strtoupper($_POST['middlename']),
			'gender' => strtoupper($_POST['gender']),
			'paddress' => strtoupper($_POST['permanentAddressMunicpality']).", ".strtoupper($_POST['permanentAddressCity']),
			'caddress' => strtoupper($_POST['currentAddressMunicpality']).", ".strtoupper($_POST['currentAddressCity']),
			'pphone' => strtoupper($_POST['permanentTelephone']),
			'pmobile' => strtoupper($_POST['permanentMobile']),
			'cphone' => strtoupper($_POST['currentTelephone']),
			'cmobile' => strtoupper($_POST['currentMobile']),
			'datebirth' => strtoupper($_POST['BirthYear'])."-".strtoupper($_POST['birthMonth'])."-".strtoupper($_POST['BirthDay']),
			'placebirth' => strtoupper($_POST['municipality']).", ".strtoupper($_POST['city']),
			'religion' => strtoupper($_POST['religion']),
			'nationality' => strtoupper($_POST['nationality']),
			'civilstatus' => strtoupper($_POST['civil']),
			'sss' => strtoupper($_POST['sss']),
			'tin' => strtoupper($_POST['tin']),
			'pagibig' => strtoupper($_POST['pagibig']),
			'philhealth' => strtoupper($_POST['philhealth']),
			'height' => strtoupper($_POST['height']),
			'weight' => strtoupper($_POST['weight']),
			'marks' => strtoupper($_POST['marks']),
			'spouse' => strtoupper($_POST['spouseName']),
			'saddress' => strtoupper($_POST['spouseMunicipalityAddress'])."--".strtoupper($_POST['spouseCityAddress']),
			'notify' => strtoupper($_POST['emergencyNotify']),
			'naddress' => strtoupper($_POST['emergencyMunicipalityAddress'])."--".strtoupper($_POST['emergencyCityAddress']),
			'sphone' => strtoupper($_POST['spouseTelephone']),
			'smobile' => strtoupper($_POST['spouseMobile']),
			'nphone' => strtoupper($_POST['emergencyTelephone']),
			'nmobile' => strtoupper($_POST['emergencyMobile']),
			'added' => strtoupper($_POST['applyYear'])."-".strtoupper($_POST['applyMonth'])."-".strtoupper($_POST['applyDay']),
			'type' => '2'
		);
		$this->db->where("appid",$id);
		$this->db->update("applicant",$data);
	}
	
	public function loadpersonalbackground($id){
		$this->db->select('*');
		$this->db->from('applicant');
		$this->db->where('appid',$id);
		$data = $this->db->get();
		return $data->result_array();
	}
	
}
