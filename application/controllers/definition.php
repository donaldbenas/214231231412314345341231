<?php

class Definition extends CI_Controller{

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
		$this->load->model('personalmodel');
		$data['position'] = $this->personalmodel->position();
		$data['nationality'] = $this->personalmodel->nationality();
		$data['reason'] = $this->personalmodel->reason();
		$data['religion'] = $this->personalmodel->religion();
		$data['req'] = $this->personalmodel->req();
		$data['country'] = $this->personalmodel->country();
		$data['civil'] = $this->personalmodel->civil();
		$data['employer'] = $this->personalmodel->employer();
		$data['requirements'] = $this->personalmodel->requirements(1);
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		$this->load->view('admin/definition',$data);
		$this->load->view('admin/footer');		
		
	}

}
