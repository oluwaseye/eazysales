<?php

class Customers extends CI_Controller {
               
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


		$this->load->model('Customer_model');
                

		$this->user_id	= $this->tank_auth->get_user_id();

		$this->comp_id = $this->session->userdata('session_user_com');

		$this->data['email']	= $this->users->get_email($this->user_id);

		$this->data['user'] = $this->users->get_profile($this->user_id);
		$this->data['company'] = $this->settings_model->get_business($this->comp_id);

		$this->data['success']=0;

		//getting some settings data for form data
		$this->data['payment_terms']= $this->settings_model->get_payment_terms($this->comp_id);
		$this->data['taxing_schemes']= $this->settings_model->get_taxing_schemes($this->comp_id);
		$this->data['pricing_currencies']= $this->settings_model->get_pricings_currencies($this->comp_id);
		$this->data['shipping_carriers']= $this->settings_model->get_shipping_carriers($this->comp_id);
		$this->data['currencies']= $this->settings_model->get_all_currencies();
		$this->data['countries']= $this->settings_model->get_all_countries();
		$this->data['locations']= $this->settings_model->get_locations($this->comp_id);
		$this->data['cus_locations']= $this->settings_model->get_cus_location_types();
		$this->data['sales_reps']= $this->settings_model->get_sales_reps($this->comp_id);
		$this->data['payment_methods']= $this->settings_model->get_payment_methods();
		$this->data['card_types']= $this->settings_model->get_card_types();
		

