<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Team Primie">
        <meta name="description" content="Green Card Information System">
  
        <title>{{ config('app.name') }} - Green Card Information System</title>

        
  <link href="{{ mix('/css/app--v2.css') }}" rel="stylesheet">
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
                'siteName'  => config('app.name'),
                'apiDomain' => config('app.url').'/api'
            ]) !!}
        </script>
    </head>
    <body>
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
    </body>
</html>
