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
          <h5 class="subtitle mb5">Product Tax Codes</h5>
          <br />
          <a href="<?php echo base_url().'settings/add_product_tax_code/'.$this->session->userdata('session_user_com');?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add Product Tax Code</a>
        <div class="table-responsive">
          <table class="table mb30">
            <thead>
              <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Primary Tax Applicable</th>
                <th>Secondary Tax Applicable</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
           
            <?php foreach ($product_tax_codes as $ptc):?>
              <tr>
                <td><?php print_r($ptc->name)?></td>
                <td><?php print_r($ptc->code)?></td>
                <td><?php if($ptc->primary_tax_applicable==1)echo 'Yes'; else echo 'No';?></td>
                <td><?php if($ptc->secondary_tax_applicable==1)echo 'Yes'; else echo 'No';?></td>
                <td class="table-action">
                  <a href="<?php echo base_url();?>settings/update_product_tax_code/<?php print_r($ptc->id)?>/<?php print_r($this->session->userdata('session_user_com'));?>"><i class="fa fa-pencil"></i></a>
                  <a href="<?php echo base_url();?>settings/delete_product_tax_code/<?php print_r($ptc->id)?>/<?php print_r($this->session->userdata('session_user_com'));?>"><i class="fa fa-trash-o" onClick="return doconfirm();"></i></a>
                 </td>
              </tr>
            <?php endforeach ?>
          
            </tbody>
          </table>
            <?php if(empty($product_tax_codes)){?>
            <tr>
            <div class="alert alert-info"><i class="fa fa-bell"></i> You have not created any Product Tax Code</div>
            </tr>
            <?php }?>
          </div>
   
         
        </div><!-- panel-body -->
      
        
    </div>
        </div>
        </div>
</div>
</div>