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
		$this->load->view('admin/footer');
	}
	
	public function propose($id = null)
	{		
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		
		if($this->input->post()!=""){
			$this->load->model('approvemodel');
			$this->approvemodel->propose($this->input->post('appid'),$id);
			redirect(base_url()."transaction/propose/".$id);
		}
		
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
	
	public function recruitment($id = null)
	{		
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
				
		if($this->input->post()!=""){
			$this->load->model('approvemodel');
			if($this->input->post('erase')==""){
				foreach($this->input->post('appidall') as $val){
					$this->approvemodel->recruit($val,$this->input->post('comment'));
				}
			}else{
				$this->approvemodel->recruit($this->input->post('appid'),$this->input->post('comment'),false);
			}
			redirect(base_url()."transaction/recruitment/".$id);
			
		}
		
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
		$this->load->model('modelagency');
		$this->load->model('employermodel');
				
		if($this->input->post()!=""){
			$this->load->model('approvemodel');
			if($this->input->post('erase')==""){
				foreach($this->input->post('appidall') as $val){
					$this->approvemodel->process($val,$this->input->post('comment'));
				}
			}else{
				$this->approvemodel->process($this->input->post('appid'),$this->input->post('comment'),false);
			}
			redirect(base_url()."transaction/processing/".$id);
			
		}
		
		if($id!=null && ($this->uri->segment(4)==""))
			$this->employermodel->getvalidate($id);
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
		
		if($this->uri->segment(4)=='view'){
			$this->load->view('admin/header',$this->databank);
			$this->load->view('admin/nav');
			$this->load->view('admin/databank');
			$this->load->library('session');
			$this->session->set_userdata(array('FILE_PATH'=>'/documents/attachments/'.$this->uri->segment(5).'/'));
			$this->load->model('personalmodel');
			$this->load->model('applicantModel');
			$data['requirements'] = $this->employermodel->requirements($this->uri->segment(3));
			$data['position'] = $this->personalmodel->position();
			$data['uploadphoto'] = $this->applicantModel->loaduploadphoto($this->uri->segment(5));
			$data['uploadresume'] = $this->applicantModel->loaduploadresume($this->uri->segment(5));
			$data['personalbackground'] = $this->applicantModel->loadpersonalbackground($this->uri->segment(5));
			$this->load->view('admin/transactionprocessingview',$data);
		}else{
			$this->load->view('admin/header',$this->databank);
			$this->load->view('admin/nav');
			$this->load->view('admin/databank');
			$this->load->view('admin/transactionprocessing',$data);
		}
		$this->load->view('admin/footer');
	}
	
	public function departure($id = null)
	{		
		$this->load->model('modelagency');
		$this->load->model('employermodel');
		$this->load->model('personalmodel');
		$data['country'] = $this->personalmodel->country();
		if($this->input->post()!=""){			
			$this->load->model('approvemodel');
			if($this->input->post('erase')=="false"){	
				$this->approvemodel->depart($this->input->post('appid'),$this->input->post('comment'),$this->input->post('departure'),$this->input->post('destination'));
			}else{
				$this->approvemodel->depart($this->input->post('appid'),$this->input->post('comment'),$this->input->post('departure'),$this->input->post('destination'),false);
			}
			redirect(base_url()."transaction/departure/".$id);
		}
		if($id!=null && ($this->uri->segment(4)==""))
			$this->employermodel->getvalidate($id);
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
		
		if($this->uri->segment(4)=='view'){
			$this->load->view('admin/header',$this->databank);
			$this->load->view('admin/nav');
			$this->load->view('admin/databank');
			$this->load->library('session');
			$this->session->set_userdata(array('FILE_PATH'=>'/documents/attachments/'.$this->uri->segment(5).'/'));
			$this->load->model('personalmodel');
			$this->load->model('applicantModel');
			$data['requirements'] = $this->employermodel->requirements($this->uri->segment(3));
			$data['position'] = $this->personalmodel->position();
			$data['uploadphoto'] = $this->applicantModel->loaduploadphoto($this->uri->segment(5));
			$data['uploadresume'] = $this->applicantModel->loaduploadresume($this->uri->segment(5));
			$data['personalbackground'] = $this->applicantModel->loadpersonalbackground($this->uri->segment(5));
			$this->load->view('admin/transactiondepartureview',$data);
		}else{
			$this->load->view('admin/header',$this->databank);
			$this->load->view('admin/nav');
			$this->load->view('admin/databank');
			$this->load->view('admin/transactiondeparture',$data);
		}
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
		if($this->input->get('company')=="") $company = null;
		else $company = $this->input->get('company');
		echo $this->modeljsonp->getTable($status,$id,$company);
	}
	
    public function jsonprecruited($status,$id = null){
		$this->load->model('modeljsonp');
		if($this->input->get('company')=="") $company = null;
		else $company = $this->input->get('company');
		echo $this->modeljsonp->getTableRecruited($status,$id,$company);
	}
	
    public function jsonproccesed($status,$id = null){
		$this->load->model('modeljsonp');	
		if($this->input->get('company')=="") $company = null;
		else $company = $this->input->get('company');
		echo $this->modeljsonp->getTableProccesed($status,$id,$company);
	}
	
    public function jsondeparted($status,$id = null){
		$this->load->model('modeljsonp');	
		if($this->input->get('company')=="") $company = null;
		else $company = $this->input->get('company');
		echo $this->modeljsonp->getTableDeparted($status,$id,$company);
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
	
	public function doc(){
		$this->load->database();
		$sql = "SELECT appid FROM applicant";
		$query = $this->db->query($sql);
		foreach($query->result() as $row){
			$sql = "INSERT INTO documents (appid) VALUES (?)";
			$this->db->query($sql, array($row->appid));
		}
	}
	
    public function upload(){
		$this->load->library('session');
		$this->load->helper("file");
		
        error_reporting(E_ALL | E_STRICT);

        $this->load->helper("upload.class");
        $upload_handler = new UploadHandler();        

        header('Pragma: no-cache');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Content-Disposition: inline; filename="files.json"');
        header('X-Content-Type-Options: nosniff');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT, DELETE');
        header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'OPTIONS':
                break;
            case 'HEAD':
            case 'GET':
                $upload_handler->get();
                break;
            case 'POST':
                if (isset($_REQUEST['_method']) && $_REQUEST['_method'] === 'DELETE') {
                    $upload_handler->delete();
                } else {
                    $upload_handler->post();
                }
                break;
            case 'DELETE':
                $upload_handler->delete();
                break;
            default:
                header('HTTP/1.1 405 Method Not Allowed');
        }

    }
	
}
