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
              <h4 class="panel-title">Pricing</h4>
            </div>
            <?php // Change the css classes to suit your needs    

$attributes = array('class' => 'form-horizontal', 'id' => 'basicForm2', 'novalidate'=>'novalidate');
echo form_open('settings/pricing_tax/'.$this->session->userdata('session_user_com'), $attributes); ?>

  
            <div class="panel-body">
              <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5>Choose Default Currency</h5>
                </div>
                <div class="col-lg-9">
                  <select class="form-control mb15" name="default_currency">
                  <?php if(isset($pricing_settings->default_currency)):?>
                  <option value="<?php echo $pricing_settings->default_currency; ?>"><?php echo $pricing_settings->default_currency; ?></option>
                <?php endif;?>
                  <?php foreach ($currencies as $currency) :?>
                    <option value="<?php echo $currency->currency_sign?>"><?php echo $currency->currency_sign; ?></option>
                  <?php endforeach ?>
                </select>
                <?php echo form_error('default_currency'); ?>
                </div>
            </div>
            <?php if(isset($pricing_settings->default_currency)):?>
            <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5>Default Currency</h5>
                </div>
                <div class="col-lg-9">
                  <div class="alert alert-info">Default Currency is (<?php echo $pricing_settings->default_currency; ?>) </div>
                </div>
            </div>
            <?php endif;?>
            <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5>Choose Default Pricing/Currency</h5>
                </div>
                <div class="col-lg-9">
                 <select class="form-control mb15" name="default_pricing_currency">
                  <option value="normal">Normal Price</option>
                  
                </select>
                <?php echo form_error('default_pricing_currency'); ?>
                </div>
            </div>
            <?php if(isset($pricing_settings->default_pricing_type)):?>
            <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5>Default Pricing/Currency</h5>
                </div>
                <div class="col-lg-9">
                  <div class="alert alert-info">Default Pricing Currency is (<?php echo $pricing_settings->default_pricing_type; ?>) </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5> Pricing/Currency</h5>
                </div>
                <div class="col-lg-9">
                  <a href="<?php echo base_url().'settings/pricing_currencies/'.$this->session->userdata('session_user_com');?>" class="btn btn-primary">Edit Pricing/Currency</a>
                </div>
            </div>
            <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5> Use Current Cost</h5>
                </div>
                <div class="col-lg-9">
                   <div class="checkbox block">
                <input id="use_current_cost" name="use_current_cost" type="radio" value="1" <?php echo $this->form_validation->set_radio('use_current_cost', '1'); ?> <?php if(set_value('use_current_cost')){ echo set_value('use_current_cost');}elseif($pricing_settings->use_current_cost=='1'){echo 'checked';} ?>/>
                        <label for="use_current_cost" class="">Yes</label>

                        <input id="use_current_cost" name="use_current_cost" type="radio" value="0" <?php echo $this->form_validation->set_radio('use_current_cost', '0'); ?> <?php if(set_value('use_current_cost')){ echo set_value('use_current_cost');}elseif($pricing_settings->use_current_cost=='0'){echo 'checked';} ?>/>
                        <label for="use_current_cost" class="">No</label>
                   </div>
                   <?php echo form_error('use_current_cost'); ?>
                </div>
            </div>
           
                  <div class="panel-heading">
              <h4 class="panel-title">Tax</h4>
            </div>
                  
            <div class="panel-body">
               <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5>Show Taxes</h5>
                </div>
                <div class="col-lg-9">
                    <div class="checkbox block">
                <input id="show_taxes" name="show_taxes" type="radio" value="1" <?php echo $this->form_validation->set_radio('show_taxes', '1'); ?> <?php if(set_value('show_taxes')){ echo set_value('show_taxes');}elseif($tax_settings->show_taxes=='1'){echo 'checked';} ?>/>
                        <label for="show_taxes" class="">Yes</label>

                        <input id="show_taxes" name="show_taxes" type="radio" value="0" <?php echo $this->form_validation->set_radio('show_taxes', '0'); ?> <?php if(set_value('show_taxes')){ echo set_value('show_taxes');}elseif($tax_settings->show_taxes=='0'){echo 'checked';} ?>/>
                        <label for="show_taxes" class="">No</label>
                   </div>
                   <?php echo form_error('show_taxes'); ?>
                </div>
            </div>
              <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5> Choose Default Taxing Scheme</h5>
                </div>
                <div class="col-lg-9">
                <?php if(($tax_settings->default_scheme_id==0) && (empty($taxing_schemes))){?>
                <input type="hidden" name="default_tax_scheme" value="0" />
                <div class="alert alert-info">You have not created any Tax Schemes</div>
                <?php }else{?>
                <select class="form-control mb15" name="default_tax_scheme">
                <?php foreach ($taxing_schemes as $ts):?>
                  <option value="<?php echo $ts->id; ?>"><?php echo $ts->scheme_name; ?></option>
                <?php endforeach ?>
                </select>
                <?php echo form_error('default_tax_scheme'); ?>
                <?php }?>
                </div>
            </div>
            <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5> Taxing Scheme</h5>
                </div>
                <div class="col-lg-9">
                 <a href="<?php echo base_url().'settings/taxing_schemes/'.$this->session->userdata('session_user_com');?>" class="btn btn-primary">Add/Edit Taxing Scheme</a>
                </div>
            </div>
              <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5> Choose Default Product Tax Code </h5>
                </div>
                <div class="col-lg-9">
                <?php if(($tax_settings->default_tax_code_id==0) && (empty($product_tax_codes))){?>
                <input type="hidden" name="default_product_tax_code" value="0" />
                <div class="alert alert-info">You have not created any Product Tax Codes</div>
                <?php }else{?>
                  <select class="form-control mb15" name="default_product_tax_code">
                  <?php foreach ($product_tax_codes as $ptc):?>
                  <option value="<?php echo $ptc->id; ?>"><?php echo $ptc->name; ?></option>
                  <?php endforeach ?>
                </select>
                <?php echo form_error('default_product_tax_code'); ?>
                <?php }?>
                </div>
            </div>
                    <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5> Product Tax Codes</h5>
                </div>
                <div class="col-lg-9">
                  <a href="<?php echo base_url().'settings/product_tax_codes/'.$this->session->userdata('session_user_com');?>" class="btn btn-primary">Add/Edit Product Tax Codes</a>
                </div>
            </div>
            <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5> Show Product Tax</h5>
                </div>
                <div class="col-lg-9">
                    <div class="checkbox block">
                <input id="show_product_tax_code" name="show_product_tax_code" type="radio" value="1" <?php echo $this->form_validation->set_radio('show_product_tax_code', '1'); ?> <?php if(set_value('show_product_tax_code')){ echo set_value('show_product_tax_code');}elseif($tax_settings->show_product_tax_code=='1'){echo 'checked';} ?>/>
                        <label for="show_product_tax_code" class="">Yes</label>

                        <input id="show_product_tax_code" name="show_product_tax_code" type="radio" value="0" <?php echo $this->form_validation->set_radio('show_product_tax_code', '0'); ?> <?php if(set_value('show_product_tax_code')){ echo set_value('show_product_tax_code');}elseif($tax_settings->show_product_tax_code=='0'){echo 'checked';} ?>/>
                        <label for="show_product_tax_code" class="">No</label>
                   </div>
                   <?php echo form_error('show_product_tax_code'); ?>
                </div>
            </div>
                <div class="row row-pad-5">
                <div class="col-lg-3">
                  <h5> Show Secondary Tax</h5>
                </div>
                <div class="col-lg-9">
                    <div class="checkbox block">
                <input id="show_sec_tax" name="show_sec_tax" type="radio" value="1" <?php echo $this->form_validation->set_radio('show_sec_tax', '1'); ?> <?php if(set_value('show_sec_tax')){ echo set_value('show_sec_tax');}elseif($tax_settings->show_sec_tax=='1'){echo 'checked';} ?>/>
                        <label for="show_sec_tax" class="">Yes</label>

                        <input id="show_sec_tax" name="show_sec_tax" type="radio" value="0" <?php echo $this->form_validation->set_radio('show_sec_tax', '0'); ?> <?php if(set_value('show_sec_tax')){ echo set_value('show_sec_tax');}elseif($tax_settings->show_sec_tax=='0'){echo 'checked';} ?>/>
                        <label for="show_sec_tax" class="">No</label>
                   </div>
                   <?php echo form_error('show_sec_tax'); ?>
                </div>
            </div>
            <!-- panel-body -->
            <div class="panel-footer">
              <button class="btn btn-primary pull-right" type="submit">Save</button>
            </div>
            <?php echo form_close(); ?>
          </div>
          
      </div>
        
        </div>
        </div>
</div>
</div>