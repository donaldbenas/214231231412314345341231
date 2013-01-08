<?php

class modelAgency extends CI_Model{
	
	var $id;
	var $company;
	var $representative;
	var $position;
	var $address;
	var $location;
	var $date;
	var $email;
	var $password;
	var $telephone;
	var $mobile;
	var $remark;

	public function agency($id)
	{
		$this->db->select('id,company');
		$this->db->from('employer');
		$this->db->where('id',$id);
		$this->db->order_by('company','asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function agencyName()
	{
		$this->db->select('id,company');
		$this->db->from('employer');
		$this->db->order_by('company','asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getCount($status,$id)
	{
		$this->db->select('applicant.id');
		$this->db->from('applicant');
		$this->db->join('employer','employer.id=applicant.emrid','left');
		$this->db->where('applicant.emrid',$id);
		$this->db->where('applicant.status',$status);
		$query = $this->db->get();
		return count($query->result_array());
	}

	public function agencyCount()
	{
		$this->db->select('id');
		$this->db->from('employer');
		$query = $this->db->get();
		return count($query->result_array());
	}


}
