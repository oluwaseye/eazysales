<?php
$old_password = array(
	'name'	=> 'old_password',
	'id'	=> 'old_password',
	'value' => set_value('old_password'),
	'size' 	=> 30,
	'class'=> 'form-control pword',
);
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'class'=> 'form-control pword',
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
	'class'=> 'form-control pword',
);
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themepixels.com/demo/webpage/bracket/signin.html by HTTrack Website Copier/3.x [XR&CO'2010], Tue, 18 Feb 2014 17:25:19 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.png" type="image/png">

  <title>EazySales</title>
  <link href="<?php echo base_url()?>assets/css/style.default.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="signin">

<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
  
    <div class="signinpanel">
        
        <div class="row">
            
            <div class="col-md-7">
                
                <div class="signin-info">
                    <div class="logopanel">
                        <h1><span>[</span> EazySales <span>]</span></h1>
                    </div><!-- logopanel -->
                
                    <div class="mb20"></div>
                
                    <h5><strong>Welcome to EazySales Point of Sale!</strong></h5>
                    <h6>...point of sale for humans</h6>
                    <ul>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> Feature 1</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> Feature 2</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> Feature 3</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> Feature 4</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> and much more...</li>
                    </ul>
                    <div class="mb20"></div>
                    <strong>Don't have an account? <?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Sign up'); ?></strong>
                <br/>
                <strong><i class="fa fa-frown-o"></i> <?php echo anchor('/auth/forgot_password/', 'Forgot my password'); ?></strong>
               
                </div><!-- signin0-info -->
            
            </div><!-- col-sm-7 -->
            
            <div class="col-md-5">
<?php echo form_open($this->uri->uri_string(), 'class="sl-form"'); ?>
<div class="mb10">
<?php echo form_label('Old Password', $old_password['id']); ?>
		<?php echo form_password($old_password); ?>
		<?php echo form_error($old_password['name']); ?><?php echo isset($errors[$old_password['name']])?$errors[$old_password['name']]:''; ?>
</div>
<div class="mb10">
<?php echo form_label('New Password', $new_password['id']); ?>
		<?php echo form_password($new_password); ?>
	<?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?>
	</div>
	<div class="mb10">
	<?php echo form_label('Confirm New Password', $confirm_new_password['id']); ?>
		<?php echo form_password($confirm_new_password); ?>
		<?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?>
	</div>
<?php echo form_submit('change', 'Change Password','class="btn btn-success btn-block"'); ?>
<?php echo form_close(); ?>
</div><!-- col-sm-5 -->
            
        </div><!-- row -->
        
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2014. All Rights Reserved. 
            </div>
           
        </div>
        
    </div><!-- signin -->
  
</section>


<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/modernizr.min.js"></script>
<script src="<?php echo base_url()?>assets/js/retina.min.js"></script>

<script src="<?php echo base_url()?>assets/js/custom.js"></script>

</body>

</html>