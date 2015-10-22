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
         <div class="panel panel-default">
        <div class="panel-body">
          <h5 class="subtitle mb5">Pricing / Currencies</h5>
          <br />
         <div class="table-responsive">
                    <?php // Change the css classes to suit your needs    

$attributes = array('class' => 'form-horizontal', 'id' => 'basicForm2');
echo form_open('settings/pricing_currencies/'.$this->session->userdata('session_user_com'), $attributes); ?>
        <div class="row">
        <div class="col-sm-4">Price Name</div>
        <div class="col-sm-4">Currency</div>
        <div class="col-sm-3">Activate / De-activate</div>
        
        </div>

        <div class="row"><hr/></div>

        <div class="row">
          <div class="col-sm-4">
          <input name="p1" class="form-control" value="<?php echo $pricing_currencies->p1; ?>" />
          <?php echo form_error('p1'); ?>
          </div>
          <div class="col-sm-4">
            <select name="c1" class="form-control">
            <?php foreach ($currencies as $currency):?>
              <option value="<?php echo $currency->id; ?>" <?php if( $currency->id==$pricing_currencies->c1) echo 'selected';?> ><?php echo $currency->currency_sign; ?></option>
            <?php endforeach ?>
            </select>
            <?php echo form_error('c1'); ?>
          </div>
          <div class="col-sm-2"> 
            <select name="" class="form-control" disabled="disabled">
               <option value="" selected>On</option>
            </select>
            
                </div>
         
                      
          </div>

          <div class="row"><hr/></div>

          <div class="row">
          <div class="col-sm-4">
          <input name="p2" class="form-control" value="<?php echo $pricing_currencies->p2; ?>" />
          <?php echo form_error('p2'); ?>
          </div>
          <div class="col-sm-4">
            <select name="c2" class="form-control">
            <?php foreach ($currencies as $currency):?>
              <option value="<?php echo $currency->id; ?>" <?php if( $currency->id==$pricing_currencies->c2) echo 'selected';?> ><?php echo $currency->currency_sign; ?></option>
            <?php endforeach ?>
            </select>
            <?php echo form_error('c2'); ?>
          </div>
           <div class="col-sm-2"> 
            <select name="active2" class="form-control">
              <option value="0" <?php if($pricing_currencies->active2=='0') echo 'selected';?>>Off</option>
              <option value="1" <?php if($pricing_currencies->active2=='1') echo 'selected';?> >On</option>
            </select>
            <?php echo form_error('active2'); ?>
                </div>
                      
          </div>

          <div class="row"><hr/></div>

          <div class="row">
          <div class="col-sm-4">
          <input name="p3" class="form-control" value="<?php echo $pricing_currencies->p3; ?>" />
          <?php echo form_error('p3'); ?>
          </div>
          <div class="col-sm-4">
            <select name="c3" class="form-control">
            <?php foreach ($currencies as $currency):?>
              <option value="<?php echo $currency->id; ?>" <?php if( $currency->id==$pricing_currencies->c3) echo 'selected';?> ><?php echo $currency->currency_sign; ?></option>
            <?php endforeach ?>
            </select>
            <?php echo form_error('c3'); ?>
          </div>
         <div class="col-sm-2"> 
            <select name="active3" class="form-control">
              <option value="0" <?php if($pricing_currencies->active3=='0') echo 'selected';?>>Off</option>
              <option value="1" <?php if($pricing_currencies->active3=='1') echo 'selected';?> >On</option>
            </select>
            <?php echo form_error('active3'); ?>
                </div> 
          </div>

          <div class="row"><hr/></div>

          <div class="row">
          <div class="col-sm-4">
          <input name="p4" class="form-control" value="<?php echo $pricing_currencies->p4; ?>" />
          <?php echo form_error('p4'); ?>
          </div>
          <div class="col-sm-4">
            <select name="c4" class="form-control">
            <?php foreach ($currencies as $currency):?>
              <option value="<?php echo $currency->id; ?>" <?php if( $currency->id==$pricing_currencies->c4) echo 'selected';?> ><?php echo $currency->currency_sign; ?></option>
            <?php endforeach ?>
            </select>
            <?php echo form_error('c4'); ?>
          </div>
           <div class="col-sm-2"> 
            <select name="active4" class="form-control">
              <option value="0" <?php if($pricing_currencies->active4=='0') echo 'selected';?>>Off</option>
              <option value="1" <?php if($pricing_currencies->active4=='1') echo 'selected';?> >On</option>
            </select>
            <?php echo form_error('active4'); ?>
                </div>
                      
          </div>
<div class="row"><hr/></div>
          <div class="row">
          <div class="col-sm-4">
          <input name="p5" class="form-control" value="<?php echo $pricing_currencies->p5; ?>" />
          <?php echo form_error('p5'); ?>
          </div>
          <div class="col-sm-4">
            <select name="c5" class="form-control">
            <?php foreach ($currencies as $currency):?>
              <option value="<?php echo $currency->id; ?>" <?php if( $currency->id==$pricing_currencies->c5) echo 'selected';?> ><?php echo $currency->currency_sign; ?></option>
            <?php endforeach ?>
            </select>
          <?php echo form_error('c5'); ?>
          </div>
            <div class="col-sm-2"> 
            <select name="active5" class="form-control">
              <option value="0" <?php if($pricing_currencies->active5=='0') echo 'selected';?>>Off</option>
              <option value="1" <?php if($pricing_currencies->active5=='1') echo 'selected';?> >On</option>
            </select>
            <?php echo form_error('active5'); ?>
                </div>
                      
          </div>
        </div>

       <br/>
         
                 <input type="submit" name="submit" value="Save Changes" class="btn btn-block btn-primary"> 
          </form>
          </div>
   
         
        </div><!-- panel-body -->
      
        
    </div>
        </div>
        </div>
</div>
</div>