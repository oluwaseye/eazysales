    <?php 
    //IF THE USER'S PROFILE IS INCOMPLETE, DISPLAY THE ALERT BOX
    if($complete_profile=='not_complete'){
    ?>
  <div class="alert alert-danger fade in nomargin">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <p><i class="fa fa-warning"></i> Your profile is incomplete, please take some time to fill in your details</p>
                <p>
                  <a class="btn btn-danger" href="<?php echo base_url().'profile/edit_profile'?>">Complete my profile</a>
                </p>
    </div>
	<?php
    }else{
        //SHOW THE DASHBOARD INFO
    ?>
 <div class="contentpanel">
      
      <div class="row">
        
        <div class="col-sm-6 col-md-3">
          <div class="panel panel-success panel-stat">
            <div class="panel-heading">
              
              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                    <i class="fa fa-users"></i>
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">Total Customers</small>
                    <h1>20k+</h1>
                  </div>
                </div><!-- row -->
                
                <div class="mb15"></div>
                
                <div class="row">
                  <div class="col-xs-6">
                    <small class="stat-label">Today's</small>
                    <h4>28</h4>
                  </div>
                  
                  <div class="col-xs-6">
                    <small class="stat-label">Yesterday's</small>
                    <h4>45</h4>
                  </div>
                </div><!-- row -->
              </div><!-- stat -->
              
            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->
        
        <div class="col-sm-6 col-md-3">
          <div class="panel panel-danger panel-stat">
            <div class="panel-heading">
              
              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                    <i class="fa fa-file"></i>
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">Total Products</small>
                    <h1>34</h1>
                  </div>
                </div><!-- row -->
                
                <div class="mb15"></div>
                
                <small class="stat-label">New Products</small>
                <h4>0</h4>
                  
              </div><!-- stat -->
              
            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->
        
        <div class="col-sm-6 col-md-3">
          <div class="panel panel-primary panel-stat">
            <div class="panel-heading">
              
              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                    <i class="fa fa-users"></i>
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">Sales Reps</small>
                    <h1>24</h1>
                  </div>
                </div><!-- row -->
                
                <div class="mb15"></div>
                
                <small class="stat-label">This month</small>
                <h4>3</h4>
                  
              </div><!-- stat -->
              
            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->
        
        <div class="col-sm-6 col-md-3">
          <div class="panel panel-dark panel-stat">
            <div class="panel-heading">
              
              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                    <i class="fa fa-money"></i>
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">Today's Earnings</small>
                    <h1>$655</h1>
                  </div>
                </div><!-- row -->
                
                <div class="mb15"></div>
                
                <div class="row">
                  <div class="col-xs-6">
                    <small class="stat-label">Last Week</small>
                    <h4>$32,322</h4>
                  </div>
                  
                  <div class="col-xs-6">
                    <small class="stat-label">Last Month</small>
                    <h4>$503,000</h4>
                  </div>
                </div><!-- row -->
                  
              </div><!-- stat -->
              
            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->
      </div><!-- row -->
   
      
    </div><!-- contentpanel -->
    
    <?php }?>

