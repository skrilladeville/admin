<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="keywords" content="Green Card Canada, Access and Lincesing">
  <meta name="author" content="GCIS">
  <link rel="apple-touch-icon" href="<?php echo e(mix('favicon.ico')); ?>">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(mix('favicon.ico')); ?>">
	<title>v2</title>
  <link href="<?php echo e(mix('/css/app--v2.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(mix('/css/robust-admin.css')); ?>" rel="stylesheet">
	<script>
		window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
			'siteName'  => config('app.name'),
			'apiDomain' => config('app.url').'/api'
		]); ?>

	</script>
</head>
<body id="blade" class="vertical-layout vertical-menu content-detached-left-sidebar menu-expanded pace-done>">
	<div id="app">
		<app></app>
	</div>
	<?php if(app()->isLocal()): ?>
		<script src="<?php echo e(mix('js/app.js')); ?>"></script>
	<?php else: ?>
		<script src="<?php echo e(mix('js/manifest.js')); ?>"></script>
		<script src="<?php echo e(mix('js/vendor.js')); ?>"></script>
		<script src="<?php echo e(mix('js/app.js')); ?>"></script>
	<?php endif; ?>
	<script src="<?php echo e(mix('js/robust-admin.js')); ?>"></script>
	<link href="<?php echo e(mix('/css/gcis.css')); ?>" rel="stylesheet">
</body>
</html>