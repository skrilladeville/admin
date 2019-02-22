<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
	<meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="keywords" content="Green Card Canada, Access and Lincesing">
  <meta name="author" content="GCIS">
  <link rel="apple-touch-icon" href="<?php echo ROOT_PATH; ?>favicon.ico">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo ROOT_PATH; ?>favicon.ico">
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>app-assets/css/vendors.css">
<?php if( $page['jQueryUI'] ){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>app-assets/vendors/css/ui/jquery-ui.min.css">
<?php } ?>
<?php if( $page['formNoUIslider'] ){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>app-assets/vendors/css/extensions/nouislider.min.css">
<?php } ?>
<?php if( $page['formCheckBoxesRadios'] ){ ?>
<link href="<?php echo ROOT_PATH; ?>app-assets/vendors/css/forms/icheck/icheck.css" rel="stylesheet" type="text/css">
<link href="<?php echo ROOT_PATH; ?>app-assets/vendors/css/forms/icheck/custom.css" rel="stylesheet" type="text/css">
<?php } ?>
<?php if( $page['formSwitch'] ){ ?>
<link href="<?php echo ROOT_PATH; ?>app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css" rel="stylesheet" type="text/css">
<?php } ?>
<?php if( $page['formCheckBoxesRadios'] ){ ?>
<script src="<?php echo ROOT_PATH; ?>app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js" type="text/javascript"></script>
<?php } ?>
<?php if( $page['formSwitch'] ){ ?><link href="<?php echo ROOT_PATH; ?>app-assets/vendors/css/forms/toggle/switchery.min.css" rel="stylesheet" type="text/css">
<?php } ?>
<!-- END VENDOR CSS-->
<!-- BEGIN ROBUST CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>app-assets/css/app.css">
<!-- END ROBUST CSS-->
<!-- BEGIN Page Level CSS-->
<link href="<?php echo ROOT_PATH; ?>app-assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>assets/css/style.css">
<link href="<?php echo ROOT_PATH; ?>app-assets/css/components.css" rel="stylesheet" type="text/css">
<link href="<?php echo ROOT_PATH; ?>app-assets/css/core/menu/menu-types/vertical-menu.css" rel="stylesheet" type="text/css">
<?php if( $page['formNoUIslider'] ){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>app-assets/css/plugins/extensions/noui-slider.css">
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>app-assets/css/core/colors/palette-noui.css">
<?php } ?>
<?php if( $page['formCheckBoxesRadios'] ){ ?>
<link href="<?php echo ROOT_PATH; ?>app-assets/css/plugins/forms/checkboxes-radios.css" rel="stylesheet" type="text/css">
<?php } ?>
<?php if( $page['formSwitch'] ){ ?>
<link href="<?php echo ROOT_PATH; ?>app-assets/css/plugins/forms/switch.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>app-assets/css/core/colors/palette-switch.css">
<?php } ?>
<?php if( $page['jQueryUI'] ){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>app-assets/css/plugins/ui/jqueryui.css">
<?php } ?>	
<!-- END Page Level CSS-->
	
	<?php if( $page['dataTablesEdit'] ){ ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.4/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>assets/datatables-editor/css/editor.dataTables.min.css">
<!--<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>assets/datatables-editor/css/shCore.css">
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>assets/datatables-editor/css/demo.css">-->
	<?php } ?>

	
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>assets/css/gcis.css">
 	<?php if ($page['formViewBooking']) {
        ?>
 <link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>assets/css/fullcalendar.css">
    <?php
    } ?>
	<?php if ($page['formAddBooking']) {
        ?>
<link href="<?php echo ROOT_PATH; ?>app-assets/css/plugins/forms/wizard/wizard.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ROOT_PATH; ?>app-assets/css/plugins/forms/wizard/wizard_theme_circles.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ROOT_PATH; ?>app-assets/css/plugins/forms/wizard/wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ROOT_PATH; ?>app-assets/css/plugins/forms/wizard/wizard_theme_dots.css" rel="stylesheet" type="text/css" />
     <?php
    } ?>
	
	<title><?php echo $page['title']; ?></title>
</head>