<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class New_business extends CI_Model {

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
	public function SaveCompany($form_data)
	{
		$this->db->insert('user_companies', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}

	//default priviledges
	public function Save_D_Priviledge($form_data)
	{
		$this->db->insert('user_company_priviledges', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}

		//default document numbers
	public function Save_D_Docnumbers($form_data)
	{
		$this->db->insert('settings_docnumbers', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}

	//default settings

	public function Save_D_Currency($form_data)
	{
		$this->db->insert('settings_currency', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}

	public function Save_D_Inventory($form_data)
	{
		$this->db->insert('settings_inventory', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}

	public function Save_D_Products($form_data)
	{
		$this->db->insert('settings_products', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}

	public function Save_D_Pricing_Scheme($form_data)
	{
		$this->db->insert('settings_pricing_scheme', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}

	public function Save_D_Tax($form_data)
	{
		$this->db->insert('settings_tax', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}

	public function Save_D_Pricing($form_data)
	{
		$this->db->insert('settings_pricing', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}

	public function Save_D_Pricing_Currency($form_data)
	{
		$this->db->insert('settings_pricing_currency', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}

}

?>