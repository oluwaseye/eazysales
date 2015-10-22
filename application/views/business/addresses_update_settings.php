<div class="col-md-12 mb20">
<div class="row">
  <div class="col-md-3">
    <div class="leftpanelinner">    
      
  <ul class="nav nav-pills nav-stacked nav-bracket">
        <li><a href="<?php echo base_url().'settings/business/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-bookmark"></i> <span>Business</span></a></li>
        <li><a href="<?php echo base_url().'settings/locations/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-map-marker"></i> <span>Locations</span></a></li>
        <li class="active"><a href="<?php echo base_url().'settings/addresses/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-location-arrow"></i> <span>Addresses</span></a></li>
        <li class=""><a href="<?php echo base_url().'settings/salesreps/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-users"></i> <span>Sales Reps</span></a> </li>
        <!--<li class=""><a href="<?php echo base_url().'settings/reference/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-list-alt"></i> <span>Reference</span></a> </li>-->
        <li class=""><a href="<?php echo base_url().'settings/doc_numbers/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-file"></i> <span>Doc Numbers</span></a> </li>
        </ul>
 
 
    </div>
        </div>
        <div class="col-md-9">
         <div class="panel panel-default">

        <div class="panel-body">
        <?php
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form2');
        echo form_open('settings/update_address/'.$address->id.'/'.$this->session->userdata('session_user_com'), $attributes); ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Update Receiving Address</h4>
                <p>Receiving Addresses are your company's addresses you might want vendors to ship to.</p>
              </div>
              <div class="panel-body panel-body-nopadding">
              
                <div class="form-group">
                  <div class="col-sm-12">
                  <textarea class="form-control" name="address" rows="5" cols="80"><?php print_r($address->address); ?></textarea>
                    <?php echo form_error('address'); ?>
                  </div>

                </div>
              </div><!-- panel-body -->
              <div class="panel-footer pull-right">
                
               <button class="btn btn-primary">Submit</button>
              </div><!-- panel-footer -->
            </div><!-- panel-default -->
          </form>
        
          
          </div><!-- panel-body -->
      
        
    </div>
        </div>
        </div>
</div>
</div>