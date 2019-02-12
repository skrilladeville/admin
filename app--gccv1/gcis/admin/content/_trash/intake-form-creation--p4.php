<form class="form" action="<?php echo $page['../../common/content/baseName'].'--p'.($page['number']+1).'.html'; ?>"  method="post">
	<div class="form-body">
<?php
widgetize('Medical History','intake-medicalHistory.html');
widgetize('Drug and Alcohol History','intake-drugAlcoholHistory.html');
?>
		<div class="form-actions center">
			<button formaction="<?php echo $page['baseName'].'--p'.($page['number']-1).'.html'; ?>" type="submit" class="btn btn-primary mr-1">
				<i class="ft-x"></i>Prev
			</button>
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-check-square-o"></i>Next
			</button>
		</div>
	</div>
</form>