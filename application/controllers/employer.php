<?php 

class Employer extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('databankmodel');	
		$this->load->model('employermodel');	
		$this->load->model('personalmodel');	
		$this->databank['applicant'] = $this->databankmodel->load('1');
		$this->databank['propose'] = $this->databankmodel->load('2');
		$this->databank['recruit'] = $this->databankmodel->load('3');
		$this->databank['process'] = $this->databankmodel->load('4');
		$this->databank['departure'] = $this->databankmodel->load('5');
		$this->databank['arrival'] = $this->databankmodel->load('6');
	}
	
	public function index(){
		$data['employers'] = $this->employermodel->load();
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		$this->load->view('admin/employer_list',$data);
		$this->load->view('admin/footer');
	}
	
	public function add(){
		if($this->input->post()!=""){
			$this->employermodel->save();
			redirect(base_url()."employer");
		}
		$data['country'] = $this->personalmodel->country();
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		$this->load->view('admin/employer_add',$data);
		$this->load->view('admin/footer');		
	}
	
	public function edit($id){
		if($this->input->post()!=""){
			$this->employermodel->save($id);
			redirect(base_url()."employer");
		}
		$data['country'] = $this->personalmodel->country();
		$data['employer'] = $this->employermodel->load($id);
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		$this->load->view('admin/employer_edit',$data);
		$this->load->view('admin/footer');		
	}
	
	public function manage($id){
		$data['employer'] = $this->employermodel->load($id);
		$data['requirements'] = $this->personalmodel->requirements($id);
		$data['req'] = $this->personalmodel->req();
		$data['position'] = $this->personalmodel->position();
		$data['job'] = $this->personalmodel->job($id);
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		$this->load->view('admin/employer_manage',$data);
		$this->load->view('admin/footer');		
	}
	
	
}
