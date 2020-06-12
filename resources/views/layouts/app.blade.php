<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="/img/hospital.svg"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap-select.min.css">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/menu.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/fontawesome.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script>
      window.Laravel = {
        csrfToken: "{{ csrf_token() }}"
      };
    </script>

</head>
<body>
  <div class="area text-dark d-flex flex-column justify-content-between" style="min-height: 100vh;">
    <header>
      @include('partials.header')
    </header>
    <main class="my-3">
      @yield('content')
    </main>
    <footer class="row w-100">
      <div class="col-12 p-0 text-dark d-flex align-items-center justify-content-center font-weight-bold small" style="height: 55px; background: lightgray;">
        <span>&copy; Pharmacy S.A. Todos los Derechos Reservados - {{ date('Y') }}</span>
      </div>
    </footer>
  </div>
  @include('partials.nav')

  @include('partials.user-modal')
  @include('partials.password-modal')

  <script src="{{ mix('js/verificar_cedula.js') }}" defer></script>
</body>
</html>