<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Switch_business extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library('session');
		$this->load->model('users');
		$this->load->model('dashboard_model');
		$this->load->helper('language');

		$this->user_id	= $this->tank_auth->get_user_id();
		$this->data['email']	= $this->users->get_email($this->user_id);

		$this->data['user'] = $this->users->get_profile($this->user_id);
	}

	function switcher($user_id, $company)
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else{	
				$user_company_data = $this->dashboard_model->get_user_to_company($user_id, $company);

				//IF THE COMPANY IS EMPTY RETURN AND DO NOTHING
				if($user_company_data->comp_id==''){
					redirect(base_url());
				}else{
					//ELSE
					//unset the existing one
					$this->session->unset_userdata('session_user_com', 'session_user_com_name');
					$newdata = array(
                   'session_user_com' => $user_company_data->comp_id,
					'session_user_com_name'=> $user_company_data->company_name,
               		);
					//set the returned company id to the session id and name and 
					$this->session->set_userdata($newdata);
					//return to the dashboard to reflect the change
					redirect(base_url());

				}

			}
	}





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */