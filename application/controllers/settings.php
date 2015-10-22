<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('settings_model');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');

		$this->user_id	= $this->tank_auth->get_user_id();
		$this->data['email']	= $this->users->get_email($this->user_id);
		$this->comp_id = $this->session->userdata('session_user_com');
		$this->data['user'] = $this->users->get_profile($this->user_id);

		$this->data['company'] = $this->settings_model->get_business($this->comp_id);

		$this->data['success']=0;
	}

	
		/******************************************************************** *********************** **************/
		/**********************START OF COMPANY OR BUSINESS INFORMATION SETTINGS CONTROLLER ***********************/
		/******************************************************************** *********************** *************/

	public function business($comp_id)
	{	
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
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/business_settings');
			$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(

					       'company_name' => set_value('company_name'),
					       	'contact_address' => set_value('contact_address'),
					       	'city' => set_value('city'),
					       	'state_region' => set_value('state_region'),
					       	'country' => set_value('country'),
					       	'contact_email' => set_value('contact_email'),
					       	'website' => set_value('website')
						);
					
			// run insert model to write data to db
		
			if($this->settings_model->SaveBusinessInfo($form_data, $this->comp_id, $this->user_id)){

			$this->data['success']=1;
			}else{
				$this->data['success']=2;
			}

			
			

			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/business_settings');
			$this->load->view('_partials/footer');
			
		}
	}



	public function business_update($comp)
	{	
		$this->data['company_id'] = $this->settings_model->get_business($comp);

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
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/business_update');
			$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(

					       'company_name' => set_value('company_name'),
					       	'contact_address' => set_value('contact_address'),
					       	'city' => set_value('city'),
					       	'state_region' => set_value('state_region'),
					       	'country' => set_value('country'),
					       	'contact_email' => set_value('contact_email'),
					       	'website' => set_value('website')
						);
					
			// run insert model to write data to db
		
			if($this->settings_model->SaveBusinessInfo($form_data, $this->data['company_id'], $this->user_id)){

			$this->data['success']=1;
			}else{
				$this->data['success']=2;
			}

			
			

			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/business_update');
			$this->load->view('_partials/footer');
			
		}
	}

		/********************************************************************/
		/*******************START OF PRODUCT AND INVENTORY *****************/
		/********************************************************************/
		public function product_inventory($comp_id)
		{	
			$this->data['success_product']=0;
		//product settings
		$this->data['prod_settings'] = $this->settings_model->settings_product($comp_id);
		//inventory settings
		$this->data['inven_settings'] = $this->settings_model->settings_inventory($comp_id);
		//locations listings
		$this->data['loc_settings'] = $this->settings_model->get_locations($comp_id);
		//default inventory location
		$this->data['def_inv_location'] = $this->settings_model->get_default_location($comp_id);

		//units of measurements
		$this->data['unit_type_length'] = $this->settings_model->get_unit_type_length();
		$this->data['unit_type_weight'] = $this->settings_model->get_unit_type_weight();

		
		$this->form_validation->set_rules('prod_desc', 'Show Product Description', 'trim|xss_clean|max_length[3]');			
		$this->form_validation->set_rules('unit_measure', 'Show Unit Measurement', 'trim|xss_clean|max_length[3]');			
		$this->form_validation->set_rules('unit_type_l', 'Unit Type Length', 'required|trim|xss_clean|max_length[20]');			
		$this->form_validation->set_rules('unit_type_w', 'Unit Type Weight', 'required|trim|xss_clean|max_length[20]');
			


		$this->form_validation->set_rules('default_location', 'Default Location', 'trim|xss_clean|max_length[80]');			
		$this->form_validation->set_rules('warn_negative', 'Negative Inventory', 'trim|xss_clean|max_length[3]');			
		
			
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/prod_inv_settings');
			$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(

					       'show_description' => set_value('prod_desc'),
					       	'show_measurement' => set_value('unit_measure'),
					       	'unit_type_length' => set_value('unit_type_l'),
					       	'unit_type_weight' => set_value('unit_type_w')
						);

			$inventory_data = array(

					       'default_location_id' => set_value('default_location'),
					       	'warn_negative' => set_value('warn_negative')
						);


			
		// if the product settings info or inventory settings info has been inserted
			if(($this->settings_model->SaveProductInfo($form_data, $this->comp_id)) || ($this->settings_model->SaveInventoryInfo($inventory_data, $this->comp_id))){

			$this->data['success_product']=1;
			}else{
				$this->data['success_product']=2;
			}


			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/prod_inv_settings');
			$this->load->view('_partials/footer');			
		}
			
		}


				/********************************************************************/
		/*******************START OF PRICING N TAX *****************/
		/********************************************************************/
		public function pricing_tax($comp_id)
		{	
		
			
			$this->data['currencies'] = $this->settings_model->get_all_currencies();
			$this->data['pricing_settings'] = $this->settings_model->get_settings_pricing($comp_id);
			$this->data['tax_settings'] = $this->settings_model->get_settings_tax($comp_id);
			$this->data['taxing_schemes'] = $this->settings_model->get_taxing_schemes($comp_id);
			$this->data['product_tax_codes'] = $this->settings_model->get_prod_tax_codes($comp_id);


			
		
		$this->form_validation->set_rules('default_currency', 'Default Currency', 'trim|xss_clean|min_length[3]');			
		$this->form_validation->set_rules('default_pricing_currency', 'Default Pricing Currency', 'trim|xss_clean|min_length[3]');			
		$this->form_validation->set_rules('use_current_cost', 'Use Current Cost', 'trim|xss_clean|max_length[4]');			
			


		$this->form_validation->set_rules('show_taxes', 'Show Taxes', 'trim|xss_clean|max_length[80]');			
		$this->form_validation->set_rules('default_tax_scheme', 'Default Tax Scheme', 'required|trim|xss_clean|min_length[1]');			
		$this->form_validation->set_rules('default_product_tax_code', 'Default Product Tax Code', 'required|trim|xss_clean|min_length[1]');			
		$this->form_validation->set_rules('show_product_tax_code', 'Show Product Tax', 'trim|xss_clean|max_length[3]');			
		$this->form_validation->set_rules('show_sec_tax', 'Show Secondary Tax', 'trim|xss_clean|max_length[3]');			
			
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/pricingtax_settings');
			$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$pricing_data = array(

					       'default_currency' => set_value('default_currency'),
					       	'default_pricing_type' => set_value('default_pricing_currency'),
					       	'use_current_cost' => set_value('use_current_cost')
						);

			$tax_data = array(

					       'show_taxes' => set_value('show_taxes'),
					       	'default_scheme_id' => set_value('default_tax_scheme'),
					       	'default_tax_code_id' => set_value('default_product_tax_code'),
					       	'show_product_tax_code' => set_value('show_product_tax_code'),
					       	'show_sec_tax' => set_value('show_sec_tax')
						);


			
		// if the product settings info or inventory settings info has been inserted
			if(($this->settings_model->SavePricingInfo($pricing_data, $this->comp_id)) || ($this->settings_model->SaveTaxInfo($tax_data, $this->comp_id))){

			$this->data['success']=1;
			}else{
				$this->data['success']=2;
			}


			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/pricingtax_settings');
			$this->load->view('_partials/footer');			
		}
			
		}




		/********************************************************************/
		/*******************START OF ADDRESSES CONTROLLERS *****************/
		/********************************************************************/

		public function addresses($comp_id)
		{	
			$this->data['addresses_settings'] = $this->settings_model->get_addresses($comp_id);
		
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/addresses_list_settings');
			$this->load->view('_partials/footer');
			
		}


		public function add_address($comp_id)
		{	
		
		$this->form_validation->set_rules('address', 'Receiving Address', 'required|trim|xss_clean|max_length[255]');
			
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/addresses_add_settings');
			$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
							'comp_id' => $comp_id,
					       	'address' => set_value('address')
						);
					
			// run insert model to write data to db
		
			if ($this->settings_model->SaveAddress($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/addresses/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
			
		}


		public function update_address($id,$comp_id)
		{	
		//go get the single data
		$this->data['address'] = $this->settings_model->get_single_address($id, $comp_id);


		$this->form_validation->set_rules('address', 'Receiving Address', 'required|trim|xss_clean|max_length[255]');
			
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/addresses_update_settings');
			$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'address' => set_value('address')
						);
					
			// run insert model to write data to db
		
			if ($this->settings_model->UpdateAddress($id, $comp_id, $form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/addresses/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
			
		}

		public function delete_address($id, $comp_id)
		{	
			if ($this->settings_model->DeleteAddress($id, $comp_id) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/addresses/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
			
		}

		/********************************************************************/
		/*******************END OF ADDRESSES CONTROLLERS *****************/
		/********************************************************************/

		/********************************************************************/
		/*******************START OF LOCATION & SUB LOCATION CONTROLLERS *****************/
		/********************************************************************/

		public function locations($comp_id)
		{	
		$this->data['loc_settings'] = $this->settings_model->get_locations($comp_id);

			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/locations_list_settings');
			$this->load->view('_partials/footer');
			
		}


			public function add_location($comp_id)
		{	
		
			
			$this->form_validation->set_rules('location_name', 'Location Name', 'required|trim|xss_clean|max_length[80]');
			
			$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
			if ($this->form_validation->run() == FALSE) // validation hasn't been passed
			{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/locations_add_settings');
			$this->load->view('_partials/footer');
			}
			else // passed validation proceed to post success logic
			{
		 	// build array for the model
			
			$form_data = array(
					       	'location' => set_value('location_name'),
					       	'comp_id' => $comp_id
						);
					
			// run insert model to write data to db
		
			if ($this->settings_model->SaveLocation($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/locations/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
			
		}


		public function update_location($id,$comp_id)
		{	
		//go get the single data
		$this->data['location'] = $this->settings_model->get_single_location($id, $comp_id);


		$this->form_validation->set_rules('location_name', 'Location Name', 'required|trim|xss_clean|max_length[255]');
			
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/locations_update_settings');
			$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'location' => set_value('location_name')
						);
					
			// run insert model to write data to db
		
			if ($this->settings_model->UpdateLocation($id, $comp_id, $form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/locations/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
			
		}

		public function delete_location($id, $comp_id)
		{	
			if (($this->settings_model->DeleteLocation($id, $comp_id)==TRUE) && ($this->settings_model->DeleteLocationsSubs($id, $comp_id) == TRUE)) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/locations/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			//echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
				redirect(base_url().'settings/locations/'.$comp_id);
			}
			
		}

		public function sub_locations($loc_id,$comp_id)
		{	
		$this->data['sub_loc_settings'] = $this->settings_model->get_sub_locations($loc_id, $comp_id);

		$this->data['loc_settings'] = $this->settings_model->get_single_location($loc_id, $comp_id);

			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/sub_locations_list_settings');
			$this->load->view('_partials/footer');
			
		}

				public function add_sub_location($loc_id, $comp_id)
		{	
			
			$this->data['loc_settings'] = $this->settings_model->get_single_location($loc_id, $comp_id);
			
			$this->form_validation->set_rules('sub_location_name', 'Sub Location Name', 'required|trim|xss_clean|max_length[80]');
			
			$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
			if ($this->form_validation->run() == FALSE) // validation hasn't been passed
			{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/sub_locations_add_settings');
			$this->load->view('_partials/footer');
			}
			else // passed validation proceed to post success logic
			{
		 	// build array for the model
			
			$form_data = array(
					       	
					       	'location_id'=>$loc_id,
					       	'comp_id' => $comp_id,
					       	'name' => set_value('sub_location_name')
						);
					
			// run insert model to write data to db
		
			if ($this->settings_model->SaveSubLocation($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/sub_locations/'.$loc_id.'/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
			
		}


		public function update_sub_location($loc_id, $id,$comp_id)
		{	
		//go get the single data
		$this->data['loc_settings'] = $this->settings_model->get_single_location($loc_id, $comp_id);
		$this->data['sub_location'] = $this->settings_model->get_single_sub_location($loc_id, $id, $comp_id);


		$this->form_validation->set_rules('sub_location_name', 'Sub Location Name', 'required|trim|xss_clean|max_length[255]');
			
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/sub_locations_update_settings');
			$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'name' => set_value('sub_location_name')
						);
					
			// run insert model to write data to db
		
			if ($this->settings_model->UpdateSubLocation($loc_id, $id, $comp_id, $form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/sub_locations/'.$loc_id.'/'.$comp_id);    // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
			
		}

		public function delete_sub_location($location_id, $id, $comp_id)
		{	
			if ($this->settings_model->DeleteSubLocation($location_id, $id, $comp_id) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/sub_locations/'.$location_id.'/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
			
		}

			/********************************************************************/
		/*******************END OF LOCATION & SUB LOCATION CONTROLLERS *****************/
		/********************************************************************/



			/********************************************************************/
		/*******************START OF PRICING / CURRENCIES CONTROLLERS *****************/
		/********************************************************************/

		public function pricing_currencies($comp_id)
		{	
		$this->data['pricing_currencies'] = $this->settings_model->get_pricings_currencies($comp_id);
		$this->data['currencies'] = $this->settings_model->get_all_currencies();
		
		$this->form_validation->set_rules('p1', 'Pricing Label', 'required|trim|xss_clean|max_length[30]');
		$this->form_validation->set_rules('p2', 'Pricing Label', 'required|trim|xss_clean|max_length[30]');
		$this->form_validation->set_rules('p3', 'Pricing Label', 'required|trim|xss_clean|max_length[30]');
		$this->form_validation->set_rules('p4', 'Pricing Label', 'required|trim|xss_clean|max_length[30]');
		$this->form_validation->set_rules('p5', 'Pricing Label', 'required|trim|xss_clean|max_length[30]');

		$this->form_validation->set_rules('c1', 'Currency Label', 'xss_clean|max_length[1]');
		$this->form_validation->set_rules('c2', 'Currency Label', 'xss_clean|max_length[1]');
		$this->form_validation->set_rules('c3', 'Currency Label', 'xss_clean|max_length[1]');
		$this->form_validation->set_rules('c4', 'Currency Label', 'xss_clean|max_length[1]');
		$this->form_validation->set_rules('c5', 'Currency Label', 'xss_clean|max_length[1]');

		/*
		
		$this->form_validation->set_rules('active1', 'Active/Deactivate', 'xss_clean|max_length[1]');
		*/
		$this->form_validation->set_rules('active2', 'Active/Deactivate', 'xss_clean|max_length[1]');
		$this->form_validation->set_rules('active3', 'Active/Deactivate', 'xss_clean|max_length[1]');
		$this->form_validation->set_rules('active4', 'Active/Deactivate', 'xss_clean|max_length[1]');
		$this->form_validation->set_rules('active5', 'Active/Deactivate', 'xss_clean|max_length[1]');
				
			
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/pricingcurrency_list_settings');
			$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'p1' => set_value('p1'),
					       	'p2' => set_value('p2'),
					       	'p3' => set_value('p3'),
					       	'p4' => set_value('p4'),
					       	'p5' => set_value('p5'),

					       	/*'c1' => set_value('c1'),*/
					       	'c2' => set_value('c2'),
					       	'c3' => set_value('c3'),
					       	'c4' => set_value('c4'),
					       	'c5' => set_value('c5'),

					       	'active1' => set_value('active1'),
					       	'active2' => set_value('active2'),
					       	'active3' => set_value('active3'),
					       	'active4' => set_value('active4'),
					       	'active5' => set_value('active5')
					       	
					       	
						);
					
			// run insert model to write data to db
		
			if ($this->settings_model->UpdatePricing_Currency($comp_id, $form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/pricing_currencies/'.$comp_id);     // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}


			
			
		}


		/*public function add_pricing_currency($comp_id)
		{	
		$this->data['currencies'] = $this->settings_model->get_all_currencies($comp_id);
		$this->form_validation->set_rules('pricing_name', 'Pricing Name', 'required|trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('currency', 'Currency', 'required|trim|xss_clean|min_length[3]');			
			
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/pricingcurrency_add_settings');
			$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
							'comp_id' => $comp_id,
					       	'pricing_name' => set_value('pricing_name'),
					       	'currency' => set_value('currency')
					       	
						);
					
			// run insert model to write data to db
		
			if ($this->settings_model->SavePricing_Currency($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/pricing_currencies/'.$comp_id);     // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
				
		}*/


		/*public function update_pricing_currency($id,$comp_id)
		{	
		$this->data['currencies'] = $this->settings_model->get_all_currencies($comp_id);
		$this->data['pricing_currency'] = $this->settings_model->get_single_pricing_currency($id, $comp_id);

		$this->form_validation->set_rules('pricing_name', 'Pricing Name', 'required|trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('currency', 'Currency', 'required|trim|xss_clean|min_length[3]');			
			
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/pricingcurrency_update_settings');
			$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'pricing_name' => set_value('pricing_name'),
					       	'currency' => set_value('currency')
					       	
						);
					
			// run insert model to write data to db
		
			if ($this->settings_model->UpdatePricing_Currency($id, $comp_id, $form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/pricing_currencies/'.$comp_id);     // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
				
		}*/

		/*public function delete_pricing_currency($id, $comp_id)
		{	
			if ($this->settings_model->DeletePricingCurrency($id, $comp_id) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/pricing_currencies/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
			
		}*/

				/********************************************************************/
		/*******************END OF PRICING / CURRENCIES CONTROLLERS *****************/
		/********************************************************************/



				/********************************************************************/
		/*******************START OF TAXING SCHEMES CONTROLLERS *****************/
		/********************************************************************/

		public function taxing_schemes($comp_id)
		{	
		$this->data['taxing_schemes'] = $this->settings_model->get_taxing_schemes($comp_id);

			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/taxingschemes_list_settings');
			$this->load->view('_partials/footer');
			
		}

		public function add_taxing_scheme($comp_id)
		{
		$this->form_validation->set_rules('scheme_name', 'Scheme Name', 'required|trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('primary_tax_name', 'Primary Tax Name', 'required|trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('primary_tax_rate', 'Primary Tax Rate', 'required|trim|xss_clean|is_numeric|max_length[3]');			
		$this->form_validation->set_rules('secondary_tax_name', 'Secondary Tax Name', 'required|trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('secondary_tax_rate', 'Secondary Tax Rate', 'required|trim|xss_clean|is_numeric|max_length[3]');			
		$this->form_validation->set_rules('comp_sec_tax_primary', 'Compund Secondary Tax on Primary', 'required|trim|xss_clean|is_numeric|max_length[2]');			
		$this->form_validation->set_rules('tax_shipping', 'Tax on Shipping', 'required|trim|xss_clean|is_numeric|max_length[2]');
			
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/taxingscheme_add_settings');
			$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
							'comp_id' => $comp_id,
					       	'scheme_name' => set_value('scheme_name'),
					       	'primary_tax_name' => set_value('primary_tax_name'),
					       	'primary_tax_rate' => set_value('primary_tax_rate'),
					       	'secondary_tax_name' => set_value('secondary_tax_name'),
					       	'secondary_tax_rate' => set_value('secondary_tax_rate'),
					       	'comp_sec_tax_primary' => set_value('comp_sec_tax_primary'),
					       	'tax_shipping' => set_value('tax_shipping')
						);
					
			// run insert model to write data to db
		
			if ($this->settings_model->SaveTaxScheme($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/taxing_schemes/'.$comp_id);     // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
			
		}


		public function update_taxing_scheme($id, $comp_id)
		{
		
		$this->data['taxing_scheme'] = $this->settings_model->get_single_taxing_scheme($id, $comp_id);

		$this->form_validation->set_rules('scheme_name', 'Scheme Name', 'required|trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('primary_tax_name', 'Primary Tax Name', 'required|trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('primary_tax_rate', 'Primary Tax Rate', 'required|trim|xss_clean|is_numeric|max_length[3]');			
		$this->form_validation->set_rules('secondary_tax_name', 'Secondary Tax Name', 'required|trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('secondary_tax_rate', 'Secondary Tax Rate', 'required|trim|xss_clean|is_numeric|max_length[3]');			
		$this->form_validation->set_rules('comp_sec_tax_primary', 'Compund Secondary Tax on Primary', 'required|trim|xss_clean|is_numeric|max_length[2]');			
		$this->form_validation->set_rules('tax_shipping', 'Tax on Shipping', 'required|trim|xss_clean|is_numeric|max_length[2]');
			
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/taxingscheme_update_settings');
			$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'scheme_name' => set_value('scheme_name'),
					       	'primary_tax_name' => set_value('primary_tax_name'),
					       	'primary_tax_rate' => set_value('primary_tax_rate'),
					       	'secondary_tax_name' => set_value('secondary_tax_name'),
					       	'secondary_tax_rate' => set_value('secondary_tax_rate'),
					       	'comp_sec_tax_primary' => set_value('comp_sec_tax_primary'),
					       	'tax_shipping' => set_value('tax_shipping')
						);
					
			// run insert model to write data to db
		
			if ($this->settings_model->UpdateTaxingScheme($id, $comp_id, $form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/taxing_schemes/'.$comp_id);     // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
			
		}

		public function delete_taxing_scheme($id, $comp_id)
		{	
			if ($this->settings_model->DeleteTaxingScheme($id, $comp_id) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/taxing_schemes/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
			
		}

			/********************************************************************/
		/*******************END OF TAXING SCHEMES CONTROLLERS *****************/
		/********************************************************************/



		/********************************************************************/
		/*******************START OF PRODUCT TAX CODE CONTROLLERS *****************/
		/********************************************************************/

		public function product_tax_codes($comp_id)
		{	
		$this->data['product_tax_codes'] = $this->settings_model->get_prod_tax_codes($comp_id);

			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/producttaxcodes_list_settings');
			$this->load->view('_partials/footer');
			
		}

		public function add_product_tax_code($comp_id)
		{	
					
			$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('code', 'Code', 'required|trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('primary_tax_applicable', 'Primary Tax Applicable', 'required|trim|xss_clean|is_numeric|max_length[3]');			
		$this->form_validation->set_rules('secondary_tax_applicable', 'Secondary Tax Applicable', 'required|trim|xss_clean|is_numeric|max_length[3]');
			
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/product_taxcode_add_settings');
			$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
							'comp_id' => $comp_id,
					       	'name' => set_value('name'),
					       	'code' => set_value('code'),
					       	'primary_tax_applicable' => set_value('primary_tax_applicable'),
					       	'secondary_tax_applicable' => set_value('secondary_tax_applicable')
						);
					
			// run insert model to write data to db
		
			if ($this->settings_model->SaveProduct_Tax_Code($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/product_tax_codes/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
			
		}


		public function update_product_tax_code($id, $comp_id)
		{	
		
		$this->data['product_tax_code'] = $this->settings_model->get_single_prodtax_code($id, $comp_id);

		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('code', 'Code', 'required|trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('primary_tax_applicable', 'Primary Tax Applicable', 'required|trim|xss_clean|is_numeric|max_length[3]');			
		$this->form_validation->set_rules('secondary_tax_applicable', 'Secondary Tax Applicable', 'required|trim|xss_clean|is_numeric|max_length[3]');
			
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/product_taxcode_update_settings');
			$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'name' => set_value('name'),
					       	'code' => set_value('code'),
					       	'primary_tax_applicable' => set_value('primary_tax_applicable'),
					       	'secondary_tax_applicable' => set_value('secondary_tax_applicable')
						);
					
			// run insert model to write data to db
		
			if ($this->settings_model->UpdateProductTaxCode($id, $comp_id, $form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/product_tax_codes/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
			
		}


		public function delete_product_tax_code($id, $comp_id)
		{	
			if ($this->settings_model->DeleteProductTaxCode($id, $comp_id) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'settings/product_tax_codes/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
			
		}

		/********************************************************************/
		/*******************END OF PRODUCT TAX CODE CONTROLLERS *****************/
		/********************************************************************/




		/********************************************************************/
		/**********************START OF DOC NUMBERS   ***********************/
		/********************************************************************/

		public function doc_numbers($comp_id)
		{	

		$this->data['doc_settings'] = $this->settings_model->get_docnumbers($comp_id);


		$this->form_validation->set_rules('sales_order', 'Sales Order', 'required|trim|xss_clean|max_length[40]');			
		$this->form_validation->set_rules('sales_quote', 'Sales Quote', 'required|trim|xss_clean|max_length[40]');			
		$this->form_validation->set_rules('purchase_order', 'Purchase Order', 'required|trim|xss_clean|max_length[40]');			
		$this->form_validation->set_rules('count_sheet', 'Count Sheet', 'required|trim|xss_clean|max_length[40]');			
		$this->form_validation->set_rules('work_order', 'Work Order', 'required|trim|xss_clean|max_length[40]');			
			
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/docnumbers_settings');
			$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(

					       'sales_order' => set_value('sales_order'),
					       	'sales_quote' => set_value('sales_quote'),
					       	'purchase_order' => set_value('purchase_order'),
					       	'count_sheet' => set_value('count_sheet'),
					       	'work_order' => set_value('work_order')
						);
					
			// run insert model to write data to db
		
			if($this->settings_model->SaveDocNumbersInfo($form_data, $this->comp_id)){

			$this->data['success']=1;
			}else{
				$this->data['success']=2;
			}

		
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business/docnumbers_settings');
			$this->load->view('_partials/footer');
		}
			
		}


		/********************************************************************/
		/**********************END OF DOC NUMBERS   ***********************/
		/********************************************************************/

	
}


/* End of file auth.php */
/* Location: ./application/controllers/auth.php */