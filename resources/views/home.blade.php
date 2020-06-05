<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="/img/hospital.svg"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ mix('css/home.css') }}">
    <script src="/js/fontawesome.js"></script>

    <script>
      window.Laravel = {
        csrfToken: "{{ csrf_token() }}"
      };
    </script>

</head>
<body>
  <div class="ct" id="t1">
    <div class="ct" id="t2">
      <div class="ct" id="t3">
        <div class="ct" id="t4">
           <div class="ct" id="t5">
            <ul id="menu">
              <a href="#t1"><li class="icon fa fa-home" id="uno"></li></a>
              <a href="#t2"><li class="icon fa fa-users" id="dos"></li></a>
              <a href="#t3"><li class="icon fa fa-keyboard-o" id="tres"></li></a>
              <a href="#t4"><li class="icon fa fa-file" id="cuatro"></li></a>
              <a href="#t5" onclick="event.preventDefault(); document.getElementById('logout_form').submit();">
                <li class="icon fa fa-close" id="cinco"></li>
              </a>
              <form method="POST" action="{{ route('logout') }}" style="display: none;" id="logout_form">
                  @csrf
              </form>
            </ul>
            <div class="page" id="p1">
               <section class="section-content">
                @include('partials.home')
               </section>
            </div>
            <div class="page" id="p2">
              <section class="section-content-2">
                Mantenimientos
              </section>
            </div>
            <div class="page" id="p3">
              <section class="section-content-2">
                Procesos
              </section>
            </div>
            <div class="page" id="p4">
              <section class="section-content-2">
                Reportes
              </section>
            </div>
            <div class="page" id="p5">
              <section>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ mix('js/home.js') }}" defer></script>
  <script src="{{ mix('js/verificar_cedula.js') }}"></script>

</body>
</html>