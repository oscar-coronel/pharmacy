<div class="modal fade" id="password_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="password_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <form method="POST" id="password_edit_form" action="{{ route('auth_user.update.password', Auth::user()) }}">
      @include('partials._password-modal-form', [
        'password_name' => 'password',
        'password_confirmation' => 'password_confirmation'
      ])
    </form>
  </div>
</div>