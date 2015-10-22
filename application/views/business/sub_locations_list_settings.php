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
          <h4>Sub Locations</h4>
          
        <div class="table-responsive">
          <table class="table mb30">
            <thead>
              <tr>
                <th class="settings"><?php echo $loc_settings->location ;?> (Sub Locations)</th>
                <th><a href="<?php echo base_url().'settings/add_sub_location/'.$loc_settings->id.'/'.$this->session->userdata('session_user_com');?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add Sub location</a>
</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($sub_loc_settings as $loc):?>
              <tr>
                <td><?php print_r($loc->name)?></td>
                <td class="table-action">
                
                  <a href="<?php echo base_url();?>settings/update_sub_location/<?php print_r($loc->location_id)?>/<?php print_r($loc->id)?>/<?php print_r($this->session->userdata('session_user_com'));?>" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                  <a href="<?php echo base_url();?>settings/delete_sub_location/<?php print_r($loc->location_id)?>/<?php print_r($loc->id)?>/<?php print_r($this->session->userdata('session_user_com'));?>" class="btn btn-default btn-xs"  onClick="return doconfirm();"><i class="fa fa-trash-o"></i></a>
                </td>
              </tr>
            <?php endforeach ?>
            </tbody>
          </table>
          </div>
   
         
        </div><!-- panel-body -->
      
        
    </div>
        </div>
        </div>
</div>
</div>