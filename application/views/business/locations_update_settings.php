<div class="col-md-12 mb20">
<div class="row">
  <div class="col-md-3">
    <div class="leftpanelinner">    
      
  <ul class="nav nav-pills nav-stacked nav-bracket">
        <li><a href="<?php echo base_url().'settings/business/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-bookmark"></i> <span>Business</span></a></li>
        <li class="active"><a href="<?php echo base_url().'settings/locations/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-map-marker"></i> <span>Locations</span></a></li>
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
         <?php 
          $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form2');
          echo form_open('settings/update_location/'.$location->id.'/'.$this->session->userdata('session_user_com'), $attributes); ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Update Locations</h4>
                <p>You can add your inventory storage Locations. For example. (Main Warehouse e.t.c)</p>
              </div>
              <div class="panel-body panel-body-nopadding">
              
                <div class="form-group">
                  <label class="col-sm-4 control-label">Location</label>
                  <div class="col-sm-8">
                    <input type="text" name="location_name" class="form-control" value="<?php echo $location->location ?>">
                    <?php echo form_error('location_name'); ?>
                  </div>
                </div>
              </div><!-- panel-body -->
              <div class="panel-footer pull-right">
                 <?php echo form_submit( 'submit', 'Submit', 'class="btn btn-primary"'); ?>
              </div><!-- panel-footer -->
            </div><!-- panel-default -->
          </form>
        
          
          </div><!-- panel-body -->
      
        
    </div>
        </div>
        </div>
</div>
</div>