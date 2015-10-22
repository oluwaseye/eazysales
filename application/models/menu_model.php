<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Menu_model extends CI_Model {

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
	public function dashboard_active()
	{
		if ($this->uri->segment(1) === 'dashboard')
		{

    	 return $this->classActive();

		}else{
    		
		}
	}

	public function inventory_active()
	{
		if ($this->uri->segment(1) === 'inventory')
		{

    	 return $this->classActive();

		}else{
    		
		}
	}

	public function vendor_active()
	{
		if ($this->uri->segment(1) === 'vendor')
		{

    	 return $this->classActive();

		}else{
    		
		}
	}

	public function purchase_order_active()
	{
		if ($this->uri->segment(1) === 'purchase_order')
		{

    	 return $this->classActive();

		}else{
    		
		}
	}

	public function sales_order_active()
	{
		if ($this->uri->segment(1) === 'sales_order')
		{

    	 return $this->classActive();

		}else{
    		
		}
	}

	public function customers_active()
	{
		if ($this->uri->segment(1) === 'customers')
		{

    	 return $this->classActive();

		}else{
    		
		}
	}
	public function settings_active()
	{
		if ($this->uri->segment(1) === 'settings')
		{

    	 return $this->classActive();

		}else{
    		
		}
	}

	public function classActive(){
		echo 'class="active"';
	}

	
}

?>