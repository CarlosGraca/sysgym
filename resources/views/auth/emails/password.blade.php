{{-- resources/views/emails/password.blade.php --}}

{{ trans('adminlte_lang::message.passwordclickreset') }} <a href="{{ url('token_password/reset/'.$token) }}">{{ url('token_password/reset/'.$token) }}</a>