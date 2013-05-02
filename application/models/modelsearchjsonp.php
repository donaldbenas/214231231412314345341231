<?php

class modelSearchJsonp extends CI_Model{
	
	public function jsonTable(){
		
		$this->load->database();
	
		$aColumns = array('applicant.appid AS id', 'status.value AS status', 'applicant.firstname AS firstname', 'applicant.lastname AS lastname', 'list.value AS position');
        $cColumns = array('applicant.appid', 'status.value', 'applicant.firstname', 'applicant.lastname', 'list.value');
        $nColumns = array('id', 'status', 'firstname', 'lastname', 'position');
        
		$sIndexColumn = 'applicant.id';
		        
        $sTable = 'applicant LEFT JOIN list ON applicant.position1=list.id';
        $sTable.= '			 LEFT JOIN status ON applicant.status=status.id';
		
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
			$row[] = "<a href='".base_url()."admin/worker/view/".$id."' class='btn btn-info'><i class='icon-search'></i></a></td>";
			$row[] = "<a onclick=\"trash('".$id."','".$aRow['firstname']."')\" href='#myModal' role='button' data-toggle='modal' class='btn btn-danger'><i class='icon-trash'></i></a></td>";
			
            $output['aaData'][] = $row;
		}
		
		return $this->input->get('callback').'('.json_encode( $output ).');';
	}


}
