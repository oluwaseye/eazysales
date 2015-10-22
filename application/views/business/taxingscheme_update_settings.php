<div class="col-md-12 mb20">
<div class="row">
  <div class="col-md-3">
    <div class="leftpanelinner"> 
          <ul class="nav nav-pills nav-stacked nav-bracket">
        <li class="active"><a href="<?php echo base_url().'settings/business/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-bookmark"></i> <span>Business</span></a></li>
        <li><a href="<?php echo base_url().'settings/locations/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-map-marker"></i> <span>Locations</span></a></li>
        <li><a href="<?php echo base_url().'settings/addresses/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-location-arrow"></i> <span>Addresses</span></a></li>
        <li class=""><a href="<?php echo base_url().'settings/salesreps/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-users"></i> <span>Sales Reps</span></a> </li>
        <!--<li class=""><a href="<?php echo base_url().'settings/reference/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-list-alt"></i> <span>Reference</span></a> </li>-->
        <li class=""><a href="<?php echo base_url().'settings/doc_numbers/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-file"></i> <span>Doc Numbers</span></a> </li>
        </ul>
 
    </div>
        </div>
        <div class="col-md-9">
          
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-dark">
          <li><a href="<?php echo base_url().'settings/business/'.$this->session->userdata('session_user_com');?>" ><strong>Business Info</strong></a></li>
          <li class=""><a href="<?php echo base_url().'settings/product_inventory/'.$this->session->userdata('session_user_com');?>" ><strong>Product & Inventory</strong></a></li>
          <li class="active"><a href="<?php echo base_url().'settings/pricing_tax/'.$this->session->userdata('session_user_com');?>"><strong>Pricing & Tax</strong></a></li>
         </ul>
        
        <!-- Tab panes -->
        <div class="tab-content mb30">
          <div class="tab-pane active" id="home2">
           <?php if ($success==1){?>
                                                <div class="alert alert-success">
                                                <button class="close" data-dismiss="alert"></button>
                                                <strong><i class="fa fa-smile-o"></i> Yay!</strong> Your update was successful....
                                                </div>
                                                <?php }elseif($success==2){
                                                  ?>
                                                  <div class="alert alert-danger">
                                                <button class="close" data-dismiss="alert"></button>
                                                <strong><i class="fa fa-frown-o"></i> Oops!</strong> Something went wrong....
                                                </div>
                                                  <?php
                                                  } ?>


  <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">Add Taxing Scheme</h4>
            </div>
            <?php // Change the css classes to suit your needs    

$attributes = array('class' => 'form-horizontal', 'id' => 'basicForm2', 'novalidate'=>'novalidate');
echo form_open('settings/update_taxing_scheme/'.$taxing_scheme->id.'/'.$this->session->userdata('session_user_com'), $attributes); ?>

  
            <div class="panel-body">
              <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5>Scheme Name</h5>
                </div>
                <div class="col-lg-9">
                <input id="scheme_name" type="text" name="scheme_name" maxlength="30" class="form-control" value="<?php echo $taxing_scheme->scheme_name; ?>"  />
                <br/>
                <?php echo form_error('scheme_name'); ?>
                </div>
            </div>
            <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5>Primary Tax Name</h5>
                </div>
                <div class="col-lg-9">
                  <input id="primary_tax_name" type="text" name="primary_tax_name" maxlength="30" class="form-control"  value="<?php echo $taxing_scheme->primary_tax_name; ?>"  />
                   <br/>
                   <?php echo form_error('primary_tax_name'); ?>
                </div>
            </div>
                  <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5>Primary Tax Rate %</h5>
                </div>
                <div class="col-lg-9">
                  
                <div class="input-group mb15 col-sm-2">
                   <input id="primary_tax_rate" type="text" name="primary_tax_rate" maxlength="2" class="form-control"  value="<?php echo $taxing_scheme->primary_tax_rate; ?>"  />
                  <span class="input-group-addon">%</span>
                </div>
                   <?php echo form_error('primary_tax_rate'); ?>
                </div>
            </div>
                 <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5>Secondary Tax Name</h5>
                </div>
                <div class="col-lg-9">
                  <input id="secondary_tax_name" type="text" name="secondary_tax_name" maxlength="30"  class="form-control" value="<?php echo $taxing_scheme->secondary_tax_name; ?>"  />
                   <br/>
                   <?php echo form_error('secondary_tax_name'); ?>
                </div>
            </div>
                  <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5>Secondary Tax Rate %</h5>
                </div>
                <div class="col-lg-9">
                  <div class="input-group mb15 col-sm-2">
                    <input id="secondary_tax_rate" type="text" name="secondary_tax_rate" maxlength="3" class="form-control"  value="<?php echo $taxing_scheme->secondary_tax_rate; ?>"  />
                  <span class="input-group-addon">%</span>
                </div>
                <?php echo form_error('secondary_tax_rate'); ?>
                </div>
            </div>
            <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5>Compund Secondary Tax on Primary</h5>
                </div>
                <div class="col-lg-9">
                   <div class="checkbox block">
               <input id="comp_sec_tax_primary" name="comp_sec_tax_primary" type="radio" class="" value="1" <?php if($taxing_scheme->comp_sec_tax_primary==1) echo'checked'; ?> />      
               <label for="comp_sec_tax_primary" class="">Yes</label>
                        <input id="comp_sec_tax_primary" name="comp_sec_tax_primary" type="radio" class="" value="0" <?php if($taxing_scheme->comp_sec_tax_primary==0) echo'checked'; ?> />
                    <label for="comp_sec_tax_primary" class="">No</label>
                   </div>
                   <br/>
                <?php echo form_error('comp_sec_tax_primary'); ?>
                </div>
            </div>
            <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5>Tax on Shipping</h5>
                </div>
                    <div class="col-lg-9">
                   <div class="checkbox block">
               <input id="tax_shipping" name="tax_shipping" type="radio" class="" value="1" <?php if($taxing_scheme->tax_shipping==1) echo'checked'; ?> />      
               <label for="tax_shipping" class="">Yes</label>
                        <input id="tax_shipping" name="tax_shipping" type="radio" class="" value="0" <?php if($taxing_scheme->tax_shipping==0) echo'checked'; ?> />
                    <label for="tax_shipping" class="">No</label>
                   </div>
                   <br/>
                <?php echo form_error('tax_shipping'); ?>
                </div>
            </div>
        
            <div class="panel-footer">
              <button class="btn btn-primary pull-right" type="submit">Save</button>
            </div>
            <?php echo form_close(); ?>
          
      </div>
        
        </div>
        </div>
</div>
</div>