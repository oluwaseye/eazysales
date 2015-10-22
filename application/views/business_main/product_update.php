<div class="col-md-12 mb20">
   <div class="pageheader">
      <h2><i class="fa fa-user"></i> Update Product 
      <a href="<?php echo base_url().'inventory/business/'.$this->session->userdata('session_user_com');?>" class="btn btn-info pull-right"><i class="fa fa-list-alt"></i> Products</a>
      <a href="<?php echo base_url().'inventory/product_categories/'.$this->session->userdata('session_user_com');?>" class="btn btn-primary pull-right"><i class="fa fa-list-alt"></i> Product Categories</a>
       
          </h2>

      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index-2.html">Dashboard</a></li>
          <li><a href="<?php echo base_url().'inventory/business/'.$this->session->userdata('session_user_com');?>">Products</a></li>
          <li class="active">Update Product</li>
        </ol>

      </div>

    </div>
     
         <div class="panel panel-default">
        <div class="panel-body">

        <?php 
          $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
          echo form_open('inventory/update_product/'.$this->session->userdata('session_user_com'), $attributes); ?>
        <div class="row">
        <hr/>
          <div class="col-md-6">
          <h4>Basic</h4>
          <hr/>
                <div class="form-group">
              <label class="col-sm-4 control-label">Product Name Description</label>
              <div class="col-sm-6">
                <textarea class="form-control" rows="1" name="prod_desc"></textarea>
                <span>e.g Peak Milk Sachet (40 grams)</span>
                <?php echo form_error('prod_desc'); ?>
              </div>
            </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label">* Category</label>
                <div class="col-sm-6">
                    <select class="form-control mb15" name="category_id">
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                </select>
                <?php echo form_error('category_id'); ?>
                  </div>
                  </div>
                    <div class="form-group">
                  <label class="col-sm-4 control-label">Type</label>
                <div class="col-sm-6">
                    <select class="form-control mb15" name="type_id">
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                </select>
                <?php echo form_error('type_id'); ?>
                  </div>
                  </div>
               
                
                     <h4>Measurements</h4>
                  <hr/>
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Length:</label>
                  <div class="col-sm-2">
                    <input type="text" name="length" class="form-control" />
                    <?php echo form_error('length'); ?>
                  </div>
                  <label class="col-sm-3 control-label">Width: </label>
                  <div class="col-sm-2">
                    <input type="text" name="width" class="form-control" />
                    <?php echo form_error('width'); ?>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Height:</label>
                  <div class="col-sm-2">
                    <input type="text" name="height" class="form-control" />
                    <?php echo form_error('height'); ?>
                  </div>
                  <label class="col-sm-3 control-label">Weight:</label>
                  <div class="col-sm-2">
                    <input type="text" name="weight" class="form-control" />
                    <?php echo form_error('weight'); ?>
                  </div>
                </div>
                 <hr/>
                <h4>Unit of Measure</h4>
                  <hr/>
                     <div class="form-group">
                  <label class="col-sm-4 control-label">Standard UoM</label>
                <div class="col-sm-6">
                    <select class="form-control mb15" id="standard_uom_m_id" name="standard_uom_m_id">
                    <option value="">&nbsp;</option>
                  <option value="cases">cases</option>
                  <option value="ea">ea</option>
                  <option value="packs">packs</option>
                  <option value="peices">pieces</option>
                </select>
                <?php echo form_error('standard_uom_m_id'); ?>
                  </div>
                  </div>
                  <hr/>
                     <div class="form-group">
                  <label class="col-sm-4 control-label">Sales UoM</label>
                <div class="col-sm-6">
                    <select class="form-control mb15" name="sales_uom_m_id" id="sales_uom_m_id">
                    <option value="">&nbsp;</option>
                  <option value="cases">cases</option>
                  <option value="ea">ea</option>
                  <option value="packs">packs</option>
                  <option value="peices">pieces</option>
                </select>
                <?php echo form_error('sales_uom_m_id'); ?>
                  </div>
                  </div>
                    <div class="form-group sales_uom_v1_group">
              <label class="col-sm-4 control-label sales_uom_v1_label">Conversion</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="sales_uom_v1" value="1" id="sales_uom_v1">
                <p id="sales_uom_v1_text"></p>
                <?php echo form_error('sales_uom_v1'); ?>
              </div>
              <div class="col-sm-1">
                <a class="btn btn-default btn-sm disabled">=</a>
              </div>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="sales_uom_v2" value="1" id="sales_uom_v2">
                <p id="sales_uom_v2_text"></p>
                <?php echo form_error('sales_uom_v2'); ?>
              </div>
            </div>
            <hr/>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Purchasing UoM</label>
                <div class="col-sm-6">
                    <select class="form-control mb15" name="purchase_uom_m_id" id="purchase_uom_m_id">
                    <option value="">&nbsp;</option>
               <option value="cases">cases</option>
                  <option value="ea">ea</option>
                  <option value="packs">packs</option>
                  <option value="peices">pieces</option>
                </select>
                <?php echo form_error('purchase_uom_m_id'); ?>
                  </div>
                  </div>

                      <div class="form-group purchase_uom_v1_group">
              <label class="col-sm-4 control-label">Conversion</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="purchase_uom_v1" id="purchase_uom_v1" value="1" >
                <p id="purchase_uom_v1_text"></p>
                <?php echo form_error('purchase_uom_v1'); ?>
              </div>
              <div class="col-sm-1">
                <a class="btn btn-default btn-sm disabled">=</a>
              </div>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="purchase_uom_v2" id="purchase_uom_v2" value="1" >
                <p id="purchase_uom_v2_text"></p>
                <?php echo form_error('purchase_uom_v2'); ?>
              </div>
            </div>

