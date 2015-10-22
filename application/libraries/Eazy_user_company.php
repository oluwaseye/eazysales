<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('phpass-0.1/PasswordHash.php');

define('STATUS_ACTIVATED', '1');
define('STATUS_NOT_ACTIVATED', '0');

class Eazy_user_company
{
	private $error = array();

	function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library('tank_auth');
		
		$this->ci->load->model('site_model');

	}

	public function check_user_to_company($user_id, $company)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('id', $company);
		$query = $this->db->get('user_companies');
		$data =  array_shift($query->result());
		if(empty($data)){
			return FALSE;
		}else{
			return TRUE;
		}
	}

}

/* End of file Tank_auth.php */
/* Location: ./application/libraries/Tank_auth.php */