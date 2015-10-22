<div class="col-md-12 mb20">
       
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-dark">
                 <li class="active"><a href="<?php echo base_url().'profile/edit_profile'?>" ><strong>Profile <i class="fa fa-user"></i></strong></a></li>
          <li><a href="<?php echo base_url().'profile/edit_credentials'?>" ><strong>Credentials <i class="fa fa-unlock-alt"></i></strong></a></li>
          <li><a href="<?php echo base_url().'profile/email_preferences'?>" ><strong>Email Preferences <i class="fa fa-envelope"></i></strong></a></li>
          <li><a href="<?php echo base_url().'profile/businesses'?>"><strong>Businesses <i class="fa fa-bookmark"></i></strong></a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content mb30">
          <div class="tab-pane active" id="home2">
            <h4 class="dark"><i class="fa fa-user"></i> Edit your profile</h4>
            <p>You can provide as much or as little information as you’d like. Wave will never share or sell individual personal information or personally identifiable details.</p>

<?php $attributes = array('class' => '', 'id' => ''); echo form_open('profile/edit_profile', $attributes); ?>

              <div class="col-lg-12">
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
                </div>

<div class="form-group">
        <label for="fullname" class="col-sm-3 control-label">Fullname <span class="required">*</span></label>
        <div class="col-sm-9">
        <input id="fullname" type="text" class="form-control" name="fullname" maxlength="40" value="<?php if(set_value('fullname')){ echo set_value('fullname');}else{echo $user->fullname;} ?>"  />
        <?php echo form_error('fullname'); ?>
 </div>
                </div>

<div class="form-group">
        <label for="sex" class="col-sm-3 control-label">Sex <span class="required">*</span></label>
        <div class="col-sm-9">
                       <input id="sex" name="sex" type="radio" class="" value="female" <?php echo $this->form_validation->set_radio('sex', 'female'); ?> <?php if(set_value('sex')){ echo set_value('sex');}elseif($user->sex=='female'){echo 'checked';} ?>/>
                        <label for="sex" class="">Female</label>

                        <input id="sex" name="sex" type="radio" class="" value="male" <?php echo $this->form_validation->set_radio('sex', 'male'); ?> <?php if(set_value('sex')){ echo set_value('sex');}elseif($user->sex=='male'){echo 'checked';} ?>/>
                        <label for="sex" class="">Male</label>
        <br><?php echo form_error('sex'); ?>
 </div>
                </div>

<div class="form-group">
        <label for="city" class="col-sm-3 control-label">City</label>
        <div class="col-sm-9">
        <input id="city" type="text" class="form-control" name="city" maxlength="30" value="<?php if(set_value('city')){ echo set_value('city');}else{echo $user->city;} ?>"  />
        <?php echo form_error('city'); ?>
 </div>
                </div>

<div class="form-group">
        <label for="state_province" class="col-sm-3 control-label">State/Province</label>
        <div class="col-sm-9">
        <input id="state_province" type="text" class="form-control" name="state_province" maxlength="20" value="<?php if(set_value('state_province')){ echo set_value('state_province');}else{echo $user->state_province;} ?>"  />
        <?php echo form_error('state_province'); ?>
 </div>
                </div>

<div class="form-group">
        <label for="country" class="col-sm-3 control-label">Country <span class="required">*</span></label>
        <div class="col-sm-9">
           <div class="col-sm-9">
          <?php $country= $user->country;

          ?>

                         <?php $options = array(
                          
                                                  $country  => $country,
                                                  'nigeria'    => 'Nigeria',
                                                  'ghana'    => 'Ghana'
                                                ); ?>
                     <?php echo form_dropdown('country', $options, set_value('country'), 'class="form-control"')?>
        <?php echo form_error('country'); ?>              
                  </div>
        
 </div>
                </div>

<div class="form-group">
        <label for="mobile" class="col-sm-3 control-label">Mobile</label>
        <div class="col-sm-9">
        <?php echo form_error('mobile'); ?>
        <input id="mobile" type="text" class="form-control" name="mobile" maxlength="11" value="<?php if(set_value('mobile')){ echo set_value('mobile');}else{echo $user->mobile;} ?>"  />
 </div>
                </div>

<div class="form-group">
        <label for="date_of_birth" class="col-sm-3 control-label">Date of Birth</label>
        <div class="col-sm-9">

         <div class="input-group">
                <input type="text" class="form-control"  id="datepicker" name="date_of_birth" value="<?php if(set_value('date_of_birth')){ echo set_value('date_of_birth');}else{echo $user->dob;} ?>" >
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
              <?php echo form_error('date_of_birth'); ?>
 </div>



  <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button class="btn btn-primary" type="submit">Update</button>
                  </div>
                </div>
              </div>
            
          

<?php echo form_close(); ?>

          </div>
        </div>
    
        
        </div>