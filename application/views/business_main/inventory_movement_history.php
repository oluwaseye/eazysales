<div class="col-md-12 mb20">
   <div class="pageheader">
      <h2><i class="fa fa-user"></i> Movement History </h2>

      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url().'dashboard/business/'.$this->session->userdata('session_user_com');?>">Dashboard</a></li>
          <li><a href="<?php echo base_url().'inventory/business/'.$this->session->userdata('session_user_com');?>">Inventory</a></li>
          <li><a href="<?php echo base_url().'inventory/product_vendors/'.$this->session->userdata('session_user_com');?>">Product Vendors</a></li>
          <li class="active">Movement History</li>
        </ol>

      </div>

    </div>
      <ul class="nav nav-tabs">
          <li><a href="<?php echo base_url().'inventory/business/'.$this->session->userdata('session_user_com');?>"><strong>Inventory Products</strong></a></li>
          <li ><a href="<?php echo base_url().'inventory/product_vendors/'.$this->session->userdata('session_user_com');?>"><strong>Product Vendors </strong></a></li>
          <li class="active"><a href="<?php echo base_url().'inventory/movement_history/'.$this->session->userdata('session_user_com');?>"><strong>Movement History</strong></a></li>
          <li><a href="<?php echo base_url().'inventory/order_history/'.$this->session->userdata('session_user_com');?>"><strong>Order History</strong></a></li>
        
        </ul>
<div class="tab-content mb30">
<div class="tab-pane active" id="home2">
         <div class="panel panel-default">
        <div class="panel-body">
          
<div class="table-responsive">
          <table class="table" id="table2">
              <thead>
                 <tr>
                    <th>Transaction Type </th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Remarks</th>
                    <th>Quantity</th>
                    <th>Quantity Before</th>
                    <th>Quantity After</th>
                    <th>User</th>
                 </tr>
              </thead>
              <tbody>
                 <tr class="odd gradeX">
                    <td>Trident</td>
                    <td>InternetExplorer 4.0</td>
                    <td>Win 95+</td>
                     <td>Trident</td>
                    <td>InternetExplorer 4.0</td>
                    <td>Win 95+</td>
                     <td>Trident</td>
                    <td>InternetExplorer 4.0</td>
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