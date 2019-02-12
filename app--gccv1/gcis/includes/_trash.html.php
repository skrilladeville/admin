<?php	
if( $fv['id'] ){ ?>
	<input type="hidden" name="id" value="<?= $fv['id'] ?>" />
<?php }
if( $fv['groupName'] ){ ?>
	<input type="hidden" name="group-name" value="<?= $fv['groupName'] ?>" />
<?php }