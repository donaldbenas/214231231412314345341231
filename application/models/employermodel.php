<?php 

class employerModel extends CI_Model{
	
	var $id;
	var $company;

	public function __construct(){
		parent::__construct();
		$this->load->database();		
	}
	
	public function load($id=""){
		if($id==""){
			$sql = "SELECT *
						FROM employer
					ORDER BY company
					";
			$query = $this->db->query($sql);
			return $query->result();
		}else{
			$sql = "SELECT *
						FROM employer
						WHERE id = ?
					";
			$query = $this->db->query($sql,array($id));
			foreach($query->result() as $rows){
				$this->id = $rows->id;
				$this->company = $rows->company;
			}
			return $query->result();
		}
	
	}
	
	public function save($id=""){
		if($id==""){
			$para = array(
				$this->input->post('company'),
				$this->input->post('representative'),
				$this->input->post('position'),
				$this->input->post('address'),
				$this->input->post('location'),
				date("Y-m-d"),
				$this->input->post('email'),
				$this->input->post('password1'),
				$this->input->post('telephone'),
				$this->input->post('mobile'),
				$this->input->post('remarks')
				);
			$sql = "
					INSERT INTO employer(
						company, representative,
						position, address,
						location, date,
						email, password,
						telephone, mobile,
						remarks)
					VALUES(?,?,?,?,?,?,?,?,?,?,?)					
					";
			$this->db->query($sql,$para);
		}else{
			$para = array(
				$this->input->post('company'),
				$this->input->post('representative'),
				$this->input->post('position'),
				$this->input->post('address'),
				$this->input->post('location'),
				date("Y-m-d"),
				$this->input->post('email'),
				$this->input->post('password1'),
				$this->input->post('telephone'),
				$this->input->post('mobile'),
				$this->input->post('remarks'),
				$id
				);
			$sql = "
					UPDATE employer SET
						company = ?, representative = ?,
						position = ?, address = ?,
						location = ?, date = ?,
						email = ?, password = ?,
						telephone = ?, mobile = ?,
						remarks = ?		
					WHERE id = ?				
					";
			$this->db->query($sql,$para);
		}
	}
	
	public function requirements($id=""){
		if($id!=""){
			$sql = "SELECT * FROM requirements WHERE emrid = ?";
			$query = $this->db->query($sql,array($id));
			if($query->num_rows() > 0){
				foreach($query->result() as $row)
					$file = explode(',',$row->value);
				$sql = "SELECT * FROM req";
				$query = $this->db->query($sql);
				$data = array();
				foreach($query->result() as $rows){
					foreach($file as $doc){
						if($doc == $rows->id)
							$data[] = array('requirement' => $rows->value);
					}
				}
				return $data;
			}else
				return "";
			
		}else{
			return false;
		}
	}
	
	public function validate($appid="",$requirements=""){
		$path = './documents/attachments/'.$appid.'/';
		$type = array('','.doc','.docx','.pdf');
		$validate = false;
		foreach($requirements as $doc){
			for($i=0;$i<4;$i++){
				$rfile = $path.$doc['requirement'].$type[$i];
				if(file_exists($rfile)) {
					$validate = true;
					break;
				}
				$validate = false;
			}
			if(!$validate)
				break;
		}
		$sql = "UPDATE documents SET complete = ? WHERE appid = ?";
		$this->db->query($sql,array($validate,$appid));
		return $validate;
	}	

	public function getvalidate($emrid=""){			
		$sql = "SELECT appid, emrid FROM applicant";
		$sql.= "	LEFT JOIN employer ON applicant.emrid = employer.id";
		$sql.= "	WHERE applicant.status > 2";
		if($emrid!="")
		$sql.= "	AND applicant.emrid = '".$emrid."'";	
		$query = $this->db->query($sql);
		foreach($query->result() as $rows){
			$documents = $this->requirements($rows->emrid);
			if($documents !="" ){
				$this->validate($rows->appid,$documents);
			}
		}
	}

}
