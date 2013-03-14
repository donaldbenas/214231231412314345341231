<?php

class Admin extends CI_Controller {	
	
	public function index()
	{
		$this->load->helper('url');
		
		$this->load->view('admin/header');
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		$this->load->view('admin/admin');
		$this->load->view('admin/footer');
		
		
	}
	
	public function worker($link)
	{
		$this->load->helper('url');
		
		switch($link)
		{
			case 'add' 		:							
							$this->load->view('admin/header');
							$this->load->view('admin/nav');
							$this->load->view('admin/databank');
							$this->load->model('personalmodel');
							$this->load->model('applicantModel');
							$data['position'] = $this->personalmodel->position();
							$data['nationality'] = $this->personalmodel->nationality();
							$data['civil'] = $this->personalmodel->civil();
							$data['religion'] = $this->personalmodel->religion();
							if(isset($_POST['submit'])){
								$this->applicantModel->save();
								redirect(base_url().'admin/worker/add');
							}
							$this->load->view('admin/applicantadd',$data);
							$this->load->view('admin/footer');
							break;
			case 'edit' 	:							
							$this->load->view('admin/header');
							$this->load->view('admin/nav');
							$this->load->view('admin/databank');
							$this->load->model('personalmodel');
							$this->load->model('applicantModel');
							$data['position'] = $this->personalmodel->position();
							$data['nationality'] = $this->personalmodel->nationality();
							$data['civil'] = $this->personalmodel->civil();
							$data['religion'] = $this->personalmodel->religion();
							if($this->uri->total_segments()==3) redirect(base_url()."admin/worker/search/");
							$data['personalbackground'] = $this->applicantModel->loadpersonalbackground($this->uri->segment(4));
							$data['educationalbackground'] = $this->applicantModel->loadeducationalbackground($this->uri->segment(4));
							$data['skillbackground'] = $this->applicantModel->loadskillbackground($this->uri->segment(4));
							$data['localexperience'] = $this->applicantModel->loadlocalexperience($this->uri->segment(4));
							$data['abroadexperience'] = $this->applicantModel->loadabroadexperience($this->uri->segment(4));
							$data['uploadphoto'] = $this->applicantModel->loaduploadphoto($this->uri->segment(4));
							$data['uploadresume'] = $this->applicantModel->loaduploadphoto($this->uri->segment(4));
							if(isset($_POST['submit'])){
								$this->applicantModel->edit($this->input->post('appid'));
								redirect(base_url()."admin/worker/edit/".$this->input->post('appid'));
							}
							$this->load->view('admin/applicantedit',$data);
							$this->load->view('admin/footer');
							break;
			case 'view'		:
							$this->load->view('admin/header');
							$this->load->view('admin/nav');
							$this->load->view('admin/databank');
							$this->load->model('personalmodel');
							$this->load->model('applicantModel');
							$data['nationality'] = $this->personalmodel->nationality();
							$data['civil'] = $this->personalmodel->civil();
							$data['religion'] = $this->personalmodel->religion();
							$data['personalbackground'] = $this->applicantModel->loadpersonalbackground($this->uri->segment(4));
							$data['educationalbackground'] = $this->applicantModel->loadeducationalbackground($this->uri->segment(4));
							$data['skillbackground'] = $this->applicantModel->loadskillbackground($this->uri->segment(4));
							$data['localexperience'] = $this->applicantModel->loadlocalexperience($this->uri->segment(4));
							$data['abroadexperience'] = $this->applicantModel->loadabroadexperience($this->uri->segment(4));
							$data['uploadphoto'] = $this->applicantModel->loaduploadphoto($this->uri->segment(4));
							$data['uploadresume'] = $this->applicantModel->loaduploadresume($this->uri->segment(4));
							$this->load->view('admin/applicantview',$data);
							$this->load->view('admin/footer');
							break;
			case 'delete'	:
							$this->load->model('applicantModel');
							$this->applicantModel->delete($this->uri->segment(4));
							redirect(base_url()."admin/worker/search");
							break;
			case 'search'	:
							$this->load->view('admin/header');
							$this->load->view('admin/nav');
							$this->load->view('admin/databank');
							$this->load->view('admin/applicantsearch');
							$this->load->view('admin/footer');
							break;
			default			:
							redirect(base_url());
		}
	}
	
    public function jsonp()
    {		
		$this->load->helper('url');
        $this->load->model('modelsearchjsonp');
        echo $this->modelsearchjsonp->jsonTable();
	
	}
} 





