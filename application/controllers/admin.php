<?php

class Admin extends CI_Controller {	
	
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
		
		$this->load->view('admin/header',$this->databank);
		$this->load->view('admin/nav');
		$this->load->view('admin/databank');
		$this->load->view('admin/admin');
		$this->load->view('admin/footer');
		
		
	}
	
	public function ptinfo(){
		$this->load->database();
		$sql = "SELECT appid, firstname, lastname FROM applicant";
		$query = $this->db->query($sql);
		foreach($query->result() as $rows){
			//resume
			/**$name = './documents/resumes/'.$rows->lastname.'_'.$rows->firstname;
			$type = array('','.doc','.docx','.pdf');
			for($i=0;$i<4;$i++){
				$rfile = $name.$type[$i];
				if (file_exists($rfile)) {
					if($type[$i]==''){
						if(!file_exists('./documents/resumes/'.$rows->appid.'.pdf')){
							rename($rfile,'./documents/resumes/'.$rows->appid.'.pdf');
						}
						$ntype = 'pdf';
					}else{
						if(!file_exists('./documents/resumes/'.$rows->appid.$type[$i])){
							rename($rfile,'./documents/resumes/'.$rows->appid.$type[$i]);
						}
						$ntype = substr($type[$i],1);
					}
					$this->db->query("INSERT INTO resume (appid,type) VALUES (?,?)",array($rows->appid,$ntype));
					break;
				}
			}
			
			//photo
			$pname = './documents/photos/'.$rows->lastname.'_'.$rows->firstname;
			$ptype = array('','.png','.jpg','.jpeg');
			for($l=0;$l<4;$l++){
				$rfile = $pname.$ptype[$l];
				if (file_exists($rfile)) {
					if($ptype[$l]==''){
						if(!file_exists('./documents/photos/'.$rows->appid.'.pdf')){
							rename($rfile,'./documents/photos/'.$rows->appid.'.pdf');
						}
						$pntype = 'pdf';
					}else{
						if(!file_exists('./documents/photos/'.$rows->appid.$ptype[$l])){
							rename($rfile,'./documents/photos/'.$rows->appid.$ptype[$l]);
						}
						$pntype = substr($ptype[$l],1);
					}
					$this->db->query("INSERT INTO photo (appid,type) VALUES (?,?)",array($rows->appid,$pntype));
					break;
				}
			}**/
			
			$rfile ='./documents/photos/'.$rows->appid;
			if(file_exists($rfile.'.pdf')){
				rename($rfile.'.pdf',$rfile.'.jpg');
			}
		}
	}
	
	public function rnm(){
		$this->load->database();
		$sql = "SELECT id, firstname, lastname,appid,middlename, status FROM applicant WHERE activate ='1' ORDER BY lastname";
		$query = $this->db->query($sql);
		$myFile = "./documents/logfile.txt";
		$fh = fopen($myFile, 'w') or die("can't open file");
		$i = 1;
		foreach($query->result() as $rows){
			//$fname = strtolower($rows->lastname)."_".strtolower($rows->firstname)."_".strtolower($rows->middlename);
			$fname = strtolower($rows->lastname)."_".strtolower($rows->firstname);
			if (file_exists("./documents/attachments/".$rows->appid)){
				if($rows->status >= 1){
					/**$stringData = $i.". ".$fname."  (".$rows->id.") (".$rows->status.") \n";
					fwrite($fh, $stringData);
					$i++;**/
				//rename("./documents/attachments/".$fname,"./documents/attachments/".$rows->appid);
				}
			}else{
				mkdir("./documents/attachments/".$rows->appid);
			}
				//rename("./documents/attachments/".$fname,"./documents/attachments/".$rows->id);
		}		
		fclose($fh);	
		//mkdir("./documents/attachments/", 0700);
	    //rename("./documents/attachments/","./documents/attachments/");

	}
	
	public function changeemrid(){
		$this->load->database();
		if($this->input->post()!=""){
			foreach($this->input->post('appid') as $rows){
				$sql = "update applicant set emrid = ? where appid = ?";
				$this->db->query($sql,array($this->input->post('emrid'),$rows));
			}
		}
		$this->load->model('employermodel');
		$data['employer'] =$this->employermodel->load();
		$sql= "select appid, lastname, firstname from applicant where status = 5 order by lastname";
		$query = $this->db->query($sql);
		$data['applicant'] = $query->result();
		$this->load->view('admin/changeemrid',$data);
	}
	
	public function worker($link)
	{
		
		switch($link)
		{
			case 'add' 		:							
							$this->load->view('admin/header',$this->databank);
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
							$this->load->view('admin/header',$this->databank);
							$this->load->view('admin/nav');
							$this->load->view('admin/databank');
							$this->load->model('personalmodel');
							$this->load->model('applicantModel');
							$this->load->model('employermodel');
							$this->load->library('session');
							$this->uploadAttachments();
							$this->session->set_userdata(array('FILE_PATH'=>'/documents/attachments/'.$this->uri->segment(4).'/'));
							$data['requirements'] = $this->employermodel->requirements($this->uri->segment(3));
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
							$data['attachments'] = $this->applicantModel->attachment($this->uri->segment(4));
							if(isset($_POST['submit'])){
								$this->applicantModel->edit($this->input->post('appid'));
								redirect(base_url()."admin/worker/edit/".$this->input->post('appid'));
							}
							$this->load->view('admin/applicantedit',$data);
							$this->load->view('admin/footer');
							break;
			case 'view'		:
							$this->load->view('admin/header',$this->databank);
							$this->load->view('admin/nav');
							$this->load->view('admin/databank');
							$this->load->model('personalmodel');
							$this->load->model('applicantModel');
							$data['position'] = $this->personalmodel->position();
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
			case 'print'	:
							$this->load->view('admin/header',$this->databank);
							$this->load->view('admin/nav');
							$this->load->view('admin/databank');
							$this->load->model('personalmodel');
							$this->load->model('applicantModel');
							$data['position'] = $this->personalmodel->position();
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
							$data['attachments'] = $this->applicantModel->attachment($this->uri->segment(4));
							$this->load->view('admin/applicantprinting',$data);
							$this->load->view('admin/footer');
							break;
			case 'delete'	:
							$this->load->model('applicantModel');
							$this->applicantModel->delete($this->uri->segment(4));
							redirect(base_url()."admin/worker/search");
							break;
			case 'search'	:
							$this->load->view('admin/header',$this->databank);
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
	
	public function printing(){
		$this->load->model('personalmodel');
		$this->load->model('applicantModel');
		$data['position'] = $this->personalmodel->position();
		$data['nationality'] = $this->personalmodel->nationality();
		$data['civil'] = $this->personalmodel->civil();
		$data['religion'] = $this->personalmodel->religion();
		$data['personalbackground'] = $this->applicantModel->loadpersonalbackground($this->uri->segment(3));
		$data['educationalbackground'] = $this->applicantModel->loadeducationalbackground($this->uri->segment(3));
		$data['skillbackground'] = $this->applicantModel->loadskillbackground($this->uri->segment(3));
		$data['localexperience'] = $this->applicantModel->loadlocalexperience($this->uri->segment(3));
		$data['abroadexperience'] = $this->applicantModel->loadabroadexperience($this->uri->segment(3));
		$data['uploadphoto'] = $this->applicantModel->loaduploadphoto($this->uri->segment(3));
		$data['uploadresume'] = $this->applicantModel->loaduploadresume($this->uri->segment(3));
		$this->load->view('admin/applicantprinting',$data);
	}
	
    public function uploadAttachments(){
		$appid = $this->uri->segment(4); 
		$this->load->library('upload'); 
		$this->upload->initialize(array( 
		"upload_path" => "./upload",
		"overwrite" => TRUE,
		"encrypt_name" => TRUE,
		"remove_spaces" => TRUE,
		"allowed_types" => "jpg|png",
		"max_size" => 3000,
		"xss_clean" => FALSE
		));
		if ($this->upload->do_multi_upload("files")) { 
			foreach($this->upload->get_multi_upload_data() as $id => $value){
				$sql = "SELECT * FROM attachments WHERE name = ?";
				$query = $this->db->query($sql, array($value['file_name']));
				if($query->num_rows() == 0){
					$sql = "INSERT INTO attachments (appid,name,path) VALUES(?,?,?)";
					$this->db->query($sql, array($appid,$value['file_name'],$value['full_path']));
				}
			}
		}
	}
	
	public function deleteAttachment(){
		$this->load->helper("file");
		$data['id'] = $this->input->get('id');
		$data['path'] = $this->input->get('path');
		$sql = "DELETE FROM attachments WHERE id = ?";
		$this->db->query($sql,array($data['id']));
		unlink($data['path']); 
		echo json_encode($data);
	}
} 





