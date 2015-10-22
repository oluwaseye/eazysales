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
        
       <?php 
       $attributes = array('class' => 'form-horizontal', 'id' => 'basicForm2', 'novalidate'=>'novalidate');
        echo form_open('settings/doc_numbers/'.$this->session->userdata('session_user_com'), $attributes); ?>

            <div class="panel-body">
               <div class="row row-pad-5">
               <div class="col-lg-3">
                  
                </div>
                <div class="col-lg-8">
                  <h5>Doc Numbers</h5>
                </div>
              </div><!-- row -->

              <!-- Sales Order-->
              <div class="row row-pad-5">
               <div class="col-lg-3">
                  <h5>Sales Order</h5>
                </div>
                <div class="col-lg-2">
                  <input type="text" name="sales_order" class="form-control" value="<?php if(set_value('sales_order')){ echo set_value('sales_order');}else{echo $doc_settings->sales_order;} ?>">
                <?php echo form_error('sales_order'); ?>
                </div>
             
              </div><!-- row -->

              <!-- Purchase Order-->
              <div class="row row-pad-5">
               <div class="col-lg-3">
                  <h5>Purchase Order</h5>
                </div>
                <div class="col-lg-2">
                  <input type="text" name="purchase_order" class="form-control" value="<?php if(set_value('purchase_order')){ echo set_value('purchase_order');}else{echo $doc_settings->purchase_order;} ?>">
                <?php echo form_error('purchase_order'); ?>
                </div>
               
              </div><!-- row -->

              <!-- Sales Order-->
              <div class="row row-pad-5">
               <div class="col-lg-3">
                  <h5>Sales Quote</h5>
                </div>
                <div class="col-lg-2">
                  <input type="text" name="sales_quote" class="form-control" value="<?php if(set_value('sales_quote')){ echo set_value('sales_quote');}else{echo $doc_settings->sales_quote;} ?>">
                <?php echo form_error('sales_quote'); ?>
                </div>
               
              </div><!-- row -->

              <!-- Count Sheet-->
              <div class="row row-pad-5">
               <div class="col-lg-3">
                  <h5>Count Sheet</h5>
                </div>
                <div class="col-lg-2">
                  <input type="text" name="count_sheet" class="form-control" value="<?php if(set_value('count_sheet')){ echo set_value('count_sheet');}else{echo $doc_settings->count_sheet;} ?>">
                <?php echo form_error('count_sheet'); ?>
                </div>
             
              </div><!-- row -->

              <!-- Work Order-->
              <div class="row row-pad-5">
               <div class="col-lg-3">
                  <h5>Work Order</h5>
                </div>
                <div class="col-lg-2">
                  <input type="text" name="work_order" class="form-control" value="<?php if(set_value('work_order')){ echo set_value('work_order');}else{echo $doc_settings->work_order;} ?>">
                <?php echo form_error('work_order'); ?>
                </div>
              
              </div><!-- row -->
             
            </div><!-- panel-body -->
            <div class="panel-footer ">
              <button class="btn btn-primary pull-right">Save</button>
            </div>
           <?php echo form_close(); ?>
      
        
    </div>
        </div>
        </div>
</div>
</div>