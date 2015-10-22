<div class="col-md-12 mb20">
       
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-dark">
          <li><a href="<?php echo base_url().'profile/edit_profile'?>" ><strong>Profile <i class="fa fa-user"></i></strong></a></li>
          <li><a href="<?php echo base_url().'profile/edit_credentials'?>" ><strong>Credentials <i class="fa fa-unlock-alt"></i></strong></a></li>
          <li><a href="<?php echo base_url().'profile/email_preferences'?>" ><strong>Email Preferences <i class="fa fa-envelope"></i></strong></a></li>
          <li class="active"><a href="<?php echo base_url().'profile/businesses'?>"><strong>Businesses <i class="fa fa-bookmark"></i></strong></a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content mb30">
          <div class="tab-pane active" id="home2">
          <a href="<?php echo base_url().'newbusiness';?>" class="btn btn-primary pull-right"><i class="fa fa-star"></i> Add a Business</a>
            <h4 class="dark"><i class="fa fa-bookmark"></i> My Business</h4>
            <p>You can provide as much or as little information as you’d like. 
            <br/>
            EazySales will never share or sell individual personal information or personally identifiable details.</p>

<div class="panel panel-dark panel-alt">
          <div class="panel-heading">
              <div class="panel-btns">
                <a href="#" class="panel-close">×</a>
                <a href="#" class="minimize">−</a>
              </div><!-- panel-btns -->
              <h6 class="panel-title">OWNED BUSINESSES</h6>
              <p>businesses you created, are listed here...</p>
            </div>
            <div class="panel-body">
            <div class="table-responsive">
          <table class="table mb30">
            <tbody>
            <?php foreach($my_company as $company):?>
              <tr>
                <td><h4><?php print_r($company->company_name) ?></h4></td>
                <td class="table-action">
                  <a href="<?php echo base_url()?>settings/business_update/<?php echo $company->comp_id;?>" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                </td>
              </tr>
            <?php endforeach ?>
            </tbody>
          </table>
          </div>
            </div>
          </div>


<!-- <div class="panel panel-dark panel-alt">
          <div class="panel-heading">
              <div class="panel-btns">
                <a href="#" class="panel-close">×</a>
                <a href="#" class="minimize">−</a>
              </div>
              <h3 class="panel-title">COLLABORATOR BUSINESSES</h3>
              <p>business you collaborate with.....</p>
            </div>
            <div class="panel-body">
                       <div class="table-responsive">
          <table class="table mb30">
            <tbody>
              <tr>
                <td><h4></h4></td>
                <td class="table-action">
                  <a href="#" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                  <a href="#" class="btn btn-default delete-row"><i class="fa fa-trash-o"></i></a>
                </td>
              </tr>
            
            </tbody>
          </table>
          </div>
            </div>
          </div> -->
          </div>
        </div>
    
        
        </div>