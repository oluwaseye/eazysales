<div class="col-md-12 mb20">
   <div class="pageheader">
      <h2><i class="fa fa-user"></i> Vendors <a href="<?php echo base_url().'vendor/add_vendor/'.$this->session->userdata('session_user_com');?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add Vendor</a>
          </h2>

      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url().'dashboard/business/'.$this->session->userdata('session_user_com');?>">Dashboard</a></li>
          <li class="active">Vendors</li>
        </ol>

      </div>

    </div>
      <ul class="nav nav-tabs">
          <li class="active"><a href="<?php echo base_url().'vendor/business/'.$this->session->userdata('session_user_com');?>"><strong>Vendors</strong></a></li>
           <li><a href="<?php echo base_url().'vendor/vendor_products/'.$this->session->userdata('session_user_com');?>"><strong>Vendor Products</strong></a></li>
          <li><a href="<?php echo base_url().'vendor/vendor_history/'.$this->session->userdata('session_user_com');?>"><strong>Vendor History</strong></a></li>
        </ul>
<div class="tab-content mb30">
<div class="tab-pane active" id="home2">
         <div class="panel panel-default">
        <div class="panel-body">
          
<div class="table-responsive">
          <table class="table" id="table2">
              <thead>
                 <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact Phone</th>
                    <th>Email</th>
                    <th></th>
                 </tr>
              </thead>
              
              <tbody>
              <?php foreach($results as $result):?>
                 <tr class="odd gradeX">
                    <td><?php print_r($result->name); ?></td>
                    <td><?php print_r($result->address); ?></td>
                    <td><?php print_r($result->contact_phone); ?></td>
                    <td><?php print_r($result->contact_email); ?></td>
                    <td class="center"><a class="btn btn-default btn-small" href="<?php echo base_url();?>vendor/update_vendor/<?php print_r($result->id)?>/<?php print_r($this->session->userdata('session_user_com'));?>"><i class="fa fa-pencil" ></i></a>
                  <a class="btn btn-default btn-small" onclick="return doconfirm();" href="<?php echo base_url();?>vendor/delete_vendor/<?php print_r($result->id)?>/<?php print_r($this->session->userdata('session_user_com'));?>"><i class="fa fa-trash-o"></i></a></td>
                 </tr>
                <?php endforeach ?>
              </tbody>
           </table>
          </div>
   
         </div>
        </div><!-- panel-body -->
    </div>
        </div>
</div>
</div>