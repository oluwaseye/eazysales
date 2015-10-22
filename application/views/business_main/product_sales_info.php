<div class="col-md-12 mb20">
   <div class="pageheader">
      <h2><i class="fa fa-user"></i> Sales Info 
      <a href="<?php echo base_url().'inventory/business/'.$this->session->userdata('session_user_com');?>" class="btn btn-info pull-right"><i class="fa fa-list-alt"></i> Products</a>
      <a href="<?php echo base_url().'inventory/inventory_info/'.$product->item_code.'/'.$this->session->userdata('session_user_com');?>" class="btn btn-primary pull-right"><i class="fa fa-list-alt"></i> Inventory Info</a>
       
          </h2>

      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index-2.html">Dashboard</a></li>
          <li><a href="<?php echo base_url().'inventory/business/'.$this->session->userdata('session_user_com');?>">Inventory</a></li>
          <li class="active">Sales Info</li>
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
                    <?php // Change the css classes to suit your needs    

$attributes = array('class' => 'form-horizontal', 'id' => 'basicForm2');
echo form_open('inventory/sales_info/'.$product->item_code.'/'.$this->session->userdata('session_user_com'), $attributes); ?>
        <div class="row">
        <div class="col-sm-2">Price Name</div>
        <div class="col-sm-3">Amount</div>
        <div class="col-sm-2">Price Name</div>
        <div class="col-sm-3">Amount</div>
        
        </div>

        <div class="row"><hr/></div>

        <div class="row">
          <div class="col-sm-2">
          <?php echo $pricing_currencies->p1; ?>
          </div>
          <div class="col-sm-3">
              <div class="input-group mb15">
                  <span class="input-group-addon"><?php echo $currency1->currency_shrt; ?></span>
                  <input type="text" placeholder="" class="form-control" name="price1" value="<?php echo $prod_sales_info->price1; ?>"/>
                </div>
                <?php echo form_error('price1'); ?>
          </div>
          
            <div class="col-sm-2">
          <?php echo $pricing_currencies->p2; ?>
          </div>
          <div class="col-sm-3">
              <div class="input-group mb15">
                  <span class="input-group-addon"><?php echo $currency2->currency_shrt; ?></span>
                  <input type="text" placeholder="" class="form-control" name="price2" value="<?php echo $prod_sales_info->price2; ?>" <?php if($pricing_currencies->active2==0) echo 'disabled=""';?>/>
                   </div>
                   <?php echo form_error('price2'); ?>
          </div>
          
          </div>


          <div class="row"><hr/></div>

          <div class="row">
          <div class="col-sm-2">
          <?php echo $pricing_currencies->p3; ?>
          </div>
          <div class="col-sm-3">
              <div class="input-group mb15">
                  <span class="input-group-addon"><?php echo $currency3->currency_shrt; ?></span>
                  <input type="text" placeholder="" class="form-control" name="price3" value="<?php echo $prod_sales_info->price3; ?>" <?php if($pricing_currencies->active3==0) echo 'disabled=""';?>/>
                 </div>
                 <?php echo form_error('price3'); ?>
          </div>

           <div class="col-sm-2">
          <?php echo $pricing_currencies->p4; ?>
          </div>
          <div class="col-sm-3">
              <div class="input-group mb15">
                  <span class="input-group-addon"><?php echo $currency4->currency_shrt; ?></span>
                  <input type="text" placeholder="" class="form-control" name="price4" value="<?php echo $prod_sales_info->price4; ?>" <?php if($pricing_currencies->active4==0) echo 'disabled=""';?> />
                 </div>
                 <?php echo form_error('price4'); ?>
          </div>

          </div>

           <div class="row"><hr/></div>


          <div class="row">
          <div class="col-sm-2">
          <?php echo $pricing_currencies->p5; ?>
          </div>
          <div class="col-sm-3">
              <div class="input-group mb15">
                  <span class="input-group-addon"><?php echo $currency5->currency_shrt; ?></span>
                  <input type="text" placeholder="" class="form-control" name="price5" value="<?php echo $prod_sales_info->price5; ?>" <?php if($pricing_currencies->active5==0) echo 'disabled=""';?> />
                </div>
                <?php echo form_error('price5'); ?>
          </div>
          
          </div>
          <div class="row">
            <input type="submit" name="submit" value="Save" class="btn btn-block btn-primary"> 
          </div>
        </div>
      </div><!-- panel-body -->
  
     
</div>
</div>