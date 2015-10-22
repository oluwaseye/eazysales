<div class="col-md-12 mb20">
   <div class="pageheader">
      <h2><i class="fa fa-user"></i> Inventory Info 
      <a href="<?php echo base_url().'inventory/business/'.$this->session->userdata('session_user_com');?>" class="btn btn-info pull-right"><i class="fa fa-list-alt"></i> Products</a>
      <a href="<?php echo base_url().'inventory/sales_info/'.$product->item_code.'/'.$this->session->userdata('session_user_com');?>" class="btn btn-primary pull-right"><i class="fa fa-list-alt"></i> Sales Info</a>
       
          </h2>

      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index-2.html">Dashboard</a></li>
          <li><a href="<?php echo base_url().'inventory/business/'.$this->session->userdata('session_user_com');?>">Inventory</a></li>
          <li class="active">Inventory Info</li>
        </ol>

      </div>

    </div>
     
         <div class="panel panel-default">
        <div class="panel-body">
        <div class="row">
        <div class="col-md-4">
        <h5>Product Description</h5>
        <h4 style="text-transform:capitalize;"><?php echo $product->prod_desc; ?></h4>
        </div>
        <div class="col-md-3">
        <h5>Category</h5>
        <h4 style="text-transform:capitalize;">
        <?php 
        $category = $this->Inventory_model->get_single_category($product->category_id, $this->session->userdata('session_user_com'));
        echo $category->name;
        ?>
        </h4>
        </div>
        <div class="col-md-3">
        <h6>SKU</h6>
        <h4 style="text-transform:capitalize;"><?php echo $product->item_code; ?></h4>
        </div>

        <div class="col-md-2">  
        <h6>Barcode</h6>
        <img style="margin-left: -8px;" alt="<?php echo $product->barcode; ?>" src="<?php echo base_url().'barcode/'; ?>barcode.php?text=<?php echo $product->barcode; ?>&size=20&Code25" />
        </div>

        </div>
        <hr/>
              <div class="table-responsive">

        <div class="row">
        <div class="col-sm-2">Location</div>
        <div class="col-sm-3">Quantity</div>
        <div class="col-sm-1"></div>
        <div class="col-sm-2">Location</div>
        <div class="col-sm-3">Quantity</div>
        <div class="col-sm-1"></div>
        </div>

        <div class="row"><hr/></div>

<div class="row">
<?php foreach ($prod_inventory_info as $inventory):?>
  <?php 
$attributes = array('class' => 'form-horizontal', 'id' => 'basicForm2');
echo form_open('inventory/inventory_info/'.$product->item_code.'/'.$this->session->userdata('session_user_com'), $attributes); ?>
        <div class="col-sm-2 text-capitalize"><?php $location = $this->settings_model->get_location_id($inventory->comp_id, $inventory->location_id); echo $location->location; ?></div>
        <div class="col-sm-3"><input type="text" name="quantity" class="form-control" value=""><span><?php echo form_error('quantity')?></span></div>
        <div class="col-sm-1"><button type="submit" class="btn btn-sm btn-primary">Save</button></div>
<?php echo form_close();?>
        <?php endforeach; ?>
        </div>

       
       

        </div><!-- panel-body -->
  
     
</div>
</div>