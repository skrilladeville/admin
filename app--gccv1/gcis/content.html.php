<div class="content-header row">
	<div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
		<h3 class="content-header-title mb-0 d-inline-block"><?php echo $page['titleContent']; ?></h3>
	</div>
<?php	
if($page['titleSub']){ ?>
	<div class="content-header-right col-md-4 col-12">
		<div class="btn-group float-md-right">
			<h3><?php echo $page['titleSub']; ?></h3>
		</div>
	</div>
<?php } ?>
</div>

<div class="helpbox">
<?php echo errorsAndHelpHTML(); ?>
</div>

<?php 
if($page['contentFile'])
    @include($page['contentFile']); ?>		