<hr/>
             <h4>Costing Info</h4>
               <hr/>
               <div class="form-group">
                  <label class="col-sm-4 control-label">Costing Method</label>
                <div class="col-sm-6">
                    <select class="form-control mb15" disabled="disabled" name="costing_method">
                  <option value="manual">Manual</option>
                </select>
                <?php echo form_error('costing_method'); ?>
                  </div>
                  </div>

            

               
            </div>
                 <div class="col-md-6">
                <!--  <hr/>
                <h4>Sales Info</h4>
                  <hr/>
                      <div class="form-group">
                  <label class="col-sm-4 control-label">Tax Code</label>
                <div class="col-sm-6">
                    <select class="form-control mb15" name="tax_code_id">
                  <option>Option 1</option>
                  <option>Option 2</option>
                </select>
                <?php echo form_error('tax_code_id'); ?>
                  </div>
                  </div>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Normal Price:</label>
                  <div class="col-sm-3">
                    <div class="input-group mb15">
                  <span class="input-group-addon"> $ </span>
                  <input type="text" class="form-control">
                </div>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Wholesale Price:</label>
                   <div class="col-sm-3">
                    <div class="input-group mb15">
                  <span class="input-group-addon"> $ </span>
                  <input type="text" class="form-control">
                </div>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Retail Price:</label>
                   <div class="col-sm-3">
                    <div class="input-group mb15">
                  <span class="input-group-addon"> $ </span>
                  <input type="text" class="form-control">
                </div>
                  </div>
                </div>
                 <hr/> -->
                    <h4>Storage Info</h4>
                    <hr/>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Barcode:</label>
                  <div class="col-sm-6">
                    <input type="text" name="barcode" class="form-control" />
                    <?php echo form_error('barcode'); ?>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-4 control-label">Re-order Point:</label>
                  <div class="col-sm-4">
                  <div class="input-group mb15">
                    <input type="text" name="re_order_point" class="form-control" />
                    <span class="input-group-addon" id="re_order_point_txt"></span>
                    </div>
                    <?php echo form_error('re_order_point'); ?>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-4 control-label">Re-order Quantity:</label>
                  <div class="col-sm-4">
                  <div class="input-group mb15">
                    <input type="text" name="re_order_qty" class="form-control" />
                    <span class="input-group-addon" id="re_order_qty_txt"></span>
                    </div>
                    <?php echo form_error('re_order_qty'); ?>
                  </div>
                </div>
                     <div class="form-group">
                  <label class="col-sm-4 control-label">Default Location</label>
                <div class="col-sm-6">
                    <select class="form-control mb15" name="location_id">
                                    <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                </select>
                  </div>
                  <?php echo form_error('location_id'); ?>
                  </div>
                    <div class="form-group">
                  <label class="col-sm-4 control-label">Default Sub Location</label>
                <div class="col-sm-6">
                    <select class="form-control mb15" name="sub_location_id">
                                    <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                </select>
                <?php echo form_error('sub_location_id'); ?>
                  </div>
                  </div>
                     <div class="form-group">
                  <label class="col-sm-4 control-label">Vendor</label>
                <div class="col-sm-3">
                    <select class="form-control mb15" name="vendor_id">
                                    <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                </select>
                <?php echo form_error('vendor_id'); ?>
                  </div>
                  </div>
                 <hr/>
                    <h4>Picture</h4>
               <hr/>
                  <div class="form-group">
              <label class="col-sm-4 control-label">Image Upload</label>
              <div class="col-sm-7">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="input-append">
                    <div class="uneditable-input ">
                      <i class="glyphicon glyphicon-file fileupload-exists"></i>
                      <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-default btn-file">
                      <span class="fileupload-new">Select file</span>
                      <span class="fileupload-exists">Change</span>
                      <input type="file" name="picture"/>
                    </span>
                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                  </div>
                </div>
                <?php echo form_error('picture'); ?>
              </div>
            </div>
             <hr/>
                <h4>Custom Info</h4>
                  <hr/>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Manufacturer:</label>
                  <div class="col-sm-6">
                    <input type="text" name="manufacturer" class="form-control" />
                    <?php echo form_error('manufacturer'); ?>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Made in:</label>
                  <div class="col-sm-6">
                    <input type="text" name="country_id" class="form-control" />
                    <?php echo form_error('country_id'); ?>
                  </div>
                </div>

                  <hr/>
           
            
               <h4>Remarks</h4>
               <hr/>
              <div class="form-group">
              <label class="col-sm-4 control-label">Remarks</label>
              <div class="col-sm-6">
                <textarea class="form-control" rows="5" name="remarks"></textarea>
                <?php echo form_error('remarks'); ?>
              </div>
            </div>
                
          
            </div>

        </div>
          
      </div><!-- panel-body -->
   <div class="panel-footer">
   <div class="row">
   <div class="col-md-6">
    <button type="reset" class="btn btn-default btn-block">Reset <i class="fa fa-warning"></i></button>
                
    </div>
    <div class="col-md-6">
               <button class="btn btn-primary btn-block">Submit <i class="fa fa-check-circle"></i></button>
    </div>
              </div>
        </div>
     </form>   
</div>
</div>