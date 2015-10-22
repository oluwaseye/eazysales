    <div class="pageheader">
    <?php if($user_companies==TRUE){?>
      <h3><i class="fa fa-cog"></i>Company/Business Information</h3>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index-2.html">Bracket</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </div>
      <?php }else{?>
      <div class="alert alert-info"><h5><i class="fa fa-star-half-full"></i> To start using EazySales, you need to create a company/business</h5></div>
      <?php }?>
  </div>
<div class="col-md-12">
<?php // Change the css classes to suit your needs    

$attributes = array('class' => 'form-horizontal', 'id' => 'basicForm2', 'novalidate'=>'novalidate');
echo form_open('newbusiness', $attributes); ?>
  
          <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Company Information</h4>
              </div>
              <div class="panel-body">
                <div class="error"></div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Company Name <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                  <input id="company_name" type="text" class="form-control" placeholder="Company Name" name="company_name" maxlength="100" required="" value="<?php echo set_value('company_name'); ?>"  />
                    <?php echo form_error('company_name'); ?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Contact Email <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                  <input id="contact_email" type="email" class="form-control" title="Your email address is required!" placeholder="Type your email..." required="" name="contact_email" maxlength="50" value="<?php echo set_value('contact_email'); ?>"  />
                     <?php echo form_error('contact_email'); ?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Website</label>
                  <div class="col-sm-9">
                    <input id="website" type="url" name="website" value="<?php echo set_value('website'); ?>"  title="Please enter a valid url!" class="form-control"/>
                  <?php echo form_error('website'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Contact Address <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
           <textarea rows="5" class="form-control" name="contact_address"  placeholder="Contact Address" 
           value="<?php echo set_value('contact_address'); ?>"   required=""><?php echo set_value('contact_address'); ?></textarea>
                  <?php echo form_error('contact_address'); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">City <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                  <input id="city" type="text" class="form-control" 
                   placeholder="City" required="" name="city" maxlength="50" 
                   value="<?php echo set_value('city'); ?>"  />
                     <?php echo form_error('city'); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">State/Region <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                  <input id="state_region" type="text" class="form-control" placeholder="State/Region" required="" name="state_region"
                   maxlength="50" value="<?php echo set_value('state_region'); ?>"  />
                         <?php echo form_error('state_region'); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Country <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                         <?php $options = array(
                                                  ''  => 'Please Select',
                                                  'nigeria'    => 'Nigeria',
                                                  'ghana'    => 'Ghana'
                                                ); ?>
                     <?php echo form_dropdown('country', $options, set_value('country'), 'class="form-control"')?>
                      <?php echo form_error('country'); ?>
                  </div>
                </div>
                
              </div><!-- panel-body -->
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                  </div>
                </div>
              </div>
            
          </div><!-- panel -->
          <?php echo form_close(); ?>
          
        </div>