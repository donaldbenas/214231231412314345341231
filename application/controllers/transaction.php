<?php

class Transaction extends CI_Controller{
	
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
	
	
	public function index()
	{		
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		$this->load->view('admin/footer');
	}
	
	public function propose($id = null)
	{		
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		
		$this->load->model('modelagency');
		foreach($this->modelagency->agency($id) as $row){
			$data['id'] = $row['id'];
			$data['company'] = $row['company'];
		}
		$nColumns = array('id','company');
		foreach($this->modelagency->agencyName() as $aRow){
			$row = array();
            foreach($nColumns as $col){
                $row[] = $aRow[$col];
                if($col === 'id') $id =  $aRow[$col];
            }
			$row[] = $this->modelagency->getCount('1',$id);
            $data['agency'][] = $row;
		}
		
		if($this->uri->segment(4)=='view'){
			$this->load->model('personalmodel');
			$this->load->model('applicantModel');
			$data['position'] = $this->personalmodel->position();
			$data['nationality'] = $this->personalmodel->nationality();
			$data['civil'] = $this->personalmodel->civil();
			$data['religion'] = $this->personalmodel->religion();
			$data['personalbackground'] = $this->applicantModel->loadpersonalbackground($this->uri->segment(5));
			$data['educationalbackground'] = $this->applicantModel->loadeducationalbackground($this->uri->segment(5));
			$data['skillbackground'] = $this->applicantModel->loadskillbackground($this->uri->segment(5));
			$data['localexperience'] = $this->applicantModel->loadlocalexperience($this->uri->segment(5));
			$data['abroadexperience'] = $this->applicantModel->loadabroadexperience($this->uri->segment(5));
			$data['uploadphoto'] = $this->applicantModel->loaduploadphoto($this->uri->segment(5));
			$data['uploadresume'] = $this->applicantModel->loaduploadresume($this->uri->segment(5));
			$this->load->view('admin/transactionproposeview',$data);
		}else{
			$this->load->view('admin/transactionpropose',$data);
		}
		$this->load->view('admin/footer');
	}
	
	public function view($id){
		$this->load->load('admin/transactionproposeview');
	}
	
	public function recruitment($id = null)
	{		
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		
		$this->load->model('modelagency');
		foreach($this->modelagency->agency($id) as $row){
			$data['id'] = $row['id'];
			$data['company'] = $row['company'];
		}
		$nColumns = array('id','company');
		foreach($this->modelagency->agencyName() as $aRow){
			$row = array();
            foreach($nColumns as $col){
                $row[] = $aRow[$col];
                if($col === 'id') $id =  $aRow[$col];
            }
			$row[] = $this->modelagency->getCount('2',$id);
            $data['agency'][] = $row;
		}
		
		$this->load->view('admin/transactionrecruitment',$data);
		$this->load->view('admin/footer');
	}
	
	public function processing($id = null)
	{		
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		
		$this->load->model('modelagency');
		foreach($this->modelagency->agency($id) as $row){
			$data['id'] = $row['id'];
			$data['company'] = $row['company'];
		}
		$nColumns = array('id','company');
		foreach($this->modelagency->agencyName() as $aRow){
			$row = array();
            foreach($nColumns as $col){
                $row[] = $aRow[$col];
                if($col === 'id') $id =  $aRow[$col];
            }
			$row[] = $this->modelagency->getCount('3',$id);
            $data['agency'][] = $row;
		}
		
		$this->load->view('admin/transactionprocessing',$data);
		$this->load->view('admin/footer');
	}
	
	public function departure($id = null)
	{
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		
		$this->load->model('modelagency');
		foreach($this->modelagency->agency($id) as $row){
			$data['id'] = $row['id'];
			$data['company'] = $row['company'];
		}
		$nColumns = array('id','company');
		foreach($this->modelagency->agencyName() as $aRow){
			$row = array();
            foreach($nColumns as $col){
                $row[] = $aRow[$col];
                if($col === 'id') $id =  $aRow[$col];
            }
			$row[] = $this->modelagency->getCount('4',$id);
            $data['agency'][] = $row;
		}
		
		$this->load->view('admin/transactiondeparture',$data);
		$this->load->view('admin/footer');
	}
	
	public function arrival($id = null)
	{		
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		
		$this->load->model('modelagency');
		foreach($this->modelagency->agency($id) as $row){
			$data['id'] = $row['id'];
			$data['company'] = $row['company'];
		}
		$nColumns = array('id','company');
		foreach($this->modelagency->agencyName() as $aRow){
			$row = array();
            foreach($nColumns as $col){
                $row[] = $aRow[$col];
                if($col === 'id') $id =  $aRow[$col];
            }
			$row[] = $this->modelagency->getCount('5',$id);
            $data['agency'][] = $row;
		}
		
		$this->load->view('admin/transactionarrival',$data);
		$this->load->view('admin/footer');
	}
	
	public function countagency($status,$id)
	{		
		return $this->modelagency->getCount($status,$id);
	}
	
	
    public function jsonp($status,$id = null){
		$this->load->model('modeljsonp');
		echo $this->modeljsonp->getTable($status,$id,$this->uri->segment(4));
	}
	
	public function attachment($id=""){
		$sql = "SELECT * FROM req ORDER BY value";
		$query = $this->db->query($sql);
		$list = array();
		foreach($query->result() as $rows){
			if (file_exists("./documents/attachments/".$id."/".$rows->value.".pdf")){
				array_push($list,array($rows->value => TRUE));
			}else{
				array_push($list,array($rows->value => FALSE));
			}
		}
		var_dump($list);
		return $list;
	}
	
}
