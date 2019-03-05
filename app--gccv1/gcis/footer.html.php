<?php
if( $page['scriptSubmit'] || $page['modalOn'] ){
	modalize( $page['titleContent'] );
}

$_SESSION['page'] = $page['cache'];
//echo '$_SESSION: ';echo '<pre>';print_r( $_SESSION );echo '</pre>';
?>
<!-- BEGIN VENDOR JS-->
<script src="<?php echo ROOT_PATH; ?>app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<?php if( $page['jQueryUI'] ){ ?>
<script src="<?php echo ROOT_PATH; ?>app-assets/js/core/libraries/jquery_ui/jquery-ui.min.js"></script>
<?php } ?>
<?php if( $page['formNoUIslider'] ){ ?>
<script src="<?php echo ROOT_PATH; ?>app-assets/vendors/js/extensions/wNumb.js" type="text/javascript"></script>
<script src="<?php echo ROOT_PATH; ?>app-assets/vendors/js/extensions/nouislider.min.js" type="text/javascript"></script>
<?php } ?>
<?php if( is_array($data) && !$page['dataTablesEdit'] ){ ?>
<script src="<?php echo ROOT_PATH; ?>app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<?php } ?>
<?php if( $page['formSwitch'] ){ ?>
<script src="<?php echo ROOT_PATH; ?>app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js" type="text/javascript"></script>
<?php } ?>
<?php if( $page['formCheckBoxesRadios'] ){ ?>
<script src="<?php echo ROOT_PATH; ?>app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js" type="text/javascript"></script>
<script src="<?php echo ROOT_PATH; ?>app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
<?php } ?>
<?php if( $page['formSwitch'] ){ ?>
<script src="<?php echo ROOT_PATH; ?>app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<?php } ?>
<?php if( $page['formRepeater'] ){ ?>
<script src="<?php echo ROOT_PATH; ?>app-assets/vendors/js/forms/repeater/jquery.repeater.min.js" type="text/javascript"></script>
<?php } ?>
<!--<script type="text/javascript" src="<?php echo ROOT_PATH; ?>app-assets/vendors/js/ui/prism.min.js"></script>-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="<?php echo ROOT_PATH; ?>app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="<?php echo ROOT_PATH; ?>app-assets/js/core/app.js" type="text/javascript"></script>
<!--<script src="<?php echo ROOT_PATH; ?>app-assets/js/scripts/customizer.js" type="text/javascript"></script>-->
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<?php if( $page['jQuery'] ){ // jQuery v3.2.1
	// Checkbox skim stops working if jQuery is after icheck.min.js
	// If placed nefore icheck.min.js, button enable stops working
?>
<script src="<?php echo ROOT_PATH; ?>app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
<?php } ?>
<?php if( $page['scriptEnd'] ){ ?>
<!--<script src="<?php echo ROOT_PATH; ?>app-assets/js/scripts/modal/components-modal.min.js"></script>-->
<?php } ?>
<?php /*if( $xpage['autoComplete'] ){ ?>
<!--<script src="<?php echo ROOT_PATH; ?>app-assets/js/scripts/ui/jquery-ui/autocomplete.js"></script>-->
<?php }*/ ?>
<?php if( $page['formLoginRegister'] ){ ?>
<script src="<?php echo ROOT_PATH; ?>app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
<?php } ?>
<?php if( $page['formNoUIslider'] ){ ?>
<script src="<?php echo ROOT_PATH; ?>app-assets/js/scripts/extensions/noui-slider.js" type="text/javascript"></script>
<?php } ?>
<?php if( $page['formCheckBoxesRadios'] ){ ?>
<script src="<?php echo ROOT_PATH; ?>app-assets/js/scripts/forms/checkbox-radio.js" type="text/javascript"></script>
<?php } ?>
<?php if( $page['formSwitch'] ){ ?>
<script src="<?php echo ROOT_PATH; ?>app-assets/js/scripts/forms/switch.js" type="text/javascript"></script>
<?php } ?>
<?php if( $page['formRepeater'] ){ ?>
<script src="<?php echo ROOT_PATH; ?>gcis/common/scripts/forms/form-repeater.js" type="text/javascript"></script>
<?php } ?>
<!-- END PAGE LEVEL JS-->

 
<?php if ($page['formViewBooking']) { ?>
<script src="<?php echo ROOT_PATH; ?>app-assets/js/scripts/calendar/moment.min.js" type="text/javascript"></script>
<?php } ?>
<?php if ($page['formViewBooking'] || $page['formAddBooking']) { ?>
<!-- <script src="<?php //echo ROOT_PATH;?>app-assets/js/scripts/calendar/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo ROOT_PATH; ?>app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script> -->
<?php } ?>
<?php if ($page['formViewBooking']) { ?>
<script src="<?php echo ROOT_PATH; ?>app-assets/js/scripts/calendar/fullcalendar.min.js" type="text/javascript"></script>
<?php } ?>


<?php
if ($page['formAddBooking'])
	include ( 'common/scripts/formAddBooking.js.php' ); 

if( $page['dataTablesEdit'] )
	include ( 'common/scripts/dataTablesEdit.js.php' ); 

if( $page['scriptEnd'] )
	//@include ( $page['scriptEndFile'] ); 
	scriptEnder();
?>

<script language="javascript">
<?php 
if( is_array($data) && !$page['dataTablesEdit'] ){
foreach( $data as $class => $src ){
// ajax source is defined in .htaccess to use jsonize.json.php?data=$src
?>
$('.<?php echo $class; ?>').DataTable( {
	"ajax": "<?php echo $src; ?>.json"
} );	
<?php }
}
	
if( $page['scriptSubmit'] ){
?>
$(document).ready(function(){ 
<?php ajaxSave(); ?>
});
<?php } ?>
</script>