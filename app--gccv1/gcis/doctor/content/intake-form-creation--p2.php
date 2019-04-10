<form class="form" action="<?php echo $page['baseName'].'--p'.($page['number']+1).'.html'; ?>"  method="post">
	<div class="form-body">
<?php
widgetize('Cannabis Indication','intake-cannabisIndication.html');
widgetize('Current Cannabis Use','intake-currentCannabisUse.html');
?>
	<?php if( !defined( 'AT_LARAVUE' ) ){ ?>
		<div class="form-actions center">
			<button formaction="<?php echo $page['baseName'].'--p'.($page['number']-1).'.html'; ?>" type="submit" class="btn btn-primary mr-1">
				<i class="ft-x"></i>Prev
			</button>
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-check-square-o"></i>Next
			</button>
		</div>
		<?php } ?>
	</div>
</form>