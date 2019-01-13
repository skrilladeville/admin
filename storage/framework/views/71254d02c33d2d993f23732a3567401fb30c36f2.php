<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Team Primie">
        <meta name="description" content="Green Card Information System">

        <title><?php echo e(config('app.name')); ?> - Green Card Information System <3</title>

        <link href="<?php echo e(mix('/css/app.css')); ?>" rel="stylesheet">
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
                'siteName'  => config('app.name'),
                'apiDomain' => config('app.url').'/api'
            ]); ?>

        </script>
    </head>
    <body>
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
    </body>
</html>
