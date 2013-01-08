<?php

class applicantModel extends CI_Model{
	
	public var $id;
	public var $status;
	public var $appid;
	public var $empid;
	public var $emrid;
	public var $position1;
	public var $position2;
	public var $prefer1;
	public var $prefer2;
	public var $salary1;
	public var $salary2;
	public var $email;
	public var $password;
	public var $lastname;
	public var $firstname;
	public var $middlename;
	public var $gender;
	public var $paddress;
	public var $caddress;
	public var $pphone;
	public var $pmobile;
	public var $cphone;
	public var $cmobile;
	public var $datebirth;
	public var $placebirth;
	public var $religion;
	public var $nationality;
	public var $civilstatus;
	public var $sss;
	public var $tin;
	public var $pagibig;
	public var $philhealth;
	public var $height;
	public var $weight;
	public var $marks;
	public var $spouse;
	public var $saddress;
	public var $notify;
	public var $naddress;
	public var $sphone;
	public var $smobile;
	public var $nphone;
	public var $nmobile;
	public var $added;
	public var $activate;
	public var $type;
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		
	}
	public function add($arr){
				
	}
}
