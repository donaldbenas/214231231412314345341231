<?php

class Transaction extends CI_Controller{
	
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
	
	
	public function index()
	{		
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		
		$this->load->model('modelagency');
		$data['agency'] = $this->modelagency->agencyName();
		
		$this->load->view('admin/transactionpropose',$data);
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
		
		$this->load->view('admin/transactionpropose',$data);
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
	
	public function countAgency($status,$id)
	{		
		return $this->modelagency->getCount($status,$id);
	}
	
	
    public function jsonp($status,$id = null){
		$this->load->model('modeljsonp');
		echo $this->modeljsonp->getTable($status,$id);
	}
	
}
