<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.png" type="image/png">
  <title>EasySales beta</title>
  <link href="<?php echo base_url()?>assets/css/style.default.css" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-fileupload.min.css" />
  <link href="<?php echo base_url()?>assets/css/jquery.datatables.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-timepicker.min.css" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
  .form-choose-business{margin-top: 4px;}
  .business-btn-switch{min-width: 500px; 
text-align: left;}
#business-link-switch{
  font-size: 16px;
}
  </style>
</head>
<body class="stickyheader">
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-circle-o-notch fa-spin"></i></div>
</div>
<section>
  
  <div class="leftpanel">
    
    <div class="logopanel">
        <h1><span>[</span> EasySales <span>]beta</span></h1>
    </div><!-- logopanel -->
        
    <div class="leftpanelinner">    
        
        <!-- This is only visible to small devices -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">   
            <div class="media userlogged">
                
                  <?php if($user->profile_pic==''){?>
                <i class="fa fa-user"></i>
                <?php }else{?>
                <img src="<?php echo base_url().'user_avatar/'.$user->profile_pic?>" alt="" class="media-object"/>
                <?php }?>
                <div class="media-body">
                <?php if($user->fullname==''){?>
                    <h4 id="u-panel-name"><?php print_r($email->email)?></h4>
                    <?php }else{?>
                    <h4 id="u-panel-name"><?php print_r($user->fullname)?></h4>
                    <?php }?>
                    
                </div>
            </div>
          
            <h5 class="sidebartitle actitle">Account</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket mb30">
              <li><a href="<?php echo base_url().'profile/edit_profile'?>"><i class="fa fa-user"></i> <span>Profile</span></a></li>
              <li><a href="#"><i class="fa fa-question-circle"></i> <span>Help</span></a></li>
              <li><a href="/auth/logout/"><i class="<?php echo base_url()?>auth/logout"></i> <span>Sign Out</span></a></li>
            </ul>
        </div>
      
      
      <ul class="nav nav-pills nav-stacked nav-bracket">
        <li <?php $this->menu_model->dashboard_active();?> ><a href="<?php echo base_url().'dashboard/business/'.$this->session->userdata('session_user_com')?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li <?php $this->menu_model->vendor_active();?>><a href="<?php echo base_url().'vendor/business/'. $this->session->userdata('session_user_com');?>"><i class="fa fa-user"></i> <span>Vendor</span></a> </li>
        <li <?php $this->menu_model->purchase_order_active();?>><a href="<?php echo base_url().'purchase_order/business/'. $this->session->userdata('session_user_com');?>"><i class="fa fa-book"></i> <span>Purchase Order</span></a> </li>
        <li <?php $this->menu_model->inventory_active();?>><a href="<?php echo base_url().'inventory/business/'. $this->session->userdata('session_user_com');?>"><i class="fa fa-file"></i> <span>Inventory</span></a> </li>
         <li <?php $this->menu_model->sales_order_active();?>><a href="<?php echo base_url().'sales_order/business/'. $this->session->userdata('session_user_com');?>"><i class="fa fa-book"></i> <span>Sales Order</span></a> </li>
        <li <?php $this->menu_model->customers_active();?>><a href="<?php echo base_url().'customers/business/'. $this->session->userdata('session_user_com');?>"><i class="fa fa-user"></i> <span>Customer</span></a> </li>
        <li <?php $this->menu_model->settings_active();?>><a href="<?php echo base_url().'settings/business/'. $this->session->userdata('session_user_com');?>"><i class="fa fa-cog"></i> <span>Settings</span></a> </li>
      </ul>
    
      <div class="infosummary">
        <h5 class="sidebartitle">Information Summary</h5>    
        <ul>
            <li>
                <div class="datainfo">
                    <span class="text-muted">Total Sales</span>
                    <h4>630, 201</h4>
                </div>
                <div id="sidebar-chart" class="chart"></div>   
            </li>
            <li>
                <div class="datainfo">
                    <span class="text-muted">Total Products</span>
                    <h4>1, 332, 801</h4>
                </div>
                <div id="sidebar-chart2" class="chart"></div>   
            </li>
           <!--  <li>
                <div class="datainfo">
                    <span class="text-muted">CPU Usage</span>
                    <h4>140.05 - 32</h4>
                </div>
                <div id="sidebar-chart4" class="chart"></div>   
            </li>
            <li>
                <div class="datainfo">
                    <span class="text-muted">Memory Usage</span>
                    <h4>32.2%</h4>
                </div>
                <div id="sidebar-chart5" class="chart"></div>   
            </li> -->
        </ul>
      </div><!-- infosummary -->
      
    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
  
  <div class="mainpanel">
      <div class="headerbar">
      
      <a class="menutoggle"><i class="fa fa-bars"></i></a>
   

      
      <div class="header-right">
        <ul class="headermenu">

<?php if(isset($my_company)){?>
        <li>
            <div class="btn-group">
              <button class="btn btn-default business-btn-switch dropdown-toggle tp-icon" data-toggle="dropdown">
                <i class="fa fa-bookmark"></i> <?php echo $this->session->userdata('session_user_com_name');?> <i class="fa fa-caret-down pull-right"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-head">
                <h5 class="title">Switch active business</h5>
                <ul class="dropdown-list gen-list">
                 <?php foreach($my_company as $company){?>
                  <li>
                    <a href="<?php echo base_url().'switch_business/switcher';?>/<?php print_r($company->user_id)?>/<?php print_r($company->comp_id)?>" id="business-link-switch"><i class="fa fa-bookmark"></i> <?php print_r($company->company_name)?></a>

                  </li>
                <?php }?>
                </ul>
              </div>
            </div>
          </li>
       
         <?php }?>



       
          <li>
           <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="u-panel-name">
              <?php if($user->profile_pic==''){?>
                <i class="fa fa-user"></i>
                <?php }else{?>
                <img src="<?php echo base_url().'user_avatar/'.$user->profile_pic?>" alt="" />
                <?php }?>
               <?php 
               //checking if the user's name is avaiable else display email
               if($user->fullname==''){?>
                    <?php print_r($email->email)?>
                    <?php }else{?>
                   <?php print_r($user->fullname)?>
                    <?php }?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                <li><a href="<?php echo base_url().'profile/edit_profile'?>"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                <li><a href="<?php echo base_url()?>auth/logout"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
              </ul>
            </div>
          </li>
      
        </ul>
      </div><!-- header-right -->
      
    </div><!-- headerbar -->
    
