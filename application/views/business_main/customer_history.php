<div class="col-md-12 mb20">
   <div class="pageheader">
      <h2><i class="fa fa-user"></i> Customer History</h2>

      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url().'dashboard/business/'.$this->session->userdata('session_user_com');?>">Dashboard</a></li>
          <li><a href="<?php echo base_url().'customers/business/'.$this->session->userdata('session_user_com');?>">Customers</a></li>
          <li class="active">Customer History</li>
        </ol>

      </div>

    </div>
      <ul class="nav nav-tabs">
          <li><a href="<?php echo base_url().'customers/business/'.$this->session->userdata('session_user_com');?>"><strong>Customer Info</strong></a></li>
          <li class="active"><a href="#"><strong>Customer History</strong></a></li>
        </ul>
<div class="tab-content mb30">
<div class="tab-pane active" id="home2">
         <div class="panel panel-default">
        <div class="panel-body">
          
<div class="table-responsive">
          <table class="table" id="table2">
              <thead>
                 <tr>
                    <th>Order #</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Amount Paid</th>
                    <th>Balance Due</th>
                 </tr>
              </thead>
              <tbody>
                 <tr class="odd gradeX">
                    <td>Trident</td>
                    <td>InternetExplorer 4.0</td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td> 4</td>
                    <td> 4</td>
                    </tr>
                 
              </tbody>
           </table>
          </div>
   
         </div>
        </div><!-- panel-body -->
    </div>
        </div>
</div>
</div>