<div class="row">
  <div class="col-12 p-0">
    <div class="d-flex justify-content-end p-3">
      <div class="d-inline-block">
        <div class="dropdown">
          <a class="dropdown-toggle" id="user-options" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <span>{{ Auth::user()->name }}</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="">
            <a href="#" role="button" class="dropdown-item" data-toggle="modal" data-target="#user_modal" onclick="event.preventDefault();">
              Datos Personales
            </a>
            <a href="#" role="button" class="dropdown-item" data-toggle="modal" data-target="#password_modal" onclick="event.preventDefault();">
              Cambiar Contraseña
            </a>
            <a href="#" role="button" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout_form').submit();">
              Cerrar Sesión
            </a>
            <form method="POST" action="{{ route('logout') }}" class="d-none" id="logout_form">
                @csrf
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 p-0">
    @include('partials.session-status')
    @include('partials.show-errors')
  </div>
</div>