<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else{	
			//get companies the user has created
			$user_companies = $this->dashboard_model->check_user_companies($this->user_id);
			if($user_companies==FALSE){
				//if the user has NOT created any company or business, REDIRECT TO THE CREATE NEW COMPANY AREA
					redirect(base_url().'newbusiness');
			}else{
				
				$user_company = $this->dashboard_model->get_first_company($this->user_id);

				

				if($this->session->userdata('session_user_com')=='none'){

				//STORING THE USER'S COMPANY ID IN A SESSION
				$newdata = array('session_user_com'  => $user_company->comp_id, 
				'session_user_com_name'=>$user_company->company_name);

				$this->session->set_userdata($newdata);

//				echo $this->session->userdata('session_user_com');
				$company = $this->session->userdata('session_user_com');

				redirect(base_url().'dashboard/business/'.$company);

				}else{
					$company = $this->session->userdata('session_user_com');
					redirect(base_url().'dashboard/business/'.$company);

				}
				}
			}
	}


	function business($company){

		//checking user company
		$user_company = $this->dashboard_model->check_user_to_company($this->user_id, $company);

		//checking user company
		$user_company_data = $this->dashboard_model->get_user_to_company($this->user_id, $company);

		//checking user profile completion
		$profile_completion = $this->dashboard_model->check_profile_completion($this->user_id);

		//CHECK IF THE USER COMPANY SESSION HAS BEEN SET ALREADY
				if($this->session->userdata('session_user_com')=='none'){

				//STORING THE USER'S COMPANY ID IN A SESSION
				$newdata = array('session_user_com'  => $user_company_data->comp_id, 
				'session_user_com_name'=>$user_company_data->company_name);

				$this->session->set_userdata($newdata);

//				echo $this->session->userdata('session_user_com');

				}

		//if user is assigned to the company
		if($user_company==TRUE){

			//if user profile is incomplete, send the text incomplete to the view
			if($profile_completion==FALSE){
				$this->data['complete_profile']='not_complete';
			}else{
				$this->data['complete_profile']='complete';
			}

		$this->data['my_company'] = $this->dashboard_model->get_user_owned_companies($this->user_id);

		$this->load->view('_partials/header', $this->data);
		$this->load->view('dashboard');
		$this->load->view('_partials/footer');
		}else{
			$this->load->view('errors/404');
		}
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */