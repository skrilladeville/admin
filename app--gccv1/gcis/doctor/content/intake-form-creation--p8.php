<form class="form" action="<?php echo $page['baseName'].'--submit.html'; ?>"  method="post">
	<div class="form-body">
<?php
widgetize('Opioid Risks','intake-opioidRisks.html');
widgetize('Survey','intake-survey.html');
?>
		<div class="form-actions center">
			<button formaction="<?php echo $page['baseName'].'--p'.($page['number']-1).'.html'; ?>" type="submit" class="btn btn-primary mr-1">
				<i class="ft-x"></i>Prev
			</button>
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-check-square-o"></i>Submit
			</button>
		</div>
	</div>
</form>