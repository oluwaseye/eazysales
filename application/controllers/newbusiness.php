<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class NewBusiness extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		
		$this->load->library('tank_auth');
		$this->load->model('users');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('new_business');
		$this->load->model('dashboard_model');

		$this->user_id	= $this->tank_auth->get_user_id();
	}

	


	function index()
	{	
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}else{	

		//get companies the user has created
		$data['user_companies'] = $this->dashboard_model->check_user_companies($this->user_id);
			
		$data['email']	= $this->users->get_email($this->user_id);
		$data['user'] = $this->users->get_profile($this->user_id);

		$this->form_validation->set_rules('company_name', 'Company name', 'required|trim|xss_clean|max_length[100]');			
		$this->form_validation->set_rules('contact_address', 'Contact Address', 'required|trim|xss_clean|max_length[100]');			
		$this->form_validation->set_rules('city', 'City', 'required|trim|xss_clean|max_length[50]');			
		$this->form_validation->set_rules('state_region', 'State/Region', 'required|alpha|trim|xss_clean|max_length[60]');			
		$this->form_validation->set_rules('country', 'Country', 'required|trim|xss_clean|max_length[60]');			
		$this->form_validation->set_rules('contact_email', 'Contact Email', 'required|trim|xss_clean|max_length[50]');			
		$this->form_validation->set_rules('website', 'Website', 'required|trim|xss_clean|max_length[60]|prep_url');
			
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
					$this->load->view('_partials/header_welcome', $data);
					$this->load->view('newbusiness');
					$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$unique_comp_id = $this->seyz_unique_id($this->user_id);

			$form_data = array(
							'comp_id'=> $unique_comp_id,
							'user_id'=>$this->user_id,
					       	'company_name' => set_value('company_name'),
					       	'contact_address' => set_value('contact_address'),
					       	'city' => set_value('city'),
					       	'state_region' => set_value('state_region'),
					       	'country' => set_value('country'),
					       	'contact_email' => set_value('contact_email'),
					       	'website' => set_value('website')
						);

			$comp_data = array('comp_id'=>$unique_comp_id);
			$comp_uid_data = array('comp_id'=>$unique_comp_id, 'user_id'=>$this->user_id);
					
			// run insert model to write data to db
		
			if (($this->new_business->SaveCompany($form_data) == TRUE)&&
			($this->new_business->Save_D_Priviledge($comp_uid_data) == TRUE)&&
			($this->new_business->Save_D_Currency($comp_data) == TRUE)&&
			($this->new_business->Save_D_Inventory($comp_data) == TRUE)&&
			($this->new_business->Save_D_Products($comp_data) == TRUE)&&
			($this->new_business->Save_D_Pricing($comp_data) == TRUE)&&
			($this->new_business->Save_D_Pricing_Currency($comp_data) == TRUE)&&
			($this->new_business->Save_D_Tax($comp_data) == TRUE)&&
			($this->new_business->Save_D_Docnumbers($comp_data) == TRUE)&&
			($this->new_business->Save_D_Pricing_Scheme($comp_data) == TRUE)) // the information has therefore been successfully saved in the db
			{
				redirect('dashboard');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
}
	function seyz_unique_id($user_id)
	{
			return substr(md5(uniqid(time())), 0, 8).time().$user_id;
	}




		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */