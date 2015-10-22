<?php
class Customer_model extends CI_Model {

    function Customer_model()
    {
        // Call the Model constructor
        parent::__construct();



    }

    private $tbl_name = 'company_customers_info';


    
    function get($fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from($this->tbl_name);        
        $this->db->where('comp_id',$where);
        $this->db->order_by("id", "desc"); 
        $this->db->limit($perpage,$start);
        
        $query = $this->db->get();
        
        //$result =  !$one  ? $query->result($array) : $query->row() ;
        return $query->result();
    }

     function get_single($id, $comp_id){
        
        $this->db->from($this->tbl_name);        
        $this->db->where('comp_id',$comp_id);
        $this->db->where('id',$id);
        $this->db->order_by("id", "desc"); 
        
        $query = $this->db->get();
        
        //$result =  !$one  ? $query->result($array) : $query->row() ;
        return array_shift($query->result());
    }
    
    function add($data){
        $this->db->insert($this->tbl_name, $data);         
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function edit($data,$comp_id,$id){
        $this->db->where('comp_id',$comp_id);
        $this->db->where('id',$id);
        $this->db->update($this->tbl_name, $data);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function delete($id, $comp_id){
        $this->db->where('id', $id);
        $this->db->where('comp_id', $comp_id);
        $this->db->delete($this->tbl_name);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;        
    }   
	
	function count(){
		return $this->db->count_all($this->tbl_name);
	}
}