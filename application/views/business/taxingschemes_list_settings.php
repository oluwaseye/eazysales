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
        <li class=""><a href="<?php echo base_url().'settings/doc_numbers/'.$this->session->userdata('session_user_com');?>"><i class="fa fa-file"></i> <span>Doc Numbers</span></a> </li>
        </ul>
    </div>
        </div>
        <div class="col-md-9">
         <div class="panel panel-default">
        <div class="panel-body">
          <h5 class="subtitle mb5">Taxing Schemes</h5>
          <br />
          <a href="<?php echo base_url().'settings/add_taxing_scheme/'.$this->session->userdata('session_user_com');?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add Pricing & Currency</a>
        <div class="table-responsive">
          <table class="table mb30">
            <thead>
              <tr>
                <th>Scheme Name</th>
                <th>Primary Tax Name</th>
                <th>Primary Tax Rate %</th>
                <th>Secondary Tax Name</th>
                <th>Secondary Tax Rate %</th>
                <th>Compound Secondary <br/>Tax on Primary</th>
                <th>Tax on Shipping</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
           
            <?php foreach ($taxing_schemes as $ts):?>
              <tr>
                <td><?php print_r($ts->scheme_name)?></td>
                <td><?php print_r($ts->primary_tax_name)?></td>
                <td><?php print_r($ts->primary_tax_rate)?></td>
                <td><?php print_r($ts->secondary_tax_name)?></td>
                <td><?php print_r($ts->secondary_tax_rate)?></td>
                <td><?php if($ts->comp_sec_tax_primary==1) echo 'Yes'; else echo 'No';?></td>
                <td><?php if($ts->tax_shipping==1)echo 'Yes'; else echo 'No';?></td>
                <td class="table-action">
                  <a href="<?php echo base_url();?>settings/update_taxing_scheme/<?php print_r($ts->id)?>/<?php print_r($this->session->userdata('session_user_com'));?>"><i class="fa fa-pencil"></i></a>
                  <a href="<?php echo base_url();?>settings/delete_taxing_scheme/<?php print_r($ts->id)?>/<?php print_r($this->session->userdata('session_user_com'));?>"><i class="fa fa-trash-o" onClick="return doconfirm();"></i></a>
                </td>
              </tr>
            <?php endforeach ?>
          
            </tbody>
          </table>
            <?php if(empty($taxing_schemes)){?>
            <tr>
            <div class="alert alert-info"><i class="fa fa-bell"></i> You have not created any Taxing Scheme</div>
            </tr>
            <?php }?>
          </div>
   
         
        </div><!-- panel-body -->
      
        
    </div>
        </div>
        </div>
</div>
</div>