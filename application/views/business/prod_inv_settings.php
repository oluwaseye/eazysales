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
          <div class="col-md-12 mb20">
          
      
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-dark">
          <li><a href="<?php echo base_url().'settings/business/'.$this->session->userdata('session_user_com');?>" ><strong>Business Info</strong></a></li>
          <li  class="active"><a href="<?php echo base_url().'settings/product_inventory/'.$this->session->userdata('session_user_com');?>" ><strong>Product & Inventory</strong></a></li>
          <li><a href="<?php echo base_url().'settings/pricing_tax/'.$this->session->userdata('session_user_com');?>"><strong>Pricing & Tax</strong></a></li>
         </ul>
        
        <!-- Tab panes -->
        <div class="tab-content mb30">
          <div class="tab-pane active" id="home2">
           <?php if ($success_product==1){?>
                                                <div class="alert alert-success">
                                                <button class="close" data-dismiss="alert"></button>
                                                <strong><i class="fa fa-smile-o"></i> Yay!</strong> Your update was successful....
                                                </div>
                                                <?php }elseif($success_product==2){
                                                  ?>
                                                  <div class="alert alert-danger">
                                                <button class="close" data-dismiss="alert"></button>
                                                <strong><i class="fa fa-frown-o"></i> Oops!</strong> Something went wrong....
                                                </div>
                                                  <?php
                                                  } ?>
<?php // Change the css classes to suit your needs    

