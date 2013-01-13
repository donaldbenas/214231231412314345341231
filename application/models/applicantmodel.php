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
		$this->load->helper('array');
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
		
		$data = array(
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
			'email' => $_POST['email'],
			'password' => $_POST['password1'],
			'lastname' => strtoupper($_POST['lastname']),
			'firstname' => strtoupper($_POST['firstname']),
			'middlename' => strtoupper($_POST['middlename']),
			'gender' => strtoupper($_POST['gender']),
			'paddress' => strtoupper($_POST['permanentAddressMunicpality'])."--".strtoupper($_POST['permanentAddressCity']),
			'caddress' => strtoupper($_POST['currentAddressMunicpality'])."--".strtoupper($_POST['currentAddressCity']),
			'pphone' => strtoupper($_POST['permanentTelephone']),
			'pmobile' => strtoupper($_POST['permanentMobile']),
			'cphone' => strtoupper($_POST['currentTelephone']),
			'cmobile' => strtoupper($_POST['currentMobile']),
			'datebirth' => strtoupper($_POST['BirthYear'])."-".strtoupper($_POST['birthMonth'])."-".strtoupper($_POST['BirthDay']),
			'placebirth' => strtoupper($_POST['municipality'])."--".strtoupper($_POST['city']),
			'religion' => strtoupper($_POST['religion']),
			'nationality' => strtoupper($_POST['nationality']),
			'civilstatus' => strtoupper($_POST['civil']),
			'sss' => strtoupper($_POST['sss']),
			'tin' => strtoupper($_POST['tin']),
			'pagibig' => strtoupper($_POST['pagibig']),
			'philhealth' => strtoupper($_POST['philhealth']),
			'height' => $_POST['height'],
			'weight' => $_POST['weight'],
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
			'activate' => '1',
			'type' => '2'
		);
		$this->db->insert("applicant",$data);
		
		$education = array(
			'appid' => $appid,
			'elementary' => strtoupper($_POST['primarySchool']),
			'efrom' => strtoupper($_POST['primaryStart']),
			'eto' => strtoupper($_POST['primaryEnd']),
			'highschool' => strtoupper($_POST['secondarySchool']),
			'hfrom' => strtoupper($_POST['secondaryStart']),
			'hto' => strtoupper($_POST['secondaryEnd']),
			'college' => strtoupper($_POST['collegeSchool']),
			'cfrom' => strtoupper($_POST['collegeStart']),
			'cto' => strtoupper($_POST['collegeEnd']),
			'ccourse' => strtoupper($_POST['collegeDegree']),
			'vocational' => strtoupper($_POST['vocationalCourse']),
			'vfrom' => strtoupper($_POST['vocationalStart']),
			'vto' => strtoupper($_POST['vocationalEnd']),
			'postgraduate' => strtoupper($_POST['postSchool']),
			'pfrom' => strtoupper($_POST['postStart']),
			'pto' => strtoupper($_POST['postEnd']),
			'pcourse' => strtoupper($_POST['postDegree'])
		);
		$this->db->insert("education",$education);
		
		for($i=0;$i<count($_POST["skillCourse"]);$i++){
			$skill = array(
				'appid' => $appid,
				'course' => strtoupper($_POST['skillCourse'][$i]),
				'school' => strtoupper($_POST['skillSchool'][$i]),
				'startDate' => $_POST['skillStartMonth'][$i]."-".$_POST['skillStartYear'][$i],
				'endDate' => $_POST['skillEndMonth'][$i]."-".$_POST['skillEndYear'][$i]
			);
			$this->db->insert("skills",$skill);
		}
		
		for($i=0;$i<count($_POST["localExperienceCompany"]);$i++){
			$local = array(
				'appid' => $appid,
				'company' => $_POST['localExperienceCompany'][$i],
				'position' =>  $_POST['localExperiencePosition'][$i],
				'start' =>  $_POST['localExperienceStartMonth'][$i]."-".$_POST['localExperienceStartYear'][$i],
				'end' =>  $_POST['localExperienceEndMonth'][$i]."-".$_POST['localExperienceEndYear'][$i], 
				'main' =>  $_POST['localExperienceDuties'][$i], 
				'reason' => $_POST['localExperienceReason'][$i], 
			);
			$this->db->insert("local",$local);
		}
		
		for($i=0;$i<count($_POST["abroadExperienceCompany"]);$i++){
			$abroad = array(
				'appid' => $appid,
				'company' => $_POST['abroadExperienceCompany'][$i],
				'position' =>  $_POST['abroadExperiencePosition'][$i],
				'start' =>  $_POST['abroadExperienceStartMonth'][$i]."-".$_POST['abroadExperienceStartYear'][$i],
				'end' =>  $_POST['abroadExperienceEndMonth'][$i]."-".$_POST['abroadExperienceEndYear'][$i], 
				'main' =>  $_POST['abroadExperienceDuties'][$i], 
				'reason' => $_POST['abroadExperienceReason'][$i], 
			);
			$this->db->insert("abroad",$abroad);
		}
	}
	
	
	public function edit($appid){
		
		$data = array(
			'empid' => '1',
			'emrid' => '',
			'position1' => strtoupper($_POST['position1']),
			'position2' => strtoupper($_POST['position2']),
			'prefer1' => strtoupper($_POST['reference1']),
			'prefer2' => strtoupper($_POST['reference2']),
			'salary1' => strtoupper($_POST['salary1']),
			'salary2' => strtoupper($_POST['salary2']),
			'email' => $_POST['email'],
			'password' => $_POST['password1'],
			'lastname' => strtoupper($_POST['lastname']),
			'firstname' => strtoupper($_POST['firstname']),
			'middlename' => strtoupper($_POST['middlename']),
			'gender' => strtoupper($_POST['gender']),
			'paddress' => strtoupper($_POST['permanentAddressMunicpality'])."--".strtoupper($_POST['permanentAddressCity']),
			'caddress' => strtoupper($_POST['currentAddressMunicpality'])."--".strtoupper($_POST['currentAddressCity']),
			'pphone' => strtoupper($_POST['permanentTelephone']),
			'pmobile' => strtoupper($_POST['permanentMobile']),
			'cphone' => strtoupper($_POST['currentTelephone']),
			'cmobile' => strtoupper($_POST['currentMobile']),
			'datebirth' => strtoupper($_POST['BirthYear'])."-".strtoupper($_POST['birthMonth'])."-".strtoupper($_POST['BirthDay']),
			'placebirth' => strtoupper($_POST['municipality'])."--".strtoupper($_POST['city']),
			'religion' => strtoupper($_POST['religion']),
			'nationality' => strtoupper($_POST['nationality']),
			'civilstatus' => strtoupper($_POST['civil']),
			'sss' => strtoupper($_POST['sss']),
			'tin' => strtoupper($_POST['tin']),
			'pagibig' => strtoupper($_POST['pagibig']),
			'philhealth' => strtoupper($_POST['philhealth']),
			'height' => $_POST['height'],
			'weight' => $_POST['weight'],
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
		$this->db->where("appid",$appid);
		$this->db->update("applicant",$data);
		
		$education = array(
			'elementary' => strtoupper($_POST['primarySchool']),
			'efrom' => strtoupper($_POST['primaryStart']),
			'eto' => strtoupper($_POST['primaryEnd']),
			'highschool' => strtoupper($_POST['secondarySchool']),
			'hfrom' => strtoupper($_POST['secondaryStart']),
			'hto' => strtoupper($_POST['secondaryEnd']),
			'college' => strtoupper($_POST['collegeSchool']),
			'cfrom' => strtoupper($_POST['collegeStart']),
			'cto' => strtoupper($_POST['collegeEnd']),
			'ccourse' => strtoupper($_POST['collegeDegree']),
			'vocational' => strtoupper($_POST['vocationalCourse']),
			'vfrom' => strtoupper($_POST['vocationalStart']),
			'vto' => strtoupper($_POST['vocationalEnd']),
			'postgraduate' => strtoupper($_POST['postSchool']),
			'pfrom' => strtoupper($_POST['postStart']),
			'pto' => strtoupper($_POST['postEnd']),
			'pcourse' => strtoupper($_POST['postDegree'])
		);
		$this->db->where("appid",$appid);
		$this->db->update("education",$education);
		
		$this->db->where("appid",$appid);
		$this->db->delete("skills");
		
		for($i=0;$i<count($_POST["skillCourse"]);$i++){
			$skill = array(
				'appid' => $appid,
				'course' => strtoupper($_POST['skillCourse'][$i]),
				'school' => strtoupper($_POST['skillSchool'][$i]),
				'startDate' => $_POST['skillStartMonth'][$i]."-".$_POST['skillStartYear'][$i],
				'endDate' => $_POST['skillEndMonth'][$i]."-".$_POST['skillEndYear'][$i]
			);
			$this->db->insert("skills",$skill);
		}
		
		$this->db->where("appid",$appid);
		$this->db->delete("local");
		
		for($i=0;$i<count($_POST["localExperienceCompany"]);$i++){
			$local = array(
				'appid' => $appid,
				'company' => $_POST['localExperienceCompany'][$i],
				'position' =>  $_POST['localExperiencePosition'][$i],
				'start' =>  $_POST['localExperienceStartMonth'][$i]."-".$_POST['localExperienceStartYear'][$i],
				'end' =>  $_POST['localExperienceEndMonth'][$i]."-".$_POST['localExperienceEndYear'][$i], 
				'main' =>  $_POST['localExperienceDuties'][$i], 
				'reason' => $_POST['localExperienceReason'][$i], 
			);
			$this->db->insert("local",$local);
		}
		
		$this->db->where("appid",$appid);
		$this->db->delete("abroad");
		
		for($i=0;$i<count($_POST["abroadExperienceCompany"]);$i++){
			$abroad = array(
				'appid' => $appid,
				'company' => $_POST['abroadExperienceCompany'][$i],
				'position' =>  $_POST['abroadExperiencePosition'][$i],
				'start' =>  $_POST['abroadExperienceStartMonth'][$i]."-".$_POST['abroadExperienceStartYear'][$i],
				'end' =>  $_POST['abroadExperienceEndMonth'][$i]."-".$_POST['abroadExperienceEndYear'][$i], 
				'main' =>  $_POST['abroadExperienceDuties'][$i], 
				'reason' => $_POST['abroadExperienceReason'][$i], 
			);
			$this->db->insert("abroad",$abroad);
		}
		
		
	}
	
	public function loadpersonalbackground($id){
		$this->db->select('*');
		$this->db->from('applicant');
		$this->db->where('appid',$id);
		$data = $this->db->get();
		return $data->result_array();
	}
	
	public function loadeducationalbackground($appid){
		$this->db->select('*');
		$this->db->from('education');
		$this->db->where('appid',$appid);
		$data = $this->db->get();
		return $data->result_array();
	}
	
	public function loadskillbackground($appid){
		$this->db->select('*');
		$this->db->from('skills');
		$this->db->where('appid',$appid);
		$data = $this->db->get();
		return $data->result_array();
	}
	
	public function loadlocalexperience($appid){
		$this->db->select('*');
		$this->db->from('local');
		$this->db->where('appid',$appid);
		$data = $this->db->get();
		return $data->result_array();
	}
	
	public function loadabroadexperience($appid){
		$this->db->select('*');
		$this->db->from('abroad');
		$this->db->where('appid',$appid);
		$data = $this->db->get();
		return $data->result_array();
	}
	
	public function getID($table,$appid){
		$this->db->select("id");
		$this->db->where("appid",$appid);
		$id = $this->db->get($table)->result();
		return $id[0]->id;
	}
	
}
