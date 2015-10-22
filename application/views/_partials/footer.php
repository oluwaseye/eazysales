  
  </div><!-- mainpanel -->
    
</section>

<script>
function doconfirm()
{
    var d=confirm("Are you sure to delete permanently?");
    if(d!=true)
    {
        return false;
    }
}
</script>

<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/modernizr.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url()?>assets/js/toggles.min.js"></script>
<script src="<?php echo base_url()?>assets/js/retina.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.cookies.js"></script>

<script src="<?php echo base_url()?>assets/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap-fileupload.min.js"></script>
<!--<script src="<?php echo base_url()?>assets/js/flot/flot.min.js"></script>
<script src="<?php echo base_url()?>assets/js/flot/flot.resize.min.js"></script>-->
<script src="<?php echo base_url()?>assets/js/morris.min.js"></script>
<script src="<?php echo base_url()?>assets/js/raphael-2.1.0.min.js"></script>

<script src="<?php echo base_url()?>assets/js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url()?>assets/js/chosen.jquery.min.js"></script>

<script src="<?php echo base_url()?>assets/js/custom.js"></script>
<!--<script src="<?php echo base_url()?>assets/js/dashboard.js"></script>-->



<script>
jQuery(document).ready(function(){

  //inventory selected values and effects


    
  // Chosen Select
  jQuery(".chosen-select").chosen({'width':'100%','white-space':'nowrap'});
  
  // Tags Input
  //jQuery('#tags').tagsInput({width:'auto'});
   
  // Textarea Autogrow
  //jQuery('#autoResizeTA').autogrow();
  


   
  // Date Picker
  jQuery('#datepicker').datepicker();
  
  jQuery('#datepicker-inline').datepicker();
  
  jQuery('#datepicker-multiple').datepicker({
    numberOfMonths: 3,
    showButtonPanel: true
  });
  
    jQuery('#table1').dataTable();
    
    jQuery('#table2').dataTable({
      "sPaginationType": "full_numbers"
    });

    // Chosen Select
    jQuery("select").chosen({
      'min-width': '100px',
      'white-space': 'nowrap',
      disable_search_threshold: 10
    });
    
    // Delete row in a table
    jQuery('.delete-row').click(function(){
      var c = confirm("Continue delete?");
      if(c)
        jQuery(this).closest('tr').fadeOut(function(){
          jQuery(this).remove();
        });
        
        return false;
    });


   // Show aciton upon row hover
    jQuery('.table-hidaction tbody tr').hover(function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 1});
    },function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 0});
    });
  
});
</script>
</body>
</html>
