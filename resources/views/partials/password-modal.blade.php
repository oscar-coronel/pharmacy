<div class="modal fade" id="password_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="password_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <form method="POST" id="password_edit_form" action="{{ route('auth_user.update.password', Auth::user()) }}">
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
            <div class="form-group col-12">
              <label for="password" class="col-form-label text-dark">Contraseña</label>
              <input type="password" name="password" id="password" placeholder="Contraseña"
                class="form-control
                    @error('password')
                      is-invalid
                    @enderror
                "
                value="{{ old('password') }}"
              >
              @error('password')
                <div class="text-danger w-100" style="font-size: 80%; margin-top: .25rem;" role="alert">
                  <strong>{{ $message }}</strong>
                </div>
              @enderror
            </div>
          </div>

          <div class="form-row">
          	<div class="form-group col-12">
              <label for="password_confirmation" class="col-form-label text-dark">Confirmar Contraseña</label>
              <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar Contraseña"
                class="form-control"
                value="{{ old('password_confirmation') }}"
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
    </form>
  </div>
</div>