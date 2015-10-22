<div class="col-md-12 mb20">
   <div class="pageheader">
      <h2><i class="fa fa-user"></i> Order History </h2>

      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url().'dashboard/business/'.$this->session->userdata('session_user_com');?>">Dashboard</a></li>
          <li><a href="<?php echo base_url().'inventory/business/'.$this->session->userdata('session_user_com');?>">Inventory</a></li>
          <li><a href="<?php echo base_url().'inventory/product_vendors/'.$this->session->userdata('session_user_com');?>">Product Vendors</a></li>
           <li><a href="<?php echo base_url().'inventory/movement_history/'.$this->session->userdata('session_user_com');?>">Movement History</a></li>
          <li class="active">Order History</li>
        </ol>

      </div>

    </div>
      <ul class="nav nav-tabs">
          <li><a href="<?php echo base_url().'inventory/business/'.$this->session->userdata('session_user_com');?>"><strong>Inventory Products</strong></a></li>
          <li ><a href="<?php echo base_url().'inventory/product_vendors/'.$this->session->userdata('session_user_com');?>"><strong>Product Vendors </strong></a></li>
          <li ><a href="<?php echo base_url().'inventory/movement_history/'.$this->session->userdata('session_user_com');?>"><strong>Movement History</strong></a></li>
          <li class="active"><a href="<?php echo base_url().'inventory/order_history/'.$this->session->userdata('session_user_com');?>"><strong>Order History</strong></a></li>
        
        </ul>
<div class="tab-content mb30">
<div class="tab-pane active" id="home2">
         <div class="panel panel-default">
        <div class="panel-body">
          
<div class="table-responsive">
          <table class="table" id="table2">
              <thead>
                 <tr>
                    <th>Type </th>
                    <th>Order</th>
                    <th>Customer/Vendor Name</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                    <th>Order Total</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Sub Total</th>
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