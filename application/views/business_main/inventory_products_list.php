<div class="col-md-12 mb20">
   <div class="pageheader">
      <h2><i class="fa fa-user"></i> Inventory
       
       <a href="<?php echo base_url().'inventory/product_categories/'.$this->session->userdata('session_user_com');?>" class="btn btn-primary pull-right"><i class="fa fa-list-alt"></i> Product Categories</a>
        
       <a href="<?php echo base_url().'inventory/add_product/'.$this->session->userdata('session_user_com');?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add Product</a>
         </h2>

      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url().'dashboard/business/'.$this->session->userdata('session_user_com');?>">Dashboard</a></li>
          <li class="active">Inventory Products</li>
        </ol>

      </div>

    </div>
      <ul class="nav nav-tabs">
          <li class="active"><a href="<?php echo base_url().'inventory/business/'.$this->session->userdata('session_user_com');?>"><strong>Inventory Products</strong></a></li>
           <li><a href="<?php echo base_url().'inventory/product_vendors/'.$this->session->userdata('session_user_com');?>"><strong>Product Vendors </strong></a></li>
          <li><a href="<?php echo base_url().'inventory/movement_history/'.$this->session->userdata('session_user_com');?>"><strong>Movement History</strong></a></li>
          <li><a href="<?php echo base_url().'inventory/order_history/'.$this->session->userdata('session_user_com');?>"><strong>Order History</strong></a></li>
         
        </ul>
<div class="tab-content mb30">
<div class="tab-pane active" id="home2">
         <div class="panel panel-default">
        <div class="panel-body">
          
<div class="table-responsive">
          <table class="table" id="table2">
              <thead>
                 <tr>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Item</th>
                    <th>Description</th>
                    <th>(<?php $currency = $this->settings_model->get_currency($settings_pc1->c1); echo $currency->currency_shrt; ?>) <?php echo $settings_pc1->p1; ?> </th>
                     <th></th>
                 </tr>
              </thead>
              <tbody>
              <?php foreach($results as $result):?>
                 <tr class="odd gradeX">
                    <td><?php 
                    $type = $this->Inventory_model->get_single_productType($result->type_id);
                    print_r($type->name); 
                    ?></td>
                    <td><?php 
                    $category = $this->Inventory_model->get_single_category($result->category_id, $this->session->userdata('session_user_com'));
                    print_r($category->name); 
                    ?></td>
                    <td><?php print_r($result->item_code); ?></td>
                    <td><?php print_r($result->prod_desc); ?></td>
                    <td><?php $price1 = $this->Inventory_model->get_product_sales_info_price1($result->item_code, $this->session->userdata('session_user_com')); echo $price1->price1?></td>
                    <td class="center">
                    <a title="Edit Product" class="btn btn-default btn-xs tooltips" data-placement="top" data-toggle="tooltip" href="<?php echo base_url();?>inventory/update_product/<?php print_r($result->id)?>/<?php print_r($this->session->userdata('session_user_com'));?>"><i class="fa fa-pencil" ></i></a>
                  <a title="Delete Product" class="btn btn-default btn-xs tooltips" data-placement="top" data-toggle="tooltip" href="<?php echo base_url();?>inventory/delete_product/<?php print_r($result->id)?>/<?php print_r($this->session->userdata('session_user_com'));?>"><i class="fa fa-trash-o" onClick="return doconfirm();"></i></a>
                    <a title="Sales Info" class="btn btn-darkblue btn-xs tooltips" data-placement="top" data-toggle="tooltip" href="<?php echo base_url();?>inventory/sales_info/<?php print_r($result->item_code)?>/<?php print_r($this->session->userdata('session_user_com'));?>"><i class="fa fa-book"></i> </a>
                   <a title="Inventory" class="btn btn-darkblue btn-xs tooltips" data-placement="top" data-toggle="tooltip" href="<?php echo base_url();?>inventory/inventory_info/<?php print_r($result->item_code)?>/<?php print_r($this->session->userdata('session_user_com'));?>"><i class="fa fa-file"></i></a>
                  
                   </td>
                 </tr>
                 <?php endforeach ?>
                 
              </tbody>
           </table>
          </div>
   
         </div>
        </div><!-- panel-body -->
    </div>
        </div>
</div>
</div>