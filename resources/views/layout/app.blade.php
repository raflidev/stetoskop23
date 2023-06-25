<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <script src="https://unpkg.com/wavesurfer.js@2.2.1/dist/wavesurfer.min.js"></script>
  {{-- <link rel="stylesheet" href="{{ URL::asset('build/assets/app.1dd54f02.css') }}"> --}}
  <title>Stetoskop Digital</title>
</head>
<body class="font-sans">
    @yield('content')
</body>
</html>

