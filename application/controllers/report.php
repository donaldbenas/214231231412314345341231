<?php

class Report extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('databankmodel');		
		$this->databank['applicant'] = $this->databankmodel->load('1');
		$this->databank['propose'] = $this->databankmodel->load('2');
		$this->databank['recruit'] = $this->databankmodel->load('3');
		$this->databank['process'] = $this->databankmodel->load('4');
		$this->databank['departure'] = $this->databankmodel->load('5');
		$this->databank['arrival'] = $this->databankmodel->load('6');
	}
	
	public function index()	{
		$this->load->model('reportmodel');
		$this->load->model('personalmodel');
		if($this->input->post()!=""){
			$data['report'] = $this->reportmodel->report($this->input->post('status'),$this->input->post('date'),$this->input->post('position'));
			$data['status'] = $this->reportmodel->status;
			$data['date'] = $this->input->post('date');
/*
			 var_dump($data['report']);
			 var_dump($_POST);
*/
		}else{
			$data['status'] = '';
			$data['date'] = '';
		}
		$data['position'] = $this->personalmodel->position();
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		$this->load->view('admin/report',$data);
		$this->load->view('admin/footer');
			
		
	}
	
	public function setdate(){
		$this->load->database();
		$this->load->model('personalmodel');
		$data['country'] = $this->personalmodel->country();
		if($this->input->post()!=""){
			$appid = $this->input->post('appid');
			$setdate = $this->input->post('setdate');
			$country = $this->input->post('country');
			foreach($appid as $id => $row){
				if($setdate[$id]!=""){
					//echo $row." ".$setdate[$id];
					$sql = "SELECT count(*) as count from statistic WHERE appid = ?";
					$query = $this->db->query($sql, array($row));
					$rows = $query->result();
					if($rows[0]->count =='0'){
						$sql = "INSERT INTO statistic (depart,ddestination,appid) VALUES (?,?,?)";
						$this->db->query($sql,array($setdate[$id],$country[$id],$row));
					}else{
						$sql = "UPDATE statistic SET depart = ?, ddestination = ? WHERE appid = ?";
						$this->db->query($sql,array($setdate[$id],$country[$id],$row));
					}
				}
			}
		}
		$sql = "SELECT applicant.* FROM applicant
					LEFT JOIN statistic ON applicant.appid = statistic.appid
					WHERE (statistic.depart = '0000-00-00' OR statistic.depart is NULL)
					AND applicant.status = 5
					ORDER BY applicant.lastname ASC";
		$query = $this->db->query($sql);
		$data['setdate'] = $query->result();
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		$this->load->view('setdate',$data);
		$this->load->view('admin/footer');
	}
	
	public function setstatistic(){
		$this->load->database();
		$sql = "SELECT * FROM statistic ORDER BY appid";
		$query = $this->db->query($sql);
		foreach($query->result() as $rows){
			$param = array($rows->id,$rows->id);
			$sql = "UPDATE statistic  SET appid = ? WHERE id = ?";
			$this->db->query($sql,$param); 
		}		
	}

}
