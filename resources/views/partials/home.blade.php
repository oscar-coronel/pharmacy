<div id="app-1" class="d-flex flex-column justify-content-between align-items-center bg-white" style="min-height: 100vh;">
  <div class="container-fluid p-0 m-0">
    @if(session('status'))
      <div class="row">
        <div class="col-12">
          <div class="alert alert-primary alert-dismissible fade show m-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
              <span aria-hidden="true">&times;</span>
            </button>
            <span>{{ session('status') }}</span>
          </div>
        </div>
      </div>
    @endif
  </div>
  <div class="container-fluid">
   <div class="row">
     <div class="col-6 mx-auto">
        <form method="POST" id="auth_user_form" action="{{ route('auth_user.update', Auth::user()) }}" class="border px-4 py-3 rounded shadow-lg">
          @csrf @method('PATCH')
          <div class="form-row">
            <h4 class="display-4 text-center w-100" style="font-size: 2.2rem;">Datos Personales</h4>
          </div>
          <div class="form-row">
            <div class="form-group col-5">
              <label for="identification" class="col-form-label">Cédula</label>
              <input type="text" name="identification" id="identification" placeholder="Número de Cédula" class="form-control" maxlength="10" value="{{ old('identification', Auth::user()->identification) }}">
              <span id="message" class="invalid-feedback" role="alert"></span>
            </div>
            <div class="form-group col-5 offset-2">
              <label for="name" class="col-form-label">Nombres:</label>
              <input type="text" name="name" id="name" placeholder="Nombres"
                class="form-control
                    @error('name')
                      is-invalid
                    @enderror
                "
                value="{{ old('name', Auth::user()->name) }}"
              >
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-5">
              <label for="cellphone" class="col-form-label">Celular</label>
              <input type="text" name="cellphone" id="cellphone" placeholder="Número de Celular"
                class="form-control
                    @error('cellphone')
                      is-invalid
                    @enderror
                "
                value="{{ old('cellphone', Auth::user()->cellphone) }}"
              >
              @error('cellphone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group col-5 offset-2">
              <label for="lastname" class="col-form-label">Apellidos:</label>
              <input type="text" name="lastname" id="lastname" placeholder="Apellidos"
                class="form-control
                    @error('lastname')
                      is-invalid
                    @enderror
                "
                value="{{ old('lastname', Auth::user()->lastname) }}"
              >
              @error('lastname')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-5">
              <label for="address" class="col-form-label">Dirección</label>
              <input type="text" name="address" id="address" placeholder="Dirección de Domicilio"
                class="form-control
                    @error('address')
                      is-invalid
                    @enderror
                "
                value="{{ old('address', Auth::user()->address) }}"
              >
              @error('address')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group col-5 offset-2">
              <label for="date_of_birth" class="col-form-label">Fecha de Nacimiento:</label>
              <input type="date" name="date_of_birth" id="date_of_birth" placeholder="Fecha de Nacimiento"
                class="form-control
                    @error('date_of_birth')
                      is-invalid
                    @enderror
                "
                value="{{ old('date_of_birth', date('Y-m-d',strtotime(Auth::user()->date_of_birth))) }}"
              >
              @error('date_of_birth')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-5">
              <label for="email" class="col-form-label">Email</label>
              <input type="text" name="email" id="email" placeholder="Correo Electrónico"
                class="form-control
                    @error('email')
                      is-invalid
                    @enderror
                "
                value="{{ old('email', Auth::user()->email) }}"
              >
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group col-5 offset-2 d-flex justify-content-end" style="margin-top: auto;">
              <button type="submit" id="btn_edit_auth_user" class="btn btn-primary">
                Editar
              </button>
            </div>
          </div>

        </form>
     </div>
   </div>
  </div>
  <div>
  </div>
</div>