		//for custom error, total breakdown
		$this->data['custom_error']='';

	}	
	public function business($comp_id)
	{			
		$this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = base_url().'/customers/business/'.$comp_id;
        $config['total_rows'] = $this->Customer_model->count();
        $config['per_page'] = 3;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
		//$this->data['results'] = $this->Vendor_model->get('company_vendors_info','*',$comp_id,$config['per_page'],$this->uri->segment(3));
		$this->data['results'] = $this->Customer_model->get('*',$comp_id,$config['per_page'],$this->uri->segment(4));
	
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business_main/customers_list');
			$this->load->view('_partials/footer');
			
		
	}

		public function customer_products($comp_id)
	{			
	
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business_main/customer_products');
			$this->load->view('_partials/footer');
			
		
	}

		public function customer_history($comp_id)
	{			
	
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business_main/customer_history');
			$this->load->view('_partials/footer');
			
		
	}

	public function add_customer($comp_id)
	{			
		
				$this->form_validation->set_rules( 'name', 'Name', 'required|trim|xss_clean|max_length[60]' );
				$this->form_validation->set_rules( 'balance', 'Balance', 'required|trim|xss_clean|decimal' );
				$this->form_validation->set_rules( 'discount', 'Discount', 'trim|xss_clean|integer' );
				$this->form_validation->set_rules( 'loc_id', 'Location Type', 'xss_clean' );
				$this->form_validation->set_rules( 'pay_method_id', 'Payment Method', 'xss_clean' );
				$this->form_validation->set_rules( 'carrier_id', 'Shipping Carrier', 'xss_clean' );
				$this->form_validation->set_rules( 'price_currency_id', 'Pricing & Currency', 'xss_clean' );
				$this->form_validation->set_rules( 'sales_rep_id', 'Sales Rep', 'xss_clean' );
				$this->form_validation->set_rules( 'address', 'Address', 'required|trim|xss_clean' );
				$this->form_validation->set_rules( 'contact_name', 'Contact Name', 'required|trim|xss_clean|max_length[60]' );
				$this->form_validation->set_rules( 'contact_phone', 'Contact Phone', 'trim|xss_clean|integer|max_length[15]' );
				$this->form_validation->set_rules( 'contact_fax', 'Contact Fax', 'trim|xss_clean|integer|max_length[15]' );
				$this->form_validation->set_rules( 'contact_email', 'Contact Email', 'required|trim|xss_clean|valid_email|max_length[80]' );
				$this->form_validation->set_rules( 'contact_web', 'Contact Website', 'trim|xss_clean|max_length[60]' );
				$this->form_validation->set_rules( 'currency_id', 'Currency', 'xss_clean|max_length[10]' );
				$this->form_validation->set_rules( 'discount', 'Discount', 'trim|xss_clean|max_length[10]' );
				$this->form_validation->set_rules( 'payment_terms_id', 'Payment Terms', 'xss_clean|max_length[10]' );
				$this->form_validation->set_rules( 'taxing_scheme_id', 'Taxing Scheme', 'xss_clean|max_length[10]' );
				$this->form_validation->set_rules( 'alt_contact', 'Alternative Contact', 'trim|xss_clean|max_length[30]' );
				$this->form_validation->set_rules( 'alt_contact_2', 'Alternative Contact 2', 'trim|xss_clean|max_length[30]' );
				$this->form_validation->set_rules( 'alt_contact_3', 'Alternative Contact 3', 'trim|xss_clean|max_length[30]' );
				$this->form_validation->set_rules( 'emergency_phone', 'Emergency Phone', 'trim|xss_clean|max_length[14]|integer' );
				$this->form_validation->set_rules( 'remarks', 'Remarks', 'trim|xss_clean|max_length[80]' );
				

				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
        if ($this->form_validation->run('add_customer') == FALSE)
        {
             

		$this->load->view('_partials/header', $this->data);
		$this->load->view('business_main/customers_add');
		$this->load->view('_partials/footer'); 	

        } else
        {                            
            $data = array(
            		'comp_id' => $comp_id,
                     'name' => set_value('name'),
                    'balance' => set_value('balance'),
					'address' => set_value('address'),
					/*'state' => set_value('state'),
					'country' => set_value('country'),
					*/'loc_id' => set_value('loc_id'),
					'contact_name' => set_value('contact_name'),
					'contact_phone' => set_value('contact_phone'),
					'contact_fax' => set_value('contact_fax'),
					'contact_email' => set_value('contact_email'),
					'contact_web' => set_value('contact_web'),
					'price_currency_id' => set_value('price_currency_id'),
					'discount' => set_value('discount'),
					'sales_rep_id' => set_value('sales_rep_id'),
					'carrier_id' => set_value('carrier_id'),
					'pay_method_id' => set_value('pay_method_id'),
					'payment_terms_id' => set_value('payment_terms_id'),
					'taxing_scheme_id' => set_value('taxing_scheme_id'),
					'alt_contact' => set_value('alt_contact'),
					'alt_contact_2' => set_value('alt_contact_2'),
					'alt_contact_3' => set_value('alt_contact_3'),
					'emergency_phone' => set_value('emergency_phone'),
					'remarks' => set_value('remarks')
            );
			
		//	var_dump($data);
           
			if ($this->Customer_model->add($data) == TRUE)
			{
				redirect(base_url().'customers/business/'.$comp_id);
			}
			else
			{
				$this->data['custom_error'] = '<div class="alert alert-danger"><i class="fa fa-frown-o"> Sorry, something went wrong. Please try again.</div>';

				$this->load->view('_partials/header', $this->data);
				$this->load->view('business_main/customers_add');
				$this->load->view('_partials/footer'); 
				

			}
		}		   
		
		
	}

		public function update_customer($id,$comp_id)
		{		
				
				$this->form_validation->set_rules( 'name', 'Name', 'required|trim|xss_clean|max_length[60]' );
				$this->form_validation->set_rules( 'balance', 'Balance', 'required|trim|xss_clean|decimal' );
				$this->form_validation->set_rules( 'discount', 'Discount', 'trim|xss_clean|integer' );
				$this->form_validation->set_rules( 'loc_id', 'Location Type', 'xss_clean' );
				$this->form_validation->set_rules( 'pay_method_id', 'Payment Method', 'xss_clean' );
				$this->form_validation->set_rules( 'carrier_id', 'Shipping Carrier', 'xss_clean' );
				$this->form_validation->set_rules( 'price_currency_id', 'Pricing & Currency', 'xss_clean' );
				$this->form_validation->set_rules( 'sales_rep_id', 'Sales Rep', 'xss_clean' );
				$this->form_validation->set_rules( 'address', 'Address', 'required|trim|xss_clean' );
				$this->form_validation->set_rules( 'contact_name', 'Contact Name', 'required|trim|xss_clean|max_length[60]' );
				$this->form_validation->set_rules( 'contact_phone', 'Contact Phone', 'trim|xss_clean|integer|max_length[15]' );
				$this->form_validation->set_rules( 'contact_fax', 'Contact Fax', 'trim|xss_clean|integer|max_length[15]' );
				$this->form_validation->set_rules( 'contact_email', 'Contact Email', 'required|trim|xss_clean|valid_email|max_length[80]' );
				$this->form_validation->set_rules( 'contact_web', 'Contact Website', 'trim|xss_clean|max_length[60]' );
				$this->form_validation->set_rules( 'currency_id', 'Currency', 'xss_clean|max_length[10]' );
				$this->form_validation->set_rules( 'discount', 'Discount', 'trim|xss_clean|max_length[10]' );
				$this->form_validation->set_rules( 'payment_terms_id', 'Payment Terms', 'xss_clean|max_length[10]' );
				$this->form_validation->set_rules( 'taxing_scheme_id', 'Taxing Scheme', 'xss_clean|max_length[10]' );
				$this->form_validation->set_rules( 'alt_contact', 'Alternative Contact', 'trim|xss_clean|max_length[30]' );
				$this->form_validation->set_rules( 'alt_contact_2', 'Alternative Contact 2', 'trim|xss_clean|max_length[30]' );
				$this->form_validation->set_rules( 'alt_contact_3', 'Alternative Contact 3', 'trim|xss_clean|max_length[30]' );
				$this->form_validation->set_rules( 'emergency_phone', 'Emergency Phone', 'trim|xss_clean|max_length[14]|integer' );
				$this->form_validation->set_rules( 'remarks', 'Remarks', 'trim|xss_clean|max_length[80]' );
				
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
        if ($this->form_validation->run('update_customer') == FALSE)
        {
             

		$this->data['result'] = $this->Customer_model->get_single($id, $comp_id);

		$this->load->view('_partials/header', $this->data);
		$this->load->view('business_main/customers_update');
		$this->load->view('_partials/footer'); 		

        } else
        {                            
            $data = array(
                     'name' => set_value('name'),
                    'balance' => set_value('balance'),
					'address' => set_value('address'),
					/*'state' => set_value('state'),
					'country' => set_value('country'),
					*/'loc_id' => set_value('loc_id'),
					'contact_name' => set_value('contact_name'),
					'contact_phone' => set_value('contact_phone'),
					'contact_fax' => set_value('contact_fax'),
					'contact_email' => set_value('contact_email'),
					'contact_web' => set_value('contact_web'),
					'price_currency_id' => set_value('price_currency_id'),
					'discount' => set_value('discount'),
					'sales_rep_id' => set_value('sales_rep_id'),
					'carrier_id' => set_value('carrier_id'),
					'pay_method_id' => set_value('pay_method_id'),
					'payment_terms_id' => set_value('payment_terms_id'),
					'taxing_scheme_id' => set_value('taxing_scheme_id'),
					'alt_contact' => set_value('alt_contact'),
					'alt_contact_2' => set_value('alt_contact_2'),
					'alt_contact_3' => set_value('alt_contact_3'),
					'emergency_phone' => set_value('emergency_phone'),
					'remarks' => set_value('remarks')
            );
			
			//var_dump($data);
           
			if ($this->Customer_model->edit($data,$comp_id,$id) == TRUE)
			{
				redirect(base_url().'customers/business/'.$comp_id);
			}
			else
			{
				$this->data['custom_error'] = '<div class="alert alert-danger"><i class="fa fa-frown-o"> Sorry, something went wrong. Please try again.</div>';
				$this->load->view('_partials/header', $this->data);
				$this->load->view('business_main/customers_update');
				$this->load->view('_partials/footer'); 	

			}
		}

			
		}


	



			public function delete_customer($id, $comp_id)
		{	
			if ($this->Customer_model->delete($id, $comp_id) == TRUE) // the information has therefore been successfully saved in the db
			{
					redirect(base_url().'customers/business/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}

	


}
?>