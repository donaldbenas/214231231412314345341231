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
		if($this->input->post()!=""){
			$data['report'] = $this->reportmodel->report($this->input->post('status'),$this->input->post('date'));
			$data['status'] = $this->reportmodel->status;
			$data['date'] = $this->input->post('date');
			//echo var_dump($data['report']);
		}else{
			$data['status'] = '';
			$data['date'] = '';
		}
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		$this->load->view('admin/report',$data);
		$this->load->view('admin/footer');
			
		
	}
<<<<<<< HEAD
	
	public function setdate(){
		$this->load->view('admin/header',$this->databank);
		$this->load->database();
		$sql = "SELECT * FROM applicant
					LEFT JOIN statistic ON applicant.appid = statistic.appid
					WHERE (statistic.depart = '0000-00-00' OR statistic.depart is NULL)
					AND applicant.status = 5
					ORDER BY applicant.lastname ASC";
		$query = $this->db->query($sql);
		var_dump($query->result());
		echo '<form method="post">';
		echo '<table class="table table-hover table-striped table-condensed table-bordered span5">';
		echo '<tr><th>Name</th><th>Date</th></tr>';
		foreach($query->result() as $applicant){
			echo '<tr>';
			echo '<td style="width:300px"><label>'.$applicant->lastname.', '.$applicant->firstname.'</label>';
			echo '<input type="text" name="appid[]" value="'.$applicant->appid.'" style="display:block"></td>';
			echo '<td><input type="text" name="disdate[]" data-mask="9999-99-99" ></td>';
			echo '</tr>';
		}
		echo '<tr><td></td><td><input type="submit" value="submit"></td></tr>';
		echo '</table>';
		echo '</form>';
		$this->load->view('admin/footer');
		if($this->input->post()!=""){
			
				var_dump($this->input->post('disdate'));
				var_dump($this->input->post('appid'));
			/*foreach($this->input->post('appid') as $id=>$rows){
				$disdate = $this->input->post('disdate');
				$sql = "UPDATE statistic SET depart=? WHERE appid = ?";
				$this->db->query($sql,array($disdate[$id],$rows)); 
			}*/
		}
	}
=======
>>>>>>> 9d5e90a68a977fa41bfed8b59ad91a942da65ae3

}
