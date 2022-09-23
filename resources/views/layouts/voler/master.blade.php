<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Dashboard Admin</title>

  <link rel="stylesheet" href="{{ asset('voler/assets/css/bootstrap.css') }}">

  <link rel="stylesheet" href="{{ asset('voler/assets/vendors/chartjs/Chart.min.css') }}">

  <link rel="stylesheet" href="{{ asset('voler/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
  <link rel="stylesheet" href="{{ asset('voler/assets/css/app.css') }}">
  <link rel="shortcut icon" href="{{ asset('voler/assets/images/favicon.svg') }}" type="image/x-icon">
</head>

<body>
  <div id="app">
    @include('layouts.voler.components.sidebar')
    <div id="main">
      @include('layouts.voler.components.header')

      <div class="main-content container-fluid">
        @include('layouts.voler.components.title_content')
        <section class="section">
          @yield('content')
        </section>
      </div>
      
      @include('layouts.voler.components.footer')
    </div>
  </div>

  <script src="{{ asset('voler/assets/js/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('voler/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('voler/assets/js/app.js') }}"></script>
  <script src="{{ asset('voler/assets/vendors/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('voler/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('voler/assets/js/pages/dashboard.js') }}"></script>
  <script src="{{ asset('voler/assets/js/main.js') }}"></script>
</body>

</html>
