<div class="col-md-12 mb20">
<div class="row">
  <div class="col-md-3">
    <div class="leftpanelinner">
  <ul class="nav nav-pills nav-stacked nav-bracket">
        <li><a href="<?php echo base_url().'settings/business/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-bookmark"></i> <span>Business</span></a></li>
        <li><a href="<?php echo base_url().'settings/locations/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-map-marker"></i> <span>Locations</span></a></li>
        <li><a href="<?php echo base_url().'settings/addresses/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-location-arrow"></i> <span>Addresses</span></a></li>
        <li class=""><a href="<?php echo base_url().'settings/salesreps/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-users"></i> <span>Sales Reps</span></a> </li>
        <!--<li class=""><a href="<?php echo base_url().'settings/reference/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-list-alt"></i> <span>Reference</span></a> </li>-->
        <li class="active"><a href="<?php echo base_url().'settings/doc_numbers/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-file"></i> <span>Doc Numbers</span></a> </li>
        </ul>
    </div>
        </div>
        <div class="col-md-9">
         <div class="panel panel-default">
         <div class="panel-heading">
         <h4 class="panel-title"><i class="fa fa-file"></i> Document Numbers</h4>
         <p>Set the pattern for document numbers. You can attach prefix and suffix to the numbers, and can see the preview 
         of how it will look in the preview column.</p>
         </div>
<form>
            <div class="panel-body">
               <div class="row row-pad-5">
               <div class="col-lg-3">
                  
                </div>
                <div class="col-lg-2">
                  <h5>Prefix</h5>
                </div>
                <div class="col-lg-2">
                  <h5>Next Number</h5>
                </div>
                <div class="col-lg-2">
                  <h5>Suffix</h5>
                </div>
                <div class="col-lg-3">
                  <h5>Preview</h5>
                </div>
              </div><!-- row -->

              <!-- Sales Order-->
              <div class="row row-pad-5">
               <div class="col-lg-3">
                  <h5>Sales Order</h5>
                </div>
                <div class="col-lg-2">
                  <input type="text" name="name" max-length="3" class="form-control" value="<?php print_r($doc_settings->sales_order)?>">
                </div>
                <div class="col-lg-2">
                  <input type="email" name="email" class="form-control" value="000013">
                </div>
                <div class="col-lg-2">
                  <input type="url" name="website" class="form-control" value="">
                </div>
                <div class="col-lg-3">
                  <h5>SO-000013</h5>
                </div>
              </div><!-- row -->

              <!-- Purchase Order-->
              <div class="row row-pad-5">
               <div class="col-lg-3">
                  <h5>Purchase Order</h5>
                </div>
                <div class="col-lg-2">
                  <input type="text" name="name" class="form-control" value="PO-">
                </div>
                <div class="col-lg-2">
                  <input type="email" name="email" class="form-control" value="000013">
                </div>
                <div class="col-lg-2">
                  <input type="url" name="website" class="form-control" value="">
                </div>
                <div class="col-lg-3">
                  <h5>PS-000013</h5>
                </div>
              </div><!-- row -->

              <!-- Sales Order-->
              <div class="row row-pad-5">
               <div class="col-lg-3">
                  <h5>Sales Order</h5>
                </div>
                <div class="col-lg-2">
                  <input type="text" name="name" class="form-control" value="SO-">
                </div>
                <div class="col-lg-2">
                  <input type="email" name="email" class="form-control" value="000013">
                </div>
                <div class="col-lg-2">
                  <input type="url" name="website" class="form-control" value="">
                </div>
                <div class="col-lg-3">
                  <h5>SO-000013</h5>
                </div>
              </div><!-- row -->

              <!-- Count Sheet-->
              <div class="row row-pad-5">
               <div class="col-lg-3">
                  <h5>Count Sheet</h5>
                </div>
                <div class="col-lg-2">
                  <input type="text" name="name" class="form-control" value="CS-">
                </div>
                <div class="col-lg-2">
                  <input type="email" name="email" class="form-control" value="000013">
                </div>
                <div class="col-lg-2">
                  <input type="url" name="website" class="form-control" value="">
                </div>
                <div class="col-lg-3">
                  <h5>CS-000013</h5>
                </div>
              </div><!-- row -->

              <!-- Work Order-->
              <div class="row row-pad-5">
               <div class="col-lg-3">
                  <h5>Work Order</h5>
                </div>
                <div class="col-lg-2">
                  <input type="text" name="name" class="form-control" value="WO-">
                </div>
                <div class="col-lg-2">
                  <input type="email" name="email" class="form-control" value="000013">
                </div>
                <div class="col-lg-2">
                  <input type="url" name="website" class="form-control" value="">
                </div>
                <div class="col-lg-3">
                  <h5>WO-000013</h5>
                </div>
              </div><!-- row -->
             
            </div><!-- panel-body -->
            <div class="panel-footer ">
              <button class="btn btn-primary pull-right">Save</button>
            </div>
            </form>
      
        
    </div>
        </div>
        </div>
</div>
</div>