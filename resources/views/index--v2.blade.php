<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="keywords" content="Green Card Canada, Access and Lincesing">
	<meta name="author" content="GCIS">
	<link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
  <link rel="apple-touch-icon" href="{{ mix('favicon.ico') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ mix('favicon.ico') }}">
	<title>v2</title>
  <link href="{{ mix('/css/app--v2.css') }}" rel="stylesheet">
  <link id="robust" href="{{ mix('/css/robust-admin.css') }}" rel="stylesheet">
	<script>
		window.Laravel = {!! json_encode([
			'csrfToken' => csrf_token(),
			'siteName'  => config('app.name'),
			'apiDomain' => config('app.url').'/api'
		]) !!}
	</script>
</head>
<body id="blade" class="vertical-layout vertical-menu content-detached-left-sidebar menu-expanded pace-done>">
	<div id="app">
		<app></app>
	</div>
	@if (app()->isLocal())
		<script src="{{ mix('js/app.js') }}"></script>
	@else
		<script src="{{ mix('js/manifest.js') }}"></script>
		<script src="{{ mix('js/vendor.js') }}"></script>
		<script src="{{ mix('js/app.js') }}"></script>
	@endif
	<script id="robustjs" src="{{ mix('js/robust-admin.js') }}"></script>
	<link id="gcis" href="{{ mix('/css/gcis.css') }}" rel="stylesheet">
</body>
</html>