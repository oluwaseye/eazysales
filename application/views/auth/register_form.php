<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
		'class'=> 'form-control uname',
	'placeholder'=>'Email'
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
			'class'=> 'form-control uname',
	'placeholder'=>'Email'
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'class'=> 'form-control pword',
	'placeholder'=>'Password'
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'class'=> 'form-control pword',
	'placeholder'=>'Confirm Password'
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themepixels.com/demo/webpage/bracket/signup.html by HTTrack Website Copier/3.x [XR&CO'2010], Tue, 18 Feb 2014 17:25:19 GMT -->
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
  
    <div class="signuppanel">
        
        <div class="row">
            
            <div class="col-md-6">
                
                <div class="signup-info">
                    <div class="logopanel">
                        <h1><span>[</span> EazySales <span>] beta</span></h1>
                    </div><!-- logopanel -->
                
                    <div class="mb20"></div>
                
                    <h5><strong>EazySales POINT OF SALE!</strong></h5>
                    <p>Lorem ipsum</p>
                    <div class="mb20"></div>
                    
                    <div class="feat-list">
                        <i class="fa fa-wrench"></i>
                        <h4 class="text-success">Easy to Use</h4>
                        <p>Feature 1</p>
                    </div>
                    
                    <div class="feat-list">
                        <i class="fa fa-compress"></i>
                        <h4 class="text-success">Fully Responsive Layout</h4>
                        <p>Feature 1</p>
                    </div>
                    
                    <div class="feat-list mb20">
                        <i class="fa fa-search-plus"></i>
                        <h4 class="text-success">Retina Ready</h4>
                        <p>Feature 1</p>
                    </div>
                    
                    <h4 class="mb20">and much more...</h4>
                
                </div><!-- signup-info -->
            
            </div><!-- col-sm-6 -->
            
            <div class="col-md-6">
<?php echo form_open($this->uri->uri_string(),'class="sl-form"'); ?>
<h3 class="nomargin">Sign Up</h3>
<h5 class="mt5 mb20">Already have an account? <a href="<?php echo base_url().'auth/login'?>"><strong>Sign In</strong></a></h5>

	<?php if ($use_username) { ?>
	
	<?php echo form_label('Username', $username['id']); ?>
		<?php echo form_input($username); ?>
		<?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
	
	<?php } ?>
	
		<?php echo form_label('Email Address', $email['id']); ?>
		<?php echo form_input($email); ?>
		<?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
	
	
		<?php echo form_label('Password', $password['id']); ?>
		<?php echo form_password($password); ?>
<?php echo form_error($password['name']); ?>
	
	
		<?php echo form_label('Confirm Password', $confirm_password['id']); ?>
		<?php echo form_password($confirm_password); ?>
		<?php echo form_error($confirm_password['name']); ?>
	

	<?php if ($captcha_registration) {
		if ($use_recaptcha) { ?>
	
	
			<div id="recaptcha_image"></div>
		
		
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
		
	
	
		
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		
		<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
	<?php echo form_error('recaptcha_response_field'); ?>
		<?php echo $recaptcha_html; ?>
	
	<?php } else { ?>
	
		
					<p>Enter the code exactly as it appears:</p>
			<?php echo $captcha_html; ?>
		
	
	
		<?php echo form_label('Confirmation Code', $captcha['id']); ?>
		<?php echo form_input($captcha); ?>
		<?php echo form_error($captcha['name']); ?>
	
	<?php }
	} ?>

<?php echo form_submit('register', 'Register', 'class="btn btn-block btn-success"'); ?>
<?php echo form_close(); ?>
 </div><!-- col-sm-6 -->
            
        </div><!-- row -->
        
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2014. All Rights Reserved. 
            </div>
        
        </div>
        
    </div><!-- signuppanel -->
  
</section>




<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/modernizr.min.js"></script>
<script src="<?php echo base_url()?>assets/js/retina.min.js"></script>

<script src="<?php echo base_url()?>assets/js/custom.js"></script>
<script>
    jQuery(document).ready(function(){
        
        // Chosen Select
        jQuery(".chosen-select").chosen({
            'width':'100%',
            'white-space':'nowrap',
            disable_search_threshold: 10
        });
        
    });
</script>

</body>

<!-- Mirrored from themepixels.com/demo/webpage/bracket/signup.html by HTTrack Website Copier/3.x [XR&CO'2010], Tue, 18 Feb 2014 17:25:19 GMT -->
</html>
