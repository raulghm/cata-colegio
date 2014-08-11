<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @if ( getenv('APP_ENV') )
      <link rel="stylesheet" href="{{ Cache::url('/assets/styles/styles.css', true) }}">
    @else
      <link rel="stylesheet" href="{{ URL::to('/') }}/assets/styles/styles.css">
    @endif

    <script src="{{ Cache::url('/assets/scripts/modernizr.js', true) }}"></script>
    <script src="{{ Cache::url('/assets/scripts/detectizr.js', true) }}"></script>
    <script src="{{ Cache::url('/assets/scripts/jquery.js', true) }}"></script>
  </head>
  <body>
    @include('../partials/nav')

    @yield('content')

    @if ( getenv('APP_ENV') )
      <script src="{{ Cache::url('/assets/scripts/scripts.js', true) }}"></script>
    @else
      <script src="{{ URL::to('/') }}/assets/scripts/scripts.js"></script>
    @endif

  </body>
</html>