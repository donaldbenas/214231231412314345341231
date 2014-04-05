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
		$this->load->model('definitionmodel');
		if($this->input->post('positionName')!=""){
			foreach($this->input->post('positionName') as $name)
				$this->definitionmodel->position(strtoupper($name));
		}
		if($this->input->post('nationalityName')!=""){
			foreach($this->input->post('nationalityName') as $name)
				$this->definitionmodel->nationality(strtoupper($name));
		}
		if($this->input->post('reasonName')!=""){
			foreach($this->input->post('reasonName') as $name)
				$this->definitionmodel->reason(strtoupper($name));
		}
		if($this->input->post('countryName')!=""){
			foreach($this->input->post('countryName') as $name)
				$this->definitionmodel->country(strtoupper($name));
		}
		if($this->input->post('religionName')!=""){
			foreach($this->input->post('religionName') as $name)
				$this->definitionmodel->religion(strtoupper($name));
		}
		if($this->input->post('civilName')!=""){
			foreach($this->input->post('civilName') as $name)
				$this->definitionmodel->civil(strtoupper($name));
		}
		if($this->input->post('documentName')!=""){
			foreach($this->input->post('documentName') as $name)
				$this->definitionmodel->document(strtoupper($name));
		}
		$data['position'] = $this->personalmodel->position();
		$data['nationality'] = $this->personalmodel->nationality();
		$data['reason'] = $this->personalmodel->reason();
		$data['religion'] = $this->personalmodel->religion();
		$data['req'] = $this->personalmodel->req();
		$data['country'] = $this->personalmodel->country();
		$data['civil'] = $this->personalmodel->civil();
		$data['employer'] = $this->personalmodel->employer();
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		$this->load->view('admin/definition',$data);
		$this->load->view('admin/footer');		
		
	}

}
