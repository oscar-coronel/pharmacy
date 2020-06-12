<div class="modal fade" id="user_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="user_modal_title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST" id="auth_user_form" action="{{ route('auth_user.update', Auth::user()) }}">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="user_modal_title">Datos Personales</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @csrf @method('PATCH')
          <div class="form-row">
            <div class="form-group col-5">
              <label for="identification" class="col-form-label text-dark">Cédula</label>
              <input type="text" name="identification" id="identification" placeholder="Número de Cédula" class="form-control" maxlength="10" value="{{ old('identification', Auth::user()->identification) }}">
              @error('identification')
                <div class="invalid-feedback" role="alert" style="display: block !important;">
                  <strong>{{ $message }}</strong>
                </div>
              @enderror
              <div class="invalid-feedback id-message font-weight-bold" role="alert"></div>
            </div>
            <div class="form-group col-5 offset-2">
              <label for="name" class="col-form-label text-dark">Nombres</label>
              <input type="text" name="name" id="name" placeholder="Nombres"
                class="form-control
                    @error('name')
                      is-invalid
                    @enderror
                "
                value="{{ old('name', Auth::user()->name) }}"
              >
              @error('name')
                <div class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </div>
              @enderror
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-5">
              <label for="cellphone" class="col-form-label text-dark">Celular</label>
              <input type="text" name="cellphone" id="cellphone" placeholder="Número de Celular"
                class="form-control
                    @error('cellphone')
                      is-invalid
                    @enderror
                "
                value="{{ old('cellphone', Auth::user()->cellphone) }}"
              >
              @error('cellphone')
                <div class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </div>
              @enderror
            </div>
            <div class="form-group col-5 offset-2">
              <label for="lastname" class="col-form-label text-dark">Apellidos</label>
              <input type="text" name="lastname" id="lastname" placeholder="Apellidos"
                class="form-control
                    @error('lastname')
                      is-invalid
                    @enderror
                "
                value="{{ old('lastname', Auth::user()->lastname) }}"
              >
              @error('lastname')
                <div class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </div>
              @enderror
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-5">
              <label for="address" class="col-form-label text-dark">Dirección</label>
              <input type="text" name="address" id="address" placeholder="Dirección de Domicilio"
                class="form-control
                    @error('address')
                      is-invalid
                    @enderror
                "
                value="{{ old('address', Auth::user()->address) }}"
              >
              @error('address')
                <div class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </div>
              @enderror
            </div>
            <div class="form-group col-5 offset-2">
              <label for="date_of_birth" class="col-form-label text-dark">Fecha de Nacimiento</label>
              <input type="date" name="date_of_birth" id="date_of_birth" placeholder="Fecha de Nacimiento"
                class="form-control
                    @error('date_of_birth')
                      is-invalid
                    @enderror
                "
                value="{{ old('date_of_birth', date('Y-m-d',strtotime(Auth::user()->date_of_birth))) }}"
              >
              @error('date_of_birth')
                <div class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </div>
              @enderror
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-5">
              <label for="email" class="col-form-label text-dark">Email</label>
              <input type="text" name="email" id="email" placeholder="Correo Electrónico"
                class="form-control
                    @error('email')
                      is-invalid
                    @enderror
                "
                value="{{ old('email', Auth::user()->email) }}"
              >
              @error('email')
                <div class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger mr-auto btn-sm" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="btn_edit_auth_user" class="btn btn-primary btn-sm">
            Editar
          </button>
        </div>
      </div>
    </form>
  </div>
</div>