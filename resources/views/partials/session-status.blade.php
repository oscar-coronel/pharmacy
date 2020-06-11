@if(session('status'))
  <div class="alert alert-primary alert-dismissible fade show m-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
      <span aria-hidden="true">&times;</span>
    </button>
    <span>{{ session('status') }}</span>
  </div>
@endif