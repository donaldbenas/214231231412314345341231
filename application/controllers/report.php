<?php

class Report extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('databankmodel');		
		$this->databank['applicant'] = $this->databankmodel->load('1');
		$this->databank['recruit'] = $this->databankmodel->load('2');
		$this->databank['process'] = $this->databankmodel->load('3');
		$this->databank['departure'] = $this->databankmodel->load('4');
		$this->databank['arrival'] = $this->databankmodel->load('5');
				
	}
	
	public function index()	{
		
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		$this->load->view('admin/report');
		$this->load->view('admin/footer');
			
		
	}

}
