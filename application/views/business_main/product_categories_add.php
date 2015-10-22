<div class="col-md-12 mb20">
   <div class="pageheader">
      <h2><i class="fa fa-user"></i> Add Product Category <a href="<?php echo base_url().'inventory/product_categories/'.$this->session->userdata('session_user_com');?>" class="btn btn-info pull-right"><i class="fa fa-list-alt"></i> Product Categories</a>
          </h2>

          <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url().'dashboard/business/'.$this->session->userdata('session_user_com');?>">Dashboard</a></li>
          <li><a href="<?php echo base_url().'inventory/business/'.$this->session->userdata('session_user_com');?>">Inventory</a></li>
          <li><a href="<?php echo base_url().'inventory/product_categories/'.$this->session->userdata('session_user_com');?>">Product Categories</a></li>
           <li class="active">Add Product Categories</li>
        </ol>

      </div>

    </div>
     
         <div class="panel panel-default">
        <div class="panel-body">

        <?php 
          $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
          echo form_open('inventory/add_product_category/'.$this->session->userdata('session_user_com'), $attributes); ?>
        <div class="row">
        
              <div class="form-group">
                  <label class="col-sm-4 control-label">Name:</label>
                  <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" value="<?php echo set_value('name')?>" />
                    <?php echo form_error('name'); ?>
                  </div>
                </div>
                
                
           
              <div class="form-group">
              <label class="col-sm-4 control-label">Description</label>
              <div class="col-sm-6">
                <textarea class="form-control" rows="2" cols="8" name="description"><?php echo set_value('description')?></textarea>
                <?php echo form_error('description'); ?>
              </div>
            </div>
            </div>
          
      </div><!-- panel-body -->
   <div class="panel-footer">
   <div class="row">
   <div class="col-md-6">
    <button type="reset" class="btn btn-default btn-block">Reset <i class="fa fa-warning"></i></button>
                
    </div>
    <div class="col-md-6">
               <button class="btn btn-primary btn-block">Submit <i class="fa fa-check-circle"></i></button>
    </div>
              </div>
        </div>
     </form>   
</div>
</div>