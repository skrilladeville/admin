<form action="" method="post">
<?php
//echo 'fv: ';print_r( $page['formValues'] );
//echo 'p: ';print_r( $_POST );

$Rx = $page['formValues'];
$modal = array( 
	'widgetType' => 'modbox',
	'buttonsHide' => 1
);
$Rx = array_merge( $Rx,$modal );
widgetize('Medical Diagnosis','rx-medicalDiagnosisRead.html.php',$Rx);
	
//echo 'Rx: ';print_r( $Rx );

/*$_SESSION['page'] = array( 
	'id' => $diagnosisID,
	'feedback_id' => $Rx['patient_feedback']['result']['id'] ? $Rx['patient_feedback']['result']['id'] : $Rx['patient_feedback']['id'],
	'tablename' => $_POST['tablename']
);*/
$page['cache']['id'] = $diagnosisID;
$page['cache']['tablename'] = $_POST['tablename'];
?>
<div class="modal-footer">
	<!--<input type="hidden" name="id" value="<?= $diagnosisID ?>" />
	<input type="hidden" name="feedback_id" value="<?= $Rx['patient_feedback']['result']['id'] ?>" />
	<input type="hidden" name="tablename" value="<?= $_POST['tablename'] ?>" />-->
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	<button type="button" class="save btn btn-primary">Save Request</button>
</div>
</form>

<script language="javascript">
<?php ajaxSave( 'rx-refillRequestModal' ); ?>
<?php
if( isset( $_POST['save'] ) && !$page['errors'] ){
	//echo "#".$_POST['tablename']. "-btn-" .$_POST['feedback_id']." ". $_POST['refill_qty'];
?>
$( "#<?= $_POST['tablename'] ?>-btn-<?= $diagnosisID ?>" ).text( "+<?= $_POST['refill_qty'] ?>" );
<?php
}
?>
</script>
