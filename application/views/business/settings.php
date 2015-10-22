<div class="col-md-12 mb20">
<div class="row">
  <div class="col-md-3">
    <div class="leftpanelinner">    
      
  <ul class="nav nav-pills nav-stacked nav-bracket">
        <li class="active"><a href="<?php echo base_url().'settings/business/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-bookmark"></i> <span>Business</span></a></li>
        <li><a href="<?php echo base_url().'settings/locations/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-map-marker"></i> <span>Locations</span></a></li>
        <li><a href="<?php echo base_url().'settings/addresses/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-location-arrow"></i> <span>Addresses</span></a></li>
        <li class=""><a href="<?php echo base_url().'settings/salesreps/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-users"></i> <span>Sales Reps</span></a> </li> 
        <!-- <!--<li class=""><a href="<?php echo base_url().'settings/reference/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-list-alt"></i> <span>Reference</span></a> </li>--> -->
        <li><a href="<?php echo base_url().'settings/doc_numbers/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-file"></i> <span>Doc Numbers</span></a> </li>
        </ul>
 
    </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12 mb20">
          
      
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-dark">
          <li class="active"><a href="<?php echo base_url().'settings/business/'.$this->session->userdata('session_user_com');?>" ><strong>Business Info</strong></a></li>
          <li class=""><a href="<?php echo base_url().'settings/product_inventory/'.$this->session->userdata('session_user_com');?>" ><strong>Product & Inventory</strong></a></li>
          <li><a href="<?php echo base_url().'settings/pricing_tax/'.$this->session->userdata('session_user_com');?>"><strong>Pricing & Tax</strong></a></li>
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
<?php // Change the css classes to suit your needs    

$attributes = array('class' => 'form-horizontal', 'id' => 'basicForm2', 'novalidate'=>'novalidate');
echo form_open('settings/business/'.$this->session->userdata('session_user_com'), $attributes); ?>
  
       
            
             
                <div class="form-group">
                  <label class="col-sm-3 control-label">Company Name <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                  <input id="company_name" type="text" class="form-control" placeholder="Company Name" name="company_name" maxlength="100" required="" value="<?php if(set_value('company_name')){ echo set_value('company_name');}else{echo $company->company_name;} ?>"  />
                    <?php echo form_error('company_name'); ?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Contact Email <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                  <input id="contact_email" type="email" class="form-control" title="Your email address is required!" placeholder="Type your email..." required="" name="contact_email" maxlength="50" value="<?php if(set_value('contact_email')){ echo set_value('contact_email');}else{echo $company->contact_email;} ?>"  />
                     <?php echo form_error('contact_email'); ?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Website</label>
                  <div class="col-sm-9">
                    <input id="website" type="url" name="website" value="<?php if(set_value('website')){ echo set_value('website');}else{echo $company->website;} ?>"  title="Please enter a valid url!" class="form-control"/>
                  <?php echo form_error('website'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Contact Address <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
           <textarea rows="5" class="form-control" name="contact_address"  placeholder="Contact Address" 
           value="<?php echo set_value('contact_address'); ?>"   required=""><?php if(set_value('contact_address')){ echo set_value('contact_address');}else{echo $company->contact_address;} ?></textarea>
                  <?php echo form_error('contact_address'); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">City <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                  <input id="city" type="text" class="form-control" 
                   placeholder="City" required="" name="city" maxlength="50" 
                   value="<?php if(set_value('city')){ echo set_value('city');}else{echo $company->city;} ?>"  />
                     <?php echo form_error('city'); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">State/Region <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                  <input id="state_region" type="text" class="form-control" placeholder="State/Region" required="" name="state_region"
                   maxlength="50" value="<?php if(set_value('state_region')){ echo set_value('state_region');}else{echo $company->state_region;} ?>"  />
                         <?php echo form_error('state_region'); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Country <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                         <?php $options = array(
                                                  $company->country  => $company->country,
                                                  'nigeria'    => 'Nigeria',
                                                  'ghana'    => 'Ghana'
                                                ); ?>
                     <?php echo form_dropdown('country', $options, set_value('country'), 'class="form-control"')?>
                      <?php echo form_error('country'); ?>
                  </div>
                </div>
                
             
            
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                  </div>
                </div>
         
          <?php echo form_close(); ?>
          
      </div>
        
        </div>
        
    
        </div>
        </div>
</div>
</div>