$attributes = array('class' => 'form-horizontal', 'id' => 'basicForm2', 'novalidate'=>'novalidate');
echo form_open('settings/product_inventory/'.$this->session->userdata('session_user_com'), $attributes); ?>
  
       <!-- PRODUCTS SETTINGS-->
            <h4>Products</h4>
             
                <div class="form-group">
                  <label class="col-sm-4 control-label">Show Product Description <span class="asterisk">*</span></label>
                  <div class="col-sm-8">
           <div class="checkbox block">


           <input id="prod_desc" name="prod_desc" type="radio" value="1" <?php echo $this->form_validation->set_radio('prod_desc', '1'); ?> <?php if(set_value('prod_desc')){ echo set_value('prod_desc');}elseif($prod_settings->show_description=='1'){echo 'checked';} ?>/>
                        <label for="product description" class="">Yes</label>

                        <input id="prod_desc" name="prod_desc" type="radio" value="0" <?php echo $this->form_validation->set_radio('prod_desc', '0'); ?> <?php if(set_value('prod_desc')){ echo set_value('prod_desc');}elseif($prod_settings->show_description=='0'){echo 'checked';} ?>/>
                        <label for="product description" class="">No</label>
           </div>
           <?php echo form_error('prod_desc'); ?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label">Show Units of Measurement <span class="asterisk">*</span></label>
                  <div class="col-sm-8">
                  <div class="checkbox block">
               
                   <input id="unit_measure" name="unit_measure" type="radio" value="1" <?php echo $this->form_validation->set_radio('unit_measure', '1'); ?> <?php if(set_value('unit_measure')){ echo set_value('unit_measure');}elseif($prod_settings->show_measurement=='1'){echo 'checked';} ?>/>
                        <label for="unit measurement" class="">Yes</label>

                        <input id="unit_measure" name="unit_measure" type="radio" value="0" <?php echo $this->form_validation->set_radio('unit_measure', '0'); ?> <?php if(set_value('unit_measure')){ echo set_value('unit_measure');}elseif($prod_settings->show_measurement=='0'){echo 'checked';} ?>/>
                        <label for="measurement" class="">No</label>
                  </div>
                    <?php echo form_error('unit_measure'); ?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label">Unit Type (Length) <span class="asterisk">*</span></label>
                       <div class="col-sm-8">
                         <?php $options = array(
                                                  $prod_settings->unit_type_length  => $prod_settings->unit_type_length,
                                                  'Metric (mm)'    => 'Metric (mm)',
                                                  'Metric (cm)'    => 'Metric (cm)',
                                                  'Metric (m)'    => 'Metric (m)',
                                                  'Imperial (feet)'    => 'Imperial (feet)',
                                                  'Imperial (inches)'    => 'Imperial (inches)'
                                                ); ?>
                     <?php echo form_dropdown('unit_type_l', $options, set_value('unit_type_l'), 'class="form-control"')?>
                      <?php echo form_error('unit_type_l'); ?>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-4 control-label">Unit Type (Weight) <span class="asterisk">*</span></label>
                          <div class="col-sm-8">
                     <?php $options = array(
                                              $prod_settings->unit_type_weight  => $prod_settings->unit_type_weight,
                                                  'Metric (g)'    => 'Metric (g)',
                                                  'Metric (kg)'    => 'Metric (kg)',
                                                  'Imperial (lbs)'    => 'Imperial (lbs)',
                                                  'Imperial (og)'    => 'Imperial (og)'
                                                ); ?>
                     <?php echo form_dropdown('unit_type_w', $options, set_value('unit_type_w'), 'class="form-control"')?>
                      <?php echo form_error('unit_type_w'); ?>
                  </div>
                </div>

                 
                  <hr>
         
          <!-- INVENTORY SETTINGS-->



  
       
            <h4>Inventory</h4>
             
                <div class="form-group">
                  <label class="col-sm-4 control-label">Choose Default Location <span class="asterisk">*</span></label>
                          <div class="col-sm-8">
                   <?php if(empty($loc_settings)){?>
                   <div class="alert alert-info">You have not created any location. <a href="<?php echo base_url().'settings/locations/'.$this->session->userdata('session_user_com');?>" style="text-decoration:underline;">click here</a> to add locations.</div>
                   <?php }else{ ?>
                      <select name="default_location" class="form-control">
                      <?php foreach($loc_settings as $loc):?>
                        <option value="<?php echo $loc->location;?>"><?php echo $loc->location;?></option>
                      <?php endforeach ?>
                      </select>
                      <?php echo form_error('default_location'); ?>
                      <?php } ?>
                  </div>
                </div>

                   <div class="form-group">
                  <label class="col-sm-4 control-label">Current Default Location </span></label>
                          <div class="col-sm-8">
                   <?php if(empty($def_inv_location)){?>
                   <div class="alert alert-warning">You have not created any location. <a href="<?php echo base_url().'settings/locations/'.$this->session->userdata('session_user_com');?>" style="text-decoration:underline;">click here</a> to add locations.</div>
                   <?php }else{ ?>
                     <div class="alert alert-info"><?php echo $def_inv_location->default_location_id ?></div>
                      <?php } ?>
                  </div>
                </div>
                
             
              <div class="form-group">
                  <label class="col-sm-4 control-label">Warn about Negative Inventory <span class="asterisk">*</span></label>
                          <div class="col-sm-8">
                   <div class="checkbox block">
                <input id="warn_negative" name="warn_negative" type="radio" value="1" <?php echo $this->form_validation->set_radio('warn_negative', '1'); ?> <?php if(set_value('warn_negative')){ echo set_value('warn_negative');}elseif($inven_settings->warn_negative=='1'){echo 'checked';} ?>/>
                        <label for="negative measurement" class="">Yes</label>

                        <input id="warn_negative" name="warn_negative" type="radio" value="0" <?php echo $this->form_validation->set_radio('warn_negative', '0'); ?> <?php if(set_value('warn_negative')){ echo set_value('warn_negative');}elseif($inven_settings->warn_negative=='0'){echo 'checked';} ?>/>
                        <label for="negative measurement" class="">No</label>
                   </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button class="btn btn-primary pull-right" type="submit">Save Changes</button>
                  </div>
                </div>
                  <?php echo form_close(); ?>

<hr>




      </div>
        
        </div>
        
    
        </div>
        </div>
</div>
</div>