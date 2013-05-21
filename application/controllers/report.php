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

}
