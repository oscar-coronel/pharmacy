<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title text-dark" id="password_modal_title">Actualizar Contraseña</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    @csrf @method('PATCH')
    <div class="form-row">
      <div class="form-group col-12 text-left">
        <label for="{{ $password_name }}" class="col-form-label text-dark">Contraseña</label>
        <input type="password" name="{{ $password_name }}" id="{{ $password_name }}" placeholder="Contraseña"
          class="form-control
              @error($password_name)
                is-invalid
              @enderror
          "
          value="{{ old($password_name) }}"
        >
        @error($password_name)
          <div class="text-danger w-100" style="font-size: 80%; margin-top: .25rem;" role="alert">
            <strong>{{ $message }}</strong>
          </div>
        @enderror
      </div>
    </div>

    <div class="form-row">
    	<div class="form-group col-12 text-left">
        <label for="{{ $password_confirmation }}" class="col-form-label text-dark">Confirmar Contraseña</label>
        <input type="password" name="{{ $password_confirmation }}" id="{{ $password_confirmation }}" placeholder="Confirmar Contraseña"
          class="form-control"
          value="{{ old($password_confirmation) }}"
        >
      </div>
    </div>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-danger mr-auto btn-sm" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary btn-sm">
      Actualizar
    </button>
  </div>
</div>