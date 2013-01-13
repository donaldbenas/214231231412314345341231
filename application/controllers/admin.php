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
			case 'edit' 		:							
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
							if(isset($_POST['submit'])){
								$this->applicantModel->edit($this->input->post('appid'));
								redirect(base_url()."admin/worker/edit/".$this->input->post('appid'));
							}
							$this->load->view('admin/applicantedit',$data);
							$this->load->view('admin/footer');
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
	
    public function jsonp(){
		
		$this->load->helper('url');
		$this->load->database();
		
        $aColumns = array('applicant.appid AS id', 'applicant.firstname AS firstname', 'applicant.lastname AS lastname', 'list.value AS position');
        $cColumns = array('applicant.appid', 'applicant.firstname', 'applicant.lastname', 'list.value');
        $nColumns = array('id', 'firstname', 'lastname', 'position');
        
		$sIndexColumn = 'applicant.id';
		        
        $sTable = 'applicant LEFT JOIN list ON applicant.position1=list.id';
		
		$iDisplayStart = $this->input->get('iDisplayStart');
		$iDisplayLength = $this->input->get('iDisplayLength');
		
		$sLimit = "";
		if ( isset($iDisplayStart) && $iDisplayLength != '-1' )
		{
			$sLimit = "LIMIT ".mysql_real_escape_string( $iDisplayStart ).", ".mysql_real_escape_string( $iDisplayLength );
		}
		
		$sOrder = "";
		if ( isset( $_GET['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
			{
				if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= $cColumns[ intval( $_GET['iSortCol_'.$i] ) ]." ".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		
		$sWhere = "";
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($cColumns) ; $i++ )
			{
				if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" )
				{
					$sWhere .= $cColumns[$i]." LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
				}
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
			}
		}
		
		if($sWhere=="") $sWhere = " WHERE applicant.activate=1";
		else $sWhere .= " AND applicant.activate=1";
		
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
		";
		$rResult = $this->db->query($sQuery);
		
		$sQuery = "
			SELECT FOUND_ROWS() AS Count
		";
		$rResultFilterTotal = $this->db->query($sQuery);
		$aResultFilterTotal = $rResultFilterTotal->result();
		$iFilteredTotal = $aResultFilterTotal[0]->Count;	
		
		$sQuery = "
			SELECT COUNT(".$sIndexColumn.") AS Count
			FROM   $sTable  WHERE applicant.activate=1
		";		
		$rResultTotal = $this->db->query($sQuery);
        $aResultTotal = $rResultTotal->result();
        $iTotal = $aResultTotal[0]->Count;
		
		
		
		$output = array(
			"sEcho" => intval($this->input->get_post('sEcho', true)),
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iFilteredTotal,
			"aaData" => array()
		);
		
		foreach ($rResult->result_array() as $aRow)
		{
			$row = array();
            
            foreach($nColumns as $col)
            {
                $row[] = $aRow[$col];
                if($col === 'id') $id =  $aRow[$col];
            }
            
			$row[] = "<a href='".base_url()."admin/worker/edit/".$id."' class='btn btn-warning'><i class='icon-edit'></i></a></td>";
			$row[] = "<a href='".base_url()."admin/worker/delete/".$id."' class='btn btn-danger'><i class='icon-trash'></i></a></td>";
			
            $output['aaData'][] = $row;
		}
		
		echo $this->input->get('callback').'('.json_encode( $output ).');';
	
	}
} 





