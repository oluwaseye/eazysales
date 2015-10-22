<div class="col-md-12 mb20">
   <div class="pageheader">
      <h2><i class="fa fa-user"></i> Product Categories
       
       <a href="<?php echo base_url().'inventory/business/'.$this->session->userdata('session_user_com');?>" class="btn btn-primary pull-right"><i class="fa fa-list-alt"></i> Inventory</a>
       <a href="<?php echo base_url().'inventory/add_product_category/'.$this->session->userdata('session_user_com');?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add Product Category</a>
        
         </h2>

      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url().'dashboard/business/'.$this->session->userdata('session_user_com');?>">Dashboard</a></li>
          <li><a href="<?php echo base_url().'inventory/business/'.$this->session->userdata('session_user_com');?>">Inventory</a></li>
           <li class="active">Product Categories</li>
        </ol>

      </div>

    </div>
      
         <div class="panel panel-default">
        <div class="panel-body">
          
<div class="table-responsive">
          <table class="table" id="table2">
              <thead>
                 <tr>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th></th>
                 </tr>
              </thead>
              <tbody>
              <?php foreach ($results as $result):?>
                 <tr class="odd gradeX">
                    <td><?php echo $result->name?></td>
                    <td><?php echo $result->description?></td>
                   <td class="center">
                    <a class="btn btn-default btn-small" href="<?php echo base_url();?>inventory/update_product_category/<?php print_r($result->id)?>/<?php print_r($this->session->userdata('session_user_com'));?>"><i class="fa fa-pencil" ></i></a>
                  <a class="btn btn-default btn-small"  onClick="return doconfirm();" href="<?php echo base_url();?>inventory/delete_product_category/<?php print_r($result->id)?>/<?php print_r($this->session->userdata('session_user_com'));?>"><i class="fa fa-trash-o"></i></a>
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