<form action="" method="post">
	<div class="form-body">
<?php
//echo 'fv: ';print_r( $page['formValues'] );
		
$widgetOpts = $page['formValues']['doctor_accounts'];
$widgetOpts['cssID'] = 'docInfo';
widgetize( 'Health Care Practitioner Information','rx-healthCarePractitionerInformation--v2.html.php',$widgetOpts );

// $Rx was declared in ../data/$pagename
widgetize( 'Patient','rx-patientInformationSearch.html',$Rx );
widgetize( 'Physician directions','rx-physicianDirections--v2.html',$Rx );
widgetize( 'Authorization','rx-authorization--v2.html.php',$Rx );
widgetize( 'Authorization','rx-office-stamp--v2.html',$Rx );
?>
	</div>
	<div class="form-actions">
		<div class="text-center">
			<input type="hidden" name="RxID" value="<?= $Rx['id'] ?>" />
			<button type="submit" class="btn btn-primary save" name="save" id="submit" data-toggle="modal" data-target="#modal">Save<i class="ft-thumbs-up position-right"></i></button>
		</div>
	</div>
</form>