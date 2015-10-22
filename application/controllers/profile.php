<?php

class Profile extends CI_Controller {
               
	public function __construct()
	{
 		parent::__construct();
 		$this->load->library('tank_auth');
 		$this->load->helper('url');
		$this->load->model('users');
		$this->load->helper('language');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('user_profile');

		$this->user_id	= $this->tank_auth->get_user_id();
		$this->session_comp	= $this->session->userdata('session_user_com');
		$this->data['email']	= $this->users->get_email($this->user_id);

		$this->data['user'] = $this->users->get_profile($this->user_id);

		$this->data['success']=0;

	}	
	public function edit_profile()
	{			
		$this->form_validation->set_rules('fullname', 'Fullname', 'required|trim|xss_clean|max_length[40]');			
		$this->form_validation->set_rules('sex', 'Sex', 'required|trim|xss_clean|max_length[10]');			
		$this->form_validation->set_rules('city', 'City', 'trim|xss_clean|max_length[30]');			
		//$this->form_validation->set_rules('zipcode', 'ZipCode', 'trim|xss_clean|max_length[8]');			
		$this->form_validation->set_rules('state_province', 'State/Province', 'trim|xss_clean|max_length[20]');			
		$this->form_validation->set_rules('country', 'Country', 'required|trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|xss_clean|max_length[11]');			
		$this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'trim|xss_clean');			
		//$this->form_validation->set_rules('marial_status', 'Marial Status', 'trim|xss_clean|max_length[8]');
			
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('profile/edit_profile');
			$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(

					       	'fullname' => set_value('fullname'),
					       	'sex' => set_value('sex'),
					       	'city' => set_value('city'),
					       	/*'zip_code' => set_value('zip_code'),*/
					       	'state_province' => set_value('state_province'),
					       	'country' => set_value('country'),
					       	'mobile' => set_value('mobile'),
					       	'dob' => set_value('date_of_birth')/*,
					       	'marital_status' => set_value('marital_status')*/
						);
					
			
			if($this->user_profile->SaveProfile($form_data, $this->user_id)){

			$this->data['success']=1;
			}else{
				$this->data['success']=2;
			}
			

			$this->load->view('_partials/header', $this->data);
			$this->load->view('profile/edit_profile');
			$this->load->view('_partials/footer');
			
		}
	}

	public function edit_credentials(){
			$this->load->view('_partials/header', $this->data);
			$this->load->view('profile/credentials');
			$this->load->view('_partials/footer');
	}

	public function email_preferences(){

			$this->data['email']	= $this->users->get_email($this->user_id);
		
			$this->load->view('_partials/header', $this->data);
			$this->load->view('profile/email_pref');
			$this->load->view('_partials/footer');
	}

	public function businesses(){

	$this->data['my_company'] = $this->dashboard_model-> get_user_owned_companies($this->user_id);
	$this->data['current_company'] = $this->session_comp;


		$this->load->view('_partials/header', $this->data);
			$this->load->view('profile/my_businesses');
			$this->load->view('_partials/footer');


	}


}
?>