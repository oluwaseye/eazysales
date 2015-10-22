<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Settings_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	// --------------------------------------------------------------------
      /** 
       * function SaveForm()
       *
       * insert form data
       * @param $form_data - array
       * @return Bool - TRUE or FALSE
       */

      /********SETTING INSERTIONS AND UPDATES**********/

      	/**BUSINESS OR COMPANY INFO UPDATE ONLY....CREATE IN NEW BUSINESS MODEL **/
  		public function SaveBusinessInfo($data, $comp_id, $user_id)
		{
		$this->db->where('comp_id', $comp_id);
		$this->db->where('user_id', $user_id);
		$this->db->update('user_companies', $data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}

		/**INVENTORY SETTINGS INFO UPDATE ONLY **/
		public function SaveInventoryInfo($data, $comp_id)
		{
		$this->db->where('comp_id', $comp_id);
		$this->db->update('settings_inventory', $data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}


		/**PRODUCT INFO SETTINGS UPDATE ONLY**/
		public function SaveProductInfo($data, $comp_id)
		{
		$this->db->where('comp_id', $comp_id);
		$this->db->update('settings_products', $data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}
		/**PRICING INFO SETTINGS  UPDATE ONLY**/
		public function SavePricingInfo($data, $comp_id)
		{
		$this->db->where('comp_id', $comp_id);
		$this->db->update('settings_pricing', $data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}
		/** TAX INFO UPDATE ONLY **/
		public function SaveTaxInfo($data, $comp_id)
		{
		$this->db->where('comp_id', $comp_id);
		$this->db->update('settings_tax', $data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}

		/****************LOCATION ************************/
  		public function SaveLocation($form_data)
		{
		$this->db->insert('settings_locations', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}

		public function UpdateLocation($id, $comp_id, $data)
		{
		$this->db->where('id', $id);
		$this->db->where('comp_id', $comp_id);
		$this->db->update('settings_locations', $data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}

		public function DeleteLocation($id, $comp_id)
		{
		$this->db->where('id', $id);
		$this->db->where('comp_id', $comp_id);
		$this->db->delete('settings_locations'); 
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}

		public function DeleteLocationsSubs($location_id, $comp_id){
			$this->db->where('location_id', $location_id);
		$this->db->where('comp_id', $comp_id);
		$this->db->delete('settings_sub_locations'); 
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}

		/***************SUB LOCATION **********************/
				public function SaveSubLocation($form_data)
		{
		$this->db->insert('settings_sub_locations', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}

		public function UpdateSubLocation($location_id, $id, $comp_id, $data)
		{
		$this->db->where('id', $id);
		$this->db->where('location_id', $location_id);
		$this->db->where('comp_id', $comp_id);
		$this->db->update('settings_sub_locations', $data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}

		public function DeleteSubLocation($location_id, $id, $comp_id)
		{
		$this->db->where('id', $id);
		$this->db->where('location_id', $location_id);
		$this->db->where('comp_id', $comp_id);
		$this->db->delete('settings_sub_locations'); 
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}
		
		

		/****************RECEIVING ADDRESS ****************/
		public function SaveAddress($form_data)
		{
		$this->db->insert('settings_addresses', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}

		public function UpdateAddress($id, $comp_id, $data)
		{
		$this->db->where('id', $id);
		$this->db->where('comp_id', $comp_id);
		$this->db->update('settings_addresses', $data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}

		public function DeleteAddress($id, $comp_id)
		{
		$this->db->where('id', $id);
		$this->db->where('comp_id', $comp_id);
		$this->db->delete('settings_addresses'); 
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}

		
		/****************PRICING / CURRENCY ****************/
		public function SavePricing_Currency($form_data)
		{
		$this->db->insert('settings_pricing_currency', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}

		public function UpdatePricing_Currency($comp_id, $data)
		{
		$this->db->where('comp_id', $comp_id);
		$this->db->update('settings_pricing_currency', $data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}

		public function DeletePricingCurrency($id, $comp_id)
		{
		$this->db->where('id', $id);
		$this->db->where('comp_id', $comp_id);
		$this->db->delete('settings_pricing_currency'); 
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}


		/** **************PRODUCT TAX CODE ****************/
		public function SaveProduct_Tax_Code($form_data)
		{
		$this->db->insert('settings_product_tax_code', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}

		public function UpdateProductTaxCode($id, $comp_id, $data)
		{
		$this->db->where('id', $id);
		$this->db->where('comp_id', $comp_id);
		$this->db->update('settings_product_tax_code', $data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}

		public function DeleteProductTaxCode($id, $comp_id)
		{
		$this->db->where('id', $id);
		$this->db->where('comp_id', $comp_id);
		$this->db->delete('settings_product_tax_code'); 
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}

		/****************TAX SCHEME ****************/
		public function SaveTaxScheme($form_data)
		{
		$this->db->insert('settings_tax_scheme', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}

		public function UpdateTaxingScheme($id, $comp_id, $data)
		{
		$this->db->where('id', $id);
		$this->db->where('comp_id', $comp_id);
		$this->db->update('settings_tax_scheme', $data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}

		public function DeleteTaxingScheme($id, $comp_id)
		{
		$this->db->where('id', $id);
		$this->db->where('comp_id', $comp_id);
		$this->db->delete('settings_tax_scheme'); 
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}


		/****************DOCUMENT NUMBERS   UPDATE ONLY************** **/
		public function SaveDocNumbersInfo($data, $comp_id)
		{
		$this->db->where('comp_id', $comp_id);
		$this->db->update('settings_docnumbers', $data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
		}



		/**************SETTING GETTERS AND RETRIEVERS ******************/


		public function get_unit_type_length()
		{
		$query = $this->db->get('unit_type_length');
		return $query->result();
		}

		public function get_unit_type_weight()
		{
		$query = $this->db->get('unit_type_weight');
		return $query->result();
		}

		public function get_unit_type_weight_id($id)
		{
		$query = $this->db->get('unit_type_weight');

		   $this->db->select('unit_type_weight.*');
            $this->db->from('settings_products');
            $this->db->where('settings_products.unit_type_weight', $id);
            $this->db->join('unit_type_weight','unit_type_weight.id = settings_products.unit_type_weight');
            $query = $this->db->get();

		return array_shift($query->result());
		}

		public function get_unit_type_length_id($id)
		{
		$query = $this->db->get('unit_type_weight');

		   $this->db->select('unit_type_length.*');
            $this->db->from('settings_products');
            $this->db->where('settings_products.unit_type_length', $id);
            $this->db->join('unit_type_length','unit_type_length.id = settings_products.unit_type_length');
            $query = $this->db->get();

		return array_shift($query->result());
		}

		public function get_all_currencies()
		{
		$query = $this->db->get('currencies');
		return $query->result();
		}

		public function get_currency($id)
		{
		$this->db->where('id', $id);
		$query = $this->db->get('currencies');
		return array_shift($query->result());
		}

		public function get_all_countries()
		{
		$query = $this->db->get('countries');
		return $query->result();
		}

		public function get_all_location_types()
		{
		$query = $this->db->get('location_types');
		return $query->result();
		}

		public function get_sales_reps($comp_id)
		{
		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_sales_reps');
		return $query->result();
		}

		public function get_payment_methods()
		{
		$query = $this->db->get('payment_methods');
		return $query->result();
		}

		public function get_card_types()
		{
		$query = $this->db->get('card_types');
		return $query->result();
		}


		public function get_settings_pricing($comp_id)
		{
		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_pricing');
		return array_shift($query->result());
		}

		public function get_settings_tax($comp_id)
		{
		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_tax');
		return array_shift($query->result());
		}

		public function get_pricings_currencies($comp_id)
		{
		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_pricing_currency');
		return array_shift($query->result());
		}

		public function get_pricings_currencies_pc1($comp_id){
		$this->db->select('p1, c1');
		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_pricing_currency');
		return array_shift($query->result());
		}

		public function get_payment_terms($comp_id)
		{
		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_payment_terms');
		return $query->result();
		}

		public function get_shipping_carriers($comp_id)
		{
		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_shipping_carriers');
		return $query->result();
		}

		public function get_taxing_schemes($comp_id)
		{
		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_tax_scheme');
		return $query->result();
		}

		public function get_prod_tax_codes($comp_id)
		{
		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_product_tax_code');
		return $query->result();
		}

		
		public function get_business($comp_id)
		{
		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('user_companies');
		return array_shift($query->result());
		}

		public function get_docnumbers($comp_id)
		{
		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_docnumbers');
		return array_shift($query->result());
		}

		public function get_default_location($comp_id){
		$this->db->select('default_location_id');
  		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_inventory');
		return array_shift($query->result());
  		}
  		
  		public function get_locations($comp_id){
  		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_locations');
		return $query->result();
  		}

  		public function get_location_id($comp_id, $id){
  		$this->db->where('comp_id', $comp_id);
  		$this->db->where('id', $id);
		$query = $this->db->get('settings_locations');
		return array_shift($query->result());
  		}

  		public function get_sub_locations($loc_id, $comp_id){
  		$this->db->where('location_id', $loc_id);
  		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_sub_locations');
		return $query->result();
  		}

  		public function get_cus_location_types(){
		$query = $this->db->get('customer_location_types');
		return $query->result();
  		}

  		public function get_addresses($comp_id){
  		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_addresses');
		return $query->result();
  		}

  		public function get_single_address($id, $comp_id){
  		$this->db->where('id', $id);
  		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_addresses');
		return array_shift($query->result());
  		}


  		public function get_single_location($id, $comp_id){
  		$this->db->where('id', $id);
  		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_locations');
		return array_shift($query->result());
  		}

  		public function get_single_sub_location($loc_id, $id, $comp_id){
  		$this->db->where('id', $id);
  		$this->db->where('location_id', $loc_id);
  		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_sub_locations');
		return array_shift($query->result());
  		}

  		public function get_single_pricing_currency($id, $comp_id){
  		$this->db->where('id', $id);
  		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_pricing_currency');
		return array_shift($query->result());
  		}

  		public function get_single_taxing_scheme($id, $comp_id){
  		$this->db->where('id', $id);
  		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_tax_scheme');
		return array_shift($query->result());
  		}

  		public function get_single_prodtax_code($id, $comp_id){
  		$this->db->where('id', $id);
  		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_product_tax_code');
		return array_shift($query->result());
  		}


		public function settings_product($comp_id)
		{
		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_products');
		return array_shift($query->result());
		}

		public function settings_inventory($comp_id)
		{
		$this->db->where('comp_id', $comp_id);
		$query = $this->db->get('settings_inventory');
		return array_shift($query->result());
		}


	

}

?>