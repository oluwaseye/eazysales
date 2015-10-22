<?php
class Inventory_model extends CI_Model {

    public function Inventory_model()
    {
        // Call the Model constructor
        parent::__construct();



    }

    private $tbl_products = 'company_products';
    private $tbl_sales_info = 'company_sales_info';
    private $tbl_company_product_inventory = 'company_product_inventory';
    private $tbl_category = 'company_prod_categories';
    private $tbl_producttype  ='product_types';


    
    public function get_product($fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from($this->tbl_products);        
        $this->db->where('comp_id',$where);
        $this->db->order_by("id", "desc"); 
        $this->db->limit($perpage,$start);
        
        $query = $this->db->get();
        
        //$result =  !$one  ? $query->result($array) : $query->row() ;
        return $query->result();
    }

     public function get_single_product($id, $comp_id){
        
        $this->db->from($this->tbl_products);        
        $this->db->where('comp_id',$comp_id);
        $this->db->where('id',$id);
        $this->db->order_by("id", "desc"); 
        
        $query = $this->db->get();
        
        //$result =  !$one  ? $query->result($array) : $query->row() ;
        return array_shift($query->result());
    }

     public function get_single_product_itemcode($itemcode, $comp_id){
        
        $this->db->from($this->tbl_products);        
        /*$this->db->where('id',$id);*/
        $this->db->where('comp_id',$comp_id);
        $this->db->where('item_code',$itemcode);
        $this->db->order_by("id", "desc"); 
        
        $query = $this->db->get();
        
        //$result =  !$one  ? $query->result($array) : $query->row() ;
        return array_shift($query->result());
    }
    
    
    public function add_product($data){
        $this->db->insert($this->tbl_products, $data);         
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        
        return FALSE;       
    }
    
    public function edit_product($data,$comp_id,$id){
        $this->db->where('comp_id',$comp_id);
        $this->db->where('id',$id);
        $this->db->update($this->tbl_products, $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        
        return FALSE;       
    }

    
    
    public function DeleteProduct($id, $comp_id){
        $this->db->where('id', $id);
        $this->db->where('comp_id', $comp_id);
        $this->db->delete($this->tbl_products);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        
        return FALSE;        
    }   
    
    public function count_product(){
        return $this->db->count_all($this->tbl_products);
    }


    /*********invetory categories***/

    public function get_category($fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from($this->tbl_category);        
        $this->db->where('comp_id',$where);
        $this->db->order_by("id", "desc"); 
        $this->db->limit($perpage,$start);
        
        $query = $this->db->get();
        
        //$result =  !$one  ? $query->result($array) : $query->row() ;
        return $query->result();
    }

    public function get_categories($comp_id){
        
        $this->db->from($this->tbl_category);        
        $this->db->where('comp_id',$comp_id);
        $this->db->order_by("id", "desc"); 
        
        $query = $this->db->get();
        
        //$result =  !$one  ? $query->result($array) : $query->row() ;
        return $query->result();
    }

     public function get_single_category($id, $comp_id){
        
        $this->db->from($this->tbl_category);        
        $this->db->where('comp_id',$comp_id);
        $this->db->where('id',$id);
        $this->db->order_by("id", "desc"); 
        
        $query = $this->db->get();
        
        //$result =  !$one  ? $query->result($array) : $query->row() ;
        return array_shift($query->result());
    }
    
    public function add_category($data){
        $this->db->insert($this->tbl_category, $data);         
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        
        return FALSE;       
    }
    
    public function edit_category($data,$comp_id,$id){
        $this->db->where('comp_id',$comp_id);
        $this->db->where('id',$id);
        $this->db->update($this->tbl_category, $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        
        return FALSE;       
    }
    
    public function delete_category($id, $comp_id){
        $this->db->where('id', $id);
        $this->db->where('comp_id', $comp_id);
        $this->db->delete($this->tbl_category);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        
        return FALSE;        
    }   
    
    public function count_category(){
        return $this->db->count_all($this->tbl_category);
    }

     public function get_productTypes(){
        
        $this->db->from($this->tbl_producttype); /*
        $this->db->order_by("id", "desc"); */
        
        $query = $this->db->get();
        
        //$result =  !$one  ? $query->result($array) : $query->row() ;
        return $query->result();
    }

     public function get_single_productType($id){
        
        $this->db->from($this->tbl_producttype);
        $this->db->where('id',$id);
        $this->db->order_by("id", "desc"); 
        
        $query = $this->db->get();
        
        //$result =  !$one  ? $query->result($array) : $query->row() ;
        return array_shift($query->result());
    }


    public function create_sales_info($data){
        $this->db->insert($this->tbl_sales_info, $data);         
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        
        return FALSE;       
    }

     public function get_product_sales_info($itemcode, $comp_id){
        
        $this->db->from($this->tbl_sales_info);        
        $this->db->where('comp_id',$comp_id);
        $this->db->where('item_code',$itemcode);
        $query = $this->db->get();
        
        //$result =  !$one  ? $query->result($array) : $query->row() ;
        return array_shift($query->result());
    }

    public function get_product_sales_info_price1($product_id, $comp_id){
        $this->db->select('price1');
        $this->db->from($this->tbl_sales_info);        
        $this->db->where('item_code',$product_id);
        $this->db->where('comp_id',$comp_id);
        $query = $this->db->get();
        return array_shift($query->result());
    }

    public function update_product_sales_info($product_id, $comp_id, $form_data){
        $this->db->where('comp_id',$comp_id);
        $this->db->where('product_id',$product_id);
        $this->db->update($this->tbl_sales_info, $form_data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        
        return FALSE;       
    }

    public function create_inventory_info($data){
        $this->db->insert($this->tbl_company_product_inventory, $data);         
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
    }

     public function update_inventory_info($product_id, $comp_id, $form_data){
        $this->db->where('comp_id',$comp_id);
        $this->db->where('product_id',$product_id);
        $this->db->update($this->tbl_company_product_inventory, $form_data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        
        return FALSE;       
    }

    

    public function get_product_inventories($itemcode, $comp_id){
        
        $this->db->from($this->tbl_company_product_inventory);        
        $this->db->where('comp_id',$comp_id);
        $this->db->where('item_code',$itemcode);
        $query = $this->db->get();
        
        //$result =  !$one  ? $query->result($array) : $query->row() ;
        return $query->result();
    }
        
       

    
}