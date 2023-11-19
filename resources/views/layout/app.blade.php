<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <script src="https://unpkg.com/wavesurfer.js@2.2.1/dist/wavesurfer.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  {{-- <link rel="stylesheet" href="{{ URL::asset('build/assets/app.477dc030.css') }}"> --}}
  @yield('head')
  <title>VAMIC - Valvular Monitoring System</title>
</head>
<body class="font-poppins">  
    @yield('content')
</body>
<script
  src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
  integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8="
  crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
@yield('script')
@vite('resources/js/app.js')

{{-- <script src="{{ URL::asset('build/assets/app.56766496.js') }}"></script> --}}
</html>

