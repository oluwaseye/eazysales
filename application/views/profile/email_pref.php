<div class="col-md-12 mb20">
       
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-dark">
          <li><a href="<?php echo base_url().'profile/edit_profile'?>" ><strong>Profile <i class="fa fa-user"></i></strong></a></li>
          <li><a href="<?php echo base_url().'profile/edit_credentials'?>" ><strong>Credentials <i class="fa fa-unlock-alt"></i></strong></a></li>
          <li class="active"><a href="<?php echo base_url().'profile/email_preferences'?>" ><strong>Email Preferences <i class="fa fa-envelope"></i></strong></a></li>
          <li><a href="<?php echo base_url().'profile/businesses'?>"><strong>Businesses <i class="fa fa-bookmark"></i></strong></a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content mb30">
          <div class="tab-pane active" id="home2">
            <h4 class="dark"><i class="fa fa-envelope"></i> Email Preferences</h4>
            <p>
            EazySales will never share or sell individual personal information or personally identifiable details. 
            These emails will be sent to your default EazySales email address:
            <h4><?php echo $email->email?></h4>
            </p>


            </div>
          </div>
          </div>
        </div>
    
        
        </div>