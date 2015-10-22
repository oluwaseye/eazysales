<?php

class Inventory extends CI_Controller {
               
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
		$this->load->model(array('Inventory_model','Vendor_model'));

		$this->user_id	= $this->tank_auth->get_user_id();

		$this->comp_id = $this->session->userdata('session_user_com');

		$this->data['email']	= $this->users->get_email($this->user_id);

		$this->data['user'] = $this->users->get_profile($this->user_id);
		$this->data['company'] = $this->settings_model->get_business($this->comp_id);
		//product category
		$this->data['categories'] = $this->Inventory_model->get_categories($this->comp_id);

		$this->data['product_types'] = $this->Inventory_model->get_productTypes();
		
		$this->data['locations'] = $this->settings_model->get_locations($this->comp_id);
		/*$sub_locations = $this->settings_model->get_sub_locations($loc_id, $comp_id);*/
		$this->data['vendors'] = $this->Vendor_model->get_vendors($this->comp_id);

		$this->data['success']=0;

			//for custom error, total breakdown
		$this->data['custom_error']='';
		//display the switcher with companies
		//$this->data['my_company'] = $this->dashboard_model->get_user_owned_companies($this->user_id);


	}	
	public function business($comp_id)
	{			
		$this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = base_url().'/inventory/business/'.$comp_id;
        $config['total_rows'] = $this->Inventory_model->count_product();
        $config['per_page'] = 3;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
		//$this->data['results'] = $this->Vendor_model->get('company_vendors_info','*',$comp_id,$config['per_page'],$this->uri->segment(3));
		$this->data['results'] = $this->Inventory_model->get_product('*',$comp_id,$config['per_page'],$this->uri->segment(4));

		$this->data['settings_pc1'] = $this->settings_model->get_pricings_currencies_pc1($comp_id);
	
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business_main/inventory_products_list');
			$this->load->view('_partials/footer');
			
		
	}

		public function product_vendors($comp_id)
	{			
	
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business_main/inventory_product_vendors');
			$this->load->view('_partials/footer');
			
		
	}

	public function movement_history($comp_id)
	{			
	
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business_main/inventory_movement_history');
			$this->load->view('_partials/footer');
			
	}

	public function order_history($comp_id)
	{			
	
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business_main/inventory_order_history');
			$this->load->view('_partials/footer');
			
	}



	public function sales_info($itemcode, $comp_id)
	{			

	$this->data['product'] = $this->Inventory_model->get_single_product_itemcode($itemcode, $comp_id);	
	$this->data['prod_sales_info'] = $this->Inventory_model->get_product_sales_info($itemcode, $comp_id);
	$this->data['pricing_currencies'] = $this->settings_model->get_pricings_currencies($comp_id);
	$this->data['currencies'] = $this->settings_model->get_all_currencies();

		//currencies
		$this->data['currency1'] = $this->settings_model->get_currency($this->data['pricing_currencies']->c1);
		$this->data['currency2'] = $this->settings_model->get_currency($this->data['pricing_currencies']->c2);
		$this->data['currency3'] = $this->settings_model->get_currency($this->data['pricing_currencies']->c3);
		$this->data['currency4'] = $this->settings_model->get_currency($this->data['pricing_currencies']->c4);
		$this->data['currency5'] = $this->settings_model->get_currency($this->data['pricing_currencies']->c5);
		

		$this->form_validation->set_rules('price1', 'Price Label', 'required|decimal|trim|xss_clean|max_length[8]');			
		$this->form_validation->set_rules('price2', 'Price Label', 'trim|decimal|trim|xss_clean|max_length[8]');			
		$this->form_validation->set_rules('price3', 'Price Label', 'trim|decimal|trim|xss_clean|max_length[8]');			
		$this->form_validation->set_rules('price4', 'Price Label', 'trim|decimal|trim|xss_clean|max_length[8]');
		$this->form_validation->set_rules('price5', 'Price Label', 'trim|decimal|trim|xss_clean|max_length[8]');

		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');


	
	if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business_main/product_sales_info');
			$this->load->view('_partials/footer');
		}else{

			$form_data = array(
							'price1'=>set_value('price1'),
					       	'price2' => set_value('price2'),
					       	'price3'=>set_value('price3'),
					       	'price4' => set_value('price4'),
					       	'price5'=>set_value('price5'),

					       	'c1'=>$this->data['pricing_currencies']->c1,
					       	'c2' => $this->data['pricing_currencies']->c2,
					       	'c3'=>$this->data['pricing_currencies']->c3,
					       	'c4' => $this->data['pricing_currencies']->c4,
					       	'c5'=>$this->data['pricing_currencies']->c5
					       	);

			if ($this->Inventory_model->update_product_sales_info($itemcode, $comp_id, $form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'inventory/business/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
					       	

		}
			
		
	}


	public function inventory_info($itemcode, $comp_id)
	{			

	$this->data['product'] = $this->Inventory_model->get_single_product_itemcode($itemcode, $comp_id);	
	$this->data['prod_inventory_info'] = $this->Inventory_model->get_product_inventories($itemcode, $comp_id);
		

		$this->form_validation->set_rules('quantity', 'Quantity', 'required|numeric|trim|xss_clean|max_length[10]');

		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');


	
	if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business_main/product_inventory_info');
			$this->load->view('_partials/footer');
		}else{

			$form_data = array(
							'price1'=>set_value('price1'),
					       	'price2' => set_value('price2'),
					       	'price3'=>set_value('price3'),
					       	'price4' => set_value('price4'),
					       	'price5'=>set_value('price5'),

					       	'c1'=>$this->data['pricing_currencies']->c1,
					       	'c2' => $this->data['pricing_currencies']->c2,
					       	'c3'=>$this->data['pricing_currencies']->c3,
					       	'c4' => $this->data['pricing_currencies']->c4,
					       	'c5'=>$this->data['pricing_currencies']->c5
					       	);

			if ($this->Inventory_model->update_product_sales_info($itemcode, $comp_id, $form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'inventory/business/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
					       	

		}
			
		
	}


	public function test($comp_id){
		$this->data['locations'] = $this->settings_model->get_locations($comp_id);
		foreach ($this->data['locations'] as $key) {
		
		$inner_array = array(
			'comp_id' => $key->comp_id,
			'item_code' => 1212211,
			'location_id' => $key->id
			);
		var_dump($inner_array);
		}
		
		/*$data = array(
   		array(
      		'title' => 'My title' ,
      		'name' => 'My Name' ,
      		'date' => 'My date'
   		),
   		array(
      		'title' => 'Another title' ,
      		'name' => 'Another Name' ,
      		'date' => 'Another date'
   		)
		);*/

		

	}

	public function add_product($comp_id)
	{			
		//locations data for inventory data
		$this->data['locations'] = $this->settings_model->get_locations($comp_id);
		
		/*$this->form_validation->set_rules('item_code', 'Item Name', 'required|trim|xss_clean|max_length[30]');*/			
		$this->form_validation->set_rules('category_id', 'Category', 'required|xss_clean|max_length[10]');			
		$this->form_validation->set_rules('type_id', 'Type', 'required|xss_clean|max_length[5]');			
		$this->form_validation->set_rules('prod_desc', 'Description', '');			
		/*$this->form_validation->set_rules('tax_code_id', 'Tax Code', 'required|xss_clean|max_length[5]');	*/		
		$this->form_validation->set_rules('length', 'Length', 'trim|xss_clean|max_length[5]');			
		$this->form_validation->set_rules('height', 'Height', 'trim|xss_clean|max_length[5]');			
		$this->form_validation->set_rules('weight', 'Weight', 'trim|xss_clean|max_length[5]');			
		$this->form_validation->set_rules('width', 'Width', 'trim|xss_clean|max_length[5]');			
		$this->form_validation->set_rules('standard_uom_m_id', 'Standard Unit of Measurement', 'required|xss_clean|max_length[10]');			
		$this->form_validation->set_rules('sales_uom_m_id', 'Sales Unit of Measurement', 'required|xss_clean|max_length[10]');			
		$this->form_validation->set_rules('sales_uom_v1', 'Sales UOM Value 1', 'required|xss_clean|max_length[10]');			
		$this->form_validation->set_rules('sales_uom_v2', 'Sales UOM Value 2', 'required|xss_clean|max_length[10]');			
		$this->form_validation->set_rules('purchase_uom_m_id', 'Purchase Unit of Measurement', 'required|xss_clean|max_length[10]');			
		$this->form_validation->set_rules('purchase_uom_v1', 'Purchase UOM Value 1', 'required|xss_clean|max_length[10]');			
		$this->form_validation->set_rules('purchase_uom_v2', 'Purchase UOM Value 2', 'required|xss_clean|max_length[10]');			
		$this->form_validation->set_rules('barcode', 'Barcode', 'trim|xss_clean|is_numeric|max_length[30]');			
		$this->form_validation->set_rules('re_order_point', 'Re-order Point', 'trim|xss_clean|is_numeric|max_length[6]');			
		$this->form_validation->set_rules('re_order_qty', 'Re-order Quantity', 'trim|xss_clean|is_numeric|max_length[6]');			
		$this->form_validation->set_rules('location_id', 'location_id', 'xss_clean|max_length[10]');			
		$this->form_validation->set_rules('sub_location_id', 'Sub Location', 'xss_clean|max_length[10]');			
		$this->form_validation->set_rules('vendor_id', 'Vendor', 'xss_clean');			
		$this->form_validation->set_rules('picture', 'Picture', 'xss_clean|max_length[255]');			
		$this->form_validation->set_rules('costing_method', 'Costing Method', 'xss_clean|max_length[20]');			
		$this->form_validation->set_rules('manufacturer', 'Manufacturer', 'trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('country_id', 'Made in', 'xss_clean|max_length[5]');

		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business_main/product_add');
			$this->load->view('_partials/footer');
		}else{
			// build array for the model
			$unique_id = $this->product_unique_id();
			$form_data = array(
							'comp_id'=>$comp_id,
					       	'item_code' => $unique_id,
					       	'category_id' => set_value('category_id'),
					       	'type_id' => set_value('type_id'),
					       	'prod_desc' => set_value('prod_desc'),
					       	'tax_code_id' => set_value('tax_code_id'),
					       	'length' => set_value('length'),
					       	'height' => set_value('height'),
					       	'weight' => set_value('weight'),
					       	'width' => set_value('width'),
					       	'standard_uom_m_id' => set_value('standard_uom_m_id'),
					       	'sales_uom_m_id' => set_value('sales_uom_m_id'),
					       	'sales_uom_v1' => set_value('sales_uom_v1'),
					       	'sales_uom_v2' => set_value('sales_uom_v2'),
					       	'purchase_uom_m_id' => set_value('purchase_uom_m_id'),
					       	'purchase_uom_v1' => set_value('purchase_uom_v1'),
					       	'purchase_uom_v2' => set_value('purchase_uom_v2'),
					       	'barcode' => set_value('barcode'),
					       	're_order_point' => set_value('re_order_point'),
					       	're_order_qty' => set_value('re_order_qty'),
					       	'location_id' => set_value('location_id'),
					       	'sub_location_id' => set_value('sub_location_id'),
					       	'vendor_id' => set_value('vendor_id'),
					       	'picture' => set_value('picture'),
					       	/*'costing_method' => set_value('costing_method'),*/
					       	'manufacturer' => set_value('manufacturer'),
					       	'country_id' => set_value('country_id')
						);

				$sale_data =  array(
					'comp_id' => $comp_id, 
					'item_code' => $unique_id, 
					);
					
			// run insert model to write data to db
			/*var_dump($form_data);*/
			if ($this->Inventory_model->add_product($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				//default insertion for sales info data (prices)
				$this->Inventory_model->create_sales_info($sale_data);

				//default insertion for inventory locations quantity datas
				foreach ($this->data['locations'] as $key) {
		
				$inventory_array = array(
				'comp_id' => $comp_id,
				'item_code' => $unique_id,
				'location_id' => $key->id
				);

				$this->Inventory_model->create_inventory_info($inventory_array);
				
				}

				redirect(base_url().'inventory/business/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}

			
			
		
	}

		public function update_product($id,$comp_id)
		{	
		//go get the single data
		//$this->data['location'] = $this->settings_model->get_single_location($id, $comp_id);


		$this->form_validation->set_rules('location_name', 'Location Name', 'required|trim|xss_clean|max_length[255]');
			
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('_partials/header', $this->data);
			$this->load->view('business_main/product_update');
			$this->load->view('_partials/footer');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'location' => set_value('location_name')
						);
					
			// run insert model to write data to db
		
			if ($this->settings_model->UpdateProduct($id, $comp_id, $form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'inventory/business/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
			
		}


			public function delete_product($id, $comp_id)
		{	
			if ($this->Inventory_model->DeleteProduct($id, $comp_id) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'inventory/business/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
			
		}


		/************PRODUCT CATEGORY****/
		/************************************************************************************************/

		public function product_categories($comp_id)
	{			
		$this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = base_url().'/inventory/product_categories/'.$comp_id;
        $config['total_rows'] = $this->Inventory_model->count_category();
        $config['per_page'] = 3;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
		//$this->data['results'] = $this->Vendor_model->get('company_vendors_info','*',$comp_id,$config['per_page'],$this->uri->segment(3));
		$this->data['results'] = $this->Inventory_model->get_category('*',$comp_id,$config['per_page'],$this->uri->segment(4));

			$this->load->view('_partials/header', $this->data);
			$this->load->view('business_main/product_categories');
			$this->load->view('_partials/footer');
			
	}

		public function add_product_category($comp_id)
	{			
		$this->form_validation->set_rules( 'name', 'Name', 'required|trim|xss_clean|max_length[50]' );
		$this->form_validation->set_rules( 'description', 'Description', 'trim|xss_clean' );

		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');

		if ($this->form_validation->run('add_customer') == FALSE)
        {
             

			$this->load->view('_partials/header', $this->data);
			$this->load->view('business_main/product_categories_add');
			$this->load->view('_partials/footer');
			 	

        } else
        {                            
            $data = array(
            		'comp_id' => $comp_id,
                     'name' => set_value('name'),
                    'description' => set_value('description')
            );
			
		//	var_dump($data);
           
			if ($this->Inventory_model->add_category($data) == TRUE)
			{
				redirect(base_url().'inventory/product_categories/'.$comp_id);
			}
			else
			{
				
			$this->data['custom_error'] = '<div class="alert alert-danger"><i class="fa fa-frown-o"> Sorry, something went wrong. Please try again.</div>';

			$this->load->view('_partials/header', $this->data);
			$this->load->view('business_main/product_categories_add');
			$this->load->view('_partials/footer');

			}
		}	
	
			
		
	}

		public function update_product_category($id,$comp_id)
		{	
			
				$this->form_validation->set_rules( 'name', 'Name', 'required|trim|xss_clean|max_length[50]' );
				$this->form_validation->set_rules( 'description', 'Description', 'trim|xss_clean' );

				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
        if ($this->form_validation->run('update_customer') == FALSE)
        {
             

		$this->data['result'] = $this->Inventory_model->get_single_category($id, $comp_id);

		$this->load->view('_partials/header', $this->data);
		$this->load->view('business_main/product_categories_update');
		$this->load->view('_partials/footer'); 		

        } else
        {                            
            $data = array(
                     'name' => set_value('name'),
                    'description' => set_value('description')
            );
			
			//var_dump($data);
           
			if ($this->Inventory_model->edit_category($data,$comp_id,$id) == TRUE)
			{
				redirect(base_url().'inventory/product_categories/'.$comp_id);
			}
			else
			{
				$this->data['custom_error'] = '<div class="alert alert-danger"><i class="fa fa-frown-o"> Sorry, something went wrong. Please try again.</div>';
				$this->load->view('_partials/header', $this->data);
				$this->load->view('business_main/product_categories_update');
				$this->load->view('_partials/footer'); 	

			}
		}
			
		}


			public function delete_product_category($id, $comp_id)
		{	
			if ($this->Inventory_model->delete_category($id, $comp_id) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect(base_url().'inventory/product_categories/'.$comp_id);   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
			
		}

	function product_unique_id()
	{
			return rand(100,1003).time();
	}

	


}
?>