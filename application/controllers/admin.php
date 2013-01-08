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
							$this->load->view('admin/applicantadd');
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
							redirect(site_url());
		}
	}
	
    public function jsonp(){
		
		$this->load->helper('url');
		$this->load->database();
		
        $aColumns = array('applicant.id AS id', 'applicant.firstname AS firstname', 'applicant.lastname AS lastname', 'list.value AS position');
        $cColumns = array('applicant.id', 'applicant.firstname', 'applicant.lastname', 'list.value');
        $nColumns = array('id', 'firstname', 'lastname', 'position');
        
		$sIndexColumn = 'applicant.id';
		        
        $sTable = 'applicant LEFT JOIN list ON applicant.id=list.id';
		
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
			FROM   $sTable
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
            
			$row[] = "<button class='btn btn-warning'><i class='icon-edit'></i></button></td>";
			$row[] = "<button class='btn btn-danger'><i class='icon-trash'></i></button></td>";
			
            $output['aaData'][] = $row;
		}
		
		echo $this->input->get('callback').'('.json_encode( $output ).');';
	
	}
} 





