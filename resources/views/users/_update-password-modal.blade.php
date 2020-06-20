<div class="modal fade" id="edit_password_modal_{{ $table_user_id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="password_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <form method="POST" id="password_edit_form" action="{{ route('users.reset.password', $table_user) }}">
      @include('partials._password-modal-form', [
        'password_name' => 'password_reset_'.$table_user_id,
        'password_confirmation' => 'password_reset_'.$table_user_id.'_confirmation'
      ])
    </form>
  </div>
</div>