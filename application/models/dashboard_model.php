<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
	class dashboard_model extends CI_Model{

		private $table_name = 'user_companies';


public function get_user_owned_companies($user_id)
	{
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('user_companies');
		return $query->result();
		
	}


	public function check_user_companies($user_id)
	{
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('user_companies');
		$data =  array_shift($query->result());
		if(empty($data)){
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function check_user_to_company($user_id, $company)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('comp_id', $company);
		$query = $this->db->get('user_companies');
		$data =  array_shift($query->result());
		if(empty($data)){
			return FALSE;
		}else{
			return TRUE;
		}
	}

		public function get_user_to_company($user_id, $company)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('comp_id', $company);
		$query = $this->db->get('user_companies');
		return array_shift($query->result());
		
	}

	public function get_user_to_companies($user_id, $company)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('comp_id', $company);
		$query = $this->db->get('user_companies');
		return $query->result();
		
	}


	public function get_first_company($user_id){
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('user_companies');
		return array_shift($query->result());
	}

	public function check_profile_completion($user_id){
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('user_profiles');
		$data =  array_shift($query->result());
		if(($data->fullname=='')&&($data->sex=='')&&($data->country=='')){
			return FALSE;
		}else{
			return TRUE;
		}
	}

}

?>