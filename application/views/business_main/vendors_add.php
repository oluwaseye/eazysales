<div class="col-md-12 mb20">
   <div class="pageheader">
      <h2><i class="fa fa-user"></i> Add Vendor <a href="<?php echo base_url().'vendor/business/'.$this->session->userdata('session_user_com');?>" class="btn btn-info pull-right"><i class="fa fa-list-alt"></i> Vendors</a>
          </h2>

      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index-2.html">Dashboard</a></li>
          <li><a href="<?php echo base_url().'vendor/business/'.$this->session->userdata('session_user_com');?>">Vendors</a></li>
          <li class="active">Add Vendor</li>
        </ol>

      </div>

    </div>
     
         <div class="panel panel-default">
        <div class="panel-body">

        
        <?php 
          $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
          echo form_open('vendor/add_vendor/'.$this->session->userdata('session_user_com'), $attributes); ?>
        <div class="row">
        <hr/>
          <div class="col-md-6">
          <h4>Basic Info</h4>
          <hr/>
          
            
              
                <div class="form-group">
                  <label class="col-sm-4 control-label">Name:</label>
                  <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>"/>
                    <?php echo form_error('name'); ?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label">Balance:</label>
                  <div class="col-sm-6">
                     <div class="input-group mb15 col-sm-6">
                  <span class="input-group-addon">$</span>
                  <input type="text" name="balance" value="<?php echo set_value('name'); ?>" class="form-control" />
                  </div>
                  <?php echo form_error('balance'); ?>
                  </div>
                </div>
                <hr/>
                <h4>Contact Info</h4>
                  <hr/>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Name:</label>
                  <div class="col-sm-6">
                    <input type="text" name="contact_name" class="form-control" value="<?php echo set_value('contact_name'); ?>"/>
                    <?php echo form_error('contact_name'); ?>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Phone:</label>
                  <div class="col-sm-6">
                    <input type="text" name="contact_phone" class="form-control" value="<?php echo set_value('contact_phone'); ?>" />
                    <?php echo form_error('contact_phone'); ?>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Fax:</label>
                  <div class="col-sm-6">
                    <input type="text" name="contact_fax" class="form-control" value="<?php echo set_value('contact_fax'); ?>"/>
                    <?php echo form_error('contact_fax'); ?>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Email:</label>
                  <div class="col-sm-6">
                    <input type="text" name="contact_email" class="form-control" value="<?php echo set_value('contact_email'); ?>"/>
                    <?php echo form_error('contact_email'); ?>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Website:</label>
                  <div class="col-sm-6">
                    <input type="text" name="contact_web" class="form-control" value="<?php echo set_value('contact_web'); ?>"/>
                    <?php echo form_error('contact_web'); ?>
                  </div>
                </div>
             <hr/>
               <h4>Remarks</h4>
               <hr/>
              <div class="form-group">
              <label class="col-sm-4 control-label">Remarks</label>
              <div class="col-sm-6">
                <textarea class="form-control" rows="6" name="remarks"><?php echo set_value('remarks'); ?></textarea>
                <?php echo form_error('remarks'); ?>
              </div>
            </div>
            </div>
                 <div class="col-md-6">

                    <h4>Location</h4>
               <hr/>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Type</label>
                <div class="col-sm-6">
                    <select class="form-control mb15" name="loc_type">
                  <option value="">Choose Address Type</option>
                  <option value="residential">Residential</option>
                  <option value"commercial">Commercial</option>
                </select>
                <?php echo form_error('loc_type'); ?>
                  </div>
                  </div>
              <div class="form-group">
              <label class="col-sm-4 control-label">Address</label>
              <div class="col-sm-6">
                <textarea class="form-control" rows="2" name="address"><?php echo set_value('address'); ?></textarea>
                <?php echo form_error('address'); ?>
              </div>
            </div>



              <div class="form-group">
                  <label class="col-sm-4 control-label">State/Province:</label>
                  <div class="col-sm-6">
                    <input type="text" name="state" class="form-control" value="<?php echo set_value('state'); ?>" />
                    <?php echo form_error('state'); ?>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-4 control-label">Country</label>
                <div class="col-sm-6">
                    <select class="form-control mb15" name="country">
                    <?php foreach ($countries as $country): ?>
                  <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                <?php endforeach ?>
                </select>
                <?php echo form_error('country'); ?>
                  </div>
                  </div>

           <hr/>
               <h4>Purchasing Info</h4>
               <hr/>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Payment Terms: </label>
                  <div class="col-sm-6">
                  <?php if(!empty($payment_terms)){?>
                    <select class="form-control mb15" name="payment_terms_id">
                   <?php foreach ($payment_terms as $payment_term): ?>
                  <option value="<?php echo $payment_term->id; ?>"><?php echo $payment_term->terms; ?></option>
                <?php endforeach ?>
                </select>
                 <?php }else{?>
                 <p>You do not have any Payment Term</p>
                <a href="" class="btn btn-primary btn-small btn-block"><i class="fa fa-cog"></i> Create Payment Terms</a>
                <?php }?>
                <?php echo form_error('payment_terms_id'); ?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label">Taxing Scheme: </label>
                  <div class="col-sm-6">
                       <?php if(!empty($taxing_schemes)){?>
                    <select class="form-control mb15" name="taxing_scheme_id">
                   <?php foreach ($taxing_schemes as $taxing_scheme): ?>
                  <option value="<?php echo $taxing_scheme->id; ?>"><?php echo $taxing_scheme->scheme_name; ?></option>
                <?php endforeach ?>
                </select>
                 <?php }else{?>
                 <p>You do not have any Taxing Scheme</p>
                <a href="" class="btn btn-primary btn-small btn-block"><i class="fa fa-cog"></i> Create Taxing Scheme</a>
                <?php }?>
                <?php echo form_error('taxing_scheme_id'); ?>
                  </div>
                </div>

                   <div class="form-group">
                  <label class="col-sm-4 control-label">Shipping Carrier: </label>
                  <div class="col-sm-6">
                         <?php if(!empty($shipping_carriers)){?>
                    <select class="form-control mb15" name="carrier_id">
                   <?php foreach ($shipping_carriers as $shipping_carrier): ?>
                  <option value="<?php echo $shipping_carrier->id; ?>"><?php echo $shipping_carrier->name; ?></option>
                <?php endforeach ?>
                </select>
                 <?php }else{?>
                 <p>You do not have any Shipping Carrier</p>
                <a href="" class="btn btn-primary btn-small btn-block"><i class="fa fa-cog"></i> Create Shipping Carrier </a>
                <?php }?>
                <?php echo form_error('carrier_id'); ?>
                  </div>
                </div>

                   <div class="form-group">
                  <label class="col-sm-4 control-label">Currency: </label>
                  <div class="col-sm-6">
                    <select class="form-control mb15" name="currency_id">
                   <?php foreach ($currencies as $currency): ?>
                  <option value="<?php echo $currency->id; ?>"><?php echo $currency->currency_sign; ?></option>
                <?php endforeach ?>
                </select>
                <?php echo form_error('currency_id'); ?>
                  </div>
                </div>
            

                <hr/>
                <h4>Custom Info</h4>
                  <hr/>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Alternate Contact:</label>
                  <div class="col-sm-6">
                    <input type="text" name="alt_contact" class="form-control" value="<?php echo set_value('alt_contact'); ?>"/>
                    <?php echo form_error('alt_contact'); ?>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Alternate Contact 2:</label>
                  <div class="col-sm-6">
                    <input type="text" name="alt_contact_2" class="form-control" value="<?php echo set_value('alt_contact_2'); ?>"/>
                    <?php echo form_error('alt_contact_2'); ?>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Alternate Contact 3:</label>
                  <div class="col-sm-6">
                    <input type="text" name="alt_contact_3" class="form-control" value="<?php echo set_value('alt_contact_3'); ?>" />
                    <?php echo form_error('alt_contact_3'); ?>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Emergency Phone:</label>
                  <div class="col-sm-6">
                  <div class="input-group mb15 col-sm-12">
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" name="emergency_phone" class="form-control" value="<?php echo set_value('emergency_phone'); ?>" />
                    <?php echo form_error('emergency_phone'); ?>
                    </div>
                  </div>
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