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
	
	public function getdata(){
		echo '
					{
			  "cols": [
					{"id":"","label":"Month","pattern":"","type":"string"},
					{"id":"","label":"Applicant","pattern":"","type":"number"}
				  ],
			  "rows": [
					{"c":[{"v":"Jan","f":null},{"v":1,"f":null}]},
					{"c":[{"v":"Mar","f":null},{"v":2,"f":null}]},
					{"c":[{"v":"Apr","f":null},{"v":3,"f":null}]},
					{"c":[{"v":"May","f":null},{"v":5,"f":null}]},
					{"c":[{"v":"Jun","f":null},{"v":11,"f":null}]},
					{"c":[{"v":"Jul","f":null},{"v":12,"f":null}]},
					{"c":[{"v":"Aug","f":null},{"v":3,"f":null}]},
					{"c":[{"v":"Sep","f":null},{"v":0,"f":null}]},
					{"c":[{"v":"Oct","f":null},{"v":2,"f":null}]},
					{"c":[{"v":"Nov","f":null},{"v":3,"f":null}]},
					{"c":[{"v":"Dec","f":null},{"v":1,"f":null}]},
				  ]
			}';
	}

}
